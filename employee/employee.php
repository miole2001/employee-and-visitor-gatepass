<?php
    include('../includes/employee-header.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $employeeEmail = $_POST['employeeEmail'];
        $employeePhone = $_POST['employeePhone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $department = $_POST['department'];
        $type = $_POST['type'];

        $insert_sql = "INSERT INTO `employee_gatepass` (`employee_name`, `employee_email`, `employee_number`, `date_log`, `time_log`, `department`, `type`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $connGatepass->prepare($insert_sql);
        $stmt_insert->execute([$name, $employeeEmail, $employeePhone, $date, $time, $department, $type]);

        header('Location: employee.php');
        exit;

    }

    $employee_display = $connForAccounts->query("SELECT * FROM `employee_accounts` WHERE id = $user_id")->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Form</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
            <li class="breadcrumb-item active">Employee Form</li>
        </ol>

        <!-- Bootstrap Card Form -->
        <div class="card mb-4">
            <div class="card-header text-center">                
                <h3>Employee Form</h3>
            </div>
            <div class="card-body">
                <form action="#" method="POST">

                    <?php foreach ($employee_display as $employee): ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo($employee['name']); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="employeeEmail" class="form-label">Employee Email</label>
                            <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" value="<?php echo($employee['email']); ?>" readonly>
                        </div>
                    
                        <div class="mb-3">
                            <label for="employeePhone" class="form-label">Employee Phone</label>
                            <input type="number" class="form-control" id="employeePhone" name="employeePhone" value="<?php echo($employee['contact_number']); ?>" readonly>
                        </div>
                    <?php endforeach; ?>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date Logged in</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="mb-3">
                        <label for="time" class="form-label">Time Logged in</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">Department Destination</label>
                        <select class="form-select" id="department" name="department" required>
                            <option value="" selected disabled>Select Department</option>
                            <option value="N/A">N/A</option>
                            <option value="HR">HR</option>
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                            <option value="BSBA">BSBA</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Select Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="" selected disabled>Select Type</option>
                            <option value="Enter">Enter</option>
                            <option value="Exit">Exit</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>
