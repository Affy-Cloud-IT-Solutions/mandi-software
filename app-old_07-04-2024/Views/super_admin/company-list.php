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
    .table-add i.ti-trash{
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

    .table-add button{
        width: 100%
    }

    .table-add .company-name{
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
                            <table id="companyTable" class="table table-striped text-center table-add">
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
                                    <tr>
                                        <td>1</td>
                                        <td class="company-name">Mircosoft</td>
                                        <td>Steve Jobs</td>
                                        <td>+91-9876543210</td>
                                        <td>steve@microsoft.com</td>
                                        <td>
                                            <button class="btn btn-primary">Active</button>
                                        </td>
                                        <td><i class="ti ti-pencil"></i><i class="ti ti-trash"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="company-name">Google</td>
                                        <td>Sundar Pichai</td>
                                        <td>+91-9876543210</td>
                                        <td>sundar@google.com</td>
                                        <td>
                                            <button class="btn btn-danger">Deactive</button>
                                        </td>
                                        <td><i class="ti ti-pencil"></i><i class="ti ti-trash"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Note* Ahad remove this after reading</h1>
        <h3>We want every company history with all admins, users, customers,dealers details</h3>
        <h3>Design will be same as Company whole design with all access given to company same access will be with superadmin</h3>
    </div>


</div>
<?php
require 'include/footer.php';
?>