<?php

use App\Services\Enums\SupportStatus;

if(!function_exists(function: 'getStatusSupport')) {
    function getStatusSupport(string $status): string {
        return SupportStatus::fromValue($status);
    }
}
if(!function_exists(function: 'getQuantityReplies')) {
    function getQuantityReplies(stdClass $support): int {
        return max(count($support->replies), 0);
    }
}
