<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$id=$_GET["id"];

//for deleting picture from folder
$res=mysqli_query($link,"select * from shopkeeper_add_product where id=$id");
while($row=mysqli_fetch_array($res))
{
$img1=$row["img1"]  ;
$img2=$row["img2"]  ;
$img3=$row["img3"]  ;
}
unlink("shopkeeper_images/".$img1);
unlink("shopkeeper_images/".$img2);
unlink("shopkeeper_images/".$img3);

mysqli_query($link,"delete from shopkeeper_add_product where id=$id");
?>
<script type="text/javascript">
window.location='my_product.php';
</script>
