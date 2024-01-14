<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Zamzimh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert new user
    if ($_POST['action'] == 'insert') {
        $uName = $_POST['uName'];
        $uNumber = $_POST['uNumber'];
        $uEmail = $_POST['uEmail'];
        $uAddress = $_POST['uAddress'];
        $uPassword = $_POST['uPassword'];

        $sql = "INSERT INTO Zamzimh_User (U_Name, U_Number, U_Email, U_Address, U_Password) 
                VALUES ('$uName', $uNumber, '$uEmail', '$uAddress', '$uPassword')";

        $conn->query($sql);
    }

    // Update user
    elseif ($_POST['action'] == 'update') {
        $updateUserID = $_POST['updateUserID'];
        $updateUName = $_POST['uName'];
        $updateUNumber = $_POST['uNumber'];
        $updateUEmail = $_POST['uEmail'];
        $updateUAddress = $_POST['uAddress'];
        $updateUPassword = $_POST['uPassword'];

        $sql = "UPDATE Zamzimh_User 
                SET U_Name='$updateUName', U_Number=$updateUNumber, U_Email='$updateUEmail', 
                    U_Address='$updateUAddress', U_Password='$updateUPassword' 
                WHERE UserID=$updateUserID";

        $conn->query($sql);
    }
}

// Close connection
$conn->close();
?>
