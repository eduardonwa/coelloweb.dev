<?php

namespace App\GroqQueries;

class EduardoWelcome
{
    public static function getEduardoWelcomeData()
    {
        return '
            *[_type == "eduardocoello"] {
                elGranProblema[] {
                    encabezado,
                    descripcion,
                    subtitulo,
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
                        },
                        hotspot,
                        crop
                    }
                },
                impacto[] {
                    encabezado,
                    subtitulo,
                    botonCTA {
                        textoCTA,
                        "enlace": enlace[0].secciones->alias.current
                    },
                    testimonioMetrica,
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
                        },
                        hotspot,
                        crop
                    }
                },
                porqueEduardoCoello[] {
                    descripcion,
                    botonCTA {
                        textoCTA,
                        "enlace": enlace[0].secciones->alias.current
                    },
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
                        },
                        hotspot,
                        crop
                    }
                },
            }
        ';
    }
}
