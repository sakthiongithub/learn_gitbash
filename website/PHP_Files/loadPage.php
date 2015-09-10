<?php
include("PHP_Connection.php");

if($_POST)
{
$q=$_POST['searchPck'];
$sql_loc= "select locName from user_destinations where locName like '%$q%'  order by locName LIMIT 5";

$res_loc = mysqli_query($con,$sql_loc);

while($row = mysqli_fetch_array($res_loc))
{
$loc=$row['locName'];
$b_loc=$q;
$final_loc = str_ireplace($q, $b_loc, $loc);

echo '
<div class="showPck" align="left" style="z-index:10000;" onClick="wrt_loc(\''.$final_loc.'\'); hide_block(\'resultPck\');">
<span class="name">
<span style="float:left; font-size:14px;">'.$final_loc.'</span></span>
</div>';
}
}

if(isset($_POST['searchPck_purc']))
{
$q=$_POST['searchPck_purc'];
$sql_loc= "select locName from user_destinations where locName like '%$q%'  order by locName LIMIT 5";

$res_loc = mysqli_query($con,$sql_loc);

while($row = mysqli_fetch_array($res_loc))
{
$loc=$row['locName'];
$b_loc=$q;
$final_loc = str_ireplace($q, $b_loc, $loc);

echo '
<div class="showPck" align="left" style="z-index:10000;" onClick="wrt_loc(\''.$final_loc.'\'); hide_block(\'resultPck_purc\');">
<span class="name">
<span style="float:left; font-size:14px;">'.$final_loc.'</span></span>
</div>';
}
}
?>
