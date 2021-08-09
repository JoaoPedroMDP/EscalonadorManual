<?php
declare(strict_types=1);

namespace Classes;

class Assertions
{

    public static function isLetter(string $char)
    {
        return !is_numeric($char);
    }

    public static function isWhiteSpace(string $char)
    {
        return $char === ' ';
    }

    public static function is(string $char, string $char2)
    {
        return $char === $char2;
    }
}