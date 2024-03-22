<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container" style="margin-top:30px">
		<div class="row">
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
								placeholder="Enter Patients' ID" name="name">
						</div>								 
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required/>
						</div>
						<div class="form-group">
							<input type="submit"
								class="btnRegister" name="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>		 
			
			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Records from Database</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>Bill ID</th>
							<th>Patient ID</th>
							<th>Bill</th>
						</thead>
						<tbody>
						<?php
							$sql = "select * from bill";
							$squery = mysqli_query($conn, $sql);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['bill_id']; ?></td>
							<td><?php echo $result['patientid']; ?></td>
							<td><?php echo $result['filename']; ?></td>
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
</body>
</html>
