<!DOCTYPE html>
<html lang="en">
    <?php
    										session_start();

include('db_con.php');
$sid = $_SESSION["id"];
    ?>

<head>
    <meta charset="utf-8">
    <title>Zamzimh</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />

	<link rel="stylesheet" href="css/fonts/stylesheet.css" />
	<link rel="stylesheet" href="css/fonts/fonts.css" />
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" /> 

	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>



<header id="home" class="header">
		<div >
			<div class="container">
				<div class="row">
					<div class="nave_menu">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
										data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#">
										<div class="logo">
											<img src="images/logo.png" alt="" />
										</div>
									</a>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

									<ul class="nav navbar-nav navbar-right">
								
										
							                	<li><a href="s_dashboard.php">Dashboard</a></li>
						<li><a href="s_settings.php">My Settings</a></li>
						<li><a href="s_service.php">My Services</a></li>
						<li><a href="s_summary.php">My Summary</a></li>

							      
											<li><a href='logout.php'>Logout</a></li>
											
					
					
										
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div><!--End of row -->

			</div><!--End of container -->

		</div>
	</header>
    <div class="container-xxl position-relative bg-white d-flex p-0">
       


       


        <!-- Content Start -->
        <div class="content">
    

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">ApptID</th>
                                    <th scope="col">neighborhood</th>
                                    <th scope="col">date</th>
                                    <th scope="col">A_Status</th>
                                    <th scope="col">Sv_Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                <?php
                                $sql = "SELECT ApptID, neighborhood, A_Date, A_Status, A_Amount, Sv_Name, zamzimh_appointment.UserID, zamzimh_appointment.SupplierID FROM zamzimh_appointment, zamzimh_services , zamaimh_neighborhood WHERE `zamzimh_appointment`.`ServiceID`= `zamzimh_services`.`ServiceID` AND zamzimh_appointment.Ad_ID=zamaimh_neighborhood.Ad_ID AND zamzimh_appointment.SupplierID = $sid";
                                $result = $dbconn->query($sql);
                                while ($row = $result->fetch_assoc()) {

                                ?>
                                                                    <tr>

                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $row['ApptID'] ;?></td>
                                    <td><?php echo $row['neighborhood'] ;?></td>
                                    <td><?php echo $row['A_Date'] ;?></td>
                                    <td><?php echo $row['A_Status'] ;?></td>
                                    <td><?php echo $row['Sv_Name'] ;?></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



            <div class="Dwedo_content_area">

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="single_Dwedo">

        <div class="Dsingle_right_text">
            <h4>Recent Notifications</h4>
            <div class="separetor"></div>

            <?php

           


            $sql = "SELECT `NotifID`, `N_Text`, `ApptID`, `UserID` FROM `zamzimh_notification` WHERE `N_Receiver` = 'Supplier' AND `SupplierID` = '$sid' ORDER BY `NotifID` DESC LIMIT 3;";
            if ($result = mysqli_query($dbconn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td><a class='dwidget' href='s_apptdetail.php?aid=" . $row['ApptID'] . "'>" . $row['N_Text'] . "</a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                    mysqli_free_result($result);
                } else {
                    echo "No records were found.<br><br>";
                }
            }
            $dbconn->close();

            ?>
            <a href="s_notification.php">All Notifications</a>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="single_Dwedo">

        <div class="Dsingle_right_text">
            <h4>Recent Appointments</h4>
            <div class="separetor"></div>
            <?php

            


            $sql = "SELECT `ApptID`, `A_Date`, `A_Status`,`neighborhood`,UserID FROM `zamzimh_appointment`,`zamaimh_neighborhood` WHERE zamaimh_neighborhood.Ad_ID = zamzimh_appointment.Ad_ID AND `SupplierID` = $sid ORDER BY `ApptID` DESC LIMIT 3;";
            if ($result = mysqli_query($dbconn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td><a class='dwidget' href='s_apptdetail.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "'>Appointment # " . $row['ApptID'] . " ---- Date: " . $row['A_Date'] . " neighborhood: " . $row['neighborhood'] . " (" . $row['A_Status'] . ")</a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                    mysqli_free_result($result);
                } else {
                    echo "No records were found.<br><br>";
                }
            }
            $dbconn->close();

            ?>
            <a href="s_appointments.php">All Appointments</a>
        </div>
    </div>
</div>

</div>

        </div>
        <!-- Content End -->


    </div>
    <?php
include('footer.php');
?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>