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
<meta charset = "utf-8">
<title>
	Doctor Appointments
</title>
	<link href="doc_home_style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="doc_home.php">Doctor Home</a>
				<a href="doc_choose_patients.php">Patients</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<center><div class="content">
			<h2>Doctor Appointments</h2>
		</div></center>
		
	<center><?php
		$NPI = $_SESSION['NPI'];//uses log in NPI as variable to search database table
		
		$sql_appt = "SELECT * FROM appointments WHERE Doctor_ID = '".$NPI."';";
		$result_appt = mysqli_query($conn, $sql_appt);
		$resultCheckappt = mysqli_num_rows($result_appt);
		
		if($resultCheckappt > 0){
			echo "(Date/Time, Patien ID, Clinic ID)<br><br>";
			while($row = mysqli_fetch_assoc($result_appt)){
				echo $row['Appointment_time']." ".$row['Patient_ID']." ".$row['Clinic_ID'];
				echo "<br>";
				echo "<br>";
			}
		}
		else{
			echo "No appointments found!";
		}
	?></center>	
</body>
</html>