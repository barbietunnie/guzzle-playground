<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    // var_dump($response);
    $headers = $response->getHeaders();
    // print_r($headers);
    
    foreach ($headers as $name => $value) {
        // print_r($value);
        echo "\r\n";
        echo "{$name}: {$value[0]}\r\n";
    }

    $type = $response->getHeader('Content-Type');
    if(in_array('application/json; charset=utf-8', $type)) {
        $body = json_decode($response->getBody());
    } else {
        $body = $response->getBody();
    }

    var_dump($body);
