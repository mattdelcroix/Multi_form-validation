<?php
  $subtitleJumbotron = "Adding contacts into the file.";
  ob_start();

  //Class Autoloader
  require 'autoload.php';

  if(isset($_POST["arrayContact"]) && !empty($_POST["arrayContact"])){
    $arrayContact = json_decode($_POST["arrayContact"]);
    //Foreach form sent from the previous page.
    foreach($arrayContact as $value){

      if(!empty($_POST["name" . $value]) && !empty($_POST["email" . $value]) && !empty($_POST["phone" . $value])){
        $contact = new Contact($_POST["name" . $value], $_POST["email" . $value], $_POST["phone" . $value]);
        if($contact->isValid()) {
          $fileManager->write($contact);
          //Display success info
          $panel_type = "panel panel-success";
          $panel_title = "Success";
          $panel_content = "The contact " . $contact->name() . " is inserted into the file.";
        }
        else {
          $panel_type = "panel panel-danger";
          $panel_title = "Error form ! ";
          //If the contact is not valid (regex check), we check for each fields
          $panel_content = "<ul>";
          if(!$contact->validName()) $panel_content .= "<li>The name is not correctly setted, it must contains only alphabet : " . $contact->name() . "</li>";
          if(!$contact->validEmail()) $panel_content .= "<li>The email is not correctly setted, it must be a valid mail : " . $contact->email() . "</li>";
          if(!$contact->validPhone()) $panel_content .= "<li>The phone is not correctly setted, it must contains 10 numbers : " . $contact->phone() . "</li>";
          $panel_content .= "</ul>This form is not inserted into the file.";
        }
      } else { //if a field is empty
        $panel_type = "panel panel-danger";
        $panel_title = "Error form ! ";
        //If the contact is not valid (regex check), we check for each fields
        $panel_content = "<ul>";
        if(empty($_POST["name" . $value])) $panel_content .= "<li>The name is empty.</li>";
        if(empty($_POST["email" . $value])) $panel_content .= "<li>The email is empty.</li>";
        if(empty($_POST["phone" . $value])) $panel_content .= "<li>The phone is empty.</li>";
        $panel_content .= "</ul>This form is not inserted into the file.";
    }
    //call the view to display the info panel.
    require 'vues/panel.php';
  }
} else {
    $panel_type = "panel panel-danger";
    $panel_title = "Error";
    $panel_content = "Error, please try again.";

      require 'vues/panel.html';
  }
  $content = ob_get_contents();
  ob_end_clean();
  require('vues/template.php');
 ?>
