<?php

$app->get('/', function($request, $response, $args) {
	$this->view->render($response, 'home.php');
})->setName('home');
