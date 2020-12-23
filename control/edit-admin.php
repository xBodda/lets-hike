<?php
// include('includes/head.php');
// if (!Login::isLoggedIn()) 
// {
//   echo '<script>window.location="404.php"</script>';
// }

// if(!$level[2] && !$level[1])
// {
//   echo '<script>window.location="404.php"</script>';
// }

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

if(isset($_GET["ad"]))  
{
    $admin_id = $_GET["ad"];
    $admin_info = DB::query('SELECT * FROM admins WHERE id=:id',array(':id'=>$admin_id));

}

if(isset($_POST["save"]))  
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $admin_id = $_GET["ad"];

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

    DB::query('UPDATE admins SET name=:name,email=:email,level1=:level1,level2=:level2,level3=:level3,level4=:level4,level5=:level5,level6=:level6,level7=:level7,level8=:level8 WHERE id=:id',
    array(':name'=>$name,
            ':email'=>$email,
            ':level1'=>$level[1],
            ':level2'=>$level[2],
            ':level3'=>$level[3],
            ':level4'=>$level[4],
            ':level5'=>$level[5],
            ':level6'=>$level[6],
            ':level7'=>$level[7],
            ':level8'=>$level[8],
            ':id'=>$admin_id));

            echo '<script>alert("Data Saved")</script>';
            echo '<script>window.location="view-admins.php"</script>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zowjain | View Admins</title>
  <link href="./../layout/png/favicon.png" rel="shortcut icon" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1>Edit Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Admin</li>
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
                    <h3 class="card-title">Edit Admin</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="card-body register-card-body">
        <?php
        foreach($admin_info as $adi)
        {
        
        ?>
      <form action="edit-admin.php?ad=<?php echo $adi['id']; ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name" value="<?php echo $adi['name']; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $adi['email']; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="level[]" value="level1" <?php if($adi['level1'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms">
              All Privileges
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms2" name="level[]" value="level2" <?php if($adi['level2'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms2">
              Mange Admins Accounts
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms3" name="level[]" value="level3" <?php if($adi['level3'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms3">
              Mange Users Accounts
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms4" name="level[]" value="level4" <?php if($adi['level4'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms4">
              Review New Users
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms5" name="level[]" value="level5" <?php if($adi['level5'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms5">
              Handle Messages
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms6" name="level[]" value="level6" <?php if($adi['level6'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms6">
              Handle Blog
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms7" name="level[]" value="level7" <?php if($adi['level7'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms7">
              Handle Payments
              </label>
            </div>
        </div>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms8"  name="level[]" value="level8" <?php if($adi['level7'] == 1 ){ echo "checked";}?>>
              <label for="agreeTerms8">
              Handle Complaints
              </label>
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
        <?php } ?>
    </div>
                </div> 
              <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="register.php" class="btn btn-sm btn-secondary float-right">Add New Admin</a>
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
