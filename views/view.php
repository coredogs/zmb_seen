<?php
/**
 * Base class for views.
 */
abstract class View {
  abstract function render();
  protected function use_template($template_name, array $data = NULL) {
    global $app_file_root;
    $path = $app_file_root . '/views/templates/' . $template_name . '.php';
    if (file_exists($path)) {
      //Make array keys into variable names, to make it easier  
      //to write templates.
      extract($data);
      //Get file.
      include_once($path);
    }
    else  {
      //File does not exist!
      die("File for template '$template_name' not found.");    
    }
  }
}