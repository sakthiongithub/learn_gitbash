<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Leads</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<script src="Javascript/custPage_Script.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/context.js" language="javascript" type="text/javascript"></script>

</head>

<form id="frm" method="post" enctype="multipart/form-data">
<body>
<?php  include("PHP_Files/PHP_Connection.php"); ?>
<div align="center" id="master_container">

<div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 		<div id="header_rightbtn">
    	<div>
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
<div style="float:left; width:100%; background:url(Images/HomePage_Slides/DSC01834.JPG) top; height:600px;">

<div id="body_container">

<div id="div_wl_dtl" style="float:left; width:60%; height:auto; max-height:400px; overflow-y:scroll; overflow-x:hidden; margin:10%;
 display:none; position:absolute; z-index:100; background:#fbfbfb; border:1px solid #555; border-radius:5px; box-shadow:2px #bbb;">
</div>

<div id="rules_to_reg" style=" width:65%; height:auto; padding:5px; background:#fbfbfb; position:absolute; z-index:1000; margin:8%; margin-top:3%; border:1px solid #888; display:none;">
   <div style="float:left; width:100%;">
   <span style="float:right; margin-right:5px;" onclick="hide_block('rules_to_reg');"><img src="Images/cancelbtn.png" width="20px" height="20px" /></span></div>
   <div style="float:left; width:100%; margin:10px;">
  <span  class="headingSmallFont" style="float:left; text-align:left; font-size:20px;">
  We partner in your growth by providing you the qualified leads for Free.<br/>
These leads are:.<br/>
<ul>
<li>Submitted by the customer after exploring the destination.</li>
<li>Customers documented itinerary and specific requirements details.</li>
<li>Customer commitment by way of their invested time and emotion</li>
</ul>
Higher conversion is assured, as these are high quality leads with customers involvement and commitment.
<ul>
<li>There is no needless to and fro, multiple follow-ups with customers (on phone / email) is required.</li>
<li>We don’t release the lead, unless customer explore a destination and creates his/her own itinerary.
You as expert may suggest additional attraction in your quote.  </li>
</ul>
You can view the lead and quote for a lead on your secure login. You are only charged when there is successful transaction at nominal rate of 4-6% of the package cost. 
<br />Interested? Sign-up for Free
</span>

   </div>
   <div style="float:left; width:100%; margin-left:5px;">
    <span style="float:left; margin-left:20px; border-right:1px solid #999;">
	<button type="button" class="smallbtn" style="width:auto; font-size:15px; height:auto; background:#b22; outline:none;" onclick="open_b2b_reg();">
	Continue to Register</button></span>
	<span class="headingSmallFont" style="float:left; margin-left:5px; font-size:16px; margin-top:5px; cursor:pointer; color:#0066ff;" onclick="hide_block('rules_to_reg');">Cancel</span>
   </div>
</div>

<div style="float:left; width:100%; margin-top:10px; margin-bottom:10px; height:100px; background:#fff; box-shadow:5px #ccc; border-radius:5px;">
  <div style="float:left; width:100%; margin-top:5px;">
    <div style="float:left; width:100%; margin:5px;">
	<?php
	$dest = array();
	  $q_dest = "select  distinct(loc_name) as loc_name from cust_trip_trvler ";
	  $res_dest = mysqli_query($conn,$q_dest);
	  if($res_dest)
	  {
	   echo '<span style="float:left; width:10%; padding:5px; border-right:1px solid #ddd; font-size:14px; font-family:calibri;">ACTIVE<BR/>LEADS</span>';
	   while($row = mysqli_fetch_array($res_dest))
	   {
	    $loc = explode(",",$row["loc_name"]);
	    $dest[] = $loc[0];
		}
		for($i=0; $i<count($dest); $i++)
		{
		$cnt_dest = "select distinct(loc_name) from cust_trip_trvler where loc_name like '".$dest[$i]."%' ";
		$res_cnt = mysqli_query($conn,$cnt_dest);
		$cnt_row = mysqli_num_rows($res_cnt);
		if($cnt_row>0)
		 {
		 while($r = mysqli_fetch_array($res_cnt))
		 {
		   $locs = $dest[$i];
		   $count = $cnt_row;

		  } 		   
		 }
	     		   
		   echo '<span style="float:left; width:10%; padding:5px; border-right:1px solid #ddd;">
		  <div style="float:left; width:100%; font-size:14px; font-family:calibri; cursor:pointer" >
		  <span id="sp_loc_'.$locs.'" onClick="show_leads(this.innerHTML); chngSP_color(this.id);">'.$locs.'<span>('.$count.')</div>
		 </span>';
	   }
	   
	  }
	?>
	</div>
	<div style="float:left; width:100%;  margin-left:20px; margin-top:10px;">
	 <span style="font-size:15px; font-family:Calibri; float:left;">View leads by destination </span>
	 <span style="float:left; margin-left:5px;">
	 <select style="width:120px; font-size:14px; height:22px;" onchange="show_leads(this.value);">
	 <?php
	  $q_dest = "select  distinct(loc_name) as loc_name from cust_trip_trvler ";
	  $res_dest = mysqli_query($conn,$q_dest);
	  if($res_dest)
	  {
	   while($row = mysqli_fetch_array($res_dest))
	   {
	     $loc = explode(",",$row["loc_name"]);
	     echo '<option value="'.$loc[0].'">'.$loc[0].'</option>';
	   }
	   }
	   ?>
	   </select>
	  </span>
	</div>
  </div>
