<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Packages</title>
<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css" />
<link rel="stylesheet" type="text/css" href="Stylesheets/packageStyles.css" />
<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />

<script src="Javascript/plan_tripScript.js" language="javascript"></script>
<script src="Javascript/ExploreScript.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
</head>

<form method="post" enctype="multipart/form-data">
<body>
<?php include("PHP_Files/PHP_Connection.php"); ?>

<div id="master_container">

   <div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 	    	<div id="header_rightbtn">
    	
		<div>
	    		   <a href="#" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">
			  <span id="btnCustomer" class="smallbtn" style="width:90px; margin-right:3px; margin-bottom:3px; background:#F5F5F5; color:#B22222;">24x7 Support</span></a>
			  			
			   <span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span></a>
			   
			   <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span></a>       </div>	
		 
	   <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div> 
			 
		</div> 
	   		
			<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	
	</div>
   
	<div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
		 
	</div>

</div>



<div id="body_container">


<div id="pck_q3" style="float:left; width:100%; display:none;">		   
						  
				      <div style="float:left; width:100%; margin-top:10px;">
				   
				     <span class="font_medium" style="margin-left:10px; float:left; width:40%">
					   
					    <div class="font_medium" style="margin-left:10px;">Travellers</div>
					   
					    <div style="width:100%; float:left;">
					    <span class="font_medium" style="margin-left:3px;"><input type="radio" value="Single" id="rdSingle_pck" name="rdTrvlr_pck" onClick="hide_block('div_kids_pck');" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('rdSingle_pck').checked=true; hide_block('div_kids_pck');" style=" cursor:pointer;">Single</label></span>
						<span class="font_medium" style="margin-left:10px;"><input type="radio" value="Couple" id="rdCouple_pck" name="rdTrvlr_pck" onClick="hide_block('div_kids_pck');" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('rdCouple_pck').checked=true; hide_block('div_kids_pck');" style=" cursor:pointer;">Couple</label></span>
						<span class="font_medium" style=" margin-left:10px;"><input type="radio" value="Group" id="rdGrp_pck" name="rdTrvlr_pck" onClick="hide_block('div_kids_pck');" style="zoom:1.3; width:20px;"  /><label onClick="document.getElementById('rdGrp_pck').checked=true; hide_block('div_kids_pck');" style=" cursor:pointer;">Group</label></span><br/>
						<span class="font_medium" style="margin-left:5px;"><input type="radio" value="Family+Kids" id="rdFam_pck" name="rdTrvlr_pck" onClick="show_block('div_kids_pck');"  style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('rdFam_pck').checked=true; show_block('div_kids_pck');" style=" cursor:pointer;">Family+Kids</label></span>
							<span class="font_medium" style="margin-left:10px;"><input type="radio" value="Family+Kids" id="rdGrpKid_pck" name="rdTrvlr_pck" onClick="show_block('div_kids_pck');" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('rdGrpKid_pck').checked=true; show_block('div_kids_pck');" style="cursor:pointer;">Group+Kids</label></span>
					  </div>
					 
					   <div id="div_kids_pck" style="float:left; width:100%; display:none; font-size:20px; margin-top:10px;">
					    <span style="float:left;">Kids</span>
						<span style="float:left; margin-left:5px;"><input type="checkbox" value="0-2Yrs" id="chk0_2Kids_pck" name="chk0_2Kids_pck" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('chk0_2Kids_pck').checked=true;" style=" cursor:pointer;">0-2Yrs</label></span>
						<span style="float:left; margin-left:5px;"><input type="checkbox" value="2-12Yrs" id="chk2_12Kids_pck" name="chk2_12Kids_pck" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('chk2_12Kids_pck').checked=true;" style=" cursor:pointer;">2-12Yrs</span>
						<span style="float:left; margin-left:5px;"><input type="checkbox" value="12+Yrs" id="chk12+Kids_pck" name="chk12+Kids_pck" style="zoom:1.3; width:20px;" /><label onClick="document.getElementById('chk12+Kids_pck').checked=true;" style=" cursor:pointer;">12+Yrs</span>
					  </div>
					 
					 </span>
					 
					 <span class="font_medium" style="width:10%; float:left">
					 <div class="smallbtn" style="width:auto; height:auto; padding:10px; background:#ff0000;">And/Or</div></span>
					 
					 <span style="float:left; width:40%; margin-left:20px;">
					  <div class="font_medium" style="width:100%; float:left"><span style="float:left">Duration</span></div>
					  <div style="float:left; width:100%;">
					    <span style="float:left;">
						 <select id="drpDur_d_pck" name="drpDur_d_pck" class="font_medium" style="display:none; width:300px; height:auto;">
						  <option selected="selected" value="0">--------select-------</option>
				    <option value="Weekend">Weekend </option>
					<option value="3Days"> 3Days </option>
					<option value="3-7Days"> 3-7Days </option>
					<option value="7-10Days">  7-10Days</option>
					<option value="over 10Days"> over 10Days</option>

						 </select>
						 <select id="drpDur_abr_pck" name="drpDur_abr_pck" class="font_medium" style="display:none; width:300px; height:auto;">
						 <option selected="selected" value="0">--------select-------</option>
				    <option value="< 5 Days "> < 5 Days </option>
					<option value="5-10 Days "> 5-10 Days </option>
					<option value="10-15 Days"> 10-15 Days </option>
					<option value="15-30 Days"> 15-30 Days </option>
					<option value="30 Days"> > 30 Days </option>
						 </select>
						</span>
						</div>
					 </span>
					 
				   </div>
				   
				     <div style="width:100%; float:left; margin-top:20px;">
					<span style="float:left; margin-left:10px;">
					<img src="Images/arrowLeft.png" width="40px" height="35px" onClick="hide_block('pck_q3'); show_block('pck_q2');" /></span>
					
				  </div>
				   				 
				  </div>

