<?php

namespace App\GroqQueries;

class EduardoServicios
{
    public static function getEduardoServiciosData()
    {
        return '
            *[_type == "eduardocoello"] {
                queHaces {
                    servicios[] {
                        encabezado,
                        subtitulo,
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
                objeciones[] {
                    encabezado,
                    subtitulo,
                    objeciones[] {
                        titulo,
                        descripcion,
                        media {
                            type,
                            lottieFile {
                                asset-> {
                                    url,
                                },
                            },
                        image {
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
                invitacion[] {
                    encabezado,
                    descripcion,
                    botonCTA {
                        textoCTA,
                        "enlace": enlace[0].secciones->alias.current
                    }
                }
                },
                valores[] {
                    titulo,
                    definicion[] {
                        encabezado,
                        subtitulo,
                        icono {
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
            }';
    }
}
