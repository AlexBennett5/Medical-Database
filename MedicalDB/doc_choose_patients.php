<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: doc_index.html');
	exit;
}
?>

<?php
	include_once 'connection_index.php';
?>

<!DOCTYPE html>
<html>

<head>
<meta charset = "utf-8">
<title>
	Patients
</title>
	<link href="doc_home_style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="doc_home.php">Doctor Home</a>
				<a href="doc_appointments.php">Appointments</a>
				<a href="add_prescription.php">Add Prescriptions</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<center><div class="content">
			<h2>Patient Information</h2>
		</div></center>
		<center><form action = "doc_view_patient.php" method = "POST">
			Patient ID: <input name = "Patient" type = "text">
			<br><br>
			<input type = "submit" name = "submit" value = "submit">
		</form></center>
			
	
</body>
</html>