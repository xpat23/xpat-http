<?php

declare(strict_types=1);

namespace Xpat\Http\Json;

interface JsonObjectInterface
{
    public function json(): string;

    public function toArray(): array;

    public function get(string $key): mixed;

    public function has(string $key): bool;
}