<?php

$id=$_GET["id"];
$conn=new mysqli("localhost","root","","fyp_2");
if(!$conn)
{
	echo "connection error". mysqli_connect_error();
}
$query="delete from confirm_order_address where id='$id'";
$n=$conn->query($query);
if($n==1)
{
  $query1="delete from checkout_address where id='$id'";
  $n1=$conn->query($query1);
}
if($n1==1)
{
  $query2="delete from confirm_order_product where order_id='$id'";
  $n2=$conn->query($query2);
}

 ?>
 <script type="text/javascript">
 window.location='display_order.php';
 </script>
