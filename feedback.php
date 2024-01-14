<?php
include('admin_header.php');



?>

<br> <br> <br> <br> <br>

<section id="Dwedo">
    <div class="container">
        <div class="row">
            <div class="Dhead_title text-center">
                <h2> Users</h2>
                <div class="separetor"></div>
                <div class="row dashboard_menu">
                  
                </div>
            </div>
            <div class="Dwedo_content_area">


                <div class="col-md-offset-1 col-md-10  col-xs-12">
                    <div class="single_Dwedo">


                        <div class="Dsingle_right_text">
                            <h4>Users List</h4>
                            <div class="separetor"></div>



                            <?php
                            include('db_con.php');


                            $sql = "SELECT * FROM `feedback`  ";
                            if ($result = mysqli_query($dbconn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo "<table> <tr>";
                                    echo "<th class='short'>Name</th>";
                                    echo "<th class='long'>EMAIL</th>";
                                    echo "<th class='short'>COMMENT </th>";
                                    echo "</tr> ";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td class='short'>" . $row['Name'] . "</td>";
                                        echo "<td class='long'>" . $row['EMAIL'] . "</td>";
                                        echo "<td class='short'>" . $row['COMMENT'] . "</td>";
        
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