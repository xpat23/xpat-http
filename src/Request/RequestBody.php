<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

interface RequestBody
{
    public function content(): string;
}