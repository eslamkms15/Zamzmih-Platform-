<?php
include('u_header.php');

if(!isset($_SESSION['id'])){
    header("location:index.php");
}

?>
	
    <br>	<br> 	<br> 	<br>	<br>

<section id="Dwedo">
		<div class="container">
			<div class="row">
				<div class="Dhead_title text-center">
					<h2>User Area - All Notifications</h2>
					<div class="separetor"></div>
                    <div class="row dashboard_menu">
     
      </div>
				</div>
				<div class="Dwedo_content_area">
					
				
					<div class="col-md-offset-1 col-md-10  col-xs-12">
						<div class="single_Dwedo">
							
							
							<div class="Dsingle_right_text">
								<h4>Notification List</h4>
								<div class="separetor"></div>
								<?php

							include('db_con.php');
							$uid = $_SESSION["id"];


							$sql = "SELECT `NotifID`, `N_Text`, `N_Flag`, `ApptID`, `SupplierID` FROM `zamzimh_notification` WHERE `N_Receiver` = 'User' AND `UserID` = '$uid' ORDER BY `NotifID` DESC;";
							if ($result = mysqli_query($dbconn, $sql)) {
								if (mysqli_num_rows($result) > 0) {
									echo "<table>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>";
										echo "<td><a class='dwidget' href='u_apptdetail.php?aid=" . $row['ApptID'] . "'>" . $row['N_Text'] . "</a></td>";
										echo "</tr>";
									}
									echo "</table><br><br>";
									mysqli_free_result($result);
								} else {
									echo "No records were found.<br><br>";
								}
							}
							$dbconn->close();

							?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    <br>	<br> 	<br> 	<br>	<br>

    <?php
include('footer.php');
?>
