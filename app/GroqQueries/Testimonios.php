<?php

namespace App\GroqQueries;

class Testimonios
{
    public static function getTestimoniosData()
    {
        return '
            *[_type== "testimonios"] {
                representanteNombre,
                nombreEmpresa,
                testimonio {
                    testimonioPrincipal,
                    testimonioServicios
                },
                logo {
                    asset-> {
                        url,
                        metadata {
                            dimensions {
                                width,
                                height
                            }
                        }
                    }
                }
            }';
    }
}
