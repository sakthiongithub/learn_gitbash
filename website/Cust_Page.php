<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  --->
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Customer Login</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<link rel="stylesheet" href="Stylesheets/Cust_PageStyles.css" type="text/css" />
<link rel="stylesheet" href="Stylesheets/B2bLoginStyles.css" type="text/css"  />
<link rel="stylesheet" href="Stylesheets/CalendarStyles.css" type="text/css"  />
<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css" />

<script src="Javascript/createPackScript.js" language="javascript" type="text/javascript"></script>                                            
<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
<script src="Javascript/slideshow.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/validations.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/Visibility.js" language="Javascript" type="text/javascript"></script>  
<script src="Javascript/Javascript_Codes.js" language="Javascript" type="text/javascript"></script> 
<script src="Javascript/CalendarScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/context.js" language="javascript" type="text/javascript"></script> 
<script src="Javascript/myHolidayScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/Calendar_SavedHol_Script.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/LandPage_CalScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/custPage_Script.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>	
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="Javascript/PckToolAjax.js"></script>

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
	
<script type="text/javascript">		
		var cX = 0; var cY = 0; var rX = 0; var rY = 0;
function UpdateCursorPosition(e){ cX = e.pageX; cY = e.pageY;}
function UpdateCursorPositionDocAll(e){ cX = event.clientX; cY = event.clientY;}
if(document.all) { document.onmousemove = UpdateCursorPositionDocAll; }
else { document.onmousemove = UpdateCursorPosition; }
function AssignPosition1(d) {
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
d.style.left = (cX-280) + "px";
d.style.top = (cY-160) + "px";
}
function HideContent_Cal(d) {
if(d.length < 1) { return; }
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition1(dd);
dd.style.display = "block";
}
</script>    
		
</head>

<?php include("PHP_Files/PHP_Connection.php"); ?>
	
<?php
$expl = false;
$post_log= false;

if(isset($_GET['email']) && isset($_GET['secure']))
{
 if($_GET['email'] !="" && $_GET['secure'] == true)
 {
  $_SESSION['userEmail'] = $_GET['email'];
  $post_log= true;
 }
}

include("PHP_Files/b2c_cust.php");
if(isset( $_POST["txtWLID"]))
$_SESSION["WLID"] = $_POST["txtWLID"];

if(isset($_GET["login"]))
$login = $_GET["login"];

?>

<?php
if(isset($_SESSION["userEmail"]))
{
$q_getEml = "select user_email, client_id from user_tab where user_id='".$_SESSION["userEmail"]."'";
$res_getEml = mysqli_query($conn,$q_getEml);
$res_num_eml = mysqli_num_rows($res_getEml);
if($res_num_eml>0)
{
while($row = mysqli_fetch_array($res_getEml))
{
 $_SESSION["clientID"] = $row["client_id"];
 echo $_SESSION["clientID"];
 }
}
else
{
$q_Eml = "select user_email, client_id from user_tab where user_email='".$_SESSION["userEmail"]."'";
$res_Eml = mysqli_query($conn,$q_Eml);
while($row = mysqli_fetch_array($res_Eml))
{
 $_SESSION["clientID"] = $row["client_id"];
 }
}
}
?>

