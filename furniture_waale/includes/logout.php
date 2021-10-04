<?php

  session_start();

  $_SESSION['user_id']       = null;
  $_SESSION['user_email']    = null;
  $_SESSION['user_address']  = null;
  $_SESSION['user_password'] = null;


  header('Location: ../home.php');

?>
