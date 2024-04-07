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
                    <h3 class="text-center">Brand List</h3>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCrateModalModal">Add New
                        Brand</button>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Brand Name</th>
                                    <th>Owner Name</th>
                                    <th>No of Crates</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($brandList as $Key => $row) { ?>
                                        <tr>
                                            <td>
                                                <?= ++$Key ?>
                                            </td>
                                            <td>
                                                <?= $row->brandName ?>
                                            </td>
                                            <td>
                                                <?= $row->ownerName ?>
                                            </td>
                                            <td>
                                                <?= $row->numberOfCrates ?>
                                            </td>
                                            <td><a href="<?php echo base_url("crate-delete/$row->id"); ?>" title="Delete"><i
                                                        onclick="return confirm('Are you sure you want to Delete this Crate?')"
                                                        style="cursor:pointer; color:red" class="ti ti-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Brand -->
    <!-- Modal -->
    <div class="modal fade" id="addCrateModalModal" tabindex="-1" role="dialog" aria-labelledby="addCrateModalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCrateModalModalLabel">Add New Brand</h5>
                    <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= $formSave ?>" class="form-inputs" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 my-2">
                                    <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                                    <input class="form-control" type="text" id="brand_name" name="brand_name"
                                        placeholder="Brand Name" required>
                                </div>
                                <div class="col-md-4 my-2">
                                    <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                                    <input class="form-control" type="text" id="owner_name" name="owner_name"
                                        placeholder="Owner Name" required>
                                </div>
                                <div class="col-md-4 my-2">
                                    <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                                    <input class="form-control" type="text" id="no_crate" name="no_crate"
                                        placeholder="Number of Crates" required>
                                </div>
                                <div class="col-md-12 my-2">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4 class="text-center">or</h4>
                    <hr>
                    <form action="">
                        <div class="col-md-12 my-2">
                            <label class="mb-2" for="crate_bulk"><b> Bulk Upload</b></label>
                            <br>
                            <input class="form-control" type="file" id="crate_bulk" name="crate_bulk"
                                placeholder="Number of Crates" required>
                        </div>
                        <button class="btn btn-success">Upload</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
require 'include/footer.php';
?>