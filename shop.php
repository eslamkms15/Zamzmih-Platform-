<?php
include('u_header.php');
include ('db_con.php');

?>
<style>
      .box {
        width: 120px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }
    </style>	
	
    <br>	<br> 
	
	<section id="sns" class="sns sections">
		<div class="container">
			<div class="row">
				<div class="head_title text-center">
					<h2>find Order</h2>
					<div class="separetor"></div>
					
					<form action="shop.php" method="post" id="formid">
					<label style="float:Left;" for="Name">Choose a type:</label>
<select class="box" style="float:left;" name="Name" id="Name">
    <option value="120M3">120M3</option>
    <option value="170M3">170M3</option>
	<option value="180M3">180M3</option>
</select>
<label  for="Name">Choose a Date:</label>
<input type="date" class="box" name="date" placeholder="Date" id="date" min="<?php echo date("Y-m-d"); ?>" required >
<select class="box" style="float:Right;" name="address" id="address">
<optgroup label="Central Riyadh City">
<?php
$sql="SELECT * FROM zamaimh_neighborhood where area='Central' ";

$result=mysqli_query($dbconn , $sql);

while ($row1 = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$neighborhood=$row1['neighborhood'];
	$Ad_ID=$row1['Ad_ID'];

?>
								
    <option value="<?php echo $Ad_ID; ?>"><?php echo $neighborhood; ?></option>
<?php }?>
<optgroup label="East of Riyadh City">
<?php
$sql="SELECT * FROM zamaimh_neighborhood where area='East' ";

$result=mysqli_query($dbconn , $sql);

while ($row1 = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$neighborhood=$row1['neighborhood'];
	$Ad_ID=$row1['Ad_ID'];

?>
								
    <option value="<?php echo $Ad_ID; ?>"><?php echo $neighborhood; ?></option>
<?php }?>
<optgroup label="North of Riyadh City">
<?php
$sql="SELECT * FROM zamaimh_neighborhood where area='North' ";

$result=mysqli_query($dbconn , $sql);

while ($row1 = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$neighborhood=$row1['neighborhood'];
	$Ad_ID=$row1['Ad_ID'];

?>
								
    <option value="<?php echo $Ad_ID; ?>"><?php echo $neighborhood; ?></option>
<?php }?>
<optgroup label="South of Riyadh City">
<?php
$sql="SELECT * FROM zamaimh_neighborhood where area='South' ";

$result=mysqli_query($dbconn , $sql);

while ($row1 = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$neighborhood=$row1['neighborhood'];
	$Ad_ID=$row1['Ad_ID'];

?>
								
    <option value="<?php echo $Ad_ID; ?>"><?php echo $neighborhood; ?></option>
<?php }?>
<optgroup label="West of Riyadh City">
<?php
$sql="SELECT * FROM zamaimh_neighborhood where area='West' ";

$result=mysqli_query($dbconn , $sql);

while ($row1 = mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$neighborhood=$row1['neighborhood'];
	$Ad_ID=$row1['Ad_ID'];

?>
								
    <option value="<?php echo $Ad_ID; ?>"><?php echo $neighborhood; ?></option>
<?php }?>
</select>

<label style="float:Right;"  for="cars">Choose a address:</label>
<br>

<input type="submit" name="submit" value="search" class="btn btn-lg">

					</form>		
				
<br>
<br>
				</div>
				<?php 

				if (isset($_POST['submit'])) {
					$Sv_Name=$_POST['Name'];
					$address=$_POST['address'];
					$date=$_POST['date'];
					$query2="SELECT * FROM zamaimh_neighborhood where Ad_ID='$address' ";    
                $ress2=mysqli_query($dbconn,$query2);
                $res2=mysqli_fetch_array($ress2);
				$area = $res2['area'];
                $query="SELECT * FROM `zamzimh_services` where Sv_Name='$Sv_Name' AND Sv_area='$area' ";

                $result=mysqli_query($dbconn , $query);

                while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
                $SupplierID=$row['SupplierID'];
                $query1="SELECT *from zamzimh_supplier where SupplierID =$SupplierID ";    
                $ress=mysqli_query($dbconn,$query1);
                $res1=mysqli_fetch_array($ress);
				
				
                ?>
				<form action ="u_apptform.php?SupplierID=<?php echo $SupplierID;?>&ServiceID=<?php echo $row['ServiceID'];?>&Sv_Price=<?php echo $row['Sv_Price'];?>&address=<?php echo $address;?>&date=<?php echo $date;?>" method="POST">
				<div class="main_sns">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_sns">
							<div class="single_sns_img">
								<img src="images/<?php echo $row['img'];?>" alt="" />
							</div>
							
							<div class="single_sns_overlay">
								<h4><?php echo $row['Sv_Name'];?></h4>
								
								<h4><?php echo $row['Sv_Price']; ?> SR</h4>
								<h6 style="color: white;"><?php echo "Supplier Name :" .$res1['S_Name']; ?> </h6>
								<p>Supplier area : <?php echo $area;?></p>


								<button type="submit" class="btn btn-lg">order now</button>
							</div>
						</div>
					</div>
					
				</div>
				</form>
				

	
	
	<?php
                }
			}
                ?>
											</div>

							</div>

						</div>

								</form>

</section>
	<?php
	include('footer.php');
	?>