<?php

// Controllers
use App\Controllers\HomeController;
use App\Controllers\Messages\MessageController;

// home route
$app->get('/', HomeController::class . ':index')->setName('home');

// view message route
$app->get('/message/view/{hash}', MessageController::class . ':getView')->setName('messages.view');

// new messages routes
$app->get('/message/new', MessageController::class . ':getNew')->setName('messages.new');
$app->post('/message/new', MessageController::class . ':postNew');
