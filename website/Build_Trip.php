<!DOCTYPE> <!--html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Build Trip</title>

<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css">
<link rel="stylesheet" type="text/css" href="Stylesheets/Styles.css">

<script language="javascript" type="text/javascript" src="Javascript/ExploreScript.js"></script>
<script type="text/javascript" language="javascript" src="Javascript/plan_tripScript.js"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script src="Javascript/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="Javascript/PckToolAjax.js" type="text/javascript"></script>


  <script type="text/javascript" language="javascript">

var cX = 0; var cY = 0; var rX = 0; var rY = 0;
function UpdateCursorPosition(e){ cX = e.pageX; cY = e.pageY;}
function UpdateCursorPositionDocAll(e){ cX = event.clientX; cY = event.clientY;}
if(document.all) { document.onmousemove = UpdateCursorPositionDocAll; }
else { document.onmousemove = UpdateCursorPosition; }
function AssignPosition(d) {
if(self.pageYOffset) {
	rX = self.pageXOffset;
	rY = self.pageYOffset;
	}
else if(document.documentElement && document.documentElement.scrollTop) {
	rX = document.documentElement.scrollLeft;
	rY = document.documentElement.scrollTop;
	}
else if(document.body) {
	rX = document.body.scrollLeft;
	rY = document.body.scrollTop;
	}
if(document.all) {
	cX += rX; 
	cY += rY;
	}
d.style.left = (cX-480) + "px";
d.style.top = (cY-240) + "px";
}
function HideContent(d) {
if(d.length < 1) { return; }
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition(dd);
dd.style.display = "block";
}
function ReverseContentDisplay(d) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition(dd);
if(dd.style.display == "none") { dd.style.display = "block"; }
else { dd.style.display = "none"; }
}
</script> 

</head>
 

<form method="post" enctype="multipart/form-data">
<body onLoad="popup();">

<?php include("PHP_Files/build_trip_php.php"); ?>

<?php 

