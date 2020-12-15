<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}
if ( isset( $_POST['approve'] ) )
{
    $user_id = $_GET['user'];
    DB::query('UPDATE verification_image SET verified = 1 WHERE user_id=:user_id',array(':user_id'=>$user_id));
    DB::query('DELETE FROM pending_approval WHERE user_id=:user_id',array(':user_id'=>$user_id));
    echo '<script>window.location="pending-approval.php"</script>';
}

if ( isset($_GET['user']))
{
  $approved_user_id = $_GET['user'];
  $approve_info = DB::query('SELECT * FROM pending_approval WHERE id=:id',array(':id'=>$approved_user_id))[0]; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zowjain | Approve User</title>
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
            <h1>Approve User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Approve User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">User Info</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="edit-faq.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label> Fullname </label>
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname " value="<?php echo $approve_info['fullname']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID Number </label>
                        <input type="text" name="idnum" class="form-control" placeholder="ID Number" value="<?php echo $approve_info['id_number']; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <script>
                    function check()
                    {
                      var number = "<?php echo $approve_info['father_number']?>";
                      var fathernum = document.getElementById("fathernum");
                      fathernum.value = number;
                    }
                  </script>
                  <?php
                    if($approve_info['father_number']  != 0)
                    {
                      print '<div class="row">
                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label> Father Number </label>
                          <input type="text" name="fathernum" id="fathernum" class="form-control" placeholder="Father Number .." value="01158999135" disabled>
                        </div>
                      </div>
                    </div>';
                    echo '<script>var x = false;
                    check();
                    </script>';
                    }
                  ?>


                  <div class="row">
                    <div class="col-sm-3">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" id="container">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <button type="submit" name="approve" class="btn btn-block btn-outline-success btn-sm">Approve</button>
                  </div>
                  <br>
                  <hr>
                  <div class="row">
                    <button type="button" name="reject" class="btn btn-block btn-danger btn-sm">Reject</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-6" >
                <div class="card card-danger">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">User Uploaded Image</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <a href="./../layout/jpeg/<?php echo $approve_info['image']; ?>" target="_blank"><img src="./../layout/jpeg/<?php echo $approve_info['image']; ?>" class="col-md-12" alt=""></a>
                            
                        </div>

                    </div>
                </div>
            </div>
          <!--/.col (right) -->
        </div>

        <div class="row">

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
