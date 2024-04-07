<?php
require 'include/navbar.php';
?>
<style>
    .form-inputs label{
        color: #000;
    }
    .form-inputs input{
        color: #000;
        border: 1px solid #000;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h1 class="text-center">Add Brand</h1>

                <form action="" class="form-inputs">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Brand Name</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Brand Name">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Owner Name</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Owner Name">
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="mb-2" for="crate_name"><b> Number of Crates</b></label>
                                <input class="form-control" type="text" id="crate_name" name="crate_name"
                                    placeholder="Number of Crates">
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


<?php
require 'include/footer.php';
?>