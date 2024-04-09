<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label {
        color: #000;
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

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center"><?= $title ?></h1>

                <form action="<?= $formSave ?>" class="form-inputs" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                                <input class="form-control" type="text" id="brand_name" name="brand_name" placeholder="Brand Name" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                                <input class="form-control" type="text" id="owner_name" name="owner_name" placeholder="Owner Name" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                                <input class="form-control" type="number" id="no_crate" name="no_crate" placeholder="Number of Crates" required>
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