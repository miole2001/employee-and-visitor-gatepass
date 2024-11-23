<?php
    include('../includes/user-header.php');
?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../images/profile1.png" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center text-uppercase">title</h3>
                        <p class="card-text">Room Number: </p>
                        <p class="card-text">Floor: </p>
                        <p class="card-text">Status: </p>
                        <!-- Trigger the modal -->
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                Add Modal Button
                            </a>
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