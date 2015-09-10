<!DOCTYPE> <!--html PUBLIC "-//W3C//Dspan XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dspan/xhtml1-transitional.dspan"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Buy Now</title>
<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css">

<script type="text/javascript" language="javascript" src="Javascript/screenResolution_Script.js"></script>
<script type="text/javascript" language="javascript" src="Javascript/BuyNowScript.js"></script>
<script type="text/javascript" language="javascript" src="Javascript/datepicker.js"></script>

</head>
<form method="post" enctype="multipart/form-data">
<body onLoad="show_block('trip_dates'); show_block('div_greyBack');">
<?php include("PHP_Files/PHP_Connection.php");
include("PHP_Files/buyNow_php.php");

if(isset($_GET['LID']))
{
  $q_clnt = "select client_id, user_id from cust_trip_trvler where lead_id='".$_GET['LID']."'";
  $res_clnt = mysqli_query($conn,$q_clnt);
  if($res_clnt)
  {
    while($row = mysqli_fetch_array($res_clnt))
	{
	  $_SESSION["userEmail"] = $row["user_id"];
	  $_SESSION["QUserID"] = $row["client_id"];
	}
  }
}

 ?>
 
<?php 
if(isset($_GET['pckID']))
{
if($_GET['pck_type'] == "Package")
{
$sel_dts = "select trip_dates from b2b_pck_crt where pck_id='".$_GET['pckID']."'";
$res_dts = mysqli_query($conn,$sel_dts);
if($res_dts)
{
while($row = mysqli_fetch_array($res_dts))
{

}
}
}
}


?> 
 
 
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
			  			
			   <a href="#"><span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span></a>
			   
			   <a href="#"><span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span></a>
       </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
		</div> 
		
		 <div style="width:100%; float:left; position:relative;">
		 	<span style="width:auto; float:left;">
				 <a href="#" onClick="show_block('left_inputs');" onMouseOver="ShowContent('contextBuild'); hide_block('left_inputs');" onDblClick="hide_block('left_inputs');" onMouseOut=" HideContent('contextBuild');"> 
				  <div class="tripHeaderbtn" id="div_BuildTrip" style="width:180px; background:#002929; color:#FFFFFF;" onClick="div_green('div_BuildTrip');" onMouseOver="div_green('div_BuildTrip');" onMouseOut="div_white('div_BuildTrip');">Buy Package
				</div> </a></span>
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
height:600px;
background: grey;
opacity:0.8;
display:none;
position:absolute;
z-index:100;
margin:0% 0% 0% 0%;">
</div>

<div id="body_container">

<div id="trip_dates"  class="popUp_dest" style="width:300px; height:150px;">
 
	<div style="width:100%; position:relative; margin:10px 2px 0px 2px; "> 
<span style="font-size:22px; color:DarkSlateGray;">
Select your departure Date</span></span>
</div>

<div id="div_trvDate" style="width:100%; text-align:center; position:relative; margin-top:20px; margin-left:40px;">
<?php
if(isset($_GET['pckID']))
{
 if($_GET['pck_type'] == "Package")
{
echo '<span style="float:left; margin-left:40px;">';
echo '<select id="txtDeptDate" name="txtDeptDate" style="width:115px;">';
$sel_dts = "select trip_dates from b2b_pck_crt where pck_id='".$_GET['pckID']."'";
$res_dts = mysqli_query($conn,$sel_dts);
if($res_dts)
{
while($row = mysqli_fetch_array($res_dts))
{
$dt = explode(", ",$row["trip_dates"]);
}
}
for($i=0; $i<=count($dt); $i++)
{
$dt2 = date_create(date('Y-m-d', strtotime($dt[$i])));
$dt1 = date_create(date('Y-m-d'));
$ddiff=date_diff($dt1,$dt2);
if($ddiff->format('%R%a')>0)
{
echo $ddiff->format('%R%a');
echo '<option value="'.$dt[$i].'">'.$dt[$i].'</option>';
}
}
echo '</select></span>';
}
else
{
 echo '<span class="div_elements" style="font-size:18px; ">
<input type="text" id="txtDeptDate" name="txtDeptDate" class="txtbox_Tab" style="width:115px; height:24px;" onClick="oDP.show(event,this.id,2); show_block(\'pickDate\');"/></span>';
}
}
?>
<span style="float:left; margin-left:5px;">
 <input type="button" class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:60px; height:22px; float:none;" value="Submit" onClick="hide_block('trip_dates'); hide_block('div_greyBack');" /> </span>
			  </div>
