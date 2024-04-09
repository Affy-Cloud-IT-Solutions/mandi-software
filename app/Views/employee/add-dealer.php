<?php
require 'include/navbar.php';
?>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    .form-inputs label {
        color: #000;
    }

    .form-inputs input {
        color: #000;
        border: 1px solid #000;
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

    .closeBtn {
        background-color: transparent !important;
        border: none !important;
        font-size: 20px;
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
                <h1 class="text-center">Add Dealer</h1>

                <form action="<?php echo base_url(); ?>employee/dealer-report-save" class="form-inputs" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="dealername"><b> Dealer Name</b></label>
                                <select class="py-2 w-100" name="dealername" id="dealername" required>
                                    <option value="" selected disabled>Select Dealer</option>
                                    <?php
                                    foreach ($dealerList as $row1) { ?>
                                        <option value="<?= $row1->id ?>"><?= $row1->dealer_name ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" data-toggle="modal" data-target="#addCustomer">+Add</button>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Crate Brand</b></label>

                                <select class="py-2 w-100" name="crate_brand[]" id="crate_for" multiple required onchange="addCrateBrand('employee/employee-form','ajax_dealer_form')">
                                    <option value="" disabled>Select Crate</option>
                                    <?php
                                    foreach ($userList as $row) { ?>
                                        <option value="<?= $row->id ?>"><?= $row->brandName ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" data-toggle="modal" data-target="#addBrand">+Add</button>

                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="select_unit"><b>Units</b></label>
                                <select class="py-2 w-100" name="select_unit" id="select_unit" required>
                                    <option value="" selected disabled>Select Units</option>
                                    <option value="Jama">Jama</option>
                                    <option value="Becha">Becha</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Vehicle Number</b></label>
                                <input class="form-control" type="text" name="vechile_no" placeholder="Enter Vehicle Number" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Select Date</b></label>
                                <input class="form-control" type="date" name="date" value="<?php echo date('Y-m-d') ?>" required>
                            </div>
                            <div class="col-md-12 ajax_dealer_form">


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


<!-- New Customer Modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="addCustomerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0">Add New Dealer</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?php echo base_url('employee/company-save-dealer'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="mobile">Mobile:</label>
                            <input class="form-control mobile_no" type="text" id="mobile" name="mobile" maxlength="10">
                        </div>
                    </div>
                    <button class="btn btn-primary change_name" type="submit">Add Dealer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Add</button> -->
            </div>
        </div>
    </div>
</div>

<!-- New Brand Modal -->
<div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="addBrandLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0">Add New Brand</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>employee/save-crate" class="form-inputs" method="post">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
require 'include/footer.php';
?>