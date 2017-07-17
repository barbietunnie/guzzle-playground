<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Psr7\Request;

    $request = new Request('GET', 'http://jsonplaceholder.typicode.com/posts/1'); // immutable

    echo "Uri: ". $request->getUri() . "\r\n";
    echo "Scheme: " . $request->getUri()->getScheme() . "\r\n";
    echo "Port: " . $request->getUri()->getPort() . "\r\n";
    echo "Host: " . $request->getUri()->getHost() . "\r\n";
    echo "Path: " . $request->getUri()->getPath() . "\r\n";