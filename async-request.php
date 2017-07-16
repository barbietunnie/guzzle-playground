<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Response;
    use GuzzleHttp\Exception\RequestException;

    $client = new Client();
    $promise = $client->requestAsync(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    $promise->then(
        function( $response) {
            echo $response->getBody();
        }, 
        function( $exception) {
            echo $exception->getMessage();
        }
    );

    $promise->wait();