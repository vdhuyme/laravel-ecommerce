<?php

namespace App\Helpers;

class FormatCurrencyHelper
{
    public static function formatCurrency(string $amount): string
    {
        $formattedAmount = number_format($amount, 0, ',', '.');
        return $formattedAmount . trans(' đ');
    }
}
