<?php

use \Slim\App;
use \Slim\Container;

use \Slim\Views\Twig;
use \Slim\Views\TwigExtension;

use \Noodlehaus\Config;

// The app's root directory
define('INC_ROOT', dirname(__DIR__));

// Autoload our stuff >:D
require INC_ROOT . '/vendor/autoload.php';

// Create new container
$container = new Container();

// load our configuration
$container['config'] = function($c) {
	return new Config(INC_ROOT . '/config/app.php');
};

// setup our views
$container['view'] = function ($c) {
	$view = new Twig(INC_ROOT . '/resources/views');
	
	$view->addExtension(new TwigExtension(
		$c['router'],
		$c['config']->get('url')
	));
	
	return $view;
};

// initialize our application
$app = new App();

// include our routes
require_once 'routes.php';
