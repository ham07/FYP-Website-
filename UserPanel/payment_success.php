<?php
session_start();
if($_SESSION["paypalphp"]=="")
{
  ?>
  <script type="text/javascript">
  window.location="product.php";
  </script>
  <?php
}

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"fyp_2");
$order_id=$_GET["id"];

//this is for getting record from temp table to permanent table
$res=mysqli_query($link,"select * from checkout_address where id=$order_id");
while($row=mysqli_fetch_array($res))
{

    $fname=$row["firstname"];
    $lname=$row["lastname"];
    $email=$row["email"];
    $address=$row["address"];
    $city=$row["city"];
    $pincode=$row["pincode"];
    $contactno=$row["contactno"];

  $connection=new mysqli("localhost","root","","fyp_2");
  $query="insert into confirm_order_address(user_id,firstname,lastname,email,address,city,pincode,contactno,status,date)values ('$_SESSION[UserID]','$fname','$lname','$email','$address','$city','$pincode','$contactno','incomplete',NOW())";
  $n=$connection->query($query);


}

//now need to get permanent table order id

$res=mysqli_query($link,"select id from confirm_order_address order by id desc limit 1");
while($row=mysqli_fetch_array($res))
{
    $id=$row["id"];


}

foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
{
    $values11 = explode("__", $value);

    mysqli_query($link,"insert into confirm_order_product values('','$values11[5]','$values11[6]','$values11[7]','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]')");
}


echo "your order get successfully, we deliver product soon";

$_SESSION["pay"]="";
$_SESSION["paypalphp"]="";

//deleting cookies after confirming order
if(isset($_COOKIE['item']))
{
foreach ($_COOKIE['item'] as $name1 => $value)
{
  $cookie_name ="item[$name1]";
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, '', time() - 3600);
}
}



?>

<script type="text/javascript">

    setTimeout(function(){
        window.location="product.php";

    },2000);

</script>
