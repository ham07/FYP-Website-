<?php
session_start();
include "includes/header.php";
include "includes/without_login.php";
 ?>
<html>
  <head>
    <style>

      #data ,#allData
    {
    display: none;
     }
    </style>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDclbiFy64ZPir8hk4mnqhp46zkr-NyNrg&callback=initMap">
     </script>
<script type="text/javascript" src="js/googlemap.js"></script>

 </head>
<body>
<div class="container" style="height:650px;padding-bottom:70px;" >
   <h1 class="my-4">Furniture Stores</h1>
      <div id="map" style="width:100%;height:100%;">
      </div>
</div>
</body>
</html>
<?php
require 'education.php';
$edu =new education;;
$coll=$edu->getShopBlankLatLng();

//The json_encode() function is an inbuilt function in PHP which is used to convert PHP array or object into JSON representation. Parameters: $value: It is a mandatory parameter which defines the value to be encoded.
	$coll = json_encode($coll, true);
  echo '<div id="data">' . $coll . '</div>';

//to get all shops
  $allData = $edu->getAllShops();
  $allData = json_encode($allData, true);
  echo '<div id="allData">' . $allData . '</div>';

  include "includes/footer.php"
 ?>
