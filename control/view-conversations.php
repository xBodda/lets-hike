<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
	echo '<script>window.location="404.php"</script>';
}

if( isset($_GET['ticket']) )
{
    $ticket_id = $_GET['ticket'];
    $ticketData = DB::query('SELECT * FROM tickets WHERE id=:id',array(':id'=>$ticket_id))[0];
    $messagesData = DB::query('SELECT * FROM tickets_messages WHERE ticket_id=:ticket_id',array(':ticket_id'=>$ticket_id));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hikingify | View Conversations</title>
	<?php
	include('includes/links.php');
	?>

</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include("includes/navbar.php") ?>
			<?php include("includes/aside.php") ?>
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h1>View Conversations</h1> </div>
							</div>
						</div>
						<!-- /.container-fluid -->
					</section>
					<!-- Main content -->
					<section class="content">
						<div class="container-fluid">
							<div class="row">

								<div class="col-md-8" style="margin: 0 auto;">
									<div >
										
										<div class="card card-sucress cardutline direct-chat direct-chat-success shadow-sm">
											<div class="card-header">
												<h3 class="card-title"><?php echo $ticketData['subject']; ?></h3>
												<div class="card-tools">
													<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
													
													<button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
												</div>
											</div>
											
											<div class="card-body">
												<div class="direct-chat-messages">
													<?php
                                                        foreach($messagesData as $singleMessage)
                                                        {
                                                            $senderData = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$singleMessage['user_id']))[0];
                                                            if($singleMessage['user_id'] == $userid) {
                                                                print '
                                                                <div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix"> <span class="direct-chat-name float-left">'.$senderData['fullname'].' ( Admin )</span> <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span> </div>
                                                                    <img class="direct-chat-img" src="../userImgs/'.$senderData['image'].'" alt="Message User Image">
                                                                    <div class="direct-chat-text"> '.$singleMessage['message'].' </div>
                                                                </div>
                                                                ';
                                                            } else {
                                                                print '
                                                                <div class="direct-chat-msg">
                                                                <div class="direct-chat-infos clearfix"> <span class="direct-chat-name float-right">'.$senderData['fullname'].'</span> <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span> </div>
                                                                <img class="direct-chat-img" src="../userImgs/'.$senderData['image'].'" alt="Message User Image">
                                                                <div class="direct-chat-text"> '.$singleMessage['message'].' </div>
                                                                </div>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
												</div>
											</div>
											<!-- /.card-body -->
											<div class="card-footer">
												<form action="#" method="post">
													<div class="input-group">
														<input type="text" name="message" placeholder="Type Message ..." class="form-control"> <span class="input-group-append">
                                                        <button type="submit" class="btn btn-success">Send</button>
                                                        </span> 
                                                    </div>
												</form>
											</div>
											<!-- /.card-footer-->
										</div>
										<!--/.direct-chat -->
									</div>
								</div>
								<!--/.col (right) -->
							</div>
							<div class="row">
								<div class="col-md-8" style="margin: 0 auto;"> </div>
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