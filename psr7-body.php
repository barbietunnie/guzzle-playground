<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    var_dump($response);
    // echo "Status code: " . $response->getStatusCode() . "\n";
    echo "Body size: " . $response->getBody()->getSize();
    echo "Body: " . $response->getBody()->read(20); // read the first 20 bytes
    echo $response->getBody()->read(20) . "\r\n"; // read the next 20 bytes
    echo "Body size: " . $response->getBody()->getSize();
