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
    <div class="contact-cont">
      <div class="contact-box">
        <div class="contact-info">
          <h1>Contact Info</h1>
          <h2>Egypt</h2>
          <p>Misr International University, <br>
            Gamaiet Ahmed Orabi, Al Obour<br>
            Cairo Governorate</p>

          <h2>Ahmed1813516@miuegypt.edu.eg</h2>
          <p><span class="number">+20 102 121 3290</span></p>
        </div>
        <div class="contact-form">
                      <h1 class="highlight u-c">Get in touch</h1>
          <p>Feel free to drop us a line below!</p><br>
          <form method="post">
            <label for="name"> &nbsp Fullname

                <input class="input" type="text" name="name" id="name" placeholder=" Enter Your Name .." required/>
            </label>
            <label for="name"> &nbsp Email

                <input class="input" type="text" name="email" id="name" placeholder=" Enter Your Email .." required/>
            </label>
            <label for="name"> &nbsp Subject

                <input class="input" type="text" name="subject" id="name" placeholder=" Enter Subject .." required/>
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

    <!-- Contact END  -->

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
  </body>
</html>
