<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
// $name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);
// $cpass = md5($_POST['cpassword']);
// $user_type = $_POST['user_type'];

$select = "SELECT * FROM admin_page WHERE email = '$email' && password = '$pass' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_array($result);
if($row['user_type'] == 'admin'){
    $_SESSION['admin_name'] = $row['name'];
    header('location:dashbord admin.php');
}elseif($row['user_type'] == 'user'){
    if($row['status']==1){
        $_SESSION['user_name'] = $row['name'];
        header('location:dashbord.php');
    }elseif($row['status']==0){
        // header('location:login_form.php');
        $error[] = 'your account is not activat';
    }
   
}
}else{
    $error[] = 'incorrect email or password!';
}
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
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
<body style="background-image: url('images/farm.webp');">

    <div class="form-container">
        <form action="" method="post">
            <h3 style="font-family: Georgia;">login now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
           
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>

        </form>
    </div>
</body>
</html>