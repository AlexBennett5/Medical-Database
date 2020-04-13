<?php
	// We need to use sessions, so you should always start sessions using the below code.
	session_start();
	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: doc_index.html');
		exit;
	}
	
	include_once 'connection_index.php';
	
	$NPI = $_SESSION['NPI'];
	
	$Prescript_ID = mysqli_real_escape_string($conn, $_POST['Prescript_ID']);
	$Prescript_Name = mysqli_real_escape_string($conn, $_POST['Prescript_Name']);
	$Dosage = mysqli_real_escape_string($conn, $_POST['Dosage']);
	$Refill = mysqli_real_escape_string($conn, $_POST['Refill']);
	$Patient = mysqli_real_escape_string($conn, $_POST['Patient']);
	
	$sql = "INSERT INTO prescriptions (`Prescript_ID`, `Prescript_Name`, `Dosage`, `Refill`, `Prescribing_doc`, `Patient`) 
		VALUES ('$Prescript_ID', '$Prescript_Name', '$Dosage', '$Refill', '".$NPI."', '$Patient');";
	
	mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
	header("Location: add_prescription.php?prescriptionadd=success");	//changes url to signal successful submit
?>