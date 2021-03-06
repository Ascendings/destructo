<?php

namespace App\Controllers\Messages;

use App\Controllers\Controller;

// Message controller
class MessageController extends Controller {

  // view message
  public function getView($request, $response, $args) {
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
  	return $this->view->render($response, 'messages/view.twig', [
  		'message' => $message,
  	]);
  }

  // new message view
  public function getNew($request, $response, $args) {
    $this->view->render($response, 'messages/new.twig');
  }

  // new message backend
  public function postNew($request, $response, $args) {
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
  }

}
