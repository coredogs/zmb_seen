<?php
/**
 * Controller for saving a new sighting.
 * 
 */
class Save_Controller {
  public function main(array $parameters) {
    //Get params passed in URL.
    $number_zombies = $parameters['number_zombies'];
    $where = $parameters['where'];
    //Save to database.
    $sighting = new Sighting_Model($number_zombies, $where);
    $sighting->save();
    //View - thank user.
    $view = new Save_View();
    $view->render();
  }
}

