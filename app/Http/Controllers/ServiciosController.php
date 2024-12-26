<?php

namespace App\Http\Controllers;

use App\Facades\Sanity;
use App\GroqQueries\Proceso;
use App\GroqQueries\ZonaCTA;
use App\Helpers\SanityImage;
use Illuminate\Http\Request;
use App\GroqQueries\Servicios;
use App\Helpers\SanityHelpers;
use App\GroqQueries\Testimonios;
use App\GroqQueries\EduardoServicios;
use Illuminate\Support\Facades\Cache;

class ServiciosController extends Controller
{

    protected function getServiciosCached()
    {
        return Cache::remember('servicios_data', 3600, function () {
            $eduardoServiciosData = Sanity::fetch(EduardoServicios::getEduardoServiciosData());
            $serviciosData = Sanity::fetch(Servicios::getServiciosData());
            $procesoData = Sanity::fetch(Proceso::getProcesoData());
            $testimoniosData = Sanity::fetch(Testimonios::getTestimoniosData());
            $serviciosCTAData = Sanity::fetch(ZonaCTA::getZonaCTAData());

            return [
                'eduardoServicios' => $eduardoServiciosData,
                'servicios' => $serviciosData,
                'proceso' => $procesoData,
                'testimonios' => $testimoniosData,
                'serviciosCTA' => $serviciosCTAData,
            ];
        });
    }

    public function show()
    {
        $serviciosCached = $this->getServiciosCached();
        $eduardoServiciosData = $serviciosCached['eduardoServicios'][0];

        $queHaces = collect($eduardoServiciosData['queHaces']['servicios'])->map(function ($item) {
            $imagen = isset($item['imagen']) && $item['imagen']
                ? new SanityImage($item['imagen'])
                : null;
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'cta' => $item['cta'],
                'imagenUrl' => $imagen ? $imagen->getUrl() : null,
                'lqip' => $imagen && isset($item['imagen']['asset']['metadata']['lqip'])
                    ? $item['imagen']['asset']['metadata']['lqip']
                    : null,
            ];
        });

        $objeciones = collect($eduardoServiciosData['objeciones'])->map(function ($item) {
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'objeciones' => collect($item['objeciones'])->map(function ($obj) {
                    return [
                        'titulo' => $obj['titulo'],
                        'descripcion' => SanityHelpers::processBlockText($obj['descripcion']),
                        'media' => [
                            // Verificamos si 'media' existe y tiene 'type'
                            'type' => $obj['media']['type'],
                            'lottieFileUrl' => $obj['media']['lottieFile']['asset']['url'] ?? null,
                            'imageUrl' => isset($obj['media']['image']['asset'])
                                ? (new SanityImage($obj['media']['image']))->getUrl()
                                : null,
                        ],
                    ];
                }),
                'invitacion' => collect($item['invitacion'])->map(function ($invitacion) {
                    // procesar el enlace del boton CTA
                    $botonCTA = $invitacion['botonCTA'];
                    $enlace = $botonCTA['enlace'];

                    return [
                        'encabezado' => $invitacion['encabezado'],
                        'descripcion' => SanityHelpers::processBlockText($invitacion['descripcion']),
                        'botonCTA' => [
                            'textoCTA' => $invitacion['botonCTA']['textoCTA'],
                            'enlaceCTA' => $enlace,
                        ],
                    ];
                }),
            ];
        });

        $eduardoServiciosData = $serviciosCached['eduardoServicios'][0];

        $valores = collect($eduardoServiciosData['valores'])->map(function ($item) {
            return [
                'titulo' => $item['titulo'],
                'definicion' => collect($item['definicion'])->map(function ($def) {
                    return [
                        'encabezado' => $def['encabezado'],
                        'subtitulo' => SanityHelpers::processBlockText($def['subtitulo']),
                        'iconoUrl' => isset($def['icono']['asset'])
                            ? (new SanityImage($def['icono']))->getUrl()
                            : null,
                    ];
                }),
            ];
        });

        $serviciosCached = $this->getServiciosCached();
        $procesoData = $serviciosCached['proceso'][0];
        $proceso = collect($procesoData['elProceso'][0]['pasosASeguir'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            return [
                'encabezado' => $item['encabezado'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $serviciosData = $serviciosCached['servicios'];
        $servicios = collect($serviciosData)->flatMap(function ($item) {
            return collect($item['formatoSencillo']['ofertas'])->map(function ($servicio) {
                // Validamos que la imagen no sea nula antes de crear SanityImage
                $imagen = isset($servicio['imagen']) && is_array($servicio['imagen'])
                    ? new SanityImage($servicio['imagen'])
                    : null;

                $iconoCTA = isset($servicio['botonCTA']['image']) && is_array($servicio['botonCTA']['image'])
                    ? new SanityImage($servicio['botonCTA']['image'])
                    : null;
                // procesar el enlace del boton CTA
                $botonCTA = $servicio['botonCTA'];
                $enlace = $botonCTA['enlace'];

                return [
                    'titulo' => $servicio['titulo'],
                    'descripcion' => SanityHelpers::processBlockText($servicio['descripcion']),
                    'botonCTA' => $servicio['botonCTA'],
                    'iconoCTA' => $iconoCTA ? $iconoCTA->getUrl() : null,
                    'enlaceCTA' => $enlace,
                    'imagenUrl' => $imagen ? $imagen->getUrl() : null,
                ];
            });
        });

        $testimoniosData = $serviciosCached['testimonios'];
        $testimonios = collect($testimoniosData)->map(function ($item) {
            $logo = new SanityImage($item['logo']);

            $testimonioTexto = collect($item['testimonio']['testimonioServicios'])->map(function ($test) {
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

        $serviciosCTAData = $serviciosCached['serviciosCTA'];
        $serviciosCTA = collect($serviciosCTAData[0]['zonaCTA']['serviciosCTA'])->map(function ($item) {
            // procesar el enlace del boton CTA
            $botonCTA = $item['botonCTA'];
            $enlace = $botonCTA['enlace'];
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => $item['subtitulo']
                    ? SanityHelpers::processBlockText($item['subtitulo'])
                    : null,
                'botonCTA' => $item['botonCTA'],
                'enlaceCTA' => $enlace,
            ];
        });

        return view('servicios', [
            'queHaces' => $queHaces,
            'objeciones' => $objeciones,
            'valores' => $valores,
            'servicios' => $servicios,
            'proceso' => $proceso,
            'testimonios' => $testimonios,
            'serviciosCTA' => $serviciosCTA,
        ]);
    }

}
