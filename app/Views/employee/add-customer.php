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

    .closeBtn{
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
                <h1 class="text-center">Add Customer</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="Customername"><b> Customer Name</b></label>
                                <select class="py-2 w-100" name="Customername" id="Customername">
                                    <option value="" selected disabled>Select Customer</option>
                                    <option value="Customer">Customer 1</option>
                                    <option value="Customer">Customer 2</option>
                                    <option value="Customer">Customer 3</option>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" data-toggle="modal" data-target="#addCustomer">+Add</button>
                            </div>
                            <div class="col-md-3 my-2">
                                <label class="mb-2" for="crate_name"><b> Crate Brand</b></label>

                                <select class="py-2 w-100" name="crate_for" id="crate_for" multiple>
                                    <option value="" selected disabled>Select Crate</option>
                                    <option value="Customer">Crate 1</option>
                                    <option value="Customer">Crate 2</option>
                                    <option value="Customer">Crate 3</option>
                                    <option value="Customer">Crate 4</option>
                                    <option value="Customer">Crate 5</option>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Brand 1</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Brand 2</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Brand 3</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
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
      <form id="myForm">
            <div class="row">
                <div class="col-md-6 my-2">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
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
      <form id="myForm">
            <div class="row">
                <div class="col-md-12 my-2">
                    <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name" placeholder="Brand Name">
                </div>
                <div class="col-md-12 my-2">
                    <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name" placeholder="Owner Name">
                </div>
                <div class="col-md-12 my-2">
                    <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name"
                        placeholder="Number of Crates">
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