<?php
  include 'includes/db.php';
  include 'includes/functions.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <link href="css/livingRoom.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  body {
    background-image: url('images/bg1.png');
  }

  </style>
        <meta charset="utf-8" />
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
        
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/search2.css" rel="stylesheet" />

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php
        include './includes/navigation2.php';
         ?>
        <!-- Services-->
        <div class="container bootstrap snipets">
            <br>
            <br>
            <br>

           <h6 class="text-center" style="font-size: 1.75rem">Living Room Essentials</h6>
           <div class="row flow-offset-1">

             <?php
             $query = "SELECT * FROM lr_essentials";
             $select = mysqli_query($connection, $query);
             confirmQuery($select);
             while ($row = mysqli_fetch_assoc($select)) {
               $LR_id    = $row['LR_id'];
               $LR_name  = $row['LR_name'];
               $LR_image = $row['LR_image'];
               $LR_link  = $row['LR_link'];
             ?>

             <div class="col-xs-6 col-md-4">
               <div class="product tumbnail thumbnail-3">
                 <a href="<?php echo $LR_link; ?>.php?LR_id=<?php echo $LR_id; ?>"><img src="images/<?php echo $LR_image; ?>" alt=""></a>
                 <div class="caption">
                   <h4><a href="<?php echo $LR_link; ?>.php?LR_id=<?php echo $LR_id; ?>"><?php echo $LR_name; ?></a></h4><span class="price">
                 </div>
               </div>
             </div>




           <?php } ?>

           </div>
         </div>
        <!-- Portfolio-->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h3 class="mt-0">Let's Get In Touch!</h2>
                        <h4 class="divider my-4" />
                        <p class="text-muted mb-5">Ready to decorate your place? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-1x mb-1 text-muted"></i>
                        <h5>+91 9657412547</h5>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-1x mb-1 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <h5 class="d-block" href="mailto:contact@yourwebsite.com">contact@furniturewale.com</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Furniture Wale</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>