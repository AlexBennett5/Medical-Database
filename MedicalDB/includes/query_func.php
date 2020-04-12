
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

        echo "Choose a general practitioner:";
        echo "<p><select name='Doctor' required>";
        echo "<option value='' selected disabled></option>";
            
        while ($gp_rows = mysqli_fetch_assoc($gp_result)) {
            echo "<option value='".$gp_rows["NPI"]."'>".$gp_rows["Name"]."</option>";
        }

        echo "</select></p>";
    }

    function select_specialist() {

        $conn = sql_connect();

        $doc_result = mysqli_query($conn, "SELECT * FROM Doctors WHERE Specialist='Yes';") or die(mysqli_error($conn));

        echo "Choose a specialist:";
        echo "<p><select name='Doctor' required>";
        echo "<option value='' selected disabled></option>";
            
        while ($doc_rows = mysqli_fetch_assoc($doc_result)) {
            echo "<option value='".$doc_rows["NPI"]."'>".$doc_rows["Name"]." (".$doc_rows["Specialization"].") </option>";
        }

        echo "</select></p>";
    }

    function select_clinic() {

        $conn = sql_connect();

        $loc_result = mysqli_query($conn, "SELECT * FROM Clinics;") or die(mysqli_error($conn));
        echo "Which clinic would you like to have your appointment at?";

        echo "<p><select name='Clinic' required>";
        echo "<option value='' selected disabled></option>";

        while ($loc_rows = mysqli_fetch_assoc($loc_result)){
            echo "<option value='".$loc_rows["Clinic_ID"]."'>".$loc_rows["Clinic_name"]."</option>";
        }
        
        echo "</select></p>";
    }

    function select_datetime() {
        echo "Choose the desired appointment date and time:";
        echo "<p><input type='datetime-local' step=1800 value='2020-01-01T08:00' name='Time' required></p>";
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
        }

        echo "<table><tr><th> Drug </th>";
        echo "<th> Dosage </th>";
        echo "<th> Refill </th>";
        echo "<th> Prescribing Doctor </th></tr>";

        while($pres = mysqli_fetch_assoc($sql_pres)) {

            echo "<tr><td align='center'>".$pres['Prescript_Name']."</td>";
            echo "<td align='center'>".$pres['Dosage']."</td>";
            echo "<td align='center'>".$pres['Refill']."</td>";

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