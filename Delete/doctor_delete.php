<?php
  include('config.php');
 if(isset($_POST['delete_doctor']))
 {
    $id=$_POST['id'];
    $query = "DELETE FROM doctors WHERE doctor_id ='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        echo '<script> alert("Doctor removed sucessfully");</script>';        
    }
    else
    {
        echo '<script> alert("DATA NOT DELETED");</script>';
    }
 }
?>