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
            <a href="doc_reports.php">Demographic Reports</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

<?php

            $famhist = mysqli_escape_string($conn, $_POST['family_hist']);



            $sql_check = mysqli_query($conn, "SELECT * FROM Doctor_patient WHERE PID=".$_POST['PID']." AND NPI=".$_SESSION['User_ID'].";");

            $check = FALSE;

            if (mysqli_num_rows($sql_check) > 0) {
                $check = TRUE;
            }

            mysqli_query($conn, "UPDATE Patients SET First_Name='".$_POST['First_Name']."', Last_Name='".$_POST['Last_Name']."', Last_4_SSN=".$_POST['SSN']." WHERE PID=".$_POST['PID'].";") or die(mysqli_error($conn));

            $sql_patient = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$_POST['PID'].";");
            $patient = mysqli_fetch_assoc($sql_patient);
            $sql_demo = mysqli_query($conn, "SELECT * FROM Demographics WHERE Demo_ID=".$patient['Demographics_ID'].";") or die(mysqli_error($conn));
            $demo = mysqli_fetch_assoc($sql_demo);

            $sql_med = mysqli_query($conn, "SELECT * FROM Medical_history WHERE Med_Hist_ID=".$patient['Med_Hist_ID'].";") or die(mysqli_error($conn));
            $med = mysqli_fetch_assoc($sql_med);

            $sql_fam = mysqli_query($conn, "SELECT * FROM Family_history WHERE Fam_Hist_ID=".$patient['Fam_Hist_ID'].";") or die(mysqli_error($conn));
            $fam = mysqli_fetch_assoc($sql_fam);

            mysqli_query($conn, "UPDATE Demographics SET Has_insurance='".$_POST['insurance']."', Age=".$_POST['Age'].", Date_of_birth='".$_POST['DOB']."', Ethnicity='".$_POST['ethnicity']."', Marital_status='".$_POST['marital']."', Home_phone='".$_POST['home_phone']."', Cell_phone='".$_POST['cell_phone']."', Work_phone='".$_POST['work_phone']."', Allergies='".$_POST['allergies']."' WHERE Demo_ID=".$demo['Demo_ID'].";") or die(mysqli_error($conn));

            mysqli_query($conn, "UPDATE Medical_history SET Prev_conditions='".$_POST['prev_cond']."', Past_surgeries='".$_POST['past_surg']."', Past_prescriptions='".$_POST['past_prescript']."' WHERE Med_Hist_ID=".$med['Med_Hist_ID'].";") or die(mysqli_error($conn));

            mysqli_query($conn, "UPDATE Family_history SET Fam_History='".$famhist."' WHERE Fam_Hist_ID=".$fam['Fam_Hist_ID'].";") or die(mysqli_error($conn));

            if($_POST['add_to_patients'] == 0 && !$check) {

                mysqli_query($conn, "INSERT INTO Doctor_patient VALUES(".$_POST['PID'].",".$_SESSION['User_ID'].");") or die(mysqli_error($conn));

            } elseif ($_POST['add_to_patients'] == 1 & $check) {

                mysqli_query($conn, "DELETE FROM Doctor_patient WHERE NPI=".$_SESSION['User_ID']." AND PID=".$_POST['PID'].";");

            }

            record_action("Doctor", $_SESSION['User_ID'], "Modified Record", $_POST['PID']);

            echo "The record was successfully updated!<br><br>";
            gen_patient_info($_POST['PID']);

?>