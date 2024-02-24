<?php

namespace App\Enums;

enum OrderStatus
{
    case PENDING;
    case PROCESSING;
    case COMPLETED;
    case CANCELLED;
    case REFUNDED;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => trans('Pending'),
            self::PROCESSING => trans('Processing'),
            self::COMPLETED => trans('Completed'),
            self::CANCELLED => trans('Cancelled'),
            self::REFUNDED => trans('Refunded'),
        };
    }
}