<div id="div_body">

<div class="PckFonts" style="font-size:14px; background:#0066ff; color:#fff; float:left; width:100%; ">
 <span style="float:left;">Following Packages are displayed for your selections :</span>
 
<div style="float:left; width:100%">
 
 <?php 
 if(isset($_GET['type']) && isset($_GET['vac']) && isset($_GET['loc']))
 {
    echo '<div style="float:left; width:100%;">
	 <span style="float:left;">Type  :</span>
	 <span id="sp_type" style="float:left; margin-left:5px;">'.$_GET['type'].'</span>
	 <span style="float:left; margin-left:15px;">Theme  :</span>
	 <span id="sp_vac" style="float:left;  margin-left:5px;">'.$_GET['vac'].'</span>
	 <span style="float:left; margin-left:15px;">Location :</span>
	 <span id="sp_loc" style="float:left;  margin-left:5px;">'.$_GET['loc'].'</span>
	 </div>';

 }

 ?>
  </div>

<div style="float:left; width:100%; background:#eee;">
<div style="float:left; width:100%; background:#eee;">
 <span class="font-medium_indx" style="float:left; margin-left:100px; font-size:18px">Trip Agenda:</span>
 <span style="float:left; margin-left:30px;">
 <input type="checkbox" id="chkAgnd_act" name="chkAgnd_act" value="Activity" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('chkAgnd_act').checked=true;" style=" cursor:pointer">Activities</label></span>
 <span style="float:left; margin-left:10px; cursor:pointer">
 <input type="checkbox" id="chkAgnd_sght" name="chkAgnd_sght" value="Sightseeing" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('chkAgnd_sght').checked=true;" style=" cursor:pointer">Sightseeing</label></span>
 <span style="float:left; margin-left:10px; cursor:pointer">
 <input type="checkbox" id="chkAgnd_rest" name="chkAgnd_rest" value="Rest-Relaxation" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('chkAgnd_rest').checked=true;" style=" cursor:pointer">Rest & Relaxation</label></span>
 </div>
 
 <div style="float:left; width:100%;  background:#eee;">
 <span class="font-medium_indx" style="float:left; margin-left:100px; font-size:18px">Trip Intensity:</span>
 <span style="float:left; margin-left:20px; cursor:pointer">
 <input type="radio" id="rdInt_low" name="chkAgnd_act" value="Low" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('rdInt_low').checked=true;" style=" cursor:pointer">Low</label></span>
 <span style="float:left; margin-left:10px; cursor:pointer">
 <input type="radio" id="rdInt_med" name="chkAgnd_act" value="Medium" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('rdInt_med').checked=true;" style=" cursor:pointer">Medium</label></span>
 <span style="float:left; margin-left:10px; cursor:pointer">
 <input type="radio" id="rdInt_high" name="chkAgnd_act" value="High" style="zoom:1.3; width:15px;" />
 <label class="font-medium_indx" onClick="document.getElementById('rdInt_high').checked=true;" style=" cursor:pointer">High</label></span>
 </div>
</div> 
 
 </span>
</div>

 <div id="div_Query" class="popUp_imgs_leads" style="width:500px; height:auto; padding:10px; display:none; z-index:1000; bottom:0; overflow:hidden; background:#eee;"></div>

  <div id="dtls_pck" class="popUp_imgs_leads"> 
 </div>
 
<span style="width:100%; float:left; margin-bottom:2%;">

<span style="float:left; width:15%;">

