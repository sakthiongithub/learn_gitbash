<?php


include("PHP_Connection.php");

if(isset($_GET["cntryS"]))
{
$cntry = $_GET["cntryS"];
  
 echo '<select name="drpLoc_Name" id="drpLoc_Name" style="width:100%; font-size:14px;" onchange="sel_one_Loc(this.value); createSingl_Dur(this.value);">';  
echo '<option selected="selected">SELECT LOCATION</option>';
    $q_loc = "select locName from user_destinations_1 where country='".$cntry."'";
$res_loc = mysqli_query($con,$q_loc);
   
     if($res_loc)
	 {
	 while($r = mysqli_fetch_array($res_loc))
	 {
	   echo '<option value="'.$r["locName"].'">'.$r["locName"].'</option>';
	 }
echo '</select>';
}
} 

if(isset($_GET["cntryM"]))
{

$cntry = $_GET["cntryM"];
  
 echo '<div style="width:100%; float:left;  height:80px; background:#fff; border:1px solid #ddd; overflow-y:scroll; ">';  
$q_loc = "select locName from user_destinations_1 where country='".$cntry."'";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
while($row = mysqli_fetch_array($res_loc))
{
  echo '<div style="width:100%; float:left;">
  <span style="float:left;"><input type="checkbox" id="'.$row["locName"].'" name="'.$row["locName"].'" value="'.$row["locName"].'" onclick="chk_dom_loc(this.id); createDur(this.id,\''.$row["locName"].'\');" /></span>
  <span style="float:left; font-size:12px; font-family:Calibri; color:#555; cursor:pointer;" onclick="selLocDomes(\''.$row["locName"].'\');createDur(\''.$row["locName"].'\',\''.$row["locName"].'\');">'.$row["locName"].'</span></div>';
}
echo '</div>';
}
}
?>
