<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label {
        color: #000;
        font-weight: 500;
        padding-bottom: 5px;
    }

    .form-inputs input {
        color: #000;
        border: 1px solid #000;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Create Company</h2>
            <form action="" class="form-inputs">
                <div class="row">
                    <div class="col-md-6 my-2">
                        <label for="">Company Name</label>
                        <input class="form-control" type="text" placeholder="Enter Company Name">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Username</label>
                        <input class="form-control" type="text" placeholder="Enter Username">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Email</label>
                        <input class="form-control" type="text" placeholder="Enter Email">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Mobile</label>
                        <input class="form-control" type="text" placeholder="Enter Mobile">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Password</label>
                        <input class="form-control" type="text" placeholder="Enter Password">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="">Confirm Password</label>
                        <input class="form-control" type="text" placeholder="Confirm Password">
                    </div>
                    <div class="col-md-12 my-2">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


</div>


<?php
require 'include/footer.php';
?>