if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs']) && isset($_GET['gender'])) 
{
if($_GET['type'] == "India")
{
$mode= $_GET['mode'];
			$trvler="";
			$rank ="";
			$addPoints=0;
			
			if($_GET['trvlr'] == "spouse/partner-Under 45")
			 $trvler = "Couple_U45";
			else if($_GET['trvlr'] == "spouse/partner-Above 45") 
			$trvler = "Couple_45Plus";
			if($_GET['trvlr'] == "Couple-Under 45")
			 $trvler = "Couple_U45";
			else if($_GET['trvlr'] == "Couple-Above 45") 
			$trvler = "Couple_45Plus";
			else if($_GET['trvlr'] == "Group-Under 45") 
			$trvler = "Group_45Plus";
			else if($_GET['trvlr'] == "Group-Above 45") 
			$trvler = "Group_45Plus";
			else if($_GET['trvlr'] == "Group-Above 60") 
			$trvler = "Group_60Plus";			
			        			
			 if($_GET['trvlr'] == "Family Kids: 0-2yrs, ") 
			$trvler = "FamilyKids_0_2";
			else if($_GET['trvlr'] == "Family Kids: 2-12yrs, ") 
			$trvler = "FamilyKids_2_12";
			else if($_GET['trvlr'] == "Family Kids: 12 yrs, ") 
			$trvler = "FamilyKids_12plus";
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 50;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"12+yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 200;
			}
			else if(strpos($_GET['trvlr'],"2-12yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_2_12";
			$addPoints = 200;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs")>0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 250;
			}
					
			 if($_GET['trvlr'] == "Group Kids: 0-2yrs, ") 
			$trvler = "GroupKids_0_2";
			else if($_GET['trvlr'] == "Group Kids: 2-12yrs, ") 
			$trvler = "GroupKids_2_12";
			else if($_GET['trvlr']== "Group Kids: 12 yrs, ") 
			$trvler = "GroupKids_12plus";
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"Group Kids")>=0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 50;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Group Kids")>=0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 250;
			}
			else if(strpos($_GET['trvlr'],"2-12yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Group Kids")>=0)
			{
			$trvler = "GroupKids_2_12";
			$addPoints = 250;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs")>0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Group Kids")>=0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 300;
			}
			
		    else if($_GET['trvlr'] == "Single-Above 45" && $_GET['gender'] == "Female") 
			$trvler = "Single_F_45Plus";
			else if($_GET['trvlr'] == "Single-Under 45" && $_GET['gender'] == "Female") 
			$trvler = "Single_F_U45";
			else if($_GET['trvlr'] == "Single-Under 45" && $_GET['gender'] == "Male") 
			$trvler = "Single_M_U45";
			else if($_GET['trvlr'] == "Single-Above 45" && $_GET['gender'] == "Male") 
			$trvler = "Single_M_45Plus";
			
			if($_GET['dur'] == "Weekend")
			$dur = "Weekend_SL";
			else if($_GET['dur'] == "3Days")
			$dur = "3Days_SL";
			else if($_GET['dur'] == "3-7Days" && $_GET['locType']=="Single Location")
			$dur = "3_7Days_SL";
			else if($_GET['dur'] == "3-7Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="2")
			$dur = "3_7Days_ML_2";
			else if($_GET['dur'] == "3-7Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="3")
			$dur = "3_7Days_ML_3";
			else if($_GET['dur'] == "3-7Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="4")
			$dur = "3_7Days_ML_4";
			else if($_GET['dur'] == "7-10Days" && $_GET['locType']=="Single Location")
			$dur = "7_10Days_SL";
			else if($_GET['dur'] == "7-10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="2")
			$dur = "7_10Days_ML_2";
			else if($_GET['dur'] == "7-10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="3")
			$dur = "7_10Days_ML_3";
			else if($_GET['dur'] == "7-10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="4")
			$dur = "7_10Days_ML_4";
			else if($_GET['dur'] == "over 10Days" && $_GET['locType']=="Single Location")
			$dur = "10Days_Abv_SL";
			else if($_GET['dur'] == "over 10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="2")
			$dur = "10Days_Abv_ML_2";
			else if($_GET['dur'] == "over 10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="3")
			$dur = "10Days_Abv_ML_3";
			else if($_GET['dur'] == "over 10Days" && $_GET['locType']=="Multiple Locations" && $_GET['locNum']=="4")
			$dur = "10Days_Abv_ML_4";
			
						
			if($_GET['type']=="India")
			$type="India";
			else
			$type="Abroad";
						
			//$locs = explode(", ",);
			$locCount=0;		
			
			$points = 0;
		
			$dam_vals = "select $type, $mode, $trvler, $dur  from dam_values";
			$res_vals = mysqli_query($dam,$dam_vals);		
			
			if($res_vals)
			{
			while($row = mysqli_fetch_array($res_vals))
			{
			  $points = $row[$type] + $row[$mode] + $row[$trvler]+ $row[$dur]+$addPoints;
			}
			}
			
     		    $chk_loc = "select locname from dam_locs where locname='".$_GET['cCity']."' and type='DOMESTIC' and Top16='YES' ";
				$res_loc = mysqli_query($dam,$chk_loc);
				$rows_loc = mysqli_num_rows($res_loc);
				if($rows_loc>0)
				 {
				  $Top16 = "Top16";
			      $points = $points+25;
				 }
					
	  	  if($points >=0 && $points <=450)
				$rank = "L";
			 if($points >=451 && $points <=550)
				$rank = "L-M";
			 if($points >=551 && $points <=700)
				$rank = "M";
			 if($points >=701 && $points <=999)
				$rank = "M-H";
			 if($points >=1000)
				$rank = "H";
				
				if(isset($_GET['rank']))
				 {
				 if($_GET['rank']!="")
				   $rank = $_GET['rank'];
				 }
					//$rank ="M-H";	
				echo '<span id="sp_rank" style="visibility:hidden;">'.$rank.'</span>';	
				
				if($rank == "H" || $rank =="M-H")
				  $order = "order by seq desc";
				else 
				 $order ="order by seq asc"; 
				 
				 if($_GET['dur'] == "Weekend")
			   {
			  $limit6 = "limit 5";
			  $limit9 = "limit 8";
			  $n6 = 5;
			  $n9 = 8;
			  
			  $q_wkend = "select vac_img1, vac_title, vac_id from dam_vactype where vac_title='WEEKEND GETAWAY' ";
			  $res_wkend6 = mysqli_query($dam,$q_wkend);
			  $res_wkend9 = mysqli_query($dam,$q_wkend);
			}
			else
			{
			 $limit6 = "limit 6";
			  $limit9 = "limit 9";
			  $n6 = 6;
			  $n9 = 9;
			} 				

		
	  if($_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
			{
			$q_img = "select vac_img1, vac_title, vac_id from dam_vactype where  vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' ".$order." ".$limit6."";
			$res_img = mysqli_query($dam,$q_img);
			$num_rows = mysqli_num_rows($res_img);
			}
			
			else
			{
			$q_img = "select vac_img1, vac_title, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' ".$order." ".$limit6."";
			$res_img = mysqli_query($dam,$q_img);
			$num_rows = mysqli_num_rows($res_img);
			}			
			
			$sl =0;
			$sl2 = 0;		
			
			echo $rank."-".$points;

  }
}

 if($_GET['type']=="Abroad")
{
			$type="Abroad";
			
			$dur="";
            $trvler="";
			$rank ="";
			$addPoints=0;
			
			if($_GET['trvlr'] == "spouse/partner-Under 45")
			 $trvler = "Couple_U45";
			else if($_GET['trvlr'] == "spouse/partner-Above 45") 
			$trvler = "Couple_45Plus";
			else if($_GET['trvlr'] == "Group-Under 45") 
			$trvler = "Group_45Plus";
			else if($_GET['trvlr'] == "Group-Above 45") 
			$trvler = "Group_45Plus";
			else if($_GET['trvlr'] == "Group-Above 60") 
			$trvler = "Group_60Plus";
			
			//$fk = explode(", ",$_GET['trvlr']);			
			
			 if($_GET['trvlr'] == "Family Kids: 0-2yrs, ") 
			$trvler = "FamilyKids_0_2";
			 else if($_GET['trvlr'] == "Family Kids0-2yrs") 
			$trvler = "FamilyKids_0_2";
			else if($_GET['trvlr'] == "Family Kids: 2-12yrs, ") 
			$trvler = "FamilyKids_2_12";
			else if($_GET['trvlr'] == "Family Kids2-12yrs") 
			$trvler = "FamilyKids_2_12";
			else if($_GET['trvlr'] == "Family Kids: 12 yrs, ") 
			$trvler = "FamilyKids_12plus";
			else if($_GET['trvlr'] == "Family Kids12 yrs") 
			$trvler = "FamilyKids_12plus";
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 50;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"12+yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 200;
			}
			else if(strpos($_GET['trvlr'],"2-12yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_2_12";
			$addPoints = 200;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs")>0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"Family Kids")>=0)
			{
			$trvler = "FamilyKids_0_2";
			$addPoints = 250;
			}
			
			//$gk = explode(", ",$_GET['trvlr']);
		
			 if($_GET['trvlr'] == "Group Kids: 0-2yrs, ") 
			$trvler = "GroupKids_0_2";
			else if($_GET['trvlr'] == "Group Kids: 2-12yrs, ") 
			$trvler = "GroupKids_2_12";
			else if($_GET['trvlr']== "Group Kids: 12 yrs, ") 
			$trvler = "GroupKids_12plus";
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"roup Kids")>0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 50;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"roup Kids")>0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 250;
			}
			else if(strpos($_GET['trvlr'],"2-12yrs") >0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"roup Kids")>0)
			{
			$trvler = "GroupKids_2_12";
			$addPoints = 250;
			}
			else if(strpos($_GET['trvlr'],"0-2yrs")>0 && strpos($_GET['trvlr'],"2-12yrs")>0 && strpos($_GET['trvlr'],"12 yrs")>0 && strpos($_GET['trvlr'],"roup Kids")>0)
			{
			$trvler = "GroupKids_0_2";
			$addPoints = 300;
			}
			
		else if($_GET['trvlr'] == "Single-Above 45" && $_GET['gender'] == "Female") 
			$trvler = "Single_F_45Plus";
			else if($_GET['trvlr'] == "Single-Under 45" && $_GET['gender'] == "Female") 
			$trvler = "Single_F_U45";
			else if($_GET['trvlr'] == "Single-Under 45" && $_GET['gender'] == "Male") 
			$trvler = "Single_M_U45";
			else if($_GET['trvlr'] == "Single-Above 45" && $_GET['gender'] == "Male") 
			$trvler = "Single_M_45Plus";
			
			if($_GET['dur'] == "<5Days")
			$dur = "I_Less_5Days";
			else if($_GET['dur'] == "5-10Days")
			$dur = "I_5_10Days";
			else if($_GET['dur'] == "10-20Days")
			$dur = "I_10_20Days_SL";
			else if($_GET['dur'] == "20-30Days")
			$dur = "I_20_30Days_SL";
			else if($_GET['dur'] == "30Days")
			$dur = "I_30_plusDays_SL";
			
			$mode = "Air";
		
			$points = 0;			
			
			$dam_vals = "select $type,  $trvler, $dur, $mode  from dam_values";
			$res_vals = mysqli_query($dam,$dam_vals);	
			
			if($res_vals)
			{
			while($row = mysqli_fetch_array($res_vals))
			{
			$points = $row[$type] + $row[$trvler]+ $row[$dur]+ $row[$mode] + $addPoints;
			}
			}			
			
		 $chk_loc = "select locname from dam_locs where locname='".$_GET['cCity']."' and type='DOMESTIC' and Top16='YES' ";
				$res_loc = mysqli_query($dam,$chk_loc);
				$rows_loc = mysqli_num_rows($res_loc);
				if($rows_loc>0)
				 {
			      $points = $points+25;
				 }
					  
			  if($points >=0 && $points <=650)
				$rank = "L";
			 if($points >650 && $points <=750)
				$rank = "L-M";
			 if($points >750 && $points <=900)
				$rank = "M";
			 if($points >900 && $points <=1150)
				$rank = "M-H";
			 if($points >1150)
				$rank = "H";
				
				if(isset($_GET['rank']))
				 {
				 if($_GET['rank']!="")
				   $rank = $_GET['rank'];
				 }
				
				echo '<span id="sp_rank" style="visibility:hidden;">'.$rank.'</span>';	
				
				if($rank == "M-H")
				  $order = "order by ranks desc";
				else
				 $order ="order by ranks asc"; 			

           	  if($_GET['type'] == "Abroad" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type'] == "Abroad" && $_GET['trvlr'] == "Couple-Above 45" || $_GET['type'] == "Abroad" && $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type'] == "Abroad" && $_GET['trvlr'] == "spouse/partner-Above 45")
			{
			$q_img = "select vac_img1, vac_title, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' ".$order." limit 6";
			$res_img = mysqli_query($dam,$q_img);
			$num_rows = mysqli_num_rows($res_img);
			}
			else
			{
			$q_img = "select vac_img1, vac_title, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' ".$order." limit 6";
			$res_img = mysqli_query($dam,$q_img);
			$num_rows = mysqli_num_rows($res_img);
			}			
			
			$sl =0;
			$sl2 = 0;
			echo '<span id="sp_rank" style="visibility:hidden;">'.$rank.'</span>';	
			//echo $num_rows;
			echo $points;
			
			 $limit6 = "limit 6";
			  $limit9 = "limit 9";
			  $n6 = 6;
			  $n9 = 9;
}

if($rank == "L")
{
$rankMinus_3 = "";
$rankMinus_2 = "";
$rankMinus_1 = "";
$rankMinus="";
  $rankPlus = "L-M";
 $rankPlus_1 = "M";
 $rankPlus_2 = "M-H";
 $rankPlus_3 = "H";
 }
else if($rank == "L-M")
{
$rankMinus_3 = "";
$rankMinus_2 = "";
$rankMinus_1 = "";
$rankMinus ="L";
$rankPlus = "M";
$rankPlus_1 = "M-H";
$rankPlus_2 = "H";
 $rankPlus_3 = "";
} 
else if($rank == "M")
{
$rankMinus_3 = "";
$rankMinus_2 = "";
$rankMinus_1 = "L";
$rankMinus = "L-M";
$rankPlus = "M-H";
$rankPlus_1 = "H";
$rankPlus_2 = "";
 $rankPlus_3 = "";
}
else if($rank == "M-H")
{
$rankMinus_3 = "";
$rankMinus_2="L";
$rankMinus_1 = "L-M";
$rankMinus = "M";
$rankPlus = "H";
$rankPlus_1 = "";
$rankPlus_2 = "";
 $rankPlus_3 = "";
}
else if($rank =="H")
{
$rankMinus_3 = "L";
$rankMinus_2 = "L-M";
$rankMinus_1 = "M";
$rankMinus = "M-H";
$rankPlus = "";
$rankPlus_1 = "";
$rankPlus_2 = "";
 $rankPlus_3 = "";
}			
			
?>

<?php

if(isset($_GET['dur']) && isset($_GET['locNum']) && isset($_GET['type']))
{
if( $_GET['type'] == "India")
{
  if($_GET['dur'] == "3-7Days" || $_GET['dur'] == "7-10Days" || $_GET['dur'] == "Over 10Days")
  {
    $durChk = true;
  }
  
   if($_GET['dur'] == "3Days" || $_GET['dur'] == "Weekend")
  {
    $durChk = false;
  }
}
 
}

if(isset($_GET['dates']))
{
if($_GET['dates']==true)
{
$dts = true;
}
else
$dts = false;
}

if(isset($_GET['email']))
{
  $eml = $_GET['email'];
}

?>

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
			  	
				<?php 
				if(isset($_GET['secure']))
				{		
				if($_GET['secure'] == "false")
				{
			echo  '<span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span>			   
			      <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span>';
			    }				
				else if($_GET['secure'] == "true")
				{
				echo '<img src="Images/icons/home.jpeg" width="30px" height="30px" style="cursor:pointer" onclick="cust_home();" />';
				}
				}
				else
				{
				echo  '<span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span>			   
			      <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span>';
				}
			  ?>
       </div>	
		 
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
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	</div>
</div>


<div id="div_travelDates">
 
<div style="width:100%; position:relative; margin:10px 2px 0px 2px; "> 
<span style="font-size:22px; color:DarkSlateGray;">
Based on your inputs we have suggested <b>6</b> vacation themes for this holiday. Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
</div>

<div style="float:left; width:100%; margin-top:5px;">
<span style="font-size:16px; color:DarkSlateGray; margin-left:100px; float:left; font-family:Calibri;">Enter email-id:</span>
<span style="float:left; margin-left:5px;"><input type="text" id="txtTrvlEml" name="txtTrvlEml" class="txtbox_Tab" style="width:200px;" placeholder="Enter Email-ID" onChange="ValidateEml();" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" /></span>
</div>

<div <?php if(isset($_GET['trvlDts'])) { ?> style="float:left; width:100%; display:block; padding-bottom:10px;" <?php } else {?> style="display:none;" <?php } ?>>
<span style="font-size:16px; color:DarkSlateGray; margin-left:100px; float:left; font-family:Calibri;">Chosen trip dates:</span>
<span style="float:left; margin-left:5px;"><?php if(isset($_GET['trvlDts'])) echo $_GET['trvlDts']; ?></span>
<span style="float:left; margin-left:10px;">
<input type="submit" id="txtSubmitDts" name="txtSubmitDts" value="Submit" class="smallbtn" style="width:60px;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack');" /></span>
</div>

<div style="width:100%; position:relative; float:left; margin-top:5px; display:block;">

<span style="width:50%; float:left; margin-top:2%;">
<div style="margin-bottom:20px; margin-left:35%;">
   <span style="font-size:24px; margin-bottom:20px;">
       <span style="float:none; cursor:pointer;">
	   <div class="optBtns" onClick="show_block('div_trvDate'); hide_block('div_sugstDates'); errase('drp_SelDt');"> My travel dates are known</div></span>
    </span>
</div>
</span>

<span style="width:50%; float:left; margin-top:2%;">
<div>
<span style="float:left; cursor:pointer;" onClick=" show_block('div_greyBack');">
<div class="optBtns" style="background:red;"  onClick="show_block('div_sugstDates'); hide_block('div_trvDate'); errase('txtfrmDt'); errase('txtToDt');">Just started planning</div></span>
</div> 
</span>

</div>

<?php
if(isset($_GET['trvlDts']))
{
if(strpos($_GET['trvlDts']," to ")>0)
{
  $dt1 = explode(" to ",$_GET['trvlDts']);
}
}

?>

<div id="div_trvDate"  style="display:none;  width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;" >
			<span style="width:40%; margin-left:0px;">
			  <span class="div_elements" style="font-size:18px;">From</span>			  
			  <span class="div_elements" style="font-size:18px; ">
			  <input type="text" id="txtfrmDt" name="txtfrmDt" class="div_elements" style="width:115px; height:20px;" value="<?php  if(isset($_GET['trvlDts'])) if(strpos($_GET['trvlDts']," to ")>0) echo $dt1[0];  ?>" /></span>
			  <span class="div_elements">
			  <div style="background:url(Images/calendar_icon.jpg); width:25px; height:25px; cursor:pointer;" onClick="oDP.show(event,'txtfrmDt',2); ShowContent('pickDate');"></div></span> 
			  </span>
			  
			  <span style="margin-top:5px; width:40%; margin-left:10px">
			  <span class="div_elements" style="font-size:18px;">To</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtToDt" name="txtToDt" class="div_elements" style="width:115px; height:20px;" value="<?php if(isset($_GET['trvlDts'])) if(strpos($_GET['trvlDts']," to ")>0) echo $dt1[1];  ?>" /></span>
			  <span class="div_elements"><div style="background:url(Images/calendar_icon.jpg); width:25px; height:25px; cursor:pointer;" onClick="oDP.show(event,'txtToDt',2); ShowContent('pickDate');"></div></span>
			   </span>
					 		  
			  <div  class="div_elements" align="center" style="overflow:none; float:right; margin-bottom:5px; margin-right:100px;">
			  <span  style="margin-left:160px; margin-top:10px;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_kn_dt('txtfrmDt','txtToDt');">
			  <input type="submit" id="txtSubmitDtRng" name="txtSubmitDtRng" value="Submit" class="smallbtn" style="width:80px;" onMouseOver="showEml();" /> </span> 
			  </div>
			</div>
			
 <span style="width:50%; float:right; margin-right:75px;">
			<div id="div_sugstDates" style="display:none; width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;">
			 <span class="div_elements" style="font-size:18px; margin-right:5px;">Travelling in  </span>			  
			  <span class="div_elements" style="font-size:14px; ">
			   <select id="drp_SelDt" name="drp_SelDt" onFocus="load_months();" style="width:110px;">
			   <?php
			    if(isset($_GET['trvlDts']))
				{
				 if(strpos($_GET['trvlDts']," to ")>0)
				   echo '<option value=""></option>';
				 else
			       echo '<option value="'.$_GET['trvlDts'].'">'.$_GET['trvlDts'].'</option>';
				}
				 else
				 echo '<option value=""></option>';
			    ?>		  
			   </select>
			  </span>							 		  
			  <div  class="div_elements" style="overflow:none; float:right; margin-right:60px; margin-bottom:5px;">
			  <span style="margin-left:160px; margin-top:10px;" onClick=" hide_block('div_travelDates'); hide_block('div_greyBack'); disp_unkn_Dt();">
			    <input type="submit" id="txtSubmitDts" name="txtSubmitDts" value="Submit" class="smallbtn" style="width:80px;" onMouseOver="showEml();" />  </span>
			  </div>
			</div>
			</span>

<div style="visibility: visible; position: absolute; left: 0px; top: 0px; display: none; z-index: 100000;" id="pickDate"></div>			
<script>
   	var oDP = new datePicker("pickDate");
 </script>	
</div>

<div id="div_greyBack" style="display:block; width:100%; height:600px; background: grey; opacity:0.8; position:absolute; z-index:100; margin:0% 0% 0% 0%;"></div>

<div style="float:left; width:100%;">

<?php
if(isset($_POST['txtSubmitDts']) || isset($_POST['txtSubmitDtRng']))
{
if($_POST["txtTrvlEml"]!="" && strpos($_POST["txtTrvlEml"],"@")>0 && strpos($_POST["txtTrvlEml"],".")>0 && strpos($_POST["txtTrvlEml"],".")<=strlen($_POST["txtTrvlEml"]))
{
if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs']) && isset($_GET['gender'])) 
		   {
	         include("PHP_Files/PHP_Connection.php");		
			   
			 if($_POST["drp_SelDt"]!="")
			 $dtss = $_POST["drp_SelDt"];
			 else
			 $dtss = $_POST["txtfrmDt"]." to ".$_POST["txtToDt"];
			 
			 $_SESSION["userEmail"] = $_POST["txtTrvlEml"];
			 $_SESSION["trvl_dates"] = $dtss;
			 
			// echo $dtss;
			if($_GET['type'] == "India")
			{
			$q_bld_insrt = "insert into build_trip_sel values('','','".$_GET['type']."','".addslashes($_GET['cCity'])."','".$_GET['mode']."','".$_GET['trvlr']."','".$_GET['gender']."','".addslashes($_GET['dur'])."','".$_GET['locType']."','".$_GET['locNum']."','".addslashes($_GET['locs'])."','".$dtss."','".addslashes($_POST["txtTrvlEml"])."','','','".$points."','".date('Y-m-d')."')";
$res_str =  mysqli_query($dam,$q_bld_insrt);
}
else
{
$q_bld_insrt = "insert into build_trip_sel values('','','".$_GET['type']."','".addslashes($_GET['cCity'])."','','".$_GET['trvlr']."','".$_GET['gender']."','".addslashes($_GET['dur'])."','','','','".$dtss."','".addslashes($_POST["txtTrvlEml"])."','','','".$points."','".date('Y-m-d')."')";
$res_str =  mysqli_query($dam,$q_bld_insrt);
}

$sel_eml = "select client_email from client_register where client_email='".$_POST["txtTrvlEml"]."'";
$res_eml = mysqli_query($conn,$sel_eml);

if($res_eml)
{
$eml_cnt = mysqli_num_rows($res_eml);
if($eml_cnt>0)
{
}
else
{
$q_reg_clnt = "insert into client_register values ('','CUSTOMER','".addslashes($_POST["txtTrvlEml"])."','','Prospect','','','".date('Ymd')."')";
$res_reg_clnt = mysqli_query($conn,$q_reg_clnt);
}
}

if($res_str)
{
$dts= false;
//echo 'done';
echo '<script type="text/javascript">';
echo 'hide_block(\'div_travelDates\')';
echo '</script>';
echo '<script type="text/javascript">';
echo 'hide_block(\'div_greyBack\')';
echo '</script>';
}
else
{
$dts = true;
echo "Error:".mysqli_error($dam);
}
}				   
 }
 else
 {
echo '<script type="text/javascript">';
echo 'alert(\'Please enter a valid email id.\')';
echo '</script>'; 
 } 
}

?>

<span style="float:left;" id="Sp_eml"><?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?></span>

<div id="body_container">

<!--------------------------------------- Pop ups -------------------------------------------------------------------------------------------->

<div id="div_moreOptions"
style="display:none;
   background:white;
   box-shadow: 2px 0px 6px grey;
   width:43%; 
   opacity:0.9;
   height:160px;  
   border-radius:10px;
  margin:15% 10% 10% 10%;
  position:absolute;
  text-align:center;
  z-index:10000;">
    <div  style="width:100%; margin-top:1px;">	
 <span style="font-size:24px; font-weight:700; color:black; float:right; margin-right:5px;">
 <a href="#" style="text-decoration:none;" onClick="close_popup();">
 <img id="cancelimg" src="Images/cancelbtn.png" width="30px" height="30px" style="text-decoration:none;" /></a></span> 
 	</div>
	<div style="width:100%;" align="center"> 
<span style="margin-left:0%; font-size:22px; color:DarkSlateGray;">Based on your inputs we suggested <span style="font-weight:bold;">9 vacation&nbsp;</span>options. <br/>Do you want to</span>
</div>
<div>
<span style="width:40%; float:left; margin-top:5%;">
<div style="margin-bottom:20px;">
   <span style="font-size:24px; margin-bottom:20px;">
       <span style="float:none;"><a href="#" style="text-decoration:none;" onClick="close_popup(); Show_All_Option();">
	   <div style="width:145px; height:43px; font-weight:700; border-radius:5px; background:#283C5F; border:1px solid darkblue; box-shadow:2px 2px 6px grey; color:#FFFFFF; font-family:Georgia, 'Times New Roman', Times, serif, Calibri; margin-left:120px; box-shadow: 2px 0px 8px 0px grey; font-size:16px;"> &nbsp; &nbsp; View all &nbsp; &nbsp; vacation options</div></a></span>
    </span>
</div>
</span>
<span style="width:40%; float:left; margin-top:5%; margin-right:0px;">
<div>
<span style="float:left;" onClick=" show_block('div_greyBack');"><a href="#" style="text-decoration:none;" onClick="show_block('div_CustomForm'); close_popup();">
<div style="width:140px;; height:43px; font-weight:700; border-radius:5px; background:red; border:1px solid OrangeRed; box-shadow:2px 2px 6px grey; margin-left:68px; color:#FFFFFF; font-family:Georgia, 'Times New Roman', Times, serif, Calibri; box-shadow: 2px 0px 8px 0px grey; font-size:16px;">Customize your vacation</div></a></span>
</div> </span>
</div>
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
			   	  <option value="<?php echo $_GET['cCity'] ?>" > <?php echo $_GET['cCity']; ?> </option>
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
		<input type="radio" value="Single" name="rdtravel" id="rdSingle" disabled="disabled" onClick="show_table_row('rdSingle','tr_ur_age','tr_kids_age'); show_trs('tr_ur_gen'); hide_block('sp_grp');" <?php if($_GET['trvlr']=="Single-Under 45" || $_GET['trvlr']=="Single-Above 45") { ?> checked="checked" <?php } ?>>Single</span>
				  <span class="div_elements">
				  <input type="radio" value="Couple" name="rdtravel" id="rdCouple" disabled="disabled" onClick="show_table_row('rdCouple','tr_ur_age','tr_kids_age'); hide_block('tr_ur_gen'); hide_block('tr_ur_gen'); hide_block('sp_grp');" <?php if($_GET['trvlr']=="Couple-Under 45" || $_GET['trvlr']=="Couple-Above 45") { ?> checked="checked" <?php } ?>>Couple</span>
				  <span class="div_elements"> 
				  <input type="radio" value="Group" name="rdtravel" id="rdGroup" disabled="disabled" onClick="show_table_row('rdGroup','tr_ur_age','tr_kids_age'); hide_block('tr_ur_gen'); hide_block('tr_ur_gen'); show_block('sp_grp');" <?php if($_GET['trvlr']=="Group-Under 45" || $_GET['trvlr']=="Group-Above 45"  || $_GET['trvlr']=="Group-Above 60") { ?> checked="checked" <?php } ?>>Groups </span>
				   <span class="div_elements" >
				   <input type="radio" value="FamilyKids" name="rdtravel" id="rdFamilykid"  disabled="disabled" onClick="show_table_row('rdFamilykid','tr_kids_age','tr_ur_age'); hide_block('tr_ur_gen');" <?php if(strpos($_GET['trvlr'],"amily Kids")>0) { ?> checked="checked" <?php } ?>> Family+Kids</span>
				  <span class="div_elements">
				  <input type="radio" value="GroupKids" name="rdtravel" id="rdGroupkid" disabled="disabled" onClick="show_table_row('rdGroupkid','tr_kids_age','tr_ur_age'); hide_block('tr_ur_gen');" <?php if(strpos($_GET['trvlr'],"roup Kids")>0) { ?> checked="checked" <?php } ?>>Group+Kids</span></td>				  
			   </tr>
			   
		       <tr id="tr_ur_age" <?php if(strpos($_GET['trvlr'],"Under 45")>0 || strpos($_GET['trvlr'],"Above 45")>0 || strpos($_GET['trvlr'],"Above 60")>0) { ?> style="display:table-row;" <?php } else{?> style="display:none;" <?php }?>>
			      <td><span class="div_elements"> Age:</span></td>
					<td><span class="div_elements">
					<input type="radio" id="chkageL45" name="chkage45" checked="checked" value="-Under 45" <?php if(strpos($_GET['trvlr'],"Under 45")>0) { ?> checked="checked" <?php } ?>>Under 45	
				 		 <input type="radio" id="chkageM45" name="chkage45" value="-Above 45" <?php if(strpos($_GET['trvlr'],"Above 45")>0) { ?> checked="checked" <?php } ?>> Above 45
						<span <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> class="div_elements" style="margin-left:2px; display:block;" <?php } else { ?>  style="display:none;" <?php } ?> id="sp_grp_age"> <input type="radio" id="chkageM60" name="chkage45" value="-Above 60" <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> checked="checked" <?php } ?>> Above 60</span>
				        </span>
				        </span></td>
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
					</span></td>
					
			   </tr>
			   
			   <tr id="tr_locType" <?php if($_GET['locType'] == "" || $_GET['dur']=="Weekend" || $_GET['dur']=="3Days"){?> style="display:none;" <?php } else {?>  style="display:table-row;" <?php }?>>
			     <td><span class="div_elements">Wants to holiday at:</span></td>
				<td> <span class="div_elements">				 
					  <input type="radio" value="Single Location" id="rdsinglType" name="rdLocType" onClick="chk_locTyp(this.value);" <?php if($_GET['locType']=="Single Location") { ?> checked="checked" <?php } ?> />Single Location </option>
					  <input type="radio" value="Multiple Locations" id="rdmulType" name="rdLocType" onClick="chk_locTyp(this.value);"  <?php if($_GET['locType']=="Multiple Locations") { ?> checked="checked" <?php } ?> />Multiple Locations </option>	
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
			   
			   <tr id="tr_singl_loc" <?php if($_GET['locType'] == "Single Location" && $_GET['dur']!="Weekend" && $_GET['dur']!="3Days") { ?> style="display:table-row;" <?php } else {?> style="display:none;" <?php } ?>>
			      <td><span class="div_elements" style="float:left;">Preferred Locations :</span></td>
				  <td>
				    <select class="div_elements" name="drpSiglLoc" id="drpSiglLoc" style="width:150px;">
					<?php
					 if(strpos($_GET['locs'],",")>0)
					{
					echo '<option value="select" >---- select ---- </option>';
					}
					else
					echo '<option value="'.$_GET['locs'].'" >'.$_GET['locs'].'</option>';
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
			   
			   <tr id="tr_mult_loc" <?php if($_GET['locType'] == "Multiple Locations" && $_GET['dur']!="Weekend" && $_GET['dur']!="3Days") { ?> style="display:table-row;" <?php } else {?> style="display:none;" <?php } ?>>
			     <td><span class="div_elements" style="float:left;">Preferred Locations :</span></td>
				 <td>
				       <div id="div_City"  style="display:block; border-radius:5px; overflow-y:scroll; overflow-x:hidden; float:left; margin-top:0px; 
						    width: 200px; height:80px; border: 1px solid #336699;" onClick="show_block('div_splreq');">
							<div align="center" style="width:70%;">
		         <?php
				 if(strpos($_GET['locs'],",")>0)
				 {
				   $loc = explode(", ",$_GET['locs']);
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
			      <td align="right"><a id="href_buildpck_1" onClick=" build_pck_again(); hide_block('div_CustomForm'); hide_block('div_greyBack');">
				  <span class="smallbtn" style="width:60px; float:none;">Modify</span></a></td>
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
				 <input type="submit" class="smallbtn" name="btnSub_custm_frm" style="width:60px; float:none;" onClick="validate_email('txtemails');" value="Submit"></td>
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
			<input type="text" id="txtcCity" name="txtcCity" class="txtbox_Tab" style="width:200px;" disabled="disabled" value="<?php echo $_GET['cCity']; ?>"  onMouseOver="txtbox_color_onmouseover('searchid');" placeholder="Current City" onMouseOut="txtbox_color_onmouseout('searchid');" onClick="show_explore(this.id);"; onKeyUp="toUpper(this.id);" onKeyPress="curCty(this.value);  show_block('result_pl');" /> 
			       </span>
			<div id="result_pl" style="position:absolute; bottom:-123px; width:300px; left:217px;  height:90px; background:#fff; display:none; border:1px solid #444;"></div>
				    </td>
				
			   </tr>
			   
			   <tr>
			      <td><span class="div_elements" style="float:left;">Travellers Are :</span></td>
			      <td>	
						  <span class="div_elements">
						 <input type="radio" value="Single" name="rdtravel_abr" id="rdSingle_abr" checked="checked" disabled="disabled" onClick="show_table_row('rdSingle_abr','tr_ur_age_abr','tr_kids_age_abr'); show_trs('tr_ur_gen_abr');" <?php if($_GET['trvlr']=="Single-Under 45" || $_GET['trvlr']=="Single-Above 45") { ?> checked="checked" <?php } ?>>Single</span>
				  <span class="div_elements">
				  <input type="radio" value="Couple" name="rdtravel_abr" id="rdCouple_abr" disabled="disabled" onClick="show_table_row('rdCouple_abr','tr_ur_age_abr','tr_kids_age_abr'); hide_block('tr_ur_gen_abr');" <?php if($_GET['trvlr']=="Couple-Under 45" || $_GET['trvlr']=="Couple-Above 45") { ?> checked="checked" <?php } ?>>Couple</span>
				  <span class="div_elements"> 
				  <input type="radio" value="Group" name="rdtravel_abr" id="rdGroup_abr" disabled="disabled" onClick="show_table_row('rdGroup_abr','tr_ur_age_abr','tr_kids_age_abr');  hide_block('tr_ur_gen_abr');" <?php if($_GET['trvlr']=="Group-Under 45" || $_GET['trvlr']=="Group-Above 45"  || $_GET['trvlr']=="Group-Above 60") { ?> checked="checked" <?php } ?>>Groups </span>
				   <span class="div_elements">
				   <input type="radio" value="Family+Kids" name="rdtravel_abr" id="rdFamilykid_abr"  disabled="disabled" onClick="show_table_row('rdFamilykid_abr','tr_kids_age_abr','tr_ur_age_abr');  hide_block('tr_ur_gen_abr');" <?php if(strpos($_GET['trvlr'],"amily Kids")>0) { ?> checked="checked" <?php } ?>> Family+Kids</span>
				  <span class="div_elements">
				  <input type="radio" value="Group+Kids" name="rdtravel_abr" id="rdGroupkid_abr" disabled="disabled" onClick="show_table_row('rdGroupkid_abr','tr_kids_age_abr','tr_ur_age_abr');  hide_block('tr_ur_gen_abr');" <?php if(strpos($_GET['trvlr'],"roup Kids")>0) { ?> checked="checked" <?php } ?>>Group+Kids</span></td>				  
			   </tr>
			   
			   <tr id="tr_ur_age_abr" <?php if(strpos($_GET['trvlr'],"Under 45")>0 || strpos($_GET['trvlr'],"Above 45")>0 || strpos($_GET['trvlr'],"Above 60")>0) { ?> style="display:table-row;" <?php } else{?> style="display:none;" <?php }?>>
			      <td><span class="div_elements"> Age:</span></td>
					<td><span class="div_elements">
					<input type="checkbox" id="chkageL45_abr" name="chkageL45_abr" value="-Under 45" <?php if(strpos($_GET['trvlr'],"Under 45")>0) { ?> checked="checked" <?php } ?>>Under 45	
				 		 <input type="checkbox" id="chkageM45_abr" name="chkageM45_abr" value="-Above 45" <?php if(strpos($_GET['trvlr'],"Above 45")>0) { ?> checked="checked" <?php } ?>> Above 45
				        </span>
						<span <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> class="div_elements" style="float:left; margin-left:2px; display:block;" <?php } else { ?>  style="display:none;" <?php } ?> id="sp_grp_age"> <input type="radio" id="chkageM60" name="chkage45" value="-Above 60" <?php if(strpos($_GET['trvlr'],"Above 60")>0) { ?> checked="checked" <?php } ?>> Above 60</span>
				        </span></td>
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
					<input type="checkbox" id="chkkid_abr" name="chkkid_abr" value="0-2yrs" <?php if(strpos($_GET['trvlr'],"0-2")>0) { ?> checked="checked" <?php } ?>>0-2Yrs	
				<input type="checkbox" id="chkchild_abr" name="chkchild_abr" value="2-12yrs" <?php if(strpos($_GET['trvlr'],"2-12")>0) { ?> checked="checked" <?php } ?>> 2-12Yrs 
    <input type="checkbox" id="chkchildplus_abr" name="chkchildplus_abr" value="12+yrs" <?php if(strpos($_GET['trvlr'],"12plus")>0) { ?> checked="checked" <?php } ?>> 12+Yrs 
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
			      <td align="right"><a id="href_buildpck_2" onClick=" build_pck_again(); hide_block('div_CustomForm'); hide_block('div_greyBack');">
				  <span class="smallbtn" style="width:60px; float:none;">Modify</span></a></td>
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
				 <input type="submit" class="smallbtn" id="btnSub_custm_frm_abr" name="btnSub_custm_frm_abr" style="width:60px; float:none;"></td>
			   </tr>
					
					</table>
				</div>	 
			
			
</div>
			
<div id="div_CustomThanku" <?php if($enqFrm == true){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
          
			 <div style="width:100%;"><span style="float:right; margin-right:10px; margin-top:5px;" onClick="hide_block('div_CustomThanku'); hide_block('div_greyBack'); hide_block('div_travelDates');">
			 <a href="#"><img src="Images/cancelbtn1.png" width="30px" height="30px" /></a></span></div>     
				 <div class="div_elements" style="font-size:24px;color:#0066FF;margin-top:15px; margin-left:10px;">
				       Thank you for submitting your custom vacation requirements. <Br/> Our support team will revert in next 48 hours
					   <div style="width:100%; float:left;">Your Enquiry ID : <?php echo $enqID; ?></div>				 
				  </div>
				 
			</div>

<div id="onCursor" 
   style="display:none; 
      position:absolute; 
       ">
<button type="button"> Click to Select </button>
</div> 

<div id="div_body"> 
	     
	  <div id="body_header_btn" align="left" style="position:relative; background:none; margin-bottom:0px; color:#002929; border-radius:5px;" > 
			   <span style="width:31%;float:left;">
				 <a href="#" style="text-decoration:none;" onClick="Show_Block1();" onMouseOver="ShowContent('contextBuild');" onMouseOut=" HideContent('contextBuild');" onDblClick="Hide_Block1();">  <div id="div_BuildTrip" class="tripHeaderbtn" style="width:94%;" onClick="div_green('div_BuildTrip');" onMouseOver="div_green('div_BuildTrip');" onMouseOut="div_white('div_BuildTrip');">Your Inputs are..
				</div> </a></span>
				<span style="width:63%;float:left; margin-left:0px;">
				<a href="#" style="text-decoration:none;" onClick="div_green('div_Inputs'); Show_Block2();" onMouseOver="div_green('div_Inputs'); ShowContent('contextInputs');" onMouseOut=" HideContent('contextInputs');" onDblClick="Hide_Block2();"><div class="tripHeaderbtn" id="div_Inputs" onClick="div_green('div_Inputs');" onMouseOver="div_green('div_Inputs');" onMouseOut="div_white('div_Inputs');" style="width:100%;"><span id="span_header">Based on your inputs, we suggest following vacations </span>
				 </div> </a></span>
			
		</div>
	
 <div style="width:100%; float:left;">
	
	   	  <span style="float:left; width:26%; margin-top:3px;"> 
		  
		   <div  id="left_inputs"  onmouseover="div_green('div_BuildTrip');" onMouseOut="div_white('div_BuildTrip');">		   
	        <div id="inputTab" style="width:280px; height:auto; padding:3px; padding-bottom:30px; background:#597272; opacity:0.5;">
	            <div id="div_collectInputs">
				  <div style="padding-top:10px;">
				  <?php				 
				  if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs'])) 
				  {
				  if($_GET['type']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to tavel &nbsp;</span><span id="sptype" style="float:left; margin-left:0px;"> '.$_GET['type'].'</span></div>';
				  if($_GET['cCity']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Currently I\'m at </span><span id="spCurr" style="float:left; margin-left:2px;">'.$_GET['cCity'].'</span></div>';
				   if($_GET['mode']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Prefer travelling by </span><span id="spMode" style="float:left; ">'.$_GET['mode'].'</span></div>';
				   if($_GET['trvlr']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Travelling with </span><span id="spTrvlr" style="float:left; margin-left:2px;">'.$_GET['trvlr'].'-'.$_GET['gender'].'</span></div>';
				   if($_GET['dur']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to go for </span><span id="spDur" style="float:left; margin-left:2px;">'.$_GET['dur'].'</span><span style="float:left; margin-left:2px;">Vacation</span></div>';
				   if($_GET['locType']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span id="splocType" style="float:left;">'.$_GET['locType'].'</span></div>';
				   if($_GET['locNum']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to holiday at </span><span id="spNum" style="float:left;">'.$_GET['locNum'].'</span><span style="float:left; margin-left:2px;">locations</span></div>';
				   if($_GET['locs']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Preferred locations </span><span id="spPref" style="float:left; margin-left:2px; font-size:12px;">'.$_GET['locs'].'</span></div>';
				  }
				  else if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['gender']))
					{
					if($_GET['type']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to tavel &nbsp;</span><span id="sptype" style="float:left; margin-left:0px;"> '.$_GET['type'].'</span></div>';
				  if($_GET['cCity']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Currently I\'m at </span><span id="spCurr" style="float:left; margin-left:2px;">'.$_GET['cCity'].'</span></div>';
				  if($_GET['trvlr']!="")
				  echo ' <div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Travelling with </span><span id="sptrvlr" style="float:left; margin-left:2px;">'.$_GET['trvlr'].'</span>-<span id="spGen">'.$_GET['gender'].'</span></div>';
				   if($_GET['dur']!="")
				  echo '<div style="height:30px; background:#F5F5F5; margin:3px; padding:1px;"><span style="float:left;">Wants to go for </span><span id="spDur" style="float:left; margin-left:2px;">'.$_GET['dur'].'</span><span style="float:left; margin-left:2px;">Vacation</span></div>';
				     }				
				  
				  ?>					
					<div><span style="float:right;">
					<a href="index.php"><span class="smallbtn" style="width:60px; background:#002929; color:#FFFFFF;">Modify</span></a>
						</span></div>	
					</div>					
		      	</div>
			</div>
		  </div>  
		  
           <div id="div_pg_Dt" style="width:100%; border:1px solid #DDDDDD; border-radius:5px; height:50px; position:relative; float:left; margin-top:5px; margin-left:5px;">
		     <div style="float:left; width:100%;">		 
			 <span class="div_elements" style="font-size:16px;">My travel plans are in:</span>
			 <span id="sp_trvDate" class="div_elements" style="color:#002929; font-size:16px;"><?php if(isset($_SESSION["trvl_dates"])) echo $_SESSION["trvl_dates"]; ?></span>
			 </div>			 
		  </div>
		  
		  <?php 
		  if($_GET['locType'] == "Multiple Locations" ||  $_GET['type'] == "Abroad")
		  {
		  echo '<div style="float:left; width:100%; margin-top:5px; height:200px; overflow-y:scroll; overflow-x:hidden; display:block;" >
			   <div style="float:left; width:100%;"><span style="float:left;" class="input_Ans">Chosen vacation themes: </span></div>
		      <div id="sel_vac_thm_chk" style="float:left; width:100%; margin-top:5px; height:auto;"></div>';	
			
			if($_GET['type'] == "Abroad")
			{
			  echo '<div style="float:left; width:100%; margin-top:5px; display:block;">
			  <span style="float:left;">
			   <div class="smallbtn" style="width:100px; height:40px; padding:3px;" onClick="show_dest(); show_block(\'div_selVac_sub\');" >Show popular<br/> destinations</div></span>
			  <span style="float:left; margin-left:3px;"><div class="smallbtn" style="width:100px; height:40px; padding:3px;" onClick="show_block(\'div_selMy_dest\');">I will select<br/> my destinations</div></span>
			  </div>';
			}  
			else if($_GET['type'] == "India")
			{
			  echo '<div style="float:left; width:100%; margin-top:5px; display:block;">
			    <span style="float:left;">
			   <div class="smallbtn" style="width:80px; height:20px; padding:3px;" onClick="show_block(\'div_selVac_sub\');" >Submit</div></span>  
			  </div>';
			 
			 }
			   echo ' </div>';
			  }
			  
			  ?>
			  	  
		</span>  
					
<span style="float:left; width:70%; margin-top:3px;">		
	
<div  style="display:block; width:100%; float:left; overflow:hidden; margin-top:0px; height:480px; margin:0% 0% 0% 0%;"> 
			    			
<!--------------------------------------------------------   6 Options ---------------------------------------------------------------------------------------->							

	       	<div id="div_6opt"  style="width:100%; height:450px; margin-top:0px; margin-left:50px; position:relative; display:block; overflow-y:scroll; overflow-x:scroll; float:left;" onMouseOver="div_green('div_Inputs');" onMouseOut="div_white('div_Inputs');">		 	
			<div style="float:left; width:98%; height:500px;">
			<?php
			if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs']) && isset($_GET['gender']) || isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['gender'])) 
		   {
		   
		   if($_GET['dur'] == "Weekend" && $_GET['type'] == "India")
		   {
		    while($row = mysqli_fetch_array($res_wkend6))
			{
	            		   echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 	 		  	 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';          
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
				  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			}
		   }
		   
		    if($num_rows == $n6)
				 {				
				   if($res_img)
			         {
			          while($row = mysqli_fetch_array($res_img))
			             {			  
			               echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			             }
			          }
				 }
				 
		   	 else if($num_rows<$n6 and $rankPlus!="")
	                  {					     
				  if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
					  {
					  $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' ".$order." ".$limit6."";
				        $res_vac = mysqli_query($dam,$sel_vac);
					  }
					  else 
					  {
					   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' ".$order." ".$limit6."";
				        $res_vac = mysqli_query($dam,$sel_vac);
					  }
					   
				 if($res_vac)
	            {
				 $cnt_rows = mysqli_num_rows($res_vac);	
				 
				 if($cnt_rows == $n6)
				 {
				    while($row = mysqli_fetch_array($res_vac))
			             {			  
			               echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			             }
				 }
				 
				 else if($cnt_rows < $n6 && $rankPlus_1!="")
		             {		
				   if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' ".$order." ".$limit6."";
				 $res_vac1 = mysqli_query($dam,$sel_vac);
				  }
				  else 
	                   {
			                   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and vac_title<>'HONEYMOON ESCAPE' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus."' or  vac_title<>'WEEKEND GETAWAY' and vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus_1."' ".$order." ".$limit6."";
				               $res_vac1 = mysqli_query($dam,$sel_vac);
				        }
							
				 
			          	   if($res_vac1)
		                     {
				   				$cnt_rows1 = mysqli_num_rows($res_vac1);
								
								if($cnt_rows1 == $n6)
								  {
								     while($row = mysqli_fetch_array($res_vac1))
			           					{			  
			             				  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		  
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            				 }
								   }
				    			
								else if($cnt_rows1  < $n6 && $rankPlus_2!="")
			                 	      {			                     
									    if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				                      {
			                              $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' ".$order." ".$limit6."";
				                       $res_vac2 = mysqli_query($dam,$sel_vac);
				                       }
									   else 
	                                  {
			                             $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  ".$order." ".$limit6."";
				                            $res_vac2 = mysqli_query($dam,$sel_vac);
				                        }
										
				 
			                             if($res_vac2)
			                             {
				                            $cnt_rows2 = mysqli_num_rows($res_vac2);
											 if($cnt_rows2 == $n6)
										   {
											 while($row = mysqli_fetch_array($res_vac2))
			           					      {			  
			             				        echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            				      }
											 }
				                            else if($cnt_rows2  < $n6 && $rankPlus_3!="")
				                                {
				                     	  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				                                 {
			                                      $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_3."'  ".$order." ".$limit6."";
				                                  $res_vac3 = mysqli_query($dam,$sel_vac);
				                                 }
												  else 
	                                                 {
			                                     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_3."' ".$order." ".$limit6."";
				                                 $res_vac3 = mysqli_query($dam,$sel_vac);
				                                  }
												  
				                                }
						              
									         else if($cnt_rows2 < $n6 && $rankMinus!="")
			                                  	 {						                      
										 if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||$_GET['trvlr'] == "spouse/partner-Above 45")
				 							{
												$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit6."";
											 $res_vac3 = mysqli_query($dam,$sel_vac);
											 }
											 else 
											 {
											 $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE'  and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' ".$order." ".$limit6."";
											 $res_vac3 = mysqli_query($dam,$sel_vac);
											  }										
											   
								       
									             if($res_vac3)
						    		               {
				 				            		 $cnt_rows3 = mysqli_num_rows($res_vac3);
													 
													 if($cnt_rows3 == $n6)
													 {
													    while($row = mysqli_fetch_array($res_vac3))
			           					                 {			  
			             				                    echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		  
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            				                 }
													 }
													 
				  				            		 else if($cnt_rows3 < $n6 && $rankMinus_1!="")
				 	                        		  {
                     		           	  if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
												 {
													$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
													 $res_vac4 = mysqli_query($dam,$sel_vac);
												 }
												 else 
	                                            {
			  									   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
													 $res_vac4 = mysqli_query($dam,$sel_vac);
												 }											       
				 
				             				        	if($res_vac4)
		                           				        {
													     $cnt_rows4 = mysqli_num_rows($res_vac4);
													      if($cnt_rows4 == $n6)
													 	   {
															while($row = mysqli_fetch_array($res_vac4))
			           					                     {			  
			             				                      echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 		  
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            				                     }
															}
														else if($cnt_rows4 < $n6 && $rankMinus_2!="")
	              										  {														   
							 if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or   vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				 else 
                 	{
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				
															 if($res_vac5)
																{
																 $cnt_rows6 = mysqli_num_rows($res_vac);
																 if($cnt_rows6 == $n6)
																 {
																   while($row = mysqli_fetch_array($res_vac5))
			           					                   			  {			  
			             				                   				   echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            				                    		  }
																 }
																else  if($cnt_rows6<6 && $rankMinus_3!="")
	             											       {  										        
				                                            
																    if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				                                                   {
			                                                          $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit6."";
				                                                    $res_vac5 = mysqli_query($dam,$sel_vac);
				                                                   }
																   else 
	     			                                               {
			                                                         $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit6."";
				                                                    $res_vac5 = mysqli_query($dam,$sel_vac);
				                                                   }
																  
				 													if($res_vac5)
																	{
																	  while($row = mysqli_fetch_array($res_vac5))
																	  {
																	    echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 		 	 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
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
			        					      while($row = mysqli_fetch_array($res_vac2))
			            					   {			  
			             						  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
              if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			            						}
						  	 
				                             }
				 
				                          }		    				                 
						             
						        	  }
							
					               
								  else if($cnt_rows1 < $n6 && $rankMinus!="")
				                     {					
				 if($_GET['type']=="India" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type']=="India" && $_GET['trvlr'] == "Couple-Above 45" || $_GET['type']=="India" &&  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type']=="India" && $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where ranks='".$rank."' or  ranks='".$rankPlus."' or ranks='".$rankPlus_1."' or ranks='".$rankPlus_2."' or ranks='".$rankMinus."'  ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 else if($_GET['type']=="Abroad" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "Couple-Above 45" || $_GET['type']=="Abroad" &&  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 else if($_GET['type'] == "Abroad")
	     		 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 } 
				 else
	     		 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankMinus."' ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 } 
				 if($res_vac3)
				  		 {
					      $cnt_rows3 = mysqli_num_rows($res_vac3);
					     if($cnt_rows3<6 && $rankMinus_1!="")
				 		       {                     		 

				  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				  else 
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 } 
				 			 
				                if($res_vac4)
		                        		 {
				 $cnt_rows4 = mysqli_num_rows($res_vac4);
				 
				 if($cnt_rows4 < $n6 && $rankMinus_2!="")
	               {			
				 if($_GET['type'] == "India" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type'] == "India" && $_GET['trvlr'] == "Couple-Above 45" || $_GET['type'] == "India" && $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type'] == "India" && $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where ranks='".$rank."' or  ranks='".$rankPlus."' or ranks='".$rankPlus_1."' or ranks='".$rankPlus_2."' or ranks='".$rankMinus."' or ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else if($_GET['type'] == "Abroad" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type'] == "Abroad" && $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['type'] == "Abroad" && $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type'] == "Abroad" && $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else if($_GET['type'] == "Abroad")
                  {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
			 	else
                  {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				 
				 if($res_vac5)
		            		 {
				 $cnt_rows6 = mysqli_num_rows($res_vac);
				 if($cnt_rows6 < $n6 && $rankMinus_3!="")
	             		 {		        
					 if($_GET['type']=="Abroad" && $_GET['trvlr'] == "Couple-Under 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "Couple-Above 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	     			 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 
				 }
				 }
				 
				 }
				 
				 }
				 	}
					
								    }
					                 }  	
					         }							 
					 }		 
						
				  else if($cnt_rows < $n6 && $rankMinus!="")
				     {
				    if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 } 
				 else 
	     		{
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
												
						if($res_vac3)
						 {
				 				  $cnt_rows3 = mysqli_num_rows($res_vac3);
								  if($cnt_rows3 == $n6)
						    		  {
								    while($row = mysqli_fetch_array($res_vac3))
									{
								      echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		  
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									}
								  }
				  				 else if($cnt_rows3 < $n6 && $rankMinus_1!="")
				 		          {          
			
				 if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	               {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 } 
				               if($res_vac4)
		                                 {
									     $cnt_rows4 = mysqli_num_rows($res_vac4);
										 if($cnt_rows4 == $n6)
								     		 {
										   while($row = mysqli_fetch_array($res_vac4))
								        	{
								              echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 	 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									         }
										 }
										 				 
									     else if($cnt_rows4 < $n6 && $rankMinus_2!="")
	      							        {				
				 if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				 
				 
											 if($res_vac5)
		    								    {
												 $cnt_rows6 = mysqli_num_rows($res_vac4);
												 
												 if($cnt_rows6 == $n6)
									               	 {
												    while($row = mysqli_fetch_array($res_vac4))
								                 	{
								                       echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
              if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 	 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									                }
												 }
												 												 
												 else if($cnt_rows6 < $n6 && $rankMinus_3!="")
	             								       {        								
												
													  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
													 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													 else 
	     			 					         {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
										
				    							  }
												}
				 
											 }
				     				 }
				 		 
				 				  }
						 }
					}							
				
				 }			
				 
				}
				
			else if($num_rows < $n6 && $rankMinus!="")
				     {					
				 if($_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }  
				 else 
	               {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' ".$order." ".$limit6."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 								
						if($res_vac3)
						 {
						 $cnt = 0;
				 				  $cnt_rows3 = mysqli_num_rows($res_vac3);
								  if($cnt_rows3 == $n6)
						         {
								    while($row = mysqli_fetch_array($res_vac3))
									{
									$cnt = $cnt+1;
									if($cnt<=$n6)
									{
								      echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		 	 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									}
									}
								  }
				  				
								 else if($cnt_rows3 < $n6 && $rankMinus_1!="")
				 		             {             
	 
				  if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 } 
				 else 
	              {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' ".$order." ".$limit6."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				 				 
				                   if($res_vac4)
		                                 {
									     $cnt_rows4 = mysqli_num_rows($res_vac4);
										 if($cnt_rows4 == $n6)
								     		 {
										   while($row = mysqli_fetch_array($res_vac4))
								        	{
								              echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
              if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 		  	 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									         }
										 }
										 				 
									     else if($cnt_rows4 < $n6 && $rankMinus_2!="")
	      							        {											
				 		   if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }  
				  else 
                 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 
				 
											 if($res_vac5)
		    								    {
												 $cnt_rows6 = mysqli_num_rows($res_vac4);
												 
												 if($cnt_rows6 == $n6)
									               	 {
												    while($row = mysqli_fetch_array($res_vac4))
								                 	{
								                       echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
              if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 		 		 
		         echo '<div id="oth_opt_6_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_6_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_6_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_6_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_6_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_6_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_6" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_6" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';			
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk6_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_6_btn_'.$row["vac_id"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\');"  /></span><span id="sp_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_6_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_6_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_6_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
									                }
												 }
												 												 
												 else if($cnt_rows6 < $n6 && $rankMinus_3!="")
	             								       {
		           								  
											 if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
													 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													  else 
	     			 					         {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' andvac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit6."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													
				    							  }
												}
				 
											 }
				     				 }
				 		 
				 				  }
						 }
					}			
				 
		     
		 }
	  ?>
	</div>	
	</div>

	        <div id="div_some_more" style="margin-top:25px; display:none;">
		<span class="more_link" style="margin-left:80%; color:blue; cursor:pointer;" onClick="display_popup();">
		More options...</span>
		</div>

  <!----------------------------------------------    9 Options ----------------------------------------------------------------------------------------------------->
  
  <div id="div_9opt" style=" display:none; width:100%; height:450px; margin-top:0px; margin-left:50px; position:relative; overflow-y:scroll; overflow-x:hidden; float:left;" onMouseOver="div_green('div_Inputs');" onMouseOut="div_white('div_Inputs');">
  <div style="width:98%; float:left;">
	<?php
	if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs']) || isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['gender'])) 
	{
		 
		if($_GET['dur'] == "Weekend" && $_GET['type'] == "India")
		   {
		    while($row = mysqli_fetch_array($res_wkend9))
			{
	          echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img9_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  />';
			 	 		  	 		 
		         echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:98%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			  <span style="float:left; width:60%;">
			  <div sytle="width:100%; float:left;"><span class="input_Ans" style="color:#fff; font-size:12px;">Trip Agenda</span></div>
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value); showSubsec(this.id,\''.$row["vac_title"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_6" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;"> 
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_6" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_9_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		
			echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			<span style="float:left; width:60%;">
		  <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';			 
			 echo  '<div style="float:left; width:100%">';          
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
				  
			echo ' </div>';				
			 echo '</div>';
			echo '</span>';				
			}
		   }
		 
		 
		   if($num_rows == $n9)
			{
			    if($res_img)
			         {
			          while($row = mysqli_fetch_array($res_img))
			             {	 	 
	                       echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			             }
			          }
			}	 
		   
               if($num_rows < $n9 && $rankPlus!="")
	                     {		      
			
					    if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				      {
				       $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."'  ".$order." ".$limit9."";
				       $res_vac = mysqli_query($dam,$sel_vac);
				      }
					   else 
		               {
			             $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."'  ".$order." ".$limit9."";
				        $res_vac = mysqli_query($dam,$sel_vac);
				       }
					  
				 if($res_vac)
	            			 {
				 $cnt_rows = mysqli_num_rows($res_vac);	
				 
				 if($cnt_rows == $n9)
			        	 {
				    while($row = mysqli_fetch_array($res_vac))
			             {			  
			               	echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  />';
			 }			 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			          }
				 }
				 
				 else if($cnt_rows < $n9 && $rankPlus_1!="")
		                         {	                   
				          if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				            {
			   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."'  ".$order." ".$limit9."";
				                $res_vac1 = mysqli_query($dam,$sel_vac);
				             }
							 else 
	                          	{
			                   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."'  ".$order." ".$limit9."";
				               $res_vac1 = mysqli_query($dam,$sel_vac);
				            }
							   				 
			          	   if($res_vac1)
		                               {
				   				$cnt_rows1 = mysqli_num_rows($res_vac1);
								
								if($cnt_rows1 == $n9)
								  {
								     while($row = mysqli_fetch_array($res_vac1))
			           					{			  
			             				 echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }			 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            				 }
								   }
				    			
								else if($cnt_rows1  < $n9 && $rankPlus_2!="")
			                 	      {		
									 	                       
				                      if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				                     {
			                              $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  ".$order." ".$limit9."";
				                       $res_vac2 = mysqli_query($dam,$sel_vac);
				                       }
									   else 
	                                       {
			                             $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'   ".$order." ".$limit9."";
				                            $res_vac2 = mysqli_query($dam,$sel_vac);
				                        }
									   
				   
			                             if($res_vac2)
			                             {
				                            $cnt_rows2 = mysqli_num_rows($res_vac2);
											 if($cnt_rows2 == $n9)
									         	   {
											 while($row = mysqli_fetch_array($res_vac2))
			           					      {			  
			             				          echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
           if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            				      }
											 }
				                            else if($cnt_rows2  < $n9 && $rankPlus_3!="")
				                                        {                                
				                               
												  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				                                 {
			                                      $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_3."'   ".$order." ".$limit9."";
				                                  $res_vac3 = mysqli_query($dam,$sel_vac);
				                                 }
												 else 
	                                              {
			                                     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_3."'  ".$order." ".$limit9."";
				                                 $res_vac3 = mysqli_query($dam,$sel_vac);
				                                  }
												
				                                }
						              
									         else if($cnt_rows2 < $n9 && $rankMinus!="")
			                                  	 {						                     
										       if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 							{
												$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'   ".$order." ".$limit9."";
											 $res_vac3 = mysqli_query($dam,$sel_vac);
											 }
											  else
	     						                   {
			    								 $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit9."";
											 $res_vac3 = mysqli_query($dam,$sel_vac);
											 }										   
								       
									             if($res_vac3)
						    		                     {
				 				            		 $cnt_rows3 = mysqli_num_rows($res_vac3);
													 
													 if($cnt_rows3 == $n9)
													 {
													    while($row = mysqli_fetch_array($res_vac3))
			           					                 {			  
			             				                    echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            				                 }
													 }
													 
				  				            		 else if($cnt_rows3 < $n9 && $rankMinus_1!="")
				 	                        	      	  {                   		                     
											 
												  if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
												 {
													$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
													 $res_vac4 = mysqli_query($dam,$sel_vac);
												 }
												 else 
	                                                 {
			  									   $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
													 $res_vac4 = mysqli_query($dam,$sel_vac);
												 }
									        
				 
				             				        	if($res_vac4)
		                           		      	          	        {
													     $cnt_rows4 = mysqli_num_rows($res_vac4);
													      if($cnt_rows4 == $n9)
													 	   {
															while($row = mysqli_fetch_array($res_vac4))
			           					                     {			  
			             				                      echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            				                     }
															}
														else if($cnt_rows4 < $n9 && $rankMinus_2!="")
	              										  {													 
	                                                       				  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                  {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				 
				 
															 if($res_vac5)
													     			{
																 $cnt_rows6 = mysqli_num_rows($res_vac);
																 if($cnt_rows6 == $n9)
																 {
																   while($row = mysqli_fetch_array($res_vac5))
			           					                   			  {			  
			             				                   				echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            				                    		  }
																 }
																else  if($cnt_rows6 < $n9 && $rankMinus_3!="")
	             											       {		            										       
				                                                  if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['type']=="Abroad" && $_GET['trvlr'] == "spouse/partner-Above 45")
				                                                   {
			                                                          $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'  ".$order." ".$limit9."";
				                                                    $res_vac5 = mysqli_query($dam,$sel_vac);
				                                                   }
																     else 
	     			                                                {
			                                                         $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'  ".$order." ".$limit9."";
				                                                    $res_vac5 = mysqli_query($dam,$sel_vac);
				                                                   }
																   
				 											        		if($res_vac5)
																	{
																	  while($row = mysqli_fetch_array($res_vac5))
																	  {
	                                                                														            echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
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
			        					      while($row = mysqli_fetch_array($res_vac2))
			            					   {			  
			             						  	echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }			 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
			            						}
						  	 
				                             }
				 
				                          }		    				                 
						             
						        	  }
							
					               
								  else if($cnt_rows1 < $n9 && $rankMinus!="")
				                     {
				  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or   vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'   ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	             {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 
							      	 if($res_vac3)
						             {
									  $cnt_rows3 = mysqli_num_rows($res_vac3);
									  if($cnt_rows3 == $n9)
									  {
									  while($row = mysqli_fetch_array($res_vac3))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
									  }
				  				     else if($cnt_rows3 < $n9 && $rankMinus_1!="")
				 	                  	      {                   		              
                                               				 
				 if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				  else 
	               {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 } 
				 			 
	                     	if($res_vac4)
		                                {
				 $cnt_rows4 = mysqli_num_rows($res_vac4);
				  if($cnt_rows4 == $n9)
									  {
									  while($row = mysqli_fetch_array($res_vac4))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
									  }
				 if($cnt_rows4 < $n9 && $rankMinus_2!="")
		           {				
				 if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                  {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				  				 
				 if($res_vac5)
		                 {
				 $cnt_rows6 = mysqli_num_rows($res_vac);
				  if($cnt_rows6 == $n9)
									  {
									  while($row = mysqli_fetch_array($res_vac5))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
									  }
				 else if($cnt_rows6 < $n9 && $rankMinus_3!="")
	                {		          
 			   if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
				 $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	     			 {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 
				 if($res_vac5)
				 {
				 $cnt_rows7 = mysqli_num_rows($res_vac5);
				  if($cnt_rows7 == $n9)
									  {
									  while($row = mysqli_fetch_array($res_vac5))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
									  }
				 }
				 
				 }
				 }
				 
				 }
				 
				 }
				 		 
				 				}
					
								    }
					                 }  	
					         }							 
					 }		 
						
				  else if($cnt_rows < $n9 && $rankMinus!="")
				     {				
				 	 
				 	 if($_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'   ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                   	   {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and  ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and  ranks='".$rankMinus."'  ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 } 
				 		
								
						if($res_vac3)
						 {
				 				  $cnt_rows3 = mysqli_num_rows($res_vac3);
								  if($cnt_rows3 == $n9)
						                		  {
								    while($row = mysqli_fetch_array($res_vac3))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
								  }
				  				 else if($cnt_rows3 < $n9 && $rankMinus_1!="")
				 		          {          		    
				 
				  if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				  else 
	     			{
				 $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				  
				 
				                   if($res_vac4)
		                                 {
									     $cnt_rows4 = mysqli_num_rows($res_vac4);
										 if($cnt_rows4 == $n9)
								     		 {
										   while($row = mysqli_fetch_array($res_vac4))
								        	{
								              echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
           if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
									         }
										 }
										 				 
									     else if($cnt_rows4 < $n9 && $rankMinus_2!="")
	      							        {			
				 	 if($_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                  {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				
				 
											 if($res_vac5)
		    								    {
												 $cnt_rows6 = mysqli_num_rows($res_vac4);
												 
												 if($cnt_rows6 == $n9)
									               	 {
												    while($row = mysqli_fetch_array($res_vac4))
								                 	{
								                       echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
									                }
												 }
												 												 
												 else if($cnt_rows6 < $n9 && $rankMinus_3!="")
	             								       {
		           								     if($_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
													 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													 else 
	     			 		                          	{
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													 if($res_vac5)
													 {
													 $cnt_rows6 = mysqli_num_rows($res_vac5);
													  if($cnt_rows6 == $n9)
									  {
									  while($row = mysqli_fetch_array($res_vac5))
									{
									  echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
									}
									  }
													 }													   
				    							      }
												}
				 
											 }
				     				 }
				 		 
				 				  }
						 }
					}							
				
				 }			
				 
				}
					
				 
		      else if($num_rows<9 && $rankMinus!="")
				 {
				   {
				 
				  if( $_GET['trvlr'] == "Couple-Under 45" ||  $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" ||  $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'   ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	     	    {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  ".$order." ".$limit9."";
				 $res_vac3 = mysqli_query($dam,$sel_vac);
				 } 
				 
								
						if($res_vac3)
						 {					
				 				  $cnt_rows3 = mysqli_num_rows($res_vac3);
								  if($cnt_rows3 == $n9)
						         {
								    while($row = mysqli_fetch_array($res_vac3))
									{									
								   echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
									}
								  }
				  				
								 else if($cnt_rows3 < $n9 && $rankMinus_1!="")
				 		             {         		      
				 
				    if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				 else 
	                {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and  vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  ".$order." ".$limit9."";
				 $res_vac4 = mysqli_query($dam,$sel_vac);
				 }
				  
				                   if($res_vac4)
		                                 {
									     $cnt_rows4 = mysqli_num_rows($res_vac4);
										 if($cnt_rows4 == $n9)
								     		 {
										   while($row = mysqli_fetch_array($res_vac4))
								        	{
								           echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
									         }
										 }
										 				 
									     else if($cnt_rows4<9 && $rankMinus_2!="")
	      							        {			 
				  if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" || $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
				 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 }
				 else 
                   {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
				 } 
				
				 
											 if($res_vac5)
		    								    {
												 $cnt_rows6 = mysqli_num_rows($res_vac4);
												 
												 if($cnt_rows6 == $n9)
									                        	 {
												    while($row = mysqli_fetch_array($res_vac4))
								                 	{
								                      echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';	
									                }
												 }
												 												 
												 else if($cnt_rows6<9 && $rankMinus_3!="")
	             						               {     						     		  
												 
													 if( $_GET['trvlr'] == "Couple-Under 45" || $_GET['trvlr'] == "Couple-Above 45" ||  $_GET['trvlr'] == "spouse/partner-Under 45" || $_GET['trvlr'] == "spouse/partner-Above 45")
													 {
			$sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."'  or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."' ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													 else 
	     			 				                    {
			     $sel_vac = "select vac_title, vac_img1, vac_id from dam_vactype where vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rank."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankPlus_2."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus."'  or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_1."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_2."' or vac_title<>'HONEYMOON ESCAPE' and vac_title<>'WEEKEND GETAWAY' and ranks='".$rankMinus_3."'  ".$order." ".$limit9."";
				 $res_vac5 = mysqli_query($dam,$sel_vac);
													 }
													
													 if($res_vac5)
													 {
													 while($row = mysqli_fetch_array($res_vac5))
													 {
                                                     echo '<span style="float:left; width:30%; margin-left:3px;">';
			 echo '<div style="float:left; width:100%; position:relative;">';
            if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }		 
			 	echo '<div id="adv_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="width:60%; float:left;">
		    <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land9" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst9" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>'; 
		     echo '<div id="oth_opt_9_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%;">
		 <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act9_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_9_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr9" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr9" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig9_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest9_'.$row["vac_id"].'"  value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';		 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
	            { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chk9_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_9_btn_'.$row["vac_id"].'\',\'oth_opt_9_'.$row["vac_id"].'\',\'adv_opt_9_'.$row["vac_id"].'\',\'div_sub_WS_9_'.$row["vac_id"].'\');"  /></span><span id="sp_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_9_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_9_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_9_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';			
			 echo '</div>';
			echo '</span>';				
													 }
													 }
				    							 
												  }
												}
				 
											 }
				     				 }
				 		 
				 				  }
						 }
					}	
				 }

  }
  ?>
	</div>	
	</div>
        	
						
<!---------------------------------------------------- All Images/ Vacation Plans ------------------------------------------------------->
			<div id="package_database" style=" display:none; width:100%; height:450px; margin-top:0px; margin-left:50px; position:relative; overflow-y:scroll; float:left; overflow-x:hidden" onMouseOver="div_green('div_Inputs');" onMouseOut="div_white('div_Inputs');">      
			<div style="float:left; width:98%;">
			<?php
			include("PHP_Files/PHP_Connection.php");
			//if(isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['mode']) && isset($_GET['trvlr']) && isset($_GET['dur']) && isset($_GET['locType']) && isset($_GET['locNum']) && isset($_GET['locs'])  || isset($_GET['type']) && isset($_GET['cCity']) && isset($_GET['trvlr']) && isset($_GET['dur']))
			{		
			if($_GET['type']=="India") 
		   {		   			
		$q_sl = "select vac_img1, vac_title, vac_id from dam_vactype where ranks='".$rank."' or ranks='".$rankPlus."' or ranks='".$rankPlus_1."' or ranks='".$rankPlus_2."' or ranks='".$rankPlus_3."' or ranks='".$rankMinus."' or ranks='".$rankMinus_1."' or ranks='".$rankMinus_2."' or ranks='".$rankMinus_3."' or vac_title='WEEKEND GETAWAY' ".$order." ";
			$res_range_all = mysqli_query($dam,$q_sl);	
		}
		else if($_GET['type'] == "Abroad")
		{
		$q_sl = "select vac_img1, vac_title, vac_id from dam_vactype where vac_title<>'WEEKEND GETAWAY'  ".$order." ";
			$res_range_all = mysqli_query($dam,$q_sl);	
		}
			if($res_range_all)
             			{
			  while($row = mysqli_fetch_array($res_range_all))
			   {			  
			     echo '<span style="float:left; width:30%; margin-left:3px;">';
			echo '<div style="float:left; width:100%; position:relative;">';
             if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="India")
			 {			 		 
		  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Adventure_tour.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else if($row["vac_title"] == "ADVENTURE TOUR" && $_GET['type'] =="Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 } 
			  else if($_GET['type'] == "Abroad")
			 {
			 echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="show_block(\'div_selVac_sub\');  wrt_thm(\''.$row["vac_title"].'\'); showVac_thm(\''.$row["vac_title"].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }
			 else
			 {
			  echo '<img src="data:image/png;base64,'.base64_encode($row["vac_img1"]).'" class="imgVacthm" id="img6_'.$row["vac_id"].'" onclick="openPage(\'Package_view.php\',\''.$_GET['type'].'\',\''.$row["vac_title"].'\',\''.$_GET['locs'].'\',\''.$_GET['cCity'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['gender'].'\');" onMouseOver="showAgenda(\''.$row["vac_title"].'\',\'oth_opt_6_'.$row["vac_id"].'\',\'adv_opt_6_'.$row["vac_id"].'\',\'div_sub_WS_6_'.$row["vac_id"].'\');"  />';
			 }	 	
			 
			 	echo '<div id="adv_opt_all_'.$row["vac_id"].'" style="float:left; width:99%; height:100px; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
				<span style="float:left; width:60%;"> 
		   <div style="float:left; width:100%; margin-left:3px;"><input type="checkbox" value="Land" id="chk_agd_land_all" style="float:left;" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Land</span></div>
		   <div style="float:left; width:100%;  margin-left:3px; "> <input type="checkbox" style="float:left;" value="Water" id="chk_agd_water_all" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Water</span></div>
		    <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Sky" id="chk_agd_sky_all" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sky</span></div>
			 <div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Mountain" id="chk_agd_mntn_all" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Mountain</span></div>
		<div style="float:left; width:100%;  margin-left:3px;"> <input type="checkbox" style="float:left;" value="Forest-Jungle" id="chk_agd_frst_all" onClick="chkOnPop(this.value); spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Forest-Jungle</span></div>
		</span></div>';
		 
		     echo '<div id="oth_opt_all_'.$row["vac_id"].'" style="float:left; width:99%; height:auto; background:#444; opacity:0.7; position:absolute; bottom:20px; display:none; padding:3px;">
			 <span style="float:left; width:60%">
		  <div style="float:left; width:100%; margin-left:3px; display:block;"><input type="checkbox" style="float:left;" id="chk_agd_act_all_'.$row["vac_id"].'" value="Activities" onclick="spanWrite(this.id,this.value);"  /><span class="input_Ans" style="font-size:12px; color:#fff;">Activities</span></div>
		  <div id="div_sub_WS_all_'.$row["vac_id"].'" style="display:none; width:100%; float:left;">
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" id="chk_abvWtr_all" value="Above Water" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Above Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Near Water" id="chk_nrWtr_all" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Near Water</span>
		   </div>
		   <div style="float:left; width:100%; margin-left:30px;">
		   <span style="float:left;"><input type="checkbox" value="Below Water" id="chk_belWtr_all" checked="true" onclick="spanWrite(this.id,this.value);"  /></span>
		   <span class="input_Ans" style="font-size:12px; color:#fff;">Below Water</span>
		   </div>
		  </div>
		   <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox" style="float:left;" id="chk_agd_sig_all_'.$row["vac_id"].'"  value="Sightseeing" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Sightseeing</span></div>
		    <div style="float:left; width:100%; margin-left:3px; display:block;"> <input type="checkbox"  style="float:left;" id="chk_agd_rest_all_'.$row["vac_id"].'" value="Rest-Relaxation" onclick="spanWrite(this.id,this.value);" /><span class="input_Ans" style="font-size:12px; color:#fff;">Rest-Relaxation</span></div>
			</span></div>';
						 
			  echo '<div style="float:left; width:100%">';
			 if($_GET['locType']=="Multiple Locations" || $_GET['type'] == "Abroad")			  
			 { 
			 echo ' <span style="float:left;">';
			  echo '<input type="checkbox" id="chkAll_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="sel_sugg_vac(this.id,this.value,\'sp_all_btn_'.$row["vac_id"].'\',\'oth_opt_all_'.$row["vac_id"].'\',\'adv_opt_all_'.$row["vac_id"].'\',\'div_sub_WS_all_'.$row["vac_id"].'\');"  /></span><span id="sp_all_btn_'.$row["vac_id"].'" class="img_btn" style="width:85%;"  onMouseOver="div_green(\'sp_all_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'sp_all_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }
	          else if($_GET['dur']=="Weekend" || $_GET['dur']=="3Days" || $_GET['locType']=="Single Location" || $_GET['type'] == "Abroad")
			  {
			   echo '<span id="opt_all_btn_'.$row["vac_id"].'" class="img_btn" style="width:98%;" onMouseOver="div_green(\'opt_all_btn_'.$row["vac_id"].'\');" onMouseOut="div_white(\'opt_all_btn_'.$row["vac_id"].'\');">'.$row["vac_title"].'</span>';
			  }		  
			echo ' </div>';	
			
			 echo '</div>';
			echo '</span>';	
			
			   }
			   }
			}
		
	
		   ?>
	</div>	
	</div>  
	
		  
			</div>
			  
</span>

</div>
	
</div>
	
<div id="div_selMy_dest" class="popUp_dest" style="height:auto;">
	 <div style="float:left; width:100%;">
	 <span style="float:right; margin-right:1px;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block('div_selMy_dest');" /></span>
	 </div>
	 
	 <div style="float:left; width:95%; padding:10px; padding-top:5px;">
	 <div style="float:left; width:100%;">
	 <span style="float:left; font-size:14px; font-family:calibri;">My chosen destinations :</span>
	  <span id="sp_sel_dest" style="float:left; font-size:14px; font-family:calibri; margin-left:5px;"></span>
	 </div>
	   <span class="input_Ans">Your selected vacation themes</span>    
	     <div style="float:left; width:100%; background:#f5f5f5; margin-top:3px;">
	       <span style="float:left;" id="div_sel_vacThms"></span>
	  </div>
             
	     <div style="float:left; width:100%; margin-top:10px;"><span class="input_Ans">Select your locations</span></div>
			   
		 <div style="float:left; width:100%; margin-left:10px; margin-top:5px;">
			
			 <span style="float:left;  background:#fff; padding:5px; border-radius:3px;">			    
					
					 <span style="float:left; margin-left:10px;">
					   <select id="drpCont_abr" name="drpCont_abr" onChange="LdCntry(this.value);" style="width:150px;">
					   <option value="0">Select Continent</option>
					     <?php
						 include("PHP_Files/PHP_Connection.php");
						 $q_conti = "select distinct(Continent) as Continent from cntry_continent";
						 $res_conti = mysqli_query($con,$q_conti);
						 while($row = mysqli_fetch_array($res_conti))
						 {
						   echo '<option value="'.$row["Continent"].'">'.$row["Continent"].'</option>';
						 }
						 ?>
					   </select>
					 </span>
					
					 <span id="sp_drp_cntry" style="float:left; margin-left:10px;">
					  
					 </span>
					 
					 <span id="sp_drp_state" style="float:left; margin-left:10px;"></span>
				 
			        </span>		
			 
			 <span style="float:left; margin-left:5px; margin-top:5px;">
			  <div class="smallbtn" style="width:50px;" onClick="show_Pkdest_intl();">Submit</div>
			 </span>		 
			  
			 </div>
			 
		</div>
		
	 </div>
	 
  </div>
  
</div>

<div id="div_selVac_sub" class="popUp_dest" style=" width:1000px; height:500px; display:none; margin-left:12%; margin-top:6%;">
	     <div style="float:left; width:100%;">
		 <span style="float:right; margin-right:3px; cursor:pointer;">
		 <img src="Images/cancelbtn.png" width="35px" height="30px" onClick="hide_block('div_selVac_sub');" /></span>
		 </div>	
		
		 <div style="float:left; width:100%; margin-top:5px; margin-left:20px;">
		    <div id="div_show_vac" style="float:left; width:98%; background:#bbb; height:auto;">
			   
			</div>
		 </div>
		 <div <?php if($_GET['type'] == "Abroad") {?> style="float:left; width:100%; display:block;" <?php } else {?> style="display:none;" <?php }?>>
		 <span style="float:left;">Selected popular destinations : </span>
		 <span id="sp_popl_dest" style="float:left; font-size:14px; font-family:calibri; margin-left:10px;"></span>
		 <span style="float:left; margin-left:10px; ">
		  <div class="smallbtn" style="width:60px;" onClick="show_Pkdest_intl_popl();"> Submit </div>
		 </span>
		 </div>
		 
		  <div  <?php if($_GET['type'] == "Abroad") {?> style="float:left; width:100%; display:block;" <?php } else {?> style="display:none;" <?php }?>>
		 <span style="float:left; margin-left:10px; color:#ff0000;">Select destinations: </span>
	        <span id="sp_sel_dest_popl" >	
			</span>
	    </div>
		 
		  
		 
		    <div id="div_adv_opt"  style="float:left; width:100%; display:none; ">		
		
		    <div id="div_vacation_types" style=" position:relative; background:#597272; height:60px; margin-bottom:0px; margin-top:1px; color:#002929; border-radius:5px;">		
		
		      <div id="div_advent_sections" style="display:block;">
		<div align="left" style="width:100%;">
	     <span style="font-size:18px; width:100%; float:left; margin-left:8px; position:relative; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri">
		 Select your adventure zone...</span>
		 </div>
		 <div  style="width:100%; margin-left:18px;">
		 <span class="div_advent_chkTxt"><input id="chkLand" type="checkbox" onChange="display_pics('chkLand','content_Land');" />
		 <a href="#" onClick="display_pics_txt('chkLand','content_Land'); check_none(); ">Land</a></span>
		 
		 <span class="div_advent_chkTxt"><input id="chkWater" type="checkbox" onChange="display_pics('chkWater','content_Water');" />
		 <a href="#" onClick="display_pics_txt('chkWater','content_Water'); check_none();">Water</a></span>
		 
		 <span class="div_advent_chkTxt"><input id="chkSky" type="checkbox" onChange="display_pics('chkSky','content_Sky');" />
		 <a href="#" onClick="display_pics_txt('chkSky','content_Sky'); check_none();">Sky</a></span>
		 
		  <span class="div_advent_chkTxt"><input id="chkMountain" type="checkbox" onChange="display_pics('chkMountain','content_Mountain');" />
		  <a href="#" onClick="display_pics_txt('chkMountain','content_Mountain'); check_none();">Mountain </a></span>
		  
		    <span class="div_advent_chkTxt"><input id="chkForest" type="checkbox" onChange="display_pics('chkForest','content_Forest');" />
			<a href="#" onClick=" display_pics_txt('chkForest','content_Forest'); check_none();">Forest-Jungle</a></span>
		 </div>
		 </div>
          
		  </div>    
			
		     </div>

			
			<div id="div_oth_opt" style="float:left; width:100%; display:none;">
		 	
	   			<div id="div_vacation_types" style="position:relative; height:50px; background:#597272; border:1px solid lightgrey; color:#002929; border-radius:5px;">
	
	                 <div id="div_beachSelect" style="display:block;">
		<div align="left" style="width:100%;">
	     <span id="vac_type" style="font-size:20px; width:100%; float:left; margin-left:8px; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri;">
		 </span>
		 </div>
		 <div align="center"  style="width:100%; margin-left:50px;">
		  <span class="div_others_chkTxt"><input id="chkBchAct" type="checkbox" onChange="display_pics('chkBchAct','content_Activities');" />
		  <a href="#" onClick="display_pics_txt('chkBchAct','content_Activities');">Activities</a></span>
		 
		  <span class="div_others_chkTxt"><input id="chkBchSight" type="checkbox" onChange="display_pics('chkBchSight','content_Sightseeing');" />
		  <a href="#" onClick="display_pics_txt('chkBchSight','content_Sightseeing');">Sightseeing</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkBchRest" type="checkbox" onChange="display_pics('chkBchRest','content_Rest');" />
		 <a href="#" onClick="display_pics_txt('chkBchRest','content_Rest');">Rest & Relaxing</a></span>
		 
		 </div>
		 </div>
		       </div>
				
				<div id="div_context_beach">
	   <div id="div_beachact1_context" class="div_contexts">
		    Beach activity 1 blah blah blah, Beach activity blah blah blah, Beach activity blah blah blah,  Beach activity blah blah blah
		 </div>	
		 <div id="div_beachact2_context" class="div_contexts">
		    Beach activity 2 blah blah blah,  Beach activity blah blah blah, Beach activity blah blah blah,  Beach activity blah blah blah
		 </div>	
		<div id="div_beachact3_context" class="div_contexts">
		    Beach activity 3 blah blah blah, Beach activity blah blah blah, Beach activity blah blah blah,  Beach activity blah blah blah
		 </div>	
		 <div id="div_beachact4_context" class="div_contexts">
		     Beach activity 4 blah blah blah,  Beach activity blah blah blah,  Beach activity blah blah blah,  Beach activity blah blah blah
		 </div>	
		 <div id="div_beachSight1_context" class="div_contexts">
		   Beach sightseeing 1 blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah
		 </div>	
		 <div id="div_beachSight2_context" class="div_contexts">
		   Beach sightseeing 2 blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah
		 </div>					
		<div id="div_beachSight3_context" class="div_contexts">
		    Beach sightseeing 3 blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah
		 </div>
		 <div id="div_beachSight4_context" class="div_contexts">
		    Beach sightseeing 4 blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah, Beach sightseeing blah blah blah
		 </div>	
		 <div id="div_beachRest1_context" class="div_contexts">
		   Beach Rest and Relax 1 blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah
		 </div>	
		  <div id="div_beachRest2_context" class="div_contexts">
		   Beach Rest and Relax 2 blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah
		 </div>	
		  <div id="div_beachRest3_context" class="div_contexts">
		   Beach Rest and Relax 3 blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah,Beach Rest and Relax blah blah blah
		 </div>	
		  <div id="div_beachRest4_context" class="div_contexts">
		    Beach Rest and Relax 4 blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah, Beach Rest and Relax blah blah blah
		 </div>	
	</div>		
 
	 			<div style="overflow-y:scroll; height:auto; overflow-x:hidden; width:100%;">
		 <div id="content_Activities" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style= "width:19%; float:left;">
		   <div class="Adventure_Catalog">
		    <div><span class="div_advent_types_hdr">Activites</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_beachAct" class="span_drpImg"> <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_act'); hide_block('up_arrow_beachAct'); show_block('down_arrow_beachAct');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_beachAct" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_beach_act'); show_block('up_arrow_beachAct'); hide_block('down_arrow_beachAct');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>			
			<div id="div_list_beach_act" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Wind Surfing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Surfing</span>
			   <span class="span_drpListItems"><input type="checkbox" />BananaBoat</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_act');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
			
	  <div style="width:100%; margin-top:25px;">
			<a id="" href="Packages.php" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   		   
		   </div>
		   </span>
		   
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_beach1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachact1_context');" onMouseOut="HideContent('div_beachact1_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_activity_windsurfing.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachact2_context');" onMouseOut="HideContent('div_beachact2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_beach5.png"class="div_advent_imgs" onMouseOver="ShowContent('div_beachact3_context');" onMouseOut="HideContent('div_beachact3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_beach7.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachact4_context');" onMouseOut="HideContent('div_beachact4_context');"/></span>
		</div>
		
		<div id="content_Sightseeing" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		   <div class="Adventure_Catalog">		   
		       <div><span class="div_advent_types_hdr">Sightseeing</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_beachSight" class="span_drpImg" > <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_sight'); hide_block('up_arrow_beachSight'); show_block('down_arrow_beachSight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_beachSight" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_beach_sight'); show_block('up_arrow_beachSight'); hide_block('down_arrow_beachSight');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>			
			<div id="div_list_beach_sight" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Dolphin View</span>
			   <span class="span_drpListItems"><input type="checkbox" />Cave Islands</span>
			   <span class="span_drpListItems"><input type="checkbox" />Snorkeling</span>
			     <span class="span_drpListItems"><input type="checkbox" />Coral view</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_sight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
				   
			 <div style="width:100%; margin-top:25px;">
			<a href="Packages.php" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_sightseeing5.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachSight1_context');" onMouseOut="HideContent('div_beachSight1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_sightseeing1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachSight2_context');" onMouseOut="HideContent('div_beachSight2_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_sightseeing_Indonasia_caveIsland.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachSight3_context');" onMouseOut="HideContent('div_beachSight3_context');" /></span>
		   <span style="width:19.6%; float:left;"><img src="Images/Vacation type image/beach_rest6.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachSight4_context');" onMouseOut="HideContent('div_beachSight4_context');" /></span>
		</div>
		
	<div id="content_Rest" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		     <div class="Adventure_Catalog">		   
		       <div><span class="div_advent_types_hdr">Rest & Relaxation</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_beachRest" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_rest');  hide_block('up_arrow_beachRest'); show_block('down_arrow_beachRest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_beachRest" class="span_drpImg"  style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_beach_rest'); show_block('up_arrow_beachRest'); hide_block('down_arrow_beachRest');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
		    </div>			
			<div id="div_list_beach_rest" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Sun Bathing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Sea food</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_beach_rest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
 			<div style="width:100%; margin-top:25px;">
			<a href="Packages.php" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_rest1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachRest1_context');" onMouseOut="HideContent('div_beachRest1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_rest.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachRest2_context');" onMouseOut="HideContent('div_beachRest2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_rest2.png"class="div_advent_imgs" onMouseOver="ShowContent('div_beachRest3_context');" onMouseOut="HideContent('div_beachRest3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/beach_rest5.png" class="div_advent_imgs" onMouseOver="ShowContent('div_beachRest4_context');" onMouseOut="HideContent('div_beachRest4_context');" /></span>
		</div>
	
</div>			
			
     			<div id="img_bch_clg" style="overflow-x:hidden; overflow-y:scroll; height:500px; position:relative; display:block;">
		  <span>
		   <img src="Images/Vacation type image/beach_Collage.png" width="940px" height="100%" style="border-radius:5px; background-repeat:no repeat;" />
		  </span>		
		 </div>

			</div>			
			
		  <div <?php if($_GET['type'] == "India") { ?> style="float:left; width:100%; margin-top:5px; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
		  <span style="float:left; margin-left:100px;"><div class="smallbtn" style="width:60px;" onClick="show_Pkdest('<?php if(isset($_GET['cCity'])) echo $_GET['cCity']; ?>','<?php if(isset($_GET['locs'])) echo $_GET['locs']; ?>','<?php if(isset($_GET['dur'])) echo $_GET['dur']; ?>','<?php if(isset($_GET['type'])) echo $_GET['type']; ?>','<?php if(isset($_GET['gender'])) echo $_GET['gender']; ?>');"> Submit </div></span>
		 </div>		  
		 
	 </div>
	 
	 
	 </div>


<span id="sp_agendas" style="visibility:hidden;"></span>
<span id="sp_inten" style="visibility:hidden;"></span>
<textarea name="txtAlocs" id="txtAlocs" style="visibility:hidden"></textarea>
</body>
</form>
</html>

			
	
				
	   