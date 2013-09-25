<?php
/*
This program is a router for a Web app created using the MVC pattern. 
The router parses URLs, and sends data to the appropriate controllers.
Adapted from http://johnsquibb.com/tutorials/mvc-framework-in-1-hour-part-one

Standards:
1. ALL calls to the Web app must go through this router.
2. URLs must match a standard format.
3. Your code files must be put in standard directories, so that the router 
   (this program) can find them.
4. Your code files must have standard names that match URL components.

URL sample: http://xxx.com/myapp/?fetch&id=42
This calls the fetch controller, passing it an id of 42.
 
The controller must be a class called Fetch_Controller, in a file called 
fetch.php, in the controllers directory.

This router will call the method main of the controller, and pass it 
parameters from the URL.
 
If no parameters are supplied (e.g., http://xxx.com), a controller called
default will run.

There are some sample files showing usage:

controllers/show.php - show some data.
controllers/default.php - a default controller.
models/zombie.php - model for zombies.
views/zombie.php - view for showing zombie data.
views/templates/one_zombie.php - template views/zombie.php uses to show data.

Sample url: http://xxx.com/?show&id=44&name=Dan+Lawrence
 
Calls the show controller, passes id of 44, and name of Dan Lawrence. 

*/

//Register a function to find classes that PHP can't find by itself.
spl_autoload_register('load_class');

//Fetch the request, from the URL.
$request = $_SERVER['QUERY_STRING'];
if ( $request == '' ) {
  //No parameters. Use the default controller.
  $controller_name = 'default';
  $parameters = array();
}
else {
  //Parse the page request and other variables
  $parsed = explode('&' , $request);
  //The controller name is the first element.
  $controller_name = filter_var(urldecode(array_shift($parsed)), FILTER_SANITIZE_STRING);
  //The rest of the array are get statements, parse them out.
  $parameters = array();
  foreach ($parsed as $argument) {
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = explode('=' , $argument);
    $parameters[$variable] = filter_var(urldecode($value), FILTER_SANITIZE_STRING);
  }
} //End parameters in URL.
//Compute the path to the controller file
$target = $app_file_root . '/controllers/' . $controller_name . '.php';
if (file_exists($target)) {
  include_once($target);
  //Compute the class name, using naming convention.
  $class = ucfirst($controller_name) . '_Controller';
  //Instantiate the appropriate class
  if (class_exists($class)) {
    $controller = new $class;
  }
  else {
    //Did we name our class correctly?
    die("Class for controller '$controller_name' does not exist!");
  }
}
else {
  //Can't find the file in 'controllers'! 
  die("Controller '$controller_name' does not exist!");
}

//Once we have the controller instantiated, execute the main() method,
//passing parameters from the URL.
$controller->main($parameters);

/**
 * So, you tell PHP to instantiate the class Foo ($f = new Foo;). PHP tries, 
 * but can't find it. PHP calls your function, if you defined
 * it. You can add code that tried to find the class for PHP.
 * 
 * @param string $class_name The name of the class to load.
 */
function load_class($class_name) {
  global $app_file_root;
  //The View class has a standard name and location.
  if ( $class_name == 'View' ) {
    include_once $app_file_root . '/views/view.php';
    return;
  }
  //Compute the file and directory the class should be in, based on 
  //the class's name.
  list($file, $type) = explode('_', $class_name);
  $file = lcfirst($file);
  $dir = lcfirst($type) . 's';
  //Make a path from the file name.
  $path = $app_file_root . '/' . $dir . '/' . strtolower($file) . '.php';
  //Fetch file.
  if (file_exists($path)) {
    //Get file.
    include_once($path);        
  }
  else  {
    //File does not exist!
    die("File '$file' containing class '$className' not found.");    
  }
}
