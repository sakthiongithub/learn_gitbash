<!---<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  --->
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Home Page</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<link rel="stylesheet" href="Stylesheets/Cust_PageStyles.css" type="text/css" />
                                            
<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
<script src="Javascript/context.js" language="Javascript" type="text/javascript"></script>
<script src="Javascript/slideshow.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/validations.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/Visibility.js" language="Javascript" type="text/javascript"></script>  
<script src="Javascript/Javascript_Codes.js" language="Javascript" type="text/javascript"></script> 
<!-- <script src="Javascript/rgt_clik_disb.js" language="javascript" type="text/javascript"></script> -->
<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>

<?php

include ("PHP_Files/PHP_Connection.php");
$dest = "---Destination---";
$src = "---From ----";

$bookHtl =false;
$bookFlt=false;
$expl=false;
$txt="";

if(isset($_GET['loc']))
{
$dest = $_GET['loc'];
}

if(isset($_GET['bHtl']))
{
$val = $_GET['bHtl'];
$bookHtl = $val;
}

if(isset($_GET['bFlt']))
{
$val = $_GET['bFlt'];
$bookFlt = $val;
}

if(isset($_GET['frm']))
{
$frmloc =explode(',',$_GET['frm']);
$src = $frmloc[0];
}

if(isset($_GET['cate']) && isset($_GET['km']) && isset($_GET['locn']))
{
 $expl=true; 
}

?>


<!---------------------------------  Search Destinations ------------------------------------>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

});
</script>

<!---------------------------------- Search Destinations with checkbox on popup --------------------------->

<script type="text/javascript">
$(function(){
$(".searchPck").keyup(function() 
{ 
var searchPck = $(this).val();
var dataString = 'searchPck='+ searchPck;
if(searchPck!='')
{
	$.ajax({
	type: "POST",
	url: "searchPck.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#resultPck").html(html).show();
	}
	});
}return false;    
});

});
</script>


<!--------------------------------  Seach Destinations in vacations -------------------------------> 
<script type="text/javascript">
$(function(){
$(".searchLoc").keyup(function() 
{ 
var searchLoc = $(this).val();
var dataString = 'searchLoc='+ searchLoc;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "vacTh_ajax.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#ResLoc").html(html).show();
	}
	});
}return false;    
});

jQuery("#ResLoc").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchLoc').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("searchLoc")){
	jQuery("#ResLoc").fadeOut(); 
	}
});
$('#searchLoc').click(function(){
	jQuery("#ResLoc").fadeIn();
});
});
</script>


</head>

<form name="frmHome" method="post">
<body id="bdyHmPage"  name="homePage_body" onLoad="showDates(); getip(json);">

<?php include("PHP_Files/build_trip_php.php"); ?>

<div align="center" id="master_container">
<span id="sp_IP"></span>
	
<div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 		<div id="header_rightbtn">
    	<div>
		
		<span id="btnRegister" class="smallbtn" style="width:auto; padding:2px; cursor:pointer; background:#0099CC;" onClick="open_leads();">Tour Operator? view leads</span>
		
			  <span id="btnCustomer" class="smallbtn" style="width:90px; margin-right:3px; margin-bottom:3px; background:#F5F5F5; color:#B22222;" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">24x7 Support</span>
			  			
			   <span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px; cursor:pointer;" onClick="show_block('div_reg'); show_block('div_greyBack');">Register</span>
			   
			   <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px; cursor:pointer;" onClick="show_block('div_login'); show_block('div_greyBack');">Login</span>
       </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
		</div> 
		<div style="float:left; width:100%;">
		<a href="qcn_internal.php" target="_blank"><span style="float:right; margin-right:10px; font-size:12px; font-family:Calibri; color:#0066ff; text-decoration:underline; font-weight:600; cursor:pointer;">
		QCN Employee? Login</span></a></div>
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	
	</div>
	    
	    <div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">	
		<a href="Missing_pets.php" target="_blank"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Missing Pets</span></a>	
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	</div>
	
</div> 
 
<div id="div_greyBack" <?php if($expl==true){?> style="display:block;" <?php }?>></div>

<!---<div id="div_cmt_crl" style="display:none;">
 <img src="Images/imgCmt.jpg" width="200px" height="200px" />
</div>  --->

<div id="body_container">

	<div id="contextInputsEdit"
		 style="border-radius:5px;
		 position:absolute;
		 margin-left:3px;
		 margin-right:3px;
		 height:auto;
		 width:auto;
		 display:none;
		 background:#FFFFCC;
		 color:white;
		 z-index:10000;
		 font-size:13px;
		 color:#4e5054;
		 border:1px solid gray;">
		 Click to Change
		 </div> 
	   	 
    <div id="div_reg" class="div_pop">
	<div style="float:left; width:100%;">
