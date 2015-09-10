<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Password Reset</title>
<link rel="stylesheet" type="text/css" href="Stylesheets/ExploreStyles.css" />

</head>

<form id="frm" method="post">
<body>

<?php 
include("PHP_Files/PHP_Connection.php");
include("PHP_Files/b2c_cust.php");
 ?>

<div id="master_container">

	<div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 		<div id="header_rightbtn">
    			
	    		   <a href="#" style="text-decoration:none;" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">
			  <span id="btnCustomer" class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px grey; margin-right:3px; margin-bottom:2px; background:#F5F5F5; color:#B22222;">24x7 Support</span></a>
			  			
			   <span id="btnRegister" class="smallbtn" style="width:70px; box-shadow:2px 1px 2px 1px grey; margin-right:3px;">Register</span>
			   
			   <span id="btnLogin" class="smallbtn" style="width:60px; box-shadow:2px 1px 2px 1px grey; margin-right:3px;">Login</span>         </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
	</div>	 
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:9px;"></div>	
</div>

<div style="float:left; width:100%;">
 <span style="float:left; margin-left:10px;">
 Welcome  <?php if(isset($_GET["emlID"]))  echo $_GET["emlID"];   ?>
 </span>
</div>
    
	<div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:100px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>
	     </div>
		 
</div>

<div id="body_container" style="overflow:hidden;">

   <table class="font-medium" style="width:50%; height:100px; margin-top:50px;" cellpadding="2" cellspacing="0">
     <tr>
	   <th align="right">Enter UserName</th>
	   <th><input type="text" id="txtID_client" name="txtID_client" class="txtbox_Tab" /></th>
	   </tr>
	   <tr>
	   <th align="right">Enter Password</th>
	   <th><input type="password" id="txtPwd_client" name="txtPwd_client" class="txtbox_Tab"  /></th>
	   </tr>
	   <tr>
	   <th align="right">Confirm Password</th>
	   <th><input type="password" id="txtc_pwd" name="txtc_pwd" class="txtbox_Tab"  /></th>
	   </tr>
	   <th colspan="2" align="right">
	   <input type="submit" id="btnReset_pwd" name="btnReset_pwd" class="smallbtn" style="width:70px; height:23px; font-size:16px; float:none;" value="Submit" onclick="show_hi();" /></th>
	 </tr>
   </table>

</div>

</body>
</form>
</html>
