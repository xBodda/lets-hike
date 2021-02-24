<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}

if(isset($_GET["us"]))  
{
    $group_id = $_GET["us"];
    $group_info = DB::query('SELECT * FROM hikes WHERE id=:id',array(':id'=>$group_id))[0];
}

if(isset($_POST["save"]))  
{
  $name = $_POST['name'];
  $location = $_POST['location'];
  $overview = $_POST['overview'];
  $route = $_POST['route'];
  $safety = $_POST['safety'];
  $howtobook = $_POST['howtobook'];
  $price = $_POST['price'];

  if(strlen($name) >= 3 && strlen($name) < 128)
	{
		if(strlen($location) >= 3 && strlen($location) < 128)
		{
			if(strlen($overview) >= 3 && strlen($overview) < 1000)
			{
				if(strlen($route) >= 3 && strlen($route) < 1000)
				{
					if(strlen($safety) >= 3 && strlen($safety) < 1000)
					{
						if(strlen($howtobook) >= 3 && strlen($howtobook) < 1000)
						{
							if(strlen($price) >= 1 && strlen($price) <= 5)
							{
								DB::query('UPDATE hikes SET name=:name,location=:location,overview=:overview,route=:route,safety=:safety,howtobook=:howtobook,price=:price WHERE id=:id',
								array(
									':name'=>$name,
									':location'=>$location,
									':overview'=>$overview,
									':route'=>$route,
									':safety'=>$safety,
									':howtobook'=>$howtobook,
									':price'=>$price,
										':id'=>$_GET['us']));

										echo '<script>alert("Group Updated !")</script>';
										echo '<script>window.location="view-groups.php"</script>';
							}
							else
							{
								echo '<script>alert("Price Length Out Of Bond")</script>';
							}
						}
						else
						{
							echo '<script>alert("How To Book Length Out Of Bond")</script>';
						}
					}
					else
					{
						echo '<script>alert("Safety Length Out Of Bond")</script>';
					}
				}
				else
				{
					echo '<script>alert("Route Length Out Of Bond")</script>';
				}
			}
			else
			{
				echo '<script>alert("Overview Length Out Of Bond")</script>';
			}
		}
		else
		{
			echo '<script>alert("Location Length Out Of Bond")</script>';
		}
	}
	else
	{
		echo '<script>alert("Name Length Out Of Bond")</script>';
	}

      

}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hikingify | Edit Group</title>
		<link href="./../layout/png/favicon.png" rel="shortcut icon" type="image/png">
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/adminlte.min.css"> </head>

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
										<h1>Edit Groups</h1> </div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
											<li class="breadcrumb-item"><a href="index.php">Home</a></li>
											<li class="breadcrumb-item active">Edit Group</li>
										</ol>
									</div>
								</div>
							</div>
							<!-- /.container-fluid -->
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
													<h3 class="card-title">Edit Group</h3> </div>
												<!-- /.card-header -->
												<div class="card-body p-0">
													<div class="card-body register-card-body">
														<form action="edit-group.php?us=<?php echo $group_id; ?>" method="post">
															<div class="input-group mb-3">
																<input type="text" class="form-control" name="name" placeholder="Name .." value="<?php echo $group_info['name']; ?>">
																<div class="input-group-append">
																	<div class="input-group-text"> <span class="fas fa-signature"></span> </div>
																</div>
															</div>
															<div class="input-group mb-3">
																<input type="text" class="form-control" name="location" placeholder="Location .." value="<?php echo $group_info['location']; ?>">
																<div class="input-group-append">
																	<div class="input-group-text"> <span class="fas fa-map-marker-alt"></span> </div>
																</div>
															</div>
															<div class="form-group mb-3">
																<label for="">Overview</label>
																<textarea name="overview" class="form-control" cols="30" rows="5" placeholder="Write An Overview"><?php echo $group_info['overview'] ?></textarea>
															</div>
															<div class="form-group mb-3">
																<label for="">Route</label>
																<textarea name="route" class="form-control" cols="30" rows="5" placeholder="Write About The Route"><?php echo $group_info['route'] ?></textarea>
															</div>
															<div class="form-group mb-3">
																<label for="">Safety</label>
																<textarea name="safety" class="form-control" cols="30" rows="5" placeholder="Write About The Safety"><?php echo $group_info['safety'] ?></textarea>
															</div>
															<div class="form-group mb-3">
																<label for="">How To Book</label>
																<textarea name="howtobook" class="form-control" cols="30" rows="5" placeholder="How To Book ?"><?php echo $group_info['howtobook'] ?></textarea>
															</div>
															<div class="input-group mb-3">
																<input type="text" class="form-control" name="price" placeholder="Price Per Day .." value="<?php echo $group_info['price']; ?>">
																<div class="input-group-append">
																	<div class="input-group-text"> <span class="fas fa-dollar-sign"></span> </div>
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
												<div class="card-footer clearfix"> <a href="view-groups.php" class="btn btn-sm btn-secondary float-right">View All Groups</a> </div>
												<!-- /.card-footer -->
											</div>
										</div>
									</div>
									<!--/.col (right) -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.container-fluid -->
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