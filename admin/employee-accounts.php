<?php
    include('../includes/admin-header.php');

    // HANDLE DELETE REQUEST
    if (isset($_POST['delete_logs'])) {
        $delete_id = $_POST['delete_id'];

        $verify_delete = $connForAccounts->prepare("SELECT * FROM `employee_accounts` WHERE id = ?");
        $verify_delete->execute([$delete_id]);

        if ($verify_delete->rowCount() > 0) {
            $delete_account = $connForAccounts->prepare("DELETE FROM `employee_accounts` WHERE id = ?");
            if ($delete_account->execute([$delete_id])) {
                
                $success_msg = 'Account deleted!';
            } else {
                $error_msg = 'Error deleting account.';
            }
        } else {
            $warning_msg = 'Account already deleted!';
        }
    }

    // FETCH ALL DATA
    $employee_accounts = $connForAccounts->query("SELECT * FROM `employee_accounts`")->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Accounts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
            <li class="breadcrumb-item active">Employee Accounts</li>
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
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Password</th>
                            <th>Date Registered</th>
                            <th>Action(s)</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Password</th>
                            <th>Date Registered</th>
                            <th>Action(s)</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $count = 1;
                            foreach ($employee_accounts as $accounts):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><img src="../images/profile/<?php echo ($accounts['image']); ?>" alt="Image" style="width: 100px; height: auto;"></td>
                                <td><?php echo ($accounts['name']); ?></td>
                                <td><?php echo ($accounts['email']); ?></td>
                                <td><?php echo ($accounts['contact_number']); ?></td>
                                <td><?php echo ($accounts['password']); ?></td>
                                <td><?php echo date('F j, Y h:i A', strtotime($accounts['date_registered'])); ?></td>
                                <td>
                                    <form method="POST" action="" class="delete-form">
                                        <input type="hidden" name="delete_id" value="<?php echo ($accounts['id']); ?>">
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