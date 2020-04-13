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
	<center><?php
		$PID = $_POST["Patient"];
		
		$sql_PID = "SELECT * FROM patients WHERE PID = '".$PID."';";
		$sql_script = "SELECT * FROM prescriptions WHERE Patient = '".$PID."';";
		
		$result_patient = mysqli_query($conn, $sql_PID);
		$result_script = mysqli_query($conn, $sql_script);
		
		$resultCheckPatient = mysqli_num_rows($result_patient); //checks if there is any data being pulled
		$resultCheckScript = mysqli_num_rows($result_script);
		
		if($resultCheckPatient > 0){
			while($row = mysqli_fetch_assoc($result_patient)){
				echo $row['PID']." ".$row['First_Name']." ".$row['Last_Name'];
				echo "<br>";
				echo "<br>";
			}
		}
		else{
			echo "No data found!";
			echo "<br>";
		}
		if($resultCheckScript > 0){
			while($row2 = mysqli_fetch_assoc($result_script)){
				echo $row2['Prescript_ID']." ".$row2['Prescript_Name']." ".$row2['Dosage']." ".$row2['Refill']." ".$row2['Prescribing_doc'];
				echo "<br>";
			}
		}
		else{
			echo "No prescriptions found!";
		}	
	?></center>
</body>
</html>