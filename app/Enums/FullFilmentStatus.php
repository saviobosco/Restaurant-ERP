<?php
declare(strict_types = 1);

namespace App\Enums;

class FullFilmentStatus
{
    public const UNFULLFILLED = 0;
    public const FULFILLED = 1;

    public static function all()
    {
        return [
            self::FULFILLED,
            self::UNFULLFILLED
        ];
    }
}