<div style="visibility: visible; position: absolute; left: 0x; top: 80px; display: none; z-index: 100000;" id="pickDate"></div>			
<script>
	       	var oDP = new datePicker("pickDate");
	      </script>
</div>

    <div id="div_body" style="width:100%;">	

	<span style="float:left; width:60%;">
	
	  <div style="height:490px; width:100%; position:relative; border:1px solid grey; background:#FBFBFF;">
	  <div style="width:100%; margin-left:6px;">
	  <span style="color:#B22222; font-size:20px; font-weight:600; text-shadow:1px 1px 1px white; font-family:Calibri;">You are about purchase your vacation package…follow these steps
</span></div>
		<div style="margin-top:10px;">
           <span style="width:32%; float:left; margin-left:3px;"><div id="block1" style="background:url(Images/Arrows/buy_btn1_onfocus.png) no-repeat; width:100%; height:40px;"></div></span>
		   <span style="width:32%;  float:left;  margin-left:3px;"><div id="block2" style="background:url(Images/Arrows/buy_btn2.png) no-repeat;width:100%; height:40px;"></div></span>
		   <span style="width:32%;  float:left;  margin-left:3px;"><div id="block3" style="background:url(Images/Arrows/buy_btn3.png) no-repeat;width:100%; height:40px;"></div></span>
		</div>
	  
<div style="width:100%;">
  <div id="div_elements" style="margin-left:10px;">
 <span style="color:#B22222; font-size:18px; font-weight:600; font-family:Calibri; margin-top:15px;">Let's begin... </span></div>

<div class="div_elements_buynow" style="margin-top:10px;">
<span style="float:left; margin-left:100px;">
<span onClick="check_displ('btn_unregist','btn_regist','div_Unregistered','div_Registered','div_userInfo');">
<div id="btn_unregist"  class="smallbtn" style="width:110px; color:#FFFFFF; background:#B22222; height:45px; font-size:18px;" onClick=" change_img_block1('block1','block2','block3'); hide_block('div_pay');"/>I'm a visitor here </div></span></</span>
<span style="float:left; margin-left:50px;">
<span onClick="check_displ('btn_regist','btn_unregist','div_Registered','div_Unregistered','div_userInfo');">
<div id="btn_regist" class="smallbtn" style="width:110px; color:#FFFFFF; background:#B22222; height:45px; font-size:18px;" onClick=" change_img_block2('block2','block1','block3');  hide_block('div_pay'); hide_block('div_Unregistered');">I've already registered</div></span></span>
</div>

<div id="div_Registered" style="display:none; margin-left:260px; margin-top:65px;">
<div class="div_elements_buynow" >
<span class="div_buyNow_lftTab" style="font-size:16px; color:#0066FF;">Enter your Login Id and Password</span>
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtEmail" type="text" value="Enter your Email Id" onClick="errase('txtEmail');"/></span>
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtMobile" type="text" value="Enter your Password" onClick="errase('txtMobile');"/></span>
</div>
<div class="div_elements_buynow" align="center">
<span class="div_buyNow_lftTab">
<a href="#" onClick="show_block('div_userInfo'); hide_block('div_Registered'); hide_block('div_chkRegister'); disable_block1();">
<span class="smallbtn" style="width:60px; background:#002929; color:#FFFFFF; float:none;">Login</span></a></span>
</div>
</div>

<div id="div_userInfo" class="div_elements_buynow" align="left" style="margin-top:30px; display:none;">
  <div style="width:100%; font-size:20px;">
    <div class="div_elements_buynow">
	  <span>Name</span>
	  <span>:</span>
	  <span><span id="span_RegName">abc</span></span>
	</div>
	<div class="div_elements_buynow">
	  <span>Email</span>
	  <span>:</span>
	  <span><span id="span_RegMailId">abc@qcn.com</span></span>
	</div>
	 <div class="div_elements_buynow">
	  <span>Mobile</span>
	  <span>:</span>
	  <span><span id="span_RegNum">9874563210</span></span>
	</div>
	 <div class="div_elements_buynow">
	  <span>Address</span>
	  <span>:</span>
	  <span><span id="span_RegAddr">No.58, 2nd Main, 1st Block,  Abhilasha, Koramangala, Bangalore, Karnataka-560034</span>
