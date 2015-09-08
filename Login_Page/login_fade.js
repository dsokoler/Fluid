//Set the time it takes for the login button to fade in/out 
var fadeLength = 500;
//Hide login button to start
$(document).ready(function() {

  $('#username').keyup(function() {
    //Fade in button when both username and password are entered
    if ($(this).val() !== '' && $('#password').val() !== "") {
      $('#btn-submit').fadeIn(fadeLength);
    }
    //Otherwise we don't need to see it, the login form is incomplete
    else {
      $('#btn-submit').fadeOut(fadeLength);
    }
  });

  $('#password').keyup(function() {
    //Fade in button when both username and password are entered
    if ($(this).val() !== '' && $('#username').val() !== "") {
      $('#btn-submit').fadeIn(fadeLength);
    }
    //Otherwise we don't need to see it, the login form is incomplete
    else {
      $('#btn-submit').fadeOut(fadeLength);
    }
  });

  $('#btn-submit').click(function() {
    alert("testing");
  });
});