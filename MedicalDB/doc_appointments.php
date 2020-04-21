<?php
	include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
<title>Upcoming Appointments</title>
</head>

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
    <h2>View Upcoming Appointments</h2>

<center>
Check your upcoming appointments for the following range:<br><br>
<form action='' method='POST'>
<label for='low'>From:</label>
<input type='datetime-local' step=1800 value='2020-01-01T08:00' name='low'><br>
<label for='high'>To:</label>
<input type='datetime-local' step=1800 value='2020-01-01T08:00' name='high'><br>
<label for='search_some'>Search Range</label>
<input type='radio' id='search_some' value=0 name='search'><br>
<label for='search_all'>Display all Appointments</label>
<input type='radio' id='search_all' value=1 name='search'><br>
<input type='submit' name='submit' value='Submit'>
</form><br><br>
</center>
</div>

<?php

    if(isset($_POST['submit'])) {

        $dt_low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
        $dt_high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';
        $low = new DateTime($dt_low);
        $high = new DateTime($dt_high);



        if ($_POST['search'] == 0 && $low >= $high) {
            echo "Invalid time interval."; 
        
        } elseif ($_POST['search'] == 0) {

            print_apmt_range($dt_low, $dt_high, $_SESSION['User_ID']);

        } else {

            print_apmt_range('1000-01-01 00:00:00', '9999-12-31 00:00:00', $_SESSION['User_ID']);
        }

    }

?>

</body>
</html>


