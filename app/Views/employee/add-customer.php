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
    <!-- Display session message -->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php elseif (session()->has('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Add Customer</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="Customername"><b> Customer Name</b></label>
                                <select class="py-2 w-100" name="Customername" id="Customername">
                                    <option value="" selected disabled>Select Customer</option>

                                    <?php foreach ($customers as $customer) : ?>
                                        <option value="<?= $customer['id'] ?>"><?= $customer['customerName'] ?></option>
                                    <?php endforeach ?>

                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" data-toggle="modal" data-target="#addCustomer">+Add</button>
                            </div>
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="crate_name"><b> Crate Brand</b></label>

                                <select class="py-2 w-100" name="crate_for" id="crate_for" multiple>
                                    <option value="" selected disabled>Select Crate</option>
                                    <?php foreach ($brands as $brand) : ?>
                                        <option value="<?= $brand['id'] ?>"><?= $brand['brandName'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" data-toggle="modal" data-target="#addBrand">+Add</button>

                            </div>
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="select_unit"><b>Units</b></label>
                                <select class="py-2 w-100" name="select_unit" id="select_unit">
                                    <option value="" selected disabled>Select Units</option>
                                    <option value="Jama">Jama</option>
                                    <option value="Becha">Becha</option>
                                </select>
                            </div>
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="crate_name"><b>Select Date</b></label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="col-md-12">

                                <table class="table table-striped text-center table-add">
                                    <thead>
                                        <th>S No.</th>
                                        <th>Crate Brand</th>
                                        <th>Stocks</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($brands as $key => $brand) : ?>
                                            <tr>
                                                <td><?= $brand['id'] ?></td>
                                                <td><?= $brand['brandName'] ?></td>
                                                <td>
                                                    <input class="form-control" type="text" value="<?= $brand['numberOfCrates'] ?>" placeholder="0">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('employee/edit-brand/' . $brand['id']) ?>" data-toggle="modal" data-target="#addBrand2"><i class="ti ti-edit"></i></a>
                                                    <i class="ti ti-trash"></i>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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
                <h5 class="mb-0">Add New Customer</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?= site_url('employee/save-customer') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" required>

                            <?php if (session()->has('errors')) : ?>
                                <?php $errors = session('errors'); ?>
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="error text-danger "><?= esc($errors['name']) ?></p>
                                <?php endif ?>
                            <?php endif ?>

                        </div>
                        <div class="col-md-6 my-2">
                            <label for="mobile">Mobile:</label>
                            <input class="form-control" type="text" id="mobile" name="mobile" required>
                        </div>
                    </div>
                    <button class="btn btn-primary">Add Customer</button>
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
                <form id="myForm" action="<?= site_url('employee/save-crate') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="brand_name"><b> Brand Name</b></label>
                            <input class="form-control" type="text" id="brand_name" name="brand_name" placeholder="Brand Name">
                        </div>
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="owner_name"><b> Owner Name</b></label>
                            <input class="form-control" type="text" id="owner_name" name="owner_name" placeholder="Owner Name">
                        </div>
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="no_crate"><b> Number of Crates</b></label>
                            <input class="form-control" type="text" id="no_crate" name="no_crate" placeholder="Number of Crates">
                        </div>
                    </div>
                    <button class="btn btn-primary">Add Crate</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Brand Modal -->
<div class="modal fade" id="addBrand2" tabindex="-1" role="dialog" aria-labelledby="addBrandLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0">Edit Brand</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?= base_url('employee/update-brand/' . $brand['id']) ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="brand_name"><b> Brand Name</b></label>
                            <input class="form-control" type="text" id="brand_name" name="brand_name" value="<?= $brand['brandName'] ?>" placeholder="Brand Name">
                        </div>
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="owner_name"><b> Owner Name</b></label>
                            <input class="form-control" type="text" id="owner_name" name="owner_name" value="<?= $brand['ownerName'] ?>" placeholder="Owner Name">
                        </div>
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="no_crate"><b> Number of Crates</b></label>
                            <input class="form-control" type="text" id="no_crate" name="no_crate" value="<?= $brand['numberOfCrates'] ?>" placeholder="Number of Crates">
                        </div>
                    </div>
                    <button class="btn btn-primary">Add Crate</button>
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