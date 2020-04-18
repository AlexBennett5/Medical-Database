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

<link rel="stylesheet" type = "text/css" href="css/doc_patients_style.css" />
<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Logged in as <?php echo $_SESSION['Name'] ?></h1>
            <a href="doc_portal.php">Home</a>
            <a href="doc_appointments.php">View Upcoming Appointments</a>
            <a href="doc_patients.php">Check Your Patients Files</a>
            <a href="doc_prescript.php">Write Prescription</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
<center><div class="content">
    <h2>Patient Records</h2>
</div></center>
<div class="box">
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
</div>

<?php

    if(isset($_POST['submit'])) {

        $sql_pid = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$_POST['PID'].";");

        if ($sql_pid == FALSE && $_POST['search'] == 0) {

            echo "No patient found";

        } else {
            if ($_POST['search'] == 0) {
            
                gen_patient_info($_POST['PID']);
                echo"<br>";
                gen_prescriptions($_POST['PID']);

            } else {

                gen_patient_info_doctor($_SESSION['User_ID']);
            }                

        } 

    }

?>

</body>
</html>


