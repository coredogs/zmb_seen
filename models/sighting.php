<?php

class Sighting_Model {
  protected $count;
  protected $where;
  public function __construct($count = 0, $where = '') {
    $this->set_count($count);
    $this->set_where($where);
  }
  public function set_count($count) {
    $this->count = $count;
  }
  public function get_count() {
    return $this->count;
  }
  public function set_where($where) {
    $this->where = $where;
  }
  public function get_where() {
    return $this->where;
  }
  
  public function save() {
    global $app_file_root;
    //Load DB utility code.
    require_once $app_file_root . '/library/db.php';
    //Open a connection to the DB.
    $db_conn = db_open();
    //Number of sightings.
    $sql = 'INSERT INTO sightings (zombie_count, where_seen) '
        . '        VALUES (:zombie_count,:where_seen)';
    $preped_query = $db_conn->prepare($sql);
    $preped_query->execute(
        array(':zombie_count' => $this->count,
              ':where_seen' => $this->where)
    );
    $view = new Save_View();
    $view->render();
  }
}
