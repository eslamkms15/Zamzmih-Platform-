<?php
include('header.php');
?>


	
	
	
<section id="banner" class="banner">
		<div class="container">
			<div class="row">
				<div class="main_banner_area text-center">
					<div class="col-md-12 col-sm-12">
						<div class="single_banner_text">
							<h2>HELLO, WE’RE Zamzmih</h2>
							<h5>FRESH PREMIMIUM QUALITY WATER PROVIDERS</h5>
						</div>
					</div>
					
					
					<div class="scrolldown">
						<a href="#abouts" class="scroll_btn"></a>
					</div>
				</div>
				
				
			</div>
		</div>
	</section><!-- End of Banner Section -->
	
	
	<section id="abouts" class="abouts">
		<div class="container">
			<div class="row">
				<div class="main_abouts_content">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_abouts">
							<h2>ABOUT Zamzmih</h2>
							<div class="separetor2"></div>
							<p>Our mission is to deliver high-quality water treatment products 
								that will benefit every part of consumer’s lives. We hope to 
								raise the quality of life by purifying the most essential 
								element: water.</p>
							
							<a href="login.php" class="btn blue-btn">Let's Shop!</a>
						</div>
					</div>
					
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_abouts">
							<img src="images/ab.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
	<section id="wedo">
		<div class="container">
			<div class="row">
				<div class="head_title text-center">
					<h2>Let's Begin Your Journey</h2>
					<div class="separetor"></div>
					<p>Add one or two sentence here. This is the dummy text. </p>
				</div>
				<div class="wedo_content_area">
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_wedo">
							<div class="single_left_icon">
								<a href="u_register.php"><i class="fa fa-user-plus"></i></a>
							</div>
							
							<div class="single_right_text">
								<h4>Register As User</h4>
								<div class="separetor2"></div>
								<p>Add one or two sentence here. This is the dummy text.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_wedo">
							<div class="single_left_icon">
								<a href="s_register.php"><i class="fa fa-user-plus"></i></a>
							</div>
							
							<div class="single_right_text">
								<h4>Register As Supplier</h4>
								<div class="separetor2"></div>
								<p>Add one or two sentence here. This is the dummy text.</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	
	<section id="counterUp" class="counterUp">
		<div class="counter_overlay">
			<div class="container">
				<div class="row">
					<div class="main_counter_content">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="sinle_counter" >
								<h4>Pure Water is the World’s First and Foremost Medicine. </h4>
								<p>– Slovakian Proverb.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<section id="steps" class="steps">
		<div class="container">
			<div class="row">
				<div class="head_title text-center">
					<h2>THREE SIMPLE STEPS</h2>
					<div class="separetor"></div>
					<p>Add one or two sentence here. This is the dummy text.</p>
				</div>
				<div class="main_steps_content text-center">
					<div class="col-md-4">
						<div class="single_steps">
							<i class="fa fa-user-plus"></i>
							<h4>Register on Website</h4>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single_steps">
						<i class="fa fa-calendar"></i>
							<h4>Book An Appointment</h4>
						</div>
					</div>
					<div class="col-md-4">
						<div class="single_steps">
							<i class="fa fa-reorder"></i>
							<h4>Get Your Order</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
	
	
	
		<!-- Contact form -->
		<section id="contact" class="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="head_title text-center">
							<h2>Get In Touch With Us</h2>
							<div class="separetor"></div>
							<p>We are here to help. Want to learn more about our services? Please get in touch, we'd love to hear from you!</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="messsage_contant">
						<div class="col-md-8 col-sm-8">
							<div class="single_message_left">
							<form style="text-align: center;" id="formid"  action="index.php" method="POST">    
										<!--<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">-->
										  
										 <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id = "name" placeholder="first name" required="">
													</input>

												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
													</input>

												</div>
											</div>
										 </div>
										
										  

										  <div class="form-group">
											<textarea class="form-control" name="message" rows="8" placeholder="Message" id="message"></textarea>
										  </div>

										  <div class="center-content">
										  <input type="submit" class = "btn btn-lg"  value="Add feedback "name="submit">
										  </input>
										  </div>
										<!--</div>--> 
								</form>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
							<div class="single_message_right">
								<p><i class="fa fa-envelope-o"></i>Info@Zamzimh.com</p>
								<p><i class="fa fa-phone"></i>+966-12-345-6789</p>
								
							</div>
						</div>
					</div> <!-- End of messsage contant-->
				</div>
			</div>
		</section>	
	
		<?php
require_once('db_con.php');

if (isset($_POST['submit'])) {
$Name = $_REQUEST["name"];
$EMAIL = $_REQUEST["email"];
$COMMENT = $_REQUEST["message"];
$query="INSERT INTO `feedback` ( `Name`, `EMAIL`, `COMMENT`) VALUES ('$Name','$EMAIL','$COMMENT')";
$res=mysqli_query($dbconn,$query);
if($res){
    echo '<script>alert("feedback has been added!")</script>';
    echo '<script> window.location.href = "index.php";</script>';                }
    else{
        $em="unknown error occured";
        header("Location: index.php?error=$em");
    }
}

?>		

<?php
include('footer.php');
?>