<?php
@include 'config.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);
$user_type = $_POST['user_type'];
$date = date('y-m-d h:i:s');


$select = "SELECT * FROM admin_page WHERE email = '$email' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
}else{
    if($pass != $cpass){
        $error[] = 'password not matched!';
    }else{
        $insert = "INSERT INTO admin_page(name, email, password, user_type, cr_date) VALUES('$name','$email','$pass','$user_type','$date')";
        mysqli_query($conn, $insert);
        header('location:login_form.php');
    }
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <style>
    body{
        background-position:center;
        background-repeat: no-repeat;
        background-size: cover;
    }
        </style>
      <!-- custom css file link -->

      <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('images/ferme.jpg');">
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
        </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login_form.php">login now</a></p>

        </form>
    </div>
</body>
</html>