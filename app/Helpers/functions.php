<?php

use App\Services\Enums\SupportStatus;

if(!function_exists(function: 'getStatusSupport')) {
    function getStatusSupport(string $status): string {
        return SupportStatus::fromValue($status);
    }
}
