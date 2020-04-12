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

Enter your desired date range to analyze database actions.<br>

<form method='POST'>
<input type='datetime-local' step=1800 value='2020-01-01T08:00' name='low' required><br>
<input type='datetime-local' step=1800 value='2020-01-01T08:00' name='high' required><br>
<input type='submit' value='submit' name='Submit'>
</form>

<?php
	
 if(isset($_POST['Submit'])) {
 	$low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
	$high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';

	print_action($low, $high);
 }


?>

</body>
</html>
