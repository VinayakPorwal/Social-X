<?php
session_start();


if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}

if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
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
        background-color: #00b4e6;
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

    .ppic {
        width: 40px;
        height: 40px;
        background-color: yellow;
        border: 1px solid;
        text-align: center;
        vertical-align: middle;
        position: relative;
        margin: 0px 0 0 10px;
        font-weight: 600;
        font-size: large;
    }

    #profile {
        padding: 10px 0 !important;
        display: flex;
        padding-bottom: 16px;
        background: aquamarine;
        display: flex;
        border-radius: 10px;
        margin: 10px 0;
    }

    .w3-opacity {
        font-style: italic;
        font-size: x-small;
    }

    .username {
        margin: -5px 8px;
        text-align: left;

    }
</style>

<body>

    <!-- Navbar (sit on top) -->
    <?php include "./components/navbar.php"; ?>



    <!-- About Section -->
    <div style="background-color: #00b4e6;">
        <h3 class="w3-center">Recent Chats</h3>

        <div class="w3-row-padding w3-center">






            <?php
            include "conn.php";

            $user1 = $_SESSION['id'];
            $sql = "SELECT * FROM register ORDER BY `sno.` DESC";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {


                while ($row = mysqli_fetch_assoc($query)) {
                    $user2 = $row['sno.'];
                    $name = $row['name'];
                    // echo $user1;
                    // echo $user2;
                    $sql2 = "SELECT * FROM user_data WHERE user2 = $user2 OR user1 =$user1 AND user1 =$user2 OR user2 =$user1 ORDER BY id DESC LIMIT 1;";
                    $query2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($query2);
                    if (mysqli_num_rows($query2) > 0) {
                        if (($row2['user1'] == $user1)) {

                            $result = $row2['message'];

                            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                            $substr = substr($name, 0, 1);
                            echo '<a style="text-decoration:none;"href="z_test.php?userid=' . $user2 . '">
                                     <div id="profile">
                                        <div class="w3-circle ppic" >' . $substr . '</div>
                                            <p class="username">' . $name . '<br>
                                              <span>You:' . $msg . '</span>
                                            </p>
                                        </div>
                                  </a>';
                        }
                        else{
                            $result = $row2['message'];

                            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                            $substr = substr($name, 0, 1);
                            echo '<a style="text-decoration:none;"href="z_test.php?userid=' . $user2 . '">
                                     <div id="profile">
                                        <div class="w3-circle ppic" >' . $substr . '</div>
                                            <p class="username">' . $name . '<br>
                                              <span>' . $msg . '</span>
                                            </p>
                                        </div>
                                  </a>';

                        }
                    }
                }
            }
            else{
                echo "no msgs";
            }
            ?>

            <!-- <span class="w3-opacity">(' . $email . ')</span> -->


        </div>
    </div>


    <!-- Footer -->
    <?php
    //  include "./components/footer.php";
     ?>

</body>

</html>