<?php
session_start();
include "conn.php";
$message = $_POST['msg'];
//  $message = "hello";
// echo $message;
  $user1 = $_SESSION['id'];
  // $user1 = 30;
// $user1 = 2;
$user2 = $_POST['user2'];
//  $user2 = 4;
// echo $user2;


$sql = "INSERT INTO `user_data` (`message`, `user1`, `user2`) VALUES ('$message', '$user1', '$user2')";
$result = mysqli_query($conn, $sql);
// $num = mysqli_num_rows($result);
if ($result) {
    echo "success </br>";
} else {
    echo "error";
}




