<!DOCTYPE html>
<html>
	<head>
		<title>View Borrowing</title>

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
		 <form method="post" role="form" class="php-email-form" action="viewBorrowing.php" style="padding: 30px;">

		 	<div class="row"> 
            	<div class="col-md-6 form-group"> 
					<p>Search by :
						<select name="search" required="true" class="form-control">
							<option value="All">All</option>
							<option value="Overdue">Overdue</option>
							<option value="Returned">Returned</option>
						</select>
					</p>
				</div>

				<div class="col-md-6 form-group"> 
					<p>Sort by :
						<select name="sort" required="true" class="form-control">
							<option value="br_date">Borrowing Date</option>
							<option value="br_due_date">Due Date</option>
							<option value="br_returning_date">Return Date</option>
						</select>
					</p>
				</div>

			 </div>

         	<button type="submit" name="" value="search" class="form-control" style="background-color: #091c37; color: white; width: 150px;">Search</button>

     	</form>

		<div class="tableData" style="margin-left: 20px; margin-right: 20px;">
			<?php
			//Step 1 - Establish Connection
			//Step 2 - Handling Connection Error
			include('conn1.php');

			// Declaring variables
			
			// This function will calculate and return the fine amount
			// by multiplying .2 to the difference between today and 
			// the due date
			function fineCalculator($date, $return) {
				// Getting today's date
				$today = date_create(date("Y-m-d"));
				$duedate = date_create(date($date)); // To get current row's due date
				$difference = date_diff($today, $duedate); // To get the differences between current row's due date and today
				$duration = $difference->format('%a'); // To remove negative values
				$fine = $duration * 0.20; // RM0.20 a day
				return sprintf('%.2f', $fine);
			}

			//Step 3 - Execute SQL query

			if (isset($_POST['search'])){
					$search = $_POST['search'];	
					$sort = $_POST['sort'];	

				if($search == 'All'){
					$sql = 'SELECT * FROM borrowing_t ORDER BY '.$sort. ' DESC';
					$results = mysqli_query($conn1, $sql);
				
					if(mysqli_num_rows($results)>0){
						echo '<div class="section-title" data-aos="fade-up">
							<h3><center>All</center></h3>
						  </div>';
						echo '<div class="tabular">
						<center>
							<table border="1|0">
								<tr>
									<th>Borrow ID</th>
									<th>Client ID</th>
									<th>Book ID</th>
									<th>Borrowing Date</th>
									<th>Due Date</th>
									<th>Return Date</th>
									<th>Feedback</th>
									<th>Fine</th>
									<th>Return</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						if ($row['br_returning_date'] == "") {
							$fineamount = fineCalculator($row['br_due_date'], $row['br_returning_date']);
						} else {
							$fineamount = $row['br_fine'];
						}
						echo '<tr>';
						echo '<td>'.$row['br_id'].'</td>';
						echo '<td>'.$row['cl_id'].'</td>';
						echo '<td>'.$row['bk_id'].'</td>';
						echo '<td>'.$row['br_date'].'</td>';
						echo '<td>'.$row['br_due_date'].'</td>';
						echo '<td>'.$row['br_returning_date'].'</td>';
						echo '<td>'.$row['br_feedback'].'</td>';
						echo '<td>'.$fineamount.'</td>';
						if ($row['br_returning_date'] == null){
							echo '<td><a href ="returnBorrowing.php?br_id='.$row['br_id'].'&br_fine='.$fineamount.'"><button>Return</button></a></td>';
						} else{
							echo '<td></td>';
						}
						echo '</tr>';
					}
					echo '</table></center>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';
				}

				if ($search == 'Overdue'){
					$sql = 'SELECT * FROM borrowing_t  WHERE br_returning_date IS NULL ORDER BY '.$sort. ' DESC';
					$results = mysqli_query($conn1, $sql);
					//echo $sql;
					if(mysqli_num_rows($results)>0){
						echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Overdue</center></h3>
						  </div>';
						echo '<div class="tabular">
							<center><table border="1|0">
								<tr>
									<th>Borrow ID</th>
									<th>Client ID</th>
									<th>Book ID</th>
									<th>Borrowing Date</th>
									<th>Due Date</th>
									<th>Return Date</th>
									<th>Feedback</th>
									<th>Fine</th>
									<th>Return</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						if ($row['br_returning_date'] == "") {
							$fineamount = fineCalculator($row['br_due_date'], $row['br_returning_date']);
						} else {
							$fineamount = $row['br_fine'];
						}
						echo '<tr>';
						echo '<td>'.$row['br_id'].'</td>';
						echo '<td>'.$row['cl_id'].'</td>';
						echo '<td>'.$row['bk_id'].'</td>';
						echo '<td>'.$row['br_date'].'</td>';
						echo '<td>'.$row['br_due_date'].'</td>';
						echo '<td>'.$row['br_returning_date'].'</td>';
						echo '<td>'.$row['br_feedback'].'</td>';
						echo '<td>'.$fineamount.'</td>';
						if ($row['br_returning_date'] == null){
							echo '<td><a href ="returnBorrowing.php?br_id='.$row['br_id'].'&br_fine='.$fineamount.'"><button>Return</button></a></td>';
						}
						echo '</tr>';
					}
					echo '</table></center>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';
			}

				if ($search == 'Returned'){
					$sql = 'SELECT * FROM borrowing_t  WHERE br_returning_date IS NOT NULL ORDER BY '.$sort. ' DESC';
					$results = mysqli_query($conn1, $sql);
					//echo $sql;
					if(mysqli_num_rows($results)>0){
						echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Returned</center></h3>
						  </div>';
						echo '<div class="tabular">
							<center><table border="1|0">
								<tr>
									<th>Borrow ID</th>
									<th>Client ID</th>
									<th>Book ID</th>
									<th>Borrowing Date</th>
									<th>Due Date</th>
									<th>Return Date</th>
									<th>Feedback</th>
									<th>Fine</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
						echo '<tr>';
						echo '<td>'.$row['br_id'].'</td>';
						echo '<td>'.$row['cl_id'].'</td>';
						echo '<td>'.$row['bk_id'].'</td>';
						echo '<td>'.$row['br_date'].'</td>';
						echo '<td>'.$row['br_due_date'].'</td>';
						echo '<td>'.$row['br_returning_date'].'</td>';
						echo '<td>'.$row['br_feedback'].'</td>';
						echo '<td>'.$row['br_fine'].'</td>';
						echo '</tr>';
					}
					echo '</table></center>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';

			}
		}

				
			
			?>
		</div>
	</body>
</html>