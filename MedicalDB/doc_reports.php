<?php
	include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
<title>Demographic Reports</title>
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

<center><div class="content">
    <h2>Demographic Report</h2>
</div></center>

<form action='' method='POST'>
<select name='compare'>
<option value='' selected disabled></option>

<?php

$sql_doc = mysqli_query($conn, "SELECT * FROM Doctors;");

while($doc = mysqli_fetch_assoc($sql_doc)) {

    echo "<option value=".$doc['NPI'].">".$doc['Name']." (".$doc['Specialization'].") </option>";

}

echo "<option value=0> Entire Clinic </option>";
echo "<input type='submit' value='Compare'>";
echo "</form><br>";

demo_report_doc($_SESSION['User_ID']);


if (isset($_POST['compare'])) {

    echo "<br> ============================ <br>";

    if ($_POST['compare'] == 0) {
        demo_report_all();
    } else {

        demo_report_doc($_POST['compare']);

    }

    echo "<br><br>";

}

?>




