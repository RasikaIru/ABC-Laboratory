<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $position =$_POST["position"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];        
        header("Location: admin_profile.php");
    }
    else{
        echo
        "<script> alert ('Wrong password or position')</script>";
    }
}
else {
    echo"<script> alert ('User Not Registered')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login2.css">
    <link rel="stylesheet" href="CSS/nav_bar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/body.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>


        
        <script src="JS/navbar_script.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <title>login</title>
</head>
<body>

<header>
            <a href="#" class="logo">ABC Labs</a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="facilities.html">Facilities</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
            <ul>
            <li><a href="login.php" class="header_register">Sign In</a></li>
            </ul>
        </header>



    <div class="login_bg">
        <div class="login_container">
            <div style="width: 100px; height: 100px; background-color: rgb(141, 183, 199); border-radius: 0px 0px 100px 100px;text-align: center;"> <i class="fa-solid fa-user-tie" style="font-size: 60px; color:rgb(211, 211, 211);"></i></div>
            <h1>Welcome back Administrator</h1>
            <p class="welcome_des"> Please enter your email and password</p>
            <br>
            <form class="" method="post" autocomplete="off">
            <input type="text" name="usernameemail" id="usernameemail" class="email" placeholder="please enter your Email" required value="">
            
            <input type="password" name="password" id="password" class="password" placeholder="please enter your Password" required vlaue="">

                
                <br>

                <button type="submit" name="submit" class="login_btn"> Login</button>
            </form>

            
        </div>
    </div>

    





    <div class="footer">
            <footer>
                <div class="footerContainer">
                    <div class="socialIcons">
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-google-plus"></i></a>
                        <a href=""><i class="fa-brands fa-youtube"></i></a>			
                    </div>
                    <div class="footerNav">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="facilities.html">Facilities</a></li>
                            <li><a href="contactus.html">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    
                </div>
                <div class="footerBottom">
                    <p>Copyright &copy;2024; Design By <span class="designer">Rasika</span> </p>
                </div> 
            </footer>
    
</body>
</html>