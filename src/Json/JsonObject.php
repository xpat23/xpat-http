<?php

declare(strict_types=1);

namespace Xpat\Http\Json;

use InvalidArgumentException;

final readonly class JsonObject implements JsonObjectInterface
{
    private array $data;

    public function __construct(
        private string $json,
    ) {
        $this->data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    public function json(): string
    {
        return $this->json;
    }

    public function get(string $key): mixed
    {
        $keys = explode('.', $key);
        $data = $this->toArray();

        $result = array_reduce(
            $keys,
            static fn($carry, $key) => $carry[$key] ?? null,
            $data
        );

        if ($result === null) {
            throw new InvalidArgumentException("Key $key not found");
        }

        return $result;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function has(string $key): bool
    {
        $keys = explode('.', $key);
        $data = $this->toArray();

        return array_reduce(
                $keys,
                static fn($carry, $key) => $carry[$key] ?? null,
                $data
            ) !== null;
    }
}