<?php
require 'include/navbar.php';
?>
<style>
    .user-profile h5 {
        color: #000;
    }

    .user-profile .title {
        padding: 5px;
        width: 100px;
        color: #000;
        font-weight: bold;
    }

    .user-profile .details {
        padding: 5px;
        width: 100px;
        color: #000;

    }

    .user-profile table td {
        border: 1px solid #000;
    }
</style>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Profile</h2>
            <div class="row user-profile">
                <div class="col-md-12">

                    <table class="table">

                        <tbody>
                            <tr>
                                <td class="p-3 title">Company Name</td>
                                <td class="p-3 details">Affy Cloud IT Solution</td>
                            </tr>
                            <tr>
                                <td class="p-3 title">Company ID</td>
                                <td class="p-3 details">AFFY-1234</td>
                            </tr>
                            <tr>
                                <td class="p-3 title">Userame</td>
                                <td class="p-3 details">affy</td>
                            </tr>
                            <tr>
                                <td class="p-3 title">Email</td>
                                <td class="p-3 details">affy@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="p-3 title">Mobile</td>
                                <td class="p-3 details">+91-9876543210</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>


<?php
require 'include/footer.php';
?>