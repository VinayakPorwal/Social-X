<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}


// echo"helo";

?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>

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

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-color: rgb(252, 21, 21);
            /* background-image: url("https://source.unsplash.com/random"); */
            min-height: 100%;
            z-index: 0;
            opacity: 55%;
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

        #anime {
            animation-name: disp;
            /* animation-delay: 3s; */
            /* animation-timing-function: 2s; */
            animation-iteration-count: 1;
            animation-duration: 6s;
            z-index: 2;
            /* animation-delay: 3s; */
            /* transition: 3s; */
            /* display: none; */
        }

        @keyframes disp {
            0% {
                opacity: 0;
                /* background-color: yellow; */
                display: none;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
                display: block;
                /* background-color: #00b4e6; */
            }

        }

        #intro {
            position: absolute;
            top: 50%;
            animation-name: introhide;
            animation-duration: 3.2s;
            z-index: -1;
            right: 200%;
            animation-timing-function: ease;

        }

        #intro b {
            animation-name: intro;
            animation-duration: 2.8s;
            animation-iteration-count: 1;
            font-family: "baloo bhai";

        }

        @keyframes intro {
            0% {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            20% {
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }

            30% {
                font-family: 'Courier New', Courier, monospace;
            }

            40% {
                font-family: 'Times New Roman', Times, serif;
            }

            50% {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }

            60% {
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }

            70% {
                font-family: cursive;
            }

            80% {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            90% {
                font-family: "Open Sans";
            }

            100% {
                font-family: "baloo bhai";
                left:-200%;
            }
        }
           @keyframes introhide {
               0%{
left:20%;
width:40vw;
               }
               90%{
width:40vw;
left:20%;
               }
               100%{
width:40vw;
                   left:20%;
               }
           }
    </style>
</head>

<body>
    <?php include './components/navbar.php'; ?>


    <?php
    if ($loggedin) {

        echo '<button id="#postbtn" onclick="document.getElementById(`id01`).style.display=`block`" class="w3-button w3-yellow w3-large" style=" padding: 15px 25px;
        display: block;
        position: fixed;
        top: 83%;
        border-radius: 50px;
        right: 38px;
             background-color: #00b4e6;">+</button>';
    }
    ?>


    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                <h2 style="width:30%" class="w3-circle w3-margin-top">Create Post</h2>
            </div>

            <?php
            if ($loggedin) {
                echo '  <form class="w3-container" method="POST" action="submit2.php">
                        <div class="w3-section">
                            <label><b>Title</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" id="title" placeholder="Enter Title" name="webpost_title" required>
                            <label><b>Description</b></label>
                            <input class="w3-input w3-border" type="text" placeholder="Enter Description" id="desc" name="webpost_desc" required>
                            <button class="w3-button w3-block w3-blue w3-section w3-padding" id="subpost" name="postsub" type="submit">Post</button>

                        </div>
                    </form>';
            }
            ?>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

            </div>

        </div>
    </div>
    <!-- Page Container -->
    <div id="top" class="w3-container w3-content" style="max-width:1400px; margin-top: -30px;">

        <!-- Middle Column -->
        <div class="">
            <h1 id="intro" class="w3-center">"Welcome to <b>Fookreywebs</b>"</h1>
            <div id="anime" class="w3-col m7 ">

                <h1 class="w3-center" style="margin-top: 25px;margin-bottom: -10px;">
                    <?php if ($loggedin) {
                        echo 'Top Posts';
                    } else {
                        echo "Demo post";
                    }
                    ?>
                </h1>

                <!-- End Middle Column -->



                <?php
                if ($loggedin) {
                    include "conn.php";
                    $sql = "SELECT * FROM `webposts`ORDER by `webspost_id` DESC";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);

                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['webpost_title'];
                            $desc = $row['webpost_desc'];
                            $id = $row['user_id'];
                            $webid = $row['webspost_id'];
                            $dt = $row['dt'];
                            $datetime = new DateTime($dt);

                            $sql2 = "SELECT * FROM `register` where `sno.` = $id ";
                            $result2 = mysqli_query($conn, $sql2);
                            $num2 = mysqli_num_rows($result2);
                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    $name = $row['name'];
                                }
                            }
                            $substr = substr($name, 0, 1);

                            echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style="border-radius: 12px;padding: 0.08em 16px;"><br>
                            <a style="text-decoration:none;" href="profile.php?userid=' . $id . '"><div class="w3-left w3-circle w3-margin-right" style="width: 60px; height: 60px; background-color: yellow;
                            border: 1px solid; text-align: center;vertical-align: middle;font-size: xx-large;">' . $substr . '</div></a>';

                            if ($_SESSION['id'] == $id) {

                                echo '<a style="text-decoration:none" href="delete.php?webid=' . $webid . '"><span class="w3-right w3-opacity"><i class="fa fa-trash-o" style="font-size:36px"></i></span></a>';
                            }
                            echo  '<a style="text-decoration:none" href="profile.php?userid=' . $id . '"><h3 id="uname"><span class="w3-opacity">@</span>' . $name . '</h3><br>
                            </a> 
                           <hr style="border-top: 1px solid #858585;" class="w3-clear">
                            <a style="text-decoration:none"href="post.php?userid=' . $id . '&webid=' . $webid . '">
                            <h3> ' . $title . '</h3>
                            <p style="padding-bottom : 10px; word-break:break-word;">' . $desc . '</p></a>';

                            $sql5 = "SELECT * FROM `comments` WHERE `post_id`=$webid";
                            $result5 = mysqli_query($conn, $sql5);
                            $num5 = mysqli_num_rows($result5);

                            //total likes
                            $sql6 = "SELECT * FROM `likes` WHERE `post_id`=$webid";
                            $result6 = mysqli_query($conn, $sql6);
                            $num6 = mysqli_num_rows($result6);

                            //user liked or not
                            $uid = $_SESSION['id'];

                            $sql7 = "SELECT * FROM `likes` WHERE `post_id`=$webid AND `user_id`=$uid";
                            $result7 = mysqli_query($conn, $sql7);
                            $num7 = mysqli_num_rows(mysqli_query($conn, $sql7));
                            // echo '<button onclick="showUser(this.id)" name="likebtn" type="button" style="background-color:white;font-size:large;padding: 4px 4px;margin: 0px 10px;" class="w3-button w3-left "  id="' . $webid . '">
                            // <b><i class="fa fa-thumbs-up w3-text-black"></i> ' . $num6 . '</button>
                            // ';
                            // <b><i class="fa fa-thumbs-up w3-text-black"></i> </b><span onclick="document.getElementById('.$webid.').click(this.id)"  id="s'.$webid.'" class="w3-tag w3-white"></span></button>

                            if ($num7 > 0) {
                                // echo ' <button name="likebtn" type="submit" style="background-color:white;font-size:large;padding: 4px 4px;margin: 0 0px;" class="w3-button w3-left " onclick="myFunction(`demo1`)" id="myBtn">
                                //  <b><i class="fa fa-thumbs-up w3-text-blue"></i> </b> <span class="w3-tag w3-white">' . $num6 . '</span></button>
                                //  ';
                                echo '<button onclick="showUser(this.id)" name="likebtn" type="button" style="background-color:white;font-size:large;padding: 4px 4px;margin: 0px 10px;" class="w3-button w3-left "  id="' . $webid . '">
                            <b><i class="fa fa-thumbs-up w3-text-blue"></i> ' . $num6 . '</button>
                            ';
                            } else {
                                //     echo '<button onclick="showUser()" name="likebtn" type="submit" style="background-color:white;font-size:large;padding: 4px 4px;margin: 0 0px;" class="w3-button w3-left " onclick="myFunction(`demo1`)" id="myBtn">
                                //      <b><i class="fa fa-thumbs-up w3-text-black"></i> </b> <span id="likecn" class="w3-tag w3-white"></span></button>
                                //    ';
                                echo '<button onclick="showUser(this.id)" name="likebtn" type="button" style="background-color:white;font-size:large;padding: 4px 4px;margin: 0px 10px;" class="w3-button w3-left "  id="' . $webid . '">
                            <b><i class="fa fa-thumbs-up w3-text-black"></i> ' . $num6 . '</button>
                            ';
                            }

                            echo '   <p style="background-color:white;font-size:large;padding: 4px 4px;margin: 0 0 10px 10px;" class="w3-button w3-left " onclick="myFunction22()" id="myBtn">
                            <b><i class="fa fa-comments w3-text-black"></i> </b> <span style="margin: 0 0px 0 -8px;" class="w3-tag w3-white">' . $num5 . '</span></p>

                            <form style="margin: 10px 0 0 0;"action="comment.php?postid=' . $webid . '" method="POST">
                            <textarea style="width: 85% ; border-radius: 10px;background-color:#dadadafa;display:block;"id="cmnt'.$webid .'" name="comment_desc" rows="1" cols="50" rquired></textarea>
                            <button style="display:block;
                            margin: -29px -3px;
                            border-radius: 20px;
                            font-size: xx-small;"id="cmntbtn'.$webid .'" type="submit"  value="send" name="cmntsub" class="w3-button w3-theme-d1  w3-right"><i class="fa fa-paper-plane"></i></button>
                            </form>
                            <span class="w3-right w3-opacity" style="margin-top: 10px;">' . $datetime->format('d-m-Y h:ia') . '</span>
                            </div>';

                        }
                    } else {
                        echo "no posts yet";
                    }
                } else {
                    //Demmo
                    echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style="border-radius: 12px;"><br>
                 <div class="w3-left w3-circle w3-margin-right" style="width: 60px; height: 60px; background-color: yellow;
                 border: 1px solid; text-align: center;vertical-align: middle;font-size: xx-large;">D</div>';



                    echo '<span class="w3-right w3-opacity"><i class="fa fa-trash-o" style="font-size:36px"></i></span>';

                    echo ' <h3 id="uname"><span class="w3-opacity">@</span>Dummy text</h3><br>
               
                  <hr class="w3-clear">
                  <h3> Some Title..</h3>
                 <p style="padding-bottom : 10px;">Some Description</p>
 
                 <button id="lk" onclick="myfnc()" 
                 type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                 <span class="w3-right w3-opacity" style="margin-top: 30px;">2 April 2002 5:00pm</span>
                 </div>';

                    echo ' <h2 class="w3-center">Announcement posts</h2>';
                    //post 2
                    echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style="border-radius: 12px;"><br>
              
                    <img src="./imgs/devloper.png" 
                    
                    class="w3-left w3-circle w3-margin-right" style="width: 60px;">
                   ';

                    echo ' <h3 id="uname" ><span class="w3-opacity">@</span>Admin</h3><br>
               
                 <hr class="w3-clear">
                 <h3> Delete post feaure </h3>
                 <p style="padding-bottom : 10px;">Delete button is also added 😼👉😎 and it is also secure process not anyone can delete your
                 data while your data is open too ...soon you have your private🔒 space Too 😉 Until stay Connected 🤝!<em><h5 class="w3-opacity">
                 note : Delete button will appear on posts that belongs to you only! for more details .. SEE DEMO POST</h5></em></p>

                 <button id="lk" onclick="myfnc()" 
                 type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                 <span class="w3-right w3-opacity" style="margin-top: 30px;">2 April 2002 5:00pm</span>
                 </div>';
                    //post 3
                    echo '<div class="w3-container w3-card w3-white w3-round w3-margin" style="border-radius: 12px;"><br>

                    <img src="./imgs/devloper.png" 

                    class="w3-left w3-circle w3-margin-right" style="width: 60px;">
                   ';

                    echo ' <h3 id="uname"><span class="w3-opacity">@</span>Admin</h3><br>
               
                 <hr class="w3-clear">
                 <h3> Home Scroll FEED </h3>
                 <p style="padding-bottom : 10px;">Hurray !! Our home is ready to serve you posts that belongs to you and your friends😉,
                 More Features to be Added Soon.. Stay Connected! <em><h5 class="w3-opacity">
                 note : untill you are logged in, You cannot post anything, and you will see only our Announcement and demo posts.
                 Login wihtout your ID PASSWORD or REGISTER with a new account to get connected with us😊💖</h5></em></p>

                 <button id="lk" onclick="myfnc()" 
                 type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
                 <span class="w3-right w3-opacity" style="margin-top: 30px;">2 April 2002 5:00pm</span>
                 </div>';
                }

                ?>
                <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> -->
            </div>
        </div>
    </div>


    <?php include "./components/footer.php"; ?>

    <script>
        function myfntc() {
            document.getElementById($webid).innerHTML = "✓ Liked";
        }

        function myFunction() {
            var x = document.getElementById("Demo3");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function myfunction22() {
            if (document.getElementById("cmntbx").style.display == "none") {
                document.getElementById("cmntbx").style.display = "block";
                document.getElementById("cmntbtn").style.display = "block";
            } else {
                document.getElementById("cmntbx").style.display = "none";
                document.getElementById("cmntbtn").style.display = "none";
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script>
        function showUser(id) {


            // console.log(int);
            // webid= intval(id);
            webid = id;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id).innerHTML = '<i style="margin: 0 5px 0 0;" class="fa fa-thumbs-up w3-text-blue"></i>' + this.responseText;
                }
            };
            xhttp.open("GET", "like.php?webid=" + id, true);
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();

        }

        function comments(){
            var comment_desc = document.getElementById('cmnt<?php echo $webid; ?>').value;
            var xhttp = new XMLHttpRequest();
            var webid = "<?php echo $webid; ?>";
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                comment_desc =  "";
                console.log(this.responseText);
                }
            };
            xhttp.open("POST", "like.php?webid=" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('?comment_desc='+comment_desc+'postid='+ webid );
        }
    </script>

</body>

</html>