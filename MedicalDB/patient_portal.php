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

<?php
    echo "Welcome ".$_SESSION['Name']." !";
?>

<p><a href='patient_info.php'>Check your medical records</a></p>
<p><a href='patient_prescript.php'>Check your prescriptions </a></p>
<p><a href='appointments_portal.php'>Schedule an appointment</a></p>

</body>

