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
				<h2>Supplier Area - Add New Service</h2>
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
							<form action="s_upload.php" method="post" id="formid" enctype="multipart/form-data">

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
								<?php


								if (isset($_POST['submit'])) {
									print_r($_FILES['image']);
   echo "</prev>";
   $img_name= $_FILES['image']['name'];
   $tmp_name= $_FILES['image']['tmp_name'];
   $error= $_FILES['image']['error'];
    if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc= strtolower($img_ex);

        $allowed_exs = array("jpg","jpeg","png","webp","svg");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path='images/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
									$s_name = $_REQUEST["s_name"];
									$s_price = $_REQUEST["s_price"];
									$s_status = $_REQUEST["s_status"];
									$Sv_area = $_REQUEST["Sv_area"];
									$s_id = $_SESSION["id"];


									include('db_con.php');

									$sql = "INSERT INTO `zamzimh_services`( `Sv_Name`, `Sv_area`, `Sv_Price`, `Sv_Status`, `SupplierID`,`img`) 
                                    VALUES ('$s_name','$Sv_area','$s_price','$s_status','$s_id','$new_img_nam')";

									if ($dbconn->query($sql) === TRUE) {
										echo "Service added successfully";

									} else {
										echo "Error: " . $sql . "<br>" . $dbconn->error;
									}


									$filepath = "serviceimg/" . $_FILES["file"]["name"];
									if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
										echo " and file saved in the folder.";
									}
								}
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