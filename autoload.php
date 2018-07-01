<?php //autoload
function autoloadClasses($classname){
  require 'class/' . $classname . '.class.php';
}
spl_autoload_register('autoloadClasses');

$fileManager = new fileManager("data.txt");
?>
