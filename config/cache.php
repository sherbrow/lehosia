<?php

return [
    'default' => env('CACHE_DRIVER', 'volatile'),
    'stores' => [
        'volatile' => [
            'driver' => 'array',
            // 'driver' => 'apc',
        ],
    ],
];
