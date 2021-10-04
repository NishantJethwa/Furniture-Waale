<?php
  include 'db.php';
  include 'functions.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="../css/feedback.css">
  </head>
  <body>
    <h2 style="text-align: center;">See what our customers have to say about us</h2>
<div class="items">

    <?php
                $query = "SELECT feedback FROM user_feedback";
                  $select = mysqli_query($connection, $query);
                  confirmQuery($select);
                  while ($row = mysqli_fetch_assoc($select)) {
                    $feed= $row['feedback'];
    ?>

    <div class="card">
        <div class="media media-2x1 gd-primary"></div>
        <div class="card-body">
            <p class="card-text"><?php echo $feed; ?></p>
        </div>
    </div>


<?php
}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){

$('.items').slick({
dots: true,
infinite: true,
speed: 800,
autoplay: true,
autoplaySpeed: 2000,
slidesToShow: 4,
slidesToScroll: 4,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
slidesToScroll: 3,
infinite: true,
dots: true
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
}

]
});
});
</script>
  </body>
</html>
