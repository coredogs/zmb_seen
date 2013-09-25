<?php
/**
 * Default controller class. Show the main page.
 * 
 */
class Add_Controller {
  public function main(array $parameters) {
    $view = new Add_View();
    $view->render();
  }
}

