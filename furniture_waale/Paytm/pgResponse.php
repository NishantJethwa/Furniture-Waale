<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include '../includes/db.php';
include '../includes/functions.php';
session_start();


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
?>

<?php if (isset($_POST['review_button'])) {
  $review = $_POST['review'];
  $query="INSERT INTO user_feedback(feedback) VALUES ('$review')";
  $insert_query = mysqli_query($connection,$query);
  header("Location: ../includes/logout.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>


<?php

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") { ?>
		<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Your transaction is successful.We would love to hear about your shopping experience. Your feedback will help us improve. </p>
	</div>
		
		<div>
			<form method="POST" action="pgResponse.php">
			<textarea name="review" rows="4" cols="80"></textarea>
				<input type="submit" value="Submit" name="review_button">
			</form>
		</div>
	<?php
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}


?>

