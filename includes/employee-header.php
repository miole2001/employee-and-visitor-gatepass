<?php
    ob_start(); 
    include('../connection.php');
    include('../includes/alerts.php');

    $select_employee = $connForAccounts->prepare("SELECT * FROM `employee_accounts` WHERE id = ? LIMIT 1");
    $select_employee->execute([$user_id]);
    $employee = $select_employee->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>EAVG | ADMIN</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/dashboard.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 2rem;
            letter-spacing: 1px;
        }
    </style>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand text-white" style="background-color: #5DADE2;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-white" href="admin.php">EAVG</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="admin.php">
                <i class="fas fa-bars text-white"></i>
            </button>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #5DADE2;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading text-white">Core</div>

                            <a class="nav-link text-white" href="employee.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt text-white"></i></div>
                                Employee Pass Form
                            </a>

                            <div class="sb-sidenav-menu-heading text-white">Interface</div>

                            <a class="nav-link text-white" href="profile.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-cog text-white"></i>
                                </div>
                                My Profile
                            </a>

                            <a class="nav-link text-white" href="enter.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-cog text-white"></i>
                                </div>
                                Employee Enter
                            </a>

                            <a class="nav-link text-white" href="exit.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-cog text-white"></i>
                                </div>
                                Employee Exit
                            </a>

                            <div class="sb-sidenav-menu-heading text-white">Addons</div>

                            <a class="nav-link text-white" href="logs-employee.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                                Employee Logs
                            </a>

                            <a class="nav-link text-white" href="#" id="logout">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-sign-out-alt text-white"></i>
                                </div>
                                Logout
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer" style="background-color: #2C3E50;">
                        <div class=" text-white">Logged in as:</div>
                        <h5 class="text-center text-white"><?php echo ($employee['name']); ?></h5>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                