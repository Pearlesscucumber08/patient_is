<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM patient_list WHERE patientID = '$id'";
$patients = $con->query($sql) or die ($con->error);
$row = $patients->fetch_assoc();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    
    $sql = "UPDATE patient_list SET firstName = '$fname', lastName = '$lname', gender = '$gender', contact = '$contact' WHERE patientID = '$id'";
    $con->query($sql) or die ($con->error);

    //babalik sa list after mag add
    echo header("location: details.php?ID=".$id);
}


?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Management System</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <form action="" method="post">
        
        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['firstName'];?>">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastName'];?>">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
        </select>

        <label>Contact</label>
        <input type="text" name="contact" id="contact" value="<?php echo $row['contact'];?>">

        <input type="submit" name="submit" value="Update">

    </form>

</body>
</html>