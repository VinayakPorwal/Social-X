<!DOCTYPE html>
<html lang="en">

<head>
   
    <style>
        #in {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }


        #login {
            padding: 7px 20px;
            border-radius: 7px;
            margin-left: auto;
            display: block;
            margin-top: 20px;
            border: 0px solid white;
            background-color: #00b4e6;
            transition: 0.4s;
        }

        #signup {
            padding: 7px 20px;
            border-radius: 7px;
            margin-right: auto;
            display: block;
            margin-top: 20px;
            background-color: rgb(255, 251, 0);
            border: 0px;
            transition: 0.4s;
        }


        #signup a {
            text-decoration: none;
            color: black;
            font-size: 15px;
            font-style: oblique;
            font-weight: 500;

        }

        #login a {
            text-decoration: none;
            color: black;

            font-size: 15px;
            font-style: oblique;
            font-weight: 500;
        }

        #logout {
            padding: 7px 20px;
            border-radius: 7px;
            margin: auto;
            display: block;
            margin-top: 20px;
            background-color: rgb(236, 75, 0);
            border: 0px;
            transition: 0.4s;
        }

        #logout a {
            text-decoration: none;
            color: rgb(231, 223, 223);

            font-size: 15px;
            font-style: oblique;
            font-weight: 500;
        }

        #center {
            padding: 7px 0px;
            color: #fff;
            margin-top: 20px;
            font-size: 0.7rem;
            transition: 1s;
        }
    </style>
</head>

<body>
    <footer id="footr" class="w3-center w3-black " style=" padding: 21px 15px;">
        <a href=" #top" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <!-- <div class="w3-xlarge w3-section">
            <i class="fa fa-facebook-official w3-hover-text-yellow"></i>
            <i class="fa fa-instagram w3-hover-text-yellow"></i>
            <i class="fa fa-snapchat w3-hover-text-yellow"></i>
            <i class="fa fa-pinterest-p w3-hover-text-yellow"></i>
            <i class="fa fa-twitter w3-hover-text-yellow"></i>
            <i class="fa fa-linkedin w3-hover-text-yellow"></i>
        </div> -->
        <p style="margin: 10px 0 0 0;">Handling by <a href="https://fookreywebs.epizy.com/" title="FookreyWebs" style="text-decoration:none" target="_blank" class="w3-hover-text-yellow">FookreyWebs</a></p>
        <?php if (!$loggedin) {
            echo '
                <div id="in">
            <button onmouseover="myfunc2()"  id="login"><a href="./login.php"> Login</a></button>
            <span id="center">-------------------------</span>
            <button onmouseover="myfunc()"  id="signup"><a href="./register.php">
                    Register</a></button>
        </div>';
        } else {
            echo ' <button id="logout"><a href="./logout.php">
            Logout</a></button>';
        }
        ?>
    </footer>
    <script>
        // var color = document.getElementById("login").style.backgroundColor;
        // var color2 = document.getElementById("signup").style.backgroundColor;

        function myfunc() {
            if (document.getElementById("signup").style.backgroundColor = "rgb(255, 251, 0)") {

                document.getElementById("signup").style.backgroundColor = "#00b4e6";
                document.getElementById("login").style.backgroundColor = "rgb(255, 251, 0)";
            }
        }

        function myfunc2() {
            if (document.getElementById("login").style.backgroundColor = "rgb(255, 251, 0)") {

                document.getElementById("login").style.backgroundColor = "#00b4e6";
                document.getElementById("signup").style.backgroundColor = "rgb(255, 251, 0)";
            }
        }
    </script>
</body>

</html>