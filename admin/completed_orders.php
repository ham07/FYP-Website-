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
?>
<div class=""style="padding-top:35px;">
    <div class="box round first">
        <h2> Display Completed Orders</h2>
        <div class="block">

<?php

$res=mysqli_query($link,"select * from confirm_order_address where status='complete' order by id desc");
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Order_id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">E-Mail</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">pincode</th>
      <th scope="col">Contact-No</th>
     <th scope="col">Date</th>
     <th scope="col">Payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php
while($row=mysqli_fetch_array($res))
{
  echo "<tr>
	<td>". $row['id']."</td>
	<td>". $row['firstName']."</td>
	<td>". $row['lastname']."</td>
	<td>". $row['email']."</td>
	<td>". $row['address']."</td>
	<td>". $row['city']."</td>
  <td>". $row['pincode']."</td>
  <td>". $row['contactno']."</td>
    <td>". $row['date']."</td>
      <td>".'Done' ."</td>";

    echo "<td>";?><a  class="btn btn-primary"href="display_order_1.php?id=<?php echo $row ['id'];?>">View Order</a><?php echo"</td>";

  	echo "</tr>";
}
echo "</table>";
 ?>
        </div>
      </div>

<?php
include "footer.php";
?>
