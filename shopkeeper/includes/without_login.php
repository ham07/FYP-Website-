<?php
if(isset($_SESSION['role']))
{
  if($_SESSION['role'] !='shopkeeper')
  {
    ?>
    <script type="text/javascript">
     window.location="../UserPanel/home.php";
   </script>
    <?php
  }
}
else {

    ?>
    <script type="text/javascript">
    alert("You Cannot open this page without login Thank you")
     window.location="../UserPanel/loginform/log_in.php";
   </script>
    <?php
}
?>
