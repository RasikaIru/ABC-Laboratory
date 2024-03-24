<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location : login.php");
}





?>
































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/W3.css">
    <link rel="stylesheet" href="CSS/profile1.css">
    <link rel="stylesheet" href="CSS/admin_profile.css.css">
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/body.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />   
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
      


</head>
<body>


<header style="background: linear-gradient(145deg, rgba(6,1,91,1) 0%, rgba(9,68,121,1) 51%, rgba(0,212,255,1) 100%)">
            <a href="#" class="logo" style="color: white;">ABC Labs</a>
            <ul style="color: white;">
                <li ><a href="index.html" style="color: white;">Home</a></li>
                <li><a href="about.html" style="color: white;">About</a></li>
                <li><a href="facilities.html" style="color: white;">Facilities</a></li>
                <li><a href="contactus.html" style="color: white;">Contact Us</a></li>
            </ul>
            <ul style="color: white;">
                <li><a class="header_appointment" href="admin_logout.php" target="_blank" style="color: white;">Logout</a></li>
                

                
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
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Add_Doctor')">Add Doctor</button>
        <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'Add_Tests')">Add Tests</button>
      
    </div>



      <div style="margin-left:200px; padding:150px 0 0 100px">
        
      
        <div id="Profile" class="w3-container city"  >
          
          <h2 style="text-align: center; font-family:'Roboto', sans-serif; font-weight: 900;">Welcome <?php echo $row["name"]; ?></h2>

          <div class="account_info">
            <table class="user_info">
                    
                  
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
            
            
            
            
        </div>
      








        <div id="Appoinments" class="w3-container city" style="display:none;  justify-content:center;">
          
            







            <div class="card-header text-center" > 
            <h4 style="font-family:'Roboto', sans-serif; font-weight: 900; text-align:center; padding-bottom:20px; ">All Appointments</h4>
           <table  class="user_info">
            <tr>
            <th>Appointment id</th>
              <th>Patient id</th>
              <th>Name</th>
              <th>Date</th>
              <th>Test Name</th>
              <th>Doctor Name</th>
            </tr>

            <?php
             
            $query=mysqli_query($conn,"SELECT * FROM appointments ");
            while ($row=mysqli_fetch_array($query))
            {
              ?>
              <tr>
              
              <td><?php echo $row["appointmentid"]; ?></td>
                <td><?php echo $row["patientid"]; ?></td>
                <td><?php echo $row["name"]; ?></td>                
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["testname"]; ?></td>
                <td><?php echo $row["doctorname"]; ?></td>
                
                <form action="Delete/appointment_delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['appointmentid']?>">
                  <td><input type="submit" name="delete" class="btn btn-danger" value="Delete"></td>
                </form>
                
              </tr>

              <?php } ?>

           </table>
          
          
          </div>
        </div>
      








        <div id="Bills" class="w3-container city" style="display:none; justify-items: center;">
          
          <div style="width: auto; height: auto;  border: 1px solid #e0e0e0; border-radius: 10px; align-content: center; padding-left: 20%; padding-top: 20px; background-color: #e0e0e0;">
            <h4>Add Bill</h4>

            <div class="col-lg-6 col-md-6 col-12">
			
      <form method="post" enctype="multipart/form-data">
        <?php
          // If submit button is clicked
          if (isset($_POST['submit']))
          {
          // get name from the form when submitted
          $name = $_POST['name'];					 

          if (isset($_FILES['pdf_file']['name'])) 
          { 
          // If the ‘pdf_file’ field has an attachment
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            
            // Move the uploaded pdf file into the pdf folder
            move_uploaded_file($file_tmp,"./Bill_PDF/".$file_name);
            // Insert the submitted data from the form into the table
            $insertquery = 
            "INSERT INTO bill(patientid,filename) VALUES('$name','$file_name')";
            
            // Execute insert query
            $iquery = mysqli_query($conn, $insertquery);	 

              if ($iquery)
            {							 
        ?>											 
              <div class=
              "alert alert-success alert-dismissible fade show text-center">
                
                ×
                </a>
                <strong>Success!</strong> Data submitted successfully.
                <return>
              </div>
              <?php
              }
              else
              {
              ?>
              <div class=
              "alert alert-danger alert-dismissible fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">
                ×
                </a>
                <strong>Failed!</strong> Try Again!
              </div>
              <?php
              }
            }
            else
            {
            ?>
              <div class=
              "alert alert-danger alert-dismissible fade show text-center">
              <a class="close" data-dismiss="alert" aria-label="close">
                ×
              </a>
              <strong>Failed!</strong> File must be uploaded in PDF format!
              </div>
            <?php
            }// end if
          }// end if
        ?> 
        
        <div class="form-input py-2">
          <div class="form-group">
            <input type="text" class="form-control"
              placeholder="Enter Patients' ID" name="name"> <br>
          </div>								 
          <div class="form-group">
            <input type="file" name="pdf_file"
              class="form-control" accept=".pdf" required/> <br>
          </div>
          <div class="form-group">
            <input type="submit"
              class="button" name="submit" value="Submit">
          </div>
        </div>
      </form><br>
    </div>		 

          </div>


