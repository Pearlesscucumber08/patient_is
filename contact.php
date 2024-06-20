<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTHLINE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link  href="login.css" rel="stylesheet" type="text/css">
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
    </body>
    </html>