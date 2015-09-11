<!DOCTYPE> <!--html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
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

<?php include("PHP_Files/PHP_Connection.php");
include("PHP_Files/build_trip_php.php");
 ?>

<?php 
if(isset($_GET['loc']))
$loc = $_GET['loc'];
else
 $loc ="";
 
  if($_GET['mode'] == "Air")
	    $dist = "air_dist";
     else if($_GET['mode'] == "Road")
	    $dist = "road_dist";
	
 
if(isset($_GET['type']))
{
if($_GET['type'] == "India")
 $type = "DOMESTIC";
else
 $type = "INTERNATIONAL"; 
}

if(isset($_GET['mode']))
{
$sel_speed = "select drive_hrs, air_avg_speed, road_avg_speed from dist_mode_tab";
$res_speed = mysqli_query($dam,$sel_speed);

if($res_speed)
{
while($row = mysqli_fetch_array($res_speed))
{
  $dist_air = (int)$row["drive_hrs"]*$row["air_avg_speed"];
  $dist_road = (int)$row["drive_hrs"]*$row["road_avg_speed"];
    
  $updt_dist = "update dist_mode_tab set air_dist='".$dist_air."' , road_dist='".$dist_road."' where drive_hrs=".$row["drive_hrs"]."";
  $res_dist = mysqli_query($dam,$updt_dist);
}
}
}		
if($_GET['locType']=="Single Location" || $_GET['dur'] == "Weekend" || $_GET['dur']=="3Days")
$locnum = 1;
else
$locnum = $_GET['locNum'];		
				
	   $get_dist = "select $dist from dist_mode_tab where duration='".$_GET['dur']."' and locNum='".$locnum."'";
	   $res_dist = mysqli_query($dam,$get_dist);

      if($res_dist)
	  {
	  while($row = mysqli_fetch_array($res_dist))
	  {
	    $disRange = $row[$dist];
		 $dis[0] = 1;
	   $dis[1] = $disRange;	
	  }
	  }

$trpMnth = array();
$trpMnth[0]=0;
$flagDts = false;

if(isset($_GET["trvlDts"]))
{
  if($_GET["trvlDts"]=="Next 10 days")
    $custDt = date('m');
 else if(strpos($_GET["trvlDts"],"an")>0)
    $custDt = 1;
  else if(strpos($_GET["trvlDts"],"eb")>0)
    $custDt = 2;
   else if(strpos($_GET["trvlDts"],"ar")>0)
    $custDt = 3;
 else if(strpos($_GET["trvlDts"],"pr")>0)
    $custDt = 4;
 else if(strpos($_GET["trvlDts"],"ay")>0)
    $custDt = 5;
 else if(strpos($_GET["trvlDts"],"un")>0)
    $custDt = 6;
 else if(strpos($_GET["trvlDts"],"ul")>0)
    $custDt = 7;
 else if(strpos($_GET["trvlDts"],"ug")>0)
    $custDt = 8;
 else if(strpos($_GET["trvlDts"],"ep")>0)
    $custDt = 9;
 else if(strpos($_GET["trvlDts"],"ct")>0)
    $custDt = 10;
 else if(strpos($_GET["trvlDts"],"ov")>0)
    $custDt = 11;
 else if(strpos($_GET["trvlDts"],"ed")>0)
    $custDt = 12;	
 else if(strpos($_GET["trvlDts"]," to ")>0) 	
{
	$dt2 = explode(" to ",$_GET['trvlDts']);
	$mnth = explode("-",$dt2[1]);
	$custDt = $mnth[1];
}

}

if($_GET['type'] == "Abroad")
{
$dis[0] = 0;
$dis[1] = 0;	
}

?>




<form method="post" name="frm"  enctype="multipart/form-data">
<body >

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
		
		
<div style="position:relative; width:100%; float:left;">
		 <span style="width:auto;float:left;">
		 <a href="#"  onclick="show_block('left_inputs');" onMouseOver="ShowContent('contextBuild'); hide_block('left_inputs');" onDblClick="hide_block('left_inputs');" onMouseOut=" HideContent('contextBuild');"> 
				  <div class="tripHeaderbtn" id="div_BuildTrip" onClick="div_green('div_BuildTrip');" onMouseOver="div_green('div_BuildTrip');" onMouseOut="div_white('div_BuildTrip');">Vacation-Package Listing
				</div> </a>
		</span>
				
<span style="float:left; margin-left:50px;">
<span style="float:left; margin-right:0px;">
<span style="float:left; margin-right:10px;">
<a href="#" onClick="show_block('List_View'); hide_block('Grid_View'); change_font_color_list('lstview_font','grdview_font','imgList','imgGrid');">
<div id="lstview_font" class="div_listGrid_font">List View</div>
<div><img id="imgList" src="Images/listView.png" width="30px" height="20px" /></div>
</a></span>

