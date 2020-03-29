<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Designs
   </h1>
<div class="row">


   <?php
   $connection= mysqli_connect("localhost","root","","fyp_2");
   $record_per_page=9;
   $page='';
   if(isset($_GET["page"]))
   {
     $page=$_GET["page"];

   }
   else {
     $page=1;
   }
   $start_from = ($page-1)*$record_per_page;


   $query="select * from design order by id desc LIMIT $start_from,$record_per_page";
   $result=$connection->query($query);
   while($row=mysqli_fetch_array($result))
   {
     ?>

       <div class="col-md-4" style="padding-top:40px;">
         <a href="#"><img class="img-fluid rounded mb-3 mb-md-0" src="../admin/design_image/<?php echo $row['img1'];?>"  alt=""style="width:350px;height:180px;"></a>
</div>


       <div class="col-md-2" style="padding-top:40px;">
         <h3><?php echo $row["name"];?></h3>
         <hr>
         <p><b>Price:</b><?php echo $row["price"];?></p>
         <p><?php echo $row["description"];?></p>
         <a class="btn btn-primary" href="design2.php?id=<?php echo $row["id"];?>" >View more Images</a>
       </div>


     <?php
   }
    ?>

 </div>


    <!--pagination-->
      <div align="center" style="margin-top:40px;">
        <?php
        $page_query="select * from design order by id desc";
        $page_result= mysqli_query($connection,$page_query);
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil ($total_records/$record_per_page);
        for($i=1;$i<=$total_pages;$i++)
        {
          echo '<a href="design.php?page='.$i.'">'.$i.'</a>';
          ?>

          <?php
        }
         ?>

                <!-- Pagination -->
        </div>
 </div>


 <?php
 include "includes/footer.php"
  ?>
