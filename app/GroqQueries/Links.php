<?php

namespace App\GroqQueries;

class Links
{
    public static function getLinksData()
    {
        return '
            *[_type == "links"] {
                encabezado,
                descripcion,
                    "url": url[activo == true] {
                        activo,
                        etiqueta,
                        href,
                        variant,
                        "iconUrl": icono.asset->url
                    }
            }
        ';
    }
}