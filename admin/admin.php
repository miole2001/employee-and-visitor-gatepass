<?php
    include('../includes/admin-header.php');

    //employee account count
    $query = "SELECT COUNT(*) AS employee_count FROM `employee_accounts`";
    $run_query = $connForAccounts->prepare($query);
    $run_query->execute();
    $employee_count = $run_query->fetch(PDO::FETCH_ASSOC)['employee_count'];

    //employee exit type count
    $query = "SELECT COUNT(*) AS employee_enter FROM `employee_gatepass` WHERE type = 'Enter'";
    $run_query = $connGatepass->prepare($query);
    $run_query->execute();
    $employee_enter = $run_query->fetch(PDO::FETCH_ASSOC)['employee_enter'];


    //employee enter type count
    $query = "SELECT COUNT(*) AS employee_exit FROM `employee_gatepass` WHERE type = 'Exit'";
    $run_query = $connGatepass->prepare($query);
    $run_query->execute();
    $employee_exit = $run_query->fetch(PDO::FETCH_ASSOC)['employee_exit'];

    //guest enter type count
    $query = "SELECT COUNT(*) AS guest_enter FROM `guest_gatepass` WHERE type = 'Enter'";
    $run_query = $connGatepass->prepare($query);
    $run_query->execute();
    $guest_enter = $run_query->fetch(PDO::FETCH_ASSOC)['guest_enter'];

    //guest enter type count
    $query = "SELECT COUNT(*) AS guest_exit FROM `guest_gatepass` WHERE type = 'Exit'";
    $run_query = $connGatepass->prepare($query);
    $run_query->execute();
    $guest_exit = $run_query->fetch(PDO::FETCH_ASSOC)['guest_exit'];

?>



<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text">Analytics</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
            <li class="breadcrumb-item active">Admin Analytics</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center" style="background-color: #5DADE2;">
                        <h4>Employee Accounts</h4>

                        <h5><?php echo $employee_count; ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: #2C3E50;">
                        <a class="small text-white stretched-link" href="employee-accounts.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center" style="background-color: #5DADE2;">
                        
                        <h4>Guest Enter</h4>
                        <h5><?php echo $guest_enter; ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: #2C3E50;">
                        <a class="small text-white stretched-link" href="guest-enter.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center" style="background-color: #5DADE2;">
                        
                        <h4>Guest Exit</h4>
                        <h5><?php echo $guest_exit; ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: #2C3E50;">
                        <a class="small text-white stretched-link" href="guest-exit.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center" style="background-color: #5DADE2;">
                        
                        <h4>Employee Enter</h4>
                        <h5><?php echo $employee_enter; ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: #2C3E50;">
                        <a class="small text-white stretched-link" href="employee-enter.php">View Details</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center" style="background-color: #5DADE2;">
                        
                        <h4>Employee Exit</h4>
                        <h5><?php echo $employee_exit; ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: #2C3E50;">
                        <a class="small text-white stretched-link" href="employee-exit.php">
                            View Details
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>