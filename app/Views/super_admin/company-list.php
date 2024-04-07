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
        cursor: pointer;
        margin: 0 5px
    }

    .table-add i.ti-trash {
        color: red;
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

    .table-add button {
        width: 100%
    }

    .table-add .company-name {
        color: #007bff !important;
        cursor: pointer;
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Company List</h1>

                <div class="container">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped text-center table-add">
                                <thead>
                                    <th>S No.</th>
                                    <th>Company Name</th>
                                    <th>Company Username</th>
                                    <th>Company Mobile</th>
                                    <th>Company Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($companyData as $key => $row) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td class="company-name"><?= $row->company_name ?></td>
                                            <td><?= $row->user_name ?></td>
                                            <td><?= $row->mobile ?></td>
                                            <td><?= $row->email ?></td>
                                            <td>
                                                <?php
                                                if ($row->status == 0) { ?>
                                                    <a href="<?php echo base_url("company-active-deactive/$row->company_id/1"); ?>" title="Deactive"><button onclick="return confirm('Are you sure you want to Deactivate this company?')" class="btn btn-danger">Deactive</button></a>
                                                <?php  } else { ?>
                                                    <a href="<?php echo base_url("company-active-deactive/$row->company_id/0"); ?>" title="Active"><button onclick="return confirm('Are you sure you want to Active this company?')" class="btn btn-primary">Active</button></a>
                                                <?php   }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url("company-edit/$row->company_id"); ?>" title="Edit"><i style="cursor:pointer;" class="ti ti-pencil"></i></a>
                                                <a href="<?php echo base_url("company-delete/$row->company_id"); ?>" title="Delete"><i onclick="return confirm('Are you sure you want to Delete this company?')" style="cursor:pointer;color:red" class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
require 'include/footer.php';
?>