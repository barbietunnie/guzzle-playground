<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Response;
    use GuzzleHttp\Exception\RequestException;

    $client = new Client();
    $promise1 = $client->requestAsync(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    $promise2 = $client->requestAsync(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/2'
    );

    $promises = [$promise1, $promise2];
    $results = GuzzleHttp\Promise\settle($promises)->wait();
    var_dump($results);

    foreach ($results as $result) {
        echo $result['value']->getBody();
    }

    // $promise->then(
    //     function(Response $response) {
    //         echo $response->getBody();
    //     }, 
    //     function(RequestException $exception) {
    //         echo $exception->getMessage();
    //     }
    // );

    // $promise->wait();