<?php

namespace App\GroqQueries;

class ZonaCTA
{
    public static function getZonaCTAData()
    {
        return '
            *[_type == "atencionCliente"] {
                zonaCTA {
                    acercaCTA[] {
                        encabezado,
                        subtitulo,
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
                            }
                        }
                    },
                    principalCTA[] {
                        encabezado,
                        subtitulo,
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
                            }
                        }
                    },
                    serviciosCTA[] {
                        encabezado,
                        subtitulo,
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
                            }
                        }
                    },
                    contactoCTA[] {
                        encabezado,
                        subtitulo,
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
                            }
                        }
                    },
                }
            }
        ';
    }
}
