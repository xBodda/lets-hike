<?php
    include('includes/head.php');
    if(isset($_POST["save"]))  
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        DB::query('UPDATE users SET fullname=:name,email=:email,gender=:gender,phonenumber=:phonenumber WHERE id=:id',
        array(':name'=>$name,
                ':email'=>$email,
                ':gender'=>$gender,
                ':phonenumber'=>$phone,
                ':id'=>$userid));

                echo '<script>alert("Data Saved")</script>';
                echo '<script>window.location="profile.php"</script>';
    }

    if (isset($_POST['change']))
    {
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['password'];
            $newpasswordrepeat = $_POST['repassword'];

            if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:id', array(':id'=>$userid))[0]['password']))
            {
                if ($newpassword == $newpasswordrepeat)
                {
                    if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60)
                    {

                        DB::query('UPDATE users SET password=:newpassword WHERE id=:id', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':id'=>$userid));
                        echo '<script>alert("Password Changed")</script>';
                        echo '<script>window.location="edit-profile.php"</script>';
                    }
                } 
                else 
                {
                    echo '<script>alert("Password Don\'t Match")</script>';
                }

            } 
            else 
            {
                echo '<script>alert("Wrong Current Password")</script>';
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
    <!-- Link To Icons File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Favicon  -->
    <link href="layout/svg/logo-mark.svg" rel="shortcut icon" type="image/png">
    <title>Hikingify | Edit Profile</title>
    
  </head>
  <body id="edit-profile">
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

    <div class="signup-container flex mb-30">
        <div class="edit-profile">
        <h1 class="mb-30 ta-c"></h1>
        
        <a onclick="showNewTicket()">
                    <div class="bButtonb forms-footerd">
                    <img style="height:50px"src="layout\svg\add-ticket.svg" alt="Girl in a jacket">
                    <h3> Open New Ticket</h3> 
                    </div>
                  </a>

                  <a onclick="showMyTickets()">
                    <div class="bButtonb forms-footerid">
                    <img style="height:50px"src="layout\svg\tickets.svg" alt="Girl in a jacket">
                    <h3> Show My Tickets</h3> 
                    </div>
                  </a>
            
    </div>
        <div class="edit-profile-content">
           
        </div>
         <div class="edit-profile-form fl-2" id="new-ticket"> 
            <form action="edit-profile.php" method="POST">
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
        <div class="edit-profile-form fl-2" id="my-tickets" style="display:none;">
        <form action="edit-profile.php" method="POST">
             <h1 class="mb-30">My Tickets</h1>

            </div>
           
            
        
    </div>

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
<script>
    function showNewTicket(){
    var general=document.getElementById("new-ticket");
    var privacy=document.getElementById("my-tickets");
    privacy.style.display='none';
    general.style.display='block';
    
    }
    function showMyTickets(){
        var general=document.getElementById("new-ticket");
    var privacy=document.getElementById("my-tickets");
            general.style.display='none';
            privacy.style.display='block';
            
    }
</script>
  </body>
</html>