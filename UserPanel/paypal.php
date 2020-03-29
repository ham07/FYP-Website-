<?php
session_start();
if($_SESSION["pay"]=="")
{
  ?>
<script type="text/javascript">
window.location="product.php";
</script>

  <?php
}
$_SESSION["paypalphp"]="yes";
?>
<?php
$pay=$_SESSION["pay"];
$order_id=$_SESSION["order_id"];
 ?>
  <a class="btn btn-primary" href="payment_success.php?id=<?php echo $order_id;?>">OK</a>
