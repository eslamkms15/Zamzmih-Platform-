<?php
include('header.php');
?>


<br> <br> <br> <br> <br>



<section id="wedo">
	<div class="container">
		<div class="row">
			<div class="head_title text-center">
				<h2>Register As User</h2>
				<div class="separetor"></div>
				<br><br>
				<form action="u_register.php" method="post" id="formid">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="u_name" placeholder="Name" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="number" class="form-control" name="u_number" placeholder="Contact Number"
									required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="password" class="form-control" name="u_password" placeholder="Password"
									required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="email" class="form-control" name="u_email" placeholder="Email" required>
							</div>
						</div>
					</div>



					<div class="form-group">
						<textarea class="form-control" name="u_address" rows="3" placeholder="Address"></textarea>
					</div>

					<div class="center-content">
						<input type="submit" name="submit" value="SUBMIT NOW" class="btn btn-lg">
					</div>
				</form>
				<br><br>
				<p>
					<?php


					if (isset($_POST['submit'])) {

						$u_name = $_REQUEST["u_name"];
						$u_address = $_REQUEST["u_address"];
						$u_number = $_REQUEST["u_number"];
						$u_email = $_REQUEST["u_email"];
						$u_password = $_REQUEST["u_password"];


						include('db_con.php');

						$sql = "INSERT INTO `zamzimh_user`( `U_Name`, `U_Number`, `U_Email`, `U_Address`, `U_Password`) 
VALUES ('$u_name','$u_number','$u_email','$u_address','$u_password')";

						if ($dbconn->query($sql) === TRUE) {
							echo "You are registered as User successfully.";

						} else {
							echo "Error: " . $sql . "<br>" . $dbconn->error;
						}

					}


					?>
				</p>
			</div>
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
		</div>
	</div>
</section>



<?php
include('footer.php');
?>