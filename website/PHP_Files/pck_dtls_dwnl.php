<?php

 include("PHP_Connection.php");
include('mPDF/mpdf.php');
if(isset($_GET['pckID']))
{
$q_pck_dtls = "select pck_id, pck_name, pck_img1, pck_img2, trip_theme, travellers, trip_dates, locations, duration, validity, incls, excls, prc_based ,  prc_based_rev, pck_cost, pck_cost_rev, prc_service, prc_service_rev, prc_edu, prc_edu_rev, price, revised_price, inventory, deductions, refund, terms, offers, revised_offers from b2b_pck_crt where pck_id='".$_GET["pckID"]."' ";
$res_pck_dtls = mysqli_query($conn,$q_pck_dtls);

$q_pck_htl = "select pck_id, loc_name, htl_name, duration,  star_rate, rooms, occupancy, extra_bed, htl_img, food_type, incl, excl, revised_incl, revised_excl from b2b_htl_crt where pck_id='".$_GET["pckID"]."'";
$res_pck_htl = mysqli_query($conn,$q_pck_htl);

$q_pck_trp = "select pck_id, IC_tofro_trnsf, IC_onwd_from_dest, IC_onwd_to_dest, IC_onwd_trv_mode, IC_onwd_trnsf_means, IC_ret_from_dest, IC_ret_to_dest, IC_ret_trv_mode, IC_ret_trf_means from b2b_trnprt where pck_id='".$_GET['pckID']."' limit 1";
$res_pck_trp = mysqli_query($conn,$q_pck_trp);

$q_pck_ltrvl = "select P2P_origin, P2P_dest, P2P_mode, P2P_means, local_loc, local_mode, local_means from b2b_trnprt where pck_id='".$_GET['pckID']."'";
$res_pck_ltrvl = mysqli_query($conn,$q_pck_ltrvl);
$res_pck_ltrv_lcl = mysqli_query($conn,$q_pck_ltrvl);

$q_pck_itin = "select pck_id, day, loc_name, attr_name, start_time, arrival_time, time_allocated from b2b_attr_crt where pck_id='".$_GET['pckID']."'";
$res_pck_itin = mysqli_query($conn,$q_pck_itin);

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




$wrt.= '<div style="margin:5px; width:100%; float:left;">'; 
 
if($res_pck_dtls)
{
while($row = mysqli_fetch_array($res_pck_dtls))
{
$wrt.= '<div style="float:left; width:100%;"><span class="PckFonts" style="font-size:20px;">'.$row["pck_name"].'</span></div> ';

$wrt.= '<div style="float:left; width:100%; margin-top:5px;">

<span style="float:left; width:70%; margin-left:10px;">
<table width="100%" border="0px" height="auto" cellpadding="2" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">
 <tr>
   <th width="200px" align="right">Locations Covered</th>
   <td width="10px">:</td>
   <td align="left">'.$row["locations"].'</td>
 </tr>
  <tr>
   <th align="right">Trip Theme</th>
   <td>:</td>
   <td align="left">'.$row["trip_theme"].'</td>
 </tr>
  <tr>
   <th align="right">Duration</th>
   <td>:</td>
   <td align="left">'.$row["duration"].'</td>
 </tr>
   <tr>
   <th align="right">Preferred Travellers</th>
   <td>:</td>
   <td align="left">'.$row["travellers"].'</td>
 </tr>
  <tr>
   <th align="right">Validity</th>
   <td>:</td>
   <td align="left">'.$row["validity"].'</td>
 </tr>
 <tr>
  <th align="right">Trip Dates</th>
   <td>:</td>
   <td align="left">'.$row["trip_dates"].'</td>
 </tr>
  <tr>
   <th align="right">Inclusions</th>
   <td>:</td>
   <td align="left">'.$row["incls"].'</td>
 </tr>
  <tr>
   <th align="right">Exclusions</th>
   <td>:</td>
   <td align="left">'.$row["excls"].'</td>
 </tr>
 <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
  <tr>
   <th align="right">Cost</th>
   <td>:</td>
   <td align="left">';
   if($row["pck_cost_rev"] == "")
   $wrt.= $row["pck_cost"];
   else
    $wrt.= $row["pck_cost_rev"];
   $wrt.= '</td>
 </tr> <tr>
   <th align="right">Service Tax</th>
   <td>:</td>
   <td align="left">';
   if($row["prc_service_rev"] == "")
   $wrt.= $row["prc_service"];
   else
   $wrt.= $row["prc_service_rev"];
   $wrt.= '</td>
 </tr> 
 <tr>
   <th align="right">Other cess:</th>
   <td>:</td>
   <td align="left">';
   if($row["prc_edu_rev"] == "")
   $wrt.= $row["prc_edu"];
   else
   $wrt.= $row["prc_edu_rev"];
   $wrt.= '</td>
 </tr> 
 <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
 <tr>
   <th align="right">Total</th>
   <td>:</td>
   <td align="left">';
   if($row["revised_price"] == "" || $row["prc_based_rev"]=="")
   $wrt.= $row["price"].'&nbsp; &nbsp; '.$row["prc_based"];
   else
   $wrt.= $row["revised_price"].'&nbsp; &nbsp; '.$row["prc_based_rev"];
   $wrt.= '</td>
 </tr>
 <tr><td colspan="3" align="center"><hr style="border-top:2px dotted #333; width:70%;" /></td></tr>
  <tr style="font-size:14px; color:#ff0000;">
   <td colspan="3" align="left">Offers* :';
   if($row["revised_offers"] == "")
   $wrt.= $row["offers"];
   else
    $wrt.= $row["revised_offers"];
   $wrt.= '</td>
 </tr>
 <tr style="font-size:14px;">
   <td colspan="3" align="left">Deductions on cancellation* :'.$row["deductions"].'</td>
 </tr>
<tr style="font-size:14px;">
   <td colspan="3" align="left">Refund* :'.$row["refund"].'</td>
 </tr>
<tr style="font-size:14px;">
   <td colspan="3" align="left">Terms & Conditions* :'.$row["terms"].'</td>
 </tr> 
 </table>
</span>
<div style="width:100%; float:left; border:1px solid #444;"></div>
</div>';
}
}

$wrt.= '<div style="float:left; width:100%;"><label class="PckFonts">Itinerary</label></div>';
$wrt.= '<div style="float:left; width:100%; margin-top:5px; margin-left:10%">';
$wrt.= '<table width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">';
if($res_pck_itin)
{
while($row = mysqli_fetch_array($res_pck_itin))
{
$wrt.= '<tr>
<td width="30px">Day'.$row["day"].'</td>
<td width="10px">-</td>
<td width="90%" align="left">In '.$row["loc_name"].'
Leave for \''.$row["attr_name"].'\' at '.$row["start_time"].'. Reach at '.$row["arrival_time"].'. Time allocated for sightseeing is :'.$row["time_allocated"].'Hrs.</td>
</tr>';
}
}
$wrt.= '</table>';
$wrt.= '</div>';

$wrt.= '<div style="width:100%; float:left; border:1px solid #444;"></div>';


if($res_pck_trp)
{
$wrt.= '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
$wrt.= '<div style="float:left; width:100%;"><label class="PckFonts">Tranportation</label></div>';
$wrt.= '<div style="float:left; width:100%; margin-top:5px;">';
$wrt.= '<table width="50%" border="0px" height="auto" cellpadding="2" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">';
 while($row = mysqli_fetch_array($res_pck_trp))
{
$wrt.= '<tr>
 <td>Transfers Included </td>
 <td>:</td>
 <td>'.$row["IC_tofro_trnsf"].'</td>
</tr>';
if($row["IC_onwd_from_dest"]!="")
{
$wrt.= '<tr>
 <td>Onward Journey </td>
 <td>:</td>
 <td>Onward Journey from '.$row["IC_onwd_from_dest"].' to '.$row["IC_onwd_to_dest"].' Via '.$row["IC_onwd_trv_mode"].'</td>
</tr>';
}
if($row["IC_onwd_trnsf_means"]!="" || $row["IC_onwd_trnsf_means"]!=="0")
{
$wrt.= '<tr>
 <td>Transfers Included for Onward Journey </td>
 <td>:</td>
 <td>Tranfer through : '.$row["IC_onwd_trnsf_means"].'</td>
</tr>';
}
else
{
$wrt.= '<tr>
 <td>Transfers Included for Onward Journey </td>
 <td>:</td>
 <td>No</td>
</tr>';
}
if($row["IC_ret_from_dest"]!="")
{
$wrt.= '<tr>
 <td>Return Journey </td>
 <td>:</td>
 <td>Return Journey from '.$row["IC_ret_from_dest"].' to '.$row["IC_ret_to_dest"].' Via '.$row["IC_ret_trv_mode"].'</td>
</tr>';
}
if($row["IC_ret_trf_means"]!="" || $row["IC_ret_trf_means"]!=="0")
{
$wrt.= '<tr>
 <td>Transfers Included for Return Journey</td>
 <td>:</td>
 <td>Tranfer through : '.$row["IC_ret_trf_means"].'</td>
</tr>';
}
else
{
$wrt.= '<tr>
 <td>Transfers Included for Return Journey </td>
 <td>:</td>
 <td>No</td>
</tr>';
}
$wrt.= '</table>';
$wrt.= '</div>';
}
}
$wrt.= '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
$wrt.= '<div style="float:left; width:100%;"><label class="PckFonts">Point to Point Tranfer</label></div>';
$wrt.= '<div style="float:left; width:100%; margin-top:5px;  margin-left:30%;">';
$wrt.= '<table width="50%" border="0px" height="auto" cellpadding="2" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">';
$wrt.= '<tr>
 <td>Origin</td>
 <td> Destination</td>
 <td> Mode </td>
 <td> Means</td>
 </tr>';
 $wrt.= '<tr><td colspan="4"><hr style="width:100%; border:1px dashed #444;" /></td></tr>';
if($res_pck_ltrvl)
{
 while($row = mysqli_fetch_array($res_pck_ltrvl))
{
$wrt.= '<tr>
<td>'.$row["P2P_origin"].'</td> 
 <td>'.$row["P2P_dest"].'</td>
 <td>'.$row["P2P_mode"].'</td>
 <td>'.$row["P2P_means"].'</td>
</tr>';
}
}
$wrt.= '</table>';
$wrt.= '</div>';

$wrt.= '<div style="float:left; width:100%;"><hr style="border:1px solid #444; width:100%;" /></div>';
$wrt.= '<div style="float:left; width:100%;"><label class="PckFonts">Local Tranfer</label></div>';
$wrt.= '<div style="float:left; width:100%; margin-top:5px; margin-left:30%;">';
$wrt.= '<table width="50%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">';
$wrt.= '<tr>
 <td>Location</td>
 <td> Mode </td>
 <td> Means</td>
 </tr>';
 $wrt.= '<tr><td colspan="4"><hr style="width:100%; border:1px dashed #444;" /></td></tr>';
if($res_pck_ltrv_lcl)
{
 while($row = mysqli_fetch_array($res_pck_ltrv_lcl))
{
$wrt.= '<tr>
<td>'.$row["local_loc"].'</td> 
 <td>'.$row["local_mode"].'</td>
 <td>'.$row["local_means"].'</td>
</tr>';
}
}
$wrt.= '</table>';
$wrt.= '</div>';
$wrt.= '</div>';

$wrt.= '<div style="float:left; width:100%; margin-top:10px;"><label class="PckFonts">Accomodation</label></div>
<div style="float:left; width:100%; margin-top:5px; margin-left:5px;">';
  if($res_pck_htl)
{
while($row = mysqli_fetch_array($res_pck_htl))
{
$wrt.= '<span style="float:left: width :80%; margin-left:5px;">
  <table width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:12px; font-family:Calibri; table-layout:fixed;">';
    $wrt.= '<tr>
		 <th align="right">Hotel Location</th>
	    <td>:</td>
	 <td align="left">'.$row["loc_name"].'</td>
	</tr>
	  <tr>
	 <th align="right">Hotel Name</th>
	    <td>:</td>
	 <td align="left">'.$row["htl_name"].'</td>
	</tr>
	  <tr>
	 <th align="right">Duration</th>
	    <td>:</td>
	 <td align="left">'.$row["star_rate"].'</td>
	</tr>
	  <tr>
	 <th align="right">Star Rate</th>
	    <td>:</td>
	 <td align="left">'.$row["duration"].'</td>
	</tr>
	  <tr>
	 <th align="right">Rooms</th>
	    <td>:</td>
	 <td align="left">'.$row["rooms"].'</td>
	</tr>
	  <tr>
	 <th align="right">Occupancy & ExtraBed</th>
	    <td>:</td>
	 <td align="left">'.$row["occupancy"].' Extra Bed -'.$row["extra_bed"].'</td>
	</tr>
	  <tr>
	 <th align="right">Food Type</th>
	    <td>:</td>
	 <td align="left">'.$row["food_type"].'</td>
	</tr>
	  <tr>
	 <th align="right">Inclusions</th>
	    <td>:</td>
	 <td align="left">';
	 if($row["revised_incl"] == "")
	 $wrt.= $row["incl"];
	 else
	 $wrt.= $row["revised_incl"];
	 $wrt.= '</td>
	</tr>
	  <tr>
	 <th align="right">Exclusions</th>
	    <td>:</td>
	 <td align="left">';
	 if($row["revised_excl"] == "")
	 $wrt.= $row["excl"];
	 else
	 $wrt.= $row["revised_excl"];
	 $wrt.= '</td>
	</tr>
	<tr><td colspan="4" align="center"><hr style="border:1px dotted #444; width="100%"" /></td></tr>';
}
}
$wrt.=  ' </table>
</span>
</div>
</div>';

$wrt.= '<div style="float:left; width:100%">';
$sel_b2b = "select company_name, logo_pic from b2b_profile where client_id=".$clientID."";
$res_b2b = mysqli_query($conn,$sel_b2b);
if($res_b2b)
{
while($row = mysqli_fetch_array($res_b2b))
{
echo '<span>Posted By :</span>';
echo '<span style="margin-left:5px;"><img src="data:image/jpg;base64,'.base64_encode($row["logo_pic"]).'" width="50px" height="50px" /></span>';
echo '<span style="margin-left:10px; color:#444; font-size:20px; font-weight:600;">'.$row["company_name"].'</span>';
}
}
echo '</div>';
}
$mpdf = new mPDF('c');
$mpdf->debug = true;
$mpdf->WriteHTML($wrt);
$mpdf->Output('Package','D');


?>