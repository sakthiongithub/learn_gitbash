<?php

include("PHP_Connection.php");

date_default_timezone_set("Asia/Calcutta");
$trvAdlt = 0;
$trvKid_0_2 = 0 ;
$trvKid_2_12 = 0;

if(isset($_GET['WLID']) && isset($_GET['LeadID']) && isset($_GET['LDate']) && isset($_GET['UName']) && isset($_GET['ID']))
{
echo '<form method="post" enctype="multipart/form-data">';
 echo '<div style="float:left; width:100%; position:relative;">
  <span style="float:right; cursor:pointer;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block(\'dtls_leads\');hide_block(\'div_resp_pop\');" /></span>
 </div>';
 echo '<div style="float:left; width:100%;">
  
   <table style="font-size:10px; font-family:Calibri;"  width="100%" cellpadding="3" cellspacing="0" border="1px" bordercolor="#aaa">
   <tr style="background:#000033; color:#fff;"><td colspan="6" align="center">REQUIREMENT FORM</td></tr>
   <tr style="background:#000033; color:#fff;">
   <td colspan="2">Lead ID</td>   
   <td colspan="2">Lead Date</td>  
   <td colspan="2">Lead Validity</td>  
   </tr> 
   <tr style="background:#000033; color:#fff;">
   <td colspan="2"><input type="text" id="txtLeadID" name="txtLeadID" value="'.$_GET["LeadID"].'" readonly="true" style="border:none; outline:none; background:transparent; color:#fff; width:auto;font-size:10px;" /></td>';
   
   echo '<input type="text" id="txtWID" name="txtWID" value="'.$_GET["WLID"].'" readonly="true" style="border:none; outline:none; background:transparent; color:#fff; width:auto;font-size:10px; visibility:hidden; height:10px;" />';
  
    echo '<td colspan="2"><input type="text" id="txtLeadDate" name="txtLeadDate" value="'.date('d-m-Y',strtotime($_GET["LDate"])).'" readonly="true" style="border:none; outline:none; background:transparent; color:#fff; width:auto;font-size:10px;" /></td>';
	
	$quoteID  = 'Q'.substr($_GET["WLID"],1,-6).substr($_GET["ID"],7,10).date('mdy').'';
    $ldValid = date('d-m-Y', strtotime($_GET["LDate"].' + 2 days'));
	
   echo '<td colspan="2"><input type="text" id="txtLeadVali" name="txtLeadVali" class="txtbox_Tab"  readonly="true" style="border:none; outline:none; background:transparent;  width:auto; font-size:10px; color:#fff;" value="'.$ldValid.'" /></td>
   </tr>   
   <tr style="background:#000033; color:#fff;"><td colspan="6" align="center">RESPONSE FORM</td></tr>
    <tr style="background:#000033; color:#fff;">
   <td colspan="2">Quote ID</td>  
   <td colspan="2">Quote Date</td>   
   <td colspan="2">Quote Validity</td>   
   </tr>
   <tr style="background:#000033; color:#fff;">
    <td colspan="2"><input type="text" id="txtQID" name="txtQID" value="'.$quoteID.'" readonly="true" style="border:none; outline:none; background:transparent; color:#fff; width:auto;font-size:10px;" /></td>
	<td colspan="2"><input type="text" id="txtQDate" name="txtQDate" class="txtbox_Tab" style="width:80px;font-size:10px;" value="'.date('d-m-Y').'" /></td>
	<td colspan="2"><input type="text" id="txtQExpDate" name="txtQExpDate" class="txtbox_Tab" style="width:80px;" onClick="oDP.show(event,this.id,2); showContent(\'TripDates\');" /></td>
   </tr>
   </table>	
   
   <table width="100%"  style="font-size:10px; font-family:Calibri;" cellpadding="0" cellspacing="0" border="1px">
			 <tr style="background:#b22; color:#fff;"><th colspan="9" align="center">Travellers</th></tr>
		   <tr style="background:#eee; color:#555;">
		    <th>Adults</th>
			<th>Kids <br/> 0-2Yrs</th>
			<th>Kids<br/> 2-12Yrs</th>
			<th>Kids <br/> 12+ Yrs</th>
			<th>Senior Citizens<br/>(60+)</th>
			</tr>
			<tr>';	
			
			$q_trvler="select trvlr_adults, trvlr_kids_0_2, trvlr_kids_2_12, trvlr_kids_2_12, trvlr_kids_12, trvlr_snr_citiz from cust_trip_trvler where wl_id='".$_GET['WLID']."'";
			$res_trvler = mysqli_query($conn,$q_trvler);
			
			if($res_trvler)
			{
			while($row = mysqli_fetch_array($res_trvler))
			  {
			  $trvAdlt = $row["trvlr_adults"];
			  $trvKid_0_2 = $row["trvlr_kids_0_2"] ;
				$trvKid_2_12 = $row["trvlr_kids_2_12"];
		  
			echo '<tr>';
			echo '<td align="center">'.$row["trvlr_adults"].'</td>';
			echo '<td align="center">'.$row["trvlr_kids_0_2"].'</td>';
			echo '<td align="center">'.$row["trvlr_kids_2_12"].'</td>';
			echo '<td align="center">'.$row["trvlr_kids_12"].'</td>';
			echo '<td align="center">'.$row["trvlr_snr_citiz"].'</td>';
			echo '</tr>';
			  }
			}		
		
		 echo '</tr>
		 </table>
  
    <table style="font-size:10px; font-family:Calibri;" width="100%" cellpadding="0" cellspacing="0" border="1px" bordercolor="#aaa">
  <tr height="30px"><th colspan="6"></th></tr>
	  <tr style="background:#b22; color:#fff;"><th colspan="6" align="center">ITINERARY</th></tr>
	  <tr style="background:#eee; color:#555;" height="16px">
	    <th>PLACE/S</th>
		<th>CATEGORY</th>
		<th>ATTRACTIONS</th>
		<th>DATE</th>
		<th>DAY</th>
	  </tr>';
	  
	 $q_wl_itin = "select loc_name, DATE_FORMAT(`trip_date`,'%d-%m-%Y') as trip_date , schedule, attr_name, cate_id from saved_wl where wl_id='".$_GET['WLID']."'";
	 $res_wl_itin = mysqli_query($conn,$q_wl_itin);
	 if($res_wl_itin)
	 {
	  while($row = mysqli_fetch_array($res_wl_itin))
	  {
	    echo '<tr>';
		echo '<td>'.$row["loc_name"].'</td>';
		echo '<td>'.$row["cate_id"].'</td>';
		echo '<td>'.$row["attr_name"].'</td>';
		echo '<td>'.$row["trip_date"].'</td>';
		echo '<td>'.$row["schedule"].'</td>';
		echo '<td></td>';
	  }
	 }
	 echo '</table>	
	
	<table id="tab_sugg_itin" width="100%" style="font-size:14px; font-family:Calibri;" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
	 <tr style="background:#b22; color:#fff;"><th colspan="7" align="center">B2B SUGGESTIONS ON ITINERARY-   B2B CAN ADD/COMMENT ON ATTRACTION/ITINERARY</th></tr>
  <tr style="background:#eee; color:#555;" height="16px">
         <th>PLACE/S</th>
		<th>CATEGORY</th>
		<th>ATTRACTIONS</th>
		<th>DATE</th>
		<th>DAY</th>
		<th>ADD ROWS</th>
		<th>DELETE ROWS</th>
   </tr>';   
	    $locs ="";
	    echo '<tr id="tr_itin_1">';
		 echo '<td align="left"><input  class="txtbox_tab" style="width:130px;" id="txtSug_itin_loc_2" name="txtSug_itin_loc_2"></td>';		
		echo '<td>
		<select type="text" class="txtbox_tab" style="width:130px;" id="txtSug_itin_cate_2" name="txtSug_itin_cate_2">
		<option value="SHOPPING">SHOPPING</option>
		<option value="SHOPPING">SIGHTSEEING</option>
		<option value="SHOPPING">HISTORICAL</option>
		<option value="SHOPPING">KIDS</option>
		<option value="SHOPPING">RELIGIOUS</option>
		<option value="SHOPPING">CULTURAL</option>
		<option value="SHOPPING">FOOD-NIGHTLIFE</option>
		<option value="SHOPPING">MUST SEE</option>
		<option value="SHOPPING">EXCLUSIVE</option>
		<option value="SHOPPING">OFFBEAT</option>
		</select></td>';
		echo '<td><input type="text" class="txtbox_tab"  id="txtSug_itin_attr_2" name="txtSug_itin_attr_2" value="'.$row["attr_name"].'" /></td>';
		echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_itin_date_2" name="txtSug_itin_date_2" value="'.$row["trip_date"].'" onClick="oDP.show(event,this.id,2); showContent(\'TripDates\');" /></td>';
		echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_itin_schd_2" name="txtSug_itin_schd_2" value="'.$row["schedule"].'" /></td>';
		echo '<td><input type="button" class="smallbtn" style="width:50px; height:24px; font-size:12px;" value="ADD" onclick="add_Qrows_attr(\''.$locs.'\');" /></td>';
		echo '<td><img src="Images/cancelbtn.png" style="width:25px; height:24px;" onclick="delete_row(\'tr_itin\');" /></td>';
		echo '</tr>';
		
		echo '<tr id="tr_itin">';
		echo '<td colspan="7"><textarea type="text" class="txtbox_tab" style="width:100%; height:50px; font-size:14px;" id="txtSug_attr_cmnt" name="txtSug_attr_cmnt" placeholder="COMMENT HERE"></textarea></td>';
		echo '</tr>';	

	 echo '</table>
	
	<table style="font-size:10px; font-family:Calibri;" width="100%" cellpadding="0" cellspacing="0" border="1px" bordercolor="#aaa">
	<tr bordercolor="#fff" height="30px"><td colspan="10"></td></tr>
  <tr style="background:#b22; color:#fff;" height="30px"><th colspan="10" align="center" >HOTEL</th></tr>
  <tr style="background:#eee; color:#555;" height="16px"> 
  <th>Location</th>
  <th>Check-in Date</th>
  <th>Check-out Date</th>
  <th>Trip Duration</th>
  <th>Star Rate</th>
  <th>Occupancy</th>
  <th>No.of Rooms</th>
  <th>Extra Bed</th>
  <th>Food plan</th>
  <th>Apprx. Budget</th>
  </tr> ';
  
  $q_htl = "select htl_opt, htl_loc, htl_chk_in, htl_chk_out, htl_dur, htl_star_rate, htl_occp, htl_num_rooms, htl_extra_bed, htl_food, htl_apprx_bgt from cust_trip_htl where wl_id='".$_GET['WLID']."'";
  $res_htl = mysqli_query($conn,$q_htl);
  if($res_htl)
  {
  $arrLoc=array();
  $loc="";
   while($row = mysqli_fetch_array($res_htl))
   {
	   echo '<tr>';
	 echo '<td>'.$row["htl_loc"].'</td>';
	 echo '<td>'.$row["htl_chk_in"].'</td>';
	 echo '<td>'.$row["htl_chk_out"].'</td>';
	 echo '<td>'.$row["htl_dur"].'</td>';
	  echo '<td>'.$row["htl_star_rate"].'</td>';
	 echo '<td>'.$row["htl_occp"].'</td>';
	 echo '<td>'.$row["htl_num_rooms"].'</td>';
	 echo '<td>'.$row["htl_extra_bed"].'</td>';
	  echo '<td>'.$row["htl_food"].'</td>';
	 echo '<td>'.$row["htl_apprx_bgt"].'</td>';
	 echo '</tr>';
	     }
  }
 
 
 echo '</table>
	
	<table id="tab_sugg_htl"  width="100%"  style="font-size:14px; font-family:Calibri;"  cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
  <tr style="background:#b22; color:#fff;"><th colspan="15" align="center">SUGGESTED HOTEL/HOTELS</th></tr>
  <tr style="background:#eee; color:#555;">
  <th>OPTIONS</th>
   <th>LOCATION</th>
   <th>CHECK-IN</th>
   <th>CHECK-OUT</th>
   <th>HOTEL STAR RATE</th>
   <th>ROOM TYPE</th>
   <th>ROOMS</th>
   <th>OCCUPANCY</th>
   <th>HOTEL NAME</th>
   <th>FOOD PLAN</th>
   <th>TICKET PRICE</th>
   <th>DURA-<br/>TION</th>
   <th>TOTAL</th>
   <th>ADD ROW</th>
   <th>DELETE ROW</th>
  </tr>';
  
    $q_htl_sugg = "select htl_opt, htl_loc, DATE_FORMAT(`htl_chk_in`,'%d-%m-%Y') as htl_chk_in, DATE_FORMAT(`htl_chk_out`,'%d-%m-%Y') as htl_chk_out, htl_dur, htl_star_rate, htl_occp, htl_num_rooms, htl_extra_bed, htl_food, htl_apprx_bgt from cust_trip_htl where wl_id='".$_GET['WLID']."'";
  $res_htl_sugg = mysqli_query($conn,$q_htl_sugg);
  if($res_htl_sugg)
  {
  $i = 2;
   while($row = mysqli_fetch_array($res_htl_sugg))
   {
   echo '<tr id="tr_Htl_1">';
  echo '<td><input type="text" class="txtbox_tab" style="width:40px; font-size:12px;" id="txtSug_htl_opt_'.$i.'" name="txtSug_htl_opt_'.$i.'" value="OPT-1" /></td>';
  echo '<td><input type="text" class="txtbox_tab" style="width:100px;" id="txtSug_htl_loc_'.$i.'" name="txtSug_htl_loc_'.$i.'" value="'.$row["htl_loc"].'" /></td>';
   echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_chkin_'.$i.'" name="txtSug_htl_chkin_'.$i.'" value="'.$row["htl_chk_in"].'" onClick="oDP.show(event,this.id,2); showContent(\'TripDates\');" /></td>';
    echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_chkout_'.$i.'" name="txtSug_htl_chkout_'.$i.'" value="'.$row["htl_chk_out"].'" onClick="oDP.show(event,this.id,2); showContent(\'TripDates\');" onMouseOut="CalDur(\'txtSug_htl_chkout_'.$i.'\',\'txtSug_htl_chkin_'.$i.'\');" /></td>';
  echo '<td><input type="text" class="txtbox_tab" style="width:70px;" id="txtSug_htl_rate_'.$i.'" name="txtSug_htl_rate_'.$i.'" value="'.$row["htl_star_rate"].'" /></td>';
  echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_roomtype_'.$i.'" name="txtSug_htl_roomtype_'.$i.'"  /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:40px;" id="txtSug_htl_room_'.$i.'" name="txtSug_htl_room_'.$i.'" value="'.$row["htl_num_rooms"].'" /></td>';
		echo '<td><input type="text" class="txtbox_tab" style="width:60px;" id="txtSug_htl_occup_'.$i.'" name="txtSug_htl_occup_'.$i.'" value="'.$row["htl_occp"].'"  /></td>';
   echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_name_'.$i.'" name="txtSug_htl_name_'.$i.'" /></td>';
   echo '<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtSug_htl_food_'.$i.'" name="txtSug_htl_food_'.$i.'" value ="'.$row["htl_food"].'"/></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_price_'.$i.'" name="txtSug_htl_price_'.$i.'" onchange="calc_htl_pric(this.value,\'txtSug_htl_dur_'.$i.'\',\'txtSug_htl_totl_'.$i.'\');" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:30px;" id="txtSug_htl_dur_'.$i.'" name="txtSug_htl_dur_'.$i.'" value="'.$row["htl_dur"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:80px;" id="txtSug_htl_totl_'.$i.'" name="txtSug_htl_totl_'.$i.'" /></td>';
	echo '<td><input type="button" class="smallbtn" style="width:50px; height:24px; font-size:12px;" value="ADD" onclick="add_Qrows_htl();" /></td>';
	echo '<td><img style="width:25px; height:24px; cursor:pointer;" src="Images/cancelbtn.png" onclick="delete_row(\'tr_'.$row["htl_loc"].'\');" /></td>';
  echo '</tr>';
  $i++;
 }
 echo '<tr id="tr_htl">';
		echo '<td colspan="15"><textarea type="text" class="txtbox_tab" style="width:100%; height:50px; font-size:14px;" id="txtSug_htl_cmt" name="txtSug_htl_cmt" placeholder="COMMENT HERE"></textarea></td>';
		echo '</tr>';
 }
 
	echo '</table>
	
	<table width="100%" style="font-size:10px; font-family:Calibri;" cellpadding="0" cellspacing="0" border="1px">
	<tr bordercolor="#fff" height="30px"><td colspan="4"></td></tr>
			<tr style="background:#b22; color:#fff;">
			<th colspan="9">Travel Preference between cities</th></tr>
			  <tr style="background:#eee; color:#555;" height="16px">				  
				   <th width="120px">From</th>
				   <th width="120px">To</th>
				   <th width="80px">Date</th>
				   <th width="90px"> Travel Mode</th>
				 </tr>';
			    $q_trv = "select trv_opt, trv_from, trv_to, trv_date, trv_mode from cust_trip_trv where wl_id='".$_GET['WLID']."'";
				$res_trv = mysqli_query($conn,$q_trv);
				if($res_trv)
				{
				  while($row = mysqli_fetch_array($res_trv))
				  {
			echo '<tr>';
         echo '<td>'.$row["trv_from"].'</td>';
    	echo '<td>'.$row["trv_to"].'</td>';
	   echo '<td>'.$row["trv_date"].'</td>';
	   echo '<td>'.$row["trv_mode"].'</td>';
        echo '</tr>';	 
				  }
				}
	  
			   echo '</table>			  
	
	<table id="tab_Sug_trv" style="font-size:14px; font-family:Calibri;" width="100%" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">	
  <tr style="background:#b22; color:#fff;"><th colspan="9" align="center">SUGGESTED TRANSPORTATION (Between city to city)</th></tr>
  <tr style="background:#eee; color:#555;" >
  <th></th> 
  <th>FROM</th>
  <th>TO</th>
  <th>BY(MODE)</th>
  <th>DETAILS</th>
  <th>DATE</th>
  <th>TIME</th>
  <th>TICKET PRICE</th>
  <th>TOTAL</th>
  </tr>';
  
  $i= 2; 
  $q_htl_sugg = "select trv_opt, trv_from, trv_to, trv_date, trv_mode, ltrv_loc, ltrv_mode, ltrv_num_pasn, ltrv_date, req_loc, req_type from cust_trip_trv where wl_id='".$_GET['WLID']."'";
  $res_htl_sugg = mysqli_query($conn,$q_htl_sugg);
  if($res_htl_sugg)
  {
   while($row = mysqli_fetch_array($res_htl_sugg))
   {
  echo '<tr>';
  echo '<td><input type="text" name="txtSug_trv_Ontype_'.$i.'" value="ONWARD JOURNEY"</td>';
  echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_frm_'.$i.'" name="txtSug_trvON_frm_'.$i.'" value="'.$row["trv_from"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_to_'.$i.'" name="txtSug_trvON_to_'.$i.'" value="'.$row["trv_to"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_mode_'.$i.'" name="txtSug_trvON_mode_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_dtls_'.$i.'" name="txtSug_trvON_dtls_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_date_'.$i.'" name="txtSug_trvON_date_'.$i.'" onClick="oDP.show(event,this.id,2);showContent(\'TripDates\');" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_time_'.$i.'" name="txtSug_trvON_time_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_tktprc_'.$i.'" name="txtSug_trvON_tktprc_'.$i.'"  onchange="prc_trpt(this.value,\''.$trvAdlt.'\',\''.$trvKid_0_2.'\',\''.$trvKid_2_12.'\',\'txtSug_trvON_Ttotl_'.$i.'\');" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_Ttotl_'.$i.'" name="txtSug_trvON_Ttotl_'.$i.'" /></td>';
    echo '</tr>';
	$i++;
	  echo '<tr>';
  echo '<td><input type="text" name="txtSug_trv_Ontype_'.$i.'" value="RETURN JOURNEY" /></td>';
  echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_frm_'.$i.'" name="txtSug_trvON_frm_'.$i.'" value="'.$row["trv_to"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_to_'.$i.'" name="txtSug_trvON_to_'.$i.'" value="'.$row["trv_from"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_mode_'.$i.'" name="txtSug_trvON_mode_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_dtls_'.$i.'" name="txtSug_trvON_dtls_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_date_'.$i.'" name="txtSug_trvON_date_'.$i.'" onClick="oDP.show(event,this.id,2);showContent(\'TripDates\');" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_time_'.$i.'" name="txtSug_trvON_time_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_tktprc_'.$i.'" name="txtSug_trvON_tktprc_'.$i.'" onchange="prc_trpt(this.value,\''.$trvAdlt.'\',\''.$trvKid_0_2.'\',\''.$trvKid_2_12.'\',\'txtSug_trvON_Ttotl_'.$i.'\');" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvON_Ttotl_'.$i.'" name="txtSug_trvON_Ttotl_'.$i.'" /></td>';
    echo '</tr>'; 
	$i++;
	}
	 echo '<tr id="tr_trv">';
		echo '<td colspan="14"><textarea type="text" class="txtbox_tab" style="width:100%; height:50px; font-size:14px;" id="txtSug_trv_cmt" name="txtSug_trv_cmt" placeholder="COMMENT HERE"></textarea></td>';
		echo '</tr>';
	} 
  
  echo '</table>
	
	<table  width="100%" style="font-size:10px; font-family:Calibri;" cellpadding="0" cellspacing="0" border="1px">
	<tr  height="30px"><td colspan="4"></td></tr>
			<tr style="background:#b22; color:#fff;"><th colspan="4">Travel Preference within cities</th></tr>
			     <tr style="background:#eee; color:#555;" height="16px">
				  <th>Location</th>
				  <th>Mode</th>				   
				   <th># of Passengers</th>
				   <th>Date</th>				   
				  </tr> ';	
				  
				   $q_trvl = "select ltrv_loc, ltrv_mode, ltrv_num_pasn, ltrv_date, req_loc, req_type from cust_trip_trv where wl_id='".$_GET['WLID']."'";
				$res_trvl = mysqli_query($conn,$q_trvl);
				if($res_trvl)
				{
				  while($row = mysqli_fetch_array($res_trvl))
				  {
			echo '<tr>';
         echo '<td>'.$row["ltrv_loc"].'</td>';
    	echo '<td>'.$row["ltrv_mode"].'</td>';
	   echo '<td>'.$row["ltrv_num_pasn"].'</td>';
	   echo '<td>'.$row["ltrv_date"].'</td>';
        echo '</tr>';	 
				  }
				}
				 			  			  
			   echo '</table>
	
	<table id="tab_Sug_trvl" style="font-size:14px; font-family:Calibri;" width="100%" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
  <tr style="background:#b22; color:#fff; "><th colspan="8" align="center">LOCAL TRAVEL (Within City)</th></tr>
  <tr style="background:#eee; color:#555;"> 
  <th>LOCATION</th>
  <th>VEHICLE</th>
  <th>VEHICLE NAME</th>
  <th># OF PASSENGER</th>
  <th>RATE</th>
  <th>DISTANCE</th>
  <th>RATE/KM</th>
  <th>TOTAL</th>
  </tr>';
    
      $q_htl_sugg = "select  ltrv_loc, ltrv_mode, ltrv_num_pasn, ltrv_date from cust_trip_trv where wl_id='".$_GET['WLID']."'";
  $res_htl_sugg = mysqli_query($conn,$q_htl_sugg);
  if($res_htl_sugg)
  {
  $i=2;
   while($row = mysqli_fetch_array($res_htl_sugg))
   {
  echo '<tr>';
  echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_trvl_loc_'.$i.'" name="txtSug_trvl_loc_'.$i.'" value="'.$row["ltrv_loc"].'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_vehi_'.$i.'" name="txtSug_vehi_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_Vname_'.$i.'" name="txtSug_Vname_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_pass_'.$i.'" name="txtSug_pass_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_rate_'.$i.'" name="txtSug_rate_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_dist_'.$i.'" name="txtSug_dist_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_addi_'.$i.'" name="txtSug_addi_'.$i.'" /></td>';
	echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_Vtotl_'.$i.'"" name="txtSug_Vtotl_'.$i.'" /></td>';
    echo '</tr>'; 
	$i++;
	}
		 echo '<tr id="tr_ltrv">';
		echo '<td colspan="14"><textarea type="text" class="txtbox_tab" style="width:100%; height:50px; font-size:14px;" id="txtSug_ltrv_cmt" name="txtSug_ltrv_cmt" placeholder="COMMENT HERE"></textarea></td>';
		echo '</tr>';
	} 
 
 echo '</table>
  
    <table style="font-size:10px; font-family:Calibri;" width="100%" cellpadding="0" cellspacing="0" border="1px">
  <tr height="30px"><th colspan="2" align="center"></th></tr>
			<tr><th colspan="2" style="background:#b22; color:#fff;">Other custom requirement, if any <span id="edt_req" class="edit_link">Edit</span></th></tr>
			  <tr style="background:#eee; color:#555;"  height="16px">
			  <th>Location</th>
			  <th>Requirement (Ex. Guide)</th>			   
			  </tr>';
			  
			  $q_htl_sugg = "select req_loc, req_type from cust_trip_trv where wl_id='".$_GET['WLID']."'";
  $res_htl_sugg = mysqli_query($conn,$q_htl_sugg);
  if($res_htl_sugg)
  {
   while($row = mysqli_fetch_array($res_htl_sugg))
   {
     echo '<tr>';
	 echo '<td>'.$row["req_loc"].'</td>';
	 echo '<td>'.$row["req_type"].'</td>';
	 echo '</tr>';
   }
  }
	
		echo '</table>	
 
    <table id="tab_Sug_othr" style="font-size:14px; font-family:Calibri;" width="100%" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
  <tr style="background:#b22; color:#fff;"><th colspan="8" align="center">OTHER FACILITIES</th></tr>
  <tr style="background:#eee; color:#555;"> 
  <th>OTHERS</th>
  <th>LOCATION</th>
  <th>RATE/DAY</th>
  <th>No. OF DAYS</th>
  </tr>';

        $q_htl_sugg = "select  req_loc, req_type from cust_trip_trv where wl_id='".$_GET['WLID']."'";
  $res_htl_sugg = mysqli_query($conn,$q_htl_sugg);
  if($res_htl_sugg)
  {
  $i=2;
   while($row = mysqli_fetch_array($res_htl_sugg))
   { 
   echo '<tr>';
   echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_othr_'.$i.'" name="txtSug_othr_'.$i.'" value="TOUR GUIDE" /></td>';
   echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_loc_'.$i.'" name="txtSug_loc_'.$i.'" value="'.$row["req_loc"].'" /></td>';
   echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_rpd_'.$i.'" name="txtSug_rpd_'.$i.'" /></td>';
    echo '<td><input type="text" class="txtbox_tab" style="width:95px;" id="txtSug_noD_'.$i.'" name="txtSug_noD_'.$i.'" /></td>';
  echo '</tr>';
  $i++;
  }
    echo '<tr id="tr_req">';
		echo '<td colspan="14"><textarea type="text" class="txtbox_tab" style="width:100%; height:50px; font-size:14px;" id="txtSug_req_cmt" name="txtSug_req_cmt" placeholder="COMMENT HERE"></textarea></td>';
		echo '</tr>';
  }
  
  echo '</table>  
  
    <table style="font-size:14px; font-family:Calibri;" width="100%" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
   <tr bordercolor="#fff" height="30px"><td colspan="8"></td></tr>
  <tr >
  <th colspan="6" width="70%" rowspan="2" align="center" style="background:#b22; color:#fff;">GRAND TOTAL</th>
  <th>OPTION -1 </th>
  <th><input type="text" class="txtbox_Tab" style="width:90px;" id="txtGrnd_totl_opt1" name="txtGrnd_totl_opt1" /></th>
  </tr>
  <tr>
   <th>OPTION -2 </th>
  <th><input type="text" id="txtGrnd_totl_opt2" class="txtbox_Tab" style="width:90px;" name="txtGrnd_totl_opt2" /></th>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input type="submit" id="btnSubmit_Q" name="btnSubmit_Q" class="smallbtn" style="width:100px; height:24px; font-size:18px; float:none;"  value="Quote" onMouseOver="cnt_sug_rows();" /></td>
	  <td colspan="2" align="center"><input type="button" id="btnprev" name="btnprev" class="smallbtn" style="width:100px; height:24px; font-size:18px; float:none;"  value="Preview" onClick="show_block(\'dtls_response\');" /></td>
  </tr>
  </table>
  
 </div>  ';
 
echo ' <input type="text" id="txtSug_htl_rows" name="txtSug_htl_rows" style="visibility:hidden;" value="4" />
<input type="text" id="txtSug_trv_rows" name="txtSug_trv_rows" style="visibility:hidden;" value="5" />
<input type="text" id="txtSug_trvl_rows" name="txtSug_trvl_rows" style="visibility:hidden;" value="4" />
<input type="text" id="txtSug_othr_rows" name="txtSug_othr_rows" style="visibility:hidden;" value="4" />
<input type="text" id="txtSug_itin_rows" name="txtSug_itin_rows" style="visibility:hidden;" value="4" />';

//--------------------------------------------------------  Lead Cover POP UP--------------------------------------------- ---------------------------------------------> 
 
echo ' <div id="div_cover" class="popUp_imgs_leads" style="background:#555; opacity:0; z-index:1000; width:100%; float:left; display:block; position:absolute; height:2000px; top:0; left:0; margin-left:0;">
  <div style="width:100%; float:left;"><span style="float:right; margin-right:-10px;">
  <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_cover\'); hide_block(\'dtls_leads\');hide_block(\'div_resp_pop\');" /></span></div>
 </div>';



//--------------------------------------------------------- Dialogue Window ---------------------------------------------------------------------------------->

echo '<div id="div_resp_pop" class="popUp_imgs_leads" style="width:500px; height:160px; z-index:10000; margin-left:10%; overflow:hidden; border:1px solid #666; background:#fbfbfb; display:block; position:absolute; top:20%;">
  <div style="float:left; width:100%; margin:10px;">
  
  <div style="float:left; width:100%;"><span class="font-medium" style="float:left; margin-left:20px;">Do you want to respond to this lead?</span></div>
  
  <div style="float:left; width:100%; margin-left:20px; margin-top:20px;">
 
  <span style="float:left; margin-left:5px;">
  <div class="smallbtn" style="width:110px; height:50px; cursor:pointer; background:#009900; color:#fff;" onClick="cnt_sug_rows(); hide_block(\'div_resp_pop\'); hide_block(\'div_cover\'); chngColr(\'btn_acpt_'.$_GET["WLID"].'\',\'#009900\'); acptLead_view(\''.$_GET["WLID"].'\',\''.$_GET["LeadID"].'\',\''.$_GET["UName"].'\',\''.$_GET["LDate"].'\'); disbl(\'btn_rej_'.$_GET["WLID"].'\',\'btn_view_'.$_GET["WLID"].'\');" ">  
  <span style="margin-top:10px; font-size:16px;">Respond <br/> with Quote</div></span>
  
  <span style="float:left; margin-left:5px;">
  <div class="smallbtn" style="width:110px; height:50px; cursor:pointer;  background:#0066ff; color:#fff;" onClick="hide_block(\'div_resp_pop\'); hide_block(\'div_cover\'); hide_block(\'dtls_leads\'); chngColr(\'btn_view_'.$_GET["WLID"].'\',\'#0066ff\');  viewLead_Q(\''.$_GET["WLID"].'\',\''.$_GET["LeadID"].'\',\''.$_GET["UName"].'\',\''.$_GET["LDate"].'\'); disbl(\'btn_acpt_'.$_GET["WLID"].'\',\'btn_rej_'.$_GET["WLID"].'\');">
  <span style="margin-top:10px;font-size:16px;">Respond  <br/> Later</span></div></span>
  
  <span style="float:left; margin-left:5px;">
  <div class="smallbtn" style="width:110px; height:50px; cursor:pointer;  background:#ff0000; color:#fff;" onClick="hide_block(\'div_resp_pop\'); hide_block(\'div_cover\'); hide_block(\'dtls_leads\'); chngColr(\'btn_rej_'.$_GET["WLID"].'\',\'#ff0000\'); rejLead_view(\''.$_GET["WLID"].'\',\''.$_GET["LeadID"].'\',\''.$_GET["UName"].'\',\''.$_GET["LDate"].'\'); disbl(\'btn_acpt_'.$_GET["WLID"].'\',\'btn_view_'.$_GET["WLID"].'\');">
  <span style="margin-top:10px; font-size:16px;">Not <br/> Interested</span></div></span>
  
  </div>
  </div>
</div>';

 echo '</form>';
 
 if(isset($_POST['btnSubmit_Q']))
 {
 
	$_SESSION["WLID_U"] = $_GET["WLID"];
	$_SESSION["LeadID_U"] = $_GET["LeadID"];
	$_SESSION["QID_U"] = $quoteID;
 }
 }
 
if(isset($_GET["WLID_View"]) && isset($_GET["LID_View"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab = "insert into lead_route_tab values('".$_GET['LID_View']."','".$_GET['LDate']."','".$_GET['WLID_View']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Viewed');";
  $res_lead_tab = mysqli_query($conn,$q_lead_tab);
}

if(isset($_GET["WLID_rej"]) && isset($_GET["LID_rej"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab_rej =  "insert into lead_route_tab values('".$_GET['LID_rej']."','".$_GET['LDate']."','".$_GET['WLID_rej']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Rejected');";
  $res_lead_tab_rej = mysqli_query($conn,$q_lead_tab_rej);
}

if(isset($_GET["WLID_acp"]) && isset($_GET["LID_acp"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab_acp =  "insert into lead_route_tab values('".$_GET['LID_acp']."','".$_GET['LDate']."','".$_GET['WLID_acp']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Accepted');";
  $res_lead_tab_acp = mysqli_query($conn,$q_lead_tab_acp);
}


if(isset($_GET["WLID_View_q"]) && isset($_GET["LID_View_q"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab = "insert into lead_route_tab values('".$_GET['LID_View_q']."','".$_GET['LDate']."','".$_GET['WLID_View_q']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Quote-Viewed');";
  $res_lead_tab = mysqli_query($conn,$q_lead_tab);
}

if(isset($_GET["WLID_rej_view"]) && isset($_GET["LID_rej_view"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab_rej =  "insert into lead_route_tab values('".$_GET['LID_rej_view']."','".$_GET['LDate']."','".$_GET['WLID_rej_view']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Reject-Viewed');";
  $res_lead_tab_rej = mysqli_query($conn,$q_lead_tab_rej);
}

if(isset($_GET["WLID_acp_view"]) && isset($_GET["LID_acp_view"]) && isset($_GET["ID"]) && isset($_GET['UName']) && isset($_GET["LDate"]))
{
  $q_lead_tab_acp =  "insert into lead_route_tab values('".$_GET['LID_acp_view']."','".$_GET['LDate']."','".$_GET['WLID_acp_view']."','".$_GET['ID']."','".$_GET['UName']."','".date('Ymd')."','".date("h:s:sa")."','','','Accept-Viewed');";
  $res_lead_tab_acp = mysqli_query($conn,$q_lead_tab_acp);
}


?>