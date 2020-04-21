<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>Modify Nurse Record</title>
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

Enter NID of the record you want to edit<br><br>

<form action='admin_mod_nurse_process.php' method="POST">
<input type="text" name="PID">
<input type="submit" value="search">
</form><br><br>

<?php gen_mod_nurse_list() ?>

<br>

<form action='admin_new_nurse.php' method='POST'>
<input type='submit' value='Create New Nurse'>
</form><br><br>