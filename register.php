<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert ('Email has been already registered, please login')</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('', '$name', '$age', '$address', '$gender', '$email', '$password','')";
            mysqli_query($conn,$query);
            echo
            "<script style='colour:red;'> alert ('Registration successful')</script>";
        }
        else{
            echo
            "<script> alert ('Password doesnot match')</script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register2.css">
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
    <title>Register</title>
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
                <li><a href="login.php" class="header_register">Login</a></li>
                <div class="seperator"></div>
                <li><a href="appointment.html" class="header_appointment">Appointment</a></li>
            </ul>
        </header>



    <div class="login_bg">
        <div class="login_container">
            <h1>Register</h1>
            <form class="" action="" method="post" autocomplete="off">
                <label for="name">Name : </label>
                <input type ="text" name="name" id="name" required value=""><br>

                <label for="age">Age : </label>
                <input type ="text" name="age" id="age" required value=""><br>

                <label for="address">Address : </label>
                <input type ="text" name="address" id="address" required value=""><br>

                <label for="gender">Gender : </label>
                <select type ="text" name="gender" id="gender" required >
                    
                    <option value="Male">Male</option>
                    <option value="Female">Female</option></select><br>

                <label for="email">Email : </label>
                <input type ="email" name="email" id="email" required value=""><br>

                <label for="password">Password : </label>
                <input type ="password" name="password" id="password" required value=""><br>

                <label for="confirmpassword">Confirm Password : </label>
                <input type ="password" name="confirmpassword" id="confirmpassword" required value=""><br>

                <button type="submit" name="submit">Register</button>
            </form>
            <p>Already have an account ? <a href="login.php">Login</a></p>
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