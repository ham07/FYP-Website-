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
$id=$_GET["id"];
$res=mysqli_query($link,"select * from book_a_carpenter where id=$id");
  mysqli_query($link,"update book_a_carpenter set status='complete',completedDate=Now() where id =$id");
  header("location:booking.php");
 ?>
