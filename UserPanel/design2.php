<?php
include "includes/header.php";
include "includes/without_login.php";
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
 ?>
<div class="container">
 <h1 class="my-4">Designs</h1>

 <?php
 $res=mysqli_query($link,"select * from design where id=$id");
 while($row=mysqli_fetch_array($res))
 {
 ?>
 <div class="row">

   <div class="col-md-6" style="padding-top:40px;">
     <a href="#">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
       <img  id="expandedImg"class="img-fluid rounded mb-3 mb-md-0" src="../admin/design_image/<?php echo $row["img1"];?>"  alt=""style="width:500px;height:350px;"></a>
  </div>


   <div class="col-md-4" style="padding-top:40px;">
     <h3><?php echo $row["name"];?></h3>
     <hr>
     <p><b>Price:</b><?php echo $row["price"];?></p>
     <p><?php echo $row["description"];?></p>


     <!--tabs images-->
     <div class="row" style="margin-top:20px;">
       <div class="column">
         <img src="../admin/design_image/<?php echo $row["img1"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
       </div>
       <div class="column"style="padding-left:20px;">
         <img src="../admin/design_image/<?php echo $row["img2"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
       </div>
       <div class="column"style="padding-left:20px;">
         <img src="../admin/design_image/<?php echo $row["img3"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
       </div>

     </div>


   </div>



 </div>
 <?php
}
  ?>

</div>

<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

 <?php
 include "includes/footer.php";

  ?>
