<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";

 ?>

 <?php

if(isset($_POST["submit1"]))
{
  $link=mysqli_connect("localhost","root","");
  mysqli_select_db($link,"fyp_2");
  mysqli_query($link,"insert into checkout_address values('','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[address]','$_POST[city]','$_POST[pincode]','$_POST[contact]',NOW())");


$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
while($row=mysqli_fetch_array($res))
{
  $_SESSION["order_id"]=$row["id"];
}
?>
<script type="text/javascript">
  alert("click ok to transfer your data");

  setTimeout(function(){
    window.location="paypal.php";
  },2000);

</script>
<?php
}
?>

    <h1 class="my-4">Checkout</h1>
    <span style="background-color: #ABB2B9;color:black;font-size:15px;">Please give proper details to easily get items at your address.</span>
    <hr>

<!--form-->
<div class="container align-center ">
    <form name="form1" action="" method="post">

        <div class="row">
          <div class="col-md-6">
        <label ><b>First Name:</b><span style="color:red">*</span></label>
        <input type="text" class="form-control" name="fname" placeholder="first name" required pattern="[A-Za-z]+" title="please enter valid firstname [a-z only]">
         </div>
         <div class="col-md-6">
        <label ><b>last Name:</b><span>*</span style="color:red"></label>
        <input type="text" class="form-control" name="lname" placeholder="last name" required pattern="[A-Za-z]+" title="please enter valid lastname [a-z only]">
</div>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1"><b>Email address:</b><span style="color:red">*</span></label>
      <input type="email" class="form-control" id="exampleInputEmail1"name="email" aria-describedby="emailHelp" placeholder="Enter email" required pattern="[a-zo-9,_%+-]+0[a-z0-9,-]+\.[a-z] (2,3)$"  title="please enter valid email">
    </div>

    <div class="form-group">
    <label><b>Address</b> <span style="color:red">*</span ></label>
    <input type="text" class="form-control" name="address"placeholder="Street Address">
    <input type="text"  class="form-control" placeholder="Apartment. Suite, Unit etc. (optional)">
  </div>

<div class="row">
  <div class="col-md-6">
  <label ><b>City:</b><span style="color:red">*</span ></label>
  <input type="text" class="form-control" name="city" placeholder="City" required pattern="[A-Za-z]+" title="please enter valid city [a-z only]">
  </div>

  <div class="col-md-6">
  <label ><b>Pincode:</b><span style="color:red">*</span></label>
  <input type="text" class="form-control" name="pincode" placeholder="Pincode"  required pattern="[0-6]{6}" title="please enter pincode [6 digits only]">
  </div>
</div>

  <div class="form-group">
<div class="col-md-6">
<label ><b>Contact No:</b><span style="color:red">*</span ></label>
<input type="text" class="form-control" name="contact" placeholder="contact no"  required pattern="[0-9]{11}" title="please enter valid phone no [0-9 & 11 digits only]">
</div>
</div>

<input type="submit" name="submit1" class="btn btn-primary btn-lg active" >
    </form>
  </div>
      <!--form-->


 <?php
 include "includes/footer.php";
  ?>
