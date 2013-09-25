<?php

class Zombie_View extends View {
  protected $zombie;
  public function __construct(Zombie_Model $zombie) {
    $this->zombie = $zombie;
  }
  
  public function render() {
    $data['page_title'] = 'The Zombist';
    $data['id'] = $this->zombie->get_id();
    $data['name'] = $this->zombie->get_name();
    $this->use_template('one_zombie', $data);
  }
}
