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
	include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="doc_home_style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="doc_appointments.php">Appointments</a>
				<a href="doc_choose_patients.php">Patients</a>
				<a href="add_prescription.php">Add Prescriptions</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
		</div>
	<?php
		$NPI = $_SESSION['NPI'];
		
		$doc_name = "SELECT Name FROM doctors WHERE NPI = '".$NPI."';";
		$resultdoc_name = mysqli_query($conn, $doc_name);
		$resultCheck = mysqli_num_rows($resultdoc_name);
		
		if($resultCheck > 0){
			while($row = mysqli_fetch_assoc($resultdoc_name)){
				echo "Welcome back, ";
				echo $row['Name'];
			}
		}
	?>
	</body>
</html>