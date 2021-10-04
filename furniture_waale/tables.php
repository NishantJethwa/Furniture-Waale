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
  <link href="css/sofas.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid mt-2 mb-5">
    <div class="products">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase">Luxury Couch</span>

                </div>
                <div class="row g-3">
                  <?php
                  if (isset($_GET['LR_id'])) {

                    $LR_id = $_GET['LR_id'];
                  $query = "SELECT * FROM lr_essentials INNER JOIN lr_essentials_items ON lr_essentials.LR_id = lr_essentials_items.LR_id WHERE lr_essentials_items.LR_id = $LR_id";
                  $select = mysqli_query($connection, $query);
                  confirmQuery($select);
                  while ($row = mysqli_fetch_assoc($select)) {
                    $LR_id        = $row['LR_id'];
                    $item_name      = $row['item_name'];
                    $item_price      = $row['item_price'];
                    $item_image      = $row['item_image'];
                    $item_guarantee = $row['item_guarantee'];
                    ?>

                    <div class="col-md-4">
                        <div class="card"> <img src="images/<?php echo $item_image; ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold"><?php echo $item_name; ?></span> <span class="font-weight-bold">&#36;<?php echo $item_price; ?></span> </div>
                                <div class="d-flex align-items-center flex-row">  <span class="guarantee"><?php echo $item_guarantee; ?></span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to wishlist</button> <button class="btn btn-dark">Add to cart</button> </div>
                            </div>
                        </div>
                    </div>

                  <?php }} ?>
                    <!-- <div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/FhRHNGE.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wood Sofa set-2</span> <span class="font-weight-bold">$600</span> </div>
                                <div class="d-flex align-items-center flex-row"> <img src="https://i.imgur.com/e9VnSng.png" width="20"> <span class="guarantee">1 Years Guarantee</span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to wishlist</button> <button class="btn btn-dark">Add to cart</button> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/441QtPc.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wood Sofa set-3</span> <span class="font-weight-bold">$850</span> </div>
                                <div class="d-flex align-items-center flex-row"> <img src="https://i.imgur.com/e9VnSng.png" width="20"> <span class="guarantee">3 Years Guarantee</span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to wishlist</button> <button class="btn btn-dark">Add to cart</button> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/hnX99Cr.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wood Sofa set-4</span> <span class="font-weight-bold">$15,50</span> </div>
                                <div class="d-flex align-items-center flex-row"> <img src="https://i.imgur.com/e9VnSng.png" width="20"> <span class="guarantee">4 Years Guarantee</span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to wishlist</button> <button class="btn btn-dark">Add to cart</button> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card"> <img src="https://i.imgur.com/SOMPPzU.jpg" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"> <span class="font-weight-bold">Wood Sofa set-5</span> <span class="font-weight-bold">$550</span> </div>
                                <div class="d-flex align-items-center flex-row"> <img src="https://i.imgur.com/e9VnSng.png" width="20"> <span class="guarantee">2 Years Guarantee</span> </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="text-right buttons"> <button class="btn btn-outline-dark">add to wishlist</button> <button class="btn btn-dark">Add to cart</button> </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
