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
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>

  <title>weather info</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Nunito", sans-serif;
      background: #f8f8f8;
    }

    .input {
      text-align: center;
      margin: 100px auto;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="submit"] {
      padding: 10px 25px;
      background: #e7e7e7;
      border: none;
      border-radius: 1px;
      font-family: "Nunito", sans-serif;
      font-weight: bold;
      font-size: 20px;
      width: 20%;
    }

    .input input[type="text"] {
      width: 600px;
      height: 55px;
      padding: 5px 10px;
      background: #e7e7e7;
      border: none;
      border-radius: 1px;
      font-family: "Nunito", sans-serif;
      font-weight: bold;
      font-size: 20px;
      max-width: 600px;
    }

    .card {
      width: 50%;
      background: #e7e7e7;
      height: 40vh;
      margin: 50px auto;
      border-radius: 2px;
    }


    .close {
      float: right;
      margin-top: -2px;
      cursor: pointer;
      margin-right: 20px;
    }

    .card h1 {
      padding: 15px 0;
      text-align: center;
    }

    .card p {
      text-align: center;
      margin: 25px 0;
      font-size: 20px;
    }

    #but {
      padding: 10px 25px;
      background: #e7e7e7;
      border: none;
      border-radius: 1px;
      font-family: "Nunito", sans-serif;
      font-weight: bold;
      font-size: 20px;
      width: 20%;
    }
  </style>
</head>

<body style="background: #00b4e6;">
  <?php include  "./components/navbar.php"; ?>
  <div class="main">
    <!-- <div class="header">
      <h1>OpenWeatherMap API</h1>
      <p>Enter any city name in the input box below to get the data</p>
    </div> -->

    <div class="input">
      <input style="
      width: 80%;
      border-radius: 8px;" type="text" placeholder="Enter the city" class="input_text">
      <input style="
      border-radius: 11px;
  
      margin: 18px 0 0 0px;" type="submit" value="Submit" class="submit">

    </div>
  </div>

  <div class="container">
    <div style="
        border: 1px solid;
        border-radius: 40px 0 40px 0;" class="card">
      <h1 class="name" id="name">none</h1>
      <p class="temp">00</p>
      <p class="clouds">none</p>
      <p class="desc">none</p>
    </div>
  </div>
  <?php include "./components/footer.php"; ?>
  <script src="app.js"></script>

</body>

</html>