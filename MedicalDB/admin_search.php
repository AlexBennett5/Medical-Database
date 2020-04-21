<?php

	include_once "includes/dbh.php";
	include_once "includes/session_check.php";
	include_once "includes/query_func.php";
?>

<html>
<head>
	<title>Activity Report</title>
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

Enter parameters to analyze database info<br><br>

<form method='POST'>
<input type='datetime-local' step=1800 name='low'><br>
<input type='datetime-local' step=1800 name='high'><br><br>

<label for='user_id'>Search by User ID </label>
<input type='text' name='user_id'> <br><br>

Search by User Type<br>
<label for='Patient'>Patient</label>
<input type='checkbox' name='user_type[]' value='Patient'><br>
<label for='Nurse'>Nurse</label>
<input type='checkbox' name='user_type[]' value='Nurse'><br>
<label for='Doctor'>Doctor</label>
<input type='checkbox' name='user_type[]' value='Doctor'><br>
<label for='Admin'>Admin</label>
<input type='checkbox' name='user_type[]' value='Admin'><br><br>

Search by Action Type<br>
<label for='Logged In'>Logged In</label>
<input type='checkbox' name='action_type[]' value='Logged In'><br>
<label for='Logged Out'>Logged Out</label>
<input type='checkbox' name='action_type[]' value='Logged Out'><br>
<label for='Created New Patient'>Created New Patient</label>
<input type='checkbox' name='action_type[]' value='Created New Patient'><br>
<label for='Modified Record'>Modified Record</label>
<input type='checkbox' name='action_type[]' value='Modified Record'><br>
<label for='Scheduled Appointment'>Scheduled Appointment</label>
<input type='checkbox' name='action_type[]' value='Scheduled Appointment'><br>
<label for='Prescription Written'>Prescription Written</label>
<input type='checkbox' name='action_type[]' value='Prescription Written'><br>


<input type='submit' value='submit' name='Submit'>
</form>

<?php
	
 if(isset($_POST['Submit'])) {

 	$query = "SELECT * FROM Actions WHERE ";

 	if(!empty($_POST['low']) && !empty($_POST['high'])) {
 		$low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
		$high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';
 	} elseif (!empty($_POST['low']) && empty($_POST['high'])) {
 		$low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
		$high = "9999-12-31 23:59:59";
 	} elseif (empty($_POST['low']) && !empty($_POST['high'])) {
 		$low = "1000-01-01 00:00:00";
		$high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';
 	} else {
 		$low = "1000-01-01 00:00:00";
 		$high = "9999-12-31 23:59:59";
 	}

 	$query .= "(Action_Time BETWEEN '".$low."' AND '".$high."')";

	if (!empty($_POST['user_id'])) {
		$query .= " AND (User_ID=".$_POST['user_id'].")";
	}

	if (!empty($_POST['user_type']) && is_array($_POST['user_type'])) {

		$query .= " AND (";

		foreach($_POST['user_type'] as $type) {
			$query .= "User_Type='".$type."' OR ";
		}

		$query = substr($query, 0, -4);
		$query .= ")";
		

	}

	if (!empty($_POST['action_type']) && is_array($_POST['action_type'])) {

		$query .= " AND (";

		foreach($_POST['action_type'] as $action) {
			$query .= "Action_Type='".$action."' OR ";
		}

		$query = substr($query, 0, -4);
		$query .= ")";
		
	}

	$query .= ";";

	print_action($query);
 
 }


?>

</body>
</html>
