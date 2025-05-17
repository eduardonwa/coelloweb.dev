<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Facades\Sanity;
use App\GroqQueries\Proceso;
use App\GroqQueries\ZonaCTA;
use App\Helpers\SanityImage;
use Illuminate\Http\Request;
use App\GroqQueries\Servicios;
use App\Helpers\SanityHelpers;
use App\Helpers\ZonaCTAHelper;
use App\Services\SanityClient;
use App\GroqQueries\Testimonios;
use App\GroqQueries\EduardoWelcome;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    protected function getCachedWelcome()
    {
        return Cache::remember('welcome_data', 3600, function () {
            $eduardoWelcomeData = Sanity::fetch(EduardoWelcome::getEduardoWelcomeData());
            $testimoniosData = Sanity::fetch(Testimonios::getTestimoniosData());
            $serviciosData = Sanity::fetch(Servicios::getServiciosData());
            $procesoData = Sanity::fetch(Proceso::getProcesoData());
            $principalCTAData = Sanity::fetch(ZonaCTA::getZonaCTAData());

            return [
                'eduardoWelcome' => $eduardoWelcomeData,
                'testimonios' => $testimoniosData,
                'servicios' => $serviciosData,
                'proceso' => $procesoData,
                'principalCTA' => $principalCTAData,
            ];
        });
    }

    public function show()
    {
        $welcomeCache = $this->getCachedWelcome();
        $eduardoWelcomeData = $welcomeCache['eduardoWelcome'][0];
        
        $impacto = collect($eduardoWelcomeData['impacto'] ?? [])->map(function ($item) {
            // Procesar todas las imagenes como array
            $imagenes = collect($item['imagen'] ?? [])->map(function ($img) {
                try {
                    return [
                        'url' => (new SanityImage($img))->getUrl(),
                        'alt' => $img['alt'] ?? null,
                        'link' => $img['url'] ?? null, // URL del proyecto
                        'lqip' => $img['asset']['metadata']['lqip'] ?? null,
                    ];
                } catch (\Exception $e) {
                    return null;
                }
            })->filter();

            // procesar el enlace del boton CTA
            $botonCTA = $item['botonCTA'];
            $enlace = $botonCTA['enlace'];

            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'botonCTA' => $item['botonCTA'],
                'enlaceCTA' => $enlace,
                'testimonioMetrica' => SanityHelpers::processBlockText($item['testimonioMetrica']),
                'imagenes' => $imagenes,
            ];
        });

        $granProblema = collect($eduardoWelcomeData['elGranProblema'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => $item['subtitulo'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $porqueEduardo = collect($eduardoWelcomeData['porqueEduardoCoello'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            // procesar el enlace del boton CTA
            $botonCTA = $item['botonCTA'];
            $enlace = $botonCTA['enlace'];
            return [
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
                'botonCTA' => $item['botonCTA'],
                'enlaceCTA' => $enlace,
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $welcomeCache = $this->getCachedWelcome();
        $procesoData = $welcomeCache['proceso'][0];
        $proceso = collect($procesoData['elProceso'][0]['pasosASeguir'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            return [
                'encabezado' => $item['encabezado'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $testimoniosData = $welcomeCache['testimonios'];
        $testimonios = collect($testimoniosData)->map(function ($item) {
            $logo = new SanityImage($item['logo']);

            $testimonioTexto = collect($item['testimonio']['testimonioPrincipal'])->map(function ($test) {
                return collect($test['children'])->map(function ($child) {
                    return $child['text']; // Aquí accedemos al texto
                })->implode(' '); // Concatenamos los textos si es necesario
            })->implode(' '); // Unimos los testimonios si hay más de uno

            return [
                'nombreEmpresa' => $item['nombreEmpresa'],
                'representanteNombre' => $item['representanteNombre'],
                'logoUrl' => $logo->getUrl(),
                'testimonio' => $testimonioTexto,
            ];
        });

        $serviciosData = $welcomeCache['servicios'];
        $servicios = collect($serviciosData)->flatMap(function ($item) {
            return collect($item['formatoSencillo']['servicios'])->map(function ($servicio) {
                $imagen = new SanityImage($servicio['imagen']);
                $iconoCTA = new SanityImage($servicio['botonCTA']['image']);
                // procesar el enlace del boton CTA
                $botonCTA = $servicio['botonCTA'];
                $enlace = $botonCTA['enlace'];
                return [
                    'titulo' => $servicio['titulo'],
                    'descripcion' => SanityHelpers::processBlockText($servicio['descripcion']),
                    'botonCTA' => $servicio['botonCTA'],
                    'enlaceCTA' => $enlace,
                    'iconoCTA' => $iconoCTA->getUrl(),
                    'imagenUrl' => $imagen->getUrl(),
                ];
            });
        });

        $blog = Post::with('category')
            ->latest()
            ->where('active', '=', 1)
            ->take(4)
            ->get();

        $principalCTAData = $welcomeCache['principalCTA'];
        $principalCTA = collect($principalCTAData[0]['zonaCTA']['principalCTA'])->map(function ($item) {
            // Procesar la imagen, si existe
            $imagen = isset($item['imagen']) ? new SanityImage($item['imagen']) : null;
            // procesar el enlace del boton CTA
            $botonCTA = $item['botonCTA'];
            $enlace = $botonCTA['enlace'];

            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'botonCTA' => $item['botonCTA'],
                'enlaceCTA' => $enlace,
                'imagenUrl' => $imagen ? $imagen->getUrl() : null,
            ];
        });

        return view('welcome', [
            'impacto' => $impacto,
            'granProblema' => $granProblema,
            'porqueEduardo' => $porqueEduardo,
            'proceso' => $proceso,
            'servicios' => $servicios,
            'testimonios' => $testimonios,
            'blog' => $blog,
            'principalCTA' => $principalCTA,
        ]);
    }
}
