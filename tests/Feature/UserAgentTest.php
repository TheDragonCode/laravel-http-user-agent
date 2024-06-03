<?php

declare(strict_types=1);

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

beforeEach(
    fn () => Http::fake(['*' => Http::response()])
);

test('set user agent', function (string $method) {
    call_user_func([Http::class, $method], 'https://example.com', ['dev' => 'test']);

    Http::assertSentCount(1);

    Http::assertSent(fn (Request $request) => $request->hasHeader(
        'User-Agent',
        sprintf(
            '%s / 1.0 - %s | %s',
            config('app.name'),
            config('app.url'),
            config('mail.from.address')
        )
    ));
})->with('http-methods');
