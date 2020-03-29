<?php
session_start();
include "includes/header3.php"
include "includes/without_login.php";
 ?>

 <div class="container">

   <!-- Page Heading -->
   <h1 class="my-4">My Account</h1>
<?php
$msg="";
if(isset($_POST['submit1']))
{
  $name=$_POST['name'];
  $pass=$_POST['pass'];
  $hashed=hash('sha512',$pass);
  $pass1=$_POST['pass1'];
  $hashed1=hash('sha512',$pass1);

    $connection=new mysqli("localhost","root","","fyp_2");

    //to check  username  exist or not
    $query2="select username from login where username ='$name'";
    $fire= mysqli_query($connection,$query2);
    if(  mysqli_num_rows($fire)>0)
    {
     $msg="Username  already exist";
    }
  else
  {
    //to check  password  exist or not
    $query3="select password from login where password ='$hashed1'";
    $fire= mysqli_query($connection,$query3);
    if(  mysqli_num_rows($fire)>0)
    {
    $msg=" password already exist";
    }
    else
    {

    $query="select * from login where id='$_SESSION[UserID]'";
    $result=$connection->query($query);
     while($row=mysqli_fetch_array($result))
     {
       if($hashed == $row['password'])
      {
        $query1="update login set username='$name',password='$hashed1' where id=$_SESSION[UserID]";
        $go=$connection->query($query1);
        if($go==1)
        {
          ?>
          <script type="text/javascript">
           alert("Your Account Has Been updated Now Please Log in Thank You")
           window.location="logout.php";
          </script>
          <?php
        }
          else
          {
        	      $msg=" not updated";
          }
      }
      else
        {
          $msg ="password is incorrect";
        }
     }

}
}
}
 ?>

	<form  action ="" method="post">
    <div class="col-md-6">
  <label ><b>Password</b></label>
  <input type="password" class="form-control" name="pass" placeholder="oldPassword"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters">
   </div>
   <div class="col-md-6">
 <label ><b>New Password</b></label>
 <input type="password" class="form-control" name="pass1" placeholder="new password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters">
  </div>
  <div class="col-md-6">
<label ><b>New Username</b></label>
<input type="text" class="form-control" name="name" placeholder="new password"  required pattern="[A-Za-z0-9]{6}" title="please enter valid username [a-z & 6 characters]">
 </div>


<h5 class="text-danger text-left"><?=$msg;?></h5>
 <button class="btn btn-primary btn-lg "style="margin-top:20px;" type="submit"name="submit1">
   Update
 </button>
  <input style="margin-top:20px;" type="button"class="btn btn-primary btn-lg " onclick="window.location.href = 'home.php';" value="Back"/>

</form>

 </div>
<?php
include "includes/footer.php"
 ?>
