<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
	echo '<script>window.location="404.php"</script>';
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$location = $_POST['location'];
	$overview = $_POST['overview'];
	$route = $_POST['route'];
	$safety = $_POST['safety'];
	$howtobook = $_POST['howtobook'];
	$price = $_POST['price'];
	$images = $_POST['images'];

	if (strlen($name) >= 3 && strlen($name) < 128) {
			if (strlen($overview) >= 3 && strlen($overview) < 2000) {
				if (strlen($route) >= 3 && strlen($route) < 2000) {
					if (strlen($safety) >= 3 && strlen($safety) < 2000) {
						if (strlen($howtobook) >= 3 && strlen($howtobook) < 2000) {
							if (strlen($price) >= 1 && strlen($price) <= 5) {
								DB::query(
									'INSERT INTO hikes VALUES(\'\',:name,:location,:overview,:route,:safety,:howtobook,:price)',
									array(':name' => $name, ':location' => $location, ':overview' => $overview, ':route' => $route, ':safety' => $safety, ':howtobook' => $howtobook, ':price' => $price)
								);

								$hike_id = DB::query('SELECT id FROM hikes ORDER BY id DESC LIMIT 1')[0]['id'];

								for ($z = 0; $z < $images; $z++) {
									$filename = rand() . $_FILES['image' . $z]['name'];

									$destination = '../uploads/' . $filename;

									$extension = pathinfo($filename, PATHINFO_EXTENSION);

									$file = $_FILES['image' . $z]['tmp_name'];
									$size = $_FILES['image' . $z]['size'];

									if ($_FILES['image' . $z]['size'] > 1000000) {
										echo '<script>alert("File Too Large")</script>';
									} else {
										if (move_uploaded_file($file, $destination)) {
											DB::query(
												'INSERT INTO hike_images VALUES(\'\',:hike_id,:image)',
												array(':image' => $filename, ':hike_id' => $hike_id)
											);
										} else {
											echo '<script>alert("Failed To Upload Image")</script>';
										}
									}
								}
								echo '<script>alert("Group Added")</script>';
							} else {
								echo '<script>alert("Price Length Out Of Bond")</script>';
							}
						} else {
							echo '<script>alert("How To Book Length Out Of Bond")</script>';
						}
					} else {
						echo '<script>alert("Safety Length Out Of Bond")</script>';
					}
				} else {
					echo '<script>alert("Route Length Out Of Bond")</script>';
				}
			} else {
				echo '<script>alert("Overview Length Out Of Bond")</script>';
			}
	} else {
		echo '<script>alert("Name Length Out Of Bond")</script>';
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		DB::query('DELETE FROM hike_images WHERE hike_id=:hike_id', array(':hike_id' => $_GET["id"]));
		DB::query('DELETE FROM hikes WHERE id=:id', array(':id' => $_GET["id"]));

		echo '<script>alert("Group Removed")</script>';
		echo '<script>window.location="view-groups.php"</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hikingify | View Groups</title>
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
							<h1>Edit Groups</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">View Groups</li>
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
						<!-- left column -->
						<!--/.col (left) -->
						<!-- right column -->
						<div class="col-md-8" style="margin: 0 auto;">
							<!-- general form elements disabled -->
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title">Add Group</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<form method="POST" action="view-groups.php" enctype="multipart/form-data">
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Name </label>
													<input type="text" name="name" class="form-control" placeholder="Enter The Name Of The Group ..">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Location </label>
													<select name="location" class="form-control">
														<?php
															$location = DB::query('SELECT * FROM country');
															foreach($location as $loc){
														?>
														<option value="<?php echo $loc['id']; ?>"><?php echo $loc['name']; ?></option>
														<?php
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Overview</label>
													<textarea name="overview" class="form-control" cols="30" rows="5" placeholder="Write An Overview">The Inca Trail to Machu Picchu is a once in a lifetime experience and an opportunity not to be missed. It is one of the world’s oldest pilgrimages and is consistently ranked among the ten best hikes on the planet. Over four unforgettable days you will hike through different ecological zones which house an abundance of diverse flora and fauna. These include various orchids, bromeliads, hummingbirds, foxes and deer. Some lucky hikers may even catch a glimpse of the magnificent spectacled bear of South America during the trekking.</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Route</label>
													<textarea name="route" class="form-control" cols="30" rows="5" placeholder="Write About The Route">Your trekking team will pick you up from your hotel between 4:30-6:30am (depending on your location) and drive you to KM. 82 – arriving at approximately 8.00am. After a delicious breakfast we will head straight to the checkpoint to begin your trekking to Machu Picchu. It’s a relatively easy two-hour walk to Patallacta; the first Inca site along the trail. From a unique, secluded location we will enjoy the breathtaking views of this ancient city. It’s then another two-hour walk to Hatunchaca – located in the heart of the Inca trail – where lunch will be waiting. We will walk for another two hours to the first campsite located in Ayapata, arriving at approximately 5:00pm. Your tent, a snack and a hot drink will be waiting for you. You will then have some time to rest and enjoy the view of the mountains before dinner.</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Safety</label>
													<textarea name="safety" class="form-control" cols="30" rows="5" placeholder="Say Something About Safety ..">Safety is of the utmost importance to us. That is why this is an area in which we simply do not compromise when it comes to keeping the cost of our trekkings low. Our guides have been selected on the basis of their technical competence, proven safety performance, impeccable judgment, friendly attitude and ability to provide useful and expert instructions. They are also very professional and well trained in first aid and personal protection equipment. First aid kits are available on all treks. In addition, the routes are ideally designed to give you enough time to acclimatize.</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>How To Book</label>
													<textarea name="howtobook" class="form-control" cols="30" rows="5" placeholder="How To Book ..">On Bookatrekking.com you can find and compare the adventures of your dreams. Is this trekking adventure your match? In that case you can proceed to booking. At Bookatrekking.com you make a deposit of 15% of the total amount. You pay the remaining amount on location prior to the trek directly to the trekking company. Bookatrekking.com uses only the safest payment methods. Once your booking has been received, your place is reserved, your place is safe and you can look forward to your chosen trekking.</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<!-- text input -->
												<div class="form-group">
													<label>Price Per Day </label>
													<input type="number" name="price" min="0" class="form-control" placeholder="Enter The Price Per Day ..">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-9">
												<!-- text input -->
												<div class="form-group">
													<label>Images Number</label>
													<input type="number" name="images" min="0" id="countt" class="form-control" placeholder="Images Number..">
												</div>
											</div>
											<div class="col-sm-3">
												<!-- text input -->
												<script type='text/javascript'>
													function addFields() {
														var number = document.getElementById("countt").value;
														var container = document.getElementById("containert");
														while (container.hasChildNodes()) {
															container.removeChild(container.lastChild);
														}
														for (i = 0; i < number; i++) {
															container.appendChild(document.createTextNode("Image " + (i + 1)));
															var input = document.createElement("input");
															input.type = "file";
															input.name = "image" + i;
															input.placeholder = "Image..";
															input.classList.add("form-control");
															container.appendChild(input);
															container.appendChild(document.createElement("br"));
														}
													}
												</script>
												<div class="form-group">
													<label>Add</label>
													<input type="button" name="addd" class="form-control btn btn-block btn-primary btn-sm" onclick="addFields()" placeholder="" value="Add">
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group" id="containert"> </div>
											</div>
										</div>
										<div class="row"> </div>
										<div class="row">
											<button type="submit" name="submit" class="btn btn-block btn-outline-primary btn-sm">Add Group</button>
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
									<h3 class="card-title">All Groups</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
										<button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
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
													<th>Name</th>
													<th>Location</th>
													<th>Rating</th>
													<th>Actions</th>
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
												$faq_data = DB::query('SELECT * FROM hikes');
												foreach ($faq_data as $fd) {
													$country = DB::query('SELECT name FROM country WHERE id=:id',array(':id'=>$fd['location']))[0]['name'];
												?>
													<tr>
														<td>
															<?php echo $fd['id'] ?>
														</td>
														<td><abbr title="<?php echo $fd['name']; ?>"><?php echo truncate($fd['name'], 35); ?></abbr></td>
														<td><abbr title="<?php echo $country; ?>"><?php echo truncate($country, 35); ?></abbr></td>
														<td><?php echo CalculateRating($fd['id']); ?></td>
														<td>
															<button class="btn  btn-outline-danger btn-sm" onClick="(function(){window.location='view-groups.php?action=delete&id=<?php echo $fd["id"]; ?>';return false;})();return false;"><i class="fas fa-trash"></i></button>
															&nbsp;&nbsp;
															<button class="btn btn-outline-primary btn-sm" onClick="(function(){window.location='edit-group.php?us=<?php echo $fd['id']; ?>';return false;})();return false;"><i class="fas fa-cog"></i></button>
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
								<!-- /.card-footer -->
							</div>
						</div>
					</div>
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