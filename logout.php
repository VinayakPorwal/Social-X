<?php

session_start();
include "conn.php";
$idq =  $_SESSION['id'];
$sqlq = "UPDATE `register` SET `stat` = '0' WHERE `sno.` = '$idq' ";
$resultq = mysqli_query($conn,$sqlq);
if($resultq){

    $_SESSION=[];
    session_unset();
    session_destroy();
    
    header("location: index.php");
}
else{
    echo"no";
}
exit;
?>