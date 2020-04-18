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

<link rel="stylesheet" type = "text/css" href="css/default.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="admin_mod_portal.php">Modify Records</a>
                    <li><a href="admin_report.php">View reports </a>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>

<?php

            mysqli_query($conn, "UPDATE Nurses SET Name='".$_POST['Name']."', Job_description='".$_POST['job_desc']."' WHERE NID=".$_POST['NID'].";") or die(mysqli_error($conn));

            record_action("Admin", $_SESSION['User_ID'], "Modified Record", $_POST['NID']);

            echo "The record was successfully updated!<br><br>";

?>