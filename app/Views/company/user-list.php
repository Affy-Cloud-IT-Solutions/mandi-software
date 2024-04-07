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
                <h1 class="text-center">User List</h1>

                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Username</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($userList as $key => $row) {
                                    ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->mobile ?></td>
                                            <td>
                                                <?php
                                                if ($row->status == 0) { ?>
                                                    <a href="<?php echo base_url("user-active-deactive/$row->id/1"); ?>" title="Deactive"><button onclick="return confirm('Are you sure you want to Deactivate this company?')" class="btn btn-danger">Deactive</button></a>
                                                <?php  } else { ?>
                                                    <a href="<?php echo base_url("user-active-deactive/$row->id/0"); ?>" title="Active"><button onclick="return confirm('Are you sure you want to Active this company?')" class="btn btn-primary">Active</button></a>
                                                <?php   }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url("user-edit/$row->id"); ?>" title="Edit"><i style="cursor:pointer;" class="ti ti-pencil"></i></a>
                                                <a href="<?php echo base_url("user-delete/$row->id"); ?>" title="Delete"><i onclick="return confirm('Are you sure you want to Delete this company?')" style="cursor:pointer; color:red" class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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