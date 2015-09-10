<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create Custom Package</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<link rel="stylesheet" href="Stylesheets/B2bLoginStyles.css" type="text/css" />

<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
<script src="Javascript/createPackScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/access_prevScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/PckToolAjax.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/context.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>

<!---------------------------------  Search Destinations - Dashboard - Packages ------------------------------------>
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
	url: "PHP_Files/loadPage.php",
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

<!---------------------------------  Search Destinations - Dashboard - Purchase ------------------------------------>
<script type="text/javascript">
$(function(){
$(".searchPck_purc").keyup(function() 
{ 
var searchPck = $(this).val();
var dataString = 'searchPck='+ searchPck;
if(searchPck!='')
{
	$.ajax({
	type: "POST",
	url: "PHP_Files/loadPage.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#resultPck_purc").html(html).show();
	}
	});
}return false;    
});
});
</script>


<?php include("PHP_Files/PHP_Connection.php"); ?>
<?php include("PHP_Files/b2b_login.php"); ?>
<?php include("PHP_Files/php_pck_create.php"); ?>

<?php
if(isset($_SESSION["clientID"]))
  if($_SESSION["clientID"]!="")
include("PHP_Files/b2b_User_Session.php"); 
$tmDiff=0; 
?>

<?php
if(isset($_SESSION["userEmail"]))
{
  $q_clnt_id = "select client_id from client_register where client_email='".$_SESSION["userEmail"]."'";
  $res_clnt = mysqli_query($conn,$q_clnt_id);
  if($res_clnt)
  {
    while($row = mysqli_fetch_array($res_clnt))
	  {
	    $_SESSION["clientID"] = $row["client_id"];
	  }
     }
  }
?>

</head>
<form id="frm" name="frm" method="post" enctype="multipart/form-data">

<body onLoad="loadContent(); show_user(); blink_fonts();">

<div align="center" id="master_container" style="margin-top:0px;">

    <div id="fixedHeader" style="height:40px; position:relative;">
	
 		   <span id="headerTemplates" style="width:20%; float:left;"> 
			  <div id="headerLogo" style="display:block;">
  		<?php 
		   if(isset($_SESSION["CompName"]) && isset($_SESSION["logoPic"]))
		   {
		     include("PHP_Files/b2b_User_Session.php");
			  echo '<span class="span_logopic"><img id="cmp_Logo" src="data:image/png;base64,' .base64_encode($_SESSION["logoPic"]) . '" width="auto" height="60px" style="border-style:none;" onClick="start_sec();"/></span>';
			 echo '<span id="sp_cmpName" class="font-medium" style="float:left; margin-top:40px; margin-left:10px;">'.$_SESSION["CompName"].'</span>';
		   }
		?>
		  </div>			
         </span>
   		    
          <span id="header_CenterSpace" style="width:60%; float:left;">        	

	       <div id="top_headerBtn" style="display:block; margin-left:3%;">
	
	  <div id="Pay_btns" style="float:left; width:100%; background:#bbb; display:none;">
	       
		 <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_payment','div_Cust_rev');">
	   <div id="btn_pay" class="top_subBtn" >Payment Summary</div></span></span>
	   
	   <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_Cust_rev','div_payment'); ">
	   <div id="btn_Cust_rev" class="top_subBtn"  onClick="show_btn_color('btn_Cust_rev','btn_pay'); ">Customer Reviews</div></span></span>
	   
	  </div>
		  
	  <div id="Pck_btns" <?php if($crt_Pck_flag == true){?> style="display:block;" <?php } else { ?> style="display:none;" <?php }?> >
	  
	  <span style="float:left; margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('Package_Section','Transport_Section','Accomodation_Section','Package_Cost','Cancel_Section','Publish_Section');   ">
	   <div id="btn_Package" class="top_subBtn" style="color:#ff0000;"  onClick=" show_btn_color('btn_Package','btn_Transport','btn_Accomodation','btn_Cost','btn_Cancel','btn_Discount','btn_Publish');">Package Theme</div></span></span>
	      
		  <span style="float:left;  margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick=" show_section('Accomodation_Section','Package_Section','Transport_Section','Package_Cost','Cancel_Section','Publish_Section');
		show_btn_color('btn_Accomodation','btn_Package','btn_Transport','btn_Cost','btn_Cancel','btn_Discount','btn_Publish'); ">
	   	   <div id="btn_Accomodation" class="top_subBtn" onClick="createHtl(); createHtl_incl(); createHtl_excl(); ">Accomodation</div></span></span>
		   
	   
	     <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('Transport_Section','Package_Section','Accomodation_Section','Package_Cost','Cancel_Section','Publish_Section');   ">
	   <div id="btn_Transport" class="top_subBtn"  onClick="load_dest_IC(); createMode(); createLMode(); show_btn_color('btn_Transport','btn_Package','btn_Accomodation','btn_Cost','btn_Cancel','btn_Discount','btn_Publish');">Transport</div></span></span>
	   
	   <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('Package_Cost','Package_Section','Accomodation_Section','Transport_Section','Cancel_Section','Publish_Section'); ">
	   <div id="btn_Cost" class="top_subBtn"  onClick="createAttr();show_btn_color('btn_Cost','btn_Package','btn_Accomodation','btn_Transport','btn_Cancel','btn_Discount','btn_Publish'); ">Package Cost</div></span></span>
	   
	   <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick=" show_section('Cancel_Section','Package_Section','Accomodation_Section','Transport_Section','Package_Cost','Publish_Section');  ">
	   <div id="btn_Cancel" class="top_subBtn" onClick="show_btn_color('btn_Cancel','btn_Package','btn_Accomodation','btn_Transport','btn_Cost','btn_Discount','btn_Publish');">Cancellations</div></span></span>
	   
	    <span style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick=" show_section('Publish_Section','Cancel_Section','Package_Section','Accomodation_Section','Transport_Section','Package_Cost');  ">
	   <div id="btn_Publish" class="top_subBtn" onClick="show_btn_color('btn_Publish','btn_Cancel','btn_Package','btn_Accomodation','btn_Transport','btn_Cost','btn_Discount');">Publish</div></span></span>
	   
	  </div>
	  
   <span id="sp_act_div" style="float:left; margin-left:170px;">
 	<span style="float:left;">
	<div id="btn_act_div" class="top_headBtns" style="display:none; padding-left:5px; padding-right:5px; width:auto; font-size:20px; font-weight:bold; float:left; background:#FD0000; color:#FFF; height:30px; text-align:left; position:absolute; bottom:-20px; left:10px;">	 </div></span></span> 
	
	 </div>
	
		</span>	 
 
 		  <span id="header_rightbtn" style="width:20%; z-index:10; float:right;">
	     	
			<div>
        	<a target="_blank" href="index.php">
			<span style="float:right;"><img src="Images/logo.png" width="210px" height="60px" style="margin-top:3px;"></span></a>
	       </div>			 
	        
			<div id="C_care_text_hidden_b2b" style="display:none;">	  
			<span id="sp_cntDtl" style="font-stretch:expanded; font-weight:700; display:none; float:right;"> 
			 &nbsp; &nbsp; Call Us: 1800-2543 / 022-4234 5677, e-Mail: Mytrip@quitcitynow.com<br/>
		      </span>
	      <span style="float:right;">
		  <span onClick="show_block('sp_cntDtl');" onDblClick="hide_block('sp_cntDtl');" style="color:#0066CC; font-weight:bold; text-decoration:underline;">
		  Contact Us:</span></span>
	</div>  
		
		</span> 		
		
	      <div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>
	
          <div id="div_user_welc" <?php if($leads_page==true) {?> style="display:block;" <?php } else {?> style="display:none;"<?php }?>> 	 
	<div style="float:left; width:100%; margin-top:0px;">
	  <span style="float:left;"><div class="smallbtn" style="width:43px; font-size:10px; margin-left:7px;">Profile</div></span>
	  <span style="float:left;"><div class="smallbtn"  style="width:45px; font-size:10px; margin-left:2px;">Settings</div></span>
	   <span style="float:left;"><input type="submit" id="btn_b2bLogout" name="btn_b2bLogout" class="smallbtn"  style="width:43px; font-size:10px; margin-left:2px;" value="Logout" /></span>	  
  </div>	
  	  <div class="font-medium" style="color:#555; margin-left:3px; margin-top:2px; font-size:14;">
	  <?php
	  if(isset($_SESSION["userEmail"]))
		   {		     
			  echo '<div style="width:100%; float:left"><span id="sp_user" style="float:left;">Welcome! &nbsp; &nbsp;</span>
	     <span id="sp_sess"  style="float:left;">'.$_SESSION["userEmail"].'</span></div>';
		 echo '<div id="div_clntID" style="display:none;">'.$_SESSION["clientID"].'</div>';
			// echo '<div style="width:100%; font-size:12; float:left"><span id="sp_lastLog"  style="float:left;">Last login &nbsp;</span>
		 //<span id="sp_logDate_Time" style="float:left;">'.$_SESSION["lastlog"].'</span></div>';
		   }
		   ?>
     	
		
    </div>
 </div>   

          <div id="div_log_reg" <?php if($leads_page==true) {?> style="display:none;" <?php } else {?> style="display:block;"<?php }?> >
	  <span style="margin-left:15px; float:left;">
	  <a href="CreatePackTool.php?status=Login" target="_self" style="text-decoration:none; font-weight:500; font-family:Calibri; color:#0066ff;">Login</a></span>
	  <span style="float:left; margin-left:10px;">
	  <a href="CreatePackTool.php?status=Register" target="_self" style="text-decoration:none; font-weight:500; font-family:Calibri; color:#0066ff;">Register</a></span>
	</div>  
	
     		 </div>
	    
    <div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<span><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></span>
     <span><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></span>
	<span><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></span>
	<span><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></span>
	<span onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></span>
	</span></div>   
	     </div> 
	
</div>

	
<!------------------------------------------ Password Reset Link Pop up ------------------------------------------------------->
<div id="div_reg_cmplt" <?php if($thnk_reg == true){?> style="display:block;"<?php } else {?> style="display:none;" <?php } ?>>
   <div style="float:left; width:100%;">
  <span style="float:right; margin-right:5px;">
  <img src="Images/cancelbtn.png" width="25px" height="25px" onClick="hide_block('div_reg_cmplt');" /></span>
</div>
<div style="float:left; width:100%;">
  <span style="float:left;" class="font-medium"><?php echo $reg_msg; ?><br/> we have sent a password reset link to the registered email-id.</span>
</div>
<div style="float:left; width:100%; margin-top:10px;" class="font-medium">
  <span style="float:left;">click on the below reset link to set your password</span>
</div>
<div style="float:left; ">
<span id="sp_lnk"  style="float:left; margin-left:10px; color:#0066ff; text-decoration:underline; font-size:14px; font-family:Calibri; cursor:pointer;" onClick="reset_pwd();">
<?php echo $lnk ;?></span></div>
</div>	

<!----------------------------------------------------  Leads Details POP UP------------------------------------------ ---------------------------------------------->
 
 <div id="dtls_leads" class="popUp_imgs_leads" <?php if($quote == true){ ?> style="display:block;"<?php }?>>
 <div style="float:left; width:100%;">
  <span style="float:right; cursor:pointer;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block('dtls_leads'); hide_block('div_resp_pop');" /></span>
 </div>
 </div>
 
<!----------------------------------------------------- Response Details Pop UP ---------------------------------------------------------------------------------------> 
 <div id="dtls_response" class="popUp_imgs_div" style="width:900px; height:500px; overflow-y:scroll; overflow-x:hidden;">
 <div style="float:left; width:100%;">
  <span style="float:right;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block('dtls_response');" /></span>
 </div> 
 
 </div>
 
<!-------------------------------------------------------- Sections with buttons ------------------------------------------------------------------------------------------------->

<div id="body_container" style="margin:3.7% 0% 0% 13%;">

 <div id="div_clnt_id" style="display:none;"><?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"]; ?></div>
		 
<!-------------------------------------------------------------   Register Window ------------------------------------------------------------------->
	<div id="b2b_register" <?php  if(isset($_GET["status"])) { if($_GET["status"] == "Register"){ ?> style="display:block;" <?php } else if($page_status == "Register"){?> style="display:block;" <?php }  else {?> style="display:none;" <?php }}?>>

	   <div style="margin:1% 6% 1% 6%; width:100%; float:left;"><span class="font-medium">Please fill-in the details to create your &nbsp;</span><span class="font-medium" style="font-weight:600; float:left; text-decoration:underline">'User Account'</span></div>
	     
		 <div style="width:100%; float:left; margin:3% 6% 1% 6%;">
		 
		     <table class="font-medium">
			   <tr>
			     <td>Company Name/ Entity Name</td>
				 <td><input type="text" id="txtTab_cmpName" name="txtTab_cmpName"  class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_cmpName');" onMouseOut="txtbox_color_onmouseout('txtTab_cmpName');" value="<?php echo $cmpn_name; ?>"/></td>
				 </tr>
				 <tr>
				 <td>Upload Logo </td>
				 <td><span style="position:relative; float:left;">
                   <input type="text" id="txt_src_t" name="txt_src_t" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg" />
                  <input type="file" id="cmp_Img" name="cmp_Img" style="opacity:0; z-index:1; visibility:false;" value="upload image" onChange="document.getElementById('txt_src_t').value = this.value ;"  accept="image/x-png, image/gif, image/jpeg"/>
</span></td>
			   </tr>
			     <tr>
			     <td>HeadQuater Location</td>
				 <td><input type="text" id="txtTab_headQuarter" name="txtTab_headQuarter" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_headQuarter');" onMouseOut="txtbox_color_onmouseout('txtTab_headQuarter');" value="<?php echo $hdq_loc; ?>"/></td>
			   </tr>
			   <tr>
			     <td colspan="2"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
			   </tr>
			   <tr>
			     <td>Name of the Requester</td>
				 <td><input type="text" id="txtTab_reqName" name="txtTab_reqName" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_reqName');" onMouseOut="txtbox_color_onmouseout('txtTab_reqName');" value="<?php echo $req_name; ?>"/></td>
			   </tr>
			   <tr>
			      <td>Employee Code</td>
				  <td><input type="text" id="txtTab_empCode" name="txtTab_empCode" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_empCode');" onMouseOut="txtbox_color_onmouseout('txtTab_empCode');" value="<?php echo $empCode; ?>"/></td>
			   </tr>
			    <tr>
			      <td>Designation</td>
				  <td><input type="text" id="txtTab_desig" name="txtTab_desig" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_desig');" onMouseOut="txtbox_color_onmouseout('txtTab_desig');" value="<?php echo $design; ?>"/></td>
			   </tr>
			   <tr>
			      <td>Region/Regional Office</td>
				  <td><input type="text" id="txtTab_regional" name="txtTab_regional" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_regional');" onMouseOut="txtbox_color_onmouseout('txtTab_regional');" value="<?php echo $reg_off; ?>"/></td>
			   </tr>
			   <tr>
			      <td>State</td>
				  <td><input type="text" id="txtTab_state" name="txtTab_state" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_state');" onMouseOut="txtbox_color_onmouseout('txtTab_state');" value="<?php echo $state; ?>"/></td>
			   </tr>
			   <tr>
			      <td colspan="2"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
				  </tr>
				  <tr>
				    <td>Email-Id(Personal)</td>
					<td><input type="text" id="txtTab_emailPer" name="txtTab_emailPer" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_emailPer');" onMouseOut="txtbox_color_onmouseout('txtTab_emailPer');" value="<?php echo $tab_perEml; ?>"/></td>
				  </tr>
				  <tr>
				    <td>Email-Id(Professional)</td>
					<td><input type="text" id="txtTab_emailProf" name="txtTab_emailProf" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_emailProf');" onMouseOut="txtbox_color_onmouseout('txtTab_emailProf');" onChange="valid_email('txtTab_emailProf');" value="<?php echo $prefEml; ?>"/></td>
				  </tr>  
				  <tr>
				    <td>Mobile No.</td>
					<td><input type="text" id="txtTab_cellNo" name="txtTab_cellNo" class="txtbox_Tab" maxlength="11" onMouseOver="txtbox_color_onmouseover('txtTab_cellNo');" onMouseOut="txtbox_color_onmouseout('txtTab_cellNo');" value="<?php echo $cellNo; ?>"/></td>
				  </tr> 
				  <tr>
				    <td>Landline No.</td>
					<td><input type="text" id="txtTab_landNo1" name="txtTab_landNo1" class="txtbox_Tab" style="width:60px;" maxlength="5" onMouseOver="txtbox_color_onmouseover('txtTab_landNo');" onMouseOut="txtbox_color_onmouseout('txtTab_landNo');"/>-<input type="text" id="txtTab_landNo2" class="txtbox_Tab" style="width:185px;" maxlength="8" onMouseOver="txtbox_color_onmouseover('txtTab_landNo');" onMouseOut="txtbox_color_onmouseout('txtTab_landNo');" value="<?php echo $landNo; ?>"/></td>
				  </tr>
				  <tr>
				    <td>Client Type</td>
					<td>
					  <select id="txtClntType" name="txtClntType" width="auto">
					   <option value="PLATINUM">PLATINUM</option>
					   <option value="DIAMOND">DIAMOND</option>
					   <option value="GOLD">GOLD</option>
					   <option value="SILVER">SILVER</option>
					  </select>
					</td>
				  </tr> 
				   <tr>
				   	<td colspan="2" align="right">
					<input type="submit" id="btn_regB2b" name="btn_regB2b" class="smallbtn" style="width:60px; float:right; height:24px;" value="Submit" /></td>
				  </tr> 
				  <tr>
			      <td colspan="2"><span><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></span></td>
				  </tr>
				    <tr>
				    <td>Verification Code</td>
					<td><input type="text" id="txtTab_veriCode" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_veriCode');" onMouseOut="txtbox_color_onmouseout('txtTab_veriCode');"/></td>
				  </tr> 
				  <tr>
			      <td colspan="2"><span><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></span></td>
				  </tr>
				   <tr>
				   	<td colspan="2" align="right">
					<input type="submit" id="btn_regVer" name="btn_regVer" class="smallbtn" style="width:60px; float:right; height:24px;" value="Verify" onClick="chng_addr();" /></td>
				  </tr>
			 </table>	
			 
		 </div>
	 
	</div>	 
	   	 
