<?php
	include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
<title>Patient Records</title>
</head>
<body>

<link rel="stylesheet" type = "text/css" href="css/doc_patients_style.css" />
<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Logged in as <?php echo $_SESSION['Name'] ?></h1>
            <a href="doc_portal.php">Home</a>
            <a href="doc_appointments.php">View Upcoming Appointments</a>
            <a href="doc_patients.php">Check Your Patients Files</a>
            <a href="doc_prescript.php">Write Prescription</a>
            <a href="doc_reports.php">Demographic Reports</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

<?php

    $sql_doc = mysqli_query($conn, "SELECT * FROM Doctor_patient WHERE PID=".$_POST['PID']." AND NPI=".$_SESSION['User_ID'].";");

    $check = "";

    if (mysqli_num_rows($sql_doc) > 0) {
        $check = "Yes";
    } else {
        $check = "No";
    }

?>

<form action='doc_patients_mod_process.php' method='POST'>
<?php mod_patient($_POST['PID']); ?>
Is this patient one of your patients? (Current Value: <?php echo $check ?>) <br>
<label for=0>Yes</label>
<input type="radio" name="add_to_patients" value=0 required><br>
<label for=1>No</label>
<input type="radio" name="add_to_patients" value=1><br><br>
<input type='submit' value='Finish changes'>
</form>


