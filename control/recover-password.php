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

$tokenIsValid = False;
if (Login::isLoggedIn())
{

    if (isset($_POST['change']))
    {
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['password'];
            $newpasswordrepeat = $_POST['repassword'];
            $userid = Login::isLoggedIn();

            if (password_verify($oldpassword, DB::query('SELECT password FROM admins WHERE id=:userid', array(':userid'=>$userid))[0]['password']))
            {

                    if ($newpassword == $newpasswordrepeat)
                    {

                            if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60)
                            {

                                DB::query('UPDATE admins SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                echo '<script>alert("Password Changed")</script>';
                                echo '<script>window.location="index.php"</script>';
                            }

                    } else {
                        echo '<script>alert("Passwords Is Not Same ")</script>';
                    }

            } else {
                echo '<script>alert(" Wrong Current Password")</script>';
            }

    }

} else {
        if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (DB::query('SELECT user_id FROM password_a_tokens WHERE token=:token', array(':token'=>sha1($token)))) {
                $userid = DB::query('SELECT user_id FROM password_a_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                $tokenIsValid = True;
                if (isset($_POST['change'])) 
                {

                        $newpassword = $_POST['password'];
                        $newpasswordrepeat = $_POST['repassword'];

                                if ($newpassword == $newpasswordrepeat) 
                                {

                                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) 
                                        {

                                                DB::query('UPDATE admins SET password=:newpassword WHERE user_id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                                echo '<script>alert("Password Changed")</script>';
                                                echo '<script>window.location="index.php"</script>';
                                                DB::query('DELETE FROM password_a_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                        }

                                } else {
                                        echo 'Passwords don\'t match!';
                                }

                        }


        } else {
                die('Token invalid');
        }
} else {
        die('Not logged in');
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zowjain | Recover Password</title>
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
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="<?php if (!$tokenIsValid) { echo 'recover-password.php'; } else { echo 'recover-password.php?token='.$token.''; } ?>" method="post">
      <?php if (!$tokenIsValid) { echo '
                <div class="input-group mb-3">
                <input type="password" name="oldpassword" class="form-control" placeholder="Current Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
        '; } ?>
        
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="repassword" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="change" class="btn btn-primary btn-block">Change password</button>
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
