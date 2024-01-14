<?php
$sname = "localhost";
$uname = "root";
$pwd = "";
$dbname = "Zamzimh";


$dbconn = new mysqli($sname, $uname, $pwd, $dbname);
// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

?>