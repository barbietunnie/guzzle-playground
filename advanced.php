<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Cookie\CookieJar;

    $client = new Client();

    echo "\r\n==== Progress ====\r\n";
    $response = $client->request(
        'GET',
        'https://httpbin.org/drip?numbytes=1000&duration=5',
        [
            'progress' => function(
                $downloadTotal,
                $downloadedBytes,
                $uploadTotal,
                $uploadedBytes
            ) {
                echo "Total Expected download: {$downloadTotal}\n
                        Total downloaded: {$downloadedBytes} (in bytes)\r\n";
            }
        ]
    );

    echo "\r\n==== Redirects - Below Max ====\r\n";
    $response = $client->request(
        'GET', 
        'https://httpbin.org/redirect/1',
        [
            'allow_redirects' => [
                'max' => 2
            ]
        ]);
    echo 'Body: ' . $response->getBody();
    echo 'Status code: ' . $response->getStatusCode();



    echo "\r\n==== Redirects - Above Max ====\r\n";
    try {
        $response = $client->request(
            'GET', 
            'https://httpbin.org/redirect/3',
            [
                'allow_redirects' => [
                    'max' => 2
                ]
            ]);
        echo 'Body: ' . $response->getBody();
        echo 'Status code: ' . $response->getStatusCode();
    } catch(\GuzzleHttp\Exception\TooManyRedirectsException $e) {
        echo $e->getMessage();
    }



    echo "\r\n==== Redirects - Not Allowed ====\r\n";
    $response = $client->request(
        'GET', 
        'https://httpbin.org/redirect/1',
        [
            'allow_redirects' => false
        ]);
    echo 'Status code: ' . $response->getStatusCode();



    // You can use the delay feature for APIs that are rate limited
    echo "\r\n==== Delay ====\r\n";
    $response = $client->request(
        'GET', 
        'https://jsonplaceholder.typicode.com/posts/1',
        [
            'delay' => 2000
        ]);
    echo 'Body: ' . $response->getBody();



    echo "\r\n==== HTTP Errors - TRUE ====\r\n";
    try {
        $response = $client->request(
            'GET', 
            'https://jsonplaceholder.typicode.com/comments/0',
            [
                'http_errors' => true
            ]);
    } catch(\GuzzleHttp\Exception\ClientException $e) {
        echo $e->getMessage();
    }



    echo "\r\n==== HTTP Errors - FALSE ====\r\n";
    $response = $client->request(
        'GET', 
        'https://jsonplaceholder.typicode.com/comments/0',
        [
            'http_errors' => false
        ]
    );
    echo $response->getStatusCode();


    echo "\r\n==== Cookies ====\r\n";
    $cookiesJar = new CookieJar();

    $response = $client->request(
        'GET', 
        'https://httpbin.org/cookies/set?test=foo',
        [
            'cookies' => $cookiesJar
        ]
    );
    echo var_dump($cookiesJar->toArray());


    echo "\r\n==== HTTP Basic Auth ====\r\n";
    $response = $client->request(
        'GET', 
        'https://httpbin.org/basic-auth/user/passwd',
        [
            'auth' => ['user', 'passwd']
        ]
    );
    echo $response->getBody();


    echo "\r\n==== Custom Headers ====\r\n";
    $response = $client->request(
        'GET', 
        'https://jsonplaceholder.typicode.com/comments/1',
        [
            'headers' => [
                'User-Agent' => 'testing/1.0'
            ]
        ]
    );
    echo $response->getBody();


