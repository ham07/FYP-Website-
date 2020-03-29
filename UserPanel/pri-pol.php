<!doctype html>
<html lang="en">
    <head>


        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Furnituristic</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
            <link rel="stylesheet" href="css/cartHover.css">
    </head>
    <body>
        <!--================Header Menu Area =================-->
        <header class="header_area">
          <div class="top_menu">
            <div class="container">
              <div class="top_inner">
                <div class="float-left">
                  <ul class="list header_socila">
                    <?php
                    if(isset( $_SESSION['LoginUser'])=="")
                    {

                    }
                    else
                     {
                       ?>
                       <li><a href="my_account.php"><i class="fa fa-user"></i> | Hi <?php echo $_SESSION['LoginUser'];?></a></li>
                      <?php
                    }
                    ?>

                  </ul>
                </div>
                <div class="float-right">
                  <a style="color:white" href="logout.php"><i class="fa fa-sign-out">Logout || </i></a>
                    <a style="color:white" href="loginform/log_in.php"><i class="fa fa-sign-in">Log-in</i></a>
                </div>
              </div>
            </div>
          </div>
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="home.php"><b>Furnituristic</b></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
                	<li class="nav-item active"><a class="nav-link" href="product.php">Products</a></li>
               <li class="nav-item active"><a class="nav-link" href="book_a_carpenter.php">Book a Carpenter</a></li>
               	<li class="nav-item active"><a class="nav-link" href="design.php">Design</a></li>

								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Post ads</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="post_ads.php">Post an ad</a></li>
										<li class="nav-item"><a class="nav-link" href="my_posted_ads.php">My Posted ads</a></li>
			              <li class="nav-item"><a class="nav-link" href="view_posted_ads.php">View Posted ads</a></li>
                  </ul>
								</li>
								<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>


</ul>
</div>
  </div>
</nav>
</div>
</header>


<?php
include "includes/header-footer.php";
 ?>
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Privacy Policy</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================About Area =================-->
        <section class="about_area p_120">
        	<div class="container">
        		<div class="about_inner row">
        			<div class="col-lg-6">
        				<div class="about_left_text">
        					<h6>Brand new Website that will blow your mind</h6>
        					<h3>To Keep You Satisfy <br />is Our main piority</h3>
        					<h5>Privacy Policy</h5>


        				</div>
        			</div>
        			<div class="col-lg-6">
        				<img class="img-fluid" src="img/Expert.jpg" alt="">
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End About Area =================-->


        <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Some Features that Made us Unique</h2>
        			<p></p>
        		</div>
        		<div class="row feature_inner">
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-user"></i>Expert Technicians</h4>
        					<p>We have the best technicians in the city which we have hire we take no risk on customers values.</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-license"></i>Professional Service</h4>
        					<p>Services is the integral part of our corporation we take no chance on our services .</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-phone"></i>Great Support</h4>
        					<p>We our 24/7 at your support you will recieve instance answer from our support .</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-rocket"></i>Technical Skills</h4>
        					<p>Our carpenter are very highly skilled professionals and well maintained .</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-diamond"></i>Highly Recomended</h4>
        					<p>Our services is highly recommended for ou great work.</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-bubble"></i>Positive Reviews</h4>
        					<p>We get highly positive review from top-noch brand and people for stisfaction and great work.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->




    </body>
</html>
<?php
include "includes/footer.php";
 ?>
