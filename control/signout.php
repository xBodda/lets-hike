<?php
include('includes/head.php');
if (Login::isLoggedIn()) 
{
    $userid = Login::isLoggedIn();
} 
else 
{
    die('Not logged in!');
}

if (isset($_POST['submit'])) 
{

    if (isset($_POST['alldevices'])) 
    {

        DB::query('DELETE FROM admin_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
        echo '<script>alert("Signed Out !")</script>';  
        echo '<script>window.location="index.php"</script>';

    } 
    else 
    {
        if (isset($_COOKIE['ADMN'])) 
        {
            DB::query('DELETE FROM admin_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['ADMN'])));
            echo '<script>alert("Signed Out !")</script>';  
            echo '<script>window.location="index.php"</script>';
        }
            setcookie('ADMN', '1', time()-3600);
            setcookie('ADMN_', '1', time()-3600);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zowjain | Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.php"><b>Zowjain</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Are you sure you want to signout ?</p>

      <form action="signout.php" method="post">
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="alldevices">
              <label for="remember">
                All Devices
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Out</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
