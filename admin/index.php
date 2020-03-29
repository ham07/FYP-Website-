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
 ?>
 <div class="container">
         <h1 style="text-align:center;font-size:130px;margin-top:100px;">Welcome Admin</h2>
         <div class="block">
         </div>
       </div>


 <?php
 include "footer.php";
  ?>
