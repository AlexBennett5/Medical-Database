<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>Patient Portal</title>
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


<center>You are currently logged in as <?php echo $_SESSION['Name'] ?><br>
		Your PID is <?php echo $_SESSION['User_ID'] ?><br>
		You are logged in as a <?php echo $_SESSION['User_Type'] ?><br>
</center>

</body>

