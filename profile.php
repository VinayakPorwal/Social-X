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
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&amp;display=swap" rel="stylesheet">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,
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

    #uname {
        font-family: "Baloo bhai";
        font-size: 18px;
        font-weight: 500;
        display: inline-block;
    }



    .size {
        font-size: large;
    }

    body {
        font-family: "Open Sans";
        background-color: #00b4e6;
    }

    .w3-container,
    .w3-panel {
        padding: 0.01em 16px;
    }
    .profile{
        padding: 2.01em 16px;
        margin: 20px 0 0 0; 
    }
    .username{
        display: inline-block;
    font-family: monospace;
 
    padding: 0 15px;
    font-weight: 600;
    }
    @media  screen and (max-width: 600px ) {
        .ppic{
            float: left;
        }
        .username{
            margin: revert;

        }
    }
    #hr{
    border-top: 1px solid black!important;
    }
</style>

<body>
    <?php include "./components/navbar.php"; ?>
    <!-- Page Container -->
    <div id="profile" class=" w3-content" style="background : #00b4e6;max-width:100vw; margin-top: -30px;">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div style="background : #00b4e6;" class="w3-col m3">
                <!-- profile -->

                <?php
                include "conn.php";
                $id = $_GET['userid'];
                $sql = "SELECT * FROM `register` WHERE `sno.`= $id";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $id2 = $row['sno.'];
                        $dob = $row['dob'];


                        echo ' 
                <div style="background : #00b4e6;"class=" w3-round w3-white">
                    <div  style="background : #00b4e6;" class="w3-container profile">
                    <p class="w3-center"><img src="fookrey.png"  class="w3-circle ppic" style="height:100px;width:100px" alt="Avatar"></p>
                    <h4 class="w3-center username">' . $name . '</h4>
                    <hr>
                    <p><i class="fa fa-pencil fa-fw w3-margin-right  size"></i> ' . $email . '</p>
                     <p><i class="fa fa-home fa-fw w3-margin-right  size"></i> Indore, Mp</p>
                     <p><i class="fa fa-birthday-cake fa-fw w3-margin-right  size"></i>' . $dob . '</p>
                <i class="fa fa-comments w3-margin-right  size"></i><a style="padding: 2px 10px;
                background: black; color: white; font-weight: 600;text-decoration: none;border-radius: 5px;" 
                href="z_test.php?userid=' . $id2 . '">Chat</a>
                    </div>
                </div>
                  <br>';
                    }
                } else {
                    echo "no prfile yet";
                }

                ?>
                <br>

                <!-- Alert Box -->
                <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
                    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
                        <i class="fa fa-remove"></i>
                    </span>
                    <p><strong>Hey!</strong></p>
                    <p>People are looking at your profile. Find out who.</p>
                </div>

                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="">

                <di style="background : #00b4e6;" v class="w3-col m7 ">
                    <h1 class="w3-center">Posts</h1>

                    <!-- End Middle Column -->
                    <?php
                    include "conn.php";
                    $id = $_GET['userid'];
                    $sql = "SELECT * FROM `webposts` WHERE `user_id` = $id";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);

                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['webpost_title'];
                            $desc = $row['webpost_desc'];
                            $webid = $row['webspost_id'];
                            $dt = $row['dt'];
                            $datetime = new DateTime($dt);
                            $substr = substr($name, 0, 1);



                            echo '   <div style="border-radius:8px;" class="w3-container w3-card w3-white w3-round w3-margin"><br>
                              <a style="text-decoration:none" href="profile.php?userid=' . $id . '"><div class="w3-left w3-circle w3-margin-right" style="width: 60px; height: 60px; background-color: yellow;
                              border: 1px solid; text-align: center;vertical-align: middle;font-size: xx-large;">' . $substr . '</div></a>';


                            if ($_SESSION['id'] == $id) {

                                echo ' <a style="text-decoration:none" href="delete.php?webid=' . $webid . '"><span class="w3-right w3-opacity"><i class="fa fa-trash-o" style="font-size:36px"></i></span></a>';
                            }
                            echo  ' <a style="text-decoration:none" href="profile.php?userid=' . $id . '"><h3 id="uname"><span class=" w3-opacity">@</span>' . $name . '</h3></a><br>
                              <a style="text-decoration:none" href="post.php?userid=' . $id . '&webid=' . $webid . '">
                                    <hr id="hr">
                                    <h3>' . $title . '</h3>
                                    <p style="padding-bottom : 10px;">' . $desc . '</p>
                                    <button  id="like" type="button" class="w3-button w3-theme-d1 w3-margin-bottom" onclick="myfunction2()"><i class="fa fa-thumbs-up"></i>  Like</button>                                  
                                     <span style="margin-top:30px;" class="w3-right w3-opacity">' . $datetime->format('d-m-Y h:ia') . '</span></a>  </div>';
                        }
                    } else {
                        echo "no posts yet";
                    }

                    ?>
                </di>

            </div>


            <!-- Posts -->
            <!-- <div class="w3-card w3-round">
                <div class="w3-white">
                    <button onclick="myFunction()" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Posts</button>
                    <div id="Demo3" class=" w3-container" style="display:none;">
                        <div class="w3-row-padding">
                            <br> -->

            <?php
            //    include "conn.php";
            // $id = $_GET['userid'];
            // $sql = "SELECT * FROM `webposts` WHERE `user_id` = $id";
            // $result = mysqli_query($conn, $sql);
            // $num = mysqli_num_rows($result);

            // if ($num > 0) {
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         $title = $row['webpost_title'];
            //         $webid = $row['webspost_id'];


            //         echo '
            // <a href="post.php?userid=' . $id . '&webid=' . $webid . '"><div class="w3-half">
            //  <i class="fa fa-image w3-margin-bottom w3-jumbo"><p class="w3-medium">' . $title . '</p></i> 
            //  </div></a>';
            // }
            // } else {
            //     echo "no posts yet";
            // }

            // 
            ?>

            <!-- 
                        </div>
                    </div>
                </div> -->
        </div>
        <br>
    </div>
    </div>
    <?php include "./components/footer.php" ?>

    <script>
        function myfunction2() {
            document.getElementById("like").style.fontWeight = "bold";
            document.getElementById("like").innerHTML = "✓ Liked";
        }

        function myFunction() {
            var x = document.getElementById("Demo3");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>