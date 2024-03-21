<?php
require 'config.php';
if(count($_POST)>0){
    mysqli_query($conn,"UPDATE tb_user set name='".$_POST['name']."',
    age='".$_POST['age']."', address='".$_POST['address']."', gender='".$_POST['gender']."',
    email='".$_POST['email']."',password='".$_POST['password']. "' WHERE id='".$_POST['id']."'");
    $message = "<p style='color:green;'>Record Modified successfully ! <a href index.php> Go Back </a></p>";
}
$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id='".$_GET['id']."'");
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register2.css">
    <title>Update</title>
</head>
<body>
    <div class="login_bg">
        <div class="login_container">
            <h1>Update</h1>
            <form class="" action="" method="post" >

            <div> <?php if(isset($message)){echo $message;} ?></div>

                <input type="hidden" name="id" class="textField" vlaue="<?php echo $row['id']; ?>">
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

                

                <button type="submit" name="submit">Update</button>
            </form>
            
        </div>
    </div>
    
</body>
</html>