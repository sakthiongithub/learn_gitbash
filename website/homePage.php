<!---<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  --->
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Home Page</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
                                            
<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
<script src="Javascript/context.js" language="Javascript" type="text/javascript"></script>
<script src="Javascript/slideshow.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/validations.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/Visibility.js" language="Javascript" type="text/javascript"></script>  
<script src="Javascript/Javascript_Codes.js" language="Javascript" type="text/javascript"></script> 
<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>

	
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

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
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

jQuery("#resultPck").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchPck').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("searchPck")){
	jQuery("#resultPck").fadeOut(); 
	}
});
$('#searchPck').click(function(){
	jQuery("#resultPck").fadeIn();
});
});
</script>	
		
</head>

<form name="frmHome" method="post">
<body id="bdyHmPage"  name="homePage_body" onLoad="runSlideShow(); showDates();">

<div align="center" id="master_container">
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
			  			
			   <a href="#" onClick="show_block('div_reg'); show_block('div_greyBack');">
			   <span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span></a>
			   
			   <a href="#" onClick="show_block('div_login'); show_block('div_greyBack');">
			   <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span></a>
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
 
 	<div id="div_greyBack"
style="width:100%;
height:680px;
background: grey;
opacity:0.4;
display:none;
position:absolute;
z-index:100;
margin:0% 0% 0% 0%;">
</div>

<!---- <div id="div_cmt_crl" style="display:none;">
 <img src="Images/imgCmt.jpg" width="200px" height="200px" />
</div>  ---->


<div id="body_container">
		
	<div id="div_travelDates"
style="display:none;
   background:white;
   box-shadow: 2px 0px 6px grey;
   width:38%; 
   opacity:0.9;
   height:auto;  
   border-radius:10px;
  margin:12% 0 0 10%;
  position:absolute;
  text-align:center;
  z-index:10000;">

<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px; cursor:pointer">
<img src="Images/closeBtn.png" width="20" height="20" onClick="hide_block('div_travelDates'); hide_block('div_greyBack');" /></span>
</div>

	<div style="width:100%; position:relative; margin:10px 2px 0px 10px;"> 
<span style="font-size:22px; color:DarkSlateGray;">
Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
</div>
<div style="width:100%; position:relative; float:left;">
<span style="width:50%; float:left; margin-top:2%;">
<div style="margin-bottom:20px;">
   <span style="font-size:24px; margin-bottom:20px;">
       <span style="float:none;"><a href="#" style="text-decoration:none;" onClick="show_block('div_trvDate'); hide_block('div_sugstDates');">
	   <div style="width:145px; height:43px; font-weight:700; border-radius:5px; background:#283C5F; border:1px solid darkblue; box-shadow:2px 2px 6px grey; color:#FFFFFF; font-family:Georgia, Calibri; margin-left:120px; box-shadow: 2px 0px 8px 0px grey; font-size:16px;"> My travel dates are known</div></a></span>
    </span>
</div>
</span>
<span style="width:50%; float:left; margin-top:2%;">
<div>
<span style="float:left;" onClick=" show_block('div_greyBack');"><a href="#" style="text-decoration:none;" onClick="show_block('div_sugstDates'); hide_block('div_trvDate');">
<div style="width:140px;; height:43px; font-weight:700; border-radius:5px; background:red; border:1px solid OrangeRed; box-shadow:2px 2px 6px grey; margin-left:65px; color:#FFFFFF; font-family:Georgia,Calibri; box-shadow: 2px 0px 8px 0px grey; font-size:16px;">Just started planning</div></a></span>
</div> </span>
</div>


<div id="div_trvDate" style="display:none;width:100%; text-align:center; position:relative; margin-top:5px; margin-left:0px;">
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
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_exp_dt_kn('txtfrmDt','txtToDt','adv_trp_dt');"> Submit </a></span>
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
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack');"> Submit </a></span>
			  </div>
			</div>
			</span>
</div>

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
		 
	<div id="b2b_register" style="display:none; width:800px; height:550px; background:#FFF; opacity:0.8; position:absolute; margin-top:70px; margin-left:40px; z-index:110;">
	
	   <div>
	   <span style="float:right; margin-right:10px;">
	    <a href="#" onClick="hide_block('b2b_register'); hide_block('div_greyBack');"><img src="Images/cancelbtn.png" width="30px" height="30px"/></a></span>
	</div>	
	
	   <div style="margin:2% 6% 1% 6%; width:100%; float:left;"><span class="font-medium">Please register your details to access your facilities</span></div>
	 
	     <div style="width:100%; float:left; margin:1% 6% 1% 6%;">
		 
		     <table class="font-medium">
			   <tr>
			     <td>Company Name/ Entity Name</td>
				 <td><input id="txtTab_cmpName" type="text" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_cmpName');" onMouseOut="txtbox_color_onmouseout('txtTab_cmpName');"/></td>
				 </tr>
				 <tr>
				 <td>Upload Logo </td>
				 <td><span style="position:relative; float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="img_url" style="opacity:0; z-index:1;" onChange="document.getElementById('txt_src').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span></td>
			   </tr>
			     <tr>
			     <td>HeadQuater Location</td>
				 <td><input type="text" id="txtTab_headQuarter" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_headQuarter');" onMouseOut="txtbox_color_onmouseout('txtTab_headQuarter');"/></td>
			   </tr>
			   <tr>
			     <td colspan="2"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
			   </tr>
			   <tr>
			     <td>Name of the Requester</td>
				 <td><input type="text" id="txtTab_reqName" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_reqName');" onMouseOut="txtbox_color_onmouseout('txtTab_reqName');"/></td>
			   </tr>
			   <tr>
			      <td>Employee Code</td>
				  <td><input type="text" id="txtTab_empCode" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_empCode');" onMouseOut="txtbox_color_onmouseout('txtTab_empCode');"/></td>
			   </tr>
			    <tr>
			      <td>Designation</td>
				  <td><input type="text" id="txtTab_desig" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_desig');" onMouseOut="txtbox_color_onmouseout('txtTab_desig');"/></td>
			   </tr>
			   <tr>
			      <td>Region/Regional Office</td>
				  <td><input type="text" id="txtTab_regional" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_regional');" onMouseOut="txtbox_color_onmouseout('txtTab_regional');"/></td>
			   </tr>
			   <tr>
			      <td>State</td>
				  <td><input type="text" id="txtTab_state" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_state');" onMouseOut="txtbox_color_onmouseout('txtTab_state');"/></td>
			   </tr>
			   <tr>
			      <td colspan="2"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
				  </tr>
				  <tr>
				    <td>Email-Id(Personal)</td>
					<td><input type="text" id="txtTab_emailPer" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_emailPer');" onMouseOut="txtbox_color_onmouseout('txtTab_emailPer');"/></td>
				  </tr>
				  <tr>
				    <td>Email-Id(Professional)</td>
					<td><input type="text" id="txtTab_emailProf" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_emailProf');" onMouseOut="txtbox_color_onmouseout('txtTab_emailProf');"/></td>
				  </tr>  
				  <tr>
				    <td>Mobile No.</td>
					<td><input type="text" id="txtTab_cellNo" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_cellNo');" onMouseOut="txtbox_color_onmouseout('txtTab_cellNo');"/></td>
				  </tr> 
				  <tr>
				    <td>Landline No.</td>
					<td><input type="text" id="txtTab_landNo1" class="txtbox_Tab" style="width:60px;" onMouseOver="txtbox_color_onmouseover('txtTab_landNo');" onMouseOut="txtbox_color_onmouseout('txtTab_landNo');"/>-<input type="text" id="txtTab_landNo2" class="txtbox_Tab" style="width:185px;" onMouseOver="txtbox_color_onmouseover('txtTab_landNo');" onMouseOut="txtbox_color_onmouseout('txtTab_landNo');"/></td>
				  </tr> 
				   <tr>
				   	<td colspan="2" align="right"><div id="btn_submitDet" class="smallbtn" style="width:60px; float:right;">Submit</div></td>
				  </tr> 
				  <tr>
			      <td colspan="2"><a href="#"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></a></td>
				  </tr>
				    <tr>
				    <td>Verification Code</td>
					<td><input type="text" id="txtTab_veriCode" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_veriCode');" onMouseOut="txtbox_color_onmouseout('txtTab_veriCode');"/></td>
				  </tr> 
				  <tr>
			      <td colspan="2"><a href="#"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></a></td>
				  </tr>
				   <tr>
				   	<td colspan="2" align="right">
					<a href="#" onClick="hide_block('b2b_register'); createRegisterTab(); clear_all();">
					<div id="btn_submitVer" class="smallbtn" style="width:60px; float:right;">Submit</div></a></td>
				  </tr>
			 </table>			 
		 </div>
	        
	<div>
		    
	</div>	
	</div> 
	   	 
    <div id="div_reg" class="div_pop">
	<div style="float:left; width:100%;">
