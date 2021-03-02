<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}

function IsChecked($chkname,$value)
{
    if(!empty($_POST[$chkname]))
    {
        foreach($_POST[$chkname] as $chkval)
        {
            if($chkval == $value)
            {
                return true;
            }
        }
    }
    return false;
}


if(isset($_GET["action"]))  
{
     if($_GET["action"] == "delete")  
     {  
        DB::query('DELETE FROM messages WHERE _to=:id',array(':id'=>$_GET["id"]));
        DB::query('DELETE FROM admins WHERE id=:id',array(':id'=>$_GET["id"]));
        echo '<script>alert("Admin Removed")</script>';
        echo '<script>window.location="view-admins.php"</script>';
     }  
}


if(isset($_GET["us"]))  
{
    $user_id = $_GET["us"];
    $user_info = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id))[0];

}

if(isset($_POST["save"]))  
{
  $job = $_POST['job'];
  $social_state = $_POST['social_state'];
  $education_level = $_POST['education_level'];
  $financial_status = $_POST['financial_status'];
  $annual_income = $_POST['annual_income'];
  $ready_to_move = $_POST['ready_to_move'];
  $searching_relation = $_POST['searching_relation'];
  $desire_children = $_POST['desire_children'];
  $has_children = $_POST['has_children'];
  $accom_arrange = $_POST['accom_arrange'];
  $level_religiosity = $_POST['level_religiosity'];
  $sect = $_POST['sect'];
  $preserving_halal = $_POST['preserving_halal'];
  $maintaining_prayer = $_POST['maintaining_prayer'];
  $physique = $_POST['physique'];
  $skin_tone = $_POST['skin_tone'];
  $hair_color = $_POST['hair_color'];
  $eye_color = $_POST['eye_color'];
  $beard = $_POST['beard'];
  $belong_tribe = 1;
  $smoking = $_POST['smoking'];;

      DB::query('UPDATE user_info SET job=:job,social_state=:social_state,education_level=:education_level,financial_status=:financial_status,annual_income=:annual_income,ready_to_move=:ready_to_move,searching_relation=:searching_relation,belong_tribe=:belong_tribe,desire_children=:desire_children,has_children=:has_children,accom_arrange=:accom_arrange,smoking=:smoking,level_religiosity=:level_religiosity,sect=:sect,preserving_halal=:preserving_halal,maintaining_prayer=:maintaining_prayer,physique=:physique,skin_tone=:skin_tone,hair_color=:hair_color,eye_color=:eye_color,beard=:beard WHERE user_id=:user_id',
      array(
          ':job'=>$job,
          ':social_state'=>$social_state,
          ':education_level'=>$education_level,
          ':financial_status'=>$financial_status,
          ':annual_income'=>$annual_income,
          ':ready_to_move'=>$ready_to_move,
          ':searching_relation'=>$searching_relation,
          ':belong_tribe'=>$belong_tribe,
          ':desire_children'=>$desire_children,
          ':has_children'=>$has_children,
          ':accom_arrange'=>$accom_arrange,
          ':smoking'=>$smoking,
          ':level_religiosity'=>$level_religiosity,
          ':sect'=>$sect,
          ':preserving_halal'=>$preserving_halal,
          ':maintaining_prayer'=>$maintaining_prayer,
          ':physique'=>$physique,
          ':skin_tone'=>$skin_tone,
          ':hair_color'=>$hair_color,
          ':eye_color'=>$eye_color,
          ':beard'=>$beard,
            ':user_id'=>$user_id));

            $username = $_POST['username'];
            $phoneEmail = $_POST['phoneEmail'];

            DB::query('UPDATE users SET username=:username,phoneEmail=:phoneEmail WHERE id=:id',
            array(
                ':username'=>$username,
                ':phoneEmail'=>$phoneEmail,
                    ':id'=>$userid));

            echo '<script>alert("Data Saved !")</script>';
            echo '<script>window.location="view-users.php"</script>';

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
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
                    <h3 class="card-title">Edit User</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="card-body register-card-body">
      <form action="edit-user.php?us=<?php echo $user_id; ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phoneEmail" placeholder="Email / Phone Number" value="<?php echo $user_info['phoneEmail']; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user_info['username']; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="beard" id="beard" required>
                <option selected value="<?php echo $user_info_data['beard']?>"> <?php echo $beard?> </option>
                <?php
                $beard = DB::query('SELECT * FROM beard');
                foreach ($beard as $beards)
                {
                    if($beards['id'] != $user_info_data['beard'])
                    {
                ?>
                    <option value="<?php echo $beards['id'];  ?>"><?php echo $beards['beard']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
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
    </div>
                </div>
              <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="view-users.php" class="btn btn-sm btn-secondary float-right">View All Users</a>
                    &nbsp;&nbsp;
                        <button class="btn btn-outline-warning btn-sm" onClick="(function(){window.location='edit-user.php?move=<?php echo $_GET['us']; ?>';return false;})();return false;">Move To Success Stories <i class="fas fa-crown"></i></button>
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
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
