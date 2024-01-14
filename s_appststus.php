<?php
include('db_con.php');
$aid = $_REQUEST["aid"];
$uid = $_REQUEST["uid"];
$sid = $_REQUEST["sid"];
$a_status = $_REQUEST["a_status"];
$n_text = "";
if ($a_status == "Accepted") {
    $n_text = "Your request is accepted please proceed for payment.";
} else if ($a_status == "Unavailble") {
    $n_text = "Your selected slot is unavailable please select another slot.";
} else if ($a_status == "Rejected") {
    $n_text = "We are extremly sorry, we are not able to deliver your request.";
} else if ($a_status == "On Hold") {
    $n_text = "You booking is on hold, we will soon schedule your supply.";
} else if ($a_status == "Scheduled") {
    $n_text = "You supply is scheduled, you will shortly recive it.";
} else {
    $n_text = "Order is completed successfully.";
}




$sql = "UPDATE `zamzimh_appointment` SET `A_Status`='$a_status' WHERE `ApptID` ='$aid'";
if ($dbconn->query($sql) === TRUE) {

    $sql = "INSERT INTO `zamzimh_notification`
    ( `N_Text`, `N_Flag`, `N_Receiver`, `ApptID`, `SupplierID`, `UserID`) 
    VALUES ('$n_text.','unread','User','$aid','$sid','$uid')";

    if ($dbconn->query($sql) === TRUE) {
        echo "Status Changed & User Notified";
        header('location:s_appointments.php');

    } else {
        echo "Error: " . $sql . "<br>" . $dbconn->error;
    }
}

?>