<?php
session_start();
include "includes/header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from post_ads where id=$id");
while($row=mysqli_fetch_array($res))
{
    $name=$row["name"];
  $product_name=$row["pro_name"];
  $price=$row["price"];
  $contact=$row["contactno"];
  $email=$row["email"];
  $description=$row["description"];
  $img1=$row["img1"];
  $img2=$row["img2"];
  $img3=$row["img3"];
  $img4=$row["img4"];

}
?>

 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Update Product</h1>

             <form form name="form1 " action ="" method="post" enctype="multipart/form-data">
               <div >
                 <tr>
                   <td colspan="12" align="left">
               <img src="ads_Images/<?php echo $img1;?>" height="120" width="120">
               <img src="ads_Images/<?php echo $img2;?>" height="120" width="120">
               <img src="ads_Images/<?php echo $img3;?>" height="120" width="120">
               <img src="ads_Images/<?php echo $img4;?>" height="120" width="120">
                   </td>
                 </tr>
               </div>

               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label ><b> Name</b></label>
                   <input type="text" class="form-control"  name="name" value="<?php echo $name;?>" placeholder="Enter  name" required pattern="[A-Za-z\s]{2,}" title="please enter valid name [a-z ]">
                 </div>
               <div class="form-group col-md-6">
                 <label ><b>Product Name</b></label>
                 <input type="text" class="form-control"  name="pname" value="<?php echo $product_name;?>" placeholder="Enter your Product name" required pattern="[A-Za-z\s]{2,}" title="please enter valid product name [a-z ]">
               </div>
           </div>

             <div class="form-row">
             <div class="form-group col-md-6" >
              <label> <b>Contact No</b></label>
               <input type="text" class="form-control"  name="contact" placeholder="Enter contact no" value="<?php echo $contact;?>" required pattern="[0-9]{11}" title="please enter valid contact no [0-9 & 11 digits only]">
             </div>
             <div class="form-group col-md-6">
               <label ><b>Price</b></label>
               <input type="text" class="form-control"  name="price"  value="<?php echo $price;?>" placeholder="Enter your product Price" required pattern="[0-9]{2,}" title="please enter product price [0-9 ]">
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
             <input type="email" class="form-control" name="email"  value="<?php echo $email;?>" placeholder="Enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid email address">
             <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
           </div>
            <div class="form-group">
                <label ><b>Description</b></label>
                <textarea class="form-control"  name="desc"   rows="3" required pattern="[A-Za-z\s]{300}" title="please enter valid description [a-z ]"><?php echo $description;?></textarea>
              </div>


                    <label ><b>You can upload upto 4 images</b></label>
                     <small  class="form-text text-muted">First Image will be your cover image</small>
               <div class="form-row">
              <div class="form-group">
                  <label for="exampleFormControlFile1">Image 1</label>
                  <input type="file" class="form-control-file"  name="image1" required>
                </div>
                <div class="form-group">
              <label for="exampleFormControlFile1"   required>Image 2</label>
              <input type="file" class="form-control-file"name="image2" >
            </div>
           </div>

           <div class="form-row">
            <div class="form-group">
              <label for="exampleFormControlFile1">Image 3</label>
              <input type="file" class="form-control-file" name="image3">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Image 4</label>
              <input type="file" class="form-control-file" name="image4">
            </div>
           </div>

            <button type="submit" name ="submit1"class="btn btn-primary">Update</button>
             </form>
 </div>
 <?php
 if(isset($_POST["submit1"]))
 {
   $imgName1=$_FILES["image1"]["name"];
   $imgName2=$_FILES["image2"]["name"];
   $imgName3=$_FILES["image3"]["name"];
      $imgName4=$_FILES["image4"]["name"];
   if($imgName1=="" && $imgName2=="" && $imgName3=="" && $imgName4=="")
   {
     mysqli_query($link,"update post_ads set name='$_POST[name]',pro_name='$_POST[pname]',price='$_POST[price]',contactno='$_POST[contact]',conditionn='$_POST[con]',email='$_POST[email]',description='$_POST[desc]' where id =$id");

   }
   elseif($_FILES['image1'] != "" && $_FILES['image2'] != "" && $_FILES['image3'] != "" && $_FILES['image4'] != "")
   {
     $res1 =mysqli_query($link,"select * from post_ads where id =$id");
      while($row1=mysqli_fetch_assoc($res1))
      {
     unlink("ads_Images/".$row1['img1']);
       unlink("ads_Images/".$row1['img2']);
         unlink("ads_Images/".$row1['img3']);
          unlink("ads_Images/".$row1['img4']);
   }
//for image 1
   $imgName1=$_FILES['image1']['name'];
   $imgSize1=$_FILES['image1']['size']."<br/>";
   $imgTemp1=$_FILES['image1']['tmp_name'];

   $extention1=explode(".",$imgName1);
   $Extention=strtolower(end($extention1));
   echo $Extention;
   $allowdExt= array("jpg","jpeg","gif","png");
   $rand1=rand(1,2000);
   $rand2=rand(2000,3000);
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
                   $imgSize2=$_FILES['image2']['size']."<br/>";
                   $imgTemp2=$_FILES['image2']['tmp_name'];

                   $extention2=explode(".",$imgName2);
                   $Extention=strtolower(end($extention2));
                   echo $Extention;
                   $allowdExt= array("jpg","jpeg","gif","png");
                   $rand3=rand(1,2000);
                   $rand4=rand(2000,3000);
                   if(in_array($Extention,$allowdExt))
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
                                   $imgSize3=$_FILES['image3']['size']."<br/>";
                                   $imgTemp3=$_FILES['image3']['tmp_name'];

                                   $extention3=explode(".",$imgName3);
                                   $Extention=strtolower(end($extention3));
                                   echo $Extention;
                                   $allowdExt= array("jpg","jpeg","gif","png");
                                   $rand5=rand(1,2000);
                                   $rand6=rand(2000,3000);
                                   if(in_array($Extention,$allowdExt))
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
                                                     $imgSize4=$_FILES['image4']['size']."<br/>";
                                                     $imgTemp4=$_FILES['image4']['tmp_name'];

                                                     $extention4=explode(".",$imgName4);
                                                     $Extention=strtolower(end($extention4));
                                                     echo $Extention;
                                                     $allowdExt= array("jpg","jpeg","gif","png");
                                                     $rand7=rand(1,2000);
                                                     $rand8=rand(2000,3000);
                                                     if(in_array($Extention,$allowdExt))
                                                     {

                                                       if($imgSize3<2000000)
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
                                 }


   mysqli_query($link,"update post_ads set img1='$rand1$rand2$imgName1',img2='$rand3$rand4$imgName2',img3='$rand5$rand6$imgName3',img4='$rand7$rand8$imgName4', name='$_POST[name]',pro_name='$_POST[pname]',price='$_POST[price]',contactno='$_POST[contact]',conditionn='$_POST[con]',email='$_POST[email]',description='$_POST[desc]' where id =$id");

   ?>
   <script type="text/javascript">
   window.location='my_posted_ads.php';
   </script>
   <?php

}
include "includes/footer.php";
 ?>
