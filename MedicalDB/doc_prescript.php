<?php
	include_once "includes/dbh.php";
    include_once "includes/session_check.php";
    include_once "includes/query_func.php";
?>

<html>
<head>
<title>Add Patient Prescription</title>
</head>
<body>

<link rel="stylesheet" type = "text/css" href="css/doc_prescript_style.css" />
<nav> 
        <p>Logged in as <?php echo $_SESSION['Name'] ?></p>
        <ul>
            <li><a href="#">≡</a>
                <ul>
                    <li><a href="doc_portal.php">Home</a></li>
                    <li><a href="doc_appointments.php">View Your Upcoming Appointments</a></li>
                    <li><a href="doc_patients.php">Check your patients' files</a></li>
                    <li><a href="doc_prescript.php">Write prescription</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
</nav>
<center><div class="content">
			<h2>Add Prescription</h2>
			<h3>Please fill out the following fields:</h3>
		</div></center>
		
		<center><form action = "doc_prescript_process.php" method = "POST">
			
			<p>
				<label for="Prescript_Name">Prescription Name:</label>
				<br>
				<input type="text" maxlength='100' name="Prescript_Name" id="Prescript_name" required><br>
			</p>
			<p>
				<label for="Dosage">Dosage:</label>
				<br>
				<input type="text" maxlength='225' name="Dosage" id="Dosage" required><br>
			</p>
			<p>
				Refill?
				<br>
				<label for="N"> No Refill </label>
				<input type="radio" name="Refill" id="N" value="N"><br>
				<label for="Y"> Refill Permitted </label>
				<input type="radio" name="Refill" id="Y" value="Y"><br>
			</p>
			<p>
				<label for="PID">Patient ID:</label>
				<br>
				<input type="text" minlength='6' maxlength='6' name="PID" id="PID" required><br>
			</p>
			<p>
				<label for="Expiration">Expiration Date:</label>
				<br>
				<input type='datetime-local' step=1800 value='2020-01-01T08:00' name='Expiration' required><br>
			</p>

				<input type="submit" value="Submit">
		</form></center>
	</body>
</html>