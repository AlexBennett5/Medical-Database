<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>Website Reports</title>
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

Generate report of recent user activity <br><br>

<form method="POST">

Restrict by User Type <br>
<label for='Patient'>Patient</label>
<input type='checkbox' name='user_type[]' value='Patient'><br>
<label for='Nurse'>Nurse</label>
<input type='checkbox' name='user_type[]' value='Nurse'><br>
<label for='Doctor'>Doctor</label>
<input type='checkbox' name='user_type[]' value='Doctor'><br>
<label for='Admin'>Admin</label>
<input type='checkbox' name='user_type[]' value='Admin'><br><br>

Date range of activity<br>
<input type='datetime-local' step=1800 name='low'><br>
<input type='datetime-local' step=1800 name='high'><br><br>

Which action types to analyze<br><br>
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
<input type='checkbox' name='action_type[]' value='Prescription Written'><br><br>

<input type='submit' name='submit'><br>

</form>

<?php

if(isset($_POST['submit'])) {

    if(!empty($_POST['low']) && !empty($_POST['high'])) {
        $low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
        $high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';
        $range = "from ".$low." to ".$high;
    } elseif (!empty($_POST['low']) && empty($_POST['high'])) {
        $low = substr($_POST['low'],0,10).' '.substr($_POST['low'],11).':00';
        $high = "9999-12-31 23:59:59";
        $range = "from ".$low;
    } elseif (empty($_POST['low']) && !empty($_POST['high'])) {
        $low = "1000-01-01 00:00:00";
        $high = substr($_POST['high'],0,10).' '.substr($_POST['high'],11).':00';
        $range = "to ".$high;
    } else {
        $low = "1000-01-01 00:00:00";
        $high = "9999-12-31 23:59:59";
        $range = "website's entire history";
    }

    $user_range = "";

    if(!empty($_POST['user_type']) && is_array($_POST['user_type'])) {

        foreach($_POST['user_type'] as $type) {
            $user_range .= $type.",";
        }

        $user_range = substr($user_range, 0, -1);

    } else {
        $user_range .= "All";
    }



    echo "<h2> Activity Report for range ".$range."</h2><br><br>";
    echo "User Types queried: ".$user_range."<br><br>";

    if(!empty($_POST['action_type']) && is_array($_POST['action_type'])) {

        if (!empty($_POST['user_type']) && is_array($_POST['user_type'])) {
            foreach($_POST['action_type'] as $action) {

                echo "<h3>".$action."</h3><br><br>";

                foreach($_POST['user_type'] as $user) {

                    echo "User Type: ".$user."<br><br>";
                    $freq = action_freq_type($low, $high, $user, $action);
                    echo $freq." '".$action."' performed in interval<br><br>";

                    echo "Frequency table: <br>";
                    gen_freq_table($low, $high, $user, $action);
                    echo "<br><br>";

                }

            }
        } else {
            foreach($_POST['action_type'] as $action) {

                echo "<h3>".$action."</h3><br><br>";

                    $freq = action_freq($low, $high, $action);
                    echo $freq." average daily ".$action."s in interval<br>";


            }
        }
    
    } else {
        if (!empty($_POST['user_type']) && is_array($_POST['user_type'])) {

                echo "<h3>All Actions</h3><br><br>";

                foreach($_POST['user_type'] as $user) {

                    echo "User Type: ".$user."<br><br>";
                    $freq = action_freq_type($low, $high, $user, "");
                    echo $freq." average daily actions in interval<br><br>";

                    echo "Frequency table: <br>";
                    gen_freq_table($low, $high, $user, "");
                    echo "<br><br>";

                }

            
        } else {
            
            echo "<h3>All Actions</h3><br><br>";
            $freq = action_freq_type($low, $high, "", "");
            echo $freq." average daily actions in interval<br><br>";

        }

    }


}


?>








