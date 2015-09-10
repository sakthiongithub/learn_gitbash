<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>QCN Employee</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<link rel="stylesheet" href="Stylesheets/qcnINT_styles.css" type="text/css" />

<script src="Javascript/qcn_INTRNLScript.js" type="text/javascript" language="javascript" ></script>
<script src="Javascript/PckToolAjax.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
</head>

<form name="frm" id="frm" method="post" enctype="multipart/form-data">
<body onload="upload_days();">

<?php include("PHP_Files/PHP_Connection.php");?>
	
<?php
$expl = false;
$post_log= false;
include("PHP_Files/qcn_internal_php.php");
if(isset( $_POST["txtWLID"]))
$_SESSION["WLID"] = $_POST["txtWLID"];

if(isset($_GET["login"]))
$login = $_GET["login"];

if(isset($_SESSION["userEmail"]))
{
$q_id = "select client_id from user_tab where user_email = '".$_SESSION["userEmail"]."' or user_id='".$_SESSION["userEmail"]."'";
$res_id = mysqli_query($conn,$q_id);
if($res_id)
{
 while($row = mysqli_fetch_array($res_id))
 {
   $_SESSION["clientID"] = $row["client_id"];
 }
}
}

?>

<div id="fixedHeader"> 	
		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace">			
				
			</div>
		
 		    <div id="header_rightbtn">
    
		     <div>
			  <span id="btnCustomer" class="smallbtn" style="width:90px; margin-right:3px; margin-bottom:3px; background:#F5F5F5; color:#B22222;">24x7 Support</span>
				<?php 
				if($post_log == false)
				{
				echo '<span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px; cursor:pointer;" onClick="show_block(\'div_cust_login\'); hide_block(\'div_reg\');">Login</span>';
				}
				else
				 {
			echo '<input type="submit" id="btnLogout" name="btnLogout" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px; cursor:pointer;" value="Logout" onclick="userLogout(\''.$_SESSION["clientID"].'\');" />'; 
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
		<a href="Missing_pets.php" target="_blank"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Missing Pets</span></a>	
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	
	</div>
	
<div id="body_container" style="margin-left:0%; width:95%;">

<!--------------------------
<div  id="div_reg_cmplt" <?php //if($thnk_reg == true){?> style="display:block;"<?php //} else {?> style="display:none;" <?php //} ?>>
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
<?php //echo $lnk ;?></span></div>
</div>

<div id="div_reg" class="regPop" <?php //if($post_log == true){?> style="display:none;"<?php //} else {?> style="display:block;" <?php //} ?>>
<div style="float:left; width:100%; margin-left:5px;">
  <span style="float:left; color:#fff;">Enter your email-id</span>
  <span style="float:left;margin-left:5px;"><input type="text" class="txtbox_Tab" id="txtReg_email" name="txtReg_email" style="width:200px; height:20px;" /></span>
  <span style="float:left; margin-left:5px;"><input type="submit" id="btnReg_eml" name="btnReg_eml" class="smallbtn" style="width:60px; height:22px;" /></span>
</div>

</div>  --------------------------------------->

<div id="div_cust_login" <?php if($post_log == true){?> style="display:none;"<?php } else {?> style="display:none;" <?php } ?>>
	
	  <div style="float:left; width:100%;">
	   <span style="float:right; margin-right:1px;">
	    <span onClick="hide_block('div_cust_login');" style="cursor:pointer; margin-right:10px;">X</span></span>
	</div>	
    
	  <div style="width:100%; margin:5px 5px 5px 10px; float:left;">
		   <table width="100%" cellpadding="1" cellspacing="0">
		     <tr>
			   <td>Login Id</td>
			   <td>:</td>
			   <td><input id="txtLogId_b2c" name="txtLogId_b2c" type="text" class="txtbox_Tab" style="width:200px; height:20px;"/></td>
			 </tr>
		     <tr>
			   <td>Password</td>
			   <td>:</td>
			   <td><input id="txtLogPwd_b2c" name="txtLogPwd_b2c" type="password" placeholder="123" class="txtbox_Tab" style="width:200px;  height:20px;" /></td>
			 </tr>
			 <tr>
			   <td colspan="3" align="left">
		<span id="sp_login" style="float:left; cursor:pointer; font-size:12px; color:#0066ff; text-decoration:underline;" onClick="reset_pwd_sus();"><?php echo $reset; ?></span>
	            <input type="submit" name="b2CLogin" id="b2CLogin" value="Login" class="smallbtn" style="width:60px; height:22px; float:right; margin-right:50px;" /></td>
			 </tr>
	       </table>
		</div> 

</div>

<div id="div_chngStus" class="popUp_imgs_leads" style="width:480px; height:270px; overflow:hidden; margin:20%; margin-top:10%;"></div>

<div  <?php if($post_log == true){?> style="float:left; width:100%; display:block;" <?php } else { ?> style="display:none;" <?php } ?> >

<span style="float:left; width:10%;">
<div <?php if($post_log == true){?> style="float:left; width:100%; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
   <span style="float:left; margin-left:10px; font-family:calibri; font-size:14px;">Welcome!! &nbsp;<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?> </span>
</div>
</span>

<span style="float:left; width:12%;">

<div id="div_frntBtns" style="float:left; width:100%; margin-top:30px;">

      <div <?php if($post_eml=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php }?>>
	    <span  onClick="headerBtn_Color('btn_Trfic','btn_Admin','btn_pay','btn_UserLogs','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_pay','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');">
		<div id="btn_Trfic"  class="arrow_box" onclick="showDiv('div_Traffic','div_Admin','div_Leads','div_Packages','div_Query','div_UserLogs','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Email Traffic</span></div></span>
	  </div>

      <div <?php if($post_logact=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_UserLogs','btn_pay','btn_Trfic','btn_Admin','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_UserLogs','btn_Trfic','btn_Admin','btn_pay','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');">
		<div id="btn_UserLogs" class="arrow_box" onclick="showDiv('div_UserLogs','div_Traffic','div_Admin','div_Leads','div_Packages','div_Query','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Login Activity</span></div></span>
	  </div>
	  
	  <div <?php if($post_social=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else {?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_social','btn_UserLogs','btn_pay','btn_Trfic','btn_Admin','btn_Leads','btn_Packages','btn_Query','btn_cancel','btn_register');" onMouseOver="headerBtn_Color('btn_social','btn_UserLogs','btn_Trfic','btn_Admin','btn_pay','btn_Leads','btn_Packages','btn_Query','btn_cancel','btn_register');">
		<div id="btn_social" class="arrow_box"  onclick="showDiv('div_socialMedia','div_Admin','div_UserLogs','div_Traffic','div_Leads','div_Packages','div_Query','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:12px;">Social Media Login</span></div></span>
	  </div>
	  
	  <div <?php if($post_admin=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_Admin','btn_Trfic','btn_pay','btn_UserLogs','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_Admin','btn_Trfic','btn_UserLogs','btn_pay','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');">
		<div id="btn_Admin"  class="arrow_box"  onclick="showInvPeriod('Tday'); showDiv('div_Admin','div_UserLogs','div_Traffic','div_Leads','div_Packages','div_Query','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">User Admin</span></div></span>
	  </div>
	  
	  <div <?php if($post_ld_qt=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_Leads','btn_pay','btn_Trfic','btn_Admin','btn_UserLogs','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_Leads','btn_Trfic','btn_Admin','btn_pay','btn_UserLogs','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');">
		<div id="btn_Leads" class="arrow_box"  onclick="showDiv('div_Leads','div_Admin','div_UserLogs','div_Traffic','div_Packages','div_Query','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Leads & Quotes</span></div></span>
	  </div>
	  
	  <div <?php if($post_pck=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php }?>>
	    <span onClick="headerBtn_Color('btn_Packages','btn_pay','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_Query','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_Packages','btn_Trfic','btn_Admin','btn_pay','btn_UserLogs','btn_Leads','btn_Packages','btn_Query','btn_social','btn_cancel','btn_register');">
		<div id="btn_Packages" class="arrow_box" onclick="showDiv('div_Packages','div_Leads','div_Admin','div_UserLogs','div_Traffic','div_Query','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Packages</span></div></span>
	  </div>
	  
	  <div <?php if($post_enq=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php }?>>
	    <span onClick="headerBtn_Color('btn_Query','btn_pay','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_Query','btn_Packages','btn_Trfic','btn_pay','btn_Admin','btn_UserLogs','btn_Leads','btn_Packages','btn_social','btn_cancel','btn_register');">
		<div id="btn_Query" class="arrow_box"  onclick="userEnquiry('Tday','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); showDiv('div_Query','div_Packages','div_Leads','div_Admin','div_UserLogs','div_Traffic','div_socialMedia','div_pay','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Enquiry</span></div></span>
	  </div>
	  
	  <div <?php if($post_pay=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else {?> style="display:none;" <?php }?>>
	    <span  onClick="headerBtn_Color('btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_social','btn_cancel','btn_register');" onMouseOver=" headerBtn_Color('btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_Packages','btn_social','btn_cancel','btn_register');">
		<div id="btn_pay"  class="arrow_box" onclick="showDiv('div_pay','div_Query','div_Packages','div_Leads','div_Admin','div_UserLogs','div_Traffic','div_socialMedia','div_cancel','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Payment</span></div></span>
	  </div>
	  
	  <div <?php if($post_cncl=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_cancel','btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_social','btn_register');" onMouseOver=" headerBtn_Color('btn_cancel','btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_Packages','btn_social','btn_register');">
		<div id="btn_cancel" class="arrow_box"  onclick="showDiv('div_cancel','div_pay','div_Query','div_Packages','div_Leads','div_Admin','div_UserLogs','div_Traffic','div_socialMedia','div_register');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Cancellation</span></div></span>
	  </div>
	  
	  <div <?php if($post_reg=="YES"){?> style="float:left; width:100%; color:#fff; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	    <span  onClick="headerBtn_Color('btn_register','btn_cancel','btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_social');" onMouseOver=" headerBtn_Color('btn_register','btn_cancel','btn_pay','btn_Query','btn_Packages','btn_Trfic','btn_Admin','btn_UserLogs','btn_Leads','btn_Packages','btn_social');">
		<div id="btn_register" class="arrow_box"  onclick="showDiv('div_register','div_cancel','div_pay','div_Query','div_Packages','div_Leads','div_Admin','div_UserLogs','div_Traffic','div_socialMedia'); show_block('div_user_reg');">
		<span style="float:left; margin:5px 0px 0px 10px; font-size:14px;">Register</span></div></span>
	  </div>			  
	  
</div>

</span>

<span style="float:left; width:78%;">

<div style="float:left; width:100%; background:#eee; height:500px; border-radius:5px;">

<!-------------------------------------------------------------- Email Traffic ------------------------------------------------------------------------->

<div id="div_Traffic" <?php if($post_eml=="YES" || $flag_reg==false){?>   style="float:left; width:100%; display:block;" <?php } else if($post_eml=="NO" || $flag_reg==false) {?> style="display:none;" <?php } ?>>

<div id="traffic_dtls" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="userYest(); trapz_clr_chng('btn_yest_trf','btn_tday_trf','btn_wkly_trf','btn_ytd_trf','btn_itd_trf','btn_mtd_trf');">
			   <span style="float:left;"><div  id="btn_yest_trf" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="userTday(); trapz_clr_chng('btn_tday_trf','btn_yest_trf','btn_wkly_trf','btn_ytd_trf','btn_itd_trf','btn_mtd_trf');">
			   <span style="float:left;"><div  id="btn_tday_trf" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="userWeek(); trapz_clr_chng('btn_wkly_trf','btn_yest_trf','btn_tday_trf','btn_ytd_trf','btn_itd_trf','btn_mtd_trf');">
			   <span  style="float:left;"><div id="btn_wkly_trf" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="userMTD(); trapz_clr_chng('btn_mtd_trf','btn_wkly_trf','btn_tday_trf','btn_yest_trf','btn_ytd_trf','btn_itd_trf','btn_sum_trf');">
			   <span  style="float:left;"><div id="btn_mtd_trf" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="userYTD(); trapz_clr_chng('btn_ytd_trf','btn_tday_trf','btn_yest_trf','btn_wkly_trf','btn_itd_trf','btn_mtd_trf');">
			   <span style="float:left;"><div  id="btn_ytd_trf" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="userITD(); trapz_clr_chng('btn_itd_trf','btn_tday_trf','btn_yest_trf','btn_wkly_trf','btn_ytd_trf','btn_mtd_trf');">
			   <span style="float:left;"><div id="btn_itd_trf" class="btn_semi_trapez">ITD</div></span></span>	   
	
			 </div>
			 
<div style="float:left; width:100%; margin-top:10px;">
<span style="float:left; margin-right:20px;">
 <span class="spFonts" style="margin-left:5px;">Sort By Date Range &nbsp;</span>
 <span class="spFonts">
<input type="text" class="txtbox_Tab" id="frmDateTrf" style="width:80px; height:20px;" placeholder="From Date" onclick="oDP.show(event,this.id,2); show_block('Calendar');" />&nbsp;to&nbsp;
 <input type="text" class="txtbox_Tab" id="toDateTrf" style="width:80px; height:20px;" placeholder="To Date" onclick="oDP.show(event,this.id,2); show_block('Calendar');"  />
 </span>
 <span style="float:left; margin-left:5px;"><input type="button" value="Submit" class="smallbtn" style="width:auto; padding:3px; height:22px;" onclick="sortDate();" /></span>
 </span>
 </div>			 

<div id="txt_trf_status" style="float:left; width:100%; margin-top:5px;">
<?php
  $q_pros = "select * from client_register where status='Prospect'";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register'";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='One-Time'";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp'";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);
?>
 <table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;"><?php echo $pros; ?></td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;"><?php echo $reg; ?></td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;"><?php echo $oneT; ?></td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;"><?php echo $act; ?></td>
 </tr>
 </table>
 
 <div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div id="div_trf_sts" style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed;">
	 <?php
	 $l =0 ;
	 $q_all ="select client_id, client_email, date_reg, status from client_register";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	  $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
	 ?>
   </table>
 </div> 
</div> 
 
 </div>


<!----------------------------------------------------------   Admin ----------------------------------------------------------------------------------->

<div id="div_Admin" style="float:left; width:100%; display:none;">

<div style="float:left; width:100%; height:30px;">
   <span style="float:left; width:50%; cursor:pointer;" class="spFonts" onclick="show_block('div_admin_cust'); hide_block('div_admin_b2b'); load_cust('<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>');">
 <div id="btn_cust" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="chng_bckgrnd('btn_cust','btn_b2b');">Customers</div></span>
   <span style="float:left; width:50%; cursor:pointer;" class="spFonts" onclick="show_block('div_admin_b2b'); hide_block('div_admin_cust'); load_b2b('<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>');">
<div id="btn_b2b" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="chng_bckgrnd('btn_b2b','btn_cust');">B2B Partners</div></span>
</div>

<div id="div_admin_cust" style="float:left; width:100%; display:none;">

 <div style="float:left; width:100%; margin-top:10px;">
  <span style="float:left; margin-left:5px;" class="spFonts">Search By</span>
  <span style="float:left; margin-left:30px;" class="spFonts">Email ID</span>
  <span style="float:left; margin-left:5px;" class="spFonts">
  <input type="text" id="txtCust_eml" class="txtbox_Tab" style="width:120px; height:22px;" onkeyup="sortCustEml(this.value,'<?php if(isset($_SESSION['userEmail'])) echo $_SESSION["userEmail"]; ?>');" /></span>
<!--  <span style="float:left; margin-left:20px;" class="spFonts">Name</span>
  <span style="float:left; margin-left:5px;" class="spFonts"><input type="text" id="txtCust_name" class="txtbox_Tab" style="width:120px; height:22px;" /></span> -->
  <span style="float:left; margin-left:20px;" class="spFonts">Date of Register</span>
  <span style="float:left; margin-left:5px;" class="spFonts"><input type="text" id="txtCust_dor" class="txtbox_Tab" style="width:70px; height:22px;" onclick="oDP.show(event,this.id,2); show_block('Calendar');" /></span>
   <span style="float:left; margin-left:5px;"><input type="button" value="Submit Date" class="smallbtn" style="width:auto; padding:3px; height:22px;" onclick="sortCustDor('txtCust_dor','<?php if(isset($_SESSION['userEmail'])) echo $_SESSION["userEmail"]; ?>');" /></span>
</div>

<div style="float:left; width:100%; border-top:1px dashed #999; margin-top:3px;"></div>

<div style="float:left; margin-top:10px; width:100%;">

  <table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">
    <tr style="background:#0066ff; color:#fff;">
	  <th width="50px" align="left">Client ID</th>
	  <th width="80px" align="left">Email ID</th>
	  <th width="60px" align="left">User ID</th>
	  <th width="50px" align="left">Date Registered</th>
	  <th width="50px" align="left">Date Activated</th>
	  <th width="50px" align="left">Status</th>
	  <th width="60px" align="left">Set Password</th>
	  <th width="50px" align="left">Change Status</th>
	</tr>
	</table>
	
  <div id="div_cust_sorts" style="float:left; margin-top:3px; width:100%; height:400px; overflow-y:scroll; overflow-x:hidden;">
	
</div>

</div>

</div>

<div id="div_admin_b2b" style="float:left; width:100%; display:none;">

 <div style="float:left; width:100%; margin-top:10px;">
  <span style="float:left; margin-left:5px;" class="spFonts">Search By</span>
  <span style="float:left; margin-left:30px;" class="spFonts">Email ID</span>
  <span style="float:left; margin-left:5px;" class="spFonts"><input type="text" id="txtB2B_eml" class="txtbox_Tab" style="width:120px; height:22px;" onkeypress="sortB2bUEml(this.value,'<?php if(isset($_SESSION['userEmail'])) echo $_SESSION["userEmail"]; ?>');" /></span>
  <span style="float:left; margin-left:20px;" class="spFonts">Client Company</span>
  <span style="float:left; margin-left:5px;" class="spFonts"><input type="text" id="txtB2B_comp" class="txtbox_Tab" style="width:120px; height:22px;" onkeypress="sortB2bComp(this.value,'<?php if(isset($_SESSION['userEmail'])) echo $_SESSION["userEmail"]; ?>');" /></span>
  <span style="float:left; margin-left:20px;" class="spFonts">Date of Register</span>
  <span style="float:left; margin-left:5px;" class="spFonts"><input type="text" id="txtB2B_dor" class="txtbox_Tab" style="width:70px; height:22px;" onclick="oDP.show(event,this.id,2); show_block('Calendar');" /></span>
  <span style="float:left; margin-left:5px;"><input type="button" value="Submit Date" class="smallbtn" style="width:auto; padding:3px; height:22px;" onclick="sortB2bDor('txtB2B_dor','<?php if(isset($_SESSION['userEmail'])) echo $_SESSION["userEmail"]; ?>');" /></span>
</div>

<div style="float:left; width:100%; border-top:1px dashed #999; margin-top:3px;"></div>

<div style="float:left; margin-top:10px; width:100%;">

  <table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">
    <tr style="background:#0066ff; color:#fff;">
	  <th width="50px" align="left">Client ID</th>
	  <th width="80px" align="left">Email ID</th>
	  <th width="60px" align="left">User ID</th>
	  <th width="60px" align="left">Client Tier<br/>(updatable)</th>
	  <th width="40px" align="left">Linked User</th>
	  <th width="50px" align="left">Date Registered</th>
	  <th width="50px" align="left">Date Activated</th>
	  <th width="40px" align="left">Status</th>
	  <th width="60px" align="left">Set Password</th>
	  <th width="50px" align="left">Change Status</th>
	</tr>
	</table>
	
  <div id="div_b2b_sorts" style="float:left; margin-top:3px; width:100%; height:400px; overflow-y:scroll; overflow-x:hidden;">
	
</div>

</div>

</div>

</div> 

<!--------------------------------------------------------------  Leads ----------------------------------------------------------------------------------------->

<div id="div_Leads"  style="float:left; width:100%; display:none;">

<div style="float:left; width:100%; height:30px;">
   <span style="float:left; width:50%; cursor:pointer;" class="spFonts" onclick="show_block('div_lead'); hide_block('div_quotes'); load_leads();">
 <div id="btn_leads" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="chng_bckgrnd('btn_leads','btn_quotes','btn_quotes');">Leads</div></span>
   <span style="float:left; width:50%; cursor:pointer;" class="spFonts" onclick="show_block('div_quotes'); hide_block('div_lead'); load_quotes();">
<div id="btn_quotes" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="chng_bckgrnd('btn_quotes','btn_leads','btn_leads');">Quotes</div></span>
</div>

<div id="div_lead" style="float:left; width:100%; margin-top:10px; display:none;"> 
 
<div style="float:left; width:100%; margin-top:20px;">
<span style="float:left; margin-left:5px;color:#ff0000;">Sort By:</span>
<span style="float:left; margin-left:25px;">Location:</span>
<span style="float:left; margin-left:5px;"><input type="text" id="txtLeadLoc" class="txtbox_Tab" style="width:200px;" onkeypress="show_leadLoc(this.value);" /></span>
<span style="float:left; margin-left:25px;">Date:</span>
<span style="float:left; margin-left:5px;"><input type="text" id="ldDt1" class="txtbox_Tab" style="width:80px;" onclick="oDP.show(event,this.id,2); show_block('Calendar');" placeholder="From Date" />&nbsp;to &nbsp;
 <input type="text" class="txtbox_Tab" style="width:80px;" id="ldDt2" placeholder="To Date" onclick="oDP.show(event,this.id,2); show_block('Calendar');" /></span>
   <span style="float:left; margin-left:5px;"><input type="button" value="Submit Date" class="smallbtn" style="width:auto; padding:3px; height:22px;" onclick="sortLeadDate();" /></span>
</div>

<div id="leads_prd" style="margin-top:5px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="periodic_leads('Yest'); trapz_clr_chng('btn_yest_lds','btn_tday_lds','btn_wkly_lds','btn_ytd_lds','btn_itd_lds','btn_mtd_lds');">
			   <span style="float:left;"><div  id="btn_yest_lds" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="periodic_leads('Tday'); trapz_clr_chng('btn_tday_lds','btn_yest_lds','btn_wkly_lds','btn_ytd_lds','btn_itd_lds','btn_mtd_lds');">
			   <span style="float:left;"><div  id="btn_tday_lds" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="periodic_leads('Week'); trapz_clr_chng('btn_wkly_lds','btn_yest_lds','btn_tday_lds,'btn_ytd_lds','btn_itd_lds','btn_mtd_lds');">
			   <span  style="float:left;"><div id="btn_wkly_lds" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="periodic_leads('MTD'); trapz_clr_chng('btn_mtd_lds','btn_wkly_lds','btn_tday_lds','btn_yest_lds','btn_ytd_lds','btn_itd_lds','btn_sum_lds');">
			   <span  style="float:left;"><div id="btn_mtd_lds" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="periodic_leads('YTD'); trapz_clr_chng('btn_ytd_lds','btn_tday_lds','btn_yest_lds','btn_wkly_lds','btn_itd_lds','btn_mtd_lds');">
			   <span style="float:left;"><div  id="btn_ytd_lds" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="periodic_leads('ITD'); trapz_clr_chng('btn_itd_lds','btn_tday_lds','btn_yest_lds','btn_wkly_lds','btn_ytd_lds','btn_mtd_lds');">
			   <span style="float:left;"><div id="btn_itd_lds" class="btn_semi_trapez">ITD</div></span></span>
			   
			 </div>

<div style="float:left; width:100%;">
 <table width="100%" cellspacing="0" cellpadding="1" class="spFonts" style="font-size:14px; table-layout:fixed;">
   <tr style="background:#0066ff; color:#fff;">
    <th width="50px" align="left">Client ID</th>
	<th width="50px" align="left">Lead ID</th>
	<th width="50px" align="left">Wishlist ID</th>
	<th width="100px" align="left">Locations</th>
	<th width="100px" align="left">Lead Gen Date</th>
	<th width="80px" align="left">Lead Expiry Date</th>
   </tr>
 </table>
</div> 

<div id="div_leads_tr" style="float:left; width:100%; margin-top:3px; height:300px; overflow-y:scroll; overflow-x:hidden;"> 

 </div>  

 
</div>

<div id="div_quotes" style="float:left; width:100%; display:none;"> 
 
<div style="float:left; width:100%; margin-top:20px;">
<span style="float:left; margin-left:5px; color:#ff0000;">Sort By:</span>
<span style="float:left; margin-left:25px;">Location:</span>
<span style="float:left; margin-left:5px;"><input type="text" id="txtQtLoc" class="txtbox_Tab" style="width:200px;" onkeypress="show_QtLoc(this.value)" /></span>
<span style="float:left; margin-left:25px;">Date:</span>
<span style="float:left; margin-left:5px;"><input type="text" id="txtQtDt1" class="txtbox_Tab" style="width:80px;" placeholder="From Date" onclick="oDP.show(event,this.id,2); show_block('Calendar');"  />&nbsp;to &nbsp; <input type="text" class="txtbox_Tab" style="width:80px;" id="txtQtDt2" placeholder="To Date" onclick="oDP.show(event,this.id,2); show_block('Calendar');" /></span>
<span style="float:left; margin-left:5px;"><input type="button" value="Submit Date" class="smallbtn" style="width:auto; padding:3px; height:22px;" onclick="sortQuoteDate();" />
</div>

<div id="Quote_prd" style="margin-top:5px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="periodic_Quote('Yest'); trapz_clr_chng('btn_yest_qt','btn_tday_qt','btn_wkly_qt','btn_ytd_qt','btn_itd_qt','btn_mtd_qt');">
			   <span style="float:left;"><div  id="btn_yest_qt" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="periodic_Quote('Tday'); trapz_clr_chng('btn_tday_qt','btn_yest_qt','btn_wkly_qt','btn_ytd_qt','btn_itd_qt','btn_mtd_qt');">
			   <span style="float:left;"><div  id="btn_tday_qt" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="periodic_Quote('Week'); trapz_clr_chng('btn_wkly_qt','btn_yest_qt','btn_tday_qt','btn_ytd_qt','btn_itd_qt','btn_mtd_qt');">
			   <span  style="float:left;"><div id="btn_wkly_qt" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="periodic_Quote('MTD'); trapz_clr_chng('btn_mtd_qt','btn_wkly_qt','btn_tday_qt','btn_yest_qt','btn_ytd_qt','btn_itd_qt','btn_sum_qt');">
			   <span  style="float:left;"><div id="btn_mtd_qt" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="periodic_Quote('YTD'); trapz_clr_chng('btn_ytd_qt','btn_tday_qt','btn_yest_qt','btn_wkly_qt','btn_itd_qt','btn_mtd_qt');">
			   <span style="float:left;"><div  id="btn_ytd_qt" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="periodic_Quote('ITD'); trapz_clr_chng('btn_itd_qt','btn_tday_qt','btn_yest_qt','btn_wkly_qt','btn_ytd_qt','btn_mtd_qt');">
			   <span style="float:left;"><div id="btn_itd_qt" class="btn_semi_trapez">ITD</div></span></span>
			   
			  </div>

<div style="float:left; width:100%;">
 <table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">
   <tr style="background:#0066ff; color:#fff;">
    <th width="50px" align="left">Client ID</th>
	<th width="80px" align="left">Company Name</th>
	<th width="50px" align="left">Quote ID</th>
	<th width="50px" align="left">Lead ID</th>
	<th width="100px" align="left">Locations</th>
	<th width="60px" align="left">Quote Date</th>
	<th width="60px" align="left">Quote Expiry Date</th>
   </tr>
 </table>
</div> 

 <div id="div_quotes_tr" style="float:left; width:100%; margin-top:3px; height:300px; overflow-y:scroll; overflow-x:hidden;"> 

 </div> 

   
</div>

</div> 


<!--------------------------------------------------------------- Query ------------------------------------------------------------------------------------------>

<div id="div_enq_pop" class="popUp_imgs_leads" style="width:500px; height:400px; overflow:hidden;">

</div>

<div id="div_qresp" class="popUp_imgs_leads" style="width:500px; height:auto; padding:10px; padding-bottom:20px; overflow:hidden;"></div>

<div id="div_Query" style="float:left; width:100%; display:none;">

<div style="float:left; width:100%;">
<span style="float:left; width:50%;">
<div id="btn_enquiry" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="show_block('div_Enquiry'); hide_block('Query_div'); chng_bckgrnd('btn_enquiry','btn_query','btn_query'); userEnquiry('Tday','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>');  ">Enquiry</div>
</span>
<span style="float:left; width:50%;">
<div id="btn_query" style="float:left; background:#597272; color:#fff; width:100%; height:30px; border:1px solid #fff; padding-top:3px; color:#fff; font-size:16px;" onclick="show_block('Query_div'); hide_block('div_Enquiry'); chng_bckgrnd('btn_query','btn_enquiry','btn_enquiry'); userQuery('Tday');">Query</div>
</span>
</div>

<div id="Query_div" style="float:left; width:100%; display:none; margin-top:5px; display:none;">
 <div id="query_dtls" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="userQuery('Yest'); trapz_clr_chng('btn_yest_query','btn_tday_query','btn_wkly_query','btn_ytd_query','btn_itd_query','btn_mtd_query');">
			   <span style="float:left;"><div  id="btn_yest_query" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="userQuery('Tday'); trapz_clr_chng('btn_tday_query','btn_yest_query','btn_wkly_query','btn_ytd_query','btn_itd_query','btn_mtd_query');">
			   <span style="float:left;"><div  id="btn_tday_query" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="userQuery('Week'); trapz_clr_chng('btn_wkly_query','btn_tday_query','btn_yest_query','btn_ytd_query','btn_itd_query','btn_mtd_query');">
			   <span  style="float:left;"><div id="btn_wkly_query" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="userQuery('MTD'); trapz_clr_chng('btn_mtd_query','btn_wkly_query','btn_tday_query','btn_yest_query','btn_ytd_query','btn_itd_query');">
			   <span  style="float:left;"><div id="btn_mtd_query" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="userQuery('YTD'); trapz_clr_chng('btn_ytd_query','btn_mtd_query','btn_wkly_query','btn_tday_query','btn_yest_query','btn_itd_query');">
			   <span style="float:left;"><div  id="btn_ytd_query" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="userQuery('ITD'); trapz_clr_chng('btn_itd_query','btn_ytd_query','btn_mtd_query','btn_wkly_query','btn_tday_query','btn_yest_query');">
			   <span style="float:left;"><div id="btn_itd_query" class="btn_semi_trapez">ITD</div></span></span>		   
	
			 </div>  

<div id="query_tab" style="float:left; width:100%; margin-top:10px;">

</div>			 


			 
</div>

<div id="div_Enquiry" style="float:left: width:100%; display:none;">

<div style="float:left; width:100%; margin-top:5px;">
<span class="spFonts" style="float:left; margin-left:5px; font-size:18px; font-weight:bold; color:#444;">Plan Your Trip - Enquiry</span>
</div>

<div id="enquiry_dtls" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="userEnquiry('Yest','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_yest_enq','btn_tday_enq','btn_wkly_enq','btn_ytd_enq','btn_itd_enq','btn_mtd_enq');">
			   <span style="float:left;"><div  id="btn_yest_enq" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="userEnquiry('Tday','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_tday_enq','btn_yest_enq','btn_wkly_enq','btn_ytd_enq','btn_itd_enq','btn_mtd_enq');">
			   <span style="float:left;"><div  id="btn_tday_enq" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="userEnquiry('Week','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_wkly_enq','btn_yest_enq','btn_tday_enq','btn_ytd_enq','btn_itd_enq','btn_mtd_enq');">
			   <span  style="float:left;"><div id="btn_wkly_enq" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="userEnquiry('MTD','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_mtd_enq','btn_wkly_enq','btn_tday_enq','btn_yest_enq','btn_ytd_enq','btn_itd_enq','btn_sum_enq');">
			   <span  style="float:left;"><div id="btn_mtd_enq" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="userEnquiry('YTD','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_ytd_enq','btn_tday_enq','btn_yest_enq','btn_wkly_enq','btn_itd_enq','btn_mtd_enq');">
			   <span style="float:left;"><div  id="btn_ytd_enq" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="userEnquiry('ITD','<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>'); trapz_clr_chng('btn_itd_enq','btn_tday_enq','btn_yest_enq','btn_wkly_enq','btn_ytd_enq','btn_mtd_enq');">
			   <span style="float:left;"><div id="btn_itd_enq" class="btn_semi_trapez">ITD</div></span></span>		   
	
			 </div>  

<div style="float:left; width:100%;">
  <div style="float:left; width:100%;">
  <table class="spFonts" width="98.5%" cellpadding="1" cellspacing="0" style="table-layout:fixed; color:#fff;">
    <tr style="background:#0066ff; color:#fff;">
	  <th width="80px" align="left">Enq_ID</th>
	  <th width="100px" align="left">Email ID</th>
	  <th width="60px" align="left">View Details</th>
	  <th width="70px" align="left">Viewed</th>
	  <th width="50px" align="left">Contacted</th>
	  <th width="120px" align="left">Comments</th>
	  <th width="80px" align="left">Status</th>
	 </tr>
  </table>
  </div>
  <div id="div_enq" style="float:left; width:100%; height:350px; overflow-y:scroll; overflow-x:hidden;">
     
  </div>
</div>			 

</div>

</div>

<!--------------------------------------------------------------- User Logs --------------------------------------------------------------------------------------->

<div id="div_user_logs" class="popUp_imgs_leads" style="width:800px; height:300px;">
  <div style="float:left; width:100%;">
    <span style="float:right; margin-right:1px;"><img src="Images/cancelbtn.png" width="30px" height="30px" onclick="hide_block('div_user_logs');" /></span>
  </div>
  <div id="user_log_tab" style="float:left; width:100%; margin-top:5px;">
     
  </div>
</div>
 
<div id="div_UserLogs"  style="float:left; width:100%; display:none;">

<div style="float:left; width:100%; margin-top:3px;">
  <span style="width:33%; float:left; margin-left:1px;">
  <div id="btn_b2b_log" class="spFonts" style="float:left; width:100%; height:25px; font-size:16px; background:#597272; color:#fff; cursor:pointer;" onclick="load_logs('B2B_Partner_Operator','Tday'); wrt_clnt('B2B_Partner_Operator'); chng_bckgrnd('btn_b2b_log','btn_b2c_log','btn_emp_log'); show_section('div_b2b_logs','div_b2c_logs','div_b2e_logs','div_b2e_logs','div_b2e_logs','div_b2e_logs');">B2B Partner</div></span>
  
  <span style="width:33%; float:left; margin-left:1px;">
<div id="btn_b2c_log" class="spFonts" style="float:left; width:100%; height:25px; font-size:16px; background:#597272;color:#fff; cursor:pointer;" onclick="load_logs('CUSTOMER','Tday'); wrt_clnt('CUSTOMER'); chng_bckgrnd('btn_b2c_log','btn_b2b_log','btn_emp_log'); show_section('div_b2c_logs','div_b2e_logs','div_b2b_logs','div_b2b_logs','div_b2b_logs','div_b2b_logs');">Customer</div></span>

  <span style="width:33%; float:left; margin-left:1px;">
  <div id="btn_emp_log" class="spFonts" style="float:left; width:100%; height:25px; font-size:16px; background:#597272;color:#fff; cursor:pointer;" onclick="load_logs('QCN EMPLOYEE','Tday'); wrt_clnt('QCN EMPLOYEE'); chng_bckgrnd('btn_emp_log','btn_b2c_log','btn_b2b_log'); show_section('div_b2e_logs','div_b2c_logs','div_b2b_logs','div_b2c_logs','div_b2c_logs','div_b2c_logs');">Internal Employees</div></span>
</div>
<span id="spClient" style="float:left; display:none;"></span>
<span id="spLogTime" style="float:left; display:none;"></span>

<div id="div_b2e_logs" style="float:left; width:100%; margin-top:10px; display:none;">
<div id="user_logsB2e_pf" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="periodic_logs('Yest'); trapz_clr_chng('btn_yest_userLog','btn_tday_userLog','btn_wkly_userLog','btn_ytd_userLog','btn_itd_userLog','btn_mtd_userLog');">
			   <span style="float:left;"><div  id="btn_yest_userLog" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="periodic_logs('Tday'); trapz_clr_chng('btn_tday_userLog','btn_yest_userLog','btn_wkly_userLog','btn_ytd_userLog','btn_itd_userLog','btn_mtd_userLog');">
			   <span style="float:left;"><div  id="btn_tday_userLog" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="periodic_logs('Week'); trapz_clr_chng('btn_wkly_userLog','btn_yest_userLog','btn_tday_userLog','btn_ytd_userLog','btn_itd_userLog','btn_mtd_userLog');">
			   <span  style="float:left;"><div id="btn_wkly_userLog" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="periodic_logs('Month'); trapz_clr_chng('btn_mtd_userLog','btn_wkly_userLog','btn_tday_userLog','btn_yest_userLog','btn_ytd_userLog','btn_itd_userLog','btn_sum_userLog');">
			   <span  style="float:left;"><div id="btn_mtd_userLog" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="periodic_logs('Year'); trapz_clr_chng('btn_ytd_userLog','btn_tday_userLog','btn_yest_userLog','btn_wkly_userLog','btn_itd_userLog','btn_mtd_userLog');">
			   <span style="float:left;"><div  id="btn_ytd_userLog" class="btn_semi_trapez">YTD</div></span></span>			   
			  <span onClick="periodic_logs('ITD'); trapz_clr_chng('btn_itd_userLog','btn_tday_userLog','btn_yest_userLog','btn_wkly_userLog','btn_ytd_userLog','btn_mtd_userLog');">
			   <span style="float:left;"><div id="btn_itd_userLog" class="btn_semi_trapez">ITD</div></span></span>	   
	
			 </div>

<div style="float:left; width:100%; height:400px; overflow-y:scroll; overflow-x:hidden;">
 <div id="b2e_logs2" style="float:left; width:100%;">
 
 
 </div>
</div>

</div>

</div>

<!----------------------------------------------------------  Packages -------------------------------------------------------------------------------------------->

<div id="div_Packages" style="float:left; width:100%; display:none;">
  
	     <div id="dashboard" class="font-medium" style="margin-top:15px; float:left; display:block;  color:#fff; cursor:pointer;">
		 
		 <div id="dashBrd_btns" style="float:left; width:100%; background:#bbb;">
	      
		  <span  style="float:left; margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_pck','div_dash_inv','div_dash_purc','div_dash_cancel','div_dash_cancel','div_dash_cancel');">
	   <div id="btn_dash_Package" class="top_subBtn" style="color:#ff0000;" onClick="showPostPeriod('Tday'); show_btn_color('btn_dash_Package','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Cancel','');">Packages Posted</div></span></span>
		  
		  <span  style="float:left;  margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="showPurcPeriod('Tday'); show_section('div_dash_purc','div_dash_inv','div_dash_cancel','div_dash_pck','div_dash_pck','div_dash_pck');">
	 <div id="btn_dash_Purchase" class="top_subBtn" onClick="show_btn_color('btn_dash_Purchase','btn_dash_Inventory','btn_dash_Cancel','btn_dash_Package','');">Purchase</div></span></span>
	   
	     <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="showInvPeriod('Tday'); show_section('div_dash_inv','div_dash_purc','div_dash_cancel','div_dash_pck','div_dash_pck','div_dash_pck');">
	   <div id="btn_dash_Inventory" class="top_subBtn"  onClick="show_btn_color('btn_dash_Inventory','btn_dash_Purchase','btn_dash_Cancel','btn_dash_Package','');">Inventory</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="showCnclPeriod('Tday'); show_section('div_dash_cancel','div_dash_purc','div_dash_inv','div_dash_pck','div_dash_pck','div_dash_pck');">
	   <div id="btn_dash_Cancel" class="top_subBtn" onClick="show_btn_color('btn_dash_Cancel','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Package','');">Cancellation</div></span></span>
   
	  </div>	   
	  
	  		 
		 </div>	  
			 
		 <div id="div_dash_pck" style="float:left; width:100%">
		    
			 <div id="post_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="showPostPeriod('Yest'); trapz_clr_chng('btn_yest_dash','btn_tday_dash','btn_wkly_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_yest_dash" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			  <span onClick="showPostPeriod('Tday'); trapz_clr_chng('btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_tday_dash" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="showPostPeriod('Week'); trapz_clr_chng('btn_wkly_dash','btn_yest_dash','btn_tday_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span  style="float:left;"><div id="btn_wkly_dash" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="showPostPeriod('MTD');  trapz_clr_chng('btn_mtd_dash','btn_wkly_dash','btn_tday_dash','btn_yest_dash','btn_ytd_dash','btn_itd_dash','btn_sum_dash');">
			   <span  style="float:left;"><div id="btn_mtd_dash" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="showPostPeriod('YTD'); trapz_clr_chng('btn_ytd_dash','btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_ytd_dash" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="showPostPeriod('ITD'); trapz_clr_chng('btn_itd_dash','btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_ytd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div id="btn_itd_dash" class="btn_semi_trapez">ITD</div></span></span>
	
			 </div>
			 
			 <div style="float:left; width:100%;"> 
			
			<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:99%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">
				<tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th  width="100px">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Package Posted<br/>
					  <span style="float:left; margin-left:3px;"> Date
					  <img src="Images/collapse_icon_up.png" width="12px" height="12px" style="margin-left:2px; cursor:pointer;" onClick="sortpostDate('Asc');" /></span>
					<span style="float:left; margin-left:2px; cursor:pointer;">
					<img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostDate('Desc');" /></span>	</span> 			  
					  </div>
					    <div style="float:left;width:100%;">
						<span style="float:left;">
						<select id="drpPurch_date" name="drpPurch_date" style="font-size:12px; width:80px;" onChange="sortpostDate(this.value);">
   						<?php 
						 $q_date = "select distinct(DATE_FORMAT(`pck_date`,'%d-%m-%Y')) as pck_date from b2b_pck_crt";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {
						     echo '<option value="'.$row["pck_date"].'">'.$row["pck_date"].'</option>';
						   }
						 }
						?>
					     </select></span>
				        <span style="float:left; margin-left:0px; margin-top:2px;">
						<select id="drpDash_mnth" name="drpDash_mnth" style="font-size:12px; height:20px;  width:30px;" onChange="sortpostMY();">
						<option value="<?php echo date('m') ?>"><?php echo date('m');?></option>
		     			<?php 
						 $q_date = "select distinct(month(pck_date)) as month from b2b_pck_crt";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {
						   if($row["month"] !== date('m'))	
						    echo '<option value="'.$row["month"].'">'.$row["month"].'</option>';
						   }
						 }
						?>
						</select>
						<select id="drpDash_year" name="drpDash_year" style="font-size:12px;  height:20px;  width:50px;" onChange="sortpostMY();">
						<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
						<?php
						 $q_date = "select distinct(year(pck_date)) as year from b2b_pck_crt";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {	
						    if($row["year"] !== date('Y'))					    
						    echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
						   }
						 }
						?>
						</select>
						</div>
						</th>
						
						<th width="100px">Partner Name</th>
					  
					  <th width="120px"><span style="float:left;">Package Name</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpostName('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostName('Desc');" /></span>				  
					  </th>
					 
					  <th width="100px">
					  <span style="float:left;">Duration</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpostDur('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostDur('Desc');" /></span>		
					    </th>
					 
					  <th width="120px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package Price</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpostprc('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostprc('Desc');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:5px;">
					  <select id="drpDashPrice" name="drpDashPrice" style="width:100px;" onChange="sortpostprc(this.value);">
					    <option>0-5000</option>
						<option value="5000-10000">5000-10000</option>
						<option value="10000-15000">10000-15000</option>
						<option value="15000-20000">15000-20000</option>
						<option value="20000-25000">20000-25000</option>
						<option value="25000-30000">25000-30000</option>
						<option value="30000-35000">30000-35000</option>
						<option value="350000-40000">35000-40000</option>
						<option value="40000-50000">40000-50000</option>
						<option value="50000-60000">50000-60000</option>
					  </select>
					</span>
					  </div>
					  </th>
					  
					  <th width="150px"><span style="float:left;">Vacation Type</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpostVac('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostVac('Desc');" /></span>					  
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash" name="drpVacTh_dash" style="width:130px; font-size:14px;" onChange="sortpostVac(this.value);">
			  <option>---Themes---</option>
			<?php
			    $q_vac = "select vac_title from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				if($res_vac)
				{
				  while($row = mysqli_fetch_array($res_vac))
				  {
				    echo '<option value="'.$row["vac_title"].'">'.$row["vac_title"].'</option>';
				  }
				}
			 ?> 
			 </select>
			  </span>
					  </div>
					  </th>
					  
					  <th width="100px" style="position:relative;"><div style="float:left;width:100%;">
					  <span style="float:left;">Location</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpostLoc('Asc')();" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpostLoc('Desc')();" /></span></div>
					  <div style="float:left;width:100%;">
					   <input id="searchPck" name="searchPck" type="text" class="searchPck" style="width:100px; height:20px; color:#555; font-size:14px; " placeholder="Enter City Name" onKeyUp="toUpper(this.id);" onkeypress="sortpostLoc(this.value);" /> 
					  </div>
					  <div id="resultPck" style="position:absolute; top:40px; z-index:10000; width:180px; background:#fff; border:1px solid #666; font-size:12px;"></div>
					  </th>
					</tr>
					</table>
					
			</div>	
						      
			 <div id="post_sum_tabs" style="float:left; display:block; width:100%; height:400px;  background:#eee; overflow-y:scroll; overflow-x:hidden; margin-bottom:10%; border:1px solid #EEE;">
    			  
			  </div>
		 
		 </div>
	 
		 <div id="div_dash_purc" style="display:none; float:left; width:100%">
		 
		   <div id="purc_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="showPurcPeriod('Yest'); trapz_clr_chng('btn_yest_purc','btn_tday_purc','btn_wkly_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_yest_purc" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			  <span onClick="showPurcPeriod('Tday'); trapz_clr_chng('btn_tday_purc','btn_yest_purc','btn_wkly_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_tday_purc" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="showPurcPeriod('Week'); trapz_clr_chng('btn_wkly_purc','btn_yest_purc','btn_tday_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span  style="float:left;"><div id="btn_wkly_purc" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="showPurcPeriod('MTD');  trapz_clr_chng('btn_mtd_purc','btn_wkly_purc','btn_tday_purc','btn_yest_purc','btn_ytd_purc','btn_itd_purc','btn_sum_purc');">
			   <span  style="float:left;"><div id="btn_mtd_purc" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="showPurcPeriod('YTD'); trapz_clr_chng('btn_ytd_purc','btn_tday_purc','btn_yest_purc','btn_wkly_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_ytd_purc" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="showPurcPeriod('ITD'); trapz_clr_chng('btn_itd_purc','btn_tday_purc','btn_yest_purc','btn_wkly_purc','btn_ytd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div id="btn_itd_purc" class="btn_semi_trapez">ITD</div></span></span>
	
			 </div>  
			
			<div style="float:left; width:100%;"> 
			
			<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:99%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">
			
			<tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th width="90px">
					
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Purchase Date</span> 
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpurcDate('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpurcDate('Desc');" /></span>				  
					  </div>
					
					  <div style="float:left;width:100%;">
						<span style="float:left;">
						<select id="drpPurch_date_purc" name="drpPurch_date_purc" style="font-size:12px; width:80px;" onChange="sortpurcDate(this.value);">
   						<?php 
						 $q_date = "select distinct(DATE_FORMAT(date_of_purchase,'%d-%m-%Y')) as purc_date from buy_pck ";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {
						     echo '<option value="'.$row["purc_date"].'">'.$row["purc_date"].'</option>';
						   }
						 }
						?>
					   </select></span>
				        <span style="float:left; margin-left:0px; margin-top:2px;">
						<select id="drpDash_mnth_purc" name="drpDash_mnth_purc" style="font-size:12px; height:20px;  width:auto;" onChange="sortpurcMY();">
						<option value="<?php echo date('m'); ?>"><?php echo date('m'); ?></option>
		     			<?php
						 $q_date = "select distinct(month(date_of_purchase)) as month from buy_pck";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {
						    echo '<option value="'.$row["month"].'">'.$row["month"].'</option>';
						   }
						 }
						?>
					   </select>
						<select id="drpDash_year_purc" name="drpDash_year_purc" style="font-size:12px;  height:20px;  width:auto;" onchange="sortpurcMY();">
						<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
						<?php
						 $q_date = "select distinct(year(date_of_purchase)) as year from buy_pck";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {						    
						    echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
						   }
						 }
						?>
					</select>
						</div>
						
						</th>
						
						<th width="100px">
						
						<div style="float:left;width:100%;">
					  <span style="float:left;">Location</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpurcLoc('Asc');" /></span>
					<span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpurcLoc('Desc');" /></span></div>
					  <div style="float:left;width:100%;">
					   <input id="searchPck_purc" name="searchPck_purc" type="text" class="searchPck" style="width:90px; height:20px; color:#555; font-size:12px; " placeholder="Enter City Name" onKeyUp="toUpper(this.id);" onkeypress="sortpurcLoc(this.value);" /> 
					  </div>
					  <div id="resultPck_purc" style="position:absolute; top:40px; z-index:10000; width:180px; background:#fff; border:1px solid #666; font-size:12px;"></div>
					  
					  </th>				  
					  
					   <th width="100px">
					   
					   <span style="float:left;">Vacation<br/>
					  <span style="float:left; margin-left:3px;"> Type<img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpurcVac('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpurcVac('Desc');" /></span>					  					</span>
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash_purc" name="drpVacTh_dash_purc" class="spFonts" style="width:90px; height:22px;" onChange="sortpurcVac(this.value);">
			  <option>---Themes---</option>
			 <?php
			    $q_vac = "select vac_title from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				if($res_vac)
				{
				  while($row = mysqli_fetch_array($res_vac))
				  {
				    echo '<option value="'.$row["vac_title"].'">'.$row["vac_title"].'</option>';
				  }
				}
			    ?>
			 </select>
			  </span>
					  </div>
					  
					  </th>
					 
					  <th width="80px">
					  <span style="float:left;">Duration</span>
					  <select id="drpDur_purc" name="drpDur_purc" style="width:auto; height:20px;" onChange="sortpurcDur(this.value);">
					    <option>--Duration--</option>
						<?php
						$q_sel_dur = "select distinct(duration) as duration from b2b_pck_crt";
						$res_sel_dur = mysqli_query($conn,$q_sel_dur);
						if($res_sel_dur)
						{
						 while($row = mysqli_fetch_array($res_sel_dur))
						 {
						   echo '<option value="'.$row["duration"].'">'.$row["duration"].'</option>';
						 }
						}
						?>
					  </select>
					    </th>
					 
					  <th width="80px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package</span><br/>
					  <span style="float:left; margin-left:3px; cursor:pointer;"> Price
					  <img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpurcPrc('Asc');" /></span>
					  <span style="float:left; margin-left:2px; cursor:pointer;">
					  <img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpurcPrc('Desc');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:2px;">
					  <select id="drpDashPrice_purc" name="drpDashPrice_purc" style="width:80px;" onChange="sortpurcPrc(this.value);">
					    <option>0-5000</option>
						<option value="5000-10000">5000-10000</option>
						<option value="10000-15000">10000-15000</option>
						<option value="15000-20000">15000-20000</option>
						<option value="20000-25000">20000-25000</option>
						<option value="25000-30000">25000-30000</option>
						<option value="30000-35000">30000-35000</option>
						<option value="350000-40000">35000-40000</option>
						<option value="40000-50000">40000-50000</option>
						<option value="50000-60000">50000-60000</option>
					  </select>
					</span>
					  </div>
					  </th>
					  
					  <th width="100px">Partner Name</th>
					
					  <th width="80px">
					  <span style="float:left;">Package Name</span>
		<span style="float:left; margin-left:3px; cursor:pointer;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortpurcName('Asc');" /></span>
			<span style="float:left; margin-left:2px; cursor:pointer;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortpurcName('Desc');" /></span>				  
					  </th>	
					  			 
					  <th width="80px" style="word-wrap:break-word;"><span style="float:left;">BookingID</span></th>
						
					 <th width="80px" style="word-wrap:break-word;"><span style="float:left;">TransactionID</span></th>
					
					</tr>
		  
		  </table> 
		  
			</div> 	  
			 
			 <div id="purc_sum_tabs" style="float:left; display:block; width:100%; height:360px; background:#eee; overflow-y:scroll; overflow-x:hidden; margin-bottom:10%; border:1px solid #EEE;">
				 
     		 </div>
	
		</div>
	  
	    <div id="div_dash_inv" style="float:left; display:none; width:100%;">		    
			 
				<div id="inv_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="showInvPeriod('Yest'); trapz_clr_chng('btn_yest_inv','btn_tday_inv','btn_wkly_inv','btn_ytd_inv','btn_itd_inv','btn_mtd_inv');">
			   <span style="float:left;"><div  id="btn_yest_inv" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			  <span onClick="showInvPeriod('Tday'); trapz_clr_chng('btn_tday_inv','btn_yest_inv','btn_wkly_inv','btn_ytd_inv','btn_itd_inv','btn_mtd_inv');">
			   <span style="float:left;"><div  id="btn_tday_inv" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="showInvPeriod('Week'); trapz_clr_chng('btn_wkly_inv','btn_yest_inv','btn_tday_inv','btn_ytd_inv','btn_itd_inv','btn_mtd_inv');">
			   <span  style="float:left;"><div id="btn_wkly_inv" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="showInvPeriod('MTD');  trapz_clr_chng('btn_mtd_inv','btn_wkly_inv','btn_tday_inv','btn_yest_inv','btn_ytd_inv','btn_itd_inv');">
			   <span  style="float:left;"><div id="btn_mtd_inv" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="showInvPeriod('YTD'); trapz_clr_chng('btn_ytd_inv','btn_tday_inv','btn_yest_inv','btn_wkly_inv','btn_itd_inv','btn_mtd_inv');">
			   <span style="float:left;"><div  id="btn_ytd_inv" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="showInvPeriod('ITD'); trapz_clr_chng('btn_itd_inv','btn_tday_inv','btn_yest_inv','btn_wkly_inv','btn_ytd_inv','btn_mtd_inv');">
			   <span style="float:left;"><div id="btn_itd_inv" class="btn_semi_trapez">ITD</div></span></span>
	
			 </div>
			 
			 <div style="float:left; width:100%;">
			   <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:99%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">
				<tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th  width="120px">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Month-Year</span> 
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortinvDate('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortinvDate('Desc');" /></span>				  
					  </div>
					    <div style="float:left;width:100%;">
				        <span style="float:left; margin-left:5px;">
						<select id="drpDash_mnth_inv" name="drpDash_mnth_inv" style="font-size:12px; height:20px;  width:50px;" onChange="sortinvMY();">
						<option value="<?php echo date('m'); ?>"><?php echo date('m'); ?></option>
						<?php	     			
						 $q_date = "select distinct(month(pck_date)) as month from b2b_pck_crt";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {
						   if($row["month"]!==date('m'))	
						    echo '<option value="'.$row["month"].'">'.$row["month"].'</option>';
						   }
						 }
						?>
					    </select>
						<select id="drpDash_year_inv" name="drpDash_year_inv" style="font-size:12px;  height:20px;  width:50px;" onchange="sortinvMY();">
						<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
						<?php
						 $q_date = "select distinct(year(pck_date)) as year from b2b_pck_crt";
						 $res_date = mysqli_query($conn,$q_date);
						 if($res_date)
						 {
						   while($row = mysqli_fetch_array($res_date))
						   {	
						   if($row["year"]!==date('Y'))					    
						    echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
						   }
						 }
						?>
						</select>
						</div></th>
					  <th width="100px">Partner Name</th>
					  <th width="120px"><span style="float:left;">Package Name</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortinvName('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortinvName('Desc');" /></span>			  
					  </th>			 
					  <th width="120px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package Price</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortinvPrc('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortinvPrc('Desc');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:5px;">
					  <select id="drpDashPrice_inv" name="drpDashPrice_inv" style="width:100px;" onChange="sortinvPrc(this.value);">
					    <option>0-5000</option>
						<option value="5000-10000">5000-10000</option>
						<option value="10000-15000">10000-15000</option>
						<option value="15000-20000">15000-20000</option>
						<option value="20000-25000">20000-25000</option>
						<option value="25000-30000">25000-30000</option>
						<option value="30000-35000">30000-35000</option>
						<option value="350000-40000">35000-40000</option>
						<option value="40000-50000">40000-50000</option>
						<option value="50000-60000">50000-60000</option>
					  </select>
					</span>
					  </div></th>
					  
					  <th width="120px"><span style="float:left;">Vacation Type</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortinvVac('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortinvVac('Desc');" /></span>					  
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash_inv" name="drpVacTh_dash_inv" style="width:130px; font-size:14px;" onChange="sortinvVac(this.value);">
			  <option>---Themes---</option>
			  <?php 
			    $q_vac = "select vac_title from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				if($res_vac)
				{
				  while($row = mysqli_fetch_array($res_vac))
				  {
				    echo '<option value="'.$row["vac_title"].'">'.$row["vac_title"].'</option>';
				  }
				}
			  ?>
			  </select>
			  </span>
					  </div>
					  </th>
					  <th width="105px" style="position:relative;"><div style="float:left;width:100%;">
					  <span style="float:left;">Validity</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortinvValid('Asc');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortinvValid('Desc');" /></span></div>
					 	<div style="float:left; width:100%;">
			<span style="float:left;"><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txtValFrom_inv" name="txtValFrom_inv" placeholder="From Date" onClick="oDP.show(event,this.id,2); ShowContent('calendar');" onChange="sortinvValid(this.value);"  /></span>
			<span style="float:left; margin-left:3px;"><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txtValTo_inv" name="txtValTo_inv" placeholder="To Date" onClick="oDP.show(event,this.id,2); ShowContent('calendar');" onChange="sortinvValid(this.value);" /></span>
					  </div>
	<div style="visibility:visible; position:absolute; display:none;  z-index:10000;" id="calendar"></div>			
<script>
  	var oDP = new datePicker("calendar");
</script>				 
					  </th>
					   <th width="50px"><span style="float:left;">Total</span></th>
					    <th width="50px"><span style="float:left;">Sold</span></th>
						 <th width="50px"><span style="float:left;">Inventory</span></th>
					</tr>
					</table>
			 </div>
					 
				<div id="inv_sum_tabs" style="float:left; width:100%; display:block; height:400px;  background:#eee; overflow-y:scroll; overflow-x:hidden;">
					 
				  </div>

		</div>
				
		<div id="div_dash_cancel" style="display:none;">
		
		         <div id="cncl_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="showCnclPeriod('Yest'); trapz_clr_chng('btn_yest_cncl','btn_tday_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_yest_cncl" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			  <span onClick="showCnclPeriod('Tday'); trapz_clr_chng('btn_tday_cncl','btn_yest_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_tday_cncl" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="showCnclPeriod('Week'); trapz_clr_chng('btn_wkly_cncl','btn_yest_cncl','btn_tday_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span  style="float:left;"><div id="btn_wkly_cncl" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="showCnclPeriod('MTD');  trapz_clr_chng('btn_mtd_cncl','btn_wkly_cncl','btn_tday_cncl','btn_yest_cncl','btn_ytd_cncl','btn_itd_cncl');">
			   <span  style="float:left;"><div id="btn_mtd_cncl" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="showCnclPeriod('YTD'); trapz_clr_chng('btn_ytd_cncl','btn_tday_cncl','btn_yest_cncl','btn_wkly_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_ytd_cncl" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="showCnclPeriod('ITD'); trapz_clr_chng('btn_itd_cncl','btn_tday_cncl','btn_yest_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div id="btn_itd_cncl" class="btn_semi_trapez">ITD</div></span></span>
	
			 </div>	 
					 
				 <div id="cncl_sum_tabs" style="float:left; width:100%; display:block;  background:#eee; overflow-y:scroll; overflow-x:hidden;">
				 
				  </div>  
				  
			 </div>
		
		</div>


<!-----------------------------------------------------------   Cancellation ------------------------------------------------------------------------------------->
<div id="div_cancel_pck" class="popUp_imgs_leads" style="width:350px; height:auto; padding:10px; overflow:hidden;">
 <div style="float:left; width:100%;"><span style="float:right; margin-right:5px;">
 <img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block('div_cancel_pck');" /></span></div>
 
 <div id="cncl_pop" style="float:left; width:100%; margin-top:5px;">
   
 </div>
</div>

<div id="div_cancel" style="float:left; width:100%; display:none;">
<div id="topHdrCncl" style="width:100%; float:left;">
<span style="width:49%; float:left; background:#597272; color:#fff; border:1px solid #fff; cursor:pointer;" onclick="chng_bckgrnd('btn_opencncl','btn_closecncl','btn_closecncl');">
   <div id="btn_opencncl"  style="width:auto; padding:2px;" onclick="show_block('open_cncl_sec'); hide_block('close_cncl_sec');">Open</div>
</span>
<span style="float:left; width:49%; background:#597272; color:#fff; border:1px solid #fff; cursor:pointer;" onclick="chng_bckgrnd('btn_closecncl','btn_opencncl','btn_opencncl');">  
   <div id="btn_closecncl" style="width:auto; padding:2px;" onclick="hide_block('open_cncl_sec'); show_block('close_cncl_sec'); closed_cncls('Tday');">Closed</div>
 </span> 
</div>

<div id="open_cncl_sec" style="float:left; width:100%; display:none;">

<div id="open_cncl_dtls" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="trapz_clr_chng('btn_yest_opencncl','btn_tday_opencncl','btn_wkly_opencncl','btn_ytd_opencncl','btn_itd_opencncl','btn_mtd_opencncl');">
			   <span style="float:left;"><div  id="btn_yest_opencncl" class="btn_semi_trapez" onClick="useropencnclPeriod('Yest');" >Yesterday</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_tday_opencncl','btn_yest_opencncl','btn_wkly_opencncl','btn_ytd_opencncl','btn_itd_opencncl','btn_mtd_opencncl');">
			   <span style="float:left;"><div  id="btn_tday_opencncl" class="btn_semi_trapez_onFocus" onClick="useropencnclPeriod('Tday');" >Today</div></span></span>

			   <span onClick="trapz_clr_chng('btn_wkly_opencncl','btn_yest_opencncl','btn_tday_opencncl','btn_ytd_opencncl','btn_itd_opencncl','btn_mtd_opencncl');">
			   <span  style="float:left;"><div id="btn_wkly_opencncl" class="btn_semi_trapez" onClick="useropencnclPeriod('Week');" >Weekly</div></span></span>				   
			   
			   <span onClick="trapz_clr_chng('btn_mtd_opencncl','btn_wkly_opencncl','btn_tday_opencncl','btn_yest_opencncl','btn_ytd_opencncl','btn_itd_opencncl');">
			   <span  style="float:left;"><div id="btn_mtd_opencncl" class="btn_semi_trapez" onClick="useropencnclPeriod('MTD');" >MTD</div></span></span> 
			   
			   <span onClick="trapz_clr_chng('btn_ytd_opencncl','btn_tday_opencncl','btn_yest_opencncl','btn_wkly_opencncl','btn_itd_opencncl','btn_mtd_opencncl');">
			   <span style="float:left;"><div  id="btn_ytd_opencncl" class="btn_semi_trapez" onClick="useropencnclPeriod('YTD');" >YTD</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_itd_opencncl','btn_tday_opencncl','btn_yest_opencncl','btn_wkly_opencncl','btn_ytd_opencncl','btn_mtd_opencncl');">
			   <span style="float:left;"><div id="btn_itd_opencncl" class="btn_semi_trapez" onClick="useropencnclPeriod('ITD');" >ITD</div></span></span>	   
	
			 </div>
		 

<div id="opencncl_sum_tab" style="float:left; width:100%; margin-top:5px;">
    <table id="tab_openCncl" class="spFonts" cellpspacing="0" width="100%" style="float:left; table-layout:fixed; word-wrap:break-word; font-size:12px;">
  <tr style="background:#0066ff; color:#fff;">
   <th width="50px">RequestID</th>
   <th width="60px">Purchase Type</th>
   <th width="80px">Transaction ID</th>
   <th width="100px">Reason for Cancel</th>
   <th width="50px">Request Date</th>
   <th width="40px">Cancel</th>
   <th width="60px">Add Request</th>
  </tr>
  <tr>
    <td><input type="text" id="txtReqID_1" name="txtReqID_1" placeholder="Add Request ID" class="txtbox_Tab" style="width:98%; padding:1px;"  /></td>
	<td><input type="text" id="txtPurcType_1" name="txtPurcType_1" placeholder="Add Package ID" class="txtbox_Tab" style="width:98%; padding:1px;" /></td>
	<td><input type="text" id="txtTrxnID_1" name="txtTrxnID_1" placeholder="Add Trxn ID" class="txtbox_Tab" style="width:98%; padding:1px;" /></td>
    <td><input type="text" id="txtReason_1" name="txtReason_1" placeholder="Add Reason for Cancellation" class="txtbox_Tab"   style="width:98%; padding:1px;" /></td>
    <td><input type="text" id="txtReqDate_1" name="txtReqDate_1" class="txtbox_Tab" placeholder="Add Request Date" style="width:98%; padding:1px;" onclick="oDP.show(event,this.id,2); show_block('TripDate');" /></td>
	<td><input type="button" value="Cancel" class="smallbtn" style="width:78%; padding:1px;" onclick="show_block('div_cancel_pck'); show_pck('txtPurcType_1','txtTrxnID_1','<?php if(isset($_SESSION['userEmail'])) echo $_SESSION['userEmail']; ?>','txtReqDate_1','txtReason_1','txtReqID_1');"  /></td>
	<td><input type="button" value="Add New Request" class="smallbtn" style="width:98%; padding:1px;" onclick="AddRowReq();"   /></td>
  </tr>
</table>
</div>

</div>

<div id="close_cncl_sec" style="float:left; width:100%; display:none;">

<div id="close_cncl_dtls" style="margin-top:3px; float:left; background:#eee; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="trapz_clr_chng('btn_yest_closecncl','btn_tday_closecncl','btn_wkly_closecncl','btn_ytd_closecncl','btn_itd_closecncl','btn_mtd_closecncl');">
			   <span style="float:left;"><div  id="btn_yest_closecncl" class="btn_semi_trapez" onClick="closed_cncls('Yest');" >Yesterday</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_tday_closecncl','btn_yest_closecncl','btn_wkly_closecncl','btn_ytd_closecncl','btn_itd_closecncl','btn_mtd_closecncl');">
			   <span style="float:left;"><div  id="btn_tday_closecncl" class="btn_semi_trapez_onFocus" onClick="closed_cncls('Tday');" >Today</div></span></span>

			   <span onClick="trapz_clr_chng('btn_wkly_closecncl','btn_yest_closecncl','btn_tday_closecncl','btn_ytd_closecncl','btn_itd_closecncl','btn_mtd_closecncl');">
			   <span  style="float:left;"><div id="btn_wkly_closecncl" class="btn_semi_trapez" onClick="closed_cncls('Week');" >Weekly</div></span></span>				   
			   
			   <span onClick="trapz_clr_chng('btn_mtd_closecncl','btn_wkly_closecncl','btn_tday_closecncl','btn_yest_closecncl','btn_ytd_closecncl','btn_itd_closecncl');">
			   <span  style="float:left;"><div id="btn_mtd_closecncl" class="btn_semi_trapez" onClick="closed_cncls('MTD');" >MTD</div></span></span> 
			   
			   <span onClick="trapz_clr_chng('btn_ytd_closecncl','btn_tday_closecncl','btn_yest_closecncl','btn_wkly_closecncl','btn_itd_closecncl','btn_mtd_closecncl');">
			   <span style="float:left;"><div  id="btn_ytd_closecncl" class="btn_semi_trapez" onClick="closed_cncls('YTD');" >YTD</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_itd_closecncl','btn_tday_closecncl','btn_yest_closecncl','btn_wkly_closecncl','btn_ytd_closecncl','btn_mtd_closecncl');">
			   <span style="float:left;"><div id="btn_itd_closecncl" class="btn_semi_trapez" onClick="closed_cncls('ITD');" >ITD</div></span></span>	   
	
			 </div>
		 

<div id="closecncl_sum_tab" style="float:left; width:100%; margin-top:5px;">

</div>

</div>

</div>

<!---------------------------------------------------------------- Social Media ----------------------------------------------------------------------------------->
  
 <div id="div_socialMedia" style="float:left; width:100%; display:none;">

</div>

<!--------------------------------------------------------------- Payment --------------------------------------------------------------------------------------->
 
<div id="div_pay" style="float:left; width:100%; display:none">

</div> 


<!-------------------------------------------------------------  Register --------------------------------------------------------------------------------------->

<div id="div_register" style="float:left; width:100%; display:none; height:auto; padding:5px; background:#eee; margin-bottom:20px;">

<div id="div_user_reg" <?php if ($flag_reg==true || $post_reg=="YES"){ ?> style="display:block;" <?php } else if($flag_reg==false || $post_reg=="NO") { ?> style="display:none;" <?php } ?>>
          <form name="frm_user" action="index.php" method="post" enctype="multipart/form-data">
		  <div style="float:left; width:100%; margin-bottom:20px; text-align:center;">
		      <span style="font-size:24px; color:#b22; font-weight:bold; font-family:Calibri;">Registration</span>
		  </div>
            <table class="font-medium_indx" style="text-align:left; width:800px; height:auto; color:#444;">
              <tr>
                <th colspan="4" align="center"></th>
              </tr>
              <tr>
                <td>Full Name</td>
                <td><input type="text" id="txtEmpName" name="txtEmpName" class="txtbox_Tab" value="<?php echo $txtName; ?>"/></td>
              </tr>
              <tr>
                <td>User ID</td>
                <td><input type="text" id="txtUserName" name="txtUserName" class="txtbox_Tab" value="<?php echo $txtUser; ?>"/><br/>
				<input type="button" id="btn_check_exists" name="btn_check_exists" value="Check if Exists" class="smallbtn" style="float:none;" onclick="checkUserExist();"/>
				<span id="div_userExist"></span>
				</td>
                <td><input type="submit" name="btnSrcUser" id="btnSrcUser" class="smallbtn" style="width:110px; height:30px; font-size:16px; float:none;" value="Search User"  /></td>
                <td></td>
              </tr>
              <tr>
              <tr>
                <td>Date of Joining</td>
                <td>
				<table>
                    <tr>
                      <td><select id="drpMonth" name="drpMonth" style="width:70px;" onchange="upload_days();" value="<?php echo $txtMonth; ?>">
                          <option "<?php if($txtMonth == "Month") {?>" selected="selected" "<?php }?>">Month</option>
                          <option "<?php if($txtMonth == "01") {?>" selected="selected" "<?php }?>" value="01">Jan</option>
                          <option "<?php if($txtMonth == "02") {?>" selected="selected" "<?php }?>" value="02">Feb</option>
                          <option "<?php if($txtMonth == "03") {?>" selected="selected" "<?php }?>" value="03">Mar</option>
                          <option "<?php if($txtMonth == "04") {?>" selected="selected" "<?php }?>" value="04">Apr</option>
                          <option "<?php if($txtMonth == "05") {?>" selected="selected" "<?php }?>" value="05">May</option>
                          <option "<?php if($txtMonth == "06") {?>" selected="selected" "<?php }?>" value="06">Jun</option>
                          <option "<?php if($txtMonth == "07") {?>" selected="selected" "<?php }?>" value="07">Jul</option>
                          <option "<?php if($txtMonth == "08") {?>" selected="selected" "<?php }?>" value="08">Aug</option>
                          <option "<?php if($txtMonth == "09") {?>" selected="selected" "<?php }?>" value="09">Sep</option>
                          <option "<?php if($txtMonth == "10") {?>" selected="selected" "<?php }?>" value="10">Oct</option>
                          <option "<?php if($txtMonth == "11") {?>" selected="selected" "<?php }?>" value="11">Nov</option>
                          <option "<?php if($txtMonth == "12") {?>" selected="selected" "<?php }?>" value="12">Dec</option>
                        </select>
                      </td>
                      <td><select id="drpDay" name="drpDay" style="width:60px;" value="<?php echo $txtDay; ?>">
                          <option selected="selected"><?php echo $txtDay;?></option>						 
                        </select>
                      </td>
                      <td><select id="drpYr" name="drpYr" style="width:60px;" value="<?php echo $txtYr; ?>">
                          <option selected="selected"><?php echo $txtYr;?></option>
						   <?php
						  for($i=2013; $i<=2014; $i++)
						  {
						  echo '<option value="'.$i.'">'.$i.'</option>';
						  }
						  ?>
                        </select>
                      </td>
                    </tr>
                  </table>
				</td>
                <td>Gender</td>
                <td><input type="radio" id="rdGen" name="rdGen" value="Male" <?php if($txtGen == "Male"){?>" checked="checked" "<?php }?>/>
                  Male
                  <input type="radio" id="rdGen" name="rdGen" value="Female" <?php if($txtGen == "Female"){?>" checked="checked" "<?php }?> />
                  Female</td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input  name="txtPwd" id="txtPwd" class="txtbox_Tab" type="password" onchange="check_pwd();" value="<?php echo $txtpwd; ?>"/></td>
                <td>Confirm Password</td>
                <td><input  name="txtCPwd" id="txtCPwd" class="txtbox_Tab" type="password" onchange="check_pwd();" value="<?php echo $txtpwd; ?>" /></td>
              </tr>
              <tr>
                <td>Location</td>
                <td><input type="text" id="txtLoc" name="txtLoc" class="txtbox_Tab" value="<?php echo $txtLoc; ?>"/></td>
                <td>State</td>
                <td><input type="text" id="txtState" name="txtState" class="txtbox_Tab" value="<?php echo $txtState; ?>"/></td>
              </tr>
              <tr>
                <td>Country</td>
                <td><input type="text" id="txtCountry" name="txtCountry" class="txtbox_Tab" value="<?php echo $txtCountry; ?>"/></td>
                <td>Pin Code</td>
                <td><input type="text" id="txtPinCode" name="txtPinCode" class="txtbox_Tab" maxlength="6" style="width:100px;" value="<?php echo $txtPin; ?>"/></td>
              </tr>
              <tr>
			   <td>Mobile Number</td>
                <td><input type="text" id="txtMobile" name="txtMobile" class="txtbox_Tab" maxlength="13" value="<?php echo $txtmob; ?>"/></td>
                <td>Role</td>
                <td><select id="drpRole" name="drpRole" style="width:100px;" onchange="chk_all_admin(this.value);">
                    <option "<?php if($txtRole_user =="Select"){?>" selected="selected" "<?php }?>" value="Select">Select</option>
                    <option "<?php if($txtRole_user =="Admin"){?>" selected="selected" "<?php }?>" value="Admin">Admin</option>
                    <option "<?php if($txtRole_user =="User"){?>" selected="selected" "<?php }?>" value="User">User</option>
                  </select></td>
              </tr>
			  </table>
			  
			  <table width="70%" class="font-medium_indx" cellpadding="2px" cellspacing="0" style="margin-top:10px;">
              <tr>
                <td align="right">Access Email Traffic</td>
                <td align="left"><input type="checkbox" name="chk_eml" id="chk_eml" value="YES" <?php if($chkEml == "YES"){?> checked="checked" <?php }?> /></td>
                <td align="right">Access Login Activities</td>
                <td align="left"><input type="checkbox" name="chk_log" id="chk_log" value="YES" <?php if($chkLog == "YES"){?> checked="checked" <?php }?>/></td>
              </tr>
              <tr>
                <td align="right">Access Social Media Activities</td>
                <td align="left"><input type="checkbox" name="chk_social" id="chk_social" value="YES" <?php if($chkSocial == "YES"){?> checked="checked" <?php }?>/></td>
                <td align="right">Access User Admin </td>
                <td align="left"><input type="checkbox" name="chk_admin" id="chk_admin" value="YES" <?php if($chkAdmin == "YES"){?> checked="checked" <?php }?>/></td>
              </tr>
              <tr>
                <td align="right">Access Leads & Quotes</td>
                <td align="left"><input type="checkbox" name="chk_ld_qt" id="chk_ld_qt" value="YES" <?php if($chkLead == "YES"){?> checked="checked" <?php }?>/></td>
                <td align="right">Access Packages</td>
                <td align="left"><input type="checkbox" name="chk_pckg" id="chk_pckg" value="YES" <?php if($chkPcks == "YES"){?> checked="checked" <?php }?>/></td>
              </tr>
			  <tr>
                <td align="right">Access Enquiry</td>
                <td align="left"><input type="checkbox" name="chk_enq" id="chk_enq" value="YES" <?php if($chkEnq == "YES"){?> checked="checked" <?php }?>/></td>
                <td align="right">Access Payment</td>
                <td align="left"><input type="checkbox" name="chk_pay" id="chk_pay" value="YES" <?php if($chkPay == "YES"){?> checked="checked" <?php }?>/></td>
              </tr>
			  <tr>
                <td align="right">Access Cancellations</td>
                <td align="left"><input type="checkbox" name="chk_cncl" id="chk_cncl" value="YES" <?php if($chkCancel == "YES"){?> checked="checked" <?php }?>/></td>
                <td align="right">Access Registration</td>
                <td align="left"><input type="checkbox" name="chk_reg" id="chk_reg" value="YES" <?php if($chkReg == "YES"){?> checked="checked" <?php }?>/></td>
              </tr>
              <tr>
                <td align="center"><input type="submit" name="btnEdit" id="btnEdit" class="smallbtn" style="width:110px; height:30px; font-size:16px; float:none;" value="Edit User" /></td>
             <td align="center"><input type="submit" name="btnDelete" id="btnDelete" class="smallbtn" style="width:130px; height:30px; font-size:16px; float:none;" value="Deactivate User" onclick="deactUser();"/></td>
			 	<td  align="center"></td>
                <td  align="left"><input type="submit" name="btnRegUser" id="btnRegUser" class="smallbtn" style="width:110px; height:30px; font-size:16px; float:none;" value="Register User"  /></td>

              </tr>
            </table>
          </form>
        </div>

</div>


  

<div style="visibility:visible; position:absolute; display:none; z-index:10000;" id="Calendar"></div>	
<script>
  	var oDP = new datePicker("Calendar");
</script>
 </div> 	 
 
</span>

</div>	
<input type="text" name="txtSessionEml" style="visibility:hidden" />
</div>

</body>
</form>
</html>
