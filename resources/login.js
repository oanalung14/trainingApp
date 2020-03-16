// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}


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
// // Get the modal
// var modal = document.getElementById("logInForm");
//
// // Get the button that opens the modal
// var btn = document.getElementById("signIn");
//
// // When the user clicks the button, open the modal
// btn.onclick = function() {
//     modal.style.display = "block";
// }
//
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }