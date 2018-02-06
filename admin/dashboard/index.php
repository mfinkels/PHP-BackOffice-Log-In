<?php
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

if(!$_SESSION['login']){
  header("Location: /ezflow/administracion/");
  exit;
} else {

  echo 'Log In to dashboard';

}



