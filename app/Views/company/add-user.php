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
                <h1 class="text-center"><?= $title ?></h1>

                <form action="<?= $formSave ?>" class="form-inputs" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="id" value="<?= $userData->id ?? '' ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> User Type</b></label>
                                <select class="form-control w-100" name="select_type" id="" required>
                                    <option value="" selected disabled>Select User Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Username</b></label>
                                <input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="<?= $userData->name ?? '' ?>" required>
                            </div>
                            <div class=" col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Mobile</b></label>
                                <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile" value="<?= $userData->mobile ?? '' ?>" required>
                            </div>
                            <div class=" col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Email</b></label>
                                <input class="form-control" type="email" name="email" placeholder="Enter Email" value="<?= $userData->email ?? '' ?>" required>
                            </div>
                            <div class="col-md-4 my-2">
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
                                <input class="form-control password" type="text" name="password" id="password" placeholder="Enter Password" <?= $checked . ' ' . $disabled ?>>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Confirm Password</b></label>
                                <input class="form-control password" type="text" id="repassword" placeholder="Confirm Password" <?= $checked . ' ' . $disabled ?>>
                                <span id="message" style="color:red;display:none">Password not Match</span>

                            </div>

                            <div class="col-md-12 my-2">
                                <button class="btn btn-primary btn_disabled">Save</button>
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
<script>
    function showPassword() {
        if ($('#show_password_checkbox').is(':checked')) {
            $('#password').prop('disabled', true);
            $('#repassword').prop('disabled', true);
        } else {
            $('#password').prop('disabled', false);
            $('#repassword').prop('disabled', false);
        }
    }
</script>