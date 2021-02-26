<?php
  include('includes/head.php');
if ($user_type > 1) {
  header('Location:./control/view-tickets.php');
  exit;
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
    <title>Hikingify | Contact</title>
  </head>
  <body id="contact">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->

    <!-- Top Banner START -->
    <div class="top-banner">
      <div class="overlay"></div>
      <div class="content">
        <h1>Support</h1>
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Contact START  -->

    <div class="def-container">
      <div class="contact-contb">
        <div class="contact-box">
          <div class="button-container">
          
                  <a href="my-tickets.php">
                    <div class="bButtonb forms-footer">
                    <img style="height:50px"src="layout\svg\add-ticket.svg" alt="Girl in a jacket">
                    <h3>Open New Ticket</h3> 
                    </div>
                  </a>

                  <a href="my-tickets.php?t">
                    <div class="bButtonb forms-footeri">
                    <img style="height:50px"src="layout\svg\tickets.svg" alt="Girl in a jacket">
                    <h3>Show My Tickets</h3> 
                    </div>
                  </a>
                
            </div>          
                     
            </div>
        </div>
      </div>
    </div>
    


    <!-- Contact END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
