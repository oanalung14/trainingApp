<?php
require_once('includes/init.php');
@session_start();
if (isset($_SESSION['userData'])) {
  header('location: index.php');
}

$_add_css_to_head = array();
$_add_js_to_footer = array(
  'resources/login.js',
);
require_once('includes/header.php');
?>
<!-- Navbar -->
<nav class="nav">
  <a class="nav-link" href="#" onclick="openLogIn(); return false">Sign in</a>
  <a class="nav-link" href="#" onclick="openSignup(); return false">Sign up</a>
  <a class="nav-link">About us</a>
</nav>

<!-- Header -->
<div class="jumbotron">
  <h1 class="display-4">Training Application</h1>
  <p class="lead">Your learning partner</p>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <h1>Intro</h1>
      <h5>Self development is the key</h5>
      <p>We live in a world that develops constantly. To have a successful company, employees should always have the possibility to learn something new. This app makes it easier for the companies to present available trainings to the employees.
      </p>
      <i class="fa fa-group w3-padding-64" style="font-size:150px;color:#12065c"></i>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h1>Quote of the day: let's learn something new </h1>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="logInForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign in</h5>
        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-content">
          <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>

            <button onclick="loginUser(); return false">Login</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" data-dismiss="modal" class="cancelbtn">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="signupForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign up</h5>
        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-content">
          <div class="container">
            <label for="first_name"><b>First name</b></label>
            <input type="text" placeholder="Enter first name" id="first_name" name="first_name" required>

            <label for="last_name"><b>Last name</b></label>
            <input type="text" placeholder="Enter last name" id="last_name" name="last_name" required>
            
            <label for="email_signup"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email_signup" name="email_signup" required>

            <label for="password_signup"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password_signup" name="password_signup" required>

            <label for="password_confirm"><b>Password Confirm</b></label>
            <input type="password" placeholder="Enter Password again" id="password_confirm" name="password_confirm" required>
            
            <label for="department"><b>Department</b></label>
            <input type="text" placeholder="Enter Department" id="department" name="department" required>

            <label for="experience"><b>Experience</b></label>
            <input type="text" placeholder="Enter Experience" id="experience" name="experience" required>

            <button onclick="signupUser(); return false">Sign up</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" data-dismiss="modal" class="cancelbtn">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once('includes/footer.php');
?>