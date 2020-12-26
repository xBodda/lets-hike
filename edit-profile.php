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
    <title>Hikingify | Signup</title>
    
  </head>
  <body id="edit-profile">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->
    <!-- Top Banner START -->
    <div class="top-banner"> 
      <div class="overlay"></div>
      <div class="content">
        <h1>Your Profile</h1> 
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
                    <input class="input" type="text" name="name" id="name" placeholder=" Enter Your New Name .." required/>
                </label>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" type="text" name="email" id="email" placeholder=" Enter Your New Email .." required/>
                </label>
                
                <label for="gender"> &nbsp Gender
                    <i class="fas fa-venus-mars icon"></i>
                    <select name="gender" id="gender" class="input" required>
                        <option value="" selected disabled>Specify Your Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Rather Not To Say</option>
                    </select>
                </label>
                <label for="phone"> &nbsp Phone Number
                    <i class="fas fa-phone icon"></i>
                    <input class="input" type="text" name="phone" id="phone" placeholder=" Enter Your New Phone Number .." required/>
                </label>
                <div class="flex">
                    <div class="button-container fl-1">
                        <button type="submit" class="bButton">
                            <span class="span">Save Changes</span>
                            <svg class="svg"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                            >
                                <path class="path"
                                d="M0 11c2.761.575 6.312 1.688 9 3.438 3.157-4.23
                                8.828-8.187 15-11.438-5.861 5.775-10.711
                                12.328-14 18.917-2.651-3.766-5.547-7.271-10-10.917z"
                                />
                            </svg>

                        </button>
                    </div>
                    
                </div>

            </form>
        </div> 
        <div class="edit-profile-form fl-2" id="Privacy" style="display:none;">
        <form action="edit-profile.php" method="POST">
                <h1 class="mb-30">Privacy</h1>
                <label for="Password"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="password" id="password" placeholder=" Enter Your Old Password .." required/>
                </label>
                <label for="newPassword"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="password" id="password" placeholder=" Enter Your New Password .." required/>
                </label>
                <label for="repassword"> &nbsp Confirm Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="text" name="repassword" id="repassword" placeholder=" Confirm Your New Password .." required/>
                </label>
                <div class="flex">
                    <div class="button-container fl-1">
                        <button type="submit" class="bButton">
                            <span class="span">Save Changes</span>
                            <svg class="svg"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                            >
                                <path class="path"
                                d="M0 11c2.761.575 6.312 1.688 9 3.438 3.157-4.23
                                8.828-8.187 15-11.438-5.861 5.775-10.711
                                12.328-14 18.917-2.651-3.766-5.547-7.271-10-10.917z"
                                />
                            </svg>

                        </button>
                    </div>
                </div>  
                  
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
