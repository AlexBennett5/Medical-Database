<?php
	include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
<title>Add Patient Prescription</title>
</head>
<body>

<link rel="stylesheet" type = "text/css" href="css/default.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="doc_portal.php">Home</a></li>
                    <li><a href="doc_appointments.php">View Your Upcoming Appointments</a></li>
                    <li><a href="doc_patients.php">Check your patients' files</a></li>
                    <li><a href="doc_prescript.php">Write prescription</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>

<?php

	$Expiration_Date = substr($_POST['Expiration'],0,10).' '.substr($_POST['Expiration'],11).':00';
	
	$Prescript_Name = mysqli_real_escape_string($conn, $_POST['Prescript_Name']);
	$Dosage = mysqli_real_escape_string($conn, $_POST['Dosage']);
	$PID = mysqli_real_escape_string($conn, $_POST['PID']);
	$Expire = mysqli_real_escape_string($conn, $Expiration_Date);

	$dt_expire = new DateTime($Expiration_Date);
	$sql_pid = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$PID.";");

	if (mysqli_num_rows($sql_pid) == 0) {
		echo "No patient found with this PID <br>";
		echo "<a href='doc_prescript'>Return to prescription dashboard</a>";
	} elseif ($dt_expire < date("Y-m-d H:i:s")) {
		echo "Expiration date invalid - date is in the past<br>";
		echo "<a href='doc_prescript'>Return to prescription dashboard</a>";
	} else {

		mysqli_query($conn, "INSERT INTO Prescriptions VALUES(NULL,'".$Prescript_Name."','".$Dosage."','".$_POST['Refill']."',".$_SESSION['User_ID'].",".$PID.",'".$Expire."');") or die(mysqli_error($conn));
		$pres_id = mysqli_insert_id($conn);

		record_action("Doctor", $_SESSION['User_ID'], "Prescription Written", $pres_id);

		echo "Prescription of ".$Prescript_Name." to PID ".$PID." successfully written<br>";
		echo "<a href='doc_portal.php> Return to the doctor portal </a>";

	}
?>

</body>
</html>

