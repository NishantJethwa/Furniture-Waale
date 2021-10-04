<?php
  include 'includes/db.php';
  include 'includes/functions.php';
  session_start();

if (!isset($_SESSION['user_id'])) {


  if (isset($_POST['sign_in'])) {

    $user_email       = escape($_POST['user_email']);
    $user_password    = escape($_POST['user_password']);

    $error = [
      'user_email'       => '',
      'user_password'    => '',
    ];

    if (empty($_POST['user_email'])) {
      $error['user_email'] = 'Email cannot be empty';
    }


    if (empty($_POST['user_password'])) {
      $error['user_password'] = 'Password cannot be empty';
    }

    foreach ($error as $key => $value) {
      if (empty($value)) {
        unset($error[$key]);
      }
    }

    if (empty($error)) {
      loginUser($user_email, $user_password);
    }
  }


    if (isset($_POST['sign_up'])) {
      $user_email       = escape($_POST['user_email']);
      $user_password    = escape($_POST['user_password']);


      $error = [
        'user_email'       => '',
        'user_password'    => '',
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

      foreach ($error as $key => $value) {
        if (empty($value)) {
          unset($error[$key]);
        }
      }

      if (empty($error)) {
        registerUser($user_email, $user_password);
        loginUser($user_email, $user_password);
      }

    }


  ?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>
  <section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text"></p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text"></p>
        <button class="user_registered-login" id="login-button" onclick="home.php">Login</button>
      </div>
    </div>


    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>


        <form class="forms_form" method="POST" action="login.php">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email"  name='user_email' placeholder="Email" class="forms_field-input" required autofocus />
              <?php
                if (isset($error['user_email'])) {
                  echo $error['user_email'];
                }
              ?>
            </div>
            <div class="forms_field">
              <input type="password" name='user_password' placeholder="Password" class="forms_field-input" required />
              <?php
                if (isset($error['user_password'])) {
                  echo $error['user_password'];
                }
              ?>
            </div>
          </fieldset>
          <div class="forms_buttons">
            
            <input type="submit" value="Log In" class="forms_buttons-action" name="sign_in">
          </div>
        </form>

      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>


        <form class="forms_form" method="POST" action="login.php">
          <fieldset class="forms_fieldset">
            <!-- <div class="forms_field">
              <input type="text" placeholder="Full Name" class="forms_field-input" required />
            </div> -->
            <div class="forms_field">
              <input type="email" placeholder="Email" name="user_email" class="forms_field-input" required />
              <p class="text-danger">
                <?php
                  if (isset($error['user_email'])) {
                    echo $error['user_email'];
                  }
                ?>
              </p>
            </div>
            <div class="forms_field">
              <input type="password" name="user_password" placeholder="Password" class="forms_field-input" required />
              <p class="text-danger">
                <?php
                  if (isset($error['user_password'])) {
                    echo $error['user_password'];
                  }
                ?>
              </p>
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action" name="sign_up">
          </div>
        </form>



      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
/**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)

</script>

</body>
</html>

<?php
}else {
  header("Location: ./home.php");
}
?>
