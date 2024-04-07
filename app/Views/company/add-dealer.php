<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label {
        color: #000;
    }

    .form-inputs input {
        color: #000;
        border: 1px solid #000;
    }

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

    .table-add th,
    .table-add td {
        vertical-align: middle;
        border: 1px solid #000;
    }

    .addbtn {
        background-color: #00A65A !important;
        color: #fff !important;
        width: fit-content;
        float: right;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Add Dealer</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Customer Name</b></label>
                                <select class="py-2 w-100" name="crate_for" id="crate_for">
                                    <option value="" selected disabled>Select Customer</option>
                                    <option value="Customer">Customer 1</option>
                                    <option value="Dealer">Customer 2</option>
                                    <option value="Dealer">Customer 3</option>
                                    <option value="Dealer">Customer 4</option>
                                    <option value="Dealer">Customer 5</option>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" id="openCustomerModal">+Add</button>
                            </div>
                            <div class="col-md-6 my-2">
                                <label class="mb-2" for="crate_name"><b> Crate Brand</b></label>

                                <select class="py-2 w-100" name="crate_for" id="crate_for">
                                    <option value="" selected disabled>Select Crate</option>
                                    <option value="Customer">Crate 1</option>
                                    <option value="Dealer">Crate 2</option>
                                    <option value="Dealer">Crate 3</option>
                                    <option value="Dealer">Crate 4</option>
                                    <option value="Dealer">Crate 5</option>
                                </select>
                                <button type="button" class="btn addbtn my-2 p-1" id="openbrandModal">+Add</button>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Units</b></label>
                                <select class="py-2 w-100" name="crate_for" id="crate_for">
                                    <option value="" selected disabled>Select Units</option>
                                    <option value="Jama">Jama</option>
                                    <option value="Becha">Becha</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Vehicle Number</b></label>
                                <input class="form-control" type="text" placeholder="Enter Vehicle Number">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b>Select Date</b></label>
                               <input class="form-control" type="date">
                            </div>
                            <div class="col-md-12">

                                <table class="table table-striped text-center table-add">
                                    <thead>
                                        <th>S No.</th>
                                        <th>Crate Brand</th>
                                        <th>Stocks</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Brand 1</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Brand 2</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Brand 3</td>
                                            <td>
                                                <input class="form-control" type="text" value="1" placeholder="0">
                                            </td>
                                            <td><i class="ti ti-trash"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 my-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<!-- Modal Popup -->
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    .closeModal {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        width: fit-content;
        margin-left: auto;
    }

    .closeModal:hover,
    .closeModal:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .popup-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<div id="customerModal" class="modal">
    <div class="modal-content pt-1">
        <div class="popup-title">
            <h5 class="mb-0">Add New Customer</h5>
            <p class="close closeModal closecustomermodal mb-0">&times;</p>
        </div>
        <form id="myForm">
            <div class="row">
                <div class="col-md-6 my-2">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                </div>
                <div class="col-md-6 my-2">
                    <label for="mobile">Mobile:</label>
                    <input class="form-control" type="text" id="mobile" name="mobile" required>
                </div>
            </div>
            <button class="btn btn-primary">Add Customer</button>
        </form>
    </div>
</div>
<script>

    var modal1 = document.getElementById("customerModal");
    var btn1 = document.getElementById("openCustomerModal");
    var span1 = document.getElementsByClassName("closecustomermodal")[0];

    btn1.onclick = function () {
        modal1.style.display = "block";
    }

    span1.onclick = function () {
        modal1.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }

    document.getElementById("myForm").addEventListener("submit", function (event) {
        event.preventDefault();
        var name1 = document.getElementById("name").value;
        var mobile1 = document.getElementById("mobile").value;

        console.log("Name: " + name1 + ", Mobile: " + mobile1);
        modal1.style.display = "none";
    });

</script>

<!-- Crate Modal -->
<div id="brandModal" class="modal">
    <div class="modal-content pt-1">
        <div class="popup-title">
            <h5 class="mb-0">Add New Crate Brand</h5>
            <p class="closeCrateModal closeModal mb-0">&times;</p>
        </div>
        <form id="myForm">
            <div class="row">
                <div class="col-md-4 my-2">
                    <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name" placeholder="Brand Name">
                </div>
                <div class="col-md-4 my-2">
                    <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name" placeholder="Owner Name">
                </div>
                <div class="col-md-4 my-2">
                    <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                    <input class="form-control" type="text" id="crate_name" name="crate_name"
                        placeholder="Number of Crates">
                </div>
            </div>
            <button class="btn btn-primary">Add Crate</button>
        </form>
    </div>
</div>
<script>

    var modal = document.getElementById("brandModal");


    var btn = document.getElementById("openbrandModal");


    var span = document.getElementsByClassName("closeCrateModal")[0];


    btn.onclick = function () {
        modal.style.display = "block";
    }


    span.onclick = function () {
        modal.style.display = "none";
    }


    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    document.getElementById("myForm").addEventListener("submit", function (event) {
        event.preventDefault();
        var name = document.getElementById("name").value;
        var mobile = document.getElementById("mobile").value;

        console.log("Name: " + name + ", Mobile: " + mobile);
        modal.style.display = "none";
    });

</script>
<?php
require 'include/footer.php';
?>