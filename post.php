<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta keywords="fookreywebs">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>fookreywebs</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }


        /* home items */
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


        body {
            font-family: "Open Sans";
            background-color: #00b4e6;
        }

        .w3-container,
        .w3-panel {
            padding: 2.01em 16px;
        }

        #uname {
            font-family: "Baloo bhai";
            font-size: 18px;
            font-weight: 500;
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php include './components/navbar.php'; ?>



<div id="top" class="w3-container w3- w3-content " style="width:94vw;border-radius:8px;background-color:#f0f0f0ed;min-height :100% ;margin-top: 10px;margin-bottom: 10px;">
  




    <?php
include "conn.php";

    $id = $_GET['userid'];
    $wid = $_GET['webid'];
    $sql = "SELECT * FROM `register` WHERE `sno.` = $id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
        }
    }
    $sql2 = "SELECT * FROM `webposts` WHERE `user_id` = $id AND `webspost_id`=$wid";
    $result2 = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result2);

    if ($num2 > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $title = $row['webpost_title'];
            $desc = $row['webpost_desc'];
            $webid = $row['webspost_id'];
            $dt = $row['dt'];
            $datetime = new DateTime($dt);
            $substr = substr($name, 0, 1);

            echo '
            <div>
            <a style="text-decoration:none" href="profile.php?userid=' . $id . '">
           <div class="w3-left w3-circle w3-margin-right" style="width: 60px; height: 60px; background-color: yellow;
             border: 1px solid; text-align: center;vertical-align: middle;font-size: xx-large;">' . $substr . '
             </div>
             <h3 id="uname"><span class="w3-opacity">@</span> ' . $name . '</h3></a>
               <hr style="border-top: 1px solid #858585;" class="w3-clear">
               <h3>' . $title . '</h3>
               <p style="padding:0 0 10px 0">' . $desc . '</p>
               <button id="like" type="button" class="w3-button w3-theme-d1 " onclick="myfunction21()"><i class="fa fa-thumbs-up"></i>Like</button>
               <button  type="button" class="w3-button w3-theme-d1 " onclick="myfunction22()"><i class="fa fa-comments"></i> Comment</button>';
               $sql5 = "SELECT * FROM `comments` WHERE `post_id`=$wid";
               $result5 = mysqli_query($conn, $sql5);
               $num5 = mysqli_num_rows($result5);
               
                echo'<p class="w3-right"><button style="padding: 7px 10px;" class="w3-button w3-left w3-black" onclick="myFunction(`demo1`)" id="myBtn"><b><i class="fa fa-comments"></i> </b> <span class="w3-tag w3-white">' . $num5 . '</span></button></p>
 
                <form style="margin: 10px 0 0 0;"action="comment.php?postid=' . $webid . '" method="POST">
                <textarea style="width: 85% ; border-radius: 10px;background-color:#ffffff;display:none;"id="cmntbx" name="comment_desc" rows="2" cols="50"></textarea>
                <button style="display:none;margin: -49px 0;"id="cmntbtn" type="submit" name="cmntsub" class="w3-button w3-theme-d1  w3-right" ><i class="fa fa-paper-plane"></i></button>
                </form> 
                <span id="datet2" style="margin : 5px 0px -8px 0px;" class="w3-right w3-opacity">' . $datetime->format('d-m-Y h:ia') . '</span>
           </div>
                     <div id="demo1" style="display:none;">';
        }
    } else {
        echo "no posts yet";
    }
    ?>
<!-- comment section -->
    <?php
   include "conn.php";


    $sql3 = "SELECT * FROM `comments` WHERE `post_id`=$wid";
    $result3 = mysqli_query($conn, $sql3);
    $num3 = mysqli_num_rows($result3);
    if (mysqli_num_rows($result3) > 0) {
        while ($row = mysqli_fetch_assoc($result3)) {
            $userid = $row['user_id'];
            $commid = $row['comment_id'];
            $comment = $row['comment_desc'];
            $dt = $row['dt'];
            $datetime2 = new DateTime($dt);

            $sql4 = "SELECT * FROM `register` WHERE `sno.` = $userid";
            $result4 = mysqli_query($conn, $sql4);

            if (mysqli_num_rows($result4) > 0) {
                while ($row2 = mysqli_fetch_assoc($result4)) {
                    $name2 = $row2['name'];
                }
            }
            $substr2 = substr($name2, 0, 1);
            echo '   
                            <pclass="w3-clear"></p>
                        <div class="w3-row w3-margin-bottom"  style="">
                            <hr style="border-top: 1px solid #858585;">
                            <div class="w3-full">
                            
                              <a style="text-decoration:none" href="profile.php?userid=' . $userid . '">
                              <div class="w3-left w3-circle w3-margin-right" style="width: 30px; height: 30px; background-color: yellow;
                              border: 1px solid; text-align: center;vertical-align: middle;margin: -5px 0px 0px 0px;">' . $substr2 . '</div>';
                              if ($_SESSION['id'] == $userid) {

                                echo '<a style="text-decoration:none" href="deletecom.php?commentid=' . $commid . '"><span style="margin: -16px 0px 0px 5px;"class="w3-right w3-opacity"><i class="fa fa-trash-o" style="font-size:25px"></i></span></a>';
                            }
                              echo'<h4 style="margin-top: -15px;margin-left:-12px;display:inline-block">' . $name2 . ' </h4></a>
                              <h6 style="margin-top: -15px;" class="w3-opacity w3-right  w3-small">' . $datetime2->format('d-m-Y h:ia') . '</h6>
                              <p>' . $comment . '</p>
                            </div>
                        </div>
                            ';
        }
    }           else {
                 echo "no Comments Yet";
                    }
    echo '</div>
    </div>';
    ?>


</div>

 <?php include "./components/footer.php"; ?>





    <script>
        // Toggle between hiding and showing blog replies/comments
        // document.getElementById("myBtn").click();


        var x = document.getElementById("demo1");

        function myFunction(id) {
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myfunction21() {
            document.getElementById("like").style.fontWeight = "bold";
            document.getElementById("like").innerHTML = "✓ Liked";
        }

        function myfunction22() {
            if(document.getElementById("cmntbx").style.display == "none"){
            document.getElementById("cmntbx").style.display = "block";
            document.getElementById("cmntbtn").style.display = "block";
        }
        else{
            document.getElementById("cmntbx").style.display = "none";
            document.getElementById("cmntbtn").style.display = "none";
        }
    }
    </script>
    <script>
        // Toggle between hiding and showing blog replies/comments
        document.getElementById("myBtn").click();
    </script>

</body>

</html>