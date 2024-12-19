<?php

namespace App\Http\Controllers;

use App\Facades\Sanity;
use App\GroqQueries\ZonaCTA;
use App\Helpers\SanityImage;
use Illuminate\Http\Request;
use App\GroqQueries\Preguntas;
use App\Helpers\SanityHelpers;
use App\GroqQueries\EduardoContacto;
use Illuminate\Support\Facades\Cache;

class ContactoController extends Controller
{
    protected function getContactoCached()
    {
        return Cache::remember('contacto_cache', 3600, function () {
            $eduardoContactoData = Sanity::fetch(EduardoContacto::getEduardoContactoData());
            $preguntasData = Sanity::fetch(Preguntas::getPreguntasData());
            $contactoCTAData = Sanity::fetch(ZonaCTA::getZonaCTAData());

            return [
                'eduardoContacto' => $eduardoContactoData,
                'preguntas' => $preguntasData,
                'contactoCTA' => $contactoCTAData
            ];
        });
    }

    public function show()
    {
        $contactoCached = $this->getContactoCached();
        $contactoInfoData = $contactoCached['eduardoContacto'][0];

        $contactoInfo = collect($contactoInfoData['infoContacto'])->map(function ($item) {
            $logo = new SanityImage($item['logo']);
            return [
                'email' => $item['email'],
                'ubicacion' => $item['ubicacion'],
                'horario' => $item['horario'],
                'logoUrl' => $logo->getUrl(),
                'redesSociales' => collect($item['redesSociales'][0]['redes'])->map(function ($subItem) {
                    return [
                        'redSocial' => $subItem['redSocial'],
                        'usuario' => $subItem['usuario'],
                    ];
                }),
            ];
        });

        $queHaces = collect($contactoInfoData['queHaces']['contacto'])->map(function ($item) {
            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
            ];
        });

        $preguntasData = $contactoCached['preguntas'][0];
        $preguntas = collect($preguntasData['preguntas'])->map(function ($item) {
            return [
                'pregunta' => $item['pregunta'],
                'respuesta' => SanityHelpers::processBlockText($item['respuesta']),
            ];
        });

        $contactoCTAData = $contactoCached['contactoCTA'][0]['zonaCTA']['contactoCTA'];

        $contactoCTA = collect($contactoCTAData)->map(function ($item) {
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
                'lqip' => $item['imagen']['asset']['metadata']['lqip'],
            ];
        });

        return view('contacto', [
            'contactoInfo' => $contactoInfo,
            'queHaces' => $queHaces,
            'preguntas' => $preguntas,
            'contactoCTA' => $contactoCTA,
        ]);
    }
}
