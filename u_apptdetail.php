<?php
include('u_header.php');

if (!isset($_SESSION['id'])) {
	header("location:index.php");
}

?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>User Area - Appointment Details</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Supplier Detail</h4>
							<div class="separetor"></div>
							<?php

							include('db_con.php');
							$aid = $_REQUEST["aid"];

							$sql = "SELECT  `S_Name`, `S_Address`, `S_Number`, `S_Email`, `S_Rgnum` FROM `zamzimh_appointment`,  `zamzimh_supplier` WHERE `zamzimh_appointment`.`UserID`= `zamzimh_supplier`.`SupplierID` AND `ApptID` = '$aid'";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<p class='leftalign'>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<strong>Supplier Name: </strong>" . $row['S_Name'] . " <br><br>";
										echo "<strong>Supplier Number: </strong>" . $row['S_Number'] . " <br><br>";
										echo "<strong>Supplier Email: </strong>" . $row['S_Email'] . " <br><br>";
										echo "<strong>Supplier Registration Number: </strong>" . $row['S_Rgnum'] . " <br><br>";
										echo "<strong>Supplier Address: </strong>" . $row['S_Address'] . " <br><br>";
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

							$sql = "SELECT `ApptID`,  `A_Date`, `A_Status`, `A_Amount`, `Sv_Name`, `zamzimh_appointment`.`UserID`, `zamzimh_appointment`.`SupplierID` FROM `zamzimh_appointment`,  `zamzimh_services` WHERE `zamzimh_appointment`.`ServiceID`= `zamzimh_services`.`ServiceID` AND `ApptID` = '$aid'";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<p class='leftalign'>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<strong>Service Name: </strong>" . $row['Sv_Name'] . " <br><br>";
										echo "<strong>Service Ammount: </strong>" . $row['A_Amount'] . " <br><br>";
										echo "<strong>Booking Date: </strong>" . $row['A_Date'] . " <br><br>";
										echo "<strong>Booking Status: </strong>" . $row['A_Status'] . " <br><br>";
										if ($row['A_Status'] == "Pending") {
											echo "<form action='u_appststus.php?aid=" . $row['ApptID'] . "&a_status=Withdrawn&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";

											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='Withdraw Now' class='btn btn-lg'>
                                            </div></form>";
										} else if ($row['A_Status'] == "Slot Changed") {
											echo "<form action='u_appststus.php?aid=" . $row['ApptID'] . "&a_status=Withdrawn&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";

											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='Withdraw Now' class='btn btn-lg'>
                                            </div></form>";
										} else if ($row['A_Status'] == "Accepted") {
											echo "<form action='u_appststus.php?aid=" . $row['ApptID'] . "&a_status=Withdrawn&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "The service request is accepted please clear your dues. <a href='u_payment.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "'>PROCEED TO PAY</a>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='Withdraw Now' class='btn btn-lg'>
                                            </div></form>";

										} else if ($row['A_Status'] == "Unavailable") {
											echo "<form action='u_appststus.php?aid=" . $row['ApptID'] . "&a_status=Withdrawn&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "' method='post' id='chstatus'>";
											echo "The service you want to avail is not available on your desired slots please change you slots. <a href='u_updateslot.php?aid=" . $row['ApptID'] . "&uid=" . $row['UserID'] . "&sid=" . $row['SupplierID'] . "'>UPDATE SLOT</a>";
											echo "<div class='form-group'>
                                            <input type='submit' name='submit' value='Withdraw Now' class='btn btn-lg'>
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