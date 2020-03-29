<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Posted Ads</h1>
<div class="row">
  <?php
  $connection= mysqli_connect("localhost","root","","fyp_2");
  $record_per_page=6;
  $page='';
  if(isset($_GET["page"]))
  {
    $page=$_GET["page"];

  }
  else {
    $page=1;
  }
  $start_from = ($page-1)*$record_per_page;
  $query="select * from post_ads order by id desc LIMIT $start_from,$record_per_page";
  $result=$connection->query($query);
   while($row=mysqli_fetch_array($result))
   {
?>
<!-- Project One -->
  <div class="col-md-2">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="ads_Images/<?php echo $row["img1"];?>" alt="" width="300"height="400">
    </a>
  </div>
  <div class="col-md-2">
                <h3><?php echo $row["pro_name"];?></h3>
                <hr>
                <p><b>Price:</b><?php echo $row["price"];?></p>
                <p><b>Condition:</b><?php echo $row["conditionn"];?></p>
                <p><b>Email:</b><?php echo $row["email"];?></p>
                <p><?php echo $row["description"];?></p>
    <a class="btn btn-primary" href="view_posted_ads1.php?id=<?php echo $row["id"];?>" >Description & Information</a>
      <hr>
  </div>
  <?php
   }
   ?>
</div>
  <hr>
  <div align="center">
<!--pagination-->
<?php
$page_query="select * from post_ads order by id desc";
$page_result= mysqli_query($connection,$page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil ($total_records/$record_per_page);
if($page>1)
{
echo '<a href="product.php?page='.($page-1).'" class=" btn btn-primary"><<</a>';
}

for($i=1;$i<=$total_pages;$i++)
{
echo '<a href="product.php?page='.$i.'" class=" btn btn-primary">'.$i.'</a>';
}

if($i>$page)
{
echo '<a href="product.php?page='.($page+1).'" class=" btn btn-primary">>></a>';
}
?>

    <!-- Pagination -->
</div>



</div>
 <?php
 include "includes/footer.php";
  ?>
