<?php
    include_once "includes/dbh.php";
    include_once "includes/query_func.php";
    session_start();

    if(isset($_POST['PID'])) {
        
	    $patient = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$_POST['PID'].";") or die(mysqli_error($conn));
	    $row = mysqli_fetch_assoc($patient);

	    if(mysqli_num_rows($patient) == 0){
		    echo "Invalid PID";

		} elseif (strcmp($row['Password'],$_POST['password']) != 0) {
			echo "This password doesn't match this PID";
		} else {
		    $_SESSION['loggedin'] = TRUE;
		    $_SESSION['User_ID'] = $_POST['PID'];
	
		    $_SESSION['Name'] = $row['First_Name'];
		    $_SESSION['User_Type'] = "Patient";
 
		    $sql_doc = mysqli_query($conn, "SELECT * FROM Doctors WHERE Specialist='No' AND NPI IN (SELECT NPI FROM Doctor_patient WHERE PID='".$_POST['PID']."');") or die(mysqli_error($conn));
		    $doc = mysqli_fetch_assoc($sql_doc);

		    if(mysqli_num_rows($sql_doc) == 0) {
		    	$_SESSION['Has_GP'] = FALSE;
		    } else {
		    	$_SESSION['Has_GP'] = TRUE;
		    	$_SESSION['GP_name'] = $doc['Name'];
		    	$_SESSION['GP_ID'] = $doc['NPI'];
		    }

		    record_action("Patient", $_SESSION['PID'], "Logged In", $_SESSION['PID']);

		    header("location:patient_portal.php");

	    }
    }  
?>