<span style="float:left; margin-right:0px;">
<a href="#" onClick="show_block('Grid_View'); hide_block('List_View');change_font_color_grid('grdview_font','lstview_font','imgGrid','imgList');">
<div id="grdview_font" class="div_listGrid_font" style="color:red;">Grid View</div>
<div><img id="imgGrid" src="Images/gridView_red.png" width="30px" height="20px"/></div>
</a></span>
</span>
</span>
		</div>		
		
		
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	
	</div>
	
	<div  id="left_inputs" style=" z-index:10000; position:absolute; height:auto; padding:5px; display:none; margin-top:8%;" onMouseOver="div_green('div_BuildTrip'); show_inputs_again(); " onMouseOut="div_white('div_BuildTrip'); remove_back_inputs();">
    	        <div id="inputTab" style="width:280px; height:230px; background:#597272; opacity:0.7;">
	            <div id="div_collectInputs">
				  	<div style="padding-top:10px;">
				  <?php
				  if(isset($_GET['type']) && isset($_GET['currLoc']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['loc']) && isset($_GET['vactype'])) 
				  {
				  if($_GET['type']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to tavel &nbsp;</span><span id="sptype" style="float:left; margin-left:0px;"> '.$_GET['type'].'</span></div>';
				  if($_GET['currLoc']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Currently I\'m at </span><span id="spCurr" style="float:left; margin-left:2px;">'.$_GET['currLoc'].'</span></div>';
				   if($_GET['mode']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Prefer travelling by </span><span id="spMode" style="float:left; margin-left:0px;">'.$_GET['mode'].' </span></div>';
				   if($_GET['trvlr']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Travelling with </span><span id="spTrvlr" style="float:left; margin-left:2px;">'.$_GET['trvlr'].'</span></div>';
				   if($_GET['dur']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to go for </span><span id="spDur" style="float:left; margin-left:2px;">'.$_GET['dur'].'</span><span style="float:left; margin-left:2px;">Vacation</span></div>';
				   if($_GET['locType']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span id="splocType" style="float:left;">'.$_GET['locType'].'</span></div>';
				   if($_GET['locNum']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to holiday at </span><span id="spNum" style="float:left;">'.$_GET['locNum'].'</span><span style="float:left; margin-left:2px;">locations</span></div>';
				   if($_GET['loc']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Preferred locations </span><span id="spPref" style="float:left; margin-left:2px; font-size:12px;">'.$_GET['loc'].'</span></div>';
				  }
				 else if(isset($_GET['type']) && isset($_GET['currLoc']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['gender']) && isset($_GET['loc']))
					{
					if($_GET['type']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to tavel &nbsp;</span><span id="sptype" style="float:left; margin-left:0px;"> '.$_GET['type'].'</span></div>';
				  if($_GET['currLoc']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Currently I\'m at </span><span id="spCurr" style="float:left; margin-left:2px;">'.$_GET['currLoc'].'</span></div>';
				  if($_GET['trvlr']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Travelling with </span><span id="sptrvlr" style="float:left; margin-left:2px;">'.$_GET['trvlr'].'</span></div>';
				   if($_GET['dur']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to go for </span><span id="spDur" style="float:left; margin-left:2px;">'.$_GET['dur'].'</span><span style="float:left; margin-left:2px;">Vacation</span></div>';
				     }				
				   ?>
				   <div style="float:left; width:100%;">
				   <span style="float:right;">
					<a href="#" onClick="show_block('div_greyBack'); show_block('div_CustomForm');"><span class="smallbtn" style="width:60px; background:#002929; color:#FFFFFF;">Modify</span></a>
						</span></div>	
				   </div>				
		      	</div>
			</div>
	  
    </div>	  
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

<div id="body_container" style="margin-left:5%;">

<div id="div_Query" class="popUp_imgs_leads" style="width:500px; height:auto; padding:10px; display:none; z-index:1000; bottom:0; overflow:hidden; background:#eee;"></div>

<div id="div_greyBack" style="width:100%; height:900px; background:#999; opacity:0.8; display:none; position:absolute; z-index:1; margin:0%;"></div>

<div id="div_IternaryDays" class="popUp_imgs_leads" style="width:600px; height:auto; padding:10px; display:none; z-index:1000; top:30; overflow:hidden; background:#eee;"></div>

<div id="div_HotelDtls" class="popUp_imgs_leads" style="width:700px; height:auto; padding:10px; display:none; z-index:1000; top:30; overflow:hidden; background:#eee;"></div>

<div id="compare_imgs" class="popUp_imgs_leads" style="width:1100px; height:500px; overflow-y:scroll; overflow-x:hidden; z-index:10; margin:10% 5% 5% 10%;"></div>


<div 
   id="onCursor" 
   style="display:none; 
      position:absolute; 
      border-style: none; 
      background-color: #002929;
	  color:#FFFFFF;
	  opacity:0.8;
      padding: 5px;">
Click to select for further processing
</div>

<div id="div_CustomForm"
style="display:none;
   background:#EEEEEE;
   border:1px solid lightblue;
   width:50%;
   height:auto;  
   border-radius:10px;
   margin:10% 10% 10% 15%;
  position:absolute;
  text-align:center;
  z-index:10000;">

				<div style="width:100%; margin:5px 5px 5px 5px;">
			<span style="float:left; font-size:20px; color:#B22222; margin-left:10px;" class="div_elements">Search new vacation type or to Customize</span>					
  				<span style="float:right; margin-right:10px;">
				<a href="#" onClick="hide_block('div_CustomForm'); hide_block('div_greyBack');"><img src="Images/cancelbtn_grey.png" width="23px" height="23px" /></a></span>
				<span  <?php if($_GET['type'] == "India") {?> style="float:right; margin-right:10px; display:block;" <?php } else { ?> style="display:none;" <?php } ?>><span onClick="enable_domes();" style="color:#0066FF; cursor:pointer">Click here to Edit</span></span>	
				<span <?php if($_GET['type'] == "Abroad") { ?> style="float:right; margin-right:10px; display:block;" <?php } else { ?> style="display:none;" <?php } ?>><span onClick="enable_abr();" style="color:#0066FF; cursor:pointer">Click here to Edit</span></span>	
			</div>
			
				<div <?php if($_GET['type'] == "India") {?> style="width:90%; margin-top:20px; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
			    <table style="width:100%;">
			   <tr>
		 			<td><span class="div_elements" style="float:left;">You Want to Travel in: </span> </td>	   
			   		<td><span class="div_elements">
					<input type="radio" id="rdIndia" value="India" name="rd" <?php if($_GET['type'] == "India") {?> checked="checked" <?php }?> disabled="disabled">India</span>
		<span class="div_elements">
		<input type="radio" id="rdAbroad" value="Abroad" name="rd" disabled="disabled" <?php if($_GET['type'] == "Abroad") {?> checked="checked" <?php }?> > Abroad</span></td>
			 </tr>
			   
			   <tr>
			   <td><span class="div_elements" style="float:left;">  Select Current City :</span></td>
			   <td><span class="div_elements">
				<select class="div_elements" name="drpcCity" id="drpcCity" style="width:150px;" onChange="show_box_cCity();" disabled="disabled">
			   	  <option value="<?php echo $_GET['currLoc'] ?>" > <?php echo $_GET['currLoc']; ?> </option>
				   <?php
				   $city = "select locName from user_destinations where type='DOMESTIC'";
				   $res_city = mysqli_query($con,$city);
				   while($row = mysqli_fetch_array($res_city))
				   {
				    echo '<option value="'.$row["locName"].'">'.$row["locName"].'</option>';
				   }
				   ?>
				   </select>
				   </span> </td>
				
			   </tr>
			   
			   <tr>
			     <td><span  class="div_elements" style="float:left;">Your preferred mode of travel :</span></td>
			   <td> <span class="div_elements">
						   <input type="radio" id="rdRoad" name="rdmode" value="Road" disabled="disabled" <?php if($_GET['mode'] == "Road"){?> checked="checked" <?php } ?>>Road </span>					
					<span class="div_elements">
					<input type="radio" id="rdAir" name="rdmode" value="Air" disabled="disabled" <?php if($_GET['mode'] == "Air"){?> checked="checked" <?php } ?>> Air</span>
					<!-- <span class="div_elements">
					<input type="radio" id="rdTrain" name="rdmode" value="Train" checked="checked" disabled="disabled"> Train </span> 
					<span class="div_elements">
					<input type="radio" id="rdSea" name="rdmode" value="Sea" disabled="disabled"> Sea	</span> -->
					</td>
					
			   </tr>
			  
			   <tr>
			      <td><span class="div_elements" style="float:left;">Travellers Are :</span></td>
			      <td>	
						  <span class="div_elements">
		<input type="radio" value="Single" name="rdtravel" id="rdSingle" disabled="disabled" onClick="show_table_row('rdSingle','tr_ur_age','tr_kids_age'); show_trs('tr_ur_gen'); hide_block('sp_grp_age');" <?php if($_GET['trvlr']=="Single-Under 45" || $_GET['trvlr']=="Single-Above 45") { ?> checked="checked" <?php } ?>>Single</span>
				  <span class="div_elements">
				  <input type="radio" value="Couple" name="rdtravel" id="rdCouple" disabled="disabled" onClick="show_table_row('rdCouple','tr_ur_age','tr_kids_age'); hide_block('tr_ur_gen'); hide_block('sp_grp_age');" <?php if($_GET['trvlr']=="Couple-Under 45" || $_GET['trvlr']=="Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45") { ?> checked="checked" <?php } ?>>Couple</span>
				  <span class="div_elements"> 
				  <input type="radio" value="Group" name="rdtravel" id="rdGroup" disabled="disabled" onClick="show_table_row('rdGroup','tr_ur_age','tr_kids_age'); hide_block('tr_ur_gen'); show_block('sp_grp_age');" <?php if($_GET['trvlr']=="Group-Under 45" || $_GET['trvlr']=="Group-Above 45" || $_GET['trvlr']=="Group-Above 60") { ?> checked="checked" <?php } ?>>Groups </span>
				   <span class="div_elements" >
				   <input type="radio" value="Family+Kids" name="rdtravel" id="rdFamilykid"  disabled="disabled" onClick="show_table_row('rdFamilykid','tr_kids_age','tr_ur_age'); hide_block('tr_ur_gen');" <?php if(strpos($_GET['trvlr'],"amily Kids")>0) { ?> checked="checked" <?php } ?>> Family+Kids</span>
				  <span class="div_elements">
				  <input type="radio" value="Group+Kids" name="rdtravel" id="rdGroupkid" disabled="disabled" onClick="show_table_row('rdGroupkid','tr_kids_age','tr_ur_age'); hide_block('tr_ur_gen');" <?php if(strpos($_GET['trvlr'],"roup Kids")>0) { ?> checked="checked" <?php } ?>>Group+Kids</span></td>				  
			   </tr>
			   
		       <tr id="tr_ur_age" <?php if(strpos($_GET['trvlr'],"Under 45")>0 || strpos($_GET['trvlr'],"Above 45")>0 || strpos($_GET['trvlr'],"Above 60")>0) { ?> style="display:table-row;" <?php } else{?> style="display:none;" <?php }?>>
			      <td><span class="div_elements"> Age:</span></td>
					<td><span class="div_elements">
					<input type="radio" id="chkageL45" name="chkage45"  value="-Under 45" <?php if(strpos($_GET['trvlr'],"Under 45")>0) { ?> checked="checked" <?php } ?>>Under 45	
				 		 <input type="radio" id="chkageM45" name="chkage45" value="-Above 45" <?php if(strpos($_GET['trvlr'],"Above 45")>0) { ?> checked="checked" <?php } ?>> Above 45
				        </span>
						<span <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> class="div_elements" style="float:left; margin-left:2px; display:block;" <?php } else { ?>  style="display:none;" <?php } ?> id="sp_grp_age"> <input type="radio" id="chkageM60" name="chkage45" value="-Above 60" <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> checked="checked" <?php } ?>> Above 60</span>
						</td>
			   </tr>
			   
			  <tr id="tr_ur_gen" <?php if($_GET['trvlr']=="Single-Under 45" || $_GET['trvlr']=="Single-Above 45") { ?> style="display:table-row;" <?php } else{?> style="display:none;" <?php }?>>
			      <td><span class="div_elements"> Gender:</span></td>
					<td><span class="div_elements">
					<input type="radio" id="chkgenM" name="chkgen" value="Male" <?php if($_GET['gender']=="Male") { ?> checked="checked" <?php } ?>>Male
				 		 <input type="radio" id="chkgenF" name="chkgen" value="Female" <?php if($_GET['gender']=="Female") { ?> checked="checked" <?php } ?>> Female
				        </span></td>
			   </tr>
			   
			  <tr id="tr_kids_age" <?php if(strpos($_GET['trvlr'],"0-2")>0  || strpos($_GET['trvlr'],"2-12")>0 || strpos($_GET['trvlr'],"12plus")>0) { ?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
			      <td><span class="div_elements">Kid's Age:</span></td>
					<td><span class="div_elements">
					<input type="checkbox" id="chkkid" name="chkkid" value="0-2yrs" <?php if(strpos($_GET['trvlr'],"0-2")>0) { ?> checked="checked" <?php } ?>>0-2Yrs	
				 		 <input type="checkbox" id="chkchild" name="chkchild" value="2-12yrs" <?php if(strpos($_GET['trvlr'],"2-12")>0) { ?> checked="checked" <?php } ?>> 2-12Yrs 
		<input type="checkbox" id="chkchildplus" name="chkchildplus" value="12+yrs" <?php if(strpos($_GET['trvlr'],"12plus")>0) { ?> checked="checked" <?php } ?>> 12+Yrs 
						 </span></td>	
						  
			   </tr>
			  
			   <tr>
			      <td> <span id="span_Dur" class="div_elements"  style="float:left;"> Trip Duration : </span>	</td>
				  <td><span class="div_elements">
				<select class="div_elements" name="drpDur" id="drpDur" style="width:150px;" onChange="show_locs(this.value);" disabled="disabled">
					<option value="Weekend" <?php if($_GET['dur']=="Weekend") { ?> selected="selected" <?php }?>>Weekend </option>
					<option value="3Days" <?php if($_GET['dur']=="3Days") { ?> selected="selected" <?php }?>> 3Days </option>
					<option value="3-7Days" <?php if($_GET['dur']=="3-7Days") { ?> selected="selected" <?php }?>> 3-7Days </option>
					<option value="7-10Days" <?php if($_GET['dur']=="7-10Days") { ?> selected="selected" <?php }?>>  7-10Days</option>
					<option value="over 10Days" <?php if($_GET['dur']=="over 10Days") { ?> selected="selected" <?php }?>> over 10Days</option>
					</select>
					</span>
					</td>
					
			   </tr>
			   
			   <tr id="tr_locType" <?php if($_GET['locType'] == "" || $_GET['dur']=="Weekend" || $_GET['dur']=="3Days"){?> style="display:none;" <?php } else {?>  style="display:table-row;" <?php }?>>
			     <td><span class="div_elements">Wants to holiday at:</span></td>
				<td> <span class="div_elements">				 
					  <input type="radio" value="Single Location" id="rdsinglType" name="rdLocType" onClick="chk_locTyp(this.value);" <?php if($_GET['locType']=="Single Location") { ?> checked="checked" <?php } ?> />Single Location </option>
					  <input type="radio" value="Multiple Locations" id="rdmulType" name="rdLocType" onClick="chk_locTyp(this.value);"  <?php if($_GET['locType']=="Multiple Locations") { ?> checked="checked" <?php } ?> />Multiple Location </option>	
				</span>                      
				</td>						
			   </tr>
			   
			   <tr id="tr_mult_loc_num" <?php if($_GET['locNum'] == 0 || $_GET['dur']=="Weekend" || $_GET['dur']=="3Days"){?> style="display:none;" <?php } else {?> style="display:table-row;" <?php }?>>
			      <td><span id="span_prefCity" class="div_elements">No. of Locations :</span></td>
				  <td> <span class="div_elements">
					 <select id="drpNumLoc" name="drpNumloc" class="txtbox_num" style="width:30px;">
				<option <?php if($_GET['locNum'] == "2"){?> selected="selected" <?php }?> value="2"> 2 </option>
				<option <?php if($_GET['locNum'] == "3"){?> selected="selected" <?php }?> value="3"> 3 </option>
				<option <?php if($_GET['locNum'] == "4"){?> selected="selected" <?php }?> value="4"> 4 </option>	
				<option <?php if($_GET['locNum'] == "5"){?> selected="selected" <?php }?>  value="5"> 5 </option>
				<option <?php if($_GET['locNum'] == "6"){?> selected="selected" <?php }?> value="6">6</option>
				<option <?php if($_GET['locNum'] == "7"){?> selected="selected" <?php }?> value="7">7</option>
				<option <?php if($_GET['locNum'] == "8"){?> selected="selected" <?php }?> value="8">8</option>
				<option <?php if($_GET['locNum'] == "9"){?> selected="selected" <?php }?> value="9">9</option>
				</select></span></td>
			
			   </tr>
			   
			   <tr id="tr_singl_loc" <?php if($_GET['locType'] == "Single Location" &&  $_GET['dur']=="Weekend" && $_GET['dur']=="3Days") { ?> style="display:table-row;" <?php } else {?> style="display:none;" <?php } ?>>
			      <td><span class="div_elements" style="float:left;">Preferred Locations :</span></td>
				  <td>
				    <select class="div_elements" name="drpSiglLoc" id="drpSiglLoc" style="width:150px;">
					<?php
					 if(strpos($_GET['loc'],",")>0)
					{
					echo '<option value="select" >---- select ---- </option>';
					}
					else
					echo '<option value="'.$_GET['loc'].'" >'.$_GET['loc'].'</option>';
				   $city = "select locName from user_destinations where type='DOMESTIC'";
				   $res_city = mysqli_query($con,$city);
				   while($row = mysqli_fetch_array($res_city))
				   {
				    echo '<option value="'.$row["locName"].'">'.$row["locName"].'</option>';
				   }
				   ?>
				   </select>
				  </td>
			   </tr>
			   
			   <tr id="tr_mult_loc" <?php if($_GET['locType'] == "Multiple Locations" &&  $_GET['dur']!="Weekend" && $_GET['dur']!="3Days") { ?> style="display:table-row;" <?php } else {?> style="display:none;" <?php } ?>>
			     <td><span class="div_elements" style="float:left;">Preferred Locations :</span></td>
				 <td>
				       <div id="div_City"  style="display:block; border-radius:5px; overflow-y:scroll; overflow-x:hidden; float:left; margin-top:0px; 
						    width: 200px; height:80px; border: 1px solid #336699;" onClick="show_block('div_splreq');">
							<div align="center" style="width:70%;">
		         <?php
				 if(strpos($_GET['loc'],",")>0)
				 {
				   $loc = explode(", ",$_GET['loc']);
				   for($i=0; $i<count($loc)-1; $i++)
				   {
				     echo '<div class="div_elements" style="font-size:12px">
				   <input type="checkbox" id="chk_'.$loc[$i].'" value="'.$loc[$i].'" checked="checked" onClick="chooseVal(this.id,this.value)"/>'.$loc[$i].'</div>';
				   }
				   echo "<br/>";
				 }
				 $q_cities = "select locName, locID from user_destinations where type='DOMESTIC'";
				 $res_cities = mysqli_query($con,$q_cities);
				 while($row = mysqli_fetch_array($res_cities))
				 {
				   echo '<div class="div_elements" style="font-size:12px">
				   <input type="checkbox" id="chk_'.$row["locID"].'" value="'.$row["locName"].'" onClick="chooseVal(this.id,this.value)"/>'.$row["locName"].'</div>';
				 }
				?>					
				</div>
				</div>
				 </td>				
			   </tr>
			   
			   <tr id="tr_custom">
			      <td align="right">
				  <a id="href_shuffle_1" onClick=" shuffle_pck(); hide_block('div_CustomForm'); hide_block('div_greyBack');">
				  <span class="smallbtn" style="width:60px; float:none; cursor:pointer;" >Modify</span></a></td>
				  <td align="left"><a href="#" onclick="show_trs('tr_spReq'); show_trs('tr_email');show_trs('tr_ph');show_trs('tr_sub'); hide_trs('tr_custom');">
				  <span class="smallbtn" style="width:70px; float:none;" >Customize</span></td>
			   </tr>
			   
			   <tr id="tr_spReq" style="display:none;">
			      <td align="left"><span class="div_elements" style="float:left;">Any other Specific Requirements:</span></td>
				  <td><span class="div_elements" style="float:left;"><textarea id="txtspl_requirements" name="txtspl_requirements" style="word-wrap:break-word; width:195px; height:70px;" onMouseOut="show_block('div_email'); "></textarea></span></td>
			   </tr>
			   
			   <tr id="tr_email" style="display:none;">
			     <td><span class="div_elements" style="float:left;">Your Email Id:</span></td>
				 <td><span class="div_elements" style="float:left;"><input type="text" id="txtemails" name="txtemails" style="word-wrap:break-word;" onClick="show_block('div_phone'); show_block('div_submitDetails');" /></span></td>
			   </tr>
			   
			   <tr id="tr_ph" style="display:none;">
			     <td><span class="div_elements" style="float:left;">Your Phone no.</span></td>
				 <td><span class="div_elements" style="float:left;"><input type="text" id="txtphs" name="txtphs" /></span></td>
			   </tr>
			   
			   <tr id="tr_sub" style="display:none;">
			     <td colspan="2" align="center">
				 <input type="submit" class="smallbtn" id="btnSub_custm_frm" name="btnSub_custm_frm" style="width:60px; float:none;" onClick="validate_email('txtemails');" value="Submit"></td>
			   </tr>
			
			</table>			
			     </div>
				 
			    <div <?php if($_GET['type'] == "Abroad") {?> style="width:90%; margin-top:20px; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
				    <table style="width:100%;">
			    
				  <tr>
		 			<td><span class="div_elements" style="float:left;">You Want to Travel in: </span> </td>	   
			   		<td><span class="div_elements">
					<input type="radio" id="rdIndia_abr" value="India" name="rd_abr"  disabled="disabled" <?php if($_GET['type'] == "India") {?> checked="checked" <?php }?>>India</span>
					<span class="div_elements">
					<input type="radio" id="rdAbroad_abr" value="Abroad" name="rd_abr" disabled="disabled" <?php if($_GET['type'] == "Abroad") {?> checked="checked" <?php }?>> Abroad</span></td>
				  </tr>
			 
			   <tr>
			   <td><span class="div_elements" style="float:left;">  Select Current City :</span></td>
			   <td><span class="div_elements">
			<input type="text" id="txtcCity" name="txtcCity" class="txtbox_Tab" style="width:200px;" disabled="disabled" value="<?php echo $_GET['currLoc']; ?>"  onMouseOver="txtbox_color_onmouseover('searchid');" placeholder="Current City" onMouseOut="txtbox_color_onmouseout('searchid');" onClick="show_explore(this.id);"; onKeyUp="toUpper(this.id);" onKeyPress="curCty(this.value);  show_block('result_pl');" /> 
			       </span>
			<div id="result_pl" style="position:absolute; bottom:-123px; width:300px; left:217px;  height:90px; background:#fff; display:none; border:1px solid #444;"></div>
				    </td>
				
			   </tr>
			   
			   <tr>
			      <td><span class="div_elements" style="float:left;">Travellers Are :</span></td>
			      <td>	
						  <span class="div_elements">
						  <input type="radio" value="Single" name="rdtravel_abr" id="rdSingle_abr" checked="checked" disabled="disabled" onClick="show_table_row('rdSingle_abr','tr_ur_age_abr','tr_kids_age_abr'); show_table_row('rdSingle_abr','tr_ur_gen_abr','tr_kids_age_abr'); hide_block('sp_grp_age_abr');" <?php if($_GET['trvlr']=="Single-Under 45" || $_GET['trvlr']=="Single-Above 45") { ?> checked="checked" <?php } ?>>Single</span>
				  <span class="div_elements">
				  <input type="radio" value="Couple" name="rdtravel_abr" id="rdCouple_abr" disabled="disabled" onClick="show_table_row('rdCouple_abr','tr_ur_age_abr','tr_kids_age_abr'); hide_block('sp_grp_age_abr');" <?php if($_GET['trvlr']=="spouse partner-Under 45" || $_GET['trvlr']=="spouse partner-Above 45" || $_GET['trvlr']=="Couple-Under 45" || $_GET['trvlr']=="Couple-Above 45") { ?> checked="checked" <?php } ?>>Couple</span>
				  <span class="div_elements"> 
				  <input type="radio" value="Group" name="rdtravel_abr" id="rdGroup_abr" disabled="disabled" onClick="show_table_row('rdGroup_abr','tr_ur_age_abr','tr_kids_age_abr'); show_block('sp_grp_age_abr');" <?php if($_GET['trvlr']=="Group-Under 45" || $_GET['trvlr']=="Group-Above 45"  || $_GET['trvlr']=="Group-Above 60") { ?> checked="checked" <?php } ?>>Groups </span>
				   <span class="div_elements" >
				   <input type="radio" value="Family+Kids" name="rdtravel_abr" id="rdFamilykid_abr"  disabled="disabled" onClick="show_table_row('rdFamilykid_abr','tr_kids_age_abr','tr_ur_age_abr');" <?php if(strpos($_GET['trvlr'],"amily Kids")>0) { ?> checked="checked" <?php } ?>> Family+Kids</span>
				  <span class="div_elements">
				  <input type="radio" value="Group+Kids" name="rdtravel_abr" id="rdGroupkid_abr" disabled="disabled" onClick="show_table_row('rdGroupkid_abr','tr_kids_age_abr','tr_ur_age_abr');" <?php if(strpos($_GET['trvlr'],"roup Kids")>0) { ?> checked="checked" <?php } ?>>Group+Kids</span></td>				  
			   </tr>
			   
			   <tr id="tr_ur_age_abr" style="display:none;">
			      <td><span class="div_elements"> Age:</span></td>
					<td><span class="div_elements">
					<input type="radio" id="chkageL45_abr" name="chkageL45_abr" value="-Under 45" <?php if(strpos($_GET['trvlr'],"Under 45")>0) { ?> checked="checked" <?php } ?>>Under 45	
				 		 <input type="radio" id="chkageM45_abr" name="chkageM45_abr" value="-Above 45" <?php if(strpos($_GET['trvlr'],"Above 45")>0) { ?> checked="checked" <?php } ?>> Above 45
				        </span>
						<span style="float:left; margin-left:2px; display:none;" id="sp_grp_age_abr"> <input type="radio" id="chkageM60_abr" name="chkageM60_abr" value="-Above 60" <?php if(strpos($_GET['trvlr'],"Above 45")>0) { ?> checked="checked" <?php } ?>> Above 60</span>
						</td>
			   </tr>
			   <tr id="tr_ur_gen_abr" style="display:none;">
			      <td><span class="div_elements"> Gender:</span></td>
					<td><span class="div_elements">
					<input type="checkbox" id="chkgenM_abr" name="chkgen_abr" checked="checked" value="Male" <?php if($_GET['gender']=="Male") { ?> checked="checked" <?php } ?>>Male
				 		 <input type="checkbox" id="chkgenF_abr" name="chkgen_abr" value="Female" <?php if($_GET['gender']=="Female") { ?> checked="checked" <?php } ?>> Female
				        </span></td>
			   </tr>
			   <tr id="tr_kids_age_abr" style="display:none;">
			      <td><span class="div_elements">Kid's Age:</span></td>
					<td><span class="div_elements">
					<input type="checkbox" id="chkkid_abr" name="chkkid_abr" value="0-2Yrs" <?php if(strpos($_GET['trvlr'],"0-2")>0) { ?> checked="checked" <?php } ?>>0-2Yrs	
				<input type="checkbox" id="chkchild_abr" name="chkchild_abr" value="2-12Yrs" <?php if(strpos($_GET['trvlr'],"2-12")>0) { ?> checked="checked" <?php } ?>> 2-12Yrs 
    <input type="checkbox" id="chkchildplus_abr" name="chkchildplus_abr" value="12+Yrs" <?php if(strpos($_GET['trvlr'],"12plus")>0) { ?> checked="checked" <?php } ?>> 12+Yrs 
						 </span></td>						  
			   </tr>
			   <tr >
			      <td> <span id="span_Dur" class="div_elements"  style="float:left;"> Trip Duration : </span>	</td>
				  <td><span class="div_elements">
				<select class="div_elements" name="drpDur_abr" id="drpDur_abr" style="width:150px;" onChange="show_locs();" disabled="disabled">
				    <option value="< 5 Days " <?php if($_GET['dur'] == "< 5Days"){ ?> selected="selected" <?php }?>> < 5 Days </option>
					<option value="5-10 Days" <?php if($_GET['dur'] == "5-10Days"){ ?> selected="selected" <?php }?>> 5-10 Days </option>
					<option value="10-15 Days" <?php if($_GET['dur'] == "10-15Days"){ ?> selected="selected" <?php }?>> 10-15 Days </option>
					<option value="15-30 Days " <?php if($_GET['dur'] == "15-30Days"){ ?> selected="selected" <?php }?>>  15-30 Days </option>
					<option value=">30 Days" <?php if($_GET['dur'] == "> 30Days"){ ?> selected="selected" <?php }?>> >30 Days</option>
					</select></span></td>					
			   </tr>
			   <tr id="tr_custom_abr">
			      <td align="right"><a id="href_shuffle_2" onClick=" shuffle_pck(); hide_block('div_CustomForm'); hide_block('div_greyBack');">
				  <span class="smallbtn" style="width:60px; float:none;" onClick="hide_block('div_CustomForm'); hide_block('div_greyBack');">Modify</span></a></td>
				<td align="left"><a href="#" onclick="show_trs('tr_spReq_abr'); show_trs('tr_email_abr');show_trs('tr_ph_abr');show_trs('tr_sub_abr'); hide_trs('tr_custom_abr');">
				  <span class="smallbtn" style="width:70px; float:none;" >Customize</span></td>
			   </tr>
			   <tr id="tr_spReq_abr" style="display:none;">
			      <td align="left"><span class="div_elements" style="float:left;">Any other Specific Requirements:</span></td>
				  <td><span class="div_elements" style="float:left;"><textarea id="txtspl_requirements_abr" name="txtspl_requirements_abr" style="word-wrap:break-word; width:195px; height:70px;" onMouseOut="show_block('div_email'); "></textarea></span></td>
			   </tr>
			   <tr id="tr_email_abr" style="display:none;">
			     <td><span class="div_elements" style="float:left;">Your Email Id:</span></td>
				 <td><span class="div_elements" style="float:left;"><input type="text" id="txtemails_abr" name="txtemails_abr" style="word-wrap:break-word;" onClick="show_block('div_phone'); show_block('div_submitDetails');"></span></td>
			   </tr>
			   <tr id="tr_ph_abr" style="display:none;">
			     <td><span class="div_elements" style="float:left;">Your Phone no.</span></td>
				 <td><span class="div_elements" style="float:left;"><input type="text" id="txtphs_abr" name="txtphs_abr" /></span></td>
			   </tr>
			   <tr id="tr_sub_abr" style="display:none;">
			     <td colspan="2" align="center">
				 <input type="submit" class="smallbtn" id="btnSub_custm_frm_abr" name="btnSub_custm_frm_abr" value="Submit" style="width:60px; float:none;"></td>
			   </tr>
					
					</table>
				</div>	 
			
			
</div>

<div id="div_CustomThanku"
style="display:none;
   background:#FFFFCC;
   color:Grey;
   border:1px solid grey;
   box-shadow: 2px 0px 6px grey;
   opacity:0.9;
   width:75%;
   height:150px;  
   border-radius:10px;
  margin:15% 10% 0% 20%;
  position:absolute;
  text-align:center;
  z-index:10000;">
          
			 <div style="width:100%;"><span style="float:right; margin-right:10px; margin-top:5px;" onClick="hide_block('div_CustomThanku'); hide_block('div_greyBack')">
			 <img src="Images/cancelbtn1.png" width="30px" height="30px" /></a></span></div>     
				 <div class="div_elements" style="font-size:24px;color:#0066FF;margin-top:15px; margin-left:10px;">
				       Thank you for submitting your custom vacation requirements. <Br/> Our support team will revert in next 48 hours
					   <span style="text-decoration:blink;"></span>				 
    </div>
				 
  </div>

<div id="div_FriendRecomm">
          
 <div style="width:100%;">
			 <span style="float:right; margin-right:10px; margin-top:5px;" onClick="hide_block('div_FriendRecomm'); hide_block('div_greyBack');">
			 <img src="Images/cancelbtn.png" width="30px" height="30px" /></a></span></div>    
			  
 <div id="Recommend_box" style=" display:block; margin-top:40px; height:100px;">
			<div style="margin-top:5px;">
			  <span class="div_elements" style="font-size:18px; margin-left:10px;">Your Name</span>			  
			  <span class="div_elements" style="font-size:18px; margin-left:60px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span> </div>
			  
			    <div class="div_elements" style="font-size:18px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px;">Your e-mail Id</span>
			  <span class="div_elements" style="font-size:18px;  margin-left:35px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span>
			  </div>
			  
			  <div class="div_elements" style="margin-top:5px; width:100%;">
			  <a href="#" onClick="show_block('div_frndEmail');show_block('div_frndEmail1');">
			  <span  style="font-size:18px; margin-left:10px; color:#0066FF;">Refer to a friend?</span></a>	
			  </div>
			  
			  <div id="div_frndEmail" class="div_elements" style="font-size:18px; display:none; margin-top:5px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px;">Friend's e-mail Id</span>
			  </div>
			  <div id="div_frndEmail1" class="div_elements" style="font-size:18px; display:none;">
			  <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; "/></span>
			  <span class="smallbtn" style="width:40px;" onClick="show_block('div_frndEmail2')">Add</span>
			  </div>
			  <div id="div_frndEmail2" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span>
			   <span class="smallbtn" style="width:40px;" onClick="show_block('div_frndEmail3')">Add</span>
			  </div>
			  <div id="div_frndEmail3" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span>
			    <span class="smallbtn" style="width:40px;" onClick="show_block('div_frndEmail4')">Add</span>
			  </div>
			  <div id="div_frndEmail4" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span>
			    <span class="smallbtn" style="width:40px;" onClick="show_block('div_frndEmail5')">Add</span>
				</div>
				<div id="div_frndEmail5" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px;"/></span>
			   <span class="smallbtn" style="width:40px;" onClick="show_block('div_frndEmail6')">Add</span>
			  </div>
			  
			  <div  class="div_elements" align="center" style="overflow:none;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;" onClick="hide_block('div_FriendRecomm');"> Submit </span>
			  </div>
			</div>
				 
  </div>
			
<div id="div_body">		
	
<span style="width:19%; float:left; margin-top:5px; margin-bottom:2%;">
<div style="float:left; width:100%;">
<span id="session_email" style="float:left;"><?php if(isset($_GET['email'])) echo $_GET['email']; ?></span>
<span id="trvl_dts" style="float:left; visibility:hidden;"><?php if(isset($_GET['trvlDts'])) echo $_GET['trvlDts']; ?></span>
</div>
  <?php
  if(isset($_GET['vactype']))
  {
  if(strpos($_GET['vactype'],", ")>0)
  {
  $vac = explode(", ",$_GET['vactype']);
  $numVac = count($vac);
  echo '<div style="width:100%; float:left; overflow-y:scroll; overflow-x:scroll; height:500px;">';
  echo '<table width="100%" height="auto">';
  for($i=0; $i<count($vac); $i++)
  {
 // echo $vac[$i];
  $sel_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title='".$vac[$i]."'";
  $res_vac = mysqli_query($dam,$sel_vac);  
  if($res_vac)
  {   
 while($row = mysqli_fetch_array($res_vac))
  {
    $sl = $row["slno"];
	   echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"> <div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px"  />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#ff0000; opacity:0.8; z-index:10;  color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
  }
  }  
 
  }
 
if($numVac == 2)
{
   $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' having slno > ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
 }
if($numVac == 3)
{
   $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' having slno > ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
 }
if($numVac == 4)
{
   $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' having slno > ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
 }
if($numVac == 5)
{
   $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' and vac_title!='".$vac[4]."' having slno > ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
 }
if($numVac == 6)
{
   $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' and vac_title!='".$vac[4]."' and vac_title!='".$vac[5]."' having slno > ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
 }  
 
if($numVac == 2)
{
   $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
 }
if($numVac == 3)
{
   $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
 }
if($numVac == 4)
{
   $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
 }
if($numVac == 5)
{
   $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' and vac_title!='".$vac[4]."' having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
 }
if($numVac == 6)
{
   $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title!='".$vac[0]."' and vac_title!='".$vac[1]."' and vac_title!='".$vac[2]."' and vac_title!='".$vac[3]."' and vac_title!='".$vac[4]."' and vac_title!='".$vac[5]."' having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
 }   

if($res_abv_vac)
  {
 while($row = mysqli_fetch_array($res_abv_vac))
  {
  echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"><div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px"  />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#444; opacity:0.8; z-index:10; color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
  }  
  }
  
if($res_blv_vac)
  {
 while($row = mysqli_fetch_array($res_blv_vac))
  {
  echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"><div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px"  />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#444; opacity:0.8; z-index:10; color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
  }  
  }  

echo '</table>';
echo '</div>';
}
  else
  {
  $vac = $_GET['vactype'];
  $sl = 0;
  $sel_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype where vac_title='".$vac."'";
  $res_vac = mysqli_query($dam,$sel_vac);
   if($res_vac)
  {  
  while($row = mysqli_fetch_array($res_vac))
  {
    $sl = $row["slno"];
  }
  }
  
  $sel_abv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype  having slno >= ".$sl." order by slno asc";
  $res_abv_vac = mysqli_query($dam,$sel_abv_vac);
  
  $sel_blv_vac = "select slno, vac_img1, vac_title, vac_id from dam_vactype  having slno < ".$sl." order by slno asc";
  $res_blv_vac = mysqli_query($dam,$sel_blv_vac);
  
  echo '<div style="width:100%; float:left; overflow-y:scroll; overflow-x:scroll; height:500px;">';
  echo '<table width="100%" height="auto" cellpadding="2px" cellspacing="0">';
  if($res_abv_vac)
  {  
  while($row = mysqli_fetch_array($res_abv_vac))
  {
  if($row["vac_title"] == $vac)
  {
     echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"><div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px" />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#ff0000; opacity:0.8; z-index:10;  color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
  }
  else
  {
   echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"><div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px" />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#444; opacity:0.8; z-index:10;  color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
   }
  }
  }  
 if($res_blv_vac)
  {  
  while($row = mysqli_fetch_array($res_blv_vac))
  {
   echo '<tr>';
   echo '<td><a id="vacRef_'.$row["vac_id"].'" target="_self" onclick="changeUrl(this.id,\'Packages.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');"><div style="position:relative; cursor:pointer;"><img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" width="100%" height="120px"  />
   <div style="float:left; width:100%; position:absolute; bottom:0px; height:20px; background:#444; opacity:0.8; z-index:10; color:#fff; font-family:Calibri; font-size:14px;">'.$row["vac_title"].'</div></div></a>   
   </td>';
   echo '</tr>';
  }
  }
    echo '</table>';
echo '</div>';
  }
  }
  ?>
  
</span>  

			
<span style="width:80%; float:left; margin-bottom:2%;">

 <div id="div_compare_packs" style="display:none;">
<span style="float:right; margin-right:3px; margin-top:2px;">
<a href="#" onClick="hide_block('div_compare_packs');">
<img src="Images/cancelbtn.png" width="25px" height="25px" /></a></span>

<span id="spC1" class="div_img_compare_span" style="margin-left:5px;">
  <div id="div_img_cmp_1" class="div_img_compare" style="background-image:url('');">
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name1" class="div_img_cmp_name"></span>
	<span class="div_cmp_cancelbtn">
	<a href="#" onClick="clear_blocks('div_img_cmp_1','span_img_cmp_name1')">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" /></a>
	</span>	
	</div>
  </div>
</span>

<span id="spC2" class="div_img_compare_span">
<div id="div_img_cmp_2" class="div_img_compare" style="background-image:url('');">
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name2" class="div_img_cmp_name"></span>
	<span class="div_cmp_cancelbtn">
	<a href="#" onClick="clear_blocks('div_img_cmp_2','span_img_cmp_name2')">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" /></a></span>	</div>
  </div>
</span>

<span id="spC3" class="div_img_compare_span">
<div id="div_img_cmp_3" class="div_img_compare" style="background-image:url('');">
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name3" class="div_img_cmp_name"></span>
	<span class="div_cmp_cancelbtn">
	<a href="#" onClick="clear_blocks('div_img_cmp_3','span_img_cmp_name3')">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" /></a></span>	</div>
  </div>
</span>

<span id="spC4" class="div_img_compare_span">
<div id="div_img_cmp_4" class="div_img_compare" style="background-image:url('');">
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name4" class="div_img_cmp_name"></span>
	<span class="div_cmp_cancelbtn">
	<a href="#" onClick="clear_blocks('div_img_cmp_4','span_img_cmp_name4')">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" /></a></span>	</div>
  </div>
</span>
 

<span>
<div class="div_compare_btn" onClick="Compare_pcks();">Compare</div></span>

</div>
 
  <div style="float:left; width:100%; height:20px;">
  <span id="sp_vac_type" style="float:left; margin-left:10px; color:#ff0000;"><?php if(isset($_GET['vactype'])) echo $_GET['vactype']; ?></span></div>
  
 <div id="view_section" style="margin-left:8px; width:1000px; height:65px;"> 
 <span class="div_pckg_hdrs_scls" style="position:relative; width:60%;">
 <div style="background:#F1F1F1;width:100%; height:70px;  overflow-Y:scroll; ">

 <div style="color:#B22222; font-size:13px; font-weight:bold;"> Destination suggested for your vacation </div>
  	 
	 <div id="sug_loc_5" style="width:100%; float:left;">
	 <?php 	
	 $five = 0;
	 $vac_dest="";
	 $rowsCnt = 0;		    		
	 if(isset($_GET['currLoc']) && isset($_GET['dur'])  && isset($_GET['mode']) )
	{
	echo '<div id="firstSeven" style="float:left; width:100%;">';
	set_time_limit(10000);
	 if($_GET['loc']!="")
	 {
	   if(strpos($_GET['loc'],", ")>0)
	   {
	     $loc = explode(", ",$_GET['loc']);
		 for($i=0; $i<count($loc); $i++)
		 {
		 echo '<span  style="position:relative; float:left;">';
		  echo '<div id="btn_nb_'.$loc[$i].'" class="sp_nr_cities" onclick="showDestpck(\''.$loc[$i].'\');">'.$loc[$i].'</div>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$loc[$i].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$loc[$i].'\'); hide_block(\'cls_'.$loc[$i].'\'); reduceCount(); removeDest(\''.$loc[$i].'\');" />';
			echo '</span>';
			$vac_dest .=$loc[$i].", ";	
		 }
	   }
	   else
	      {
		  echo '<span  style="position:relative; float:left;">';
		  echo '<div id="btn_nb_'.$_GET['loc'].'" class="sp_nr_cities" onclick="showDestpck(\''.$_GET['loc'].'\');">'.$_GET['loc'].'</div>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$_GET['loc'].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$_GET['loc'].'\'); hide_block(\'cls_'.$_GET['loc'].'\'); reduceCount(); removeDest(\''.$_GET['loc'].'\');" />';
			echo '</span>';
			
	       }
	   
	 }
	 else
	 {
	 
	  if(strpos($_GET['vactype'],", ")>0)
	  {
	   $vac = explode(", ",$_GET['vactype']);	   
	   for($i=0; $i<count($vac); $i++)
	   {
	     $getDistLoc = "select to_loc, distance from distance_matrix where type='".$type."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$dis[0]." and ".$dis[1]." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
		
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	  $toLoc = explode(" , ",$row["to_loc"]);
	   $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[$i]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		 {
		    $sel_locVac = "select locname from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."' and type='".$type."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			
			if($res_locVac)
			{			
	       while($rL = mysqli_fetch_array($res_locVac))
			{
			$five = $five+1;
			if($five<=3)
			{
			echo '<span  style="position:relative; float:left;">';
		  echo '<div id="btn_nb_'.$rL["locname"].'" class="sp_nr_cities" onclick="showDestpck(\''.$rL["locname"].'\');">'.$rL["locname"].'-'.$row["distance"].'</div>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$rL["locname"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$rL["locname"].'\'); hide_block(\'cls_'.$rL["locname"].'\'); reduceCount(); removeDest(\''.$rL["locname"].'\');" />';
			echo '</span>';	
			$vac_dest .=$rL["locname"].", ";	
			}
		   }
		  			  
			}
		 }
	   }
	   }
	  }
	  }
	  }
	  else
	  {
	// echo $type;
	 $five = 0;
	  $getDistLoc = "select to_loc, distance from distance_matrix where type='".$type."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$dis[0]." and ".$dis[1]." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
	
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	   if($res_vacID_S)
	   {	   	
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		  $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."' and type='".$type."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	       if($res_locVac)
			{				
	       while($rL = mysqli_fetch_array($res_locVac))
             {
			$five = $five+1;
			if($five<=3)
              {
			echo '<span  style="position:relative; float:left;">';
		  echo '<div id="btn_nb_'.$rL["locname"].'" class="sp_nr_cities" onclick="showDestpck(\''.$rL["locname"].'\');">'.$rL["locname"].'-'.$row["distance"].'km</div>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$rL["locname"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$rL["locname"].'\'); hide_block(\'cls_'.$rL["locname"].'\'); reduceCount(); removeDest(\''.$rL["locname"].'\');" />';
			echo '</span>';
			$vac_dest .=$rL["locname"].", ";
	       }
		   }		  
		   
		   }
		   }
	  }
	 
	 }
	}
		
	}
	}
	  echo '</div>';
	  echo '<span style="float:left; margin-left:10px;" onclick="showPck_ccity(\''.$_GET['vactype'].'\',\''.$_GET['type'].'\',\'sp_loc_updt\',\''.$custDt.'\',\''.$flagDts.'\',\''.$rowsCnt.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\');"><input type="button" class="smallbtn" style="width:100px;" value="View Packages" onclick=" show_lst_Pck(\''.$_GET['vactype'].'\',\''.$_GET['type'].'\',\'sp_loc_updt\',\''.$custDt.'\',\''.$flagDts.'\',\''.$rowsCnt.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\');" /></span>';
	}
  
  ?>
	</div>
				
	<div id="more_lnk" style="color:#0066ff; text-decoration:underline; cursor:pointer;" onClick="show_block('mr_plc'); hide_block(this.id);" onDblClick="hide_block('mr_plc');">More...</div>
				
  <div id="mr_plc" style="width:100%; float:left; display:none; position:relative; ">
	 <?php 
   if(isset($_GET['currLoc']) && isset($_GET['dur']) && isset($_GET['mode']))
	{
		if(strpos($_GET['vactype'],",")>0)
	  {
 echo '<div id="div_sel_loc" style="float:left; width:100%; display:block; overflow-y:scroll;">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">
					  <input type="text" id="txtPref_multiLoc" class="txtbox_Tab" style="width:100%; height:25px;" placeholder="Select my own destination" onKeyPress="suggDestMulti(this.value,\''.$type.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\',\''.$_GET['vactype'].'\'); show_block(\'result_mult\');" onclick="suggDestSel(this.value,\''.$type.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\',\''.$_GET['vactype'].'\'); show_block(\'result_mult\');"  /></span></div>
					   </div>';
		//echo $vac;
	  }
	  else
	  {
	  
	  echo '<div id="div_sel_loc" style="float:left; width:100%; display:block; overflow-y:scroll;">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">
					  <input type="text" id="txtPref_multiLoc" class="txtbox_Tab" style="width:100%; height:25px;" placeholder="Select my own destination" onKeyPress="suggDestSel(this.value,\''.$type.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\',\''.$_GET['vactype'].'\'); show_block(\'result_mult\');" onclick="suggDestSel(this.value,\''.$type.'\',\''.$_GET['currLoc'].'\',\''.$dis[0].'\',\''.$dis[1].'\',\''.$_GET['vactype'].'\'); show_block(\'result_mult\');"  /></span></div>
					   </div>';
					 
	}
 }
		
?>
</div>

<span id="sp_loc_updt" style="visibility:hidden;">
<?php
if(isset($_GET['loc']))
{
 if($_GET['loc']!="")
 echo $_GET['loc'];
 else
  echo $vac_dest; 
}
else
 echo $vac_dest;
?>
</span>	
			
 </div>
 
<div id="sug_dest" style="float:left; width:200px; background:#fff; height:50px; display:none; z-index:100; top:70px; position:absolute; bottom:0; left:0; overflow-y:scroll; overflow-x:hidden; padding:5px;"> </div>
</span>
  
  <span class="div_pckg_hdrs_scls">
 <div style="width:100%;">
<span class="div_listGrid_font">1N/2D</span>
<span class="div_listGrid_font" style="margin-left:80px;">6N/5D</span></div>

 <div style="width:100%;">
<div id="refine_days" style="background:url('Images/scale_back_slide.png') no-repeat; width:300px; height:30px; position:relative; left:0; top:0;">
 <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:0px; top:0; z-index:2;"></div>	
 		
 <div id="refine_days" style="background:url('Images/scale_back_ontop_slide.png') no-repeat; width:100px; height:30px; position:absolute; top:0; z-index:1;">  
   <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:100px; top:0; z-index:2;"></div> 
   </div>
   </div>
</div>

<div id="div_refine_days" class="div_listGrid_font" style="position:relative;">
Refine By <span style="font-size:14px; font-weight:bold; color:#B22222;">Vacation Days</span></div> 
</span>

 <span class="div_pckg_hdrs_scls">
<div style="width:100%;">
<span class="div_listGrid_font">5,000</span>
<span class="div_listGrid_font" style="margin-left:80px;">30,000</span></div>

<div id="refine_price" >
<div id="refine_days" style="background:url('Images/scale_back_slide.png') no-repeat; width:300px; height:30px; position:relative; left:0; top:0;">
 <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:0px; top:0; z-index:2;"></div>			
 
 <div id="refine_days" style="background:url('Images/scale_back_ontop_slide.png') no-repeat; width:100px; height:30px; position:absolute; top:0; z-index:1;">  
   <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:100px; top:0; z-index:2;"></div> 
   </div>
   </div>
</div>

<div id="div_refine_price" class="div_listGrid_font" style="position:relative;">
Refine By <span style="font-size:14px; font-weight:bold; color:#B22222;">Price</span></div>
</span>

 <span class="div_pckg_hdrs_scls" style="border-right:0px;">
<div style="width:100%;">
<span class="div_listGrid_font">0</span>
<span class="div_listGrid_font" style="margin-left:80px;">4</span></div>

<div id="opr_rating" >
<div id="refine_days" style="background:url('Images/scale_back_slide.png') no-repeat; width:300px; height:30px; position:relative; left:0; top:0;">
 <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:0px; top:0; z-index:2;"></div>
 			
  <div id="refine_days" style="background:url('Images/scale_back_ontop_slide.png') no-repeat; width:100px; height:30px; position:absolute; top:0; z-index:1;">  
   <div id="div_dragger" draggable="true" style="background:url('Images/slide_dragger.png') no-repeat;  width:10px; height:30px; position:absolute; margin-left:100px; top:0; z-index:2;"></div> 
   </div>
   </div>
</div>

<div id="div_refine_price" class="div_listGrid_font" style="position:relative;">
Refine By <span style="font-size:14px; font-weight:bold; color:#B22222;">Customer Rating</span></div>
</span>   

</div>

<div style="float:left; width:100%;">
<?php 
if(isset($_GET['vactype']))
{
if(strpos($_GET['vactype'],", ")>0)
{
 $vacT = explode(", ",$_GET['vactype']);
 if($vacT[1] != "")
 {
 for($i=0; $i<count($vacT)-1; $i++)
 {
  echo '<span style="float:left; margin-left:5px;">
  <div class="smallbtn" style="width:auto; padding:2px; height:22px;" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$vacT[$i].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\');">'.$vacT[$i].'</div>
  </span>';
  }
  }
}
}

?>
</div>
	

<div id="dtls_pck" class="popUp_imgs_leads"> 
 </div>
 
 <div id="List_View" style="display:none; width:100%; float:left;">
  
 <div id="package_sec_Adv" 
  style="display:block; overflow-x:scroll; height:410px; overflow-y:scroll;"
  class="div_HolidayType">

<span style="float:left;">
    
<?php
  	 if(isset($_GET['vactype']))
	 {		 
	 echo '<div id="div_lst_pckTab" style="width:100%; float:left;"></div>';
    }
 ?>

  </span>
  
  </div>	

</div>
 
<div id="Grid_View" style="display:block; width:100%; float:left;">

 <div id="div_grid_adventure" 
  style="display:block;"
  class="div_HolidayType_GridView">
  
     <div id="package_sec_gridView" style="width:100%; height:400px; margin:0px; float:left;"> 
	  
	  <?php
	 if(isset($_GET['vactype']))
	 {	
	echo '<div id="pck_cCity_dur" style="width:100%; float:left;"> </div>';
	}
	 ?>
	 
	  </div>
	  
  </div>  
 </div>





</span>
</div>
<textarea style="visibility:hidden" id="txtAlocs" ></textarea>
</div>
</div>


</body>
</form>
</html>
