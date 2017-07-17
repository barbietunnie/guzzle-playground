<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    var_dump($response);
    echo "Status code: " . $response->getStatusCode() . "\r\n";
    echo "Reason Phrase: " . $response->getReasonPhrase() . "\r\n";

    // Create a new response as a response object is immutable
    $response = $response->withStatus(418);
    echo "Status code: " . $response->getStatusCode() . "\r\n";
    echo "Reason Phrase: " . $response->getReasonPhrase() . "\r\n";

    // Create a non-existent response code
    $response = $response->withStatus(419);
    echo "Status code: " . $response->getStatusCode() . "\r\n";
    echo "Reason Phrase: " . $response->getReasonPhrase() . "\r\n";

    // Create a custom reason phrase
    $response = $response->withStatus(419, 'Coffee is better than tea.');
    echo "Status code: " . $response->getStatusCode() . "\r\n";
    echo "Reason Phrase: " . $response->getReasonPhrase() . "\r\n";
