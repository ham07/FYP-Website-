<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
 ?>
 <!-- Page Content -->
     <div class="container">
       <!-- Page Heading -->
       <h1 class="my-4">Posted Ad</h1>
       <?php
       $res=mysqli_query($link,"select * from post_ads where id=$id");
       while($row=mysqli_fetch_array($res))
       {
       ?>
       <form name="form1" action="" method="post">
       <div class="row">
         <div class="col-md-5">
           <a href="#">

             <img  id="expandedImg"class="img-fluid rounded mb-3 mb-md-0" src="ads_Images/<?php echo $row["img1"];?>"  alt=""style="width:300px;height:450px;"></a>
        </div>

         <div class="col-md-6">
           <h3><?php echo $row["pro_name"];?></h3>
                 <hr>
                 <p><b>Owner Name:Rs &nbsp</b><?php echo $row["name"];?></p>
           <p><b>Price:Rs &nbsp</b><?php echo $row["price"];?></p>
           <p><b>Contact No: &nbsp</b><?php echo $row["contactno"];?></p>
           <p><b>Condition: &nbsp</b><?php echo $row["conditionn"];?></p>
           <p><b>Email: &nbsp</b><?php echo $row["email"];?></p>

           <p><?php echo $row["description"];?></p>

           <!--cousel images-->
           <div class="row" style="margin-top:20px;">
             <div class="column">
               <img src="ads_Images/<?php echo $row["img1"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
             </div>
             <div class="column"style="padding-left:20px;">
               <img src="ads_Images/<?php echo $row["img2"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
             </div>
             <div class="column"style="padding-left:20px;">
               <img src="ads_Images/<?php echo $row["img3"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
             </div>
             <div class="column"style="padding-left:20px;">
               <img src="ads_Images/<?php echo $row["img4"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
             </div>
           </div>


         </div>
       </div>
     </form>
     <hr>
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
     <!--================Feature Area =================-->
     <section class="feature_area p_120">
       <div class="container">
         <div class="main_title">
           <h2>Some Features that Made us Unique</h2>
           <p></p>
         </div>
         <div class="row feature_inner">
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-user"></i>Expert Technicians</h4>
               <p>We have the best technicians in the city which we have hire we take no risk on customers values.</p>
             </div>
           </div>
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-license"></i>Professional Service</h4>
               <p>Services is the integral part of our corporation we take no chance on our services .</p>
             </div>
           </div>
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-phone"></i>Great Support</h4>
               <p>We our 24/7 at your support you will recieve instance answer from our support .</p>
             </div>
           </div>
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-rocket"></i>Technical Skills</h4>
               <p>Our carpenter are very highly skilled professionals and well maintained .</p>
             </div>
           </div>
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-diamond"></i>Highly Recomended</h4>
               <p>Our services is highly recommended for ou great work.</p>
             </div>
           </div>
           <div class="col-lg-4 col-md-6">
             <div class="feature_item">
               <h4><i class="lnr lnr-bubble"></i>Positive Reviews</h4>
               <p>We get highly positive review from top-noch brand and people for stisfaction and great work.</p>
             </div>
           </div>
         </div>
       </div>
     </section>
     <!--================End Feature Area =================-->s
 <?php
include "includes/footer.php";
  ?>
