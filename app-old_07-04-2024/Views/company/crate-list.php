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
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Add Brand</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Brand Name">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Owner Name">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Number of Crates">
                            </div>
                            <div class="col-md-12 my-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Brand List</h1>

                <div class="container">
                    <div>
                        <h5>Bulk Upload</span>
                        <div class="my-2">
                            <input type="file">
                            <br>
                            <button class="btn btn-success my-2">Upload</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Brand Name</th>
                                    <th>Owner Name</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Brand 1</td>
                                        <td>Owner 1</td>
                                        <td><i class="ti ti-trash"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brand 2</td>
                                        <td>Owner 2</td>
                                        <td><i class="ti ti-trash"></i></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Brand 3</td>
                                        <td>Owner 3</td>
                                        <td><i class="ti ti-trash"></i></td>
                                    </tr>
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


</div>
<?php
require 'include/footer.php';
?>