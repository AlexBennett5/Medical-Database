<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php"
?>

<html>
<head>
<title>New Doctor Profile Created</title>
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

<?php

    $fax = "NULL";

    if(!empty($_POST['Fax'])) {
        $fax = $_POST['Fax'];
    }

    mysqli_query($conn, "INSERT INTO Doctors VALUES(".$_POST['NPI'].",'".$_POST['Name']."','".$_POST['Password']."','".$_POST['Work_phone']."','".$fax."','".$_POST['Email']."','".$_POST['Specialist']."','".$_POST['Specialization']."');") or die(mysqli_error($conn));

    if(!empty($_POST['Clinics']) & is_array($_POST['Clinics'])) {

        foreach($_POST['Clinics'] as $clinic) {
            mysqli_query($conn, "INSERT INTO Doctor_clinic VALUES(".$clinic.",".$_POST['NPI'].");") or die(mysqli_error($conn));
        }
    }

    record_action("Admin", $_SESSION['User_ID'], "Created New User", $_POST['NPI']);

    echo "Doctor profile for ".$_POST['Name']." (NPI: ".$_POST['NPI'].") created<br>";
    echo "<a href='admin_portal.php'> Return to admin portal </a>";

    


?>