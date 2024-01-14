<?php
if(isset($_POST['submit']) ){
    require_once('db_con.php');
    session_start();
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   $img_name= $_FILES['image']['name'];
   $tmp_name= $_FILES['image']['tmp_name'];
   $error= $_FILES['image']['error'];
    if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc= strtolower($img_ex);

        $allowed_exs = array("jpg","jpeg","png","webp","svg");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path='images/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);

                $s_name=mysqli_real_escape_string($dbconn,$_POST['s_name']);
                $SupplierID=mysqli_real_escape_string($dbconn,$_POST['SupplierID']);

                $s_price=mysqli_real_escape_string($dbconn,$_POST['s_price']);
                $s_status=mysqli_real_escape_string($dbconn,$_POST['s_status']);
                $Sv_area=mysqli_real_escape_string($dbconn,$_POST['Sv_area']);
                $s_id = $_SESSION["id"];


                $sql = "INSERT INTO `zamzimh_services`( `Sv_Name`, `Sv_area`, `Sv_Price`, `Sv_Status`, `SupplierID`,`img`) 
                VALUES ('$s_name','$Sv_area','$s_price','$s_status','$SupplierID','$new_img_name')";
                                  

                if(mysqli_query($dbconn, $sql)){
                    echo '<script>alert("Truck added!!")</script>';
                    echo '<script> window.location.href = "a_addnewservice.php";</script>';  
                } 
                             

        }else{
            echo '<script>alert("Cant upload this type of image")</script>';
            echo '<script> window.location.href = "s_addnewservice.php";</script>';   

        }
    }
    else{
        $em="unknown error occured";
        header("Location: a_addnewservice.php?error=$em");
    }









}
else{
    echo "false";
}



?>
