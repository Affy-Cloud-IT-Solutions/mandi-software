<?php
require 'include/navbar.php';

?>

<div class="container-fluid">

    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Sales Overview</h5>
                        </div>
                        <div>
                            <select class="form-select">
                                <option value="1">March 2023</option>
                                <option value="2">April 2023</option>
                                <option value="3">May 2023</option>
                                <option value="4">June 2023</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
       
    </div>

    <div class="container" hidden>
        <table class="table table-striped">
            <thead>
                <th>S No.</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Mobile</th>
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
                            <a href="<?php echo base_url("company-delete/$row->company_id"); ?>" title="Delete"><i onclick="return confirm('Are you sure you want to Delete this company?')" style="cursor:pointer; color:red" class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>



    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://affyclouditsolutions.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">Affy Cloud Solution</a></p>
    </div>
</div>
</div>
</div>

<?php
require 'include/footer.php';
// require APPPATH . 'Views/include/footer.php';
?>