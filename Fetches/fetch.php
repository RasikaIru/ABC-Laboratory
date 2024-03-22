//fetch.php
<?php
  include('config.php');
 
  $doctor_id = $_POST['doctor_id'];
  $sql = "SELECT * FROM doctors WHERE test_id= $doctor_id ";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  '<option>'.$row['doctor_name'].'</option>'; 
  }
   echo $out;
?>