<br>

<h4>Invoiced Bills</h4>
    <div class="col-lg-6 col-md-6 col-12"style="width:100%;">
            
			<div class="card" >
				
				
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="user_info">
						<tr>
							<th>Bill ID</th>
							<th>Patient ID</th>
							<th>Bill</th>
        </tr>
						
						<?php
							$sql = "select * from bill ";
							$squery = mysqli_query($conn, $sql);

							while ($result = mysqli_fetch_assoc($squery)) {
						?>
						<tr>
							<td><?php echo $result['bill_id']; ?></td>
							<td><?php echo $result['patientid']; ?></td>
							
              <td><a href="Bill_PDF/<?php echo $result['filename']; ?>"><?php echo $result['filename']; ?></td>
              
              <form action="Delete/bill_delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['bill_id']?>">
                  <td><input type="submit" name="delete-bill" class="btn btn-danger" value="Delete"></td>
                </form>
              


              
						</tr>
						<?php
							}
						?>
						
					</table>			 
					</div>
				</div>
			</div>
		</div> 

<br>
<h4> Patient Information</h4>
        <div style="border: 1px solid #e0e0e0; border-radius: 10px;">
        
        <table  class="user_info">
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Date</th>
              <th>Test Name</th>
              <th>Doctor Name</th>
            </tr>

            <?php
             
            $query=mysqli_query($conn,"SELECT * FROM appointments ");
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












        <div id="Lab_Reports" class="w3-container city" style="display:none">
        <div style="width: auto; height: auto;  border: 1px solid #e0e0e0; border-radius: 10px; align-content: center; padding-left: 20%;padding-top: 20px; background-color: #e0e0e0;">
        <h4>Add Lab Reports</h4>


        <div class="col-lg-6 col-md-6 col-12" >
			
      <form method="post" enctype="multipart/form-data">
        <?php
          // If submit button is clicked
          if (isset($_POST['submit_report']))
          {
          // get name from the form when submitted
          $name = $_POST['name'];					 

          if (isset($_FILES['pdf_file']['name'])) 
          { 
          // If the ‘pdf_file’ field has an attachment
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            
            // Move the uploaded pdf file into the pdf folder
            move_uploaded_file($file_tmp,"./Report_PDF/".$file_name);
            // Insert the submitted data from the form into the table
            $insertquery = 
            "INSERT INTO report(patientid,filename) VALUES('$name','$file_name')";
            
            // Execute insert query
            $iquery = mysqli_query($conn, $insertquery);	 

              if ($iquery)
            {							 
        ?>											 
              <div class=
              "alert alert-success alert-dismissible fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">
                ×
                </a>
                <strong>Success!</strong> Data submitted successfully.
              </div>
              <?php
              }
              else
              {
              ?>
              <div class=
              "alert alert-danger alert-dismissible fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">
                ×
                </a>
                <strong>Failed!</strong> Try Again!
              </div>
              <?php
              }
            }
            else
            {
            ?>
              <div class=
              "alert alert-danger alert-dismissible fade show text-center">
              <a class="close" data-dismiss="alert" aria-label="close">
                ×
              </a>
              <strong>Failed!</strong> File must be uploaded in PDF format!
              </div>
            <?php
            }// end if
          }// end if
        ?> 
        
        <div class="form-input py-2">
          <div class="form-group">
            <input type="text" class="form-control"
              placeholder="Enter Patients' ID" name="name"><br>
          </div>								 
          <div class="form-group">
            <input type="file" name="pdf_file"
              class="form-control" accept=".pdf" required/><br>
          </div>
          <div class="form-group">
            <input type="submit"
              class="button" name="submit_report" value="Submit">
          </div>
        </div>
      </form><br>
    </div>		 
    </div>
    <br>


    <h4>ALL Lab Reports</h4>
          <div class="col-lg-6 col-md-6 col-12" style="width:100%;">
			<div class="card">
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="user_info">
						<thead>
							<th>Report ID</th>
							<th>Patient ID</th>
							<th>Report</th>
						</thead>
						<tbody>
						<?php
							$sql = "select * from report where patientid=$id;";
							$squery = mysqli_query($conn, $sql);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['report_id']; ?></td>
							<td><?php echo $result['patientid']; ?></td>
							
              <td><a href="Report_PDF/<?php echo $result['filename']; ?>"><?php echo $result['filename']; ?></td>

              <form action="Delete/report_delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['report_id']?>">
                  <td><input type="submit" name="delete-report" class="btn btn-danger" value="Delete"></td>
                </form>


              
						</tr>
						<?php
							}
						?>
						</tbody>
					</table>			 
					</div>
				</div>
			</div>
		</div>  
    <br>
