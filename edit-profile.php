<?php
    include('includes/head.php');
    if (!Login::isLoggedIn())
    {
        die("Not Logged In");
    }
    $user_info = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$userid))[0];

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
        <h1>Edit Your Profile</h1> 
      </div>
    </div>
    <!-- Top Banner END -->

    <div class="signup-container flex mb-30">
        <div class="edit-profile fl-1">
        <h1 class="mb-30 ta-c">Edit Profile</h1>
        
             <p class="mb-10" onclick="showGeneral()"><i class="fas fa-user-cog"></i> General Settings</p>
            <br>
             <p class="mb-30" onclick="showPrivacy()"><i class="fas fa-lock" ></i> Privacy</p>
            <br>
            <p class="mb-10 backToProfile"><i class="fas fa-chevron-left"></i> Back To Profile</p>
            
    </div>
        <div class="edit-profile-content">
           
        </div>
         <div class="edit-profile-form fl-2" id="generalSettings"> 
            <form action="edit-profile.php" method="POST">
                <h1 class="mb-30">General Settings</h1>
                <label for="name"> &nbsp Fullname
                    <i class="fas fa-id-card icon"></i>
                    <input class="input" type="text" name="name" id="name" placeholder=" Enter Your New Name .." value="<?php echo $user_info['fullname']; ?>"/ required>
                </label>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" type="text" name="email" id="email" placeholder=" Enter Your New Email .." value="<?php echo $user_info['email']; ?>"/ required>
                </label>
                
                <label for="gender"> &nbsp Gender
                    <i class="fas fa-venus-mars icon"></i>
                    <select name="gender" id="gender" class="input" required>
                        <?php
                            if($user_info['gender'] == 1)
                            {
                                echo '<option value="1">Male</option>';
                                echo '<option value="2">Female</option>';
                                echo '<option value="3">Rather Not To Say</option>';
                            } 
                            else if($user_info['gender'] == 2)
                            {
                                echo '<option value="2">Female</option>';
                                echo '<option value="1">Male</option>';
                                echo '<option value="3">Rather Not To Say</option>';
                            }
                            else if($user_info['gender'] == 3)
                            {
                                echo '<option value="3">Rather Not To Say</option>';
                                echo '<option value="1">Male</option>';
                                echo '<option value="2">Female</option>';
                            }
                        ?>
                    </select>
                </label>
                <label for="phone"> &nbsp Phone Number
                    <i class="fas fa-phone icon"></i>
                    <input class="input" type="text" name="phone" id="phone" placeholder=" Enter Your New Phone Number .." value="<?php echo $user_info['phonenumber']; ?>" required/>
                </label>
                <div>
                    <div class="button-container">
                        <button type="submit" class="bButton" name="save">
                            Save Changes
                        </button>
                    </div>
                    
                </div>
            </form>
            
        </div> 
        <div class="edit-profile-form fl-2" id="Privacy" style="display:none;">
        <form action="edit-profile.php" method="POST">
            <h1 class="mb-30">Privacy</h1>
            <label for="Password"> &nbsp Current Password
                <i class="fas fa-lock icon"></i>
                <input class="input" type="password" name="oldpassword" id="password" placeholder=" Enter Your Old Password .." required/>
            </label>
            <label for="newPassword"> &nbsp New Password
                <i class="fas fa-lock icon"></i>
                <input class="input" type="password" name="password" id="password" placeholder=" Enter Your New Password .." required/>
            </label>
            <label for="repassword"> &nbsp Confirm Password
                <i class="fas fa-lock icon"></i>
                <input class="input" type="password" name="repassword" id="repassword" placeholder=" Confirm Your New Password .." required/>
            </label>
            <div class="flex">
                <div class="button-container fl-1">
                    <button type="submit" class="bButton" name="change">
                        Change Password
                    </button>
                </div>
            </div>  
        </form>
        </div>
            </div>
           
            
        
    </div>

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->
<script>
    function showGeneral(){
    var general=document.getElementById("generalSettings");
    var privacy=document.getElementById("Privacy");
    privacy.style.display='none';
    general.style.display='block';
    
    }
    function showPrivacy(){
        var general=document.getElementById("generalSettings");
    var privacy=document.getElementById("Privacy");
            general.style.display='none';
            privacy.style.display='block';
            
    }
</script>
  </body>
</html>
