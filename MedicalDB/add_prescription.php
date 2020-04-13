<?php

session_start();
	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: doc_index.html');
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Prescription</title>
		<link href="doc_home_style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="doc_home.php">Doctor Home</a>
				<a href="doc_appointments.php">Appointments</a>
				<a href="doc_choose_patients.php">Patients</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<center><div class="content">
			<h2>Add Prescription</h2>
			<h3>Please fill out the following fields:</h3>
		</div></center>
		
		<center><form action = "add_prescription.inc.php" method = "POST">
			
			<p>
				<label for="Prescript_ID">Prescription ID:</label>
				<br>
				<input type= "text" name="Prescript_ID" id="Prescript_ID">
			</p>
			<p>
				<label for="Prescript_Name">Prescription Name:</label>
				<br>
				<input type="text" name="Prescript_Name" id="Prescript_name">
			</p>
			<p>
				<label for="Dosage">Dosage:</label>
				<br>
				<input type="text" name="Dosage" id="Dosage">
			</p>
			<p>
				<label for="Refill">Refill (Y/N):</label>
				<br>
				<input type="text" name="Refill" id="Refill">
			</p>
			<p>
				<label for="Patient">Patient ID:</label>
				<br>
				<input type="text" name="Patient" id="Patient">
			</p>
				<input type="submit" value="Submit">
		</form></center>
	</body>
</html>