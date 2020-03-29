<?php
session_start();
include "includes/header.php";
include "includes/without_login.php"
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Ad Product</h1>


 <?php
 function displayAlert($text, $type) {
 echo "<div class=\"alert alert-".$type."\" role=\"alert\">
 <p>".$text."</p>
 </div>";
 }
 if(isset($_POST['submit1']))
 {
   $name=$_POST['name'];
   $price=$_POST['price'];
   $qty=$_POST['qty'];
   $description=$_POST['desc'];
   $img1=$_FILES['image1'];
   $img2=$_FILES['image2'];
   $img3=$_FILES['image3'];

   //for image 1
   $imgName1=$_FILES['image1']['name'];

   //$imgError=$_FILES['image']['error'];

   $imgSize1=$_FILES['image1']['size']."<br/>";
   $imgTemp1=$_FILES['image1']['tmp_name'];
   $extention=explode(".",$imgName1);
   //it will change the alphabet into a small letters.e.g JPG capital letter into small jpg
   $Extention=strtolower(end($extention));
   echo $Extention;
   $allowdExt= array("jpg","jpeg","gif","png");
   $rand1=rand(1,2000);
   $rand2=rand(2000,3000);
   //we will place rand or rand1 before the name of the file so that name must be stored
   //with unique name.


   if(in_array($Extention,$allowdExt))
   {

     if($imgSize1<2000000)
     {
     move_uploaded_file($imgTemp1,"shopkeeper_Images/$rand1$rand2$imgName1");
     echo "image uploaded in the folder";
     }

     else
       {
     echo "<b>image size is too large</b><br/>";
       }

   }

   else
   {
     echo "extention is not allowed";
   }

   //for image 2
   $imgName2=$_FILES['image2']['name'];

   //$imgError=$_FILES['image']['error'];

   $imgSize2=$_FILES['image2']['size']."<br/>";
   $imgTemp2=$_FILES['image2']['tmp_name'];
   $extention2=explode(".",$imgName2);
   //it will change the alphabet into a small letters.e.g JPG capital letter into small jpg
   $Extention2=strtolower(end($extention));
   echo $Extention;
   $allowdExt2= array("jpg","jpeg","gif","png");
   $rand3=rand(1,2000);
   $rand4=rand(2000,3000);
   //we will place rand or rand1 before the name of the file so that name must be stored
   //with unique name.


   if(in_array($Extention2,$allowdExt2))
   {

     if($imgSize2<2000000)
     {
     move_uploaded_file($imgTemp2,"shopkeeper_Images/$rand3$rand4$imgName2");
     echo "image uploaded in the folder";
     }

     else
       {
     echo "<b>image size is too large</b><br/>";
       }

   }

   else
   {
     echo "extention is not allowed";
   }


   //for image 3
   $imgName3=$_FILES['image3']['name'];

   //$imgError=$_FILES['image']['error'];

   $imgSize3=$_FILES['image3']['size']."<br/>";
   $imgTemp3=$_FILES['image3']['tmp_name'];
   $extention3=explode(".",$imgName3);
   //it will change the alphabet into a small letters.e.g JPG capital letter into small jpg
   $Extention3=strtolower(end($extention));
   echo $Extention;
   $allowdExt3= array("jpg","jpeg","gif","png");
   $rand5=rand(1,2000);
   $rand6=rand(2000,3000);
   //we will place rand or rand1 before the name of the file so that name must be stored
   //with unique name.


   if(in_array($Extention3,$allowdExt3))
   {

     if($imgSize3<2000000)
     {
     move_uploaded_file($imgTemp3,"shopkeeper_Images/$rand5$rand6$imgName3");
     echo "image uploaded in the folder";
     }

     else
       {
     echo "<b>image size is too large</b><br/>";
       }

   }

   else
   {
     echo "extention is not allowed";
   }

   $connection=new mysqli("localhost","root","","fyp_2");
   if(!$connection)
   {
     echo "connection error". mysqli_connect_errno();
   }

   $query1="select * from login where id='$_SESSION[shopkeeperID]'";
   $n1=$connection->query($query1);
   while($row=mysqli_fetch_array($n1))
   {
       $shop_name=$row["shop_name"];
       $shop_address=$row["shop_address"];

   $query="insert into shopkeeper_add_product(user_id,product_name,price,qty,shop_name,shop_address,description,date,img1,img2,img3)values ('$_SESSION[shopkeeperID]','$name','$price','$qty','$shop_name','$shop_address','$description',NOW(),'$rand1$rand2$imgName1','$rand3$rand4$imgName2','$rand5$rand6$imgName3')";
   $n=$connection->query($query);
   if($n==1)
   {
   displayAlert("Product is inserted", "info");

   }


   else{
     echo "not inserted". "<br/>";

   }
 }
 }
  ?>
  <form name="form1 " action ="" method="post" enctype="multipart/form-data">
    <div class="form-row">
    <div class="form-group col-md-6">
      <label ><b>Product Name</b></label>
      <input type="text" class="form-control"  name="name" placeholder="Enter your Product name" required pattern="[A-Za-z\s]{2,}" title="please enter valid product name [a-z ]">
    </div>
    <div class="form-group col-md-6">
      <label ><b>Price</b></label>
      <input type="text" class="form-control"  name="price"  placeholder="Enter your product Price" required pattern="[0-9]{2,}" title="please enter product price [0-9 ]">
    </div>
  </div>

<div class="form-row">
  <div class="form-group col-md-6" >
   <label> <b>Quantity</b></label>
    <input type="text" class="form-control"  name="qty" placeholder="Enter Quantity" required pattern="[0-9]{1,}" title="please enter valid Quantity [0-9 ]">
  </div>

</div>



 <div class="form-group">
     <label ><b>Description</b></label>
     <textarea class="form-control"  name="desc" id="exampleFormControlTextarea1" rows="3" required pattern="[A-Za-z\s]{300}" title="please enter valid description [a-z ]"></textarea>
   </div>

         <label ><b>You can upload upto 3 images</b></label>
          <small  class="form-text text-muted">First Image will be your cover image</small>
    <div class="form-row">
   <div class="form-group">
       <label for="exampleFormControlFile1">Example file input</label>
       <input type="file" class="form-control-file"  name="image1" id="exampleFormControlFile1" required>
     </div>
     <div class="form-group">
   <label for="exampleFormControlFile1"   required>Example file input</label>
   <input type="file" class="form-control-file"name="image2" id="exampleFormControlFile1">
 </div>
</div>

<div class="form-row">
 <div class="form-group">
   <label for="exampleFormControlFile1">Example file input</label>
   <input type="file" class="form-control-file" name="image3"id="exampleFormControlFile1">
 </div>
</div>

 <button type="submit" name ="submit1"class="btn btn-primary">Upload</button>
</form>
</div>
 <?php
 include "includes/footer.php";
  ?>
