<?php
include('u_header.php');

if (!isset($_SESSION['id'])) {
    header("location:index.php");
}

?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
    <div class="container">
        <div class="row">
            <div class="Dhead_title text-center">
                <h2>User Area - Payments</h2>
                <div class="separetor"></div>
                <div class="row dashboard_menu">
                    
                </div>
            </div>
            <div class="Dwedo_content_area">


                <div class="col-md-offset-1 col-md-10  col-xs-12">
                    <div class="single_Dwedo">


                        <div class="Dsingle_right_text">
                            <h4>Payment Details</h4>
                            <div class="separetor"></div>
                            <p>Add your details given below.</p>
                           

                            <form action='u_addpayment.php' method='post' >
                            
                            <div class="form-group">
                                <label for="icons">Accepted Cards</label>
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="c_name" placeholder="Name on Card"
                                    required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="c_cnum" placeholder="Credit Card Number"
                                    required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="c_exmon" placeholder="Exp Month" required>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" name="s_exyr" placeholder="Exp Year" required>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" name="s_cvv" placeholder="CVV" required>
                            </div>


                            <div class="center-content">
                                <input type="submit" name="submit" value="Save" class="btn btn-lg">
                            </div>
                            

<?php
if (isset($_POST['submit'])) {

$c_name = $_REQUEST["c_name"];
$c_cnum = $_REQUEST["c_cnum"];
$c_exmon = $_REQUEST["c_exmon"];
$s_exyr = $_REQUEST["s_exyr"];
$s_cvv = $_REQUEST["s_cvv"];
$uid = $_SESSION["id"];


include('db_con.php');

$sql = "INSERT INTO `zamzimh_payment` ( `Nameoncard`, `cardnumber`, `expmounth`, `expyear`, `cvv`, `UserID`)
 VALUES ( '$c_name', $c_cnum, $c_exmon, $s_exyr, $s_cvv, $uid)";

if ($dbconn->query($sql) === TRUE) {
    echo "You are registered as Supplier successfully.";

} else {
    echo "Error: " . $sql . "<br>" . $dbconn->error;
}

}


?>
<br> <br> <br> <br> <br>
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
include('footer.php');
?>