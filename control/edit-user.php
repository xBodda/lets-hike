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

if(isset($_GET["move"]))  
{
  $story_id = $_GET['move'];
  if(!DB::query('SELECT user_id FROM story WHERE user_id=:user_id',array(':user_id'=>$story_id)))
  {
    DB::query('INSERT INTO story VALUES(\'\',:user_id,:_date)',array(':user_id'=>$story_id,':_date'=>$date));
    DB::query('UPDATE deactivated set status = 0 WHERE isUser = 1 AND item_id=:item_id',array(':item_id'=>$story_id));
    echo '<script>alert("User Added")</script>';
    echo '<script>window.location="view-users.php"</script>';
  }
  else
  {
    echo '<script>alert("Already Added")</script>';
    echo '<script>window.location="view-users.php"</script>';
  }

}

if(isset($_GET["us"]))  
{
    $user_id = $_GET["us"];
    $user_info = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id))[0];
    $user_info_data = DB::query('SELECT * FROM user_info WHERE user_id=:user_id',array(':user_id'=>$user_id))[0];

    $country = DB::query('SELECT name FROM country WHERE id=:id',array(':id'=>$user_info['country']))[0]['name'];
    $gender = DB::query('SELECT gender FROM gender WHERE id=:id',array(':id'=>$user_info['gender']))[0]['gender'];
    $job = DB::query('SELECT job FROM job WHERE id=:id',array(':id'=>$user_info_data['job']))[0]['job'];
    $social_state = DB::query('SELECT social_state FROM social_state WHERE id=:id',array(':id'=>$user_info_data['social_state']))[0]['social_state'];
    $education_level = DB::query('SELECT education_level FROM education_level WHERE id=:id',array(':id'=>$user_info_data['education_level']))[0]['education_level'];
    $financial_status = DB::query('SELECT financial_status FROM financial_status WHERE id=:id',array(':id'=>$user_info_data['financial_status']))[0]['financial_status'];
    $annual_income = DB::query('SELECT annual_income FROM annual_income WHERE id=:id',array(':id'=>$user_info_data['annual_income']))[0]['annual_income'];
    $ready_to_move = DB::query('SELECT ready_to_move FROM ready_to_move WHERE id=:id',array(':id'=>$user_info_data['ready_to_move']))[0]['ready_to_move'];
    $searching_relation = DB::query('SELECT searching_relation FROM searching_relation WHERE id=:id',array(':id'=>$user_info_data['searching_relation']))[0]['searching_relation'];
    $belong_tribe = DB::query('SELECT belong_tribe FROM belong_tribe WHERE id=:id',array(':id'=>$user_info_data['belong_tribe']))[0]['belong_tribe'];
    $desire_children = DB::query('SELECT desire_children FROM desire_children WHERE id=:id',array(':id'=>$user_info_data['desire_children']))[0]['desire_children'];
    $has_children = DB::query('SELECT has_children FROM has_children WHERE id=:id',array(':id'=>$user_info_data['has_children']))[0]['has_children'];
    $accom_arrange = DB::query('SELECT accom_arrange FROM accom_arrange WHERE id=:id',array(':id'=>$user_info_data['accom_arrange']))[0]['accom_arrange'];
    $smoking = DB::query('SELECT smoking FROM smoking WHERE id=:id',array(':id'=>$user_info_data['smoking']))[0]['smoking'];
    $level_religiosity = DB::query('SELECT level_religiosity FROM level_religiosity WHERE id=:id',array(':id'=>$user_info_data['level_religiosity']))[0]['level_religiosity'];
    $sect = DB::query('SELECT sect FROM sect WHERE id=:id',array(':id'=>$user_info_data['sect']))[0]['sect'];
    $preserving_halal = DB::query('SELECT preserving_halal FROM preserving_halal WHERE id=:id',array(':id'=>$user_info_data['preserving_halal']))[0]['preserving_halal'];
    $maintaining_prayer = DB::query('SELECT maintaining_prayer FROM maintaining_prayer WHERE id=:id',array(':id'=>$user_info_data['maintaining_prayer']))[0]['maintaining_prayer'];
    $physique = DB::query('SELECT physique FROM physique WHERE id=:id',array(':id'=>$user_info_data['physique']))[0]['physique'];
    $skin_tone = DB::query('SELECT skin_tone FROM skin_tone WHERE id=:id',array(':id'=>$user_info_data['skin_tone']))[0]['skin_tone'];
    $hair_color = DB::query('SELECT hair_color FROM hair_color WHERE id=:id',array(':id'=>$user_info_data['hair_color']))[0]['hair_color'];
    $eye_color = DB::query('SELECT eye_color FROM eye_color WHERE id=:id',array(':id'=>$user_info_data['eye_color']))[0]['eye_color'];
    $beard = DB::query('SELECT beard FROM beard WHERE id=:id',array(':id'=>$user_info_data['beard']))[0]['beard'];
    $special_needs = DB::query('SELECT special_needs FROM special_needs WHERE id=:id',array(':id'=>$user_info_data['special_needs']))[0]['special_needs'];

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

