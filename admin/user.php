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
        <h2> Users/Shopkeeper</h2>
        <div class="block">

          <?php

          $res=mysqli_query($link,"select * from login ");
          ?>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Username</th>
          
                <th scope="col">Email</th>
                <th scope="col">Contact No</th>
                <th scope="col">Shop Name</th>
                <th scope="col">Shop Address</th>
                <th scope="col">Role_type</th>
                <th scope="col">Creation Date</th>

              </tr>
            </thead>
            <?php
            while($row=mysqli_fetch_array($res))
            {
              echo "<tr>
            	<td>". $row['username']."</td>

            	<td>". $row['email']."</td>
            	<td>". $row['phone']."</td>
            	<td>". $row['shop_name']."</td>
            	<td>". $row['shop_address']."</td>
              <td>". $row['role_type']."</td>
              <td>". $row['creation_date']."</td>";


              	echo "</tr>";
            }
            echo "</table>";
             ?>

        </div>
      </div>
    </div>
<?php
include "footer.php";
 ?>
