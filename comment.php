<?php
session_start();
include "conn.php";
$postid = $_GET['postid'];
$comment= (isset($_REQUEST['comment_desc']) ? $_REQUEST['comment_desc'] : null);
// $comment_desc = $_POST['comment_desc'];
// $comment= "HEllo";
$userid = $_SESSION['id'];


$sql = "INSERT INTO `comments` ( `comment_desc`, `user_id`, `post_id`) 
VALUES ( '$comment', '$userid', '$postid')";
$result = mysqli_query($conn, $sql);
if ($result) {
  // echo "<h1>Comment posted</h1>";
  echo'<script>
  window.history.back();
  </script>';
} else {
    echo "not posted";
}
?>