<?php
include('includes/head.php');

if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}

function IsChecked($chkname,$value)
{
    if(!empty($_POST[$chkname]))
    {
        foreach($_POST[$chkname] as $chkval)
        {
            if($chkval == $value)
            {
                return true;
            }
        }
    }
    return false;
}

if ( isset( $_POST['submit'] ) )
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];

  for($i=1;$i <= 8;$i++)
  {
    if(IsChecked('level','level'.$i))
    {
      $level[$i] = 1;
    }
    else
    {
      $level[$i] = 0;
    }
  }


  if (!DB::query('SELECT email FROM admins WHERE email=:email', array(':email'=>$email)))
  {
      if (strlen($name) >= 3 && strlen($name) <= 30)
      {
          if (strlen($password) >= 8 && strlen($password) <= 60)
          {
              if (filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                  if($password == $repassword)
                  {
                      DB::query('INSERT INTO admins VALUES(\'\',:name,:email,:password,:level1,:level2,:level3,:level4,:level5,:level6,:level7,:level8)',
                      array(':name'=>$name,
                            ':email'=>$email,
                            ':password'=>password_hash($password, PASSWORD_BCRYPT),
                            ':level1'=>$level[1],
                            ':level2'=>$level[2],
                            ':level3'=>$level[3],
                            ':level4'=>$level[4],
                            ':level5'=>$level[5],
                            ':level6'=>$level[6],
                            ':level7'=>$level[7],
                            ':level8'=>$level[8]));
                      
                      $date = date('Y-m-d H:i:s');
                      $admnid = DB::query('SELECT id FROM admins ORDER BY id DESC LIMIT 1')[0]['id'];

                      DB::query('INSERT INTO deactivated VALUES(\'\',:item_id,1,0,1,0,0,:_date)',array(':item_id'=>$admnid,':_date'=>$date));
                      echo '<script>alert("تم انشاء الحساب بنجاح")</script>';
                      echo '<script>window.location="index.php"</script>';
                  }
                  else
                  {
                      echo '<script>alert("الباسورد غير مطابق  !")</script>';
                  }
              }
              else
              {
                  echo '<script>alert("خطأ في البريد الالكتروني!")</script>';
              }
          }
          else
          {
              echo '<script>alert("خطأ في كلمة المرور!")</script>';
          }
      }
      else
      {
          echo '<script>alert(" خطأ في الاسم او يحتوي علي حروف غير مقبولة !")</script>';
      }
  }
  else
  {
      echo '<script>alert("مسجل بالفعل!")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zowjain | Registration Page</title>
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
    <a href="index2.php"><b>Zowjain</b></a>
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
              <input type="checkbox" id="agreeTerms" name="level[]" value="level1" checked>
              <label for="agreeTerms">
              All Privileges
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms2" name="level[]" value="level2">
              <label for="agreeTerms2">
              Mange Admins Accounts
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms3" name="level[]" value="level3">
              <label for="agreeTerms3">
              Mange Users Accounts
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms4" name="level[]" value="level4">
              <label for="agreeTerms4">
              Review New Users
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms5" name="level[]" value="level5">
              <label for="agreeTerms5">
              Handle Messages
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms6" name="level[]" value="level6">
              <label for="agreeTerms6">
              Handle Blog
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms7" name="level[]" value="level7">
              <label for="agreeTerms7">
              Handle Payments
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms8"  name="level[]" value="level8">
              <label for="agreeTerms8">
              Handle Complaints
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
