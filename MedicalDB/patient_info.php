<?php
    include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";

    gen_patient_info($_SESSION['PID']);
?>

