function elementCreator(balise, baliseClass){
  var element = document.createElement(balise);
  //console.log(typeof baliseClass);
  baliseClass.forEach(function (aClass){
    element.classList.add(aClass);
  });
  return element;
}

function formGroup(id, field, inputType, errorText){
  //<div class="form-group">
  var form_group = elementCreator("div", ["form-group"]);
  form_group.id = "form_group_" + field + id;

  //<label class="control-label col-sm-2" for="nameX">Name:</label>
  var label = elementCreator("label", ["control-label", "col-sm-2"]);
  label.for = field + id;
  label.innerHTML = field.charAt(0).toUpperCase() + field.substring(1) + ":";

  //<div class="col-sm-10">
  var divcolsm10 = elementCreator("div", ["col-sm-10"]);

  //<input type="text" class="form-control name" id="nameX" placeholder="Enter name" name="nameX">
  var input = elementCreator("input", ["form-control", field]);
  input.type = inputType;
  input.id = field + id;
  input.placeholder = "Enter " + field;
  input.name = field + id;

  //<small class="help-block">The name must be only with alphabet caracters.</small>
  var errorDisplay = elementCreator("small", ["help-block"]);
  errorDisplay.innerHTML = errorText;

  //Add the label to the form_group
  form_group.appendChild(label);

  //Add the input to the divcolsm10
  divcolsm10.appendChild(input);
  //Add the error display to the divcolsm10
  divcolsm10.appendChild(errorDisplay);

  //Add the divcolsm10 to the form_group
  form_group.appendChild(divcolsm10);

  return form_group;
}

function generateForm(){

  //Get the form to add a new contact form inside
  var form = document.querySelector("form");
  var id = idForms[idForms.length -1] + 1;
  idForms.push(id);
  //IdForms is the array with all the "id" of the groups form. It will be sent with the form to know which group_form
  //we have to save. (Cause to the delete, all the id are offset).
  console.log(idForms);

  //<div class="panel panel-default">
  var panel = elementCreator("div", ["panel", "panel-default"]);
  panel.id = id;

  //---Heading panel---
  //<div class="panel-heading">Add a new contact </div>
  var panel_heading = elementCreator("div", ["panel-heading"]);
  panel_heading.innerHTML = "Add a new contact";

  //<button class="btn btn-danger pull-right btn-xs">Delete</button>
  var buttonDelete = elementCreator("a", ["btn", "btn-danger", "pull-right", "btn-xs"]);
  buttonDelete.innerHTML = "Delete";
  buttonDelete.addEventListener("click", function(){
    //Delete the value in the idForms Value
    idForms.splice(idForms.indexOf(parseInt(this.parentNode.parentNode.id), 0), 1);

    //Delete the formGroup
    form.removeChild(this.parentNode.parentNode);
  });

  //Add the button to the panel_heading
  panel_heading.appendChild(buttonDelete);

  //---Body panel
  //<div class="panel-body">
  var panel_body = elementCreator("div", ["panel-body"]);

  //form_group for the name
  var errorText = "The name must be only with alphabet caracters.";
  var name = formGroup(id, "name", "text", errorText);

  //form_group for the Email
  var errorText = "The email address must to be a valid email adress.";
  var email = formGroup(id, "email", "email", errorText);

  //form_group for the phoneNumber
  var errorText = "The phone number must only contains  10 numbers (no space, no special characters).";
  var phone = formGroup(id, "phone", "phone", errorText);

  //Add the formGroup to the Body
  panel_body.appendChild(name);
  panel_body.appendChild(email);
  panel_body.appendChild(phone);

  //--- Add the header and the body to the panel
  panel.appendChild(panel_heading);
  panel.appendChild(panel_body);

  //---Add the panel to the form
  form.appendChild(panel);

  //--- Undisplay the errors "<small>"
  undisplayError();
}

//We use javascript to undisplay the errors, if the JS is not
//activated on the web browser, the messages will be displayed anyway.
function undisplayError(){
  var errors = document.querySelectorAll('small');
  errors.forEach(function(error){
    error.style.display = "none";
  });
}

//This function is used to check if the field (name, email or phone) matches with the regex given in parameter
function CheckFields(fieldsClass, regex){
  var fields = document.querySelectorAll(fieldsClass);
  var errors = 0;

  fields.forEach(function(field){
    if(!regex.test(field.value)){
      //Add the has-error class to the form-group
      field.parentNode.parentNode.classList.add("has-error");
      //Add display the error message
      field.nextElementSibling.style.display = "block";
      errors ++;
    }
    else {
      field.parentNode.parentNode.classList.remove("has-error");
      //Add hide the error message
      field.nextElementSibling.style.display = "none";
    }
  });
  return errors;
}

//This function call the CheckFields function for each fields (name, email, phone). We set the regex too.
function validation(){
  //Check all the names
  var errors = 0;
  var nameRegex = /^[a-zA-Z]{2,}$/;
  errors =+ CheckFields(".name", nameRegex);

  //Check all the Email
  var emailRegex = /^[0-9a-zA-Z._-]{3,}@{1}[0-9a-zA-Z._-]{3,}\.[a-zA-Z]{2,4}$/;
  errors =+ CheckFields(".email", emailRegex);

  //Check all the phone
  var phoneRegex = /^[0-9]{10}$/;
  errors =+ CheckFields(".phone", phoneRegex);

  return errors;
}

function register(){
  var errors = validation();
  if(errors == 0){
    document.getElementById('arrayContact').value = JSON.stringify(idForms);
    document.querySelector("form").submit();
  }
}
