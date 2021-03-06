<?php
include('includes/head.php');
if (!Login::isLoggedIn()) {
	echo '<script>window.location="404.php"</script>';
}

if (!isset($_GET['ticket'])) {
	header('Location:./view-tickets.php');
	exit;
}
$ticket_id = $_GET['ticket'];
if (isset($_POST['message'])) {
	$message = $_POST['message'];
	$date = date('Y-m-d H:i:s');
	DB::query(
		'INSERT INTO tickets_messages VALUES(\'\',:ticket_id,:message,:user_id,:_date,0)',
		array(
			':ticket_id' => $ticket_id,
			':message' => $message,
			':user_id' => Login::isLoggedIn(),
			':_date' => $date
		)
	);
}

if (isset($_GET['r']) && isset($_GET['ticket']))
{
	$read = 1;
	DB::query(
		'UPDATE tickets_messages SET _read=:_read WHERE ticket_id=:id',
		array(
			':_read' => $read,
		  ':id' => $_GET['ticket']
		)
	  );
}

if(isset($_GET['ticket']) && isset($_GET['msg']))
{
	$reportedTicket = $_GET['ticket'];
	$reportedMessage = $_GET['msg'];
	$admin_id = DB::query('SELECT user_id FROM tickets_messages WHERE id=:id',array(':id'=>$reportedMessage))[0]['user_id'];
	$date = date('Y-m-d H:i:s');
	if (!DB::query('SELECT message_id FROM message_reports WHERE message_id=:message_id', array(':message_id' => $reportedMessage)))
	{
		DB::query(
			'INSERT INTO message_reports VALUES(\'\',:message_id,:ticket_id,:user_id,:_date,:auditor_id)',
			array(
				':message_id' => $reportedMessage,
				':ticket_id' => $reportedTicket,
				':user_id' =>$admin_id,
				':_date' => $date,
				':auditor_id'=>$userid
			)
		);

		echo '<script>alert("Message Reported")</script>';
		echo '<script>window.location="view-conversations.php?ticket='.$ticket_id.'"</script>';
	}
	else
	{
		echo '<script>alert("Already Reported")</script>';
		echo '<script>window.location="view-conversations.php?ticket='.$ticket_id.'"</script>';
	}
	
}

$ticketData = DB::query('SELECT t.* FROM tickets t WHERE id=:id', array(':id' => $ticket_id))[0];
$messagesData = DB::query('SELECT * FROM tickets_messages WHERE ticket_id=:ticket_id', array(':ticket_id' => $ticket_id));
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
<style>
	.fas.fa-flag {
		color: red;
	}
</style>

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
							<h1>View Conversations</h1>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8" style="margin: 0 auto;">
							<div>
								<div class="card card-sucress cardutline direct-chat direct-chat-success shadow-sm">
									<div class="card-header">
										<h3 class="card-title"><?php echo $ticketData['subject']; ?></h3>
									</div>
									<div class="card-body">
										<div class="direct-chat-messages" id="messages-container">
											<?php
											foreach ($messagesData as $singleMessage) {
												$senderData = DB::query('SELECT * FROM users WHERE id=:id', array(':id' => $singleMessage['user_id']))[0];
												$check_whos_message = "";
												$check_admin = "";
												$canFlag = "";
												if ($singleMessage['user_id'] == $userid) {
													$check_whos_message = "right";
													$check_admin = " ( Admin )";
												}
												if ($type == 2 && $senderData['type'] == 4)
												{
													$canFlag = "<a title='Report Message' href='view-conversations.php?ticket=".$ticket_id."&msg=".$singleMessage['id']."'> &nbsp;&nbsp; <i class='fas fa-flag'></i> </a>";
												}
												echo '
															<div class="direct-chat-msg ' . $check_whos_message . '">
                                                                    <div class="direct-chat-infos clearfix"> <span class="direct-chat-name float-left">' . $senderData['fullname'] . $check_admin.'</span> '. $canFlag .' <span class="direct-chat-timestamp float-right">'.date('d M h:i A',strtotime($singleMessage['_date'])).'</span> </div>
                                                                    <img class="direct-chat-img" src="../userImgs/' . $senderData['image'] . '" alt="Message User Image">
                                                                    <div class="direct-chat-text"> ' . $singleMessage['message'] . ' </div>
                                                                </div>';
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
					</div>
					<div class="row">
						<div class="col-md-8" style="margin: 0 auto;"> </div>
					</div>
				</div>
			</section>
		</div>
		<?php include('includes/footer.php'); ?>

	</div>

	<script>
		var message_container = document.getElementById("messages-container");
		message_container.scrollTop = message_container.scrollHeight;
	</script>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="dist/js/adminlte.min.js"></script>
	<script src="dist/js/demo.js"></script>
</body>

</html>