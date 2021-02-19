<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingfy | View Complaints</title>
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
            <h1>View Complaints</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Complaints</li>
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
                    <h3 class="card-title">All Complaints</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <style>
                        td,tr {
                            text-align: center;
                        }
                        </style>
                    <table class="table m-0">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $user_info = DB::query('SELECT * FROM contact');
                        foreach ($user_info as $ui) {
                        ?>
                        <tr>
                        <td><?php echo $ui["id"];?></td>
                        <td><?php echo $ui["name"];?></td>
                        <td><?php echo $ui["email"];?></td>
                        <td><?php echo truncate($ui["subject"], 20);?></td>
                        <td><?php echo truncate($ui["message"], 30);?></td>
                        <td><?php echo $ui["_date"];?></td>
                        <td><button class="btn  btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>&nbsp;&nbsp;<button class="btn btn-outline-success btn-sm"><i class="fas fa-comment"></i></button></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
              <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Delete All</a>
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
