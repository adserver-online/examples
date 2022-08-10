<?php

use GuzzleHttp\Client;

$endPoint = 'https://api.adsrv.net/v2';

$token = 'create token in your panel';

$client = new Client();
$request = $client->get($endPoint . '/stats', [
    'headers' => [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json'
    ],
    'query'   => [
        'dateBegin' => '2022-01-01',
        'dateEnd'   => '2022-01-31',
        'group'     => 'site'
    ]
]);

$response = json_decode($request->getBody());

var_dump($response);
