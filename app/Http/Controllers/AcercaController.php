<?php

namespace App\Http\Controllers;

use App\Facades\Sanity;
use App\GroqQueries\ZonaCTA;
use App\Helpers\SanityImage;
use Illuminate\Http\Request;
use App\Helpers\SanityHelpers;
use App\Services\SanityClient;
use App\GroqQueries\EduardoAcerca;
use Illuminate\Support\Facades\Cache;

class AcercaController extends Controller
{
    protected function getAcercaCached()
    {
        return Cache::remember('acerca_data', 3600, function () {
            $eduardoAcercaData = Sanity::fetch(EduardoAcerca::getEduardoAcercaData());
            $acercaCTAData = Sanity::fetch(ZonaCTA::getZonaCTAData());

            return [
                'eduardoAcerca' => $eduardoAcercaData,
                'acercaCTA' => $acercaCTAData
            ];
        });
    }

    public function show()
    {
        $acercaCached = $this->getAcercaCached();
        $eduardoAcercaData = $acercaCached['eduardoAcerca'][0];

        $queHaces = collect($eduardoAcercaData['queHaces']['acerca'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'cta' => $item['cta'],
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $introAha = collect($eduardoAcercaData['introAha'])->map(function ($item) {
            $imagen = new SanityImage($item['imagen']);
            return [
                'encabezado' => $item['encabezado'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
                'imagenUrl' => $imagen->getUrl(),
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        $declaracionPoderosa = collect($eduardoAcercaData['declaracionPoderosa'])->map(function ($item) {
            return [
                'encabezado' => $item['encabezado'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
            ];
        });

        $historia = collect($eduardoAcercaData['historia'])->map(function ($item) {
            return [
                'encabezado' => $item['encabezado'],
                'descripcion' => SanityHelpers::processBlockText($item['descripcion']),
            ];
        });

        $parteDivertida = collect($eduardoAcercaData['parteDivertida'])->map(function ($item) {
            return [
                'encabezado' => $item['encabezado'],
                'estoAquello' => collect($item['estoAquello'])->map(function ($subItem) {
                    return [
                        'respuestaUno' => $subItem['respuestaUno'], // Accede a los datos de cada subItem
                        'respuestaDos' => $subItem['respuestaDos'],
                        'eleccionPreferida' => $subItem['eleccionPreferida'],
                    ];
                }),
            ];
        });

        $acercaCTAData = $acercaCached['acercaCTA'];
        $acercaCTA = collect($acercaCTAData[0]['zonaCTA']['acercaCTA'])->map(function ($item) {
            // procesar el enlace del boton CTA
            $botonCTA = $item['botonCTA'];
            $enlace = $botonCTA['enlace'];

            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'botonCTA' => $item['botonCTA'],
                'enlaceCTA' => $enlace,
            ];
        });

        return view('acerca', [
            'queHaces' => $queHaces,
            'introAha' => $introAha,
            'declaracionPoderosa' => $declaracionPoderosa,
            'historia' => $historia,
            'parteDivertida' => $parteDivertida,
            'acercaCTA' => $acercaCTA
        ]);
    }
}
