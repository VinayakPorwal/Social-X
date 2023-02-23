<?php

session_start();
include_once "conn.php";
$user1 = $_SESSION['id'];
$sql = "SELECT * FROM register ORDER BY `sno.` DESC";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    
    
    while($row = mysqli_fetch_assoc($query)){
        $user2 =$row['sno.'];
        echo $user1;
        echo $user2;
        $sql2 = "SELECT * FROM user_data WHERE user2 = $user2 OR user1 =$user1 AND user1 =$user2 OR user2 =$user1 ORDER BY dt DESC LIMIT 1;";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0) {
            if(($row2['user1']==$user1 && $row2['user2']==$user2) || ($row2['user1']==$user2 && $row2['user2']==$user1  ))
            {

                
                $result = $row2['message'] ;
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
       
                echo '<a href="z_test.php?userid='. $row['sno.'] .'">
                <div class="content">
               
                <div class="details">
                <span>'. $row['name'] .'</span>';
                if($row2['user1']==$user1){

                   echo '<p>You:'. $msg .'</p>';
                }else{
                   echo '<p>'. $msg .'</p>';
                    
                }
                echo'
                </div>
                </div>
                
                </a>';
            }else{
                $msg = "no msg found";
                echo '<a href="z_test.php?userid='. $row['sno.'] .'">
                <div class="content">
               
                <div class="details">
                <span>'. $row['name'] .'</span>
                <p>'. $msg .'</p>
                </div>
                </div>
                
                </a>';
                
            }
        } 
        else{
             $result ="No message available";
        } 

        // ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        // ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
     
        $msg=" ";
        $result=" ";
    }
}

