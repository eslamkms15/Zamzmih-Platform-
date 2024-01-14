<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
    <div class="container">
        <div class="row">
            <div class="Dhead_title text-center">
                <h2> Services</h2>
                <div class="separetor"></div>
                <div class="row dashboard_menu">
                  
                </div>
            </div>
            <div class="Dwedo_content_area">


                <div class="col-md-offset-1 col-md-10  col-xs-12">
                    <div class="single_Dwedo">


                        <div class="Dsingle_right_text">
                            <h4>Services List</h4>
                            <div class="separetor"></div>



                            <?php
                            include('db_con.php');


                            $sql = "SELECT `ServiceID`, `Sv_Name`, `Sv_area`, `Sv_Price`, `Sv_Status` FROM `zamzimh_services`  ";
                            if ($result = mysqli_query($dbconn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo "<table> <tr>";
                                    echo "<th class='short'>Service</th>";
                                    echo "<th class='long'>Area </th>";
                                    echo "<th class='short'>Price </th>";
                                    echo "<th class='short'>Status </th>";
                                    echo "<th class='long'>Edit/Delete Actions</th>";
                                    echo "</tr> ";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='short'>" . $row['Sv_Name'] . "</td>";
                                        echo "<td class='long'>" . $row['Sv_area'] ." of Riyadh City". "</td>";
                                        echo "<td class='short'>" . $row['Sv_Price'] . "</td>";
                                        echo "<td class='short'>" . $row['Sv_Status'] . "</td>";
                                        echo "<td class='long'><a class='tablelink' href='a_serviceupdate.php?svid=" . $row['ServiceID'] . "'>
        Edit</a>&nbsp;&nbsp;&nbsp;<a class='tablelink' href='a_servicedelete.php?svid=" . $row['ServiceID'] . "'>
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
                            <h4>Want to add more services</h4>
                            <a href="a_addnewservice.php" class="btn blue-btn">Add New Service</a>
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