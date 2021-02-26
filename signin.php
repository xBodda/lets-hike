<?php
include('includes/head.php');

if (isset($_POST['signin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('Y-m-d H:i:s');

    if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
    {
        if (password_verify($password, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email))[0]['password']))
        {
            echo '<script>alert("Logged In!")</script>';
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $user = DB::query('SELECT id,type FROM users WHERE email=:email', array(':email'=>$email));
            $user_id = $user[0]['id'];
            $user_type = $user[0]['type'];
            DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$user_id,':date'=>$date));

            setcookie("USR", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
            setcookie("USR_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
            if($user_type != 1){
            header('Location:control');
            exit;
            }
            header('Location:./');
            exit;
        } 
        else 
        {
            echo '<script>alert("Wrong Password")</script>';
        }
    } 
    else 
    {
        echo '<script>alert("Not Registered")</script>';
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
    <title>Hikingify | Signup</title>
  </head>
  <body id="signup">
    <!-- Header START -->
    <?php include('includes/header.php'); ?>
    <!-- Header END -->
    <!-- Top Banner START -->
    <div class="top-banner"> 
      <div class="overlay"></div>
      <div class="content">
        <h1>Login in to have some fun !</h1> 
      </div>
    </div>
    <!-- Top Banner END -->
    <div class="signup-container flex mb-30">
        <div class="signup-img fl-1">

        </div>
        <div class="signup-content mt-100">
            <h1>Hikingify</h1>
            <p>Find your adventure</p>
            <p>Join Now !</p>
        </div>
        <div class="signup-form fl-1">
            <form action="signin.php" method="POST">
                <h1 class="mb-30">Login To Your Account</h1>
                <label for="email"> &nbsp Email
                    <i class="fas fa-envelope icon"></i>
                    <input class="input" type="email" name="email" id="email" placeholder=" Enter Your Email .." required/>
                </label>
                <label for="Password"> &nbsp Password
                    <i class="fas fa-lock icon"></i>
                    <input class="input" type="password" name="password" id="password" placeholder=" Enter Your Password .." required/>
                </label>

                <div class="flex">
                    <div class="button-container fl-3">
                        <button type="submit" class="bButton" name="signin">
                            Login
                        </button>
                    </div>
                    <div class="button-container fl-1">
                        <a href="signup.php">
                            <button type="button" class="bButtonb">
                                Create Account ? 
                            </button>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Footer START -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer END -->

  </body>
</html>
