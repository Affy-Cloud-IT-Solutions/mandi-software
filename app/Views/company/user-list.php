<?php
require 'include/navbar.php';
?>
<style>
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

    .table-add th {
        font-weight: bold !important;
    }

    .table-add th,
    .table-add td {
        vertical-align: middle;
        border: 1px solid #000;
        color: #000 !important;
    }

    .table-responsive .dt-buttons,
    #userTable_filter {
        width: fit-content;
        margin-left: auto;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .paging_simple_numbers {
        display: flex;
        justify-content: space-between;
    }

    .paginate_button {
        margin: 0 5px;
    }

    .dt-buttons button {
        border: none !important;
        padding: 5px;
        border-radius: 5px;
    }

    .dt-buttons button:nth-child(1) {
        background-color: #007bff;
        color: #fff;
    }

    .dt-buttons button:nth-child(2) {
        background-color: #28a745;
        color: #fff;
    }

    .dt-buttons button:nth-child(3) {
        background-color: #dc3545;
        color: #fff;
    }

    .dt-buttons button:nth-child(4) {
        background-color: #ffc107;
        color: #212529;
    }

    .closeBtn {
        background-color: transparent !important;
        border: none !important;
        font-size: 20px;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <div class="my-3 d-flex justify-content-between">
                    <h3 class="text-center">Users</h3>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addNewUser">Add New
                        User</button>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($userList as $key => $row) {
                                    ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->mobile ?></td>
                                            <td>
                                                <?php
                                                if ($row->status == 0) { ?>
                                                    <a href="<?php echo base_url("user-active-deactive/$row->id/1"); ?>" title="Deactive"><button onclick="return confirm('Are you sure you want to Deactivate this company?')" class="btn btn-danger">Deactive</button></a>
                                                <?php  } else { ?>
                                                    <a href="<?php echo base_url("user-active-deactive/$row->id/0"); ?>" title="Active"><button onclick="return confirm('Are you sure you want to Active this company?')" class="btn btn-primary">Active</button></a>
                                                <?php   }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url("user-edit/$row->id"); ?>" title="Edit"><i style="cursor:pointer;" class="ti ti-pencil"></i></a>
                                                <a href="<?php echo base_url("user-delete/$row->id"); ?>" title="Delete"><i onclick="return confirm('Are you sure you want to Delete this company?')" style="cursor:pointer; color:red" class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" id="exportCSV">Export to CSV</button>
                            <button class="btn btn-success" id="exportExcel">Export to Excel</button>
                            <button class="btn btn-danger" id="exportPDF">Export to PDF</button>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="addNewUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewUserLabel">Add New User</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= $formSave ?>" class="form-inputs" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="id" value="<?= $userData->id ?? '' ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> User Type</b></label>
                                <select class="form-control w-100" name="select_type" id="" required>
                                    <option value="" selected disabled>Select User Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Username</b></label>
                                <input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="<?= $userData->name ?? '' ?>" required>
                            </div>
                            <div class=" col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Mobile</b></label>
                                <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile" value="<?= $userData->mobile ?? '' ?>" required>
                            </div>
                            <div class=" col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Email</b></label>
                                <input class="form-control" type="email" name="email" placeholder="Enter Email" value="<?= $userData->email ?? '' ?>" required>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b>Password</b></label>&nbsp;
                                <?php
                                $hidden = 'hidden';
                                if (isset($showPassword)) {
                                    $hidden = "";
                                }
                                $checked = "";
                                $disabled = "";
                                if (isset($userData->password)) {
                                    $checked = "checked";
                                    $disabled = "disabled";
                                }
                                ?>
                                <input type="checkbox" id="show_password_checkbox" <?= $hidden, $checked ?> onclick="showPassword()">
                                <input class="form-control" type="text" name="password" id="password" placeholder="Enter Password" <?= $checked . ' ' . $disabled ?>>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b>Confirm Password</b></label>
                                <input class="form-control" type="text" id="repassword" placeholder="Confirm Password" <?= $checked . ' ' . $disabled ?>>
                            </div>

                            <div class="col-md-12 my-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'include/footer.php';
?>