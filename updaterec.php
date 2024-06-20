<?php
include_once("connection.php");

$con = connection();

if (isset($_POST['submit'])) {
    // Retrieve and sanitize inputs
    $id = $con->real_escape_string($_POST['R_ID']);
    $entry = $con->real_escape_string($_POST['DATA_OF_ENTRY']);
    $departure = $con->real_escape_string($_POST['DEPARTURE']);
    $trans = $con->real_escape_string($_POST['TRANSACTION']);
    $diagnosis = $con->real_escape_string($_POST['PAST_DIAGNOSIS']);
    $pid = $con->real_escape_string($_POST['P_ID']);

    // Update data in the database using a prepared statement
    $sql = "UPDATE `record` SET `DATA_OF_ENTRY`=?, `DEPARTURE`=?, `P_ID`=?, `TRANSACTION`=?, `PAST_DIAGNOSIS`=? WHERE `R_ID`=?";

    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssss", $entry, $departure, $pid, $trans, $diagnosis, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
        $stmt->close();
        $con->close();
        header("Location: record.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
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
    <title>Update Record</title>
</head>
<body>
    <form action="" method="POST">
        <label class="pd1" for="R_ID">R_ID</label>
        <input class="pd1" type="text" name="R_ID" id="R_ID" required>

        <label class="pd1" for="DATE_OF_ENTRY">DATE OF ENTRY</label>
        <input class="pd1" type="text" name="DATE_OF_ENTRY" id="DATE_OF_ENTRY" required>

        <label class="pd1" for="DEPARTURE">DEPARTURE</label>
        <input class="pd1" type="text" name="DEPARTURE" id="DEPARTURE" required>

        <label class="pd" for="P_ID">P_ID</label>
        <input class="pd" type="text" name="P_ID" id="P_ID" required>

        <label class="pd" for="TRANSACTION">TRANSACTION</label>
        <input class="pd" type="text" name="TRANSACTION" id="TRANSACTION" required>

        <label class="pd" for="PAST_DIAGNOSIS">PAST DIAGNOSIS</label>
        <input class="pd" type="text" name="PAST_DIAGNOSIS" id="PAST_DIAGNOSIS" required>

        <input class="update" type="submit" name="submit" value="Update">
    </form>
</body>
</html>