<h4> Patient Information</h4>
        <div style="border: 1px solid #e0e0e0; border-radius: 10px;">
        
        <table  class="user_info">
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Date</th>
              <th>Test Name</th>
              <th>Doctor Name</th>
            </tr>

            <?php
             
            $query=mysqli_query($conn,"SELECT * FROM appointments ");
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












      <div id="Add_Doctor" class="w3-container city" style="display:none">

      

          <div style="margin-left: 150px;  width: 600px; float: left;">
          <h2 style=" font-family:'Roboto', sans-serif; font-weight: 900;">Add Doctor</h2><br>
              
          
          <form class="" action="" method="post" autocomplete="off">
              <p style="padding-bottom: -20px;"> Doctor Name : </p>
              <input type="text" class="doctor_input" name="doctor_name" id="doctor_name" placeholder="Doctor Name" require></input><br><br>
              <p> Email : </p>
              <input type="email" class="doctor_input" name="doctor_email" id="doctor_email" placeholder="Doctor Email" require></input>
              
              <p style="padding-top: 20px;"> Medical Specilaity </p>
              
              <select class="form-select" name="testname" id="selectID" style="width: 250px;">
        <option>Select Option</option>
 
        <?php $sql = "SELECT * FROM tests";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {?>
            <option value="<?php echo $row['test_id'] ?>"><?php echo $row['testname'] ?></option>
            <?php }?>
            
            
        </select>

        <p style="padding-top: 20px;"> Test ID </p>
        <select  class="form-select"  name="testid" id="show" style="width:200px;"></select>

        <script>
                          $(document).ready(function(){
                            $('#selectID').change(function(){
                              var TestID = $('#selectID').val(); 
                        
                              $.ajax({
                                type: 'POST',
                                url: 'Fetches/doctor.php',
                                data: {test_id:TestID},  
                                success: function(data)  
                                {
                                    $('#show').html(data);
                                }
                                });
                            });
                          });
                        </script> 

        <p style="padding-top: 20px;"> Password : </p>
              <input type="password" class="doctor_password" name="doctor_password" id="doctor_password" placeholder="Doctor Password" require></input><br><br>

              <p for="confirmpassword">Confirm Password : </p>
                <input type ="password" name="doctor_confirmpassword" id="doctor_confirmpassword" required value=""><br>

              <button class="button" type="submit" name="submit_doctor">Register</button>
            </form>
            <br><br>
          </div>
          

          
        <div style="width:800px;  float: left;">
          <div class="col-lg-6 col-md-6 col-12" style="width: 100%;">
            
			<div class="card">
				<div class="card-header text-center">
				<h4>Registered Doctors</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table class="user_info">
						<thead>
              <th>Doctor ID</th>
							<th>Doctor Name</th>
							<th>Doctor Email</th>
							<th>Medical Specilaity</th>
              <th>Test ID</th>
              <th>Password</th>
						</thead>
						<tbody>
						<?php
							$sql = "select * from doctors ";
							$squery = mysqli_query($conn, $sql);

							while ($result = mysqli_fetch_assoc($squery)) {
						?>
						<tr>
							<td><?php echo $result['doctor_id']; ?></td>
							<td><?php echo $result['doctor_name']; ?></td>
              <td><?php echo $result['doctor_email']; ?></td>
              <td><?php echo $result['doctor_test']; ?></td>
              <td><?php echo $result['test_id']; ?></td>
              <td><?php echo $result['doctor_pasword']; ?></td>

              <form action="Delete/doctor_delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['doctor_id']?>">
                  <td><input type="submit" name="delete_doctor" class="btn btn-danger" value="Remove Doctor"></td>
                </form>
							
              
              


              
						</tr>
						<?php
							}
						?>
						</tbody>
					</table>			 
					</div>
				</div>
			</div>
		</div> 
        </div>





      </div>
