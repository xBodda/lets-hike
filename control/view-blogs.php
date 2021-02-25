<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}

if (isset($_POST['submit'])) {
  $url = $_POST['url'];
  $subject = $_POST['subject'];
  $topic = $_POST['topic'];
  $date = date('Y-m-d H:i:s');

  DB::query(
    'INSERT INTO blogs VALUES(\'\',:subject,:url,:topic,:_date)',
    array(':subject' => $subject, ':url' => $url, ':topic' => $topic, ':_date' => $date)
  );

  $faq_id = DB::query('SELECT id FROM blogs ORDER BY id DESC LIMIT 1')[0]['id'];

  DB::query('INSERT INTO deactivated VALUES(\'\',:item_id,1,0,0,0,1,:_date)', array(':item_id' => $faq_id, ':_date' => $date));

  echo '<script>alert("Blog Added")</script>';
}

if (isset($_GET["activate"])) {
  $faq_status = DB::query('SELECT status FROM deactivated WHERE isBlog=1 AND item_id=:item_id', array(':item_id' => $_GET['activate']))[0]['status'];
  if ($faq_status == 0) {
    DB::query('UPDATE deactivated SET status = 1 WHERE isBlog=1 AND item_id=:item_id', array(':item_id' => $_GET['activate']));
    echo '<script>alert("Activated ")</script>';
  } else {
    echo '<script>alert("Already Activated")</script>';
  }
} elseif (isset($_GET["deactivate"])) {
  $faq_status = DB::query('SELECT status FROM deactivated WHERE isBlog=1 AND item_id=:item_id', array(':item_id' => $_GET['deactivate']))[0]['status'];
  if ($faq_status == 1) {
    DB::query('UPDATE deactivated SET status = 0 WHERE isBlog=1 AND item_id=:item_id', array(':item_id' => $_GET['deactivate']));
    echo '<script>alert("Deactivated ")</script>';
  } else {
    echo '<script>alert("Already Activated")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Blogs</title>
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
              <h1>Edit Blogs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
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
            <div class="col-md-8" style="margin: 0 auto;">
              <!-- general form elements disabled -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Blogs</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="POST" action="view-blogs.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Video URL </label>
                          <input type="text" name="url" class="form-control" placeholder="Enter The Youtube Video URL ..">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Subject </label>
                          <input type="text" name="subject" class="form-control" placeholder="Enter The Topic Subject ..">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Topic</label>
                          <textarea name="topic" class="form-control" id="compose-textarea" cols="30" rows="10" placeholder="Write The Answer Here"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <!-- text input -->

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group" id="container">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    </div>

                    <div class="row">
                      <button type="submit" name="submit" class="btn btn-block btn-outline-primary btn-sm">Add Blog</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- general form elements disabled -->
              <!-- /.card -->
            </div>
            <!--/.col (right) -->
          </div>

          <div class="row">
            <div class="col-md-8" style="margin: 0 auto;">
              <div class="card card-danger">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Blogs Settings</h3>

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
                          <th>ID</th>
                          <th>Subject</th>
                          <th>URL</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <style>
                        abbr[title],
                        acronym[title] {
                          border-bottom: none;
                          text-decoration: none;
                        }
                      </style>
                      <tbody>
                        <?php
                        $faq_data = DB::query('SELECT * FROM blogs');
                        foreach ($faq_data as $fd) {
                          $faq_status = DB::query('SELECT status FROM deactivated WHERE isBlog=1 AND item_id=:item_id', array(':item_id' => $fd['id']));
                        ?>
                          <tr>
                            <td><?php echo $fd['id'] ?></td>
                            <td><abbr title="<?php echo $fd['subject']; ?>"><?php echo truncate($fd['subject'], 35); ?></abbr></td>
                            <td><abbr title="<?php echo $fd['url']; ?>"><?php echo truncate($fd['url'], 35); ?></abbr></td>
                            <td>
                              <button id="dect" class="btn btn-outline-danger btn-sm" onClick="(function(){window.location='view-blogs.php?deactivate=<?php echo $fd['id']; ?>';return false;})();return false;">Deactivate</button>
                              &nbsp;&nbsp;
                              <button id="act" class="btn btn-outline-success btn-sm" onClick="(function(){window.location='view-blogs.php?activate=<?php echo $fd['id']; ?>';return false;})();return false;">Activate</button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
            </div>
          </div>
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
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <script>
    $(function() {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>
</body>

</html>