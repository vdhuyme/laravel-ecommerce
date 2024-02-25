<?php

namespace App\Helpers;

class FormatCurrencyHelper
{
    public static function formatCurrency(string $amount): string
    {
        $suffixes = [trans('đ'), trans('k'), trans('triệu'), trans('tỷ')];

        $suffixIndex = 0;
        while ($amount >= 1000 && $suffixIndex < count($suffixes) - 1) {
            $amount /= 1000;
            $suffixIndex++;
        }

        return number_format($amount, 0, ',', '.') . ' ' . $suffixes[$suffixIndex];
    }
}
