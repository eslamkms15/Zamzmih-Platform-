<?php
$sname = "localhost";
$uname = "root";
$pwd = "";
$dbname = "Zamzimh";

// Create connection
$dbconn = new mysqli($sname, $uname, $pwd);
// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Zamzimh";
if ($dbconn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $dbconn->error;
}

$dbconn->close();

// Now connect to database
$dbconn = new mysqli($sname, $uname, $pwd, $dbname);
// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_User(
	UserID INT(8) UNSIGNED AUTO_INCREMENT,
	U_Name VARCHAR(50) NOT NULL,
    U_Number INT(15) NOT NULL,
    U_Email VARCHAR(50) NOT NULL,
    U_Address VARCHAR(300) NOT NULL,
	U_Password VARCHAR(50) NOT NULL,
    PRIMARY KEY (UserID)
	) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table Zamzimh_User created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_Supplier(
	SupplierID INT(8) UNSIGNED AUTO_INCREMENT,
	S_Name VARCHAR(50) NOT NULL,
    S_Address VARCHAR(300) NOT NULL,
    S_Number INT(15) NOT NULL,
    S_Email VARCHAR(50) NOT NULL,
    S_Rgnum INT(15) NOT NULL,
	S_Password VARCHAR(50) NOT NULL,
    PRIMARY KEY (SupplierID)
	) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table Zamzimh_Supplier created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}



$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_Services(
	ServiceID INT(8) UNSIGNED AUTO_INCREMENT,
    Sv_Name VARCHAR(50) NOT NULL,
    Sv_area VARCHAR(300) NOT NULL,
    Sv_Price INT(8) NOT NULL,
    Sv_Status VARCHAR(20) NOT NULL,
    SupplierID INT(8) UNSIGNED,
    img VARCHAR(250) NOT NULL,

    PRIMARY KEY (ServiceID),
    FOREIGN KEY (SupplierID) REFERENCES Zamzimh_Supplier(SupplierID)
	) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table Zamzimh_Services created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}




$sql = "CREATE TABLE IF NOT EXISTS zamzimh_payment (
    payment_id int UNSIGNED AUTO_INCREMENT,
    Nameoncard varchar (250),
    cardnumber varchar (250),
    expmounth int,
    expyear int,
    cvv int,
    UserID int UNSIGNED ,
    PRIMARY KEY (payment_id),
    FOREIGN KEY (UserID) REFERENCES zamzimh_user(UserID) ) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table zamzimh_payment created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS zamaimh_neighborhood 
(
    `Ad_ID`	INT(8),
    `area`	VARCHAR(512),
    `neighborhood`	VARCHAR(512),
    PRIMARY KEY (Ad_ID)

)
";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table zamaimh_neighborhood created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_Appointment(
	ApptID INT(8) UNSIGNED AUTO_INCREMENT,
    Ad_ID INT(8) NOT NULL,
    A_Date date NOT NULL,
    A_Status VARCHAR(20) NOT NULL,
    A_Amount INT(8) NOT NULL,
    UserID INT(8) UNSIGNED,
    SupplierID INT(8) UNSIGNED,
    ServiceID INT(8) UNSIGNED,
    payment_id int UNSIGNED,
    PRIMARY KEY (ApptID),
    FOREIGN KEY (Ad_ID) REFERENCES zamaimh_neighborhood(Ad_ID),
    FOREIGN KEY (UserID) REFERENCES Zamzimh_User(UserID),
    FOREIGN KEY (SupplierID) REFERENCES Zamzimh_Supplier(SupplierID),
    FOREIGN KEY (ServiceID) REFERENCES Zamzimh_Services(ServiceID),
    FOREIGN KEY (payment_id) REFERENCES zamzimh_payment(payment_id)

) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table Zamzimh_Services created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}




