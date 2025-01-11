<?php

namespace App\Helpers;

class BloquesHelper
{
    /**
     * Obtiene un bloque específico por su nombre.
     *
     * @param array $bloques
     * @param string $tipoBloque
     * @param string $nombreBloque
     * @return array|null
     */
    public function obtenerBloque(array $bloques, string $tipoBloque, string $nombreBloque): ?array
    {
        return $bloques[$tipoBloque][$nombreBloque] ?? null;
    }

    /**
     * Obtiene todos los bloques de un tipo específico.
     *
     * @param array $bloques
     * @param string $tipobloque
     * @return array
     */
    public function obtenerTodoBloques(array $bloques, string $tipoBloque): array
    {
        return $bloques[$tipoBloque] ?? [];
    }
}