<span style="float:right;margin-right:3px;"><img src="Images/cancelbtn1.png" width="25px" height="25px" onClick="hide_block('div_reg'); hide_block('div_greyBack');" /></span>
	</div>
	   <div style="width:100%; margin:40px 20px 5px 40px">
		    <span style="float:left;">
			 <a id="hrefCust_reg" target="_self" onClick="hide_block('div_reg'); show_Cust();">
			<div class="bigBtns"><span style="padding:6px 3px 3px 16px; float:left; font-size:20px;">Customer</span></div>
			</a></span>
			
			<span style="float:left; margin-left:50px">
			 <a id="hrefPartn_reg" target="_self" onClick="hide_block('div_reg'); show_Partn();">
			<div class="bigBtns"><span style="padding:6px 3px 3px 26px; float:left; font-size:20px;">Partner</span></div>
			</a></span>				
		</div>
	</div> 		
	
	<div id="div_login" class="div_pop">
	<div style="float:left; width:100%;">
	  <span style="float:right;margin-right:3px;"><img src="Images/cancelbtn1.png" width="25px" height="25px" onClick="hide_block('div_login'); hide_block('div_greyBack');" />
	  </span>
	</div>
	    <div style="width:100%; margin:40px 20px 5px 40px">
		    <span style="float:left;">
			 <a id="hrefCust_log" target="_self" onClick="hide_block('div_login'); show_cust_log();">
			<div class="bigBtns"><span style="padding:6px 3px 3px 16px; float:left; font-size:20px;">Customer</span></div>
			</a></span>
			
			<span style="float:left; margin-left:50px">
			 <a  id="hrefPartn_log" target="_self" onClick="hide_block('div_login'); show_partn_log();">
			<div class="bigBtns"><span style="padding:6px 3px 3px 26px;; float:left; font-size:20px;">Partner</span></div>
			</a></span>
		</div> 
	</div>	 
	
    <div id="div_login_win" class="div_pop">
	     <div>
	   <span style="float:right; margin-right:10px;">
	    <a href="#" onClick="hide_block('div_login_win'); hide_block('div_greyBack');"><img src="Images/cancelbtn1.png" width="30px" height="30px"/></a></span>
	</div>	
	<div style="width:100%; margin:5px 5px 5px 5px;">
	   <span style="float:left"><img src="Images/logo.png" width="120px" height="30px" /></span>
	</div>
	    <div style="width:100%; margin:30px 5px 5px 60px;">
		   <table class="font-medium">
		     <tr>
			   <td>Login Id</td>
			   <td>:</td>
			   <td><input id="txtLogId" type="text" class="txtbox_Tab" style="width:200px;"/></td>
			 </tr>
		     <tr>
			   <td>Password</td>
			   <td>:</td>
			   <td><input id="txtLogPwd" type="text" class="txtbox_Tab" style="width:200px;"/></td>
			 </tr>
			 <tr>
			   <td colspan="3" align="right"><div class="smallbtn" style="float:none; width:80px;">Login</div></td>
			 </tr>
	       </table>
		</div> 
	</div>		
	
    <div id="div_currLoc" style="display:none; height:250px;">
	 <div style="float:left; width:100%;">
	   <span style="float:right;  margin-right:-10px; cursor:pointer; margin-top:-10px;">
	   <img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block('div_currLoc'); hide_block('div_greyBack'); remove_border();"/></span>
	 </div>
	
	 <div style="float:left;width:100%; margin-top:0px; background:#f5f5f5;" class="font-medium_indx">
	  <span  style="float:left; margin-left:5px; color:#b22; font-size:30px;">
	  <div  id="sp_vacTh" style="float:left; width:240px; height:40px; border-radius:60px; background:rgb(255,55,1); text-align:center; color:#fff;"></div>  
	  </span>
	  <span  style="float:left; margin-left:5px; color:#b22; font-size:30px;">
	    <span style="float:left; margin-left:0px; font-size:20px; margin-top:10px;">
		<input type="radio" value="India" width="20px" style="zoom:1.2; float:left;" checked="checked" />
		<span style="float:left;">In India</span>
	  </span>
		<span style="float:left; margin-left:5px; font-size:20px; margin-top:10px;">
		<input type="radio" value="India" disabled="disabled" width="20px" style="zoom:1.2; float:left;"/>
		<span style="float:left;">Abroad</span>
		</span>
		</span>
	  </div>
	 
	 <div style="border-bottom:2px solid #b22; width:100%; float:left;margin-top:1px;"></div>
			  
     <div style="float:left; width:100%; margin-top:10px; margin-left:10px;">
		    <span style="float:left;">I'm currently / starting at</span>
			<div style="float:left; width:100%;">
			  <span style="float:left;">
			  <input id="searchLoc" name="searchLoc" type="text" class="searchLoc" placeholder="Enter location" onKeyUp="toUpper(this.id);" /></span>
			</div>            
			<div id="ResLoc"></div>	  
		  </div>
	 
	 <div style="float:left; width:100%; margin-top:10px; margin-left:10px;">
		   <span style="float:left; margin-left:3px;">I'm happy to travel to a distance upto </span>
	       <span style="float:left; margin-left:4px;">
		   <select id="drpDist" name="drpDist" class="font-medium_indx" style="width:70px; padding:1px 1px 1px 1px;">
		    <option value="100"> 100 </option>
			  <option value="200"> 200 </option>
			  <option value="300"> 300 </option>
			  <option value="500"> 500 </option>
			  <option value="750"> 750 </option>
			  <option value="1000"> 1000 </option>
			  <option value="1000"> 1500 </option>
			  <option value="2000"> 2000 </option>
			  <option value="3000"> 3000 </option>
			   <option value="4000"> 4000 </option>
			 </select>  
		    
		   </span><span style="float:left; margin-left:2px;">Km</span>
		  
		   <div id="weekendVac" style="float:left; widht:100%; display:none;">
		   <div id="vac_themes">
			     <span  class="headerTitle" style="float:left;">Select Vacation Theme</span>
				 <span  style="float:left;">
				  <div style="width:100%; margin-top:5px;">
		 	    
				  <div class="div_dropdown_crt" >
			<span class="font-medium" style="font-size:14px;" onClick="show_block('div_vacType'); show_block('up_arrow_vacType'); hide_block('down_arrow_vacType');"> --------Trip Themes------- </span>			
			
			<span id="down_arrow_vacType" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block('div_vacType'); show_block('up_arrow_vacType'); hide_block('down_arrow_vacType');">
			<img src="Images/dropdown_arrow_icon3.png" width="25px" height="16px"/></span></span>
			
			<span id="up_arrow_vacType" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_vacType'); hide_block('up_arrow_vacType'); show_block('down_arrow_vacType');">
			<img src="Images/dropdownlast_arrow_icon.png" width="25px" height="16px" /></span></span>
			
			</div>	
			
		    	 <div id="div_vacType" class="div_drpListItems_crt">
			 <?php
			 	$q_vac = "select vac_title, vac_id from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				
				if($res_vac)
				{
				while($row = mysqli_fetch_array($res_vac))
				{
				  echo '<span class="span_drpListItems_crt">
				  <input type="checkbox" id="'.$row["vac_title"].'" name="'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="selVac(\''.$row["vac_title"].'\'); chkThis(this.id);"/><span style="cursor:pointer;" onClick="selVac_sp(\''.$row["vac_title"].'\')">'.$row["vac_title"].'</span></span>';
				}
				}			  
			  
			  ?>
			   
			   <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_vacType');  hide_block('up_arrow_vacType'); show_block('down_arrow_vacType');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div> 			

		         </div>
				 </span>
				
				 </div>
		   </div>
		   
		   <div style="width:100%; margin-top:5px; margin-left:37%; float:left;">		
		   <a id="show_cate">
		   <input type="button" class="smallbtn" id="btnDist" name="btnDist" value="Submit" style="width:100px; height:30px; font-size:20px; background:rgb(255,55,1);" onClick="show_cate_list();"/>
		   </a>		  
		   </div>
		  </div>
	
	</div>	

    <div id="div_dest_date" <?php if($expl==true){?> style="display:block;" <?php }?>>
	
	       <div style="position:relative; width:100%; float:left; height:100%;">
	  <div style="float:left; width:100%;">
	    <span style="float:right; cursor:pointer;" onClick="hide_block('div_dest_date'); hide_block('div_greyBack'); remove_border(); reld();">
		<img src="Images/closeBtn.png" width="30px" height="30px" /></span>
	  </div>
	  
	  <div style="float:left; width:100%; font-size:16px; color:#555; font-weight:600; font-family:Calibri;">
	  <div style="float:left; width:100%;">
	    <span style="float:left; margin-left:3px;">Your</span>
		<span style="float:left;margin-left:3px; color:rgb(255,55,1); font-weight:bold;">
		<?php if(isset($_GET['cate']))
		{
		if($_GET['cate']!="Sightseeing")
		{
		  $c = explode("_",$_GET['cate']);
           $txt =$c[0]." ".$c[1];
			}
			else
			  $txt = "Sightseeing";
		 }
		  ?>
		  
		<input type="text" id="txtcate_ref" name="txtcate_ref" readonly="true" style="width:150px; border:0px; background:transparent; color:rgb(255,55,1); padding:1px 1px 1px 1px; font-size:16px; margin-left:12px;" value="<?php echo $txt; ?>" />
		  </span>
		<span style="float:left; margin-left:5px;">within</span>
	    <span style="float:left; margin-left:3px;">
			<select id="drpDist_ref" name="drpDist_ref" class="font-medium_indx" style="width:70px; padding:1px 1px 1px 1px;" onChange="refr_seln();">
			<option value="100" <?php if(isset($_GET['km']) && $_GET['km']==100){?> selected="selected" <?php }?>> 100 </option>
			  <option value="200" <?php if(isset($_GET['km']) && $_GET['km']==200){?> selected="selected" <?php }?>> 200 </option>
			  <option value="300" <?php if(isset($_GET['km']) && $_GET['km']==300){?> selected="selected" <?php }?>> 300 </option>
			  <option value="500" <?php if(isset($_GET['km']) && $_GET['km']==500){?> selected="selected" <?php }?>> 500 </option>
			  <option value="600" <?php if(isset($_GET['km']) && $_GET['km']==600){?> selected="selected" <?php }?>> 600 </option>
			  <option value="750" <?php if(isset($_GET['km']) && $_GET['km']==750){?> selected="selected" <?php }?>> 750 </option>
			  <option value="1000" <?php if(isset($_GET['km']) && $_GET['km']==1000){?> selected="selected" <?php }?>> 1000 </option>
			  <option value="1500" <?php if(isset($_GET['km']) && $_GET['km']==1500){?> selected="selected" <?php }?>> 1500 </option>
			  <option value="2000" <?php if(isset($_GET['km']) && $_GET['km']==2000){?> selected="selected" <?php }?>> 2000 </option>
			  <option value="3000" <?php if(isset($_GET['km']) && $_GET['km']==3000){?> selected="selected" <?php }?>> 3000 </option>
			  <option value="4000" <?php if(isset($_GET['km']) && $_GET['km']==4000){?> selected="selected" <?php }?>> 4000 </option>
			 </select>
		</span>	
	<?php 
	echo '<script type="text/javascript" language="javascript">
     function refr_seln()
     {	 
	 var loc = document.getElementById(\'drp_frm_ref\').options[document.getElementById(\'drp_frm_ref\').options.selectedIndex].value;
   var cate = document.getElementById(\'txtcate_ref\').value;
   var km = document.getElementById(\'drpDist_ref\').options[document.getElementById(\'drpDist_ref\').options.selectedIndex].value;
   
   var p1 = Array();
   p1=cate.split(" ");
   if(p1[0]!="Sightseeing")
      var val = p1[0]+"_"+p1[1];
   else
      var val = p1[0];	
	 	     
   window.location.href=window.location.href+"?cate="+val+"&locn="+loc+"&km="+km;
  
     }';	 
	 ?>
		</script>
		</div>
		<div style="float:left; width:100%;">
		<span style="float:left; margin-left:px;">from</span>
		<span style="float:left; margin-left:3px;">
         <select id="drp_frm_ref" name="drp_frm_ref" style="float:left;width:200px; font-size:14px;" onChange="refr_seln();">
		   <option value="<?php if(isset($_GET['locn'])) echo $_GET['locn']; ?>" selected="selected"><?php if(isset($_GET['locn'])) echo $_GET['locn']; ?></option>
		   <?php
		   if(isset($_GET['locn']))
		   {
		    $q_al_loc = "select distinct(to_loc) as to_loc from distance_matrix";
			$r_al = mysqli_query($con,$q_al_loc);
			if($r_al)
			{
			 while($r= mysqli_fetch_array($r_al))
			 {
			  echo '<option value='.$r["to_loc"].'>'.$r["to_loc"].'</option>';
			 }
			}
			}
		   ?>
		 </select>
        </span>
		<span style="float:left; margin-left:3px;">are listed below:</span>
	    </div> 
		</div>
	    
	  
	  <div style="border-bottom:2px solid #b22; width:100%; float:left;margin-top:1px;"></div>
	  
	  <div id="div_loc_btns" style="margin-top:10px; float:left; width:100%; height:auto; max-height:80px;"></div>
	 
	  <div id="div_trv_dt" style="margin-top:10px; float:left; width:100%; margin-left:5px; height:10px;">
	    <span id="trv_hdr" class="font-medium_indx"></span>
	    <span id="trv_dates" class="font-medium_indx" style="color:#b22;"></span>
	  </div>

	  <div style="width:100%; float:left;">
		<span style="float:left; color:#FFFFFF; margin-top:10px;">
	      	 <div style="width:100%; margin-top:5px; margin-left:55px;">
		
		 <span style="float:left; width:48%;">
		 	<div class="smallbtn" style="width:180px; height:80px; background:#0066ff; opacity:0.8;" onClick="show_block('div_prefCities');">
			<span class="font-medium_indx" style="color:#fff; font-size:26px; margin-top:5px; margin-left:35px; float:left; text-align:left;">1. Select <br/> Locations</span>
			</div>	
		    	
				<div id="div_prefCities" class="div_drpListItems_date" onMouseOut="hide_block('div_prefCities');" onMouseOver="show_block('div_prefCities');">	
			<div style="float:left; width:100%;">
			  <span style="float:left;">
			  <input id="searchPck" type="text" class="searchPck" style="width:300px; height:25px;" placeholder="Enter City Name" onKeyUp=" toUpper(this.id);" /></span>
			</div>            
			<div id="resultPck"></div>
			
			<div id="listDest" style="position:relative; margin-top:1px; color:#444; width:auto;" >
			<?php			   
			  if(isset($_GET['locn']) && isset($_GET['km']) && isset($_GET['cate']))
			   {
     			$km = $_GET['km'];
				$loc = $_GET['locn'];
				$cate = $_GET['cate'];
					$arr = array();
					$plc=array();
							
				set_time_limit(10000);
										
				$sel = "select $cate from vacth_tab ";
				$res = mysqli_query($con,$sel);
				if($res)
				{
				while($row = mysqli_fetch_array($res))
				{
				  $arr[] = $row[$cate];
				 }
				 }
				 for($j=0; $j<count($arr); $j++)
				 {
				   $plc = explode(",",$arr[$j]);
				$dest_dis = "select  to_loc, distance, from_loc from distance_matrix where from_loc like '".$loc."%' and to_loc like '".$plc[0]."%' and distance <= $km order by distance asc";
				$res_dis = mysqli_query($con,$dest_dis);

				if($res_dis)
				{
				while($r = mysqli_fetch_array($res_dis))
				{
   				if($r["distance"]<=$km && $r["distance"]>0)
  				{  	
				  $toLoc = explode(",",$r["to_loc"]);			  
	           echo '<span class="span_drpListItems_exp">
<input type="checkbox" id="'.$toLoc[0].'" value="'.$toLoc[0].'" style="zoom:1.3; margin-right:3px; float:left;" onClick="selectLoc(this.id);" />
<span style="float:left;"  onclick="selectLocName("'.$toLoc[0].'");">'.$toLoc[0].'</span><span style="margin-left:20px; margin-top:8px; font-size:14px;">'.$r["distance"].'Km</span></span>';
				 }
				}
				}
				}
				}
							
			?>
			</div>
			
			</div>
		</span>	
			
		<span style="float:left; width:48%;">
		<div class="smallbtn" style="width:180px; height:80px; background:#0066ff; opacity:0.8;" onClick="show_block('div_trvDts');show_dest_trvDt();">
	<span class="font-medium_indx" style="color:#fff; font-size:26px; margin-top:5px; margin-left:20px; float:left; text-align:left;">2. Plan Dates/ <br/> Likely Dates</span>
		</div>
		</span>		
						
			 
		</div>
	
	   </span>		

	  </div>
	  
	 <div id="div_trvDts" >
<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px; cursor:pointer;">
<img src="Images/closeBtn.png" width="20" height="20" onClick="hide_block('div_trvDts');" /></span>
</div>

	<div style="width:100%;  margin:10px 2px 0px 10px;"> 
<span style="font-size:22px; color:DarkSlateGray;">
Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
</div>

<div style="width:100%; float:left;">
<span style="width:50%; float:left; margin-top:2%;">
<div style="margin-bottom:20px;">
   <span style="font-size:24px; margin-bottom:20px;">
	   <div style="width:145px; height:43px; font-weight:700; border-radius:5px; background:#283C5F; border:1px solid darkblue; box-shadow:2px 2px 6px grey; color:#FFFFFF; font-family:Georgia, Calibri; margin-left:120px; box-shadow: 2px 0px 8px 0px grey; font-size:16px; cursor:pointer;" onClick="show_block('div_trvDate'); hide_block('div_sugstDates');"> My travel dates are known</div>
	
    </span>
</div>
</span>
<span style="width:50%; float:left; margin-top:2%;">
<div>
<span style="float:left;">
<div style="width:140px;; height:43px; font-weight:700; border-radius:5px; background:red; border:1px solid OrangeRed; box-shadow:2px 2px 6px grey; margin-left:65px; color:#FFFFFF; font-family:Georgia,Calibri; box-shadow: 2px 0px 8px 0px grey; font-size:16px; cursor:pointer;" onClick="show_block('div_sugstDates'); hide_block('div_trvDate');">Just started planning</div>
</span>
</div> 
</span>
</div>

<div id="div_trvDate" style="display:none; width:100%; text-align:center; position:relative; margin-top:5px; margin-left:0px;">
			<span style="width:50%; margin-left:0px;">
			  <span class="div_elements" style="font-size:18px;">From</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtfrmDt" class="div_elements" style="width:115px; height:20px;"/></span>
			  <span class="div_elements"><a href="#" onClick="oDP.show(event,'txtfrmDt',2); ShowContent('datepicker');">
			  <img src="Images/calendar_icon.jpg" width="25px" height="25px" /></a></span> </span>
			  
			  <span style="margin-top:5px; width:50%; margin-left:10px">
			  <span class="div_elements" style="font-size:18px;">To</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtToDt" class="div_elements" style="width:115px; height:20px;" /></span>
			  <span class="div_elements"><a href="#" onClick="oDP.show(event,'txtToDt',2); ShowContent('datepicker');">
			  <img src="Images/calendar_icon.jpg" width="25px" height="25px" /></a></span> </span>
					 		  
			  <div  class="div_elements" align="center" style="overflow:none; float:right; margin-bottom:5px; margin-right:100px;">
		<span id="btnFrmTo" class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:60px; height:22px; float:none; font-size:16px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_trvDts'); disp_exp_dt_kn('txtfrmDt','txtToDt','adv_trp_dt');"> Submit </a></span>
			  </div>
			</div>
			
<span style="width:50%; float:right; margin-right:75px;">
			<div id="div_sugstDates" style="display:none; width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;">
			 <span class="div_elements" style="font-size:18px; margin-right:5px;">Travelling in  </span>			  
			  <span class="div_elements" style="font-size:14px; ">
			   <select id="drp_SelDt" name="drp_SelDt" onFocus="load_months();" style="width:110px;">
			   </select>
			  </span>							 		  
			  <div  class="div_elements" style="overflow:none; float:right; margin-right:60px; margin-bottom:5px;">
	<span id="btn_mnths" class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:60px; height:22px; float:none; font-size:16px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_trvDts'); wrt_dates();"> Submit </a></span>
			  </div>
			</div>
</span>



</div> 
	  
	  <div style="width:100%; float:left; margin:10px 10px 10px 10px;">
	    <span style="float:none; margin-right:10px;">
		<a id="hrefSelectCity">
	  <div class="smallbtn" style="background:#ff0000; box-shadow:2px 2px 2px #ddd; float:none; width:80px; height:30px; text-align:center; font-size:20px; font-weight:bold; padding-top:7px; margin-left:200px; z-index:0;" onClick="show_packages();">GO </div>  
	  </a>
		</span>
	  </div>
	  
	</div>	     
	
	</div>		
	
	<div id="div_body" align="center" >
	
      <div id="frntPage" class="HeaderPage" <?php if($bookHtl==true || $bookFlt==true || $expl==true ){?>style="display:none;"<?php }?>>
	    <div style="float:left; width:100%;">
		  <span style="float:right;">
		    <a href="homePage.php" target="_self"><img src="Images/closeBtn.png" width="30px" height="30px"></a></span>
	    </div>
		
		<div style="width:920px; float:left; margin-top:10px;">
<span class="font-medium" style="font-size:22px; text-align:left; margin-left:20px; color:#666;">We love assisting travellers at all stages with an end-to-end support.<br/> Select the appropriate support you need... </span></div>
		
	   <span style="float:left; width:32%; margin-top:30px; margin-left:0px;cursor:pointer;">
	   <div id="div_plan_otr" style="width:310px; height:310px; border-radius:310px; background:#fcfcfc;">
	   <div style="float:left; width:300px; height:300px; border-radius:300px; margin:4px 3px 3px 4px; background:#999999;" onClick="show_dest1(); hide_block('div_cmt_crl');" onMouseOver="brdr_1();" onMouseOut="brdr_none('div_plan_otr');">
	      <span style="float:left; margin:70px 5px 0px 5px;">
		 <div style="float:left; width:100%;"><span class="font-medium" style="color:#fff; font-size:30px; font-weight:700; text-shadow:2px 2px 2px #222;">JUST STARTED PLANNING..</span></div>
		 <div style="float:left; width:100%; margin-top:10px;"><span class="font-medium" style="color:#fff; font-size:20px; font-weight:500;">Need to figure out vacation theme and where to go..</span></div>
		 </span>
	   </div>
	   </div>
	   </span>
		   
	   <span style="float:left; width:32%; margin-top:30px; margin-left:10px;cursor:pointer;">
	   <div id="div_exp_otr" style="width:310px; height:310px; border-radius:310px; background:#fcfcfc; ">
	 <div  style="float:left; width:300px; height:300px; border-radius:300px; margin:4px 3px 3px 4px;  background:#7c9ecf;" onClick="show_dest2(); show_block('div_cmt_crl'); setTimeImg();" onMouseOver="brdr_2();" onMouseOut="brdr_none('div_exp_otr');"> 
	      <span style="float:left; margin:70px 5px 0px 5px;">
		 <div style="float:left; width:100%;"><span class="font-medium" style="color:#fff; font-size:30px; font-weight:700; text-shadow:2px 2px 2px #222;">GOT SOME IDEA,<br/> I AM EXPLORING..</span></div>
		 <div style="float:left; width:100%; margin-top:10px;"><span class="font-medium" style="color:#fff; font-size:20px; font-weight:500;">Need info to plan the itinerary and logistics..</span></div>
		 </span>
	   </div>
	   </div>
	   </span>
		   
	   <span style="float:left; width:32%; margin-top:30px; margin-left:10px; cursor:pointer;">
	   <div id="div_book_otr" style="width:310px; height:310px; border-radius:310px; background:#fcfcfc; border-color:1px solid #4da64d;">
	   <div style="float:left; width:300px; height:300px; border-radius:300px; margin:4px 3px 3px 4px; background:#4da64d; " onClick="show_dest3(); hide_block('div_cmt_crl');" onMouseOver="brdr_3();" onMouseOut="brdr_none('div_book_otr');">
	      <span style="float:left;margin:70px 5px 0px 5px;">
		 <div style="float:left; width:100%;"><span class="font-medium" style="color:#fff; font-size:30px; font-weight:700; text-shadow:2px 2px 2px #222;"> I KNOW <br/> WHERE I AM GOING..</span></div>
		 <div style="float:left; width:100%; margin-top:10px;"><span class="font-medium" style="color:#fff; font-size:20px; font-weight:500;">Need to view options, compare the prices to book..</span></div>
		 </span>
	   </div>
	 </div>
	 </div>
	 
       <div id="header_buttons" <?php if($bookHtl==true || $bookFlt==true || $expl==true){?>style="display:block;"<?php }?>>
	
	  <div id="body_header_btn_1s" style="position:relative; background:#ddd; margin-top:1px; width:945px; text-align:center; color:#444; height:50px; border-radius:5px; display:none;">			   
			   <span style="float:left;">
				 <div id="div_PlanTrip" align="center" class="div_hdrbtns" style="border-left:0px; background:rgb(255,51,1); color:#fff;"  onClick="Show_Block1_onclick(); change_bgcolor('div_PlanTrip','div_Explore','div_Book'); hide_block('div_cmt_crl');">
			 <span id="sp_PlanTrip" class="headerbtnFont" style="margin:10px 0px 0px 30px;">WONDERING WHERE TO GO?</span></div></span> 
			    			
				<span style="float:left;">
				<div id="div_Explore" align="center" class="div_hdrbtns" onClick="Show_Block2_onclick(); change_bgcolor('div_Explore','div_PlanTrip','div_Book'); show_block('div_cmt_crl'); setTimeImg();">
		<span id="sp_Explore" class="headerbtnFont" style="margin:10px 0px 0px 50px;"> EXPLORE DESTINATION </span>
			   </div></span>
				 
				 <span style="float:left;">
				<div id="div_Book" align="center" class="div_hdrbtns" style="border-right:0px;" onClick="Show_Block3_onclick(); change_bgcolor('div_Book','div_PlanTrip','div_Explore'); hide_block('div_cmt_crl'); ">
				<span class="headerbtnFont" style="margin:10px 0px 0px 80px;">  BOOK ONLINE </span></div></span>	
		</div>	
	
	  <div id="body_header_btn_2s" <?php if($expl==true){?> style="display:block;" <?php }?>>			   
	      <span style="float:left;">
				<div id="div_Explore2" align="center" class="div_hdrbtns" style="border-left:0px; background:rgb(255,51,1); color:#fff;" onClick="Show_Block2_onclick();  change_bgcolor('div_Explore2','div_PlanTrip2','div_Book2'); show_block('div_cmt_crl'); setTimeImg(); ">
		<span id="sp_Explore" class="headerbtnFont" style="margin:10px 0px 0px 50px;"> EXPLORE DESTINATION </span>
			   </div></span>
	  
			   <span style="float:left;">
				 <div id="div_PlanTrip2" align="center" class="div_hdrbtns" onClick="Show_Block1_onclick(); change_bgcolor('div_PlanTrip2','div_Explore2','div_Book2'); hide_block('div_cmt_crl');">
			 <span id="sp_PlanTrip" class="headerbtnFont" style="margin:10px 0px 0px 30px;">WONDERING WHERE TO GO?</span></div></span> 
			  		 
				 <span style="float:left;">
				<div id="div_Book2" align="center" class="div_hdrbtns" style="border-right:0px;" onClick="Show_Block3_onclick(); change_bgcolor('div_Book2','div_PlanTrip2','div_Explore2'); hide_block('div_cmt_crl'); ">
				<span class="headerbtnFont" style="margin:10px 0px 0px 80px;">  BOOK ONLINE </span></div></span>	
		</div>
		
	  <div id="body_header_btn_3s" <?php if($bookHtl== true || $bookFlt==true){?>style="display:block;"<?php }?>>			   
	        <span style="float:left;">
				<div id="div_Book3" align="center" class="div_hdrbtns" style="border-left:0px; background:rgb(255,51,1); color:#fff;" onClick="Show_Block3_onclick(); change_bgcolor('div_Book3','div_PlanTrip3','div_Explore3'); hide_block('div_cmt_crl');">
				<span class="headerbtnFont" style="margin:10px 0px 0px 80px;">  BOOK ONLINE </span></div></span>
	
			   <span style="float:left;">
				 <div id="div_PlanTrip3" align="center" class="div_hdrbtns" onClick="Show_Block1_onclick(); change_bgcolor('div_PlanTrip3','div_Explore3','div_Book3'); hide_block('div_cmt_crl');">
			 <span id="sp_PlanTrip" class="headerbtnFont" style="margin:10px 0px 0px 30px;">WONDERING WHERE TO GO?</span></div></span> 
			    			
				<span style="float:left;">
				<div id="div_Explore3" align="center" class="div_hdrbtns" style="border-right:0px;" onClick="Show_Block2_onclick();  change_bgcolor('div_Explore3','div_PlanTrip3','div_Book3'); show_block('div_cmt_crl'); setTimeImg();">
		<span id="sp_Explore" class="headerbtnFont" style="margin:10px 0px 0px 40px;"> EXPLORE DESTINATION </span>
			   </div></span>		 
					
		</div>	
		
    </div>			
				   
	  	<div id="block1" class="div_blocks" style="max-width:100%; zoom:1.1; display:none;">		  
					     <div id="plan_hdr" class="div_elements_visible" align="left" style="font-size:20px; width:100%; margin-bottom:10px; color:#0066FF; font-family:Georgia, Calibri;">Discover your <span style="font-weight:bold; color:#FF0000; font-size:22px;">vacation themes</span>&nbsp; and <span style="font-weight:bold; color:#FF0000; font-size:22px;">destinations</span> in 30 seconds.</div>				
		
						  <div>
						 <div id="tinyImg" style="display:block; margin-top:5px; margin-bottom:0px; width:100%; height:; float:left;">
						  <marquee behavior="alternate" align="left" direction="left" scrollamount="3">
						  <img src="Images/Vacation type image/adventuretour1.jpg" class="div_pt_imgs" />
						  <img src="Images/Vacation type image/agritour3.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/ancientcity1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Beachgetaway1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Campingtour.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/citytour1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/CoffeeEstate1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/DesertSafari.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/HillStation1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Honeymoonescapes1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Junglesafari3.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Natureescape.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/Religious3.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/ReserveForest2.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/RestRelaxation1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/RomanticGetaways.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/sightseeing1.jpg" class="div_pt_imgs"  />
						  <img src="Images/Vacation type image/watersports2.jpg" class="div_pt_imgs" />
						  <img src="Images/Vacation type image/wildlifeEscape.jpg" class="div_pt_imgs"  />
						  </marquee>
						  </div>						  			   	 
						 
						  <div style="margin-top:1%; width:100%; height:20px; background:#FFFFFF; float:left; vertical-align:baseline;">
				
						    <span id="span_LetsBegin" style="float:left; margin-left:5px; font-size:18px; margin-top:0px; margin-bottom:5px; color:#0066FF; font-family:Georgia,Calibri;"> Let's begin with your requirement...</span>
							</div>
						 </div>
			<div id="div_ques" style="margin-top:4px; background:#597272; width:100%; height:120px; border-radius:5px; float:left; position:relative; zoom:1.1;" onMouseOver="check_nxtbtn();">
			
			 <div id="q_ccty" style="display:block; margin:10px; position:relative;">
			   <span style="float:left;" class="input_quests">Select Your Current City :</span>
			     <span style="float:left; margin:5px;">
				   <input type="text" id="txtcCity" name="txtcCity" class="txtbox_Tab" style="width:300px;"  onMouseOver="txtbox_color_onmouseover('searchid');" placeholder="Current City" onMouseOut="txtbox_color_onmouseout('searchid');" onClick="show_explore(this.id);"; onKeyUp="toUpper(this.id);" onKeyPress="curCty(this.value);  show_block('result_pl');" /> 
				 </span>				
<div id="result_pl" style="position:absolute; bottom:-123px; width:300px; left:210px;  height:90px; background:#fff; display:none; border:1px solid #444;"></div>
			   <div style="float:left; width:100%; margin-top:5px;">
			    <span style="float:left;" class="input_quests">You Want to Travel in :</span>
				<span style="float:left; background:#fff; padding:3px; border-radius:3px; margin-left:22px;">
					     <span class="input_Ans">
							<input type="radio" id="rdIndia" name="rdDest" value="India" name="rd" checked="checked" >India</span>
							<span class="input_Ans">
							<input type="radio" id="rdAbroad" name="rdDest" value="Abroad" name="rd" > Abroad</span>
					</span>
					 <span style="float:left; margin-left:3px; cursor:pointer;">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="chkInAbr_mode(); show_box_trv();" /></span>
			   </div>
			   
			 </div>
					  
			  <div id="q_mode" style="float:left; width:100%; display:none;">
			    <span style="float:left;" class="input_quests">Your preferred mode of travel :</span>
			      <div style="float:left; width:100%;  margin-top:5px; margin-left:170px;">
				   <span style="float:left; margin-right:3px; cursor:pointer;"><img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="show_block('q_ccty'); hide_block('q_mode');" /></span>
				    <span style="float:left;  background:#fff; padding:5px; border-radius:3px;">
					     <span class="input_Ans">
						   <input type="radio" id="rdRoad" name="rdmode" value="Road" >Road </span>
				<!--	<span class="input_Ans">
					<input type="radio" id="rdTrain" name="rdmode" value="Train"> Train </span> -->
					<span class="input_Ans">
					<input type="radio" id="rdFlight" name="rdmode" value="Air" checked="checked" > Air</span> 
					<!-- <span class="input_Ans">
					<input type="radio" id="rdSea" name="rdmode" value="Sea" > Sea	</span>	 -->
					</span>
					<span style="float:left; margin-left:3px; cursor:pointer;">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="show_block('q_trvler'); hide_block('q_mode'); show_box_mode();" /></span>
				  </div>
			  </div>
			  
			  <div id="q_trvler" style="float:left; width:100%; display:none;">
			  <span style="float:left;" class="input_quests">Travellers are :</span>
			   <div style="float:left; width:100%;  margin-top:5px; margin-left:80px;">
			    
				 <span style="float:left; margin-right:3px; cursor:pointer;"><img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="chkInd_mode(); hide_block('q_trvler');" /></span>
			      
				  <span style="float:left;  background:#fff; padding:5px; border-radius:3px; width:40%;">
				  
				  <div style="float:left; width:100%;">
				   <span style="float:left; background:#fff"> 
				  <span class="input_Ans">
				  <input type="radio" value="Single" name="rdtravel" id="rdSingle" onClick="show_block('div_your_Age'); show_block('div_your_gender'); hide_block('div_kids'); hide_block('grpRd')">Single</span>
				  <span class="input_Ans">
				  <input type="radio" value="Couple" name="rdtravel" id="rdCouple" onClick="show_block('div_your_Age');  hide_block('div_your_gender');  hide_block('div_kids'); hide_block('grpRd');">Couple</span>
				  <span class="input_Ans">
				  <input type="radio" value="Group" name="rdtravel" id="rdGroup" onClick="show_block('div_your_Age');  hide_block('div_your_gender');  hide_block('div_kids'); show_block('grpRd')">Groups<font size="1">(Adults)</font> </span>
 				  </span>
				  </div>
					
				  <div id="div_your_Age" style="display:none; float:left; width:100%;">
				  <span style="float:left; background:#fff;">
					<span class="input_Ans" style="margin-right:0px; font-size:12px;">Age group:
					    <input type="radio" value="-Under 45" name="rdagegrp" id="rdage45" > Under 45 
				   <input type="radio" value="-Above 45" name="rdagegrp" id="rdage45plus" > Above 45				    
				   </span>
				    <span id="grpRd" class="input_Ans" style="display:none; float:left; margin-left:2px; font-size:12px;">
					<input type="radio" value="-Above 60" name="rdagegrp" id="rdage60plus" > Above 60</span>
				   </span>
					</div>
					
					<div id="div_your_gender" style="display:none; float:left; width:100%;">
				  <span style="float:left; background:#fff;">
					<span class="input_Ans" style="margin-right:0px; font-size:12px;">Gender:
					    <input type="radio" value="Female" name="rdgen" id="rdfemale" > Female 
				   <input type="radio" value="Male" name="rdgen" id="rdmale" > Male
				   </span>
				   </span>
					</div>
					
					 <div style="float:left; width:100%;">
				  <span style="float:left; background:#fff;">
				   <span class="input_Ans">
				   <input type="radio" value="FamilyKids" name="rdtravel" id="rdFamilykid" onClick="hide_block('div_your_Age');  hide_block('div_your_gender'); show_block('div_kids');"> Family+Kids</span>
				  <span class="input_Ans">
				  <input type="radio" value="GroupKids" name="rdtravel" id="rdGroupkid"onclick="hide_block('div_your_Age');  hide_block('div_your_gender');  show_block('div_kids'); ">Group+Kids</span>
				  </span>
				  </div>
				  				
				    <div class="input_Ans" id="div_kids" style="display:none; width:auto;">
						<span class="input_Ans" style="margin-right:0px; font-size:12px;">Kid's Age:
						<input type="checkbox" name="chkkid" id="chkkid" >0-2Yrs	
				 		 <input type="checkbox" name="chkchild" id="chkchild" > 2-12Yrs 
						<input type="checkbox" name="chkchildplus" id="chkchildplus"> 12+Yrs 
						 </span>
							</div>
							
				  </span>
				  
				  <span style="float:left; margin-left:1px; cursor:pointer; width:5%">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="chkInAbr_dur(); hide_block('q_trvler'); show_box_traveller();" /></span>
			   </div>
			  </div>			  
			  	 
			 <div id="q_abr_dur" style="display:none; margin:10px; width:100%;">
			    <span style="float:left;" class="input_quests">Trip Duration :</span>
				
				<div style="float:left; width:100%; margin-top:5px; margin-left:80px;">
			 
			    <span style="float:left; margin-right:3px; cursor:pointer;">
				 <img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="show_block('q_trvler'); hide_block('q_abr_dur');" /></span>				 
				 
				 <span style="float:left;  background:#fff; padding:5px; border-radius:3px;">
				 <span class="input_Ans">
				<select class="input_Ans" name="drptime_abr" id="drptime_abr" style="width:200px; height:22px;" onChange="show_box_dur()">
					<option selected="selected" value="0">--------select-------</option>
				    <option value="<5Days"> < 5 Days </option>
					<option value="5-10Days"> 5-10 Days </option>
					<option value="10-20Days"> 10-20 Days </option>
					<option value="20-30Days"> 20-30 Days </option>
					<option value="30Days"> > 30 Days </option>
					</select>
					</span>
				 </span>
				<span style="float:left; margin-left:1px; cursor:pointer; width:5%">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="show_block('div_confirmBtn_abr'); show_block('span_thanku'); hide_block('q_abr_dur'); show_box_dur()" /></span>
				</div>
			 </div>				 
		  
			  <div id="q_dur" style="float:left; width:100%; display:none;">
			    <span style="float:left;" class="input_quests">Trip Duration :</span>
				
				<div style="float:left; width:100%; margin-top:5px; margin-left:80px;">
			 
			    <span style="float:left; margin-right:3px; cursor:pointer;">
				 <img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="show_block('q_trvler'); hide_block('q_dur');" /></span>				 
				 
				 <span style="float:left;  background:#fff; padding:5px; border-radius:3px;">
				 <span class="input_Ans">
				<select class="input_Ans" name="drptime" id="drptime" style="width:200px; height:22px;" onChange="chkDur_len(); show_box_dur(); ">
					<option selected="selected" value="0">--------select-------</option>
				    <option value="Weekend">Weekend </option>
					<option value="3Days"> 3Days </option>
					<option value="3-7Days"> 3-7Days </option>
					<option value="7-10Days">  7-10Days</option>
					<option value="over 10Days"> over 10Days</option>
					</select></span>
				 <br/>
				 
				 <div id="q_loc_type" style="float:left; display:none;">
				 
				 <span class="input_Ans">
							<div class="smallbtn" style="width:80px; height:30px; font-size:11px; background:#597272; color:#FFFFFF; cursor:pointer;" id="btnsinglecity" onClick="show_block('q_pref_loc'); hide_block('q_dur'); show_box_Singleloc();">Single Location</div></span>
							
					<span class="input_Ans">
				<div class="smallbtn"  style="width:80px; height:30px; font-size:11px; background:#666633; color:#FFFFFF; cursor:pointer;" id="btnmulticity" onClick="show_block('q_multi_locs'); hide_block('q_dur'); show_box_Multiloc();">Multiple Location</div></span>	
				 	 </span>			 
					  
				
				</div>
				
				</span>
				</div>
				
				</div>
			  
			    <div id="q_pref_loc" style="float: left; width:100%; display:none;">
			    <span style="float:left;" class="input_quests">Wants to holiday at :</span>
				<div style="float:left; width:100%;  margin-top:5px; margin-left:80px;">
			    
				 <span style="float:left; margin-right:3px; cursor:pointer;">
				 <img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="show_block('q_dur'); hide_block('q_pref_loc');" /></span>
				 
				 <span style="float:left;  background:#fff; padding:5px; border-radius:3px; width:60%;">
				  <div style="float:left; width:100%;">
				   <span id="sp_sug_loc_hdr" class="input_Ans"  style="float:left; color:#ff0000;" >
				   <input type="checkbox" id="chk_qcnSiglLoc" value="OK_Loc" onClick="show_box_prefCity_Single(); document.getElementById('sp_sug_loc_hdr').style.color='#444'; hide_block('sel_dest');" />I am okay with QCN suggested destinations.    OR </span>
				  </div>
				  <div style="float:left; width:100%;">
				  <span class="input_Ans" style="text-decoration:underline; color:#0066ff; font-size:12px; cursor:pointer;" onClick="show_block('sel_dest'); document.getElementById('sp_sug_loc_hdr').style.color='#aaa';">Want to select my destination..</span></div>
				  <div id="sel_dest" style="float:left; width:100%; display:none;">
				   <span class="input_Ans">
				<input type="text" class="txtbox_Tab" name="drpPrefCity_Single" id="drpPrefCity_Single" style="width:300px;height:22px;" onChange="show_box_prefCity_Single();" onKeyPress="show_block('result_sngl'); snglCty(this.value);" placeholder="Select my own destination" />
				</span>
					</div>
			<div id="result_sngl" style="position:absolute; top:100px; left:100px; width:300px; height:90px; background:#fff; display:none; border:1px solid #444; z-index:100;"></div>
					</span>
					
					 <span style="float:left; margin-left:1px; cursor:pointer; width:5%">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="show_box_prefCity_Single();" /></span>	
				 
				 </div>		 
			  </div>			  
			  		  
			   <div id="q_multi_locs" style="float:left; width:100%; display:none;">
			       <span style="float:left;" class="input_quests">Trip Duration :</span>
				<div style="float:left; width:100%;  margin-top:2px; margin-left:80px;">
			    
				 <span style="float:left; margin-right:3px; cursor:pointer;">
				 <img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" onClick="show_block('q_dur'); hide_block('q_multi_locs');" /></span>  
				    <span style="float:left;  background:#fff; padding:5px; border-radius:3px; width:50%;">
					
					<div id="div_numLoc" style="float:left; width:100%;">
					<span id="span_prefCity" class="input_quests" style="float:left;display:block; color:#555555; font-size:14px;">Select # of locations :</span>					 
					 <span class="input_Ans">
					 <select id="drpNum" name="drpNum" style="width:30px;height:20px; background:#DDDDDD;" onChange="show_box_locNum(); show_block('lnkDest');">
					 <option value="0"></option>
				<option value="2"> 2 </option>
				<option value="3"> 3 </option>
				<option value="4"> 4 </option>	
				<option value="5"> 5 </option>
				</select>
				</span>	
				<span id="div_sugLoc" style="float:left; display:none;">
				 <span id="sp_sug_loc" class="input_Ans"  style="float:left; color:#ff0000; font-size:14px;" >
	<input type="checkbox" id="chk_qcnLoc" name="chk_qcnLoc" value="OK_Loc" onClick="show_box_prefCity(); chkClick();" />I am okay with QCN suggested destinations.    OR </span>	
				   </span>	       
				   </div>		
				   
				   <div id="lnkDest" style="float:left; width:100%; display:none;">
				  <span class="input_Ans" style="text-decoration:underline; color:#0066ff; font-size:12px; cursor:pointer;" onClick="show_block('div_sel_loc'); document.getElementById('sp_sug_loc_hdr').style.color='#aaa';">Want to select my destination..</span></div>
				   			
					 <div id="div_sel_loc" style="float:left; width:100%; display:none;">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">
					  <input type="text" id="txtPref_multiLoc" class="txtbox_Tab" style="width:300px; height:25px;" placeholder="Select my own destination" onKeyPress="mulCty(this.value); show_block('result_mult');" onClick="document.getElementById('sp_sug_loc').style.color='#999'; show_block('div_box_prefCity');" /></span></div>
					  <div style="float:left; width:100%;">
					   <div id="result_mult" style="float:left; width:400px; background:#fff; height:100px; display:none; z-index:100; position:absolute; bottom:-97px; overflow-y:scroll; overflow-x:hidden;">
					    
					   </div>
					  </div>
					 </div> 	
					 		
					</span>				  
				  <span style="float:left; margin-left:1px; cursor:pointer; width:5%">
				 <img src="Images/nextBtn.png"  width="35px" height="35px" onClick="chkDest(); show_box_prefCity();" /></span>
			  </div>
			  </div>
			  
			  <div  id="div_confirmBtn"  align="center" style="height:auto; color:#002929; width:100%; display:none; margin-left:10px; position:absolute; bottom:10px;">
		 						<span style="float:right;">
						 <div id="modifybtn" class="smallbtn" style="width:60px; background:grey; margin-right:15px; height:22px; border:1px solid Darkgrey; font-weight:600; font-size:15px; display:block;" onClick="change_bg_inputs();"> Modify </div>
								</span>
								<span style="float:right;">							 
							 <input type="button" id="submitbtn" name="submitbtn" class="smallbtn" style="width:60px; height:22px; margin-right:5px; border:1px solid black; font-weight:600; font-size:15px; display:block;" onClick="sub_val_domes('false');" value="Submit" />
								</span>
							</div>
							
				<div  id="div_confirmBtn_abr"  align="center" style="height:auto; color:#002929; width:100%; display:none; margin-left:10px; position:absolute; bottom:10px;">
		 						<span style="float:right;">
						 <div id="modifybtn_abr" class="smallbtn" style="width:60px; background:grey;  margin-right:15px;  height:22px; border:1px solid Darkgrey; font-weight:600; font-size:15px; display:block;" onClick="change_bg_inputs();"> Modify </div>
								</span>
								<span style="float:right;">							
							<input type="button" id="submitbtn_abr" name="submitbtn_abr" class="smallbtn" style="width:60px; height:22px;  margin-right:5px;  border:1px solid black; font-weight:600; font-size:15px; display:block;" onClick="sub_val_abr('false');" value="Submit" />
								</span>
							</div>			
							
			<div id="span_thanku" align="center" class="font_medium" style="display:none; width:100%; font-size:14px; color:#FFFFFF; margin-top:20px;" >
						  <span style="margin:80px 130px 0px 130px;">That was quick..took only 11 Seconds!</span><br/>
						  	<span style="margin:20px 0px 40px 20px;">Now you are only a click away to discover your vacation</span><br/>
						  <span style="margin:20px 0px 40px 18px;">Click submit button below.</span>				  
						  </div>				
						  
			
			</div>
			
<div id="div_collectInputs" style="width:100%; height:auto; float:left; border-radius:5px; opacity:0.8; margin-top:1px; margin-bottom:0px; margin-left:10px; display:none;">
							<span style="float:left;">
							<div>
							<span style="float:left;">								
						<div class="box_ans" id="div_box_country" onMouseOver="input_btn_border('div_box_country'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_country'); HideContent('contextInputsEdit');" onClick="change_cCity();">
						<span style="float:left; margin-left:5px;">Wants to tavel within&nbsp; </span>
						<span id="_country" style="float:left;"></span>
					    </div>
						 </span>
						 <span style="float:left;">
					<div id="div_box_cCity" class="box_ans" onMouseOver="input_btn_border('div_box_cCity'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_cCity'); HideContent('contextInputsEdit');" onClick="change_cCity();">
						 <div><span style="float:left;margin-left:5px;">Currently I'm at&nbsp;</span>
						<span id="_cCity" style="float:left;"></span></div>
					    </div>
						 </span>
						 
						<span style="float:left;">
					<div id="div_box_mode" class="box_ans" onMouseOver="input_btn_border('div_box_mode'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_mode'); HideContent('contextInputsEdit');" onClick="change_prefTravel();">
					 <div><span style="float:left;margin-left:5px;">Prefer travelling by&nbsp; </span>
						<span id="_mode" style="float:left;"></span></div>
				    </div>
						 </span>
						 
						<span style="float:left;">
					 <div id="div_box_traveller" class="box_ans" style="overflow-y:scroll;" onMouseOver="input_btn_border('div_box_traveller'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_traveller'); HideContent('contextInputsEdit');" onClick="change_travellers();">
					  <div><span id="_travellerHdr" style="float:left;margin-left:5px;"></span>
						<span id="_traveller" style="font-size:12px;float:left;"></span></div>
					 </div>
						  </span>
						  
				 <span style="float:left;">
					<div id="div_box_Dur" class="box_ans" onMouseOver="input_btn_border('div_box_Dur'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_Dur'); HideContent('contextInputsEdit');" onClick="change_tripDur();"> 
					<div><span id="_tripDurHdr" style="float:left;margin-left:5px;"></span>
						<span id="_tripDur" style="float:left;"></span></div>
				    </div>
						  </span>
						  
					<span style="float:left;">						  					
							<div id="div_box_locType" class="box_ans" onMouseOver="input_btn_border('div_box_locType'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_locType'); HideContent('contextInputsEdit');" onClick="change_locType();"> 
						<div><span id="_locTypeHdr" style="float:left;margin-left:5px;"></span>
						<span style="float:left">
						<input type="text" id="_locType" class="box_ans" name="_locType" style="float:left; width:auto; height:auto; outline:none; border:none; display:block;" />
						</span></div>
					    </div>					
						  </span>
						  
						  <span style="float:left;">
							<div id="div_box_locNum" class="box_ans" onMouseOver="input_btn_border('div_box_locNum'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_locNum'); HideContent('contextInputsEdit');"  onClick="change_locNum();"> 
						<div><span style="float:left;margin-left:5px;">Wants to holiday at&nbsp;</span>
						<span id="_locNum" style="float:left;"></span></div>
					    </div>	
						  </span>
						  
				         <span style="float:left;">
							<div id="div_box_prefCity" class="box_ans" style="height:auto;" onMouseOver="input_btn_border('div_box_prefCity'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_prefCity'); HideContent('contextInputsEdit');" onClick="change_prefLoc();">
						 <div><span id="_prefCity_Hdr" style="float:left;margin-left:5px;"></span></div>
						<div style="float:left; width:100%;"><span style="float:left; overflow-y:scroll;">
						<textarea  class="font-ultrasmall" id="_prefCity" name="_prefCity" style="height:auto; width:280px; border:none; outline:none; background:#A0CAAF; color:#222;"></textarea>
						</span></div></div>
					    </div>
						  </span>
						  
				<!---  <span style="float:left;">
						<a href="#" onclick="change_package();" style="text-decoration:none;">
						<div id="div_box_Package" class="box_ans" onmouseover="input_btn_border('div_box_Package');ShowContent('contextInputsEdit');" onmouseout="input_btn_toggle('div_box_Package'); HideContent('contextInputsEdit');">
						 <div><span id="_accHdr" style="float:left;margin-left:5px;"></span>
						<span id="_package" style="float:left;"></span></div>
						 </div>	</a>
						  </span>  --> 
					  	    </div>
						    </span>
						 	</div>
										   
        <div id="block2" class="div_blocks2" <?php if($expl==true){?> style="display:block;" <?php }?>>
					
				<div style="width:100%; height:110px; border-radius:5px; float:left; background:#FFFFFF;">		   
		         <div id="div_explore_text" style="font-size:14px; margin-top:20px; border-radius:5px; width:100%; height:108px; background:#eee;">					    										   
					   <span style="float:left;">
					   <form action="index.php" method="post">		
					   <input type="text" id="searchid" name="searchid" class="search" value="Want to go to... Goa, Coorg, Jaipur, Kajiranga" onMouseOver="txtbox_color_onmouseover('searchid');" onMouseOut="txtbox_color_onmouseout('searchid');" onClick="show_explore(this.id);"; onKeyUp="toUpper(this.id);" /> 
						</form>
						 </span>	               
					   <span style="float:left; margin-top:30px;">
					    <a id="hrefExplore" href="ExploreDest_cityscape.html">					   
					   <div class="smallbtn" id="btnSelect" style="font-size:16px; width:70px; margin-top:0px; padding-top:5px; font-weight:600; height:30px; box-shadow:1px 0px 6px 0px lightgrey;  background:red; border:1px solid grey;" onClick="insertQS('false');">Explore</div> 
					   </a></span>
					   
					   </div>
					    <div id="result"></div>				
					   </div>
					  
					    
			     <div style="float:left; width:100%; height:30px; margin-top:15px; text-align:left; margin-left:100px;">
				 <span class="font-medium" style="color:#0066ff; margin-left:5px; font-size:30px; font-weight:bold;">Or</span></div>
					   
					  <div class="div_elements_visible" style="width:100%;">				 			
					  <a href="#" style="border-bottom:none; ">
<div id="div_popularDest" class="headerbtn" style="width:300px; height:24px; font-size:18px; float:left; background:#002929; color:#FFFFFF;">Explore Vacations by Themes</div>
		              </a>
					   </div>
					   
		   <div class="div_elements_visible"  style="margin-left:0px;overflow-y:scroll; overflow-x:hidden; margin-top:3px; height:270px; max-width:100%; color:#B22222; margin-bottom:10%;">
      
			 <table id="tab" width="800px" height="550px" cellspacing="0.5px" cellpadding="0.5px" style="font-size:14px; z-index:100;">
			<tr>
			<!--------------------------------------------- 1st row--------------------------------------------------------------------------------->
			<td align="center"  id="img_td1" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19',this.id);">
   		 <div class="div_explore_imgs_hm" style="background: url('Images/Vacation type image/adventuretour2.jpg') no-repeat;" onClick="show_date_div('div_currLoc','280','110','1em','0em','Adventure Tour','img_td1');  show_block('div_greyBack');"></div> 		
		 <span class="font_medium_cust"> AdventureTour </span> 
			</td>
			
			<td align="center" id="img_td2" onMouseOver="blur_td('img_td1', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td1', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		  <a href="#" id="ref_bch"><div  class="div_explore_imgs_hm" style="background:url('Images/Vacation type image/Beachgetaway.jpg') no-repeat;" onClick="show_date_div('div_currLoc','570','110','1em','0em','Beach Getaway','img_td2'); show_block('div_greyBack');"></div></a>	
		<span class="font_medium_cust">BeachGetAway</span>
		 </td>
		 
			<td align="center" id="img_td3" onMouseOver="blur_td('img_td2', 'img_td1', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td1', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
     	<div style="background:url('Images/Vacation type image/JungleSafari.jpg') no-repeat;" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105','110','0em','1em','Jungle Safari','img_td3');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Jungle Safari</span>
		 </td>
		 </tr>
		<tr>
		<!--------------------------------------------- 2nd row--------------------------------------------------------------------------------->
			<td align="center" id="img_td4" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td1', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td1', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
			<div style="background:url('Images/Vacation type image/sightseeing.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','280px','110px','1em','0em','Sightseeing','img_td4');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Sightseeing</span>
			</td>
				
			<td align="center" id="img_td6" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td1', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td1', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
	<div style="background:url('Images/Vacation type image/citytour1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','110px','1em','0em','City Tour','img_td6');  show_block('div_greyBack');">	</div>
		<span class="font_medium_cust">City Tour</span>
		</td>
		 
		 	<td align="center" id="img_td7" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td1', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td1', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
			<div style="background:url('Images/Vacation type image/Hillstation.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105px','110px','0em','1em','Hill Station','img_td7');  show_block('div_greyBack');"></div>
				<span class="font_medium_cust">Hill Station</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 3rd row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td8" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td1', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td1', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		 <div style="background:url('Images/Vacation type image/NatureEscape2.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','280px','110px','1em','0em','Nature Escape','img_td8');  show_block('div_greyBack');"> </div>	
		 <span class="font_medium_cust">Nature Escape</span>
		 </td>
		 
		 	<td align="center" id="img_td9" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td1', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td1', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/wildlifeEscape3.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','110px','1em','0em','WildLife Escape','img_td9');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">WildLife Escapes</span>
		 </td>
		 
		 	<td align="center" id="img_td10" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td1', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td1', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/religious1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105px','110px','0em','1em','Religious','img_td10'); show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Religious Tour</span>
		</td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 4th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td11" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td1', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td1', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/CoffeeEstate.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','280px','110px','1em','0em','CoffeeTea Estates','img_td11');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Coffee/Tea Estates</span>
		</td>
		
		 	<td align="center" id="img_td12" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td1', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td1', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		<div style="background:url('Images/Vacation type image/Honeymoonescapes3.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','110px','1em','0em','Honeymoon Escape','img_td12');  show_block('div_greyBack');">	</div>
		<span class="font_medium_cust">Honeymoon Escapes</span>
		</td>
		
		 	<td align="center" id="img_td13" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td1', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td1', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/watersports4.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105px','110px','0em','1em','Water Sport','img_td13');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Water Sports</span>
		</td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 5th row--------------------------------------------------------------------------------->
		    <td align="center" id="img_td14" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td1', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td1', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
<div style="background:url('Images/Vacation type image/ReserveForest1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','280px','110px','1em','0em', 'Reserve Forest','img_td14');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust">Reserve Forests</span>
	</td>
	
		 	<td align="center" id="img_td15" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td1', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td1', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background:url('Images/Vacation type image/DesertSafari1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','110px','1em','0em','Desert Safari','img_td15');  show_block('div_greyBack');"></div>
		 <span class="font_medium_cust">Desert Safari</span>
		 </td>
		 
	 		<td align="center" id="img_td16" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td1', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td1', 'img_td17', 'img_td18','img_td19');">			
	<div style="background:url('Images/Vacation type image/Honeymoonescapes1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105px','110px','0em','1em','Romantic Getaway','img_td16');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust"> Romantic Gateway</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 6th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td17" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td1', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td1', 'img_td18','img_td19');">			 
	<div style="background:url('Images/Vacation type image/camping3.jpg');" class="div_explore_imgs_hm" "show_date_div('div_currLoc','280px','110px','1em','0em','Camping Tour','img_td17');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust">Camping Tour</span>
		 </td>
		 
		 	<td align="center" id="img_td18" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td1','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td1','img_td19');">			
	<div style="background:url('Images/Vacation type image/Honeymoonescapes1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','110px','1em','0em','Wellness Relaxation','img_td18');  show_block('div_greyBack');"></div> 
	<span class="font_medium_cust">Rest & Relaxing</span>
		 </td>
		 
		 	<td align="center" id="img_td19" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td1');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18', 'img_td1');"> 			
	<div style="background:url('Images/Vacation type image/agritour5.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','105px','110px','0em','1em','Agri/Eco Tourism','img_td19');  show_block('div_greyBack');"></div>
	 <span class="font_medium_cust">Agri/Eco Tourism</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 7th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td5" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background: url('Images/Vacation type image/ancientcity1.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','280px','200px','1em','0em','Historical','img_td5');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Heritage/Forts</span>
		 </td>
		 <td align="center" id="img_td20" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background: url('Images/Vacation type image/citytour4.jpg');" class="div_explore_imgs_hm" onClick="show_date_div('div_currLoc','570px','200px','1em','0em','Weekend Getaway','img_td20');  show_block('div_greyBack'); show_block('weekendVac');"></div>
		<span class="font_medium_cust">Weekend Getaway</span>
		 </td>
		 </tr>
		 </table>
	
				    </div>	  
			  </div>
			  
		<div id="div_BookTravel" class="BookTravel" <?php if($bookHtl== true || $bookFlt==true){?>style="display:block;"<?php }?>>
						   
    <div class="font_medium" align="center" style="margin:0px 0px 0px 0px; background:#FFFFFF; width:100%;"> 
				     <span style="margin-left:3px; float:left;"><img src="Images/Flight.png" class="travel_img_cust" onClick="btnflights_click('btnflight_L','btnhotel_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/hotel.png" class="travel_img_cust" onClick="btnhotel_click('btnhotel_L','btnflight_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');"></span>
					 <span style="margin-left:5px; float:left;"><img src="Images/package_icon.jpg" class="travel_img_cust" onClick="btnpackages_click('btnpck_L','btnbus_L','btnhotel_L','btnflight_L','btncar_L','btntrain_L');"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/Taxi.png" class="travel_img_cust" onClick="btncars_click('btncar_L','btnhotel_L','btnflight_L','btntrain_L','btnbus_L','btnpck_L');"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/Train.png" class="travel_img_cust" onClick="btntrains_click('btntrain_L','btnhotel_L','btnflight_L','btncar_L','btnbus_L','btnpck_L');"></span>
					 <span style="margin-left:5px; float:left;"><img src="Images/Bus.gif" class="travel_img_cust" onClick="btnbus_click('btnbus_L','btnhotel_L','btnflight_L','btncar_L','btntrain_L','btnpck_L');"></span>
				   </div>
		             
	<div class="font_medium" align="center" style="margin:0px 1px 0px 1px;zoom:1.2; margin-right:1px solid #F5F5F5; background:#002929; width:100%; height:25px;" >
				     
		<span class="font_medium" style="margin-left:10px;">
	<div  id="btnflight_L" onClick="btnflights_click(this.id,'btnhotel_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');" <?php if($bookFlt== true){?>style="background:#f5f5f5; color:#b22;"<?php }?>>Flights</div></span>
	
	<span class="font_medium" style="margin-left:10px;">
	<div id="btnhotel_L" onClick="btnhotel_click(this.id,'btnflight_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');" <?php if($bookHtl== true){?>style="background:#f5f5f5; color:#b22;"<?php }?>> Hotels </div></span>
   
   <span class="font_medium" style="margin-left:10px;">
   <div id="btnpck_L" onClick="btnpackages_click(this.id,'btnhotel_L','btnflight_L','btntrain_L','btnbus_L','btncar_L');">Packages</div></span>
   
   <span class="font_medium" style="margin-left:10px;">
   <div id="btncar_L" onClick="btncars_click(this.id,'btnhotel_L','btnflight_L','btntrain_L','btnbus_L','btnpck_L');">Cars</div></span>   
					 
  <span class="font_medium" style="margin-left:10px;">
  <div id="btntrain_L" onClick="btntrains_click(this.id,'btnhotel_L','btnflight_L','btncar_L','btnbus_L','btnpck_L');">Trains</div></span>
  
   <span class="font_medium" style="margin-left:10px;">
   <div  id="btnbus_L" onClick="btnbus_click(this.id,'btnhotel_L','btnflight_L','btncar_L','btntrain_L','btnpck_L');">Buses</div></span>
				   
		</div>
		
	<div style="width:945px; height:320px;">		 
			     
				 	 <div id="div_flight" class="div_btn_TravelVehicle" <?php if($bookHtl== true){?>style="display:none;"<?php } else{?>style="display:block;"<?php } ?>>
				     
					 <table style="width:830px;" cellpadding="5" cellspacing="2">
					     <tr>

					        <td colspan="2">
							<span class="font_medium">
<input type="radio" name="rdways_Flight" id="rdOneway_Flight" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Flight','returnDate_Flight');" /> OneWay </span><span class="font_medium" style="margin-left:20px;">
<input type="radio" name="rdways_Flight" id="rdReturn_Flight" value="Return" onClick="return_journey('rdReturn_Flight','returnDate_Flight');" /> Return</span>
</td>
						  </tr>
						  <tr><td colspan="4"> <div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
						 
						     <tr>
						     <td align="right"><span class="font_medium" style="float:right"> I am at: </span></td>
	<td align="left"><span class="font_medium">
	<select id="drpSource" class="txtbox_trv_cust" style="height:30px;" name="drpSource" onChange="validateWay();"  onmouseover="txtbox_color_onmouseover('drpSource');" onmouseout="txtbox_color_onmouseout('drpSource');">
					<option selected="selected" value="<?php echo $src; ?>"><?php echo $src; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 
							 </td>
							 <td align="right"><span class="font_medium" style="float:right"> Going To: </span>									
						<td align="left"><span class="font_medium">
						 <select name="drpDestination" class="txtbox_trv_cust" style="height:30px;" id="drpDestination" onChange="validateBoarding();" onmouseover="txtbox_color_onmouseover('drpDestination');" onmouseout="txtbox_color_onmouseout('drpDestination');">
						 <option selected="selected" value="<?php echo $dest; ?>"><?php echo $dest; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
					 </span>
							 </td>
						  
						  </tr>
						   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
					
				        	<tr>
					<td align="right"><span class="font_medium" style="float:right"> Departure Date:</span></td>
					<td align="left">				
					<span class="font_medium">
			<input type="text" id="frmDate_Flight" class="txtbox_trv_cust" style="width:150px;" onMouseOver="txtbox_color_onmouseover('frmDate_Flight');" onMouseOut="txtbox_color_onmouseout('frmDate_Flight');" onClick="oDP.show(event,'frmDate_Flight',2); ShowContent('datepicker');"/></span>
		</td>
			<td align="right"><span class="font_medium" style="float:right">Return Date: </span></td>
			<td align="left"><span class="font_medium">
					<input type="text" id="returnDate_Flight" class="txtbox_trv_cust" disabled style="background:grey; width:150px;" onClick="oDP.show(event,'returnDate_Flight',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('returnDate_Flight');" onMouseOut="txtbox_color_onmouseout('returnDate_Flight');" /></span>
			
			</td>
					</tr>
									
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
					
				     <tr>
					  <td colspan="4" align="center">
					  <span class="font_medium" style="float:none;">Adults:</span>
						<span class="font_medium" style="float:none;">
						<select  class="txtbox_trv_cust" style="width:30px; height:25px;" onChange="validateDepDate();" name="drpAdult" id="drpAdult" onmouseover="txtbox_color_onmouseover('drpAdult');" onmouseout="txtbox_color_onmouseout('drpAdult');">
						<option value="0">0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  
					     <span class="font_medium" style="float:none; margin-left:20px;">Children:</span>
						<span class="font_medium" style="float:none;">
						<select class="txtbox_trv_cust" style="width:30px; height:25px;" name="drpChild" id="drpChild" onmouseover="txtbox_color_onmouseover('drpChild');" onmouseout="txtbox_color_onmouseout('drpChild');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					 
					     <span class="font_medium" style="float:none;margin-left:20px;">Infants:</span>
						<span class="font_medium" style="float:none;">
						<select class="txtbox_trv_cust" style="width:30px; height:25px;" name="drpInfant" id="drpInfant" onmouseover="txtbox_color_onmouseover('drpInfant');" onmouseout="txtbox_color_onmouseout('drpInfant');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  
					  </td>
					  </tr>
					   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
					 
			         <tr>
				<td colspan="4" align="center">
				<span class="font_medium" style="float:none;"><input type="radio" value="Economy" id="rdeco" name="rdclass" checked="true" onClick="validatePassengers();"> Economy</span> 
				<span class="font_medium" style="float:none; margin-left:20px;"><input type="radio" value="Business" id="rdbusi" name="rdclass" onClick="validatePassengers();"> Business</span>
				<span class="font_medium" style="float:none; margin-left:20px;"><input type="radio" value="Business" id="rdbusi" name="rdclass" onClick="validatePassengers();"> FirstClass</span>  
					</td>			  
					</tr>
					
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
					
					 <tr>
					  <td colspan="4" align="center"><div class="smallbtn" id="searchFlight" onClick="validateClass();" onMouseOver="change_color('searchFlight');" onMouseOut="change_back('searchFlight');" style="width:110px;height:20px; box-shadow: 2px 2px 0px 0px grey; float:none; margin-right:20px; font-size:16px;">Search Flights</div></td>
					</tr>	  
						  
					 </table>
    		  			  		  
				   </div>			     
					 
					<div id="div_hotel" class="div_btn_TravelVehicle" <?php if($bookHtl== true){?>style="display:block;"<?php }?>>
									
				 	<table style="width:700px;"  cellpadding="5" cellspacing="2">
				
					    <tr>
						  <td align="right"><span class="font_medium" style="float:none;">Location:</span></td>
						  <td colspan="3" align="left"><span>
					   <select class="txtbox_trv_cust" id="drpNoDays" name="drpNoDays" style="height:30px;" onmouseover="txtbox_color_onmouseover('drpNoDays');" onmouseout="txtbox_color_onmouseout('drpNoDays');">
					  <option selected="selected" value="<?php echo $dest; ?>"><?php echo $dest; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
					   </span></td>
					</tr>					
					<tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
					
						<tr>
						 <td align="right"><span class="font_medium" style="float:none;"> Check-in:</span></td>
						 <td align="left"><span class="font_medium" style="float:none;">
						 <input type="text" id="txtCheckIn" class="txtbox_trv_cust" style="width:150px;" onMouseOver="txtbox_color_onmouseover('txtCheckIn');" onMouseOut="txtbox_color_onmouseout('txtCheckIn');" onClick="oDP.show(event,'txtCheckIn',2); ShowContent('datepicker');" /></span></td>
						 <td align="right"><span class="font_medium" style="float:none;">Check-out: </span></td>
						 <td align="left"><span class="font_medium" style="float:none;">
						 <input type="text" id="txtCheckOut" class="txtbox_trv_cust" style="width:150px;" onClick="oDP.show(event,'txtCheckOut',2); ShowContent('datepicker');   validateDestination();" onMouseOver="txtbox_color_onmouseover('txtCheckOut');" onMouseOut="txtbox_color_onmouseout('txtCheckOut'); disp_htl_days();"></span></td>
						</tr>
					<tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>
							
						<tr>
						  <td align="right"><span class="font_medium" style="float:none;">Days:</span></td>
						  <td align="left"><span class="font_medium" style="float:none;"><input type="text" id="txtNoDays" class="txtbox_trv_cust" style="width:90px;" onClick="validateDestination();" onMouseOver="txtbox_color_onmouseover('txtNoDays');" onMouseOut="txtbox_color_onmouseout('txtNoDays');"></span></td>
						  <td align="right"><span class="font_medium" style="float:none;">Rooms:</span>
						  <span class="font_medium" style="float:none;">
					   <select id="drpNoDays" name="drpNoDays" class="txtbox_trv_cust" style="width:30px; height:30px;" onmouseover="txtbox_color_onmouseover('drpNoDays');" onmouseout="txtbox_color_onmouseout('drpNoDays');">
					   <option selected="selected">0</option>
					   <option>1</option>
					   <option>2</option>
					   <option>3</option>
					   <option>4</option>
					   <option>5</option>
					   <option>6</option>
					   <option>7</option>
					   </select>
					   </span></td>
						</tr>
					<tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>	
						
						<tr>
					  <td colspan="4" align="center">
					  <span class="font_medium" style="float:none;">Adults:</span>
						<span class="font_medium" style="float:none;">
						<select  class="txtbox_trv_cust" style="width:30px; height:25px;" onChange="validateDepDate();" name="drpAdult" id="drpAdult" onmouseover="txtbox_color_onmouseover('drpAdult');" onmouseout="txtbox_color_onmouseout('drpAdult');">
						<option value="0">0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  
					     <span class="font_medium" style="float:none; margin-left:20px;">Children:</span>
						<span class="font_medium" style="float:none;">
						<select class="txtbox_trv_cust" style="width:30px; height:25px;" name="drpChild" id="drpChild" onmouseover="txtbox_color_onmouseover('drpChild');" onmouseout="txtbox_color_onmouseout('drpChild');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
				  </td>
					  </tr>
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 
					 
					  <tr>
					  <td colspan="4" align="center"><div class="smallbtn" id="searchFlight" onClick="validateClass();" onMouseOver="change_color('searchFlight');" onMouseOut="change_back('searchFlight');" style="font-size:16px; width:110px;height:20px; margin-right:10px; float:none; box-shadow: 2px 2px 0px 0px grey;">
					  Search Hotels</div></td>
					  </tr>
					    
					</table>
			  
					</div>
				     
				    <div id="div_trains" class="div_btn_TravelVehicle">
					
				   	<table style="width:800px;"  cellpadding="5" cellspacing="2">
					  
					   <tr>
					     <td colspan="4"><span class="font_medium"><input type="radio" name="rdways_Train" id="rdOneway_Train" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Train','returnDate_Train');" > OneWay </span>
		<span class="font_medium" style="margin-left:20px;"><input type="radio" name="rdways_Train" id="rdReturn_Train" value="Return" onClick="return_journey('rdReturn_Train','returnDate_Train');"> Return</span>
						 </td>
					   </tr>
					    <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 
						
					   <tr>
					<td align="right"><span class="font_medium" style="float:none;"> I am at: </span></td>
	<td align="left"><span class="font_medium" style="float:none;">
	<select id="drpSource_Train" class="txtbox_trv_cust" style="height:30px;" name="drpSource" onChange="validateWay();"  onmouseover="txtbox_color_onmouseover('drpSource_Train');" onmouseout="txtbox_color_onmouseout('drpSource_Train');">
					<option selected="selected" value="<?php echo $src; ?>"><?php echo $src; ?></option>
					    <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?> </span>
							 
							 </td>
							 <td align="right"><span class="font_medium" style="float:none;"> Going To: </span>									
						<td align="left"><span class="font_medium" style="float:none;">
						 <select name="drpDestination_Train" class="txtbox_trv_cust" style="height:30px;" id="drpDestination_Train" onChange="validateBoarding();" onmouseover="txtbox_color_onmouseover('drpDestination_Train');" onmouseout="txtbox_color_onmouseout('drpDestination_Train');">
					<option selected="selected" value="<?php echo $dest; ?>"><?php echo $dest; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 </td>
						  
						  </tr>
						   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 
						
						<tr>
					<td align="right"><span class="font_medium" style="float:right"> Departure Date:</span></td>
					<td align="left">				
					<span class="font_medium">
			<input type="text" id="frmDate_Train" class="txtbox_trv_cust" style="width:150px;" onMouseOver="txtbox_color_onmouseover('frmDate_Train');" onMouseOut="txtbox_color_onmouseout('frmDate_Train');" onClick="oDP.show(event,'frmDate_Train',2); ShowContent('datepicker');"/></span>
		</td>
			<td align="right"><span class="font_medium" style="float:none">Return Date: </span></td>
			<td align="left"><span class="font_medium" style="float:none">
					<input type="text" id="returnDate_Train" class="txtbox_trv_cust" disabled style="background:grey; width:150px;" onClick="oDP.show(event,'returnDate_Train',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('returnDate_Train');" onMouseOut="txtbox_color_onmouseout('returnDate_Train');" /></span>
			
			</td>
					</tr>
									
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>   
						
						<tr>
					  <td colspan="4">
					  <span class="font_medium" style="float:none;">Adults:</span>
						<span class="font_medium" style="float:none;">
						<select  class="txtbox_trv_cust" style="width:30px; height:25px;" onChange="validateDepDate();" name="drpAdult" id="drpAdult" onmouseover="txtbox_color_onmouseover('drpAdult');" onmouseout="txtbox_color_onmouseout('drpAdult');">
						<option value="0">0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					
					     <span class="font_medium" style="float:none; margin-left:20px;">Children:</span>
						<span class="font_medium" style="float:none;">
						<select class="txtbox_trv_cust" style="width:30px; height:25px;" name="drpChild" id="drpChild" onmouseover="txtbox_color_onmouseover('drpChild');" onmouseout="txtbox_color_onmouseout('drpChild');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
				
					     <span class="font_medium" style="float:none; margin-left:20px;">Senior Citizen:</span>
						<span class="font_medium" style="float:none;">
						<select class="txtbox_trv_cust" style="width:30px; height:25px;" name="drpInfant" id="drpInfant" onmouseover="txtbox_color_onmouseover('drpInfant');" onmouseout="txtbox_color_onmouseout('drpInfant');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>					  
					  </td>
					  </tr> 
					   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr>  
					  
					  <tr>
					   <td align="right"><span class="font_medium" style="float:none;"> Class: </span></td>
					   <td align="left"><span class="font_medium" style="float:none;"><select class="txtbox_trv_cust" style="width:160px;" id="drpTrainClass" name="drpTrainClass" onmouseover="txtbox_color_onmouseover('drpTrainClass');" onmouseout="txtbox_color_onmouseout('drpTrainClass');">
					<option>----Select Class---</option>
					<option> Second Class </option>
					<option> First Class </option>
					<option> AC III Tier </option>
					<option> AC II Tier </option>
					<option> AC I Tier </option>
					<option> Second Seating </option>
					<option> AC Chair Car</option>
				    </select></span></td>
					  </tr>
					   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 
					
					<tr>
					  <td colspan="4" align="center"><div class="smallbtn" id="searchTrain" onClick="validateClass();" onMouseOver="change_color('searchTrain');" onMouseOut="change_back('searchTrain');" style="font-size:16px; width:110px;height:20px; margin-right:10px; float:none; box-shadow: 2px 2px 0px 0px grey;">
					  Search Trains</div></td>
					</tr>
					</table>
		  		  		  
				   </div>
				     
			       <div id="div_cars" class="div_btn_TravelVehicle" >
				   
				      <table style="width:800px;"  cellpadding="5" cellspacing="2">
					       
					    <tr>
					          <td colspan="4"><span class="font_medium"><input type="radio" name="rdways_Cars" id="rdOneway_Car" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Car','returnDate_Car');" > OneWay </span>
							  <span class="font_medium" style="margin-left:20px;"><input type="radio" name="rdways_Cars" id="rdReturn_Car" value="Return" onClick="return_journey('rdReturn_Car','returnDate_Car');"> Return
					   </span>
							  </td> 
							</tr> 
					<tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 
						
						<tr>
						     <td align="right"><span class="font_medium" style="float:none;"> I am at: </span></td>
	<td align="left"><span class="font_medium" style="float:none;">
	<select id="drpSource" class="txtbox_trv_cust" style="height:30px;" name="drpSource" onChange="validateWay();"  onmouseover="txtbox_color_onmouseover('drpSource');" onmouseout="txtbox_color_onmouseout('drpSource');">
	                <option selected="selected" value="<?php echo $src; ?>"><?php echo $src; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 
							 </td>
							 <td align="right"><span class="font_medium" style="float:none;"> Going To: </span>									
						<td align="left"><span class="font_medium" style="float:none;">
						 <select name="drpDestination" class="txtbox_trv_cust" style="height:30px;" id="drpDestination" onChange="validateBoarding();" onmouseover="txtbox_color_onmouseover('drpDestination');" onmouseout="txtbox_color_onmouseout('drpDestination');">
					<option selected="selected" value="<?php echo $dest; ?>"><?php echo $dest; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 </td>
						  
						  </tr>
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	  
						  
						 <tr>
						 <td align="right"><span class="font_medium" style="float:none;">Landmark:</span></td>
						 <td align="left"><span class="font_medium" style="float:none;">
					   <input type="text" id="txtpick_Car" value=""  class="txtbox_trv_cust" onMouseOver="txtbox_color_onmouseover('txtpick_Car');" onMouseOut="txtbox_color_onmouseout('txtpick_Car');"></span></td>
					   <td align="right"><span class="font_medium" style="float:none;">PickUp Time:</span></td>
					   <td align="left">
					   <span class="font_medium" style="float:none;">
					   <select id="drpPickTime_Car" name="drpPickTime_Car" class="txtbox_trv_cust" style="width:110px;" onmouseover="txtbox_color_onmouseover('drpPickTime_Car');" onmouseout="txtbox_color_onmouseout('drpPickTime_Car');"> 
						<option> --6:00Am--</option>
						<option> --7:00Am--</option>
						<option> --8:00Am--</option>
						<option> --9:00Am--</option>
						<option> --10:00Am--</option>
						<option> --11:00Am--</option>
						<option> --12:00Pm--</option>
						<option> --1:00Pm--</option>
						<option> --2:00Pm--</option>
						<option> --3:00Pm--</option>
						<option> --4:00Pm--</option>
						<option> --5:00Pm--</option>
						<option> --6:00Pm--</option>
						<option> --7:00Pm--</option>
					</select></span>
					   </td>
						 </tr> 
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	 
						 
						 <tr>
						   <td align="right"><span class="font_medium" style="float:none;"> Departure Date:</span></td>
						   <td align="left"><span class="font_medium" style="float:none;"><input type="text" id="frmDate_Car" class="txtbox_trv_cust" style="width:150px;" onClick="oDP.show(event,'frmDate_Car',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('frmDate_Car');" onMouseOut="txtbox_color_onmouseout('frmDate_Car');"></span></td>
						   <td align="right"><span class="font_medium" style="float:none;">Return Date: </span></td>
						   <td align="left"><span class="font_medium"><input type="text" id="returnDate_Car"  disabled class="txtbox_trv_cust" style="background:grey; width:150px;" onClick="oDP.show(event,'returnDate_Car',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Car');" onMouseOut="txtbox_color_onmouseout('returnDate_Car');"></span></td>
						 </tr>
					 <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	 
						 
						 <tr>
						   <td align="right"><span class="font_medium" style="float:none;"> Type of Car:</span></td>
						    <td align="left"><span class="font_medium" style="float:none;">
					    <select style="width:150px;" class="txtbox_trv_cust" id="drpCarType" onmouseover="txtbox_color_onmouseover('drpCarType');" onmouseout="txtbox_color_onmouseout('drpCarType');">
					<option>----Select Car---</option>
					<option> Alto </option>
					<option> Innova </option>
					<option> Xylo </option>
					<option> Qualis </option>
					<option> Mercedes </option>
					<option>  Mini Tempo</option>					
				    </select>
					   </span></td>
					   <td align="right"><span class="font_medium" style="float:none"> Passengers: </span></td>
					   <td align="left">
					   <span class="font_medium" style="float:none"><select id="drpSeats" class="txtbox_trv_cust" style="width:80px;" name="drpSeats" onmouseover="txtbox_color_onmouseover('drpSeats');" onmouseout="txtbox_color_onmouseout('drpSeats');">
					   <option> -Seats-</option>
				    	   <option> 4</option>
					    <option>6</option>
					   <option>8</option>
					</select> 
					</span>
					<span class="font_medium" style="margin-left:3px; float:none">
					<select id="drpDist" class="txtbox_trv_cust" style="width:100px;" name="drpDist" onmouseover="txtbox_color_onmouseover('drpDist');" onmouseout="txtbox_color_onmouseout('drpDist');">
						<option>-Rs/Km-</option>
						<option> 9.00/Km</option>
						<option> 9.50/Km </option>
						<option> 11.00/Km </option>
						<option> 12.00/Km</option>
						<option> 13.00/Km</option>
					</select> 
					</span>
					</td>
				</tr>
			       <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	
					  
					  <tr>
					    <td colspan="4" align="center">						
						<div class="smallbtn" id="searchCar" onClick="validate();" onMouseOver="change_color('searchCar');" onMouseOut="change_back('searchCar');" style="font-size:16px;width:110px;height:20px;  box-shadow: 2px 2px 0px 0px grey; float:none;">Search Cars</div></td> 
					  </tr>
					  </table>
	            
				 </div>	
    				   
				   <div id="div_bus" class="div_btn_TravelVehicle">
				   
				   <table style="width:800px;" cellpadding="5" cellspacing="2">
				   
				       <tr>
					     <td colspan="4"><span class="font_medium"><input type="radio" name="rdways_Bus" id="rdOneway_Bus" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Bus','returnDate_Bus');" > OneWay </span>
						 <span class="font_medium" style="margin-left:20px;"><input type="radio" name="rdways_Bus" id="rdReturn_Bus" value="Return" onClick="return_journey('rdReturn_Bus','returnDate_Bus');"> Return
					   </span></td>
				       </tr>
					    <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	
					   
					   <tr>
					<td align="right"><span class="font_medium" style="float:none;"> I am at: </span></td>
	<td align="left"><span class="font_medium" style="float:none;">
	<select id="drpSource" class="txtbox_trv_cust" style="height:30px;" name="drpSource" onChange="validateWay();"  onmouseover="txtbox_color_onmouseover('drpSource');" onmouseout="txtbox_color_onmouseout('drpSource');">
	                  <option selected="selected" value="<?php echo $src; ?>"><?php echo $src; ?></option>
					 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 
							 </td>
					<td align="right"><span class="font_medium" style="float:none;"> Going To: </span>									
						<td align="left"><span class="font_medium" style="float:none;">
						 <select name="drpDestination" class="txtbox_trv_cust" style="height:30px;" id="drpDestination" onChange="validateBoarding();" onmouseover="txtbox_color_onmouseover('drpDestination');" onmouseout="txtbox_color_onmouseout('drpDestination');">
					<option selected="selected" value="<?php echo $dest; ?>"><?php echo $dest; ?></option>
						 <?php
						 $q_dest = 'select locName from user_destinations';
						 $res_dest = mysqli_query($con,$q_dest);
						 if($res_dest)
						 {
						   while($row = mysqli_fetch_array($res_dest))
						   {
						    echo '<option value='.$row["locName"].'>'.$row["locName"].'</option>';
						   }
						 }
						 ?>
						  </span>
							 </td>
						  
						  </tr>
						   <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	
						  
					   <tr>
						 <td align="right"><span class="font_medium" style="float:none;">Landmark</span></td>
						 <td align="left"><span class="font_medium" style="float:none;">
					   <input type="text" id="txtpick_Car" value=""  class="txtbox_trv_cust"  onMouseOver="txtbox_color_onmouseover('txtpick_Car');" onMouseOut="txtbox_color_onmouseout('txtpick_Car');"></span></td>
					   <td align="right"><span class="font_medium" style="float:none;">PickUp Time</span></td>
					   <td align="left">
					   <span class="font_medium" style="float:none;">
					   <select id="drpPickTime_Car" name="drpPickTime_Car" class="txtbox_trv_cust" style="width:110px;" onmouseover="txtbox_color_onmouseover('drpPickTime_Car');" onmouseout="txtbox_color_onmouseout('drpPickTime_Car');"> 
						<option> --6:00Am--</option>
						<option> --7:00Am--</option>
						<option> --8:00Am--</option>
						<option> --9:00Am--</option>
						<option> --10:00Am--</option>
						<option> --11:00Am--</option>
						<option> --12:00Pm--</option>
						<option> --1:00Pm--</option>
						<option> --2:00Pm--</option>
						<option> --3:00Pm--</option>
						<option> --4:00Pm--</option>
						<option> --5:00Pm--</option>
						<option> --6:00Pm--</option>
						<option> --7:00Pm--</option>
					</select></span>
					   </td>
						 </tr>
						  <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	 	
						 
					    <tr>
						   <td align="right"><span class="font_medium" style="float:none;"> Departure Date:</span></td>
						   
						   <td align="left"><span class="font_medium" style="float:none;"><input type="text" id="frmDate_Bus" class="txtbox_trv_cust" style="width:150px;" onClick="oDP.show(event,'frmDate_Bus',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('frmDate_Bus');" onMouseOut="txtbox_color_onmouseout('frmDate_Bus');"></span></td>
						   
						   <td align="right"><span class="font_medium" style="float:none;">Return Date: </span></td>
						   
						   <td align="left"><span class="font_medium" style="float:none;"><input type="text" id="returnDate_Bus"  disabled class="txtbox_trv_cust" style="background:grey; width:150px;" onClick="oDP.show(event,'returnDate_Bus',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Bus');" onMouseOut="txtbox_color_onmouseout('returnDate_Bus');"></span></td>
						 </tr>	
						  <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	
						 
						 <tr>
						   <td align="right"><span class="font_medium" style="float:none;"> Bus Type:</span></td>
						   <td colspan="3" align="left"><span class="font_medium" style="float:none;">
					  <select  id="drpBusType" name="drpBusType" class="txtbox_trv_cust" onmouseover="txtbox_color_onmouseover('drpBusType');" onmouseout="txtbox_color_onmouseout('drpBusType');">
					<option>----Select Bus---</option>
					<option> VRL (sleeper) </option>
					<option> SRS (semi-sleeper) </option>
					<option> AC Vovlo (semi-sleeper)</option>
					<option> Non-Ac (Seater) </option>				
				    </select>
					   </span></td>
						 </tr>  
						  <tr><td colspan="4"><div style="border-top:1px solid #FFE; width:100%;"></div></td></tr> 	
						  
						 <tr>
						   <td colspan="4" align="center">
						   <div class="smallbtn" id="searchBus" onClick="validate();" onMouseOver="change_color('searchBus');" onMouseMove="change_color('searchBus');" style="font-size:16px;width:110px;height:20px; float:none; box-shadow: 2px 2px 0px 0px grey;">Search Buses</div>
						   </td>
						 </tr>
				   </table>
					     
			     </div>
				 
				 <div id="div_packages" class="div_btn_TravelVehicle">
				 
				    <div id="pck_q1" style="float:left; width:100%; margin-top:10px;">
				  <div style="float:left; width:100%;">
			<span class="font_medium" style="float:left; margin-left:230px;">
			<input type="radio" id="rdIndia_pck" name="rdType_pck" style="zoom:1.6; width:20px;" onClick="chk_pck_city();" />
			<label onClick="document.getElementById('rdIndia_pck').checked=true; chk_pck_city();" style=" cursor:pointer;">India</label></span>
			<span class="font_medium" style="float:left; margin-left:20px;">
			<input type="radio" id="rdabr_pck" name="rdType_pck" style="zoom:1.6; width:20px;" onClick="chk_pck_city();"/>
			<label  onClick="document.getElementById('rdabr_pck').checked=true; chk_pck_city();" style=" cursor:pointer;" >Abroad</label></span>
		  </div>
						  
				  </div>
				  
				    <div id="pck_q2" style="float:left; width:100%; display:none;">
					 
						<div id="domes_pck" style="float:left; width:100%; margin-left:10%;">
						 
						    <span class="font_medium" style="float:left; width:20%; margin-left:10%;">
							
							   <div style="float:left; width:100%;">
							<span style="float:left; margin-left:30%;">
						    	<button id="btn_loc_selc" type="button" class="optBtns" onClick="clear_txt('txtDomesLoc1_pck','div_sel_vacthm1','btn_tp_selc','div_vac_selc','div_loc_selc',this.id);">Location</button>
								</span>
								</div>
			    
			                  <div id="div_loc_selc" style="width:100%; float:left;  display:none;">
			
							<div id="div_txtLoc" style="float:left; width:100%; margin-top:10px;">
							 <input type="text" id="txtDomesLoc_pck" name="txtDomesLoc_pck" class="txtbox_Tab" style=" width:260px; height:30px;" onKeyPress="toUpper(this.id); showDomesCity(this.value);" placeholder="Select Locations" onChange="show_block('vac_themes');" />
							 </div>
						
							 <div style="float:left; width:100%; margin-left:0;">
							 <div id="div_pck_loc" style="background:#fff; width:260px; position:relative; z-index:100; height:auto;"></div>
							 </div>
							 
							 <div id="vac_themes" style="display:none;  margin-left:0px; background:#fff;">
			     	 <span style="float:left;">
				  <div style="width:100%; margin-top:5px;">
		 	  <div class="div_dropdown_crt" style="width:260px; height:30px;">
			<span class="font_medium" onClick="show_block('div_vacType');" onClick="show_block('div_vacType'); show_block('up_arrow_vacType'); hide_block('down_arrow_vacType');" style="color:#999; padding:3px;">Select trip theme</span>			
			<span id="down_arrow_vacType" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block('div_vacType'); show_block('up_arrow_vacType'); hide_block('down_arrow_vacType');">
			<img src="Images/dropdown_arrow_icon3.png" width="25px" height="16px"/></span></span>
			<span id="up_arrow_vacType" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_vacType'); hide_block('up_arrow_vacType'); show_block('down_arrow_vacType');">
			<img src="Images/dropdownlast_arrow_icon.png" width="25px" height="16px" /></span></span>
			</div>	
			
		    	 <div id="div_vacType" class="div_drpListItems_crt" style="width:260px;">
			 <?php
			 	$q_vac = "select vac_title, vac_id from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				
				if($res_vac)
				{
				echo '<span class="span_drpListItems_crt" style="font-size:18px;">
				  <input type="checkbox" id="chk_All" name="chk_All" value="All" onClick="selValue(\'All\',\'chk_All\');"/>
				  <span style="cursor:pointer;" onClick="selValue_sp(\'All\')">All</span></span>';
				while($row = mysqli_fetch_array($res_vac))
				{
				  echo '<span class="span_drpListItems_crt" style="font-size:18px;">
				  <input type="checkbox" id="chk_'.$row["vac_id"].'" name="chk_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="selValue(\''.$row["vac_title"].'\',\'chk_'.$row["vac_id"].'\');"/><span style="cursor:pointer;" onClick="selValue_sp(\''.$row["vac_title"].'\',\'chk_'.$row["vac_id"].'\')">'.$row["vac_title"].'</span></span>';
				}
				}			  
			  
			  ?>
			   
			   <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_vacType');  hide_block('up_arrow_vacType'); show_block('down_arrow_vacType');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div> 			

		         </div>
				 </span>
				
				 </div>
				 
				     </div>
				       
					          <div style="float:left; width:260px;">
							  <span id="div_sel_vacthm" style="float:left; font-size:12px;"></span>
							  </div>
					    						
							</span>				
						
							<span class="font_medium" style="float:left; width:20%; margin-left:20px;">
						
							<div style="float:left; width:100%;">
							<span style="float:left;">
								<button id="btn_tp_selc" type="button" class="optBtns" onClick="clear_txt('txtDomesLoc_pck','div_sel_vacthm','btn_loc_selc','div_loc_selc','div_vac_selc',this.id);">Vacation Theme</button>
							</span>
							
							</div>
						    
							   <div id="div_vac_selc" style="width:100%; float:left; display:none; margin-left:0px;">	
							
									<div id="vac_themes_trp" style="margin-left:0px; background:#fff;" onClick="show_block('div_txtLoc1');">
			     	 <span style="float:left;">
				  <div style="width:100%; margin-top:5px;">
		 	  <div class="div_dropdown_crt" style="width:260px; height:30px;">
			<span class="font_medium" onClick="show_block('div_vacType1');" onClick="show_block('div_vacType1'); show_block('up_arrow_vacType1'); hide_block('down_arrow_vacType1');" style="color:#999; padding:3px;">Select trip theme</span>			
			<span id="down_arrow_vacType1" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block('div_vacType1'); show_block('up_arrow_vacType1'); hide_block('down_arrow_vacType1');">
			<img src="Images/dropdown_arrow_icon3.png" width="25px" height="16px"/></span></span>
			<span id="up_arrow_vacType1" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_vacType1'); hide_block('up_arrow_vacType1'); show_block('down_arrow_vacType1');">
			<img src="Images/dropdownlast_arrow_icon.png" width="25px" height="16px" /></span></span>
			</div>	
			
		    	 <div id="div_vacType1" class="div_drpListItems_crt" style="width:260px;">
			 <?php
			 	$q_vac1 = "select vac_title, vac_id from vac_type";
				$res_vac1 = mysqli_query($conn,$q_vac1);
				
				if($res_vac1)
				{
				while($row = mysqli_fetch_array($res_vac1))
				{
				  echo '<span class="span_drpListItems_crt" style="font-size:18px;">
				  <input type="checkbox" id="chk1_'.$row["vac_id"].'" name="chk1_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="selValue1(\''.$row["vac_title"].'\',\'chk1_'.$row["vac_id"].'\');"/><span style="cursor:pointer;" onClick="selValue_sp1(\''.$row["vac_title"].'\',\'chk1_'.$row["vac_id"].'\')">'.$row["vac_title"].'</span></span>';
				}
				}			  
			  
			  ?>
			   
			   <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_vacType1');  hide_block('up_arrow_vacType1'); show_block('down_arrow_vacType1');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div> 			

		         </div>
				
				 </span>
				
				 </div>
				 
			            	  <div style="float:left; width:260px;">
							  <span id="div_sel_vacthm1" style="float:left; font-size:12px;"></span>
							  </div>
				 			
			            	<div id="div_txtLoc1" style="float:left; display:none; width:100%; margin-top:10px;">
							 <input type="text" id="txtDomesLoc1_pck" name="txtDomesLoc1_pck" class="txtbox_Tab" style=" width:260px; height:30px;" onKeyPress="toUpper(this.id); showDomesCity(this.value);" placeholder="Select Locations" />
							 </div>				
						  
						   <div style="float:left; width:100%; margin-left:0px;">
							 <div id="div_pck_loc1" style="background:#fff; width:260px; position:relative; z-index:100; height:auto;"></div>
							 </div>
							 							 
						</div>	 
							 
						    </span>					 
					
					  </div>
					 
					    <div id="abr_pck" style="float:left; width:100%; display:none; margin-left:10%">
   			
	  					 <span class="font_medium" style="float:left; width:20%; margin-left:10%;">
							
							<div style="float:left; width:100%;">
							<span style="float:left; margin-left:30%;">
						    	 <button id="btn_loc_selc_abr" type="button" class="optBtns" onClick="clear_txt('txtInterLoc1_pck','div_sel_vacthm_abr','btn_vac_selc_abr','trp_thm_abr','div_txtLoc_abr',this.id);">Location</button>
								</span>
								</div>
					  		
					        <div id="div_txtLoc_abr" style="float:left; width:100%; margin-top:10px; display:none;">
					  
					    <div style="float:left; width:100%;">
							 <input type="text" id="txtInterLoc_pck" name="txtInterLoc_pck" class="txtbox_Tab" style=" width:260px; height:30px;" onKeyPress="toUpper(this.id); showInterNCity(this.value);" placeholder="Select Locations" onChange="show_block('vac_themes_abr');" />
							 </div>						
						
						<div style="float:left; width:100%;">
							 <div id="div_pck_loc_abr" style="background:#fff; width:260px; position:relative; z-index:100; height:auto;"></div>
						</div>
						
						<div style="float:left; width:100%; margin-top:10px;">
						<span style="float:left; margin-left:55px;" class="font-medium">OR</span></div>
						
						<div style="float:left; width:100%; margin-top:10px;">
					   <select id="drpCont_abr" name="drpCont_abr" onChange="LdCntry(this.value);" class="font_medium" style="width:260px; height:30px;">
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
						</div>
						
				    	<div id="sp_drp_cntry" style="float:left; margin-top:10px;"></div>
						
						<div id="sp_drp_Abrloc" style="float:left; margin-top:10px;"></div>
					
						</div>	 
			 
			   		
			             
						 </span>
					
						<span class="font_medium" style="float:left; width:20%; margin-left:20px;">
						
							<div style="float:left; width:100%;">
							<span style="float:left;">							
						    	<button id="btn_vac_selc_abr" type="button" class="optBtns" onClick="  clear_txt('txtInterLoc_pck','div_sel_vacthm_abr','btn_loc_selc_abr','div_txtLoc_abr','trp_thm_abr',this.id);">Vacation Theme</button>
								</span>
								</div>
							 
							 <div id="trp_thm_abr" style="float:left; width:100%; display:none;">
							 
							    <div id="vac_themes_trp_abr" style="margin-left:0px; background:#fff;" onClick="show_block('div_txtLoc1');">
			     	 <span style="float:left;">
				  <div style="width:100%; margin-top:5px;">
		 	  <div class="div_dropdown_crt" style="width:260px; height:30px;">
			<span class="font_medium" onClick="show_block('div_vacType3');" onClick="show_block('div_vacType3'); show_block('up_arrow_vacType3'); hide_block('down_arrow_vacType3');" style="color:#999; padding:3px;">Select trip theme</span>			
			<span id="down_arrow_vacType3" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block('div_vacType3'); show_block('up_arrow_vacType3'); hide_block('down_arrow_vacType3');">
			<img src="Images/dropdown_arrow_icon3.png" width="25px" height="16px"/></span></span>
			<span id="up_arrow_vacType3" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_vacType3'); hide_block('up_arrow_vacType3'); show_block('down_arrow_vacType3');">
			<img src="Images/dropdownlast_arrow_icon.png" width="25px" height="16px" /></span></span>
			</div>	
			
		    	 <div id="div_vacType3" class="div_drpListItems_crt" style="width:260px;">
			 <?php
			 	$q_vac1 = "select vac_title, vac_id from vac_type";
				$res_vac1 = mysqli_query($conn,$q_vac1);
				
				if($res_vac1)
				{
				while($row = mysqli_fetch_array($res_vac1))
				{
				  echo '<span class="span_drpListItems_crt" style="font-size:18px;">
				  <input type="checkbox" id="chk2_'.$row["vac_id"].'" name="chk2_'.$row["vac_id"].'" value="'.$row["vac_title"].'" onClick="selValue_abr(\''.$row["vac_title"].'\',\'chk2_'.$row["vac_id"].'\');"/><span style="cursor:pointer;" onClick="selValue_sp_abr(\''.$row["vac_title"].'\',\'chk2_'.$row["vac_id"].'\')">'.$row["vac_title"].'</span></span>';
				}
				}			  
			  
			  ?>
			   
			   <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_vacType3');  hide_block('up_arrow_vacType3'); show_block('down_arrow_vacType3');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div> 			

		         </div>
				 </span>
				<div style="float:left; width:100%;"><span id="div_sel_vacthm_abr" style="float:left; font-size:12px;"></span></div>
				 </div>
				 	
						<div  style="float:left; width:100%; margin-top:10px;">
					  
					    <div style="float:left; width:100%;">
							 <input type="text" id="txtInterLoc1_pck" name="txtInterLoc1_pck" class="txtbox_Tab" style=" width:260px; height:30px;" onKeyPress="toUpper(this.id); showInterNCity1(this.value);" placeholder="Select Locations" />
							 </div>						
						
						<div style="float:left; width:100%;">
							 <div id="div_pck_loc_abr1" style="background:#fff; width:260px; position:relative; z-index:100; height:auto;"></div>
						</div>
						
						<div style="float:left; width:100%; margin-top:10px;">
						<span style="float:left; margin-left:55px;" class="font-medium">OR</span></div>
						
						<div style="float:left; width:100%; margin-top:10px;">
					   <select id="drpCont_abr1" name="drpCont_abr1" onChange="LdCntry1(this.value);" class="font_medium" style="width:260px; height:30px;">
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
						</div>
						
				    	<div id="sp_drp_cntry1" style="float:left; margin-top:10px;"></div>
						
						<div id="sp_drp_Abrloc1" style="float:left; margin-top:10px;"></div>
					
						</div>
							 
							</div>
						
						
						</span>
							
					  </div>
					
				    	<div style="width:100%; float:left; margin-top:40px;">
	       				<span style="float:left; margin-left:40%;">
						 <img src="Images/arrowLeft.png" width="40px" height="35px" onClick="hide_block('pck_q2'); show_block('pck_q1');" /></span>
				  <span style="float:left; margin-left:2px;">
				  <input type="button" id="btnSub_pck" name="btnSub_pck" class="smallbtn" style="width:80px; height:30px; font-size:16px; float:none;" value="Submit" onClick="show_pck();" /></span>
				        </div>
					
					</div>
				 
				 </div>
	 </div>
		 
     </div>	  
			   
	 </div>	 
			  
</div>

	
<div style="visibility:visible; position:absolute; left:0x; top:60px; display:none; z-index:10000;" id="datepicker"></div>			
<script>
  	var oDP = new datePicker("datepicker");
</script>
</div>
</div>

</body>
</form>
</html>
