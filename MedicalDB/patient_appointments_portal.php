<?php
    include_once 'includes/dbh.php';
    include_once 'includes/session_check.php';
?>

<html>
<head>
	<title>Appointment Scheduler</title>
</head>
<link rel="stylesheet" type = "text/css" href="css/patient_appointments_portal_style.css" />

<body>
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
<center>

Do you want to schedule with a general practitioner or a specialist?<br><br>

<form action="patient_appointments_portal_process.php" method="POST">
<input type="radio" id="gp" value=0 name="app_choice">
<label for="gp">General Practitioner</label><br>
<input type="radio" id="specialist" value=1 name="app_choice">
<label for="specialist">Specialist</label><br><br>
<input type="submit" name="submit" value="submit">
</form><br>
<a href='patient_portal.php'>Return to patient portal</a>
</center>
</body>
</html>