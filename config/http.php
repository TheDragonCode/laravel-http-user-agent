<?php

declare(strict_types=1);

use DragonCode\LaravelHttpUserAgent\Helpers\Version;

return [
    'global' => [
        'user_agent' => [
            'enabled' => (bool) env('APP_USER_AGENT_ENABLED', true),

            'value' => env(
                'APP_USER_AGENT',
                sprintf(
                    '%s / %s - %s | %s',
                    env('APP_NAME', 'Laravel'),
                    Version::detect(),
                    env('APP_URL', 'http://localhost'),
                    env('MAIL_FROM_ADDRESS', 'hello@example.com')
                )
            ),
        ],
    ],
];
