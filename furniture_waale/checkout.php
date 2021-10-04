<?php
  include 'includes/db.php';
  include 'includes/functions.php';
  session_start();

  $amount = $_POST['amount'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<style>
#checkout {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#checkout td, #checkout th {
  border: 1px solid #ddd;
  padding: 8px;
}

#checkout tr:nth-child(even){background-color: #f2f2f2;}

#checkout tr:hover {background-color: #ddd;}

#checkout th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

<body>
<form method="POST" action="Paytm/pgRedirect.php">
	<input type = "hidden" name="ORDER_ID" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
	<input type = "hidden" name="CUST_ID" value="<?php echo $_SESSION['user_id'];?>">
<br>
<br>
<br>
		<table id="checkout">
			<tbody>
				<tr>
					<th>Label</th>
					<th>Value</th>
				</tr>

				<tr>
					<td><label>Name</label></td>
					<td><input type = "text"  maxlength="50"
						 name="username">
					</td>
				</tr>

				<tr>
					<td><label>Contact Number</label></td>
					<td><input type = "text"  maxlength="50"
						 name="number">
					</td>
				</tr>

				<tr>
					<td><label>Delivery Address</label></td>
					<td><input type = "text"  maxlength="50"
						 name="address">
					</td>
				</tr>

				<tr>
					<td><label>Pincode</label></td>
					<td><input type = "text" 
						 name="pincode">
					</td>
				</tr>

				<tr>
					<td><label>Landmark</label></td>
					<td><input type = "text" 
						 name="landmark">
					</td>
				</tr>

			
				<tr>
					<td><label>Amount</label></td>
					<td><?php echo $amount; ?>
						<input type = "hidden" title="TXN_AMOUNT" 
						 name="TXN_AMOUNT"
						value="<?php echo $amount; ?>">
					</td>
				</tr>

				


				<tr>
					
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>

