<?php
include('db_con.php');
$svid = $_REQUEST["svid"];
$sql = "DELETE FROM `zamzimh_services` WHERE  `ServiceID`='$svid'";

if ($dbconn->query($sql) === TRUE) {
    header('location:s_service.php');
}

?>