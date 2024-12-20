<?php

namespace App\GroqQueries;

class EduardoContacto
{
    public static function getEduardoContactoData()
    {
        return '
            *[_type == "eduardocoello"] {
                infoContacto[] {
                    email,
                    ubicacion,
                    horario,
                        fotoPerfil {
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
                    },
                    redesSociales[] {
                        redes[] {
                            redSocial,
                            usuario
                        }
                    }
                },
                queHaces {
                    contacto[] {
                        encabezado,
                        subtitulo
                    }
                }
            }';
    }
}
