<?php

use App\Models\Currency;
use App\Models\LevelConfig;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;



if (! function_exists('getStatus')) {
    function getStatus() {
        return [
            'Pending'  => "Pending",
            'Approved' => "Approved",
            'Denied'   => "Denied",
        ];
    }
}

if (! function_exists('getPagination')) {
    function getPagination() {
        return [
            '20'  => "20",
            '50'  => "50",
            '100'  => "100",
            '200'  => "200",
        ];
    }
}

