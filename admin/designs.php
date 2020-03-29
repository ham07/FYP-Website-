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
?>

      <div class="">
          <div class="box round first">
              <h2>
                  Add Designs</h2>
              <div class="block">
<form name="form1 " action ="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label >Product Name</label>
    <input type="text" class="form-control" name="pname" placeholder="Enter Product Name">
  </div>

  <div class="form-group">
    <label >Price</label>
    <input type="text" class="form-control" name="price" placeholder="Enter Product Price">
  </div>

    <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="desc" rows="3"></textarea>
  </div>
  <label >Select Image 1</label>
  <input type="file" class="form-control-file" name="image1">
  <label >Select Image 2</label>
  <input type="file" class="form-control-file" name="image2">
  <label >Select Image 3</label>
  <input type="file" class="form-control-file" name="image3">

</div>
</div>
  <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
</form>
<?php
function displayAlert($text, $type) {
echo "<div class=\"alert alert-".$type."\" role=\"alert\">
<p>".$text."</p>
</div>";
}
if(isset($_POST['submit1']))
{


  $name=$_POST['pname'];
    $price=$_POST['price'];
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

$connection=new mysqli("localhost","root","","fyp_2");
if(!$connection)
{
  echo "connection error". mysqli_connect_errno();
}

$query="insert into design(name,description,price,img1,img2,img3)values ('$name','$description','$price','$rand1$rand2$imgName1','$rand3$rand4$imgName2','$rand5$rand6$imgName3')";
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

</div>
</div>

    <?php
            include "footer.php";
             ?>
