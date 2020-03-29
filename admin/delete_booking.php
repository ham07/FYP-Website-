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

mysqli_query($link,"delete from book_a_carpenter where id=$id");
?>
<script type="text/javascript">
window.location='booking.php';
</script>
