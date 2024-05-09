<?php

namespace App\Utils;

class FnUtils
{
    static function cleanString(string $text) : string
    {
        $response = trim($text);
        return $response;
    }
}