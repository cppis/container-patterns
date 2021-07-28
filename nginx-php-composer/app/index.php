<?php

declare(strict_types=1);

// 
require __DIR__ . '/vendor/autoload.php';

use Brick\Http\Exception\HttpBadRequestException;
use Brick\Http\Request;
use Brick\Http\Url;

$request = Request::getCurrent();

$body = $request->getBody();
echo "body:" . $body . PHP_EOL;
//var_dump($body);
