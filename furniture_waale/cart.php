<?php
  include 'includes/db.php';
  include 'includes/functions.php';
  session_start();
?>
<?php if (isset($_SESSION['user_id'])){?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Furniture Wale</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="css/cart_style.css">
    <link rel="stylesheet" type="text/css" href="css/search2.css">

  </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php
        include './includes/navigation2.php';
         ?>
  

    <div class="container mt-5">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $user_id = $_SESSION['user_id'];
          $query="SELECT * FROM lr_essentials_items INNER JOIN cart ON lr_essentials_items.item_id = cart.item_id AND cart.user_id = $user_id";
          $display_query=mysqli_query($connection,$query);
          $count = 1;
          $sum = 0;
          while ($row = mysqli_fetch_assoc($display_query)){
            $cart_item_id = $row['cart_item_id'];
            $item_name = $row['item_name'];
            $item_image = $row['item_image'];
            $item_price = $row['item_price'];
            $sum += $item_price
            ?>
            <tr>
              <th><?php echo $count; ?></th>
              <th><?php echo $item_name; ?></th>
              <th>
                <img class="img-fluid11" src="images/<?php echo $item_image; ?>" alt="">

              </th>
              <th><?php echo $item_price; ?></th>
              <th>
                <form class="" action="cart.php" method="post">
                  <input type="hidden" name="cart_item_id" value="<?php echo $cart_item_id; ?>">
                  <input type="submit" class="btn btn-danger" name="remove_item_id" value="Remove">
                </form>
              </th>
            </tr>
            <?php
            $count ++;
          } ?>
          <tr>
            <th>
              Total Price
            </th>
            <th>

            </th>
            <th>

            </th>
            <th>
              <?php echo $sum; ?>
            </th>
            <th>
              <form  action="checkout.php" method="POST">
                  <input type="hidden" name= "amount" value="<?php echo $sum; ?>">
                  <input type="submit" class="btn btn-danger" name="checkout_id" value="Buy Now">
              </form>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>


<?php
if (isset($_POST['remove_item_id'])) {
  $item_id = $_POST['cart_item_id'];
  $user_id = $_SESSION['user_id'];
  $user_cart_id = 1234 + $user_id;

  $query="DELETE FROM cart WHERE cart_item_id = $item_id";
  $display_query=mysqli_query($connection,$query);
  header('Location: ./cart.php');
}
 }else{
   header('Location: ./');
 }


?>


