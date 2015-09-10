<?php
include('PHP_Files/PHP_Connection.php');

if($_POST)
{
$q=$_POST['search'];
$sql_loc= "select distinct(loc_name) as loc_name from cityscape_content_publish where loc_name like '%$q%'  order by loc_name LIMIT 5";

$res_loc = mysqli_query($con,$sql_loc);

while($row = mysqli_fetch_array($res_loc))
{
$loc=$row['loc_name'];
$b_loc=$q;
$final_loc = str_ireplace($q, $b_loc, $loc);
echo '
<div class="show" align="left"  onClick="wrt_loc(\''.$final_loc.'\'); hide_block(\'result\');">
<span class="name">'.$final_loc.'</span>
</div>';
}

$sql_attr= "select attr_name, loc_name from cityscape_content_publish where attr_name like '%$q%' order by attr_name LIMIT 5";

$res_attr = mysqli_query($con,$sql_attr);

while($row = mysqli_fetch_array($res_attr))
{
$attr=$row['attr_name']." IN ".$row['loc_name'];
$b_attr=$q;
$final_attr = str_ireplace($q, $b_attr, $attr);
echo '
<div class="show" align="left" onClick="wrt_loc(\''.$final_attr.'\'); hide_block(\'result\');">
<span class="name">'.$final_attr.'</span><br/>
</div>';
}

$sql_cate= "select distinct(cate_id) as cate_id, loc_name from cityscape_content_publish where cate_id like '%$q%' order by cate_id LIMIT 5";

$res_cate = mysqli_query($con,$sql_cate);

while($row = mysqli_fetch_array($res_cate))
{
$cate=$row['cate_id']." IN ".$row['loc_name'];
$b_cate=$q;
$final_cate = str_ireplace($q, $b_cate, $cate);

echo'
<div class="show" align="left" onClick="wrt_loc(\''.$final_cate.'\'); hide_block(\'result\');">
<span class="name">'.$final_cate.'</span><br/>
</div>';

}
}

if(isset($_GET['curCty']))
{
$q = $_GET['curCty'];
$q_loc = "select distinct(locName) as locName from user_destinations where locName like '%$q%' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left; font-size:14px; font-family:Calibri;"  align="left" onClick="putValue(this.innerHTML,\'txtcCity\'); hide_block(\'result_pl\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

if(isset($_GET['multCty']))
{
$q = $_GET['multCty'];
$q_loc = "select distinct(locName) as locName from user_destinations where type='DOMESTIC' and locName like '%$q%' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div style="width:100%; height:auto; float:left; border:1px dotted #333; cursor:pointer; text-align:left; font-size:14px; font-family:Calibri;"  align="left" onClick="putValue(this.innerHTML); hide_block(\'result_pl\');  onMouseOver="chngBck(this.id);"><span style="float:left;" ><input type="checkbox" id="chkMulCty_'.$row["locName"].'" value="'.$row["locName"].'" onClick="chkLoc_val(this.id,this.value); count_locs();" /></span><span style="width:auto; float:left;" onClick="chkLoc_val_div(\'chkMulCty_'.$row["locName"].'\',\''.$row["locName"].'\');">'.$row["locName"].'</span></div>';
  }
  echo '<div style="width:100%; float:left;"><img src="Images/drp_Up.png" width="20px" height="15px" onClick="hide_block(\'result_mult\');"/></div>';  
} 
}

if(isset($_GET['snglCty']))
{
$q = $_GET['snglCty'];
$q_loc = "select distinct(locName) as locName from user_destinations where type='DOMESTIC' and locName like '%$q%' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left; font-size:14px; font-family:Calibri;"  align="left" onClick="putValue(this.innerHTML,\'drpPrefCity_Single\'); hide_block(\'result_sngl\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

if(isset($_GET['cntry_cont']))
{
$q_cntry ="select distinct(country) as country from cntry_continent where continent='".$_GET['cntry_cont']."'";
$res_cntry = mysqli_query($con,$q_cntry);
if($res_cntry)
{
echo '<select id="drpCntry_conti" onchange="LdStates(this.value);" style="width:150px;">';
echo '<option value=""></option>';
  while($row = mysqli_fetch_array($res_cntry))
  {
    echo '<option value="'.$row["country"].'">'.$row["country"].'</option>';
  }  
 echo '</select>'; 
}
}

if(isset($_GET['states_intl']))
{
$q_loc ="select distinct(locname) as locname from dam_locs where country='".$_GET['states_intl']."'";
$res_loc = mysqli_query($dam,$q_loc);
if($res_loc)
{
echo '<div id="drpLoc_conti" style="width:200px; height:100px; overflow-y:scroll; overflow-x:hidden; border:1px solid #444;">';
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div style="width:100%; float:left;"><span style="float:left;"><input type="checkbox" value="'.$row["locname"].'" onclick="wrt_dest(this.value);" /></span>
	<span style="float:left; margin-left:2px; font-size:14px; font-family:Calibri;">'.$row["locname"].'<span></div>';
  }  
 echo '</div>';
}
}

