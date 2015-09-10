<?php
include('PHP_Files/PHP_Connection.php');

if($_POST)
{
$q=$_POST['searchLoc'];
$sql_loc= "select distinct(to_loc) as to_loc from distance_matrix where to_loc like '%$q%' order by to_loc LIMIT 5";

$res_loc = mysqli_query($con,$sql_loc);

while($row = mysqli_fetch_array($res_loc))
{
$loc=$row['to_loc'];
$b_loc = $q;
$final_loc = str_ireplace($q, $b_loc, $loc);

?>
<div class="showLoc" align="left">
<span class="name"><?php echo $final_loc; ?></span><br/>
</div>
<?php
}

}
?>
