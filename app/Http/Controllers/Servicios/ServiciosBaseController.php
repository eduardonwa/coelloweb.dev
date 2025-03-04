<?php

namespace App\Http\Controllers\Servicios;

use App\Facades\Sanity;
use App\Helpers\SanityImage;
use Illuminate\Http\Request;
use App\GroqQueries\Preguntas;
use App\GroqQueries\Servicios;
use App\Helpers\BloquesHelper;
use App\Helpers\SanityHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

abstract class ServiciosBaseController extends Controller
{
    protected $bloquesHelper;

    public function __construct(BloquesHelper $bloquesHelper)
    {
        $this->bloquesHelper = $bloquesHelper;
    }

    protected function getServiciosCached($cacheKey, $tituloServicio = null)
    {
        $data = Cache::remember($cacheKey, 3600, fn() => Sanity::fetch(Servicios::getServiciosLargoData()));
        $preguntasData = Sanity::fetch(Preguntas::getPreguntasData());

        if ($tituloServicio) {
            return collect($data)
                ->first(fn($item) => ($item['formatoLargo']['tituloServicio'] ?? null) === $tituloServicio)
                ?? throw new \Exception("No se encontró el servicio con título: {$tituloServicio}");
        }
        return $data;
    }

    protected function seccionHeroe($seccionHeroeData)
    {
        return collect($seccionHeroeData)->map(function ($item) {
            $imagen = isset($item['imagen']) && $item['imagen']
                ? new SanityImage($item['imagen'])
                : null;

            // procesar el enlace del boton CTA
            $botonCTA = isset($item['cta']) && $item['cta']
                ? $item['cta']
                : null;

            $enlace = $botonCTA && isset($botonCTA['enlace'])
                ? $botonCTA['enlace']
                : null;

            return [
                'encabezado' => $item['encabezado'],
                'subtitulo' => SanityHelpers::processBlockText($item['subtitulo']),
                'botonCTA' => $item['cta'],
                'enlaceCTA' => $enlace,
                'imagenUrl' => $imagen ? $imagen->getUrl() : null,
                'lqip' => $imagen && isset ($item['imagen']['asset']['metadata']['lqip'])
                    ? $item['imagen']
                    : null,
            ];
        });
    }

    protected $seccionesValidas = [
        'resultadoPerfecto',
        'agitacion',
        'porqueEsto',
        'introSolucion',
        'testimonioCorto',
        'unicaOpcion',
        'testimonioOne',
        'porqueYo',
    ];

    protected $listasValidas = [
        'loQueNecesitas',
        'bondades',
        'comoFunciona',
        'confianza',
        'queIncluye',
        'candidatoAdecuado',
    ];

    protected function procesarBloquesVista($bloquesData)
    {
        $bloquesProcesados = [
            'elementosSeccion' => [],
            'lista' => [],
            'seccionCTA' => [],
            'desglosePrecios' => [],
        ];

        foreach ($bloquesData as $bloque) {
            switch ($bloque['_type']) {
                case 'elementosSeccion':
                    $elementoProcesado = $this->procesarElementosSeccion($bloque);
                    $nombreSeccion = $this->toCamelCase($elementoProcesado['nombreSeccion']);
                    if (in_array($nombreSeccion, $this->seccionesValidas)) {
                        $bloquesProcesados['elementosSeccion'][$nombreSeccion] = $elementoProcesado;
                    }
                    break;
                case 'lista':
                    $listaProcesada = $this->procesarLista($bloque);
                    $nombreLista = $this->toCamelCase($listaProcesada['nombreLista']);
                    if (in_array($nombreLista, $this->listasValidas)) {
                        $bloquesProcesados['lista'][$nombreLista] = $listaProcesada;
                    }
                    break;
                case 'seccionCTA':
                    $ctaProcesado = $this->procesarSeccionCTA($bloque);
                    $nombreCTA = $this->toCamelCase($ctaProcesado['nombreCTA']);
                    $bloquesProcesados['seccionCTA'][$nombreCTA] = $ctaProcesado;
                    break;
                case 'desglosePrecios':
                    $bloquesProcesados['desglosePrecios'][] = $this->procesarDesglosePrecios($bloque);
                    break;
                default:
                    break;
            }
        }

        return $bloquesProcesados;
    }

