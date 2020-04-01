function enroll(training_id) {
	jQuery.ajax({
		url: 'enroll.ajax.php',
		type: 'POST',
		dataType: 'json',
		data: {
			id: training_id
		},
		success: function(response) {
			if (response.success == 1) {
				alert("Successfully enrolled!");
				$('#e'+training_id).attr('disabled', true);

				$('#places'+training_id).html(response.message);
			}
			else {
				alert(response.message);
			}
		}
	});
}