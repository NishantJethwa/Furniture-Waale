<?php
  include 'includes/db.php';
  include 'includes/functions.php';
  session_start();
?>

<?php
if (!isset($_SESSION['user_id'])) {

  if (isset($_POST['register'])) {
    $user_email       = escape($_POST['user_email']);
    $user_password    = escape($_POST['user_password']);
    $user_password1   = escape($_POST['user_password1']);
    $user_address     = escape($_POST['user_address']);


    $error = [
      'user_email'       => '',
      'user_password'    => '',
      'user_address'    => ''
    ];


    if (empty($_POST['user_email'])) {
      $error['user_email'] = 'Email cannot be empty';
    }
    if (emailExists($_POST['user_email'])) {
      $error['user_email'] = 'Email exists choose another';
    }

    if (empty($_POST['user_password'])) {
      $error['user_password'] = 'Password cannot be empty';
    }

    if (empty($_POST['user_password1'])) {
      $error['user_password'] = 'Password cannot be empty';
    }

    if ($_POST['user_password'] != $_POST['user_password1']) {
      $error['user_password1'] = 'Password are not the same';
    }

    foreach ($error as $key => $value) {
      if (empty($value)) {
        unset($error[$key]);
      }
    }

    if (empty($error)) {
      registerUser($user_email, $user_address, $user_password);
      loginUser($user_email, $user_password);
    }


  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login_register.css">
</head>

<body>



	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/logo-2.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">



					<form method="post" action="register.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>

							<input type="email" name="user_email" class="form-control input_user" placeholder="email"><br/>
              <p class="text-danger">
                <?php
                  if (isset($error['user_email'])) {
                    echo $error['user_email'];
                  }
                ?>
              </p>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-home"></i></span>
							</div>

							<input type="address" name="user_address" class="form-control input_pass" placeholder="address"><br/>
              <p class="text-danger">
                <?php
                  if (isset($error['user_address'])) {
                    echo $error['user_address'];
                  }
                ?>
              </p>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>

							<input type="password" name="user_password" class="form-control input_pass" placeholder="password"><br/>
              <p class="text-danger">
                <?php
                  if (isset($error['user_password'])) {
                    echo $error['user_password'];
                  }
                ?>
              </p>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>

							<input type="password" name="user_password1" class="form-control input_pass" placeholder=" Confirm password"><br/>
              <p class="text-danger">
                <?php
                  if (isset($error['user_password1'])) {
                    echo $error['user_password1'];
                  }
                ?>
              </p>
						</div>

							<div class="d-flex justify-content-center mt-3 login_container">
                <input type="submit" name="register" value="Sign Up" class="btn login_btn">
				   		</div>
					</form>


				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Already have an account? <a href="login.php" class="ml-2">Sign In</a>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>

<?php
}else {
  header("Location: ./home.php");
}
?>
