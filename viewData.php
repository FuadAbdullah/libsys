<!DOCTYPE html>
<html>
	<head>
		<title>Search Contact Information</title>

		<!-- Template Main CSS File -->
		<link href="assets/css/style.css" rel="stylesheet">
	
		<!-- Vendor CSS Files -->
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
		<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
		<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="assets/css/style.css" rel="stylesheet">

		<style type="text/css">
		.hidetext { -webkit-text-security: disc; /* Default */ }
		</style>
	</head>
	
	<body>
		 <form method="post" role="form" class="php-email-form" action="viewData.php" style="padding: 30px;">

		 	<div class="row"> 
            	<div class="col-md-6 form-group"> 
					<p>User Role :
						<select name="userRole" required="true" class="form-control">
							<option value="client_t">Client</option>
							<option value="librarian_t">Librarian</option>
							<option value="admin_t">Admin</option>
						</select>
					</p>
				</div>

                <div class="col-md-6 form-group">
					<p>Search by :
						<select name="search" required="true" class="form-control">
							<option value="id">ID</option>
							<option value="first_name">Name</option>
						</select>
					</p>
				</div>
			 </div>

         	<button type="submit" name="" value="Search" class="form-control" style="background-color: #091c37; color: white; width: 150px;">Search</button>

     	</form>

		<div class="tableData" style="margin-left: 20px; margin-right: 20px;">
			<?php
			//Step 1 - Establish Connection
			//Step 2 - Handling Connection Error
			include('conn1.php');

			//Step 3 - Execute SQL query

			if (isset($_POST['search']) && isset($_POST['userRole'])){
					$search = $_POST['search'];	
					$userRole = $_POST['userRole'];	

				if($userRole=='client_t'){
					$sql = 'SELECT * FROM client_t ORDER BY cl_'.$search;
					$results = mysqli_query($conn1, $sql);

					if(mysqli_num_rows($results)>0){
						echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Client</center></h3>
						  </div>';
						echo '<div class="tabular">
							<table border="1|0">
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Password</th>
									<th>Address</th>
									<th>Admin ID</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						echo '<tr>';
						echo '<td>'.$row['cl_id'].'</td>';
						echo '<td>'.$row['cl_first_name']." "
								   .$row['cl_last_name']. '</td>';
						echo '<td>'.$row['cl_dob'].'</td>';
						echo '<td>'.$row['cl_gender'].'</td>';
						echo '<td>'.$row['cl_phone_number'].'</td>';
						echo '<td>'.$row['cl_email'].'</td>';
						echo '<td class="hidetext">'.$row['cl_password'].'</td>';
						echo '<td>'.$row['cl_street'].",<br>"
								   .$row['cl_city'].",<br>"
								   .$row['cl_postcode'].", "
								   .$row['cl_state'].'</td>';
						echo '<td>'.$row['adm_id'].'</td>';
						echo '<td><a href ="editClient.php?cl_id='.$row['cl_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteClient.php?cl_id='.$row['cl_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';



				}

				elseif ($userRole=='librarian_t') {
					$sql = 'SELECT * FROM librarian_t ORDER BY lb_'.$search;
					$results = mysqli_query($conn1, $sql);

					if(mysqli_num_rows($results)>0){
					echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Librarian</center></h3>
						  </div>';
					echo '<div class="tabular">
							<table border="1|0">
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Password</th>
									<th>Address</th>
									<th>Admin ID</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						echo '<tr>';
						echo '<td>'.$row['lb_id'].'</td>';
						echo '<td>'.$row['lb_first_name']." "
								   .$row['lb_last_name']. '</td>';
						echo '<td>'.$row['lb_dob'].'</td>';
						echo '<td>'.$row['lb_gender'].'</td>';
						echo '<td>'.$row['lb_phone_number'].'</td>';
						echo '<td>'.$row['lb_email'].'</td>';
						echo '<td class="hidetext">'.$row['lb_password'].'</td>';
						echo '<td>'.$row['lb_street'].",<br>"
								   .$row['lb_city'].",<br>"
								   .$row['lb_postcode'].", "
								   .$row['lb_state'].'</td>';
						echo '<td>'.$row['adm_id'].'</td>';
						echo '<td><a href ="editLibrarian.php?lb_id='.$row['lb_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteLibrarian.php?lb_id='.$row['lb_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';
				}

				elseif ($userRole=='admin_t') {
					$sql = 'SELECT * FROM admin_t ORDER BY adm_'.$search;
					$results = mysqli_query($conn1, $sql);


					if(mysqli_num_rows($results)>0){
					echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Admin</center></h3>
						  </div>';
					echo '<div class="tabular">
							<table border="1|0">
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Password</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						echo '<tr>';
						echo '<td>'.$row['adm_id'].'</td>';
						echo '<td>'.$row['adm_first_name']." "
								   .$row['adm_last_name']. '</td>';
						echo '<td>'.$row['adm_dob'].'</td>';
						echo '<td>'.$row['adm_gender'].'</td>';
						echo '<td>'.$row['adm_phone_number'].'</td>';
						echo '<td>'.$row['adm_email'].'</td>';
						echo '<td class="hidetext">'.$row['adm_password'].'</td>';
						echo '<td>'.$row['adm_street'].",<br>"
								   .$row['adm_city'].",<br>"
								   .$row['adm_postcode'].", "
								   .$row['adm_state'].'</td>';
						echo '<td><a href ="editAdmin.php?adm_id='.$row['adm_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteAdmin.php?adm_id='.$row['adm_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}
			}
		}
				
			
			?>
		</div>
	</body>
</html>