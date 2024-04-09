<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label {
        color: #000;
        font-weight: 500;
        padding-bottom: 5px;
    }

    .form-inputs input {
        color: #000;
        border: 1px solid #000;
    }
</style>

<div class="container-fluid">

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center"><?= $title ?> Company</h2>
            <form action="<?php echo $formSave; ?>" class="form-inputs" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input type="hidden" name="id" value="<?= $companyData->company_id ?? '' ?>" />
                <div class="row">
                    <div class="col-md-6 my-2">
                        <label for="">Company Name</label>
                        <input class="form-control" type="text" name="company_name" placeholder="Enter Company Name" value="<?= $companyData->company_name ?? '' ?>" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Username</label>
                        <input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="<?= $companyData->user_name ?? '' ?>" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Enter Email" value="<?= $companyData->email ?? '' ?>" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Mobile</label>
                        <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile" value="<?= $companyData->mobile ?? '' ?>" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Password</label>&nbsp;
                        <?php
                        $hidden = 'hidden';
                        if (isset($showPassword)) {
                            $hidden = "";
                        }
                        $checked = "";
                        $disabled = "";
                        if (isset($companyData->password)) {
                            $checked = "checked";
                            $disabled = "disabled";
                        }
                        ?>
                        <input type="checkbox" id="show_password_checkbox" <?= $hidden, $checked ?> onclick="showPassword()">
                        <input class="form-control password" type="text" name="password" id="password" placeholder="Enter Password" <?= $checked . ' ' . $disabled ?>>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Confirm Password</label>
                        <input class="form-control password" type="text" id="repassword" placeholder="Confirm Password" <?= $checked . ' ' . $disabled ?>>
                        <span id="message" style="color:red;display:none">Password not Match</span>
                    </div>
                    <div class="col-md-12 my-2">
                        <button class="btn btn-success btn_disabled">Save</button>
                    </div>
                </div>
            </form>

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