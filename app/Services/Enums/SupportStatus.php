<?php

namespace App\Services\Enums;

enum SupportStatus: string
{
    case Active = 'Active';
    case Pendent = 'Pendent';
    case Closed = 'Closed';

    public static function fromValue(string $statusName): string {
        foreach (self::cases() as $status) {
            if($statusName === $status->name) {
                return $status->value;
            }
        }
        throw new \ValueError("$statusName is not a valid.");
    }
}
