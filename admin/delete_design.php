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

//for deleting picture from folder
$res=mysqli_query($link,"select * from design where id=$id");
while($row=mysqli_fetch_array($res))
{
$img1=$row["img1"]  ;
$img2=$row["img2"]  ;
$img3=$row["img3"]  ;
}
unlink("design_image/".$img1);
unlink("design_image/".$img2);
unlink("design_image/".$img3);

mysqli_query($link,"delete from design where id=$id");
?>
<script type="text/javascript">
window.location='display_design.php';
</script>