if(isset($_GET["activate"]))  
{
  $faq_status = DB::query('SELECT status FROM deactivated WHERE isAdmin=1 AND item_id=:item_id',array(':item_id'=>$_GET['activate']))[0]['status'];
  if($faq_status == 0)
  {
    DB::query('UPDATE deactivated SET status = 1 WHERE isAdmin=1 AND item_id=:item_id',array(':item_id'=>$_GET['activate']));
    echo '<script>alert("Activated ")</script>';
  }
  else
  {
    echo '<script>alert("Already Activated")</script>';
  }
}
elseif(isset($_GET["deactivate"]))
{
  $faq_status = DB::query('SELECT status FROM deactivated WHERE isAdmin=1 AND item_id=:item_id',array(':item_id'=>$_GET['deactivate']))[0]['status'];
  if($faq_status == 1)
  {
    DB::query('UPDATE deactivated SET status = 0 WHERE isAdmin=1 AND item_id=:item_id',array(':item_id'=>$_GET['deactivate']));
    echo '<script>alert("Deactivated ")</script>';
  }
  else
  {
    echo '<script>alert("Already Activated")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hikingify | View Admins</title>
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
        <select class="form-control" name="job" id="job" required>
                <option selected value="<?php echo $user_info_data['job']?>"> <?php echo $job?> </option>
                <?php
                $job = DB::query('SELECT * FROM job');
                foreach ($job as $jobs)
                {
                    if($jobs['id'] != $user_info_data['job'])
                    {
                ?>
                    <option value="<?php echo $jobs['id'];  ?>"><?php echo $jobs['job']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user-md"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <select class="form-control" name="social_state" id="social_state" required>
                <option selected value="<?php echo $user_info_data['social_state']?>"> <?php echo $social_state?> </option>
                <?php
                $social_state = DB::query('SELECT * FROM social_state');
                foreach ($social_state as $social_states)
                {
                    if($social_states['id'] != $user_info_data['social_state'])
                    {
                ?>
                    <option value="<?php echo $social_states['id'];  ?>"><?php echo $social_states['social_state']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="education_level" id="education_level" required>
                <option selected value="<?php echo $user_info_data['education_level']?>"> <?php echo $education_level?> </option>
                <?php
                $education_level = DB::query('SELECT * FROM education_level');
                foreach ($education_level as $education_levels)
                {
                    if($education_levels['id'] != $user_info_data['education_level'])
                    {
                ?>
                    <option value="<?php echo $education_levels['id'];  ?>"><?php echo $education_levels['education_level']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="financial_status" id="financial_status" required>
                <option selected value="<?php echo $user_info_data['financial_status']?>"> <?php echo $financial_status?> </option>
                <?php
                $financial_status = DB::query('SELECT * FROM financial_status');
                foreach ($financial_status as $financial_statuss)
                {
                    if($financial_statuss['id'] != $user_info_data['financial_status'])
                    {
                ?>
                    <option value="<?php echo $financial_statuss['id'];  ?>"><?php echo $financial_statuss['financial_status']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="annual_income" id="annual_income" required>
                <option selected value="<?php echo $user_info_data['annual_income']?>"> <?php echo $annual_income?> </option>
                <?php
                $annual_income = DB::query('SELECT * FROM annual_income');
                foreach ($annual_income as $annual_incomes)
                {
                    if($annual_incomes['id'] != $user_info_data['annual_income'])
                    {
                ?>
                    <option value="<?php echo $annual_incomes['id'];  ?>"><?php echo $annual_incomes['annual_income']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="ready_to_move" id="ready_to_move" required>
                <option selected value="<?php echo $user_info_data['ready_to_move']?>"> <?php echo $ready_to_move?> </option>
                <?php
                $ready_to_move = DB::query('SELECT * FROM ready_to_move');
                foreach ($ready_to_move as $ready_to_moves)
                {
                    if($ready_to_moves['id'] != $user_info_data['ready_to_move'])
                    {
                ?>
                    <option value="<?php echo $ready_to_moves['id'];  ?>"><?php echo $ready_to_moves['ready_to_move']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="searching_relation" id="searching_relation" required>
                <option selected value="<?php echo $user_info_data['searching_relation']?>"> <?php echo $searching_relation?> </option>
                <?php
                $searching_relation = DB::query('SELECT * FROM searching_relation');
                foreach ($searching_relation as $searching_relations)
                {
                    if($searching_relations['id'] != $user_info_data['searching_relation'])
                    {
                ?>
                    <option value="<?php echo $searching_relations['id'];  ?>"><?php echo $searching_relations['searching_relation']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="belong_tribe" id="belong_tribe" required>
                <option selected value="<?php echo $user_info_data['belong_tribe']?>"> <?php echo $belong_tribe?> </option>
                <?php
                $belong_tribe = DB::query('SELECT * FROM belong_tribe');
                foreach ($belong_tribe as $belong_tribes)
                {
                    if($belong_tribes['id'] != $user_info_data['belong_tribe'])
                    {
                ?>
                    <option value="<?php echo $belong_tribes['id'];  ?>"><?php echo $belong_tribes['belong_tribe']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="desire_children" id="desire_children" required>
                <option selected value="<?php echo $user_info_data['desire_children']?>"> <?php echo $desire_children?> </option>
                <?php
                $desire_children = DB::query('SELECT * FROM desire_children');
                foreach ($desire_children as $desire_childrens)
                {
                    if($desire_childrens['id'] != $user_info_data['desire_children'])
                    {
                ?>
                    <option value="<?php echo $desire_childrens['id'];  ?>"><?php echo $desire_childrens['desire_children']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="has_children" id="has_children" required>
                <option selected value="<?php echo $user_info_data['has_children']?>"> <?php echo $has_children?> </option>
                <?php
                $has_children = DB::query('SELECT * FROM has_children');
                foreach ($has_children as $has_childrens)
                {
                    if($has_childrens['id'] != $user_info_data['has_children'])
                    {
                ?>
                    <option value="<?php echo $has_childrens['id'];  ?>"><?php echo $has_childrens['has_children']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="accom_arrange" id="accom_arrange" required>
                <option selected value="<?php echo $user_info_data['accom_arrange']?>"> <?php echo $accom_arrange?> </option>
                <?php
                $accom_arrange = DB::query('SELECT * FROM accom_arrange');
                foreach ($accom_arrange as $accom_arranges)
                {
                    if($accom_arranges['id'] != $user_info_data['accom_arrange'])
                    {
                ?>
                    <option value="<?php echo $accom_arranges['id'];  ?>"><?php echo $accom_arranges['accom_arrange']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="smoking" id="smoking" required>
                <option selected value="<?php echo $user_info_data['smoking']?>"> <?php echo $smoking?> </option>
                <?php
                $smoking = DB::query('SELECT * FROM smoking');
                foreach ($smoking as $smokings)
                {
                    if($smokings['id'] != $user_info_data['smoking'])
                    {
                ?>
                    <option value="<?php echo $smokings['id'];  ?>"><?php echo $smokings['smoking']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="level_religiosity" id="level_religiosity" required>
                <option selected value="<?php echo $user_info_data['level_religiosity']?>"> <?php echo $level_religiosity?> </option>
                <?php
                $level_religiosity = DB::query('SELECT * FROM level_religiosity');
                foreach ($level_religiosity as $level_religiositys)
                {
                    if($level_religiositys['id'] != $user_info_data['level_religiosity'])
                    {
                ?>
                    <option value="<?php echo $level_religiositys['id'];  ?>"><?php echo $level_religiositys['level_religiosity']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="sect" id="sect" required>
                <option selected value="<?php echo $user_info_data['sect']?>"> <?php echo $sect?> </option>
                <?php
                $sect = DB::query('SELECT * FROM sect');
                foreach ($sect as $sects)
                {
                    if($sects['id'] != $user_info_data['sect'])
                    {
                ?>
                    <option value="<?php echo $sects['id'];  ?>"><?php echo $sects['sect']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="preserving_halal" id="preserving_halal" required>
                <option selected value="<?php echo $user_info_data['preserving_halal']?>"> <?php echo $preserving_halal?> </option>
                <?php
                $preserving_halal = DB::query('SELECT * FROM preserving_halal');
                foreach ($preserving_halal as $preserving_halals)
                {
                    if($preserving_halals['id'] != $user_info_data['preserving_halal'])
                    {
                ?>
                    <option value="<?php echo $preserving_halals['id'];  ?>"><?php echo $preserving_halals['preserving_halal']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="maintaining_prayer" id="maintaining_prayer" required>
                <option selected value="<?php echo $user_info_data['maintaining_prayer']?>"> <?php echo $maintaining_prayer?> </option>
                <?php
                $maintaining_prayer = DB::query('SELECT * FROM maintaining_prayer');
                foreach ($maintaining_prayer as $maintaining_prayers)
                {
                    if($maintaining_prayers['id'] != $user_info_data['maintaining_prayer'])
                    {
                ?>
                    <option value="<?php echo $maintaining_prayers['id'];  ?>"><?php echo $maintaining_prayers['maintaining_prayer']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="physique" id="physique" required>
                <option selected value="<?php echo $user_info_data['physique']?>"> <?php echo $physique?> </option>
                <?php
                $physique = DB::query('SELECT * FROM physique');
                foreach ($physique as $physiques)
                {
                    if($physiques['id'] != $user_info_data['physique'])
                    {
                ?>
                    <option value="<?php echo $physiques['id'];  ?>"><?php echo $physiques['physique']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="skin_tone" id="skin_tone" required>
                <option selected value="<?php echo $user_info_data['skin_tone']?>"> <?php echo $skin_tone?> </option>
                <?php
                $skin_tone = DB::query('SELECT * FROM skin_tone');
                foreach ($skin_tone as $skin_tones)
                {
                    if($skin_tones['id'] != $user_info_data['skin_tone'])
                    {
                ?>
                    <option value="<?php echo $skin_tones['id'];  ?>"><?php echo $skin_tones['skin_tone']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="hair_color" id="hair_color" required>
                <option selected value="<?php echo $user_info_data['hair_color']?>"> <?php echo $hair_color?> </option>
                <?php
                $hair_color = DB::query('SELECT * FROM hair_color');
                foreach ($hair_color as $hair_colors)
                {
                    if($hair_colors['id'] != $user_info_data['hair_color'])
                    {
                ?>
                    <option value="<?php echo $hair_colors['id'];  ?>"><?php echo $hair_colors['hair_color']; ?></option>

                <?php } }?>
            </select>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <select class="form-control" name="eye_color" id="eye_color" required>
                <option selected value="<?php echo $user_info_data['eye_color']?>"> <?php echo $eye_color?> </option>
                <?php
                $eye_color = DB::query('SELECT * FROM eye_color');
                foreach ($eye_color as $eye_colors)
                {
                    if($eye_colors['id'] != $user_info_data['eye_color'])
                    {
                ?>
                    <option value="<?php echo $eye_colors['id'];  ?>"><?php echo $eye_colors['eye_color']; ?></option>

                <?php } }?>
            </select>
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
