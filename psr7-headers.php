<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request(
        'GET',
        'http://jsonplaceholder.typicode.com/posts/1'
    );
    
    if($response->hasHeader('content-type')) {
        echo $response->getHeader('content-type')[0] . "\r\n";

        $header = GuzzleHttp\Psr7\parse_header($response->getHeader('content-type'));
        var_dump($header);

        foreach ($header as $value) {
            if(array_key_exists('charset', $value)) {
                echo $value['charset'] . "\r\n";
            }
        }
    }
