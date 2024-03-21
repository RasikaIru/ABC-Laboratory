<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location : login.php");
}




if(isset($_POST["submit"])){
    $patientid = $_POST["id"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $testname = $_POST["test_name"];
    $doctorname = $_POST["doctor_name"];
    
    
        
            $query = mysqli_query($conn, "INSERT INTO appointments (appointmentid, patientid, name, date, testname, doctorname)  VALUES (NULL, '$patientid', '$name', '$date', '$testname', '$doctorname')");
            if($query){
              echo "<script>alert('done')</script>";
            } else {
              echo "<script>alert('error')</script>";
            }
       
    
  }
?>
































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/W3.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/body.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>


<header style="background-color: rgb(104, 175, 241);">
            <a href="#" class="logo">ABC Labs</a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="facilities.html">Facilities</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
            <ul>
                <li><a href="login.php" class="header_register">Login</a></li>
                <div class="seperator"></div>
                <li><a href="appointment.html" class="header_appointment">Appointment</a></li>
            </ul>
        </header>








    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:300px; padding-top:130px; background-color: red;" id="sidebar">
    
        <h5 class="w3-bar-item"><?php echo $row["name"]; ?></h5>
        <br>
        <br>
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Profile')">Profile</button>
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Appoinments')">Appoinments</button>
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Bills')">Bills</button>
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Lab_Reports')">Lab Reports</button>
      <br><br>
        <a class="w3-bar-item w3-button tablink" href="logout.php" target="_blank">Logout</a>
    </div>



      <div style="margin-left:200px; padding:150px 0 0 100px">
        
      
        <div id="Profile" class="w3-container city"  >
          
          <h2 style="text-align: center; font-family:'Roboto', sans-serif; font-weight: 900;">Welcome <?php echo $row["name"]; ?></h2>

          <div class="account_info">
            <table class="user_info">
                    
                  <tr>
                    <th>Age</td>
                    <td><?php echo $row["age"]; ?></td>                    
                  </tr>
                  <tr>
                    <th>Address</td>
                    <td><?php echo $row["address"]; ?></td>                   
                  </tr>
                  <tr>
                    <th>Gender</td>
                    <td><?php echo $row["gender"]; ?></td>                   
                  </tr>
                  <tr>
                    <th>Email</td>
                    <td><?php echo $row["email"]; ?></td>                   
                  </tr>
                  <tr>
                    <th>Password</td>
                    <td><?php echo $row["password"]; ?></td>                   
                  </tr>
                  
            </table>
          </div>
            
            
            
            <button type="" class="button"><a href="update.php?id=<?php echo $row["id"]; ?>" >Update</a></button>
        </div>
      








        <div id="Appoinments" class="w3-container city" style="display:none;  justify-content:center;">
          
            <div class="make_appoinment">



            <form class="" action="" method="post" autocomplete="off">
             <h2 style="font-family:'Roboto', sans-serif; font-weight: 900; text-align:center; padding-bottom:20px; background-color: rgb(104, 175, 241);">Make Appointment</h2>
            <p style="padding-bottom:20px;">Patient Name : <?php echo $row["name"]; ?></p>

            <input type="hidden" name="id" class="textField" vlaue="<?php echo $row['id']; ?>">
           
            <input type="hidden" name="name" class="textField" vlaue="<?php echo $row['name']; ?>">
           


            <span>Date :</span> <input type="date" name="date" id="date" value="date"></input>

            <span>Test Name : </span> 

            <select style="width:400px;" name="test_name" id="test_name" value="">
            <option value="testname" disabled selected style="color: lightgray;">Select your option</option>
              <?php
                include ('config.php');
                $tests = mysqli_query($conn, "SELECT * FROM tests");
                while($C = mysqli_fetch_array($tests)){
                  ?>
                  <option value="<?php echo $C['id'] ?>"><?php echo $C['testname']?> </option>
                  <?php } ?>
            </select> <br><br>

            <span> Doctor Name :  </span>
            <select style="width:400px;" name="doctor_name" id="doctor_name" value="">
            <option value="" disabled selected style="color: lightgray;">Select your doctor</option>
              <?php
                include ('config.php');
                $tests = mysqli_query($conn, "SELECT * FROM tests");
                while($C = mysqli_fetch_array($tests)){
                  ?>
                  <option value="<?php echo $C['id'] ?>"><?php echo $C['doctorname']?> </option>
                  <?php } ?>
            </select><br><br>

            <button type="submit" name="submit" class="make_appoinment_button">Submit</button>
            </form>

            </div>

<br>





            <div class="current_appoinments" > 
            <h2 style="font-family:'Roboto', sans-serif; font-weight: 900; text-align:center; padding-bottom:20px; background-color: rgb(104, 175, 241);">Current Appointments</h2>
           <table  class="user_info">
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Date</th>
              <th>Test Name</th>
              <th>Doctor Name</th>
            </tr>

            <?php
             
            $query=mysqli_query($conn,"SELECT * FROM appointments where patientid=$id;");
            while ($row=mysqli_fetch_array($query))
            {
              ?>
              <tr>
              
                <td><?php echo $row["patientid"]; ?></td>
                <td><?php echo $row["name"]; ?></td>                
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["testname"]; ?></td>
                <td><?php echo $row["doctorname"]; ?></td>
              </tr>

              <?php } ?>

           </table>
          
          
          </div>
        </div>
      








        <div id="Bills" class="w3-container city" style="display:none">
          <h2>Bills</h2>
          <p>Tokyo is the capital of Japan.</p>
          <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
        </div>












        <div id="Lab_Reports" class="w3-container city" style="display:none">
            <h2>Lab Reports</h2>
            <p>Tokyo is the capital of Japan.</p>
            <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
          </div>      
      </div>

      
      
      <script>
      function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " w3-red";
      }
      document.getElementById("defaultOpen").click();
      </script>
      
</body>
</html>