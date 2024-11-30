<?php
    include('../includes/employee-header.php');

    $employee_gatepass = $connGatepass->query("SELECT * FROM `employee_gatepass` WHERE type = 'Exit'")->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Exit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
            <li class="breadcrumb-item active">Employee Exit</li>
        </ol>

        <div class="card mb-4 mt-4">
            <div class="card-header">
            <p>Search Your name to view your time out logs</p>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Date Log</th>
                            <th>Time Log</th>
                            <th>Department</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Date Log</th>
                            <th>Time Log</th>
                            <th>Department</th>
                            <th>Type</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $count = 1;
                            foreach ($employee_gatepass as $employee):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo ($employee['employee_name']); ?></td>
                                <td><?php echo ($employee['employee_email']); ?></td>
                                <td><?php echo ($employee['employee_number']); ?></td>
                                <td><?php echo date('F j, Y', strtotime($employee['date_log'])); ?></td>
                                <td><?php echo date('h:i A', strtotime($employee['time_log'])); ?></td>
                                <td><?php echo ($employee['department']); ?></td>
                                <td><?php echo ($employee['type']); ?></td>
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