<form method="post" >
<body id="body" onLoad="change_blog_bg();">
<span id="sp_id" style="float:left; display:none;"><?php echo $_SESSION["clientID"]; ?></span>	
	<div style="visibility: visible; width:auto; position: absolute; z-index: 100000;" id="Calendar"></div>
         <script>
	       	var oDP = new datePicker("Calendar");
	      </script>
 
  <div id="div_hdr_ftr">
  
   <div id="fixedHeader">   
 		<div id="headerTemplates"> 
			
			<span id="headerLogo" style="float:left; width:16%;">
			   <div style="float:left; width:100%">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="200px" height="47px" style="border-style:none;"/></span></a>
			  </div>
			 
			   <div style="float:left; width:100%;">
			        <span id="header_rightbtn" style="float:left;">	
			     <div class="font-medium" style="color:#555; margin-left:3px; margin-top:2px; font-size:14;">
     		    <span  <?php if($post_log == true){?>style="float:left; display:block;"<?php } else{?> style="display:none;" <?php } ?>>Welcome <span id="sp_user"><?php if(isset( $_SESSION["userEmail"])) echo  $_SESSION["userEmail"]; ?> </span></span></div>							
                 </span>
			 </div>   
		    </span>
	
		    <span id="header_CenterSpace" <?php if($post_log == true){?> style="display:block;"<?php } else if($post_log == false) {?> style="display:none;"<?php }?>>
			    
				 <div id="div_topBtns" style="width:100%; height:65px; background:#597272; position:relative; margin-top:7px; border-radius:3px; z-index:0;">
			     	 <div style="width:100%; margin-left:50px; z-index:0;">
					 
					 <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myTop20" class="top_headBtns"  onclick="show_section('div_myTop10','div_myTransactions','div_myProfile','div_myTripBlogs','div_support','div_myTripPic','div_myForum','div_myCredit','div_myHolidays'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myTop20','btn_myPrf','btn_myTrans','btn_myForum','btn_myHolidays','btn_myTripblogs','btn_support','btn_myTripPics','btn_myCredits');">My Top10</div></span>
						</span>
						
				     <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myHolidays" class="top_headBtns" onClick="show_section('div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_myTripBlogs','div_support','div_myTripPic','div_myForum','div_myCredit'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myHolidays','btn_myPrf','btn_myTrans','btn_myForum','btn_myTop20','btn_myTripblogs','btn_support','btn_myTripPics','btn_myCredits');no_color_home();">My Holidays</div></span>
						</span>
						
					  <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myTripblogs" class="top_headBtns" onClick="show_section('div_myTripBlogs','div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_support','div_myTripPic','div_myForum','div_myCredit'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myTripblogs','btn_myPrf','btn_myForum','btn_myTrans','btn_myTop20','btn_myHolidays','btn_support','btn_myTripPics','btn_myCredits');no_color_home();">My Trip Blogs</div></span>
						</span>
					
					 <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myForum" class="top_headBtns" onClick="show_section('div_myForum','div_myCredit','div_support','div_myTripBlogs','div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_myTripPic'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myForum','btn_myCredits','btn_myPrf','btn_myTrans','btn_myTop20','btn_myHolidays','btn_myTripblogs','btn_support','btn_myTripPics');no_color_home();">My Forum</div></span>
						</span>		
						
					  <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myCredits" class="top_headBtns" onClick="show_section('div_myCredit','div_myTripPic','div_support','div_myTripBlogs','div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_myForum'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myCredits','btn_myTripPics','btn_myForum','btn_myPrf','btn_myTrans','btn_myTop20','btn_myHolidays','btn_myTripblogs','btn_support');no_color_home();">My Credit Points</div></span>
						</span>	
						
					  <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myTrans" class="top_headBtns" onClick="show_section('div_myTransactions','div_myProfile','div_myTop10','div_myTripBlogs','div_support','div_myTripPic','div_myForum','div_myCredit','div_myHolidays'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myTrans','btn_myPrf','btn_myTop20','btn_myForum','btn_myHolidays','btn_myTripblogs','btn_support','btn_myTripPics','btn_myCredits');no_color_home();">My Transactions</div></span>
						</span>	
						
					  <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_myTripPics" class="top_headBtns" onClick="show_section('div_myTripPic','div_support','div_myTripBlogs','div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_myForum','div_myCredit'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myTripPics','btn_myForum','btn_myPrf','btn_myTrans','btn_myTop20','btn_myHolidays','btn_myTripblogs','btn_support','btn_myCredits');no_color_home();">My Trip Pictures</div></span>
						</span>	
					 
				    <span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
			<div id="btn_myPrf" class="top_headBtns" onClick="show_section('div_myProfile','div_myTransactions','div_myTop10','div_myTripBlogs','div_support','div_myTripPic','div_myForum','div_myCredit','div_myHolidays'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_myPrf','btn_myTrans','btn_myTop20','btn_myForum','btn_myHolidays','btn_myTripblogs','btn_support','btn_myTripPics','btn_myCredits');no_color_home();">My Profile</div></span>
						</span>	
						
						
						<span class="div_cust_hdrBtn" style="width:15%;text-align:left;">
						 <span style="float:left;">
						 <div id="btn_support" class="top_headBtns" onClick="show_section('div_support','div_myTripBlogs','div_myHolidays','div_myTop10','div_myTransactions','div_myProfile','div_myTripPic','div_myForum','div_myCredit'); hide_block('div_homeSection'); show_block('hdr_Page'); btn_clr('btn_support','btn_myPrf','btn_myForum','btn_myTrans','btn_myTop20','btn_myHolidays','btn_myTripblogs','btn_myTripPics','btn_myCredits');no_color_home();">Support</div></span>
						</span>
						

							
						
											
					 </div>
					</div> 
				
				<!--------      Alert Section Comment       ----------->
				<div id="div_ads" style="width:850px; height:60px; background:#FFFDCC; margin-top:2px; display:block; width:100%; float:left; display:none;">
				  <div  style="width:100%; float:left;">
				  <span style="float:right; margin-right:10px;">
				  <a href="#" onClick="hide_block('div_ads'); resize_topBtn();"><img src="Images/cancelbtn1.png" width="10px" height="10px" /></a></span>
				  </div>
				  <div align="center" style="width:100%; float:left;"><span class="font-medium" style="float:none;">Alert Section.... Offers for me!!</span></div>
				</div>					 
					 
			</span>
			
			<span id="log_btn" <?php if($post_log == false){ ?>  style="float:right; margin-right:10px; width:12%; display:block;" <?php } else { ?> style="float:left; display:none;" <?php } ?>>
			    <span style="float:right;"><input type="button" value="Login" class="smallbtn" style="width:60px;" onClick="show_block('div_cust_login'); hide_block('div_cust_reg');" /></span>
				<span style="float:right;"><input type="button" value="Register" class="smallbtn" style="width:60px;" onClick="show_block('div_cust_reg'); hide_block('div_cust_login');" /></span>
			   </span>	
			
		</div>	
 	</div>	 

    <div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	

	<div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();">
	<span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	
	</div>
	
<div id="div_body" style="width:100%; float:left;">	

<div id="div_cust_reg" <?php if($post_log == true){?> style="display:none;"<?php } else if ($_GET["status"] == "Register"){?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>

<div style="float:left; width:100%;">
  <span style="float:right; margin-right:5px;"><img src="Images/cancelbtn1.png" width="25px" height="25px" onClick="hide_block('div_cust_reg');" /></span>
</div>

<div style="float:left; width:100%; margin-left:5px;">
  <span style="float:left;" class="font-medium">Enter your email-id</span>
  <span style="float:left;margin-left:5px;"><input type="text" class="txtbox_Tab" id="txtReg_email" name="txtReg_email" /></span>
  <span style="float:left; margin-left:5px;"><input type="submit" id="btnReg_eml" name="btnReg_eml" class="smallbtn" style="width:50px; height:22px;" /></span>
</div>

</div>

<div id="div_reg_cmplt" <?php if($thnk_reg == true){?> style="display:block;"<?php } else {?> style="display:none;" <?php } ?>>
   <div style="float:left; width:100%;">
  <span style="float:right; margin-right:5px;">
  <img src="Images/cancelbtn.png" width="25px" height="25px" onClick="hide_block('div_reg_cmplt');" /></span>
</div>
<div style="float:left; width:100%;">
  <span style="float:left;" class="font-medium">Thank you for registering with us, <br/> we have sent a password reset link to the registered email-id.</span>
</div>
<div style="float:left; width:100%; margin-top:10px;" class="font-medium">
  <span style="float:left;">click on the below reset link to set your password</span>
</div>
<div style="float:left; ">
<span id="sp_lnk"  style="float:left; margin-left:10px; color:#0066ff; text-decoration:underline; font-size:14px; font-family:Calibri; cursor:pointer;" onClick="reset_pwd();">
<?php echo $lnk ;?></span></div>
</div>		
	
<div id="div_cust_login" <?php if($post_log == true){?> style="display:none;"<?php } else if (isset($_GET["status"])){ if($_GET["status"] == "Login"){?> style="display:block;" <?php } else {?> style="display:none;" <?php }} else {?> style="display:none;" <?php }?>>
	     <div>
	   <span style="float:right; margin-right:1px;">
	    <span onClick="hide_block('div_cust_login');">
		<img src="Images/closebtn.png" width="30px" height="30px"/></span></span>
	</div>	
    <div style="width:100%; margin:5px 5px 5px 30px; float:left;">
		   <table class="font-medium">
		     <tr>
			   <td>Login Id</td>
			   <td>:</td>
			   <td><input id="txtLogId_b2c" name="txtLogId_b2c" type="text" class="txtbox_Tab" style="width:200px;"/></td>
			 </tr>
		     <tr>
			   <td>Password</td>
			   <td>:</td>
			   <td><input id="txtLogPwd_b2c" name="txtLogPwd_b2c" type="password" placeholder="123" class="txtbox_Tab" style="width:200px;" /></td>
			 </tr>
			 <tr>
			   <td colspan="3" align="left">
			   <span id="sp_login" style="float:left; cursor:pointer; font-size:12px; color:#0066ff; text-decoration:underline;" onClick="reset_pwd_sus();"><?php echo $reset; ?></span>
	            <input type="submit" name="b2CLogin" id="b2CLogin" value="Login" class="smallbtn" style="width:60px; height:22px; float:right;" /></td>
			 </tr>
			 <tr><td colspan="3"></td></tr>
	       </table>
		</div> 
	</div>


<div id="div_wl_dtl" style="float:left; width:60%; height:auto; margin:15%;
 margin-left:30%; display:none; position:absolute; z-index:100000; background:#fff; border:1px solid #555;">
</div>


<div id="div_reg_cmplt" <?php if($thnk_reg == true){?> style="display:block;"<?php } else {?> style="display:none;" <?php } ?>>
   <div style="float:left; width:100%;">
  <span style="float:right; margin-right:5px;">
  <img src="Images/cancelbtn.png" width="25px" height="25px" onClick="hide_block('div_reg_cmplt');" /></span>
</div>
<div style="float:left; width:100%;">
  <span style="float:left;" class="font-medium"> This email id exists with us, we have sent a password reset link to the registered email-id.</span>
</div>
<div style="float:left; width:100%; margin-top:10px;" class="font-medium">
  <span style="float:left;">click on the below reset link to set your password</span>
</div>
<div style="float:left; ">
<span id="sp_lnk"  style="float:left; margin-left:10px; color:#0066ff; text-decoration:underline; font-size:14px; font-family:Calibri; cursor:pointer;" onClick="reset_pwd();">
<?php echo $lnk ;?></span></div>
</div>	



<!----------------------------------------------------- Response Details Pop UP ---------------------------------------------------------------------------------------> 
 <div id="dtls_response" class="popUp_imgs_div" style="width:900px; height:500px; overflow-y:scroll; overflow-x:hidden;">
 <div style="float:left; width:100%;">
  <span style="float:right;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block('dtls_response');" /></span>
 </div> 
 
 </div>
 

<div id="div_cust_page" <?php if($post_log == true){?> style="display:block;"<?php } else if($post_log == false) {?> style="display:none;"<?php }?>>		
	
<div align="center" style="position:relative; float:left; background:#597272; margin-top:1px; width:100%;">
  
   <span style="float:left; width:10%;">          
      <div style="float:left; width:100%; margin-top:6px; margin-left:5px;">
	 			<span style="float:left;"><div class="smallbtn"  style="width:50px; font-size:11px; margin-left:2px; background:#F5F5F5; color:#444;">Settings</div></span>
	   			<span style="float:left;">
<input type="submit" id="b2c_logout" name="b2c_logout" class="smallbtn"  style="width:50px; font-size:11px; margin-left:2px; background:#F5F5F5; color:#444;" value="Logout" />
				</span>	  
  				</div>
    </span>
	
 <span style="float:left; width:80%;">      
	     <div id="body_header_btn" style="position:relative; background:#597272; margin-top:1px; width:945px; text-align:center; color:#002929; height:10px;">		 
				   
			   <span style="width:32%;float:left;">
				<div id="div_PlanTrip" align="right" class="div_hdrbtns_cust" style="height:12px; margin-top:6px; height:7px;  cursor:pointer;" onClick="  show_block('block1'); change_bgcolor_cust('sp_PlanTrip','sp_Explore','div_Book');  show_block('div_homeSection');  hide_block('div_BookTravel'); hide_block('block2'); hide_block('hdr_Page'); no_color_section();" onDblClick="hide_block('block1');">
	<span id="sp_PlanTrip" class="headingFont" style="margin-right:60px; text-shadow:1px 1px 1px #002929; margin-top:3px; font-size:14px;"> PLAN YOUR TRIP</span></div></span> 
			    			
				<span style="width:32.5%;float:left; margin-left:10px;">
						<div id="div_Explore" align="right" class="div_hdrbtns_cust" style="height:12px; margin-top:6px; height:7px; color:#fff; cursor:pointer;" onClick=" show_block('block2');  hide_block('div_BookTravel'); hide_block('block1'); change_bgcolor_cust('sp_Explore','sp_PlanTrip','div_Book'); show_block('div_homeSection');  hide_block('hdr_Page'); no_color_section();"  onDblClick="hide_block('block2');">
				<span id="sp_Explore" class="headingFont" style="margin-right:50px; text-shadow:1px 1px 1px #002929; margin-top:3px;  font-size:14px;"> EXPLORE DESTINATION </span>
			   </div></span>
				 
				 <span style="width:30.5%;float:left;">
				<div id="div_Book" align="center" class="div_hdrbtns_cust" style="height:12px;margin-top:6px; height:7px; border-right:0px; color:#fff; cursor:pointer;" onDblClick="hide_block('div_BookTravel');" onClick=" show_block('div_BookTravel');  hide_block('block2'); hide_block('block1'); book_online();">
				<span class="headingFont" style="margin-top:3px;  font-size:14px;">  BOOK ONLINE </span></div></span>	
		</div> 
  </span>

</div>

<span style="width:10%; float:left">
<div class="font-medium" style="width:100%; font-size:12; float:left"><span id="sp_lastLog"  style="float:left;">Last login &nbsp;</span></div>	
</span>

<span id="sp_cls_btn" style="width:10%; float:right; display:none;">
<div class="font-medium" style="width:100%; font-size:12; float:left; cursor:pointer;" onClick="hide_block('iframe1'); hide_block('iframe2'); show_block('div_body'); show_block('div_hdr_ftr'); page_reload();">
<img src="Images/cancelbtn.png" width="40px" height="40px"  /></div>	
</span>

<div id="body_container">

    <div id="add_my_topic" style="width:550px; height:210px; background:#fff; border:1px solid grey; position:absolute; z-index:100; top:150px; left:100px; display:none;">
   <div style="float:left; width:100%;">
     <span style="float:right; margin-right:3px; margin-top:3px; cursor:pointer;" onClick="hide_block('add_my_topic');">
	 <img src="Images/closeBtn.png" width="30px" height="30px" /></span>
   </div>
   <div id="txtcmt" style="float:left; width:100%">
       <div style="float:left; text-align:center; width:100%">
	   <span style="font-size:18px; float:left; margin-left:5px; font-family:'Lucida Handwriting'">Forum</span>
	   <span style="font-size:18px;  float:left; margin-left:30px; color:#b22; font-family:'Lucida Handwriting'">Adventure</span>
	   </div>
		<div style="float:left; width:100%; margin-top:10px;">
		<span style="float:left; font-size:18px; margin-left:5px; font-family:'Lucida Handwriting'">Name</span>
	    <span id="sp_frm_name" style="float:left; margin-left:30px; color:#b22; font-size:18px; font-family:'Lucida Handwriting'">Abc<span>
		</div>
		<div style="float:left; width:100%; margin-top:10px;">
	   <span style="float:left; font-size:18px; margin-left:5px; font-family:'Lucida Handwriting'">Discussion Topic</span>
	    <span style="float:left; font-size:18px; margin-left:10px; color:#b22; font-family:'Lucida Handwriting'">
		<textarea id="txtA_topic" style="width:350px; height:50px; background:#eee;"></textarea></span>
		</div>
		<div style="float:left; width:100%;"><span style="float:right; margin-right:20px;">
		<div class="smallbtn" style="width:80px;" onClick="add_to_topics_adv(); hide_block('add_my_topic');">Submit</div></span></div>
   </div>
</div>

    <div id="creditCard">
<div id="icici_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/icici_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	   <ul>
	  <li> Credit card offers 5% OFF on purchase of 4000 INR</li>
	  <li> Earn Cash back of 300 INR on purchase of 5000 INR and above</li>
	  </ul>
	</div>
</div>
   
<div id="icici_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/icici_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 600 INR on purchase of 7000 INR and above</li>
	   </ul>
	</div>
</div>

<div id="axis_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/axis_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card offers 4% OFF on purchase of 4000 INR</li>
	   <li>Earn Cash back of 450 INR on purchase of 5000 INR and above</li>
	   </ul>
	</div>
</div>
   
<div id="axis_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/axis_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 600 INR on purchase of 5200 INR and above</li>
	   </ul>
	</div>
</div>

<div id="sbi_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/sbi_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>
   
<div id="sbi_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/sbi_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	   <span>To be Uploaded</span>
	   <span></span>
	</div>
</div>

<div id="hdfc_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 1px 10px; float:none;"><img src="Images/BankCreditCards/hdfc_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>
   
<div id="hdfc_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/hdfc_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	    <span>To be Uploaded</span>
	   <span></span>
	</div>
</div>

<div id="hsbc_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/hsbc_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>

<div id="hsbc_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/hsbc_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	   <span>To be Uploaded</span>
	   <span></span>
	</div>
</div>

<div id="citi_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/citi_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>

<div id="citi_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/citi_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	    <span>To be Uploaded</span>
	   <span></span>
	</div>
</div>
   
<div id="km_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/kotak_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>

<div id="km_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/kotak_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	   <span>To be Uploaded</span>
	   <span></span>
	</div>
</div>  

<div id="canara_pop_curr" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/canara_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	<ul>
	   <li>Credit card EMI of 6 months with 0% interest</li>
	   <li>Earn Cash back of 300 INR on purchase of 6000 INR and above</li>
	   </ul>
	</div>
</div>

<div id="canara_pop_upcmg" class="div_pop_offers">
<div style="width:100%; text-align:center;">
  <span class="font-medium" style="padding:5px 10px 2px 10px; float:none;"><img src="Images/BankCreditCards/canara_logo.jpg" width="160px" height="30px" /></span>
</div>
    <div style="padding:0px 5px 5px 5px; text-align:left;">
	    <span>To be Uploaded</span>
	   <span></span>
	</div>
</div> 
</div> 
  
   	<div id="div_greyBack"
style="width:100%;
height:680px;
background: grey;
opacity:0.8;
display:none;
position:absolute;
z-index:10;
margin:0% 0% 0% 0%;">
</div>
 
    <div id="div_imgDesc" style="float:left; display:none; width:100%; height:500px; position:absolute; opacity:0.8; top:80px; background:#fff; box-shadow:2px 2px 2px grey; z-index:1000;">
			       <div style="float:left; width:100%">
				  <span style="float:right; margin-right:10px;" onClick="hide_block('div_imgDesc'); hide_block('div_greyBack');">
				  <img src="Images/cancelbtn.png" width="30px" height="30px" /></span>
				  </div>
				  
				  <div style="float:left; width:100%; position:relative">				      
				     <span style="float:left;width:10%; margin-top:100px; cursor:pointer">
				    <div onClick="backward();"><img src="Images/scrollLeft.png" width="50px" height="55px"></div>
				  </span>
				  
				     <span style="float:left;width:75%; text-align:center">
				     <div align="center"><img id="imgScroll" src="Images/City_Images/CityScape_Bangalore/alianceFrancaise_cultural_blr.png" width="600px" height="350px"></div>	
					  <div align="center" style="width:100%; height:50px; margin-top:20px;">
					   <span style="float:left; margin-left:100px;"><textarea id="txtAcmt" style="width:410px; height:80px;"></textarea></span>
					  <span style="float:right; margin-top:60px;"><div class="smallbtn" style="width:80px">Comment</div></span>
					 </div>				
				  </span>
				  
				     <span style="float:left;width:10%;  margin-top:100px; cursor:pointer">
				    <div  onClick="forwards();"><img src="Images/scrollRight.png" width="50px" height="55px"></div>
				  </span>					 
				  </div>				
			</div>  
   
    <div id="div_travelDates"
style="display:none;
   background:white;
   box-shadow: 2px 0px 6px grey;
   width:60%; 
   opacity:0.9;
   height:auto;  
   border-radius:10px;
  margin:18% 0 0 10%;
  position:absolute;
  text-align:center;
  z-index:100000;">

	<div style="width:100%; position:relative;"> 
<span style="margin:10px 2px 0px 2px; font-size:22px; color:DarkSlateGray;">
Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
</div>
<div style="width:100%; position:relative; float:left;">
<span style="width:50%; float:left; margin-top:5%;">
<div style="margin-bottom:20px;">
   <span style="font-size:24px; margin-bottom:20px;">
       <span style="float:none;"><a href="#" style="text-decoration:none;" onClick="show_block('div_trvDate'); hide_block('div_sugstDates');">
	   <div style="width:145px; height:43px; font-weight:700; border-radius:5px; background:#283C5F; border:1px solid darkblue; box-shadow:2px 2px 6px grey; color:#FFFFFF; font-family:Georgia, Calibri; margin-left:120px; box-shadow: 2px 0px 8px 0px grey; font-size:16px;"> My travel dates are known</div></a></span>
    </span>
</div>
</span>
<span style="width:50%; float:left; margin-top:5%;">
<div>
<span style="float:left;" onClick=" show_block('div_greyBack');"><a href="#" style="text-decoration:none;" onClick="show_block('div_sugstDates'); hide_block('div_trvDate');">
<div style="width:140px;; height:43px; font-weight:700; border-radius:5px; background:red; border:1px solid OrangeRed; box-shadow:2px 2px 6px grey; margin-left:68px; color:#FFFFFF; font-family:Georgia,Calibri; box-shadow: 2px 0px 8px 0px grey; font-size:16px;">Just started planning</div></a></span>
</div> </span>
</div>

<div id="div_trvDate" style="display:none;width:100%; text-align:center; position:relative; margin-top:5px; margin-left:0px;">
			<span style="width:50%; margin-left:0px;">
			  <span class="div_elements" style="font-size:18px;">From</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtfrmDt" class="div_elements" style="width:115px; height:20px;"/></span>
			  <span class="div_elements"><a href="#" onClick="oDP.show(event,'txtfrmDt',2); ShowContent('Calendar');">
			  <img src="Images/calendar_icon.jpg" width="25px" height="25px"  style="margin-top:3px;"/></a></span> </span>
			  
			  <span style="margin-top:5px; width:50%; margin-left:10px">
			  <span class="div_elements" style="font-size:18px;">To</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtToDt" class="div_elements" style="width:115px; height:20px;" /></span>
			  <span class="div_elements"><a href="#" onClick="oDP.show(event,'txtToDt',2); ShowContent('Calendar');">
			  <img src="Images/calendar_icon.jpg" width="25px" height="25px" style="margin-top:3px;" /></a></span> </span>
				
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


<div id="div_event" class="div_context_win" style="margin-top:120px;">Click to add Event</div>
<div id="div_event_view" class="div_context_win" style="margin-top:120px;">Click to view Event</div>
<div id="queryResp_dtls" class="popUp_dest" style="width:600px; height:auto; padding:10px;"></div>

           <div id="div_body">
                    
			<div id="div_contentHolder" style="width:100%; float:left; height:600px; margin-bottom:5%;">
			  
			  <div id="div_homeSection">
		 
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
					<option value="10-15Days"> 10-15 Days </option>
					<option value="15-30Days"> 15-30 Days </option>
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
							 <input type="button" id="submitbtn" name="submitbtn" class="smallbtn" style="width:60px; height:22px; margin-right:5px; border:1px solid black; font-weight:600; font-size:15px; display:block;" onClick="sub_val_domes_secure('true');" value="Submit" />
								</span>
							</div>
							
				<div  id="div_confirmBtn_abr"  align="center" style="height:auto; color:#002929; width:100%; display:none; margin-left:10px; position:absolute; bottom:10px;">
		 						<span style="float:right;">
						 <div id="modifybtn_abr" class="smallbtn" style="width:60px; background:grey;  margin-right:15px;  height:22px; border:1px solid Darkgrey; font-weight:600; font-size:15px; display:block;" onClick="change_bg_inputs();"> Modify </div>
								</span>
								<span style="float:right;">							
							<input type="button" id="submitbtn_abr" name="submitbtn_abr" class="smallbtn" style="width:60px; height:22px;  margin-right:5px;  border:1px solid black; font-weight:600; font-size:15px; display:block;" onClick="sub_val_abr_secure('true');" value="Submit" />
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
					   <div class="smallbtn" id="btnSelect" style="font-size:16px; width:70px; margin-top:0px; padding-top:5px; font-weight:600; height:30px; box-shadow:1px 0px 6px 0px lightgrey;  background:red; border:1px solid grey;" onClick="insertQS_cust('true');">Explore</div> 
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
			  	
			<div id="div_BookTravel" class="BookTravel" >
						   
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
	<div  id="btnflight_L" onClick="btnflights_click(this.id,'btnhotel_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');" >Flights</div></span>
	
	<span class="font_medium" style="margin-left:10px;">
	<div id="btnhotel_L" onClick="btnhotel_click(this.id,'btnflight_L','btncar_L','btntrain_L','btnbus_L','btnpck_L');" > Hotels </div></span>
   
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
			     
				 	 <div id="div_flight" class="div_btn_TravelVehicle" >
				     
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
					 
					<div id="div_hotel" class="div_btn_TravelVehicle" >
									
				 	<table style="width:700px;"  cellpadding="5" cellspacing="2">
				
					    <tr>
						  <td align="right"><span class="font_medium" style="float:none;">Location:</span></td>
						  <td colspan="3" align="left"><span>
					   <select class="txtbox_trv_cust" id="drpNoDays" name="drpNoDays" style="height:30px;" onmouseover="txtbox_color_onmouseover('drpNoDays');" onmouseout="txtbox_color_onmouseout('drpNoDays');">
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
			
			<div id="hdr_Page"> 			  
	       
	          <div id="div_myHolidays" style="display:none; width:100%; height:830px; background:#F5F5F5;  margin-bottom:5%;">	
	           
			      <span style="width:18%; float:left;">
		        <div id="btn_div_myHolidays" class="arrow_box" style="width:130px; cursor:pointer;" onClick="show_MyHolidays();">
				<span style="float:left; margin:13px 0px 0px 1px; color:#FFF;">MY HOLIDAYS</span></div>
				
				<div id="btn_div_Holidays" class="arrow_act" style="width:130px; position:relative; cursor:pointer" onClick="show_holidays();">
				<span style="float:left;  margin:13px 0px 0px 1px; color:#FFF;">HOLIDAYS 2013</span></div>
				
				<div id="div_timelines" style="margin-top:30px; margin-left:5px; display:none; position:relative">
				<div style="width:150px; background:#555; float:left; height:20px;">
				<span class="font-medium" style="color:#FFF; padding:0px 2px 2px 10px;">By Timelines</span></div>
				   
				   <div style="width:100%; float:left;">
				      <table id="tab_fy_year" class="font-small" cellpadding="1px" cellspacing="0px" border="1px">
				   <tr>
				     <th>Finanical Year</th>
					 <th># of Holidays</th>
				   </tr>
				   <tr>
				     <td>FY 2012</td>
					 <td>3</td>
				   </tr>
				   <tr>
				     <td>FY 2013</td>
					 <td>10</td>
				   </tr>
				 </table>
				 </div>
				
				<div style="width:120px; background:#555; float:left; height:20px; margin-top:5px; cursor:pointer;">
				<span class="font-medium" style="color:#FFF;">By Events</span></div>
				    <div style="width:100%; float:left;">
					   <table class="font-small" cellpadding="1px" cellspacing="0px" border="1px">
					    <tr>
						  <th>Events</th>
						  <th># of Holidays</th>
						</tr>
						<tr>
						  <td>Birthdays</td>
						  <td>3</td>
						</tr>
						<tr>
						  <td>Anniversary</td>
						  <td>7</td>
						</tr>
					  </table>
				   </div>
				</div>
				
		     <div id="div_events"></div> 
				
	     		 <div id="div_dates_holiday" style="width:100%; display:block; float:left; margin-left:5px; margin-top:5px;">
				
				<div align="left" style="width:100%; float:left;">
				  <span class="font-small" style="color:#444;">Add your leave plans to calendar</span>
				</div>
				
				<div style="width:100%; float:left; margin-top:10px;">
				  <span class="font-small" style="color:#444;">From &nbsp;</span>
				  <span class="font-small" style="margin-left:2px; color:#444;">
				  <input type="text" class="txtbox_hol_ev" style="height:20px; width:75px;" value="23/10/2013" id="txt_frmLeave"  onClick="oDP.show(event,'txt_frmLeave',2); ShowContent('Calendar');" /></span>
				</div>
				
				<div style="width:100%; float:left; margin-top:6px;">
				 <span class="font-small" style="color:#444;">To</span>
				  <span class="font-small" style="margin-left:22px; color:#444;">
				  <input type="text" class="txtbox_hol_ev" style="height:20px; width:75px;" value="10/11/2013" id="txt_toLeave"  onClick="oDP.show(event,'txt_toLeave',2); ShowContent('Calendar');" /></span>
				</div>
				
				<div style="width:100%; float:left; margin-top:6px; margin-left:5px;">
				 <span class="font-small" style="color:#444;">Holiday Reasons</span>
				   <span style="float:left;"><select id="drpReason" class="font-small" style="color:#444; width:120px;">
				     <option>Birthday</option>
					 <option>Anniversary</option>
					 <option>Picnic</option>
					 <option>Family reunion</option>
				   </select>
				 </span>
				 <span style="float:left; margin-left:5px;">
				 <div id="btn_othr_hol" class="smallbtn" style="width:40px; font-size:10px;" onClick="show_block('div_oth_hol');">Others</div></span>
		<div id="div_oth_hol" style="width:100%; float:left; display:none; margin-top:5px;">
		  <input type="text" class="txtbox_hol_ev" id="txtOther_hol" style="margin-left:3px; float:left;" />
		  <div class="smallbtn" style="width:40px; font-size:10px;" onClick="add_othr_hol();">Add</div>
		</div>
				</div>
				
				<div align="center" style="float:left; width:100%;  margin-top:5px;">
				<span style="float:none; margin-left:30px;">
				<div id="btn_add_Cal" class="smallbtn" style="width:auto; height:auto; padding:0px 2px 0px 2px; cursor:pointer;" onClick="start_func();end_func();">Add to Calendar</div></span>
				</div>
				
				<!--<div style="float:left; width:100%;  margin-top:5px;">
				<span style="float:right; margin-right:80px;">
				<div id="btn_rmv_Cal" class="smallbtn" style="width:auto; padding:0px 2px 0px 2px; cursor:pointer">Remove from Calendar</div></span> 
									
				</div>  -->
				
				</div>
			   
			   </span>
			   
	          <span style="width:80%; float:left; margin-left:1px;">
			  
			     <div id="div_subHol_sec" style="float:left; width:100%; margin-top:12px; display:none;">
			     <span  style="float:left; margin-left:3px;">
				 <div id="btn_past_hol" class="smallbtn" style="width:130px; float:left; cursor:pointer;" onClick="show_block('div_add_past_events'); hide_block('div_add_events'); show_block('div_past_Holidays'); hide_block('div_up_Holidays'); change_bg('btn_past_hol','btn_upcmg_hol');">
				 <span>Past Holidays</span></div>
				 </span>
				 <span style="float:left; margin-left:10px;">
				 <div id="btn_upcmg_hol" class="smallbtn" style="width:130px; float:left; cursor:pointer;" onClick="show_block('div_add_events'); hide_block('div_add_past_events'); hide_block('div_past_Holidays'); show_block('div_up_Holidays'); change_bg('btn_upcmg_hol','btn_past_hol');">
				 <span>Upcoming Holidays</span></div>
				</span>
			  </div>
			  
			  <div style="visibility: visible; width:auto; margin-left:-250px; margin-top:0px; position: absolute; z-index: 100000;" id="Hol_End"></div>
	            <script> 	var oDP = new datePicker("Hol_End"); </script>
			  
			    <div id="div_add_events" style="width:100%; margin-top:5px; float:left; position:relative; background:#FFF; display:none; opacity:0.8;">
			  <div style="float:left; width:100%;">
			    <span style="float:right; margin-right:3px; cursor:pointer;" onClick="hide_block('div_add_events');">
                  <img src="Images/cancelbtn.png" width="35px" height="30px"  /></span>
  
			  <span style="float:right; margin-right:10px;">
			  <div class="smallbtn" style="width:40px; cursor:pointer" onClick="">Save</div>
			  </span>
           </div>	
             
			  <div style="width:100%; float:left; margin-top:0px; height:auto; max-height:200px; overflow:scroll;">
                <table id="tab_Events" class="font-small" style="width:auto; color:#444;">
	  <tr>
	  <th width="10px">#</th>
	    <th width="80px">Trip Objective</th>
		<th width="80px">Destination</th>
		<th width="80px">Travelled with</th>
		<th width="80px">Stayed at</th>
		<th width="80px">From </th>
		<th width="80px">To </th>		
		<th width="60px">Duration</th>			
		<th colspan="3"></th>
	  </tr>
	</table>

            </div>
           </div>

                <div id="div_add_past_events" style="width:100%; margin-top:5px; float:left; position:relative; background:#FFF; display:none; opacity:0.8;">
			  <div style="float:left; width:100%;">
			    <span style="float:right; margin-right:3px; cursor:pointer;" onClick="hide_block('div_add_past_events');">
                      <img src="Images/cancelbtn.png" width="35px" height="30px"  /></span>
  
			  <span style="float:right; margin-right:10px;">
			  <div class="smallbtn" style="width:40px; cursor:pointer" onClick="">Save</div>
			  </span>
           </div>

             <div style="width:100%; float:left; margin-top:0px; height:auto; max-height:200px; overflow:scroll;">
                    <table id="tab_Events_past" class="font-small" style="width:100%; color:#444; z-index:1000;">
	  <tr>
	  <th width="10px">#</th>
	    <th width="80px">Trip Objective</th>
		<th width="80px">Destination</th>
		<th width="80px">Travelled with</th>
		<th width="80px">Stayed at</th>
		<th width="80px">From </th>
		<th width="80px">To </th>		
		<th width="60px">Duration</th>			
		<th colspan="3"></th>
	  </tr>
	</table>

            </div>
      </div>	
			  
		   	    <div id="myHolDrp" style="float:right; width:100%; margin-top:5px; margin-left:40px; display:none">
			  <span class="font-medium" style="float:right; margin-right:35px;">
				  Show months &nbsp;<select id="drpHPlan" onChange="HPlan_mnths();">
				    <option>3</option>
					<option>6</option>
					<option>9</option>
					<option>12</option>
				  </select>
				</span></div>
  
                <div id="div_up_Holidays" style="width:100%; float:left; height:400px; overflow:scroll; display:none;">
  <div id="div_3mnths_plan" align="center" style="width:100%; float:left; margin-top:10px;">
 <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Oct2013();</script>
</span>
<span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Nov2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Dec2013();</script>
  </span>
  </div>
  
  <div id="div_6mnths_plan" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Jan2014();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Feb2014();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Mar2014();</script>
  </span>
  </div>
  
  <div id="div_9mnths_plan" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Apr2014();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">May2014();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Jun2014();</script>
  </span>
  </div>
  
  <div id="div_12mnths_plan" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Jul2014();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">Aug2014();</script>
  </span>
  <span style="float:left; width:32%; margin-left:3px;">
  <script type="text/javascript">Sept2014();</script>
  </span>
  </div>

</div>
 
                <div id="div_past_Holidays" style="width:100%; float:left; height:400px; overflow:scroll; display:none;">
  <div id="div_3mnths_plan_el" align="center" style="width:100%; float:left; margin-top:10px;">
 <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Oct2012();</script>
</span>
<span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Nov2012();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Dec2012();</script>
  </span>
  </div>
  
  <div id="div_6mnths_plan_el" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Jan2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Feb2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Mar2013();</script>
  </span>
  </div>
  
  <div id="div_9mnths_plan_el" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Apr2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_May2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Jun2013();</script>
  </span>
  </div>
  
  <div id="div_12mnths_plan_el" align="center" style="width:100%; float:left; margin-top:5px; display:none;">
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Jul2013();</script>
  </span>
  <span style="float:left; width:32%;  margin-left:3px;">
  <script type="text/javascript">EL_Aug2013();</script>
  </span>
  <span style="float:left; width:32%; margin-left:3px;">
  <script type="text/javascript">EL_Sept2013();</script>
  </span>
  </div>

</div>	

                <div id="div_holidays" style="width:100%; display:block; float:left; height:500px;">
			  
			       <div style="float:left; width:100%; margin-top:5px;">
				  <span class="font-medium" style="font-size:22px; color:#444;">View holidays, long weekends and add your leave plans</span>
				</div>
			  
			       <div style="float:left; width:100%; margin-top:5px;">	
	 
		<span class="font-medium" style="float:left; width:72%;">
		
		  <span class="font-medium" style="font-weight:500; color:#666;">Holiday</span>
		  <span class="font-medium" style="float:left;font-size:12px; margin-left:10px; margin-top:5px;">
		  <span style="float:left"><div style="width:20px; height:10px; border:1px solid #444; background:#FFA500;"></div></span>
		  <span style="float:left;">&nbsp; Public holidays</span></span>
		  
		  <span class="font-medium" style="float:left;font-size:12px;  margin-left:5px; margin-top:5px;">
		  <span style="float:left"><div style="width:20px; height:10px; border:1px solid #444; background:#FF0000;"></div></span>
		  <span style="float:left;">&nbsp; Extended Weekends</span></span>
		  
		  <span class="font-medium" style="float:left; font-size:12px;  margin-left:5px; margin-top:5px;">
		  <span style="float:left"><div style="width:20px; height:10px; border:1px solid #444; background:#87CEFA;"></div></span>
		  <span style="float:left;">&nbsp; Weekends</span></span> <br/>
	
	       <span class="font-medium" style="font-weight:500; color:#666;">Leave</span>
		  <span class="font-medium" style="float:left; font-size:12px; margin-top:5px;  margin-left:22px;">
		  <span style="float:left"><div style="width:20px; height:10px; border:1px solid #444; background:#90EE90;"></div></span>
		  <span style="float:left;">&nbsp; Suggested </span></span>
		  
		  <span class="font-medium" style="float:left; font-size:12px;  margin-left:5px; margin-top:5px;">
		  <span style="float:left"><div style="width:20px; height:10px; border:1px solid #444; background:#00008b;"></div></span>
		  <span style="float:left;">&nbsp; Planned</span></span>
		</span>
		
		<span class="font-medium" style="float:right; margin-top:20px;">
		<span class="font-medium" style="float:none; margin-top:5px;"> Display &nbsp;</span>
	      <span style="float:none;">
			<select id="drpMonths" class="font-medium" style="width:50px; height:22px; float:none;" onChange="selectMonths();">		
			<option>3M</option>		
			<option selected="selected">6M</option>			
			<option>9M</option>		
			<option>12M</option>
		</select></span>
			</span>
	 </div>	

                   <div style="float:left; width:100%;">		 
<div id="div_Context_oct2" class="div_context_win">Gandhi Jayanti</div>
<div id="div_Context_oct13" class="div_context_win">AyudhaPooja</div>
<div id="div_Context_oct14" class="div_context_win">Dasara</div>
<div id="div_Context_oct16" class="div_context_win">Bakarid</div>
<div id="div_Context_nov1" class="div_context_win">Karnataka Rajyotsava</div>
<div id="div_Context_nov4" class="div_context_win">Deepavali</div>
<div id="div_Context_nov14" class="div_context_win">Mohoram</div>
<div id="div_Context_nov17" class="div_context_win">Gurunanak Birthday</div>
<div id="div_Context_dec25" class="div_context_win">Christmas</div>
<div id="div_Context_jan1" class="div_context_win">New Year</div>
<div id="div_Context_jan14" class="div_context_win">Sankranti</div>
<div id="div_Context_jan26" class="div_context_win">Republic Day</div>
<div id="div_Context_may1" class="div_context_win">Worker's Day</div>
<div id="div_Context_aug15" class="div_context_win">Independence Day</div>
<div id="div_Context_putLeave" class="div_context_win">Suggested Leave</div>
<div id="div_Context_planLeave" class="div_context_win">Plan Leave</div>
</div>
                 
	               <div id="div_cal_mnths" style="float:left; width:100%; height:auto;  margin-bottom:5%; overflow-x:scroll; overflow-y:hidden;">
				  
	<div style="float:left; width:900px; height:auto; overflow-y:scroll; overflow-x:hidden;">	
			  
 		<div id="div_3mnths" align="left" style="width:100%; float:left; margin-top:1px;">
 <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Oct2013();</script>
</div>
<div style="float:left; margin-left:5px;">
  <script type="text/javascript">L_Nov2013();</script>
  </div>
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Dec2013();</script>
  </div>
  </div>
  
 	<div id="div_6mnths" align="left" style="width:100%; float:left; margin-top:5px; display:block;">
  <div style="float:left; margin-left:5px;">
  <script type="text/javascript">L_Jan2014();</script>
  </div>
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Feb2014();</script>
  </div>
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Mar2014();</script>
  </div>
  </div>
  
   <div id="div_9mnths" align="left" style="width:100%; float:left; margin-top:5px; display:none;">
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Apr2014();</script>
  </div>
  <div style="float:left;   margin-left:5px;">
  <script type="text/javascript">L_May2014();</script>
  </div>
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Jun2014();</script>
  </div>
  </div>
  
 	<div id="div_12mnths" align="left" style="width:100%; float:left; margin-top:5px; display:none;">
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Jul2014();</script>
  </div>
  <div style="float:left; margin-left:5px;">
  <script type="text/javascript">L_Aug2014();</script>
  </div>
  <div style="float:left;  margin-left:5px;">
  <script type="text/javascript">L_Sept2014();</script>
  </div>
  </div>
</div>
                 </div>
				 
			   </div>

                  			
        </span>  
	   
	    </div>

              <div id="div_myProfile" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		    
			 <span style="width:20%; float:left;">
		       <div id="btn_div_myProf" class="arrow_act" style="width:160px;"><span style="float:left; margin:13px 0px 0px 1px; color:#FFF;">MY PROFILE</span></div>
			   </span>
			
			 <span style="width:75%; float:left; margin-left:10px;">
			   
			    <div id="div_prof_hdr_btn" style="width:100%; height:auto; float:left; background:#FFFFCC;">
				   <span style="float:left;" onClick="show_section('div_myInfo','div_myContact','div_myOffers','div_myInterests','div_settings');">
				   <div id="btn_myInfo" class="btn_semi_trapez_onFocus" onClick="change_btn_color('btn_myInfo','btn_myContact','btn_myInterest','btn_myOffers','btn_Settings');">
				   My Info</div></span>
				   <span style="float:left;" onClick="show_section('div_myContact','div_myInfo','div_myOffers','div_myInterests','div_settings');">
				   <div id="btn_myContact" class="btn_semi_trapez" onClick="change_btn_color('btn_myContact','btn_myInfo','btn_myInterest','btn_myOffers','btn_Settings'); ">
				   My Contact</div></span>
				   <span style="float:left;" onClick="show_section('div_myInterests','div_myContact','div_myInfo','div_myOffers','div_settings');">
				   <div id="btn_myInterest" class="btn_semi_trapez" onClick="change_btn_color('btn_myInterest','btn_myContact','btn_myInfo','btn_myOffers','btn_Settings');">
				   My Interests</div></span>
				   <span style="float:left;" onClick="show_section('div_myOffers','div_myContact','div_myInfo','div_myInterests','div_settings');">
				   <div id="btn_myOffers" class="btn_semi_trapez" onClick="change_btn_color('btn_myOffers','btn_myInterest','btn_myContact','btn_myInfo','btn_Settings'); ">
				   My Offers</div></span>
				   <span style="float:left;" onClick="show_section('div_settings','div_myOffers','div_myInterests','div_myContact','div_myInfo');">
				   <div id="btn_Settings" class="btn_semi_trapez" onClick="change_btn_color('btn_Settings','btn_myOffers','btn_myInterest','btn_myContact','btn_myInfo'); ">
				   Settings</div></span>
				</div> 
				
				<div id="div_myInfo" style="float:left;width:100%; height:500px; display:block; margin-top:20px;">
				    <div style="float:left; width:100%; margin-top:10px;">
				     <table class="font-medium" width="400px" style="float:left; text-align:left;" cellpadding="2" cellspacing="2">
					    <tr> 
						   <td style="color:#b22">Full Name</td>
						   <td><input type="text" class="txtbox_Tab" /></td>
						</tr>
						<tr>
						  <td style="color:#b22">Gender</td>
						  <td><input type="radio" name="rdGender" />Male &nbsp; <input type="radio" name="rdGender" />Female</td>
						</tr>
						<tr>
						  <td style="color:#b22">Age Group</td>
						  <td>
						  <select id="drpAgeGrp" style="width:100px;">
						    <option>Age</option>
						    <option>10-15</option>
							<option>15-20</option>
							<option>20-25</option>
							<option>25-30</option>
							<option>30-35</option>
							<option>35-40</option>
							<option>40-45</option>
							<option>45-50</option>
							<option>50-55</option>
							<option>55-60</option>
							<option>60-65</option>
						  </select>
						  </td>
						</tr>
						<tr>
						   <td style="color:#b22">BirthDay</td>
						   <td>
						   <select style="width:50px; float:left;">
						   <option>Day</option>
						   <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
						   </select>
						   <select style="float:left;margin-left:5px; width:60px;">
						    <option>Jan</option>
							<option>Feb</option>
							<option>Mar</option>
							<option>Apr</option>
							<option>May</option>
							<option>Jun</option>
							<option>Jul</option>
							<option>Aug</option>
							<option>Sept</option>
							<option>Oct</option>
							<option>Nov</option>
							<option>Dec</option>
						   </select>
						   </td>
						</tr>
						<tr>
						  <td  style="color:#b22">I'd like to travel with</td>
						  </tr>
						  <tr>
						  <td>						
						  <span class="font-medium"><input type="checkbox" />Family</span><br/>
						  <span class="font-medium"><input type="checkbox" />Group</span><br/>
						  <span class="font-medium"><input type="checkbox" />Partner</span><br/>						  
						 </td>
						  <td>	
						  <span class="font-medium"><input type="checkbox" />Single</span><br/>					  
						  <span class="font-medium"><input type="checkbox" />Spouse</span><br/>
						  <span class="font-medium"><input type="checkbox" />Spouse+Kids</span><br/>
				    	  </td>
						</tr>
						<tr>
						  <td colspan="2" align="right"><div class="smallbtn" style="width:60px; float:none;">Submit</div></td>
						</tr>
					 </table>
				 </div>
				</div>
				
				<div id="div_myContact" style="float:left;width:100%; height:500px; display:none; margin-top:20px;">
				   <div style="float:left; width:100%; margin-top:10px;">
				       <table class="font-medium" width="400px" style="float:left; text-align:left;" cellpadding="2" cellspacing="2">
				   <tr>
				    <td>Email Id <span style="color:#FF0000; font-size:14px;">*</span></td>
					<td><input type="text" class="txtbox_Tab" /></td>
				   </tr>
				   <tr>
				    <td>Alternate Email Id</td>
					<td><input type="text" class="txtbox_Tab" /></td>
				   </tr>
				   <tr>
				   <td>Landline Number(if any)</td>
				   <td><input type="text" class="txtbox_Tab" /></td>
				   </tr>
				   <tr>
				    <td>Mobile Number</td>
					<td><input type="text" class="txtbox_Tab" /></td>
				   </tr>
				   <tr>
				<td colspan="2" style="font-size:22px; color:#b22">Corresspondance Address</td>
				</tr>
				     <tr>
						  <td>H.No. & Ward No.</td>
						  <td><input type="text" class="txtbox_Tab" style="width:60px;" />
						  <input type="text" class="txtbox_Tab" style="width:60px;" /></td>
						  </tr>
						  <tr>
						  <td>Street Name, Area Name</td>
						  <td><input type="text" class="txtbox_Tab" /></td>
						</tr>
						<tr>
						  <td>City</td>
						  <td>
						  <select style="width:160px; float:left">
						    <option>Bangalore</option>
							<option>Delhi</option>
							<option>Kolkatta</option>
							<option>Mumbai</option>
							<option>Ahemdabad</option>
							<option>Srinagar</option>
							<option>Jaipur</option>
							<option>Madurai</option>
						  </select>
						  </td>
						</tr>
						<tr>
						  <td>State</td>
						  <td><select style="width:160px; float:left">
						    <option>Karnataka</option>
							<option>Haryana</option>
							<option>West Bengal</option>
							<option>Maharashtra</option>
							<option>Gujurat</option>
							<option>Jammu & Kashmir</option>
							<option>Rajasthan</option>
							<option>Chennai</option>
						  </select>
						  </td>
						</tr>
						<tr>
						  <td>Country</td>
						  <td><select style="width:160px; float:left">
						    <option>India</option>
							 </select>
							 </td>
						</tr>
						<tr>
						  <td colspan="2" align="right"><div class="smallbtn" style="width:60px; float:none;">Submit</div></td>
						</tr>
				  </table>
				 </div>
				 </div>
				 
				<div id="div_myOffers" style="float:left;width:100%; height:500px; display:none; margin-top:20px;">
				 
				    <div style="float:left; width:100%; margin-top:10px;">
				       <table class="font-medium" style="float:left; width:90%; text-align:left;" cellpadding="2" cellspacing="2">
					  <tr>
					    <td colspan="2" style="color:#b22; font-size:20px;">Want to know Offers on my Credit/Debit Card from these banks</td>
					  </tr>
					  <tr>
					    <td colspan="2">
						<span style="float:left; margin-left:10px;"><input id="chkIcici" type="checkbox"  onClick="check_bank('chkIcici','div_bank_icici');" />ICICI Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chkaxis" type="checkbox"  onClick="check_bank('chkaxis','div_bank_axis');" />Axis Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chkciti" type="checkbox"  onClick="check_bank('chkciti','div_bank_citi');" />Citi Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chkhsbc" type="checkbox"  onClick="check_bank('chkhsbc','div_bank_hsbc');" />HSBC Bank</span>						
						<span style="float:left; margin-left:10px;"><input id="chksbi" type="checkbox"  onClick="check_bank('chksbi','div_bank_sbi');" />SBI Bank</span><br/>												
					    <span style="float:left; margin-left:10px;"><input id="chkhdfc" type="checkbox"  onClick="check_bank('chkhdfc','div_bank_hdfc');" />HDFC Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chksbm" type="checkbox"  onClick="check_bank('chksbm','div_bank_sbm');" />SBM Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chkCanara" type="checkbox"  onClick="check_bank('chkCanara','div_bank_Canara');" />Canara Bank</span>
						<span style="float:left; margin-left:10px;"><input id="chkkm" type="checkbox"  onClick="check_bank('chkkm','div_bank_KM');" />Kotak Mahindra Bank</span>
						</td>
						</tr>
						<tr>
						<td><span style="float:left; margin-left:10px;">Others</span>
				<span style="float:left;"><div class="div_dropdown" style="width:160px;">
		     <div>
			<span id="span_act_bank">---Select---</span>
			<span id="up_arrow_bank" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_bank'); hide_block('up_arrow_bank'); show_block('down_arrow_bank');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_bank" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;" onClick="show_block('div_list_bank'); show_block('up_arrow_bank'); hide_block('down_arrow_bank');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>			
			<div id="div_list_bank" class="div_drpListItems_pac" style="width:160px; overflow-x:hidden;">			 
			  <span class="span_drpListItems" onClick="show_block('');"><input type="checkbox" />Allahabad Bank</span>
			   <span class="span_drpListItems"><input id="chkBaroda" type="checkbox"  onClick="check_bank('chkBaroda','div_bank_baroda');" />Bank of Baroda</span>
			    <span class="span_drpListItems"><input id="chkIndian" type="checkbox"  onClick="check_bank('chkIndian','div_bank_indian');" />Indian Bank</span>
			    <span class="span_drpListItems"><input id="chkLVB" type="checkbox"  onClick="check_bank('chkLVB','div_bank_LVB');" />Laxmi Vilas Bank</span>
				<span class="span_drpListItems"><input id="chkGramin" type="checkbox"  onClick="check_bank('chkGramin','div_bank_Gramin');"/>Gramin Bank</span>
				<span class="span_drpListItems"><input id="chkIDBI" type="checkbox"  onClick="check_bank('chkIDBI','div_bank_IDBI');"/>IDBI Bank</span>
				 <span class="span_drpListItems"><input id="chkIIB" type="checkbox"  onClick="check_bank('chkIIB','div_bank_IIB');"/>Indus Ind Bank</span>			
				  <span class="span_drpListItems"><input id="chkUCO" type="checkbox"  onClick="check_bank('chkUCO','div_bank_UCO');"/>UCO Bank</span>
				   <span class="span_drpListItems"><input id="chkUnion" type="checkbox"  onClick="check_bank('chkUnion','div_bank_Union');"/>Union Bank</span>
				   <span class="span_drpListItems"><input id="chkYes" type="checkbox"  onClick="check_bank('chkYes','div_bank_Yes');"/>Yes Bank</span>
				
			   <span class="span_drpListItems" style="float:left; margin-left:80px;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_bank');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div></span>
					</td>
					</tr>
					</table>
				   </div>
				 
				    <div style="background:#fbfbfb; width:730px; height:350px; margin-top:20px; overflow-y:scroll; overflow-x:hidden;">
									   					   
					   <div style="float:left;width:100%; margin-left:10px; margin-top:5px;">
					     
						 <span id="div_bank_icici" class="sp_cc_db_card">
						    <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/icici_visa_credit.jpg') no-repeat;" onMouseOver="show_block('div_icici_master_offerBtn');" onMouseOut="hide_block('div_icici_master_offerBtn');"></div>
						  
						   <div id="div_icici_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('icici_pop_curr');" onMouseOut="HideContent('icici_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('icici_pop_upcmg');" onMouseOut="HideContent('icici_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div>						   						   					 
						 </span>
						 
						 <span id="div_bank_axis" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/Axis_visa_credit.jpg')no-repeat;" onMouseOver="show_block('div_icici_master_offerBtn');" onMouseOut="hide_block('div_icici_master_offerBtn');"></div>
						  
						   <div id="div_icici_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('axis_pop_curr');" onMouseOut="HideContent('axis_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('axis_pop_upcmg');" onMouseOut="HideContent('axis_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_citi" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/citi_visa_credit.jpg') no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('citi_pop_curr');" onMouseOut="HideContent('citi_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('citi_pop_upcmg');" onMouseOut="HideContent('citi_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_hsbc" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/hsbc_visa_credit.jpg') no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('hsbc_pop_curr');" onMouseOut="HideContent('hsbc_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('hsbc_pop_upcmg');" onMouseOut="HideContent('hsbc_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_sbi" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/sbi_visa_credit.jpg')no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('sbi_pop_curr');" onMouseOut="HideContent('sbi_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('sbi_pop_upcmg');" onMouseOut="HideContent('sbi_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_hdfc" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/hdfc_visa_credit.jpg')no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('hdfc_pop_curr');" onMouseOut="HideContent('hdfc_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('hdfc_pop_upcmg');" onMouseOut="HideContent('hdfc_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_Canara" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/canara_visa_credit.jpg') no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('canara_pop_curr');" onMouseOut="HideContent('canara_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('canara_pop_upcmg');" onMouseOut="HideContent('canara_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 <span id="div_bank_KM" class="sp_cc_db_card">
						   <div class="cc_db_card_img" style="background:url('Images/BankCreditCards/kotak_visa_credit.jpg') no-repeat;" ></div>						  
						   <div id="div_sbi_offerBtn" style="width:98%; opacity:0.8; margin-top:3px;">						    
							<span style="float:left;">
							<div class="smallbtn" style="width:80px; height:18px; font-size:10px;" onMouseOver="ShowContent('km_pop_curr');" onMouseOut="HideContent('km_pop_curr');">Current Offers</div></span>							
							<span style="float:left;">
					<div class="smallbtn" style="width:80px; height:18px; font-size:10px; float:none;" onMouseOver="ShowContent('km_pop_upcmg');" onMouseOut="HideContent('km_pop_upcmg');">Upcoming Offers</div></span>						   
						   </div> 
						 </span>
						 
						 
						 
					</div>
					
        			</div>
				 
				 </div>				 
			 
			    <div id="div_myInterests" style="float:left;width:100%; height:500px; display:none; margin-top:20px;">
				 <table style="width:90%;" class="font-medium">
				   <tr> 
				    <td><input type="checkbox" id="chkAdv" checked="true" />Adventure</td>
					<td><input type="checkbox" id="chkBch" />Beaches</td>
				    <td><input type="checkbox" id="chkDesert" />Desert</td>
					<td><input type="checkbox" id="chkjngl" />Jungle</td>
				   </tr>
				   <tr> 
				    <td><input type="checkbox" id="chkSightsee" />Sightsee</td>
					<td><input type="checkbox" id="chkCityTour" />City Tour</td>
				    <td><input type="checkbox" id="chkHill" />Hill Station</td>
					<td><input type="checkbox" id="chkNature" />Nature Escape</td>
				   </tr>
				   <tr> 
				    <td><input type="checkbox" id="chkWild" />Wild Life</td>
					<td><input type="checkbox" id="chkRelg" />Religious</td>
			        <td><input type="checkbox" id="chkCofe" />Coffee/Tea Estates</td>
					<td><input type="checkbox" id="chkHM" />Honeymoon Escape</td>
				   </tr>
				   <tr> 
				    <td><input type="checkbox" id="chkWtrSprt" />Water Sport</td>
					<td><input type="checkbox" id="chkRF" />Reserve Forest</td>
				    <td><input type="checkbox" id="chkRmtGt" />Romantic</td>
					<td><input type="checkbox" id="chkCamp" />Camping</td>
				   </tr>
				   <tr> 
				    <td><input type="checkbox" id="chkRest" />Rest & Relaxing</td>
					<td><input type="checkbox" id="chkAgri" />Agri Tour</td>
				    <td><input type="checkbox" id="chkHist" />Historical</td>
				 </tr>
				 <tr>
				  <td colspan="2" align="right"><div class="smallbtn" style="width:60px; float:none;">Submit</div></td>
				</tr>
				 </table>
				 <div style="float:left; width:100%;" class="font-medium">			
					<div style="float:left; width:100%;">
					<span style="float:left; " > Adventure</span>
					   <span><input type="radio" name="rdExp_adv"></span><span style="background:#CCE0FF;">New Explorer</span>
					   <span><input type="radio" name="rdExp_adv"></span><span style="background:#99C2FF;">Limited Experience</span>					   
					   <span><input type="radio" name="rdExp_adv"></span><span style="background:#66A3FF;">Widely Travelled</span>
					   <span><input type="radio" name="rdExp_adv"></span><span style="background:#3385FF;">I'm an Expert</span>
					   </div>
				 </div>
				</div>
			   
			    <div id="div_settings" style="float:left; width:100%; display:none; margin-top:20px;">
			      <div style="float:left; width:100%;">
				     <table class="font-medium" width="500px">
					<tr>
					 <td colspan="2" align="left">Reset your password</td>
					</tr>
					 <tr>
					  <td>Current Password</td>
					  <td><input id="txtcurr_pwd" type="text" class="txtbox_Tab" checked="checked" /></td>
					 </tr>
					 <tr>
					  <td>New Password</td>
					  <td><input id="txtnew_pwd" type="text" class="txtbox_Tab"  /></td>
					  </tr>
					  <tr>
					  <td>Confirm Password</td>
					  <td><input id="txtcnew_pwd" type="text" class="txtbox_Tab" /></td>
					 </tr>
					 <tr>
					 <td></td>
					  <td align="right"><div class="smallbtn" style="width:50px; float:none; margin-right:80px;">Submit</div></td>
				     </tr>
					 <tr>
					  <td colspan="2" style="font-size:11px; color:#ff0000;">For security reasons we are sending one time password to your cellphone for you to complete the reset.<br/> On receiving the OTP please enter below.If you don't received OTP in next 60 seconds please submit again.</td>
					 </tr>
					 <tr>
					  <td>Enter OTP</td>
					  <td><input id="txtotp" type="text" class="txtbox_Tab" /></td>
					 </tr>
					  <tr>
					  <td colspan="2" align="right"><div class="smallbtn" style="width:50px; float:none; margin-right:80px;">Reset</div></td>
					  </tr> 
					  <tr>
					  <td colspan="2">Preference for promotional mails/alerts.</td>
					  </tr>
					  <tr>
					  <td colspan="2"><input type="checkbox" checked="checked" />Send me new offers</td>
					  </tr>					  
					  <tr>
					  <td colspan="2"><input type="checkbox" checked="checked" />Send me packages on vacation themes I saved</td>
					  </tr>
					  <tr>
					  <td colspan="2"><input type="checkbox" checked="checked" />Send me newly arrived packages.</td>
					  </tr>
					  <tr>
					  <td colspan="2"><input type="checkbox" checked="checked" />Send me newly arrived packages.</td>
					  </tr>
					  <tr>
					  <td colspan="2"><input type="checkbox" checked="checked" />Send me newly arrived packages.</td>
					  </tr>
					  <tr>
					  <td colspan="2" align="right"><div class="smallbtn" style="width:50px; float:none; margin-right:80px;">Submit</div></td>
					  </tr>
					</table>
				  </div>
			   </div>
			  
				</span>
  
		     </div>
		   
		      <div id="div_myTransactions" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		       <span style="width:20%; float:left;">
		       <div id="btn_Transact" class="arrow_act" onClick="chg_frm_hdr_btn('btn_Transact','btn_trans_myPurch','btn_trans_myCancel','btn_trans_Quote','btn_trans_WL','btn_trans_Leads'); ">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:12px;">MY TRANSACTIONS</span></div>
			   <div id="btn_trans_myPurch" class="arrow_box" onClick="chg_frm_hdr_btn('btn_trans_myPurch','btn_Transact','btn_trans_myCancel','btn_trans_Quote','btn_trans_WL','btn_trans_Leads'); show_section('div_mytrans_purch','div_mytrans_cancel','div_mytrans_quotes','div_mytrans_myWL','div_mytrans_myLeads');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:12px;">MY PURCHASE</span></div>
			   <div id="btn_trans_myCancel" class="arrow_box" onClick="chg_frm_hdr_btn('btn_trans_myCancel','btn_Transact','btn_trans_myPurch','btn_trans_Quote','btn_trans_WL','btn_trans_Leads'); show_section('div_mytrans_cancel','div_mytrans_purch','div_mytrans_quotes','div_mytrans_myWL','div_mytrans_myLeads');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:12px;">MY CANCELLATION</span></div>			   
			   <div id="btn_trans_WL" class="arrow_box" onClick="chg_frm_hdr_btn('btn_trans_WL','btn_trans_Quote','btn_Transact','btn_trans_myPurch','btn_trans_myCancel','btn_trans_Leads'); show_section('div_mytrans_myWL','div_mytrans_quotes','div_mytrans_purch','div_mytrans_cancel','div_mytrans_myLeads'); hide_block('div_btn_book');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:12px;">MY WISHLISTS</span></div>
			   	<div id="btn_trans_Leads" class="arrow_box" onClick="chg_frm_hdr_btn('btn_trans_Leads','btn_trans_WL','btn_trans_Quote','btn_Transact','btn_trans_myPurch','btn_trans_myCancel'); show_section('div_mytrans_myLeads','div_mytrans_quotes','div_mytrans_purch','div_mytrans_cancel','div_mytrans_myWL'); hide_block('div_btn_book');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:12px;">MY LEADS</span></div>	
			   <div id="btn_trans_Quote" class="arrow_box" onClick="chg_frm_hdr_btn('btn_trans_Quote','btn_trans_Leads','btn_trans_WL','btn_Transact','btn_trans_myPurch','btn_trans_myCancel'); show_section('div_mytrans_quotes','div_mytrans_purch','div_mytrans_cancel','div_mytrans_myWL','div_mytrans_myLeads'); hide_block('div_btn_book');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF; font-size:10px;">REQUEST FOR QUOTE</span></div>	   
			   </span>
			   
			 <span style="width:78%; float:left; margin-left:10px;">
			    
				 <div id="div_btn_book" style="float:left; width:100%; display:none;">
				 <span style="float:left">
				 <div id="btn_trans_all" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_all','btn_trans_pckg','btn_trans_flights','btn_trans_hotels','btn_trans_cars','btn_trans_trains','btn_trans_buses');">All</div></span>
				 <span style="float:left">
				 <div id="btn_trans_pckg" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_pckg','btn_trans_all','btn_trans_flights','btn_trans_hotels','btn_trans_cars','btn_trans_trains','btn_trans_buses');">Packages</div></span>
				 <span style="float:left">
				 <div id="btn_trans_flights" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_flights','btn_trans_pckg','btn_trans_all','btn_trans_hotels','btn_trans_cars','btn_trans_trains','btn_trans_buses');">Flights</div></span>
				 <span style="float:left">
				 <div id="btn_trans_hotels" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_hotels','btn_trans_flights','btn_trans_pckg','btn_trans_all','btn_trans_cars','btn_trans_trains','btn_trans_buses');">Hotels</div></span>
			     <span style="float:left">
				 <div id="btn_trans_cars" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_cars','btn_trans_hotels','btn_trans_flights','btn_trans_pckg','btn_trans_all','btn_trans_trains','btn_trans_buses');">Cars</div></span>
				 <span style="float:left">
				 <div id="btn_trans_trains" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_trains','btn_trans_cars','btn_trans_hotels','btn_trans_flights','btn_trans_pckg','btn_trans_all','btn_trans_buses');">Trains</div></span>
				 <span style="float:left">
				 <div id="btn_trans_buses" class="btn_semi_trapez" onClick="chg_btn_class('btn_trans_buses','btn_trans_trains','btn_trans_cars','btn_trans_hotels','btn_trans_flights','btn_trans_pckg','btn_trans_all');">Buses</div></span>					  
				 </div>
				 
				 <div id="div_mytrans_purch" style="display:none;">
				    <table width="100%" border="1px" cellpadding="0" cellspacing="0" style="font-size:14px; font-family:Calibri;">
					   <tr style="background:#0066ff; color:#fff;">
					     <th></th>
						 <th colspan="3">Transaction </th>
						 <th colspan="2">Booking</th>
						 <th colspan="2"> Travel Dates</th>
					   </tr>
					   <tr style="background:#0066ff; color:#fff;">
					     <th>Category</th>
						 <th>ID</th>
						 <th>Date</th>
						 <th>Amount</th>
						 <th>Ref</th>
						 <th>PNR</th>
						 <th>From</th>
						 <th>To</th>						 
					   </tr>
					   <?php	
					   $prc ="";			 
						 $q_purc = "select category, date_of_purchase, book_id, trxn_id, pck_id from buy_pck where user_id='".$_SESSION["clientID"]."'";
						  $res_purc = mysqli_query($conn,$q_purc);
						  if($res_purc)
						  {
						   while($row = mysqli_fetch_array($res_purc))
						   {
						   if($row["category"] == "Package")
						   {
						     $q_sel_amnt = "select price from b2b_pck_crt where pck_id ='".$row["pck_id"]."'";
							 $res_sel_amt = mysqli_query($conn,$q_sel_amnt);
							 while($r = mysqli_fetch_array($res_sel_amt))
							 { 
							 $prc = $r["price"];
							 }
						   }
						   else if($row["category"] == "Quote")
						   {
						     $q_sel_amnt = "select totl_opt1 from quote_othrs where quote_id ='".$row["pck_id"]."'";
							 $res_sel_amt = mysqli_query($conn,$q_sel_amnt);
							 while($r = mysqli_fetch_array($res_sel_amt))
							 { 
							 $prc = $r["totl_opt1"];
							 }
						  }					   
						     echo '<tr>';
							 echo '<td>'.$row["category"].'</td>';
							 echo '<td>'.$row["trxn_id"].'</td>';
							 echo '<td>'.date('d-m-Y',strtotime($row["date_of_purchase"])).'</td>';
							 echo '<td>'.$prc.'</td>';
							 echo '<td>'.$row["book_id"].'</td>';
							 echo '<td></td>';
							 echo '<td></td>';
							 echo '<td></td>';
							 echo '</tr>';
						   }
						  }					
					   ?>
					</table>
				 </div>
				 
				 <div id="div_mytrans_cancel" style="display:none;">
				    <table width="100%" border="1px" cellpadding="0" cellspacing="0" style="font-size:14px; font-family:Calibri;">
					   <tr style="background:#0066ff; color:#fff;">
					     <th></th>
						 <th colspan="2">Cancellation </th>
						 <th colspan="2">Booking</th>
						 <th colspan="2"> Travel Dates</th>
					   </tr>
					   <tr style="background:#0066ff; color:#fff;">
					     <th>Category</th>
						 <th>Date</th>
						 <th>Refund Amount</th>
						 <th>Ref</th>
						 <th>Date</th>
						 <th>From</th>
						 <th>To</th>						 
					   </tr>
					   <?php
					     if(isset($_SESSION["clientID"]))
						 {
				 $cncl = "select pck_id, cncl_process_date, trxn_id, cncl_type, refund_amount, date_format(dept_date,'%d-%m-%Y') as dept_date from cancel_tab where client_id='".$_SESSION["clientID"]."'";
						$res_cncl = mysqli_query($conn,$cncl);
						
						if($res_cncl)
						{						
						 while($row = mysqli_fetch_array($res_cncl))
						 {						 
						 $buy = "select book_id, date_format(date_of_purchase,'%d-%m-%Y') as date_of_purchase from buy_pck where pck_id='".$row["pck_id"]."'";
						$res_buy = mysqli_query($conn,$buy);
						
						$dur = "select duration from b2b_pck_crt where pck_id='".$row["pck_id"]."'";
						$res_dur = mysqli_query($conn,$dur);
						while($rb = mysqli_fetch_array($res_dur))
						{
						  $dur = $rb["duration"];
						  $dept = $row["dept_date"];
						  $day = explode("/",$dur);
						  $d = explode("D",$day[1]);							 
						  $tripTill = date('d-m-Y',strtotime($dept . "+".$d[0]." days"));
						}
						
						while($r = mysqli_fetch_array($res_buy))
						{					 
						   echo '<tr>';
						   echo '<td>'.$row["cncl_type"].'</td>';
						   echo '<td>'.$row["cncl_process_date"].'</td>';
						   echo '<td>'.$row["refund_amount"].'</td>';
						   echo '<td>'.$r["book_id"].'</td>';
						   echo '<td>'.$r["date_of_purchase"].'</td>';
						   echo '<td>'.$row["dept_date"].'</td>';
						   echo '<td>'.$tripTill.'</td>';
						   echo '</tr>';
						   
						 }
						}
						  
						}
						
						 }
						 ?>
					</table>
				 </div>			
				 
				 <div id="div_mytrans_myWL" style="display:none;">
					<table width="100%" border="1px" cellpadding="0" cellspacing="0" style="font-size:14px; font-family:Calibri;">
					  <tr style="background:#0066ff; color:#fff;">
					    <th>Wishlist ID</th>
						<th>Destinations</th>
						<th>Location Names</th>
						<th>Date Created</th>
						<th>Get me Quote</th>
						<th>Book Hotel</th>
						<th>Delete</th>
					  </tr>
					  <?php
					  $locs="";
					    $qry_wshl = "select wl_id, loc_name, userID, DATE_FORMAT(`WL_3`,'%d-%m-%Y') as date from wl_tab where client_id='". $_SESSION["clientID"]."'";
						$res_wshl = mysqli_query($conn,$qry_wshl);
						if($res_wshl)
						{
						 while($row = mysqli_fetch_array($res_wshl))
						 {
						   $q_cnt_wl = "select distinct(loc_name) as loc_name from saved_wl where wl_id='".$row["wl_id"]."' and client_id='". $_SESSION["clientID"]."' ";
						   $res_cnt_wl = mysqli_query($conn,$q_cnt_wl);
						   $num_loc = mysqli_num_rows($res_cnt_wl);
						   if($num_loc>1)
						   {
						     $dest = "MULTIPLE";					
							 while($r = mysqli_fetch_array($res_cnt_wl))
							   {
							     $locs .= $r["loc_name"].",";
							   }
							 }
							else
							{
							 $dest = "SINGLE";
							  $locs = $row["loc_name"];
							 }
							 
							 echo '<tr>';
						  echo '<td style="cursor:pointer; color:#0066ff;" onclick="show_block(\'div_wl_dtl\'); showWL(\''.$row["wl_id"].'\');">'.$row["wl_id"].'</td>';
						   echo '<td>'.$dest.'</td>';
						   echo '<td>'.$locs.'</td>';
						   echo '<td>'.$row["date"].'</td>';
						   echo '<td><input type="button" style="background:#002929; color:#fff; font-size:12px;" name="btn_q_"'.$row["wl_id"].' id="btn_q_"'.$row["wl_id"].' value="Quotes" onClick="getQuotes(\''.$row["wl_id"].'\',\''. $_SESSION["clientID"].'\',\''.$locs.'\');" /></td>';
						   echo '<td><input type="button" style="background:#002929; color:#fff; font-size:12px;" name="btn_Htl_"'.$row["wl_id"].' id="btn_Htl_"'.$row["wl_id"].' value="Book Hotels" onclick="show_hotel_online(\''.$row["loc_name"].'\');" /></td>';
						   echo '<td><input type="submit" style="background:#002929; color:#fff; font-size:12px;" name="btn_Del_"'.$row["wl_id"].' id="btn_Del_"'.$row["wl_id"].' value="Delete" /></td>';
						   if(isset($_POST["btn_Del_".$row["wl_id"]]))
						   {
						     $post_log = true;
							 echo $row["wl_id"];
						     $q_del_wl = "delete from wl_tab where wl_id='".$row["wl_id"]."'";
							 $res_del_wl = mysqli_query($conn,$q_del_wl);
							 
							 $q_del_wl_lst = "delete from saved_wl where wl_id='".$row["wl_id"]."'";
							 $res_del_wl_lst = mysqli_query($conn,$q_del_wl_lst);
						   }
						   echo '</tr>';
						   }
						 }
					 ?>
					</table>				 
 				 </div>
				 
				 <div id="div_mytrans_myLeads" style="display:none;">
					<table width="100%" border="1px" cellpadding="0" cellspacing="0" style="font-size:14px; font-family:Calibri;">
					  <tr style="background:#0066ff; color:#fff;">
					    <th>Lead ID</th>
					    <th>Wishlist ID</th>						
						<th>Location Names</th>
						<th>Date Created</th>
						<th>User ID</th>
						<th>Phone</th>
						<th>Lead Release Date</th>
					  </tr>
					  <?php
					  $q_lds = "select wl_id, lead_id, loc_name, lead_date, user_email, user_phone, lead_date from cust_trip_trvler where client_id='". $_SESSION["clientID"]."'";
					  $res_lds = mysqli_query($conn,$q_lds);
					  if($res_lds)
					  {
					   while($row = mysqli_fetch_array($res_lds))
					   {
					     echo '<tr>';
						 echo '<td>'.$row["lead_id"].'</td>';
						 echo '<td>'.$row["wl_id"].'</td>';
						 echo '<td>'.$row["loc_name"].'</td>';
						 echo '<td>'.$row["lead_date"].'</td>';
						 echo '<td>'.$row["user_email"].'</td>';
						 echo '<td>'.$row["user_phone"].'</td>';
						 echo '<td>'.$row["lead_date"].'</td>';
						 echo '</tr>';
					   }
					  }
					    ?>
					</table>				 
 				 </div>
				 
				 <div id="div_capt_Q" class="popUp_imgs_div" style="width:500px; height:150px;"></div>
				 
				  <div id="div_mytrans_quotes" style="display:none;">
				    <table width="100%" border="1px" cellpadding="0" cellspacing="0" style="font-size:14px; font-family:Calibri;">
					<tr style="background:#0066ff; color:#fff;">
					   <th>Lead ID</th>
					   <th>Wishlist ID</th>
					   <th>Quote ID</th>
					   <th>Responses</th>
					   <th>Buy</th>
					   <th>Query</th>
					   </tr>
					    <?php
					  $q_lds = "select wl_id, lead_id, loc_name, lead_date, user_email, user_phone, lead_date from cust_trip_trvler where client_id='". $_SESSION["clientID"]."'";
					  $res_lds = mysqli_query($conn,$q_lds);
					  if($res_lds)
					  {
					   while($row = mysqli_fetch_array($res_lds))
					   {
					   $q_quo = "select lead_id, quote_id from quote_dtls where lead_id='".$row["lead_id"]."'";
					   $res_quo = mysqli_query($conn,$q_quo);
					   if($res_quo)
					   {
					     $wl = "W".substr($row["lead_id"],1,6);
					    while($r = mysqli_fetch_array($res_quo))
						{
						 echo '<tr>';
						 echo '<td>'.$r["lead_id"].'</td>';
						 echo '<td>'.$row["wl_id"].'</td>';
						 echo '<td>'.$r["quote_id"].'</td>';
				         echo '<td style="color:#0066ff; cursor:pointer; text-decoration:underline;" onClick="show_block(\'dtls_response\'); Show_newQuotes(\''.$r["lead_id"].'\',\''.$r["quote_id"].'\')">Click here</td>';
						 echo '<td><input type="button" class="smallbtn" style="width:50px;" onClick="buyPck(\''.$r["quote_id"].'\');" value="Buy" /></td>';
						 echo '<td><input type="button" class="smallbtn" style="width:50px;" onClick="raiseQuery(\''.$r["lead_id"].'\',\''.$r["quote_id"].'\',\''.$row["wl_id"].'\',\''.$_SESSION["userEmail"].'\');" value="Query" /></td>';
						 echo '</tr>';
						}
					    }					    
					   }
					  }
					    ?>
					</table>
				 </div>
				 
			 </span>  
		   </div>
		   
		      <div id="div_myTop10" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		       <span style="width:20%; float:left;">
			   <div style="width:100%; float:left;">
		       <div id="btn_Pay_Purchase" class="arrow_act"><span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY TOP 10</span></div>
			   <div style="float:left; width:100%; margin-top:5px;">
			      <span class="font-medium">Select Your Top 10</span>
			   </div>
			   <div style="float:left; width:100%; margin-top:5px;">
			      <span class="font-medium">
				  <form id="drpform">
				    <select id="drpTop10" name="drpTop10" class="font-medium" style="width:200px; height:25px;" onChange="createBtns();">
					  <option> My Top10</option>
					  <option>My Top10 Cities</option>
					  <option>My Top10 Beaches</option>
					  <option>My Top10 Resorts</option>
					  <option>My Top10 Shopping Centers</option>
					  <option>My Top10 Trekking</option>
					  <option>My Top10 Monuments</option>
					  <option>My Top10 Stadiums</option>
					  <option>My Top10 Opera theatre</option>
					</select>
					</form>
				  </span>
			   </div>
			   <div align="center" style="float:left; width:100%; margin-top:5px;">
			    <span><div class="smallbtn" style="float:none; width:60px;" onClick="show_block('div_add_other');">Others</div></span>
			   </div>
			   <div id="div_add_other" align="center" style="float:left; width:100%; margin-top:10px; display:none;">
			      <input id="txt_newTop10" type="text" class="txtbox_trv_cust" />
				  <span><div class="smallbtn" style="float:none; width:40px;" onClick="Add_to_drpTop10();">Add</div></span>
			   </div>
			   </div>
			   </span>
			 <span style="width:75%; float:right;">			     
			<div style="float:left; width:98%; margin-top:3px;">
				<div class="divTop10" style="width:100%; background:#002929; margin-right:10px;">My Top 10</div>
				     <div id="div_selected_top10" style="width:100%;  height:60px; background:#ffffcc; overflow:scroll;">
					     
					 </div>
				</div>
				
				 <div id="top_10_beaches" align="left" style="width:100%; height:500px; overflow:scroll; margin-top:5px; display:none;">
				     
					 <div id="div_top10_beaches">
				        
					   <span class="sp_top10">
					        
							<div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							  <img id="top1_bch" class="imgTop10" src="Images/Vacation type image/activities_beach3.png" style="position:relative;"/>
							  <div class="div_numImg_top10" style=" background:url(Images/Top10/top1.png) no-repeat;">
							  </div>   
							   <div id="done_trk1" class="div_doneImg_top10" style="background:url('Images/imgDone.jpg'); display:block"></div>							  
							 </div>
							
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
						<!--	<div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab1');">View info</a></div> -->
							<div id="div_bch_tab1" style="border:1px solid #999; display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   
					   </span>	
					   
					   <span class="sp_top10">
					         
							 <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/activities_beach4.png" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top2.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
			             	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_bch_tab2');" onDblClick="hide_block('div_bch_tab2');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab2" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td>Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					        <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/activities_beach7.png" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top3.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_bch_tab3');" onDblClick="hide_block('div_bch_tab3');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div> 
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/activities_beach5.png" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top4.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_bch_tab4');" onDblClick="hide_block('div_bch_tab4');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab4" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top5.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		               <div style="float:left; width:100%; cursor:pointer;">
					   <a class="font-small" onClick="show_block('div_bch_tab5');" onDblClick="hide_block('div_bch_tab5');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab5" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top6.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		               <div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab6');" onDblClick="hide_block('div_bch_tab6');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab6" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top7.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;">
							<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top8.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top9.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
				    			 
				         	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top10.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							 	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>			 
				
				 </div>
				
				 </div>
		          
				  <div id="top_10" align="left" style="width:100%; height:500px; overflow:scroll; margin-top:5px; display:none;">
				  </div>
				 
				 <div id="top_10_trekking" align="left" style="width:100%; height:500px; overflow:scroll; margin-top:5px; display:none;">
				     
					 <div id="div_top10_trek">
				        
					   <span class="sp_top10">
					        
							<div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							  <img id="top1_bch" class="imgTop10" src="Images/Vacation type image/adventuretour2.jpg" style="position:relative;"/>
							  <div class="div_numImg_top10" style=" background:url(Images/Top10/top1.png) no-repeat;"> </div> 						  
							   <div id="done_trk1" class="div_doneImg_top10">It's Done!</div> 
							 </div>
							
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_trk_tab1');" onDblClick="hide_block('div_trk_tab1');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
						<!--	<div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab1');">View info</a></div> -->
							<div id="div_trk_tab1" style="border:1px solid #999; display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio" onClick="doneOrnot('done_trk1','rdYes_bch');">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio" onClick="doneOrnot('done_trk1','rdNo_bch');">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   
					   </span>	
					   
					   <span class="sp_top10">
					         
							 <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/adventuretour.jpg" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top2.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
			             	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_trk_tab2');" onDblClick="hide_block('div_trk_tab2');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_trk_tab2" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					        <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/adventuretour4.jpg" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top3.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;"><a class="font-small" onClick="show_block('div_bch_tab3');" onDblClick="hide_block('div_bch_tab3');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div> 
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" src="Images/Vacation type image/junglesafar_activities3.png" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top4.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <div style="float:left; width:100%; cursor:pointer;">
						<a class="font-small" onClick="show_block('div_bch_tab4');" onDblClick="hide_block('div_bch_tab4');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab4" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top5.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		               <div style="float:left; width:100%; cursor:pointer;">
					   <a class="font-small" onClick="show_block('div_bch_tab5');" onDblClick="hide_block('div_bch_tab5');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab5" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top6.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		               <div style="float:left; width:100%; cursor:pointer;">
					   <a class="font-small" onClick="show_block('div_bch_tab6');" onDblClick="hide_block('div_bch_tab6');">View info</a></div>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							
							<div id="div_bch_tab6" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top7.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;">
							<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top8.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
								<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;">
							<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top9.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
				    			 
				         	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;">
							<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>
					   
					   <span class="sp_top10">
					         <div id="t10_img1" style="width:100%; background:#ddd; position:relative;">
							<img id="top1_bch" class="imgTop10" style="position:relative;"/>
							  <div style="float:left; position:absolute; top:0; left:0; width:40px; height:40px; background:url(Images/Top10/top10.png) no-repeat; z-index:100;">
							  </div>   
							 </div>
							 
							 	<div style="float:left; width:100%;">
					  <span style="float:left; width:50%;">
		                <span class="font-medium" style="color:#ddd;"></span>
				      </span>
					 <span id="btn_upl_bch" class="smallbtn" style="width:60px; float:right;" onClick="upload()">Upload</span>
						</div>
							
							<div style="float:left; width:100%; cursor:pointer;">
							<a class="font-small" onClick="show_block('div_bch_tab1');" onDblClick="hide_block('div_bch_tab1');">View info</a></div>
							<div id="div_bch_tab3" style="border:1px solid #999;  display:none;">
						        <table class="fontTop10" width="100%" cellpadding="0px" cellspacing="0px">
							  <tr>
							   <td width="100px">Name</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Location</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <td >Best time to visit</td>
							   <td><input type="text" class="txtTop10"/></td>
							  </tr>
							  <tr>
							   <tr>
							   <td colspan="2">Why I like it?</td>
							  </tr>
							   <td>Have I visited?</td>
							   <td>
							   <span style="float:left; font-size:12px; color:#006600"><input id="rdYes_bch" name="rdChoice" type="radio">Been there done that</span>
							    <span style="float:left; font-size:12px; color:#0000FF;"><input id="rdNo_bch" name="rdChoice" type="radio">Not yet, on my wishlist</span>
							   </td>
							  </tr>
							 
							</table>
						 	</div>
					   </span>			 
				
				 </div>
				
				 </div>
			 
			 </span>  
		   </div>
		   
		      <div id="div_myTripBlogs" style="display:none; width:100%; height:550px; background:#F5F5F5;">
			      <div style="float:left; margin:5px 2px 2px 5px; width:100%;">
		       
			   <span style="width:28%; height:550px; float:left; border-right:1px solid #bbb;">
		       <div id="btn_myTripBlogs" class="arrow_act" onClick="show_myblog();">
		       <span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY BLOGS</span></div>  
		
			 <div id="btn_OtherInterests" class="arrow_box" onClick="show_othInterest();">
			 <span style="float:left; color:#FFF;  margin:13px 0px 0px 3px;">OTHERS BLOGS</span></div>
			   
			   <div id="btn_myReviews" class="arrow_box">
			   <span style="float:left;  color:#FFF;  margin:13px 0px 0px 3px;">MY REVIEWS</span></div>
			   
			    <div id="div_trpBlog" style="float:left; width:100%;  margin-top:10px; display:block;">
				     <div style="float:left; width:100%; margin-bottom:6px;"><span class="font-medium">My Trip Blogs</span></div>
				    
					<table cellpadding="0" cellspacing="0" style="width:100%; font-size:12px; font-family:Calibri;">
				    <tr>
					<th width="100px" >Template <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					  <th width="100px"> Location <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					  <th width="70px"> Year <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					</tr>
					</table>
					
					<div align="left" style="float:left; margin-top:5px; cursor:pointer; height:160px; width:100%; overflow-y:scroll; overflow-x:hidden;">
		              	 <table id="tab_blogs" width="100%" cellpadding="0" cellspacing="0" style="font-size:12px; font-family:Calibri; margin-left:3px;">
					<tr id="tr1" onClick="show_block('div_blogs_history'); change_tr_font('tr1','tr2');">
					  <td>Trekking</td>
					  <td>Mumbai</td>
					  <td>2012</td>
					</tr>
					<tr > <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr id="tr2" onClick="show_block('div_pics_selected'); change_tr_font('tr2','tr1');">
					  <td>Trekking</td>
					  <td>Delhi</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Sightseeing</td>
					  <td>Pune</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Wildlife</td>
					  <td>Mumbai</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Rest & relax</td>
					  <td>Manali</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Sightseeing</td>
					  <td>Kolkatta</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Culture</td>
					  <td>Bangalore</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Sightseeing</td>
					  <td>Chandigarh</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Culture Fest</td>
					  <td>Pune</td>
					  <td>2011</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Rest & relax</td>
					  <td>Shimla</td>
					  <td>2011</td>
					</tr>
				  </table>
				    </div>
				  
				    <div style="float:left; width:100%;">
				    <div align="left" style="float:left; width:100%; margin-top:10px;">
					   <span class="font-medium" style="float:left;">Add to your trip blogs</span>
					</div>
				 
				     <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Location
					   <select id="drpBlg_loc" style="width:100px; margin-left:5px;">
					     <option>Goa</option>
						 <option>Mumbai</option>
						 <option>Bangalore</option>
						 <option>Pune</option>
						 <option>Kashmir</option>
						 <option>Delhi</option>
					   </select> 
					</span>
				</div>
				
				    <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Template
					   <select id="drpBlg_tmplt" style="width:100px; height:24px; margin-left:1px;">
					     <option>Trekking</option>
						 <option>Signhtseeing</option>
						 <option>Wildlife</option>
						 <option>Nature travel</option>
						 <option>Culture</option>
						 <option>Water Sports</option>
					   </select> 
					</span>
					<span style="float:left; margin-left:3px;"><div class="smallbtn" style="width:40px; font-size:10px;" onClick="show_block('other_blg');">Others</div></span>
				 </div>
				 
			    	 <div id="other_blg" style="float:left; width:100%; display:none">
				   <span style="float:left; margin-left:72px;"><input type="text" id="txt_othr_Blg"  class="txtbox_hol_ev" style="width:100px;"></span>
				   <span style="float: left; margin-left:2px;"><div class="smallbtn" style="width:40px; font-size:10px;" onClick="add_othr_Blg();">Add</div></span>
				 </div>
				 
				     <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Year
					   <select id="drpBlg_yr" style="width:60px; margin-left:38px;">
					     <option>2013</option>
						 <option>2014</option>
						 <option>2015</option>
						 <option>2016</option>
						 <option>2017</option>
						 <option>2018</option>
					   </select> 
					</span>
					<span style="float: left; margin-left:2px;">
				<div class="smallbtn" style="width:40px; font-size:10px; float:right" onClick="Add_to_blog_directry();">Submit</div></span>
				</div>
			 	</div>
				
				</div>
				
			    <div id="oth_interests" style="float:left; width:100%; margin-top:10px; display:none;">
				<div style="float:left; width:100%;">
				    <span class="font-medium" style="float:left;">Select Blog Theme/Category</span>
					<span style="float:left; margin-left:5px;">
					  <select id="drpBlgTheme" style="width:130px;" onChange="createBtn_blogFrames();">
					    <option>Nature</option>
						<option>Wildlife</option>
						<option>Trekking</option>
						<option>Mountaineering</option>
						<option>Snorkeling</option>
						<option>Others</option>
					  </select>
					</span>
				</div>
				<div id="div_Othr_blgLnk" style="float:left; width:100%; margin-top:5px; display:none;">
				<span style="float:left;"><input id="txt_blg_lnk_oth" type="text" class="txtbox_Tab" style="width:130px;" /></span>
				<span style="float:left; margin-left:10px;">
				<div class="smallbtn" style="width:40px;" onClick="add_to_BlgTheme(); hide_block('div_Othr_blgLnk');">Add</div></span></div>
			   </div>
			   
			   </span>
			
			 <span style="width:70%;float:left; margin-left:10px;">
			     
				   <div id="myTripBlogHdr" style="float:left; width:100%;">
			     <div style="float:left; width:100%;">
				    <div style="width:100%; float:left;">
					    <span style="float:left; margin-left:5px;"><div class="smallbtn" style="width:80px;" onClick="show_compose();">Compose</div></span>					   
					</div>
				 </div>
				 
				 <div style="float:left; width:100%; margin-top:10px;">
				 <span class="font-small">Topics to describe</span>
			      <span style="float:left; margin-left:3px;"><select id="drpTemplate" style="width:100px;" onChange="show_divs('drpTemplate');">
				   <option>Select</option>
				   <option>Title</option>
				   <option>Location</option>
				    <option>Climate</option>
					<option>Food</option>
					<option>Stay</option>
					<option>Accessibility</option>
					<option>NearBy Places</option>
					<option>Blog Links</option>
					<option>Others</option>
				  </select></span>
				   <span class="font-small" style="float:right; margin-right:10px; color:#b22;">Describe in  200 words each</span>
			   </div>
				 
				 <div style="float:left; margin-top:5px; width:100%">  
				     
					 <div id="div_title" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Title</span>
					 <span style="float:left; margin-left:10px; width:65%;">
					 <span style="float:left"><textarea id="txtA_Title" wrap="soft" style="width:480px; height:70px;" onMouseOut="Write_title_prev('drpTemplate');">
					 </textarea></span>	
					  </span>			
					 </div>
					 
					 <div id="div_loc" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Location</span>
					 <span style="float:left; margin-left:10px; width:65%;">
					 <span style="float:left"><textarea id="txtA_Loc" wrap="soft" style="width:480px; height:70px;" onMouseOut="Write_loc_prev('drpTemplate');">
					 </textarea></span>	
					  </span>			
					 </div>
					  
					 <div id="div_climate" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Climate</span>
					 <span style="float:left; margin-left:10px; width:65%;">
					 <span style="float:left"><textarea id="txtA_Climate" wrap="soft" style="width:480px; height:70px;" onMouseOut="Write_clm_prev('drpTemplate');">
					 </textarea></span>	
					 <div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_clm" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_clm" style="opacity:0; z-index:1;" onChange="document.getElementById('file_clm').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:20px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_clm();">Upload Images</div></span>
					  
					 </div>	
					 </span>			
					 </div>	
									 
					 <div id="div_food" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Food</span>
					 <span style="float:left; margin-left:10px;  width:65%;">
					 <span style="float:left;"><textarea id="txtA_Food" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_food_prev('drpTemplate');">
					 </textarea></span>
					 	<div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_fd" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_fd" style="opacity:0; z-index:1;" onChange="document.getElementById('file_fd').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:20px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_fd();">Upload Images</div></span>
					  
					 </div>	
					 </span>
					 </div>
					 
					 <div id="div_stay" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Stay</span>
					 <span style="float:left; margin-left:10px;  width:65%;">
					 <span style="float:left;"><textarea id="txtA_Stay" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_stay_prev('drpTemplate');">
					 </textarea></span>
					      <div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_st" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_st" style="opacity:0; z-index:1;" onChange="document.getElementById('file_st').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:20px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_st();">Upload Images</div></span>
					  
					 </div>	
					 </span>
					 </div>	
							 	 
					 <div id="div_access" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Accessibility</span>
					 <span style="float:left; width:65%;">
					 <span style="float:left;"><textarea id="txtA_Access" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_accs_prev('drpTemplate');">
					 </textarea></span>
					     <div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_acc" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_acc" style="opacity:0; z-index:1;" onChange="document.getElementById('file_acc').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:20px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_acc();">Upload Images</div></span>
					  
					 </div>	
					 </span>
					 </div>	
					 
					 <div id="div_nearby" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">NearBy Places</span>
					 <span style="float:left; width:65%;">
					 <span style="float:left"><textarea id="txtA_NearBy" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_plc_prev('drpTemplate');">
					 </textarea></span>
					     <div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_nb" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_nb" style="opacity:0; z-index:1;" onChange="document.getElementById('file_nb').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:20px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_nb();">Upload Images</div></span>
					  
					 </div>	
					 </span>
					 </div>	
					 
					 <div id="div_blogLinks" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Blog Links</span>
					 <span style="float:left; width:65%;">
					 <span style="float:left"><textarea id="txtA_Blogs" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_blg_prev('drpTemplate');">
					 </textarea></span>
	     			 </span>
					 </div>
					 
					 <div id="div_othr" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Others</span>
					 <span style="float:left; margin-left:10px;  width:65%;">
					 <span style="float:left"><textarea id="txtA_Others" wrap="soft"  style="width:480px; height:70px;" onMouseOut="Write_othr_prev('drpTemplate');">
					 </textarea></span>
					    <div style="float:left; width:100%; margin-top:5px;">
					 <span style="float:left;">
				  <form  enctype="multipart/form-data" action="/upload/image" method="post">
                   <input type="text" id="file_oth" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile_oth" style="opacity:0; z-index:1;" onChange="document.getElementById('file_oth').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
</form>
</span><span style="float:left; margin-left:10px;"><div class="smallbtn" style="width:100px; background:#597272;" onClick="upload_pic_prev_oth();">Upload Images</div></span>
					  
					 </div>	
					 </span>
					 </div>
					 
					 <div id="div_imgs" align="left" style="float:left; margin-top:10px; position:relative; display:none;">
					 <span class="font-medium" style="width:22%;">Others</span>
					 <span style="float:left; margin-left:10px;  width:65%;"><input id="file_photos" type="file" />
					 </span>
					 </div>
					 
					<!-- <div style="width:100%; float:left;"><div class="smallbtn" style="width:80px">Submit</div></div>  -->
					
	                <div id="blg_prev" style="width:650px; height:360px; margin-top:3px; overflow-y:scroll; overflow-x:hidden; float:left; background:#ffffcc; box-shadow:2px 2px 2px grey; position:relative;">
					 <div style="width:100%; float:left; margin:10px 10px 10px 10px">
					   <span style="font-size:16px; font-family:'Lucida Calligraphy'; color:#b22; font-weight:bold;">Preview of your Blog</span>
					 </div>
					      
						  <div id="div_blog_preView" style="width:100%; float:left; margin:10px 10px 10px 10px">
						    <div align="left" id="div_title_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_title_prv_hdr" class="Note" style="width:15%;">Title</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left"><textarea id="txtA_Title_prev" style="height:60px;" disabled="disabled" wrap="soft"></textarea></span>
							 <span class="editBtn" style="margin-top:50px;" onClick="enable_txtA('txtA_Title_prev');">Edit</span>
							</span>										
						  </div>
						  
						  <div id="div_blog_preView" style="width:100%; float:left; margin:10px 10px 10px 10px">
						    <div align="left" id="div_loc_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_loc_prv_hdr" class="Note" style="width:15%;">Location</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left"><textarea id="txtA_Loc_prev" style="height:60px;" disabled="disabled" wrap="soft"></textarea></span>
							 <span class="editBtn" style="margin-top:50px;" onClick="enable_txtA('txtA_Loc_prev');">Edit</span>
							</span>										
						  </div>
						  
						  <div align="left" id="div_clm_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_clm_prv_hdr" class="Note" style="width:15%;">Climate</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left"><textarea id="txtA_Climate_prev" disabled="disabled" wrap="soft"></textarea></span>
							 <span class="editBtn" onClick="enable_txtA('txtA_Climate_prev');">Edit</span>
							</span>							
							<span style="float:left; margin-left:3px;width:20%;">
							<div><img id="img_clm" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg" onClick="editImg_clm();">Edit</span></div>
							 </span>						
						  </div>
						  
						  <div align="left" id="div_fd_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_fd_prv_hdr" class="Note" style="width:15%;">Food</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left;"><textarea id="txtA_Food_prev" disabled="disabled" wrap="soft"></textarea></span>							
							<span class="editBtn" onClick="enable_txtA('txtA_Food_prev');">Edit</span>
							</span>
							<span style="float:left; margin-left:3px;width:20%;">
							<div><img id="img_fd" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg" onClick="editImg_fd();">Edit</span></div>
							 </span>
						  </div>
						  
						  <div align="left" id="div_st_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_st_prv_hdr" class="Note" style="width:15%;">Stay</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left;"><textarea id="txtA_Stay_prev" disabled="disabled" wrap="soft"></textarea>
							</span>
							<span class="editBtn" onClick="enable_txtA('txtA_Stay_prev');">Edit</span>
							</span>
							<span style="float:left; margin-left:3px;width:20%;">
							<div><img id="img_st" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg" onClick="editImg_st();">Edit</span></div>
							 </span>
						  </div>
						  
						  <div align="left" id="div_acc_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_acc_prv_hdr" class="Note" style="width:15%;">Accessibility</span>
							<span class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left;"><textarea id="txtA_Access_prev" disabled="disabled" wrap="soft"></textarea>
							 </span>
							<span class="editBtn" onClick="enable_txtA('txtA_Access_prev');">Edit</span>
							</span>
							<span style="float:left; margin-left:3px;width:20%;">
							<div><img id="img_acc" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg" onClick="editImg_acc();">Edit</span></div>
							 </span>
						  </div>
						  
						  <div align="left" id="div_nb_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_nb_prv_hdr" class="Note" style="width:15%;">NearBy Places</span>
							<span  class="font-small" style="margin-left:10px; width:55%;">
							 <span style="float:left;"><textarea id="txtA_NearBy_prev" disabled="disabled" wrap="soft"></textarea>
							</span>
							<span class="editBtn" onClick="enable_txtA('txtA_NearBy_prev');">Edit</span>
							</span>
							<span style="float:left; margin-left:3px; width:20%;">
							<div><img id="img_nb" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg" onClick="editImg_nb();">Edit</span></div>
							 </span>
						  </div>
						  
						  <div align="left" id="div_blg_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_blg_prv_hdr" class="Note" style="width:15%;">Blog Links</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left;"><textarea id="txtA_Blogs_prev" disabled="disabled" wrap="soft"></textarea>
							</span>
							<span class="editBtn" onClick="enable_txtA('txtA_Blogs_prev');">Edit</span>
							</span>
						 </div>
						  
						  <div align="left" id="div_oth_prv" style="width:100%; float:left; display:none;">
						    <span id="sp_oth_prv_hdr" class="Note" style="width:15%;">Others</span>
							<span  class="font-small" style="margin-left:10px;width:55%;">
							 <span style="float:left;"><textarea id="txtA_Others_prev" disabled="disabled" wrap="soft"></textarea>
							</span>
							<span class="editBtn" onClick="enable_txtA('txtA_Others_prev');">Edit</span>
							</span>
							<span style="float:left; margin-left:3px; width:20%;">
							<div><img id="img_oth" src="" style="width:120px; height:100px;"></div>
							<div><span class="editImg"  onClick="editImg_oth();">Edit</span></div>
							 </span>
						  </div>
						  
						  </div>
					 <div style="float:left; width:100%; margin-bottom:3px;">					 
						  <span style="float:right; margin-right:10px;"><div class="smallbtn" style="width:50px;" onClick="show_block('div_access_prev_blogs');">Share</div></span>
						 <span style="float:right;"><div class="smallbtn" style="width:60px;" onClick="show_block('div_blogs_history');">Publish</div></span>
						     <span style="float:right;"><div class="smallbtn" style="width:50px;" onClick="write_blog();">Submit</div></span>
						  </div> 
						<div style="float:left; width:100%; z-index:10;">
						     <span style="float:right; margin-right:10px;">
							   <div id="div_access_prev_blogs" style="float:left; width:30%; height:130px; position:absolute; bottom:-120px; margin-bottom:5%; right:50px; background:#fff; display:none; box-shadow:2px 2px 2px grey; border-radius:3px;">
					    <div style="float:left; width:100%;" onClick="hide_block('div_access_prev_blogs');">
						<span style="float:right;"><img src="Images/cancelbtn.png" width="20px" height="20px" /></span></div>
						<div style="float:left; width:100%; margin-left:10px;">
						  <div style="float:left; width:100%;"><span class="font-small"><input type="checkbox" id="chkShare_onlyMe_blg" />Only Me</span></div>
						  <div style="float:left; width:100%;"><span class="font-small"><input type="checkbox" id="chkShare_frnds_blg" />Friends and Relatives</span></div>
						  <div style="float:left; width:100%;"><span class="font-small"><input type="checkbox" id="chkShare_all_blg" />Public</span></div>
						</div>
						<div style="float:left; width:100%;"><div class="smallbtn" style="width:50px; float:right; font-size:11px; margin-right:5px;">Submit</div></div>
					 </div>
							 </span>
						  </div>	
								   
					 </div>					 
					 </div>
									 
			       <div id="div_blogs_history" style="width:750px; display:none; height:550px; top:5px; overflow-y:scroll; overflow-x:hidden; float:left; background:#fff; box-shadow:2px 2px 2px grey; position:absolute;">
			    <div style="float:left; width:100%;" onClick="hide_block('div_blogs_history');">
				<span style="float:left; margin-left:5px; margin-top:10px;"><div class="smallbtn" style="width:50px;" onClick="edit_blog();">Edit</div></span>
				<span style="float:right; margin-right:10px;"><img src="Images/cancelbtn.png" width="30px" height="30px" /></span></div> 
				<div style="float:left; width:100%; margin:10px 10px 10px 10px;">
			<div align="center" style="float:left; width:100%;">
			   <span id="sp_blg_title" style="font-family:'Lucida Calligraphy'; font-size:20px; color:#0066ff;">Breathtaking Trekking in Mumbai 2012</span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:20px;">
			<span id="sp_blg_loc_hdr" class="Note" style="width:15%; color:#b22; ">Location</span>
			<span id="sp_blg_loc_desc" class="Note" style="float:left; width:55%;">Loghad located in Pune near Mumbai</span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:10px;">
			<span id="sp_blg_clm_hdr" class="Note" style="width:15%; color:#b22;">Climate</span>
			<span id="sp_blg_clm_desc" class="Note" style="float:left; width:55%;">Monsoon trekking is quite common in this place. The climate favors trekkers, but the wet mud is quit slippery so better use a trekking shoes and carry trekking accessaries like ropes, hooks etc.. to have a safe and fun-filled trek.</span>
			<span  style="float:left; width:20%; margin-left:5px;"><img id="img_blg_clm" src="Images/City_Images/CityScape_Bangalore/Cubbon park1_Parks_blr.jpg" width="160px" height="130px" /></span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_fd_hdr" class="Note" style="width:15%; color:#b22;">Food</span>
			<span id="sp_blg_fd_desc" class="Note" style="float:left; width:55%;">Food is completely Maharastrian, vada pav is commonly sold here by street vendors</span>
			<span style="float:left; width:20%; margin-left:5px;"><img  id="img_blg_fd" src="Images/City_Images/CityScape_Bangalore/Cubbon park3_Parks_blr.jpg" width="160px" height="130px" /></span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_st_hdr" class="Note" style="width:15%; color:#b22;">Stay</span>
			<span id="sp_blg_st_desc" class="Note" style="float:left; width:55%;">One can stay in xyz hotel which is in a reach of 50km radius from the trekking spot.</span>
			<span style="float:left; width:20%; margin-left:5px;"><img  id="img_blg_st" src="" width="160px" height="130px" /></span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_acc_hdr" class="Note" style="width:15%; color:#b22;">Accessibility</span>
			<span id="sp_blg_acc_desc" class="Note" style="float:left; width:55%;">One can have access to city bus stops, shops, hospitals, hotels at a distance of 56-60 Kms not within the radius of the spot.</span>
			<span style="float:left; width:20%; margin-left:5px;"><img   id="img_blg_acc" src="" width="160px" height="130px" /></span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_nb_hdr" class="Note" style="width:15%; color:#b22;">NearBy Places</span>
			<span id="sp_blg_nb_desc" class="Note" style="float:left; width:55%;">There are many other trekking spots near this place, and also quite a few water falls could be found. Makes a wonderful place for sightseeing.</span>
			<span style="float:left; width:20%; margin-left:5px;"><img  id="img_blg_nb" src="" width="160px" height="130px" /></span>
			</div>
			
		    <div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_lnk_hdr" class="Note" style="width:15%; color:#b22;">Blog links</span>
			<span id="sp_blg_lnk_desc" class="Note" style="float:left; width:55%;">Here are some blog links related to this spot...<br/>
			1.http://www.mumbai77.com/city/1025/adventures/monsoon-trekking/
			2.http://treksnearmumbai.blogspot.in/
			</span>
			<span style="float:left; width:20%; margin-left:5px;"><img  id="img_blg_blglnk" src="" width="160px" height="130px" /></span>
			</div>
			
			<div align="left" style="float:left; width:100%; margin-top:5px;">
			<span id="sp_blg_oth_hdr" class="Note" style="width:15%; color:#b22;">Others</span>
			<span id="sp_blg_oth_desc" class="Note" style="float:left; width:55%;">There are many other trekking spots near this place, and also quite a few water falls could be found. Makes a wonderful place for sightseeing.</span>
			<span style="float:left; width:20%; margin-left:5px;"><img  id="img_oth_nb" src="" width="160px" height="130px" /></span>
			</div>
			
			</div>
			</div>
							 
				
				 </div>
				 </div>
				 
				   <div id="Oth_Interests" style="float:left; width:100%;">
				       
					   <div id="div_btnInterests" style="float:left; width:98%; background:#ffffcc;">					        
					   </div>
					   
					   <div id="div_frames_trek" style="float:left; width:100%; display:none; height:500px; overflow:scroll;">
					      <span class="font-small" id="sp_frm1" style="margin-top:10px; font-size:16px;">Andy howell's trekking & backpacking pages</span>
						  <span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">24 September 2012</span>
					     
						  <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
						      <span class="font-medium" style="color:#444; float:none;">
						           	 <p>   Must be This Way on Tour: Scottish Trip Ramblings

03/10/2013 By andy 11 Comments
I’ve spent a fair amount of time over the last few days arranging the forthcoming trip to the Highlands. As ever, this has proved to be a fairly frustrating experience. Oh, to be planning a trip in France or Germany!
My biggest shock was the cost of the Sleeper Train, only discovered after two days of playing with a non functioning website. For two of us to take the sleeper to Fort William it would have cost £370 which seems to me quite an increase. Rather than do that we shall travel up the day before and stay in a Glasgow hotel before trotting up to Mallaig next morning.
Given that this alternative arrangement is £150 cheaper than the sleeper I’m left wondering whether the service is long for this world. My mate Humphrey points out that we are still in the Grouse season but surely corporate shooters don’t travel by sleeper?
Anyhow, all arrangements are now made. Other than the hills themselves trip highlights should be the Old Forge (again), Curlew Cottage (just down the road from and an alternative to the Tomdoun Hotel — will report back, staying with Sue and Neil in Netwonmore, a possible breakfast with Cameron McNeish, an overnight with Paul and Helen at Walk Highlands and two fine days of mayhem with Humphrey and Mary in Berwick.
Recently, I’ve been quite miserable at the thought that I haven’t been out much but I realise that in a few weeks I will have been walking in the Highlands four times in twelve months, which is not bad at all from Birmingham.
Still, I’m now mentally in the hills. The long range forecast suggests that they are expecting me. The forecast? Rain, rain and more rain.</p>
						  	  </span> 
						  </div>
						  
						  <span class="font-small" id="sp_frm1"  style="margin-top:10px; font-size:16px;">Trekking Alps</span>
						  <span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">11 April 2012</span>
						
						    <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
						      <span class="font-medium" style="color:#444; float:none;">
							 <p> TREKKING-ALPS.COM
trekking-alps.com - patented nature guide Trekking Alps - Hiking in the piedmontese AlpsCome to Italy and enjoy with Trekking Alps an amazing adventure in wonderful mountain settings. Trekking Alps offers customized hikes in the hearth of Europe for people loving the nature. Experience an amazing long hiking or spend an adventurous or relaxing week-end outdoor in one of our beautiful destinations in Italian Alps. You will find familiar enviroment and true emotions in the beautiful mountain valleys according to your interests: animal sighting, trekking peaks, hiking for families with children and visiting historical and cultural sites! Trekking Alps offers many activity with different degree of difficulty: find the perfect hiking for you!
Hiking Italian Alps: to boldly go where only few ones have gone before...in the heart of Europe.</p>
							  </span>
							  </div>
						  
						 			
				<span class="font-small" id="sp_frm1"  style="margin-top:10px; font-size:16px;">Ground Truth Trekking</span>
				<span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">9 October 2011</span>
						<!--  <iframe src="http://www.groundtruthtrekking.org/blog/" width="98%" height="250px" style="margin-top:10px;"></iframe>  -->
						 <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
						      <span class="font-medium" style="color:#444; float:none;">
						  I write with a pencil on a stack of Rite-In-The-Rain paper, awkwardly bound by wire. I write in an ugly printed scrawl. Huddled in my sleeping bag, I write to the accompaniment of my husband’s snores, and my childrens’ gentle sleeping breaths. I write to the hiss of blowing snow on nylon walls. I write as my toddler daughter crawls onto my lap to chew the paper. I write as my eyes close, falling asleep in the middle of a sentence. I write with hands dusted grey with glacial silt, and smelling of campfire smoke.

I squish mosquitoes onto the page. My stories share space with their bloody smears, with notes on tides and bush pilots and slashes tallying pounds of food. That notebook and pencil are some of my most precious possessions, in a backpack pared down to only the precious and necessary.

A month of journeying creates about twenty thousand words. I’ve written for 800 hundred expedition nights, and 8000 thousand miles of expedition wandering. All those years of wandering fill a cardboard box to overflowing. They become, laboriously, digital. Eventually, pieces of those stories find their way into the pages of a book.

I have a writing habit, and an adventuring habit. A habit of living on the edge of nowhere. And a habit of doing things that look, at first glance, to be impossible.

They are merely improbable.


Small Feet, Big Land: Adventure, Home and Family on the Edge of Alaska


“We left the whistling marmots behind. The wolverines. Fish. Berries. Fields of lupine and the rain-filled craters left by bears digging for their roots. Finally even the last of the alder bushes were behind us. The last ptarmigan droppings. The last moss. And then one last pile of bear scat, far out on a barren moraine. The rainbow of the living world had shrunk to black, gray, and white, pocked with holes of radiant turquoise. We had entered the ice.

“It began with Hig in the tent, stuffing a dry bag to the brim with eight- inch-long sticks, sawed from the dead branches of the last clump of alders we found. With me, gathering every object we owned from its improbable resting place—scattered by the storm’s whirlwind of tent-bound kids. Sleet fell on our roof with a distinctive heavy hiss, coating moss and rocks in patchy white. Miles behind and a few hundred feet above us, there was nothing but snow. It buried the burrows of marmots and the berries Katmai had searched out with such enthusiasm. The inexorable march of autumn was chasing us down to the sea.

“It began with one foot in front of the other, wedging my paper-thin shoe into crevices between moraine cobbles while Lituya napped on my chest. The shoe was only a sheath of fluorescent green mesh, nearly transparent to the blades of rock and chill of ice. It was designed for “barefoot running,” and I imagined a young, shorts-clad woman speeding over a mountain trail, unburdened by tents or babies. I loved the agile, slipper-like feel of the shoes, which added a tiny bit of grace to a system otherwise totally lacking it. But they weren’t built for a hundred miles of broken rock, and by the end of the trip, patches of Hig’s careful weaving nearly engulfed the muddy and faded fabric. In a similar pair of shoes, Hig was manhandling the packraft-bike wheel cart over the lumpy and shifting rocks, searching for smoother ground. My shoulders groaned just a little under the weight of the pack, which I knew would turn into a resounding complaint in a few hours. Neither the shoes, the raft, nor the packs were meant for what we were putting them through. Nothing ever was.

“It was just another camp move.”

—from Small Feet, Big Land: Adventure, Home and Family on the Edge of Alaska


Far from the glacier edge, we camped on a patch of mud large enough to partially protect our bed from the icy chill of the glacier. Blue ice all around lit the inside of the tent with a bizarre glow.

On that day, we moved camp a few miles across the rock-strewn ice of Malaspina Glacier, one of North America’s largest. On the days that surrounded it–two months of days without a building or road in sight–we moved a hundred. We carried our home, our food, our boat, and our two young children–through forests that grew on ice, around deep blue crevasses, and over surf-washed boulders.

I carried my notebook. I wrote in the dark, sometimes without even a headlamp, as the ideal of “solar power” ran up against the reality of “Alaska November.”

Before that, I carried my notebook along the coast of the Arctic Ocean, through driving rain and hair-raising bear encounters, eating whale blubber in villages eroding into the sea. We only had one child then–I carried him on my back, opposite my bulging pregnant belly.

Before children, I’d always believed that parents must straddle a wall–kid stuff on one side, adult stuff on the other, and babysitters the only way to cross between them. But there is no wall. I don’t need to write only for parents, because I don’t need to live only as a parent. We journey as a family, to places few adults have ever set foot, collecting experiences that would be amazing for anyone.

At home, I packed the notebooks away in their cardboard box. I don’t need them here. My home is waterproof. Digital friendly.

It is also, in modern America, improbable.


A heavy dump of wet snow brings the accumulation at the yurt up to 4 and a half feet.


						  </span>
						  </div>
					   </div>
					   
					   <div id="div_frames_snorkel" style="float:left; width:100%; display:none; height:500px; overflow:scroll;">
					      <span class="font-small" id="sp_frm1" style="margin-top:10px; font-size:16px;">Tropical Snorkeling</span>
						  <span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">9 September 2013</span>
					      <!-- <iframe src="http://www.andyhowell.info/trek-blog/" width="98%" height="250px" ></iframe>  -->
						  <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
						      <span class="font-medium" style="color:#444; float:none;">
							I wanted to share our experience with snorkeling Catalina Island, CA, specifically Lover's Cove and Avalon Underwater Park.

Living near the cold waters of southern California my wife and I have only snorkeled a few areas such as La Jolla Cove, Sandy Beach and La Jolla. Often I have read that Lover's Cove on Catalina Island was a must do on any snorkeler's list. So we planned a 3 day visit with the intent of snorkeling both Lover's Cove and Avalon Underwater Park. It is located 22 miles offshore from Long Beach, CA.

The 1st day at Avalon was spent with the usual check in's and scouting out the locations. Swells were small and water clarity was great from what we observed from the shore, Kelp Bass and Garibaldi were plentiful.

Day 2 we grabbed our gear and headed for Lover's Cove, an easy walk from almost any hotel in town. Swells were noticeably larger this day but water visibility was still good. There are picnic tables at the road which are good to use to gear up before hitting the beach.

Entering the water is via stairs down to a very rocky shore. You will need sandals or shoes to enter the beach area which at best consists of a few feet of river rock before the water line, no sand to be found. The cove is designated as a snorkeling only sight but the fine print is the cove belongs to the glass bottom boat tours and they have the right of way so be aware of this as you are swimming.

As for variety of fish we saw Garibaldi, Bass, Sheep Head, and maybe one or two other small common fish. What was the most exciting is that you get swarmed with them. Each tour boat that comes through the cove feeds the fish to draw them in for the tours. Consequently the fish figure you are there to feed them as well, which makes for great swimming and pictures. Also abundant was plant life including the kelp forest, sea fans, eel grass, and many others that I have not yet learned to identify. Water depths start shallow and go to around 20 feet in the cove.

Day 3 we went to Avalon Underwater Park which is also an easy walk from almost any hotel. Swells were even larger this day and water clarity was greatly reduced but visibility was still a good 50 feet or better.

Entering the water is done by a stairway located behind the Avalon Casino with plenty of areas to gear up. Walk down the stairs using the hand rails, the last few steps are slippery. At the bottom of the steps you can slip on your fins and kick out.

The fish and plant life were the same as what can be found in the cove. Water here is much deeper. The depths start at around 15 feet and quickly drop to around 100 a mere 30 feet from the stairs. Our map shows wrecks and other objects at the bottom in the deeper areas but due to the visibility we were not able to locate them.

Overall impressions were good but for our 1st snorkel at Catalina we did not see the variety we expected and the attitude of the locals was hit and miss. We would still recommend this trip as part of a vacation but not sure it would be worth it as a one day trip with the cost of the boat required to get you there at $75 per person round trip.
							  </span> 
						  </div>
						  
						  <span class="font-small" id="sp_frm1"  style="margin-top:10px; font-size:16px;">NatureFinder</span>
						  <span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">20 June 2012</span>
						<!--  <iframe src="http://www.trekking-alps.com/links-to-friend-websites" width="98%" height="250px"></iframe>  --->
						    <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
                                     <p>Glorious Flatworm
This past November in Raja Ampat our Oceanic Society snorkeling group was again treated to many macro sightings. Locating these wonderous creatures, flatworms and nudibranchs, was often very challenging. Many are less than 2 inches long, and while vibrantly colored are usually perfectly camouflaged among the sponges, sea squirts, and corals they may be found feeding upon. Much like last years sightings the diversity of what we encountered in this years expedition was often spectacular. The dramatic patterns and colors that these animals utilize is truly fantastic. I am sure that there were countless individuals that we missed, but fortunately we managed to spot quite a few. It was a great help to again have our local guide and expert, Dalton Ambat, searching along with us. </p>
							  </div>
						  
						 			
				<span class="font-small" id="sp_frm1"  style="margin-top:10px; font-size:16px;">Great Barrier Reef Diving, Snorkeling & Sailing Tours with Small, Fun Groups</span>
				<span class="font-small" id="sp_frm1" style="margin-top:10px; float:right;">9 May 2010</span>
						<!--  <iframe src="http://www.groundtruthtrekking.org/blog/" width="98%" height="250px" style="margin-top:10px;"></iframe>  -->
						 <div align="left" style="float:left; width:100%; height:auto; background:#ddd;">
						      <span class="font-medium" style="color:#444; float:none;">
						 Mother nature often gives us some amazing experiences, here two dolphins decided they would like to come and do some diving with us. These two friendly dolphins followed and interacted with our divers and snorkelers for quite a long time. Enjoying the interaction and playing along side our guests and tagging along with our divers. An encounter with a dolphin like this is a fantastic experience and will leave memories that last a lifetime.

Remember, we do not feed or do other activities to attract marine life, so this interaction is completely natural. Making the encounter even more special and truly appreciated. The Great Barrier Reef truly is a natural wonder of diverse and wonderful experiences to be had everyday. If you haven’t been yet you owe it to yourself and family come and experience it. It truly is one of the great wonders of the world and has to be seen to be believed. Yes I love this place! :)

For more photos check out our Tour Photos page or to come and experience the fantastic Great Barrier Reef have a look at our website.


						  </span>
						  </div>
					   </div>
					   
				   </div>
			 </span>  
			
			 </div>
		   </div>		      
		   
              <div id="div_myTripPic" style="display:none; width:100%; height:550px; background:#F5F5F5;">
			
			   <div style="float:left; width:100%; margin:2px 1px 2px 5px;">
		      
			    <span style="width:29%; height:550px; float:left; border-right:1px solid #bbb;">	
		          <div id="btn_Pay_Purchase" class="arrow_act"><span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY TRIP PICTURES</span></div>
				 
				     <div style="float:left; width:100%;  margin-top:10px;">
				   
				     <div style="float:left; width:100%;"><span class="font-medium">My Trip Album</span></div>
				    
					<table cellpadding="0" cellspacing="0" style="width:100%; font-size:12px; font-family:Calibri;">
				    <tr>
					<th width="100px" >Event <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					  <th width="100px"> Location <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					  <th width="70px"> Year <span style="cursor:pointer;"><img src="Images/dropdown_arrow_icon3.png" width="10px" height="10px" /></span>
					  <span style="cursor:pointer;"><img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></span>
					  </th>
					</tr>
					</table>
					
					<div align="left" style="float:left; margin-top:5px; cursor:pointer; height:200px; width:100%; overflow-y:scroll; overflow-x:hidden;">
			 	     	<table id="tab_album" width="100%" cellpadding="0" cellspacing="0" style="font-size:12px; font-family:Calibri;">
					<tr id="tr_alb_1" onClick="show_block('div_pics_selected'); change_tr_font('tr_alb_1','tr_alb_2');">
					  <td>Birthday</td>
					  <td>Mumbai</td>
					  <td>2012</td>
					</tr>
					<tr > <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr id="tr_alb_2" onClick="show_block('div_pics_selected'); change_tr_font('tr2','tr1');">
					  <td>Birthday</td>
					  <td>Delhi</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Anniver sary</td>
					  <td>Pune</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Reunion</td>
					  <td>Mumbai</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Rest & relax</td>
					  <td>Manali</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Birthday</td>
					  <td>Kolkatta</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Birthday</td>
					  <td>Bangalore</td>
					  <td>2013</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td></tr>
					<tr>
					  <td>Anniversary</td>
					  <td>Chandigarh</td>
					  <td>2012</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Reunion</td>
					  <td>Pune</td>
					  <td>2011</td>
					</tr>
					<tr> <td colspan="3"><div style="border-top:1px solid #ddd;"></div></td>	</tr>
					<tr>
					  <td>Rest & relax</td>
					  <td>Shimla</td>
					  <td>2011</td>
					</tr>
				  </table>
				  </div>
				
				</div>
				 
				    <div style="float:left; width:100%;">
				    <div align="left" style="float:left; width:100%; margin-top:20px;">
					   <span class="font-medium" style="float:left;">Add to your trip album</span>
					</div>
				 
				     <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Location
					   <select id="drpAlb_loc" style="width:100px; margin-left:5px;">
					     <option>Goa</option>
						 <option>Mumbai</option>
						 <option>Bangalore</option>
						 <option>Pune</option>
						 <option>Kashmir</option>
						 <option>Delhi</option>
					   </select> 
					</span>
				</div>
				
				    <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Events
					   <select id="drpAlb_Evt" style="width:100px; height:24px; margin-left:18px;" onChange="test_others();">
					     <option>Birthday</option>
						 <option>Outing</option>
						 <option>Anniversary</option>
						 <option>Wedding</option>
						 <option>Reunions</option>
						 <option>Festival</option>
						 <option>Others</option>
					   </select> 
					</span>
				 </div>
				 
			    	 <div id="other_evt" style="float:left; width:100%; display:none">
				   <span style="float:left; margin-left:72px;"><input type="text" id="txt_othr_ev"  class="txtbox_hol_ev" style="width:100px;"></span>
				   <span style="float: left; margin-left:2px;"><div class="smallbtn" style="width:40px; font-size:10px;" onClick="add_othr_ev_pic();">Add</div></span>
				 </div>
				 
				     <div style="width:100%; float:left; margin-top:5px;"> 
				    <span class="font-medium" style="float:left;">Year
					   <select id="drpAlb_yr" style="width:60px; margin-left:35px;">
					     <option>2013</option>
						 <option>2014</option>
						 <option>2015</option>
						 <option>2016</option>
						 <option>2017</option>
						 <option>2018</option>
					   </select> 
					</span>
					<span style="float: left; margin-left:2px;">
				<div class="smallbtn" style="width:40px; font-size:10px; float:right" onClick="Add_to_album_directry();">Submit</div></span>
				</div>
			 	</div>	
						
			     </span> 
			     				 
				 <span style="width:70%;float:right; margin-left:2px;">
				   
				   <div style="position:relative; width:100%; float:left;">
				    
		             <div id="div_pop_url" style="float:left; display:none; width:80%; margin-top:10px; height:400px;  overflow:scroll; position:absolute; background:#FFF; z-index:100; box-shadow:2px 2px 2px grey">
			<div style="height:20px; float:left; width:100%;">
			<span style="float:right; margin-right:3px;"><img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block('div_pop_url');"/></span></div>
			<div id="div_add_pic_url" style="float:left; width:100%; margin:10px 10px 10px 30px;">
			<div style="float:left;width:100%;">
			    <span class="font_medium">Url</span>
				<span style="float:left; margin-left:10px;"><input id="txtFile0" type="file" multiple="multiple" class="txtbox_crt" style="opacity:0.5;"/></span>				
				<span style="float:left; margin-left:5px"><div class="smallbtn" style="width:50px;" onClick="upload_img();">Upload</div></span>
				<span style="float:left; margin-left:5px"><div class="smallbtn" style="width:40px;" onClick="add_nxt_img();">Add</div></span>
				</div>
			</div>
					</div>
									 
				     <div id="div_pics_selected" style="float:right; width:100%; display:none">
				     <div style="float:left; width:100%; margin-top:5px;">
					  <span style="float:left;"><div class="smallbtn" style="width:130px;" onClick="show_block('div_pop_url');">Add from Desktop</div></span>
					    <span style="float:left; margin-left:5px;"><div class="smallbtn" style="width:100px;">Import from FB</div></span>
					</div>
				 
			         <div id="pics" style="float:right; width:100%; margin-top:3px; height:500px; overflow:scroll; box-shadow:2px 2px 2px #DDD; background:#F5F5F5;">
					       <span style="width:23%; float:left; margin-left:3px;">
						     <div id="img1" style="width:150px; height:120px; background:url('Images/City_Images/Commercial street_shopping_blr.jpg') no-repeat;" onClick="show_block('div_imgDesc'); show_block('div_greyBack');"></div>
						   </span> 
						   <span style="width:23%; float:left; margin-left:3px;">
						     <div id="img2" style="width:150px; height:120px; background:url('Images/City_Images/CityScape_Bangalore/amoeba_blr_kids.png') no-repeat;" onClick="show_block('div_imgDesc'); show_block('div_greyBack');"></div>
						   </span> 
						   <span style="width:23%; float:left; margin-left:3px;">
						     <div id="img3" style="width:150px; height:120px; background:url('Images/City_Images/CityScape_Bangalore/alianceFrancaise_cultural_blr.png') no-repeat;" onClick="show_block('div_imgDesc'); show_block('div_greyBack');"></div>
						   </span> 
						   <span style="width:23%; float:left; margin-left:3px;">
					 <div style="width:150px; height:120px; background:url('Images/City_Images/CityScape_Bangalore/ArishinaKunte_Nelamangala_blr_religious.png') no-repeat;" onClick="show_block('div_imgDesc'); show_block('div_greyBack');"></div>
						   </span> 
					 </div> 
					 
					 <div style="float:right; width:100%;">					    
						<span style="float:right; margin-left:5px;"><div class="smallbtn" style="width:100px;">Export to FB</div></span>
						<a href="#" onClick="
                                  window.open(
                          'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
                             'facebook-share-dialog', 
                          'width=626,height=436'); 
                                 return false;">
                  <span style="float:right; margin-left:5px;"><div class="smallbtn" style="width:120px;">Share on Facebook</div></span>
               </a>
						<span style="float:right; margin-left:5px;"><div class="smallbtn" style="width:70px;" onClick="show_block('div_access_prev');">Access</div></span>
					 </div>
					 
					 <div id="div_access_prev_pics" style="float:left; width:30%; height:130px; position:absolute; bottom:-120px; margin-bottom:5%; right:50px; background:#fff; display:none; box-shadow:2px 2px 2px grey; border-radius:3px;">
					    <div style="float:left; width:100%;" onClick="hide_block('div_access_prev_pics');">
						<span style="float:right;"><img src="Images/cancelbtn.png" width="20px" height="20px" /></span></div>
						<div style="float:left; width:100%; margin-left:10px;">
						  <div style="float:left; width:100%;"><span class="font-medium"><input type="checkbox" id="chkShare_onlyMe" />Only Me</span></div>
						  <div style="float:left; width:100%;"><span class="font-medium"><input type="checkbox" id="chkShare_frnds" />Friends and Relatives</span></div>
						  <div style="float:left; width:100%;"><span class="font-medium"><input type="checkbox" id="chkShare_all" />Public</span></div>
						</div>
						<div style="float:left; width:100%;"><div class="smallbtn" style="width:50px; float:right; font-size:11px; margin-right:5px;">Submit</div></div>
					 </div>
				
				   </div>
			
				 </div>
				 
				 </span>
				 
				 </div>
		
		     </div>
	           
		      <div id="div_myCredit" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		       <span style="width:20%; float:left;">
		       <div id="btn_Pay_Purchase" class="arrow_act"><span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY CREDIT POINTS</span></div>
			   <div style="width:100%; float:left; margin-top:10px; cursor:pointer" onClick="show_block('div_ptE'); hide_block('div_ptR'); hide_block('div_ptEf');">
			   <span id="lnk_ptE" class="font-medium" style="float:left; color:#0066FF;" onClick="lnk_clr('lnk_ptE','lnk_ptR','lnk_ptEf');">Points Earned</span></div>
			   <div style="width:100%; float:left; margin-top:10px; cursor:pointer" onClick="show_block('div_ptR'); hide_block('div_ptE'); hide_block('div_ptEf');">
			   <span id="lnk_ptR" class="font-medium" style="float:left; color:#0066FF;" onClick="lnk_clr('lnk_ptR','lnk_ptE','lnk_ptEf');">Points Redeemed</span></div>
			   <div style="width:100%; float:left; margin-top:10px; cursor:pointer" onClick="show_block('div_ptEf'); hide_block('div_ptR'); hide_block('div_ptE');">
			   <span id="lnk_ptEf" class="font-medium" style="float:left; color:#0066FF;" onClick="lnk_clr('lnk_ptEf','lnk_ptE','lnk_ptR');">Points Description</span></div>
			   </span>
			 <span style="width:75%; float:left; margin-left:10px;">
			      
				  <div id="div_ptE" style="float:left; width:100%; display:none;">
				     <table width="80%" height="auto" style="text-align:center;" border="1px">
					 <tr>
					     <th colspan="4" align="left" style="color:#FF0000; font-size:18px;">Points Earned</th>
				  </tr>
					   <tr>
					     <th> 
						   <select style="width:100px;">
						     <option>Month</option>
							 <option>January</option>
							 <option>February</option>
							 <option>March</option>
							 <option>April</option>
							 <option>May</option>
							 <option>June</option>
							 <option>July</option>
							 <option>August</option>
							 <option>Septempber</option>
							 <option>October</option>
							 <option>November</option>
							 <option>December</option>
						   </select>
						 </th>
						 <th> <select style="width:60px;">
						     <option>Year</option>
							 <option>2014</option>
							 <option>2015</option>
							 <option>2016</option>
							 <option>2017</option>
							 <option>2018</option>
							 <option>2019</option>
							 <option>2020</option>
					   </select></th>
						 <th>Carried from Previous Year</th>
						 <th>Total Outstanding</th>
					   </tr>
					   <tr>
					   <td>0</td>
					   <td>150</td>
					   <td>20</td>
					   <td>170</td>
					   </tr>
					 </table>
				  </div>
				  
				  <div id="div_ptR" style="float:left; width:100%; display:none;">
				     <table width="80%" height="auto" style="text-align:center;" border="1px">
					 <tr>
					     <th colspan="4" align="left" style="color:#FF0000; font-size:18px;">Points Redeemed</th>
				  </tr>
					   <tr>
					     <th> 
						   <select style="width:100px;">
						     <option>Month</option>
							 <option>January</option>
							 <option>February</option>
							 <option>March</option>
							 <option>April</option>
							 <option>May</option>
							 <option>June</option>
							 <option>July</option>
							 <option>August</option>
							 <option>Septempber</option>
							 <option>October</option>
							 <option>November</option>
							 <option>December</option>
						   </select>
						 </th>
						 <th> <select style="width:60px;">
						     <option>Year</option>
							 <option>2014</option>
							 <option>2015</option>
							 <option>2016</option>
							 <option>2017</option>
							 <option>2018</option>
							 <option>2019</option>
							 <option>2020</option>
					   </select></th>
					    </tr>
						<tr>
						<td >0</td>
						<td >150</td>
						</tr>
					 </table>
				  </div>
				  
				  <div id="div_ptEf" style="float:left; width:100%; display:none;">
				     <table width="100%" height="auto" >
					 <tr>
					     <th colspan="4" align="center" style="color:#FF0000; font-size:18px;">Points Description</th>
				     </tr>
					   <tr>
					      <th class="tabFontCredit" colspan="5" align="left" onClick="show_tr_block('tr_blog');" onDblClick="hide_tr_block('tr_blog');">
						  Blog Contribution <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
						  </tr>
						 <tr id="tr_blog" class="td_adv_exprt">
					     <td colspan="4">
						    <table width="100%" height="auto" border="1px">
							  <tr>
							    <th></th>
							    <th>Blog Title</th>
								<th>Date</th>
								<th>Blog</th>
								<th>Points Earned</th>
							 </tr>
							</table>
						 </td>
					   </tr>
					   <tr>
					      <th colspan="5" align="left" onClick="show_tr_block('tr_pic');" onDblClick="hide_tr_block('tr_pic');" class="tabFontCredit">
						  Trip Picture Sharing <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
						  </tr>
						 <tr id="tr_pic" class="td_adv_exprt">
					     <td colspan="4">
						    <table width="100%" height="auto"  border="1px">
							  <tr>
							    <th></th>
							    <th>Picture</th>
								<th>Date</th>
								<th>Picture</th>
								<th>Points Earned</th>
							 </tr>
							</table>
						 </td>
					   </tr>
					    <tr>
	<th colspan="5" align="left" onClick="show_tr_block('tr_hdr_pkg'); show_tr_block('tr_hdr_htl'); show_tr_block('tr_hdr_car');" onDblClick="hide_tr_block('tr_hdr_pkg'); hide_tr_block('tr_hdr_htl'); hide_tr_block('tr_hdr_car'); hide_tr_block('tr_pckg'); hide_tr_block('tr_htl'); hide_tr_block('tr_car');" class="tabFontCredit">Transaction<img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
						  </tr>
					  <tr id="tr_hdr_pkg" align="left" class="tabFontCredit" style="display:none; color:#b22;" onClick="show_tr_block('tr_pckg');" onDblClick="hide_tr_block('tr_pckg');">
							   <th>Package <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
							</tr>
							   <tr id="tr_pckg" class="td_adv_exprt">
							  <td colspan="4">
							    <table width="100%" height="auto"  border="1px">
								  <tr>
								    <th>Purchase</th>
									<th>Date</th>
									<th>Transaction</th>
									<th>Purchase Date</th>
									<th>Amount</th>
									<th>Points</th>
								  </tr>
								</table>
							  </td>
							</tr>
				<tr id="tr_hdr_htl" align="left" class="tabFontCredit" style="display:none; color:#b22;" onClick="show_tr_block('tr_htl');" onDblClick="hide_tr_block('tr_htl');">
							<th>Hotel <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
							</tr>
							<tr id="tr_htl" class="td_adv_exprt">
							  <td colspan="4">
							    <table width="100%"  border="1px">
								  <tr>
								    <th>Purchase</th>
									<th>Date</th>
									<th>Transaction</th>
									<th>Purchase Date</th>
									<th>Amount</th>
									<th>Points</th>
								  </tr>
								</table>
							  </td>
							</tr>
							<tr id="tr_hdr_car" align="left" class="tabFontCredit" style="display:none; color:#b22;" onClick="show_tr_block('tr_car');" onDblClick="hide_tr_block('tr_car');">
								<th>Car <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
			      			 </tr>
							 <tr id="tr_car" class="td_adv_exprt">
							  <td colspan="4">
							    <table width="100%" height="auto"  border="1px">
								  <tr>
								    <th>Purchase</th>
									<th>Date</th>
									<th>Transaction</th>
									<th>Purchase Date</th>
									<th>Amount</th>
									<th>Points</th>
								  </tr>
								</table>
							  </td>
							</tr>
					   <tr>
					      <th colspan="5" align="left" class="tabFontCredit" onClick="show_tr_block('tr_purc_pkg');" onDblClick="hide_tr_block('tr_purc_pkg');" >
						  Purchasing Package <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
						  </tr>
						 <tr id="tr_purc_pkg" class="td_adv_exprt">
					     <td colspan="4">
						    <table width="100%" height="auto" border="1px">
							  <tr>
							    <th></th>
						    </tr>
							</table>
						 </td>
					   </tr>
					   <tr>
					      <th colspan="5" align="left" onClick="show_tr_block('tr_gift');" onDblClick="hide_tr_block('tr_gift');" class="tabFontCredit">
						  Gifting <img src="Images/dropdown_arrow_icon2.png" width="10px" height="10px"></th>
						  </tr>
						 <tr id="tr_gift" class="td_adv_exprt">
					     <td colspan="4">
						    <table width="100%" height="auto" border="1px">
							  <tr>
							    <th></th>
							  </tr>
							</table>
						 </td>
					   </tr>
					 </table>
				  </div>
			 </span>  
		   </div>
		   
		      <div id="div_myForum" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		       
			   <span style="width:20%; float:left; margin-top:20px;">
		       
			   <div id="btn_myForum_in" class="arrow_act" onClick=" show_forum_discus(); chg_frm_hdr_btn('btn_myForum_in','btn_myActivity','btn_myExpertise');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY FORUM</span></div>
			   
			   <div id="btn_myActivity" class="arrow_box" onClick=" show_forum_myActi(); chg_frm_hdr_btn('btn_myActivity','btn_myForum_in','btn_myExpertise');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY ACTIVITY</span></div>
			   
			   <div id="btn_myExpertise" class="arrow_box" onClick=" show_forum_myExpert();chg_frm_hdr_btn('btn_myExpertise','btn_myForum_in','btn_myActivity');">
			   <span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">MY EXPERTISE</span></div>
			   </span>
			   
			   <span style="width:78%; float:left; margin-left:10px; margin-top:20px;">
			     
				 <div id="myForum_discus" style="float:left; width:100%; display:block;">
				 
				  <div id="frm_grps" style="width:100%; float:left;">
				    <span style="float:left; margin-left:10px;">
					<div class="div_forum_win" style="background:url('Images/post-it/yellow.png') no-repeat;"  onClick="show_block('adv_forum'); hide_block('frm_grps');">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_grn.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Adventure </span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum" >Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div></span>
					
					<span style="float:left; margin-left:10px;">
					<div class="div_forum_win" style="background:url('Images/post-it/blue.png')no-repeat;">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_Orange.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Beach </span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum">Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div></span>
					
					<span style="float:left; margin-left:10px;">
					<div class="div_forum_win" style="background:url('Images/post-it/pink.png') no-repeat;">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_brown.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Jungle </span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum">Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div></span>
					
					<span style="float:left; margin-left:10px;">
					   <div class="div_forum_win" style="background:url('Images/post-it/blue.png') no-repeat;">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_brown.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Camping</span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum">Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div>
					</span>
					
					<span style="float:left; margin-left:10px;">
					<div class="div_forum_win" style="background:url('Images/post-it/green.png') no-repeat;">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_grn.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Honeymoon </span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum">Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div></span>
					
					<span style="float:left; margin-left:10px;">
					<div class="div_forum_win" style="background:url('Images/post-it/yellow.png') no-repeat;">
					<div class="div_pin_pos">
					<div class="div_pin" style="background:url('Images/post-it/pin_Orange.png') no-repeat;"></div>
					</div>
					   <div style="width:100%; text-align:center; float:left; margin-top:20px;">
					   <span style="margin-top:50px;">Nature </span></div>
					   <div class="div_frm_slp_ltr">
					     <span class="sp_txt_forum">Active Topics [25]</span>
						 <span class="sp_txt_forum">Comments [50]</span>
						 <span class="sp_txt_forum">Participants [10]</span>
					   </div>
					</div></span>
					
					
					
				  </div>
				  
				  <div id="adv_forum" style="float:left; width:100%; display:none;">
				     
					 <div style="float:left; width:100%;">
					    <span style="width:74%; float:left;">
						    <div style="float:left; width:100%;">
							    <div class="topic_top">
								<span style="padding:15px 10px 10px 10px;">Adventure Forum </span>
								</div>
							</div> 
						  
						  <div style="float:left; width:100%; height:150px; margin-top:5px; background:#fff; overflow-y:scroll; overflow-x:hidden;">
						       <table id="tab_topic_adv" class="td_disc" width="100%">
							  <tr id="tr_adv0" onClick="show_block('thread1');" onDblClick="hide_block('thread1');">
							   <td class="td_name">Amit</td>
							   <td>Hi which is the best place for water sports?</td>
							   <td class="td_dateTime">24/02/2012 3:40pm</td>
							  </tr>
							  <tr id="tr_adv1" onClick="show_block('thread2');" onDblClick="hide_block('thread2');">
							   <td class="td_name">Preetam</td>
							   <th>Please suggest me some good places for mountaineering..</th>
							   <td class="td_dateTime">24/02/2012 3:40pm</td>
							  </tr>
							  <tr id="tr_adv2" onClick="comment('td0_adv2','td1_adv2','td2_adv2');">
							    <td id="td0_adv2" class="td_name">Pranav</td>
								<th id="td1_adv2"> which place is apt for skiing? </th>
								<td id="td2_adv2" class="td_dateTime">24/02/2012 3:40pm</td>
							  </tr>
							   <tr id="tr_adv3" onClick="comment('td0_adv3','td1_adv3','td2_adv3');">
							   <td id="td0_adv3" class="td_name">Ajith</td>
							   <th id="td1_adv3">Trekking in Wayanad.. A marvellous experience</th>
							   <td id="td2_adv3" class="td_dateTime">24/02/2012 3:40pm</td>
							  </tr>
							  <tr id="tr_adv4" onClick="comment('td0_adv4','td1_adv4','td2_adv4');">
							    <td id="td0_adv4" class="td_name">Mayank</td>
								<th id="td1_adv4">Want to visit Goa next week, can anyone suggest which beach is good for parasailing?</th>
								<td id="td2_adv4" class="td_dateTime">24/02/2012 3:40pm</td>
							  </tr>							   
						 </table>
						  </div>
						  <div style="width:100%; float:left; margin-top:3px;">
				<div class="smallbtn" style="width:90px; float:right; margin-right:10px; background:#FF0000; color:#fff; font-weight:500;" onClick="show_block('add_my_topic');">Add My Topic</div>
						  </div>
						  
						  <div id="div_cmt_threads" style="float:left; width:100%; height:300px; overflow:scroll; margin-top:15px;">
						  
						  <div id="thread1" style="float:left; width:100%; height:auto; max-height:200px; overflow-y:scroll; display:none; margin-top:10px;">
						  <div class="comments_sec">
							   <span class="td_name" style="float:left;">Amit: &nbsp;</span>
							   <span style="float:left; margin-left:10px;">Hi which is the best place for water sports?</span>
							   <span class="td_dateTime" style="float:left; margin-top:6px;"> &nbsp; &nbsp; 24/02/2012 &nbsp; 3:40pm</span>
							  </div>
						      
							    <table id="tab_thr1" class="td_disc_cmt" width="100%">
								  <tr>
								   <td class="td_name">Bindu</td>
								   <th>Hey U can visit Manali for rafting, its very thrilling.</th>
								   <td class="td_dateTime">24/02/2012 5.00pm</td>
								  </tr>
								  <tr>
								   <td class="td_name">Arnab</td>
								   <th>Well u can visit Goa, one can enjoy parasailing, skiing ..etc.</th>
								   <td class="td_dateTime">25/02/2012 2.00pm</td>
								  </tr>
								  <tr>
								   <td class="td_name">Shashank</td>
								   <th>U can also visit kerala, for best trekking... </th>
								   <td class="td_dateTime">25/02/2012 4.00pm</td>
								  </tr>
								</table>
								
								<div style="float:left; width:100%;">
								  <span class="td_name" style="float:left;">My Comment</span>
								  <span style="float:left; margin-left:10px;">
								  <textarea id="txtA_myCmt_th1" style="width:300px; height:50px;" onMouseOut="add_myComt(); errase('txtA_myCmt_th1');"></textarea></span>
								</div>
						  </div>
						 
						  <div id="thread2" style="float:left; width:100%; height:auto; max-height:200px; overflow-y:scroll;  display:none; margin-top:10px;">
						  <div class="comments_sec">
							   <span class="td_name" style="float:left;">Preetam: &nbsp;</span>
							   <span style="float:left;  margin-left:5px;">Please suggest me some good places for mountaineering..</span>
							   <span class="td_dateTime" style="float:left; margin-top:6px;"> &nbsp; 24/02/2012 3:40pm</span>
							  </div>
						      
							    <table class="td_disc_cmt" width="100%">
								  <tr>
								   <td class="td_name">Pranab</td>
								   <th>Hey U can visit pune for breath-taking experience.</th>
								   <td class="td_dateTime">24/02/2012 5.00pm</td>
								  </tr>
								  <tr>
								   <td class="td_name">Manas</td>
								   <th>Well u can visit Goa, one can enjoy skiing ..etc.</th>
								   <td class="td_dateTime">25/02/2012 2.00pm</td>
								  </tr>
								  <tr>
								   <td class="td_name">Harish</td>
								   <th>U can also visit kerala, for best mountaineering... </th>
								   <td class="td_dateTime">25/02/2012 4.00pm</td>
								  </tr>
								  <tr>
								   <td class="td_name">My Comment</td>
								   <th><textarea id="txtA_myCmt_th2" style="width:300px; height:50px;"></textarea> </th>
								   <td class="td_dateTime"><span id="curr_time_t2"></span></td>
								  </tr>
								</table>
						  
						  </div>
						
						  </div>
						</span>
						<span style="width:25%; float:left; margin-top:20px;">						
						   
						   <div style="float:left; width:100%; cursor:pointer; height:200px; overflow-y:scroll; overflow-x:hidden;">
						   
						    <div class="font-small" style="float:left; width:100%;">Current Forum Discussions</div>
						   
						    <marquee id="marq" direction="up" behavior="scroll" dir="ltr" scrollamount="5">
						      <table class="other_topics" width="100%" onMouseOver="stop_scroll();" onMouseOut="resume_scroll();">
							    <tr>
								<td class="td_name">Beaches</td>
								 <th>Malaysian Beaches</th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Jungle</td>
								 <th>African Forests</th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Wildlife</td>
								 <th>Bannerghatta national park</th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Wildlife</td>
								 <th>Sundarban</th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Desert</td>
								 <th>Sahara deserts </th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Camping</td>
								 <th>Manali summer camp </th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
								<tr>
								<td class="td_name">Coffee Estate</td>
								 <th>Munnar estates</th>
								 <td class="td_dateTime">26/10/2013 16:30</td>
								</tr>
							</table>
						  </marquee>
						 
						  </div>
						  
						    <div style="float:left; width:100%; background:#0066ff; height:300px;">
							  <div style="width:100%; height:80px; float:left; background:"></div>
							  <div style="width:100%; height:80px; float:left; background:"></div>
							  <div style="width:100%; height:80px; float:left; background:"></div>
							</div>
						
						</span>
					 </div>
				  </div>
				  
				  </div>
				  
				 <div id="myActivity" style="float:left; width:100%; display:none;">
				    <div style="float:left; width:100%; margin-bottom:3px;">
					  <span style="float:left; margin-left:5px;">
					  <div id="btn_myTopics" class="btn_semi_trapez_onFocus" onClick="show_block('tab_myTopics'); hide_block('tab_myComments'); chg_btn_class('btn_myTopics','btn_myAct');">My Topics</div></span>
					  
					  <span style="float:left; margin-left:5px;">
		<div id="btn_myAct" class="btn_semi_trapez" style="width:130px;" onClick="hide_block('tab_myTopics'); show_block('tab_myComments'); chg_btn_class('btn_myAct','btn_myTopics');">My Comments</div></span>
					</div>
					
					<div id="tab_myTopics" style="float:left; width:100%;">
				      <table id="tab_myAct_topics" class="font-medium" width="80%" cellpadding="0" cellspacing="0" style="text-align:left; color:#0066ff; cursor:pointer;">
						    <tr style="color:#fff; background:#0066cc;">
							  <th>Sl.No.</th>
							  <th>Forum Name</th>
							  <th>Topics </br>Initiated</th>
							  <th>Discussion Status</th>
							</tr>
							<tr onClick="show_adv_forum_topics();">
							  <td align="center">1</td>
							  <td>Adventure</td>
							  <td align="center">3</td>
							  <td>All Active</td>
							</tr>
							<tr>
							  <td align="center">2</td>
							  <td>Beach</td>
							  <td align="center">6</td>
							  <td>2 Active 4 Inactive</td>
							</tr>
						  </table>
					</div>
					
					<div id="tab_myComments" style="float:left; width:100%; display:none;">
				      <table id="tab_myAct_cmnts" class="font-medium" width="80%" cellpadding="0" cellspacing="0" style="text-align:left; color:#0066ff; cursor:pointer;">
						    <tr style="color:#fff; background:#0066cc;">
							  <th>Sl.No.</th>
							  <th>Forum Name</th>
							  <th>Total Topics</th>
							  <th>Participated </br> Topics</th>
							  <th>Discussion Status</th>
							</tr>
							<tr onClick="show_adv_forum_topics();">
							  <td align="center">1</td>
							  <td>Adventure</td>
							  <td align="center">25</td>
							  <td align="center">10</td>
							  <td>All Inactive</td>
							</tr>
							<tr>
							  <td align="center">2</td>
							  <td>Beach</td>
							  <td align="center">3</td>
							  <td align="center">0</td>
							  <td>1 Active 2 Inactive</td>
							</tr>
						  </table>
					</div>
				 </div> 
				 
				 <div id="myExpertise" style="float:left; width:100%; height:530px; overflow:scroll; display:none;">
				     <table style="width:100%; text-align:left" class="font-medium">
					 <tr style="color:#fff;">
					   <th width="190px" align="center" style="background:#fff; color:#555">Vacation Theme</th>
					   <th width="130px"  align="center" style="background:#CCE0FF;">New Explorer</th>
					   <th width="160px"  align="center" style="background:#99C2FF;">Limited Experience</th>
					   <th width="140px"  align="center" style="background:#66A3FF;">Widely Travelled</th>
					   <th width="130px"  align="center" style="background:#3385FF;">I'm an Expert</th>
					 </tr>
				   <tr style="background:#fcfcfc;"> 
				    <td><input type="checkbox" id="chkAdv_frm" onClick="chk_show_td('chkAdv_frm','td_adv1','td_adv2','td_adv3','td_adv4');"/><span style="margin-left:3px;">Adventure</span></td>
					<td  id="td_adv1" class="td_adv_exprt"><input type="radio" name="rdExp_adv"></td>
					<td  id="td_adv2"  class="td_adv_exprt"><input type="radio" name="rdExp_adv"></td>
					<td   id="td_adv3"  class="td_adv_exprt"><input type="radio" name="rdExp_adv"></td>
					<td  id="td_adv4"  class="td_adv_exprt"><input type="radio" name="rdExp_adv"></td>
					</tr>
					<tr style="background:#fff;">
					<td><input type="checkbox" id="chkBch_frm" onClick="chk_show_td('chkBch_frm','td_bch1','td_bch2','td_bch3','td_bch4');"/><span style="margin-left:3px;">Beaches</span></td>
					<td id="td_bch1"  class="td_adv_exprt"><input type="radio" name="rdExp_bch"></td>
					<td id="td_bch2"  class="td_adv_exprt"><input type="radio" name="rdExp_bch"></td>
					<td id="td_bch3"  class="td_adv_exprt"><input type="radio" name="rdExp_bch"></td>
					<td id="td_bch4" class="td_adv_exprt"><input type="radio" name="rdExp_bch"></td>
				  </tr>
				  <tr style="background:#fcfcfc;">
				    <td><input type="checkbox" id="chkDesert_frm" onClick="chk_show_td('chkDesert_frm','td_dsrt1','td_dsrt2','td_dsrt3','td_dsrt4');"/><span style="margin-left:3px;">Desert</span></td>
					<td id="td_dsrt1" class="td_adv_exprt"><input type="radio" name="rdExp_dsrt"></td>
					<td  id="td_dsrt2" class="td_adv_exprt"><input type="radio" name="rdExp_dsrt"></td>
					<td id="td_dsrt3" class="td_adv_exprt"><input type="radio" name="rdExp_dsrt"></td>
					<td id="td_dsrt4" class="td_adv_exprt"><input type="radio" name="rdExp_dsrt"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkjngl_frm" onClick="chk_show_td('chkjngl_frm','td_jngl1','td_jngl2','td_jngl3','td_jngl4');"/><span style="margin-left:3px;">Jungle</span></td>
					<td id="td_jngl1"  class="td_adv_exprt"><input type="radio" name="rdExp_jun"></td>
					<td id="td_jngl2"  class="td_adv_exprt"><input type="radio" name="rdExp_jun"></td>
					<td id="td_jngl3" class="td_adv_exprt"><input type="radio" name="rdExp_jun"></td>
					<td  id="td_jngl4" class="td_adv_exprt"><input type="radio" name="rdExp_jun"></td>
				   </tr>
				    <tr style="background:#fcfcfc;"> 
				    <td><input type="checkbox" id="chkSightsee_frm" onClick="chk_show_td('chkSightsee_frm','td_sgh1','td_sgh2','td_sgh3','td_sgh4');"/><span style="margin-left:3px;">Sightsee</span></td>
					<td id="td_sgh1" class="td_adv_exprt"><input type="radio" name="rdExp_sigh"></td>
					<td id="td_sgh2" class="td_adv_exprt"><input type="radio" name="rdExp_sigh"></td>
					<td  id="td_sgh3" class="td_adv_exprt"><input type="radio" name="rdExp_sigh"></td>
					<td id="td_sgh4"  class="td_adv_exprt"><input type="radio" name="rdExp_sigh"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkCityTour_frm" onClick="chk_show_td('chkCityTour_frm','td_city1','td_city2','td_city3','td_city4');"/><span style="margin-left:3px;">City Tour</span></td>
					<td  id="td_city1" class="td_adv_exprt"><input type="radio" name="rdExp_city"></td>
					<td  id="td_city2" class="td_adv_exprt"><input type="radio" name="rdExp_city"></td>
					<td   id="td_city3" class="td_adv_exprt"><input type="radio" name="rdExp_city"></td>
					<td  id="td_city4" class="td_adv_exprt"><input type="radio" name="rdExp_city"></td>
					 </tr>
					 <tr style="background:#fcfcfc;">
				    <td><input type="checkbox" id="chkHill_frm" onClick="chk_show_td('chkHill_frm','td_hill1','td_hill2','td_hill3','td_hill4');"/><span style="margin-left:3px;">Hill Station</span></td>
					<td id="td_hill1" class="td_adv_exprt"><input type="radio" name="rdExp_hill"></td>
					<td id="td_hill2"  class="td_adv_exprt"><input type="radio" name="rdExp_hill"></td>
					<td id="td_hill3"  class="td_adv_exprt"><input type="radio" name="rdExp_hill"></td>
					<td  id="td_hill4" class="td_adv_exprt"><input type="radio" name="rdExp_hill"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkNature_frm" onClick="chk_show_td('chkNature_frm','td_nat1','td_nat2','td_nat3','td_nat4');"/><span style="margin-left:3px;">Nature Escape</span></td>
					<td id="td_nat1" class="td_adv_exprt"><input type="radio" name="rdExp_ntr"></td>
					<td id="td_nat2" class="td_adv_exprt"><input type="radio" name="rdExp_ntr"></td>
					<td  id="td_nat3" class="td_adv_exprt"><input type="radio" name="rdExp_ntr"></td>
					<td id="td_nat4" class="td_adv_exprt"><input type="radio" name="rdExp_ntr"></td>
				   </tr>
				   <tr style="background:#fcfcfc;"> 
				    <td><input type="checkbox" id="chkWild_frm" onClick="chk_show_td('chkWild_frm','td_wild1','td_wild2','td_wild3','td_wild4');"/><span style="margin-left:3px;">Wild Life</span></td>
					<td id="td_wild1" class="td_adv_exprt"><input type="radio" name="rdExp_wild"></td>
					<td id="td_wild2"  class="td_adv_exprt"><input type="radio" name="rdExp_wild"></td>
					<td  id="td_wild3" class="td_adv_exprt"><input type="radio" name="rdExp_wild"></td>
					<td id="td_wild4"  class="td_adv_exprt"><input type="radio" name="rdExp_wild"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkRelg_frm" onClick="chk_show_td('chkRelg_frm','td_reg1','td_reg2','td_reg3','td_reg4');"/><span style="margin-left:3px;">Religious</span></td>
					<td id="td_reg1"  class="td_adv_exprt"><input type="radio" name="rdExp_rel"></td>
					<td id="td_reg2" class="td_adv_exprt"><input type="radio" name="rdExp_rel"></td>
					<td id="td_reg3"  class="td_adv_exprt"><input type="radio" name="rdExp_rel"></td>
					<td id="td_reg4"  class="td_adv_exprt"><input type="radio" name="rdExp_rel"></td>
					 </tr>
					 <tr style="background:#fcfcfc;">
			        <td><input type="checkbox" id="chkCofe_frm" onClick="chk_show_td('chkCofe_frm','td_cfe1','td_cfe2','td_cfe3','td_cfe4');"/><span style="margin-left:3px;">Coffee/Tea Estates</span></td>
					<td id="td_cfe1" class="td_adv_exprt"><input type="radio" name="rdExp_cfe"></td>
					<td id="td_cfe2" class="td_adv_exprt"><input type="radio" name="rdExp_cfe"></td>
					<td id="td_cfe3" class="td_adv_exprt"><input type="radio" name="rdExp_cfe"></td>
					<td  id="td_cfe4" class="td_adv_exprt"><input type="radio" name="rdExp_cfe"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkHM_frm" onClick="chk_show_td('chkHM_frm','td_hny1','td_hny2','td_hny3','td_hny4');"/><span style="margin-left:3px;">Honeymoon Escape</span></td>
					<td  id="td_hny1" class="td_adv_exprt"><input type="radio" name="rdExp_hnm"></td>
					<td  id="td_hny2" class="td_adv_exprt"><input type="radio" name="rdExp_hnm"></td>
					<td  id="td_hny3" class="td_adv_exprt"><input type="radio" name="rdExp_hnm"></td>
					<td id="td_hny4"  class="td_adv_exprt"><input type="radio" name="rdExp_hnm"></td>
				   </tr>
				   <tr style="background:#fcfcfc;"> 
				    <td><input type="checkbox" id="chkWtrSprt_frm" onClick="chk_show_td('chkWtrSprt_frm','td_wtsprt1','td_wtsprt2','td_wtsprt3','td_wtsprt4');" /><span style="margin-left:3px;">Water Sport</span></td>
					<td id="td_wtsprt1" class="td_adv_exprt"><input type="radio" name="rdExp_water"></td>
					<td  id="td_wtsprt2" class="td_adv_exprt"><input type="radio" name="rdExp_water"></td>
					<td id="td_wtsprt3"  class="td_adv_exprt"><input type="radio" name="rdExp_water"></td>
					<td id="td_wtsprt4"  class="td_adv_exprt"><input type="radio" name="rdExp_water"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkRF_frm" onClick="chk_show_td('chkRF_frm','td_rsv1','td_rsv2','td_rsv3','td_rsv4');" /><span style="margin-left:3px;">Reserve Forest</span></td>
					<td  id="td_rsv1" class="td_adv_exprt"><input type="radio" name="rdExp_res"></td>
					<td  id="td_rsv2" class="td_adv_exprt"><input type="radio" name="rdExp_res"></td>
					<td  id="td_rsv3" class="td_adv_exprt"><input type="radio" name="rdExp_res"></td>
					<td  id="td_rsv4" class="td_adv_exprt"><input type="radio" name="rdExp_res"></td>
					 </tr>
					 <tr style="background:#fcfcfc;">
				    <td><input type="checkbox" id="chkRmtGt_frm" onClick="chk_show_td('chkRmtGt_frm','td_rom1','td_rom2','td_rom3','td_rom4');" /><span style="margin-left:3px;">Romantic</span></td>
					<td  id="td_rom1" class="td_adv_exprt"><input type="radio" name="rdExp_rom"></td>
					<td id="td_rom2" class="td_adv_exprt"><input type="radio" name="rdExp_rom"></td>
					<td  id="td_rom3" class="td_adv_exprt"><input type="radio" name="rdExp_rom"></td>
					<td id="td_rom4" class="td_adv_exprt"><input type="radio" name="rdExp_rom"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkCamp_frm" onClick="chk_show_td('chkCamp_frm','td_camp1','td_camp2','td_camp3','td_camp4');"/><span style="margin-left:3px;">Camping</span></td>
					<td id="td_camp1" class="td_adv_exprt"><input type="radio" name="rdExp_camp"></td>
					<td id="td_camp2" class="td_adv_exprt"><input type="radio" name="rdExp_camp"></td>
					<td id="td_camp3" class="td_adv_exprt"><input type="radio" name="rdExp_camp"></td>
					<td  id="td_camp4" class="td_adv_exprt"><input type="radio" name="rdExp_camp"></td>
				   </tr>
				   <tr style="background:#fcfcfc;"> 
				    <td><input type="checkbox" id="chkRest_frm" onClick="chk_show_td('chkRest_frm','td_rst1','td_rst2','td_rst3','td_rst4');"/><span style="margin-left:3px;">Rest & Relaxing</span></td>
					<td id="td_rst1" class="td_adv_exprt"><input type="radio" name="rdExp_rest"></td>
					<td  id="td_rst2" class="td_adv_exprt"><input type="radio" name="rdExp_rest"></td>
					<td  id="td_rst3" class="td_adv_exprt"><input type="radio" name="rdExp_rest"></td>
					<td  id="td_rst4" class="td_adv_exprt"><input type="radio" name="rdExp_rest"></td>
					 </tr>
					 <tr style="background:#fff;">
					<td><input type="checkbox" id="chkAgri_frm" onClick="chk_show_td('chkAgri_frm','td_agr1','td_agr2','td_agr3','td_agr4');"/><span style="margin-left:3px;">Agri Tour</span></td>
					<td  id="td_agr1" class="td_adv_exprt"><input type="radio" name="rdExp_agri"></td>
					<td  id="td_agr2" class="td_adv_exprt"><input type="radio" name="rdExp_agri"></td>
					<td  id="td_agr3" class="td_adv_exprt"><input type="radio" name="rdExp_agri"></td>
					<td id="td_agr4"  class="td_adv_exprt"><input type="radio" name="rdExp_agri"></td>
					 </tr>
					 <tr style="background:#fcfcfc;">
				    <td><input type="checkbox" id="chkHist_frm" onClick="chk_show_td('chkHist_frm','td_hist1','td_hist2','td_hist3','td_hist4');"/><span style="margin-left:3px;">Historical</span></td>
					<td id="td_hist1" class="td_adv_exprt"><input type="radio" name="rdExp_hist"></td>
					<td  id="td_hist2" class="td_adv_exprt"><input type="radio" name="rdExp_hist"></td>
					<td  id="td_hist3" class="td_adv_exprt"><input type="radio" name="rdExp_hist"></td>
					<td id="td_hist4" class="td_adv_exprt"><input type="radio" name="rdExp_hist"></td>
				 </tr>
				 <tr>
				   <td colspan="5" align="right"><div class="smallbtn" style="width:60px; float:none;">Submit</div></td>
				 </tr>
				 </table>
				 </div>
				     
			   </span>  
			   
		      </div>
			  
			  <div id="div_support" style="display:none; width:100%; height:550px; background:#F5F5F5;">
		       <span style="width:20%; float:left;">
		       <div id="btn_Pay_Purchase" class="arrow_act"><span style="float:left; margin:13px 0px 0px 3px; color:#FFF;">SUPPORT</span></div>
			   </span>
			 <span style="width:78%; float:left; margin-left:10px;">
			     
				 <div style="width:100%; float:left;">
				    <span style="float:left;" onClick="show_section('div_req','div_qry','div_cmplt');">
					<div id="btn_sup_req" class="btn_semi_trapez_onFocus" onClick="chg_btn_class('btn_sup_req','btn_sup_qur','btn_sup_cmp'); ">Request</div></span>
					<span style="float:left;"  onClick="show_section('div_qry','div_req','div_cmplt');">
					<div id="btn_sup_qur" class="btn_semi_trapez" onClick="chg_btn_class('btn_sup_qur','btn_sup_req','btn_sup_cmp');">Query</div></span>
					<span style="float:left;"  onClick="show_section('div_cmplt','div_req','div_qry');">
					<div id="btn_sup_cmp" class="btn_semi_trapez" onClick="chg_btn_class('btn_sup_cmp','btn_sup_qur','btn_sup_req');">Complaint</div></span>
				 </div>
				 
				 <div id="div_req" style="width:100%; float:left; display:block;">
				    <table class="font-medium" style="width:100%; font-size:16px;">
				     <tr style="background:#0066ff; color:#fff">
					  <th width="160px">Description</th>
					  <th width="100px">Ref No.</th>
					  <th width="100px">Raised On</th>
					  <th width="100px">Resolved On</th>
					  <th width="100px">TAT</th>
					  <th width="100px">Status</th>
					 </tr>
					 <tr >
					  <td>Request to refund on cancellation</td>
					  <td>QCN123546.</td>
					  <td>20/10/2013</td>
					  <td>26/10/2013</td>
					  <td>6 days</td>
					  <td>Closed</td>
					 </tr>
				   </table>
				 </div>
				 
				 <div id="div_qry" style="width:100%; float:left; display:none;">
				    <table class="font-medium" style="width:100%; font-size:16px;">
				     <tr style="background:#0066ff; color:#fff">
					  <th width="160px">Description</th>
					  <th width="100px">Ref No.</th>
					  <th width="60px">Query Type</th>
					  <th width="100px">Raised On</th>
					  <th width="100px">Resolved On</th>
					  <th width="100px">Details</th>
					  <th width="100px">Status</th>
					 </tr>
					 <?php
				     $q_resp = "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, status from query_tab where query_by='".$_SESSION["userEmail"]."'";
					 $res_resp = mysqli_query($conn,$q_resp);
					 if($res_resp)
					 {
					 while($row = mysqli_fetch_array($res_resp))
					 {
					   echo '<tr>';
					   echo '<td>'.substr($row["query_comment"],0,20).'...</td>';
					   echo '<td>'.$row["query_id"].'</td>';
					   echo '<td>'.$row["query_type"].'</td>';
					   echo '<td>'.$row["query_date"].'</td>';
					   echo '<td>'.$row["response_date"].'</td>';
					   echo '<td><span style="float:left; color:#0066ff; cursor:pointer;" onclick="showQueryResp(\''.$row["query_id"].'\');">click here..</span></td>';
					   echo '<td>'.$row["status"].'</td>';
					   echo '</tr>';
					 }
					 }
					 
					 ?>
				   </table>
				 </div>
				 
				 <div id="div_cmplt" style="width:100%; float:left; display:none;">
				    <table class="font-medium" style="width:100%; font-size:16px;">
				     <tr style="background:#0066ff; color:#fff">
					  <th width="160px">Description</th>
					  <th width="100px">Ref No.</th>
					  <th width="100px">Raised On</th>
					  <th width="100px">Resolved On</th>
					  <th width="100px">TAT</th>
					  <th width="100px">Status</th>
					 </tr>
					 <tr >
					  <td>Complaint on not refund</td>
					  <td>QCN123546.</td>
					  <td>20/10/2013</td>
					  <td>26/10/2013</td>
					  <td>6 days</td>
					  <td>Closed</td>
					 </tr>
				   </table>
				 </div>
			
			 </span>  
		   </div>
         
		  </div>
		  
		  </div>	   
      	
 </div>
</div>

<div id="iframes">
<div id="iframe2" style="width:100%; height:100%; display:none; margin-bottom:10%">
			     <iframe src="ExploreDest_Cityscape.php" width="100%" height="700px" style="border:0xp; margin-bottom:10%;"></iframe>
			 </div>
			  
<div id="iframe1" style="width:100%; height:100%; display:none;  margin-bottom:10%">
			     <iframe src="Build_Trip.php" width="100%" height="700px" style="border:0xp;  margin-bottom:10%;"></iframe>
			 </div> 
			 
<div id="iframe_adv" style="width:100%; height:100%; display:none;  margin-bottom:10%">
			     <iframe src="Adventure_Tour.php" width="100%" height="700px" style="border:0xp;  margin-bottom:10%;"></iframe>
			 </div> 
			 
 <div id="iframe_bch" style="width:100%; height:100%; display:none;  margin-bottom:10%">
			     <iframe src="Beach_Tour.php" width="100%" height="700px" style="border:0xp;  margin-bottom:10%;"></iframe>
			 </div>

<div id="iframe_jngl" style="width:100%; height:100%; display:none;  margin-bottom:10%">
			     <iframe src="Jungle_Safari.php" width="100%" height="700px" style="border:0xp;  margin-bottom:10%;"></iframe>
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