<!-- php for add doctor button -->

                                <?php
                          
                          if(isset($_POST["submit_doctor"])){
                              $name = $_POST["doctor_name"];
                              $email = $_POST["doctor_email"];
                              $testname = $_POST["testname"];
                              $testid = $_POST["testid"];                            
                              $password = $_POST["doctor_password"];

                              $confirmpassword = $_POST["doctor_confirmpassword"];
                              $duplicate = mysqli_query($conn, "SELECT * FROM doctors WHERE doctor_email = '$email'");
                              if (mysqli_num_rows($duplicate) > 0){
                                  echo
                                  "<script> alert ('Email has been already registered, please login')</script>";
                              }
                              else{
                                  if($password == $confirmpassword){
                                      $query = "INSERT INTO doctors VALUES('', '$testid', '$name', '$email', '$testname', '$password')";
                                      mysqli_query($conn,$query);
                                      echo
                                      "<script style='colour:red;'> alert ('Registration successful')</script>";
                                  }
                                  else{
                                      echo
                                      "<script> alert ('Password doesnot match')</script>";
                                  }
                              }

                          }
                          ?>










      <div id="Add_Tests" class="w3-container city" style="display:none">


      <div style="margin-left: 150px;  width: 600px; float: left;">
          <h2 style=" font-family:'Roboto', sans-serif; font-weight: 900;">Add Tests</h2><br>
              


          <form class="" action="" method="post" autocomplete="off">
              <p style="padding-bottom: -20px;"> Test Name : </p>
              <input type="text" class="test_input" name="test_name" id="test_name" placeholder="Test Name" require></input><br><br>
              <p style="padding-bottom: -20px;"> Price For the Test (LKR) : </p>
              <input type="text" class="test_input" name="rate" id="rate" placeholder="Please Enter Rates" require></input><br><br>
             
              <button class="button" type="submit" name="submit_test">Add Test</button>
          </form>
      </div>



<!-- php for test add button -->
      <?php
                          
                          if(isset($_POST["submit_test"])){
                              $test_name = $_POST["test_name"];
                              $rate = $_POST["rate"];
                              

                              
                              {
                                      $query = "INSERT INTO tests VALUES('', '$test_name','$rate')";
                                      mysqli_query($conn,$query);
                                      echo
                                      "<script style='colour:red;'> alert ('Test Added successfully')</script>";
                                  }
                                  
                              }

                          
                          ?>



      
      
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