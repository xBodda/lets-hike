<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}


if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    DB::query('DELETE FROM tickets_messages WHERE ticket_id=:id', array(':id' => $_GET["id"]));
    DB::query('DELETE FROM tickets WHERE id=:id', array(':id' => $_GET["id"]));

    echo '<script>alert("Ticket Removed")</script>';
    echo '<script>window.location="view-tickets.php"</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Tickets</title>
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
              <h1>View Tickets</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Tickets</li>
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
                    <h3 class="card-title">All Tickets</h3>
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
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $user_info = DB::query('SELECT * FROM tickets');
                          foreach ($user_info as $ui) {
                            if ($ui['status'] == 0) {
                              $ticketStatus = "In Review";
                            } else if ($ui['status'] == 1) {
                              $ticketStatus = "Solved";
                            }
                          ?>
                            <tr>
                              <td><?php echo $ui["id"]; ?></td>
                              <td><?php echo $ui["fullname"]; ?></td>
                              <td><a href="view-conversations.php?ticket=<?php echo $ui['id']; ?>"><?php echo truncate($ui["subject"], 30); ?></a></td>
                              <td><?php echo $ui["type"]; ?></td>
                              <td><?php echo $ui["_date"]; ?></td>
                              <?php
                              if ($ui["status"] == 0) {
                                print "<td><span class='badge badge-info'>Processing</span></td>";
                              } elseif ($ui["status"] == 1) {
                                print "<td><span class='badge badge-success'>Solved</span></td>";
                              }
                              ?>
                              <td>
                                <button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='view-tickets.php?action=delete&id=<?php echo $ui['id']; ?>';return false;})();return false;"><i class="fas fa-trash"></i></button>&nbsp;&nbsp;
                                <!-- <button class="btn btn-outline-success btn-sm"><i class="fas fa-comment"></i></button> -->
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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