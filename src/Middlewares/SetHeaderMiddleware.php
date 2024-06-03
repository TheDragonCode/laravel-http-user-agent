<?php

declare(strict_types=1);

namespace DragonCode\LaravelHttpUserAgent\Middlewares;

use Psr\Http\Message\RequestInterface;

use function config;

class SetHeaderMiddleware
{
    public function __invoke(RequestInterface $request): RequestInterface
    {
        if ($this->enabled()) {
            return $request->withHeader('User-Agent', $this->value());
        }

        return $request;
    }

    protected function enabled(): bool
    {
        return config('http.global.user_agent.enabled');
    }

    protected function value(): string
    {
        return config('http.global.user_agent.value');
    }
}
