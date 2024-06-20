<?php
include_once("connection.php");

$con = connection(); // Assuming connection() function establishes database connection

if (isset($_POST['submit'])) {
    // Retrieve and sanitize inputs
    $name = $con->real_escape_string($_POST['NAME']);
    $age = $con->real_escape_string($_POST['AGE']);
    $status = $con->real_escape_string($_POST['STATUS']);
    $contact = $con->real_escape_string($_POST['CONTACT']);
    $address = $con->real_escape_string($_POST['ADDRESS']);

    // Insert data into database using prepared statement
    $sql = "INSERT INTO `patient` (`NAME`, `AGE`, `STATUS`, `CONTACT`, `ADDRESS`) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sisss", $name, $age, $status, $contact, $address);

    if ($stmt->execute()) {
        echo "Record added successfully";
        $stmt->close();
        header("Location: patient.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
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

        <label>NAME</label>
        <input type="text" name="NAME" id="NAME" required>

        <label>AGE</label>
        <input type="number" name="AGE" id="AGE" required>

        <label>STATUS</label>
        <select name="STATUS" id="STATUS" required>
            <option value="Married">Married</option>
            <option value="Single">Single</option>
        </select>

        <label>CONTACT</label>
        <input type="text" name="CONTACT" id="CONTACT" required>

        <label>ADDRESS</label>
        <select name="ADDRESS" id="ADDRESS" required>
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
        <input class="submit" type="submit" name="submit" value="Submit">

    </form>
</body>
</html>
