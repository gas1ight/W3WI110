<?php
session_start();
// if the user is not logged in, then redirect to the login page
if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud app esslam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<h2>
    <a href="logout.php">
        <button class="btn btn-warning">logout</button>
    </a>
</h2>
<!-- Add New User Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">add new user</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>

                        <div class="col">
                            <input type="text" name="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                        <div class="invalid-feedback">Email is required!</div>
                    </div>

                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>

                        <div class="col">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" required>
                            <div class="invalid-feedback">Password is required!</div>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault1">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Admin privileges</label>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->

<!-- Edit User Modal Start -->
<div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">edit user</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>

                        <div class="col">
                            <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                        <div class="invalid-feedback">Email is required!</div>
                    </div>

                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>

                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter Password" required>
                            <div class="invalid-feedback">Password is required!</div>
                        </div>

                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Admin privileges</label>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="update user" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit User Modal End -->
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-primary">Users in the Database</h4>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">add new user</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mail</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>

</html>