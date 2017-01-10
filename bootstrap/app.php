<?php

// Autoload our stuff >:D
require '../vendor/autoload.php';

// create new app instance
$app = new \Slim\App([
  'settings' => [
    'determineRouteBeforeAppMiddleware' => true,
    'displayErrorDetails' => true,
  ]
]);

// grab container
$c = $app->getContainer();

// load our configuration
$c['config'] = function($container) {
  return new \Noodlehaus\Config(__DIR__ . '/../config/app.json');
};

// database configuration
$c['db'] = function($container) {
	$db = new PDO(
		'mysql:host=' . $container['config']->get('db.mysql.host') . ';dbname=' . $container['config']->get('db.mysql.dbname'),
		$container['config']->get('db.mysql.username'),
		$container['config']->get('db.mysql.password')
	);

	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
};

// setup our views
$c['view'] = function($container) {
  $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
    'cache' => false,
  ]);

  $view->addExtension(new \Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));

  return $view;
};

// add mail to the app
$c['mail'] = function($container) {
	return new \Mailgun\Mailgun($container['config']->get('services.mailgun.secret'));
};

// require in our routes
require __DIR__ . '/routes.php';
