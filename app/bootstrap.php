<?php

use \Slim\App;
use \Slim\Container;

use \Slim\Views\Twig;
use \Slim\Views\TwigExtension;

use \Noodlehaus\Config;

// Autoload our stuff >:D
require '../vendor/autoload.php';

// Create new container
$container = new Container(['settings' => ['displayErrorDetails' => true]]);

// load our configuration
$container['config'] = function($c) {
	return new Config('../config/production.php');
};

// setup our views
$container['view'] = function ($c) {
	$view = new Twig('../resources/views');
	
	$view->addExtension(new TwigExtension(
		$c['router'],
		$c['config']->get('url')
	));
	
	return $view;
};

// initialize our application
$app = new App($container);

// include our routes
require_once 'routes.php';
