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
				<h2> Recent</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">

				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="single_Dwedo">

						<div class="Dsingle_right_text">
							<h4>Recent Notifications</h4>
							<div class="separetor"></div>

							<?php

							include('db_con.php');
							$sid = $_SESSION["id"];


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

							include('db_con.php');
							$sid = $_SESSION["id"];


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
	</div>
</section>


<br> <br> <br> <br> <br>

<?php
include('footer.php');
?>