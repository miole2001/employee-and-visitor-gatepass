<?php
    include('../includes/admin-header.php');
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>