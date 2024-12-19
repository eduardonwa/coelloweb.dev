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
}
