<?php
require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use	Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/clima', function () use($app) {

    $client = new Client();
	$url = "http://api.openweathermap.org/data/2.5/weather?id=3530597&APPID=df097300382e60f265eb67bf7b2d5269&units=metric"; 
	$response = $client->get($url);
	$body = $response->getBody();

//	return $body;

	return new Response($body, 200, array("Content-Type" => "application/json"));
});
$app->run();