<?php

// show a message
$app->get('/message/view/{hash}', function($request, $response, $args) {

	// build the query to find the message
	$message = $this->db->prepare("
		SELECT message
		FROM messages
		WHERE hash = :hash;

		DELETE FROM messages
		WHERE hash = :hash;
	");

	// execute the query with parameters
	$message->execute([
		'hash' => $args['hash'],
	]);

	// fetch the message
	$message = $message->fetch(PDO::FETCH_OBJ);

	// show the view
	return $this->view->render($response, 'message/view.twig', [
		'message' => $message,
	]);

})->setName('message.view');
