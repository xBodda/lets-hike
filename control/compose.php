<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}

if (isset($_GET['user'])) {
  $user_id = $_GET['user'];
  $ticket_id = $_GET['msg'];
  $senderData = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id))[0];
  $ticketData = DB::query('SELECT * FROM tickets WHERE id=:id',array(':id'=>$ticket_id))[0];
}

if (isset($_POST['send'])) 
{
  $message = $_POST['message'];
  $date = date('Y-m-d H:i:s');

  DB::query(
    'INSERT INTO tickets_messages VALUES(\'\',:ticket_id,:message,:user_id,:_date,0)',
    array(
      ':ticket_id' => $ticket_id,
      ':message' => $message,
      ':user_id' => $userid,
      ':_date' => $date
    )
  );

  echo '<script>alert("Message Sent")</script>';
  echo '<script>window.location="mailbox.php"</script>';
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
                      <a href="mailbox.php" class="nav-link">
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
                <form action="compose.php?user=<?php echo $user_id; ?>&msg=<?php echo $ticket_id; ?>" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <!-- <input class="form-control" name="to" placeholder="To:"> -->

                    </div>
                    <div class="form-group">
                      <input class="form-control" name="to" value="To: <?php echo $senderData['fullname'] ?>" disabled>
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