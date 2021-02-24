<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
  echo '<script>window.location="404.php"</script>';
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    DB::query('DELETE FROM verification_image WHERE user_id=:id', array(':id' => $_GET["id"]));
    DB::query('DELETE FROM user_info WHERE user_id=:id', array(':id' => $_GET["id"]));
    DB::query('DELETE FROM likes WHERE user_id=:id OR liker_id=:id', array(':id' => $_GET["id"]));
    DB::query('DELETE FROM users WHERE id=:id', array(':id' => $_GET["id"]));

    echo '<script>alert("User Removed")</script>';
    echo '<script>window.location="view-users.php"</script>';
  }
}

// Get data for filters
$min_price = $_GET['min-price'] ?? 0;
$max_price = $_GET['max-price'] ?? 99999;
$min_date = $_GET[ 'min-date'] ?? DB::query('SELECT ordered_date FROM orders ORDER BY ordered_date ASC LIMIT 1')[0]['ordered_date'];
$min_date = date('Y-m-d',strtotime($min_date));
$max_date = $_GET['max-date'] ?? DB::query('SELECT ordered_date FROM orders ORDER BY ordered_date DESC LIMIT 1')[0]['ordered_date'];
$max_date = date( 'Y-m-d', strtotime($max_date));
$min_persons = $_GET['min-persons'] ?? 1;
$max_persons = $_GET['max-persons'] ?? 99;

if($max_date < $min_date){
  $max_date = $min_date;
}
if ($max_price < $min_price) {
  $max_price = $min_price;
}
if ($max_persons < $min_persons) {
  $max_persons = $min_persons;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Users</title>
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
              <h1>View Orders</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Orders</li>
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
                    <h3 class="card-title">All Orders</h3>
                    <br>
                    <br>
                    <h3 class="card-title text-muted">Filters</h3>
                    <br>
                    <form>
                      <label class="control-label col-sm-3 text-left" for="pwd">Min Price:</label>
                      <div class="col-sm-3">
                        <input type="number" required value="<?php echo $min_price?>" class="form-control" placeholder="Min Price" name="min-price">
                      </div>
                      <label class="control-label col-sm-3" for="pwd">Max Price:</label>
                      <div class="col-sm-3">
                        <input type="number" required value="<?php echo $max_price?>" class="form-control" placeholder="Max Price" name="max-price">
                      </div>
                      <label class="control-label col-sm-3" for="pwd">Date Start:</label>
                      <div class="col-sm-3">
                        <input type="date" required value="<?php echo $min_date?>" class="form-control" placeholder="Min date" name="min-date">
                      </div>
                      <label class="control-label col-sm-3" for="pwd">Date End:</label>
                      <div class="col-sm-3">
                        <input type="date" required value="<?php echo $max_date?>" class="form-control" placeholder="Max date" name="max-date">
                      </div>
                      <label class="control-label col-sm-3" for="pwd">Persons Min:</label>
                      <div class="col-sm-3">
                        <input type="number" required value="<?php echo $min_persons?>" class="form-control" placeholder="Min persons" name="min-persons">
                      </div>
                      <label class="control-label col-sm-3" for="pwd">Persons Max:</label>
                      <div class="col-sm-3">
                        <input type="number" required value="<?php echo $max_persons?>" class="form-control" placeholder="Max persons" name="max-persons">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" required  class="btn btn-primary col-sm-12 mt-2">Filter</button>
                      </div>
                    </form>
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
                            <th>Order ID</th>
                            <th>Hike Name</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Order Time</th>
                            <th>Persons</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $max_date = date('Y-m-d', strtotime('+1 day', strtotime($max_date)));
                          $orders = DB::query(
                            'SELECT o.*,r.id as order_id,h.name,r.ordered_date,u.fullname 
                          FROM order_items o,hikes h, orders r,users u 
                          WHERE o.order_id=r.id AND h.id=o.hike_id AND u.id=r.user_id AND
                                o.persons >= :min_persons AND
                                o.persons <=:max_persons AND
                                o.price >= :min_price AND
                                o.price <= :max_price AND
                                r.ordered_date >= :min_date AND
                                r.ordered_date < :max_date',
                          array(
                              ':min_persons'=>$min_persons,
                              ':max_persons'=>$max_persons,
                              ':min_date'=>$min_date,
                              ':max_date'=>$max_date,
                              ':min_price'=>$min_price,
                              ':max_price'=>$max_price,
                          ));
                          foreach ($orders as $order) {
                          ?>
                            <tr>
                              <td><?php echo $order["id"]; ?></td>
                              <td><?php echo $order["order_id"]; ?></td>
                              <td title="<?php echo $order["name"]; ?>"><?php echo truncate($order["name"], 17); ?></td>
                              <td title="<?php echo $order["fullname"]; ?>"><?php echo truncate($order["fullname"], 15); ?></td>
                              <td><?php echo $order["price"]; ?></td>
                              <td><?php echo date('Y-m-d', strtotime($order["start_date"])); ?></td>
                              <td><?php echo date('Y-m-d', strtotime($order["end_date"])); ?></td>
                              <td><?php echo date('Y-m-d h:i A', strtotime($order["ordered_date"])); ?></td>
                              <td><?php echo $order["persons"]; ?></td>
                              <td>
                                <button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='view-users.php?action=delete&id=<?php echo $ui["id"]; ?>';return false;})();return false;"><i class="fas fa-trash"></i></button>
                                &nbsp;&nbsp;
                                <button class="btn btn-outline-success btn-sm" onClick="(function(){window.location='compose-users.php?to=<?php echo $ui['id']; ?>';return false;})();return false;"><i class="fas fa-comment"></i></button>
                                &nbsp;&nbsp;
                                <button class="btn btn-outline-primary btn-sm" onClick="(function(){window.location='edit-user.php?us=<?php echo $ui['id']; ?>';return false;})();return false;"><i class="fas fa-cog"></i></button>
                                &nbsp;&nbsp;
                                <button id="dect" class="btn btn-outline-danger btn-sm" onClick="(function(){window.location='view-users.php?deactivate=<?php echo $ui['id']; ?>';return false;})();return false;">Deactivate</button>
                                &nbsp;&nbsp;
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Users</a>
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