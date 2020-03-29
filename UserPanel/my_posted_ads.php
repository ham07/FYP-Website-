<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">My Ads</h1>
   <div class="row">
   <?php
   $connection= mysqli_connect("localhost","root","","fyp_2");
   $query="select * from post_ads where user_id='$_SESSION[UserID]'";
   $result=$connection->query($query);
    while($row=mysqli_fetch_array($result))
    {
      ?>
      <div class="col-md-3">
        <a href="#"><img class="img-fluid rounded mb-3 mb-md-0" src="ads_Images/<?php echo $row["img1"];?>" alt="" width="300"height="600">
        </a>
      </div>
      <div class="col-md-3">
        <h3><?php echo $row["name"];?></h3>
        <hr>
                <p><b>Product_name:</b><?php echo $row["pro_name"];?></p>
        <p><b>Price:</b><?php echo $row["price"];?></p>
        <p><b>ContactNo:</b><?php echo $row["contactno"];?></p>
       <div class="" style="overflow-x: auto;" >
         <p ><b>Description:</b><?php echo $row["description"];?></p>
        </div>
        <a class="btn btn-primary"  href="update_ads.php?id=<?php echo $row['id']; ?>">Update</a>
   <a class="btn btn-danger" href="delete_ads.php?id=<?php echo $row['id']; ?>" >Delete</a>
 </div>
<?php
    }

    ?>
 </div>
</div>
 <?php
 include "includes/footer.php";
  ?>
