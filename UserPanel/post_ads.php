<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Post an AD</h1>
   <?php

   if(isset($_POST['submit1']))
   {
     $name=$_POST['name'];
     $pname=$_POST['pname'];
     $price=$_POST['price'];
     $contact=$_POST['contact'];
     $con=$_POST['con'];
     $email=$_POST['email'];
     $description=$_POST['desc'];
     $img1=$_FILES['image1'];
     $img2=$_FILES['image2'];
     $img3=$_FILES['image3'];
     $img4=$_FILES['image4'];

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
  move_uploaded_file($imgTemp1,"ads_Images/$rand1$rand2$imgName1");
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
  move_uploaded_file($imgTemp2,"ads_Images/$rand3$rand4$imgName2");
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
  move_uploaded_file($imgTemp3,"ads_Images/$rand5$rand6$imgName3");
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

//for image 4
$imgName4=$_FILES['image4']['name'];

//$imgError=$_FILES['image']['error'];

$imgSize4=$_FILES['image4']['size']."<br/>";
$imgTemp4=$_FILES['image4']['tmp_name'];
$extention4=explode(".",$imgName4);
//it will change the alphabet into a small letters.e.g JPG capital letter into small jpg
$Extention4=strtolower(end($extention));
echo $Extention;
$allowdExt4= array("jpg","jpeg","gif","png");
$rand7=rand(1,2000);
$rand8=rand(2000,3000);
//we will place rand or rand1 before the name of the file so that name must be stored
//with unique name.


if(in_array($Extention4,$allowdExt4))
{

  if($imgSize4<2000000)
  {
  move_uploaded_file($imgTemp4,"ads_Images/$rand7$rand8$imgName4");
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
     $query="insert into post_ads(user_id,name,pro_name,price,contactno,conditionn,email,description,img1,img2,img3,img4,date)values ('$_SESSION[UserID]','$name','$pname','$price','$contact','$con','$email','$description','$rand1$rand2$imgName1','$rand3$rand4$imgName2','$rand5$rand6$imgName3','$rand7$rand8$imgName4',NOW())";
     $n=$connection->query($query);
     if($n==1)
     {
     displayAlert("Product is inserted", "info");
     }


     else{
       echo "not inserted". "<br/>";

     }
   }
    ?>
       <form name="form1 " action ="" method="post" enctype="multipart/form-data">
     <div class="form-row">
     <div class="form-group col-md-6">
       <label ><b>Name</b></label>
       <input type="text" class="form-control" name="name"  placeholder="Enter your name" required pattern="[A-Za-z\s]{2,}" title="please enter valid name [a-z ]">
     </div>
     <div class="form-group col-md-6">
       <label ><b>Product Name</b></label>
       <input type="text" class="form-control"  name="pname"  placeholder="Enter your product name" required pattern="[A-Za-z\s]{2,}" title="please enter product name [a-z ]">
     </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6" >
       <label> <b>Price</b></label>
        <input type="text" class="form-control" name="price"  placeholder="Enter price" required pattern="[0-9]{2,}" title="please enter valid price [0-9 ]">
      </div>
      <div class="form-group col-md-6">
        <label><b>Contact No</b></label>
        <input type="text" class="form-control" name="contact"  placeholder="Enter contact no" required pattern="[0-9]{11}" title="please enter valid contact no [0-9 & 11 digits only]">
            <small id="emailHelp" class="form-text text-muted">We'll never misuse your phone no .</small>
      </div>
    </div>
    <label><b>Condition</b></label>
    <div class="form-check">
          <input type="radio" name="con" value="old"  required checked>Old</label>
   </div>
         <div class="form-check">
          <input type="radio" name="con" value="new" >New </label>
   </div>

     <div class="form-group">
       <label ><b>Email address</b></label>
       <input type="email" class="form-control" name="email" placeholder="Enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid email address">
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>

     <div class="form-group">
         <label ><b>Description</b></label>
         <textarea class="form-control" name="desc"  rows="3" required pattern="[A-Za-z\s]{300}" title="please enter valid description [a-z ]"></textarea>
       </div>

       <label ><b>You can upload upto 4 images</b></label>
          <small id="emailHelp" class="form-text text-muted">First Image will be your cover image</small>
    <div class="form-row">
   <div class="form-group">
       <label >1st image</label>
       <input type="file" class="form-control-file" name="image1"  >
     </div>
     <div class="form-group">
   <label  >2nd image</label>
   <input type="file" class="form-control-file" name="image2"  >
 </div>
</div>

<div class="form-row">
 <div class="form-group">
   <label >3rd image</label>
   <input type="file" class="form-control-file" name="image3" >
 </div>
 <div class="form-group">
   <label >4th image</label>
   <input type="file" class="form-control-file" name="image4"  >
 </div>
</div>

  <button type="submit" name="submit1" class="btn btn-primary">Post</button>
</form>
 </div>



 <?php
 include "includes/footer.php";
  ?>
