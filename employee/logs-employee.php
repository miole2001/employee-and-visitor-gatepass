<?php
    include('../includes/employee-header.php');

    // FETCH ALL DATA OF LOGS
    $employee_logs = $connForLogs->query("SELECT * FROM `employee_logs`")->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Logs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
            <li class="breadcrumb-item active">Employee Logs</li>
        </ol>

        
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <br>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $count = 1;
                            foreach ($employee_logs as $logs):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo ($logs['email']); ?></td>
                                <td><?php echo ($logs['activity']); ?></td>
                                <td><?php echo date('F j, Y h:i A', strtotime($logs['timestamp'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>