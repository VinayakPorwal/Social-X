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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <title>fookreywebs</title>
    <style>
        /* home items */

        #home {

            overflow: hidden;
            height: 100vh;
            width: 100vw;
            background-color: #00b4e6;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;

        }



        #name {
            text-align: center;

            font-family: 'baloo bhai', cursive;
            font-weight: 400;
            font-size: 40px;
            position: absolute;
            top: 20%;
            left: 10%;
            right: 10%;
            transition: 1s;
        }

        #name:hover {
            color: rgb(207, 240, 18);
            text-shadow: 3px 3px rgba(0, 0, 0, 0.8);


        }

        #int {
            padding: 5px 10px;
            border-radius: 5px;

        }

        #input {
            position: absolute;
            top: 40%;
            display: flex;
            flex-direction: column;
            margin: 10px;

        }

        #answer {
            padding: 12px 90px;
            background-color: white;
        }

        #ans {
            text-align: center;
            font-family: 'baloo bhai', cursive;
            font-weight: 200;
            font-size: 20px;
            transition: 1s;
            color: rgb(207, 240, 18);
            text-shadow: 3px 3px rgba(0, 0, 0, 0.8);
            margin: 60px 10px 2px 10px;

        }



        #answerarea {
            display: none;
            flex-direction: column;
            align-items: center;
        }


        #back2 button a {
            text-decoration: none;
            color: white;
        }

        #back2 button {
            border-radius: 5px;
            background-color: black;
            padding: 4px 16px;
        }

        #back2 {
            position: absolute;
            top: 80%;
            display: flex;
            flex-direction: column;
            margin: 10px;
        }

        #enter {
            padding: 7px 20px;
            border-radius: 7px;
            margin: auto;
            display: block;
            margin-top: -20px;
            background-color: rgb(255, 251, 0);
            border: 0px;
            transition: 0.4s;
        }
    </style>
</head>

<body>
    <?php include "./components/navbar.php"; ?>
    </nav>

    <section id="home">

        <div>

            <label for="int" id="name">Enter Decimal Number</label>
        </div>
        <div id="input">

            <input type="int" name="int" id="int">
            <br>
            <button id="enter" type="submit" onclick="func1()">Enter</button>
        </div>

        <div id="answerarea">
            <label id="ans">ANSWER :</label>
            <p id="answer"></p>
        </div>
        <div id="back2">
            <button><a href="/index.php">exit</a></button>
        </div>
    </section>

    <?php include "./components/footer.php"; ?>
    <script>
        function func1() {
            entry = parseInt(document.getElementById("int").value);
            document.getElementById("answerarea").style.display = "flex";
            const result = entry.toString(2);
            document.getElementById("answer").innerHTML = result;
            //    alert("your binary number is :" +  result);
        }
    </script>

</body>

</html>