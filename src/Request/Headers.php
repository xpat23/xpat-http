<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

readonly class Headers implements HttpHeaders
{
    /**
     * @param array<string, string> $items
     */
    public function __construct(private array $items)
    {
    }

    public function append(string $name, string $value): Headers
    {
        return new Headers(array_merge($this->items, [$name => $value]));
    }

    public function items(): array
    {
        $items = [];
        foreach ($this->items as $name => $value) {
            $items[] = sprintf('%s: %s', $name, $value);
        }

        return $items;
    }
}