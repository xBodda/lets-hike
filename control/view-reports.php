<?php
include('includes/head.php');
if (!Login::isLoggedIn() && $type == 3) 
{
  echo '<script>window.location="404.php"</script>';
}


if (isset($_GET["action"])) 
{
  if ($_GET["action"] == "delete") 
  {
    DB::query('DELETE FROM message_reports WHERE id=:id', array(':id' => $_GET["id"]));

    echo '<script>alert("Report Removed")</script>';
    echo '<script>window.location="view-reports.php"</script>';
  }
  else if($_GET["action"] == "penalty") 
  {
    $reportDetails = DB::query('SELECT * FROM message_reports WHERE id=:id',array(':id'=>$_GET['id']))[0];
    $date = date('Y-m-d H:i:s');
    DB::query(
		'INSERT INTO penalties VALUES(\'\',:user_id,:_date,:message_id)',
		array(
			':user_id' => $reportDetails['user_id'],
			':_date' => $date,
			':message_id' => $reportDetails['message_id'],
		)
	);
    DB::query('DELETE FROM message_reports WHERE id=:id', array(':id' => $_GET["id"]));

    echo '<script>alert("Penalty Given")</script>';
    echo '<script>window.location="view-reports.php"</script>';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Reports</title>
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
              <h1>View Reports</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Reports</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">All Reports</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <style>
                        td,
                        tr {
                          text-align: center;
                        }
                      </style>
                      <table class="table m-0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Ticket ID</th>
                            <th>Admin</th>
                            <th>Auditor</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $user_info = DB::query('SELECT * FROM message_reports');
                          
                          foreach ($user_info as $ui) {
                              
                            $messageContent = DB::query('SELECT message FROM tickets_messages WHERE id=:id',array(':id'=>$ui['message_id']))[0]['message'];
                            $adminName = DB::query('SELECT fullname FROM users WHERE id=:id',array(':id'=>$ui['user_id']))[0]['fullname'];
                            $auditorName = DB::query('SELECT fullname FROM users WHERE id=:id',array(':id'=>$ui['auditor_id']))[0]['fullname'];
                          ?>
                            <tr>
                              <td><?php echo $ui["id"]; ?></td>
                              <td><?php echo truncate($messageContent,30); ?></td>
                              <td><?php echo $ui['ticket_id'] ?></td>
                              <td><?php echo $adminName; ?></td>
                              <td><?php echo $auditorName; ?></td>
                              <td><?php echo $ui["_date"]; ?></td>
                              <td>
                                <button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='view-reports.php?action=penalty&id=<?php echo $ui['id']; ?>';return false;})();return false;">Give Penalty</button>&nbsp;&nbsp;
                                <button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='view-reports.php?action=delete&id=<?php echo $ui['id']; ?>';return false;})();return false;"><i class="fas fa-trash"></i></button>&nbsp;&nbsp;
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <?php
                      if(!$user_info)
                      {
                          print '<h1 class="text-center m-3">Nothing to be shown</h1>';
                      }
                      ?>
                    </div>
                  </div>
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
    <aside class="control-sidebar control-sidebar-dark">
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