<?php
  include('config.php');
 if(isset($_POST['delete-bill']))
 {
    $id=$_POST['id'];
    $query = "DELETE FROM bill WHERE bill_id ='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        echo '<script> alert("Bill deleted sucessfully");</script>';        
    }
    else
    {
        echo '<script> alert("DATA NOT DELETED");</script>';
    }
 }
?>