<?php
  include('config.php');
 if(isset($_POST['delete-report']))
 {
    $id=$_POST['id'];
    $query = "DELETE FROM report WHERE report_id ='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        echo '<script> alert("Report deleted sucessfully");</script>';        
    }
    else
    {
        echo '<script> alert("DATA NOT DELETED");</script>';
    }
 }
?>