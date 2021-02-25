<?php
    include('includes/head.php');
    if(isset($_POST["send"]))  
    {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $type = $_POST['type'];
        $date = date('Y-m-d H:i:s');
        $message = $_POST['message'];

        DB::query(
          'INSERT INTO tickets VALUES(\'\',:fullname,:subject,:type,:_date,0)',
          array(
              ':fullname' => $name,
              ':subject' => $subject,
              ':type' => $type,
              ':_date' => $date,
          )
        );

        DB::query(
          'INSERT INTO tickets VALUES(\'\',:fullname,:subject,:type,:_date,0)',
          array(
              ':fullname' => $name,
              ':subject' => $subject,
              ':type' => $type,
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
    <title>Hikingify | My Tickets</title>
    
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
          <form method="post" action="my-tickets.php">
            <label for="name"> &nbsp Fullname
                <input class="input" type="text" name="name" id="name" placeholder=" Enter Your Name .." required/>
            </label>

            <label for="name"> &nbsp Subject
                <input class="input" type="text" name="subject" id="name" placeholder=" Enter The Subject .." required/>
            </label>
            
            <label for="name"> &nbsp Type
                <select class="input"id="type" name="type">
                  <option value="Inquiry">Inquiry</option>
                  <option value="Complaint">Complaint</option>
                  <option value="Suggestion">Suggestion</option>
                  <option value="Other">Other</option>
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

             <table class="myTable">
  <tr class="tableHead">
                    <th style="width:8%;">No.</th>
                    <th style="width:50%;">Ticket Subject</th>
                    <th style="width:15%;">Last Response By</th>
                    <th style="width:8%;">Type</th>
                    <th style="width:10%;">Date</th>
                    <th style="width:100%;">Status</th>
                  </tr>
                  <tr>
                    <td>78512</td>
                    <td>Which is easier the South Kaibab Trail or the Bright Angel Trail?</td>
                    <td><b>You</b></td>
                    <td>Inquiry</td>
                    <td>02-24-2021</td>
                    <td><b>In Review</b></td>
                  </tr>
                    <td>65448</td>
                    <td>How hard is it to hike into the Grand Canyon?</td>
                    <td>Abdelrahman Sayed</td>
                    <td>Inquiry</td>
                    <td>02-14-2021</td>
                    <td>Solved</td>
                  </tr>
                    <td>65210</td>
                    <td>Do I need a map?</td>
                    <td>Ahmed Ashraf</td>
                    <td>Inquiry</td>
                    <td>02-12-2021</td>
                    <td>Solved</td>
                  </tr>
                    <td>45179</td>
                    <td>What should I tell family/friends/employer about my trip?</td>
                    <td>Ahmed Ashraf</td>
                    <td>Inquiry</td>
                    <td>02-10-2021</td>
                    <td>Solved</td>
                  </tr>
                  <td>32659</td>
                    <td>If I get into trouble and need to be rescued, who pays expenses for my rescue?</td>
                    <td>Ahmed Ashraf</td>
                    <td>Inquiry</td>
                    <td>02-10-2021</td>
                    <td>Solved</td>
                  </tr>
                  <td>31288</td>
                    <td>Where can I get information about mule rides into the canyon?</td>
                    <td>Ahmed Ashraf</td>
                    <td>Inquiry</td>
                    <td>02-10-2021</td>
                    <td>Solved</td>
                  </tr>
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
  
              </div><!--wrapper-->        
    </div></div>


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
