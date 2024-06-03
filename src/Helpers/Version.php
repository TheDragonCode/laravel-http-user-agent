<?php

declare(strict_types=1);

namespace DragonCode\LaravelHttpUserAgent\Helpers;

use function base_path;
use function file_exists;
use function file_get_contents;
use function json_decode;
use function json_validate;

class Version
{
    protected static string $default = '1.0';

    public static function detect(): string
    {
        $json = static::json(static::composerPath());

        if (!static::isValid($json)) {
            return static::$default;
        }

        return static::parse($json)['version'] ?? static::$default;
    }

    protected static function json(string $path): string
    {
        if (file_exists($path)) {
            return file_get_contents($path);
        }

        return '';
    }

    protected static function parse(string $path): array
    {
        return json_decode($path, true);
    }

    protected static function isValid(string $json): bool
    {
        return json_validate($json);
    }

    protected static function composerPath(): string
    {
        return base_path('composer.json');
    }
}
