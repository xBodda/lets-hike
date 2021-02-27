<?php
include('includes/head.php');

if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}

if (isset($_GET["ad"])) {
  $admin_id = $_GET["ad"];
  $admin_info = DB::query('SELECT * FROM users WHERE id=:id', array(':id' => $admin_id));
}

if (isset($_POST["save"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $admin_id = $_GET["ad"];

  DB::query(
    'UPDATE users SET name=:name,email=:email WHERE id=:id',
    array(
      ':name' => $name,
      ':email' => $email,
      ':id' => $admin_id
    )
  );

  echo '<script>alert("Data Saved")</script>';
  echo '<script>window.location="view-admins.php"</script>';
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
    <?php include("includes/navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/aside.php") ?>

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
                      foreach ($admin_info as $adi) {

                      ?>
                        <form action="edit-admin.php?ad=<?php echo $adi['id']; ?>" method="post">
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Full name" value="<?php echo $adi['fullname']; ?>">
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>