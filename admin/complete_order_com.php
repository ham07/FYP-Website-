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
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$connection=new mysqli("localhost","root","","fyp_2");
if(!$connection)
{
  echo "connection error". mysqli_connect_errno();
}
$id=$_GET["id"];
$res=mysqli_query($link,"select * from confirm_order_address where id=$id");
  mysqli_query($link,"update confirm_order_address set status='complete',completedDate=Now() where id =$id");

  //for payment table
  $query="insert into payment(order_id,status)values ('$id','done')";
  $n=$connection->query($query);
  if($n==1)
  {
    header("location:display_order.php");
  }

 ?>
