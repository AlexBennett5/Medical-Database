<?php

	include_once "includes/query_func.php";

	session_start();

	record_action($_SESSION['User_Type'], $_SESSION['User_ID'], "Logged Out", $_SESSION['User_ID']);

	session_destroy();

?>

<html>
<head>
	<title>Logged Off</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="css/default.css" />

<nav> 
        <p>UH Medical Clinic</p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="login_options.php">Login</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact_form_index.php">Contact Us</a></li>
                </ul>
            </li>
        </ul>
</nav>

<center><p>You have successfully logged off</p></center>

</body>