<?php
include('u_header.php');
?>


<br> <br>

<section id="sns" class="sns sections">
    <div class="container">
        <div class="row">
            <div class="head_title text-center">
                <h2>
                    <?php

                    $spp = $_REQUEST["spp"];
                    echo $spp . " Services";
                    ?>
                </h2>
                <div class="separetor"></div>
                <br><br>
            </div>
            <div class="main_sns">
                <?php
                include('db_con.php');

                $sid = $_REQUEST["sid"];

                $sql = "SELECT * 
                 FROM `zamzimh_services` WHERE `SupplierID`='$sid'";
                if ($result = mysqli_query($dbconn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<div class='col-md-6 col-sm-6 col-xs-12'>
			<div class='single_sns'>
				<div class='single_sns_img'>
					<img src='images/".$row['img']."'  />
				</div>
				
				<div class='single_sns_overlay'>
					<h4>" . $row['Sv_Name'] . "</h4>
					<br>
					<p>" . $row['Sv_Description'] . "</p>
					<p><strong>Status: </strong>" . $row['Sv_Status'] . "</p>
					<p><strong>Price: </strong>" . $row['Sv_Price'] . "</p>
					<div class='separetorwhite'></div>";
                            if ($row['Sv_Status'] == "Available")
                                echo "<a href='u_apptform.php?svid=" . $row['ServiceID'] . "&spid=" . $row['SupplierID'] . "&spr=" . $row['Sv_Price'] . "'><button>Check Supplier's Shop</button><a>";
                            else
                                echo "<button disabled>Check Supplier's Shop</button>";
                            echo "
				</div>
			</div>
		</div>	";
                        }
                        mysqli_free_result($result);
                    } else {
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