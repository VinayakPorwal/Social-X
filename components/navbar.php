<?php

if (!isset($_SESSION['loggedin'])) {
    $loggedin = false;
} else {
    $loggedin = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        /* navbar items */
        #id {
            padding-top: 3px;
        }


        #id a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            background-color: rgb(0, 255, 0);
            border-radius: 2px 8px 8px 2px;
            border: 1px solid black;
            padding: 5px 5px 5px 7px;
            margin-left: -13px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        #img {
            padding: 3px 8px 0 8px;
            z-index: 1;
            border: 1px;
            background-color: transparent;
        }

        #im1 {
            border: 1px solid;
            border-radius: 50px;
            width: 40px;

        }

        #n {
            z-index: 2;
            overflow: hidden;
            align-items: center;
            display: flex;
            top: 0px;
            position: sticky;
            padding: 0 0 2px 0;
        }

        #n::before {
            content: "";
            background-color: #f5f9ff;
            position: absolute;
            top: 0px;
            left: 0px;
            height: 100%;
            width: 100vw;
            z-index: -1;
            opacity: 10;
            border-bottom: 1px solid;

        }

        #n ul {
            display: flex;
            margin-left: auto;
        }

        #n ul li {
            list-style-type: none;
            padding: 10px;
            align-items: center;
        }

        #n ul li a {

            border-radius: 15px;
            display: block;
            color: rgb(3, 3, 3);
            font-family: 'Baloo bhai';
            text-decoration: none;
            font-size: 18px;
        }

        #n ul li a:hover {
            color: rgb(255, 0, 0);
        }

        #n ul li a:active {
            color: rgb(255, 0, 0);
            font-style: italic;
        }

        @media screen and (max-width: 480px) {
            #n ul {
                display: none;
            }


        }

        @media screen and (min-width: 480px) {
            #sidebtn {
                display: none;
            }

            #mySidebar {
                display: none;
            }

        }

        #sidebtn {
            /* display: none; */
            position: absolute;
            right: 10px;
            color: #030303;
            background-color: rgb(255, 255, 255);
            font-size: 18px;
            cursor: pointer;
            border-radius: 3px;
            padding: 1px 4px;
            margin-top: -17px;
        }

        .sidebar {
            height: 100%;
            /* 100% Full-height */
            width: 43%;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 2;
            /* Stay on top */
            top: 0;
            right: 0;
            background-color: #111;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidebar */
        }

        #mySidebar {
            display: none;
        }

        #mySidebar ul li a {
            border-radius: 15px;
            display: block;
            color: rgb(255, 255, 255);
            font-family: 'Baloo bhai', cursive;
            text-decoration: none;
            font-size: 18px;
            z-index: 2;
        }

        #mySidebar ul {
            display: flex;
            flex-direction: column;
            margin: auto;
            align-items: center;
            margin-top: -22px;
        }

        .closebtn {
            position: absolute;
            top: -10px;
            margin: 20px 10px;
            color: #f5f9ff;
            text-decoration: none;
            font-size: xx-large;
        }
    </style>

</head>

<body>
    <?php
    echo '<nav id="n">';
    if ($loggedin) {
        $_SESSION['stat'] = "<div id='stat'></div>";



        echo $_SESSION['stat'];
        echo "<script>
var stat = navigator.onLine;
if (stat) {
    document.getElementById('stat').innerHTML =  
    `<div style='
                width: 10px;
                height: 10px;
                border-radius: 50px;
                display: inline-block;
                position: absolute;
                background: green;
                left: 38px;
                z-index: 5;
                top: 34px;'></div>`;
} else {
    document.getElementById('stat').innerHTML =  
   `<div style='width: 10px;
                height: 10px;
                border-radius: 50px;
                position: absolute;
                background: red;
                left: 38px;
                z-index: 5;
                top: 34px;'></div>`;}";
        echo "console.log(navigator.onLine)</script>";
        echo '<a id="img" href="profile.php?userid=' . $_SESSION['id'] . '">';
    } else {
        echo ' <a id="img" href="">
        ';
    }
    echo '<img id="im1" src="./imgs/fookrey.png" alt="Img1"></a>';
    if ($loggedin) {
        echo  "<div id='id'><a href='#footr'>";
        echo $_SESSION['name'];
        echo "</a></div>";
    } else {
        echo '<div id="id"><a href="#footr"> Login/Signup</a></div>';
    }

    echo ' <ul class="nav">
            <li><a href="./index.php">Home</a>
            </li>
            <li><a href="./about.php">About</a>
            </li>';
    if ($loggedin) {
        echo '<li><a href="./private.php">Profiles</a>
                    </li>';
    }

    echo '<li> <a href="./messenger.php"> Chat</a>
            </li>
        </ul>
        <div class="main">
            <button onclick="sidenav()" id="sidebtn">&#9776</button>
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <ul class="nav2">
                    <li><a href="./index.php">Home</a>
                    </li>
                    <li><a href="./about.php">About</a>
                    </li>
                    <li> <a href="./messenger.php"> Chat</a>
                    </li>';
    if ($loggedin) {
        echo '<li><a href="./private.php">Profiles</a>
                    </li>';
    }

    echo '  </ul>
            </div>
        </div>

    </nav>';
    ?>
    <script>
        function sidenav() {
            document.getElementById("mySidebar").style.display = "block";
        };

        function closeNav() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>

</html>