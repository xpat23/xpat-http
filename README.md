# Simple Object-Oriented HTTP Client

A simple and intuitive object-oriented HTTP client for PHP. This library enables you to make HTTP requests (GET, POST,
PUT, DELETE) with clean, structured code.

## Features

- Object-oriented design.
- Supports common HTTP methods: GET, POST, PUT, DELETE.
- Easily configurable headers and request body.
- Straightforward and reusable components for URL, headers, and body.

## Installation

```bash
composer require xpat/xpat-http
```

## Usage

### GET Request Example

```php
use Xpat\Http\Request\Get;
use Xpat\Http\Request\Headers;
use Xpat\Http\Request\Url;


$response = (
    new Get(
        new Url(
            'localhost',
            8080,
            '/expense-categories'
        ),
        new Headers([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])
    )
)->execute();

echo $response->content() . PHP_EOL;
echo $response->statusCode() . PHP_EOL;
```

### POST Request Example

```php

use Xpat\Http\Request\Headers;
use Xpat\Http\Request\JsonBody;
use Xpat\Http\Request\Post;
use Xpat\Http\Request\Url;


$response = (
    new Post(
        new Url(
            'localhost',
            8080,
            '/expense-categories'
        ),
        new Headers([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]),
        new JsonBody([
            'name' => 'New Category',
        ])
    )
)->execute();

echo $response->content() . PHP_EOL;
echo $response->statusCode() . PHP_EOL;
```

### PUT Request Example

```php
use Xpat\Http\Request\Headers;
use Xpat\Http\Request\JsonBody;
use Xpat\Http\Request\Put;
use Xpat\Http\Request\Url;


$response = (
    new Put(
        new Url(
            'localhost',
            8080,
            '/expense-categories/4'
        ),
        new Headers([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]),
        new JsonBody([
            'id' => 4,
            'name' => 'Grocery',
        ])
    )
)->execute();

echo $response->content() . PHP_EOL;
echo $response->statusCode() . PHP_EOL;
```

### DELETE Request Example

```php
use Xpat\Http\Request\Delete;
use Xpat\Http\Request\Headers;
use Xpat\Http\Request\Url;


$response = (
    new Delete(
        new Url(
            'localhost',
            8080,
            '/expense-categories/4'
        ),
        new Headers([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])
    )
)->execute();

echo $response->content() . PHP_EOL;
echo $response->statusCode() . PHP_EOL;
```

## Components

### `Url`

Defines the request URL, including the host, port, and endpoint.

### `Headers`

Manages HTTP headers as key-value pairs.


### `JsonBody`

Formats and encapsulates the request body as JSON.

### Response Object

The `execute()` method returns a response object with the following methods:

- `content()`: The content of the HTTP response.
- `statusCode()`: The HTTP status code of the response.

### `JsonObject`

The JsonObject class provides a simple and powerful
way to work with JSON data in an object-oriented manner. It allows you to parse, query, and manipulate JSON structures
using a key-path syntax.

#### Example

```php
use Xpat\Http\Json\JsonObject;


$json = new JsonObject(
    '{
        "id": 3,
        "amount": 300,
        "description": "Plain ticket",
        "date": "2024-11-27 22:47:21",
        "category": {
            "id": 2,
            "name": "Travel"
        }
    }'
);

if ($json->has('category.name')) {
    echo $json->get('category.name');
} else {
    echo 'No category name found';
}
```

## License

The MIT License (MIT)

Copyright (c) 2024 Alymbek Kydyrmyshev

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
