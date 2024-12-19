<?php

namespace App\GroqQueries;

class EduardoAcerca
{
    public static function getEduardoAcercaData()
    {
        return '
            *[_type == "eduardocoello"] {
                queHaces {
                    acerca[] {
                        subtitulo,
                        encabezado,
                        cta,
                        imagen {
                            asset-> {
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
                },
                introAha[] {
                    encabezado,
                    descripcion,
                    imagen {
                        asset-> {
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
                },
                declaracionPoderosa[] {
                    encabezado,
                    descripcion
                },
                historia[] {
                    encabezado,
                    descripcion
                },
                parteDivertida[] {
                    encabezado,
                    estoAquello[] {
                        respuestaUno,
                        respuestaDos,
                        eleccionPreferida
                    }
                }
            }';
    }
}
