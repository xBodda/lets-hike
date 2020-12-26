<?php
include('includes/head.php');

// if (!Login::isLoggedIn()) 
// {
//   echo '<script>window.location="404.php"</script>';
// }

if ( isset( $_POST['submit'] ) )
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $level = $_POST['level'];


  if (!DB::query('SELECT email FROM admins WHERE email=:email', array(':email'=>$email)))
  {
      if (strlen($name) >= 3 && strlen($name) <= 64)
      {
          if (strlen($password) >= 8 && strlen($password) <= 60)
          {
              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                  if($password == $repassword)
                  {
                      DB::query('INSERT INTO admins VALUES(\'\',:name,:email,:password,:level)',
                      array(':name'=>$name,
                            ':email'=>$email,
                            ':password'=>password_hash($password, PASSWORD_BCRYPT),
                            ':level'=>$level));

                      echo '<script>alert("Admin Created")</script>';
                      echo '<script>window.location="index.php"</script>';
                  }
                  else
                  {
                      echo '<script>alert("Password Don\'t Match  !")</script>';
                  }
              }
              else
              {
                  echo '<script>alert("Error In Email!")</script>';
              }
          }
          else
          {
              echo '<script>alert("Error In Password!")</script>';
          }
      }
      else
      {
          echo '<script>alert(" Error In Name !")</script>';
      }
  }
  else
  {
      echo '<script>alert("Already Registerd!")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingfy | Registration Page</title>
  <link href="./../layout/png/favicon.png" rel="shortcut icon" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.php"><b>Hikingfy</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="col-8">
            <div class="icheck-primary">
              <input type="radio" id="agreeTerms" name="level" value="1" checked>
              <label for="agreeTerms">
              Administrator
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="radio" id="agreeTerms2" name="level" value="2">
              <label for="agreeTerms2">
              Auditor
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="radio" id="agreeTerms3" name="level" value="3">
              <label for="agreeTerms3">
              HR partner
              </label>
            </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
