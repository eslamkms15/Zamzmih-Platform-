<?php
include('u_header.php');
include ('db_con.php');

if (!isset($_SESSION['id'])) {
	header("location:login.php");
}

?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2>Book Appointment</h2>
				<div class="separetor"></div>

			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>order Detalis</h4>
							<div class="separetor"></div>
							<?php
							
							$ServiceID = $_REQUEST["ServiceID"];
							$SupplierID = $_REQUEST["SupplierID"];
							$Sv_Price = $_REQUEST["Sv_Price"];
							$uid = $_SESSION["id"];
							$address = $_REQUEST["address"];
							$date = $_REQUEST["date"];

							$query1="SELECT *from zamzimh_supplier where SupplierID =$SupplierID ";    
               				 $ress=mysqli_query($dbconn,$query1);
               				 $res1=mysqli_fetch_array($ress);

								$query2="SELECT *from zamzimh_services where ServiceID =$ServiceID ";    
								$ress2=mysqli_query($dbconn,$query2);
								$res2=mysqli_fetch_array($ress2) ;
							 
							?>
						<form id="form" name="form"  method="POST" >
						<div class="single_sns_img">
								<img src="images/<?php echo $res2['img'];?>" alt="" />
							</div>
							<h2 >Servece Name :    <?php echo $res2['Sv_Name']; ?></h2>
							<h2 >Address:    <?php echo $address; ?></h2>
							<h2 >date:    <?php echo $date; ?></h2>

							<h2 >Servece cost:    <?php echo $res2['Sv_Price']; ?></h2>
							<h2 >supplier Name:    <?php echo $res1['S_Name']; ?></h2>
							<br> <br>
							<div align="left";>
								<h5>chose payment method</h5>
								</div>

							<?php 
							$query="SELECT * FROM `zamzimh_payment` where UserID='$uid' ";

							$result=mysqli_query($dbconn , $query);

							while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
								?>
															<div align="left";>

							  <input type="checkbox" name="chkl" value="<?php echo $row['payment_id']; ?>"><?php echo $row['Nameoncard'] ."  And Card Number End with ".substr($row['cardnumber'],12) ; ?><br />
							</div>
                            
							
							<?php } ?>

							<div align="left";>

							<a  type='submit' name='submit' href="u_addpayment.php"> OR Enter New Payment METHOD </a>
							</div>

							<div class="center-content">
								<input type="submit" name="submit" value="Order Now" class="btn btn-lg">
							</div>
							</form>
							<br><br>
							<p>
								<?php
							if (isset($_POST['submit'])) {


									include('db_con.php');
									$chkl = $_REQUEST["chkl"];

									$sql = "INSERT INTO `zamzimh_appointment` 
									(`Ad_ID`, `A_Date`, `A_Status`, `A_Amount`, `UserID`, `SupplierID`, `ServiceID`, `payment_id`)
									 VALUES ('$address','$date','Paid','$Sv_Price', $uid, $SupplierID, $ServiceID, $chkl)";

									if ($dbconn->query($sql) === TRUE) {
										$apid = mysqli_insert_id($dbconn);
										echo "Appointment request sent.<br>";

									} else {
										echo "Error: " . $sql . "<br>" . $dbconn->error;
									}
									$sql = "INSERT INTO `zamzimh_notification`
                                    ( `N_Text`, `N_Flag`, `N_Receiver`, `ApptID`, `SupplierID`, `UserID`) 
                                    VALUES ('You have a new water appointment request.','unread','Supplier','$apid','$SupplierID','$uid')";

									if ($dbconn->query($sql) === TRUE) {
										echo "Seller Notified";

									} else {
										echo "Error: " . $sql . "<br>" . $dbconn->error;
									}

								}
								?>
							</p>
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