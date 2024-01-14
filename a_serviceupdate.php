<?php
include('admin_header.php');


?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>Supplier </h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Account Details</h4>
							<div class="separetor"></div>
							<p>Edit service details given below.</p>
							<?php
							include('db_con.php');
							$svid = $_REQUEST["svid"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$s_price = $_REQUEST["s_price"];
								$s_status = $_REQUEST["s_status"];
								$Sv_area = $_REQUEST["Sv_area"];



								$sql = "UPDATE `zamzimh_services` SET `Sv_area`=' $Sv_area',`Sv_Price`='$s_price',`Sv_Status`='$s_status' 
WHERE `ServiceID`='$svid'";

								if ($dbconn->query($sql) === TRUE) {
									$msg = "Service record is updated successfully.";
									
								} else {
									$msg = "Error: " . $sql . "<br>" . $dbconn->error;
								}

							}


							$sql = "SELECT  `Sv_Name`, `Sv_area`, `Sv_Price`, `Sv_Status` FROM `zamzimh_services` WHERE `ServiceID`= '$svid'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='a_serviceupdate.php?svid=$svid' method='post' id='setting'>

                            <div class='form-group'>
                            <input type='text' class='form-control' name='s_name'
                                 readonly value='" . $row['Sv_Name'] . "'>
                        </div>



								<div class='form-group'>
									<input type='number' class='form-control' name='s_price'
										 required value='" . $row['Sv_Price'] . "'>
								</div>


								<div class='form-group'>
                                <select name='s_status' class='form-control'>";


										if ($row['Sv_Status'] == "Coming Soon") {
											echo "
                                <option selected>Coming Soon</option>
                                <option>Available</option>
                                <option>Unavailable</option>
                                ";
										} else if ($row['Sv_Status'] == "Available") {
											echo "
                                <option>Coming Soon</option>
                                <option selected>Available</option>
                                <option>Unavailable</option>
                                ";
										} else {
											echo "
                                <option>Coming Soon</option>
                                <option>Available</option>
                                <option selected>Unavailable</option>
                                ";
										}

										echo "
                            </select>
								</div>



								



								<div class='form-group'>
									<textarea class='form-control' name='Sv_area' rows='3'
										>" . $row['Sv_area'] . "</textarea>
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