    protected function procesarElementosSeccion($bloque)
    {
        $imagen = isset($bloque['imagen']) && $bloque['imagen']
                ? new SanityImage($bloque['imagen'])
                : null;

        return [
            'nombreSeccion' => $bloque['nombreSeccion'],
            'titulo' => $bloque['titulo'],
            'descripcion' => SanityHelpers::processBlockText($bloque['descripcion'] ?? []),
            'imagenUrl' => $imagen ? $imagen->getUrl() : null,
            'lqip' => $imagen && isset ($item['imagen']['asset']['metadata']['lqip'])
                    ? $item['imagen']
                    : null,
        ];
    }

    protected function procesarLista($bloque)
    {
        // procesar el icono global
        $iconoGlobal = isset($bloque['icono']) && $bloque['icono']
            ? $bloque['icono']['asset']['url']
            : null;

        $items = isset($bloque['items']) && $bloque['items']
            ? collect($bloque['items'])->map(function ($item) {
                // Si el ítem tiene su propio icono, úsalo; de lo contrario, usa null
                $iconoUrl = isset($item['icono']['asset']['url'])
                    ? $item['icono']['asset']['url']
                    : null;
                return [
                    'titulo' => $item['titulo'] ?? '',
                    'descripcion' => SanityHelpers::processBlockText($item['descripcion'] ?? []),
                    'iconoUrl' => $iconoUrl,
                ];
            }) : [];

        // checar si la lista tiene subtitulo
        $subtitulo = isset($bloque['subtitulo'])
            ? SanityHelpers::processBlockText($bloque['subtitulo'])
            : SanityHelpers::processBlockText([]); // Pasar un array vacío como valor predeterminado

        return [
            'nombreLista' => $bloque['nombreLista'],
            'titulo' => $bloque['titulo'],
            'subtitulo' => $subtitulo,
            'iconoUrl' => $iconoGlobal, // Icono global
            'items' => $items,
        ];
    }

    protected function procesarSeccionCTA($bloque)
    {
        $subtitulo = isset($bloque['subtitulo'])
            ? SanityHelpers::processBlockText($bloque['subtitulo'])
            : SanityHelpers::processBlockText([]); // Pasar un array vacío como valor predeterminado

        // procesar el enlace del boton CTA
        $botonCTA = isset($bloque['botonCTA']) && $bloque['botonCTA']
            ? $bloque['botonCTA']
            : null;

        $enlace = $botonCTA && isset($botonCTA['enlace'])
            ? $botonCTA['enlace']
            : null;

        return [
            'nombreCTA' => $bloque['nombreCTA'],
            'encabezado' => $bloque['encabezado'],
            'subtitulo' => $subtitulo,
            'botonCTA' => $botonCTA,
            'enlaceCTA' => $enlace,
        ];
    }

    protected function procesarDesglosePrecios($bloque)
    {
        $descripcionPrecios = isset($bloque['descripcionPrecios']) && $bloque['descripcionPrecios']
            ? collect ($bloque['descripcionPrecios'])->map(function ($item) {
                return [
                    'plazo' => $item['plazo'],
                    'cantidad' => $item['cantidad'],
                ];
            }) : [];

        return [
            'encabezado' => $bloque['encabezado'],
            'descripcionPrecios' => $descripcionPrecios
        ];
    }

    protected function procesarPreguntas($preguntasData)
    {
        // Verifica que $preguntasData tenga la estructura esperada
        if (empty($preguntasData) || !isset($preguntasData[0]['preguntas'])) {
            return []; // Si no hay preguntas, devuelve un array vacío
        }

        // Procesar las preguntas
        $preguntas = collect($preguntasData[0]['preguntas'])->map(function ($item) {
            return [
                'pregunta' => $item['pregunta'] ?? '',
                'respuesta' => SanityHelpers::processBlockText($item['respuesta'] ?? []),
            ];
        });

        return $preguntas;
    }

    protected function toCamelCase($string)
    {
        // Elimina espacios y convierte la primera letra de cada palabra (excepto la primera) a mayúscula
        $string = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $string)));
        // Convierte la primera letra a minúscula
        $string = lcfirst($string);
        return $string;
    }
}
