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
 $res=mysqli_query($link,"select * from book_a_carpenter where id=$id");
 while($row=mysqli_fetch_array($res))
 {
   $fname=$row["fname"];
    $lname=$row["lname"];
   $contact=$row["contact"];
   $address=$row["address"];



 }
?>
<div class=""style="padding-top:35px;">
    <div class="box round first">
        <h2>Update Booking</h2>
        <div class="block">
          <form form name="form1 " action ="" method="post" >
<div class="form-group">
  <label >First Name</label>
  <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>"placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>"placeholder="Enter Last Name">
    </div>
  <div class="form-group">
    <label >Contact No</label>
    <input type="text" class="form-control" name="contact" value="<?php echo $contact;?>" placeholder="Enter Contact">
    </div>
    <div class="col-md-6">
   <label ><b>Problem?</b></label>
   <div>
   <select class="form-control" name="pro">
   <option value="Repair Furniture">Repair Furniture</option>
   <option value="Hang Paintings">Hang Paintings</option>
   <option value="Furniture Remodeling">Furniture Remodeling</option>
   <option value="General Carpentry">General Carpentry</option>
   </select>
   </div>
   </div>

   <div class="form-group">
     <label >Address</label>
     <input type="text" class="form-control" name="address" value="<?php echo $address;?>"placeholder="Enter Address">
     </div>


<button type="submit" name="submit1" class="btn btn-primary">update</button>
</form>

        </div>
      </diiv>
    </div>
    <?php
if(isset($_POST['submit1']))
{

    mysqli_query($link,"update book_a_carpenter set fname='$_POST[fname]',lname='$_POST[lname]',contact='$_POST[contact]',problem='$_POST[pro]',address='$_POST[address]' where id =$id");
?>
<script type="text/javascript">
window.location='booking.php';
</script>
<?php

}
     ?>

<?php
 include "footer.php";
?>
