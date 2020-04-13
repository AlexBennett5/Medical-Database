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

<h2> Patient Record Search </h2><br>

<form action="" method="POST">
<label for="search">Enter Patient PID: </label>
<input type="text" minlength="6" maxlength="6" name="PID" required>
<input type="submit" name="Submit">
</form><br><br>

<?php

    if(isset($_POST['Submit'])) {

        $sql_pid = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$_POST['PID'].";");

        if (mysqli_num_rows($sql_pid) == 0) {

            echo "No results found for that PID";

        } else {

            gen_patient_info($_POST['PID']);

        }

    }

?>

