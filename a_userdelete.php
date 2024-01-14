<?php
include('db_con.php');
$UserID = $_REQUEST["UserID"];
$sql = "DELETE FROM `zamzimh_user` WHERE  `UserID`='$UserID'";

if ($dbconn->query($sql) === TRUE) {
    $message = "User deleted.";
    echo '<script>';
    echo 'alert("' . $message . '");';
    echo 'window.location.href = "a_users.php";';
    echo '</script>';
}
else{
    $message = "user has Order.";
    echo '<script>';
    echo 'alert("' . $message . '");';
    echo 'window.location.href = "a_users.php";';
    echo '</script>';
    
}

?>

?>