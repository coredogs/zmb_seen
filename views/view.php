<?php
/**
 * Base class for views.
 */
abstract class View {
  //View must implement their own render function.
  abstract function render();
  
  /**
   * Instantiate and output a template.
   * @global string $app_file_root File path to site root.
   * @param string $template_name Name of the template to show.
   * @param array $data Data to show in the template.
   */
  protected function output_template($template_name, array $data = array()) {
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
  
  /**
   * Instantiate a template, and return the results.
   * @param string $template_name Name of the template to show.
   * @param array $data  Data to show in the template.
   * @return string HTML.
   */
  protected function instantiate_template($template_name, array $data = array()) {
    //Use PHP's output buffer to capture what the output_template method does.
    ob_start();
    $this->output_template($template_name, $data);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
  
}