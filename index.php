<?php
//Initialisation of the index page
$subtitleJumbotron = "Create or remove contacts";
ob_start();
?>
<form class="form-horizontal" action="action_page.php" method="POST">
  <!-- buttons to check and submit -->
  <div class="container" id="gestionButton">
    <div class="row" style="text-align:center;">
      <div class="col-sm-4">
        <a href="#" class="btn btn-default btn-lg active" id="addcontact">Add Contact</a>
      </div>
      <div class="col-sm-4">
        <a href="#" class="btn btn-default btn-lg active" id="validate">Validate</a>
      </div>
      <div class="col-sm-4">
        <input type="submit" class="btn btn-info btn-lg active" id="save" value="Submit"/>
      </div>
    </div>
  </div>

  <input type="hidden" id="arrayContact" name="arrayContact" value="[1]" />
  <div class="panel panel-default" id="1">
    <div class="panel-heading">Add a new contact</div>
    <div class="panel-body">
  <div class="form-group" id="form_group_name1">
    <label class="control-label col-sm-2" for="name1">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control name" id="name1" placeholder="Enter name" name="name1">
      <small class="help-block" style="display:none;">The name must be only with alphabet caracters.</small>
    </div>
  </div>
    <div class="form-group"  id="form_group_email1">
      <label class="control-label col-sm-2" for="email1">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control email" id="email1" placeholder="Enter email" name="email1">
        <small class="help-block" style="display:none;">The email address must to be a valid email adress.</small>
      </div>
    </div>
    <div class="form-group"  id="form_group_phone1">
      <label class="control-label col-sm-2" for="phone1">Phone:</label>
      <div class="col-sm-10">
        <input type="phone" class="form-control phone" id="phone1" placeholder="Enter phone number" name="phone1">
        <small class="help-block" style="display:none;">The phone number must only contains 10 numbers (no space, no special characters).</small>
      </div>
    </div>
    </div>
  </div>
  <!--<input type="submit" class="btn btn-primary btn-lg active" value="Submit" />-->
  </form>
<?php
$content = ob_get_contents();
ob_end_clean();

require 'vues/template.php';
?>
