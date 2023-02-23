<?php
include "../conn.php";

// database entry

$name = (isset($_POST['username']) ? $_POST['username'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);
$password =  (isset($_POST['password']) ? $_POST['password'] : null);
$cpassword = (isset($_POST['cpassword']) ? $_POST['cpassword'] : null);
$dob = (isset($_POST['dob']) ? $_POST['dob'] : null);


//condition flags 
$showError = false;
$showAlert = false;
$showAlert2 = false;


$sql = "SELECT * from `register` WHERE `email`='$email'";
$result2 = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result2);

// $hash = password_hash($password, PASSWORD_DEFAULT);
$Ckey = random_int(100000, 999999);
if (isset($_POST['signup'])) {
    if ($password === $cpassword && $num === 0) {
        $sql = "INSERT INTO register(`name`,`email`,`password`,`dob`,`Cstatus`,`Ckey`)
VALUES ('$name' , '$email' , '$password' , '$dob','0','$Ckey')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            if ($showAlert) {
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
            }
            session_start();

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            $to_email = $email ;
            $subject = "Confirmation key for your Fookreywebs.com account";
            $num = $Ckey;
            $body = "Hi $name, This is test email send by PHP Script\r\n this is your code $num";
            $headers = "To: laughtertherapy08@gmail.com";
            $headers = "From: fookreywebs@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                
                header("location: ../confirmation.php");
            } else {
                echo "Email sending failed...";
            }

        }
    } else if ($num != 0) {
        $showAlert2 = true;
    } else {
        $showError = "passwords do not match";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php

    if ($showAlert2) {
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong>Account exist with this email!<b>Go to <a class="text-dark" href="/login.php">Login</a></b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
    ?>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" required name="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" required name="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" required name="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" id="re_pass" required name="cpass" placeholder="Confirm password" />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-cake"></i></label>
                                <input type="date" name="dob" id="dob" required name="dob" placeholder="Date of Birth" />
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>

                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img id="img1" src="../imgs/fookrey.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>