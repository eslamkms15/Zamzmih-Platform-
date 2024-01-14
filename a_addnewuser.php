<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2> Add New user</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>User Details</h4>
							<div class="separetor"></div>
							<p>Fill the below given form to add new User to the system. </p>
							<form action="a_addnewuser.php" method="post" id="formid" enctype="multipart/form-data">

							<div class="form-group">
									<input type="text" class="form-control" name="U_Name" placeholder="User Name"
										required>
								</div>

								<div class="form-group">
									<input type="number" class="form-control" name="U_Number" placeholder="User Number"
										required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="U_Email" placeholder="User Email"
										required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="U_Address" placeholder="User Address"
										required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="U_Password" placeholder="User Password"
										required>
								</div>
								


								<div class="center-content">
									
									<input type="submit" name="submit" value="Save User" class="btn btn-lg">
								</div>
							</form>
							<br><br>
							<p>
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

include('db_con.php');

if(isset($_POST['submit']))
{

$U_Name = $_POST['U_Name'];
$U_Number = $_POST['U_Number'];
$U_Email = $_POST['U_Email'];
$U_Address = $_POST['U_Address'];
$U_Password = $_POST['U_Password'];

	
	$sql = "INSERT INTO `zamzimh_user` (`U_Name`, `U_Number`, `U_Email`, `U_Address`, `U_Password`) VALUES
	 ('$U_Name','$U_Number','$U_Email','$U_Address','$U_Password')";
	
	$result = mysqli_query($dbconn, $sql);
	
	if($result)
	{
		echo '<script>alert("User added!!")</script>';
		echo '<script> window.location.href = "a_addnewuser.php";</script>'; 	}
	else
	{
		echo "Unable to save post";
	}
	
}
?>

<br> <br> <br> <br> <br>

<?php
include('footer.php');
?>