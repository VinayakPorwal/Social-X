<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    header("location: index.php");
    exit;
}

?>


<?php
include "conn.php";

// database entry
$key = (isset($_POST['key']) ? $_POST['key'] : null);
$email = (isset($_REQUEST['email']) ? $_REQUEST['email'] : null);

$email = $_SESSION['email'];
// echo $email;

$login = false;
$showError = false;
$sql = "SELECT * FROM `register` WHERE `email` ='$email'";

$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
// echo $num;

if (isset($_POST['send'])) {

    if ($num != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //    echo$row['Ckey'];
            if ($key === $row['Ckey']) {

                $sql2 = " UPDATE `register` SET `Cstatus` = '1' WHERE `email`='$email'";
               
                $result2 = mysqli_query($conn, $sql2);

                $login = true;

                $_SESSION = [];
                session_unset();
                session_destroy();
                header("location: ./components/login.php");

            } else {
                $showError = "invalid key";
            }
        }
    } else {
        $showError = "User not found, Please <em>Create an Account</em> first.";
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
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> your account created succesfully

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
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img id="img2" src="fookrey.png" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Confirm Your Email</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="password" name="key" id="your_name" placeholder="Confirmation Pin" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="send" id="send" class="form-submit" value="sonfirm" />
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>