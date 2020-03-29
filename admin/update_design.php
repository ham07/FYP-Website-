<?php
session_start();
if($_SESSION["admin"]=="")
{
  ?>
  <script type="text/javascript">
  alert("You Cannot open this page without login Thank you")
   window.location="admin_login.php";
 </script>
  <?php

}
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from design where id=$id");
while($row=mysqli_fetch_array($res))
{
  $product_name=$row["name"];
  $product_price=$row["price"];
  $product_desc=$row["description"];
  $product_img1=$row["img1"];
    $product_img2=$row["img2"];
      $product_img3=$row["img3"];

}
?>
<div class="grid_10">
    <div class="box round first">
        <h2>Update Designs</h2>
        <div class="block">

          <form form name="form1 " action ="" method="post" enctype="multipart/form-data">
<div>
  <tr>
    <td colspan="2" align="right">
<img src="design_image/<?php echo $product_img1;?>" height="120" width="120">
<img src="design_image/<?php echo $product_img2;?>" height="120" width="120">
<img src="design_image/<?php echo $product_img3;?>" height="120" width="120">
    </td>
  </tr>
</div>

<div class="form-group">
  <label >Product Name</label>
  <input type="text" class="form-control" name="pname" value="<?php echo $product_name;?>"placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label >Product Price</label>
    <input type="text" class="form-control" name="price" value="<?php echo $product_price;?>" placeholder="Enter Product price">
    </div>


 <div class="form-group">
 <label>Description</label>
 <textarea class="form-control" name="desc" rows="3"><?php echo $product_desc;?></textarea>
</div>
 <div class="form-group">
  <label >Select Image 1</label>
  <input type="file" class="form-control-file" name="image1">
</div>
<div class="form-group">
 <label >Select Image 2</label>
 <input type="file" class="form-control-file" name="image2">
</div>
<div class="form-group">
 <label >Select Image 3</label>
 <input type="file" class="form-control-file" name="image3">
</div>

<button type="submit" name="submit1" class="btn btn-primary">update</button>
</form>

        </div>
            </div>
                </div>

                <!--for update-->
                <?php
                if(isset($_POST["submit1"]))
                {
                  $imgName1=$_FILES["image1"]["name"];
                  $imgName2=$_FILES["image2"]["name"];
                  $imgName3=$_FILES["image3"]["name"];
                  if($imgName1=="" && $imgName2=="" && $imgName3=="")
                  {
                    mysqli_query($link,"update design set name='$_POST[pname]',price='$_POST[price]',description='$_POST[desc]' where id =$id");

                  }
                  elseif($_FILES['image1'] != "" && $_FILES['image2'] != "" && $_FILES['image3'] != "")
                  {
                    $res1 =mysqli_query($link,"select * from design where id =$id");
                     while($row1=mysqli_fetch_assoc($res1))
                     {
                  	unlink("design_image/".$row1['img1']);
                    	unlink("design_image/".$row1['img2']);
                      	unlink("design_image/".$row1['img3']);
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
                  	move_uploaded_file($imgTemp1,"design_image/$rand1$rand2$imgName1");
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
                                  	move_uploaded_file($imgTemp2,"design_image/$rand3$rand4$imgName2");
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
                                                    move_uploaded_file($imgTemp3,"design_image/$rand5$rand6$imgName3");
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


                  mysqli_query($link,"update design set img1='$rand1$rand2$imgName1',img2='$rand3$rand4$imgName2',img3='$rand5$rand6$imgName3', name='$_POST[pname]',price='$_POST[price]',description='$_POST[desc]' where id =$id");
                  ?>
                  <script type="text/javascript">
                  window.location='display_design.php';
                  </script>
                  <?php

                  }
                  ?>
<?php
include "footer.php";

 ?>
