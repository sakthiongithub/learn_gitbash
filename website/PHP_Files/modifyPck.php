<?php

//----------------------------------------------------------------- Modify Package Popup -------------------------------------------------------------------------->

include("PHP_Connection.php");
echo '<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>';

if(isset($_GET['modifyPck']) && isset($_GET['pckID']))
{
echo '<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px;"><img src="Images/closebtn.png" width="25px" height="25px" onclick="hide_block(\'div_mod_pck\');" /></span>
</div>';

echo '<div style="float:left; width:100%;">
<span style="float:left; margin-left:10px;">
<ul>
<li>You can republish the same package by modifying date, accomodation and transportation.</li>
</ul>
</span>
</div>';

$q_pck_dtls = "select pck_id, pck_name, pck_img1, pck_img2, type, trip_theme, travellers, prc_based,  trip_dates, locations, duration, validity, incls, excls, prc_based , pck_cost, prc_service, prc_edu, price, prc_based_rev, pck_cost_rev, prc_service_rev, prc_edu_rev, revised_price, inventory, deductions, refund, terms, pck_agenda, pck_agenda_dtl, num_locs, pckpostDate, pck_hml, inventory, pckshownAs, offers, revised_offers, terms from b2b_pck_crt where pck_id='".$_GET["pckID"]."' ";
$res_pck_dtls = mysqli_query($conn,$q_pck_dtls);


$q_pck_htl = "select pck_id, loc_name, htl_name, duration,  star_rate, rooms, occupancy, extra_bed, htl_img, food_type, incl, excl, revised_incl, revised_excl from b2b_htl_crt where pck_id='".$_GET["pckID"]."'";
$res_pck_htl = mysqli_query($conn,$q_pck_htl);
$htl_rows = mysqli_num_rows($res_pck_htl);

$q_pck_trp = "select pck_id, IC_tofro_trnsf, IC_onwd_from_dest, IC_onwd_to_dest, IC_onwd_trv_mode, IC_onwd_trnsf_means, IC_ret_from_dest, IC_ret_to_dest, IC_ret_trv_mode, IC_ret_trf_means from b2b_trnprt where pck_id='".$_GET['pckID']."' limit 1";
$res_pck_trp = mysqli_query($conn,$q_pck_trp);
$trp_rows = mysqli_num_rows($res_pck_trp);

$q_pck_ltrvl = "select P2P_origin, P2P_dest, P2P_mode, P2P_means, local_loc, local_mode, local_means from b2b_trnprt where pck_id='".$_GET['pckID']."'";
$res_pck_ltrvl = mysqli_query($conn,$q_pck_ltrvl);
$res_pck_ltrv_lcl = mysqli_query($conn,$q_pck_ltrvl);
$p2p_rows = mysqli_num_rows($res_pck_ltrv_lcl);

$q_pck_itin = "select pck_id, day, loc_name, attr_cate, attr_name, start_time, arrival_time, time_allocated from b2b_attr_crt where pck_id='".$_GET['pckID']."'";
$res_pck_itin = mysqli_query($conn,$q_pck_itin);
$itin_rows = mysqli_num_rows($res_pck_itin);

$q_sel_cnt = "select pck_viewed from b2b_pck_crt where pck_id='".$_GET['pckID']."'";
$res_sel_cnt = mysqli_query($conn,$q_sel_cnt);
if($res_sel_cnt)
{
while($row = mysqli_fetch_array($res_sel_cnt))
{
  $count = $row["pck_viewed"];
}
}

$count = $count+1;
$q_cnt_views = "update b2b_pck_crt set pck_viewed='".$count."' where pck_id='".$_GET['pckID']."'";
$res_cnt_views = mysqli_query($conn,$q_cnt_views);

echo '<div style="margin:5px; width:100%; float:left;">'; 
 
if($res_pck_dtls)
{
while($row = mysqli_fetch_array($res_pck_dtls))
{
$valid = explode("to ",$row["validity"]);
$inten = $row["pck_hml"];
if($inten == "H")
  $inten = "High";
else if($inten == "M")
  $inten = "Medium";
else if($inten == "L")
  $inten = "Low";
  
  $postDt = explode(" to ",$row["pckpostDate"]);
  
  if($row["pck_cost_rev"] == "")
    $pckCost = $row["pck_cost"]; 
  else
      $pckCost = $row["pck_cost_rev"];
	  
  if($row["prc_service_rev"]=="")
    $prc_ser = $row["prc_service"];
  else
    $prc_ser = $row["prc_service_rev"];
	
	 if($row["prc_edu_rev"] == "")
	 $prc_edu = $row["prc_edu"];
	else
	 $prc_edu = $row["prc_edu_rev"];
	 
	 if($row["revised_price"]=="")
	 $price = $row["price"];
	 else
	  $price = $row["revised_price"]; 	
	  
	  if($row["prc_based_rev"]=="")
	  $prc_based = $row["prc_based"];
	  else
	  $prc_based = $row["prc_based_rev"];
	  
      if(strpos($row["terms"],"/Filter /FlateDecode")>0)
	  $terms = "PDF ATTACHMENT";
	  else
	  $terms = $row["terms"];	  

echo '<div style="float:left; width:100%;">
<input type="text" name="txtMod_pckName" class="txtbox_Tab" style="width:50%; padding:3px; border:1px solid #999; outline:none; font-family:"Lucida Calligraphy"; font-weight:bold; font-size:20px;" value="'.$row["pck_name"].'" /></div> ';

echo '<div style="float:left; width:100%; margin-top:20px;">

<span style="float:left; width:20%;">
<div style="width:100%; float:left;">
  <img src="data:image/jpg;base64,'.base64_encode($row["pck_img1"]).'" width="100%" height="100px" />
  </div>
  <div style="float:left; width:100%;">
  <input type="file" id="Mod_pckImg1" name="Mod_pckImg1" />
    </div>
<div style="width:100%; float:left; margin-top:10px;">
  <img src="data:image/jpg;base64,'.base64_encode($row["pck_img2"]).'" width="100%" height="100px" />
  </div>
  <div style="float:left; width:100%;">
  <input type="file" id="Mod_pckImg2" name="Mod_pckImg2" />
    </div>  
</span>
<span><input type="text" name="txtTypes" id="txtTypes" value="'.$row["type"].'" style="visibility:hidden;" /></span>
<span style="float:left; width:70%; margin-left:10px;">
<table width="100%" border="0px" height="auto" cellpadding="2" cellspacing="0" class="PckFonts" style="font-size:15px; font-family:Calibri; table-layout:fixed;">
 <tr>
   <th width="200px" align="right">Type</th>
   <td width="10px">:</td>
   <td align="left">';
   if($row["type"] == "DOMESTIC")
   {
   echo '<span style="font-size:12px;"><input type="radio" name="rdlocType" value="DOMESTIC" checked="true" disabled="disabled" />DOMESTIC</span> &nbsp;';
   echo '<span style="font-size:12px;"><input type="radio" name="rdlocType" value="INTERNATIONAL" readonly="true" disabled="disabled"  />INTERNATIONAL</span>';
   }
  else
  {
  echo '<span style="font-size:12px;"><input type="radio" name="rdlocType" value="DOMESTIC" disabled="disabled" />DOMESTIC</span> &nbsp;';
  echo '<span style="font-size:12px;"><input type="radio" name="rdlocType" value="INTERNATIONAL" checked="true" disabled="disabled" />INTERNATIONAL</span>';  
  }
  echo '</td>
 </tr>
 <tr>
   <th width="200px" align="right">Locations Covered</th>
   <td width="10px">:</td>
   <td align="left"><input type="text" name="txtMod_loc" id="txtMod_loc" class="txtbox_Tab" style="width:80%; padding:3px; border:1px solid #999; outline:none; font-size:12px; " value="'.$row["locations"].'" readonly="true" /></td>
 </tr>
 <tr id="tr_modState" style="display:none;">
 <td></td>
  <td align="right">
  <span id="div_st" style="float:left;">';
 /* if($row["type"] == "DOMESTIC")
  {
   echo '<select style="width:150px; font-size:12px; float:left;" onchange="ldLoc_mod(this.value);">';
    $sel_st = "select distinct(statename) as statename from user_destinations";
	$res_st = mysqli_query($con,$sel_st);
	if($res_st)
	{
	while($rS = mysqli_fetch_array($res_st))
	{
	 echo '<option value="'.$rS["statename"].'">'.$rS["statename"].'</option>';
	}
	 echo '</select>';
	 }  
   }
   else
   {
     echo '<select id="drpMod_cntry" name="drpMod_cntry" style="width:150px; font-size:12px; style="float:left;" onchange="ldSt_mod(this.value);">';
    $sel_st = "select distinct(country) as country from user_destinations";
	$res_st = mysqli_query($con,$sel_st);
	if($res_st)
	{
	while($rC = mysqli_fetch_array($res_st))
	{
	 echo '<option value="'.$rC["country"].'">'.$rC["country"].'</option>';
	}
	echo '</select>';
	}
   }*/
  echo '</span>
  <span id="div_locMod" style="float:left;"></span>
  <span id="div_cntrMod" style="float:left;"></span>
  </td>
 </tr>
 <tr>
  <th align="right"># Locations</th>
  <td>:</td>
  <td align="left"><input type="text" id="txtMod_numLoc" name="txtMod_numLoc" class="txtbox_Tab" style="width:120px; padding:3px; border:1px solid #999; outline:none; font-size:12px;" placeholder="Single/Multiple" readonly="true" value="'.$row["num_locs"].'" />
  </td>
 </tr>
  <tr>
   <th align="right">Trip Theme</th>
   <td>:</td>
   <td align="left"><input type="text" name="txtMod_theme" id="txtMod_theme" class="txtbox_Tab" style="width:80%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["trip_theme"].'" />
   <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="show_block(\'div_trpThems\');errase(\'txtMod_theme\');">Edit</span>
   <div id="div_trpThems" class="div_dropdown_crt" style="display:none;">
			<span class="font-medium" onClick="show_block(\'div_vacType\'); show_block(\'up_arrow_vacType\'); hide_block(\'down_arrow_vacType\');">
			 --------Trip Themes------- </span>			
			
			<span id="down_arrow_vacType" class="span_drpImg_crt"  style="display:block;">
			<span onClick="show_block(\'div_vacType\'); show_block(\'up_arrow_vacType\'); hide_block(\'down_arrow_vacType\');">
			<img src="Images/dropdown_arrow_icon3.png" width="25px" height="16px"/></span></span>
			
			<span id="up_arrow_vacType" class="span_drpImg_crt" style="display:none;">
			<span onClick="hide_block(\'div_vacType\'); hide_block(\'up_arrow_vacType\'); show_block(\'down_arrow_vacType\');">
			<img src="Images/dropdownlast_arrow_icon.png" width="25px" height="16px" /></span></span>
			
			</div>
			<div id="div_vacType" class="div_drpListItems_crt" style="margin-top:60px;">';
			
			 	$q_vac = "select vac_title, vac_id from vac_type";
				$res_vac = mysqli_query($conn,$q_vac);
				
				if($res_vac)
				{
				while($rw = mysqli_fetch_array($res_vac))
				{
				  echo '<span class="span_drpListItems_crt">
				  <input type="checkbox" id="'.$rw["vac_title"].'" name="'.$rw["vac_id"].'" value="'.$rw["vac_title"].'" onclick="putValVac(\''.$rw["vac_title"].'\',\'txtMod_theme\');"/><span style="cursor:pointer;" onclick="putValVac_sp(\''.$rw["vac_title"].'\',\'txtMod_theme\')">'.$rw["vac_title"].'</span></span>';
				}
				}			 
			   
			   echo '<span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block(\'div_vacType\');  hide_block(\'up_arrow_vacType\'); show_block(\'down_arrow_vacType\');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div>
   </td>
 </tr>
  <tr>
   <th align="right">Duration</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMode_dur" name="txtMode_dur" class="txtbox_Tab" style="width:30%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["duration"].'" /></td>
 </tr>
   <tr>
   <th align="right">Preferred Travellers</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_trvler" name="txtMod_trvler" class="txtbox_Tab" style="width:80%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["travellers"].'" />
   <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="show_block(\'div_travler\');errase(\'txtMod_trvler\');">Edit</span><br/>
   <div id="div_travler" style="display:none;">
			     <div>	   		
			    <div align="left" style="width:100%; margin-top:5px; float:left;">							 
					 <div class="font-medium" style="width:100%; float:left; font-size:12px;">
				  <span><input type="checkbox" value="Single" name="chkSingle" id="chkSingle" onClick="wrt_chkVal(\'chkSingle\',\'txtMod_trvler\',\'Single\',\'adlt_age\'); showAge(this.id,\'adlt_age\');" />
				  <span style="cursor:pointer;" onClick="wrt_chkVal(\'chkSingle\',\'txtMod_trvler\',\'Single\');">Single</span></span>
				  <span><input type="checkbox" value="Couple" name="chkCouple" id="chkCouple" onClick="wrt_chkVal(\'chkCouple\',\'txtMod_trvler\',\'Couple\',\'adlt_age\'); showAge(this.id,\'adlt_age\');" />
				  <span style="cursor:pointer;" onClick="wrt_chkVal(\'chkCouple\',\'txtMod_trvler\',\'Couple\');">Couple</span></span>
				  <span><input type="checkbox" value="Group" name="chkGroup" id="chkGroup" onClick="wrt_chkVal(\'chkGroup\',\'txtMod_trvler\',\'Group\',\'adlt_age\');" /><span style="cursor:pointer;" onClick="wrt_chkVal(\'chkGroup\');disp_none(\'chkGroup\');">Groups </span></span>
				  </div>
				  
				  <div id="adlt_age" class="font-medium" style="width:100%; float:left; margin-top:10px; display:none; font-size:12px;">
				  <span>Age group:
					<input type="checkbox" value="Under 45"  name="chkage45" id="chkage45" onClick="wrt_chkVal(\'chkage45\',\'txtMod_trvler\',\'Under45\');" />
					<span style="cursor:pointer;" onClick="wrt_chkVal(\'chkage45\',\'txtMod_trvler\',\'Under45\');"> Under 45</span> 
				    <input type="checkbox" value="Above 45" name="chkage45plus" id="chkage45plus" onClick="wrt_chkVal(\'chkage45plus\',\'txtMod_trvler\',\'Above45\');">
					 <span style="cursor:pointer;" onClick="wrt_chkVal(\'chkage45plus\',\'txtMod_trvler\',\'Above45\');">Above 45</span></span>
				</div>
					
				  <div class="font-medium" style="width:100%; float:left;  margin-top:10px; font-size:12px;">
				   <span><input type="checkbox" value="Family+Kids" id="chkFamilykid" name="chkFamilykid" onClick="wrt_chkVal(\'chkFamilykid\',\'txtMod_trvler\',\'Family+Kids\'); showAge(this.id,\'kids_age\');"><span style="cursor:pointer;" onClick="wrt_chkVal(\'chkGroup\',\'txtMod_trvler\',\'Group\');"> Family+Kids</span>.</span>
				  <span><input type="checkbox" value="Group+Kids"  id="chkGroupkid" name="chkGroupkid" onClick="wrt_chkVal(\'chkFamilykid\',\'txtMod_trvler\',\'Family+Kids\'); showAge(this.id,\'kids_age\');"><span style="cursor:pointer;" onClick="wrt_chkVal(\'chkGroup\',\'txtMod_trvler\',\'Group\');">Group+Kids</span></span>
				  </div>
				
				     <div id="kids_age" class="font-medium" style="display:none; width:100%; float:left;  margin-top:10px; font-size:12px;">
						<span>Kid\'s Age:
						<input type="checkbox" id="chkkid" name="chkkid" value="0-2Yrs" />
						<span style="cursor:pointer;" onClick="wrt_chkVal(\'chkkid\',\'txtMod_trvler\',\'Kids 0-2Yrs\');">0-2Yrs</span>	
				 		 <input type="checkbox" id="chkchild"  name="chkchild" value="2-12Yrs" onClick="wrt_chkVal(\'chkchild\',\'txtMod_trvler\',\'Kids 2-12Yrs\');" />
						 <span style="cursor:pointer;" onClick="wrt_chkVal(\'chkchild\',\'txtMod_trvler\',\'Kids 2-12Yrs\');">2-12Yrs </span>
			<input type="checkbox" id="chkchildplus"  name="chkchildplus" value="12+Yrs"  onClick="wrt_chkVal(\'chkchildplus\',\'txtMod_trvler\',\'Kids 12+\');"/>
			<span style="cursor:pointer;" onClick="wrt_chkVal(\'chkchildplus\',\'txtMod_trvler\',\'Kids 12+\');">12+Yrs </span>
						 </span>
							</div>
					
					</div>
				</div>		   
			   </div>
   </td>
 </tr>
  <tr>
   <th align="right">Validity</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_valid_frm" name="txtMod_valid_frm" class="txtbox_Tab" style="width:40%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$valid[0].'" onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" />&nbsp; to &nbsp;
   <input type="text" id="txtMod_valid_till" name="txtMod_valid_till" class="txtbox_Tab" style="width:40%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$valid[1].'" onclick="oDP.show(event,this.id,2); show_block(\'TripDates\');" />
   </td>
 </tr>
 <tr>
  <th align="right">Trip Dates</th>
   <td>:</td>
   <td align="left"><input type="text" name="txtMod_trpDt" id="txtMod_trpDt" class="txtbox_Tab" style="width:80%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["trip_dates"].'" />
   <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="errase(\'txtMod_trpDt\'); show_block(\'sp_trpDt\');">Edit</span>
   <span id="sp_trpDt" style="float:left; display:none;">
   <input type="text" id="txtDts" class="txtbox_Tab" style="width:90px; padding:3px; border:1px solid #999; outline:none; font-size:12px;" onchange=" putValTxt(\'txtDts\',\'txtMod_trpDt\');" />
   <img src="Images/calendar_icon.jpg" width="25px" height="20px" onclick="oDP.show(event,\'txtDts\',2); ShowContent(\'TripDates\');" />
   <input type="button" class="smallbtn" style="width:40px;" value="Add" onclick=" putValTxt(\'txtDts\',\'txtMod_trpDt\'); hide_block(\'TripDates\');" />
   </span>
   </td>
 </tr>
  <tr>
  <th align="right">Package Post Dates</th>
   <td>:</td>
   <td align="left"><input type="text" name="txtMod_postDtFrm" class="txtbox_Tab" style="width:90px; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$postDt[0].'" onclick="oDP.show(event,this.id,2);ShowContent(\'TripDates\');" /> &nbsp; to &nbsp; <input type="text" name="txtMod_postDtTo" class="txtbox_Tab" style="width:90px; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$postDt[1].'" onclick="oDP.show(event,this.id,2);ShowContent(\'TripDates\');" /> </td>
 </tr>
  <tr>
   <th align="right">Inclusions</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_incls" name="txtMod_incls" class="txtbox_Tab" style="width:80%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["incls"].'" />
   <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="errase(\'txtMod_incls\'); show_block(\'div_incl\');">Edit</span>
   <div id="div_incl" class="popUp_imgs_div" style="width:400px; height:260px; z-index:10000; margin-left:-50px; overflow-y:scroll; overflow-x:hidden;">
      		
			<div style="float:left; width:100%;">
			  <span style="float:right;"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'div_incl\');" /></span>
			</div>
			
			   <div style="float:left; width:100%;">
			     <span>Please select package inclusions from below</span>
			   </div>		
			   	    
				<div style="width:100%; float:left; margin-top:5px;">
			      <span class="font-medium" style="float:left; width:100%; text-align:left"><input type="checkbox" id="chkIncl_1"  name="chkIncl_1" value="Accomodation" onClick="selIncl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkIncl_1\');">Accomodation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_2" name="chkIncl_2" value="Transport" onClick="selIncl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkIncl_2\'); check_trp(this.id);">Transportation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_3" name="chkIncl_3" value="Local Transport" onClick="selIncl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkIncl_3\'); check_trp(this.id);">Local Transport</span></span>		
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_4" name="chkIncl_4" value="Sightsee/Attractions" onClick="selIncl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkIncl_4\');">Sightseeing/Attractions</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkIncl_5" name="chkIncl_5" value="Trip Guide" onClick="selIncl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkIncl_5\');">Trip Guide</span></span>	
				    
			   </div>

			   <div style="width:100%; float:left;">
			<span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkOtherFac" onClick="selIncl_mod(this.id); create_Oth_incl(\'chkOtherFac\');" style="float:left;" /><span style="cursor:pointer;" onClick="selIncl_mod_sp(\'chkOtherFac\');create_Oth_incl(\'chkOtherFac\');">Others</span></span>
			   </div>
			   
			   <div id="div_pck_incl" style="float:left; height:80px; overflow-y:scroll; overflow-x:hidden; width:250px; display:none;">
			     <table id="tab_faci" style="float:left; width:100%; font-size:12px;">			   
				 </table>
			   </div>
   </div>
   </td>
 </tr>
  <tr>
   <th align="right">Exclusions</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_excls" name="txtMod_excls" class="txtbox_Tab" style="width:80%; padding:3px;border:1px solid #999; outline:none; font-size:12px;" value="'.$row["excls"].'" />
   <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="errase(\'txtMod_excls\'); show_block(\'div_excl\');">Edit</span>
    <div id="div_excl" class="popUp_imgs_div" style="width:400px; height:260px;  margin-left:-50px; overflow-y:scroll; overflow-x:hidden;">
	<div style="float:left; width:100%;">
			  <span style="float:right;"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'div_excl\');" /></span>
			</div>
	
			   <div class="headerTitle" style="margin-bottom:0px; font-size:12px;">
			     <span>Please select package exclusions from below</span>
			   </div>
			    
				<div style="width:100%; float:left; margin-top:3px; font-size:12px;">
			      <span class="font-medium" style="float:left; width:100%; text-align:left; font-size:12px;">
				  <input type="checkbox" id="chkExcl_1"  name="chkExcl_1" value="Accomodation" onClick="selExcl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkExcl_1\');">Accomodation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left; font-size:12px;">
				  <input type="checkbox" id="chkExcl_2" name="chkExcl_2" value="Transport" onClick="selExcl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkExcl_2\'); check_trp(this.id);">Transportation</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left; font-size:12px;">
				  <input type="checkbox" id="chkExcl_3" name="chkExcl_3" value="Local Transport" onClick="selExcl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkExcl_3\'); check_trp(this.id);">Local Transport</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left; font-size:12px;">
				  <input type="checkbox" id="chkExcl_4" name="chkExcl_4" value="Sightsee/Attractions" onClick="selExcl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkExcl_4\');">Sightseeing/Attractions</span></span>
				  <span class="font-medium" style="float:left; width:100%;  text-align:left; font-size:12px;">
				  <input type="checkbox" id="chkExcl_5" name="chkExcl_5" value="Trip Guide" onClick="selExcl_mod(this.id);" style="float:left;" /><span class="font-medium" style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkExcl_5\');">Trip Guide</span></span>				  		  
			   </div>

			   <div style="width:100%; float:left;">
			<span class="font-medium" style="float:left; width:100%;  text-align:left"><input type="checkbox" id="chkOtherFac_excl" onClick="selExcl_mod(this.id); create_Oth_excl(\'chkOtherFac_excl\');" style="float:left;" /><span style="cursor:pointer;" onClick="selExcl_mod_sp(\'chkOtherFac_excl\'); create_Oth_excl(\'chkOtherFac_excl\');">Others</span></span>
			   </div>
			   
			   <div id="div_pck_excl" style="float:left; height:80px; overflow-y:scroll; overflow-x:hidden; width:250px; display:none;">
			     <table id="tab_faci_excl" style="float:left; width:100%; font-size:12px;">			   
				 </table>
			   </div>			
			 
	</div>
   </td>
 </tr>
 <tr>
  <td align="right">Trip Agenda</td>
  <td>:</td>
  <td align="left"><input type="text" id="txtMod_agenda" name="txtMod_agenda" class="txtbox_Tab" style="width:50%; padding:3px;border:1px solid #999; outline:none; font-size:12px; float:left;" value="'.$row["pck_agenda_dtl"].'" />
  <span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="show_block(\'trp_ag1\'); show_block(\'trp_age2\'); errase(\'txtMod_agenda\');">Edit</span> 
  <div id="trp_ag1" style="width:100%; float:left; display:none;">
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_act" name="chkMod_act" value="Activities" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Activities</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_sig" name="chkMod_sig" value="Sightsee" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Sightsee</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_rest" name="chkMod_rest" value="Rest-Relaxation" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Rest&Relaxation</span>
     <span style="float:left; margin-left:3px; font-size:12px; visibility:hidden;">
	 <input type="radio" id="rdMod_multi" name="rdMod_multi" value="Multiple" />Multiple</span>
	 </div>
   <div id="trp_age2" style="float:left; width:100%; display:none;">
    <span style="float:left; font-size:12px;"> For Adventure Tour only : &nbsp; &nbsp;</span>
	<span style="float:left; margin-left:3px; font-size:12px;">
	<input type="checkbox" id="chkMod_land" name="chkMod_land" value="Land" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Land</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_water" name="chkMod_water" value="Water" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Water</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_sky" name="chkMod_sky" value="Sky" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Sky</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_mount" name="chkMod_mount" value="Mountain" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Mountain</span>
   <span style="float:left; margin-left:3px; font-size:12px;">
   <input type="checkbox" id="chkMod_frst" name="chkMod_frst" value="Forest" onclick="putValIncl(this.id,this.value,\'txtMod_agenda\');" />Forest</span>
   </div>
  </td>
 </tr>
  <tr>
  <td align="right">Trip Intensity</td>
  <td>:</td>
  <td align="left"><input type="text" id="txtMod_inten" name="txtMod_inten" class="txtbox_Tab" style="width:20%; padding:3px;border:1px solid #999; outline:none; font-size:12px;" value="'.$inten.'" /><span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="show_block(\'sp_inten\'); errase(\'txtMod_inten\');">Edit</span>
  <span id="sp_inten" style="display:none;">
  &nbsp; <input type="radio" name="rdInt_Mod" id="rdHigh" value="H" onclick="selTxt(\'High\',\'txtMod_inten\');" />High &nbsp;
  <input type="radio" name="rdInt_Mod" id="rdMed" value="M" onclick="selTxt(\'Medium\',\'txtMod_inten\');"  />Medium &nbsp;
  <input type="radio" name="rdInt_Mod" id="rdLow" value="L" onclick="selTxt(\'Low\',\'txtMod_inten\');"  />Low &nbsp;
  </span>
  </td>
 </tr>
 <tr>
   <th align="right">Inventory </th>
   <td>:</td>
   <td align="left"> <input id="txtMod_inv" name="txtMod_inv" class="txtbox_Tab" style="width:10%; padding:3px;border:1px solid #999; outline:none; font-size:12px;" value="'.$row["inventory"].'" /></td>
 </tr>
 <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
  <tr>
   <th align="right">Cost</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_pckCost" name="txtMod_pckCost" class="txtbox_Tab" style="width:50%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$pckCost.'" onmouseout="calc_tax_mod();" onchange="calc_tax_mod();" /></td>
 </tr> <tr>
   <th align="right">Service Tax</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_serv" name="txtMod_serv" class="txtbox_Tab" style="width:50%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$prc_ser.'" onmouseout="calc_tax_mod();" onclick="calc_tax_mod();" /></td>
 </tr> 
 <tr>
   <th align="right">Other cess:</th>
   <td>:</td>
   <td align="left"><input type="text" id="txtMod_edu" name="txtMod_edu" class="txtbox_Tab" style="width:50%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$prc_edu.'" onmouseout="calc_tax_mod();" onclick="calc_tax_mod();" /></td>
 </tr>
  <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
 <tr>
   <th align="right">Total</th>
   <td>:</td>
   <td align="left"><input type="text" class="txtbox_Tab" id="txtMod_price" name="txtMod_price" style="width:40%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" value="'.$price.'" onmouseout="calc_tax_mod();" onclick="calc_tax_mod();" /> &nbsp; &nbsp; <input type="text" id="txtMod_based" name="txtMod_based" class="txtbox_Tab" style="width:50%; padding:3px; border:1px solid #999; outline:none; font-size:12px;" placeholder="per person,couple,group(#adults, #kids), Others(specify details)" value="'.$prc_based.'" /></td>
 </tr>
 <tr>
  <th align="right">Package Posted as</th>
  <td>:</td>
  <td align="left">
  <input type="text" id="txtPckShown" name="txtPckShown" class="txtbox_Tab" style="width:100px;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["pckshownAs"].'" /><span style="color:#0066ff; cursor:pointer; font-size:12px; margin-left:5px;" onclick="show_block(\'sp_pckShown\'); errase(\'txtPckShown\');">Edit</span><br/>
  <span id="sp_pckShown" style="display:none;">
  <input type="radio" id="rdShown_N" name="rdShown_Mod" value="Normal" onclick="wrt_val(this.id,\'txtPckShown\',this.value);" />Normal &nbsp;
  <input type="radio" id="rdShown_H" name="rdShown_Mod" value="Highlighted" onclick="wrt_val(this.id,\'txtPckShown\',this.value);" />Highlighted &nbsp;
  <input type="radio" id="rdShown_T7" name="rdShown_Mod" value="Top 7" onclick="wrt_val(this.id,\'txtPckShown\',this.value);" />Top 7 &nbsp;
  </span>
  </td>
 </tr> 
 <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
 </table>
</span>
<div style="width:100%; float:left; border:1px solid #444;"></div>
</div>';
}
}
echo '<div style="float:left; width:100%;"><label class="PckFonts">Itinerary</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:10px">';
echo '<table id="mod_attr" width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed; word-wrap:break-word;">';
if($res_pck_itin)
{
$k=0;
echo '<tr style="background:#0066ff; color:#fff;">
<th width="100px" align="left">Location</th>
<th width="30px" align="left">Day</th>
<th width="60px" align="left">Category</th>
<th width="100px" align="left">Attraction</th>
<th width="50px" align="left">Start Time</th>
<th width="50px" align="left">End Time</th>
<th width="40px" align="left">Time Allocated</th>
<th width="50px" align="left">Add</th>
<th width="30px" align="left">Remove</th>
</tr>';
if($itin_rows >0)
{
while($row = mysqli_fetch_array($res_pck_itin))
{
$k++;
echo '<tr>
<td><input type="text" name="txtAttrMod_loc_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["loc_name"].'" /></td>
<td><input type="text" name="txtAttrMod_day_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["day"].'" /></td>
<td><input type="text" name="drpAttrMod_cate_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["attr_cate"].'" /></td>
<td><input type="text" name="txtAttrMod_attr_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["attr_name"].'" /></td>
<td><input type="text" name="txtAttrMod_str_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["start_time"].'" /></td>
<td><input type="text" name="txtAttrMod_arv_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["arrival_time"].'" /></td>
<td><input type="text" name="txtAttrMod_tm_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["time_allocated"].'" /></td>
<td><input type="button" class="smallbtn" style="width:40px;" value="Add" onclick="addRow_mod_attr();" /></td>
<td><img src="Images/closebtn.png" width="20px" height="20px" /></td>
</tr>';
}
}
else
{
echo '<tr>
<td><input type="text" name="txtAttrMod_loc_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
<td><input type="text" name="txtAttrMod_day_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
<td><input type="text" name="drpAttrMod_cate_1" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td>
<td><input type="text" name="txtAttrMod_attr_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
<td><input type="text" name="txtAttrMod_str_1" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" /></td>
<td><input type="text" name="txtAttrMod_arv_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
<td><input type="text" name="txtAttrMod_tm_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" /></td>
<td><input type="button" class="smallbtn" style="width:40px;" value="Add" onclick="addRow_mod_attr();" /></td>
<td><img src="Images/closebtn.png" width="20px" height="20px" /></td>
</tr>';
}
}

echo '</table>';
echo '<input type="text" id="txtAttrmod_rows" name="txtAttrmod_rows" style="visibility:hidden;" />';
echo '</div>';
echo '<div style="width:100%; float:left; border:1px solid #444;"></div>';
//<td rowspan="9" width="40%"><img src="data:image/jpg;base64,'.base64_encode($row["htl_img"]).'" width="200px" height="200px" /></td>
echo '<div style="float:left; width:100%;"><label class="PckFonts">Accomodation</label></div>';
echo '<div style="float:left;width:100%; margin-top:10px; margin-left:5px;">';
if($res_pck_htl)
{
$k=0;
echo '<span style="float:left: width :80%; margin-left:10px;">
  <table id="tabMod_htl" width="100%" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-family:Calibri; table-layout:fixed; word-wrap:break-word; font-size:14px;">';
  echo '<tr style="background:#0066ff; color:#fff;">
<th width="60px" align="left">Location</th>
<th width="50px" align="left">Hotel Name</th>
<th width="30px" align="left">Duration</th>
<th width="30px" align="left">Star Rate</th>
<th width="30px" align="left">Rooms</th>
<th width="50px" align="left">Occupancy</th>
<th width="40px" align="left">Extra Bed</th>
<th width="40px" align="left">Food Type</th>
<th width="90px" align="left">Inclusions</th>
<th width="90px" align="left">Exclusions</th>
<th width="80px" align="left">Images</th>
<th width="30px" align="left">Add</th>
<th width="30px" align="left">Remove</th>
</tr>';
if($htl_rows>0)
{
while($row = mysqli_fetch_array($res_pck_htl))
{
$k++;
    echo '<tr id="tr_htl_'.$k.'">	
	 <td align="left"><input type="text" name="txtHtlMod_loc_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["loc_name"].'" /></td>
	 <td align="left"><input type="text" name="txtHtlMod_htl_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["htl_name"].'" /></td>
	 <td align="left"><input type="text" name="txtHtlMod_dur_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["duration"].'" /></td>
     <td align="left"><select name="txtHtlMod_star_'.$k.'" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" />
	 <option value="'.$row["star_rate"].'">'.$row["star_rate"].'</option>
	 <option value="*">*</option>
	 <option value="**">**</option>
	 <option value="***">***</option>
	 <option value="****">****</option>
	 <option value="*****">*****</option>
	 </select>
	 </td>
	 <td align="left">
	 <input type="text" name="txtHtlMod_room_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["rooms"].'" /></td>
	 <td align="left">
	 <select name="txtHtlMod_occ_'.$k.'" style="width:100%;  border:1px solid #999; font-size:12px;">
	 <option value="'.$row["occupancy"].'">'.$row["occupancy"].'</option>
	 <option value="Single">Single</option>
	 <option value="Twin Share">Twin Share</option>
	 <option value="Twin+Extra Bed">Twin+Extra Bed</option>
	 </select>
	 </td>
	 <td><input type="text" class="txtbox_Tab" name="txtHtlMod_bed_'.$k.'" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["extra_bed"].'" /></td>
	 <td align="center">
	 <select name="txtHtlMod_food_'.$k.'" style="width:100%; border:1px solid #999; font-size:12px;;">
	 <option value="'.$row["food_type"].'">'.$row["food_type"].'</option>
	 <option value="Veg">Veg</option>
	 <option value="Non-Veg">Non-Veg</option>
	 <option value="Jain">Jain</option>
	 </select>
	 </td>
	 <td align="left"><input type="text" id="txtHtlMod_incl_'.$k.'" name="txtHtlMod_incl_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["incl"].'" />
	 <div class="div_dropdown_crt" style="font_size:12px; width:100%; margin-left:0px;">
			<span class="font-medium" style="font-size:12px;" onclick="show_block(\'div_incl_'.$k.'\'); show_block(\'up_arrow_incl_'.$k.'\'); hide_block(\'down_arrow_incl_'.$k.'\');"> -------Inclusions------- </span>			
			
			<span id="down_arrow_incl_'.$k.'" class="span_drpImg_crt"  style="display:block; margin-top:-20px;">
			<span onClick="show_block(\'div_incl_'.$k.'\'); show_block(\'up_arrow_incl_'.$k.'\'); hide_block(\'down_arrow_incl_'.$k.'\');">
			<img src="Images/dropdown_arrow_icon3.png" width="13px" height="13px"/></span></span>
			
			<span id="up_arrow_incl_'.$k.'" class="span_drpImg_crt" style="display:none;  margin-top:-20px;">
			<span onClick="hide_block(\'div_incl_'.$k.'\'); hide_block(\'up_arrow_incl_'.$k.'\'); show_block(\'down_arrow_incl_'.$k.'\');">
			<img src="Images/dropdownlast_arrow_icon.png" width="13px" height="13px" /></span></span>
			
			</div>
			<div id="div_incl_'.$k.'" class="div_drpListItems_crt" style="margin-top:30px; font-size:12px;">
			<span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="inclBf_'.$k.'" name="inclBf_'.$k.'" value="Breakfast" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Breakfast</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="inclLun_'.$k.'" name="inclLun_'.$k.'" value="Lunch" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Lunch</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclDin_'.$k.'" name="inclDin_'.$k.'" value="Dinner" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Dinner</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclLndry_'.$k.'" name="inclLndry_'.$k.'" value="Laundry" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Laundry</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="inclSpa_'.$k.'" name="inclSpa_'.$k.'" value="SPA" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>SPA</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclAlco_'.$k.'" name="inclAlco_'.$k.'" value="Alcoholic Beverages" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Alcoholic Beverages</span>
		  <span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="inclWifi_'.$k.'" name="inclWifi_'.$k.'" value="Wifi" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_'.$k.'\');"/>Wifi</span>
		  <span class="span_drpListItems_crt" style="font-size:10px;">
		  If others, specify in box above
		  </span>		 
			   
			 <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block(\'div_incl_'.$k.'\');  hide_block(\'up_arrow_incl_'.$k.'\'); show_block(\'down_arrow_incl_'.$k.'\');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div>
	 
	 
	 </td>
	 <td align="left"><input type="text" id="txtHtlMod_excl_'.$k.'" name="txtHtlMod_excl_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["excl"].'" />
	 
	 <div class="div_dropdown_crt" style="font_size:12px; width:100%; margin-left:0px;">
			<span class="font-medium" style="font-size:12px;" onclick="show_block(\'div_excl_'.$k.'\'); show_block(\'up_arrow_excl_'.$k.'\'); hide_block(\'down_arrow_excl_'.$k.'\');"> -------Exclusions------- </span>			
			
			<span id="down_arrow_excl_'.$k.'" class="span_drpImg_crt"  style="display:block; margin-top:-20px;">
			<span onClick="show_block(\'div_excl_'.$k.'\'); show_block(\'up_arrow_excl_'.$k.'\'); hide_block(\'down_arrow_excl_'.$k.'\');">
			<img src="Images/dropdown_arrow_icon3.png" width="13px" height="13px"/></span></span>
			
			<span id="up_arrow_excl_'.$k.'" class="span_drpImg_crt" style="display:none;  margin-top:-20px;">
			<span onClick="hide_block(\'div_excl_'.$k.'\'); hide_block(\'up_arrow_excl_'.$k.'\'); show_block(\'down_arrow_excl_'.$k.'\');">
			<img src="Images/dropdownlast_arrow_icon.png" width="13px" height="13px" /></span></span>
			
			</div>
			<div id="div_excl_'.$k.'" class="div_drpListItems_crt" style="margin-top:30px; font-size:12px;">
			<span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="exclBf_'.$k.'" name="exclBf_'.$k.'" value="Breakfast" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Breakfast</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="exclLun_'.$k.'" name="exclLun_'.$k.'" value="Lunch" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Lunch</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclDin_'.$k.'" name="exclDin_'.$k.'" value="Dinner" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Dinner</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclLndry_'.$k.'" name="exclLndry_'.$k.'" value="Laundry" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Laundry</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="exclSpa_'.$k.'" name="exclSpa_'.$k.'" value="SPA" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>SPA</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclAlco_'.$k.'" name="exclAlco_'.$k.'" value="Alcoholic Beverages" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Alcoholic Beverages</span>
		  <span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="exclWifi_'.$k.'" name="exclWifi_'.$k.'" value="Wifi" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_'.$k.'\');"/>Wifi</span>
		  <span class="span_drpListItems_crt" style="font-size:10px;">
		  If others, specify in box above
		  </span>		 
			   
			 <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block(\'div_excl_'.$k.'\');  hide_block(\'up_arrow_excl_'.$k.'\'); show_block(\'down_arrow_excl_'.$k.'\');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div>
	 
	 </td>
	 <td><img src="data:image/jpg;base64,'.base64_encode($row["htl_img"]).'" width="100%" height="30px" /></td>
	 <td align="left"><input type="button" class="smallbtn" style="width:40px;" value="Add" onclick="addRow_mod_htl();" /></td>
	 <td align="left"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'tr_htl_'.$k.'\')" /></td>
	</tr>';
}
}
else
{
 echo '<tr>	
	 <td align="left"><input type="text" name="txtHtlMod_loc_1" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td>
	 <td align="left"><input type="text" name="txtHtlMod_htl_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
	 <td align="left"><input type="text" name="txtHtlMod_dur_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" /></td>
     <td align="left"><select name="txtHtlMod_star_1" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" />
	  <option value="*">*</option>
	 <option value="**">**</option>
	 <option value="***">***</option>
	 <option value="****">****</option>
	 <option value="*****">*****</option>
	 </select>
	 </td>
	 <td align="left">
	 <input type="text" name="txtHtlMod_room_1" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" /></td>
	 <td align="left">
	 <select name="txtHtlMod_occ_1" style="width:100%;  border:1px solid #999; font-size:12px;">
	  <option value="Single">Single</option>
	 <option value="Twin Share">Twin Share</option>
	 <option value="Twin+Extra Bed">Twin+Extra Bed</option>
	 </select>
	 </td>
	 <td><input type="text" class="txtbox_Tab" name="txtHtlMod_bed_1" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
	 <td align="center">
	 <select name="txtHtlMod_food_1" style="width:100%; border:1px solid #999; font-size:12px;;">	
	 <option value="Veg">Veg</option>
	 <option value="Non-Veg">Non-Veg</option>
	 <option value="Jain">Jain</option>
	 </select>
	 </td>
<td align="left"><input type="text" id="txtHtlMod_incl_1" name="txtHtlMod_incl_1" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" />
	 <div class="div_dropdown_crt" style="font_size:12px; width:100%; margin-left:0px;">
			<span class="font-medium" style="font-size:12px;" onclick="show_block(\'div_incl_1\'); show_block(\'up_arrow_incl_1\'); hide_block(\'down_arrow_incl_1\');"> -------Inclusions------- </span>			
			
			<span id="down_arrow_incl_1" class="span_drpImg_crt"  style="display:block; margin-top:2px;">
			<span onClick="show_block(\'div_incl_1\'); show_block(\'up_arrow_incl_1\'); hide_block(\'down_arrow_incl_1\');">
			<img src="Images/dropdown_arrow_icon3.png" width="13px" height="13px"/></span></span>
			
			<span id="up_arrow_incl_1" class="span_drpImg_crt" style="display:none;  margin-top:2px;">
			<span onClick="hide_block(\'div_incl_1\'); hide_block(\'up_arrow_incl_1\'); show_block(\'down_arrow_incl_1\');">
			<img src="Images/dropdownlast_arrow_icon.png" width="13px" height="13px" /></span></span>
			
			</div>
			<div id="div_incl_1" class="div_drpListItems_crt" style="margin-top:30px; font-size:12px;">
			<span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="inclBf_1" name="inclBf_1" value="Breakfast" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Breakfast</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="inclLun_1" name="inclLun_1" value="Lunch" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Lunch</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclDin_1" name="inclDin_1" value="Dinner" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Dinner</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclLndry_1" name="inclLndry_1" value="Laundry" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Laundry</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="inclSpa_1" name="inclSpa_1" value="SPA" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>SPA</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="inclAlco_1" name="inclAlco_1" value="Alcoholic Beverages" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Alcoholic Beverages</span>
		  <span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="inclWifi_1" name="inclWifi_1" value="Wifi" onclick="putValIncl(this.id,this.value,\'txtHtlMod_incl_1\');"/>Wifi</span>
		  <span class="span_drpListItems_crt" style="font-size:10px;">
		  If others, specify in box above
		  </span>		 
			   
			 <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block(\'div_incl_1\');  hide_block(\'up_arrow_incl_1\'); show_block(\'down_arrow_incl_1\');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div>
	 
	 
	 </td>
	 <td align="left">
	 <input type="text" id="txtHtlMod_excl_1" name="txtHtlMod_excl_1" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  />
	 
	 <div class="div_dropdown_crt" style="font_size:12px; width:100%; margin-left:0px;">
			<span class="font-medium" style="font-size:12px;" onclick="show_block(\'div_excl_1\'); show_block(\'up_arrow_excl_1\'); hide_block(\'down_arrow_excl_1\');"> -------Exclusions------- </span>			
			
			<span id="down_arrow_excl_1" class="span_drpImg_crt"  style="display:block; margin-top:2px;">
			<span onClick="show_block(\'div_excl_1\'); show_block(\'up_arrow_excl_1\'); hide_block(\'down_arrow_excl_1\');">
			<img src="Images/dropdown_arrow_icon3.png" width="13px" height="13px"/></span></span>
			
			<span id="up_arrow_excl_1" class="span_drpImg_crt" style="display:none;  margin-top:2px;">
			<span onClick="hide_block(\'div_excl_1\'); hide_block(\'up_arrow_excl_1\'); show_block(\'down_arrow_excl_1\');">
			<img src="Images/dropdownlast_arrow_icon.png" width="13px" height="13px" /></span></span>
			
			</div>
			<div id="div_excl_1" class="div_drpListItems_crt" style="margin-top:30px; font-size:12px;">
			<span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="exclBf_1" name="exclBf_1" value="Breakfast" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Breakfast</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="exclLun_1" name="exclLun_1" value="Lunch" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Lunch</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclDin_1" name="exclDin_1" value="Dinner" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Dinner</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclLndry_1" name="exclLndry_1" value="Laundry" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Laundry</span>
		  <span class="span_drpListItems_crt" style= font-size:12px;">
		  <input type="checkbox" id="exclSpa_1" name="exclSpa_1" value="SPA" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>SPA</span>
		  <span class="span_drpListItems_crt" style=" font-size:12px;">
		  <input type="checkbox" id="exclAlco_1" name="exclAlco_1" value="Alcoholic Beverages" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Alcoholic Beverages</span>
		  <span class="span_drpListItems_crt" style="font-size:12px;">
		  <input type="checkbox" id="exclWifi_1" name="exclWifi_1" value="Wifi" onclick="putValIncl(this.id,this.value,\'txtHtlMod_excl_1\');"/>Wifi</span>
		  <span class="span_drpListItems_crt" style="font-size:10px;">
		  If others, specify in box above
		  </span>		 
			   
			 <span class="span_drpListItems_crt" style="text-align:center;">
			   <span onClick="hide_block(\'div_excl_1\');  hide_block(\'up_arrow_excl_1\'); show_block(\'down_arrow_excl_1\');" >
			   <img src="Images/dropdownlast_arrow_icon.png" width="30px" height="20px"/></span>
			   </span>			   
			</div>
	 
	 </td>
	 <td><input type="file" name="HtlImg_1" id="HtlImg_1" style="width:20px; height:20px;" /></td>
	 <td align="left"><input type="button" class="smallbtn" style="width:40px;" value="Add" onclick="addRow_mod_htl();" /></td>
	 <td align="left"><img src="Images/closebtn.png" width="20px" height="20px" /></td>
	</tr>';
}
echo  ' </table>';
echo '<input type="text" id="txtHtlMod_rows" name="txtHtlMod_rows" style="visibility:hidden;" />';
}
echo '</span>
</div>';


if($res_pck_trp)
{
echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Tranportation</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:5%">';
echo '<table width="90%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:15px; font-family:Calibri; table-layout:fixed; word-wrap:break-word;">';
echo '<tr style="background:#ff0000; color:#fff;">
<th colspan="4">Onward Journey</th>
<th colspan="4">Return Journey</th>
<tr style="background:#0066ff; color:#fff;">
<th width="80px" align="left">From Location</th>
<th width="80px" align="left">To Location</th>
<th width="60px" align="left">Mode</th>
<th width="60px" align="left">Means</th>
<th width="80px" align="left">From Location</th>
<th width="80px" align="left">To Location</th>
<th width="60px" align="left">Mode</th>
<th width="60px" align="left">Means</th>
</tr>';
if($trp_rows>0)
{
 while($row = mysqli_fetch_array($res_pck_trp))
{
echo '<tr>';
echo '<td><input type="text" id="txtMod_trp_OWfrm" name="txtMod_trp_OWfrm" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_onwd_from_dest"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_OWto" name="txtMod_trp_OWto" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_onwd_to_dest"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_OWmode" name="txtMod_trp_OWmode" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_onwd_trv_mode"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_OWmeans" name="txtMod_trp_OWmeans" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_onwd_trnsf_means"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtfrm" name="txtMod_trp_Rtfrm" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_ret_from_dest"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtto" name="txtMod_trp_Rtto" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_ret_to_dest"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtmode" name="txtMod_trp_Rtmode" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_ret_trv_mode"].'" /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtmeans" name="txtMod_trp_Rtmeans" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["IC_ret_trf_means"].'" /></td>';
echo '</tr>';
}
}
else
{
echo '<tr>';
echo '<td><input type="text" id="txtMod_trp_OWfrm" name="txtMod_trp_OWfrm" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>';
echo '<td><input type="text" id="txtMod_trp_OWto" name="txtMod_trp_OWto" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>';
echo '<td><input type="text" id="txtMod_trp_OWmode" name="txtMod_trp_OWmode" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" /></td>';
echo '<td><input type="text" id="txtMod_trp_OWmeans" name="txtMod_trp_OWmeans" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtfrm" name="txtMod_trp_Rtfrm" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtto" name="txtMod_trp_Rtto" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtmode" name="txtMod_trp_Rtmode" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>';
echo '<td><input type="text" id="txtMod_trp_Rtmeans" name="txtMod_trp_Rtmeans" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"/></td>';
echo '</tr>';
}
echo '</table>';
echo '</div>';

}
echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Point to Point Tranfer</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px;  margin-left:23%;">';
echo '<table id="tabMod_p2p" width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:15px; font-family:Calibri; table-layout:fixed; word-wrap:break-word;">';
echo '<tr style="background:#0066ff; color:#fff;">
 <th align="left" width="80px">Origin</th>
 <th align="left" width="80px"> Destination</th>
 <th align="left" width="70px"> Mode </th>
 <th align="left" width="70px"> Means</th>
 </tr>';
if($res_pck_ltrvl)
{
$k=0;
if($p2p_rows > 0)
{
 while($row = mysqli_fetch_array($res_pck_ltrvl))
{
$k++;
echo '<tr>
<td><input type="text" name="txtMod_origin_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["P2P_origin"].'" /></td> 
 <td><input type="text" name="txtMod_dest_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["P2P_dest"].'" /></td>
 <td><input type="text" name="txtMod_mode_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["P2P_mode"].'" /></td>
 <td><input type="text" name="txtMod_means_'.$k.'" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" value="'.$row["P2P_means"].'" /></td>
  <td><input type="button" class="smallbtn" style="width:40px; border:1px solid #999; outline:none; font-size:12px;" value="Add" onclick="addMod_p2p();"  /></td>
 <td></td>
</tr>';
}
}
else
{
echo '<tr>
<td><input type="text" name="txtMod_origin_2" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;" /></td> 
 <td><input type="text" name="txtMod_dest_2" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
 <td><input type="text" name="txtMod_mode_2" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td>
 <td><input type="text" name="txtMod_means_2" class="txtbox_Tab" style="width:100%;  border:1px solid #999; outline:none; font-size:12px;"  /></td>
 <td><input type="button" class="smallbtn" style="width:40px; border:1px solid #999; outline:none; font-size:12px;" value="Add" onclick="addMod_p2p();"  /></td>
 <td></td>
</tr>';
}
}
echo '</table>';
echo '<input type="text" id="txtp2pMod_rows" name="txtp2pMod_rows" style="visibility:hidden;" />';
echo '</div>';

echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Local Tranfer</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:25%;">';
echo '<table id="tabMod_lcl" width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:15px; font-family:Calibri; table-layout:fixed; word-wrap:break-word;">';
echo '<tr style="background:#0066ff; color:#fff;">
 <td width="100px">Location</td>
 <td width="70px"> Mode </td>
 <td width="70px"> Means</td>
 </tr>';
if($res_pck_ltrv_lcl)
{
$k=0;
if($p2p_rows>0)
{
 while($row = mysqli_fetch_array($res_pck_ltrv_lcl))
{
$k++;
echo '<tr>
<td><input type="text" name="txtMod_lloc_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["local_loc"].'" /></td> 
 <td><input type="text" name="txtMod_lmode_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["local_mode"].'" /></td>
 <td><input type="text" name="txtMod_lmeans_'.$k.'" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;" value="'.$row["local_means"].'" /></td>
  <td><input type="button" class="smallbtn" style="width:40px; border:1px solid #999; outline:none; font-size:12px;" value="Add" onclick="addMod_lcl();"  /></td>
 <td></td>
</tr>';
}
}
else
{
echo '<tr>
<td><input type="text" name="txtMod_lloc_2" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td> 
 <td><input type="text" name="txtMod_lmode_2" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td>
 <td><input type="text" name="txtMod_lmeans_2" class="txtbox_Tab" style="width:100%; border:1px solid #999; outline:none; font-size:12px;"  /></td>
 <td><input type="button" class="smallbtn" style="width:40px; border:1px solid #999; outline:none; font-size:12px;" value="Add" onclick="addMod_lcl();"  /></td>
 <td></td>
</tr>';
}
}
echo '</table>';
echo '<input type="text" id="txtlclMod_rows" name="txtlclMod_rows" style="visibility:hidden;" />';
echo '</div>';



echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Discounts & Offers</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:1%;">';
echo '<table id="tab_discounts_Mod" class="font-medium" style="width:100%; text-align:left" cellpadding="1" cellspacing="0">';

$q_offr = "select offers from b2b_pck_crt where pck_id='".$_GET["pckID"]."'";
$res_offr = mysqli_query($conn,$q_offr);
if($res_offr)
{
while($row = mysqli_fetch_array($res_offr))
{
echo '<tr style="background:#ff0000; color:#fff;">
 <td colspan="10"><textarea name="txtMod_prev_offers" class="txtbox_Tab" style="background:transparent; height:auto; word-wrap:break-word; width:100%; border:0px; outline:none; color:#fff; font-size:12px;">'.$row["offers"].'</textarea></td>
</tr>';
}
}
  echo '<tr style="background:#0066ff; color:#fff;">
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
		     <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_bank_nameM_2" name="txt_bank_nameM_2" placeholder="Axis Bank" /></td>
			 <td>
			 <select id="txt_pay_modeM_2" name="txt_pay_modeM_2" style="width:80px; font-size:12px;">
			   <option value="Credit Card">Credit Card</option>
			   <option value="Debit Card">Debit Card</option>
			   <option value="Netbanking">Netbanking</option>
			   <option value="Pay at the site">Pay at the site</option>			  
			 </select>
			 <td>
			  <select id="txt_card_typeM_2" name="txt_card_typeM_2" style="width:60px; font-size:12px;">
			   <option value="Visa">Visa </option>
			   <option value="MasterCard">MasterCard</option>
     		 </select>
		     </td>
			 <td>
			 <select id="txt_card_nameM_2" name="txt_card_nameM_2" onChange="if(this.value==\'Other\')show_block(\'txt_card_name_othM_1\');" style="width:60px; font-size:12px;">
			  <option value="Platinum">Platinum</option>
			  <option value="Titanium">Titanium</option>
			  <option value="Other">Other</option>
			 </select>
			 <input type="text" id="txt_card_name_othM_2" name="txt_card_name_othM_2" class="txtbox_Tab" style="width:60px; display:none; font-size:12px;" placeholder="specify others" />
			</td>	
			 <td>
			 <select id="txt_offer_typeM_2" name="txt_offer_typeM_2" style="width:60px; font-size:12px;">
			   <option value="Cashback">Cashback</option>
			   <option value="EMI">EMI</option>
			   <option value="Bonus Points">Bonus Points</option>
			 </select>
			</td>	
			 <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_offer_descM_2" name="txt_offer_descM_2" placeholder="3% cashback over Rs.3000" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_fromM_2" name="txt_valid_fromM_2" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block(\'TripDates\');" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_tillM_2" name="txt_valid_tillM_2" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block(\'TripDates\');" /></td>		 
		    <td align="center"><input type="button" class="smallbtn" style="width:40px; float:none; font-size:12px;" id="btn_disc_addM_2" name="btn_disc_addM_2" value="Add" onClick="add_discounts_Mod();" /></td>
	<td align="center"><img src="Images/cancelbtn.png" style="width:20px; height:20px;" id="btn_disc_del_1" name="btn_disc_del_1"  /></td>
	  </tr>
		   </table>';  
echo '<input type="text" id="txtoffMod_rows" name="txtoffMod_rows" style="visibility:hidden;" />';
echo '</div>';


echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Deductions</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:5%;">';
echo ' <table id="tab_cncl_terms_Mod" style="width:100%; text-align:left;" cellpadding="1" cellspacing="0">';

$q_offr = "select deductions from b2b_pck_crt where pck_id='".$_GET["pckID"]."'";
$res_offr = mysqli_query($conn,$q_offr);
if($res_offr)
{
while($row = mysqli_fetch_array($res_offr))
{
echo '<tr style="background:#ff0000; color:#fff;">
 <td colspan="10"><textarea name="txtMod_prev_dedc" class="txtbox_Tab" style="background:transparent; height:auto; word-wrap:break-word; width:100%; border:0px; outline:none; color:#fff; font-size:12px;">'.$row["deductions"].'</textarea></td>
</tr>';
}
}

echo '<tr  style="background:#0066FF; color:#fff; font-size:15px;">
			    <th align="left">Cancellation <br/>requested on</th>
				<th align="left">Cancellation<br/>Charges</th>
				<th align="center">Add row</th>
				<th align="center">Delete Row</th>
			   </tr>
			   <tr id="btn_cncl_delM_2">
			     <td align="left">
				  <select style="width:150px;" id="txt_cncl_dayM_2" name="txt_cncl_dayM_2">
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
				 <td align="left"><input type="text" class="txtbox_Tab" style="width:70px;" id="txt_cncl_rateM_2" name="txt_cncl_rateM_2" placeholder="10%" /></td>
				 <td align="center"><input type="button" class="smallbtn" style="width:40px; float:none;" id="btn_cncl_addM_1" name="btn_cncl_addM_2" value="Add" onClick="add_terms_Mod();" /></td>
				 <td align="center"><img src="Images/cancelbtn.png" style="width:25px; height:25px;" id="btn_cncl_delM_2" name="btn_cncl_delM_2"  /></td>
			   </tr>
			 </table>';
			 echo '<input type="text" id="txtdedcMod_rows" name="txtdedcMod_rows" style="visibility:hidden;" />';
echo '</div>';



echo '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
echo '<div style="float:left; width:100%;"><label class="PckFonts">Refund</label></div>';
echo '<div style="float:left; width:100%; margin-top:10px; margin-left:5%;">';
echo '<table id="tab_refund_Mod" style="width:100%; text-align:left;" cellpadding="1" cellspacing="0">';
$q_ref = "select refund from b2b_pck_crt where pck_id='".$_GET["pckID"]."'";
$res_ref = mysqli_query($conn,$q_ref);
if($res_ref)
{
while($row = mysqli_fetch_array($res_ref))
{
 echo '<tr style="background:#ff0000; color:#fff;">
 <td colspan="5"><textarea class="txtbox_Tab" style="background:transparent; width:100%; word-wrap:break-word; height:auto; border:0px; outline:none; color:#fff; font-size:12px;" name="txtMod_prev_ref">'.$row["refund"].'</textarea></td>
 </tr>';
}
}
    echo '<tr style="background:#0066FF; color:#fff; font-size:15px;"> 
				   <th width="100px">Refund Amount</th>
				   <th width="120px">Mode of Refund</th>
				   <th width="80px"># days for processing</th>
				   <th width="50px">Add Row</th>
				   <th width="50px">Delete Row</th>
				 </tr>
				 <tr>
				   <td width="100px"><input type="text" class="txtbox_Tab" style="width:100px;" id="txt_ref_amtM_2" name="txt_ref_amtM_2" placeholder="50%" /></td>
				   <td width="120px">
				   <input type="text" id="txt_ref_typeM_2" name="txt_ref_typeM_2" class="txtbox_Tab" style="width:150px;" />
				   <select id="drpRefTypeM_2" name="drpRefTypeM_2"  style="width:100px; font-size:14px;" onChange="document.getElementById(\'txt_ref_typeM_2\').value=this.value;">
				    <option value="Direct credit to bank account via NEFT, RGT or IMPS">Direct credit to bank account via NEFT, RGT or IMPS</option>
					<option value="By Credit card reversal">By Credit card reversal</option>
					<option value="By Check">By Check</option>
				   </select>
				   </td>
				   <td width="80px"><input type="text" class="txtbox_Tab" style="width:50px;" id="txt_ref_daysM_2" name="txt_ref_daysM_2" placeholder="3" /></td>
				   <td width="50px"><input type="button" class="smallbtn" style="width:40px;" id="btn_ref_addM_2" name="txt_ref_addM_2" value="Add" onClick="add_ref_rows_Mod();" /></td>
				   <td width="50px"><img src="Images/cancelbtn.png" width="20px" height="20px" id="btn_ref_delM_2" name="btn_ref_delM_2" /></td>
				 </tr>
			   </table>';
			   echo '<input type="text" id="txtrefMod_rows" name="txtrefMod_rows" style="visibility:hidden;" />';
echo '</div>';
echo '<hr style="border-top:2px solid #444; width:100%;" />';

echo '<div style="float:left; width:100%;">
 <div style="float:left; width:100%;">
			       <span class="font-medium" style="float:left; margin-left:5px;">Terms & Conditions</span>
				   <span style="float:left; margin-left:10px;">
				    <textarea id="txtATerms" name="txtATerms"  style="width:600px; height:180px; box-shadow:2px;">'.$terms.'</textarea>
				   </span>			   
			   </div>
			   
  <div style="float:left; width:100%; margin-top:10px;">
			    <span class="font-medium">Upload File</span>
				<span style="float:left; margin-left:10px;">
		 <input type="text" id="docSrcFile" style="position:absolute; width:230px;" class="txtbox_Tab" placeholder="Select a file" accept="application/pdf, application/docx, application/doc" />
<input type="file" id="docfile" name="docfile" style="opacity:0; z-index:1;" onChange="document.getElementById(\'docSrcFile\').value = this.value;"  accept="application/pdf, application/docx, application/doc" /></span>
		
		 		   </div>
</div>';

echo '<div style="float:left; width:100%;">
<input type="submit" id="btnSubPck_mod" name="btnSubPck_mod" value="Modify Package" class="smallbtn" style="width:120px; float:none; height:24px; margin-left:10%;" onmouseover="tabMod_rows();" />
</div>';

echo '</div>';

echo '<div style="visibility: visible; position: absolute; display: none; z-index: 100000; top:20%; left:35%;" id="TripDates"></div>			
<script>
      	var oDP = new datePicker("TripDates");
</script>';
}


?>