<?php

declare(strict_types=1);

namespace Xpat\Http\Response;

readonly class Response implements HttpResponse
{
    public function __construct(
        private int $statusCode,
        private string $content,
    ) {
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    public function content(): string
    {
        return $this->content;
    }
}