<?php
include_once("connection.php");

$con = connection();

if (isset($_POST['submit'])) {
    // Assuming connection() function establishes database connection

    // Retrieve and sanitize inputs
    $id = $con->real_escape_string($_POST['R_ID']);
    $entry = $con->real_escape_string($_POST['DATE_OF_ENTRY']);
    $departure = $con->real_escape_string($_POST['DEPARTURE']);
    $trans = $con->real_escape_string($_POST['TRANSACTION']);
    $diagnosis = $con->real_escape_string($_POST['PAST_DIAGNOSIS']);
    $pid = $con->real_escape_string($_POST['P_ID']);

    // Insert data into database
    $sql = "INSERT INTO `record` (`R_ID`, `DATA_OF_ENTRY`, `DEPARTURE`, `TRANSACTION`, `PAST_DIAGNOSIS`, `P_ID`) 
            VALUES ('$id', '$entry', '$departure', '$trans', '$diagnosis', '$pid')";

    if ($con->query($sql) === TRUE) {
        echo "Record added successfully";
        header("Location: record.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="table.css" rel="stylesheet" type="text/css">
    <link href="add.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="" method="POST">

        <label class="pd1">R_ID</label>
        <input class="pd1" type="text" name="R_ID" id="R_ID">

        <label class="pd1">DATE_OF_ENTRY</label>
        <input class="pd1" type="text" name="DATE_OF_ENTRY" id="DATE_OF_ENTRY">

        <label class="pd1">DEPARTURE</label>
        <input class="pd1" type="text" name="DEPARTURE" id="DEPARTURE">

        <label class="pd">P_ID</label>
        <input class="pd" type="text" name="P_ID" id="P_ID">

        <label class="pd">TRANSACTION</label>
        <input class="pd" type="text" name="TRANSACTION" id="TRANSACTION">

        <label class="pd">PAST_DIAGNOSIS</label>
        <input class="pd" type="text" name="PAST_DIAGNOSIS" id="PAST_DIAGNOSIS">

        <input class="submit1" type="submit" name="submit" value="Submit">

    </form>
</body>
</html>
