<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
    <div class="container">
        <div class="row">
            <div class="Dhead_title text-center">
                <h2> appointment</h2>
                <div class="separetor"></div>
                <div class="row dashboard_menu">
                  
                </div>
            </div>
            <div class="Dwedo_content_area">


                <div class="col-md-offset-1 col-md-10  col-xs-12">
                    <div class="single_Dwedo">


                        <div class="Dsingle_right_text">
                            <h4>appointment List</h4>
                            <div class="separetor"></div>



                            <?php
                            include('db_con.php');


                            $sql = "SELECT * FROM `zamzimh_appointment`  ";
                            if ($result = mysqli_query($dbconn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo "<table> <tr>";
                                    echo "<th class='short'>area_id</th>";
                                    echo "<th class='long'>Date</th>";
                                    echo "<th class='short'>Status</th>";
                                    echo "<th class='short'>Amount</th>";
                                    echo "<th class='short'>UserID</th>";
                                    echo "<th class='short'>SupplierID</th>";
                                    echo "<th class='short'>ServiceID</th>";
                                    echo "<th class='short'>payment_id</th>";
                                    echo "<th class='long'>Edit/Delete Actions</th>";
                                    echo "</tr> ";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='short'>" . $row['Ad_ID'] . "</td>";
                                        echo "<td class='long'>" . $row['A_Date'] . "</td>";
                                        echo "<td class='short'>" . $row['A_Status'] . "</td>";
                                        echo "<td class='short'>" . $row['A_Amount'] . "</td>";
                                        echo "<td class='short'>" . $row['UserID'] . "</td>";
                                        echo "<td class='long'>" . $row['SupplierID'] . "</td>";
                                        echo "<td class='short'>" . $row['ServiceID'] . "</td>";
                                        echo "<td class='short'>" . $row['payment_id'] . "</td>";
                                        echo "<td class='long'><a class='tablelink' href='a_appointmentupdate.php?ApptID=" . $row['ApptID'] . "'>
        Edit</a>&nbsp;&nbsp;&nbsp;<a class='tablelink' href='a_appointmentdelete.php?ApptID=" . $row['ApptID'] . "'>
        Delete</a></td>";
                                        echo "</tr> ";
                                    }
                                    echo "</table>";
                                    mysqli_free_result($result);
                                } else {
                                    echo "No records were found.";
                                }
                            }

                            $dbconn->close();

                            ?>

                            <br><br>
                            <h4>Want to add more appointment</h4>
                            <a href="a_addnewappointment.php" class="btn blue-btn">Add New appointment</a>
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