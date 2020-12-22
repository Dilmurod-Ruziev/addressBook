<script type="text/javascript">
    // add row
    $("#addPhone").click(function () {
        var html = '';
        html += '<div id="inputFormPhone">';
        html += '<div class="input-group mb-3">';
        html += '<input type="tel" name="phones[]" class="form-control m-input" placeholder="Additional phone" required>';
        html += '<div class="input-group-append">';
        html += '<button id="removePhone" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newPhone').append(html);
    });
    // remove row
    $(document).on('click', '#removePhone', function () {
        $(this).closest('#inputFormPhone').remove();
    });


    $("#addEmail").click(function () {
        var html = '';
        html += '<div id="inputFormEmail">';
        html += '<div class="input-group mb-3">';
        html += '<input type="email" name="emails[]" class="form-control m-input" placeholder="Additional email" required>';
        html += '<div class="input-group-append">';
        html += '<button id="removeEmail" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newEmail').append(html);
    });
    // remove row
    $(document).on('click', '#removeEmail', function () {
        $(this).closest('#inputFormEmail').remove();
    });
</script>
