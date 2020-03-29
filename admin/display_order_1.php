<?php
session_start();
if($_SESSION["admin"]=="")
{
  ?>
  <script type="text/javascript">
  alert("You Cannot open this page without login Thank you")
   window.location="admin_login.php";
 </script>
  <?php

}
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
?>
<div class="" style="padding-top:35px">
    <div class="box round first">
        <h2> Orders items</h2>
        <div class="block">


          <?php
$id=$_GET["id"];
$res=mysqli_query($link,"select * from confirm_order_product where order_id=$id");
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Shop Address</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
        <th scope="col">Image</th>
    </tr>
  </thead>
<?php
$totalPrice = 0;
while($row=mysqli_fetch_array($res))
{
  echo "<tr>
  <td>". $row['product_id']."</td>
	<td>". $row['product_name']."</td>
  <td>". $row['shop_name']."</td>
  <td>". $row['shop_address']."</td>
	<td>". $row['product_price']."</td>
	<td>". $row['product_qty']."</td>
	<td>". $row['product_total']."</td>";
	echo "<td><img src='../shopkeeper/shopkeeper_images/".$row['product_img']."' width='110px' height='110px' /></td>";
  $price = $row['product_total'];
       $totalPrice += $price;
}
echo "</table>";
 ?>
 <hr>
 <h3>Total:<?php echo $totalPrice+500;?></h3>
</div>
</div>
<?php
include "footer.php";
?>
