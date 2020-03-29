<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">My Products</h1>
<div class="row">
<?php
  $connection= mysqli_connect("localhost","root","","fyp_2");
  $query="select * from shopkeeper_add_product where user_id='$_SESSION[shopkeeperID]'";
  $result=$connection->query($query);
   while($row=mysqli_fetch_array($result))
   {
     ?>

       <div class="col-md-2">
         <a href="#"><img class="img-fluid rounded mb-2 mb-md-0" src="shopkeeper_images/<?php echo $row["img1"];?>" alt="" width="300"height="50">
         </a>
       </div>
       <div class="col-md-2">
         <h3><?php echo $row["product_name"];?></h3>
         <hr>
         <p><b>Price:</b><?php echo $row["price"];?></p>
         <p><b>Quantity</b><?php echo $row["qty"];?></p>
        <div class="" style="overflow-x: auto;" >
          <p ><b>Description:</b><?php echo $row["description"];?></p>
         </div>
         <a class="btn btn-primary"  href="update_product.php?id=<?php echo $row['id']; ?>">Update</a>
    <a class="btn btn-danger" href="delete_product.php?id=<?php echo $row['id']; ?>" >Delete</a>
  </div>

     <?php
   }
 ?>
  </div>
</div>
 <?php
 include "includes/footer.php";
  ?>
