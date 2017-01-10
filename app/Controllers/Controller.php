<?php

namespace App\Controllers;

// controller parent class
class Controller {

  // container object
  protected $container;

  // constructor
  public function __construct($container) {
    $this->container = $container;
  }

  // return container property if it exists
  public function __get($property) {
    if ($this->container->{$property}) {
      return $this->container->{$property};
    }
  }

}
