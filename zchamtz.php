<?php
include "conn.php";
session_start();
$user1 = $_SESSION['id'];
// $user1 = 30;
// echo $user1;
// $user2 = 64;
$user2 = $_GET['userid'];
$sql = "SELECT * FROM `register` WHERE `sno.`= $user2 ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $stat = $row['stat'];
}
$substr = substr($name, 0, 1);

echo '<div id= "profile">
        <a style="text-decoration:none;" href="profile.php?userid=' . $user2 . '">';
if ($stat == 1) {
    echo "<div style='
                width: 8px;
                height: 8px;
                border-radius: 50px;
                display: inline-block;
                color: red;
                background: green;'></div>";
} else {
    echo "<div style='
                width: 8px;
                height: 8px;
                border-radius: 50px;
                display: inline-block;
                color: red;
                background: red;'></div>";
}
echo '    <div class=" w3-circle w3-center" 
                style="width: 30px;
                height: 30px; 
                background-color: yellow;
                margin:auto;
                border: 1px solid;
                text-align: center;
                vertical-align: middle;
                font-size: large;
                display:inline-block">' . $substr . '
            </div>
        </a>' . $name;

echo '</div> ';
$sql2 = "SELECT * FROM `user_data` where `user1`= $user1  AND `user2`=$user2 or `user1`= $user2  AND `user2`=$user1 order by `id` ASC";
$result2 = mysqli_query($conn, $sql2);
$num = mysqli_num_rows($result2);
if ($num > 0) {
    echo '<div id= "chatbody" style="height: 80vh;
                     margin: 0 0 -20px 0;
                     overflow-y: scroll;">';

    while ($row = mysqli_fetch_assoc($result2)) {
        $msg = $row['message'];
        $dt = $row['dt'];
        $datetime = new datetime($dt);
        $la_time = new DateTimeZone('Asia/Kolkata');
        $datetime->setTimezone($la_time);
        if ($row['user1'] == $user1) {
            // echo $row['user1'];
            echo '<div style="text-align: -webkit-right;">
                            <p style="background: aqua;
                                        padding: 2px 10px;
                                        margin: 10px 10px 10px 0px;
                                        max-width: 65vw;
                                        word-wrap: break-word;
                                        text-align:justify;
                                        width: fit-content;
                                        border-radius: 6px 0px 6px 6px;">' . $msg . '
                                        <span class=" w3-opacity" style="font-size : x-small;
                                            margin: 9px 0px 2px 5px;">' . $datetime->format('h:ia') . '
                                        </span>
                            </p>
                        </div>';
        }
        // <span style="position: absolute;
        //     margin-top: -6px;
        //     right: 0px;
        //     border-left: 12px solid transparent;
        //     border-right: 24px solid transparent;
        //     border-bottom: 14px solid #00ffff;
        //     transform: rotate(-32deg);z-index: -1"></span>
        else {
            echo '<div>
                            <p style="background: #c5d8d8;
                                        padding: 2px 10px;
                                        margin: 10px 0 10px 10px;
                                        max-width: 70vw;
                                        text-align:justify;
                                        word-wrap: break-word;
                                        width: fit-content;
                                        border-radius: 0px 6px 6px 6px;">
                                   ' . $msg . '
                                    <span class=" w3-opacity" style="font-size : x-small;
                                        margin: 9px 0px 2px 5px;">' . $datetime->format('h:ia') . '
                                    </span>
                            </p>
                        </div>';
        }
        // <span style="position: absolute;
        // margin-top: -2px;
        // left: 0px;
        // border-left: 24px solid transparent;
        // border-right: 12px solid transparent;
        // border-top: 14px solid #c5d8d8;
        // transform: rotate(3deg);
        // z-index: -1;">
        //  </span>
    }
    echo "</div>";
} else {
    echo ' <div  id= "chatbody" style="text-align :center;padding: 0 20px;">no chat history found ! Say hello to ' . $name . '</div><br>';
}
// $sql3 = "SELECT * FROM `user_data` where ";
// $result3 = mysqli_query($conn, $sql3);
// $num2 = mysqli_num_rows($result3);
// if ($num2 > 0) {
//     echo'<div >';
//     while ($row = mysqli_fetch_assoc($result3)) {

//         $msg = $row['message'];
//         echo"<div>". $msg . "</div></br></br>";
//     }
//     echo"</div>";

// }
