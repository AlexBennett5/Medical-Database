<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>Create New Nurse Profile</title>
</head>
<body>

<link rel="stylesheet" type = "text/css" href="css/default.css" />
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

Enter information to create new nurse profile:<br>

<form action='admin_new_nurse_process.php' method='POST'>
<label for='Name'>Name:</label>
<input type='text' name='Name' required><br>
<label for='Password'>Password: </label>
<input type='text' name='Password' minlength='5' maxlength='80' required><br>
<label for='Email'>Email: </label>
<input type='text' name='Email' maxlength=80 required><br>
<label for='Job_description'> Job Description: </label>
<textarea name="Job_description" maxlength="225" rows="4" cols="50"></textarea><br><br>

<input type='submit' name='submit' value='Create New Nurse Profile'>

</form>