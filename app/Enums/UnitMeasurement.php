<?php

namespace App\Enums;

class UnitMeasurement
{

    public const KILOGRAM = "KG";
    public const GRAM = "GRAM";
    public const PIECE = "PIECE";
    public const SACHET = "SACHET";
    public const LITRE ="LITRE";
    public const PACKET = "PACKET";
    public const TIN = "TIN";


    public static function all()
    {
        return [
            self::GRAM => "GRAM",
            self::KILOGRAM => "KILOGRAM",
            self::PIECE => "PIECE",
            self::SACHET => "SACHET",
            self::LITRE => "LITRE",
            self::PACKET => "PACKET",
            self::TIN => "TIN"
        ];
    }
}
