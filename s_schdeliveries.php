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
				<h2>Supplier Area - Schedule Deliveries</h2>
				<div class="separetor"></div>
				<div class="row dashboard_menu">
				
				</div>
			</div>
			<div class="Dwedo_content_area">


				<div class="col-md-offset-1 col-md-10  col-xs-12">
					<div class="single_Dwedo">


						<div class="Dsingle_right_text">
							<h4>Deliveries List</h4>
							<div class="separetor2"></div>
							<p>Add one or two sentence here. This is the dummy text.</p>
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