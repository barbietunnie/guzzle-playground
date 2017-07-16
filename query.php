<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts',
        [
            'query' => 'userId=2'
        ]
    );
    
    echo "Body: " . $response->getBody();
