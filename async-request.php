<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Response;
    use GuzzleHttp\Exception\RequestException;

    $client = new Client();
    $promise = $client->requestAsync(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    $promise->then(
        function(Response $response) {
            echo $response->getBody();
        }, 
        function(RequestException $exception) {
            echo $exception->getMessage();
        }
    );

    $promise->wait();