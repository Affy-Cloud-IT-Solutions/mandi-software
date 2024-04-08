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
                <h1 class="text-center">Dealer Reports</h1>

                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Crate Brand</th>
                                    <th>Unit</th>
                                    <th>Stock</th>
                                    <th>Vehicle Number</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $incID = 0;
                                    foreach ($DealerReport as $row) {
                                        $arrBrand = explode(',', $row->brand_idd);
                                        foreach ($arrBrand as $rowKey) {
                                            ++$incID;
                                            $BrandModel = new App\Models\BrandModel();
                                            $DealerModel = new App\Models\DealerModel();
                                            $BrandData = $BrandModel->select('*')->where(['id' => $rowKey])->get()->getrow();
                                            $DealerData = $DealerModel->select('*')->where(['id' => $row->dealer_id])->get()->getrow();
                                    ?>
                                            <tr>
                                                <td><?= $incID ?></td>
                                                <td><?= $row->date ?></td>
                                                <td><?= $DealerData->dealer_name ?? '' ?></td>
                                                <td><?= $BrandData->brandName ?></td>
                                                <td><?= $row->units ?></td>
                                                <td><?= $BrandData->numberOfCrates ?></td>
                                                <td><?= $row->vehicle_number ?></td>
                                            </tr>
                                    <?php }
                                    } ?>

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