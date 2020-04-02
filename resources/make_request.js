function openMakeRequestForm() {
    $('#makeRequestForm').modal('show');
    return false;
}

function sendRequest() {
    jQuery.ajax({
        url: 'makeRequest.ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {
            content: $('#content').val()
        },
        success: function(response) {
            if (response.success == 1) {
                $('#makeRequestForm').modal('hide');
                $('#content').val("");
              //alert("Thank you!");
            }
            else {
                alert(response.message);
            }
        }
    });
    return false;
}

