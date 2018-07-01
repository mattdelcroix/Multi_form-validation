var addcontact = document.getElementById('addcontact');
addcontact.addEventListener('click', generateForm);

var validate = document.getElementById('validate');
validate.addEventListener('click', validation);

var save = document.getElementById('save');
save.addEventListener('click', function(e){
  e.preventDefault();
  register();
});
