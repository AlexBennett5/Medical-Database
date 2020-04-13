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
<link rel="stylesheet" type = "text/css" href="css/default.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="patient_portal.php">Home</a></li>
                    <li><a href="patient_info.php">Check your Medical Information</a></li>
                    <li><a href="patient_prescript.php">Check your Prescriptions</a></li>
                    <li><a href="patient_appointments_portal.php">Schedule an appointment</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>

<p><h2> Your current medical record: </h2></p><br><br>

<?php
    gen_patient_info($_SESSION['User_ID']);
?>

