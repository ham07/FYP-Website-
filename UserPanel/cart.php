<?php
session_start();
if (isset($_COOKIE['item']))  //this is for chec cookies are available or nor
{
    foreach ($_COOKIE['item'] as $name1 => $value)
    {

        if (isset($_POST["delete$name1"]))
        {
          $cookie_name ="delete$name1";
        unset($_COOKIE[$cookie_name]);
          setcookie("item[$name1]", "", time() -1800);
          ?>
          <script type="text/javascript">
              window.location.href = window.location.href;
          </script>
          <?php

        }
      }
    }
    include "includes/header.php";
    include "includes/without_login.php";
 ?>
 <div class="container">
    <!-- Page Heading -->
    <h1 class="my-4">Shopping Cart</h1>


    <div class= "row">
   <div class="col-md-8">

<?php
$d=0;
if(isset($_COOKIE['item']))
{
	$d=$d+1;
}
if($d==0)
{
	displayAlert("No Item", "danger");
	echo "<br>";	echo "<br>";	echo "<br>";	echo "<br>";
}
else {
	?>
	<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th>Image</th>
          	<th>Action</th>
				</tr>
			</thead>
	<tbody class="check-body">

		<?php
		foreach ($_COOKIE['item'] as $name1 => $value)
		{
			$values11=explode("__",$value);
			?>
			<tr>

	 		 <td><h6><?php echo $values11[1];?></h6></td>

	 		 <td>Rs:<?php echo $values11[2];?></td>
	 		 <td> <?php echo $values11[3];?> </td>
	 		 <td>Rs:<?php echo $values11[4];?></td>


	 		 <td><a href="#"><img src="../shopkeeper/shopkeeper_images/<?php echo $values11[0]; ?>" alt="" height="100" width="100"></a></td>
	<form  action ="<?=$_SERVER['PHP_SELF']?>" method="post">
      <td> <input  type="submit" name= <?php echo "delete$name1";?> value ="delete" ></td>
</form>
     </tr>
	</tbody>
			<?php
		}
		 ?>
	<?php
}
	 ?>
  </table>

<!--for Total-->
  <?php
  $tot=0;
  $SH=500;
  if(isset($_COOKIE['item']))
  {
  foreach ($_COOKIE['item'] as $name1 => $value)
  {
    $values11=explode("__",$value);
    $tot=$tot+$values11[4];

  }
}
    $_SESSION["pay"]=$tot;
   ?>
 </div>
   <div class="col-md-4">
     <table class="table">
     <thead class="thead-dark">
      <tr>
        <th scope="col">Cart Total</th>
      </tr>
     </thead>
    <tbody>
      <tr>
            <td>Cart Subtotal:<span><b>Rs:<?php echo $tot;?></b></span></td>
      </tr>
      <tr>
          <td>Shipping and Handling:<span><b>RS:500</b></span></td>
      </tr>
      <tr>
        <td><strong>Order Total:<span><b>Rs:<?php echo $tot+$SH;?></b></span></td></strong></td>
      </tr>
    </tbody>
  </table>
       </div>
</div>

<div class="coupon">
  <a href="product.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Update Cart</a>
<?php
  if(isset($_COOKIE['item'])!="")
  {
    ?>
     <a href="checkout.php" class="btn btn-secondary btn-lg active" role="button" value="checkout"aria-pressed="true">Proceed To Checkout</a>
    <?php
  }
  else {

  }
?>

</div>
 </div>
 <?php
 include "includes/footer.php";
  ?>
