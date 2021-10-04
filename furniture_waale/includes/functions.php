<?php

function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}

function emailExists($user_email){
  global $connection;

  $query = "SELECT user_email FROM users WHERE user_email = '{$user_email}'";
  $email_exists = mysqli_query($connection, $query);

  if (mysqli_num_rows($email_exists) > 0) {
    return true;
  }
  return false;
}

function confirmQuery($query){
  global $connection;
  if (!$query) {
    die('Query Failed: ' . mysqli_error($connection));
  }
}

function lenCart($user_id){
  global $connection;
  $query = "SELECT * FROM cart WHERE user_id = $user_id";
  $query = mysqli_query($connection, $query);
  $len_cart = mysqli_num_rows($query);
  return $len_cart;
}

function registerUser($user_email, $user_password){
  global $connection;

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

  $stmt = mysqli_prepare($connection, "INSERT INTO users(user_email, user_password) VALUES(?,?)");
  mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_password);
  mysqli_stmt_execute($stmt);

  if (!$stmt) {
    die(mysqli_error($connection));
  }

}


function loginUser($user_email, $user_password){
  global $connection;

  $query = "SELECT * FROM users WHERE user_email = '{$user_email}'";
  $login_user = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($login_user)){
    $db_user_id          = $row['user_id'];
    $db_user_email       = $row['user_email'];
    $db_user_password    = $row['user_password'];

    if (password_verify($user_password, $db_user_password)) {
      $_SESSION['user_id']          = $db_user_id;
      $_SESSION['user_email']       = $db_user_email;

      $_SESSION['user_password']    = $db_user_password;

      header("Location: ./home.php");
    }
  }

}

?>