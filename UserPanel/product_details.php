<?php
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");


//cookies
if(isset($_POST["submit1"]))
{
  $qtyy=$_POST["qty"];
  $d=0;
  if(isset($_COOKIE['item']))
  {
    foreach ($_COOKIE['item'] as $name => $value) {
      $d=$d+1;
    }
    $d=$d+1;
  }
  else {
    $d=$d+1;
  }
  $res3=mysqli_query($link,"select * from shopkeeper_add_product where id=$id");
  while($row3=mysqli_fetch_array($res3))
  {
    $id=$row3["id"];
    $img1=$row3["img1"];
    $nm=$row3["product_name"];
    $prize=$row3["price"];
    $shop_name=$row3["shop_name"];
    $shop_address=$row3["shop_address"];

    $qty=$qtyy;
    $total=$prize*$qty;


  }
  if(isset($_COOKIE['item']))
  {
    foreach ($_COOKIE['item'] as $name1 => $value)
    {
      $values11=explode("__",$value);
      $found=0;
      if($img1==$values11[0])
      {
        $found=$found+1;
        $qty=$values11[3]+1;

        $tb_qty;
        $res=mysqli_query($link,"select * from shopkeeper_add_product where img1='$img1'");
        while($row=mysqli_fetch_array($res))
        {
          $tb_qty=$row["qty"];
        }
        if($tb_qty <$qty)
        {

    ?>
    <script type="text/javascript">
     alert("this much qty not avalible")
    </script>
    <?php
        }
        else {
        $total=$values11[2]*$qty;
              setcookie("item[$name1]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id."__".$shop_name."__".$shop_address,time()+1800);

}
header('location:product.php');
      }

    }

    if($found==0)
    {
            $tb_qty;
            $res=mysqli_query($link,"select * from shopkeeper_add_product where img1='$img1'");
            while($row=mysqli_fetch_array($res))
            {
              $tb_qty=$row["qty"];
            }
            if($tb_qty <$qty)
            {

        ?>
        <script type="text/javascript">
         alert("this much qty not avalible")
        </script>
        <?php
            }
            else {

          setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id."__".$shop_name."__".$shop_address,time()+1800);

        }
        header('location:product.php');
    }


  }
  else {

            $tb_qty;
            $res=mysqli_query($link,"select * from shopkeeper_add_product where img1='$img1'");
            while($row=mysqli_fetch_array($res))
            {
              $tb_qty=$row["qty"];
            }
            if($tb_qty <$qty)
            {

        ?>
        <script type="text/javascript">
         alert("this much qty not avalible")
        </script>
        <?php
            }
            else {
      setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id."__".$shop_name."__".$shop_address,time()+1800);

    }
  }

}



 ?>


<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
?>
<!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <h1 class="my-4">Products</h1>
      <?php
      $res=mysqli_query($link,"select * from shopkeeper_add_product where id=$id");
      while($row=mysqli_fetch_array($res))
      {
      ?>
      <!-- Project One -->
      <form name="form1" action="" method="post">
      <div class="row">
        <div class="col-md-5">
          <a href="#">
             <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
            <img  id="expandedImg"class="img-fluid rounded mb-3 mb-md-0" src="../shopkeeper/shopkeeper_images/<?php echo $row["img1"];?>"  alt=""style="width:300px;height:450px;"></a>
       </div>

        <div class="col-md-5">
          <h3><?php echo $row["product_name"];?></h3>
                <hr>
          <p><b>Price:Rs &nbsp</b><?php echo $row["price"];?></p>
          <p><b>Avalibility: &nbsp</b><?php echo $row["qty"];?></p>
          <p><b>Shop Name: &nbsp</b><?php echo $row["shop_name"];?></p>
          <p><b>Shop Address: &nbsp</b><?php echo $row["shop_address"];?></p>
          <input class= "col-sm-2" name="qty" value="1" type="text" class="form-control" placeholder="1" ></input>
          <hr>
          <p><?php echo $row["description"];?></p>

          <!--cousel images-->
          <div class="row" style="margin-top:20px;">
            <div class="column">
              <img src="../shopkeeper/shopkeeper_images/<?php echo $row["img1"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
            </div>
            <div class="column"style="padding-left:20px;">
              <img src="../shopkeeper/shopkeeper_images/<?php echo $row["img2"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
            </div>
            <div class="column"style="padding-left:20px;">
              <img src="../shopkeeper/shopkeeper_images/<?php echo $row["img3"];?>" alt="Nature" style="width:100px" onclick="myFunction(this);">
            </div>
          </div>

      		<button  style="margin-top:20px;"class="btn btn-primary" type="submit" name="submit1" value="add to cart" >Add to Cart</button>
        </div>
      </div>
    </form>
      <!-- /.row -->

      <hr>
      <?php
     }
     ?>
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
     <!--================End Feature Area =================-->
</div>


<?php
include "includes/footer.php";
?>
