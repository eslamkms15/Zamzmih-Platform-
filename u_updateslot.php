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
				<h2>User Area - Update Slot </h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
			
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Slot Details</h4>
							<div class="separetor"></div>
							<p>Edit your details given below.</p>
							<?php
							include('db_con.php');
							$aid = $_REQUEST["aid"];
							$uid = $_REQUEST["uid"];
							$sid = $_REQUEST["sid"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$a_date = $_REQUEST["a_date"];
								$a_time = $_REQUEST["a_time"];
								$n_text = "User request a new slot.";


								$sql = "UPDATE `zamzimh_appointment` SET `A_Time`='$a_time',`A_Date`='$a_date',`A_Status`='Slot Changed' 
WHERE `ApptID`='$aid'";

								if ($dbconn->query($sql) === TRUE) {
									$sql = "INSERT INTO `zamzimh_notification`
    ( `N_Text`, `N_Flag`, `N_Receiver`, `ApptID`, `SupplierID`, `UserID`) 
    VALUES ('$n_text','unread','Supplier','$aid','$sid','$uid')";

									if ($dbconn->query($sql) === TRUE) {
										$msg = "Slot Changed & Supplier Notified.";

									} else {
										$msg = "Error: " . $sql . "<br>" . $dbconn->error;
									}

								}
							}

							$sql = "SELECT `A_Time`, `A_Date` FROM `zamzimh_appointment` WHERE  `ApptID` = '$aid'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='u_updateslot.php?aid=$aid&uid=$uid&sid=$sid' method='post' id='setting'>

				<div class='form-group'>
					<input type='date' class='form-control' name='a_date'
						 required value='" . $row['A_Date'] . "'>
				</div>


				<div class='form-group'>
					<input type='time' class='form-control' name='a_time' 
						required value='" . $row['A_Time'] . "'>
				</div>


				<div class='form-group'>
					<input type='submit' name='submit' value='UPDATE NOW' class='btn btn-lg'>
				</div>

			</form>
			";
									}

									// Free result set
									mysqli_free_result($result);
								} else {
									$msg = "No records matching your query were found.";
								}
							}


							$dbconn->close();
							echo "<br><br><p>" . $msg . "</p>"

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