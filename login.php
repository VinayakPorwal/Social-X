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
$name = (isset($_POST['username']) ? $_POST['username'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);
$password =  (isset($_POST['password']) ? $_POST['password'] : null);


$login = false;
$showError = false;
$showwarn = false;
$sql = "SELECT * FROM `register` WHERE `email` = '$email' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if (isset($_POST['signin'])) {

	if ($num != 0) {
		while ($row = mysqli_fetch_assoc($result)) {

			if (password_verify($password,$row['password'])) {
				if ($row['Cstatus'] == 1) {

					$login = true;
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['sno.'];
					$idq = $row['sno.'];

					$sqlq = "UPDATE `register` SET `stat` = '1' WHERE `sno.` = '$idq' ";
					$resultq = mysqli_query($conn, $sqlq);
					header("location: index.php");
				} else {
					$showwarn = "Account not verified yet!";
				}
			} else {
				$showError = "invalid Password";
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
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php
	if ($login) {
		echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> You Logged in Successfully
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
	if ($showwarn) {
		echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Error!</strong>Verify your Email first
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
						<figure><img id="img2" src="./imgs/fookrey.png" alt="sing up image"></figure>
						<a href="register.php" class="signup-image-link">Create an account</a>
					</div>

					<div class="signin-form">
						<h2 class="form-title">Login</h2>
						<form method="POST" class="register-form" id="login-form">
							<div class="form-group">
								<label for="your_email"><i class="zmdi zmdi-email"></i></label>
								<input type="email" name="email" id="your_name" placeholder="Your Email" />
							</div>
							<div class="form-group">
								<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="password" id="your_pass" placeholder="Password" />
							</div>
							<!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
							<div class="form-group form-button">
								<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
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