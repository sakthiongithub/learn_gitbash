<?php

include("PHP_Connection.php");

$loc = array();

if(isset($_GET['dur']) && isset($_GET['loc']) && isset($_GET['type']) && isset($_GET['vac']) && isset($_GET['trvler']))
{
if($_GET['type'] == "INTERNATIONAL")
  $loc = explode(", ",$_GET['loc']); 
else
  $loc[0] = $_GET['loc'];
  
if($_GET['dur']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'  and locations like '%".$loc[0]."%'  and duration ='".$_GET['dur']."'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['trvler']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'    and locations like '%".$loc[0]."%'  and travellers like '%".$_GET['trvler']."%'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['vac']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'  and locations like '%".$loc[0]."%'  and trip_theme like '%".$_GET['vac']."%'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['vac']!="0" && $_GET['dur']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'  and locations like '%".$loc[0]."%'  and trip_theme like '%".$_GET['vac']."%' and duration='".$_GET['dur']."'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['vac']!="0" && $_GET['trvler']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'  and locations like '%".$loc[0]."%'  and trip_theme like '%".$_GET['vac']."%' and travellers like '%".$_GET['trvler']."%'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['trvler']!="0" && $_GET['dur']!="0")
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."'  and locations like '%".$loc[0]."%'  and travellers like '%".$_GET['trvler']."%' and duration ='".$_GET['dur']."'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}
else if($_GET['vac']!="0" && $_GET['dur']!="0" && $_GET['trvler'])
{
$q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."' and locations like '%".$loc[0]."%'  and trip_theme like '%".$_GET['vac']."%' and duration like '%".$_GET['dur']."%' and travellers like '%".$_GET['trvler']."%'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left; margin-left:5px;">
		<div class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative; cursor:pointer;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	   <img id="img_'.$row["pck_id"].'" src="data:image/png;base64,' . base64_encode($row["pck_img1"]) .'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="chk_'.$row["pck_id"].'" type="checkbox" onClick="div_chk_clr(\'chkpack1\',\'pack1\'); move_toCompare(\'chk_'.$row["pck_id"].'\',\'img_'.$row["pck_id"].'\',\'div_img_cmp_1\',\'span_img_cmp_name1\',\'div_name_'.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	 }
}
}

}
?>