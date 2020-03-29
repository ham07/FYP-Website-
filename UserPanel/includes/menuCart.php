<?php
$tot=0;
if(isset($_COOKIE['item']))
{
foreach ($_COOKIE['item'] as $name1 => $value)
{
  $values11=explode("__",$value);
  $tot=$tot+$values11[4];

}
}
?>
<div  class="container" style="">
  <div  class="shopping-cart" style="margin-top:90px;  display: none;" >
    <div class="shopping-cart-total" style="padding-right:180px;">
      <span class="lighter-text">Total:</span>
      <span class="main-color-text">Rs<?php echo $tot?></span>
        </div>
    <div class="shopping-cart-header"  >
      </div>

<?php
function displayAlert($text, $type) {
echo "<div class=\"alert alert-".$type."\" role=\"alert\">
<p>".$text."</p>
</div>";
}
if(isset($_COOKIE['item']))
{
  foreach ($_COOKIE['item'] as $name1 => $value)
  {
    $values11=explode("__",$value);
?>


      <ul class="shopping-cart-items">
      <li class="clearfix">
        <img src="../shopkeeper/shopkeeper_images/<?php echo $values11[0]; ?>" alt=""height="85" width="90" />
        <span class="item-name"><?php echo $values11[1];?></span>
        <span class="item-price">Rs<?php echo $values11[2];?></span>
        <span class="item-quantity">Quantity:<?php echo $values11[3];?></span>
      </li>

    </ul>



<?php
  }
}
else {
  displayAlert("No Item", "danger");
	echo "<br>";	echo "<br>";	echo "<br>";	echo "<br>";
}

 ?>
 <a href="cart.php" class="button">Cart</a>
</div>
</div>






  					<div class="clear"></div>
