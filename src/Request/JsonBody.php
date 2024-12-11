<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

readonly class JsonBody implements RequestBody
{
    public function __construct(
        private array $data
    ) {
    }

    public function content(): string
    {
        return json_encode($this->data, JSON_THROW_ON_ERROR);
    }
}