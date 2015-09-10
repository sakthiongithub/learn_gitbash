<?php

include("PHP_Connection.php");

if(isset($_GET['QID']) && isset($_GET['LID']))
{
echo '<div style="float:left; width:100%;">
  <span style="float:right;"><img src="Images/closeBtn.png" width="30px" height="30px" onClick="hide_block(\'dtls_response\');" /></span>
 </div>';

echo '<div style="float:left; width:100%;">
 
   <table class="font-small" style="float:left; width:100%; color:#3333CC;" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
   <tr style="background:#000033; color:#fff;"><td colspan="4">RESPONSE FORM</td></tr>
   <tr style="background:#000033; color:#fff;">
   <td>QUOTE ID</td>
   <td>'.$_GET['QID'].'</td>
    </tr>
   </table>
   
   <table width="100%" style="font-size:16px; font-family:Calibri; color:#555;" cellpadding="1" cellspacing="0" border="1px" bordercolor="#aaa">
   <tr>
    <td width="80%"></td>
	<td width="10%">Price per Item</td>
	<td width="10%">Total</td>
   </tr>
   <tr>
    <td>
	<table style="font-size:12px; font-family:Calibri;" width="100%" cellpadding="0" cellspacing="0">
  <tr height="30px"><th colspan="6"></th></tr>
	  <tr style="background:#b22; color:#fff;"><th colspan="6" align="center">ITINERARY</th></tr>
	  <tr style="background:#eee; color:#555;">
	    <th align="left">PLACE/S</th>
		<th align="left">CATEGORY</th>
		<th align="left">ATTRACTIONS</th>
		<th align="left">DATE</th>
		<th align="left">DAY</th>
	  </tr>';
	 
	 $q_qt_itin = "select loc_name, DATE_FORMAT(`trv_date`,'%d-%m-%Y') as trv_date, schedule, attr_name, cate_id from quote_itinerary where quote_id='".$_GET['QID']."'";
	 $res_qt_itin = mysqli_query($conn,$q_qt_itin);
	 if($res_qt_itin)
	 {
	  while($row = mysqli_fetch_array($res_qt_itin))
	  {
	    echo '<tr>';
	    echo '<td align="left">'.$row["loc_name"].'</td>';
		echo '<td align="left">'.$row["cate_id"].'</td>';
		echo '<td align="left">'.$row["attr_name"].'</td>';
		echo '<td align="left">'.$row["trv_date"].'</td>';
		echo '<td align="left">'.$row["schedule"].'</td>';
		echo '<td align="left"></td>';
		echo '</tr>';
	  }
	  $q_itin_cmnt = "select comment from quote_itinerary where quote_id='".$_GET['QID']."' limit 1";
	  $res_itin_cmnt = mysqli_query($conn,$q_itin_cmnt);
	  while($r= mysqli_fetch_array($res_itin_cmnt))
	  {
	    echo '<tr style="border:1px solid #555;"><td colspan="6">'.$r["comment"].'</td></tr>';
	  }
	 }
	
	echo '</table>
	
	</td>
   <td></td>
   <td></td>
   </tr>
    <tr>
	<td> 
	<table class="font-small" style="float:left; width:100%; color:#666;" cellpadding="3" cellspacing="0">  
	  <tr bordercolor="#fff" height="30px"><td colspan="12"></td></tr>
  <tr style="background:#b22; color:#fff;"><th colspan="12" align="center">HOTEL</th></tr>
  <tr style="background:#eee; color:#555;"> 
<th align="left">OPTIONS</th>
   <th align="left">LOCATION</th>
   <th align="left">CHECK-IN</th>
   <th align="left">CHECK-OUT</th>
   <th align="left">HOTEL STAR RATE</th>
   <th align="left">ROOM TYPE</th>
   <th align="left">ROOMS</th>
   <th align="left">OCCUPANCY</th>
   <th align="left">HOTEL NAME</th>
   <th align="left">FOOD PLAN</th>
   <th align="left">TICKET PRICE</th>
   <th align="left">DURATION</th>
   <th align="left">TOTAL</th>
  </tr>';
  
  $q_qt_htl = "select optn, htl_loc, htl_chkin, htl_chkout, htl_star_rate, room_type, rooms, occupancy, htl_name, food_type, ticket_cost, trip_duration, total_cost from quote_hotel where quote_id='".$_GET['QID']."'";
  $res_qt_htl = mysqli_query($conn,$q_qt_htl);
  if($res_qt_htl)
  {
  $totl_htl=0;
  while($row = mysqli_fetch_array($res_qt_htl))
  {
  echo '<tr>
  <td align="left">'.$row["optn"].'</td>
   <td align="left">'.$row["htl_loc"].'</td>
   <td align="left">'.$row["htl_chkin"].'</td>
   <td align="left">'.$row["htl_chkout"].'</td>
   <td align="left">'.$row["htl_star_rate"].'</td>
   <td align="left">'.$row["room_type"].'</td>
   <td align="left">'.$row["rooms"].'</td>   
   <td align="left">'.$row["occupancy"].'</td>
   <td align="left">'.$row["htl_name"].'</td>
   <td align="left">'.$row["food_type"].'</td>
   <td align="left">'.$row["ticket_cost"].'</td>
   <td align="left">'.$row["trip_duration"].'</td>
   <td align="left">'.$row["total_cost"].'</td>
  </tr>';
  $totl_htl = $totl_htl + (int)$row["total_cost"];
  }
   $q_htl_cmnt = "select comment from quote_hotel where quote_id='".$_GET['QID']."' limit 1";
	  $res_htl_cmnt = mysqli_query($conn,$q_htl_cmnt);
	  while($r= mysqli_fetch_array($res_htl_cmnt))
	  {
	    echo '<tr style="border:1px solid #555;"><td colspan="6">'.$r["comment"].'</td></tr>';
	  }
  }
  

echo '</table>	
	  </td>
	  <td>'.$totl_htl.'</td>	  	
	  <td></td> 
	  </tr>
	  
	  <tr>
	  <td><table class="font-small" style="float:left; width:100%; color:#666; font-size:12px;" cellpadding="3" cellspacing="0">	  
	<tr bordercolor="#fff" height="30px"><td colspan="9"></td></tr>
  <tr style="background:#b22; color:#fff;"><th colspan="9" align="center">TRANSPORT</th></tr>
  <tr style="background:#eee; color:#555;">
  <th align="left">JOURNEY TYPE</th>
   <th align="left">FROM</th>
   <th align="left">TO</th>
   <th align="left">MODE</th>
   <th align="left">DETAILS</th>
   <th align="left">DATE</th>
   <th align="left">TIME</th>
   <th align="left">TICKET PRICE</th>
   <th align="left">TOTAL</th>
  </tr>';
 
  $q_qt_trv = "select type, from_loc, to_loc, mode, details, jnry_date, jnry_time, tckt_prc, total, comment from quote_trpt where quote_id='".$_GET['QID']."'";
  $res_qt_trv = mysqli_query($conn,$q_qt_trv);
  
  if($res_qt_trv)
  {
  $totl_trv = 0;
  while($row = mysqli_fetch_array($res_qt_trv))
  {
 echo ' <tr>
 <th align="left">'.$row["type"].'</th>
   <td align="left">'.$row["from_loc"].'</td>
   <td align="left">'.$row["to_loc"].'</td>
   <td align="left">'.$row["mode"].'</td>
   <td align="left">'.$row["details"].'</td>
   <td align="left">'.$row["jnry_date"].'</td>
   <td align="left">'.$row["jnry_time"].'</td>
   <td align="left">'.$row["tckt_prc"].'</td>
   <td align="left">'.$row["total"].'</td>
   <tr>';
   $totl_trv = $totl_trv + (int)$row["total"];
   }
   $q_trpt_cmnt = "select comment from quote_trpt where quote_id='".$_GET['QID']."' limit 1";
	  $res_trpt_cmnt = mysqli_query($conn,$q_trpt_cmnt);
	  while($r= mysqli_fetch_array($res_trpt_cmnt))
	  {
	    echo '<tr style="border:1px solid #555;"><td colspan="6">'.$r["comment"].'</td></tr>';
	  }
   }

echo '</table></td>
	  <td>'.$totl_trv.'</td>
	  <td></td>	 
	  </tr>
	  
	  <tr>
	    <td><table class="font-small" style="float:left; width:100%; color:#666; font-size:12px;" cellpadding="3" cellspacing="0">	
	<tr bordercolor="#fff" height="30px"><td colspan="8"></td></tr>
  <tr style="background:#b22; color:#fff;"><th colspan="8" align="center">LOCAL TRAVEL</th></tr>
  <tr style="background:#eee; color:#555;">
   <th align="left">LOCATION</th>
   <th align="left">VEHICLE</th>
   <th align="left">VEHICLE NAME</th>
   <th align="left"># OF PASSENGERS</th>
   <th align="left">RATE</th>
   <th align="left">DISTANCE(in Km)</th>
   <th align="left">ADDITIONAL RATE/DISTANCE</th>
   <th align="left">TOTAL</th>
  </tr>';
  
  $q_qt_trvl = "select loc_name, v_type, v_name, passenger, rate, distn, additional, total, comment from quote_lcl_trvl where quote_id='".$_GET['QID']."'";
  $res_qt_trvl = mysqli_query($conn,$q_qt_trvl);
  if($res_qt_trvl)
  {
   $totl_ltrv = 0;
  while($row = mysqli_fetch_array($res_qt_trvl))
  {
  echo '<tr>
   <td align="left">'.$row["loc_name"].'</td>
   <td align="left">'.$row["v_type"].'</td>
    <td align="left">'.$row["v_name"].'</td>
   <td align="left">'.$row["passenger"].'</td>
   <td align="left">'.$row["rate"].'</td>
   <td align="left">'.$row["distn"].'</td>
   <td align="left">'.$row["additional"].'</td>
   <td align="left">'.$row["total"].'</td>  
  </tr>';
  $totl_ltrv = $totl_ltrv + (int)$row["total"];
}
 $q_lcl_cmnt = "select comment from quote_lcl_trvl where quote_id='".$_GET['QID']."' limit 1";
	  $res_lcl_cmnt = mysqli_query($conn,$q_lcl_cmnt);
	  while($r= mysqli_fetch_array($res_lcl_cmnt))
	  {
	    echo '<tr style="border:1px solid #555;"><td colspan="6">'.$r["comment"].'</td></tr>';
	  }
}

 echo ' </table></td>
		<td>'.$totl_ltrv.'</td>	 
		<td></td> 
	  </tr>

      <tr>
	    <td><table class="font-small" style="float:left; width:100%; color:#666; font-size:12px;" cellpadding="3" cellspacing="0">
	<tr bordercolor="#fff" height="30px"><td colspan="6"></td></tr>
  <tr style="background:#b22; color:#fff;"><th colspan="6" align="center">OTHERS</th></tr>
  <tr style="background:#eee; color:#555;"> 
  <th align="left">REQUIREMENT</th>
  <th align="left">PLACE</th>
  <th align="left">RATE/DAY</th>
  <th align="left"># OF DAYS</th>
  <th align="left">TOTAL</th>
  </tr>';
  
  $q_othr = "select Othrs_speci, loc_name, rate_per_day, num_of_days, totl_opt1, totl_opt2, comment from quote_othrs where quote_id='".$_GET['QID']."'";
  $res_othr = mysqli_query($conn,$q_othr);
  if($res_othr)
  {
  $totl_req = 0;
  $tot=0;
  while($row = mysqli_fetch_array($res_othr))
  {
  		$totl1 = $row["totl_opt1"];
		$totl2 = $row["totl_opt2"];
  $tot = (int)$row["rate_per_day"] + (int)$row["num_of_days"];
  echo ' <tr>
   <td align="left">'.$row["Othrs_speci"].'</td>
   <td align="left">'.$row["loc_name"].'</td>
   <td align="left">'.$row["rate_per_day"].'</td>
   <td align="left">'.$row["num_of_days"].'</td>
   <td align="center">'.$tot.'</td>
  </tr>';
  $totl_req = $totl_req + (int)$row["rate_per_day"]*(int)$row["num_of_days"];
  }
   $q_othr_cmnt = "select comment from quote_othrs where quote_id='".$_GET['QID']."' limit 1";
	  $res_othr_cmnt = mysqli_query($conn,$q_othr_cmnt);
	  while($r= mysqli_fetch_array($res_othr_cmnt))
	  {
	    echo '<tr style="border:1px solid #555;"><td colspan="6">'.$r["comment"].'</td></tr>';
	  }
  }
  
 
 
 $totl_all = (int)$totl_htl + (int) $totl_trv + (int) $totl_ltrv + (int) $totl_req;
echo '</table></td>
		<td>'.$totl_req.'</td>
		
	  </tr>

     <tr>
	   <td rowspan="2" style="background:#b22; color:#fff;" align="center">GRAND TOTAL</td>
	 <td style="background:#ff0000; color:#fff;">OPTION-1</td>
	 <td style="background:#ff0000; color:#fff;">'.$totl1.'</td>
	 </tr>
	
	 <tr>
	 <td style="background:#ff0000; color:#fff;">OPTION-2</td>
	 <td style="background:#ff0000; color:#fff;">'.$totl2.'</td>
	 </tr>

     <tr style="background:#eee; color:#555;">
	   <td></td>
	   <td>Download</td>
	   <td><img src="Images/pdf_icon.png" width="30px" height="30px" onClick="open_pdf(\''.$_GET['QID'].'\',\''.$_GET['LID'].'\');" /></td>
	 </tr>

 

</table>
 </div>';
}
