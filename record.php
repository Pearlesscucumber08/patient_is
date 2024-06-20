<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTHLINE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link  href="login.css" rel="stylesheet" type="text/css">
    <link  href="table.css" rel="stylesheet" type="text/css">
    <link  href="search.css" rel="stylesheet" type="text/css">
    <link href="update.css" rel="stylesheet" type="text/css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

  
</head>
<body>


<script src = "login.js"></script>

<!--.top-bar>span+ul>li*3>a (shortcut)-->
     <div class="top-bar">
        <span><ion-icon name="call-outline"></ion-icon> + 639 564 667 59</span>
        <ul>
            <li><a href="https://web.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="https://www.twitter.com/"><ion-icon name="logo-twitter"></ion-icon></a></li>
        </ul>
    </div>

    <nav>
        <div class="logo">
        <a href="#"> <img src = "logo.png" alt = "logo">HEALTHLINE</a>
        </div>
        <div class="toggle">
        <a href="#"><ion-icon name="menu-outline"></ion-icon></a>
        </div>
        <ul class="menu">
            <li><a href="#" onclick="window.location.href='1stpage.php'">Home</a></li>
            <li><a href="#" onclick="window.location.href='about.php'">About</a></li>
            <li><a href="#"onclick="window.location.href='services.php'">Services</a></li>
            <li><a href="#"onclick="window.location.href='blog.php'">Blog</a></li>
            <li><a href="#"onclick="window.location.href='contact.php'">Contact</a></li>
        </ul>
    </nav>
<!--for the toggle version-->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script>
        $(function{
            $(".toggle").on("click",function(){
                if($(".menu").hasClass("active")){
                    $(".menu").removeClass("active");
                    $(this).find("a").html("<ion-icon name='menu-outline'></ion-icon>");
                }else{
                    $(".menu").addClass("active");
                    $(this).find("a").html("<ion-icon name='close-outline'></ion-icon>");
                }
            });
        });
    </script>
    &nbsp;
    &nbsp; 

    <!--search bar-->
    <!--search bar-->
<form class="search" action="search_process.php" method="POST">
    <input type="text" class="input" name="id" placeholder="Enter ID to search"> <br>
    <input class="submit" type="submit" name="search" value="Search Data">
</form>

                         &nbsp;
                         &nbsp;
                         
    <!--buttons-->
    <div class = "buttonbg">
    <button class = patient onclick="window.location.href='patient.php'">PATIENT</button>
                        &nbsp;
                        &nbsp;
    <button class = record-button onclick="window.location.href='record.php'">RECORD</button>
                        &nbsp;
                        &nbsp;
    <button class = logout-button onclick="window.location.href='LOGIN.php'">LOGOUT</button>

                        &nbsp;
                        &nbsp;
                        </div>
    
    
</body>
</html>
    <!--search bar-->
 <?php 
    $connection = mysqli_connect('localhost','root','');
    $db = mysqli_select_db($connection, 'patient_is');

    if(isset($_POST['search'])){
        $id = $_POST['id'];
        $query = "SELECT * FROM searchbar where P_ID = '$id'  ";
        $query_run = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($query_run)){
            ?>
            <style>
                .search1{
                    width: 15%;
                }
            </style>
            <pre>
            <form class = "search1" action = "" method = "POST">
                   <input type = "hidden" name = "P_ID" value = "<?php echo $row['P_ID'] ?>"/><br/> 
                   <input type = "text" name = "NAME" value = "<?php echo $row['NAME'] ?>"/><br/>
                   <input type = "text" name = "AGE" value = "<?php echo $row['AGE'] ?>"/><br/>
                   <input type = "text" name = "STATUS" value = "<?php echo $row['STATUS'] ?>"/><br/>
                   <input type = "text" name = "CONTACT" value = "<?php echo $row['CONTACT'] ?>"/><br/>
                   <input type = "text" name = "ADDRESS" value = "<?php echo $row['ADDRESS'] ?>"/><br/>
                   <input type = "text" name = "R_ID" value = "<?php echo $row['R_ID'] ?>"/><br/>
                   <input type = "text" name = "DATE_OF_ENTRY" value = "<?php echo $row['DATE_OF_ENTRY'] ?>"/><br/>
                   <input type = "text" name = "DEPARTURE" value = "<?php echo $row['DEPARTURE'] ?>"/><br/>
                   <input type = "text" name = "TRANSACTION" value = "<?php echo $row['TRANSACTION'] ?>"/><br/>
                   <input type = "text" name = "PAST_DIAGNOSIS" value = "<?php echo $row['PAST_DIAGNOSIS'] ?>"/><br/>
                   </form>
            </pre>
             <?php
        }
    }
 ?>
<?php

include_once("connection.php");

$con = connection();


$sql = "SELECT * FROM record";
$records = $con->query($sql) or die ($con->error);

$row = $records->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!--for updating data-->
        <a class = "update" href = "updaterec.php" > Update</a>
        <!--for adding data-->
    <a class = "add" href = "add1.php" > Add New</a>
    <!--for deleting data data-->
    <a class = "delete" href = "deleterec.php" > Delete</a>
    
        <!--table for data-->
        <table>
        <thead>
        <tr>
            <th>R_ID</th>
            <th>DATE_OF_ENTRY</th>
            <th>DEPARTURE</th>
            <th>TRANSACTION</th>
            <th>PAST_DIAGNOSIS</th>
            <th>P_ID</th>
        </tr>
        </thead>
        <tbody>
            <?php do{?>
            <tr>
            <td><?php echo $row['R_ID']; ?></td>
            <td><?php echo $row['DATA_OF_ENTRY']; ?></td>
            <td><?php echo $row['DEPARTURE']; ?></td>
            <td><?php echo $row['TRANSACTION']; ?></td>
            <td><?php echo $row['PAST_DIAGNOSIS']; ?></td>
            <td><?php echo $row['P_ID']; ?></td>
        </tr>
        <?php }while($row = $records->fetch_assoc())?>
        </tbody>

    </table>
</body>
</html>