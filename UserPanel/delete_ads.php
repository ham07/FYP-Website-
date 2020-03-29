<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$id=$_GET["id"];

//for deleting picture from folder
$res=mysqli_query($link,"select * from post_ads where id=$id");
while($row=mysqli_fetch_array($res))
{
$img1=$row["img1"]  ;
$img2=$row["img2"]  ;
$img3=$row["img3"]  ;
$img4=$row["img4"]  ;
}
unlink("ads_Images/".$img1);
unlink("ads_Images/".$img2);
unlink("ads_Images/".$img3);
unlink("ads_Images/".$img4);

mysqli_query($link,"delete from post_ads where id=$id");
?>
<script type="text/javascript">
window.location='my_posted_ads.php';
</script>
