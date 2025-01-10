<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

use Xpat\Http\Response\HttpResponse;
use Xpat\Http\Response\Response;

final readonly class Get implements HttpRequest
{
    public function __construct(
        private HttpUrl $url,
        private HttpHeaders $headers,
    ) {
    }

    public function execute(): HttpResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url->value());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Host: ' . $this->url->domain(),
            'User-Agent: Xpat-Http/1.6',
            ...$this->headers->items(),
        ]);

        $result = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            return new Response($statusCode, curl_error($ch));
        }

        curl_close($ch);

        return new Response($statusCode, $result);
    }

    public function url(): string
    {
        return $this->url->value();
    }
}