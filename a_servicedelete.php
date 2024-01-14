<?php
include('db_con.php');
$svid = $_REQUEST["svid"];
$sql = "DELETE FROM `zamzimh_services` WHERE  `ServiceID`='$svid'";

if ($dbconn->query($sql) === TRUE) {
    $message = "Service deleted.";
    echo '<script>';
    echo 'alert("' . $message . '");';
    echo 'window.location.href = "Admin_Services.php";';
    echo '</script>';
}
else{
    $message = "Service in Use.";
    echo '<script>';
    echo 'alert("' . $message . '");';
    echo 'window.location.href = "Admin_Services.php";';
    echo '</script>';
    
}

?>