<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
 <!-- Page Content -->
 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">Book a Carpenter</h1>
   <small>We only operate in lahore.</small>
      <small>We will charge 200/- for visiting</small>
<?php
if(isset($_POST['submit1']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $contact=$_POST['contact'];
  $pro=$_POST['pro'];
  $address=$_POST['address'];

  $connection=new mysqli("localhost","root","","fyp_2");
  if(!$connection)
  {
    echo "connection error". mysqli_connect_errno();
  }
  $query="insert into book_a_carpenter(user_id,fname,lname,contact,problem,address,status,date)values ('$_SESSION[UserID]','$fname','$lname','$contact','$pro','$address','incomplete',NOW())";
  $n=$connection->query($query);
  if($n==1)
  {
  displayAlert("Your booking has been register there will be a call on your contact no shortly", "info");
  }


  else{
    echo "not inserted". "<br/>";

  }
}
 ?>

   <form name="form1" action="" method="post">

     <div class="row">
       <div class="col-md-6">
     <label ><b>First Name:</b></label>
     <input type="text" class="form-control" name="fname" placeholder="first name" required pattern="[A-Za-z]+" title="please enter valid firstname [a-z only]">
      </div>
      <div class="col-md-6">
     <label ><b>last Name:</b></label>
     <input type="text" class="form-control" name="lname" placeholder="last name" required pattern="[A-Za-z]+" title="please enter valid lastname [a-z only]">
</div>
   </div>
   <div class="row">
     <div class="col-md-6">
   <label ><b>Contact No:</b></label>
   <input type="text" class="form-control" name="contact" placeholder="contact No" required pattern="[0-9]{11}" title="please enter valid phone no [0-9 & 11 digits only]">
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
</div>

<div >
<label ><b>Address:</b></label>
<input type="text" class="form-control" name="address" placeholder="Address"  required pattern="[A-Za-z0-9,.\s]{1,200}"title="please enter valid Shop address or enter less than 200 characters  and only use , . these special Characters">
</div>

<input type="submit" name="submit1" value="Book" class="btn btn-primary btn-lg active" style="margin-top:20px; ">
</form>
 </div>
 <?php
 include "includes/footer.php";
  ?>
