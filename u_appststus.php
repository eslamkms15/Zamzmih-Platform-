<?php
include('db_con.php');
$aid = $_REQUEST["aid"];
$a_status = $_REQUEST["a_status"];
$n_text = "User withdraw his request.";
$uid = $_REQUEST["uid"];
$sid = $_REQUEST["sid"];

$sql = "UPDATE `zamzimh_appointment` SET `A_Status`='$a_status' WHERE `ApptID` ='$aid'";

if ($dbconn->query($sql) === TRUE) {

    $sql = "INSERT INTO `zamzimh_notification`
    ( `N_Text`, `N_Flag`, `N_Receiver`, `ApptID`, `SupplierID`, `UserID`) 
    VALUES ('$n_text','unread','User','$aid','$sid','$uid')";

    if ($dbconn->query($sql) === TRUE) {
        echo "Status changed & suer notified.";
        header('location:u_appointments.php');

    } else {
        echo "Error: " . $sql . "<br>" . $dbconn->error;
    }
}


?>