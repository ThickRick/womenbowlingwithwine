



var $password = $("#password");
var $passwordConfirm = $("#passwordConfirm");
var $email = $("#email");
var $emailConfirm = $("#emailConfirm");
var $emailSuccess = $("#emailValid");
var $passwordSuccess = $("#passwordValid");

$emailSuccess.hide();
$passwordSuccess.hide();


function passwordMatching(){
  return $password.val() !== '' && $passwordConfirm.val() === $password.val();
}

function emailMatching(){
  return $email.val() !== '' && $emailConfirm.val() === $email.val();
}


function passwordConfirm(){
  if (passwordMatching()){
    $passwordSuccess.fadeIn();
  }

  else{
  	$passwordSuccess.fadeOut();
  }
}

function emailConfirm(){
  if (emailMatching()){
    $emailSuccess.fadeIn();
  }
  else{
  	$emailSuccess.fadeOut();
  }
}

$passwordConfirm.focus(passwordConfirm).keyup(passwordConfirm);
$emailConfirm.focus(emailConfirm).keyup(emailConfirm);