<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

use Xpat\Http\Response\HttpResponse;

interface HttpRequest
{
    public function execute(): HttpResponse;

    public function url(): string;
}