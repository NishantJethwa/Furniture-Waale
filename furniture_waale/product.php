<?php
include 'includes/db.php';
include 'includes/functions.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
 
  <link href="css/search2.css" rel="stylesheet"/>
   <link href="css/product.css" rel="stylesheet"/>


</head>
 <body id="page-top">
        <!-- Navigation-->
        <?php
        include './includes/navigation2.php';
         ?>
  <div class="container11">

    <div class="row text-center py-5">
      <?php

      if(ISSET($_POST['details'])){
        $item_id=$_POST['pcode'];

        $query="SELECT * FROM lr_essentials_items where item_id='$item_id' ";
        $display_query=mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($display_query)){
          $item_id = $row['item_id'];
          $item_desc = $row['item_desc'];
          $item_name = $row['item_name'];
          $item_guarantee = $row['item_guarantee'];
          $item_price = $row['item_price'];
          $item_image = $row['item_image'];

          ?>
          <div class="container">
          <div class="row justify-content-center">
          <div class="col-sm-4">

                <div class="card shadow">
                  <div>
                    <img src="images/<?php echo $item_image; ?>" class="card-img-top">
                  </div>

                </div>
                </div>
                <div class="col-sm-4">

                <div class="card shadow">
                  <div class="card-body">
                    <h2 class="card-title"><?php echo $item_name; ?></h2>
                    <h2>
                      <span class="price"><i class="fas fa-rupee-sign"></i><?php echo $item_price; ?></span>
                    </h2>
                    <br>
                    <h5><?php echo $item_desc; ?></h5>
                    <br>
                    <h6><?php echo $item_guarantee; ?></h6>
                    <br>
                    <?php if (isset($_SESSION['user_id'])): ?>
                      <form method="POST" action="product.php">
                        <button type="submit" value="<?php echo $item_id; ?>" name="add_to_cart"> Add to Cart </button>
                      </form>
                    <?php else : ?>
                      <a href="login.php"><button type="submit"  name="add_to_cart"> Add to Cart </button></a>
                  
                    <?php endif; ?>
                  </div>
                </div>
                </div>
              </div>
         <?php } ?>


      </div>

    </div>
    <?php } ?>

</body>
</html>

<?php if (isset($_POST['add_to_cart'])) {
  $item_id = $_POST['add_to_cart'];
  $user_id = $_SESSION['user_id'];
  $user_cart_id = $user_id + 1234;
  $query="INSERT INTO cart(user_cart_id, user_id, item_id) VALUES($user_cart_id, $user_id, $item_id)";
  $insert_query = mysqli_query($connection,$query);
  header("Location: ./cart.php");

}
?>
