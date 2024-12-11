<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

interface HttpHeaders
{
    public function append(string $name, string $value): Headers;

    public function items(): array;
}