<?php

/**
 * Open a MySQL database.
 * 
 * Uses variables set in config.php:
 * $db_name
 * $db_username
 * $db_password
 * $db_host (usually localhost)
 * 
 * @return PDO Connection to a database,
 */
function db_open() {
  global $app_file_root;
  require_once $app_file_root . '/library/config.php';
  $dsn = "mysql:host=$db_host;dbname=$db_name";
  $db_connection = new PDO($dsn, $db_username, $db_password);
  return $db_connection;
}

