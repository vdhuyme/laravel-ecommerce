<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class GenerateSlug
{
    public static function generate(string $text): string
    {
        return Str::slug($text);
    }
}
