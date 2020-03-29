<?php
require 'education.php';
$edu =new education;

//get setter function of id lat lng
//$_REQUEST is a super global variable which is widely used to collect data after submitting html forms
$edu->setId($_REQUEST['id']);
$edu->setLat($_REQUEST['lat']);
$edu->setLng($_REQUEST['lng']);
$status=$edu->updateShopsWithLatLng();

if($status == true)
{
  echo "Updated..";
}
else {
  echo "Failed";
}
 ?>
