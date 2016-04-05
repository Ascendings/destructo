<?php

// home route
$app->get('/', function($request, $response, $args) {
	$this->view->render($response, 'home.twig');
})->setName('home');