$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_Notification(
	NotifID INT(8) UNSIGNED AUTO_INCREMENT,
    N_Text VARCHAR(200) NOT NULL,
    N_Flag VARCHAR(20) NOT NULL,
    N_Receiver VARCHAR(20) NOT NULL,
    ApptID INT(8) UNSIGNED,
    SupplierID INT(8) UNSIGNED,
    UserID INT(8) UNSIGNED,
    PRIMARY KEY (NotifID),
    FOREIGN KEY (UserID) REFERENCES Zamzimh_User(UserID),
    FOREIGN KEY (SupplierID) REFERENCES Zamzimh_Supplier(SupplierID),
    FOREIGN KEY (ApptID) REFERENCES Zamzimh_Appointment(ApptID)
) ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table Zamzimh_Notification created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS `feedback` (
    `FED_ID` int(11) NOT NULL AUTO_INCREMENT,
     `Name` varchar(255) NOT NULL,   
    `EMAIL` varchar(255) NOT NULL,
    `COMMENT` text NOT NULL,
     PRIMARY KEY  (FED_ID)
  ) 
   ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table feedback created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Zamzimh_admin (
    `ADMIN_ID` varchar(255) NOT NULL,
    `ADMIN_PASSWORD` varchar(255) NOT NULL,
    PRIMARY key (ADMIN_ID)
  ) 
   ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table admin created successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}

$sql = "INSERT INTO Zamzimh_admin (`ADMIN_ID`,`ADMIN_PASSWORD`) VALUES ('Admin','Admin')
   ";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table admin inserted successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}




$sql = "INSERT INTO `zamaimh_neighborhood` (`Ad_ID`, `area`, `neighborhood`) VALUES ('1', 'North', 'Adventures'), ('2', 'North', 'Granada'), ('3', 'North', 'Al-Aqiq'), ('4', 'North', 'Al-Muruj'), ('5', 'North', 'Prosperity'), ('6', 'North', 'Press'), ('7', 'North', 'Palms'), ('8', 'North', 'Al-Mulga'), ('9', 'North', 'Spring'), ('10', 'North', 'Eastern Palms'), ('11', 'North', 'Western Palms'), ('12', 'North', 'Roses'), ('13', 'North', 'Messengers'), ('14', 'South ', 'Al-Murwah'), ('15', 'South ', 'Casablanca'), ('16', 'South ', 'Azizia'), ('17', 'South ', 'Shubra'), ('18', 'South ', 'Al-Darihmiya'), ('19', 'South ', 'Al-Mansoura'), ('20', 'South ', 'Al-Yamama'), ('21', 'South ', 'Badr'), ('22', 'South ', 'Al-Fawaz'), ('23', 'South ', 'Healing'), ('24', 'South ', 'Namr'), ('25', 'South ', 'Factories'), ('26', 'South ', 'Hayer'), ('27', 'South ', 'Shamaisi'), ('28', 'South ', 'Swaidi'), ('29', 'South ', 'Shalan'), ('30', 'South ', 'Bin Turk'), ('31', 'West ', 'King Saud University'), ('32', 'West ', 'Arqah'), ('33', 'West ', 'Diriyah'), ('34', 'West ', 'Shubra'), ('35', 'West ', 'Dhahrat Al-Badia'), ('36', 'West ', 'Al-Urayja'), ('37', 'West ', 'Al-Badia'), ('38', 'East ', 'Al-Quds (Jerusalem)'), ('39', 'East ', 'Al-Hamra'), ('40', 'East ', 'Al-Rayan'), ('41', 'East ', 'Al-Rawdah'), ('42', 'East ', 'Martyrs'), ('43', 'East ', 'Al-Falah'), ('44', 'East ', 'Al-Naseem'), ('45', 'East ', 'Cordoba'), ('46', 'East ', 'Seville'), ('47', 'East ', 'Pioneers'), ('48', 'East ', 'Ar-Rabwah'), ('49', 'East ', 'Al-Jazirah'), ('50', 'East ', 'Al-Yarmouk'), ('51', 'East ', 'Al-Khaleej'), ('52', 'East ', 'Al-Nahda'), ('53', 'East ', 'Al-Sili'), ('54', 'Central ', 'Al-Malaz'), ('55', 'Central ', 'Al-Diyar'), ('56', 'Central ', 'Al-Murabba'), ('57', 'Central ', 'Al-Batha'), ('58', 'Central ', 'Al-Fakhriya'), ('59', 'Central ', 'Al-Marba'), ('60', 'Central ', 'The Hall');


";

if ($dbconn->query($sql) === TRUE) {
    echo "<br> Table zamaimh_neighborhood data inserted successfully";
} else {
    echo "<br> Error creating table: " . $dbconn->error;
}


