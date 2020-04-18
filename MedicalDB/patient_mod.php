<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
	<title>Medical Info</title>
</head>
<body>
<link rel="stylesheet" type = "text/css" href="css/patient_info_style.css" />
<nav> 
    <p>UH Medical Clinic<p>
        <ul>
                <li><a href="patient_portal.php">Home</a></li>
                <li><a href="patient_info.php">View Medical Information</a></li>
                <li><a href="patient_prescript.php">View Prescriptions</a></li>
                <li><a href="patient_appointments_portal.php">Book Appointment</a></li>
                <li><a href="logout.php">Logout</a></li>
        </ul>
</nav>
<br>
<div class="session">Logged in as <?php echo $_SESSION['Name'] ?></div>
<br>

<form action='patient_mod_result.php' method='POST'>
<?php mod_patient($_SESSION['User_ID']); ?>
<input type='submit' value='submit'></form>