if(isset($_GET['cntry_cont_pck']))
{
$q_cntry ="select distinct(country) from cntry_continent where continent='".$_GET['cntry_cont_pck']."'";
$res_cntry = mysqli_query($con,$q_cntry);
if($res_cntry)
{
echo '<select id="drpCntry_conti" name="drpCntry_conti" class="font_medium" style="width:260px; height:auto;" onClick="LdabrLoc(this.value)">';
echo '<option value="0">Select</option>';
  while($row = mysqli_fetch_array($res_cntry))
  {
    echo '<option value="'.$row["country"].'">'.$row["country"].'</option>';
  }  
 echo '</select>'; 
}
}

if(isset($_GET['cntry_cont_pck1']))
{
$q_cntry ="select distinct(country) from cntry_continent where continent='".$_GET['cntry_cont_pck1']."'";
$res_cntry = mysqli_query($con,$q_cntry);
if($res_cntry)
{
echo '<select id="drpCntry_conti1" name="drpCntry_conti1" class="font_medium" style="width:260px; height:auto;" onClick="LdabrLoc1(this.value)">';
echo '<option value="0">Select</option>';
  while($row = mysqli_fetch_array($res_cntry))
  {
    echo '<option value="'.$row["country"].'">'.$row["country"].'</option>';
  }  
 echo '</select>'; 
}
}

if(isset($_GET['c_loc']))
{
$q_cntry ="select distinct(loc_name) as loc_name from cntry_continent where Country='".$_GET['c_loc']."'";
$res_cntry = mysqli_query($con,$q_cntry);
if($res_cntry)
{
echo '<select id="drploc_conti" name="drploc_conti" class="font_medium" style="width:260px; height:auto;">';
echo '<option value="0">Select</option>';
  while($row = mysqli_fetch_array($res_cntry))
  {
    echo '<option value="'.$row["loc_name"].'">'.$row["loc_name"].'</option>';
  }  
 echo '</select>'; 
}
}

if(isset($_GET['c_loc1']))
{
$q_cntry ="select distinct(loc_name) as loc_name from cntry_continent where Country='".$_GET['c_loc1']."'";
$res_cntry = mysqli_query($con,$q_cntry);
if($res_cntry)
{
echo '<select id="drploc_conti1" name="drploc_conti1" class="font_medium" style="width:260px; height:auto;">';
echo '<option value="0">Select</option>';
  while($row = mysqli_fetch_array($res_cntry))
  {
    echo '<option value="'.$row["loc_name"].'">'.$row["loc_name"].'</option>';
  }  
 echo '</select>'; 
}
}

if(isset($_GET['snglCty_pck']))
{
$q = $_GET['snglCty_pck'];
$q_loc = "select distinct(locName) as locName from user_destinations where locName like '%$q%' and type='DOMESTIC' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div class="font_medium" style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left;"  align="left" onClick="putValue(this.innerHTML,\'txtDomesLoc_pck\'); hide_block(\'div_pck_loc\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

if(isset($_GET['snglCty_pck']))
{
$q = $_GET['snglCty_pck'];
$q_loc = "select distinct(locName) as locName from user_destinations where locName like '%$q%' and type='DOMESTIC' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div class="font_medium" style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left;"  align="left" onClick="putValue(this.innerHTML,\'txtDomesLoc_pck\'); hide_block(\'div_pck_loc1\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

if(isset($_GET['snglCty_inter']))
{
$q = $_GET['snglCty_inter'];
$q_loc = "select distinct(locName) as locName from user_destinations where locName like '%$q%' and type='INTERNATIONAL' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div class="font_medium" style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left;"  align="left" onClick="putValue(this.innerHTML,\'txtInterLoc_pck\'); hide_block(\'div_pck_loc_abr\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

if(isset($_GET['snglCty_inter1']))
{
$q = $_GET['snglCty_inter1'];
$q_loc = "select distinct(locName) as locName from user_destinations where locName like '%$q%' and type='INTERNATIONAL' order by locName LIMIT 15";
$res_loc = mysqli_query($con,$q_loc);
if($res_loc)
{
  while($row = mysqli_fetch_array($res_loc))
  {
    echo '<div class="font_medium" style="width:100%; height:auto; border:1px dotted #333; cursor:pointer; text-align:left;"  align="left" onClick="putValue(this.innerHTML,\'txtInterLoc1_pck\'); hide_block(\'div_pck_loc_abr1\');" onMouseOver="chngBck(this.id);">'.$row["locName"].'</div>';
  }  
} 
}

?>
