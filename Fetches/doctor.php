//fetch.php
<?php
  include('config.php');
 
  $test_id = $_POST['test_id'];
  $sql = "SELECT * FROM tests WHERE test_id= $test_id ";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  '<option>'.$row['test_id'].'</option>'; 
  }
   echo $out;
?>
