<?php
  $msg="";
if(isset($_POST["submit1"]))
{
  $name=$_POST['username'];
  $pass=$_POST['password'];
  $hashed=hash('sha512',$pass);
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['shop_address'];
  $role=$_POST['role_type'];
  $shop_name=$_POST['shop_name'];

  $connection=new mysqli("localhost","root","","fyp_2");
//to check  username  exist or not
  $query1="select username from login where username ='$name'";
  $fire= mysqli_query($connection,$query1);
  if(  mysqli_num_rows($fire)>0)
  {
   $msg="Username  already exist";
  }
else
{
  //to check  password  exist or not
  $query1="select password from login where password ='$hashed'";
  $fire= mysqli_query($connection,$query1);
  if(  mysqli_num_rows($fire)>0)
  {
  $msg=" password already exist";
  }
  else
  {
  if($role=='shopkeeper')
  {
$query="insert into login(username,password,email,phone,shop_address,role_type,shop_name,creation_date)values ('$name','$hashed','$email','$phone','$address','$role','$shop_name',NOW())";
  $n=mysqli_query($connection,$query);
  if($n==1)
  {
    $query1="insert into shops(name,address,type)values('$shop_name','$address','shop')";
      $n1=mysqli_query($connection,$query1);
    if($n1==1)
    {
      ?>
      <script type="text/javascript">
      alert("Your Account Has Been Created Now Please Log in Thank You")
       window.location="log_in.php";
     </script>
      <?php
    }

}
 }
  elseif($role=='user')
  {
  $query="insert into login(username,password,email,phone,shop_address,role_type,shop_name,creation_date)values ('$name','$hashed','$email',0,0,'$role',0,NOW())";
    $n=$connection->query($query);

    ?>

    <script type="text/javascript">
    alert("Your Account Has Been Created Now Please Log in Thank You")
     window.location="log_in.php";
   </script>
    <?php
   }

}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="images/favicon.png" type="image/png">
  <title>Furnituristic</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!--//for ajax-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>


<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action ="" method="post">
					<span class="login100-form-title p-b-43">
						Sign-up to continue
					</span>
<div class="container-fliud" style="padding-bottom: 10px;font-size: 60px;">
  <p style="font-size: 20px;">What You Are?</p>
</div>

<label class="radio-inline">
      <input type="radio" name="role_type" value="user" onclick="show1();" required>User</label>

    <label class="radio-inline">
      <input type="radio" name="role_type" value="shopkeeper" onclick="show2();"required>Shopkeeper </label>



					<div class="wrap-input100 " >
						<input class="input100" type="text" name="username" required pattern="[A-Za-z0-9]{6}" title="please enter valid username [a-z & 6 characters]">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>


					<div class="wrap-input100 " >
						<input class="input100" type="password" name="password" id="password-field" data-toggle="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters">
            <span style=" float: right;  margin-left: -25px;margin-top: -25px;position: relative;z-index:;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          	<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

          <div class="wrap-input100 " >
            <input class="input100" type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid email address">
            <span class="focus-input100"></span>
            <span class="label-input100">email</span>
          </div>


 <div id="div1"  style=" display: none;">
          <div class="wrap-input100 " >
            <input class="input100" type="text" name="phone" id="phone" required pattern="[0-9]{11}" title="please enter valid phone no [0-9 & 11 digits only]" >
            <span class="focus-input100"></span>
            <span class="label-input100">Phone no</span>
          </div>

          <div class="wrap-input100 " >
            <input class="input100" type="text" name="shop_name" id="shop_name" required pattern="[A-Za-z0-9,.\s]{1,30}"title="please enter valid Shop name or enter less than 30 characters and only use , . these special Characters" >
            <span class="focus-input100"></span>
            <span class="label-input100">Shop-name</span>
          </div>

          <div class="wrap-input100 " >
            <input class="input100" type="text" name="shop_address" id="shop_address"  required pattern="[A-Za-z0-9,.\s]{1,200}"title="please enter valid Shop address or enter less than 200 characters  and only use , . these special Characters" >
            <span class="focus-input100"></span>
            <span class="label-input100">Shop-address</span>
          </div>

</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div style="padding-top: 20px;">
							<a href="log_in.php" class="txt1">
								Already have Account?
							</a>
						</div>
					</div>

          <h5 class="text-danger text-center"><?=$msg;?></h5>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit"name="submit1">
							Sign-up
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/home-banner.jpg');">
				</div>
			</div>
		</div>
	</div>



 <script src="js/show-hide.js"></script>
 <!--===============================================================================================-->
 <script src="js/toggle-pass.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
