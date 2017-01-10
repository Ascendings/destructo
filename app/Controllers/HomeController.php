<?php

namespace App\Controllers;

// Home page controller
class HomeController extends Controller {

  // index function
  public function index($request, $response) {
    return $this->view->render($response, 'home.twig');
  }

}
