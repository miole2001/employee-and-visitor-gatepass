<?php
    include('../includes/admin-header.php');
    
    // HANDLE DELETE REQUEST
    if (isset($_POST['delete_logs'])) {
        $delete_id = $_POST['delete_id'];

        $verify_delete = $connForLogs->prepare("SELECT * FROM `employee_logs` WHERE id = ?");
        $verify_delete->execute([$delete_id]);

        if ($verify_delete->rowCount() > 0) {
            $delete_logs = $connForLogs->prepare("DELETE FROM `employee_logs` WHERE id = ?");
            if ($delete_logs->execute([$delete_id])) {
                $success_msg = 'Log deleted!';
            } else {
                $error_msg = 'Error deleting log.';
            }
        } else {
            $warning_msg = 'Log already deleted!';
        }
    }

    // FETCH ALL DATA OF LOGS
    $employee_logs = $connForLogs->query("SELECT * FROM `employee_logs`")->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Logs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
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
                            <th>Action(s)</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                            <th>Action(s)</th>
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
                                <td><?php echo ($logs['timestamp']); ?></td>
                                <td>
                                    <form method="POST" action="" class="delete-form">
                                        <input type="hidden" name="delete_id" value="<?php echo ($logs['id']); ?>">
                                        <input type="hidden" name="delete_logs" value="1">
                                        <button type="submit" class="btn btn-danger btn-sm delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Handle delete confirmation
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Prevent the form from submitting immediately
            const form = this.closest('.delete-form');
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();  // Submit the form if confirmed
                }
            });
        });
    });

        // Display feedback messages
        <?php if (isset($success_msg)): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?php echo $success_msg; ?>'
        });
        <?php endif; ?>
        <?php if (isset($error_msg)): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $error_msg; ?>'
        });
        <?php endif; ?>
        <?php if (isset($warning_msg)): ?>
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: '<?php echo $warning_msg; ?>'
        });
        <?php endif; ?>
    });

</script>

<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>