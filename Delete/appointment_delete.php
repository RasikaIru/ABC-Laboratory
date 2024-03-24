<?php
  include('config.php');
 if(isset($_POST['delete']))
 {
    $id=$_POST['id'];
    $query = "DELETE FROM appointments WHERE appointmentid ='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        echo '<script> alert("Appointment deleted sucessfully");</script>';        
    }
    else
    {
        echo '<script> alert("DATA NOT DELETED");</script>';
    }
 }
?>