</span>
	</div>
		 <div id="div_chkRegister" class="div_elements_buynow" style="display:none; margin-top:10px;">
	  <span><input type="checkbox" checked="checked"/></span>
	  <span><span id="span_createAccount" style="font-size:13px; color:#0066FF;">Use my email id provided to create my registration</span></span>
	</div>
  </div>
 <div class="div_elements_buynow" align="center" style="margin-top:10px;">
<span class="div_buyNow_lftTab">
<span class="smallbtn" style="width:200px; height:22px; background:#002929; color:#FFFFFF; float:left; margin-left:20px; font-size:18px; cursor:pointer;" onClick="show_block('div_Unregistered'); hide_block('div_userInfo'); change_block_img1();">Modify</span></a>
<span class="smallbtn" style="width:200px; height:22px; background:#002929; color:#FFFFFF; float:left; margin-left:20px; font-size:18px; cursor:pointer;" onClick="show_block('div_pay'); hide_block('div_userInfo');">Make Payment</span></a>

</span>
</div>
 </div>

<div id="div_Unregistered" style="display:none; margin-top:65px; margin-left:25px;">
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtEmailId" name="txtEmailId" type="text" placeholder="Enter your Email Id" value="<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>" /></span>
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtMobileNo" name="txtMobileNo" type="text" placeholder="Enter your Mobile Number" /></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtfName" name="txtfName" type="text" placeholder="Your First Name" /></span>
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtlName" name="txtlName" type="text" placeholder="Your Last Name" /></span>
</div>
<div class="div_elements_buynow" style="margin-top:10px;">
<span class="div_buyNow_lftTab" style="font-size:14px; color:#B22222;">Enter your Address</span>
</div>
<div class="div_elements_buynow" style="margin-top:2px;">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtAreaPin" name="txtAreaPin" type="text" placeholder="Your AREA PINCODE"  style="width:200px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow"  id="txtBuildNum" name="txtBuildNum" type="text" placeholder="Building/Unit No."  style="width:200px;"/></span>
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtBuildName" name="txtBuildName" type="text" placeholder="Building/Unit Name"  style="width:200px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtStreet" name="txtStreet" type="text" placeholder="STREET NAME"  style="width:300px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtLandmark" name="txtLandmark" type="text" placeholder="LANDMARK"  style="width:300px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtArea" name="txtArea" type="text" placeholder="LOCALITY/ AREA" style="width:300px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtCity" name="txtCity" type="text" placeholder="CITY"  style="width:300px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtState" name="txtState" type="text" placeholder="STATE" style="width:300px;"/></span>
</div>
<div class="div_elements_buynow">
<span class="div_buyNow_lftTab"><input class="txtbox_buynow" id="txtCountry" name="txtCountry" type="text" placeholder="COUNTRY"  style="width:300px;"/></span>
</div>
<div class="div_elements_buynow" align="center">
<span class="div_buyNow_lftTab">
<a href="#" onClick="show_block('div_userInfo'); hide_block('div_Unregistered'); show_block('div_chkRegister'); change_block_img2(); ">
<span class="smallbtn" style="width:60px; background:#002929; color:#FFFFFF; float:none;" onClick=" display_registry();">Submit</span></a></span>
</div>
</div>

<div id="div_pay" style="width:100%; float:left; display:none; margin-top:10px;">
<span style="float:left; width:30%;">
  <div class="cards" ><span style="padding:15px; float:left;">Credit Card</span></div>
  <div class="cards"><span style="float:left; padding:15px;">Debit Card</span></div>
  <div class="cards"><span style=" float:left; padding:15px;">Online Payment</span></div>
</span>
<span style="float:left; width:57%;">
  <table width="100%" class="font-medium_indx" style="font-size:14px;">
     <tr>
	  <td> Card Number</td>
	  <td><input type="text" class="txtbox_Tab" style="width:100%; height:30px;" /></td>
     </tr>
	 <tr>
	  <td>Expiry Date</td>
	  <td><select style="width:40px;">
	    <option>Date</option>
	  </select>
	  <select style="width:60px">
	   <option>Year</option>
	  </select>
	  </td>
     </tr>
	 <tr>
	   <td>CVV</td>
	   <td><input type="text" class="txtbox_nums" /></td>
	 </tr>
	 <tr><td colspan="2" align="center"><input type="submit" id="btnPay" name="btnPay" value="Pay" class="smallbtn" style="width:60px; float:none;" /></td></tr>
  </table>
  </span>
