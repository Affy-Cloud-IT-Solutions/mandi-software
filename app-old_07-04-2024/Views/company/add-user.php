<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label {
        color: #000;
    }

    .form-inputs input,
    .form-inputs select {
        color: #000;
        border: 1px solid #000 !important;
    }

    .table-add input {
        width: 70px;
        text-align: center;
        margin: auto;
    }

    .table-add i {
        font-size: 20px;
        color: red;
        cursor: pointer;
    }

    .table-add th,
    .table-add td {
        vertical-align: middle;
        border: 1px solid #000;
    }

    .addbtn {
        background-color: #00A65A !important;
        color: #fff !important;
        width: fit-content;
        float: right;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Add User</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> User Type</b></label>
                                <select class="form-control w-100" name="" id="">
                                    <option value="" selected disabled>Select User Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Username</b></label>
                                <input class="form-control" type="text" placeholder="Enter Username">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Mobile</b></label>
                                <input class="form-control" type="text" placeholder="Enter Mobile">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Email</b></label>
                                <input class="form-control" type="text" placeholder="Enter Email">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Password</b></label>
                                <input class="form-control" type="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Confirm Password</b></label>
                                <input class="form-control" type="password" placeholder="Confirm Password">
                            </div>

                            <div class="col-md-12 my-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<?php
require 'include/footer.php';
?>