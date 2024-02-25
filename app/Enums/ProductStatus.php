<?php

namespace App\Enums;

enum ProductStatus
{
    case DRAFT;
    case ACTIVE;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => trans('Draft'),
            self::ACTIVE => trans('Active'),
        };
    }
}
