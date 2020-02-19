<?php

use GuzzleHttp\Client;

$endPoint = 'https://api.adsrv.net/v2';

$client = new Client();
$request = $client->post($endPoint . '/user/login', [
    'json' => [
        'server' => 'test',
        'email' => 'demo@example.com',
        'password' => 'superStrongPass',
        'ttl' => 30
    ]
]);

$response = json_decode($request->getBody());
$token = $response->token;

$request = $client->get($endPoint . '/stats', [
    'headers' => [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json'
    ],
    'query'   => [
        'dateBegin' => '2020-01-01',
        'dateEnd'   => '2020-01-31',
        'group'     => 'site'
    ]
]);

$response = json_decode($request->getBody());

var_dump($response);