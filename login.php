<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Title | Login</title>
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
                <input type="text" placeholder="Email or Phone" required >
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" required >
            </div>
            <div class="row button">
                <input type="submit" value="Login" >
            </div>
            <div class="signup-link">
                Not a member?
                <a href="register.php">Signup now</a>
            </div>
        </form>
    </div>
</body>
</html>