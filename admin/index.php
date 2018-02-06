<?php

require_once('../resources/library/functions.php');

$user = isset($_POST['user']) ? $_POST['user'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$remember = isset($_POST['remember']) ? $_POST['remember'] : false;
$error = false;

function logIn($user, $password, $remember){
  $loggedIn = validateLogInBackOffice($user, $password, $remember);

  if ($loggedIn){
    header("Location:/admin/dashboard/");
    exit;
  } else{
    return true;
  }
}


if (isset($_COOKIE['username_login']) && isset($_COOKIE['password_login'])){
  $error = logIn($_COOKIE['username_login'], $_COOKIE['password_login'], true);
}

if ($_POST){
  $error = logIn($user, $password, $remember);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Log In</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="../assets/css/login.css" rel="stylesheet">

  </head>
  <body>

    <div class="login container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                  <h4>Admin - Business</h4>

                  <?php if ($error){?>
                    <div class="alert alert-danger" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Error:</span>
                      Error password or username
                    </div>
                  <?php } ?>
                  <form action="/admin/" method="post">
                  <input type="text" id="userName" class="form-control input-sm chat-input" name="username" value="<?php echo $username ?>" placeholder="Username" />
                  </br>
                  <input type="password" id="userPassword" class="form-control input-sm chat-input" name="contrasena" value="<?php echo $password ?>" placeholder="Password" />
                  </br>
                  <input type="checkbox" name="remember"/> Remember
                  </br>
                  <div class="wrapper">
                  <span class="group-btn">
                    <button type="submit" class="btn btn-primary btn-md">Log In</button>
                  </span>
                  </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
