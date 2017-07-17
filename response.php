<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );

    // var_dump($response);
    $body = $response->getBody();
    // echo $body;
    $contents = $body->getContents();
    // echo $contents;
    $json = json_decode($contents);

    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/users/' . $json->userId
    );
    var_dump(json_decode($response->getBody()));

    echo "Status code: " . $response->getStatusCode() . "\r\n";
    echo "Reason Phrase: " . $response->getReasonPhrase() . "\r\n"; // status code turned into words
    
    if($response->getStatusCode() != 200) {
        echo "Failure!\r\n";
    }
