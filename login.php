<?php
include('header.php');
?>

<br> <br> <br> <br> <br>



<section id="wedo">
	<div class="container">
		<div class="row">
			<div class="head_title text-center">
				<h2>Login</h2>
				<div class="separetor"></div>
				<br><br>
				<form action="login.php" method="post" id="formid">
					<!--<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">-->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder="Password" required>
							</div>
						</div>
					</div>



					<div class="form-group">
						<select name="l_type" class="form-control">
							<option>Login As User</option>
							<option>Login As Supplier</option>
							<option>Login As Admin</option>

						</select>
					</div>

					<div class="center-content">
						<input type="submit" name="submit" value="login" class="btn btn-lg">
					</div>
					<!--</div>-->
				</form>
				<br><br>
				<p>
					<?php

					if (isset($_POST['submit'])) {

						$name = $_REQUEST["name"];
						$upwd = $_REQUEST["pwd"];
						$l_type = $_REQUEST["l_type"];

						include('db_con.php');
						if ($l_type == "Login As User")
{
							$sql = "SELECT UserID FROM `zamzimh_user` WHERE U_Name = '$name' AND U_Password = '$upwd'";
						if ($result = mysqli_query($dbconn, $sql)) {
							if (mysqli_num_rows($result) > 0) {
								session_start();
								$_SESSION["uname"] = $name;
								while ($row = mysqli_fetch_array($result))
									$_SESSION["id"] = $row['UserID'];
								header("location:shop.php");
							} else {
								echo "Try Again - Login unsucessful";
							}
						}
					}
					elseif ($l_type == "Login As Admin"){




						$sql = "SELECT ADMIN_ID	 FROM `Zamzimh_admin` WHERE ADMIN_ID = '$name' AND ADMIN_PASSWORD = '$upwd'";
						if ($result = mysqli_query($dbconn, $sql)) {
							if (mysqli_num_rows($result) > 0) {
								session_start();
								$_SESSION["uname"] = $name;
								while ($row = mysqli_fetch_array($result))
									$_SESSION["id"] = $row['UserID'];
								header("location:Admin_Services.php");
							} else {
								echo "Try Again - Login unsucessful";
							}
						}
						


					}
					elseif ($l_type == "Login As Supplier"){

	$sql = "SELECT SupplierID FROM `zamzimh_supplier` WHERE S_Name = '$name' AND S_Password = '$upwd'";
						if ($result = mysqli_query($dbconn, $sql)) {
							if (mysqli_num_rows($result) > 0) {
								session_start();
								$_SESSION["sname"] = $name;
								while ($row = mysqli_fetch_array($result))
									$_SESSION["id"] = $row['SupplierID'];
								header("location:S_dashboard.php");
							} else {
								echo "Try Again - Login unsucessful";
							}
						}

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