<?php

namespace App\GroqQueries;

class Proceso
{
    public static function getProcesoData()
    {
        return '
            *[_type == "atencionCliente"] {
            elProceso[] {
                pasosASeguir[] {
                    encabezado,
                    descripcion,
                        imagen {
                            asset -> {
                                url,
                                metadata {
                                    lqip,
                                    dimensions {
                                        width,
                                        height
                                    }
                                }
                            }
                        }
                    }
                }
            }
        ';
    }
}
