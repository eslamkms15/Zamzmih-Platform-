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
				<h2>Supplier Area - Settings</h2>
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
							$s_id = $_SESSION["id"];

							$msg = "";


							if (isset($_POST['submit'])) {

								$s_address = $_REQUEST["s_address"];
								$s_number = $_REQUEST["s_number"];
								$s_email = $_REQUEST["s_email"];
								$s_rgnum = $_REQUEST["s_rgnum"];



								$sql = "UPDATE `zamzimh_supplier` SET `S_Address`='$s_address',`S_Number`='$s_number',`S_Email`='$s_email',
`S_Rgnum`='$s_rgnum' WHERE  `SupplierID`='$s_id'";

								if ($dbconn->query($sql) === TRUE) {
									$msg = "Your record is updated successfully.";

								} else {
									$msg = "Error: " . $sql . "<br>" . $dbconn->error;
								}

							}


							$sql = "SELECT `S_Address`, `S_Number`, `S_Email`, `S_Rgnum` FROM `zamzimh_supplier` WHERE `SupplierID`= '$s_id'";

							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {

										echo "<form action='s_settings.php' method='post' id='setting'>

								<div class='form-group'>
									<input type='number' class='form-control' name='s_number'
										 required value='" . $row['S_Number'] . "'>
								</div>


								<div class='form-group'>
									<input type='email' class='form-control' name='s_email' 
										required value='" . $row['S_Email'] . "'>
								</div>



								<div class='form-group'>
									<input type='number' class='form-control' name='s_rgnum'
										required value='" . $row['S_Rgnum'] . "'>
								</div>



								<div class='form-group'>
									<textarea class='form-control' name='s_address' rows='3'
										>" . $row['S_Address'] . "</textarea>
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

							<br>
							<h4>Want to change Password</h4>
							<a href="s_chpwd.php" class="btn blue-btn">Change Password</a>
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