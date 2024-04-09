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
                <div class="my-3 d-flex justify-content-between">
                    <h3 class="text-center">Dealer List</h3>
                    <button class="btn btn-primary btn_click" data-toggle="modal" data-target="#addNewDealer">Add New
                        Dealer</button>
                </div>

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
                                    <?php foreach ($userList as $key => $row) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $row->dealer_name ?></td>
                                            <td><?= $row->dealer_no ?></td>
                                            <td><?= date('d-m-Y', strtotime($row->created_date)) ?></td>
                                            <td>
                                                <a href="#>" title="Edit" onclick="editDealer('<?= $row->id ?>','<?= $row->dealer_name ?>','<?= $row->dealer_no ?>')"><i style="cursor:pointer;" class="ti ti-pencil"></i></a>
                                                <a href="<?php echo base_url("dealer-delete/$row->id"); ?>" title="Delete"><i onclick="return confirm('Are you sure you want to Delete this dealer?')" style="cursor:pointer; color:red" class="ti ti-trash"></i></a>
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

<div class="modal fade" id="addNewDealer" tabindex="-1" role="dialog" aria-labelledby="addNewDealerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title change_heading" id="addNewDealerLabel">Add New Dealer</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?php echo base_url('company-save-dealer'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="mobile">Mobile:</label>
                            <input class="form-control mobile_no" type="text" id="mobile" name="mobile"  maxlength="10">
                        </div>
                    </div>
                    <input class="" type="hidden" id="id" name="id">
                    <button class="btn btn-primary change_name" type="submit">Add Dealer</button>
                </form>
                <hr>
                <h4 class="text-center">or</h4>
                <hr>
                <form action="<?= base_url('dealer-upload-bulk') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 my-2">
                        <label class="mb-2" for="crate_bulk"><b> Bulk Upload</b></label>
                        <br>
                        <input class="form-control" type="file" accept=".csv" id="crate_bulk" name="crate_bulk" placeholder="Number of Crates" required>
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
<?php
require 'include/footer.php';
?>
<script>
    $('.mobile_no').on('keypress', function(event) {
        var charCode = event.which ? event.which : event.keyCode;
        // Allow only numeric keys (0-9) and backspace (8) key
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 8) {
            event.preventDefault();
        }
    });

    function editDealer(id, name, no) {
        $('#myForm').attr('action', '<?php echo base_url('company-update-dealer'); ?>');
        $("#id").val(id);
        $("#name").val(name);
        $("#mobile").val(no);
        $(".change_heading").html("Edit Dealer");
        $(".change_name").html("Update");
        $(".btn_click").click();
    }
</script>