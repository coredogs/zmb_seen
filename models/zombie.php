<?php

class Zombie_Model {
  protected $id;
  protected $name;
  public function __construct() {
  }
  public function set_id($id) {
    $this->id = $id;
  }
  public function get_id() {
    return $this->id;
  }
  public function set_name($name) {
    $this->name = $name;
  }
  public function get_name() {
    return $this->name;
  }
  
}
