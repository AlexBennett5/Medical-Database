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

<link rel="stylesheet" type = "text/css" href="css/default.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="doc_portal.php">Home</a></li>
                    <li><a href="doc_appointments.php">View Your Upcoming Appointments</a></li>
                    <li><a href="doc_patients.php">Check your patients' files</a></li>
                    <li><a href="doc_prescript.php">Write prescription</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>

Search for a patient<br><br>
<form action='' method='POST'>
<label for='PID'>Enter patient PID:</label>
<input type='text' minlength='6' maxlength ='6' name='PID'><br><br>
<label for='search_some'>Search from PID</label>
<input type='radio' id='search_pid' value=0 name='search'><br>
<label for='search_all'>Display your current patients</label>
<input type='radio' id='search_all' value=1 name='search'><br>
<input type='submit' name='submit' value='submit'>
</form><br><br>

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