</div>

	  </div>
	  </div>
	
	</span>
	<span style="float:left; width:38%; margin-left:5px;">
	   <div style="height:465px; padding:10px; width:100%; position:relative;  margin-left:2px; margin-top:3px; border:1px solid #555; border-top-right-radius:30px;">
	     <div class="smallbtn" style="width:200px; height:30px; font-size:18px;">Your Order Summary</div>
	      
		    <div <?php if(isset($_GET['QID'])) {?> style="width:100%; height:100%; display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
			
			 <table width="100%" class="font-medium_indx" style="color:#b22;" cellspacing="0" cellpadding="2">
			 
			  <?php
			    
			  $q_pck = "select lead_id, client_id, quote_id, locations from quote_dtls where quote_id='".$_GET["QID"]."'";
			  $res_pck = mysqli_query($conn,$q_pck);
			  
			   $q_htl = "select lead_id from quote_hotel where quote_id='".$_GET["QID"]."' limit 1";
			  $res_htl = mysqli_query($conn,$q_htl);
			  $res_num_htl = mysqli_num_rows($res_htl);
			  
			  $q_trv = "select lead_id from quote_trpt where quote_id='".$_GET["QID"]."' limit 1";
			  $res_trv = mysqli_query($conn,$q_trv);
			  $res_num_trv = mysqli_num_rows($res_trv);
			
			 $q_trvl = "select lead_id from quote_lcl_trvl where quote_id='".$_GET["QID"]."' limit 1";
			  $res_trvl = mysqli_query($conn,$q_trvl);
			  $res_num_trvl = mysqli_num_rows($res_trvl);		  
			  	
				$q_othr = "select Othrs_speci, loc_name , totl_opt1, totl_opt2 from quote_othrs where quote_id='".$_GET["QID"]."'";
			  $res_othr = mysqli_query($conn,$q_othr);			 
			   $res_num_othr = mysqli_num_rows($res_othr);
			   
			   $q_othr_totl = "select Othrs_speci, loc_name , totl_opt1, totl_opt2 from quote_othrs where quote_id='".$_GET["QID"]."' limit 1";
			   $res_othr_totl = mysqli_query($conn,$q_othr_totl);
			  
			  if($res_pck)
			  {
			  while($row = mysqli_fetch_array($res_pck))
			  {
			    $q_clnt = "select company_name from b2b_profile where client_id='".$row["client_id"]."'";
				$res_clnt = mysqli_query($conn,$q_clnt);
				
				while($r = mysqli_fetch_array($res_clnt))
				{
			  $wlID = "W".substr($row["lead_id"],1,7);
			  $_SESSION["LID"] = $row["lead_id"];
			  $_SESSION["QpostedBy"] = $row["client_id"];
		     
			   echo '<tr>
				 <th align="right">Wishlist ID</th>
				 <td align="left">:</td>
				 <td align="left">'.$wlID.'</td>
				</tr>
				<tr>
				 <th align="right">Lead ID</th>
				 <td align="left">:</td>
				 <td>'.$row["lead_id"].'</td>
				</tr>
				<tr>
				 <th align="right">Quote By</th>
				 <td align="left">:</td>
				 <td>'.$r["company_name"].'</td>
				</tr>
				<tr>
				 <th align="right">Locations Covered</th>
				 <td align="left">:</td>
				 <td>'.$row["locations"].'</td>
				</tr>
				<tr style="background:#b22; color:#fff;">
				 <th colspan="2">Inclusions</th> <td align="left">:</td></tr>';				   
			  if($res_num_htl>0)
			     echo '<tr><td align="right"><img src="Images/done.png" width="30px" height="20px" /></td><td align="left"></td><td>Accomodation</td></tr>';
			  if($res_num_trv>0)
			     echo '<tr><td align="right"><img src="Images/done.png" width="30px" height="20px" /></td><td align="left"></td><td>P2P Transportation</td></tr>';	
			 if($res_num_trvl>0)
			     echo '<tr><td align="right"><img src="Images/done.png" width="30px" height="20px" /></td><td align="left"></td><td>Local Transportation</td></tr>';		  
		 
			  if($res_num_othr>0)
			  {			
			    while($rOth = mysqli_fetch_array($res_othr))
				{
				  echo '<tr>
				  <td align="right"><img src="Images/done.png" width="30px" height="20px" /></td>
				  <td align="left"></td>
				  <td>'.$rOth["Othrs_speci"].' - '.$rOth["loc_name"].'</td>
				  </tr>';
				}
				}
				
				echo '<tr style="background:#b22; color:#fff;">
				 <th colspan="2">Exclusions</th><td align="left">:</td></tr>';
				  if($res_num_htl<1)
			     echo '<tr><td align="right"><img src="Images/cross.png" width="30px" height="20px" /></td><td align="left"></td><td> ACCOMODATION</td></tr>';
				 if($res_num_trv<1)
			     echo '<tr><td align="right"><img src="Images/cross.png" width="30px" height="20px" /></td><td align="left"></td><td>P2P TRANPORT</td></tr>';	
			 if($res_num_trvl<1)
			     echo '<tr><td align="right"><img src="Images/cross.png" width="30px" height="20px" /></td><td align="left"></td><td>LOCAL TRANSPORT</td></tr>';	
			  
			   echo '<tr><td colspan="3"><hr style="width:100%; float:left; border:1px solid #444;"/></td></tr>';
			 		
			    while($rOth = mysqli_fetch_array($res_othr_totl))
				{
				  echo '<tr>
				  <td align="right">Total</td>
				  <td align="left">:</td>
				  <td>'.$rOth["totl_opt1"].'</td>
				  </tr>';
				   $_SESSION["Qamount"] = $rOth["totl_opt1"];
				}
				
			  }
			  }
			  }
			  ?>
			  </table>
			  
		  </div>
		  
		    <div <?php if(isset($_GET['pckID'])) { ?> style="display:block; width:100%; float:left;" <?php } else {?> style="display:none;" <?php } ?>>
			
			<table width="100%" class="font-medium_indx" style="color:#b22;" cellspacing="0" cellpadding="2">
			 
			  <?php			     
				 $q_pck_id = "select pck_id, pck_name, duration, client_id, incls, excls, pck_cost, prc_service, prc_edu, price from b2b_pck_crt where pck_ID='".$_GET['pckID']."'";
				 $res_pck_id = mysqli_query($conn,$q_pck_id);
				 $_SESSION["pckID"] = $_GET['pckID'];
				 if($res_pck_id)
				 {
				   while($row = mysqli_fetch_array($res_pck_id))
				   {
				   
				   $cmp = "select company_name from b2b_profile where client_id='".$row["client_id"]."'";
				   $res_cmp = mysqli_query($conn,$cmp);
				   while($r = mysqli_fetch_array($res_cmp))
				   {
				   
				   $_SESSION["PckpostedBy"] = $row["client_id"];
				   $_SESSION["Pckamount"] = $row["price"];
				   echo '<tr>
				 <th align="right">Package Name</th>
				 <td align="left">:</td>
				 <td align="left">'.$row["pck_name"].'</td>
				</tr>
				<tr>
				 <th align="right">Package ID</th>
				 <td align="left">:</td>
				 <td>'.$row["pck_id"].'</td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
				 <th align="right">Trip Duration</th>
				 <td align="left">:</td>
				 <td>'.$row["duration"].'</td>
				</tr>
				<tr>
				 <th align="right">Package By</th>
				 <td align="left">:</td>
				 <td>'.$r["company_name"].'</td>
				</tr>
				<tr style="background:#b22; color:#fff;">
				 <th colspan="2">Inclusions</th> <td align="left">:</td></tr>';				   
			    $inc = explode(",",$row["incls"]);
				for($i=0; $i<count($inc)-1; $i++)
			     echo '<tr><td align="right"><img src="Images/done.png" width="30px" height="20px" /></td><td align="left"></td><td>'.$inc[$i].'</td></tr>';	
				
				echo '<tr style="background:#b22; color:#fff;">
				 <th colspan="2">Exclusions</th><td align="left">:</td></tr>';
				   $exc = explode(",",$row["excls"]);
				for($i=0; $i<count($exc)-1; $i++)
			     echo '<tr><td align="right"><img src="Images/cross.png" width="30px" height="20px" /></td><td align="left"></td><td>'.$exc[$i].'</td></tr>';
				 echo '<tr><td  colspan="3"><hr style="border:1px solid #444;" /></td></tr>';
				 echo '<tr>';
				 echo '<th>Package Cost</th>';
				 echo  '<td>:</td>';
				 echo '<td>'.$row["pck_cost"].'</td>';
				 echo '</tr>';
				 echo '<th>Service Cost</th>';
				 echo  '<td>:</td>';
				 echo '<td>'.$row["prc_service"].'</td>';
				 echo '</tr>';
				 echo '<th>Other cess</th>';
				 echo  '<td>:</td>';
				 echo '<td>'.$row["prc_edu"].'</td>';
				 echo '</tr>';
				  echo '<tr><td  colspan="3"><hr style="border:1px solid #444;" /></td></tr>';
				 echo '<th>Total Cost</th>';
				 echo  '<td>:</td>';
				 echo '<td>'.$row["price"].'</td>';
				 echo '</tr>';
			
				   }
				   }
				 }
			   
			  ?>
			  </table>
			
			</div>
		     
	   </div>
	</span>
</div>
</div>
<?php

if(isset($_POST['btnPay']))
{
$deptDt = date('Y-m-d', strtotime($_POST['txtDeptDate']));

if(isset($_GET["pckID"]))
{
$name = $_POST["txtfName"].$_POST["txtlName"];

$sel_clnt ="select client_id from client_register where client_email='".$_POST["txtEmailId"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 $cnt_row = mysqli_num_rows($res_clnt);
	 
if($cnt_row > 0)
{

$_SESSION["userEmail"] = $_POST["txtEmailId"];		 
$_SESSION["PckUserID"] = $row["client_id"];

$q_buy_pay = "insert into buy_pck values('','".$_GET["pck_type"]."','".$_SESSION["pckID"]."','".$_SESSION["PckpostedBy"]."','','','".$_SESSION["PckUserID"]."','".$_POST["txtEmailId"]."','".date('Ymd')."','".$deptDt."','".$name."','".$_POST["txtMobileNo"]."','".$_POST["txtAreaPin"]."','".$_POST["txtBuildNum"]."','".$_POST["txtBuildName"]."','".$_POST["txtStreet"]."','".$_POST["txtLandmark"]."','".$_POST["txtArea"]."','".$_POST["txtCity"]."','".$_POST["txtState"]."','".$_POST["txtCountry"]."','".$_SESSION["Pckamount"]."')";
$res_buy = mysqli_query($conn,$q_buy_pay);

if($res_buy)
{
$q_updt_p = "update buy_pck set book_id=concat('B',slno,'".substr($_SESSION["pckID"],1,-6)."','".date('mdy')."'), trxn_id=concat('TP',slno,'".substr($_SESSION["pckID"],1,-6)."','".date('mdy')."') where pck_id='".$_SESSION["pckID"]."' and email_id='".$_SESSION["userEmail"]."'";
$res_updt_p = mysqli_query($conn,$q_updt_p);
}

$sel_trxnID ="select book_id, trxn_id , pck_id from buy_pck where date_of_purchase='".date('Ymd')."' and email_id='".$_SESSION["userEmail"]."' and pck_id='".$_SESSION["pckID"]."'";
$res_trxnID = mysqli_query($conn,$sel_trxnID);
while($r = mysqli_fetch_array($res_trxnID))
{
 $book_id = $r["book_id"];
 $trxnID = $r["trxn_id"];
}

if($res_updt_p)
{
 echo '<script type="text/javascript">';
  echo 'alert(\'Congradulations!!!  Your Package-ID: '.$_SESSION["pckID"].', Booking ID: '.$book_id.',  Transaction ID:'. $trxnID.' \');';
  echo '</script>';
}

}

else
{

$q_reg_clnt = "insert into client_register values ('','CUSTOMER','".addslashes($_POST["txtEmailId"])."','','OneTime','','','".date('Y-m-d')."')";
$res_reg_clnt = mysqli_query($conn,$q_reg_clnt);

$sel_clnt_reg ="select client_id from client_register where client_email='".$_POST["txtEmailId"]."'";
		 $res_clnt_reg = mysqli_query($conn,$sel_clnt_reg);
		  while($row = mysqli_fetch_array($res_clnt_reg))
		 {
		$_SESSION["PckUserID"] = $row["client_id"];
			}

$_SESSION["userEmail"] = $_POST["txtEmailId"];		 

$q_buy_pay = "insert into buy_pck values('','".$_GET["pck_type"]."','".$_SESSION["pckID"]."','".$_SESSION["PckpostedBy"]."','','','".$_SESSION["PckUserID"]."','".$_POST["txtEmailId"]."','".date('Ymd')."','".$deptDt."','".$name."','".$_POST["txtMobileNo"]."','".$_POST["txtAreaPin"]."','".$_POST["txtBuildNum"]."','".$_POST["txtBuildName"]."','".$_POST["txtStreet"]."','".$_POST["txtLandmark"]."','".$_POST["txtArea"]."','".$_POST["txtCity"]."','".$_POST["txtState"]."','".$_POST["txtCountry"]."','".$_SESSION["Pckamount"]."')";
$res_buy=mysqli_query($conn,$q_buy_pay);

if($res_buy)
{
$q_updt_p = "update buy_pck set book_id=concat('B',slno,'".substr($_SESSION["pckID"],1,-6)."','".date('mdy')."'), trxn_id=concat('TP',slno,'".substr($_SESSION["pckID"],1,-6)."','".date('mdy')."') where pck_id='".$_SESSION["pckID"]."' and email_id='".$_SESSION["userEmail"]."'";
$res_updt_p = mysqli_query($conn,$q_updt_p);
}


$sel_trxnID ="select book_id, trxn_id , pck_id from buy_pck where date_of_purchase='".date('Y-m-d')."' and email_id='".$_SESSION["userEmail"]."' and pck_id='".$_SESSION["pckID"]."'";
$res_trxnID = mysqli_query($conn,$sel_trxnID);
while($r = mysqli_fetch_array($res_trxnID))
{
 $book_id = $r["book_id"];
 $trxnID = $r["trxn_id"];
}

if($res_updt_p)
{
 echo '<script type="text/javascript">';
  echo 'alert(\'Congradulations!!! <br/>  Your Package-ID: '.$_SESSION["pckID"].' <br/> Booking ID: '.$book_id.' <br/> Transaction ID:'. $trxnID.' \');';
  echo '</script>';
}
}
}

else if(isset($_GET["QID"]))
{
$name = $_POST["txtfName"]." ".$_POST["txtlName"];
$bkID = "B".substr($_GET["QID"],1,-6).date('mdy');
$txID = "TQ".substr($_GET["QID"],1,-6).date('mdy');

$q_buy_q = "insert into buy_pck values('','".$_GET["pck_type"]."','".$_GET["QID"]."','".$_SESSION["QpostedBy"]."','','','".$_SESSION["QUserID"]."','".$_POST["txtEmailId"]."','".date('Ymd')."','".$deptDt."','".$name."','".$_POST["txtMobileNo"]."','".$_POST["txtAreaPin"]."','".$_POST["txtBuildNum"]."','".$_POST["txtBuildName"]."','".$_POST["txtStreet"]."','".$_POST["txtLandmark"]."','".$_POST["txtArea"]."','".$_POST["txtCity"]."','".$_POST["txtState"]."','".$_POST["txtCountry"]."','".$_SESSION["Qamount"]."')";
$res_buy_q = mysqli_query($conn,$q_buy_q);

if($res_buy_q)
{
$q_updt_bkid = "update buy_pck set book_id=concat('B',slno,'".substr($_GET["QID"],1,-6)."','".date('mdy')."'), trxn_id=concat('TQ',slno,'".substr($_GET["QID"],1,-6)."','".date('mdy')."') where pck_id='".$_GET["QID"]."' and email_id='".$_SESSION["userEmail"]."'";
$res_updt_qt = mysqli_query($conn,$q_updt_bkid);
}

$sel_trxnID ="select book_id, trxn_id , pck_id from buy_pck where date_of_purchase='".date('Y-m-d')."' and email_id='".$_SESSION["userEmail"]."' and pck_id='".$_GET["QID"]."'";
$res_trxnID = mysqli_query($conn,$sel_trxnID);
while($r = mysqli_fetch_array($res_trxnID))
{
 $book_id = $r["book_id"];
 $trxnID = $r["trxn_id"];
}

if($res_updt_qt)
{
 echo '<script type="text/javascript">';
  echo 'alert(\'Congradulations!!! <br/>  Your Quote-ID: '.$_GET["QID"].' <br/> Booking ID: '.$book_id.' <br/> Transaction ID:'. $trxnID.' \');';
  echo '</script>';
}

}
}

?>
</body>
</form>
</html>
