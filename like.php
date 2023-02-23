<?php
session_start();


include "conn.php";
$uid = $_SESSION['id'];
// $uid = 47;
$webid=$_GET['webid'];
// $webid = 46;
// echo $webid;
$sql7 = "SELECT * FROM `likes` WHERE `post_id`=$webid AND `user_id`=$uid";
$result7 = mysqli_query($conn, $sql7);
$num7 = mysqli_num_rows($result7);
// echo $num7;
// echo $webid;
if ($num7 == 0 && $webid!=0) {
    
    include "conn.php";
    $sql8 = "INSERT INTO `likes`(`likecount`,`post_id`,`user_id`)
                      VALUES('1','$webid','$uid')";
    $result8 = mysqli_query($conn, $sql8);
    if ($result8) {
        // echo "liked";
        $sql = "SELECT * FROM `likes` WHERE post_id=$webid";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        echo `<b style="color: black ; font-size: large;
        padding : 0 0 0 4px;font-weight:600;">` .$num. `</b>`;
        // echo '<script>';
        // echowindow.location.assign("index.php");
        
        // echo '<script>';
       
    } else {
        echo "error";
    }
} else {
    echo "already liked";
    // echo '<script>';
    // window.location.assign("index.php");
    // echo '</script>';
}
