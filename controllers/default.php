<?php
/**
 * Default controller class. Show the main page.
 * 
 */
class Default_Controller {
  public function main(array $parameters) {
    global $app_file_root;
    //Load DB utility code.
    require_once $app_file_root . '/library/db.php';
    //Open a connection to the DB.
    $db_conn = db_open();
    //Number of sightings.
    $sql = 'SELECT COUNT(*) AS C FROM sightings';
    $query_result = $db_conn->query($sql);
    $sightings = (int)$query_result->fetchColumn();
    //Number of zombies, total.
    $sql = 'SELECT SUM(zombie_count) AS S FROM sightings';
    $query_result = $db_conn->query($sql);
    $total_zombies = (int)$query_result->fetchColumn();
    //Pass data to the view for the home page.
    $view = new Default_View();
    $view->render($sightings, $total_zombies);
  }
}

