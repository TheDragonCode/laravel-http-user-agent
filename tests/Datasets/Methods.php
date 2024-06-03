<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;

dataset('http-methods', [
    Request::METHOD_HEAD,
    Request::METHOD_GET,
    Request::METHOD_POST,
    Request::METHOD_PUT,
    Request::METHOD_PATCH,
    Request::METHOD_DELETE,
]);
