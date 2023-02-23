<?php
// Create connection
include "conn.php";

$user =  $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject =  $_REQUEST['subject'];
$message = $_REQUEST['message'];

// Performing insert query execution
$sql = "INSERT INTO contact(name, email , subject , message)
VALUES ('$user','$email','$subject','$message')";





if ($conn->query($sql) === TRUE) {

    echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUBMITTED!</strong> Your response has been submitted successfully.
        <button onclick="my1()" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>submit page</title>
    <style>
        div {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        #img2{
            vertical-align: middle;
            border-radius: 0px 92px 0px 0px;
            height: 50vh;
            width: 50vh;
        }

        #img1 {
            height: 20vh;
            width: 45vw;
        }
    </style>
</head>

<body>
    <div>
        <img id="img1" src="./imgs/img2.png" alt="0">
        <br>
        <img id="img2" src="./imgs/img1.jpeg" alt="1">
    </div>
    <script>
        function my1() {
            document.getElementById("alert").style.opacity = '0';
        }
    </script>


</body>

</html>