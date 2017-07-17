<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    try {
    $response = $client->request(
        'GET',
        // 'http://jsonplaceholder.typicode.com/posts/bar'
        'https://httpbin.org/status/503'
    );

    var_dump($response);
    echo "Status code: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody();
    } catch(\GuzzleHttp\Exception\ClientException $e) {
        echo $e->getCode() . "\r\n";
        echo $e->getMessage() . "\r\n";
    } catch(\GuzzleHttp\Exception\ServerException $e) { // 500-level errors
        echo $e->getCode() . "\r\n";
        echo $e->getMessage() . "\r\n";
    }
