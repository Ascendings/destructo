<?php

// send a message
$app->get('/message/new', function($request, $response, $args) {

  $this->view->render($response, 'message/new.twig');

})->setName('message.new');

// send a message
$app->post('/message/new', function($request, $response, $args) use ($app) {

	// fetch our parameters
	$params = $request->getParams();
	// genrate our message hash
	$hash = md5(uniqid(true));

	// build the insert query
	$message = $this->db->prepare("
		INSERT INTO messages (hash, message, recipient)
		VALUES (:hash, :message, :recipient);
	");

	// execute the query with parameters
	$message->execute([
		'hash' => $hash,
		'message' => $params['message'],
		'recipient' => $params['email'],
	]);

	// send email to the recipient
	$this->mail->sendMessage($this->config->get('services.mailgun.domain'), [
		'from' => 'noreply@fieldprotocol.com',
		'to' => $params['email'],
		'subject' => 'New message from Destructo',
		'html' => $this->view->fetch('email/message.twig', [
			'hash' => $hash,
		]),
	]);

	// redirect to the homepage
	return $response->withRedirect($app->router->pathFor('home'));

})->setName('message.new.post');
