<?php

require_once './config.php';

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
  global $db_host, $db_name, $db_username, $db_password;
  $dsn = "mysql:host=$db_host;dbname=$db_name";
  $db_connection = new PDO($dsn, $db_username, $db_password);
  return $db_connection;
}

