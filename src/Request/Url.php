<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

readonly class Url implements HttpUrl
{
    public function __construct(
        private string $host,
        private int $port = 80,
        private string $path = '',
    ) {
    }

    public function value(): string
    {
        return $this->host . ':' . $this->port . $this->path;
    }
}