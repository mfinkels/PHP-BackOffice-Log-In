<?php

function validateLogInBackOffice($user, $password, $remember) {

  if($user == 'admin' && $password == 'admin1234'){
    session_start();
    $_SESSION['login'] = true;

    if($remember){
      $time = time()+31556926;
      setcookie('user_login', $user, $time);
      setcookie('password_login', $password, $time);
    }
    return true;
  }
  return false;
}
