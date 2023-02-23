<?php
session_start();


if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}

if (!isset($_SESSION['loggedin'])) {
    header("location: ./components/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<title>Private Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
    }

    body,
    html {
        height: 100%;
        line-height: 1.8;
    }

    .hehe {
        z-index: 1;
        opacity: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }

    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

  
</style>

<body>

    <!-- Navbar (sit on top) -->
    <?php include "./components/navbar.php"; ?>



    <!-- About Section -->
    <div class="w3-container w3-" style="padding: 70px 16px;background-color:#00b4e6" id="about">
        <h3 class="w3-center">Users On this Website</h3>
        <p class="w3-center w3-large">Find Your friends here or make a new One ;)</p>
        <div class="w3-row-padding w3-center" style="margin-top:64px">






            <?php
           include "conn.php";

            $sql = "SELECT * FROM register";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $id = $row['sno.'];
                    $dob = $row['dob'];
                    $substr = substr($name, 0, 1);
                    echo '<a href="profile.php?userid=' . $id . '">
                    <div class="w3-quarter" style="padding-bottom : 16px;">
                    <div class="w3-circle" style="width: 30px;height: 30px;background-color: yellow;
                    border: 1px solid;text-align: center;vertical-align: middle;margin:auto;position :relative;font-weight:600;font-size: large;">' . $substr . '</div>
                        <i style="margin:-31px 0 0 0;"class="fa fa-user w3-margin-bottom w3-jumbo"></i>
                        <p class="w3-large">' . $name . '</p>
                        <p style="word-break:break-word;"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>' . $email . '</p>
                     
                     <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> ' . $dob . '</p>
                    </div>
                </a>';
                }
            }

            ?>



        </div>
    </div>


    <!-- Footer -->
    <?php include "./components/footer.php"; ?>

</body>

</html>