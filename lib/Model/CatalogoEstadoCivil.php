<?php

namespace APIHub\Client\Model;
use \APIHub\Client\ObjectSerializer;

class CatalogoEstadoCivil
{
    
    const D = 'D';
    const L = 'L';
    const C = 'C';
    const S = 'S';
    const V = 'V';
    const E = 'E';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::D,
            self::L,
            self::C,
            self::S,
            self::V,
            self::E,
        ];
    }
}
