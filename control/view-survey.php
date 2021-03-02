<?php
include('includes/head.php');
if (!Login::isLoggedIn() || $type !=2) {
  echo '<script>window.location="404.php"</script>';
}

if (!isset($_GET['id'])) {
  die('Bad Request');
}
$survey = DB::query("SELECT * FROM survey WHERE id=:id", array(':id' => $_GET['id']));
if (!$survey) {
  die('Not found');
}

$survey = $survey[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Survey Results</title>
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
              <h1 title="<?php echo $survey['name']; ?>"><?php echo truncate($survey['name'], 70); ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Survey</li>
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

                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <style>
                        td,
                        tr {
                          text-align: center;
                        }
                      </style>

                      <?php
                      $survey_questions = DB::query('SELECT q.* FROM survey_questions q  WHERE q.survey_id=:id ', array(':id' => $_GET['id']));
                      foreach ($survey_questions as $question) {
                        $options = DB::query('SELECT * FROM survey_options WHERE question_id=:question_id', array(':question_id' => $question['id']));
                      ?>
                        <div class="card-header border-transparent">
                          <h3 class="card-title" title="<?php echo $question['name']; ?>">Question: <?php echo truncate($question['name'], 50); ?></h3>
                        </div>
                        <table class="table m-0">
                          <thead>
                            <tr>
                              <?php
                              foreach ($options as $option) {
                              ?>
                                <th title="<?php echo $option['name']; ?>"><?php echo truncate($option['name'], 50); ?></th>
                              <?php
                              }
                              ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($options as $option) {
                              $get_answers = DB::query('SELECT COUNT(a.id)/COUNT(a.option_id)*100 as cnt FROM survey_options o LEFT JOIN survey_answers a on a.option_id=o.id WHERE o.id=:id',array(':id'=>$option['id']));
                                $get_answers=$get_answers[0];
                            ?>
                              <td><?php echo round($get_answers['cnt'])."%"; ?></td>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      <?php } ?>
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