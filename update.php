<?php
include_once("connection.php");

$con = connection(); // Assuming connection() function establishes database connection

if (isset($_POST['submit'])) {
    // Retrieve and sanitize inputs
    $id = $con->real_escape_string($_POST['P_ID']);
    $name = $con->real_escape_string($_POST['NAME']);
    $age = $con->real_escape_string($_POST['AGE']);
    $status = $con->real_escape_string($_POST['STATUS']);
    $contact = $con->real_escape_string($_POST['CONTACT']);
    $address = $con->real_escape_string($_POST['ADDRESS']);

    // Update data in the database using a prepared statement
    $sql = "UPDATE `patient` SET `NAME`=?, `AGE`=?, `STATUS`=?, `CONTACT`=?, `ADDRESS`=? WHERE `P_ID`=?";

    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("sisssi", $name, $age, $status, $contact, $address, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: patient.php");
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
    <title></title>
</head>
<body>

    <form action="" method="POST">
        <label class="pd1" for="P_ID">P_ID</label>
        <input class="pd1"  type="text" name="P_ID" id="P_ID" required>

        <label class="pd1"  for="NAME">NAME</label>
        <input class="pd1" type="text" name="NAME" id="NAME">

        <label class="pd1" for="AGE">AGE</label>
        <input class="pd1" type="number" name="AGE" id="AGE">

        <label class="pd1" for="STATUS">STATUS</label>
        <select class="pd1" name="STATUS" id="STATUS">
            <option value="Married">Married</option>
            <option value="Single">Single</option>
        </select>

        <label class="pd" for="CONTACT">CONTACT</label>
        <input class="pd" type="text" name="CONTACT" id="CONTACT">

        <label class="pd" for="ADDRESS">ADDRESS</label>
        <select class="pd" name="ADDRESS" id="ADDRESS">
        <option value="Santa, I.S">Santa, I.S</option>
            <option value="Narvacan, I.S">Narvacan, I.S</option>
            <option value="Narvacan, I.S">Narvacan, I.S</option>
            <option value="Nagbukel, I.S">Nagbukel, I.S</option>
            <option value="Santa Maria, I.S">Santa Maria, I.S</option>
            <option value="San Esteban, I.S">San Esteban, I.S</option>
            <option value="Burgos, I.S">Burgos, I.S</option>
            <option value="Santiago, I.S">Santiago, I.S</option>
            <option value="Banayoyo, I.S">Banayoyo, I.S</option>
            <option value="Lidlida, I.S">Lidlida, I.S</option>
            <option value="San Emilio, I.S">San Emilio, I.S</option>
            <option value="Quirino, I.S">Quirino, I.S</option>
            <option value="Gregorio Del Pilar, I.S">Gregorio Del Pilar, I.S</option>
            <option value="Salcedo, I.S">Salcedo, I.S</option>
            <option value="Candon City, I.S">Candon City, I.S</option>
            <option value="Galimuyod, I.S">Galimuyod, I.S</option>
            <option value="Santa Lucia, I.S">Santa Lucia, I.S</option>
            <option value="Santa Cruz, I.S">Santa Cruz, I.S</option>
            <option value="Sigay, I.S">Sigay, I.S</option>
            <option value="Cervantes, I.S">Cervantes, I.S</option>
            <option value="Suyo, I.S">Suyo, I.S</option>
            <option value="Tagudin, I.S">Tagudin, I.S</option>
            <option value="Alilem, I.S">Alilem, I.S</option>
            <option value="Sugpon, I.S">Sugpon, I.S</option>
        </select>
        <br>
        <input class ="update"type="submit" name="submit" value="Update">
    </form>
</body>
</html>
