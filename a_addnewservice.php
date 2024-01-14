<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
	<div class="container">
		<div class="row">
			<div class="Dhead_title text-center">
				<h2> Add New Service</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Service Details</h4>
							<div class="separetor"></div>
							<p>Fill the below given form to add new service to the system. </p>
							<form action="a_upload.php" method="post" id="formid" enctype="multipart/form-data">

								<div class="form-group">
								<select class="form-control"  name="s_name" id="s_name">
   									 <option value="120M3">120M3</option>
   									 <option value="170M3">170M3</option>
									<option value="180M3">180M3</option>
								</select>
							
								</div>

								<div class="form-group">
									<input type="number" class="form-control" name="s_price" placeholder="Service Price"
										required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="SupplierID" placeholder="SupplierID"
										required>
								</div>

								<div class="form-group">
									<select name="s_status" class="form-control">
										<option>Coming Soon</option>
										<option>Available</option>
									</select>
								</div>

								<div class="form-group">
									<select name="Sv_area" class="form-control">
										<option>Central</option>
										<option>East</option>
										<option>North</option>
										<option>South </option>
										<option>West </option>

									</select>
								</div>

									
								<div class="form-group">
									<p><strong>Be Careful</strong><br>
										<strong>***</strong>File should be in JPG format.<br>
										<strong>***</strong>File name should be same as service name.<br>
										<input type="file" class="form-control" name="image" required>

								</div>

								<div class="center-content">
									
									<input type="submit" name="submit" value="SAVE SERVICE" class="btn btn-lg">
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


<br> <br> <br> <br> <br>

<?php
include('footer.php');
?>