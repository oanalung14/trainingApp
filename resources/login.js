function openLogIn() {
	$('#logInForm').modal('show');
    return false;
}

function openSignup() {
    $('#signupForm').modal('show');
    return false;
}

function loginUser() {
	jQuery.ajax({
		url: 'login.ajax.php',
		type: 'POST',
		dataType: 'json',
		data: {
			email: $('#email').val(),
			password: $('#password').val()
		},
		success: function(response) {
			if (response.success == 1) {
				// User login..
				window.location = 'index.php';
			}
			else {
				alert(response.message);
			}
		}
	});
}

function signupUser() {
	jQuery.ajax({
		url: 'signup.ajax.php',
		type: 'POST',
		dataType: 'json',
		data: {
			first_name: $('#first_name').val(),
			last_name: $('#last_name').val(),
			email: $('#email_signup').val(),
			password: $('#password_signup').val(),
			password_confirm: $('#password_confirm').val(),
			department: $('#department').val(),
			experience: $('#experience').val()
		},
		success: function(response) {
			if (response.success == 1) {
				// User login..
				window.location = 'index.php';
			}
			else {
				alert(response.message);
			}
		}
	});
}