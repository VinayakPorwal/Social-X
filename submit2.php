
 <?php
//  echo"hello";
session_start();


          include "conn.php";
            $webtitle = (isset($_POST['webpost_title']) ? $_POST['webpost_title'] : null);
            $webdesc = (isset($_POST['webpost_desc']) ? $_POST['webpost_desc'] : null);
            $userid = $_SESSION['id'];

            if (isset($_REQUEST['postsub'])) {

                $sql = "INSERT INTO `webposts`(`webpost_title`,`webpost_desc`,`user_id`)
                VALUES ('$webtitle' , '$webdesc' , '$userid')";
                $result = mysqli_query($conn, $sql);


                if ($result) {
                    
                    echo'<script>
                    window.history.back();
                    </script>';
                    // echo"ho gya";
                } else {
                    echo "not posted";
                }
            }
?>