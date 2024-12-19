<?php
namespace App\Helpers;

class ZonaCTAHelper
{
    public static function getSpecificZone($fullData, $zoneName)
    {
        // Verifica que $fullData contiene un array y la estructura esperada
        if (is_array($fullData) && isset($fullData[0]['zonaCTA'][$zoneName])) {
            return $fullData[0]['zonaCTA'][$zoneName][0] ?? null;  // Devuelve el primer elemento de la zona
        }
        return null; // Si no existe la zona o la estructura es incorrecta
    }
}