<!----------------------------------------------------------------------  Login Window ------------------------------------------------------------------>
    <div id="div_login_win" <?php if(isset($_GET["status"])) {  if($_GET["status"]!="")  { if($_GET["status"] == "Login") {?> style="display:block; height:150px;" <?php } else {?> style="display:none;" <?php } }} ?>>
	     <div>
	   <span style="float:right; margin-right:10px;">
	    <span onClick="hide_block('div_login_win'); hide_block('div_greyBack');"><img src="Images/cancelbtn1.png" width="30px" height="30px"/></span></span>
	</div>	
	<div style="width:100%; margin:5px 5px 5px 5px;">
	   <span style="float:left"><img src="Images/logo.png" width="120px" height="30px" /></span>
	</div>
	    <div style="width:100%; margin:5px 5px 5px 30px; float:left;">
		   <table class="font-medium">
		     <tr>
			   <td>Login Id</td>
			   <td>:</td>
			   <td><input id="txtLogId_b2b" name="txtLogId_b2b" type="text" class="txtbox_Tab" style="width:200px;"/></td>
			 </tr>
		     <tr>
			   <td>Password</td>
			   <td>:</td>
			   <td><input id="txtLogPwd_b2b" name="txtLogPwd_b2b" type="password" placeholder="123" class="txtbox_Tab" style="width:200px;" /></td>
			 </tr>
			 <tr>
			   <td colspan="3" align="right">
			   <input type="submit" id="b2bLogin" name="b2bLogin" class="smallbtn" style="float:none; width:80px; height:24px;" value="Login" /></td>
			 </tr>
			 <tr><td colspan="3"><span id="sp_login"></span></td></tr>
	       </table>
		</div> 
	</div>
	
	<div id="div_body" align="center" style="width:1200px;float:left;">
	
    <div id="pck_created" class="divPopup_pck" <?php if($pck_crt == true){?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
	 <div style="float:left; width:100%;">
	 <span class="font-medium" style="float:left; margin-left:10px; margin-top:10px; color:#ff0000;">Success : Your Package is Created</span>
	 <span style="float:right;">
	 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block('pck_created');" /></span>
	 </div>
	<div style="width:100%; float:left; margin:10px;">
	<table width="100%" cellpadding="1" cellspacing="0">
	<tr>
	  <td width="150px"><span class="font-medium" style="font-size:14px;">Your Package ID is </span></td>
	  <td width="20px">:</td>
	  <td><span class="font-medium" style="font-size:14px;"> <?php echo $_SESSION["PckID"]; ?></span></td>
	</tr>
	<tr>
	  <td></td>
	</tr>
	<?php 
	$q_pck_id = "select pck_id, locations, trip_theme, duration from b2b_pck_crt where pck_id='".$_SESSION["PckID"]."'";
	$res_pck_id = mysqli_query($conn, $q_pck_id);
	
	if($res_pck_id)
	{
	  while($row = mysqli_fetch_array($res_pck_id))
	  {
	    echo '<tr><td><span class="font-medium" style="font-size:14px;">For the Locations</span></td>';
		echo '<td>:</td>';
		echo '<td><span class="font-medium" style="font-size:14px;">'.$row["locations"].'</span></td></tr>';
		echo '<tr><td><span class="font-medium" style="font-size:14px;">With Themes </span></td>';
		echo '<td>:</td>';
		 echo '<td><span class="font-medium" style="font-size:14px;">'.$row["trip_theme"].'</span></td></tr>';
		echo '<tr><td><span class="font-medium" style="font-size:14px;">For a duration of </span></td>';
		echo '<td>:</td>';
		echo '<td><span class="font-medium" style="font-size:14px;">'.$row["duration"].'</span></td></tr>';		
	  }
	}	
	?> 
	</table>  
	</div>
	</div>
	
	<div id="aft_Log">
	
	
<!------------------------------------------------------------------------- First Page Buttons ------------------------------------------------------------>
	<div id="div_hdrBtn" <?php if($leads_page == true){?>style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
	
	  <span style="float:left; width:12%;">
	  <div style="float:left; width:100%; color:#fff;">
	    <span <?php if($acc_ld_yes == true) {?> onClick="headerBtn_Color('btn_Leads','btn_Packages','btn_Dashboard','btn_Services','btn_profile','btn_payment');" onMouseOver=" headerBtn_Color('btn_Leads','btn_Packages','btn_Dashboard','btn_Services','btn_profile','btn_payment'); hide_block('pck_crt_mod');"<?php }?>>
		<div id="btn_Leads" class="arrow_box" <?php if($acc_ld_yes == true) {?> onClick="show_leads();" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Leads </span></div></span>
	  </div>
	  
	  <div style="float:left; width:100%; color:#fff; position:relative;">
	    <span <?php if($acc_pck_yes == true) {?> onClick="headerBtn_Color('btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_profile','btn_payment');" onMouseOver="headerBtn_Color('btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_profile','btn_payment');" <?php }?>>
		<div id="btn_Packages" class="arrow_box" <?php if($acc_pck_yes == true) {?> onMouseOver="show_block('pck_crt_mod'); show_section('pkg_desc','leads_desc','feat_desc');" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Packages</span>
		
		<span id="pck_crt_mod" style="float:left; display:none; right:-150px; top:-10px; z-index:10000; position:absolute;">		
		 <div id="btn_create" class="smallbtn" style="width:auto; padding:2px; height:22px; font-weight:bold; font-size:15px; background:#FF0000; text-align:center;" onMouseOver=" Btn_Color('btn_create','btn_modify','btn_revise');" onClick="show_package();">Create New Package</div><br/>

<div id="btn_modify" class="smallbtn" style="width:auto; padding:2px; height:22px; font-weight:bold; font-size:15px; background:#002929; text-align:center;" onMouseOver=" Btn_Color('btn_modify','btn_create','btn_revise');" onClick="modify_pck();">Modify Package</div><br/>	

<?php
$sel_userMain = "select client_id from user_tab where user_role='B2B_Partner_Operator' and sub_user='NO' and user_status='Active' and client_id='".$_SESSION["clientID"]."'";
$res_userMain= mysqli_query($conn,$sel_userMain);
$has_userMain = mysqli_num_rows($res_userMain);
if($has_userMain>0)
{
echo '<div id="btn_revise" class="smallbtn" style="width:auto; padding:2px; height:22px; font-weight:bold; font-size:15px; background:#002929; text-align:center;" onMouseOver=" Btn_Color(\'btn_revise\',\'btn_modify\',\'btn_create\');" onClick="revise_pck();">Revise Package</div>';
}
?>	

			</span>
		
		</div></span>
	  </div>
	  
	  <div style="float:left; width:100%; color:#fff;">
	    <span <?php if($acc_dash_yes == true) {?> onClick="headerBtn_Color('btn_Dashboard','btn_Packages','btn_Leads','btn_Services','btn_profile','btn_payment');" onMouseOver="headerBtn_Color('btn_Dashboard','btn_Packages','btn_Leads','btn_Services','btn_profile','btn_payment'); hide_block('pck_crt_mod');"<?php }?>>
		<div id="btn_Dashboard" class="arrow_box" <?php if($acc_dash_yes == true) {?> onClick="show_dashboard(); showDashPeriod('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Dashboard</span></div></span>
	  </div>
	  
	  <div style="float:left; width:100%; color:#fff;">
	    <span <?php if($acc_serv_yes == true) {?>onClick="headerBtn_Color('btn_Services','btn_Packages','btn_Leads','btn_Dashboard','btn_profile','btn_payment');" onMouseOver="headerBtn_Color('btn_Services','btn_Packages','btn_Leads','btn_Dashboard','btn_profile','btn_payment'); hide_block('pck_crt_mod');" <?php }?>>
		<div id="btn_Services" class="arrow_box" <?php if($acc_serv_yes == true) {?>onClick="show_services();" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Services</span></div></span>
	  </div>
	  
	  <div style="float:left; width:100%; color:#fff;">
	    <span <?php if($acc_prof_yes == true) {?>onClick="headerBtn_Color('btn_profile','btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_payment');" onMouseOver="headerBtn_Color('btn_profile','btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_payment'); hide_block('pck_crt_mod');" <?php }?>>
		<div id="btn_profile" class="arrow_box" <?php if($acc_prof_yes == true) {?>onClick="show_content();" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Profile</span></div></span>
	  </div>
	  
	  <div style="float:left; width:100%; color:#fff;">
	    <span <?php if($acc_pay_yes == true) {?>onClick="headerBtn_Color('btn_payment','btn_profile','btn_Packages','btn_Leads','btn_Dashboard','btn_Services');" onMouseOver="headerBtn_Color('btn_payment','btn_profile','btn_Packages','btn_Leads','btn_Dashboard','btn_Services'); hide_block('pck_crt_mod');" <?php }?>>
		<div id="btn_payment" class="arrow_box" <?php if($acc_pay_yes == true) {?>onClick="show_payment();" <?php } else {?> style="color:#999;" <?php }?>>
		<span style="float:left; margin:5px 0px 0px 10px; font-size:18px;">Payment</span></div></span>
	  </div>
	  </span>  
	
	  <span style="float:left; width:85%; margin-left:5px;">
	  
	  <div id="div_onload_page" style="float:left; width:100%; height:400px;">
	  <?php
	  $num_bought=0;
	  $num_cncld=0; 
	  $totl_query=0;
	  $total_query = "select query_type, query_id, DATE_FORMAT(`query_date`,'%d-%m-%Y') as query_date, query_comment, status, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date from query_tab where client_id ='".$_SESSION["clientID"]."' and status='Active'";
	  $res_tot_query = mysqli_query($conn,$total_query);
	  if( $res_tot_query)
	  $totl_query = (int) $totl_query + (int) mysqli_num_rows($res_tot_query);
	  else
	  $totl_query =0;
	  
	  $my_pcks = "select pck_id from b2b_pck_crt where client_id='".$_SESSION["clientID"]."'";
	  $res_my_pcks = mysqli_query($conn,$my_pcks);
	  if($res_my_pcks)
	  {
	   while($row = mysqli_fetch_array($res_my_pcks))
	   {
	     $q_bought = "select pck_id from buy_pck where pck_id='".$row["pck_id"]."'";
		 $res_bought = mysqli_query($conn,$q_bought);
		 if($res_bought)
		 $num_bought = (int) $num_bought + (int) mysqli_num_rows($res_bought);
		 else
		 $num_bought=0;
		 
		 $q_cncld ="select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'";
		 $res_tot_cncl = mysqli_query($conn,$q_cncld);
		 if($res_tot_cncl)
		   $num_cncld = (int) $num_cncld + (int) mysqli_num_rows($res_tot_cncl);
		 else
		   $num_cncld=0;   
	   }
	  }
	  		
	  ?>
	   <table id="tab_counts" align="center" class="font-medium" width="90%" height="400px" cellpadding="5" cellspacing="5" style="table-layout:fixed; word-wrap:break-word; font-size:26px; float:none;">
	    <tr>
		<td width="50%" align="center" style="background:#ddd; cursor:pointer;" onClick="open_query();">
		<span id="cnt_query" ><?php echo $totl_query; ?> Queries <br/> Awaiting Response</span></td>
		  <td width="50%" align="center" style="background:#ccc; cursor:pointer;" onClick="open_leads();">
		  <span id="cnt_leads" ><?php  ?> Lead/s<br/> awaiting for Quotes</span></td>
		</tr>
		<tr>
		 <td align="center" align="center" style="background:#bbb; cursor:pointer;" onClick="open_pcks('<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">
		 <span id="cnt_sold" ><?php echo $num_bought; ?> Package/s<br/> are sold</span></td>
		 <td align="center" align="center" style="background:#aaa; cursor:pointer;" onClick="open_cncls('<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">
		 <span id="cnt_cncel" ><?php echo $num_cncld; ?> Cancellation/s<br/> are done</span></td>
		</tr>
	   </table>
	  </div>
	  
	  <div id="pckMod_chkExp" class="popUp_imgs_div" style="width:400px; height:auto; padding:10px;"></div>
	  
	  <div id="div_mod_pck" class="popUp_imgs_div" style="width:850px; height:500px; margin-left:10px; overflow-y:scroll; overflow-x:hidden;"></div>
	  <div id="div_revisepck" class="popUp_imgs_div" style="width:700px; height:auto; padding:10px; margin-left:10px;"></div>
	  <div id="div_revise_prc" class="popUp_imgs_div" style="width:600px; height:auto; padding:10px; margin-left:10px; margin-top:10px;"></div>
	  <div id="div_revise_offers" class="popUp_imgs_div" style="width:850px; height:auto; padding:10px; margin-left:10px; margin-top:10px;"></div>
	  <div id="div_revise_incl" class="popUp_imgs_div" style="width:800px; height:auto; padding:10px; margin-left:10px; margin-top:10px;"></div>

<!-----------------------------------------------------------  Package Forms --------------------------------------------------------->	   
	<div id="Package_Form" <?php if($crt_Pck_flag == true || $crt_subUser == true){?> style="width:100%; float:left; display:block;" <?php } else { ?> style="display:none;" <?php }?>>  		
	
<!---------------------------------------------------------------- Package section ------------------------------------------------------------------------->	       
	<div id="div_Package_Designer" onMouseOver="headerBtn_Color('btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_profile','btn_payment');" <?php if($crt_Pck_flag == true){?> style="width:100%; float:left; display:block;" <?php } else { ?> style="display:none;" <?php }?>> 
	  
	      <div style="height:580px; background:#FBFBFB;">

   <!-------------------------------------------------------------  Modify Package -------------------------------------------------------------------->     			 
			 <div id="modify_pack" style="float:left; width:100%; display:none;" onMouseOver=" hide_block('Pck_btns'); show_active_btn('Modify Package');  hide_block('pck_crt_mod');">
			
			 <div class="headerbtn" style="width:100%; height:23px;  background:#002929; color:#FFFFFF; box-shadow:0px 0px 0px; position:relative;">Modify package</div>
		  
		  <div style="float:left; width:100%;">
		  <div style="float:left; width:100%;"><span class="font-medium">Search By</span></div>
		  <div style="float:left; width:100%; margin-top:10px;">
		  <span style="float:left;" class="font-medium">Select Location :</span>
		  <span style="float:left; margin-left:5px;">
		    <select id="drpMod_loc" name="drpMod_loc" style="width:300px; margin:1px;" onChange="show_Loc();">
			  <option value="0">Select Location</option>
			  <?php
			  $q_sel_loc = "select distinct(loc_name) as loc_name from b2b_attr_crt";
			  $res_sel_loc = mysqli_query($conn,$q_sel_loc);
			  if($res_sel_loc)
			  {
			   while($row = mysqli_fetch_array($res_sel_loc))
			   {
			     echo '<option value="'.$row["loc_name"].'">'.$row["loc_name"].'</option>';
			   }
			  }
			  ?>
			</select>
			</span>
		  </div>
		 
		 <div style="float:left; width:100%;"><span class="font-medium" style="float:left;margin-left:280px;">Or</span></div>
		 
		  <div style="float:left; width:100%;  margin-top:10px;">
		  <span style="float:left;" class="font-medium">Select Theme :</span>
		  <span style="float:left; margin-left:15px;">
		    <select id="drpMod_vac" name="drpMod_vac" style="width:300px; margin:1px;" onChange="show_Vac();">
			  <option value="0">Select Trip Theme</option>
			  <?php
			  $q_sel_loc = "select vac_title from vac_type";
			  $res_sel_loc = mysqli_query($conn,$q_sel_loc);
			  if($res_sel_loc)
			  {
			   while($row = mysqli_fetch_array($res_sel_loc))
			   {
			     echo '<option value="'.$row["vac_title"].'">'.$row["vac_title"].'</option>';
			   }
			  }
			  ?>
			</select>
			</span>
		  </div>
		  
		  <div style="float:left; width:100%;"><span class="font-medium" style="float:left; margin-left:280px;">Or</span></div>
		  
		   <div style="float:left; width:100%; margin-top:10px;">
		   <span style="float:left;" class="font-medium">Package Posted Date Range :</span>
	       <span style="float:left;">
		   <input type="text" class="txtbox_Tab" id="pck_date1" name="pck_date1" style="width:90px;" placeholder="From Date" onClick="oDP.show(event,'pck_date1',2); ShowContent('date_calendar');" /> <span style="margin-left:3px;"> to </span>
			 <input type="text" id="pck_date2" name="pck_date2" class="txtbox_Tab" style="width:90px; margin-left:10px;" placeholder="To Date" onClick="oDP.show(event,'pck_date2',2); ShowContent('date_calendar');" />
			 </span>
			 <span style="float:left;"><div class="smallbtn" style="width:60px; float:none; margin-left:220px;" onClick="show_InDates();">Submit</div></span>
		  </div>
		
		<div style="visibility:visible; position:absolute; display:none;  z-index:10000;" id="date_calendar"></div>			
<script>
  	var oDP = new datePicker("date_calendar");
</script>
		  

		   <div style="float:left; width:100%; margin-top:10px;">
		    <div style="float:left; width:100%;"><span class="font-medium_indx">List of packages available for modification.</span></div>
		     <div style="width:100%; height:200px; overflow-y:scroll; background:#fff; border:1px solid #666;">
			 <table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">
			 <tr style="background:#bbb; color:#fff;">
			  <th align="center" width="30px">SlNo.</th>
			  <th width="100px">Package Title 
			  <span style="margin-left:1px; cursor:pointer;"><img src="Images/collapse_icon_up.png" width="15px" height="15px" onClick="pckMod_sort('Asc');"/></span>
			  <span style="margin-left:5px; cursor:pointer;"><img src="Images/expand_icon.png" width="15px" height="15px" onClick="pckMod_sort('Desc');" /></span> </th>
			   <th width="100px">Posted Date 
			   <span style="margin-left:1px; cursor:pointer;"><img src="Images/collapse_icon_up.png" width="15px" height="15px" onClick="pckModDt_sort('Asc');"/></span>
			   <span style="margin-left:5px; cursor:pointer;"><img src="Images/expand_icon.png" width="15px" height="15px" onClick="pckModDt_sort('Desc');" /></span></th>
			  <th width="100px">Location 
			  <span style="margin-left:1px; cursor:pointer;"><img src="Images/collapse_icon_up.png" width="15px" height="15px" onClick="pckModLoc_sort('Asc');"/></span>
			  <span style="margin-left:5px; cursor:pointer;"><img src="Images/expand_icon.png" width="15px" height="15px" onClick="pckModLoc_sort('Desc');" /></span></th>			 
			 </tr>
			 </table>
			 <div id="div_mod" style="float:left; width:100%;">
			 <table style="width:100%; table-layout:fixed;" cellpadding="1" class="font-small" cellspacing="0" border="1px solid #bbb">
		   	  <?php
			  $sel_prf = "select client_id from b2b_profile where company_name='".$_SESSION["CompName"]."'";
			  $res_prf = mysqli_query($conn,$sel_prf);
			  while($r = mysqli_fetch_array($res_prf))
			  {
			  $q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, validity, locations from b2b_pck_crt where client_id='".$r["client_id"]."' ";
			  $res_sel_pck = mysqli_query($conn,$q_sel_pck);
			  if($res_sel_pck)
			  {
			    $sl=0;
			   while($row = mysqli_fetch_array($res_sel_pck))
			   {
			    
				$loc = explode(",",$row["locations"]);
				$exp = explode("to ",$row["validity"]);
   $dt1 = date_create(date('Y-m-d'));   
   $dt2 = date_create(date('Y-m-d',strtotime($exp[1])));   
   $diff = date_diff($dt1,$dt2);  
	
   if($diff->format("%R%a") < 0)
   {
   $sl++;
				echo '<tr>';
			     echo '<td width="30px">'.$sl.'</td>';
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');;">'.$loc[0].'...</span></td>';
				 echo '</tr>';
				 }
			    }
			  }
			  }
			  ?>
			  </table>
			  </div>
			</div>
		  </div>
		  
		  </div>
		  
		</div>		
	
	<!------------------------------------------------------------  Create Package ---------------------------------------------------------------------->	
		   <div id="create_pack" onMouseOver="headerBtn_Color('btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_profile','btn_payment'); show_active_btn('Create Package'); hide_block('pck_crt_mod');" <?php if($crt_Pck_flag == true){?> style="width:100%; float:left; display:block;" <?php } else { ?> style="display:none;" <?php }?>>
		
		<div id="div_pck_post_cost" style=" position:absolute; text-align:center; z-index:100000; top:-200px; display:none; background:#fff;" >
				   <div style="width:95%; margin:5px; margin-left:10px; float:left; border:1px solid #444; border-radius:5px;">
				      <table class="font-small" width="100%"  cellpadding="1" cellspacing="0" style="float:left;">
					    <tr>
						  <td>
						    <table style="width:100%;" border="1" cellpadding="1" cellspacing="0">
							  <tr>
							   <th>Display Plan</th>
							  </tr>
							   <tr>
							   <td>Per day</td>
							  </tr>
							  <tr>
							   <td>Regular</td>
							  </tr>
							  <tr>
							   <td>Highlighted</td>
							  </tr>
							  <tr>
							   <td>Top-7</td>
							  </tr>
							</table>
						  </td>
						  <td>
						    <table style="width:100%;" border="1" cellpadding="1" cellspacing="0">
							  <tr>
							   <th colspan="6" align="center">Package costs range in INR</th>
							  </tr>
							  <tr>
							    <th>Upto 7499</th>
								<th>7,500-14,999</th>
								<th>15,000-25,000</th>
								<th>25,000-50,000</th>
								<th>50,000-99,999</th>
								<th>over 1,00,00,000</th>
							  </tr>
							  <tr>
							    <td>5</td>
								<td>7</td>
								<td>10</td>
								<td>15</td>
								<td>20</td>
								<td>30</td>
							  </tr>
							  <tr>
							    <td>10</td>
								<td>14</td>
								<td>20</td>
								<td>25</td>
								<td>30</td>
								<td>50</td>
							  </tr>
							  <tr>
							    <td>15</td>
								<td>20</td>
								<td>30</td>
								<td>40</td>
								<td>50</td>
								<td>75</td>
							  </tr>
							</table>
						  </td>
						</tr>
					  </table>
				    </div>
				 </div>
			
		<span style="float:left; width:68%;">	
		     <div style="float:left; width:100%;">
			
			<div id="Package_Section" style="float:left; width:100%;">
						
					<div class="headerbtn" style="width:100%; height:23px;  background:#002929; color:#FFFFFF; box-shadow:0px 0px 0px; position:relative;">Build a package</div>
			
			        <div style="float:left; width:100%; margin-bottom:5px;"> 
			  <span style="float:left; margin-left:10px;"><div id="btn_title" class="btn_semi_trapez_onFocus" style="width:60px;" onClick="disp_block('div_title','div_vac','div_travler','div_cost','div_incl');">Title</div></span>
			  
			   <span style="float:left;"><div  id="btn_vac" class="btn_semi_trapez" style="width:auto; padding-left:5px;" onClick="disp_block('div_vac','div_title','div_travler','div_cost','div_incl');">Theme-Location</div></span>

			   <span  style="float:left;"><div id="btn_travler" class="btn_semi_trapez" style="width:auto; padding-left:5px;" onClick="disp_block('div_travler','div_incl','div_title','div_vac','div_cost');">Travellers</div></span>

			   <span  style="float:left;"><div id="btn_incl" class="btn_semi_trapez" style="width:auto; padding-left:5px;" onClick="disp_block('div_incl','div_title','div_vac','div_travler','div_cost');">Inclusions</div></span>

			   <span  style="float:left;"><div id="btn_attr" class="btn_semi_trapez" style="width:auto; padding-left:5px;"  onClick="disp_block('div_cost','div_incl','div_title','div_vac','div_travler');">Attractions</div></span>
			 
			 </div>
				  
				  <div id="div_title">
				  
			       <div style="width:100%; float:left; margin-top:10px;">
			      <span class="font-medium" style="float:left; margin-right:5px;">Package Name/Title</span>
				  <span style="float:left;"><input type="text" id="txt_packName" name="txt_packName" class="txtbox_crt" /></span>
				  </div>
				  
				    <div style="float:left; width:100%;">
			      <span class="headerTitle" style="margin-left:140px;"><div class="Acc_smallbtn" style="width:120px; margin-left:5px; background:#191F4D; color:#fff; font-size:16px; cursor:pointer; height:22px;" onClick="show_block('div_pckImgs');">
				Upload Pictures</div> &nbsp; relevant to the package/vacation</span>
			   </div>
			   
				   <div id="div_pckImgs" style="display:none; float:left; width:100%; margin-left:140px;">
				    <div style="position:relative; float:left; width:100%; margin-top:5px;">
			 <span style="float:left;"><input type="text" id="file1" style="position:absolute;" class="txtbox_Tab" placeholder="Select an image" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile1" name="imgfile1" style="opacity:0; z-index:1;" onChange="document.getElementById('file1').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/></span>
</div>
		 <div style="position:relative; float:left; width:100%; margin-top:5px;">
		 <span style="float:left;"><input type="text" id="file2" style="position:absolute;" class="txtbox_Tab" placeholder="Select an image" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile2" name="imgfile2" style="opacity:0; z-index:1;" onChange="document.getElementById('file2').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/></span></div>	
				 
					 </div>
					 
					<div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_vac'); hide_block('div_title'); btn_color('btn_vac','btn_title');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick=" show_preview();">Next ></div></span></span>
				 <span style="float:right; margin-right:5px;">
				 <span><div class="smallbtn" style="width:60px; font-weight:bold; background:#EEEEEE; color:#999999;"> < Back</div></span></span>
			   </div> 
			   
					</div>
			 
				 <div id="div_vac" style="margin-top:5px; position:relative; display:none;">
			  
			 	   <div class="headerTitle">
				 <span>Select locations for the vacation package.</span>
				</div>	

				   <div style="float:left; width:100%;">
	
			   <span style="float:left;" class="font-medium">
			   <input type="radio" name="rdtype" id="rdDomes" class="zoombox"  value="DOMESTIC" onClick="show_div(this.id,'div_st','div_cntry'); " /></span> 
			   <span class="font-medium" style="float:left; cursor:pointer; margin-left:3px;" onClick="chk_loc_type('rdDomes'); show_div('rdDomes','div_st','div_cntry');">DOMESTIC</span>
<span style="float:left">
<input type="radio" name="rdtype" id="rdInterNl" class="zoombox" style="margin-left:10px; float:left;" value="INTERNATIONAL" onClick="show_div(this.id,'div_cntry','div_st');" /> </span>
<span class="font-medium" style="float:left; cursor:pointer; margin-left:3px;" onClick="chk_loc_type('rdInterNl'); show_div('rdInterNl','div_cntry','div_st');"> INTERNATIONAL </span>
			 </div>
			 
					 <div style=" height:160px; width:100%; float:left;">
		
			   <div id="div_cntry"  style="display:none; float:left; margin-top:5px;" >
			   <span class="font-medium">Country</span>			  
			   <span class="font-medium" style="margin-left:5px;">
			     <select name="drpCountry" id="drpCountry" style="width:180px;" onChange="showIntl_Loc(); show_block('div_loc_num');">
				   <option selected="selected"></option>
				    <?php
				     $q_st = "select distinct(country) as Country from user_destinations";
					 $r_st = mysqli_query($con,$q_st);
					 if($r_st)
					 {
					   while($row = mysqli_fetch_array($r_st))
					    {
						  echo '<option value="'.strtoupper($row["Country"]).'">'.strtoupper($row["Country"]).'</option>';
						}
					 }
				   ?>
				 </select>
			   </span>	
			   </div>
			   	   
			   <div id="div_st" style="display:none; float:left;  margin-top:5px;">
			   <span class="font-medium">State</span>
			       <span style="margin-left:5px; float:left;">
				   <select id="drpState" name="drpState" style="width:180px;" onChange="showDistr(); show_block('div_loc_num');">
                      <option selected="selected"></option>
                      <?php
					  $q_st = "select distinct(stateName) as stateName from user_destinations where type='DOMESTIC'";
					  $res_st = mysqli_query($con,$q_st);
			     	  while($row = mysqli_fetch_array($res_st))
				      {
				      ?>
                      <option value="<?php echo $row["stateName"]; ?>"> <?php echo $row["stateName"]; ?> </option>
                      <?php				  
					 }
				     ?>
                    </select>
                    </span>
					</div>
					
		    	<div id="div_loc_num" style="width:100%; float:left; margin-top:5px; display:none;">
			   <span style="float:left; margin-left:20px; cursor:pointer;">
			   <input type="radio" id="rdSingle" name="rdloc" value="Single" onClick="show_block('div_locs'); clrDur_mult(); showDistr(); showIntl_Loc();" /></span>
			   <span class="font-medium" style="float:left; margin-left:3px; cursor:pointer;" onClick="clrDur_mult(); chk_loc_type('rdSingle'); show_block('div_locs'); showDistr(); showIntl_Loc();">Single Destination or</span>
			   <span class="font-medium" style="float:left; margin-left:20px; cursor:pointer">
			   <input type="radio" id="rdMulti" name="rdloc" value="Multiple" onClick="show_block('div_locs'); clrDur_tab(); showDistr(); showIntl_Loc();"/></span>
			   <span class="font-medium" style="float:left; margin-left:3px; cursor:pointer;" onClick="clrDur_tab(); chk_loc_type('rdMulti'); show_block('div_locs'); showDistr(); showIntl_Loc();">Multiple</span>
			   </div>				 
							
			   <div id="div_locs" style="float:left; width:100%; margin-top:5px; display:none;">
			    <span style="float:left; width:35%;">
				  <div id="txtHint_d" style="float:left; width:100%; height:90px;">
	
                    </div> 
					            
                </span>
				<span style="float:left; width:60%; margin-left:5px; height:90px; overflow-y:scroll;">
				<table id="tab_dur" width="95%" border="1px" cellpadding="0" style="font-size:14px; font-family:Calibri;">
				   <tr >				      
					   <th>Location</th>
					   <th>Nights</th>
					   <th>Days</th>
					 </tr>
					 <tr>
					   <th>Total</th>
				<th colspan="2"><input type="text" style="border:0px; background:transparent; width:50px;font-size:14px; font-family:Calibri;" id="txtDur" name="txtDur" /></th>
					 </tr>
				  </table>
				</span>
		       </div>
			   			  
			   </div>
			 						 	
				   <div id="vac_themes">
			     <span  class="headerTitle">Please select one or more vacation themes to this package</span>
				 <span  style="float:left;">
				  <div style="width:100%; margin-top:5px;">
		 	    
				  <div class="div_dropdown_crt" >
			<span class="font-medium" onClick="show_block('div_vacType'); show_block('up_arrow_vacType'); hide_block('down_arrow_vacType');"> --------Trip Themes------- </span>			
			
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
				  <span style="float:left;">
				  <textarea id="sp_theme" name="sp_theme" readonly="readonly"  style="width:300px; border:0px; background:transparent; height:60px; overflow:hidden; font-size:12px; color:#0066ff; font-family:Calibri; outline:none;"></textarea>
				  </span>
				 </div>
				 
				  <div id="div_non_adv_zone" style="float:left; width:100%; margin-top:10px;" class="font-medium">
				  <span style="float:left;"> Trip Agenda :</span>	
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkAct" name="chkAct" value="Activities" onClick="selTripAgen('chkAct');chk_count();"/>
				   <span style="cursor:pointer;" onClick="selTripAgen_sp('chkAct'); chk_count();">Activities</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkSight" name="chkSight" value="Sightseeing" onClick="selTripAgen('chkSight');chk_count();"/>
				   <span style="cursor:pointer;" onClick="selTripAgen_sp('chkSight'); chk_count();">Sightseeing</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkRest" name="chkRest" value="Rest-Relaxation" onClick="selTripAgen('chkRest');chk_count();" />
				   <span style="cursor:pointer;" onClick="selTripAgen_sp('chkRest'); chk_count();">Rest-Relaxation</span></span>				 
				 </div>
				 
				 <div id="div_adv_sub_type" style="float:left; width:100%; margin-top:10px; display:none;" class="font-medium">
				   <span style="float:left;"> Preferred Adventure Zone:</span><br/>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkLand" name="chkLand" value="Adv-Land"  onClick="selTripAgen('chkLand'); chk_Adv_cnt(this.id);"/><span style="cursor:pointer;" onClick="selTripAgen_sp('chkLand');">Land</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkWater" name="chkWater" value="Adv-Water"  onClick="selTripAgen('chkWater'); chk_Adv_cnt(this.id);"/><span style="cursor:pointer;" onClick="selTripAgen_sp('chkWater');">Water</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkSky" name="chkSky" value="Adv-Sky"  onClick="selTripAgen('chkSky'); chk_Adv_cnt(this.id);"/><span style="cursor:pointer;" onClick="selTripAgen_sp('chkSky');">Sky</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkMountain" name="chkMountain" value="Adv-Mountain"  onClick="selTripAgen('chkMountain');"/><span style="cursor:pointer;" onClick="selTripAgen_sp('chkMountain'); chk_Adv_cnt(this.id);">Mountain</span></span>
				   <span style="float:left; margin-left:8px;"><input type="checkbox" id="chkForest" name="chkForest" value="Adv-Forest"  onClick="selTripAgen('chkForest'); chk_Adv_cnt(this.id);"/><span style="cursor:pointer;" onClick="selTripAgen_sp('chkForest');">Forest</span></span>
				 </div>
				 
				  <span id="sp_multi" style="float:left; margin-left:8px; display:none;">
				  <input type="radio" id="rdMult" name="rdAgenda" value="Multiple" onClick="selTripAgen('rdMult');" /><span style="cursor:pointer;">Multiple</span></span>
				  
				 <div style="float:left; width:100%; margin-top:10px;" class="font-medium">
				   <span style="float:left;"> Trip Intensity :</span>
				   <span style="float:left; margin-left:10px;"><input type="radio" id="rdLow" name="rdInten" value="L" onClick="selTrpInt();"/><span style="cursor:pointer;" onClick="selTrpInt_sp('rdLow','Low');">Low</span></span>
				   <span style="float:left; margin-left:10px;"><input type="radio" id="rdMed" name="rdInten" value="M" onClick="selTrpInt();"/><span style="cursor:pointer;" onClick="selTrpInt_sp('rdMed','Medium');">Medium</span></span>
				   <span style="float:left; margin-left:10px;"><input type="radio" id="rdHgh" name="rdInten" value="H" onClick="selTrpInt();"/><span style="cursor:pointer;" onClick="selTrpInt_sp('rdHgh','High');">High</span></span>			   
					 </div>		
					 		 
   			      <div style="margin-top:5px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_travler'); hide_block('div_vac'); btn_color('btn_travler','btn_vac');show_preview();">
				 <div class="smallbtn" style="width:60px; font-weight:bold;">Next ></div></span></span>
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('div_title'); hide_block('div_vac'); btn_color('btn_title','btn_vac');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			       </div>
				 
				 </div>  
	   
			   <div id="div_travler" style="display:none;">
			     <div>
			   <div class="headerTitle">
			     <span >Please select the target traveller segment for this package/trip. Can select more than one segment if applicable.</span>
			   </div>
			   
			    <div style="width:100%; float:left;">
			      <span style="float:left; margin-top:10px;" class="font-medium">Choose...</span>
			   </div>
			   		
			    <div align="left" style="width:100%; margin-top:5px; float:left;">
							 
					 <div class="font-medium" style="width:100%; float:left;">
				  <span><input type="checkbox" value="Single" name="chkSingle" id="chkSingle" onClick="disp_subCate('chkSingle','adlt_age'); disp_subCate('chkSingle','adlt_gender');" /><span style="cursor:pointer;" onClick="chk_loc_type('chkSingle'); disp_subCate('chkSingle','adlt_age'); disp_subCate('chkSingle','adlt_gender');">Single</span></span>
				  <span><input type="checkbox" value="Couple" name="chkCouple" id="chkCouple" onClick="disp_subCate('chkCouple','adlt_age'); hide_block('adlt_gender'); hide_block('sp_grp_age');" /><span style="cursor:pointer;" onClick="chk_loc_type('chkCouple'); disp_subCate('chkCouple','adlt_age');  hide_block('adlt_gender'); hide_block('sp_grp_age');">Couple</span></span>
				  <span><input type="checkbox" value="Group" name="chkGroup" id="chkGroup" onClick="disp_subCate('chkGroup','adlt_age'); hide_block('adlt_gender'); show_block('sp_grp_age');" /><span style="cursor:pointer;" onClick="chk_loc_type('chkGroup');disp_subCate('chkGroup','adlt_age');  hide_block('adlt_gender'); show_block('sp_grp_age');">Groups </span></span>
				  </div>
				  
				  <div id="adlt_age" class="font-medium" style="width:100%; float:left; margin-top:10px; display:none;">
				  <span>Age group:
					<input type="checkbox" value="Under 45"  name="chkage45" id="chkage45" /><span style="cursor:pointer;" onClick="chk_loc_type('chkage45');"> Under 45</span> 
				    <input type="checkbox" value="Above 45" name="chkage45plus" id="chkage45plus"> <span style="cursor:pointer;" onClick="chk_loc_type('chkage45plus');">Above 45</span>					
	                 <span id="sp_grp_age" style="display:none;">
					<input type="checkbox" value="Above 60" name="chkage60plus" id="chkage60plus"> <span style="cursor:pointer;" onClick="chk_loc_type('chkage60plus');">Above 60
					</span>
					</span>
				</div>
				
				<div id="adlt_gender" class="font-medium" style="width:100%; float:left; margin-top:10px; display:none;">
				  <span>Gender:
					<input type="radio" value="Male"  name="rdGen" id="rdMale" /><span style="cursor:pointer;" onClick="chk_loc_type('rdMale');">Male</span> 
				    <input type="radio" value="Female" name="rdGen" id="rdFemale"> <span style="cursor:pointer;" onClick="chk_loc_type('rdFemale');">Female</span></span>
				</div>
					
				  <div class="font-medium" style="width:100%; float:left;  margin-top:10px;">
				   <span><input type="checkbox" value="Family+Kids" id="chkFamilykid" name="chkFamilykid" onClick="disp_subCate('chkFamilykid','kids_age'); hide_block('adlt_gender');"><span style="cursor:pointer;" onClick="chk_loc_type('chkFamilykid');disp_subCate('chkFamilykid','kids_age');  hide_block('adlt_gender');"> Family+Kids</span>.</span>
				  <span><input type="checkbox" value="Group+Kids"  id="chkGroupkid" name="chkGroupkid" onClick="disp_subCate('chkGroupkid','kids_age'); hide_block('adlt_gender');"><span style="cursor:pointer;" onClick="chk_loc_type('chkGroupkid');disp_subCate('chkGroupkid','kids_age');  hide_block('adlt_gender');">Group+Kids</span></span>
				  </div>
				
				     <div  id="kids_age" class="font-medium" style="display:none; width:100%; float:left;  margin-top:10px;">
						<span>Kid's Age:
						<input type="checkbox" id="chkkid" name="chkkid" value="0-2Yrs" /><span style="cursor:pointer;" onClick="chk_loc_type('chkkid');">0-2Yrs</span>	
				 		 <input type="checkbox" id="chkchild"  name="chkchild" value="2-12Yrs" /><span style="cursor:pointer;" onClick="chk_loc_type('chkchild');">2-12Yrs </span>
			<input type="checkbox" id="chkchildplus"  name="chkchildplus" value="12+Yrs" /><span style="cursor:pointer;" onClick="chk_loc_type('chkchildplus');">12+Yrs </span>
						 </span>
							</div>
					
					</div>
				</div>
				
				<div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_incl'); hide_block('div_travler'); btn_color('btn_incl','btn_travler');show_travler();">
				 <div class="smallbtn" style="width:60px; font-weight:bold;">Next ></div></span></span>
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('div_vac'); hide_block('div_travler'); btn_color('btn_vac','btn_travler');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			   </div>
			   
			   </div>			   		   							   
		
			   <div id="div_incl" style="display:none;">
			  
			   <div id="inclusions">
			   <div class="headerTitle">
			     <span>Please select package inclusions from below</span>
			   </div>
			    
				<div style="width:100%; float:left; margin-top:5px;">
			      <span class="font-medium" style="float:left; width:100%; text-align:left"><input type="checkbox" id="chkIncl_1"  name="chkIncl_1" value="Accomodation" onClick="selIncl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_sp('chkIncl_1');">Accomodation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_2" name="chkIncl_2" value="Transport" onClick="selIncl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_sp('chkIncl_2'); check_trp(this.id);">Transportation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_3" name="chkIncl_3" value="Local Transport" onClick="selIncl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_sp('chkIncl_3'); check_trp(this.id);">Local Transport</span></span>		
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_4" name="chkIncl_4" value="Sightsee/Attractions" onClick="selIncl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_sp('chkIncl_4');">Sightseeing/Attractions</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_5" name="chkIncl_5" value="Trip Guide" onClick="selIncl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_sp('chkIncl_5');">Trip Guide</span></span>	
				    
			   </div>

			   <div style="width:100%; float:left;">
			<span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkOtherFac" onClick="selIncl(this.id); create_Oth_incl('chkOtherFac');" style="float:left;" /><span style="cursor:pointer;" onClick="selIncl_sp('chkOtherFac');create_Oth_incl('chkOtherFac');">Others</span></span>
			   </div>
			   
			   <div id="div_pck_incl" style="float:left; height:80px; overflow-y:scroll; overflow-x:hidden; width:250px; display:none;">
			     <table id="tab_faci" style="float:left; width:100%;">			   
				 </table>
			   </div>
			
			   </div>
			   
				<div id="exclusions" style="margin-top:20px; float:left; width:100%;">
				
			   <div class="headerTitle" style="margin-bottom:0px;">
			     <span>Please select package exclusions from below</span>
			   </div>
			    
				<div style="width:100%; float:left; margin-top:3px;">
			      <span class="font-medium" style="float:left; width:100%; text-align:left"><input type="checkbox" id="chkExcl_1"  name="chkExcl_1" value="Accomodation" onClick="selExcl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_sp('chkExcl_1');">Accomodation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkExcl_2" name="chkExcl_2" value="Transport" onClick="selExcl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_sp('chkExcl_2'); check_trp(this.id);">Transportation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkExcl_3" name="chkExcl_3" value="Local Transport" onClick="selExcl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_sp('chkExcl_3'); check_trp(this.id);">Local Transport</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkExcl_4" name="chkExcl_4" value="Sightsee/Attractions" onClick="selExcl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_sp('chkExcl_4');">Sightseeing/Attractions</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkExcl_5" name="chkExcl_5" value="Trip Guide" onClick="selExcl(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_sp('chkExcl_5');">Trip Guide</span></span>	
				  		  
			   </div>

			   <div style="width:100%; float:left;">
			<span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkOtherFac_excl" onClick="selExcl(this.id); create_Oth_excl('chkOtherFac_excl');" style="float:left;" /><span style="cursor:pointer;" onClick="selExcl_sp('chkOtherFac_excl'); create_Oth_excl('chkOtherFac_excl');">Others</span></span>
			   </div>
			   
			   <div id="div_pck_excl" style="float:left; height:80px; overflow-y:scroll; overflow-x:hidden; width:250px; display:none;">
			     <table id="tab_faci_excl" style="float:left; width:100%;">			   
				 </table>
			   </div>
			
			   </div>
			   
			   <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_attr'); hide_block('div_incl'); btn_color('btn_attr','btn_incl'); createAttr(); show_preview();">
				 <div class="smallbtn" style="width:60px; font-weight:bold;">Next ></div></span></span>
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('div_travler'); hide_block('div_incl'); btn_color('btn_travler','btn_incl');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			   </div>
			  
			   </div>
			   
			   <div id="div_attr" style="display:none; width:100%; float:left;">
			   			   
			   <div id="div_attr_dtl" style="width:100%; float:left;">
			  
			   <div class="headerTitle">
			   <span>Specify the details of the attraction covered in the package as part of iternary.</span>
			   </div>
			   <div style="height:320px; overflow-x:hidden; overflow-y:scroll; width:100%;">
		        <table id="tab_attraction" class="font-medium" style="width:100%;" cellpadding="0" cellspacing="0">
				  <tr>
				  <th align="left">Location</th>
				   	<th align="left">Day</th>					
					<th align="left">Category</th>
					<th align="left">Attraction</th>
					<th align="left">Start</th>
					<th align="left">Finish</th>
					<th align="left">Time<br/> allocated</th>
					<th align="left">Add</th>
					<th align="left">Delete</th>
	      		  </tr>
			</table>
		    </div>
			     <input type="text" readonly="true" style="visibility:hidden;" id="txtAttrCnt" name="txtAttrCnt" />
			  	 <div style="margin-top:20px; width:100%; float:left;">					 
				 <span style="float:left;"><div class="smallbtn" style="width:60px; font-weight:bold;" onClick="show_block('div_incl'); hide_block('div_attr');  btn_color('btn_incl','btn_attr'); "> < Back</div></span>
				 <span style="float:right; margin-right:50px;" onClick="chng_hdr_clr('btn_Accomodation'); createHtl();">
				 <span onClick="show_section('Accomodation_Section','Package_Cost','Package_Section','Cancel_Section','Transport_Section'); ">
<div class="smallbtn" style="width:60px; font-weight:bold; color:#fff; background:#ff0000;" onMouseOver="attrRows();" onClick="attr_preview();">Submit</div></span>	</span> 
			   </div>
			</div>
			   
			</div>
			
			</div>
			
             <div id="Accomodation_Section" style="display:none;">
		
             <div id="pack_detls" style="margin-top:0px; float:left; background:#FFFFFF; height:55px; width:99%;">
			 
			   <span onClick="disp_block('div_htl_details','div_htl_incls','div_htl_excl');">
			   <span style="float:left;"><div id="btn_htl_details" class="btn_semi_trapez_onFocus">Hotel Info</div></span></span>
			   
			   <span onClick="disp_block('div_htl_incls','div_htl_details','div_htl_excl');">
			   <span style="float:left;">
			   <div id="btn_htl_incls" class="btn_semi_trapez" style="width:auto; padding-left:3px">Inclusions & Exclusions</div></span></span>
			 		   
			</div>
		  
		     <div id="div_htl_details" style="width:98%; height:500px; float:left; display:block;">
		     <div class="headerTitle">
			 <span>Please specify the details of the hotel offered in the package</span>
			 </div>
		 
		    <div id="div_htl_dtls" style="height:320px; overflow-y:scroll; overflow-x:scroll; width:100%;">
			<table id="tab_hotel" class="tabs" cellspacing="1" style="width:100%;">
		 
		   </table>
		  </div>
		   <input type="text" style="visibility:hidden;" readonly="true" id="txtHtlRows" name="txtHtlRows" />
		    <div style="margin-top:20px; width:100%; float:left;" >			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_htl_incls'); hide_block('div_htl_details'); btn_color('btn_htl_incls','btn_htl_details'); createHtl_excl(); htl_preview(); ">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onMouseOver="htl_rows();" onClick="createHtl_incl();">Next ></div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span><div class="smallbtn" style="width:60px; font-weight:bold; color:#444444; background:#EEEEEE;"> < Back</div></span></span>
			   </div>
			   
		  </div>		  
		  
		  <div id="div_htl_incls" style="width:98%; height:500px; float:left; display:none;">
		
		    <div>
			
			   <div class="headerTitle">
			     <span>Please specify facilities inclusion at the hotel specified</span>
			   </div>
			  
			   <table id="tab_Hincl" class="font-small" style="width:100%; color:#555;">
			   <tr>
			  	 <th>Locations</th>
				  <th>Hotel Name</th>
				 <th>Break-<br/>fast</th>
				<th>Lunch</th>
				<th>Dinner</th>
				<th>Laundry</th>
				<th>SPA</th>
				<th>Alcoholic<br/> Beverages</th>
				<th>Wifi</th>
				<th>Others</th>				
				</tr>				
			    </table>			     
		
	     	<div style="float:left; width:100%;">
			   <div class="headerTitle">
			     <span >Enter hotel exclusions</span>
	    		   </div>
				   
	              <table id="tab_Hexcl" class="font-small" style="width:100%; color:#555;">
			   <tr>
			  	 <th>Locations</th>
				 <th>Hotel Name</th>
				 <th>Break-<br/>fast</th>
				<th>Lunch</th>
				<th>Dinner</th>
				<th>Laundry</th>
				<th>SPA</th>
				<th>Alcoholic<br/> Beverages</th>
				<th>Wifi</th>
				<th>Others</th>
				</tr>
		    </table>
			   
			   </div>
					
		   <div style="margin-top:20px; width:100%; float:left;">			   
			  <span style="float:right; margin-right:50px;" onClick="chng_hdr_clr('btn_Transport'); createHtl_incl_prev(); ">
				 <span onClick=" createHtl_excl_prev(); show_section('Transport_Section','Package_Section','Accomodation_Section','Package_Cost','Cancel_Section');   ">
                  <div class="smallbtn" style="width:60px; font-weight:bold; color:#FFF; background:#FF0000;" onClick="">Submit</div></span></span> 
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('div_htl_details'); hide_block('div_htl_incl'); btn_color('btn_htl_details','btn_htl_incl');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			   </div>
			   
		  </div>
	
		</div>	
		 	
			</div>			
		
	        <div id="Transport_Section" style="display:none;">
		
		<div id="div_IC" style="float:left; width:100%;">
		<div style="float:left; width:100%">
		   <span id="sp_p2p" class="font-medium" style="float:left; font-size:18px; font-weight:bold;">
		   <input type="checkbox" id="chkP2PIncl" name="chkP2PIncl" checked="checked" style="width:30px; zoom:1.6;" />Transportation included</span>
		  </div>
		  <div style="float:left; width:100%; margin-top:10px;">
   <span class="font-medium" style="float:left; margin-left:10px; font-size:16px;">Please re-confirm transportation </span>
     <span style="float:left; margin-left:10px;"><input type="radio" value="Included" id="rdP2p_Incl" name="rdP2p" onClick="load_dest_IC();; chk_checked_p2p('rdP2p_Incl','inter_city_div','sp_p2p','rdP2p_Excl');" />Included</span>
	 <span style="float:left; margin-right:10px;"><input type="radio" id="rdP2p_Excl" value="No" name="rdP2p" onClick="chk_checked_p2p('rdP2p_Incl','inter_city_div','sp_p2p','rdP2p_Excl');" />Excluded</span>
	  </div>
	  </div>
	  
	     <div id="div_transfers" style="display:none; width:100%; float:left;">
			 <div style="float:left; width:100%;">
	<span id="sp_c2c" class="font-medium" style="float:left; font-size:18px; font-weight:bold;">
	<input type="checkbox" id="chkC2CIncl" name="chkC2CIncl" checked="checked" style="width:30px; zoom:1.6;"/>Transportation included</span>
		  </div>		  
		  <div style="float:left; width:100%;">
   <span style="float:left; margin-left:10px;">Is transporation included or excluded</span>
     <span style="float:left; margin-left:10px;"><input type="radio" value="Included" id="rdc2c_Incl" name="rdc2c"  onClick="createMode(); chk_checked_c2c('rdc2c_Incl','within_city_div','sp_c2c','rdc2c_Excl');" />Included</span>
	 <span style="float:left; margin-right:10px;"><input type="radio" id="rdc2c_Excl" name="rdc2c" value="No" onClick="Exclude_trvl('tab_transport');" />Excluded</span>
   </div>
   </div>
   
          <div id="div_lcl_trp" style="display:none; width:100%; float:left;">
			   <div style="float:left; width:100%;">
		   <span  id="sp_lcl" class="font-medium" style="float:left; font-size:18px; font-weight:bold;">
		   <input type="checkbox" id="chkLCLIncl" name="chkLCLIncl" checked="checked" style="width:30px; zoom:1.6;" />Transportation included</span>
		  </div>
		 <div style="float:left; width:100%;">
   <span style="float:left; margin-left:10px;">Is transporation included or excluded</span>
     <span style="float:left; margin-left:10px;"><input type="radio" value="Included" id="rdlcl_Incl" name="rdlcl" onClick="createLMode();; chk_checked_lcl('rdlcl_Incl','lcl_trp','sp_lcl','rdlcl_Excl');" />Included</span>
	 <span style="float:left; margin-right:10px;"><input type="radio"  id="rdlcl_Excl" name="rdlcl" value="No" onClick="Exclude_trvl('tabLocal_trp');" />Excluded</span>
   </div>
	  </div>
	  
	      <div id="pack_detls" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%;">
			 
			   <span onClick="disp_block('div_ptp_trans','div_transfers','div_lcl_trp');">
			   <span style="float:left;"><div id="btn_ptp_trans" class="btn_semi_trapez_onFocus">Inter-City</div></span></span>
			   
			   <span onClick="disp_block('div_transfers','div_ptp_trans','div_lcl_trp');">
			   <span style="float:left;"><div id="btn_trp_c2c" class="btn_semi_trapez" style="width:120px;">Point-to-point</div></span></span>
			   
			   <span onClick="disp_block('div_lcl_trp','div_ptp_trans','div_transfers');">
			   <span style="float:left;"><div id="btn_trp_lcl" class="btn_semi_trapez" style="width:120px;">Local Transport</div></span></span>	
			   		   
			</div>
		
	      <div id="inter_city_div" style="display:none; width:100%; float:left; margin-top:20px;">	
		       <div id="div_ptp_trans" style="display:block; float:left; width:100%;">
			<div class="headerTitle">
			<span>Please provide the details of the transportation arrangement made for the package.</span></div>
			
			<div style="float:left; width:100%;"> 
			<div style="float:left; width:100%; margin-top:10px;"><span class="font-medium" style="float:left;">Inter-city (Origin to Destination) travel coverage</span></div>
			<div style="float:left; width:100%;"> 
		<span class="font-medium" style="float:left; margin:5px 5px 5px 5px;"><input type="radio" name="rdWay" id="rdNone" value="None" onClick="show_Ways();"/><span style="cursor:pointer;" onClick="chk_loc_type('rdNone');show_Ways();">None</span></span>		
		<span class="font-medium" style="float:left; margin:5px 5px 5px 5px;"><input type="radio" name="rdWay" id="rdOne" value="OneWay" onClick="show_Ways();"/><span style="cursor:pointer;" onClick="chk_loc_type('rdOne');show_Ways();">One Way</span></span>
	      <span class="font-medium" style="float:left; margin:5px 5px 5px 5px;"><input type="radio" name="rdWay" id="rdTwo" value="TwoWay" onClick="show_Ways(); show_intercity();"/><span style="cursor:pointer;" onClick="chk_loc_type('rdTwo');show_Ways();show_intercity();">Two Way</span></span>
			</div>		
			</div>
			
		    <div id="div_OneWay" style="float:left; width:100%; display:none; margin-left:5px;">
			   <span class="font-medium" style="float:left;"> <input type="radio" name="rdarr" id="rdArr" value="Onward" onClick="show_Ways();"/><span style="cursor:pointer;" onClick="chk_loc_type('rdArr');show_Ways(); show_intercity();">Onward</span></span>
			  <span class="font-medium" style="float:left;"><input type="radio" name="rdarr" id="rdReturn" value="Return" onClick="show_Ways();"/><span style="cursor:pointer;" onClick="chk_loc_type('rdReturn');show_Ways(); show_intercity();">Return</span></span>			 
			</div>
			
			
			
		     <div id="div_onward" style="float:left; width:100%; margin-top:10px; display:none;">
		<div style="float:left; width:100%; margin-top:10px;"><span class="font-medium">Onward</span></div>
			<table style="width:90%;">
			 <tr>
			  <td><span class="font-medium">From</span> </td>
			   <td><span class="font-medium">To</span></td>
			     <td><span class="font-medium">Mode</span></td>
			   </tr>
			   <tr>
			     <td>
			   <input type="text" id="txtFrom_onw" name="txtFrom_onw" class="txtbox_crt" style="background:#FBFBFB; border:1px solid grey; width:160px;"></td>
			   
			   <td><div style="margin-top:0px;">
				  <div class="div_dropdown_crt">
			<span class="font-medium" onClick="show_block('div_loc');" style="margin-top:0px;">Select</span>			
			<span id="down_arrow_ret" class="span_drpImg_crt"  style="display:block; margin-top:0px;">
			<span onClick="show_block('div_return'); show_block('up_arrow_ret'); hide_block('down_arrow_ret');">
			<img src="Images/dropdown_arrow_icon3.png" width="30px" height="20px"/></span></span>
			<span id="up_arrow_ret" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_return'); hide_block('up_arrow_ret'); show_block('down_arrow_ret');">
			<img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px" /></span></span>
			</div>	
			
			     <div id="div_return" class="div_drpListItems_crt" style="margin-top:25px;">			 
			      <div id="div_ret"></div>
			   <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_return'); hide_block('up_arrow_loc'); show_block('down_arrow_loc');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span></span>
			</div> 
			
			</div></td>
			  <td>
			   <select id="drpMode_ret_onwd" name="drpMode_ret_onwd" class="font-medium" style="width:100px; height:30px;" >
			   <option value="">Select</option>
				  <option value="Road">Road</option>
				   <option value="Train">Train</option>
				   <option value="Flight">Flight</option>
				   <option value="Sea">Sea</option>
				 </select>
			</td>
			   </tr>
			   </table>
			   
			   <div id="div_trans_chk_on" style="width:100%; float:left;">
			<span class="font-medium" style="float:left;"><input id="chkTransfer_on" type="checkbox" onClick="show_block('div_trf_mode_on');">Transfer Included</span>
			<div id="div_trf_mode_on" style="width:100%; float:left; display:none;">
		   <span style="float:left; margin-left:10px;">
			     <select id="drp_trf_means_onwd" name="drp_trf_means_onwd" class="txtbox_crt" style="width:90px;">
				  <option value="">Means</option>
				 <option value="Car">Car</option>
				   <option value="Mini-bus">Mini-bus</option>
				   <option value="Taxi">Taxi</option>				   
				   <option value="Bus">Bus</option>
				   <option value="Metro">Metro</option>
				   <option value="Train">Train</option>
				 </select>
			   </span>
			   <span style="float:left; margin-left:5px;"><input type="text" id="txttrfMode_on" name="txttrfMode_on" class="txtbox_crt" style="width:150px; color:#999999;" value="Others? Specify" onClick="errase('txttrfMode_on');"/></span>
			</div>
			</div>
	  </div>	
	  
	          <div id="div_returnJour" style="float:left; width:100%; margin-top:10px; display:none;">
			<div style="float:left; width:100%; margin-top:10px;"><span class="font-medium">Return</span></div>
			<table style="width:90%;">
			 <tr>
			    <td><span class="font-medium">From</span> </td>
				 <td><span class="font-medium">To</span></td>
				  <td><span class="font-medium">Mode</span></td>
			   </tr>
			   <tr>
			   <td>
			     <div style="margin-top:0px;">
				  <div class="div_dropdown_crt">
			<span class="font-medium" onClick="show_block('div_loc');" style="margin-top:0px;">Select</span>			
			<span id="down_arrow_arri" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block('div_arrival'); show_block('up_arrow_arri'); hide_block('down_arrow_arri');">
			<img src="Images/dropdown_arrow_icon3.png" width="30px" height="20px"/></span></span>
			<span id="up_arrow_arri" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block('div_arrival'); hide_block('up_arrow_arri'); show_block('down_arrow_arri');">
			<img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px" /></span></span>
			</div>
							
			     <div id="div_arrival" class="div_drpListItems_crt" style="margin-left:4px; margin-top:30px;">
		          <div id="div_arrv"></div>
			     <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block('div_arrival'); hide_block('up_arrow_loc'); show_block('down_arrow_loc');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span></span>
			</div>

			</div>
			   </td>			  
			   <td><span class="font-medium" style="float:left;">
			   <input type="text" id="txtTo_onwd" name="txtTo_onwd" class="txtbox_crt" style="background:#FBFBFB; border:1px solid grey; width:160px;" ></span></td>
			   <td>
			     <select id="drpMode_onwd_arri" name="drpMode_onwd_arri" class="font-medium" style="width:100px; height:30px;">
				 <option value="">select</option>
				   <option value="Road">Road</option>
				   <option value="Train">Train</option>
				   <option value="Flight">Flight</option>
				   <option value="Sea">Sea</option>
				 </select>
			   </td>
			 </tr>			
			</table>
			<div id="div_trans_chk_ret" style="width:100%; float:left;">
			<span class="font-medium" style="float:left;"><input id="chkTransfer_ret" name="chkTransfer_ret" type="checkbox" onClick="show_block('div_trf_mode_ret');">Transfer Included</span>
			<div id="div_trf_mode_ret" style="width:100%; float:left; display:none;">
		   <span style="float:left; margin-left:10px;">
			     <select id="drp_trf_means_ret" name="drp_trf_means_ret" class="txtbox_crt" style="width:90px;">
				  <option value="">Means</option>
				 <option value="Car">Car</option>
				   <option value="Mini-bus">Mini-bus</option>
				   <option value="Taxi">Taxi</option>				   
				   <option value="Bus">Bus</option>
				   <option value="Metro">Metro</option>
				   <option value="Train">Train</option>
				 </select>
			   </span>
			   <span style="float:left; margin-left:5px;"><input type="text" id="txttrfMode_ret" name="txttrfMode_ret" class="txtbox_crt" style="width:150px; color:#999999;" value="Others? Specify" onClick="errase('txttrfMode_ret');"/></span>
			</div>
			</div>
			
			</div>			  
			 </div>
		 </div>
		 <div id="nxtBtnsInterCity" style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_transfers'); show_block('within_city_div'); hide_block('inter_city_div'); hide_block('nxtBtnsInterCity'); hide_block('div_IC'); btn_color('btn_trp_c2c','btn_ptp_trans'); show_tr('ld_transfers'); show_tr('ld_ptp'); show_intercity(); ">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick="show_Ways(); hide_block('div_IC'); ">Next ></div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span><div class="smallbtn" style="width:60px; font-weight:bold; color:#999999; background:#EEEEEE;"> < Back</div></span></span>
			   </div>			 
			
		  <div id="within_city_div" style="display:none; width:100%; float:left; margin-top:20px;">
			 <div class="headerTitle">
			  <span>Enter the details of the transport facilities provided for the locations covered in the package</span>
			 </div>
			 <div style="height:320px; overflow-y:scroll; overflow-x:hidden; width:100%;">
			     <table id="tab_transport" class="font-medium" style="width:100%; text-align:left;">
				 <tr>
				   <th>Origin</th> 
				   <th>Destination</th>
				   <th>Mode</th>
				   <th>Means</th>
			   	 </tr>
			 </table>
			 </div>
			 <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_lcl_trp'); show_block('lcl_trp'); hide_block('div_transfers'); hide_block('within_city_div'); btn_color('btn_trp_lcl','btn_trp_c2c'); show_tr('ld_intracity'); mode_preview();">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick="hide_block('div_transfers'); hide_block('within_city_div');">Next ></div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('inter_city_div'); hide_block('within_city_div'); show_block('nxtBtnsInterCity'); hide_block('div_transfers'); show_block('div_IC'); ">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick="hide_block('div_transfers');  btn_color('btn_ptp_trans','btn_trp_c2c');"> < Back</div></span></span>
			   </div>
			 </div>	 
					  
		  <div id="lcl_trp" style="float:left; width:100%; display:none; margin-top:20px;">
				 <div class="headerTitle">
			  <span>Enter local travel arrangements</span>
			 </div>
	      <div style="float:left; width:100%; overflow-y:scroll; overflow-x:hidden;">
			 <table id="tabLocal_trp" class="font-medium" style="width:100%; text-align:left;">
			    <tr>
				  <td>Locations</td>
				  <td>Mode</td>
				  <td>Means</td>
				</tr>			  
			 </table>
		 </div>
			  	 <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="chng_hdr_clr('btn_Cost');  Lmode_preview();">
				 <div class="smallbtn" style="width:60px; font-weight:bold; background:#FF0000; color:#FFF;" onClick="  show_section('Package_Cost','Package_Section','Accomodation_Section','Transport_Section','Cancel_Section');">Submit</div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('within_city_div'); hide_block('lcl_trp'); show_block('div_transfers'); hide_block('div_lcl_trp')  btn_color('btn_trp_c2c','btn_trp_lcl');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			   </div>
			 </div>
			
			  </div>
			  
            <div id="Package_Cost" style="display:none;">
          
		  <div id="pack_detls" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%;">
			 
			   <span onClick="disp_block('div_cost','div_offers');">
			   <span style="float:left;"><div id="btn_pck_cost" class="btn_semi_trapez_onFocus">Package Cost</div></span></span>
			   
			   <span onClick="disp_block('div_offers','div_cost');">
			   <span style="float:left;">
			   <div id="btn_pck_offers" class="btn_semi_trapez" style="width:auto; padding-left:3px">Discounts & Offers</div></span></span>
			 		   
			</div>
		    	
			<div id="div_cost" style="display:block;">
			   <div class="headerTitle">
			     <span>Pricing of the package is "based on Per"</span>
			   </div>
			     <div style="margin-top:5px; width:100%; float:left;">
				 
				  <span class="font-medium" style="float:left; margin-left:5px;">
				  <input type="radio" id="rdPerPerson" name="rdcost" onClick="hide_block('div_others');hide_block('div_others');hide_block('div_grp_opt'); show_basis();" checked="checked" value="Person"/>Person</span>
				 
				   <span class="font-medium" style="float:left; margin-left:5px;">
				  <input type="radio" id="rdCouple" name="rdcost" onClick="hide_block('div_others');hide_block('div_others');hide_block('div_grp_opt'); show_basis();" value="Couple"/>Couple</span>
				  
				   <span class="font-medium" style="float:left; margin-left:5px;">
				   <input type="radio" id="rdGrp" name="rdcost" onClick="hide_block('div_others'); show_block('div_grp_opt');show_basis();" value="Group"/>Group</span>
				   
				   <span style="float:left;" class="font-medium">
					 <input type="radio" id="rdOther" name="rdcost" onClick="show_block('div_others'); hide_block('div_grp_opt'); show_basis();">Others</span>
					 
				   <div id="div_grp_opt" style="float:left; width:100%; margin-top:5px; display:none;">
				  <span class="font-medium" style="float:left;">
				  <input type="text" id="drpPerAdult" name="drpPerAdult" class="txtbox_Tab" placeholder="# of Adults" style="width:90px; height:30px;" onChange="show_basis();" />
			    </span>
				  <span style="float:left; margin-left:10px;">
			<input type="text" id="drpKidBel12" name="drpKidBel12" class="txtbox_Tab" placeholder="# of Kids<12Yrs" style="width:70px; height:30px;" onChange="show_basis();" />
				  </span>
				   <span style="float:left; margin-left:10px;">
			<input type="text" id="drpKidAbv12" name="drpKidAbv12" class="txtbox_Tab" placeholder="# of Kids>12Yrs" style="width:80px; height:30px;" onChange="show_basis();" />
				   </span>
				   </div>
				   
				   <div style="width:100%; float:left;">				   
				   
					 <span id="div_others" style="float:left; display:none;">
					 <input id="txtOther" name="txtOther" type="text" class="txtbox_crt" placeholder="Specify others "></span>
				  </div>
				   
				   <table style="width:100%;">
				   <tr>
				    <td colspan="2"><div style="height :2px; border-top:3px solid #222222; width:70%; margin-top:10px; margin-left:110px; float:left;"></div></td>
				   </tr>
				     <tr>
					   <td><span class="font-medium">Package Cost</span></td>
					   <td><input type="text" id="txt_packCost" name="txt_packCost" class="txtbox_crt" style="width:100px;" value="0" onKeyPress="calc_tax();" onMouseOut="calc_tax();" onChange="calc_tax();"/></td>
					 </tr>
					 <tr>
					  <td><span class="font-medium" style="float:left;">Service Tax / GST Rate</span></td>
					  <td><select id="drptaxRate" name="drptaxRate" class="txtbox_crt" style="width:100px; height:30px;" onChange="calc_tax();">
					 <option>0%</option>
					 <option>10.36%</option>
					 </select></td>
					 </tr>
					 <tr>
					    <td><span class="font-medium" style="float:left;">Service Tax  Amount</span></td>
						<td><input type="text" id="txtTax" class="txtbox_crt" style="width:130px;" onKeyPress="calc_tax();"></td>
					 </tr>
					 <tr>
					   <td><span class="font-medium" style="float:left;">Education Cess</span></td>
					   <td><input type="text"  id="txtCess" name="txtCess" class="txtbox_crt" style="width:130px;" value="0" onKeyPress="calc_tax();"></td>
					 </tr>
					 <tr>
					   <td colspan="2"><div style="height :2px; border-top:3px solid #222222; width:70%; margin-top:10px; margin-left:110px; float:left;"></div></td>
					 </tr>
					 <tr>
					   <td><span class="font-medium" style="float:left;">Total Cost &nbsp;</span><span id="sp_basis" class="font-medium"> (Per Person)</span></td>
					   <td><span style="float:left;"><input type="text" id="txttotalPrice" name="txttotalPrice" class="txtbox_crt" style="width:130px;"/></span>
					   <span class="font-medium">(in INR)</span></td>
					 </tr>
				   </table> 
				   
				  <div>
				 </div>
	
			 </div>
			 
			 <div id="div_status">
			 
			  <div>
			  
			  <div class="headerTitle" style="margin-top:10px; float:left; width:100%;">
			     <span style="float:left;">Please specify the number of packages to be sold</span><br/>
				 <span style="float:left; margin-left:5px;">
				 <input type="text" id="txtNumPack" name="txtNumPack" class="txtbox_crt" style="width:100px;" placeholder="# of packages" onChange="show_preview();" /></span>
				 </div>
				 
				  <div style="float:left; width:100%; margin-top:15px;">
			      <span class="headerTitle">Scheduled trip departure dates</span>
			   </div>
			   
				 <div id="div_dep_dt" style="float:left; width:100%;">
			      <span style="float:left;"><input type="text" id="txtdepDt_1" name="txtdepDt_1" class="txtbox_Tab" style="width:80px;" onClick="oDP.show(event,this.id,2); show_block('datepick');" /></span>
				 <span style="float:left;"><input type="button" value="Add" id="btnAddDt" name="btnAddDt" class="smallbtn" style="width:40px;" onClick="add_dep_date();" /></span>
			   </div>
			   
		     <input type="text" id="sp_dt_count" name="sp_dt_count" style="visibility:hidden; height:15px;" />  
		  
			    <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_offers'); hide_block('div_cost');  btn_color('btn_pck_offers','btn_pck_cost');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;">Next ></div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span>
				 <div class="smallbtn" style="width:60px; font-weight:bold; background:#ddd; color:#999;"> < Back</div></span></span>
			   </div>		  
		     	   
				   </div> 
			   </div>			 
		</div>
		
		  <div id="div_offers" style="margin-top:5px; width:100%; float:left; display:none;">
		
		  <table id="tab_discounts" class="font-medium" style="width:100%; text-align:left" cellpadding="0" cellspacing="0">
		   <tr>
		    <th>Bank Name</th>
			<th>Payment Mode</th>
			<th>Card Type</th>
			<th>Card Name</th>
			<th>Offer type</th>
			<th>Offer Description</th>
			<th colspan="2">Offer validity<br/> From &nbsp; Till</th>
			<th>Add Row</th>
			<th>Del Row</th>
		   </tr>
		   <tr>
		     <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_bank_name_1" name="txt_bank_name_1" placeholder="Axis Bank" /></td>
			 <td>
			 <select id="txt_pay_mode_1" name="txt_pay_mode_1" style="width:80px; font-size:12px;">
			   <option value="Credit Card">Credit Card</option>
			   <option value="Debit Card">Debit Card</option>
			   <option value="Netbanking">Netbanking</option>
			   <option value="Pay at the site">Pay at the site</option>			  
			 </select>
			 <td>
			  <select id="txt_card_type_1" name="txt_card_type_1" style="width:60px; font-size:12px;">
			   <option value="Visa">Visa </option>
			   <option value="MasterCard">MasterCard</option>
     		 </select>
		     </td>
			 <td>
			 <select id="txt_card_name_1" name="txt_card_name_1" onChange="if(this.value=='Other')show_block('txt_card_name_oth_1');" style="width:60px; font-size:12px;">
			  <option value="Platinum">Platinum</option>
			  <option value="Titanium">Titanium</option>
			  <option value="Other">Other</option>
			 </select>
			 <input type="text" id="txt_card_name_oth_1" name="txt_card_name_oth_1" class="txtbox_Tab" style="width:60px; display:none; font-size:12px;" placeholder="specify others" />
			</td>	
			 <td>
			 <select id="txt_offer_type_1" name="txt_offer_type_1" style="width:60px; font-size:12px;">
			   <option value="Cashback">Cashback</option>
			   <option value="EMI">EMI</option>
			   <option value="Bonus Points">Bonus Points</option>
			 </select>
			</td>	
			 <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_offer_desc_1" name="txt_offer_desc_1" placeholder="3% cashback over Rs.3000" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_from_1" name="txt_valid_from_1" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block('TripDates');" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_till_1" name="txt_valid_till_1" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block('TripDates');" /></td>		 
		    <td align="center"><input type="button" class="smallbtn" style="width:40px; float:none; font-size:12px;" id="btn_disc_add_1" name="btn_disc_add_1" value="Add" onClick="add_discounts();" /></td>
	<td align="center"><img src="Images/cancelbtn.png" style="width:13px; height:13px;" id="btn_disc_del_1" name="btn_disc_del_1"  /></td>
	  </tr>
		   </table>  
			   
		  <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_section('Cancel_Section','Package_Section','Accomodation_Section','Transport_Section','Package_Cost'); ">
				 <div class="smallbtn" style="width:60px; font-weight:bold; background:#ff0000;" onClick="chng_hdr_clr('btn_Cancel');">Submit</div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span>
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick="show_block('div_cost'); hide_block('div_offers');"> < Back</div></span></span>
			   </div>
					
		</div>
		
		</div>			   	
		
	    	<div id="Cancel_Section" style="display:none;">
           <div style="float:left; width:100%; background:#FFF;">		   
		   <span onClick="btn_color('btn_terms','btn_deduct');">
			 <span style="float:left;">
<div id="btn_terms" class="btn_semi_trapez_onFocus" style="width:150px;" onClick="show_block('div_cncl_terms'); hide_block('div_cncl_deduct');">Terms & Conditions</div></span></span>
		   <span onClick="btn_color('btn_deduct','btn_terms')">
			<span style="float:left;">
			<div id="btn_deduct" class="btn_semi_trapez" style="width:120px;" onClick="show_block('div_cncl_deduct'); hide_block('div_cncl_terms');">Deductions</div></span></span>
		     
		   </div>	   			 
		  
		   <div id="div_cncl_terms" style="display:block;">
		       <div style="width:100%; float:left; margin-top:10px;">
			   <div style="float:left; width:100%;">
			       <span class="font-medium" style="float:left; margin-left:5px;">Terms & Conditions</span>
				   <span style="float:left; margin-left:10px;">
				    <textarea id="txtATerms" name="txtATerms"  style="width:400px; height:300px; box-shadow:2px;"></textarea>
				   </span>			   
			   </div>
			   <div style="float:left; width:100%; margin-top:10px;">
			    <span class="font-medium">Upload File</span>
				<span style="float:left; margin-left:10px;">
		 <input type="text" id="docSrcFile" style="position:absolute; width:230px;" class="txtbox_Tab" placeholder="Select a file" accept="application/pdf, application/docx, application/doc" />
<input type="file" id="docfile" name="docfile" style="opacity:0; z-index:1;" onChange="document.getElementById('docSrcFile').value = this.value;"  accept="application/pdf, application/docx, application/doc" /></span>
		
		 		   </div>		    
			   <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="show_block('div_cncl_deduct'); hide_block('div_cncl_terms');  btn_color('btn_deduct','btn_terms');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;" onClick="cnt_dedt_rows();"> Next ></div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span>
				 <div class="smallbtn" style="width:60px; font-weight:bold; color:#999999; background:#EEEEEE;"> < Back</div></span></span>
			   </div>
		  </div>
		        
			 </div>
			 
		   <div id="div_cncl_deduct" style="display:none;">
		   
		   <div style="float:left; width:100%; margin-top:5px;">
		    <span class="font-medium">Is the amount refundable? &nbsp; <input type="radio" name="rdRef" id="rdRefYes" value="Yes" onClick="if(this.checked == true)show_block('refund');" />Yes &nbsp; &nbsp; <input type="radio" name="rdRef" id="rdRefNo" value="No" onClick="if(this.checked == true)hide_block('refund');"/>No</span>
		   </div>
		   
		   <div id="refund" style="float:left; width:100%; display:none;">
		   
		     <div style="width:100%; float:left; margin-top:10px;">
			  <table id="tab_cncl_terms" style="width:100%; text-align:left;" cellpadding="1" cellspacing="0">
			   <tr  style="background:#999; color:#fff; font-size:15px;">
			    <th align="left">Cancellation <br/>requested on</th>
				<th align="left">Cancellation<br/>Charges</th>
				<th align="center">Add row</th>
				<th align="center">Delete Row</th>
			   </tr>
			   <tr id="btn_cncl_del_1">
			     <td align="left">
				  <select style="width:150px;" id="txt_cncl_day_1" name="txt_cncl_day_1">
				   <option value="Before 30 Days">Before 30 Days</option>
				   <option value="Before 20 Days">Before 20 Days</option>
				    <option value="Before 15 Days">Before 15 Days</option>
					<option value="Before 10 Days">Before 10 Days</option>
					<option value="Before 5 Days">Before 5 Days</option>
					<option value="Before 3 Days">Before 3 Days</option>
					<option value="Before 2 Days">Before 2 Days</option>
					<option value="Before 1 Days">Before 1 Days</option>
					<option value="Before 0 Days">Before 0 Days</option>
					<option value="After 1 Days">After 1 Days</option>
					<option value="After 2 Days">After 2 Days</option>
					<option value="After 3 Days">After 3 Days</option>					 
				  </select>
				 </td>
				 <td align="left"><input type="text" class="txtbox_Tab" style="width:70px;" id="txt_cncl_rate_1" name="txt_cncl_rate_1" placeholder="10%" /></td>
				 <td align="center"><input type="button" class="smallbtn" style="width:40px; float:none;" id="btn_cncl_add_1" name="btn_cncl_add_1" value="Add" onClick="add_terms();" /></td>
				 <td align="center"><img src="Images/cancelbtn.png" style="width:25px; height:25px;" id="btn_cncl_del_1" name="btn_cncl_del_1"  /></td>
			   </tr>
			 </table>
			 </div>
			 
			 <div style="width:100%; float:left; margin-top:50px;">
			   <table id="tab_refund" style="width:100%; text-align:left;" cellpadding="3" cellspacing="0">
			     <tr style="background:#999; color:#fff; font-size:15px;"> 
				   <th width="100px">Refund Amount</th>
				   <th width="120px">Mode of Refund</th>
				   <th width="80px"># days for processing</th>
				   <th width="50px">Add Row</th>
				   <th width="50px">Delete Row</th>
				 </tr>
				 <tr>
				   <td width="100px"><input type="text" class="txtbox_Tab" style="width:100px;" id="txt_ref_amt_1" name="txt_ref_amt_1" placeholder="50%" /></td>
				   <td width="120px">
				   <input type="text" id="txt_ref_type_1" name="txt_ref_type_1" class="txtbox_Tab" style="width:150px;" />
				   <select id="drpRefType_1" name="drpRefType_1"  style="width:100px; font-size:14px;" onChange="document.getElementById('txt_ref_type_1').value=this.value;">
				    <option value="Direct credit to bank account via NEFT, RGT or IMPS">Direct credit to bank account via NEFT, RGT or IMPS</option>
					<option value="By Credit card reversal">By Credit card reversal</option>
					<option value="By Check">By Check</option>
				   </select>
				   </td>
				   <td width="80px"><input type="text" class="txtbox_Tab" style="width:50px;" id="txt_ref_days_1" name="txt_ref_days_1" placeholder="3" /></td>
				   <td width="50px"><input type="button" class="smallbtn" style="width:40px;" id="btn_ref_add_1" name="txt_ref_add_1" value="Add" onClick="add_ref_rows();" /></td>
				   <td width="50px"><img src="Images/cancelbtn.png" width="20px" height="20px" id="btn_ref_del_1" name="btn_ref_del_1" /></td>
				 </tr>
			   </table>
			 </div>
			 
			 </div>
			 
			 <input type="text" id="txtcncl_disc" name="txtcncl_disc" style="visibility:hidden;" />
			 <input type="text" name="txtcncl_deduct" id="txtcncl_deduct" style="visibility:hidden;" />
			 <input type="text" name="txtcncl_refund" id="txtcncl_refund" style="visibility:hidden;" />   
			 
			 <div style="margin-top:20px; width:100%; float:left;">			   
			     <span style="float:right; margin-right:50px;">
				 <span onClick="chng_hdr_clr('btn_Publish'); show_inv(); Lmode_preview();">
				 <div class="smallbtn" style="width:60px; font-weight:bold; background:#FF0000; color:#FFF;" onClick="  show_section('Publish_Section','Package_Cost','Package_Section','Accomodation_Section','Transport_Section','Cancel_Section');">Submit</div></span></span>				 
				 <span style="float:right; margin-right:5px;">
				 <span onClick="show_block('div_transfers'); hide_block('div_lcl_trp');  btn_color('btn_trp_c2c','btn_trp_lcl');">
				 <div class="smallbtn" style="width:60px; font-weight:bold;"> < Back</div></span></span>
			   </div>
			 
			 </div>		 
		 </div>
		 
		   <div id="Publish_Section" style="float:left; width:100%; display:none;">
		    
			  <div style="float:left; width:100%;">
			   
			   <div class="headerTitle" style="margin-top:10px; float:left; width:100%;">
			     <span style="float:left;">The number of packages to be sold</span>
				 <span style="float:left; margin-left:10px; color:#ff0000" id="spInven"></span>
				 </div>
				 
				 <div style="float:left; width:100%; margin-top:15px;">
			      <span class="headerTitle">Scheduled trip departure dates</span>
				   <span id="spTrpDts" style="float:left; margin-left:10px; color:#ff0000;"></span>
			   </div>
	   
			   <div style="float:left; width:100%;">
			     <span class="headerTitle">Display date range between which this package to be posted</span>
				 <span style="float:left; margin-left:5px;"><input type="text" id="pckPostDtFrm" name="pckPostDtFrm" class="txtbox_Tab" style="width:80px;" placeholder="From Date" onClick="oDP.show(event,this.id,2); show_block('datepick');" /></span>
				 <span style="float:left; margin-left:20px;"><input type="text" id="pckPostDtTo" name="pckPostDtTo" class="txtbox_Tab" style="width:80px;" placeholder="To Date" onClick="oDP.show(event,this.id,2); show_block('datepick');" /></span>
				 <span style="float:left; margin-left:5px;">OR</span>
				 <span class="headerTitle" style="float:left; margin-left:5px;"><input type="checkbox" id="chkInv" checked="checked" />Inventory</span>
			   </div>
						   
			   <div style="float:left; width:100%; margin-top:15px;">
			      <span class="headerTitle">Please post the date during which the package is available for sale / purchase.</span>
			       <span style="float:left" class="font-medium">From</span><span style="float:left;">
				  <input type="text" id="txtvalidfrmDt" name="txtvalidfrmDt" class="txtbox_crt" style="width:120px;" onClick="oDP.show(event,'txtvalidfrmDt',2); ShowContent('datepick');"></span>
				    <span style="float:left; margin-left:5px;" class="font-medium">To</span><span style="float:left;">
					<input type="text" id="txtvalidtoDt" name="txtvalidtoDt" class="txtbox_crt" style="width:120px;" onClick="oDP.show(event,'txtvalidtoDt',2); ShowContent('datepick');"></span>
			  </div>	     
				 
				 <div style="width:100%; float:left; margin-top:15px;" onMouseOver="ShowContent('div_pck_post_cost');" onMouseOut="HideContent('div_pck_post_cost');">
				    <span class="headerTitle" style="float:left;">Package to be posted as &nbsp; &nbsp; </span><br/>
		<span class="font-medium"  style="float:left;"><input type="radio" name="pckPostStyle" id="pckPostNormal" value="Normal" style="float:left; width:auto;" />Normal</span>
		<span class="font-medium"  style="float:left; margin-left:10px;"><input type="radio" name="pckPostStyle" id="pckPostHighlight" value="Highlighted" style="float:left; width:auto;" />Highlighted</span>
		<span class="font-medium" style="float:left; margin-left:10px;"><input type="radio" name="pckPostStyle" id="pckPostTop7" value="Top-7" style="float:left; width:auto;" />Top-7</span>
				 </div>
				 
				 <div style="float:left; width:100%; margin-top:20px;">
				     <div style="float:left; width:100%; margin-top:5px;">
			     <select style="float:left;">
				  <option>---Select Sub-User---</option>
				  <?php
				  $q_subU_cmp = "select email_id_prof from b2b_profile where company_name='".$_SESSION["CompName"]."' and reg_by='".$_SESSION["clientID"]."'";
				  $res_subU_cmp = mysqli_query($conn,$q_subU_cmp);
				  
				  if($res_subU_cmp)
				  {
				   while($r = mysqli_fetch_array($res_subU_cmp))
				   {
				      echo '<option value="'.$row["email_id_prof"].'">'.$row["email_id_prof"].'</option>';
				   }
				 }
				  ?>
				 </select>	 
				</div>
				   
				     <span style="float:right; margin-right:50px;">
			  <input type="submit" id="btnSub_pck" name="btnSub_pck" class="smallbtn" style="width:auto; padding:2px; height:25px; font-size:18px; font-weight:bold; background:#FF0000; color:#FFFFFF;" onMouseOver="cnt_offer_rows();" value="Submit to Publish"  /></span>
		
	                 <span><input type="button" id="btnSub_pck" name="btnSub_pck" class="smallbtn" style="width:auto; padding:2px; height:25px; font-size:18px; font-weight:bold; background:#FF0000; color:#FFFFFF;" onMouseOver="cnt_offer_rows();" value="Forward to Review/Approval"  /></span>
				 </div>
				 
				 
			   
			   <div style="visibility:visible; position:absolute; display:none; z-index:10000;" id="datepick"></div>			
<script type="text/javascript">
  	var oDP = new datePicker("datepick");
</script>
		   </div>
	     
		 </div>
	  
		</div>
		</span>
		
        <span id="prev_div" style="width:30%; float:left; display:none;">
	  
	      <div style="background:#FFFFDF; height:500px; width:100%; float:left; overflow-y:scroll;">
		  
		   	  <div style="float:right;">
		   <div style="width:100%; float:left; margin:1px 0px 0px 0px;">
		   <span onClick="show_block('div_summ');">
		    <div class="smallbtn" style="width:250px;"><span style="text-align:center;">Summary</span></div></span>
		  </div>
		   <div id="div_summ" style="width:100%; position:relative; margin:1px 0px 0px 0px; display:none;">			
			<span style="float:right;"><span onClick="show_section('Accomodation_Preview','Package_Preview','Attraction_Preview'); change_acc();">
			<div id="btn_acc_trp" class="smallbtn" style="width:120px;">Acco + Transport</div></span></span>
			<span style="float:right;"><span onClick="show_section('Package_Preview','Accomodation_Preview','Attraction_Preview'); change_pack();">
			<div id="btn_pack" class="smallbtn" style="width:100px;">Package</div></span></span>
		  </div>		 
		  </div>
		  		  
		      <div id="Package_Preview" style="display:none; margin:15px 5px 0px 5px; position:relative">
	
		     <table class="blocks" style="float:left; width:100%; display:block; table-layout:fixed; color:#0066ff;">
			 <tr>
			   <td colspan="2" align="center" style="font-weight:bold;">Package Details</td>
			 </tr>
		    <tr >
			  <td width="10%">Title</td>
			  <td id="sp_title" class="tdAlign"></td>
			  <td></td>
			  <td></td>
			  </tr>
			  <tr class="blocks">
			  <td colspan="2" align="right"><img id="img_title1" alt="pic1" width="90px" height="80px" style="border:1px solid #222;" /></td>
			  <td colspan="2" align="right">
			<span id="sp_img_title2" style="float:right; display:none;"><img id="img_title2" alt="pic2" width="90px" height="80px" style="border:1px solid #222;" /></span></td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks">
			  <td>Trip Theme</td>
			  <td class="tdAlign" colspan="3"></td>
			  </tr>
		<tr class="blocks">
			 <td>Trip Agenda</td>
			 <td colspan="3"><textarea id="trp_agenda" name="trp_agenda" readonly="readonly"  style="width:300px; border:0px; background:transparent; height:60px; overflow:hidden; font-size:12px; color:#0066ff; font-family:Calibri;"></textarea></td>
			 </tr>
			 <tr class="blocks">
			 <td>Trip Intensity</td>
			 <td id="trp_inten"></td>
			</tr>
			<tr>
			<td colspan="4"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks" >
			  <td>Validity</td>
			  <td id="sp_valid" class="tdAlign"></td>
			  <td>Trip Date/Dates</td>
			  <td id="sp_trpDt" class="tdAlign"></td>
			</tr>
			<tr>
			<td colspan="4"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
		<tr class="blocks" >
			  <td width="80px">Locations Covered</td>
			  <td class="tdAlign" colspan="3">			  
			  <textarea name="sp_loc" id="sp_loc" readonly="readonly"  style="width:250px; height:80px; border:0px; background:transparent;font-size:12px; color:#0066ff; font-family:Calibri; overflow:scroll;"></textarea>
			</td>
			</tr>
			<tr>
			<td colspan="4"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks">
			  <td>Duration</td>
			  <td id="sp_dur" class="tdAlign"></td>
			  <td>Target Audience</td>
			  <td id="sp_trv" class="tdAlign"></td>
			</tr>	
			<tr>
			<td colspan="4"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>		
			<tr>
			<td colspan="4"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
		<tr class="blocks">
			  <td>Inclusions</td>
			  <td class="tdAlign" colspan="3"><textarea  id="sp_incl" name="sp_incl" readonly="readonly" class="txtAPrev"></textarea> </td>
			</tr>
			<tr class="blocks">
			  <td>Exclusions</td>
			  <td class="tdAlign" colspan="3"><textarea  id="sp_excl" name="sp_excl" readonly="readonly"  class="txtAPrev"></textarea> </td>
			</tr>
		<tr class="blocks">
		     	<td colspan="4"><div style="border-top:2px solid #333333; width:300px;"></div></td>
			</tr>
			<tr class="blocks">
			  <td>Package Price</td>
			  <td id="sp_packPrice" class="tdAlign"></td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
				<tr class="blocks">
			  <td>Service tax</td>
			  <td id="sp_tax" class="tdAlign"></td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks">
			  <td>Other Cess</td>
			  <td id="sp_cess" class="tdAlign"></td>
			</tr>
						
			 <tr class="blocks">
		     	<td colspan="2"><div style="border-top:2px solid #333333; width:300px;"></div></td>
			</tr>
			
			<tr class="blocks">
			  <td>Total Price</td>
			  <td id="sp_price" class="tdAlign"></td>
			</tr>	
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>		
			
			<tr class="blocks">
			 <td>Inventory</td>
			 <td id="sp_pckNum" class="tdAlign"></td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
		  </table>
		  
		   </div>
		   
		      <div id="Accomodation_Preview" style="display:none;">		  
		    
			 <table class="blocks" style="float:left; width:100%; display:block; table-layout:fixed; color:#0066ff;">
		    <tr id="ld_htl_detl" >
			  <td colspan="2" align="center" style="font-weight:bold;">Accomodation Details</td>
			  </tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			  <tr> 
			  <td colspan="2">
			   <table id="tab_htl_prev" class="smallTabFont" style="display:block; width:100%; color:#0066ff;">
			    <tr>
				 <th>Location</th>
				 <th>Rating</th>
				 <th>Duration</th>
				 <th>Hotel Name</th>
				 <th>Rooms</th>
				 <th>Occupation</th>
				</tr>
			   </table>
			  </td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks" style="display:block;">
			  <td colspan="2">Inclusion</td>
			  </tr>
			  <tr id="ld_htl_incl" class="blocks">
			  <td colspan="2" id="sp_htl_incls" class="tdAlign">
			  	  <table id="tab_HtlIncl_prev" class="font-small" height="150px" style="width:100%; font-size:11px;" cellpadding="0" cellspacing="0" border="1px">
			      <tr>
			  	 <th>Locations</th>
				 <th>Hotel</th>
				 <th>Inclusions</th>
				</tr>
			  </table>
			  </td>
			</tr>
			<tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			<tr class="blocks" style="display:block;">
			  <td colspan="2">Exclusion</td></tr>
			  <tr id="ld_htl_excl" class="blocks">
			  <td colspan="2" id="sp_htl_excl" class="tdAlign">
			  <table id="tab_Htlexcl_prev" class="font-small" height="150px" style="width:100%;font-size:11px;" cellpadding="0" cellspacing="0" border="1px">
			      <tr>
			  	 <th>Locations</th>
				 <th>Hotel</th>
				 <th>Exclusions</th>
				</tr>
			  </table>
			  </td>
			</tr>
			</table>
				   
		   </div>	
		     
			  <div id="Transport_Preview" style="display:none; margin-top:20px;">
	
			 <table class="blocks" style="float:left; width:100%; display:block; table-layout:fixed; color:#0066ff;">
			  <tr>
			  <td colspan="2" align="center" style="font-weight:bold;">Transportation Details</td>
			  </tr>
		    <tr id="ld_intercity" >
			  <td>Inter-city facility</td>
			  <td id="sp_intercity" class="tdAlign"></td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			
			<tr id="ld_dest" class="blocks">
			  <td>On-ward Pickup</td>
			  <td id="sp_dest" class="tdAlign"></td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			
				<tr id="ld_drop" class="blocks">
			  <td>Onward Drop Location</td>
			  <td class="tdAlign"><textarea id="sp_drop" name="sp_drop" readonly="readonly"  class="txtAPrev"></textarea></td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			
		   <tr id="ld_pickup" class="blocks">
			  <td><span>Return Pick-up Locations</span></td>
			  <td class="tdAlign"><textarea id="sp_pickup" name="sp_pickup" readonly="readonly"  class="txtAPrev"></textarea></td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>		
				
			
		   <tr id="ld_dest2" class="blocks">
			  <td>Return back to</td>
			  <td id="sp_dest2" class="tdAlign"></td>
			</tr>
			
			<tr id="ld_transfers" class="blocks">
			  <td>Transfer Included</td>
			  <td id="sp_transfer" class="tdAlign">No</td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			
			<tr id="ld_ptp" class="blocks">
			  <td colspan="2">
			    <table id="tab_trans_prev" class="smallTabFont" style="width:100%; display:block;">
				<tr>
				 <th>Origin</th>
				 <th>Destination</th>
				 <th>Mode</th>
				 <th>Means</th>
				</tr>
			    </table>
			  </td>
			  </tr>
			    <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
				
			<tr id="ld_intracity" class="blocks" >
			  <td>Within City Transfer</td>
			  </tr>
			  <tr>
			  <td id="sp_intracity" colspan="2">
			  <table id="tab_lcl_prev" class="smallTabFont" style="width:100%; display:block;">
				<tr>
				 <th>Location</th>
				 <th>Mode</th>
				 <th>Transport Type</th>
			   </tr>
			    </table>
			  </td>
			</tr>
			  <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
			</table> 
				 
			 </div>				  
			 
			  <div id="Attraction_Preview" style="display:none;">
			    
				 <table id="tab_attr_prev" class="blocks" style="float:left; width:100%; display:block; table-layout:fixed; color:#0066ff;">
				   <tr>
				     <td colspan="2" align="center" style="font-weight:bold;">Attraction Details</td>
				   </tr>
				     <tr>
			<td colspan="2"><div style="width:100%; border-top:1px solid #EEE;"></div></td>
			</tr>
				   <tr>
				     <td>
					  <table id="tab_attr_prev" class="smallTabFont" style="width:100%; display:block;">
					    <tr>
						    <th>Day</th>
						   <th>Location</th>
						   <th>Attraction</th>
						   <th>Start</th>
						   <th>Arrival</th>
						   <th>Time Allocated</th>
						</tr>
					  </table>
					 </td>
				   </tr>
				 </table>
			
			 </div>
				 
		  </div>
		  
           <div style="float:left; width:100%; position:relative; margin:10px 0px 50px 0px;">
	  <span style="float:right;">
	      <span style="float:left;"><div class="smallbtn" style="width:60px; height:33px; font-size:12px;">Save to Modify</div></span>
		  <span style="float:left;"><div class="smallbtn" style="width:70px; height:33px; font-size:12px;">Submit for Review</div></span>
		  <span style="float:left;"><div class="smallbtn" style="width:70px; height:33px; font-size:12px;">Submit for Approval</div></span>
		  <span style="float:left;"><div class="smallbtn" style="width:60px; height:33px; font-size:12px;">Submit to Publish</div></span>
	  </span>
	</div>
		  
	  </span>

		 
	</div>
	
	<!------------------------------------------------------------- Revise Package ----------------------------------------------------------------------->
	       <div id="div_revHtl"></div>
			
			<input type="text" id="txtOff_rev" name="txtOff_rev" value="2" style="visibility:hidden;" />
	    
		  <div id="revise_pack" style="float:left; width:100%;">		
			<div style="float:left; width:100%;">
			  <table class="font-medium" width="90%" cellpadding="2" cellspacing="0">
			    <tr style="background:#283C5F; color:#fff;"> 
				 <th align="left">Package ID</th>
				 <th align="left">Package Name</th>
				 <th align="left">Locations Covered</th>
				 <th align="left">Package Price</th>
				 <th align="left">Package Validity</th>
				 <th align="center">Revise</th>
				</tr>
			<?php
			$sel_client = "select client_id from b2b_profile where Company_name='".$_SESSION['CompName']."' and regional_office='".$_SESSION['Region']."'";
			$res_client= mysqli_query($conn,$sel_client);
		   if($res_client)
			{
			while($r = mysqli_fetch_array($res_client))
			{
			  $sel_pck = "select pck_id, pck_name, locations, validity, price, revised_price from b2b_pck_crt where client_id='".$r["client_id"]."' and status='Active'";
			  $res_pck = mysqli_query($conn,$sel_pck);
			  if($res_pck)
			  {
			  while($row = mysqli_fetch_array($res_pck))
			  {
			    echo '<tr>';
				echo '<td>'.$row["pck_id"].'</td>';
				echo '<td>'.$row["pck_name"].'</td>';
				echo '<td>'.$row["locations"].'</td>';
				if($row["revised_price"]=="")
				echo '<td>'.$row["price"].'</td>';
				else
				 echo '<td>'.$row["revised_price"].'</td>';
				echo '<td>'.$row["validity"].'</td>';				
				echo '<td align="center">
				<input type="button" class="smallbtn" style="width:auto; padding:3px; float:none; height:auto;" value="Revise" onclick="revisePck(\''.$row["pck_id"].'\')" /></td>';
				echo '</tr>';
			  }
			  }
			  }
			 }
			 
			?>
			  </table>
			</div>
			
			
		 </div>
	

</div>	
</div>

</div>

			
<!---------------------------------------------------------------- Lead Buttons ------------------------------------------------------------------------->	
	<div id="Lead_Form" <?php if($quote == true){ ?> style="display:block;"<?php }?> onMouseOver="headerBtn_Color('btn_Leads','btn_profile','btn_Packages','btn_Dashboard','btn_Services','btn_payment'); hide_block('pck_crt_mod');">
		
		<div id="Lead_btns" style="float:left; width:100%; background:#bbb;">
	      
		  <span  style="float:left;  margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('tab_new_lds','tab_quotes','tab_purchs');">
	    <div id="btn_lead_new" class="top_subBtn" onClick="show_btn_color('btn_lead_new','btn_lead_quote','btn_lead_purc');">New Leads</div></span></span>
	   
	     <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('tab_quotes','tab_new_lds','tab_purchs');">
	   <div id="btn_lead_quote" class="top_subBtn"  onClick="show_btn_color('btn_lead_quote','btn_lead_new','btn_lead_purc');">Quotes</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('tab_purchs','tab_new_lds','tab_quotes');">
	   <div id="btn_lead_purc" class="top_subBtn" onClick="show_btn_color('btn_lead_purc','btn_lead_new','btn_lead_quote');">Purchases</div></span></span>	   

	  </div>
	   
	     <div id="tab_new_lds" style="float:left; width:100%; height:400px; overflow-y:scroll; overflow-x:hidden; display:none;">
		   <table class="font-small" width="100%" height="auto" cellpadding="0" cellspacing="0" border="1px" bordercolor="#CCCCCC" style="color:#666; table-layout:fixed;">
		     <tr style="background:#000066; color:#fff;">
			 <th>Request ID</th>			  
			  <th>Location</th>
			  <th>Date of Request</th>
     		  <th colspan="3">Action</th>			 
			 </tr>
			
			 <?php
			 	$count_lds = 0; 
			 $q_leads = "select lead_date, loc_name, lead_id, lead_gen, wl_id from cust_trip_trvler order by lead_date desc";
			 $res_leads = mysqli_query($conn,$q_leads);
			 if($res_leads)
			 {
			 $st_rej = false;
			 $st_view = false;
			 $st_acpt = false;
			 
			   while($row = mysqli_fetch_array($res_leads))
			    {
				$q_sel_comp = "select client_id, regional_office from b2b_profile where Company_name='".$_SESSION["CompName"]."'  limit 1";
				$res_sel_comp = mysqli_query($conn,$q_sel_comp);
								
				while($r_c = mysqli_fetch_array($res_sel_comp))
				 {				 
				 $locNm = explode(",",$row["loc_name"]);
				 
				 if(date('H', strtotime($row["lead_gen"]))> 9 && date('H', strtotime($row["lead_gen"])) < 18)
				 {
				   $ld_time = strtotime($row["lead_gen"]);
				   $tmDiff = strtotime(date('Y-m-d H:i:s')) - $ld_time;
				   $tmDiff = $tmDiff/3600;
				}
				else if(date('H', strtotime($row["lead_gen"])) > 18 && date('H', strtotime($row["lead_gen"]))<24)
				{
				  $ld_time = date('Y-m-d', strtotime($row["lead_gen"].'+1 days'));
				   $ld_time = strtotime($row["lead_gen"]);
				   $tmDiff = strtotime(date('Y-m-d H:i:s')) - $ld_time;
				   $tmDiff = $tmDiff/3600;
				  }
				else if(date('H', strtotime($row["lead_gen"])) < 9 && date('H', strtotime($row["lead_gen"]))>0)
				 {
				   $tim_diff = 9 - date('H',strtotime($row["lead_gen"]));
				  $ld_time = date('Y-m-d', strtotime($row["lead_gen"].'+'.$tim_diff.' hour'));
				  $tmDiff = strtotime(date('Y-m-d H:i:s')) - $ld_time;
				   $tmDiff = $tmDiff/3600;
				  }
				
				//	if($tmDiff <= 2)
		    
			    {
			
			 $get_dist_150 = "select distance from distance_matrix where from_loc like '".$r_c["regional_office"]."%' and to_loc like '".$locNm[0]."%' having distance<=150";
				 $res_dist_150 = mysqli_query($con,$get_dist_150);
				 $res_num_dist150_rows = mysqli_num_rows($res_dist_150);
				 
				 $get_dist_300 = "select distance from distance_matrix where from_loc like '".$r_c["regional_office"]."%' and to_loc like '".$locNm[0]."%' having distance<=300";
				 $res_dist_300 = mysqli_query($con,$get_dist_300);
				 $res_num_dist300_rows = mysqli_num_rows($res_dist_300);
						
				 $clnt_tier1 = "select client_id from client_register where client_tier='PLATINUM' and client_id='".$_SESSION["clientID"]."'";
				 $res_clnt_tier1 = mysqli_query($conn,$clnt_tier1);
				 $res_num_tier1_rows = mysqli_num_rows($res_clnt_tier1);						 
				 
				$q_ld_tab = "select client_ld_status, wl_id, quote_id from lead_route_tab where wl_id='".$row["wl_id"]."' and client_id_b2b='".$_SESSION["clientID"]."'";
				$res_ld_tab = mysqli_query($conn,$q_ld_tab);
				$res_num_rows = mysqli_num_rows($res_ld_tab);
				
				$q_chk_status = "select client_ld_status, wl_id, quote_id from lead_route_tab where wl_id='".$row["wl_id"]."' and lead_id='".$row["lead_id"]."' and client_ld_status='Responded'";
				$res_chk_status = mysqli_query($conn,$q_chk_status);
				$row_status  = mysqli_num_rows($res_chk_status);
		
		
		     if($res_ld_tab)		
				{
				if($res_num_rows > 0)
			    {
		    	while($r = mysqli_fetch_array($res_ld_tab))
				{				    
				   if($r["client_ld_status"] == "Responded" || $r["client_ld_status"] == "Accept-Viewed" || $r["client_ld_status"] == "Accepted")
				      $st_acpt = true;
					else
					  $st_acpt = false;  
				   if($r["client_ld_status"] == "Rejected" || $r["client_ld_status"] == "Reject-Viewed")
				      $st_rej = true;
					else
					  $st_rej = false;  
				 if($r["client_ld_status"] == "Viewed" || $r["client_ld_status"] == "Quote-Viewed")
				      $st_view = true;
					else
					  $st_view = false; 
					  
			    if($r["quote_id"] != "")
					   $st_q = true;
					else   
				      $st_q = false;  
				 }
				 }
				 else
				     {
				 $st_rej = false;
			 $st_view = false;
			 $st_acpt = false;
			 $st_q = false;
				 }
				 }
		
			
			 if(date('Y-m-d') <= date('Y-m-d', strtotime($row["lead_date"]. ' + 2 days')))			
				  {					  
				  if($tmDiff <=6)	
				  {
				 if($res_num_tier1_rows > 0 || $res_num_dist150_rows > 0)
				 {
				 		$count_lds= $count_lds+1;	 	 	 
				  echo '<tr>';
				  echo '<td align="center"> <span onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\');" style="color:#0066ff; cursor:pointer; margin-left:3px;">'.$row["lead_id"].'</span></td>';
				 
				   echo '<td align="left" width="200px"> <span onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\');" style="color:#0066ff; cursor:pointer; margin-left:3px; ">'.$row["loc_name"].'<span></td>';
				 
				  echo '<td align="center" style="margin-left:3px;"> <span>'.$row["lead_date"].'</span></td>';				 
			  
			      echo '<td align="center"><input type="button"  id="btn_view_'.$row["wl_id"].'" onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); chngColr(this.id,\'#0066ff\');"'; if($st_view == true) { echo 'style="background:#0066ff; color:#fff;"'; echo 'value="Viewed";'; } else if($st_q == true){ echo 'disabled="true"'; echo 'value="View";'; }  else { echo 'value="View";';  }  echo '/></td>';
							       
					echo '<td align="center"><input type="button" id="btn_rej_'.$row["wl_id"].'" onClick="chngColr(this.id,\'#ff0000\'); rejLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); disbl(\'btn_acpt_'.$row["wl_id"].'\',\'btn_view_'.$row["wl_id"].'\');"'; if($st_rej == true) { echo 'style="background:#ff0000; color:#fff;"'; echo 'value="Rejected";'; }  else if($st_q == true){ echo 'disabled="true"'; echo 'value="Reject";'; }  else {echo 'value="Reject";';} if($st_q == true){ echo 'disabled="true"'; } echo ' /></td>';					   					  
				  echo '<td align="center">				  
				  <input type="button" id="btn_acpt_'.$row["wl_id"].'" onClick="chngColr(this.id,\'#009900\'); acptLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); disbl(\'btn_rej_'.$row["wl_id"].'\',\'btn_view_'.$row["wl_id"].'\');"';   if($st_acpt == true && $st_q == true){ echo 'style="background:#009900; color:#fff;"'; echo 'value="Responded";'; } else if($st_acpt == true){ echo 'style="background:#009900; color:#fff;"'; echo 'value="Accepted";'; } else {echo 'value="Accept";';} echo ' /></td>';
				   
				  echo '</tr>';
				  }
				  }
				  else if($tmDiff > 6 && $row_status < 7  && $res_num_tier1_rows > 0 || $tmDiff > 6 && $row_status < 7  && $res_num_dist300_rows > 0)
				  {
				  $count_lds= $count_lds+1;
				   echo '<tr>';
				  echo '<td align="center"> <span onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\');" style="color:#0066ff; cursor:pointer; margin-left:3px;">'.$row["lead_id"].'</span></td>';
				 
				   echo '<td align="left" width="200px"> <span onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\');" style="color:#0066ff; cursor:pointer; margin-left:3px; ">'.$row["loc_name"].'<span></td>';
				 
				  echo '<td align="center" style="margin-left:3px;"> <span>'.$row["lead_date"].'</span></td>';				 
			  
			      echo '<td align="center"><input type="button"  id="btn_view_'.$row["wl_id"].'" onClick="show_block(\'dtls_leads\'); Show_newLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); chngColr(this.id,\'#0066ff\');  viewLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); disbl(\'btn_acpt_'.$row["wl_id"].'\',\'btn_rej_'.$row["wl_id"].'\'); "'; if($st_view == true) { echo 'style="background:#0066ff; color:#fff;"'; echo 'value="Viewed";'; } else if($st_q == true){ echo 'disabled="true"'; echo 'value="View";'; }  else { echo 'value="View";';  }  echo '/></td>';
							       
					echo '<td align="center"><input type="button" id="btn_rej_'.$row["wl_id"].'" onClick="chngColr(this.id,\'#ff0000\'); rejLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); disbl(\'btn_acpt_'.$row["wl_id"].'\',\'btn_view_'.$row["wl_id"].'\');"'; if($st_rej == true) { echo 'style="background:#ff0000; color:#fff;"'; echo 'value="Rejected";'; }  else if($st_q == true){ echo 'disabled="true"'; echo 'value="Reject";'; }  else {echo 'value="Reject";';} if($st_q == true){ echo 'disabled="true"'; } echo ' /></td>';					   					  
				  echo '<td align="center">				  
				  <input type="button" id="btn_acpt_'.$row["wl_id"].'" onClick="chngColr(this.id,\'#009900\'); acptLead(\''.$row["wl_id"].'\',\''.$row["lead_id"].'\',\''.$_SESSION["userEmail"].'\',\''.$row["lead_date"].'\'); disbl(\'btn_rej_'.$row["wl_id"].'\',\'btn_view_'.$row["wl_id"].'\');"';   if($st_acpt == true && $st_q == true){ echo 'style="background:#009900; color:#fff;"'; echo 'value="Responded";'; } else if($st_acpt == true){ echo 'style="background:#009900; color:#fff;"'; echo 'value="Accepted";'; } else {echo 'value="Accept";';} echo ' /></td>';
				   
				  echo '</tr>';
				  
				  }
				
				}
				
				}
				
				}
			 }
			 }
			 ?>
		   </table>
		 </div>
		 
		 <div id="tab_quotes" style="float:left; width:100%; display:none; height:400px; overflow-y:scroll; overflow-x:hidden;">
		   <table class="font-small" width="100%" height="auto" cellpadding="0" cellspacing="0" border="1px" bordercolor="#CCCCCC" style="color:#666; text-align:center;">
		     <tr style="background:#000066; color:#fff;">			  
			  <th>Lead ID</th>
			  <th>Lead Date</th>
			  <th>Location</th>
			  <th>Quote ID</th>
			  <th>Response Date</th>
			  <th>Quote Expiry Date</th>
			  <th>Quotation</th>
			  <th>Status</th>
			 </tr>
			 <?php
	 $q_qt_lst = "select quote_date, quote_id, lead_id, lead_date, qt_expire_date, qt_action, qt_status, locations from quote_dtls where client_id='".$_SESSION["clientID"]."'";
			 $res_qt_lst = mysqli_query($conn,$q_qt_lst);
			 if($res_qt_lst)
			 {
			 while($row = mysqli_fetch_array($res_qt_lst))
			 {
			 echo '<tr>
			  <td>'.$row["lead_id"].'</td>
			  <th>'.$row["lead_date"].'</th>
			  <td>'.$row["locations"].'</td>
			  <td>'.$row["quote_id"].'</td>
			   <td>'.$row["quote_date"].'</td>
			   <td>'.$row["qt_expire_date"].'</td>
			  <td><span onClick="show_block(\'dtls_response\'); Show_newQuotes(\''.$row["lead_id"].'\',\''.$row["quote_id"].'\')" style="color:#0066ff; cursor:pointer;" />Click here..</span></td>
			  <td>'.$row["qt_status"].'</td>
			 </tr>';
			 }
			 }
			 ?>
		   </table>
		 </div>
		 
		 <div id="tab_purchs" style="float:left; width:100%; display:none;  height:400px; overflow-y:scroll; overflow-x:hidden;">
		   <table class="font-small" width="100%" height="auto" cellpadding="0" cellspacing="0" border="1px" bordercolor="#CCCCCC" style="color:#666;">
		     <tr style="background:#000066; color:#fff;">
			  <th>Request/Lead ID</th>
			  <th>Date of Response</th>
			  <th>Date of Purchase</th>
			  <th>Response ID</th>
			  <th>Transaction ID</th>
			  <th>Booking ID</th>

			 </tr>
		    <?php
			//echo $_SESSION["clientID"];
			   $q_clnt = "select quote_id, lead_id, DATE_FORMAT(quote_date,'%d-%m-%Y') as quote_date from quote_dtls where client_id='".$_SESSION["clientID"]."' order by quote_date desc";
			   $res_clnt = mysqli_query($conn,$q_clnt);
			   if($res_clnt)
			   {
			   while($row = mysqli_fetch_array($res_clnt))
			   {
			     $q_pck = "select pck_id, book_id, trxn_id, DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as date_of_purchase from buy_pck where pck_id='".$row["quote_id"]."'";
			      $res_pck = mysqli_query($conn,$q_pck);
				  
				  while($r = mysqli_fetch_array($res_pck))
				  {
				  echo '<tr>';
				  echo '<td>'.$row["lead_id"].'</td>';
				  echo '<td>'.$row["quote_date"].'</td>';
				  echo '<td>'.$r["date_of_purchase"].'</td>';
				  echo '<td>'.$row["quote_id"].'</td>';
				  echo '<td>'.$r["trxn_id"].'</td>';
				  echo '<td>'.$r["book_id"].'</td>';
				  echo '</tr>';
				  }
			   }
			  }
			?>
		   </table>
		 </div>	 
	     
	   </span>
	   
	</div>


<!--------------------------------------------------------------- Dashboard -------------------------------------------------------------------------------->	
	
	<div id="div_withdraw_pop" class="popUp_imgs_div" style="width:500px; padding:10px; height:auto;"></div>
	
	
	<div id="div_Dashboard_Summary" style="display:none; width:100%;" onMouseOver="headerBtn_Color('btn_Dashboard','btn_Packages','btn_Leads','btn_Services','btn_profile','btn_payment');  hide_block('pck_crt_mod');">
	   
	     <div id="dashboard" class="font-medium" style="margin-top:15px; float:left; display:block;  color:#fff; cursor:pointer;">
		 
		 <div id="dashBrd_btns" style="float:left; width:100%; background:#bbb;">
	      
		  <span  style="float:left; margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_pck','div_dash_inv','div_dash_purc','div_dash_cancel','div_dash_request');">
	   <div id="btn_dash_Package" class="top_subBtn" style="color:#ff0000;" onClick="show_btn_color('btn_dash_Package','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Cancel','btn_dash_Reqst'); showDashPeriod('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">Packages Posted</div></span></span>
		  
		  <span  style="float:left;  margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_purc','div_dash_inv','div_dash_cancel','div_dash_request','div_dash_pck');">
	 <div id="btn_dash_Purchase" class="top_subBtn" onClick="show_btn_color('btn_dash_Purchase','btn_dash_Inventory','btn_dash_Cancel','btn_dash_Reqst','btn_dash_Package');">Purchase</div></span></span>
	   
	     <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_inv','div_dash_purc','div_dash_cancel','div_dash_request','div_dash_pck');">
	   <div id="btn_dash_Inventory" class="top_subBtn"  onClick="show_btn_color('btn_dash_Inventory','btn_dash_Purchase','btn_dash_Cancel','btn_dash_Reqst','btn_dash_Package'); PeriodicInv('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">Inventory</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_cancel','div_dash_purc','div_dash_inv','div_dash_request','div_dash_pck');">
	   <div id="btn_dash_Cancel" class="top_subBtn" onClick="closed_cncls('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); show_btn_color('btn_dash_Cancel','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Reqst','btn_dash_Package');">Cancellation</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_dash_request','div_dash_purc','div_dash_inv','div_dash_cancel','div_dash_pck');">
	   <div id="btn_dash_Reqst" class="top_subBtn"  onClick="show_btn_color('btn_dash_Reqst','btn_dash_Cancel','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Package');">Request 4Q</div></span></span>
	   
	  </div>	     		   
			   		 
		 <div id="div_dash_pck" style="float:left; width:100%">
		 
		 <div id="post_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="showDashPeriod('Yest','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_yest_post','btn_tday_post','btn_wkly_post','btn_ytd_post','btn_itd_post','btn_mtd_post');">
			   <span style="float:left;"><div  id="btn_yest_post" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="showDashPeriod('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_tday_post','btn_yest_post','btn_wkly_post','btn_ytd_post','btn_itd_post','btn_mtd_post');">
			   <span style="float:left;"><div  id="btn_tday_post" class="btn_semi_trapez_onFocus">Today</div></span></span>

			   <span onClick="showDashPeriod('Week','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_wkly_post','btn_yest_post','btn_tday_post','btn_ytd_post','btn_itd_post','btn_mtd_post');">
			   <span  style="float:left;"><div id="btn_wkly_post" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="showDashPeriod('MTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_mtd_post','btn_yest_post','btn_tday_post','btn_wkly_post','btn_ytd_post','btn_itd_post');">
			   <span  style="float:left;"><div id="btn_mtd_post" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="showDashPeriod('YTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_ytd_post','btn_yest_post','btn_tday_post','btn_wkly_post','btn_itd_post','btn_mtd_post');">
			   <span style="float:left;"><div  id="btn_ytd_post" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="showDashPeriod('ITD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>'); trapz_clr_chng('btn_itd_post','btn_yest_post','btn_tday_post','btn_wkly_post','btn_ytd_post','btn_mtd_post');">
			   <span style="float:left;"><div id="btn_itd_post" class="btn_semi_trapez">ITD</div></span></span>
			   </div>
		      
			   <div id="post_sum_tabs" style="float:left; display:block; width:100%; height:500px; margin-bottom:10%; border:1px solid #EEE;">
			
			     <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">
				 
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th  width="120px">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Package Posted</span> 
					  <span style="float:left; margin-left:3px;">Date &nbsp;<img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPostDate('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPostDate('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>				  
					  </div>
					    <div style="float:left;width:100%;">
						<span style="float:left;"><select id="drpPurch_date" name="drpPurch_date" style="font-size:12px; width:80px;" onChange="sortPostDate(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');">
   						<?php
						 $q_date = "select distinct(DATE_FORMAT(`pck_date`,'%d-%m-%Y')) as pck_date from b2b_pck_crt where client_id='".$_SESSION["clientID"]."'";
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
						<select id="drpPost_mnth" name="drpPost_mnth" style="font-size:12px; height:20px;  width:50px;" onChange="sortDashMY('<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');">
		     			<?php
						 $q_date = "select distinct(month(pck_date)) as month from b2b_pck_crt where client_id='".$_SESSION["clientID"]."'";
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
						<select id="drpPost_year" name="drpPost_year" style="font-size:12px;  height:20px;  width:50px;" onChange="sortDashMY('<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');">
						<?php
						 $q_date = "select distinct(year(pck_date)) as year from b2b_pck_crt where client_id='".$_SESSION["clientID"]."'";
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
						</div></th>
					  
					  <th width="120px">Package ID</th>
					  <th width="90px"><span style="float:left;">Package</span>
					  <span style="float:left; margin-left:3px;"> Name &nbsp;<img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPostName('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPostName('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>				  
					  </th>
					 
					  <th width="50px">
					  <span style="float:left;">Duration</span>
					    </th>
					 
					  <th width="110px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package Price</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPostprc('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPostprc('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:5px;">
					  <select id="drpDashPrice" name="drpDashPrice" style="width:100px;" onChange="sortPostprc(this.value);">
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
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPostVac('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPostVac('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>					  
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash" name="drpVacTh_dash" style="width:130px; font-size:14px;" onChange="sortPostVac(this.value);">
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
					  <th style="position:relative;" width="130px"><div style="float:left;width:100%;">
					  <span style="float:left;">Location</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPostLoc('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPostLoc('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /></span></div>
					  <div style="float:left;width:100%;">
					   <input id="searchPck" name="searchPck" type="text" class="searchPck" style="width:130px; height:25px; color:#555;font-size:14px; " placeholder="Enter City Name" onKeyUp="toUpper(this.id); sortPostLoc(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>','<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"] ?>');" /> 
					  </div>
					  <div id="resultPck" style="position:absolute; top:60px; z-index:10000; width:180px; background:#fff; border:1px solid #666; font-size:12px;"></div>
					  </th>
					  <th width="40px">#<br/>Views</th>
					  <th width="40px">#<br/> Sold</th>
					  <th width="40px">#<br/> Cancelled</th>
					  <th width="40px">#<br/>Queries</th>
					  <th width="40px">Withdraw</th>
					</tr>
					</table>
					 
				<div id="post_Tab" style="float:left; width:100%; display:block;">
					 
				  </div>
				  
			 </div>
		 
		 </div>	 
		 
		 <div id="div_dash_purc" style="display:none; float:left; width:100%"> 
		 
		     <div id="purc_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick=" PeriodicPurc('Yest','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');  trapz_clr_chng('btn_yest_purc','btn_tday_purc','btn_wkly_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_yest_purc" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick=" PeriodicPurc('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');trapz_clr_chng('btn_tday_purc','btn_yest_purc','btn_wkly_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_tday_purc" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick=" PeriodicPurc('Week','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');  trapz_clr_chng('btn_wkly_purc','btn_yest_purc','btn_tday_purc','btn_ytd_purc','btn_itd_purc','btn_mtd_purc');">
			   <span  style="float:left;"><div id="btn_wkly_purc" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="PeriodicPurc('MTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_mtd_purc','btn_yest_purc','btn_tday_purc','btn_wkly_purc','btn_ytd_purc','btn_itd_purc');">
			   <span  style="float:left;"><div id="btn_mtd_purc" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="PeriodicPurc('YTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_ytd_purc','btn_yest_purc','btn_tday_purc','btn_wkly_purc','btn_itd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div  id="btn_ytd_purc" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick=" PeriodicPurc('ITD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_itd_purc','btn_yest_purc','btn_tday_purc','btn_wkly_purc','btn_ytd_purc','btn_mtd_purc');">
			   <span style="float:left;"><div id="btn_itd_purc" class="btn_semi_trapez">ITD</div></span></span>
			   </div>		     	  
			 
			 <div id="purc_tabs" style="float:left; display:block; width:100%; height:500px; margin-bottom:10%; border:1px solid #EEE;">
			
<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0" cellpadding="0">

				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th width="170px">
					
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Purchase Date</span> 
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPurcDate('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPurcDate('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>				  
					  </div>
					
					  <div style="float:left;width:100%;">
						<span style="float:left;"><select id="drpPurch_date_purc" name="drpPurch_date_purc" style="font-size:12px; width:80px;" onChange="sortPurcDate(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');">
   						<?php
						 $q_date = "select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id from buy_pck where posted_by='".$_SESSION["clientID"]."'";
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
				        <span style="float:left; margin-left:5px;">
						<select id="drpPurcMonth" name="drpPurcMonth" style="font-size:12px; height:20px;  width:50px;" onChange="sortPurcMY();">
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
						<select id="drpPurcYear" name="drpPurcYear" style="font-size:12px;  height:20px;  width:50px;" onChange="sortPurcMY();">
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
						
						<th width="160px" style="position:relative;">
						
						<div style="float:left;width:100%;">
					  <span style="float:left;">Location</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPurcLoc('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPurcLoc('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span></div>
					  <div style="float:left;width:100%;">
					   <input id="searchPck_purc" name="searchPck_purc" type="text" class="searchPck" style="width:180px; height:25px; color:#555;font-size:14px; " placeholder="Enter City Name" onKeyUp="toUpper(this.id); sortPurcLoc(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /> 
					  </div>
					  <div id="resultPck_purc" style="position:absolute; top:40px; z-index:10000; width:180px; background:#fff; border:1px solid #666; font-size:12px;"></div>
					  
					  </th>				  
					  
					   <th width="120px">
					   
					   <span style="float:left;">Vacation Type</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPurcVac('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPurcVac('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>					  
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash_purc" name="drpVacTh_dash_purc" style="width:130px; font-size:14px;" onChange="sortPurcVac(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');">
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
					 
					  <th width="100px">
					  <span style="float:left;">Duration</span>
					  <select id="drpDur_purc" name="drpDur_purc" style="width:80px;" onChange="sortPurcDur(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');">
					    <option>--Duration--</option>
						<?php
						$q_sel_dur = "select distinct(duration) as duration from b2b_pck_crt where client_id='".$_SESSION["clientID"]."'";
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
					 
					  <th width="120px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package Price</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPurcPrc('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPurcPrc('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:5px;">
					  <select id="drpDashPrice_purc" name="drpDashPrice_purc" style="width:100px;" onChange="sortPurcPrc(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');">
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
					  
					  <th width="120px">
					  <span style="float:left;">Package Name</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortPurcName('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortPurcName('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>');" /></span>				  
					  </th>				 
					  <th width="50px" style="word-wrap:break-word;"><span style="float:left;">BookingID</span></th>
						 <th width="50px" style="word-wrap:break-word;"><span style="float:left;">TransactionID</span></th>
					</tr>
					</table>
					 
				<div id="txt_Tab_purc" style="float:left; width:100%; display:block;">
			 
				 </div>
				  
			 </div>
	
		</div>
	  
	    <div id="div_dash_inv" style="float:left; display:none; width:100%;">	
		
	    	<div id="purc_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="PeriodicInv('Yest','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_yest_dash','btn_tday_dash','btn_wkly_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_yest_dash" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="PeriodicInv('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_tday_dash" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="PeriodicInv('Week','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_wkly_dash','btn_yest_dash','btn_tday_dash','btn_ytd_dash','btn_itd_dash','btn_mtd_dash');">
			   <span  style="float:left;"><div id="btn_wkly_dash" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="PeriodicInv('MTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_mtd_dash','btn_wkly_dash','btn_tday_dash','btn_yest_dash','btn_ytd_dash','btn_itd_dash');">
			   <span  style="float:left;"><div id="btn_mtd_dash" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="PeriodicInv('YTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_ytd_dash','btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_itd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div  id="btn_ytd_dash" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="PeriodicInv('ITD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>'); trapz_clr_chng('btn_itd_dash','btn_tday_dash','btn_yest_dash','btn_wkly_dash','btn_ytd_dash','btn_mtd_dash');">
			   <span style="float:left;"><div id="btn_itd_dash" class="btn_semi_trapez">ITD</div></span></span>
			   </div>		    
			 
     	  <table class="font-medium" width="100%" border="1px solid #DDD" style="text-align:left; font-size:14px; table-layout:fixed;" cellspacing="0">				 
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th  width="120px">
					  <div style="float:left; width:100%;">
					  <span style="float:left;">Month-Year</span> 
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortInvDate('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortInvDate('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>				  
					  </div>
					    <div style="float:left;width:100%;">
				        <span style="float:left; margin-left:5px;">
						<select id="drpDash_mnth_inv" name="drpDash_mnth_inv" style="font-size:12px; height:20px;  width:50px;" onChange="sortDashMY_inv();">
						<option value="Month">Month</option>
		     			<?php
						 $q_date = "select distinct(month(pck_date)) as month from b2b_pck_crt";
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
						<select id="drpDash_year_inv" name="drpDash_year_inv" style="font-size:12px;  height:20px;  width:50px;">
						<option value="Year">Year</option>
						<?php
						 $q_date = "select distinct(year(pck_date)) as year from b2b_pck_crt";
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
						</div></th>
					  
					  <th width="120px"><span style="float:left;">Package Name</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortInvName('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortInvName('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>				  
					  </th>
			 
					  <th width="120px">
					  <div style="float:left;width:100%;"><span style="float:left;">Package Price</span>
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortInvPrc('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortInvPrc('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>
					  </div>
					  <div style="float:left;width:100%;">
					<span style="float:left; margin-left:5px;">
					  <select id="drpDashPrice_inv" name="drpDashPrice_inv" style="width:100px;" onChange="sortInvPrc(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">
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
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortInvVac('Asc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortInvVac('Desc','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');" /></span>					  
					  <div style="float:left; width:100%;">
					     <span style="float:left; margin-left:3px;">
			 <select id="drpVacTh_dash_inv" name="drpVacTh_dash_inv" style="width:130px; font-size:14px;" onChange="sortInvVac(this.value,'<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"]; ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"];?>');">
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
					  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px" onClick="sortInvValid('Asc','<?php if(isset($_SESSION['CompName'])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION['Region'])) echo $_SESSION['Region']; ?>');" /></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" onClick="sortInvValid('Desc','<?php if(isset($_SESSION['CompName'])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION['Region'])) echo $_SESSION['Region']; ?>');" /></span></div>
					 	<div style="float:left; width:100%;">
			<span style="float:left;"><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txtValFrom_inv" name="txtValFrom_inv" placeholder="From Date" onClick="oDP.show(event,'txtValFrom_inv',2); ShowContent('calendar');" onChange="sortInvValid('<?php if(isset($_SESSION['CompName'])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION['Region'])) echo $_SESSION['Region']; ?>');"  /></span>
			<span style="float:left; margin-left:3px;"><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txtValTo_inv" name="txtValTo_inv" placeholder="To Date" onClick="oDP.show(event,'txtValTo_inv',2); ShowContent('calendar');" onChange="sortInvValid(this.value,'<?php if(isset($_SESSION['CompName'])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION['Region'])) echo $_SESSION['Region']; ?>');" /></span>
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
					 
	      <div id="txt_Tab_inv" style="float:left; width:100%; display:block;">
				         
				  </div>

		</div>
				
		<div id="div_dash_cancel" style="display:none; width:100%; float:left;"> 	
		
		 <div id="purc_detls_dash" style="margin-top:10px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="closed_cncls('Yest','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_yest_cncl','btn_tday_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_yest_cncl" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="closed_cncls('Tday','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_tday_cncl','btn_yest_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_tday_cncl" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="closed_cncls('Week','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_wkly_cncl','btn_yest_cncl','btn_tday_cncl','btn_ytd_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span  style="float:left;"><div id="btn_wkly_cncl" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="closed_cncls('MTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_mtd_cncl','btn_yest_cncl','btn_tday_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_itd_cncl');">
			   <span  style="float:left;"><div id="btn_mtd_cncl" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="closed_cncls('YTD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_ytd_cncl','btn_yest_cncl','btn_tday_cncl','btn_wkly_cncl','btn_itd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div  id="btn_ytd_cncl" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="closed_cncls('ITD','<?php if(isset($_SESSION["CompName"])) echo $_SESSION["CompName"] ?>','<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"]; ?>'); trapz_clr_chng('btn_itd_cncl','btn_yest_cncl','btn_tday_cncl','btn_wkly_cncl','btn_ytd_cncl','btn_mtd_cncl');">
			   <span style="float:left;"><div id="btn_itd_cncl" class="btn_semi_trapez">ITD</div></span></span>
			   </div>	 

             <div id="closecncl_sum_tab" style="float:left; width:100%; margin-top:5px;">

			</div>
		
		</div>
		
		<div id="div_dash_request" style="display:none;">		   
		   <div id="dash_rqst_q" style="float:left; display:block; width:100%; height:500px; margin-bottom:5%; margin-top:10px; border:1px solid #EEE;">
		     <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%;" cellspacing="0" cellpadding="0">
			     <tr style="text-align:left; background:#283C5F; color:#FFF;">
			  	  <th width="80px"><span style="float:left;">Lead ID</span></th>		
					      <th width="120px"><span style="float:left;">Locations</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
						  <th width="100px"><span style="float:left;">Lead Received<br/> Date</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span></th>
						  <th width="100px"><span style="float:left;">Lead Responded<br/> Date</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
						  <th width="100px"><span style="float:left;">Lead Expiry<br/> Date</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
						  <th width="100px"><span style="float:left;">Quote Expiry<br/> Date</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
						  <th width="100px"><span style="float:left;">Purchase<br/> Date</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
						  <th width="100px"><span style="float:left;">Status</span>
						  <span style="float:left; margin-left:3px;"><img src="Images/collapse_icon_up.png" width="12px" height="12px"/></span>
					  <span style="float:left; margin-left:2px;"><img src="Images/expand_icon.png" width="12px" height="12px" /></span>
						  </th>
					</tr>
			 </table>
		   </div>
		</div>
		
		</div>
		
		

		
	   </div>	

<!--------------------------------------------------------   Payment Summary ------------------------------------------------------------------------------>	
	<div id="div_Payment_Details" style="display:none;" onMouseOver="headerBtn_Color('btn_payment','btn_Services','btn_Leads','btn_profile','btn_Packages','btn_Dashboard'); hide_block('pck_crt_mod');">
     
	 <!-------------------------------  Payment Review ------------------------------------>	
	  <div id="div_payment" style="float:left; width:100%; display:none;">

		<div id="purc_detls" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="disp_block('purc_yest_tabs','purc_tday_tabs','purc_wkly_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_yest" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="disp_block('purc_tday_tabs','purc_yest_tabs','purc_wkly_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_tday" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="disp_block('purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span  style="float:left;"><div id="btn_wkly" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="disp_block('purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span  style="float:left;"><div id="btn_mtd" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="disp_block('purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_ytd" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="disp_block('purc_itd_tabs','purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div id="btn_itd" class="btn_semi_trapez">ITD</div></span></span>
			   
			   <span onClick="disp_block('purc_sum_tabs','purc_itd_tabs','purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs');">
			   <span style="float:left;"><div id="btn_sum" class="btn_semi_trapez_onFocus">Summary</div></span></span>
	
			 </div>

		</div>
		
	<!-------------------------------  Customer Review ------------------------------------>	
		<div id="div_Cust_rev" style="float:left; width:100%; display:none;">
		   
		    <div id="purc_detls" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="disp_block('purc_yest_tabs','purc_tday_tabs','purc_wkly_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_yest" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="disp_block('purc_tday_tabs','purc_yest_tabs','purc_wkly_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_tday" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="disp_block('purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_mtd_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span  style="float:left;"><div id="btn_wkly" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="disp_block('purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_ytd_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span  style="float:left;"><div id="btn_mtd" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick="disp_block('purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_itd_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div  id="btn_ytd" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick="disp_block('purc_itd_tabs','purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs','purc_sum_tabs');">
			   <span style="float:left;"><div id="btn_itd" class="btn_semi_trapez">ITD</div></span></span>
			   
			   <span onClick="disp_block('purc_sum_tabs','purc_itd_tabs','purc_ytd_tabs','purc_mtd_tabs','purc_wkly_tabs','purc_tday_tabs','purc_yest_tabs');">
			   <span style="float:left;"><div id="btn_sum" class="btn_semi_trapez_onFocus">Summary</div></span></span>
	
			 </div>
			 
			 <div style="width:100%; float:left;">
	            <table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%;" cellspacing="0">
		      <tr style="background:#283C5F; color:#FFF;">
			     <th width="80px"></th>
				 <th colspan="4">Description</th>
				 <th colspan="3">Feedback On Package</th>
				 <th colspan="2">Service Provider</th>
			  </tr>
		   
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th><div style="float:left;width:100%;">Month-Year</div>					  
					  	<div style="float:left;width:100%;">
						<select style="font-size:12px;  width:50px;">
						<option>Month</option>
						<option>Jan</option>
						<option>Feb</option>
						<option>Mar</option>
						</select>
						<select style="font-size:12px;  width:50px;">
						<option>Year</option>
						<option>2011</option>
						<option>2012</option>
						<option>2013</option>
						</select></div></th>
					  <th>Package Name</th>
					  <th>Duration</th>
					  <th>#Offered</th>
					  <th>Sold</th>
					  <th><div style="float:left;width:100%;">Avg Customer Rating</div> </th>					
					  <th>Comments</th>
					  <th>xyz</th>
					  <th>Likes</th>
					  <th>Unlikes</th>
					</tr> 
					<tr>
					  <td>Aug-2013</td>
					  <td>Sunny Sand</td>
				       <td>3N/4D</td>
					  <td>20</td>
					  <td>12</td>
					  <td>3.4</td>
					  <td>4</td>
					  <td></td>
					  <td>10</td>					  
					  <td></td>
					</tr>
					
					<tr>
					  <td>Sept-2013</td>
					  <td>Winter Chill</td>
				       <td>4N/5D</td>
					  <td>25</td>
					  <td>19</td>
					  <td>4.0</td>
					  <td>4</td>
					  <td></td>
					  <td>10</td>
					  <td></td>
					</tr>	
				 </table>
	       </div>
			 
		</div>
		
	</div>
	
<!------------------------------------------------------------------------- Services ---------------------------------------------------------------------->

    <div id="Query_Dtls" class="popUp_imgs_div" style="width:600px; height:auto; padding:10px;"></div>	
	
	<div id="div_Service" style="display:none;" onMouseOver="headerBtn_Color('btn_Services','btn_Leads','btn_profile','btn_Packages','btn_Dashboard','btn_payment'); hide_block('pck_crt_mod');">
   
   	     <div class="font-medium" style=" float:left; width:100%; display:block; cursor:pointer; color:#fff;">
		 
		 <div id="Service_btns" style="float:left; width:100%; background:#bbb;">
		 
		 <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_serv_quer','div_serv_req','div_serv_compl');">
	   <div id="btn_Serv_Query" class="top_subBtn"  onClick="show_btn_color('btn_Serv_Query','btn_Serv_Request','btn_Serv_Complaint');">Query</div></span></span>
	      
		  <span  style="float:left;  margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_serv_req','div_serv_quer','div_serv_compl');">
	 <div id="btn_Serv_Request" class="top_subBtn" onClick="show_btn_color('btn_Serv_Request','btn_Serv_Query','btn_Serv_Complaint');">Request</div></span></span>     
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('div_serv_compl','div_serv_req','div_serv_quer');">
	   <div id="btn_Serv_Complaint" class="top_subBtn" onClick="show_btn_color('btn_Serv_Complaint','btn_Serv_Request','btn_Serv_Query');">Complaint</div></span></span>
	   
	  </div>
		
		</div>			 
			 
			 <div id="div_serv_req" style="float:left; display:none; width:100%;">
			 
			 <div id="serv_btns" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="trapz_clr_chng('btn_yest_serv_req','btn_tday_serv_req','btn_wkly_serv_req','btn_mtd_serv_req','btn_ytd_serv_req','btn_itd_serv_req');">
			   <span style="float:left;"><div  id="btn_yest_serv_req" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_tday_serv_req','btn_yest_serv_req','btn_wkly_serv_req','btn_mtd_serv_req','btn_ytd_serv_req','btn_itd_serv_req');">
			   <span style="float:left;"><div  id="btn_tday_serv_req" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="trapz_clr_chng('btn_wkly_serv_req','btn_tday_serv_req','btn_yest_serv_req','btn_mtd_serv_req','btn_ytd_serv_req','btn_itd_serv_req');">
			   <span  style="float:left;"><div id="btn_wkly_serv" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="trapz_clr_chng('btn_mtd_serv_req','btn_tday_serv_req','btn_yest_serv_req','btn_wkly_serv_req','btn_ytd_serv_req','btn_itd_serv');">
			   <span  style="float:left;"><div id="btn_mtd_serv_req" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick=" trapz_clr_chng('btn_ytd_serv_req','btn_tday_serv_req','btn_yest_serv_req','btn_wkly_serv_req','btn_mtd_serv_req','btn_itd_serv_req');">
			   <span style="float:left;"><div  id="btn_ytd_serv_req" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick=" trapz_clr_chng('btn_itd_serv_req','btn_tday_serv_req','btn_yest_serv_req','btn_wkly_serv_req','btn_mtd_serv_req','btn_ytd_serv_req');">
			   <span style="float:left;"><div id="btn_itd_serv_req" class="btn_semi_trapez">ITD</div></span></span> 		   
	
			 </div>
			 
			 <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px;" cellspacing="0">
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th> Request ID</th>
					 <th>Received Date</th>
					 <th>Responded Date</th>
					 <th>SLA</th>
				     <th>Turn Around time</th>
				     <th>Status</th>
					 <th>Remark</th>
					</tr>
				</table>
				
			 </div>
			 
			 <div id="div_serv_quer" style="float:left; display:none;width:100%;">
			     <div id="serv_btns" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="trapz_clr_chng('btn_yest_serv_quer','btn_tday_serv_quer','btn_wkly_serv_quer','btn_mtd_serv_quer','btn_ytd_serv_quer','btn_itd_serv_quer');">
			   <span style="float:left;"><div  id="btn_yest_serv_quer" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_tday_serv_quer','btn_yest_serv_quer','btn_wkly_serv_quer','btn_mtd_serv_quer','btn_ytd_serv_quer','btn_itd_serv_quer');">
			   <span style="float:left;"><div  id="btn_tday_serv_quer" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="trapz_clr_chng('btn_wkly_serv_quer','btn_tday_serv_quer','btn_yest_serv_quer','btn_mtd_serv_quer','btn_ytd_serv_quer','btn_itd_serv_quer');">
			   <span  style="float:left;"><div id="btn_wkly_serv_quer" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="trapz_clr_chng('btn_mtd_serv_quer','btn_tday_serv_quer','btn_yest_serv_quer','btn_wkly_serv_quer','btn_ytd_serv_quer','btn_itd_serv_quer');">
			   <span  style="float:left;"><div id="btn_mtd_serv_quer" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick=" trapz_clr_chng('btn_ytd_serv_quer','btn_tday_serv_quer','btn_yest_serv_quer','btn_wkly_serv_quer','btn_mtd_serv_quer','btn_itd_serv_quer');">
			   <span style="float:left;"><div  id="btn_ytd_serv_quer" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick=" trapz_clr_chng('btn_itd_serv_quer','btn_tday_serv_quer','btn_yest_serv_quer','btn_wkly_serv_quer','btn_mtd_serv_quer','btn_ytd_serv_quer');">
			   <span style="float:left;"><div id="btn_itd_serv_quer" class="btn_semi_trapez">ITD</div></span></span>	  
	
			 </div>
			     
				  <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					 <th width="80px">Query for</th>
					 <th width="90px">Query ID</th>
					 <th width="80px">Received Date</th>
					 <th width="80px">Query</th>
					 <th width="80px">Responded Date</th>
					 <th width="82px">SLA</th>
				     <th width="80px">Status</th>
					</tr>
					<?php
					$q_query = "select query_type, query_id, DATE_FORMAT(`query_date`,'%d-%m-%Y') as query_date, query_comment, status, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date from query_tab where client_id ='".$_SESSION["clientID"]."'";
					$res_query = mysqli_query($conn,$q_query);								
					
					if($res_query)
					{
					  while($row = mysqli_fetch_array($res_query))
					  {
					  $date1 = date('Y-m-d', strtotime($row["query_date"]));
					  $date2 = date('Y-m-d', strtotime($row["response_date"]));
					    $dt1 = date_create($date1);
						$dt2 = date_create($date2);
						$numD = date_diff($dt1,$dt2);
						
					    echo '<tr>';
						echo '<td>'.$row["query_type"].'</td>';
						echo '<td>'.$row["query_id"].'</td>';
						echo '<td>'.$row["query_date"].'</td>';
					    echo '<td>
						<span style="color:#0066ff; cursor:pointer;" onclick="show_Query(\''.$row["query_id"].'\',\''.$_SESSION["userEmail"].'\');">Read Query</span></td>';
						echo '<td>'.$row["response_date"].'</td>';
						echo '<td>'.$numD->format("%a").'</td>';
						echo '<td>'.$row["status"].'</td>';
					  }
					}
					?>
				</table>
			 </div>
			 
			 <div id="div_serv_compl" style="float:left; display:none;width:100%;">
			 <div id="serv_btns" style="margin-top:0px; float:left; background:#FFFFFF; height:30px; width:99%; cursor:pointer; color:#fff;">			   
			   
			   <span onClick="trapz_clr_chng('btn_yest_serv_cmpl','btn_tday_serv_cmpl','btn_wkly_serv_cmpl','btn_mtd_serv_cmpl','btn_ytd_serv_cmpl','btn_itd_serv_cmpl');">
			   <span style="float:left;"><div  id="btn_yest_serv_cmpl" class="btn_semi_trapez">Yesterday</div></span></span>
			   
			   <span onClick="trapz_clr_chng('btn_tday_serv_cmpl','btn_yest_serv_cmpl','btn_wkly_serv_cmpl','btn_mtd_serv_cmpl','btn_ytd_serv_cmpl','btn_itd_serv_cmpl');">
			   <span style="float:left;"><div  id="btn_tday_serv_cmpl" class="btn_semi_trapez">Today</div></span></span>

			   <span onClick="trapz_clr_chng('btn_wkly_serv_cmpl','btn_yest_serv_cmpl','btn_tday_serv_cmpl','btn_mtd_serv_cmpl','btn_ytd_serv_cmpl','btn_itd_serv_cmpl');">
			   <span  style="float:left;"><div id="btn_wkly_serv_cmpl" class="btn_semi_trapez">Weekly</div></span></span>				   
			   
			   <span onClick="trapz_clr_chng('btn_mtd_serv_cmpl','btn_yest_serv_cmpl','btn_tday_serv_cmpl','btn_wkly_serv_cmpl','btn_ytd_serv_cmpl','btn_itd_serv_cmpl');">
			   <span  style="float:left;"><div id="btn_mtd_serv_cmpl" class="btn_semi_trapez">MTD</div></span></span> 
			   
			   <span onClick=" trapz_clr_chng('btn_ytd_serv_cmpl','btn_yest_serv_cmpl','btn_tday_serv_cmpl','btn_wkly_serv_cmpl','btn_mtd_serv_cmpl','btn_itd_serv_cmpl');">
			   <span style="float:left;"><div  id="btn_ytd_serv_cmpl" class="btn_semi_trapez">YTD</div></span></span>
			   
			   <span onClick=" trapz_clr_chng('btn_itd_serv_cmpl','btn_yest_serv_cmpl','btn_tday_serv_cmpl','btn_wkly_serv_cmpl','btn_mtd_serv_cmpl','btn_ytd_serv_cmpl');">
			   <span style="float:left;"><div id="btn_itd_serv_cmpl" class="btn_semi_trapez">ITD</div></span></span>
	
			 </div>
			 
			 <table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px;" cellspacing="0">
				    <tr style="text-align:left; background:#283C5F; color:#FFF;">
					  <th> Complaint ID</th>
					 <th>Received Date</th>
					 <th>Responded Date</th>
					 <th>SLA</th>
				     <th>Turn Around time</th>
				     <th>Status</th>
					 <th>Remark</th>
					</tr>
				</table>
			 </div>

	</div>
	
<!----------------------------------------------------------------------- Profile --------------------------------------------------------------------------->
	<div id="div_Profile" onMouseOver="headerBtn_Color('btn_profile','btn_Packages','btn_Leads','btn_Dashboard','btn_Services','btn_payment'); hide_block('pck_crt_mod');	show_active_btn('Profile');" <?php if($crt_subUser == true){ ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
	
 <!------------------------------------------------------------------ Access Previliges ---------------------------------------------------------------------------------------->

	     <div id="Content_btns" style="float:left; width:100%; background:#bbb;">
	      
		  <span  style="float:left;  margin-left:5px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('Bank_Section','SubUsers_Section','Content_Section','SubuserEdit_Section');">
	 <div id="btn_Acc_Bank" class="top_subBtn" onClick="show_btn_color('btn_Acc_Bank','btn_Acc_SubUser','btn_Acc_Content','btn_edit_SubUser');">BANK DETAILS </div></span></span>
	   
	     <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('SubUsers_Section','Bank_Section','Content_Section','SubuserEdit_Section');">
	   <div id="btn_Acc_SubUser" class="top_subBtn"  onClick="show_btn_color('btn_Acc_SubUser','btn_Acc_Bank','btn_Acc_Content','btn_edit_SubUser');" <?php if($crt_subUser == true) {?> style="color:#ff0000;" <?php }else{?> style="color:#fff;" <?php }?>>CREATE SUB-USER</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('Content_Section','SubUsers_Section','Bank_Section','SubuserEdit_Section');">
	   <div id="btn_Acc_Content" class="top_subBtn"  onClick="show_btn_color('btn_Acc_Content','btn_Acc_SubUser','btn_Acc_Bank','btn_edit_SubUser');">CONTENT</div></span></span>
	   
	   <span  style="float:left; margin-left:10px;">
	    <span style="float:left; cursor:pointer;" onClick="show_section('SubuserEdit_Section','Content_Section','SubUsers_Section','Bank_Section');">
	  <div id="btn_edit_SubUser" class="top_subBtn"  onClick="show_btn_color('btn_edit_SubUser','btn_Acc_Content','btn_Acc_SubUser','btn_Acc_Bank');">EDIT SUB-USER</div></span></span>
	   
	  </div>
	  
	      <div id="Bank_Section" style="display:none;">
	      <div id="div_bankDtls">
			<div style="float:left; width:100%; text-align:center;">
			<span style="float:left;" class="font-medium">Enter your Account Details</span>
			</div>

			<div style="width:100%; float:left; margin:10px 5px 5px 10px;">

				  <table class="font-medium">
			   <tr>
			     <td>Bank Name</td>
				 <td><input id="txtTab_cmpName" type="text" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_cmpName');" onMouseOut="txtbox_color_onmouseout('txtTab_cmpName');"/></td>
			   </tr>
			     <tr>
			     <td>Location/City</td>
				 <td><input type="text" id="txtTab_headQuarter" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_headQuarter');" onMouseOut="txtbox_color_onmouseout('txtTab_headQuarter');"/></td>
			   </tr>
			   <tr>
			     <td colspan="2"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
			   </tr>
			   <tr>
			     <td>Account Number</td>
				 <td><input type="text" id="txtTab_reqName" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_reqName');" onMouseOut="txtbox_color_onmouseout('txtTab_reqName');"/></td>
			   </tr>
			   <tr>
			      <td>Reconfirm Account Number</td>
				  <td><input type="text" id="txtTab_empCode" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_empCode');" onMouseOut="txtbox_color_onmouseout('txtTab_empCode');"/></td>
			   </tr>
			    <tr>
			      <td>IFCI Code</td>
				  <td><input type="text" id="txtTab_desig" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_desig');" onMouseOut="txtbox_color_onmouseout('txtTab_desig');"/></td>
			   </tr>
			   <tr>
			      	<td colspan="2" align="right"><div id="btn_submitVer" class="smallbtn" style="width:60px; float:right;">Submit</div></td>
				  </tr>
			   <tr>
			      <td>Verification Code</td>
				  <td><input type="text" id="txtTab_regional" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_regional');" onMouseOut="txtbox_color_onmouseout('txtTab_regional');"/></td>
			   </tr>
			    <tr>
			      	<td colspan="2" align="right"><div id="btn_submitVer" class="smallbtn" style="width:60px; float:right;">Submit</div></td>
				  </tr>
			 </table>

			</div>

</div>
	  </div>	
	  
	      <div id="SubUsers_Section" <?php if($crt_subUser == true){ ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
	   
	    <div style="width:100%; float:left;">
	      <span style="float:left;"><div class="smallbtn" style="width:200px;">Create Sub-Users</div></span>
	   </div>
	
	    <div style="width:100%; float:left;">	    
	  
	      <table id="tab_accName" class="font-medium">
			     <tr>
				   <td>Employee Code</td>
				  <td><input type="text" id="txtTab_empCode_sub" name="txtTab_empCode_sub" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_desig');" onMouseOut="txtbox_color_onmouseout('txtTab_desig');" value="<?php echo $txtEmpCode ; ?>"/></td>
			     <td align="right" style="margin-left:5px;">Name</td>
				 <td><input type="text" id="txtTab_empName" name="txtTab_empName" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_headQuarter');" onMouseOut="txtbox_color_onmouseout('txtTab_headQuarter');" value="<?php echo $txtEmpName ; ?>"/></td>
			   </tr>
			   <tr>
			      <td>Designation</td>
				  <td><input type="text" id="txtTab_empDesig"  name="txtTab_empDesig" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_empCode');" onMouseOut="txtbox_color_onmouseout('txtTab_empCode');" value="<?php echo $txtEmpDesig ; ?>"/></td>
				     <td align="right" style="margin-left:5px;">Email</td>
				 <td><input type="text" id="txtTab_empEmail"  name="txtTab_empEmail" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_reqName');" onMouseOut="txtbox_color_onmouseout('txtTab_reqName');" value="<?php echo $txtEmpEml ; ?>"/></td>			      
				  <td>
			   </tr>
			   <tr>			
				  <td>Location</td>
				  <td>
				  <input type="text" id="txtTab_empLoc"  name="txtTab_empLoc" class="txtbox_Tab" onMouseOver="txtbox_color_onmouseover('txtTab_empCode');" onMouseOut="txtbox_color_onmouseout('txtTab_empCode');" value="<?php if(isset($_SESSION["Region"])) echo $_SESSION["Region"] ; ?>"/>
				  </td>
				  </tr>
				  <tr><td colspan="4"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td></tr>			
			   </table>
		
	      <table class="font-medium" style="width:60%; float:left;">
			   	 <tr>
				  <td>Mobile No.</td>
				  <td><input type="text" id="txtTab_empMobile" name="txtTab_empMobile" class="txtbox_Tab" style="width:150px;" onMouseOver="txtbox_color_onmouseover('txtTab_regional');" onMouseOut="txtbox_color_onmouseout('txtTab_regional');" readonly="true" value="<?php echo $_SESSION["Phone"]; ?>"/></td>
				  <td colspan="2" align="left">
				   <span><div class="smallbtn" style="width:70px;">Verify</div></span>
				  </td>
			   </tr>
			   <tr>			   
			      <td>Verification Code</td>
				  <td><input type="text" id="txtVerify_Code" name="txtVerify_Code" class="txtbox_Tab" style="width:150px;" onMouseOver="txtbox_color_onmouseover('txtVerify_Code');" onMouseOut="txtbox_color_onmouseout('txtVerify_Code');" value="Enter the verification code" onClick="errase('txtVerify_Code');"/></td>
				  <td colspan="2" align="left"><span style="font-size:12px; color:#FF0000;">*Verification code sent to your registered mobile number, <br/>to confirm the sub-user is being created by a registered user</span></td>
				  </tr>
				  <tr>
				  <td colspan="4">
				   <span onClick="verfiy_code('txtVerify_Code');"><div class="smallbtn" style="width:70px;">Submit</div></span>
				  </td>
				  </tr>
			      <tr>
			     <td colspan="4"><div style="border-top:1px solid #DDD; width:100%; margin-top:5px;"></div></td>
			   </tr>
		 </table>
	
	    </div>
	
        <div style="width:100%; float:left; text-align:center;"><span class="font-medium" style="color:#B22222;">Access Privileges</span></div>
	
	    <div id="div_acc_prev_sec" style="width:100%; float:left; display:none;">
		
		 <table id="tab_access_prev" class="font-medium" style="text-align:left; width:90%;">
		 
		    <tr>
			<th width="100px">
			 <span style="float:left;"><input type="checkbox" id="chk_ld" onClick="show_cells('sp_ld','chk_ld','td_ld1','td_ld2','td_ld3','td_ld4','td_ld5','td_ld6','td_ld7');" /> </span>
			 <span id="sp_ld" style="float:left; cursor:pointer;" onClick="show_cells_sp('sp_ld','chk_ld','td_ld1','td_ld2','td_ld3','td_ld4','td_ld5','td_ld6','td_ld7');">Leads </span>
			 </th>
			 <td id="td_ld7" style="display:none;"><span style="float:left;">
			  <input type="checkbox" id="chk_none_ld" name="chk_none_ld" onClick="checkNone('chk_all_ld','chk_none_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');" />
			  </span><span style="float:left;">None</span></td>
			  <td id="td_ld1" style="display:none;"><span style="float:left;">
			  <input type="checkbox" id="chk_view_ld" name="chk_view_ld" onClick="check_others5('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');" value="Create"/></span><span style="float:left;">View</span></td>
			  <td id="td_ld2" style="display:none;" ><span style="float:left;">
			  <input type="checkbox" id="chk_resp_ld" name="chk_resp_ld" onClick="check_others5('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');"/></span><span style="float:left;">Respond</span></td>
			   <td id="td_ld3" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_appr_ld" name="chk_appr_ld" onClick="check_others5('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');"/></span><span style="float:left;">Approve</span></td>
			   <td id="td_ld4" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_publ_ld" name="chk_publ_ld" disabled="disabled" onClick="check_others5('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');"/></span><span style="float:left; color:#999;">Publish</span></td>
			   <td id="td_ld5" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_wthdr_ld" name="chk_wthdr_ld" disabled="disabled" onClick="check_others5('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');"/></span><span style="float:left; color:#999;">Withdraw</span></td>
			   <td></td>
			   <td id="td_ld6" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_all_ld" onClick="checkAll('chk_none_ld','chk_all_ld','chk_view_ld','chk_resp_ld','chk_appr_ld','chk_publ_ld','chk_wthdr_ld');" />
			   </span><span style="float:left;">All</span></td>
			  
			</tr>
		 
		    <tr>
			<th width="100px">
			 <span style="float:left;"><input type="checkbox" id="chk_pck" name="chk_pck" onClick="show_cells('sp_pck','chk_pck','td_pck1','td_pck2','td_pck3','td_pck4','td_pck5','td_pck6','td_pck7');" /> </span>
			 <span id="sp_pck" style="float:left; cursor:pointer;" onClick="show_cells_sp('sp_pck','chk_pck','td_pck1','td_pck2','td_pck3','td_pck4','td_pck5','td_pck6','td_pck7');">Package Creation</span>
			 </th>
			 <td id="td_pck7" style="display:none;"><span style="float:left;">
			  <input type="checkbox" id="chk_none_pck" name="chk_none_pck" onClick="checkNone('chk_all_pck','chk_none_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');" />
			  </span><span style="float:left;">None</span></td>
			  <td id="td_pck1" style="display:none;"><span style="float:left;">
			  <input type="checkbox" id="chk_cre_pck" name="chk_cre_pck" onClick="check_others5('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');" value="Create"/></span><span style="float:left;">Create</span></td>
			  <td id="td_pck2" style="display:none;" ><span style="float:left;">
			  <input type="checkbox" id="chk_mod_pck" name="chk_mod_pck" onClick="check_others5('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');"/></span><span style="float:left;">Modify</span></td>
			   <td id="td_pck3" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_appr_pck" name="chk_appr_pck" onClick="check_others5('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');"/></span><span style="float:left;">Approve</span></td>
			   <td id="td_pck4" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_publ_pck" name="chk_publ_pck" onClick="check_others5('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');"/></span><span style="float:left;">Publish</span></td>
			   <td id="td_pck5" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_wthdr_pck" name="chk_wthdr_pck" onClick="check_others5('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');"/></span><span style="float:left;">Withdraw</span></td>
			   <td></td>
			   <td id="td_pck6" style="display:none;"><span style="float:left;">
			   <input type="checkbox" id="chk_all_pck" onClick="checkAll('chk_none_pck','chk_all_pck','chk_cre_pck','chk_mod_pck','chk_appr_pck','chk_publ_pck','chk_wthdr_pck');" />
			   </span><span style="float:left;">All</span></td>
			  
			</tr>
			
			<tr>
			 <th>
			 <span style="float:left;">
			 <input type="checkbox" id="chk_sales" onClick="show_cells('sp_sales','chk_sales','td_sale1','td_sale2','td_sale3','td_sale4','td_sale5','td_sale6','td_sale7');" /> </span>
			 <span id="sp_sales" style="float:left; cursor:pointer;" onClick="show_cells_sp('sp_sales','chk_sales','td_sale1','td_sale2','td_sale3','td_sale4','td_sale5','td_sale6','td_sale7');">Dashboard</span>
			 </th>
			 <td id="td_sale7" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_none_sales" name="chk_none_sales" onClick="checkNone('chk_all_sales','chk_none_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');"/></span><span style="float:left;">None</span></td>
			  <td id="td_sale1" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_view_sales" name="chk_view_sales" onClick="check_others5('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');" value="Create"/></span><span style="float:left;">View</span></td>
			  <td id="td_sale2" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_resp_sales" name="chk_resp_sales" disabled="disabled"  onClick="check_others5('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');" /></span><span style="float:left; color:#999;">Respond</span></td>
			<td id="td_sale3" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_appr_sales" name="chk_appr_sales" disabled="disabled"  onClick="check_others5('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');" /></span><span style="float:left; color:#999;">Approve</span></td>
			<td id="td_sale4" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_autho_sales" name="chk_autho_sales" disabled="disabled"  onClick="check_others5('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');" /></span><span style="float:left; color:#999;">Authorize</span></td>
			<td id="td_sale5" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_dwnl_sales" name="chk_dwnl_sales"  onClick="check_others5('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');" /></span><span style="float:left;">Download</span></td>
			<td></td>
		   <td id="td_sale6" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_all_sales" name="chk_all_sales"  onClick="checkAll('chk_none_sales','chk_all_sales','chk_view_sales','chk_resp_sales','chk_appr_sales','chk_autho_sales','chk_dwnl_sales');"  /></span><span style="float:left;">All</span></td>
		
			</tr>
			
		    <tr>
			 <th>
			 <span style="float:left;">
		<input type="checkbox" id="chk_pay" onClick="show_cells('sp_pay','chk_pay','td_pay1','td_pay2','td_pay3','td_pay4','td_pay5','td_pay6','td_pay7','td_pay8');" /></span>
			<span id="sp_pay" style="float:left; cursor:pointer;" onClick="show_cells_sp('sp_pay','chk_pay','td_pay1','td_pay2','td_pay3','td_pay4','td_pay5','td_pay6','td_pay7','td_pay8');">Payment/Reconcilation</span>
		
			 </th>
			  <td id="td_pay8" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_none_pay" name="chk_none_pay" onClick="checkNone('chk_all_pay','chk_none_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');"/></span><span style="float:left;">None</span></td>
			  <td id="td_pay1" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_view_pay" name="chk_view_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" value="Create"/></span><span style="float:left;">View</span></td>
			  <td id="td_pay2" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_resp_pay" name="chk_resp_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">Respond</span></td>
			   <td id="td_pay3" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_appr_pay" name="chk_appr_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">Approve</span></td>
			 <td id="td_pay4" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_autho_pay" name="chk_autho_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">Authorize</span></td>
			   <td id="td_pay5" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_dwnl_pay" name="chk_dwnl_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">Download</span></td>
			   <td id="td_pay6" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_ref_pay" name="chk_ref_pay" onClick="check_others6('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">Refund</span></td>
			   <td id="td_pay7" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_all_pay" name="chk_all_pay" onClick="checkAll('chk_none_pay','chk_all_pay','chk_view_pay','chk_resp_pay','chk_appr_pay','chk_autho_pay','chk_dwnl_pay','chk_ref_pay');" /></span><span style="float:left;">All</span></td>
			 
			</tr>		
			
			<tr>
			 <th><span style="float:left;">
		<input type="checkbox" id="chk_serv" onClick="show_cells('sp_serv','chk_serv','td_serv1','td_serv2','td_serv3','td_serv4','td_serv5','td_serv6','td_serv7');" /> </span>
			 <span id="sp_serv" style="float:left;" onClick="show_cells_sp('sp_serv','chk_serv','td_serv1','td_serv2','td_serv3','td_serv4','td_serv5','td_serv6','td_serv7');">Services</span></th>
			 <td id="td_serv7" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_none_services" name="chk_none_services" onClick="checkNone('chk_all_services','chk_none_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">None</span></td>
			  <td id="td_serv1" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_crt_services" name="chk_crt_services" onClick="check_others5('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');" value="Create"/></span><span style="float:left;">Create</span></td>
			  <td id="td_serv2" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_view_services" name="chk_view_services" onClick="check_others5('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">View</span></td>
			 <td id="td_serv3" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_resp_services"  name="chk_resp_services" onClick="check_others5('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">Respond</span></td>
			   <td id="td_serv4" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_upl_services"  name="chk_upl_services" onClick="check_others5('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">Upload</span></td>
			<td id="td_serv5" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_dwnl_services" name="chk_dwnl_services" onClick="check_others5('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">Download</span></td>
			<td></td>
			   <td id="td_serv6" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_all_services" name="chk_all_services" onClick="checkAll('chk_none_services','chk_all_services','chk_crt_services','chk_view_services','chk_resp_services','chk_upl_services','chk_dwnl_services');"/></span><span style="float:left;">All</span></td>
			  
			</tr>				
			
		  <!--  <tr>
			 <th><span style="float:left;">
		<input type="checkbox" id="chk_cont" onClick="show_cells('sp_cont','chk_cont','td_cont1','td_cont2','td_cont3','td_cont4','td_cont5','td_cont6','td_cont7','td_cont8');" /> </span>
			 <span id="sp_cont" style="float:left;" onClick="show_cells_sp('sp_cont','chk_cont','td_cont1','td_cont2','td_cont3','td_cont4','td_cont5','td_cont6','td_cont7','td_cont8');">Profile</span></th>
			  <td id="td_cont8" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_none_cntMng" name="chk_none_cntMng" onClick="checkNone('chk_all_cntMng','chk_none_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">None</span></td>
			  <td id="td_cont1" style="display:none;"> <span style="float:left;"><input type="checkbox" id="chk_crt_cntMng" name="chk_crt_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');" value="Create"/></span><span style="float:left;">Create Sub-User</span></td>
			 <td id="td_cont2" style="display:none;"> <span style="float:left;"><input type="checkbox" id="chk_author_cntMng" name="chk_author_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">Author</span></td>
			   <td id="td_cont3" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_upld_cntMng" name="chk_upld_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">Upload</span></td>
			 <td id="td_cont4" style="display:none;"> <span style="float:left;"><input type="checkbox" id="chk_review_cntMng" name="chk_review_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">Review</span></td>
			   <td id="td_cont5" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_appr_cntMng" name="chk_appr_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">Approve</span></td>
			   <td id="td_cont6" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_publ_cntMng" name="chk_publ_cntMng" onClick="check_others6('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">Publish</span></td>
			   <td id="td_cont7" style="display:none;"><span style="float:left;"><input type="checkbox" id="chk_all_cntMng" name="chk_all_cntMng" onClick="checkAll('chk_none_cntMng','chk_all_cntMng','chk_crt_cntMng','chk_author_cntMng','chk_upld_cntMng','chk_review_cntMng','chk_appr_cntMng','chk_publ_cntMng');"/></span><span style="float:left;">All</span></td>
			 
			</tr>  -->
			
		 </table>
		 
		 <div style="float:left; width:100%;">
		   <span style="float:left;"><span onClick="clear_All();">
		   <input type="submit" id="btn_sub_acc_prev" name="btn_sub_acc_prev" class="smallbtn" style="width:80px;" /></span></span>
		 </div>		
	  
	</div>	
	 	  
	  </div>  
	  
	  <div id="SubuserEdit_Section" <?php if($crt_subUser == true){ ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
	    
		<div id="div_editSubUser" style="float:left; width:100%;">
		   
		   <table class="font-medium" style="float:left; width:60%; height:350px;" cellpadding="2" cellspacing="0">
		    <tr>
			  <th align="right">Employee ID</th>
			  <td align="left">
			   <select style="width:150px;" onChange="show_SubUser(this.value,'<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"]; ?>');">
			   <?php			
				$sel_subUser = "select emp_code from b2b_profile where reg_by='".$_SESSION["clientID"]."'";
				$res_subUser = mysqli_query($conn,$sel_subUser);
				if($res_subUser)
				{
				while($row = mysqli_fetch_array($res_subUser))
				{
				  echo '<option value="'.$row["emp_code"].'">'.$row["emp_code"].'</option>';
				}
				}
				
			    ?>
			   </select>
			  </td>
			  <th align="right">Employee Name</th>
			  <td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			</tr>
			<tr>
			<th align="right">Designation</th>
			<td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			<th align="right">Company Name</th>
			<td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			</tr>
			<tr>
			  <th align="right">Headquator</th>
			  <td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			  <th align="right">Regional Office</th>
			  <td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			</tr>
			<tr>
			  <th align="right">User ID</th>
			  <td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			  <th align="right">Date Registered</th>
			  <td><input type="text" class="txtbox_Tab" style="width:150px;"  /></td>
			</tr>			
			<tr>
			  <th colspan="2" align="right">Access to Leads
			  <input type="checkbox" /></th>
			  <th colspan="2" align="right">Access to Packages
			   <input type="checkbox" /></th>
			</tr>
			<tr>
			 <th colspan="2" align="right">Access to Dashboard
			  <input type="checkbox" /></th>
			  <th colspan="2" align="right">Access to Services
			   <input type="checkbox" /></th>
			</tr>
			<tr>
			 <th colspan="2" align="right">Access to profile
			  <input type="checkbox" /></th>
			  <th colspan="2" align="right">Access to Payment
			   <input type="checkbox" /></th>
			</tr>
		   </table>
		   
		<div style="float:left; width:100%;">
		   <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:60px; font-size:16px; height:24px;" value="Edit"  /></span>
		    <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:100px; font-size:16px; height:24px;" value="Deactivate" /></span>
			 <span style="float:left; margin-left:10px;"></span>
		   </div>
		</div>
	        
	  </div>
	  
	     <div id="Content_Section" style="float:left; width:100%; display:none;">		 
		 <div style="position:relative; float:left; width:100%; margin-top:5px;">
		   <span class="font-medium">Upload Pictures and Videos</span>
		 <span style="float:left; margin-left:10px;">
		 <input type="text" id="file2" style="position:absolute; width:230px;" class="txtbox_Tab" placeholder="Select an image" accept="image/x-png, image/gif, image/jpeg"/>
<input type="file" id="imgfile2" name="imgfile2" style="opacity:0; z-index:1;" onChange="document.getElementById('file2').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/></span>
		
		 <span style="float:left; margin-left:5px;"><input type="button" class="smallbtn" style="width:50px;" value="submit" /></span>
		 </div>

	</div>	
	
	</div>
	
	

	 </span>
	  	 
	  </div>
	  

	   
	
	  </div>	
	

	</div>
	

	</div>

	
	 <div style="visibility: visible; position: absolute; display: none; z-index: 100000; top:20%; left:35%;" id="TripDates"></div>			
<script>
      	var oDP = new datePicker("TripDates");
</script>
<?php


?>


</body>
</form>
</html>