<div style="float:left; width:100%; background:#bbb; height:400px">
 
 <div style="float:left; width:100%;">
   <span style="float:left; color:#ff0000; font-family:calibri;">Sort By</span>
 </div>
 
 <div style="float:left; width:100%;">
   <div style="float:left; width:100%;"><span style="float:left; color:#fff; font-family:calibri;">Duration</span></div>
   <?php
   if(isset($_GET['type']))
   {
   if($_GET['type'] == "INTERNATIONAL")
  $loc = explode(", ",$_GET['loc']); 
else
  $loc[0] = $_GET['loc'];
  
   echo '<select id="drpDur" style="float:left; width:100%;" onchange="sortPck();">';
   echo '<option value="0">Duration</option>';
    $pck_dur = "select distinct(duration) as duration from b2b_pck_crt where locations like '%".$loc[0]."%'";
   $res_dur = mysqli_query($conn,$pck_dur);
   if($res_dur)
   {
   while($row = mysqli_fetch_array($res_dur))
   {
     echo '<option value="'.$row["duration"].'">'.$row["duration"].'</option>';
   }
   }
   }
   ?>
  </select>
 </div>
 
  <div style="float:left; width:100%; margin-top:10px; ">
  <div style="float:left; width:100%;"><span style="float:left; color:#fff; font-family:calibri;">Travellers</span></div>
   <select id="drpTrvler" style="float:left; width:100%;" onchange="sortPck();">
    <option value="0">Travellers</option>
	<option value="SingleUnder 45">Single Under 45</option>
   <option value="SingleAbove 45">Single Above 45</option>
   <option value="CoupleUnder 45">Couple Under 45</option>
   <option value="CoupleAbove 45">Couple Above 45</option>
   <option value="Group">Group</option>
   <option value="Family+Kids">Family+Kids</option>
   <option value="Group+Kids">Group+Kids</option>
   </select>
 </div>
 
 <div style="float:left; width:100%; margin-top:10px; ">
 <div style="float:left; width:100%;"><span style="float:left; color:#fff; font-family:calibri;">Vacation Theme</span></div>
   <select id="drpVac" style="float:left; width:100%;" onchange="sortPck();">
    <option value="0">Vacation Theme</option>
   <?php
     $pck_vac = "select vac_title from vac_type";
   $res_vac = mysqli_query($conn,$pck_vac);
   if($res_vac)
   {
   while($row = mysqli_fetch_array($res_vac))
   {
     echo '<option value="'.$row["vac_title"].'">'.$row["vac_title"].'</option>';
   }
   }
  
   ?>
   </select>
 </div>
 
</div>

</span>


<span style="float:left; width:85%;">

<div id="Grid_View" class="div_HolidayType_GridView" style="display:block; overflow-x:hidden; overflow-y:scroll;">
  
<div id="package_sec_gridView" style="width:100%; float:left; height:400px;"> 
	  
	  <?php
	  if(isset($_GET['type']) && isset($_GET['vac']) && isset($_GET['loc']))
	  {

     if($_GET['type'] == "DOMESTIC")
     {
	 if( $_GET['vac']=="All," || $_GET['vac']=="")
	 {
	    $q_sel_pck_grd = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."' and locations like '%".$_GET['loc']."%'";
		$res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
	  if($res_sel_pck_grd)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_grd))
		{
		 echo ' <span style="width:25%; float:left;  margin-left:0px;">
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
	 else
	 {
	  $q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."' and locations like '%".$_GET['loc']."%' and trip_theme like '%".$_GET['vac']."%' ";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left;  margin-left:5px;">
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
	  else if($_GET['type'] == "INTERNATIONAL")
	  {
	   $loc = explode(", ",$_GET['loc']);
	 if( $_GET['vac']=="All," || $_GET['vac']=="")
	 {	  
	    $q_sel_pck_grd = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."' and locations like '%".$loc[0]."%'";
		$res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
	  if($res_sel_pck_grd)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_grd))
		{
		 echo ' <span style="width:20%; float:left;  margin-left:5px;">
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
	 else
	 {
	  $q_sel_pck_mul = "select pck_name, duration, pck_img1, price, pck_id from b2b_pck_crt where type='".$_GET['type']."' and locations like '%".$loc[0]."%' and trip_theme like '%".$_GET['vac']."%'";
	  $res_sel_pck_mul = mysqli_query($conn,$q_sel_pck_mul);
	  	  
	  if($res_sel_pck_mul)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_mul))
		{
		 echo ' <span style="width:20%; float:left;  margin-left:5px;">
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
	
	
	
	}
	 ?>
	 
	  </div>
	  
<div id="pck_sort" style="float:left; width:100%;">	  
  
</div>

</div>
</span>

</span>

</div>

</div>
</body>
</form>
</html>
