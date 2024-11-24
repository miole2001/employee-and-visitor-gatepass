<?php
    // Display errors for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database connection
    include 'connection.php';
    include './includes/alerts.php';

    $warning_msg = [];

    if (isset($_POST['submit'])) {
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);

        if (!empty($email) && !empty($pass)) {

            $verify_admin = $connForAccounts->prepare("SELECT * FROM `admin_accounts` WHERE email = ? LIMIT 1");
            $verify_admin->execute([$email]);

            if ($verify_admin->rowCount() > 0) {
                $fetch = $verify_admin->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($pass, $fetch['password'])) {
                    $action_type = 'Login';

                    // Log admin login activity
                    $log_stmt = $connForLogs->prepare("INSERT INTO admin_logs (email, activity, user_type) VALUES (?, ?, 'admin')");
                    $log_stmt->execute([$email, $action_type]);

                    // Set cookie and redirect to admin dashboard
                    setcookie('user_id', $fetch['id'], time() + 60 * 60 * 24 * 30, '/');
                    header('Location: admin/admin.php');
                    exit();
                } else {
                    $warning_msg[] = 'Incorrect admin password!';
                }
            } else {

                $verify_employee = $connForAccounts->prepare("SELECT * FROM `employee_accounts` WHERE email = ? LIMIT 1");
                $verify_employee->execute([$email]);

                if ($verify_employee->rowCount() > 0) {

                    $fetch = $verify_employee->fetch(PDO::FETCH_ASSOC);
                    
                    // Verify employee password
                    if (password_verify($pass, $fetch['password'])) {
                        $action_type = 'Login';

                        $log_stmt = $connForLogs->prepare("INSERT INTO employee_logs (email, activity, user_type) VALUES (?, ?, 'user')");
                        $log_stmt->execute([$email, $action_type]);

                        // Set cookie and redirect
                        setcookie('user_id', $fetch['id'], time() + 60 * 60 * 24 * 30, '/');
                        header('Location: employee/employee.php');
                        exit();
                    } else {
                        $warning_msg[] = 'Incorrect user password!';
                    }
                } else {
                    $warning_msg[] = 'No account found with this email!';
                }
            }
        } else {
            $warning_msg[] = 'Please fill in all fields!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EAVG | Login</title>
  <link rel="stylesheet" href="css/login.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <div class="wrapper">
        <div class="title">
            <span>Login Form</span>
        </div>
        <form action="" method="post">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="email" name="email" placeholder="Enter Email" required >
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter Password" required >
            </div>
            <div class="row button">
                <input type="submit" name="submit" value="Login" >
            </div>
            <div class="signup-link">
                Not a member?
                <a href="register.php">Signup now</a>
            </div>
        </form>
    </div>
</body>
</html>