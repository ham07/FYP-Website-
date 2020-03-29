<?php
if(isset($_SESSION['role']))
{
  if($_SESSION['role'] !='user')
  {
    ?>
    <script type="text/javascript">
     window.location="../shopkeeper/Shopkeeperhome.php";
   </script>
    <?php
  }
}
else {
    ?>
    <script type="text/javascript">
    alert("You Cannot open this page without login Thank you")
     window.location="loginform/log_in.php";
   </script>
    <?php
}

 ?>
