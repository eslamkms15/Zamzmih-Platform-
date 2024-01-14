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
                <h2>Supplier Area - Change Password</h2>
                <div class="separetor"></div>
                <div class="row dashboard_menu">
                 
                </div>
            </div>
            <div class="Dwedo_content_area">


                <div class="col-md-offset-1 col-md-10  col-xs-12">
                    <div class="single_Dwedo">


                        <div class="Dsingle_right_text">
                            <h4>Password Details</h4>
                            <div class="separetor"></div>
                            <p>Fill the below given form to add change the password. </p>
                            <form action="s_chpwd.php" method="post" id="formid">

                                <div class="form-group">
                                    <input type="password" class="form-control" name="old_password"
                                        placeholder="Enter your OLD Password" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="new_password"
                                        placeholder="Enter your NEW Password" required>
                                </div>

                                <div class="center-content">
                                    <input type="submit" name="submit" value="Change Password" class="btn btn-lg">
                                </div>
                            </form>
                            <br><br>
                            <p>
                                <?php


                                if (isset($_POST['submit'])) {

                                    $oldp = $_REQUEST["old_password"];
                                    $newp = $_REQUEST["new_password"];
                                    $s_id = $_SESSION["id"];


                                    include('db_con.php');

                                    $sql = "UPDATE `zamzimh_supplier` SET `S_Password`='$newp' 
                                    WHERE `S_Password`='$oldp' AND `SupplierID`='$s_id'";

                                    if ($dbconn->query($sql) === TRUE) {
                                        echo "Your password is updated successfully.";

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