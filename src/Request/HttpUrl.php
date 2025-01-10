<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

interface HttpUrl
{
    public function value(): string;

    public function host(): string;

    public function domain(): string;
}