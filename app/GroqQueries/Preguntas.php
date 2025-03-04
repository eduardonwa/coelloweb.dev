<?php

namespace App\GroqQueries;

class Preguntas
{
    public static function getPreguntasData()
    {
        return '
            *[_type == "atencionCliente"] {
                preguntas[] {
                    pregunta,
                    respuesta
                }
            }';
    }
}
