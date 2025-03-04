<?php

namespace App\Http\Controllers\Servicios;

use App\Facades\Sanity;
use Illuminate\Http\Request;
use App\GroqQueries\Preguntas;
use App\Http\Controllers\Servicios\ServiciosBaseController;

class EcommerceController extends ServiciosBaseController
{
    public function show()
    {
        $cacheKey = 'ecommerce_data';
        $tituloServicio = 'Ecommerce';

        $serviciosCached = $this->getServiciosCached($cacheKey, $tituloServicio);

        // Asegurar que 'bloques' sea un array
        $bloquesData = $serviciosCached['formatoLargo']['bloques'] ?? [];

        // Procesar los bloques (esto ya incluye las secciones con valores predeterminados)
        $bloques = $this->procesarBloquesVista($bloquesData);

        // Extraer las secciones procesadas
        $secciones = $bloques['elementosSeccion'];

        // Obtener y procesar las preguntas frecuentes
        $preguntasData = Sanity::fetch(Preguntas::getPreguntasData());
        $preguntas = $this->procesarPreguntas($preguntasData);

        $datosVista = [
            'seccionHeroe' => $this->seccionHeroe($serviciosCached['formatoLargo']['seccionHeroe']),
            'bloques' => $bloques,
            'secciones' => $secciones,
            'preguntas' => $preguntas,
            'bloquesHelper' => $this->bloquesHelper,
            'tituloServicio' => $tituloServicio,
        ];

        return view('servicios.show', $datosVista);
    }
}
