<?php

namespace App\GroqQueries;

class Servicios
{

    public static function getServiciosData()
    {
        return '
            *[_type == "servicios"] {
                formatoSencillo {
                    servicios[] {
                        titulo,
                        descripcion,
                        imagen {
                            asset -> {
                                url,
                                metadata {
                                    dimensions {
                                        width,
                                        height
                                    }
                                }
                            }
                        },
                        botonCTA {
                            textoCTA,
                            "enlace": enlace[0].secciones->alias.current,
                            image {
                                asset -> {
                                    url,
                                    metadata {
                                        dimensions {
                                            width,
                                            height
                                        }
                                    }
                                }
                            }
                        }
                    },
                    ofertas[] {
                        titulo,
                        descripcion,
                        imagen {
                            asset -> {
                                url,
                                metadata {
                                    dimensions {
                                        width,
                                        height
                                    }
                                }
                            }
                        },
                        botonCTA {
                            textoCTA,
                            "enlace": enlace[0].secciones->alias.current,
                            image {
                                asset -> {
                                    url,
                                    metadata {
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
            }';
    }

    public static function getServiciosLargoData()
    {
        return '
            *[_type=="servicios"] {
                formatoLargo {
                    tituloServicio,
                    seccionHeroe[] {
                        encabezado,
                        subtitulo,
                        cta {
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
                            }
                        }
                    },
                    bloques[]{
                        _type,
                        _type == "elementosSeccion" => {
                            nombreSeccion,
                            titulo,
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
                        },
                        _type == "seccionCTA" => {
                            nombreCTA,
                            encabezado,
                            subtitulo,
                            botonCTA {
                                textoCTA,
                                "enlace": enlace[0].secciones->alias.current
                            }
                        },
                        _type == "lista" => {
                            nombreLista,
                            titulo,
                            subtitulo,
                            icono {
                                asset -> {
                                    url
                                }
                            },
                            items[] {
                                titulo,
                                descripcion,
                                icono {
                                    asset -> {
                                        url
                                    }
                                }
                            }
                        },
                        _type == "desglosePrecios" => {
                            encabezado,
                            descripcionPrecios[] {
                                plazo,
                                cantidad
                            }
                        }
                    }
                }
            }
        ';
    }
}
