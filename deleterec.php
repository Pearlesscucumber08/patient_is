<?php
include_once("connection.php");

// Assuming connection() function establishes database connection
$con = connection();

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete'])) {
    // Retrieve and sanitize inputs
    $id = $con->real_escape_string($_POST['R_ID']);

    // Construct your DELETE query using the R_ID (assuming it's your primary key)
    $sql = "DELETE FROM `record` WHERE R_ID = '$id'";

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: record.php"); // Redirect to records page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $con->error;
    }
}

$con->close();
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
        <label class="idbtn">R_ID</label>
        <input class="idbtn" type="text" name="R_ID" id="R_ID">

        <!-- Add other fields as needed -->
        
        <input class="delete" type="submit" name="delete" value="Delete">
    </form>
</body>
</html>

