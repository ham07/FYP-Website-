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

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display Designs</h2>
        <div class="block">

          <?php
          $res=mysqli_query($link,"select * from design order by id desc");
          ?>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Product name</th>
                <th scope="col">Product price</th>
                <th scope="col">Description</th>
                <th scope="col">Image 1</th>
                  <th scope="col">Image 2</th>
                    <th scope="col">Image 3</th>
                  <th scope="col">Action</th>
              </tr>
            </thead>

            <?php
            while($row=mysqli_fetch_array($res))
            {
              echo "<tr>
            	<td>". $row['name']."</td>
            	<td>". $row['price']."</td>
            	<td>". $row['description']."</td>";
              	echo "<td><img src='design_image/".$row['img1']."' width='110px' height='110px' /></td>";
                	echo "<td><img src='design_image/".$row['img2']."' width='110px' height='110px' /></td>";
                  	echo "<td><img src='design_image/".$row['img3']."' width='110px' height='110px' /></td>";
                    echo "<td>";?><a href="delete_design.php?id=<?php echo $row['id']; ?>">Delete</a><?php echo"</td>";
                    echo "<td>";?><a href="update_design.php?id=<?php echo $row['id']; ?>">Update</a><?php echo"</td>";
                    echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
          </div>
            </div>
