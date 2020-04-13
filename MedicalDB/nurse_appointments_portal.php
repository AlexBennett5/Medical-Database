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
                    <li><a href="nurse_portal.php">Home</a></li>
                    <li><a href="nurse_patient_info.php">Search Patient Info</a></li>
                    <li><a href="nurse_appointments_portal.php">Schedule an appointment</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>

<form action="nurse_appointments_portal_process.php" method="POST">
<label for="PID">Enter the patient's PID: </label>
<input type="text" minlength="6" maxlength="6" name="PID" required><br><br>
<input type="radio" id="gp" value=0 name="app_choice">
<label for="gp">General Practitioner</label><br>
<input type="radio" id="specialist" value=1 name="app_choice">
<label for="specialist">Specialist</label><br><br>
<input type="submit" name="submit" value="submit">



</body>
</html>