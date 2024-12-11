<?php

declare(strict_types=1);

namespace Xpat\Http\Response;

interface HttpResponse
{
    public function statusCode(): int;

    public function content(): string;
}