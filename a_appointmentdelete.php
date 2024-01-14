<?php
include('db_con.php');
$ApptID = $_REQUEST["ApptID"];

$sql1 = "DELETE FROM `zamzimh_notification` WHERE  `ApptID`='$ApptID'";

if ($dbconn->query($sql1) === TRUE) {
}

$sql = "DELETE FROM `zamzimh_appointment` WHERE  `ApptID`='$ApptID'";

if ($dbconn->query($sql) === TRUE) {
    header('location:a_appointment.php');
}

?>