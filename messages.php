<?php
  include('includes/head.php');

    if ( isset($_GET['ticket']))
    {
        $ticketid = $_GET['ticket'];
        $ticketInfo = DB::query('SELECT * FROM tickets WHERE id=:id',array(':id'=>$ticketid))[0];
    }


  if(isset($_POST['send']))
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $message=$_POST['message'];
      $date = date('Y-m-d H:i:s');

      if (strlen($name) >= 3 && strlen($name) <= 128) 
      {
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
          {
              DB::query('INSERT INTO contact VALUES(\'\',:name,:email,:subject,:message,:_date)',
              array(':name'=>$name,':subject'=>$subject,':email'=>$email,':message'=>$message,':_date'=>$date));
              echo '<script>alert("Message Sent !")</script>';  
              echo '<script>window.location="index.php"</script>';
          }
          else 
          {
              echo '<script>alert("Error In Email!")</script>';
          }
      }
      else 
      {
          echo '<script>alert("Error In Name Length!")</script>';
      }
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
    <!-- Favicon  -->
    <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
    <!-- Link To Icons File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Hikingify | Messages</title>
  </head>
  <body id="contact">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner">
      <div class="overlay"></div>
      <div class="content">
        <h1>Messages</h1>
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Contact START  -->

    <div class="def-container">
      <div class="messages-content">
            <div class="message-box">
                <h1>Opened Ticket: <?php echo $ticketInfo['subject']; ?></h1>
                <hr>
                <div class="whole-messages">
                    <?php
                        $ticketMessages = DB::query('SELECT * FROM tickets_messages WHERE ticket_id=:ticket_id',array(':ticket_id'=>$ticketid));
                        foreach ($ticketMessages as $singleMessage)
                        {
                            $senderData = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$singleMessage['user_id']))[0];
                            $timeInAgo = timeago($singleMessage['_date']);
                    ?>
                    <div class="single-message">
                        <div class="message-sender flex mb-10">
                            <div class="sender-image">
                                <img src="userImgs/<?php echo $senderData['image']; ?>" alt="">
                            </div>
                            <div class="sender-info">
                                <p><?php echo $senderData['fullname']; ?></p>
                                <i><?php echo $timeInAgo; ?></i>
                            </div>
                        </div>
                        <div class="message-content">
                            <p>
                                <?php echo $singleMessage['message']; ?>
                            </p>
                        </div>
                        
                    </div>
                    <hr>
                    <?php } ?>
                </div>
                <div class="message-send">
                <textarea name="message" id="message" cols="30" rows="5" class="messages-textarea" placeholder="Enter Your Message Here ..." required></textarea>
                    <button class="xbutton" type="submit" name="send" onclick="sendMessage()">
                        Send Message
                    </button>
                </div>
            </div>
      </div>
    </div>
    <!-- Contact END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <script>
        function sendMessage() 
        {
            var xhttp = new XMLHttpRequest();
            var message = document.getElementById('message').value;
            var ticketid = <?php echo $ticketid; ?>;
            xhttp.open("GET", "sendMessage.php?msg="+message+"&id="+ticketid, true);
            xhttp.send();
        }
    </script>
    <!-- Footer END -->
  </body>
</html>
