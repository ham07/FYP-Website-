<?php
session_start();
$link =mysqli_connect('localhost','root','');
mysqli_select_db ($link,'fyp_2');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form"name="form1" action ="" method="post">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="username" required>

					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="password" name="pass" placeholder="Password" required>

					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" input type="submit" name="submit">
							Sign in
						</button>
					</div>

					</div>
				</form>
			</div>
		</div>
	</div>


	<?php
if(isset($_POST["submit"]))
{

$res=mysqli_query($link,"select * from admin_login where username='$_POST[username]'&& password='$_POST[pass]'");
while($row=mysqli_fetch_array($res))
{
  $_SESSION["admin"]=$row["username"];

	?>
	<script type="text/javascript">
	window.location="index.php";
	</script>
	<?php
}
}

	 ?>



</body>
</html>
