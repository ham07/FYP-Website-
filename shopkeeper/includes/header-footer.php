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
      <link rel="stylesheet" href="css/font-awesome.min.css">

      <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
      <!-- main css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
  

      <!-- //for ajax-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
if(isset( $_SESSION['shopkeeperUser'])=="")
{

}
else
{
 ?>
 <li><a href="my_account.php"><i class="fa fa-user"></i> | Hi <?php echo $_SESSION['shopkeeperUser'];?></a></li>
<?php
}
?>
                </ul>
              </div>
              <div class="float-right">
                <a style="color:white" href="logout.php"><i class="fa fa-sign-out">Logout || </i></a>
                  <a style="color:white" href="../UserPanel/loginform/log_in.php"><i class="fa fa-sign-in">Log-in</i></a>
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
                <li class="nav-item active"><a class="nav-link" href="add_product.php">Add Product</a></li>
             <li class="nav-item active"><a class="nav-link" href="my_product.php">My Product</a></li>


              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
</ul>
</div>
</div>
</nav>
</div>
</header>
      <!--================Header Menu Area =================-->
