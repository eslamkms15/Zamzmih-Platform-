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
				<h2>Supplier Area - All Appointments</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
			
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Appointments List</h4>
							<div class="separetor"></div>
							<?php

							include('db_con.php');
							$sid = $_SESSION["id"];


							$sql = "SELECT `ApptID`, `A_Date`, `A_Status`,`neighborhood` FROM `zamzimh_appointment`,`zamaimh_neighborhood` WHERE zamaimh_neighborhood.Ad_ID=zamzimh_appointment.Ad_ID AND `SupplierID` = '$sid' ORDER BY `ApptID` DESC";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<table>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>";
										echo "<td><a class='dwidget' href='s_apptdetail.php?aid=" . $row['ApptID'] . "'>Appointment # " . $row['ApptID'] . " ---- Date: " . $row['A_Date'] . " neighborhood: " . $row['neighborhood'] . " (" . $row['A_Status'] . ")</a></td>";
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