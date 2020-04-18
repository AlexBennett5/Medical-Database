<!DOCTYPE html>
<html>
<head>
	<title> Patient Login </title>
</head>
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


<center><h2> Patient Login </h2></center><br>

<center><form action="patient_exist_process.php" method="POST">
<label for="PID"> Enter your PID:</label>
<input type="text" minlength="6" maxlength="6" name="PID" required><br>
<label for="Password"> Enter your password:</label>
<input type="password" maxlength="80" name="password" required><br>
<input type="submit" value="Submit"><br>
</form>
</center>


<center> 
	<a href="patient_new.php">New patient? Click here to create account</a>
</center><br>

<center>
	<a href="login_options.php">Return to Login Options menu</a>
</center><br>

</html>