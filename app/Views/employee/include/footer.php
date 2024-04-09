<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        // Your code using $ as an alias to jQuery goes here...
        $('#Customername').select2();
        $('#crate_for').select2();
        $('#dealername').select2();
        $('#select_unit').select2();

    });
</script>

<script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url() ?>assets/js/app.min.js"></script>
<script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url() ?>assets/js/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</body>
<script>
    function addCrateBrand(urlSite, htmlAppend) {
        var crate_for = $("#crate_for").val();
        $.ajax({
            url: "<?php echo base_url() ?>" + urlSite,
            type: "POST",
            data: {
                crate_for: crate_for
            },
            success: function(msg) {
                console.log(msg);
                $("." + htmlAppend).html(msg);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

    $('.mobile_no').on('keypress', function(event) {
        var charCode = event.which ? event.which : event.keyCode;
        // Allow only numeric keys (0-9) and backspace (8) key
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 8) {
            event.preventDefault();
        }
    });
</script>

</html>