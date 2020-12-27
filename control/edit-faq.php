<?php
include('includes/head.php');
if (!Login::isLoggedIn()) 
{
  echo '<script>window.location="404.php"</script>';
}


if ( isset( $_POST['submit'] ) )
{
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $date = date('Y-m-d H:i:s');

  if(strlen($question) >= 3 && strlen($question) < 1000)
  {
	if(strlen($answer) >= 3 && strlen($answer) < 1000)
	{
		DB::query('INSERT INTO faq VALUES(\'\',:question,:answer,:_date)',
		array(':question'=>$question,':answer'=>$answer,':_date'=>$date));
		echo '<script>alert("FAQ Added")</script>';
	}
	else
	{
		echo '<script>alert("Answer Length Out Of Bond")</script>';
	}
  }
  else
  {
	echo '<script>alert("Question Length Out Of Bond")</script>';
  }
}

if(isset($_GET["action"]))  
{
	if($_GET["action"] == "delete")  
	{  
		DB::query('DELETE FROM faq WHERE id=:id',array(':id'=>$_GET["id"]));
		
		echo '<script>alert("FAQ Removed")</script>';
		echo '<script>window.location="edit-faq.php"</script>';
	}  
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hikingfy | Edit FAQ</title>
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
										<h1>Edit FAQ</h1> </div>
									<div class="col-sm-6">
										<ol class="breadcrumb float-sm-right">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active">Edit FAQ</li>
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
												<h3 class="card-title">Add FAQ</h3> </div>
											<!-- /.card-header -->
											<div class="card-body">
												<form method="POST" action="edit-faq.php" enctype="multipart/form-data">
													<div class="row">
														<div class="col-sm-12">
															<!-- text input -->
															<div class="form-group">
																<label>Question </label>
																<input type="text" name="question" class="form-control" placeholder="Write The Question Here .."> </div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<!-- text input -->
															<div class="form-group">
																<label>Answer</label>
																<textarea name="answer" class="form-control" id="answer" cols="30" rows="10" placeholder="Write The Answer Here"></textarea>
															</div>
														</div>
														<div class="col-sm-3">
															<!-- text input -->
															<script type='text/javascript'>
															function addFields() {
																var number = document.getElementById("count").value;
																var container = document.getElementById("container");
																while(container.hasChildNodes()) {
																	container.removeChild(container.lastChild);
																}
																for(i = 0; i < number; i++) {
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
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group" id="container"> </div>
														</div>
													</div>
													<div class="row"> </div>
													<div class="row">
														<button type="submit" name="submit" class="btn btn-block btn-outline-primary btn-sm">Add FAQ</button>
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
												<h3 class="card-title">FAQ Settings</h3>
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
																<th>Question</th>
																<th>Answer</th>
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
                            $faq_data = DB::query('SELECT * FROM faq');
                            foreach($faq_data as $fd)
                            {
                              
                            ?>
																<tr>
																	<td>
																		<?php echo $fd['id'] ?>
																	</td>
																	<td><abbr title="<?php echo $fd['question']; ?>"><?php echo truncate($fd['question'],35); ?></abbr></td>
																	<td><abbr title="<?php echo $fd['answer']; ?>"><?php echo truncate($fd['answer'],35); ?></abbr></td>
																	<td>
																		<button id="dect" class="btn btn-outline-danger btn-sm" onClick="(function(){window.location='edit-faq.php?action=delete&id=<?php echo $fd['id']; ?>';return false;})();return false;">Delete</button> &nbsp;&nbsp; </td>
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
		<!-- bs-custom-file-input -->
		<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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