<?php

// send a message
$app->get('/message/new', function($request, $response, $args) {

  $this->view->render($response, 'message/new.twig');

})->setName('message.new');
