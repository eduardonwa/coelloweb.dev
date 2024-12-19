<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use function SanityImageUrl\urlBuilder;

class SanityHelpers
{
    /**
     * Procesa bloques de texto de Sanity.
     *
     * @param array $blocks
     * @return array
     */
    public static function processBlockText(array $blocks): array
    {
        return collect($blocks)
            ->map(function ($block) {
                if ($block['_type'] === 'block') {
                    // Procesa los textos de los hijos
                    return collect($block['children'])->map(function ($child) {
                        // Convierte los saltos de línea (\n) en <br>
                        return nl2br($child['text']);
                    })->implode(' '); // Junta las palabras con un espacio
                }
                return ''; // Si el bloque no es de tipo "block", devuelve un string vacío
            })->toArray(); // Convierte la colección final en un array
    }
}
