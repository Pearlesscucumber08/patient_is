<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Login</title>
    <link  href="login1.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="Log_U_P.php" method="post">
        
    <div class="header">
        <img src="second.png" alt="logo">
        <h2>HEALTHLINE<br>the line to a goodhealth</h2>
    </div>

    <?php
        if (isset($_GET['error'])) {
            echo '<p style="color: red; text-align: center;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>

    <label>Username</label>
    <input type="text" id="username" name="username"placeholder="Enter username"><br>

    <label>Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password"><br>

    <div class="btnsubmit"><button type="submit">Log-in</button></div>
    </from>

    <!----<h3 style=" font-size: 11px; text-align: center;">Username: <span style=" color: red;">admin</span><br>Password: <span style=" color: red;">HMS123</span></h3>-->
</body>
</html>