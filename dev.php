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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css"> -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Devlopers</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: #3e3f40;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        #devImg {
            height: 60px;
            border-radius: 50px;
            border: 1px solid;
            margin: 10px;
        }

        h3,
        h4,
        h5 {
            margin: 2px 0px 2px 13px;
            color: antiquewhite;
        }

        code {
            /* margin: 0 0 0 10px; */
            color: white;
        }

        h4 a {
            text-decoration: none;
            color: white;
            font-style: italic;
        }
        li a{
            text-decoration: none;
            color: white;
        }

        li {
            margin: 10px 0 0 10px;
            list-style: none;
        }

        code span {
            background-color: #7085e7;
            border-radius: 8px;
            padding: 1px 5px;
            margin: 0px;
        }

       #chathook #projectImg {
            height: 80px;
            border-radius: 50px;
            /* border: 1px solid; */
        }
       #fookreywebs #projectImg {
            height: 80px;
            border-radius: 50px;
            border: 1px solid;
        }

        #devName {
            /* padding: 5px 0; */
            margin: 0px !important;
        }

        #desc {
            color: white;
            margin: 10px 10px 10px 20px;
            max-width: 800px;
            text-align: justify;
            font-size: smaller;
        }

        #desc em {
            color: yellow
        }

        html {
            scroll-behavior: smooth;
        }
       
    </style>
</head>

<body>
    <?php include "./components/navbar.php"; ?>
    <div style="display: flex;">
        <img src="./imgs/devloper.png" id="devImg" alt="">
        <div style="margin: 10px 0px 0 6px;">
            <code>
                <span> <i style="font-size: x-small; padding:0 4px" class="fas fa-code branch"></i>Devloper</span>
            </code>
            <h3 id="devName">Vinayak porwal</h3>
        </div>

    </div>
    <hr style=" width: 95vw;
    opacity: .5;
    background-color: #878080;
    margin: 5px auto;">
    <div>
        <p id="desc">I am a full Stack Devloper With some knowledge of MERN stack and other programing languages as well.I started a project of fully functional Social media Site with focus on each and every user's needs/requirements from a Social site . Created <em>Fookreywebs</em>. Later created <em>ChatHook </em>As a minor projects.</p>
        <h3>Projects</h3>
        <ul>
            <li>
                <a href="#fookreywebs">
                    > FookreyWebs
                </a>
            </li>
            <li>
                <a href="#chathook">
                   > Chathook
                </a>
            </li>
        </ul>

        <!-- projects -->
        <div id="fookreywebs">

            <img id="projectImg" src="./imgs/fookrey.png" alt="">
            <h4><i style="font-size: small; padding:0 4px" class="fas fa-link"></i><a href="http://localhost/projects/site_with_php/">FookreyWebs <i style="font-size: small" class="fas fa-external-link-alt"></i></a></h4>
            <h5>Languages Used : </h5>
            <code>
                <ul style="margin: 0px 0px 30px 5px">
                    <li><i class="fab fa-html5"></i> HTML </li>
                    <li><i class="fab fa-css3"></i> CSS</li>
                    <li><i class="fab fa-js-square"></i> JavaScript (AJAX & APIs)</li>
                    <li><i class="fab fa-php"></i> PHP </li>
                    <li><i class="fas fa-database"></i> MySQL </li>
                </ul>
            </code>
        </div>
        <!-- project2 -->
        <div id="chathook">

            <img id="projectImg" src="./imgs/logo.png" alt="">
            <h4 id="chathook"><i style="font-size: small; padding:0 4px" class="fas fa-link"></i><a href="http://localhost/projects/chathook/entrypage.php">Chathook <i style="font-size: small" class="fas fa-external-link-alt"></i></a></h4>
            <h5>Languages Used : </h5>
            <code>
                <ul style="    margin: 0px 0px 30px 5px">
                    <li><i class="fab fa-html5"></i> HTML </li>
                    <li><i class="fab fa-css3"></i> CSS</li>
                    <li><i class="fab fa-js-square"></i> JavaScript (Ajax & APIs)</li>
                    <li><i class="fab fa-php"></i> PHP </li>
                    <li><i class="fas fa-database"></i> MySQL </li>
                </ul>
            </code>
        </div>
    </div>
    <?php include "./components/footer.php"; ?>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

</html>