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
				<h2>User Area - My settings</h2>
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
							<p>Edit your details given below.</p>
							<?php
							include('db_con.php');
							$u_id = $_SESSION["id"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$u_address = $_REQUEST["u_address"];
								$u_number = $_REQUEST["u_number"];
								$u_email = $_REQUEST["u_email"];


								$sql = "UPDATE `zamzimh_user` SET `U_Number`='$u_number',`U_Email`='$u_email',`U_Address`='$u_address' 
WHERE `UserID`='$u_id'";

								if ($dbconn->query($sql) === TRUE) {
									$msg = "Your record is updated successfully.";

								} else {
									$msg = "Error: " . $sql . "<br>" . $dbconn->error;
								}

							}


							$sql = "SELECT  `U_Number`, `U_Email`, `U_Address` FROM `zamzimh_user` WHERE `UserID`='$u_id'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='u_settings.php' method='post' id='setting'>

				<div class='form-group'>
					<input type='number' class='form-control' name='u_number'
						 required value='" . $row['U_Number'] . "'>
				</div>


				<div class='form-group'>
					<input type='email' class='form-control' name='u_email' 
						required value='" . $row['U_Email'] . "'>
				</div>



				<div class='form-group'>
					<textarea class='form-control' name='u_address' rows='3'
						>" . $row['U_Address'] . "</textarea>
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
								<div class='form-group'>
					<a  type='submit' name='submit' href="u_addpayment.php" class='btn btn-lg'> Enter Payment </a>
				</div>	
							<br>
							<h4>Want to change Password</h4>
							<a href="u_chpwd.php" class="btn blue-btn">Change Password</a>

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