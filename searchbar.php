<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--search bar-->
    <form >
        <div class ="search">
        <span class=" search-icon material-symbols-outlined">search</span>
        <input  class = " search-input" type = "search" placeholder = "Search">
        </div>
    </form>
</body>
</html>


/*search bar in 1stpage CSS*/
.search {
    width: max-content;
    display: flex;
    align-items: center;
    padding: 14px;
    border-radius: 28px;
    background: #f6f6f6;
    transition: b0x-shadow 0.25s;
}
.search:focus-within{
    box-shadow: 0 0 2px rgba(0,0,0,0.75);
}

.search-input {
    font-size: 16px;
    font-family: 'Lexend', sans-serif;
    color: #333333;
    margin-left: 14px;
    outline: none;
    border: none;
    background: transparent ;
    width: 300px;
}
.search-input ::placeholder, 
.search-icon{
    color: rgba(0,0,0,0.5);
}

<?php 
    $connection = mysqli_connect('localhost','root','');
    $db = mysqli_select_db($connection, 'patient_is');

    if(isset($_POST['search'])){
        $id = $_POST['id'];
        $query = "SELECT * FROM patient where P_ID = '$id' ";
        $query_run = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($query_run)){
            ?>
            <form action = "" method = "POST">
                <input type = "hidden" name = "P_ID" value = "<?php echo $row['P_ID'] ?>"/><br/>
                <input type = "text" name = "NAME" value = "<?php echo $row['NAME'] ?>"/><br/>
                <input type = "text" name = "AGE" value = "<?php echo $row['AGE'] ?>"/><br/>
                <input type = "text" name = "STATUS" value = "<?php echo $row['STATUS'] ?>"/><br/>
                <input type = "text" name = "CONTACT" value = "<?php echo $row['CONTACT'] ?>"/><br/>
                <input type = "text" name = "ADDRESS" value = "<?php echo $row['ADDRESS'] ?>"/><br/>
            </form>
             <?php
        }
    }
 ?>
