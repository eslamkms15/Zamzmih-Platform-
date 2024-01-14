<?php
include('header.php');
?>


<br> <br> <br> <br> <br>



<section id="wedo">
	<div class="container">
		<div class="row">
			<div class="head_title text-center">
				<h2>Register As Supplier</h2>
				<div class="separetor"></div>
				<br><br>
				<form action="s_register.php" method="post" id="formid">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="s_name" placeholder="Name" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="number" class="form-control" name="s_number" placeholder="Contact Number"
									required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="password" class="form-control" name="s_password" placeholder="Password"
									required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="email" class="form-control" name="s_email" placeholder="Email" required>
							</div>
						</div>
					</div>


					<div class="form-group">
						<input type="number" class="form-control" name="s_rgnum" placeholder="Registration Number"
							required>
					</div>



					<div class="form-group">
						<textarea class="form-control" name="s_address" rows="3" placeholder="Address"></textarea>
					</div>

					<div class="center-content">
						<input type="submit" name="submit" value="SUBMIT NOW" class="btn btn-lg">
					</div>

				</form>
				<br><br>
				<p>
					<?php


					if (isset($_POST['submit'])) {

						$s_name = $_REQUEST["s_name"];
						$s_address = $_REQUEST["s_address"];
						$s_number = $_REQUEST["s_number"];
						$s_email = $_REQUEST["s_email"];
						$s_rgnum = $_REQUEST["s_rgnum"];
						$s_password = $_REQUEST["s_password"];


						include('db_con.php');

						$sql = "INSERT INTO `zamzimh_supplier`( `S_Name`, `S_Address`, `S_Number`, `S_Email`, `S_Rgnum`, `S_Password`) 
VALUES ('$s_name','$s_address','$s_number','$s_email','$s_rgnum','$s_password')";

						if ($dbconn->query($sql) === TRUE) {
							echo "You are registered as Supplier successfully.";

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