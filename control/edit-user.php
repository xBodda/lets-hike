<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}


if(isset($_GET["action"]))  
{
     if($_GET["action"] == "delete")  
     {  
        DB::query('DELETE FROM messages WHERE _to=:id',array(':id'=>$_GET["id"]));
        DB::query('DELETE FROM admins WHERE id=:id',array(':id'=>$_GET["id"]));
        echo '<script>alert("Admin Removed")</script>';
        echo '<script>window.location="view-admins.php"</script>';
     }  
}


if(isset($_GET["us"]))  
{
    $user_id = $_GET["us"];
    $user_info = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id))[0];

}

if(isset($_POST["save"]))  
{
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];

  DB::query('UPDATE users SET fullname=:fullname,email=:email,gender=:gender,phonenumber=:phonenumber WHERE id=:user_id',
  array(
      ':fullname'=>$fullname,
      ':email'=>$email,
      ':gender'=>$gender,
      ':phonenumber'=>$phone,
        ':user_id'=>$user_id));

        echo '<script>alert("Data Saved !")</script>';
        echo '<script>window.location="view-users.php"</script>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Admins</title>
  <?php
  include('includes/links.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include ("includes/navbar.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include ("includes/aside.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10" style="margin: 0 auto;">
            <!-- general form elements disabled -->
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Edit User</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="card-body register-card-body">
      <form action="edit-user.php?us=<?php echo $user_id; ?>" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Fullname" value="<?php echo $user_info['fullname']; ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-signature"></span>
                  </div>
                </div>
              </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $user_info['email']; ?>" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

        <div class="input-group mb-3">
        <select class="form-control" name="gender" id="gender" required>
                <?php 
                  $genderUser = DB::query('SELECT name FROM gender WHERE id=:id',array(':id'=>$user_info['gender']))[0]['name']
                ?>
                <option selected value="<?php echo $user_info['gender']?>"> <?php echo $genderUser?> </option>
                <?php
                $genders = DB::query('SELECT * FROM gender');
                foreach ($genders as $gend)
                {
                    if($gend['id'] != $user_info['gender'])
                    {
                ?>
                    <option value="<?php echo $gend['id'];  ?>"><?php echo $gend['name']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
              <input type="text" class="form-control" name="phone" placeholder="Phonenumber" value="<?php echo $user_info['phonenumber']; ?>" required>
              <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
                </div>
              <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="view-users.php" class="btn btn-sm btn-secondary float-right">View All Users</a>
                </div>
              <!-- /.card-footer -->
            </div>
              </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
