
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Furniture Wale</a>
        <div class="search-box">
            
            <form action="search.php" method="post">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                <button class="search_button" type="submit" name="search_btn">
                <i class="fa fa-search"></i>
                </button>
                </div>
                </div>
            </form>
        </div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                <?php
                  if (!isset($_SESSION['user_id'])) {
                ?>

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                <?php
                  }else {
                ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="cart.php">Cart
                    <sup>
                      <?php echo lenCart($_SESSION['user_id']); ?>
                    </sup></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="includes/logout.php">Logout</a></li>
                <?php
                  }
                ?>
            </ul>
        </div>
    </div>
</nav>
