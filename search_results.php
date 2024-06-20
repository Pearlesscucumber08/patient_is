<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h2>Search Results</h2>
    <div class="container">
        <?php
        // Database connection
        $connection = mysqli_connect('localhost', 'root', '', 'patient_is');

        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if ID is provided in the URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Sanitize input to prevent SQL injection
            $id = mysqli_real_escape_string($connection, $id);

            // Query to fetch data from 'patient' and 'record' tables based on ID
            $query_patient = "SELECT * FROM patient WHERE P_ID = '$id'";
            $query_record = "SELECT * FROM record WHERE R_ID = '$id'";

            // Execute queries
            $query_patient_run = mysqli_query($connection, $query_patient);
            $query_record_run = mysqli_query($connection, $query_record);

            // Check if any results were found in patient table
            if (mysqli_num_rows($query_patient_run) > 0) {
                // Display patient details
                $patient_row = mysqli_fetch_array($query_patient_run);
                ?>
                <h3>Patient Details</h3>
                <form class="search1" action="" method="POST">
                    <input type="hidden" name="P_ID" value="<?php echo $patient_row['P_ID']; ?>"/><br/>
                    <input type="text" name="NAME" value="<?php echo $patient_row['NAME']; ?>"/><br/>
                    <input type="text" name="AGE" value="<?php echo $patient_row['AGE']; ?>"/><br/>
                    <input type="text" name="STATUS" value="<?php echo $patient_row['STATUS']; ?>"/><br/>
                    <input type="text" name="CONTACT" value="<?php echo $patient_row['CONTACT']; ?>"/><br/>
                    <input type="text" name="ADDRESS" value="<?php echo $patient_row['ADDRESS']; ?>"/><br/>
                </form>
                <?php
            } else {
                echo "No patient found for ID: " . $id;
            }

            // Check if any results were found in record table
            if (mysqli_num_rows($query_record_run) > 0) {
                // Display record details
                $record_row = mysqli_fetch_array($query_record_run);
                ?>
                <h3>Record Details</h3>
                <form class="search1" action="" method="POST">
                    <input type="hidden" name="R_ID" value="<?php echo $record_row['R_ID']; ?>"/><br/>
                    <input type="text" name="DATA_OF_ENTRY" value="<?php echo $record_row['DATA_OF_ENTRY']; ?>"/><br/>
                    <input type="text" name="DEPARTURE" value="<?php echo $record_row['DEPARTURE']; ?>"/><br/>
                    <input type="text" name="TRANSACTION" value="<?php echo $record_row['TRANSACTION']; ?>"/><br/>
                    <input type="text" name="PAST_DIAGNOSIS" value="<?php echo $record_row['PAST_DIAGNOSIS']; ?>"/><br/>
                </form>
                <?php
            } else {
                echo "No record found for ID: " . $id;
            }
        } else {
            echo "No ID provided.";
        }

        // Close connection
        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
