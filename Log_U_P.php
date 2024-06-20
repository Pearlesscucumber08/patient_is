<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  href="login.css" rel="stylesheet" type="text/css">
    <link  href="login1.css" rel="stylesheet" type="text/css">
</head>
<body>
    
</body>
</html>

<?php
session_start();

// Palitan mo password dito ================================================================
$correct_username = 'admin';
$correct_password = 'HMS123';
//==========================================================================================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['username'] = $username;

        //Location pag successfull yung Login ===========================================
        header("Location:1stpage.php");
        exit();
        //================================================================================
    } else {

        $error_message = urlencode("Invalid username or password!");
        header("Location: LOGIN.php?error=" . $error_message);
        exit();
    }
} else {

    header("Location: LOGIN.php");
    exit();
}
?>