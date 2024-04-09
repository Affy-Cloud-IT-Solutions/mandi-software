<?php
require 'include/navbar.php';
?>

<style>
    .dashboard-tiles .card {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }

    .dashboard-tiles .card h5 {
        font-weight: bold;
        color: #fff !important;

    }

    .dashboard-tiles .card p {
        color: #000;
        color: #fff !important;

    }

    .bg-purple {
        background-color: #7C41F5;
    }

    .bg-yellow {
        background-color: #F5C525;
    }

    .bg-orange {
        background-color: #FF9062;
    }
</style>
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 dashboard-tiles">
            <h2 class="mb-3">Dashboard</h2>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="card py-3 bg-purple">
                        <h5>Total Crates</h5>
                        <p class="mb-0">100</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="card py-3 bg-yellow">
                        <h5>Total Customers</h5>
                        <p class="mb-0">100</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="card py-3 bg-orange">
                        <h5>Total Dealers</h5>
                        <p class="mb-0">100</p>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://affyclouditsolutions.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">Affy Cloud Solution</a></p>
    </div>
</div>
</div>
</div>

<?php
require 'include/footer.php';
?>