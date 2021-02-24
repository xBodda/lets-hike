<?php
  include('includes/head.php');

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
        <h1>Contact us</h1>
      </div>
    </div>
    <!-- Top Banner END -->

    <!-- Contact START  -->

    <div class="def-container">
      <div class="contact-contb">
        <div class="contact-boxb">
          <div class="button-container">
             
             

          <div class="contact-form">
                      <h1 class="highlight u-c">OPEN A NEW TICKET</h1>
          <p>And our support team will reach you as soon as possible!</p><br>
          <form method="post">
            <label for="name"> &nbsp Fullname

                <input class="input" type="text" name="name" id="name" placeholder=" Enter Your Name .." required/>
            </label>
            
            <label for="name"> &nbsp Type

                <select class="input"id="type" name="cars">
                  <option value="inq">Inquiry</option>
                  <option value="comp">Complaint</option>
                  <option value="sug">Suggestion</option>
                  <option value="other">Other</option>
                </select>
            </label>
          <label for="name"> &nbsp Message <br>
            <textarea name="message" rows="8" cols="80" placeholder="Your Message"></textarea>
            </label>
            <input type="submit" class="xbutton contact-box" name="send" value="Send">
          </form>
        </div>
                 
                
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
