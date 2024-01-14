<?php
include('u_header.php');
?>
	
	
	
    <br>	<br> 	
	

	<section id="sns" class="sns sections">
		<div class="container">
			<div class="row">
				<div class="head_title text-center">
					<h2>All Suppliers</h2>
					<div class="separetor"></div>
<br><br>				</div>
				<div class="main_sns">

				<?php

include('db_con.php');

$sql = "SELECT * FROM `zamzimh_supplier`";
if($result = mysqli_query($dbconn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo "	<div class='col-md-4 col-sm-4 col-xs-12'>
			<div class='single_sns'>
				<div class='single_sns_overlay2'>
					<h4>". $row['S_Name'] ."</h4>
					<br>
					<p><strong>Address: </strong>". $row['S_Address'] ."</p>
					<p><strong>Registration Number: </strong>". $row['S_Rgnum'] ."</p>
					<div class='separetorwhite'></div>
					<a href='s_suppliershop.php?sid=" . $row['SupplierID'] . "&spp=". $row['S_Name'] ."'><button>Check Supplier's Shop</button><a>
				</div>
			</div>
		</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "No records were found.";
    }
  }

$dbconn->close();

?>

					
					
				</div>
			</div>
		</div>
	</section>
	

	<?php
	include('footer.php');
	?>	
