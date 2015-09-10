<?php

global $con;
global $db;

date_default_timezone_set("Asia/Calcutta");
   
$con = mysqli_connect("localhost","root","");
if(!$con)
  die("Error: ". mysqli_error());
$db=mysqli_select_db($con,"i_cms");

$conn = mysqli_connect("localhost","root","");
if(!$conn)
  echo "Error : ".mysqli_error($conn);
else
  $db1 = mysqli_select_db($conn,"travel_port"); 
  
  $cnn = mysqli_connect("localhost","root","");
if($cnn)
  $db = mysqli_select_db($cnn,"registers");
else
  echo "Error :".mysqli_error($cnn); 
  
  
  $dam = mysqli_connect("localhost","root","");
if($dam)
  $db = mysqli_select_db($dam,"dam_db");
else
  echo "Error :".mysqli_error($dam); 
  
?>
