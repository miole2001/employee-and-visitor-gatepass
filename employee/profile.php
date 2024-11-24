<?php
    include('../includes/employee-header.php');
?>

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">My Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>

        <div class="container mt-3">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo "../images/profile/" . $employee['image']; ?>" alt="profile" class="rounded-circle p-1 bg-primary" width="210">
                                    <div class="mt-3">
                                        <h4 class="text-uppercase"><?php echo ($employee['name']); ?></h4>
                                        <p class="text-secondary mb-1 mt-3"><?php echo ($employee['email']); ?></p>

                                        <!-- Button trigger modal -->

                                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addModal">
                                            Modal
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name" value="<?php echo ($employee['name']); ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email" value="<?php echo ($employee['email']); ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="password" value="<?php echo ($employee['password']); ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="profile">Upload Profile</label>
                        <input type="file" class="form-control" id="profile" name="profile" required>
                    </div>

                    <div class="form-group">
                        <label for="candidate_name">Candidate Name</label>
                        <input type="text" class="form-control" id="candidate_name" name="candidate_name" required>
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add_modal">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php');?>
<?php include('../includes/scripts.php');?>