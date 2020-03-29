<?php
session_start();

$link =mysqli_connect('localhost','root','');
mysqli_select_db ($link,'fyp_2');
$msg="";
if(isset($_POST['submit1']))
{
  $username= $_POST['username'];
	$password= $_POST['password'];
  $password= hash('sha512',$password);
//	$userType= $_POST['role_type'];

$res=mysqli_query($link,"select * from login where username='$username'&& password='$password'");

if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
   {
    if($row["role_type"]=="user")
    {
      $_SESSION['LoginUser']=$row["username"];
      $_SESSION['role'] = $row["role_type"];
        $_SESSION['UserID']=$row["id"];
      header('location: ../home.php');
    }
    else
     {
        $_SESSION['shopkeeperUser']=$row["username"];
          $_SESSION['role'] = $row["role_type"];
            $_SESSION['shopkeeperID']=$row["id"];
            $_SESSION['shopName']=$row["shop_name"];
            header('location: ../../shopkeeper/Shopkeeperhome.php');
      }
    }
  }
 else {
   $msg="Invalid username or password";
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
				<form class="login100-form validate-form" action ="<?=$_SERVER['PHP_SELF']?>" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" required pattern="[A-Za-z0-9]{6}" title="please enter valid username [a-z & 6 characters]">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password-field" data-toggle="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters">
              <span style=" float: right;  margin-left: -25px;margin-top: -25px;position: relative;z-index:;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div style="padding-top: 20px;">
							<a href="sign_up.php" class="txt1">
								Create an Account?
							</a>
						</div>
					</div>

<h5 class="text-danger text-center"><?=$msg;?></h5>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit1">
							Login
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('images/home-banner.jpg');">
				</div>
			</div>
		</div>
	</div>


 <script src="js/toggle-pass.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