<span style="float:right;margin-right:3px;"><img src="Images/cancelbtn1.png" width="25px" height="25px" onClick="hide_block('div_reg'); hide_block('div_greyBack');" /></span>
	</div>
	   <div style="width:100%; margin:40px 20px 5px 40px">
		    <span style="float:left;">
			 <a href="Cust_Page.php" target="_self" onClick="hide_block('div_reg');">
			<div class="bigBtns"><span style="padding:6px 3px 3px 16px; float:left; font-size:20px;">Customer</span></div>
			</a></span>
			
			<span style="float:left; margin-left:50px">
			 <a href="CreatePackTool.php" target="_self" onClick="hide_block('div_reg');">
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
			 <a href="Cust_Page.php" target="_self" onClick="hide_block('div_login');">
			<div class="bigBtns"><span style="padding:6px 3px 3px 16px; float:left; font-size:20px;">Customer</span></div>
			</a></span>
			
			<span style="float:left; margin-left:50px">
			 <a  href="CreatePackTool.php" target="_self" onClick="hide_block('div_login');">
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
	
	<div id="div_dest_date" style="display:none;">
	       <div style="position:relative; width:100%; float:left; height:100%;">
	  <div style="float:left; width:100%;">
	    <span style="float:right; margin-right:-10px; cursor:pointer; margin-top:-10px;" onClick="hide_block('div_dest_date'); hide_block('div_greyBack'); remove_border();">
		<img src="Images/closeBtn.png" width="30px" height="30px" /></span>
	  </div>
	  
	    <div style="float:left;width:100%; margin-top:0px; background:#f5f5f5;" class="font-medium_indx">
	  <span  style="float:left; margin-left:5px; color:#b22; font-size:30px;">
	  <div  id="sp_vacTh" style="float:left; width:240px; height:40px; border-radius:60px; background:rgb(255,55,1); text-align:center; color:#fff;"></div>  
	  </span>
	  <span  style="float:left; margin-left:5px; color:#b22; font-size:30px;">
	    <span style="float:left; margin-left:0px; font-size:20px; margin-top:10px;" >
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
			  <input id="searchPck" type="text" class="searchPck" style="width:230px; height:25px;" placeholder="Enter City Name" onKeyUp=" toUpper(this.id);" /></span>
			</div>            
			<div id="resultPck"></div>
			<div id="listDest" style="position:relative; margin-top:1px;" >
			<?php
			include ("PHP_Files/PHP_Connection.php");
			
			$q_loc = "select distinct(loc_name) as loc_name from cityscape_attractions_content_review";
			$res_loc = mysqli_query($con,$q_loc);
		   if($res_loc)
		   {
		   	while($row = mysqli_fetch_array($res_loc))
			 {				  
 			  echo '<span class="span_drpListItems_exp">
			  <input type="checkbox" width="20px" style="zoom:1.3; margin-right:3px;" value="'.$row["loc_name"].'" id="chk_'.$row["loc_name"].'" onClick="selectLoc(this.id);" /><span style="cursor:pointer;" onclick="selectLocName(\'chk_'.$row["loc_name"].'\');">'.$row["loc_name"].'</span></span>';
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

<div style="visibility:visible; position:absolute; left:0x; top:60px; display:none; z-index:10000;" id="datepicker"></div>			
<script>
  	var oDP = new datePicker("datepicker");
</script>

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
				
	<div id="div_body" align="center">
			
		<div id="body_header_btn" style="position:relative; float:left; background:#597272; margin-top:1px; width:945px;
						 text-align:center; color:#002929; border-radius:5px; border:1px solid lightgrey;" > 
			   <span style="width:32%;float:left;">
				<a href="#" style="text-decoration:none;" onClick="Show_Block1_onclick(); change_bgcolor_cust('div_PlanTrip','div_Explore','div_Book'); " onDblClick="Hide_Block1();">
		<div id="div_PlanTrip" align="right" class="div_hdrbtns_pre"  onmouseover="Show_Block1(); hide_block('div_cmt_crl'); ShowContent('contextPlan');" onMouseOut=" HideContent('contextPlan');" ><span class="headingFont" style="margin-right:20px; text-shadow:1px 1px 1px #002929;"> WONDERING WHERE TO GO?</span><br/>
			    <span class="headingSmallFont" style="margin-right:25px; text-shadow:1px 1px 1px #002929;">Plan your trip...Start Here</span>				</div> </a></span>
				<span style="width:32.5%;float:left; margin-left:14px;">
				<a href="#" style="text-decoration:none;" onClick="Show_Block2_onclick();  change_bgcolor_cust('div_Explore','div_PlanTrip','div_Book');" onDblClick="Hide_Block2();">
				<div id="div_Explore" align="right" class="div_hdrbtns_pre" onMouseOver="Show_Block2();  show_block('div_cmt_crl'); ShowContent('contextExplore');" onMouseOut="HideContent('contextExplore');"><span class="headingFont" style="margin-right:20px; text-shadow:1px 1px 1px #002929;"> EXPLORE YOUR DESTINATION </span><br/> 
				<span class="headingSmallFont" style="margin-right:60px; text-shadow:1px 1px 1px #002929;">Know everything about your dream places </span>				 </div> </a></span>
				 <span style="width:30.5%;float:left;">
				<a href="#" style="text-decoration:none;" onClick="change_bgcolor_cust('div_Book','div_PlanTrip','div_Explore'); show_block('div_travel');">
				<div id="div_Book" align="center" class="div_hdrbtns_pre" onClick="btnflights_click();" onMouseOver="ShowContent('contextBook'); hide_block('div_cmt_crl');" onMouseOut="HideContent('contextBook');"  style="border-right:0px; text-shadow:1px 1px 1px #002929;"><span class="headingFont">  BOOK ONLINE </span><br/>
				<span class="headingSmallFont" style="margin-left:34px; text-shadow:1px 1px 1px #002929;">Fast, Convenient and Reliable</span></div>	</a>				</span>			</div>
		
		
		<span  style="float:left; max-width:624px; height:480px; position:relative;">	
			    <div id="back_img" align="left" style="width:624px;float:left;display:block;" >
				     <img id="left_img" width="100%" height="480px" style="float:left;border-radius:5px; " />
			   </div>	
			   	   
			    <div id="block1" class="div_blocks" onMouseOver="change_bgcolor_cust('div_PlanTrip','div_Explore','div_Book');"  onmouseout="none('div_Explore','div_PlanTrip','div_Book');">		  
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
						 <div style="margin-top:4px; background:#597272; width:100%; height:120px; border-radius:5px; float:left; position:relative;" onMouseOver="check_nxtbtn();">
						    <span id="span_quest" class="input_quests" style="float:left;">You Want to Travel in: </span> 
						 	<span id="span_trv" class="input_quests" style="float:left; display:none;">You Want to Travel in: </span>
						  <span id="span_cCity" class="input_quests" style="float:left;display:none;">  Select Current City :</span>
						 <span id="span_mode" class="input_quests" style="float:left;display:none;">Your preferred mode of travel :</span>
						 <span id="span_traveller" class="input_quests" style="float:left;display:none;">Travellers Are :</span>
						 <span id="span_kids" class="input_quests" style="float:left;display:none;">Your age :</span>
							<span id="span_kids" class="input_quests" style="float:left;display:none;">Kids age :</span>
							 <span id="span_Dur" class="input_quests" style="float:left;display:none;"> Trip Duration : </span>
							 	<span id="span_Loc" class="input_quests" style="float:left;display:none; width:100%;"> &nbsp; &nbsp; Locations :</span>
								<span id="span_numLoc" class="input_quests" style="float:left;display:none;">Select Locations : </span>
									<span id="span_prefCity" class="input_quests" style="float:left;display:none;">Preferred Locations :</span>
									
																	
					<!--		<span id="span_pack" class="input_quests" style="float:left;display:none;">Packages I'm interested in : </span>  -->
								   
								   
						     <span style="width:100%; float:left; margin-right:0px;">		
							 <span id="backBtn" style="visibility:visible; margin-left:140px; float:left;">
							  <a href="#" title="Back" onClick="Quest_Back();">
							  <img src="Images/backBtn.png" width="25px" height="25px" style="border:0px;" />
							 </a></span>			 	
							  <div style="margin-top:0px; margin-left:2px; margin-bottom:20px; float:left; background:white; width:auto; height:auto; position:relative; border-radius:5px;">	 
						     <span id="span_ans">						
							<div align="left" id="div_trv" class="input_Ans" style="width:auto; display:block;"> 
							<span class="input_Ans">
							<input type="radio" id="rdIndia" value="India" name="rd" onClick="show_box_trv();">India</span>
							<span class="input_Ans">
							<input type="radio" id="rdAbroad" value="Abroad" name="rd" onClick="show_box_trv();"> Abroad</span>
						  </div>
					      </span>
						    <div id="div_trv" class="input_Ans" style="width:auto; display:none;"> 
						    <span class="input_Ans">
							<input type="radio" id="rdIndia" value="India" name="rd" onClick="show_box_trv();">India</span>
							<span class="input_Ans">
							<input type="radio" id="rdAbroad" value="Abroad" name="rd" onClick="show_box_trv();"> Abroad</span>
						  </div>	
						 <div id="div_cCity" class="input_Ans" style="width:auto;  display:none;">
						  <span class="input_Ans">
						   <select class="input_Ans" name="drpcCity" id="drpcCity" style="width:200px;height:22px;" onChange="show_box_cCity();">
			   	  <option value="0" selected="selected">--------select-------</option>
				  <option value="Ahemdabad"> Ahemdabad </option> 
				  <option value="Bangalore "> Bangalore </option>
				  <option value="Chennai"> Chennai </option>
				  <option value="Delhi"> Delhi </option>
			       <option value="Kolkatta"> Kolkatta </option>
				  <option value="Mumbai"> Mumbai </Option>
				  <option value="Pune"> Pune </option>
				</select> </span> 
						  </div>
						  
						  <div id="div_mode" class="input_Ans" style="display:none; width:auto;">						  				
						  <span class="input_Ans">
						   <input type="radio" id="rdRoad" name="rdmode" value="Road" onClick="show_box_mode();">Road </span>
					<span class="input_Ans">
					<input type="radio" id="rdTrain" name="rdmode" value="Train" onClick="show_box_mode();"> Train </span>
					<span class="input_Ans">
					<input type="radio" id="rdFlight" name="rdmode" value="Flight" onClick="show_box_mode();"> Flight</span> 
					<span class="input_Ans">
					<input type="radio" id="rdSea" name="rdmode" value="Sea" onClick="show_box_mode();"> Sea	</span>						  
						  </div>
						
						  <div  id="div_traveller" class="input_Ans" style="margin-bottom:1px; width:auto; display:none;">
						  
						   <div>
						  <span class="input_Ans">
						  <input type="radio" value="Single" name="rdtravel" id="rdSingle" onClick="show_box_traveller();">Single</span>
				  <span class="input_Ans">
				  <input type="radio" value="Couple" name="rdtravel" id="rdCouple" onClick="show_box_traveller();">Couple</span>
				  <span class="input_Ans">
				  <input type="radio" value="Group" name="rdtravel" id="rdGroup" onClick="show_box_traveller();">Groups </span>
				  </div>
				  
							<div>
				  	<div class="input_Ans" id="div_your_Age" style="display:none; width:auto;">
					<span class="input_Ans" style="margin-right:0px; font-size:12px;">Age group:
					    <input type="radio" value="Group" name="rdagegrp" id="rdage45" onClick="show_box_traveller();"> Under 45 
				   <input type="radio" value="FamilyKids" name="rdagegrp" id="rdage45plus" onClick="show_box_traveller();"> Above 45</span>
					</div> 
					</div>
					
							<div>
				   <span class="input_Ans">
				   <input type="radio" value="FamilyKids" name="rdtravel" id="rdFamilykid" onClick="show_box_traveller();"> Family+Kids</span>
				  <span class="input_Ans">
				  <input type="radio" value="GroupKids" name="rdtravel" id="rdGroupkid"onclick="show_box_traveller();">Group+Kids</span>
				  </div>
				
				    <div class="input_Ans" id="div_kids" style="display:none; width:auto;">
						<span class="input_Ans" style="margin-right:0px; font-size:12px;">Kid's Age:
						<input type="checkbox" id="chkkid" onClick="show_box_traveller();">0-2Yrs	
				 		 <input type="checkbox" id="chkchild" onClick="show_box_traveller();"> 2-12Yrs 
						<input type="checkbox" id="chkchildplus" onClick="show_box_traveller();"> 12+Yrs 
						 </span>
							</div>
							</div>
				
									
				
						
							<div class="input_Ans" id="div_Dur" style="display:none; width:auto;">	
							<div>
							<span class="input_Ans">
				<select class="input_Ans" name="drptime" id="drptime" style="width:200px;height:22px;" onChange="show_box_dur();">
					<option selected="selected" value="0">--------select-------</option>
				    <option value="Weekend">Weekend </option>
					<option value="3Days"> 3Days </option>
					<option value="3-7Days"> 3-7Days </option>
					<option value="7-10Days">  7-10Days</option>
					<option value="over 10Days"> over 10Days</option>
					</select></span>
							</div>	
						
						<div class="input_Ans" id="div_Loc" style="display:none; margin-top:3px; width:auto; float:left;">
						<span class="input_Ans">Wants to holiday at:</span><br/>
						<span class="input_Ans">
						<a href="#">
						<div class="smallbtn" style="width:80px; height:30px; font-size:11px; background:#597272; color:#FFFFFF;" id="btnsinglecity" onClick="show_box_Singleloc();" onMouseOver="Questions();">Single Location</div></a></span>	
					<span class="input_Ans">
					<a href="#"><div class="smallbtn"  style="width:80px; height:30px; font-size:11px; background:#666633; color:#FFFFFF;" id="btnmulticity" onClick="show_box_Multiloc();"  onmouseover="Questions();">Multiple Location</div></a></span>	
							</div>
						</div>	
							<div class="input_Ans" id="div_numLoc" style="display:none; width:auto;">
							<div id="div_numLoc1">
					<span id="span_prefCity" class="input_quests" style="float:left;display:block; color:#555555;">Number of Locations :</span>
					 <span class="input_Ans">
					 <select id="drpNum" class="input_Ans" style="width:35px;height:23px; background:#DDDDDD;" onclick="show_box_locNum();">
				<option> 2 </option>
				<option> 3 </option>
				<option> 4 </option>	
				<option> 5 </option>
			<!---	<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>  --->
				</select></span>				   
						   </div>
						   
						 	<div class="input_Ans" id="div_PrefCity_Single" style="display:none; width:auto;">	
							<span class="input_Ans">
				<select class="input_Ans" name="drpPrefCity_Single" id="drpPrefCity_Single" style="width:200px;height:22px;" onChange="show_box_prefCity_Single();">
					<option selected="selected" value="0">--------select-------</option>
				    <option value="Ahemdabad">Ahemdabad </option>
					<option value="Bangalore"> Bangalore </option>
					<option value="Madurai"> Madurai</option>
					<option value="Mumbai">  Mumbai</option>
					<option value="Pune"> Pune</option>
					</select></span>
							</div>	  
										   
					   <div id="div_prefCity" style="display:none; margin-top:2px; width:100%; float:left; border:1px solid grey;">							
							<div class="div_dropdown" onClick="show_block('div_places');" style="width:100%;">
					<span id="span_act_beach" style="margin-left:10px; float:left;">Preferred locations</span>
					<span style=" float:right; margin-right:3px; margin-top:3px;" >
					<img id="imgDown"  src="Images/drp_Down.png" width="20px" height="10px" style="cursor:pointer; display:block;" onClick="show_block('imgUp'); hide_block('imgDown'); show_block('div_places');" /></span>
					<span style=" float:right; margin-right:3px;"><img id="imgUp" src="Images/drp_Up.png" width="20px" height="10px" style="cursor:pointer; display:none;"  onClick=" hide_block('div_places'); hide_block('imgUp'); show_block('imgDown'); show_box_prefCity();" /></span>
					</div>					
					<div id="div_places" class="div_drpListItems">	
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkAhemdabad"   value="Ahemdabad" />Ahemdabad</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkBangalore"  value="Bangalore" />Bangalore</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkMadurai"   value="Madurai"/>Madurai</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkTrivandrum"  value="Trivandrum"/>Trivandrum</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkMumbai"   value="Mumbai"/>Mumbai</span>			
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkKashmir"  value="Kashmir"/>Kashmir</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkPune"  value="Pune"/>Pune</span><br/>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkManali"  value="Manali"/>Manali</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkMunnar"  value="Munnar"/>Munnar</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkDarjeling"  value="Darjelling"/>Darjelling</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkUdaipur"   value="Udaipur"/>Udaipur</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkSrinagar"  value="Srinagar"/>Srinagar</span>			
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkChandigarh"  value="Chandigarh"/>Chandigarh</span>
				 <span class="span_drpListItems_explore"><input type="checkbox" id="chkHyderabad"  value="Hyderabad"/>Hyderabad</span>
				  <span class="span_drpListItems_explore" style="text-align:center;">
				  <a href="#" style="text-decoration:none;" onClick="hide_block('div_places');  show_box_prefCity();">
				  <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
				</div>
			</div>
				</div>
					  <div id="span_thanku" align="center" style="display:none; width:100%; font-size:14px; color:#FFFFFF;" >
						  <span style="margin:80px 130px 0px 130px;">That was quick..took only 11 Seconds!</span><br/>
						  	<span style="margin:20px 0px 40px 20px;">Now you are only a click away to discover your vacation</span><br/>
						  <span style="margin:20px 0px 40px 18px;">Click submit button below.</span>				  
						  </div>													  
							  </div>
				<span  id="nextbtn" style="float:left; visibility:visible; margin-left:0px;">
						  <a href="#" style="text-decoration:none;">
						   <img src="Images/nextBtn.png" width="35px" height="35px" onClick="Questions();" onMouseOver="ShowContent('contextNext');" onMouseOut="HideContent('contextNext');" style=" border:0px;"/>
					    </a></span>
						   </span>
				  </div>
				  
							<div id="div_collectInputs" style="width:100%; height:auto; float:left; border-radius:5px; opacity:0.8; margin-top:1px; margin-bottom:0px; margin-left:10px; display:none;">
							<span style="float:left;">
							<div>
							<span style="float:left;">								
						<a href="#" onClick="change_TravelPlace();" style="text-decoration:none;">
						<div class="box_ans" id="div_box_country" onMouseOver="input_btn_border('div_box_country'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_country'); HideContent('contextInputsEdit');">
						<span style="float:left; margin-left:5px;">Wants to tavel within&nbsp; </span>
						<span id="_country" style="float:left;"></span>
					    </div></a>
						 </span>
						 <span style="float:left;">
						<a href="#" onClick="change_cCity();" style="text-decoration:none;">
						<div id="div_box_cCity" class="box_ans" onMouseOver="input_btn_border('div_box_cCity'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_cCity'); HideContent('contextInputsEdit');">
						 <div><span style="float:left;margin-left:5px;">Currently I'm at&nbsp;</span>
						<span id="_cCity" style="float:left;"></span></div>
					    </div></a>
						 </span>
						 
						<span style="float:left;">
					<a href="#" onClick="change_prefTravel();" style="text-decoration:none;">
					<div id="div_box_mode" class="box_ans" onMouseOver="input_btn_border('div_box_mode'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_mode'); HideContent('contextInputsEdit');">
					 <div><span style="float:left;margin-left:5px;">Prefer travelling by&nbsp; </span>
						<span id="_mode" style="float:left;"></span></div>
				    </div></a>
						 </span>
						 
						<span style="float:left;">
					 <a href="#" onClick="change_travellers();" style="text-decoration:none;">
					 <div id="div_box_traveller" class="box_ans" style="overflow-y:scroll;" onMouseOver="input_btn_border('div_box_traveller'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_traveller'); HideContent('contextInputsEdit');">
					  <div><span id="_travellerHdr" style="float:left;margin-left:5px;"></span>
						<span id="_traveller" style="font-size:12px;float:left;"></span></div>
					 </div></a>
						  </span>
						  
				 <span style="float:left;">
					<a href="#" onClick="change_tripDur();" style="text-decoration:none; ">
					<div id="div_box_Dur" class="box_ans" onMouseOver="input_btn_border('div_box_Dur'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_Dur'); HideContent('contextInputsEdit');"> 
					<div><span id="_tripDurHdr" style="float:left;margin-left:5px;"></span>
						<span id="_tripDur" style="float:left;"></span></div>
				    </div></a>
						  </span>
						  
					<span style="float:left;">						  					
						<a href="#" onClick="change_locType();" style="text-decoration:none;">
						<div id="div_box_locType" class="box_ans" onMouseOver="input_btn_border('div_box_locType'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_locType'); HideContent('contextInputsEdit');"> 
						<div><span id="_locTypeHdr" style="float:left;margin-left:5px;"></span>
						<span id="_locType" style="float:left;"></span></div>
					    </div>	</a>					
						  </span>
						  
						  <span style="float:left;">
						<a href="#" onClick="change_locNum();" style="text-decoration:none;">
						<div id="div_box_locNum" class="box_ans" onMouseOver="input_btn_border('div_box_locNum'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_locNum'); HideContent('contextInputsEdit');"> 
						<div><span style="float:left;margin-left:5px;">Wants to holiday at&nbsp;</span>
						<span id="_locNum" style="float:left;"></span></div>
					    </div></a>	
						  </span>
						  
				  <span style="float:left;">
						<a href="#" onClick="change_prefLoc();" style="text-decoration:none;">
						<div id="div_box_prefCity" class="box_ans" style="height:auto;" onMouseOver="input_btn_border('div_box_prefCity'); ShowContent('contextInputsEdit');" onMouseOut="input_btn_toggle('div_box_prefCity'); HideContent('contextInputsEdit');">
						 <div><span style="float:left;margin-left:5px;"></span>
						<span id="_prefCity" style="float:left; overflow-y:scroll;"></span></div>
					    </div>	</a>
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
							<div align="center" id="div_confirmBtn" style="height:auto; color:#002929; width:100%;display:none; margin-left:10px;">
		 						<span style="float:left;">
							<a href="#">
						 <div id="modifybtn" class="smallbtn" style="width:60px; background:grey; height:22px; border:1px solid Darkgrey; font-weight:600; font-size:15px; display:block;" onClick="change_bg_inputs();"> Modify </div></a>
								</span>
								<span style="float:left;">
							<a href="Build_Trip.php">
						 <div id="submitbtn" class="smallbtn" style="width:60px; height:22px; margin-left:3px; border:1px solid black; font-weight:600; font-size:15px; display:block;" onMouseOver="display_finalChange();"> Submit </div></a>
								</span>
							</div>
			   </div>
					   
				<div id="block2" class="div_blocks" onmouseover="change_bgcolor_cust('div_Explore','div_PlanTrip','div_Book');" onmouseout="none('div_Explore','div_PlanTrip','div_Book');">
					
					<div style="width:100%; height:150px; border-radius:5px; float:left; background:#FFFFFF;">
					   <div align="center" class="div_elements_visible">
					   <span style="float:left; margin-left:10px;"> <img width="30px" height="30px" src="Images/think.png" style="border:0px;"/></span>
					   <span style="font-size:20px;color:#0066FF; float:left; margin-left:10px; font-family:Georgia, 'Times New Roman', Times, serif, Calibri;">
					   I've been thinking of going to...</span>
					   </div>
					    <div align="center"> 
						<span style="float:left;">
					   <div id="div_explore_text" style="font-size:14px; margin-top:3px; margin-left:0px; border-radius:5px; width:620px; height:60px; background:#eee;">					    
					   <span style="float:left;">
					     <input type="text" id="searchid" name="searchid" class="search" placeholder="Eg. Goa, Coorg, Jaipur, Kajiranga" value="Want to go to... Goa, Coorg, Jaipur, Kajiranga" style="background:#FFFFFF;color:#5E5E5E; border-radius:5px; height:25px; width:500px; margin-left:15px; margin-top:15px; margin-bottom:5px; margin-right:10px; font-size:16px; color:#999;" onMouseOver="txtbox_color_onmouseover('searchid');" onMouseOut="txtbox_color_onmouseout('searchid');" onClick="show_explore(this.id);"; onKeyUp="toUpper(this.id);" />
						 </span> 
		               <span style="float:left; margin-top:20px;">
					     <a id="hrefExplore">					   
					   <div class="smallbtn" id="btnSelect" style="font-size:14px; width:70px; margin-top:-5px; font-weight:600; height:23px; box-shadow:1px 0px 6px 0px lightgrey;  background:red; border:1px solid grey;" onClick="insertQS();">Explore</div> 
					   </a></span>
					   <div id="result" style="width:70%; margin-top:1px; margin-left:1px;">	</div>
					   
					   </div>
					   </span>
					   </div>					   
					   
			   </div>
					   
					   	<div class="div_elements_visible" style="width:100%;">				 			
					  <a href="#" style="border-bottom:none; ">
					  <div id="div_popularDest" class="headerbtn" style="width:240px; height:22px; float:left; background:#002929; color:#FFFFFF;">Popular Vacations</div></a>
					   </div>
					   
		   	  	   <div class="div_elements_visible" style="margin-left:0px; overflow-y:scroll; overflow-x:hidden; margin-top:3px; height:270px; max-width:630px; color:#B22222;">
      
			<table id="tab" width="600px" height="550px" cellspacing="0.5px" cellpadding="0.5px" style="font-size:14px;">
			<tr>
			<!--------------------------------------------- 1st row--------------------------------------------------------------------------------->
			<td align="center"  id="img_td1" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19',this.id);">
   		  <div class="div_explore_imgs" style="background: url('Images/Vacation type image/adventuretour2.jpg') no-repeat;" onClick="show_date_div('div_dest_date','180','90','1em','0em','Adventure Tour','img_td1');  show_block('div_greyBack');"></div> 		
		 <span class="font_medium_cust"> AdventureTour </span> 
			</td>
			
			<td align="center" id="img_td2" onMouseOver="blur_td('img_td1', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td1', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		 <div  class="div_explore_imgs" style="background:url('Images/Vacation type image/Beachgetaway.jpg') no-repeat;" onClick="show_date_div('div_dest_date','380','90','1em','0em','BeachGetaway','img_td2'); show_block('div_greyBack');"/>		     		
		</div>
		<span class="font_medium_cust">BeachGetAway</span>
		 </td>
		 
			<td align="center" id="img_td3" onMouseOver="blur_td('img_td2', 'img_td1', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td1', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
     	<div style="background:url('Images/Vacation type image/JungleSafari.jpg') no-repeat;" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80','90','0em','1em','Jungle Safari','img_td3');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Jungle Safari</span>
		 </td>
		 </tr>
		<tr>
		<!--------------------------------------------- 2nd row--------------------------------------------------------------------------------->
			<td align="center" id="img_td4" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td1', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td1', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
			<div style="background:url('Images/Vacation type image/sightseeing.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','180','220','1em','0em','Sightseeing','img_td4');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Sightseeing</span>
			</td>
				
			<td align="center" id="img_td6" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td1', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td1', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
	<div style="background:url('Images/Vacation type image/citytour1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380','220','1em','0em','City Tour','img_td6');  show_block('div_greyBack');">	</div>
		<span class="font_medium_cust">City Tour</span>
		</td>
		 
		 	<td align="center" id="img_td7" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td1', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td1', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
			<div style="background:url('Images/Vacation type image/Hillstation.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80px','220px','0em','1em','Hill Station','img_td7');  show_block('div_greyBack');"></div>
				<span class="font_medium_cust">Hill Station</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 3rd row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td8" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td1', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td1', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		 <div style="background:url('Images/Vacation type image/NatureEscape2.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','180','90','1em','0em','Nature Escape','img_td8');  show_block('div_greyBack');"> </div>	
		 <span class="font_medium_cust">Nature Escape</span>
		 </td>
		 
		 	<td align="center" id="img_td9" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td1', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td1', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/wildlifeEscape3.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380','90','1em','0em','WildLife Escape','img_td9');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">WildLife Escapes</span>
		 </td>
		 
		 	<td align="center" id="img_td10" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td1', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td1', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/religious1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80','90','0em','1em','Religious','img_td10');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Religious Tour</span>
		</td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 4th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td11" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td1', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td1', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/CoffeeEstate.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','180px','220px','1em','0em','Coffee/Tea Estate','img_td11');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Coffee/Tea Estates</span>
		</td>
		
		 	<td align="center" id="img_td12" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td1', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td1', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">
		<div style="background:url('Images/Vacation type image/Honeymoonescapes3.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380px','220px','1em','0em','Honeymoon Escape','img_td12');  show_block('div_greyBack');">	</div>
		<span class="font_medium_cust">Honeymoon Escapes</span>
		</td>
		
		 	<td align="center" id="img_td13" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td1', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td1', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');"> 
		<div style="background:url('Images/Vacation type image/watersports4.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80px','220px','0em','1em','Water Sport','img_td13');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Water Sports</span>
		</td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 5th row--------------------------------------------------------------------------------->
		    <td align="center" id="img_td14" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td1', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td1', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
<div style="background:url('Images/Vacation type image/ReserveForest1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','180px','220px','1em','0em', 'Reserve Forest','img_td14');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust">Reserve Forests</span>
	</td>
	
		 	<td align="center" id="img_td15" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td1', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td1', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background:url('Images/Vacation type image/DesertSafari1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380px','220px','1em','0em','Desert Safari','img_td15');  show_block('div_greyBack');"></div>
		 <span class="font_medium_cust">Desert Safari</span>
		 </td>
		 
	 		<td align="center" id="img_td16" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td1', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td1', 'img_td17', 'img_td18','img_td19');">			
	<div style="background:url('Images/Vacation type image/Honeymoonescapes1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80px','220px','0em','1em','Romantic Getaway','img_td16');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust"> Romantic Gateway</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 6th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td17" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td1', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td1', 'img_td18','img_td19');">			 
	<div style="background:url('Images/Vacation type image/camping3.jpg');" class="div_explore_imgs" "show_date_div('div_dest_date','180px','220px','1em','0em','Camping Tour','img_td17');  show_block('div_greyBack');"></div>
	<span class="font_medium_cust">Camping Tour</span>
		 </td>
		 
		 	<td align="center" id="img_td18" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td1','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td1','img_td19');">			
	<div style="background:url('Images/Vacation type image/Honeymoonescapes1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380px','220px','1em','0em','Rest & Relaxing','img_td18');  show_block('div_greyBack');"></div> 
	<span class="font_medium_cust">Rest & Relaxing</span>
		 </td>
		 
		 	<td align="center" id="img_td19" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td1');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td5', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18', 'img_td1');"> 			
	<div style="background:url('Images/Vacation type image/agritour5.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','-80px','220px','0em','1em','Agri/Eco Tourism','img_td19');  show_block('div_greyBack');"></div>
	 <span class="font_medium_cust">Agri/Eco Tourism</span>
		 </td>
		 </tr>
		 <tr>
		 <!--------------------------------------------- 7th row--------------------------------------------------------------------------------->
		 	<td align="center" id="img_td5" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background: url('Images/Vacation type image/ancientcity1.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','180px','220px','1em','0em','Historical','img_td5');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Heritage/Forts</span>
		 </td>
		 <td align="center" id="img_td20" onMouseOver="blur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');" onMouseOut="unblur_td('img_td2', 'img_td3', 'img_td4', 'img_td1', 'img_td6', 'img_td7', 'img_td8', 'img_td9', 'img_td10', 'img_td11', 'img_td12', 'img_td13', 'img_td14', 'img_td15', 'img_td16', 'img_td17', 'img_td18','img_td19');">			
		<div style="background: url('Images/Vacation type image/citytour4.jpg');" class="div_explore_imgs" onClick="show_date_div('div_dest_date','380px','220px','1em','0em','Weekend Getaway','img_td20');  show_block('div_greyBack');"></div>
		<span class="font_medium_cust">Weekend Getaway</span>
		 </td>
		 </tr>
		 </table>
	
				    </div>	  
			  </div>  
		
       </span> 
				  
			  	 <span style="max-width:315px; max-height:500px; float:left; margin-left:3px;">
				
				 <div style="border:1px solid lightgrey; max-width:315px; background:#F8F8FF; border-radius:5px; height:auto; float:left;" onMouseOver="change_bgcolor_cust('div_Book','div_PlanTrip','div_Explore');"  onmouseout="none('div_Book','div_PlanTrip','div_Explore');">
				   <div class="div_elements_visible" align="center" style="margin:0px 0px 0px 0px; background:#FFFFFF; width:100%;"> 
				     <span style="margin-left:3px; float:left;"><img src="Images/Flight.png" class="travel_img" onClick="btnflights_click();"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/hotel.png" class="travel_img" onClick="btnhotel_click();"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/Taxi.png" class="travel_img" onClick="btncars_click();"></span>
					 <span style="margin-left:3px; float:left;"><img src="Images/Train.png" class="travel_img" onClick="btntrains_click();"></span>
					 <span style="margin-left:5px; float:left;"><img src="Images/Bus.gif" class="travel_img" onClick="btnbus_click();"></span>
				   </div>
				   
				  <div class="div_elements_visible" align="center" style="margin:0px 1px 0px 1px; margin-right:1px solid #F5F5F5; background:#002929; width:100%; height:38px;" >
				  <span class="div_elements_visible">
					 <div class="smallbtn" id="btnflight" style="width:45px;  height:20px; margin-left:7px;" onClick="btnflights_click(this.id,'btnhotels','btncars','btntrains','btnbus');">Flights</div></span>
					 <span class="div_elements_visible">
					 <div class="smallbtn" id="btnhotels" style="width:45px;  height:20px; margin-left:7px;" onClick="btnhotel_click(this.id,'btnflight','btncars','btntrains','btnbus');">Hotels</div></span>
					 <span class="div_elements_visible">
					 <div class="smallbtn" id="btncars" style="width:45px;  height:20px; margin-left:7px;" onClick="btncars_click(this.id,'btnhotels','btnflight','btntrains','btnbus');">Cars</div></span>
					 <span class="div_elements_visible">
					 <div class="smallbtn" id="btntrains" style="width:45px;  height:20px; margin-left:7px;" onClick="btntrains_click(this.id,'btnhotels','btnflight','btncars','btnbus');">Trains</div></span>
					 <span class="div_elements_visible" style="margin-right:0px;margin-left:7px;">
					 <div class="smallbtn" id="btnbus" style="width:45px;  height:20px; margin-left:5px;" onClick="btnbus_click(this.id,'btnhotels','btnflight','btncars','btntrains');">Buses</div></span>
				   </div>
				  
				    <div id="div_flight" class="div_btn_TravelVehicle" style="display:block;">
				      <div class="div_elements_visible" style="margin:5% 0% 0% 0%;">
					   <span class="div_elements_visibile" ><input type="radio" name="rdways_Flight" id="rdOneway_Flight" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Flight','returnDate_Flight');" /> OneWay </span>
					   <span class="div_elements_visibile"><input type="radio" name="rdways_Flight" id="rdReturn_Flight" value="Return" onClick="return_journey('rdReturn_Flight','returnDate_Flight');" /> Return
					   </span></div>
					  <div class="div_elements_visible" style="background:lightblue;width:98%;margin-bottom:0px;">
					    <span style="float:left;"> I am at: </span>
						<span style="float:right;">
						 <select class="div_elements_visibile" id="drpSource" name="drpSource" onChange="validateWay();" style="background:white;" onmouseover="txtbox_color_onmouseover('drpSource');" onmouseout="txtbox_color_onmouseout('drpSource');">
					<option value="0"> --Boarding Point-- </option>
					<option value="Bangalore"> Bangalore </option>
					<option value="Delhi"> Delhi </option>
					<option value="Hyderabad"> Hyderabad</option>
					<option value="Chennai"> Chennai </option>
					<option value="Kolkatta"> Kolkatta </option>
					<option value="Ahemdabad"> Ahemdabad </option>
					</select> </span>
				      </div>  
						
						<div class="div_elements_visible" style="background:lightblue;width:98%;margin-top:1px;">
						<span style="float:left;"> Going To: </span>									
						<span style="float:right;">
						 <select name="drpDestination" class="div_elements_visibile"  id="drpDestination" onChange="validateBoarding();" style="background:white;" onmouseover="txtbox_color_onmouseover('drpDestination');" onmouseout="txtbox_color_onmouseout('drpDestination');">
					<option value="0"> --Destination Point-- </option>
					<option value="Bangalore"> Bangalore </option>
					<option value="Delhi"> Delhi </option>
					<option value="Hyderabad"> Hyderabad</option>
					<option value="Chennai"> Chennai </option>
					<option value="Kolkatta"> Kolkatta </option>
					<option value="Ahemdabad"> Ahemdabad </option>
					</select> </span>
					  </div>
					  
					  <div class="div_elements_visible" style="margin:bottom:0px;">
					<span style="margin-right:60px;"> Departure Date:</span>
					<span>Return Date: </span>
					</div>
					<div class="div_elements_visible" style="margin-top:1px;">					
					<span style="margin-right:60px;">
					<input type="text" id="frmDate_Flight" class="txtbox" onMouseOver="txtbox_color_onmouseover('frmDate_Flight');" onMouseOut="txtbox_color_onmouseout('frmDate_Flight');" onClick="oDP.show(event,'frmDate_Flight',2); ShowContent('datepicker');"/></span>
					<span>
					<input type="text" id="returnDate_Flight" disabled class="txtbox" style="background:grey;" onClick="oDP.show(event,'returnDate_Flight',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Flight');" onMouseOut="txtbox_color_onmouseout('returnDate_Flight');"></span>
					  </div>
					  
					  <div class="div_elements_visible" style="background:lightblue;width:98%;margin-bottom:0px;">
					   <span style="float:left;"> No. of People Travelling:</span>
					  </div>	
					  <div class="div_elements_visible" style="background:lightblue;width:98%;margin-bottom:0px;margin-top:1px;margin-right:0px;font-size:12px;">
					    <span class="div_elements_visible" style="float:left;">Adults:</span>
						<span class="div_elements_visible" style="float:left;">
						<select  class="txtbox_nums" onChange="validateDepDate();" name="drpAdult" id="drpAdult" onmouseover="txtbox_color_onmouseover('drpAdult');" onmouseout="txtbox_color_onmouseout('drpAdult');">
						<option value="0">0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
						<span class="div_elements_visible" style="float:left;">Children:</span>
						<span class="div_elements_visible" style="float:left;">
						<select class="txtbox_nums" name="drpChild" id="drpChild" onmouseover="txtbox_color_onmouseover('drpChild');" onmouseout="txtbox_color_onmouseout('drpChild');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
						<span class="div_elements_visible" style="float:left;">Infants:</span>
						<span class="div_elements_visible" style="margin-right:0px;float:left;">
						<select class="txtbox_nums" name="drpInfant" id="drpInfant" onmouseover="txtbox_color_onmouseover('drpInfant');" onmouseout="txtbox_color_onmouseout('drpInfant');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  </div>
							  
					  <div align="left" class="div_elements_visible" style="margin-right:0px;margin-left:0px;">
					    <span style="float:left; font-size:12px;"> Class: 
						<span class="div_elements_visibile"><input type="radio" value="Economy" id="rdeco" name="rdclass" checked="true" onClick="validatePassengers();"> Economy</span>
						<span class="div_elements_visibile"><input type="radio" value="Business" id="rdbusi" name="rdclass" onClick="validatePassengers();"> Business</span>
						<span class="div_elements_visibile"><input type="radio" value="Business" id="rdbusi" name="rdclass" onClick="validatePassengers();"> FirstClass</span>
						</span>
					  </div>	
					  
					  <div class="div_elements_visible" style="background:lightblue;width:100%;">
					<!---  <span> Email ID:</span>
					  <span>
					<input type="text" id="txtemail" value="Type Your Email Id" class="txtbox" style="color:grey;width:200px; font-family:calibri;" onclick="errase();" onMouseOut="checkEmail();">
					  </span> -->
					  </div>
					  <div class="div_elements_visible" align="center">
					   <div class="smallbtn" id="searchFlight" onClick="validateClass();" onMouseOver="change_color('searchFlight');" onMouseOut="change_back('searchFlight');" style="-moz-font-size:5px;-webkit-font-size:5px;font-size:15px;width:110px;height:20px; box-shadow: 2px 2px 0px 0px grey;">
					  <a href="#" style="text-decoration:none;color:#FFFFFF;">Search Flights</a></div>	</div>				  
					  		  
				   </div>			     
					 
					<div id="div_hotel" class="div_btn_TravelVehicle">
					      <div class="div_elements_visible" style="margin:5% 0% 0% 0%;">
					   <span class="div_elements_visible">Location</span>
					   <span>
					   <select class="div_elements_visible" id="drpNoDays" name="drpNoDays" style="width:150px; height:22px;" onmouseover="txtbox_color_onmouseover('drpNoDays');" onmouseout="txtbox_color_onmouseout('drpNoDays');">
					   <option selected="selected">----Select----</option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select>
					   </span>
					  </div>				    
					  <div class="div_elements_visible" style="margin:5% 0% 0% 0%; background:lightblue;width:98%;">
					<span style="margin-right:100px;"> Check-in:</span>
					<span style="margin-left:0px;">Check-out: </span>
					</div>
					<div class="div_elements_visible" style="margin:0 0 0 0; margin-top:1px; background:lightblue;width:98%;">					
					<span style="margin-right:60px;"><input type="text" id="txtCheckIn" class="txtbox" onMouseOver="txtbox_color_onmouseover('txtCheckIn');" onMouseOut="txtbox_color_onmouseout('txtCheckIn');" onClick="oDP.show(event,'txtCheckIn',2); ShowContent('datepicker');"/></span>
					<span><input type="text" id="txtCheckOut" class="txtbox" onMouseOver="txtbox_color_onmouseover('txtCheckOut');" onMouseMove="calNumDays();" onMouseOut="txtbox_color_onmouseout('txtCheckOut');" onClick="oDP.show(event,'txtCheckOut',2); ShowContent('datepicker'); validateDestination();" /></span>
					  </div>
					    
						<div class="div_elements_visible" style="margin:0 0 0 0; margin-top:1px; background:lightblue;width:98%;">
					   <span class="div_elements_visible">Days: </span>
					   <span  class="div_elements_visible">
					      <input type="text" class="txtbox_nums" id="txtdays_htl" value="2" />
					   </span>
					  </div>
					  
					  <div class="div_elements_visible" style="width:98%;margin-bottom:0px;">
					   <span class="div_elements_visible" style="float:left; margin-right:10px;"> No. of People:</span>
					   <span class="div_elements_visible"  style="float:left;">Adults:</span>
						<span style="float:left;" class="div_elements_visible">
						<select  class="txtbox_nums" onChange="validateDepDate();" name="drpAdult_Hotel" id="drpAdult_Hotel" onmouseover="txtbox_color_onmouseover('drpAdult_Hotel');" onmouseout="txtbox_color_onmouseout('drpAdult_Hotel');">
						<option value="0">0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
						<span class="div_elements_visible"  style="float:left;">Children:</span>
						<span style="float:left;"  class="div_elements_visible">
						<select class="txtbox_nums" name="drpChild_Hotel" id="drpChild_Hotel" onmouseover="txtbox_color_onmouseover('drpChild_Hotel');" onmouseout="txtbox_color_onmouseout('drpChild_Hotel');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  </div>
					  
					  <div class="div_elements_visible" style="margin:5% 0% 0% 0%; width:98%; background:lightblue;">
					    <span class="div_elements_visible">Rooms:</span>
					   <span class="div_elements_visible">
					   <select id="drpNoDays" name="drpNoDays" class="txtbox_nums" onmouseover="txtbox_color_onmouseover('drpNoDays');" onmouseout="txtbox_color_onmouseout('drpNoDays');">
					   <option selected="selected">0</option>
					   <option>1</option>
					   <option>2</option>
					   <option>3</option>
					   <option>4</option>
					   <option>5</option>
					   <option>6</option>
					   <option>7</option>
					   </select>
					   </span>
					  </div>
				  <div class="div_elements_visible" style="margin:0 0 0 0; margin-top:1px; background:lightblue; width:98%;">
					    <span class="div_elements_visible"> Class: </span>
						<span class="div_elements_visible" >
						<select id="drpHotelClass" name="drpHotelClass" onmouseover="txtbox_color_onmouseover('drpHotelClass');" onmouseout="txtbox_color_onmouseout('drpHotelClass');">
					<option>----Select Class---</option>
					<option> Delux </option>
					<option> Luxuary </option>
					<option> Executive </option>
				    </select></span>
					  </div>
					  
					  <div class="div_elements_visible" style="background:lightblue;width:100%;">
					<!---  <span> Email ID:</span>
					  <span>
					<input type="text" id="txtemail" value="Type Your Email Id" class="txtbox" style="color:grey;width:200px; font-family:calibri;" onclick="errase();" onMouseOut="checkEmail();">
					  </span> -->
					  </div>
					  <div class="div_elements_visible" align="center">
					   <div class="smallbtn" id="searchFlight" onClick="validateClass();" onMouseOver="change_color('searchFlight');" onMouseOut="change_back('searchFlight');" style="-moz-font-size:5px;-webkit-font-size:5px;font-size:15px;width:110px;height:20px; box-shadow: 2px 2px 0px 0px grey;">
					  <a href="#" style="text-decoration:none;color:#FFFFFF;">Search Hotels</a></div>	</div>				  
					  		  
				   </div>
				     
				    <div id="div_trains" style="display:none;width:100%;margin-left:5px; height:440px;">
				      <div class="div_elements_visible" style="margin:5% 0% 0% 0%; width:98%;">
					   <span style="float:left;"><input type="radio" name="rdways_Train" id="rdOneway_Train" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Train','returnDate_Train');" > OneWay </span>
					   <span style="float:left;"><input type="radio" name="rdways_Train" id="rdReturn_Train" value="Return" onClick="return_journey('rdReturn_Train','returnDate_Train');"> Return
					   </span></div>
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					    <span style="float:left;"> I am at: </span>
						<span style="float:right;"> <select name="drpSource_Train" id="drpSource_Train" onChange="validatesrc();"class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpSource_Train');" onmouseout="txtbox_color_onmouseout('drpSource_Train');">
					<option value="0"> --Boarding Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
				      </div>  
						
						<div class="div_elements_visible" style="width:98%;background:lightblue;margin-top:1px;">
						<span style="float:left;"> Going To: </span>									
						<span style="float:right;"> <select name="drpDestination_Train" id="drpDestination_Train" onChange="validatesrc();" class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpDestination_Train');" onmouseout="txtbox_color_onmouseout('drpDestination_Train');">
					<option value="0"> --Destination Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
					  </div>
					  
					  <div class="div_elements_visible" style="margin-bottom:0px;">
					<span style="margin-right:50px;"> Departure Date:</span>
					<span>Return Date: </span>
					</div>
					<div class="div_elements_visible" style="margin-top:1px;">					
					<span style="margin-right:40px;"><input type="text" id="frmDate_Train" class="txtbox" onClick="oDP.show(event,'frmDate_Train',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('frmDate_Train');" onMouseOut="txtbox_color_onmouseout('frmDate_Train');"></span>
					<span><input type="text" id="returnDate_Train" disabled class="txtbox" style="background:grey;" onClick="oDP.show(event,'returnDate_Train',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Train');" onMouseOut="txtbox_color_onmouseout('returnDate_Train');"></span>
					  </div>
					  
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					   <span class="div_elements_visible" style="float:left;"> No. of People Travelling:</span>
					  </div>	
					  <div class="div_elements_visible" style="margin-bottom:0px;margin-top:1px;width:98%;background:lightblue;">
						<span class="div_elements_visible" style="float:left;">Adult:</span>
						<span class="div_elements_visible" style="float:left;"><select class="txtbox_nums" onChange="validatepass();" id="drpAdult_Train" name="drpAdult_Train" onmouseover="txtbox_color_onmouseover('drpAdult_Train');" onmouseout="txtbox_color_onmouseout('drpAdult_Train');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
						<span class="div_elements_visible" style="float:left;">Children:</span>
						<span class="div_elements_visible" style="float:left;">
						<select class="txtbox_nums" onChange="validatepass();" name="drpChild_Trian" id="drpChild_Trian" onmouseover="txtbox_color_onmouseover('drpChild_Trian');" onmouseout="txtbox_color_onmouseout('drpChild_Trian');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
						<span class="div_elements_visible" style="float:left;">Sr.Citizen</span>
						<span class="div_elements_visible" style="float:left;"><select class="txtbox_nums" onChange="validatepass();" name="drpSrCitiTrain" id="drpSrCitiTrain" onmouseover="txtbox_color_onmouseover('drpSrCitiTrain');" onmouseout="txtbox_color_onmouseout('drpSrCitiTrain');">
						<option>0</option>
						<option>1</option>
						<option> 2 </option>
						<option>3</option>
						<option> 4 </option>
						<option> 5 </option>
						</select></span>
					  </div>
						  
					  <div class="div_elements_visible">
					    <span class="div_elements_visible" style="float:left;"> Class: 
						  <select class="div_elements_visibile" id="drpTrainClass" name="drpTrainClass" style="width:200px;height:22px;" onmouseover="txtbox_color_onmouseover('drpTrainClass');" onmouseout="txtbox_color_onmouseout('drpTrainClass');">
					<option>----Select Class---</option>
					<option> Second Class </option>
					<option> First Class </option>
					<option> AC III Tier </option>
					<option> AC II Tier </option>
					<option> AC I Tier </option>
					<option> Second Seating </option>
					<option> AC Chair Car</option>
				    </select></span>
					  </div>	
					  
					  <div class="div_elements_visible" style="width:98%;background:lightblue;">
					<!---  <span> Email ID:</span>
					  <span>
					<input type="text" id="txtemail" value="Type Your Email Id" class="txtbox" style="color:grey;width:200px; font-family:calibri;" onclick="errase();" onMouseOut="checkEmail();">
					  </span>  -->
					  </div>
					  <div class="div_elements_visible" style="float:left;"> <div class="smallbtn" id="searchTrain" onClick="validate();" onMouseOver="change_color('searchTrain');" onMouseOut="change_back('searchTrain');" style="-moz-font-size:5px;-webkit-font-size:5px;font-size:15px;width:110px;height:20px;  box-shadow: 2px 2px 0px 0px grey;"><a href="#" style="text-decoration:none;color:#FFFFFF;">Search Trains</a></div>	</div>				  
					  		  
				   </div>
				     
			       <div id="div_cars" class="div_btn_TravelVehicle">
			       <div class="div_elements_visible" style="margin:5% 0% 0% 0%;">
					   <span ><input type="radio" name="rdways_Cars" id="rdOneway_Car" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Car','returnDate_Car');" > OneWay </span>
					   <span ><input type="radio" name="rdways_Cars" id="rdReturn_Car" value="Return" onClick="return_journey('rdReturn_Car','returnDate_Car');"> Return
					   </span></div>
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					    <span style="float:left;"> I am at: </span>
						<span style="float:right;"> <select name="drpSource_Car" id="drpSource_Car" onChange="validatesrc();" class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpSource_Car');" onmouseout="txtbox_color_onmouseout('drpSource_Car');">
					<option value="0"> --Boarding Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
				     </div>  
						
						<div class="div_elements_visible" style="width:98%;background:lightblue;margin-top:1px;">
						<span style="float:left;"> Going To: </span>									
						<span style="float:right;"> <select name="drpDestination_Car" id="drpDestination_Car" onChange="validatesrc();" class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpDestination_Car');" onmouseout="txtbox_color_onmouseout('drpDestination_Car');">
					<option value="0"> --Destination Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
					  </div>
					  <div class="div_elements_visible">
					   <span style="float:left;">
					   <input type="text" id="txtpick_Car" width="190px" value="Type Ur Landmark" class="div_elements_visibile" onClick="errasepick();" onMouseOver="txtbox_color_onmouseover('txtpick_Car');" onMouseOut="txtbox_color_onmouseout('txtpick_Car');"></span>
					   <span style="float:none; width:auto;">
					   <select id="drpPickTime_Car" name="drpPickTime_Car" class="div_elements_visibile" style="width:110px;" onmouseover="txtbox_color_onmouseover('drpPickTime_Car');" onmouseout="txtbox_color_onmouseout('drpPickTime_Car');"> 
						<option> Pick Up Time</option>
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
					  </div>
					 
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					<span style="margin-right:50px;"> Departure Date:</span>
					<span>Return Date: </span>
					</div>
					<div class="div_elements_visible" style="width:98%;background:lightblue;margin-top:1px;">					
					<span style="margin-right:50px;"><input type="text" id="frmDate_Car" class="txtbox" onClick="oDP.show(event,'frmDate_Car',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('frmDate_Car');" onMouseOut="txtbox_color_onmouseout('frmDate_Car');"></span>
					<span><input type="text" id="returnDate_Car"  disabled class="txtbox" style="background:grey;" onClick="oDP.show(event,'returnDate_Car',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Car');" onMouseOut="txtbox_color_onmouseout('returnDate_Car');"></span>
				     </div>
					  
					  <div class="div_elements_visible">
					   <span style="float:left;"> Type of Car:</span>
					   <span style="float:left;">
					    <select style="width:150px;" class="div_elements_visibile" id="drpCarType" onmouseover="txtbox_color_onmouseover('drpCarType');" onmouseout="txtbox_color_onmouseout('drpCarType');">
					<option>----Select Car---</option>
					<option> Alto </option>
					<option> Innova </option>
					<option> Xylo </option>
					<option> Qualis </option>
					<option> Mercedes </option>
					<option>  Mini Tempo</option>
					
				    </select>
					   </span>
					  </div>	
					  
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					    <span style="float:left;"> Seats: 
						<select id="drpSeats" class="div_elements_visibile" style="width:80px;" name="drpSeats" onmouseover="txtbox_color_onmouseover('drpSeats');" onmouseout="txtbox_color_onmouseout('drpSeats');">
					   <option> -Seats-</option>
				    	   <option> 4</option>
					    <option>6</option>
					   <option>8</option>
					</select> 
					</span>&nbsp;
					<span>
					<select id="drpDist" class="div_elements_visibile" style="width:80px;" name="drpDist" onmouseover="txtbox_color_onmouseover('drpDist');" onmouseout="txtbox_color_onmouseout('drpDist');">
						<option>-Rs/Km-</option>
						<option> 9.00</option>
						<option> 9.50 </option>
						<option> 11.00 </option>
						<option> 12.00</option>
						<option> 13.00</option>
					</select> 
					</span>
					  </div>	
					  
					  <div class="div_elements_visible" style="width:98%;background:lightblue;">
					<!---  <span> Email ID:</span>
					  <span>
					<input type="text" id="txtemail" value="Type Your Email Id" class="txtbox" style="color:grey;width:200px; font-family:calibri;" onclick="errase();" onMouseOut="checkEmail();">
					  </span> --->
					  </div>
					  <div class="div_elements_visible" style="float:left;"> <div class="smallbtn" id="searchCar" onClick="validate();" onMouseOver="change_color('searchCar');" onMouseOut="change_back('searchCar');" style="-moz-font-size:5px;-webkit-font-size:5px;font-size:15px;width:110px;height:20px;  box-shadow: 2px 2px 0px 0px grey;"><a href="#" style="text-decoration:none;color:#FFFFFF;">Search Cars </a></div>	</div>	
				   </div>
				   
				   <div id="div_bus" class="div_btn_TravelVehicle">
				    <div class="div_elements_visible">
					   <span ><input type="radio" name="rdways_Bus" id="rdOneway_Bus" value="Oneway" checked="checked" onClick="oneWay_Journey('rdOneway_Bus','returnDate_Bus');" > OneWay </span>
					   <span ><input type="radio" name="rdways_Bus" id="rdReturn_Bus" value="Return" onClick="return_journey('rdReturn_Bus','returnDate_Bus');"> Return
					   </span></div>
					  <div class="div_elements_visible" style="width:98%;background:lightblue; margin-bottom:0px;">
					    <span style="float:left;"> I am at: </span>
						<span style="float:right;">
						 <select name="drpSource_Bus" id="drpSource_Bus" onChange="validatesrc();" class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpSource_Bus');" onmouseout="txtbox_color_onmouseout('drpSource_Bus');">
						 <option value="0"> --Boarding Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
				     </div>  
						
						<div class="div_elements_visible" style="width:98%;background:lightblue; margin-top:1px;">
						<span style="float:left;"> Going To: </span>									
						<span style="float:right;">
						 <select name="drpDestination_Bus" id="drpDestination_Bus" onChange="validatesrc();" class="div_elements_visibile" style="background:white;" onmouseover="txtbox_color_onmouseover('drpDestination_Bus');" onmouseout="txtbox_color_onmouseout('drpDestination_Bus');">
						<option value="0"> --Destination Point-- </option>
					<option> Bangalore </option>
					<option> Delhi </option>
					<option> Hyderabad</option>
					<option> Chennai </option>
					<option> Kolkatta </option>
					<option> Ahemdabad </option>
					</select> </span>
					  </div>
					  <div class="div_elements_visible">
					   <span style="float:left;">
					   <input type="text" id="txtpick_Bus" width="300px" class="div_elements_visibile" value="Type Ur Landmark" onClick="errasepick();" onMouseOver="txtbox_color_onmouseover('txtpick_Bus');" onMouseOut="txtbox_color_onmouseout('txtpick_Bus');"></span>
					   <span style="float:left;">
					   <select id="drpPickTime_Bus" name="drpPickTime_Bus" style="width:110px;" class="div_elements_visibile" onmouseover="txtbox_color_onmouseover('drpPickTime_Bus');" onmouseout="txtbox_color_onmouseout('drpPickTime_Bus');"> 
						<option> Pick Up Time</option>
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
					  </div>
					 
					  <div class="div_elements_visible" style="width:98%;background:lightblue;margin-bottom:0px;">
					<span style="margin-right:50px;"> Departure Date:</span>
					<span>Return Date: </span>
					</div>
					<div class="div_elements_visible" style="width:98%;background:lightblue;margin-top:1px;">					
					<span style="margin-right:50px;"><input type="text" id="frmDate_Bus" class="txtbox" onClick="oDP.show(event,'frmDate_Bus',2); ShowContent('datepicker');" onMouseOver="txtbox_color_onmouseover('frmDate_Bus');" onMouseOut="txtbox_color_onmouseout('frmDate_Bus');"></span>
					<span><input type="text" id="returnDate_Bus" disabled class="txtbox" style="background:grey;" onClick="oDP.show(event,'returnDate_Bus',2); ShowContent('datepicker'); validateDestination();" onMouseOver="txtbox_color_onmouseover('returnDate_Bus');" onMouseOut="txtbox_color_onmouseout('returnDate_Bus');"></span>
				     </div>
					  
					  <div class="div_elements_visible">
					   <span> Bus Type:</span>
					   <span>
					  <select class="txtbox" id="drpBusType" name="drpBusType" style="width:180px; height:22px; background:#fff;" onmouseover="txtbox_color_onmouseover('drpBusType');" onmouseout="txtbox_color_onmouseout('drpBusType');">
					<option>----Select Bus---</option>
					<option> VRL (sleeper) </option>
					<option> SRS (semi-sleeper) </option>
					<option> AC Vovlo (semi-sleeper)</option>
					<option> Non-Ac (Seater) </option>				
				    </select>
					   </span>
					  </div>	
					  
				  
					  <div class="div_elements_visible" style="width:98%;background:lightblue;">
					<!---  <span> Email ID:</span>
					  <span>
					<input type="text" id="txtemail" value="Type Your Email Id" class="txtbox" style="color:grey;width:200px; font-family:calibri;" onclick="errase();" onMouseOut="checkEmail();">
					  </span>  --->
					  </div>
					  <div class="div_elements_visible" style="float:left;"> <div class="smallbtn" id="searchBus" onClick="validate();" onMouseOver="change_color('searchBus');" onMouseMove="change_color('searchBus');" style="-moz-font-size:5px;-webkit-font-size:5px;font-size:15px;width:110px;height:20px; box-shadow: 2px 2px 0px 0px grey;"><a href="#" style="text-decoration:none;color:#FFFFFF;">Search Buses</a></div>	</div>	
				   </div>
				     
			     </div>
                
				</span>
				   
				   </div>
				  		
<div style="visibility: visible; position: absolute; left: 0x; top: 0px; display: none; z-index: 100000;" id="datepicker"></div>			
<script>
	       	var oDP = new datePicker("datepicker");
	      </script>				

</div>
</body>
</form>
</html>
