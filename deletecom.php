
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
    exit;
}
?>
<?php
include "conn.php";

$id = $_GET['commentid'];
// echo "$id";
$sql2 = "SELECT * FROM `comments` WHERE `comment_id` = $id";
$result = mysqli_query($conn, $sql2);
$num = mysqli_num_rows($result);
if ($num != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['user_id'];
    }
}
if ($_SESSION['id'] == $userid) {

    // sql to delete a record
    $sql = "DELETE FROM `comments` WHERE `comment_id` = $id";

    if (mysqli_query($conn, $sql)) {

        echo '<script>
        window.history.back();
        </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Cant delete this data , may be it belongs to someone else!!";
}

mysqli_close($conn);




?>