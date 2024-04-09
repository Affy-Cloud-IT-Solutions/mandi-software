<div class="row">

    <div class="col-md-4 my-2">
        <label class="mb-2" for="crate_name"><b> Total Stocks</b></label>
        <input class="form-control" type="text" placeholder="Total Stocks" id="totalStocks" readonly>
    </div>

</div>
<table class="table table-striped text-center table-add">
    <thead>
        <th>S No.</th>
        <th>Crate Brand</th>
        <th>Stocks</th>
    </thead>
    <tbody>
        <?php foreach ($brandList as $key => $row) { ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $row->brandName ?></td>
                <td>
                    <input class="form-control total_stocks_cal" type="text" value="<?= $row->numberOfCrates ?>" placeholder="0" readonly>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<script>
    // Use jQuery to calculate total
    $(document).ready(function() {
        // Initialize total to 0
        let total = 0;

        // Loop through each input and add its value to the total
        $('.total_stocks_cal').each(function() {
            total += parseInt($(this).val()); // Convert value to integer before adding
        });

        // Display the total in the specified element
        $('#totalStocks').val(total);
    });
</script>