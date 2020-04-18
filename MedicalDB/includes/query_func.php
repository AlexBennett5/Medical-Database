
<?php

    function sql_connect() {

        $dbServerName = "localhost";
        $dbUserName = "user";
        $dbPassword = "password";
        $dbName = "meddb";

        $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName) or die("Bad connection: ".mysqli_connect_error());

        return $conn;
    }

    // ~~~APPOINTMENT LOGIC~~~ //

    function select_GP() {

        $conn = sql_connect();

        $gp_result = mysqli_query($conn, "SELECT * FROM Doctors WHERE Specialist='No';") or die(mysqli_error($conn));

        echo "Choose a general practitioner:<br>";
        echo "<p><select name='Doctor' required>";
        echo "<option value='' selected disabled></option>";
            
        while ($gp_rows = mysqli_fetch_assoc($gp_result)) {
            echo "<option value='".$gp_rows["NPI"]."'>".$gp_rows["Name"]."</option>";
        }

        echo "</select></p><br>";
    }

    function select_specialist() {

        $conn = sql_connect();

        $doc_result = mysqli_query($conn, "SELECT * FROM Doctors WHERE Specialist='Yes';") or die(mysqli_error($conn));

        echo "Choose a specialist:<br>";
        echo "<p><select name='Doctor' required>";
        echo "<option value='' selected disabled></option>";
            
        while ($doc_rows = mysqli_fetch_assoc($doc_result)) {
            echo "<option value='".$doc_rows["NPI"]."'>".$doc_rows["Name"]." (".$doc_rows["Specialization"].") </option>";
        }

        echo "</select></p><br>";
    }

    function select_clinic() {

        $conn = sql_connect();

        $loc_result = mysqli_query($conn, "SELECT * FROM Clinics;") or die(mysqli_error($conn));
        echo "Which clinic would you like to have your appointment at?<br>";

        echo "<p><select name='Clinic' required>";
        echo "<option value='' selected disabled></option>";

        while ($loc_rows = mysqli_fetch_assoc($loc_result)){
            echo "<option value='".$loc_rows["Clinic_ID"]."'>".$loc_rows["Clinic_name"]."</option>";
        }
        
        echo "</select></p><br>";
    }

    function select_datetime() {
        echo "Choose the desired appointment date and time:<br>";
        echo "<p><input type='datetime-local' step=1800 value='2020-01-01T08:00' name='Time' required></p><br>";
    }

    function print_apmt($Apmt_ID, $Doc_ID) {

        $conn = sql_connect();

        $sql_apmt = mysqli_query($conn, "SELECT * FROM Appointments WHERE Appt_ID=".$Apmt_ID." AND Doctor_ID=".$Doc_ID.";") or die(mysqli_error($conn));
        $apmt = mysqli_fetch_assoc($sql_apmt);

        $sql_doc = mysqli_query($conn, "SELECT * FROM Doctors WHERE NPI=".$apmt['Doctor_ID'].";") or die(mysqli_error($conn));
        $sql_patient = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$apmt['Patient_ID'].";") or die(mysqli_error($conn));
        $sql_clinic = mysqli_query($conn, "SELECT * FROM Clinics WHERE Clinic_ID=".$apmt['Clinic_ID'].";") or die(mysqli_error($conn));

        $doc = mysqli_fetch_assoc($sql_doc);
        $patient = mysqli_fetch_assoc($sql_patient);
        $clinic = mysqli_fetch_assoc($sql_clinic);

        echo "<tr><td> ".$Apmt_ID." </td>";
        echo "<td> ".$doc['Name']." (".$doc['NPI'].") </td>";
        echo "<td> ".$patient['Last_Name'].", ".$patient['First_Name']." (".$patient['PID'].") </td>";
        echo "<td> ".$apmt['Has_approval']." </td>";
        echo "<td> ".$clinic['Clinic_name']." </td>";
        echo "<td> ".$apmt['Appointment_time']." </td>";

    }

    function print_apmt_range($low, $high, $Doc_ID) {

        $conn = sql_connect();

        $sql_apmt = mysqli_query($conn, "SELECT * FROM Appointments WHERE Doctor_ID=".$Doc_ID." AND Appointment_time >= '".$low."' AND Appointment_time <= '".$high."';") or die(mysqli_error($conn));

        if (mysqli_num_rows($sql_apmt) == 0) {

            echo "No appointments found in this range";

        } else {

            echo "<table><tr><th> Apmt ID </th>";
            echo "<th> Doctor (NPI) </th>";
            echo "<th> Patient (PID)</th>";
            echo "<th> Has approval? </th>";
            echo "<th> Location </th>";
            echo "<th> Appointment Time </th></tr>";

            while($apmt = mysqli_fetch_assoc($sql_apmt)) {

                print_apmt($apmt['Appt_ID'], $Doc_ID);
            }

        }

    }

    // ~~~PATIENT INFO LOGIC~~~ //

    //Displays patient info (Demo, Med Hist, etc.) for choosen PID
    function gen_patient_info($PID) {

        $conn = sql_connect();
    
        $sql_patient = mysqli_query($conn, "SELECT * FROM Patients WHERE PID= '$PID' ;") or die(mysqli_error($conn));
        $data = mysqli_fetch_assoc($sql_patient);
        
        $sql_demo = mysqli_query($conn, "SELECT * FROM Demographics WHERE Demo_ID= '$data[Demographics_ID]';") or die(mysqli_error($conn));
        $demo = mysqli_fetch_assoc($sql_demo);

        $sql_med = mysqli_query($conn, "SELECT * FROM Medical_history WHERE Med_Hist_ID='$data[Med_Hist_ID]';") or die(mysqli_error($conn));
        $med = mysqli_fetch_assoc($sql_med);

        $sql_fam = mysqli_query($conn, "SELECT * FROM Family_history WHERE Fam_Hist_ID='$data[Fam_Hist_ID]';") or die(mysqli_error($conn));
        $fam = mysqli_fetch_assoc($sql_fam);

        $sql_doc = mysqli_query($conn, "SELECT * FROM Doctors WHERE NPI IN (SELECT NPI FROM Doctor_patient WHERE PID='$PID') AND Specialist='Yes';") or die(mysqli_error($conn));
        $sql_gp = mysqli_query($conn, "SELECT * FROM Doctors WHERE NPI IN (SELECT NPI FROM Doctor_patient WHERE PID='$PID') AND Specialist='No';") or die(mysqli_error($conn));
        $doc_gp = mysqli_fetch_assoc($sql_gp);

        $sql_nurse = mysqli_query($conn, "SELECT * FROM Nurses WHERE NID= '$data[NID]';");
        $nurse = mysqli_fetch_assoc($sql_nurse);


        echo "<table><tr><th>Name</th>";
        echo "<th>PID</th>";
        echo "<th>Last 4 SSN</th>";
        echo "<th>Age</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Has insurance?</th>";
        echo "<th>Ethnicity</th>";
        echo "<th>Marital Status</th></tr>";

        echo "<tr><td align='center'>".$data['First_Name']." ".$data['Last_Name']."</td>";
        echo "<td align='center'>".$PID."</td>";
        echo "<td align='center'>".$data['Last_4_SSN']."</td>";
        echo "<td align='center'>".$demo['Age']."</td>";
        echo "<td align='center'>".$demo['Date_of_birth']."</td>";
        echo "<td align='center'>".$demo['Has_insurance']."</td>";
        echo "<td align='center'>".$demo['Ethnicity']."</td>";
        echo "<td align='center'>".$demo['Marital_status']."</td></tr>";

        echo "<tr><th>Home Phone</th>";
        echo "<th>Cell Phone</th>";
        echo "<th>Work Phone</th>";
        echo "<th>Email</th>";
        echo "<th>Previous Conditions</th>";
        echo "<th>Past Surgeries</th>";
        echo "<th>Blood Type</th></tr>";
       
        echo "<tr><td align='center'>".$demo['Home_phone']."</td>";
        echo "<td align='center'>".$demo['Cell_phone']."</td>";
        echo "<td align='center'>".$demo['Work_phone']."</td>";
        echo "<td align='center'>".$demo['Email']."</td>";
        echo "<td>".$med['Prev_conditions']."</td>";
        echo "<td>".$med['Past_surgeries']."</td>";
        echo "<td align='center'>".$med['Blood_type']."</td></tr>";

        echo "<tr><th>Past Prescriptions</th>";
        echo "<th>Family History</th>";
        echo "<th>Primary Care/GP</th>";
        echo "<th>Other Doctors</th>";
        echo "<th>Nurse</th></tr>";

        echo "<tr><td>".$med['Past_prescriptions']."</td>";
        echo "<td>".$fam['Fam_History']."</td>";
        echo "<td align='center'>".$doc_gp['Name']."</td>";
        echo "<td align='center'>";

        while($docs = mysqli_fetch_assoc($sql_doc)) {
            echo $docs['Name']." (".$docs['Specialization'].") <br>";
        }
        echo "</td>";

        echo "<td align='center'>".$nurse['Name']."</td></tr>";
        echo "</table>";

    }

    //Displays prescription info for choosen PID
    function gen_prescriptions($PID) {

        $conn = sql_connect();

        $sql_pres = mysqli_query($conn, "SELECT * FROM Prescriptions WHERE Patient='$PID';");

        if (mysqli_num_rows($sql_pres)==0) {
            echo "No prescriptions";
            return;
        }

        echo "<table><tr><th> Drug </th>";
        echo "<th> Dosage </th>";
        echo "<th> Refill </th>";
        echo "<th> Expiration Date </th>";
        echo "<th> Expired? </th>";
        echo "<th> Prescribing Doctor </th></tr>";

        while($pres = mysqli_fetch_assoc($sql_pres)) {

            echo "<tr><td align='center'>".$pres['Prescript_Name']."</td>";
            echo "<td align='center'>".$pres['Dosage']."</td>";
            echo "<td align='center'>".$pres['Refill']."</td>";
            echo "<td align='center'>".$pres['Expiration_date']."</td>";

            $current_time = date("Y-m-d H:i:s");

            if($current_time > $pres['Expiration_date']) {
                echo "<td align='center'> Yes </td>";
            } else {
                echo "<td align='center'> No </td>";
            }

            $sql_doc = mysqli_query($conn, "SELECT * FROM Doctors WHERE NPI='$pres[Prescribing_doc]';");
            $doc = mysqli_fetch_assoc($sql_doc);

            echo "<td align='center'>".$doc['Name']."</td></tr>";

        }

        echo "</table>";

    }

    //Generates patient info for every patient associated with doctor ID $NPI
    function gen_patient_info_doctor($NPI) {

        $conn = sql_connect();

        $sql_patient = mysqli_query($conn, "SELECT * FROM Doctor_patient WHERE NPI=".$NPI.";");

        while($patient = mysqli_fetch_assoc($sql_patient)) {
            gen_patient_info($patient['PID']);
            echo "<br>";
            gen_prescriptions($patient['PID']);
            echo "<br> =================== <br>";
        }

    }

    // ~~MODIFY LOGIC~~

    //Generates modify patient record form (sans form heading w/ method/action) for given PID
    function mod_patient($PID) {

        $conn = sql_connect();
        $sql_patient = mysqli_query($conn, "SELECT * FROM Patients WHERE PID=".$PID.";");
        $patient = mysqli_fetch_assoc($sql_patient);

        $sql_demo = mysqli_query($conn, "SELECT * FROM Demographics WHERE Demo_ID=".$patient['Demographics_ID'].";") or die(mysqli_error($conn));
        $demo = mysqli_fetch_assoc($sql_demo);

        $sql_med = mysqli_query($conn, "SELECT * FROM Medical_history WHERE Med_Hist_ID=".$patient['Med_Hist_ID'].";") or die(mysqli_error($conn));
        $med = mysqli_fetch_assoc($sql_med);

        $sql_fam = mysqli_query($conn, "SELECT * FROM Family_history WHERE Fam_Hist_ID=".$patient['Fam_Hist_ID'].";") or die(mysqli_error($conn));
        $fam = mysqli_fetch_assoc($sql_fam);

        echo "You are modifying the record of ".$patient['First_Name']." ".$patient['Last_Name']." (".$PID.")<br><br>";

        echo "<input type='hidden' name='PID' value=".$PID.">";

        echo "<label for='First_Name'> First name: </label>";
        echo "<input type='text' name='First_Name' value=".$patient['First_Name']."><br>";

        echo "<label for='Last_Name'> First name: </label>";
        echo "<input type='text' name='Last_Name' value=".$patient['Last_Name']."><br>";

        echo "<label for='SSN'> Last 4 Digits SSN: </label>";
        echo "<input type='text' minlength=4 maxlength=4 name='SSN' value=".$patient['Last_4_SSN']."><br>";

        echo "<label for='Age'> Age: </label>";
        echo "<input type='number' min='0' max='120' name='Age' value=".$demo['Age']."><br>";

        echo "<label for='DOB'> Date of Birth: </label>";
        echo "<input type='date' name='DOB' value=".$demo['Date_of_birth']."><br>";

        echo "Ethnicity. Current value: ".$demo['Ethnicity']."<br>";
        echo "<label for='Asian/Pacific Islander'>Asian/Pacific Islander</label>";
        echo "<input type='radio' name='ethnicity' value='Asian/Pacific Islander' required><br>";
        echo "<label for='African-American'>African-American</label>";
        echo "<input type='radio' name='ethnicity' value='African-American'><br>";
        echo "<label for='Native American'>Native American</label>";
        echo "<input type='radio' name='ethnicity' value='Native American'><br>";
        echo "<label for='White'>White</label>";
        echo "<input type='radio' name='ethnicity' value='White'><br>";
        echo "<label for='Hispanic'>Hispanic</label>";
        echo "<input type='radio' name='ethnicity' value='Hispanic'><br>";
        echo "<label for='Other'>Other</label>";
        echo "<input type='radio' name='ethnicity' value='Other'><br><br>";

        echo "Marital Status. Current value: ".$demo['Marital_status']."<br>";
        echo "<label for='Single'>Single</label>";
        echo "<input type='radio' name='marital' value='Single' required><br>";
        echo "<label for='Married'>Married</label>";
        echo "<input type='radio' name='marital' value='Married'><br>";
        echo "<label for='Widowed'>Widowed</label>";
        echo "<input type='radio' name='marital' value='Widowed'><br>";
        echo "<label for='Divorced'>Divorced</label>";
        echo "<input type='radio' name='marital' value='Divorced'><br>";
        echo "<label for='Separated'>Separated</label>";
        echo "<input type='radio' name='marital' value='Separated'><br><br>";

        echo "<label for='home_phone'>Home phone:</label>";
        echo "<input type='tel' name='home_phone' pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' value='".$demo['Home_phone']."'>";
        echo "<small> Format: (123) 345-1234</small><br>";

        echo "<label for='cell_phone'>Cell phone:</label>";
        echo "<input type='tel' name='cell_phone' pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' value='".$demo['Cell_phone']."'>";
        echo "<small> Format: (123) 345-1234</small><br>";

        echo "<label for='work_phone'>Work phone:</label>";
        echo "<input type='tel' name='work_phone' pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' value='".$demo['Work_phone']."'>";
        echo "<small> Format: (123) 345-1234</small><br>";

        echo "<label for='email'>Email address:</label>";
        echo "<input type='text' maxlength=80 name='email' value=".$demo['Email']."><br><br>";        

        echo "<label for='allergies'>Allergies:</label>";
        echo "<textarea name='allergies' maxlength='225' rows='4' cols='50'>".$demo['Allergies']."</textarea><br><br>";

        echo "<label for='prev_cond'>Previous Conditions:</label>";
        echo "<textarea name='prev_cond' maxlength='225' rows='4' cols='50'>".$med['Prev_conditions']."</textarea><br><br>";

        echo "<label for='past_surg'>Past Surgeries:</label>";
        echo "<textarea name='past_surg' maxlength='225' rows='4' cols='50'>".$med['Past_surgeries']."</textarea><br><br>";

        echo "<label for='past_prescript'>Previous Prescriptions:</label>";
        echo "<textarea name='past_prescript' maxlength='225' rows='4' cols='50'>".$med['Past_prescriptions']."</textarea><br><br>";

        echo "<label for='family_hist'>Family History:</label>";
        echo "<textarea name='family_hist' maxlength='225' rows='4' cols='50'>".$fam['Fam_History']."</textarea><br><br>";

    }

    //Generates modify nurse record form (sans form heading w/ method/action) for given NID
    function mod_nurse($NID) {

        $conn = sql_connect();
        $sql_nurse = mysqli_query($conn, "SELECT * FROM Nurses WHERE NID=".$NID.";");
        $nurse = mysqli_fetch_assoc($sql_nurse);

        echo "You are modifying the record of ".$nurse['Name']." (".$NID.")<br><br>";

        echo "<input type='hidden' name='NID' value=".$NID.">";

        echo "<label for='Name'> Name: </label>";
        echo "<input type='text' name='Name' value='".$nurse['Name']."'><br>";

        echo "<label for='job_desc'>Job Description:</label>";
        echo "<textarea name='job_desc' maxlength='225' rows='4' cols='50'>".$nurse['Job_description']."</textarea><br><br>";


    }

    //Generates modify doctor record form (sans form heading w/ method/action) for given NPI
    function mod_doctor($NPI) {

        $conn = sql_connect();
        $sql_doctor = mysqli_query($conn, "SELECT * FROM Doctors WHERE NPI=".$NPI.";");
        $doctor = mysqli_fetch_assoc($sql_doctor);

        echo "You are modifying the record of ".$doctor['Name']." (".$NPI.")<br><br>";

        echo "<input type='hidden' name='NPI' value=".$NPI.">";

        echo "<label for='Name'> Name: </label>";
        echo "<input type='text' name='Name' value='".$doctor['Name']."'><br>";

        echo "<label for='work_phone'>Work phone:</label>";
        echo "<input type='tel' name='work_phone' pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' value='".$doctor['Work_phone']."'>";
        echo "<small> Format: (123) 345-1234</small><br>";

        echo "<label for='fax'>Fax:</label>";
        echo "<input type='tel' name='fax' pattern='\([0-9]{3}\) [0-9]{3}-[0-9]{4}' value='".$doctor['Fax']."'>";
        echo "<small> Format: (123) 345-1234</small><br>";

        echo "<label for='email'>Email address:</label>";
        echo "<input type='text' maxlength=80 name='email' value=".$doctor['Email']."><br><br>";

        echo "Specialist? Current value: ".$doctor['Specialist']."<br>";
        echo "<label for='Yes'>Yes</label>";
        echo "<input type='radio' name='Specialist' value='Yes' required><br>";
        echo "<label for='No'>No</label>";
        echo "<input type='radio' name='Specialist' value='No'><br>";

        echo "<label for='Specialization'> Specialization: </label>";
        echo "<input type='text' name='Specialization' value='".$doctor['Specialization']."'><br>";

    }

    //Generates list of patient names to modify
    function gen_mod_patient_list() {

        $conn = sql_connect();
        $sql_patient = mysqli_query($conn, "SELECT * FROM Patients ORDER BY Last_Name");

        echo "<table><tr><th> PID </th>";
        echo "<th> Last Name </th>";
        echo "<th> First Name </th>";
        echo "<th> Action </th></tr>";

        while($patient = mysqli_fetch_assoc($sql_patient)) {

            echo "<tr><td> ".$patient['PID']." </td>";
            echo "<td> ".$patient['Last_Name']." </td>";
            echo "<td> ".$patient['First_Name']." </td>";
            echo "<td><form action='admin_mod_patient_process.php' method='POST'>";
            echo "<input type='hidden' name='PID' value=".$patient['PID'].">";
            echo "<input type='submit' name='Modify Record'></form></td></tr>";

        }

        echo "</table>";

    }

    //Generates list of nurse names to modify
    function gen_mod_nurse_list() {

        $conn = sql_connect();
        $sql_nurse = mysqli_query($conn, "SELECT * FROM Nurses ORDER BY Name");

        echo "<table><tr><th> NID </th>";
        echo "<th> Name </th>";
        echo "<th> Action </th></tr>";

        while($nurse = mysqli_fetch_assoc($sql_nurse)) {

            echo "<tr><td> ".$nurse['NID']." </td>";
            echo "<td> ".$nurse['Name']." </td>";
            echo "<td><form action='admin_mod_nurse_process.php' method='POST'>";
            echo "<input type='hidden' name='NID' value=".$nurse['NID'].">";
            echo "<input type='submit' name='Modify Record'></form></td></tr>";

        }

        echo "</table>";

    }

    //Generates list of doctor names to modify
    function gen_mod_doctor_list() {

        $conn = sql_connect();
        $sql_doctor = mysqli_query($conn, "SELECT * FROM Doctors ORDER BY Name");

        echo "<table><tr><th> NID </th>";
        echo "<th> Name </th>";
        echo "<th> Action </th></tr>";

        while($doctor = mysqli_fetch_assoc($sql_doctor)) {

            echo "<tr><td> ".$doctor['NPI']." </td>";
            echo "<td> ".$doctor['Name']." </td>";
            echo "<td><form action='admin_mod_doctor_process.php' method='POST'>";
            echo "<input type='hidden' name='NPI' value=".$doctor['NPI'].">";
            echo "<input type='submit' name='Modify Record'></form></td></tr>";
        }

        echo "</table>";        

    }

    // ~~~ACTION/REPORT LOGIC~~~

    //Records user action
    function record_action($User_Type, $User_ID, $Action_Type, $Record_Modified) {

        $conn = sql_connect();

        $time = date("Y-m-d H:i:s");

        mysqli_query($conn, "INSERT INTO Actions VALUES(NULL,'".$User_Type."',".$User_ID.",'".$Action_Type."',".$Record_Modified.",'".$time."');") or die(mysqli_error($conn));

    }

    //Prints out list of user actions from datetime range low to high
    function print_action($low, $high) {

        $conn = sql_connect();

        $date1 = new DateTime($low);
        $date2 = new DateTime($high);

        if ($low > $high) {
            echo "Error: Your search interval was invalid <br>";
            echo "<a href='admin_report.php>Return to the admin report page</a>";
        } else {

            $res = mysqli_query($conn, "SELECT * FROM Actions WHERE Action_Time BETWEEN '".$low."' AND '".$high."';");

            echo "<table>";
            echo "<tr><th> Action ID </th>";
            echo "<th> User ID </th>";
            echo "<th> User Type </th>";
            echo "<th> Action Type </th>";
            echo "<th> Record Modified </th>";
            echo "<th> Action Time </th></tr>";

            while($action = mysqli_fetch_assoc($res)) {

                echo "<tr><td>".$action['Action_ID']."</td>";
                echo "<td>".$action['User_ID']."</td>";
                echo "<td>".$action['User_Type']."</td>";
                echo "<td>".$action['Action_Type']."</td>";
                echo "<td>".$action['Record_Modified_ID']."</td>";
                echo "<td>".$action['Action_Time']."</td></tr>";

            }
            echo "</table>";

        }

    }

    function print_session() {

        echo "Hello ".$_SESSION['User_Type'];
    }


?>