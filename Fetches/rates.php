<?php
  include('config.php');
$rate_id = $_POST['rate_id'];
  $sql = "SELECT * FROM rates WHERE test_id= $rate_id ";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  $row['rate']; 
  }
   echo $out;
   ?>
