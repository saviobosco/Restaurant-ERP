<?php

namespace App\Enums;

class ReceiptStatus
{
    public const PENDING = 0;
    public const PAID = 1;
    public const VOID = -1;

    public static function all()
    {
        return [
            self::PENDING,
            self::PAID,
            self::VOID
        ];
    }
}
