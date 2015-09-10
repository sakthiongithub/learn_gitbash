<?php
include("PHP_Files/PHP_Connection.php");

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
<div class="showPck" align="left" onClick="wrt_locPck(\''.$final_loc.'\'); hide_block(\'resultPck\');">
<span class="name">
<input type="checkbox" id="'.$final_loc.'" value="'.$final_loc.'" style="zoom:1.3; margin-right:3px; float:left;" />
<span style="float:left;" >'.$final_loc.'</span></span>
</div>
}
}';


?>
