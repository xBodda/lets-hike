<?php
    include('includes/head.php');
	if($user_type > 1){
		header('Location:./control/view-tickets.php');
		exit;
	}
    if(isset($_POST["send"]))  
    {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $type = $_POST['type'];
        $date = date('Y-m-d H:i:s');
        $message = $_POST['message'];

        DB::query(
          'INSERT INTO tickets VALUES(\'\',:fullname,:subject,:type,:_date,:user_id,0)',
          array(
              ':fullname' => $name,
              ':subject' => $subject,
              ':type' => $type,
              ':_date' => $date,
              ':user_id' => $userid
          )
        );

        $ticket_id = DB::query('SELECT id FROM tickets ORDER BY id DESC LIMIT 1')[0]['id'];

        DB::query(
          'INSERT INTO tickets_messages VALUES(\'\',:ticket_id,:message,:user_id,:_date,0)',
          array(
              ':ticket_id' => $ticket_id,
              ':message' => $message,
              ':user_id' => $userid,
              ':_date' => $date,
          )
        );

        echo '<script>alert("Message Sent")</script>';
        echo '<script>window.location="index.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<!-- Product Sans Font -->
	<link rel="stylesheet" href="layout/css/productsans.css">
	<!-- Main CSS File -->
	<link rel="stylesheet" href="layout/css/master.css">
	<!-- Link To Icons File -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<!-- Favicon  -->
	<link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
	<title>Hikingify | Support</title>
</head>

<body id="edit-profile">
	<!-- Header START -->
	<?php include('includes/header.php'); ?>
		<!-- Header END -->
		<!-- Top Banner START -->
		<div class="top-banner">
			<div class="overlay"></div>
			<div class="content">
				<h1>Support</h1> </div>
		</div>
		<!-- Top Banner END -->
		<div class="signup-container flex mb-30">
			<div class="edit-profile">
				<h1 class="mb-30 ta-c"></h1>
				<a onclick="showNewTicket()">
					<div class="bButtonb forms-footerd"> <img style="height:50px" src="layout\svg\add-ticket.svg" alt="Girl in a jacket">
						<h3> Open New Ticket</h3> </div>
				</a>
				<a onclick="showMyTickets()">
					<div class="bButtonb forms-footerid"> <img style="height:50px" src="layout\svg\tickets.svg" alt="Girl in a jacket">
						<h3> Show My Tickets</h3> </div>
				</a>
			</div>
			<div class="edit-profile-content"> </div>
			<div class="edit-profile-form fl-2" id="new-ticket">
				<form action="my-tickets.php" method="POST">
					<div class="contact-boxb">
						<div class="button-container">
							<div class="contact-form">
								<h1 class="highlight u-c">OPEN A NEW TICKET</h1>
								<p>And our support team will reach you as soon as possible!</p>
								<br>
								<form method="post" action="my-tickets.php">
									<label for="name"> &nbsp Fullname
										<input class="input" type="text" name="name" id="name" placeholder=" Enter Your Name .." required/> </label>
									<label for="name"> &nbsp Subject
										<input class="input" type="text" name="subject" id="name" placeholder=" Enter The Subject .." required/> </label>
									<label for="name"> &nbsp Type
										<select class="input" id="type" name="type">
											<option value="Inquiry">Inquiry</option>
											<option value="Complaint">Complaint</option>
											<option value="Suggestion">Suggestion</option>
											<option value="Other">Other</option>
										</select>
									</label>
									<label for="name"> &nbsp Message
										<br>
										<textarea name="message" rows="8" cols="80" placeholder="Your Message"></textarea>
									</label>
									<input type="submit" class="xbutton contact-box" name="send" value="Send"> </form>
							</div>
						</div>
					</div>
          </form>
			</div>
			<div class="edit-profile-form fl-2" id="my-tickets" style="display:none;">
					<h1 class="mb-30">My Tickets</h1>
					<table class="myTable">
						<tr class="tableHead">
							<th style="width:8%;">#</th>
							<th style="width:40%;">Ticket Subject</th>
							<th style="width:15%;">Last Response By</th>
							<th style="width:8%;">Type</th>
							<th style="width:20%;">Date</th>
							<th style="width:100%;">Status</th>
						</tr>

            <?php
			$allTickets = DB::query('SELECT * FROM tickets WHERE user_id=:user_id', array(':user_id' => $userid));
              foreach($allTickets as $oneTicket)
              {
                $allUserInfo = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$oneTicket['user_id']))[0];
                  $allTicketsMessages = DB::query('SELECT * FROM tickets_messages WHERE ticket_id=:ticket_id ORDER BY id DESC LIMIT 1',array(':ticket_id'=>$oneTicket['id']))[0];
                  if($allTicketsMessages['user_id'] == $userid)
                  {
                    $senderName = "You";
                  }
                  else
                  {
                    $senderName = DB::query('SELECT fullname FROM users WHERE id=:id',array(':id'=>$allTicketsMessages['user_id']))[0]['fullname'];
                  }

                  if($oneTicket['status'] == 0) {
                    $ticketStatus = "In Review";
                  } else if ($oneTicket['status'] == 1) {
                    $ticketStatus = "Solved";
                  }
            ?>

						<tr>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><?php echo $oneTicket['id'] ?></a></td>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><?php echo $oneTicket['subject'] ?></a></td>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><b><?php echo $senderName; ?></b></a></td>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><?php echo $oneTicket['type'] ?></a></td>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><?php echo $oneTicket['_date'] ?></a></td>
							<td><a href="ticket.php?ticket=<?php echo $oneTicket['id'];?>"><b><?php echo $ticketStatus; ?></b></a></td>
						</tr>
						<?php
              }
            ?>
					</table>
					<div id="wrapper">
						<div class="b-pagination-outer">
							<ul id="border-pagination">
								<li><a class="" href="#">«</a></li>
								<li><a href="#" class="active">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">6</a></li>
								<li><a href="#">7</a></li>
								<li><a href="#">»</a></li>
							</ul>
						</div>
					</div>
					<!--wrapper-->
			</div>
		</div>
		</div>
		</div>
		<!-- Footer START -->
		<?php include('includes/footer.php'); ?>
			<!-- Footer END -->
			<script>
			function showNewTicket() {
				var general = document.getElementById("new-ticket");
				var privacy = document.getElementById("my-tickets");
				privacy.style.display = 'none';
				general.style.display = 'block';
			}

			function showMyTickets() {
				var general = document.getElementById("new-ticket");
				var privacy = document.getElementById("my-tickets");
				general.style.display = 'none';
				privacy.style.display = 'block';
			}
			</script>

      <?php
        if (isset($_GET['t']))
        {
          echo '<script>showMyTickets()</script>';
        }
      
      ?>
</body>

</html>
