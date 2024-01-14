<?php
include('admin_header.php');


?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>User Update</h2>
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
							<p>Edit User details given below.</p>
							<?php
							include('db_con.php');
							$UserID = $_REQUEST["UserID"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$U_Name = $_REQUEST["U_Name"];
								$U_Number = $_REQUEST["U_Number"];
								$U_Email = $_REQUEST["U_Email"];
								$U_Address = $_REQUEST["U_Address"];
								$U_Password = $_REQUEST["U_Password"];


								$sql = "UPDATE `zamzimh_user` SET `U_Name`=' $U_Name',`U_Number`='$U_Number',`U_Email`='$U_Email' ,`U_Address`='$U_Address',`U_Password`='$U_Password' WHERE `UserID`='$UserID'";

								if ($dbconn->query($sql) === TRUE) {
									$msg = "Service record is updated successfully.";
									
								} else {
									$msg = "Error: " . $sql . "<br>" . $dbconn->error;
								}

							}


							$sql = "SELECT * FROM `zamzimh_user` WHERE `UserID`= '$UserID'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='a_userupdate.php?UserID=$UserID' method='post' id='setting'>

                            <div class='form-group'>
                            <input type='text' class='form-control' name='U_Name'
                                 readonly value='" . $row['U_Name'] . "'>
                        </div>



								<div class='form-group'>
									<input type='number' class='form-control' name='U_Number'
										 required value='" . $row['U_Number'] . "'>
								</div>

								<div class='form-group'>
									<input type='text' class='form-control' name='U_Email'
										 required value='" . $row['U_Email'] . "'>
								</div>		


								<div class='form-group'>
									<input type='text' class='form-control' name='U_Address'
										 required value='" . $row['U_Address'] . "'>
								</div>



								<div class='form-group'>
									<input type='text' class='form-control' name='U_Password'
										 required value='" . $row['U_Password'] . "'>
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