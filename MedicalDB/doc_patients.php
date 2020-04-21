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

<link rel="stylesheet" type = "text/css" href="css/doc_portal_style.css" />
<nav>
    <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="doc_portal.php">Home</a></li>
            <li><a href="doc_appointments.php">View Upcoming Appointments</a></li>
            <li><a href="doc_patients.php">Check Your Patients Files</a></li>
            <li><a href="doc_prescript.php">Write Prescription</a></li>
            <li><a href="doc_reports.php">Demographic Reports </a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
</nav>
<br>
<h2>Patient Records</h2>

<center>
Search for a patient<br><br>
<form action='' method='POST'>
<label for='PID'>Enter patient PID:</label>
<input type='text' minlength='6' maxlength ='6' name='PID'><br><br>
<label for='search_some'>Search from PID</label>
<input type='radio' id='search_pid' value=0 name='search'><br>
<label for='search_all'>Display your current patients</label>
<input type='radio' id='search_all' value=1 name='search'><br>
<input type='submit' name='submit' value='Submit'>
</form><br><br>
</center>

<?php

    if(isset($_POST['submit'])) {

        $sql_pid = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$_POST['PID'].";");

        if ($sql_pid == FALSE && $_POST['search'] == 0) {

            echo "No patient found";

        } else {
            if ($_POST['search'] == 0) {
            
                gen_patient_info($_POST['PID']);
                echo "<br>";
                gen_prescriptions($_POST['PID']);
                echo "<br>";
                echo "<form action='doc_patients_mod.php' method='POST'>";
                echo "<input type='hidden' name='PID' value=".$_POST['PID'].">";
                echo "<input type='submit' value='Modify Patient Record'></form>";

            } else {

                gen_patient_info_doctor($_SESSION['User_ID']);
            }                

        } 

    }

?>

</body>
</html>


