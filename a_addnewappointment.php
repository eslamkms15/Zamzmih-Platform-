<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2> Add New appointment</h2>
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
							<p>Fill the below given form to add new appointment to the system. </p>
							<form action="a_addnewappointment.php" method="post" id="formid" enctype="multipart/form-data">

							<div class="form-group">
									<input type="text" class="form-control" name="Ad_ID" placeholder="Area ID"
										required>
								</div>

								<div class="form-group">
									<input type="Date" class="form-control" name="A_Date" placeholder="Date"
										required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="A_Status" placeholder="appointment Status"
										required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="A_Amount" placeholder="Amount"
										required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="UserID" placeholder="UserID"
										required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="SupplierID" placeholder="SupplierID"
										required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="ServiceID" placeholder="ServiceID"
										required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="payment_id" placeholder="payment_id"
										required>
								</div>
								
								


								<div class="center-content">
									
									<input type="submit" name="submit" value="Save appointment" class="btn btn-lg">
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

$Ad_ID = $_POST['Ad_ID'];
$A_Date = $_POST['A_Date'];
$A_Status = $_POST['A_Status'];
$A_Amount = $_POST['A_Amount'];
$UserID = $_POST['UserID'];
$SupplierID = $_POST['SupplierID'];
$ServiceID = $_POST['ServiceID'];
$payment_id = $_POST['payment_id'];


	
	$sql = "INSERT INTO `zamzimh_appointment` ( `Ad_ID`, `A_Date`, `A_Status`, `A_Amount`, `UserID`, `SupplierID`, `ServiceID`, `payment_id`) VALUES
	 ($Ad_ID,'$A_Date','$A_Status',$A_Amount,$UserID,$SupplierID,$ServiceID,$payment_id)";
	
	$result = mysqli_query($dbconn, $sql);
	
	if($result)
	{
		echo '<script>alert("appointment added!!")</script>';
		echo '<script> window.location.href = "a_addnewappointment.php";</script>'; 	}
	else
	{
		echo "Unable to save post";
		echo 'MySQL Error: ' . mysqli_error($dbconn);

	}
	
}
?>

<br> <br> <br> <br> <br>

<?php
include('footer.php');
?>