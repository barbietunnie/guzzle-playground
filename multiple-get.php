<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client(
        ['base_uri' => 'http://jsonplaceholder.typicode.com']
    );
    $response = $client->get(
        'posts/1'
    );

    var_dump($response);
    echo "Status code: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody();

    $response = $client->get(
        'posts/2'
    );

    var_dump($response);
    echo "Status code: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody();

    $response = $client->get(
        'https://httpbin.org/ip'
    );

    var_dump($response);
    echo "Status code: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody();