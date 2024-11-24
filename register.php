<?php
    // to display errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // database connection
    include 'connection.php';

    include ('./includes/alerts.php');

    $warning_msg = [];
    $success_msg = [];

    if (isset($_POST['submit'])) {

        $image = $_POST['image'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $c_pass = password_verify($_POST['confirm-password'], $pass);

        $verify_email = $connForAccounts->prepare("SELECT * FROM `employee_accounts` WHERE email = ?");
        $verify_email->execute([$email]);

        if ($verify_email->rowCount() > 0) {
            $warning_msg[] = 'Email already taken!';
        } else {
            if ($c_pass == 1) {
                $insert_user = $connForAccounts->prepare("INSERT INTO `employee_accounts`(`image`, `name`, `email`, `password`, `user_type`, `date_registered`)
                    VALUES(?,?,?,?,'employee', NOW())");
                $insert_user->execute([$image, $name, $email, $pass]);
                $success_msg[] = 'Registered successfully!';
                // Redirect after the alert is shown
                echo '<script>setTimeout(function() { window.location.href = "login.php"; }, 2000);</script>';
            } else {
                $warning_msg[] = 'Confirm password not matched!';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EAVG | Register</title>
  <link rel="stylesheet" href="css/login.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <div class="wrapper">
        <div class="title">
            <span>Register Form</span>
        </div>
        <form action="" method="post">
            
            <div class="row">
                <i class="fas fa-camera"></i>
                <input type="file" name="image" placeholder="image" required >
            </div>

            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Enter Name" required >
            </div>
            <div class="row">
                <i class="fas fa-at"></i>
                <input type="email" name="email" placeholder="Enter Email" required >
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter Password" required >
            </div>

            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm-password" placeholder="Confirm Password" required >
            </div>

            <div class="row button">
                <input type="submit" name="submit" value="Register">
            </div>

            <div class="signup-link">
                Already a member?
                <a href="login.php">Login now</a>
            </div>
        </form>
    </div>
</body>
</html>