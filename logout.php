<?php

include 'connection.php';

// Check if user is logged in
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];

    // First, check if the user is an admin
    $verify_admin = $connForAccounts->prepare("SELECT email FROM `admin_accounts` WHERE id = ?");
    $verify_admin->execute([$user_id]);

    if ($verify_admin->rowCount() > 0) {
        // Admin found
        $admin = $verify_admin->fetch(PDO::FETCH_ASSOC);
        $email = $admin['email'];
        $user_type = 'admin';

        // Log the logout action for admin
        $log_stmt = $connForLogs->prepare("INSERT INTO admin_logs (email, activity, user_type) VALUES (?, 'Logout', ?)");
        $log_stmt->execute([$email, $user_type]);
    } else {

        $verify_employee = $connForAccounts->prepare("SELECT email FROM `employee_accounts` WHERE id = ?");
        $verify_employee->execute([$user_id]);

        if ($verify_employee->rowCount() > 0) {

            $employee = $verify_employee->fetch(PDO::FETCH_ASSOC);
            $email = $employee['email'];
            $user_type = 'employee';


            $log_stmt = $connForLogs->prepare("INSERT INTO employee_logs (email, activity, user_type) VALUES (?, 'Logout', ?)");
            $log_stmt->execute([$email, $user_type]);
        } else {

            echo "User not found.";
            exit;
        }
    }
}

// Clear the cookie
setcookie('user_id', '', time() - 1, '/');

// Redirect to login page
header('Location: index.php');
exit();

?>
