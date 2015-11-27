<?php

use \Slim\App;
use \Slim\Container;

use \Slim\Views\Twig;
use \Slim\Views\TwigExtension;

use \Noodlehaus\Config;

use \Mailgun\Mailgun;

// Autoload our stuff >:D
require '../vendor/autoload.php';

// Create new container
$container = new Container(['settings' => ['displayErrorDetails' => true]]);

// load our configuration
$container['config'] = function($c) {
	return new Config('../app/config/production.php');
};

// setup our views
$container['view'] = function ($c) {
	$view = new Twig('../app/views');
	
	$view->addExtension(new TwigExtension(
		$c['router'],
		$c['config']->get('url')
	));
	
	return $view;
};

// connect to the database
$container['db'] = function($c) {
	return new PDO(
		'mysql:host=' . $c['config']->get('db.mysql.host') . ';dbname=' . $c['config']->get('db.mysql.dname'),
		$c['config']->get('db.mysql.username'),
		$c['config']->get('db.mysql.password')
	);
};

// add mail to the app
$container['mail'] = function($c) {
	return new Mailgun($c['config']->get('services.mailgun.secret'));
};

// initialize our application
$app = new App($container);

// include our routes
require_once 'routes.php';
