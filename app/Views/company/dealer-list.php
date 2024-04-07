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
        color: blue;
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
                <h1 class="text-center">Dealer List</h1>

                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Arsalan</td>
                                        <td>9876543210</td>
                                        <td>28/03/2024</td>
                                        <td><i class="ti ti-pencil"></i></td>
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