</div>

<div id="view_quotes" class="popUp_imgs_leads" style="width:230px; height:auto; padding:20px; overflow:hidden;"></div>

<div style="float:left; width:100%; margin-top:10px; margin-bottom:10px; height:400px; background:#fff; box-shadow:5px #ccc; border-radius:5px;">
    <div style="margin:5px; width:100%; float:left;">
	  <table width="99%" class="font-medium_indx" cellpadding="2px" cellspacing="0" style="table-layout:fixed; font-size:12px; font-weight:500; background:#CCCCCC; font-family:Helvetica;">
	     <tr>
		   <th width="60px" align="left">Lead ID</th>
		   <th width="80px" align="left">Start At</th>
		   <th width="100px" align="left">Destination</th>
		   <th width="50px" align="left">Duration</th>
		   <th width="55px" align="left">Itinerary</th>
		   <th width="70px" align="left">Trip Dates</th>
		   <th width="50px" align="left">Travellers</th>
		   <th width="180px" align="left">Requirements</th>
		   <th width="80px" align="left">Customer Name</th>
		   <th width="60px" align="left">Lead verified?</th>
		   <th width="100px" align="left">Quotes</th>
		 </tr>
	  </table>
	</div>
	<div id="div_leads" style="float:left; width:100%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-top:10px;">
	  <table width="99%" class="font-medium_indx" cellpadding="2px" cellspacing="0" style="table-layout:fixed; font-size:12px; font-weight:500; word-wrap:break-word;"> 
	   <?php 
	  
	   $q_qts = "select distinct(lead_id) as lead_id, curr_city, loc_name, duration, trip_dates, wl_id, trvlr_adults, trvlr_kids_0_2, trvlr_kids_2_12, trvlr_kids_12, user_name from cust_trip_trvler order by lead_date desc  ";
	   $res_qts = mysqli_query($conn,$q_qts);
	    $count = 0 ;
		 $req_htl="";
		 $req_trv="";
		 $req_trvl="";
		$clr = false;
		if($res_qts)
		{
		while($row = mysqli_fetch_array($res_qts))
		{
 
		   if($row["trvlr_adults"]!="")
		      $trvler = "Adults-".$row["trvlr_adults"]."<br/>";
		   if($row["trvlr_kids_0_2"]!="0")
		      $trvler .= ",Kids 0-2Yrs-".$row["trvlr_kids_0_2"]."<br/>";	
		   if($row["trvlr_kids_2_12"]!="0")
		      $trvler .= ",Kids 2-12Yrs-".$row["trvlr_kids_2_12"]."<br/>";	
		if($row["trvlr_kids_12"]!="0")
		      $trvler .= ",Kids 12+Yrs-".$row["trvlr_kids_12"]."<br/>";		 
			  
		$q_htl = "select htl_opt, htl_loc, DATE_FORMAT(htl_chk_in, '%d-%m-%Y') as htl_chk_in, DATE_FORMAT(htl_chk_out, '%d-%m-%Y') as htl_chk_out, htl_dur, htl_star_rate, htl_occp, htl_num_rooms, htl_extra_bed, htl_food, htl_apprx_bgt from cust_trip_htl where wl_id = '".$row["wl_id"]."' ";
		$res_htl = mysqli_query($conn,$q_htl);
		
		if($res_htl)
		{
		while($rH = mysqli_fetch_array($res_htl))
		{
		  $req_htl = " Need ".$rH["htl_num_rooms"]." room , ".$rH["htl_star_rate"]." star hotel in ".$rH["htl_loc"]." for dates ".$rH["htl_chk_in"]." to ".$rH["htl_chk_out"]." within a budget of ".$rH["htl_apprx_bgt"]." ";
		}
		}
		
	     $q_trv = "select trv_opt, trv_from, trv_to, DATE_FORMAT(trv_date,'%d-%m-%Y') as trv_date, trv_mode from cust_trip_trv where wl_id='".$row['wl_id']."'";
				$res_trv = mysqli_query($conn,$q_trv);
				if($res_trv)
				{
				  while($rT = mysqli_fetch_array($res_trv))
				  {
				    $req_trv = "".$rT["trv_from"]." to ".$rT["trv_to"]." ".$rT["trv_mode"]." on ".$rT["trv_date"]." ";
				  }
				  }
				  
		$q_trvl = "select ltrv_loc, ltrv_mode, ltrv_num_pasn, DATE_FORMAT(ltrv_date, '%D-%M-%y') as ltrv_date, req_loc, req_type from cust_trip_trv where wl_id='".$row['wl_id']."'";
				$res_trvl = mysqli_query($conn,$q_trvl);
				if($res_trvl)
				{
				  while($rTl = mysqli_fetch_array($res_trvl))
				  {		  
	               $req_trvl = "".$rTl["ltrv_num_pasn"]." passenger ".$rTl["ltrv_mode"]." in ".$rTl["ltrv_loc"]." on ".$rTl["ltrv_date"]."";
				   }
				   }
				   
				   $q_cnt_qts = "select distinct(quote_id) from quote_dtls where lead_id='".$row["lead_id"]."'";
				   $res_cnt_qts = mysqli_query($conn,$q_cnt_qts);
				   if($res_cnt_qts)
				   {
				   $cnt_qts = mysqli_num_rows($res_cnt_qts);
				   }
		
		 echo '<tr style="margin-top:40px;">
		   <td style="width:60px" align="left">'.$row["lead_id"].'</td>
		   <td width="80px" align="left">'.$row["curr_city"].'</td>
		   <td width="100px" align="left">'.$row["loc_name"].'</td>
		   <td width="50px" align="left">'.$row["duration"].'</td>
		   <td width="55px" align="left"><span style="color:#0066ff; text-decoration:underline; cursor:pointer" onClick="show_block(\'div_wl_dtl\'); showWLL(\''.$row["wl_id"].'\');">View</span></td>
		   <td width="70px" align="left">'.$row["trip_dates"].'</td>
		   <td width="50px" align="left">'.$trvler.'</td>
		   <td width="180px" align="left"><b>Hotel :</b>'. $req_htl.'<br/>
		   <hr style="width:100%; border:1px solid #ddd;" /> <b>Travel :</b>'.$req_trv.'<br/>
		   <hr style="width:100%; border:1px solid #ddd;" /> <b>Local Travel :</b>'.$req_trvl.'</td>
		   <td width="80px" align="left">'.$row["user_name"].'</td>
		   <td width="60px" align="left">Yes</td>
		   <td width="80px" align="left"><div style="float:left; width:100%;">'.$cnt_qts.'<span style="color:#0066ff; cursor:pointer; text-decoration:underline; margin-left:5px;" onmouseover="ShowContent(\'view_quotes\'); showLds(\''.$row["lead_id"].'\');" onmouseout="HideContent(\'view_quotes\');">View</span> </div>
		   <div style="float:left; width:100%;"><button type="button" class="smallbtn" style="width:70px; background:#009900; outline:none;" onClick="show_block(\'rules_to_reg\');">Respond</button></div>
		   </td>
		 </tr>';
		 echo '<tr><td colspan="11"><hr style="border:1px solid #ddd; width:100%;" /></td></tr>';

		 }
		 }
		 ?>
	  </table> 
	</div>
</div>
</div>
</div>


</body>
</form>
</html>
