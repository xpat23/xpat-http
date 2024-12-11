<?php

declare(strict_types=1);

namespace Xpat\Http\Request;

use Xpat\Http\Response\HttpResponse;
use Xpat\Http\Response\Response;

readonly class Post implements HttpRequest
{
    public function __construct(
        public HttpUrl $url,
        public HttpHeaders $headers,
        public RequestBody $body,
    ) {
    }

    public function execute(): HttpResponse
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url->value());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body->content());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers->items());

        $result = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            return new Response($statusCode, curl_error($ch));
        }

        curl_close($ch);

        return new Response($statusCode, $result);
    }
}