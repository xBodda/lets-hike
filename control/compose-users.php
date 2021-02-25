<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}

$isGetTo = false;
if (isset($_GET['to'])) {
  $to = $_GET['to'];
  $toname = DB::query('SELECT fullname FROM user_info WHERE user_id=:id AND type=1', array(':id' => $to))[0]['fullname'];
  $tooEmail = DB::query('SELECT phoneEmail FROM users WHERE id=:id', array(':id' => $to))[0]['phoneEmail'];
  $isGetTo = true;
}

if (isset($_POST['send'])) {
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $to = $_POST['to'];
  $date = date('Y-m-d H:i:s');

  DB::query(
    'INSERT INTO messages VALUES(\'\',:_from,:_to,:subject,:message,:_date)',
    array(
      ':_from' => $userid,
      ':_to' => $to,
      ':subject' => $subject,
      ':message' => $message,
      ':_date' => $date
    )
  );


  echo '<script>alert("Message Sent")</script>';
  echo '<script>window.location="compose.php"</script>';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | Compose Message</title>
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
              <h1>Compose</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Compose</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <a href="mailbox.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Folders</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item active">
                      <a href="#" class="nav-link">
                        <i class="fas fa-inbox"></i> Inbox
                        <span class="badge bg-primary float-right"><?php echo $total_messages; ?></span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-envelope"></i> Sent
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Compose New Message</h3>
                </div>
                <!-- /.card-header -->
                <form action="compose.php" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <!-- <input class="form-control" name="to" placeholder="To:"> -->
                      <select name="to" id="to" class="form-control">
                        <?php
                        if ($isGetTo) {
                        ?>
                          <option value="<?php echo $to; ?>"><?php echo $toname; ?> &nbsp; ( <?php echo $tooEmail; ?> ) </option>
                        <?php
                        } else {

                        ?>
                          <option disabled selected value="">-- Select The Reciever --</option>
                          <?php
                          $alladmins = DB::query('SELECT * FROM users');
                          foreach ($alladmins as $ad) {
                            $toemail = DB::query('SELECT email FROM users WHERE id=:id', array(':id' => $ad['user_id']))[0]['phoneEmail'];
                          ?>
                            <option value="<?php echo $ad['user_id'] ?>"><?php echo $ad['fullname']; ?>&nbsp; ( <?php echo $toemail; ?> )</option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="subject" placeholder="Subject:">
                    </div>
                    <div class="form-group">
                      <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                      </textarea>
                    </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div class="float-right">
                      <button type="submit" name="send" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                    </div>
                    <a href="mailbox.php"><button type="button" class="btn btn-default"><i class="fas fa-times"></i> Discard</button></a>
                  </div>
                </form>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>

            <!-- /.col -->
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
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>
</body>

</html>