<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
    <title>Prescription Info</title>
</head>
<body>
<link rel="stylesheet" type = "text/css" href="css/patient_prescript_style.css" />
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
<h2> Prescription Record </h2><br>

<?php
    gen_prescriptions($_SESSION['User_ID']);
?>

</body>