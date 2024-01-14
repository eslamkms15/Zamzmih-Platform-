<?php
include('admin_header.php');


?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>appointment Update</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>appointment Details</h4>
							<div class="separetor"></div>
							<p>Edit appointment details given below.</p>
							<?php
							include('db_con.php');
							$ApptID = $_REQUEST["ApptID"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$Ad_ID = $_REQUEST["Ad_ID"];
								$A_Date = $_REQUEST["A_Date"];
								$A_Status = $_REQUEST["A_Status"];
								$A_Amount = $_REQUEST["A_Amount"];
								$UserID = $_REQUEST["UserID"];
								$SupplierID = $_REQUEST["SupplierID"];
								$ServiceID = $_REQUEST["ServiceID"];
								$payment_id = $_REQUEST["payment_id"];



								$sql = "UPDATE `zamzimh_appointment` SET `Ad_ID`=' $Ad_ID',`A_Date`='$A_Date',`A_Status`='$A_Status' ,`A_Amount`='$A_Amount',`UserID`='$UserID',`SupplierID`='$SupplierID',`ServiceID`='$ServiceID',`payment_id`='$payment_id' WHERE `ApptID`='$ApptID'";

								if ($dbconn->query($sql) === TRUE) {
									$msg = "Service record is updated successfully.";
									
								} else {
									$msg = "Error: " . $sql . "<br>" . $dbconn->error;
								}

							}


							$sql = "SELECT * FROM `zamzimh_appointment` WHERE `ApptID`= '$ApptID'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='a_appointmentupdate.php?ApptID=$ApptID' method='post' id='setting'>

                            <div class='form-group'>
                            <input type='text' class='form-control' name='Ad_ID'
                                 readonly value='" . $row['Ad_ID'] . "'>
                        </div>



								<div class='form-group'>
									<input type='date' class='form-control' name='A_Date'
										 required value='" . $row['A_Date'] . "'>
								</div>

								<div class='form-group'>
									<input type='text' class='form-control' name='A_Status'
										 required value='" . $row['A_Status'] . "'>
								</div>		


								<div class='form-group'>
									<input type='text' class='form-control' name='A_Amount'
										 required value='" . $row['A_Amount'] . "'>
								</div>



								<div class='form-group'>
									<input type='text' class='form-control' name='UserID'
										 required value='" . $row['UserID'] . "'>
								</div>
								<div class='form-group'>
									<input type='text' class='form-control' name='SupplierID'
										 required value='" . $row['SupplierID'] . "'>
								</div>
								<div class='form-group'>
									<input type='text' class='form-control' name='ServiceID'
										 required value='" . $row['ServiceID'] . "'>
								</div>
								<div class='form-group'>
									<input type='text' class='form-control' name='payment_id'
										 required value='" . $row['payment_id'] . "'>
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
									echo "No records matching your query were found.";
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