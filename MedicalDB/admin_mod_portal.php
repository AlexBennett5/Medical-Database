<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>Modify Records</title>
</head>
<body>

<link rel="stylesheet" type = "text/css" href="css/admin_portal_style.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
                    <li><a href="admin_mod_portal.php">Modify Records</a>
                    <li><a href="admin_search.php"> Search activity </a>
                    <li><a href="admin_report.php">View reports </a>
                    <li><a href="logout.php">Logout</a></li>
        </ul>
</nav>
<br>
Which record type would you like to modify?<br><br>

<form action='' method='POST'>
<label for="patient"> Patient: </label>
<input type="radio" id="patient" name="mod_type" value=0 required><br>
<label for="nurse"> Nurse: </label>
<input type="radio" id="nurse" name="mod_type" value=1 required><br>
<label for="doctor"> Doctor: </label>
<input type="radio" id="doctor" name="mod_type" value=2 required><br>
<input type='submit' name='submit' value='submit'>
</form>

<?php

    if(isset($_POST['submit'])) {

        if ($_POST['mod_type'] == 0) {
            header("Location: admin_mod_patient.php");
        } elseif ($_POST['mod_type'] == 1) {
            header("Location: admin_mod_nurse.php");
        } elseif ($_POST['mod_type'] == 2) {
            header("Location: admin_mod_doctor.php");
        } 
    }

?>



