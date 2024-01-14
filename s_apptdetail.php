<?php
include('s_header.php');

if (!isset($_SESSION['id'])) {
	header("location:index.php");
}

?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>Supplier Area - Appointment Details</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>User Detail</h4>
							<div class="separetor"></div>
							<?php

							include('db_con.php');
							$aid = $_REQUEST["aid"];

							$sql = "SELECT `U_Name`, `U_Number`, `U_Email`, `U_Address` FROM `zamzimh_appointment`,  `zamzimh_user` WHERE `zamzimh_appointment`.`UserID`= `zamzimh_user`.`UserID` AND `ApptID` = '$aid'";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<p class='leftalign'>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<strong>User Name: </strong>" . $row['U_Name'] . " <br><br>";
										echo "<strong>User Number: </strong>" . $row['U_Number'] . " <br><br>";
										echo "<strong>User Email: </strong>" . $row['U_Email'] . " <br><br>";
										echo "<strong>User Address: </strong>" . $row['U_Address'] . " <br><br>";
									}
									echo "</p><br>";
									mysqli_free_result($result);
								} else {
									echo "No records were found.<br><br>";
								}
							}
							$dbconn->close();

							?>
						</div>
					</div>
				</div>

				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Booking Detail</h4>
							<div class="separetor"></div>
							<?php

							include('db_con.php');
							$aid = $_REQUEST["aid"];

							$sql = "SELECT ApptID, neighborhood, A_Date, A_Status, A_Amount, Sv_Name, zamzimh_appointment.UserID, zamzimh_appointment.SupplierID FROM zamzimh_appointment, zamzimh_services , zamaimh_neighborhood WHERE `zamzimh_appointment`.`ServiceID`= `zamzimh_services`.`ServiceID` AND zamzimh_appointment.Ad_ID=zamaimh_neighborhood.Ad_ID AND `ApptID` = '$aid'";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<p class='leftalign'>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<strong>Service Name: </strong>" . $row['Sv_Name'] . " <br><br>";
										echo "<strong>Service Ammount: </strong>" . $row['A_Amount'] . " <br><br>";
										echo "<strong>Booking Date: </strong>" . $row['A_Date'] . " <br><br>";
										echo "<strong>Booking Area: </strong>" . $row['neighborhood'] . " <br><br>";
										echo "<strong>Booking Status: </strong>" . $row['A_Status'] . " <br><br>";
										if ($row['A_Status'] == "Pending") {
											echo "<form action='s_appststus.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "<select name='a_status' class='form-control'>
                                            <option>Accepted</option>
                                            <option>Unavailable</option>
                                            <option>Rejected</option>
                                            <select>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='UPDATE NOW' class='btn btn-lg'>
                                            </div></form>";

										} else if ($row['A_Status'] == "Slot Changed") {
											echo "<form action='s_appststus.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "<select name='a_status' class='form-control'>
                                            <option>Accepted</option>
                                            <option>Rejected</option>
                                            <select>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='UPDATE NOW' class='btn btn-lg'>
                                            </div></form>";

										} else if ($row["A_Status"] == "Paid") {
											echo "<form action='s_appststus.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "<select name='a_status' class='form-control'>
                                            <option>Scheduled</option>
                                            <option>On Hold</option>
                                            <select>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='UPDATE NOW' class='btn btn-lg'>
                                            </div></form>";
										} else if ($row["A_Status"] == "On Hold") {
											echo "<form action='s_appststus.php?aid=" . $row['ApptID'] . "&a_status=Scheduled&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='SCHEDULE NOW' class='btn btn-lg'>
                                            </div></form>";
										} else if ($row["A_Status"] == "Scheduled") {
											echo "<form action='s_appststus.php?aid=" . $row['ApptID'] . "&a_status=Completed&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "'  method='post' id='chstatus'>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='Mark As Completed' class='btn btn-lg'>
                                            </div></form>";
										}


									}
									echo "</p><br>";
									mysqli_free_result($result);
								} else {
									echo "No records were found.<br><br>";
								}
							}
							$dbconn->close();

							?>
							<br>
							<h4>Want to go back to all appointments</h4>
							<a href="s_appointments.php" class="btn blue-btn">All Appointments</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<br> <br> <br> <br> <br>

<?php
include('footer.php');
?>