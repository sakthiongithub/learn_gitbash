<html>
<head>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
</head>
<form method="get">

<body>
<?php

include("PHP_Connection.php");

$chkIn="";
$chkOut="";
$days=0;

if(isset($_GET['WLID']) && isset($_GET['Attr']) && isset($_GET['deldate']))
{
$_GET["deldate"] = date('Y-m-d',strtotime($_GET["deldate"]));
  $q_del = "delete from saved_wl where wl_id='".$_GET['WLID']."' and attr_name='".$_GET['Attr']."' and trip_date='".$_GET["deldate"]."'";
  $res_del = mysqli_query($conn,$q_del);
  
$q_saved_wl = "select distinct(attr_name) as attr_name, loc_name, wl_id, cate_id, DATE_FORMAT(trip_date,'%d-%m-%Y') as trip_date, schedule, trip_time, apprx_visit_time, apprx_expense from saved_wl where wl_id='".$_GET["WLID"]."'";
	 
	$res_saved_wl = mysqli_query($conn,$q_saved_wl);
	
	$i=0;
	if($res_saved_wl)
	{
     while($row = mysqli_fetch_array($res_saved_wl))
	 {
	 $attr = $row["attr_name"];
	  $btnAtr = array();
	  $btnAtr = str_replace(" ","_",$attr);	  
	  	$time = explode(":",$row["trip_time"]);
	  
	  $strt = explode("-",$time[0]);
	  $end = explode("-",$time[1]);
	   	
	    $i++;
 	  	  echo  '<tr>    
	   <td width="15px">'.$i.'</td>
	   <td  width="115px">'.$row["loc_name"].'</td>
	   <td  width="100px">'.$row["cate_id"].'</td>
	   <td width="150px">'.$row["attr_name"].'</td>
	   <td id="trp_dt_'.$i.'"  "width="120px">
	   <input type="text" id="txtSvdDt_'.$i.'" style="width:100%;"  value="'.$row["trip_date"].'"  onChange="svdDt(this.value,\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');"    /></td>
	  <td  width="60px" align="center">'.$row["schedule"].'</td>
	   <td  width="140px">
	    <span><select id="txtSvdStartTime_'.$i.'" style="width:auto; font-size:12px;" placeholder="starts at" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
		<option value="'.$strt[0].'">'.$strt[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	   <span>
	   <select id="drpStartType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$strt[1].'">'.$strt[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span> &nbsp;
	   <span><select id="txtSvdEndTime_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$end[0].'">'.$end[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	    <span>
	   <select id="drpEndType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	    <option value="'.$end[1].'">'.$end[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span>	   
	  </td>
	  <td  width="50px">'.$row["apprx_visit_time"].'</td>
	   <td  width="50px">'.$row["apprx_expense"].'</td>
	   <td  width="40px">
	   <span onclick="showNotes(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');" style="color:#0066ff; text-decoration:underline; cursor:pointer;">Notes..</span></td>
	   <td  style="width:52px;">	   
	   <img src="Images/cancelbtn.png"  width="20px" height="20px" style="cursor:pointer;" onclick="delSvdAttr(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\''.$row["trip_date"].'\');" /></td>	   
	</tr>';
	 }
	} 
}

if(isset($_GET['dtWLID']) && isset($_GET['dtAttr']) && isset($_GET['Date']))
{
$date = date('Ymd', strtotime($_GET['Date']));

  $q_del = "update saved_wl set trip_date='".$date."' where wl_id='".$_GET['dtWLID']."' and attr_name='".$_GET['dtAttr']."'";
  $res_del = mysqli_query($conn,$q_del);
  
$q_saved_wl = "select distinct(attr_name) as attr_name, loc_name,  cate_id, DATE_FORMAT(trip_date,'%d-%m-%Y') as trip_date, schedule, trip_time, apprx_visit_time, apprx_expense from saved_wl where wl_id='".$_GET["dtWLID"]."'";	 
	$res_saved_wl = mysqli_query($conn,$q_saved_wl);
	
$q_cnt_dist_dts = "select distinct(trip_date) from saved_wl where wl_id='".$_GET['dtWLID']."'";
$res_cnt_dts = mysqli_query($conn,$q_cnt_dist_dts);
if($res_cnt_dts)	
$count_dts = mysqli_num_rows($res_cnt_dts);
else
$count_dts=0;

$q_sel_trpdt = "select min(trip_date) as Dmin, max(trip_date) as Dmax from saved_wl where wl_id='".$_GET['dtWLID']."'";
$res_sel_trpdt = mysqli_query($conn,$q_sel_trpdt);
if($res_sel_trpdt)
{
while($r = mysqli_fetch_array($res_sel_trpdt))
{
  $minDt = $r["Dmin"];
  $maxDt = $r["Dmax"];
  
  $updt_sch1 = "update saved_wl set schedule='DAY1' where trip_date='".$minDt."' and wl_id='".$_GET['dtWLID']."'";
		$res_sch1 = mysqli_query($conn,$updt_sch1);
		
    $updt_schmax = "update saved_wl set schedule='DAY".$count_dts."' where trip_date='".$maxDt."' and wl_id='".$_GET['dtWLID']."'";
		$res_schmax = mysqli_query($conn,$updt_schmax);		
}
}	
	$i=0;
	if($res_saved_wl)
	{
     while($row = mysqli_fetch_array($res_saved_wl))
	 {
	 $attr = $row["attr_name"];
	  $btnAtr = array();
	  $btnAtr = str_replace(" ","_",$attr);	  
	  	$time = explode(":",$row["trip_time"]);
	  
	  $strt = explode("-",$time[0]);
	  $end = explode("-",$time[1]);
	   	
	    $i++;
		
   $dt1 = date_create($minDt);
  $dt2 = date_create($row["trip_date"]);
  $mindiff = date_diff($dt1,$dt2);
// echo  $mindiff->format("%a Days");
   	
	   $trpDt = date('Y-m-d', strtotime($row["trip_date"]));
	 for($j= 0 ; $j<$count_dts; $j++)
	 {  
	   if($mindiff->format("%a") == $j)
	   {
	   $k= $j+1;
		$updt_sch2 = "update saved_wl set schedule='DAY".$k."' where trip_date='".$trpDt."' and wl_id='".$_GET['dtWLID']."'";
		$res_sch2 = mysqli_query($conn,$updt_sch2);
		}
		  }
	}
	}	  
	$q_saved_wl_1 = "select distinct(attr_name) as attr_name, loc_name, wl_id, cate_id, DATE_FORMAT(trip_date,'%d-%m-%Y') as trip_date, schedule, trip_time, apprx_visit_time, apprx_expense from saved_wl where wl_id='".$_GET["dtWLID"]."'";	 
	$res_saved_wl_1 = mysqli_query($conn,$q_saved_wl_1);	  
	
	if($res_saved_wl_1)
	{
	while($r = mysqli_fetch_array($res_saved_wl_1))
	{

		  echo  '<tr>    
	   <td width="15px">'.$i.'</td>
	   <td  width="115px">'.$row["loc_name"].'</td>
	   <td  width="100px">'.$row["cate_id"].'</td>
	   <td width="150px">'.$row["attr_name"].'</td>
	   <td id="trp_dt_'.$i.'"  "width="120px">
	   <input type="text" id="txtSvdDt_'.$i.'" style="width:100%;"  value="'.$row["trip_date"].'"  onChange="svdDt(this.value,\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');"    /></td>
	  <td  width="60px" align="center">'.$row["schedule"].'</td>
	   <td  width="140px">
	    <span><select id="txtSvdStartTime_'.$i.'" style="width:auto; font-size:12px;" placeholder="starts at" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
		<option value="'.$strt[0].'">'.$strt[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	   <span>
	   <select id="drpStartType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$strt[1].'">'.$strt[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span> &nbsp;
	   <span><select id="txtSvdEndTime_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$end[0].'">'.$end[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	    <span>
	   <select id="drpEndType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	    <option value="'.$end[1].'">'.$end[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span>	   
	  </td>
	  <td  width="50px">'.$row["apprx_visit_time"].'</td>
	   <td  width="50px">'.$row["apprx_expense"].'</td>
	   <td  width="40px">
	   <span onclick="showNotes(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');" style="color:#0066ff; text-decoration:underline; cursor:pointer;">Notes..</span></td>
	   <td  style="width:52px;">	   
	   <img src="Images/cancelbtn.png"  width="20px" height="20px" style="cursor:pointer;" onclick="delSvdAttr(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\''.$row["trip_date"].'\');" /></td>	   
	</tr>';
	 }
	} 
}

if(isset($_GET['tmWLID']) && isset($_GET['tmAttr']) && isset($_GET['Time']))
{
  $q_del = "update saved_wl set trip_time='".$_GET['Time']."' where wl_id='".$_GET['tmWLID']."' and attr_name='".$_GET['tmAttr']."'";
  $res_del = mysqli_query($conn,$q_del);
  
$q_saved_wl = "select distinct(attr_name) as attr_name, wl_id, loc_name, cate_id, DATE_FORMAT(trip_date,'%d-%m-%Y') as trip_date, schedule, trip_time, apprx_visit_time, apprx_expense from saved_wl where wl_id='".$_GET["tmWLID"]."'";
	 
	$res_saved_wl = mysqli_query($conn,$q_saved_wl);
	
	$i=0;
	if($res_saved_wl)
	{
     while($row = mysqli_fetch_array($res_saved_wl))
	 {
	 $attr = $row["attr_name"];
	  $btnAtr = array();
	  $btnAtr = str_replace(" ","_",$attr);	  
	  $time = explode(":",$row["trip_time"]);
	  
	  $strt = explode("-",$time[0]);
	  $end = explode("-",$time[1]);
	   	
	    $i++;
	  echo  '<tr>    
	   <td width="15px">'.$i.'</td>
	   <td  width="115px">'.$row["loc_name"].'</td>
	   <td  width="100px">'.$row["cate_id"].'</td>
	   <td width="150px">'.$row["attr_name"].'</td>
	   <td id="trp_dt_'.$i.'"  "width="120px">
	   <input type="text" id="txtSvdDt_'.$i.'" style="width:100%;"  value="'.$row["trip_date"].'"  onChange="svdDt(this.value,\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');"    /></td>
	  <td  width="60px" align="center">'.$row["schedule"].'</td>
	   <td  width="140px">
	    <span><select id="txtSvdStartTime_'.$i.'" style="width:auto; font-size:12px;" placeholder="starts at" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
		<option value="'.$strt[0].'">'.$strt[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	   <span>
	   <select id="drpStartType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$strt[1].'">'.$strt[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span> &nbsp;
	   <span><select id="txtSvdEndTime_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$end[0].'">'.$end[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	    <span>
	   <select id="drpEndType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	    <option value="'.$end[1].'">'.$end[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span>	   
	  </td>
	  <td  width="50px">'.$row["apprx_visit_time"].'</td>
	   <td  width="50px">'.$row["apprx_expense"].'</td>
	   <td  width="40px">
	   <span onclick="showNotes(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');" style="color:#0066ff; text-decoration:underline; cursor:pointer;">Notes..</span></td>
	   <td  style="width:52px;">	   
	   <img src="Images/cancelbtn.png"  width="20px" height="20px" style="cursor:pointer;" onclick="delSvdAttr(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');" /></td>	   
	</tr>';
	 }
	} 
}

if(isset($_GET['showHtl']) && isset($_GET['wlid']))
{
$user_cust = true;
$sel_loc = "select distinct(loc_name) as loc_name, DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_GET['wlid']."' group by loc_name";
$res_loc = mysqli_query($conn,$sel_loc);
$res_loc_drp = mysqli_query($conn,$sel_loc);
echo '<span style="float:left; margin-left:5px;">Need Hotel In:</span>';
if($res_loc)
{
while($row = mysqli_fetch_array($res_loc))
{
 echo '<span style="float:left; width:15%; margin-left:5px;">
  <div id="div_'.$row["loc_name"].'" style="float:left; width:auto; padding:5px; background:#002929; color:#fff; font-size:12px; border-radius:5px; position:relative;" onclick="load_chk_dates(\''.$row["loc_name"].'\',\''.$_GET['wlid'].'\');">
   <div style="width:100%; float:left; border-bottom:1px solid #fff"><span style="float:left;">'.$row["loc_name"].'</span></div>
   <div style="width:100%; float:left;"><span style="float:left;">'.$row["Dmin"].' to '.$row["Dmax"].'</span></div>
   <div style="position:absolute; top:-5px; right:-5px;"><img src="Images/closebtn.png" width="15px" height="15px" onclick="hide_block(\'div_'.$row["loc_name"].'\');" /></div>
  </div>
 </span>';
}
}

}

if(isset($_GET['chkDates']) && isset($_GET['wlid']) && isset($_GET['locNm']))
{
$sel_loc_wl = "select distinct(loc_name) as loc_name, DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_GET['wlid']."' and loc_name='".$_GET['locNm']."' group by loc_name";
$res_loc_wl = mysqli_query($conn,$sel_loc_wl);

$sel_loc = "select distinct(loc_name) as loc_name, DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_GET["wlid"]."' group by loc_name";
$res_loc_drp = mysqli_query($conn,$sel_loc);

if($res_loc_wl)
{
while($r = mysqli_fetch_array($res_loc_wl))
{
$dt1 = date_create($r["Dmin"]);
$dt2 = date_create($r["Dmax"]);

$date = date_diff($dt1,$dt2);

echo '<div style="float:left; width:100%; margin-top:20px;">
<table width="80%" cellpadding="5" cellspacing="0" style="table-layout:fixed; word-wrap:break-word;">
<tr>
 <th align="right">Location :</th>
<td colspan="2" align="left">
<input type="text" id="txtcustHtlLoc" class="txtbox_Tab" style="width:200px;" placeholder="Type location" onchange="load_chk_dates(this.value,\''.$_GET['wlid'].'\');" value="'.$_GET['locNm'].'" />
<select id="drpcustHtlLoc" style="width:200px;" onchange="load_chk_dates(this.value,\''.$_GET['wlid'].'\'); hide_block(\'txtcustHtlLoc\');">';
if($res_loc_drp)
{
echo '<option value="'.$_GET['locNm'].'">'.$_GET['locNm'].'</option>';
while($row = mysqli_fetch_array($res_loc_drp))
{
  echo '<option value="'.$row["loc_name"].'">'.$row["loc_name"].'</option>';
}
}
echo '</select></td>
 <td align="left">
 </td>
</tr>
<tr>
 <th align="center" colspan="4">Check-in: &nbsp;
<input type="text" class="txtbox_Tab" style="width:100px;" placeholder="Check-in date" onclick="oDP.show(event,this.id,2); show_block(\'TripDates\');" value="'.$r["Dmin"].'" /> 
&nbsp;&nbsp;Check-out: &nbsp;<input type="text" class="txtbox_Tab" style="width:100px;" placeholder="Check-out date" onclick="oDP.show(event,this.id,2); show_block(\'TripDates\');" value="'.$r["Dmax"].'" />&nbsp; &nbsp;
# Days &nbsp;<input type="text" class="txtbox_Tab" style="width:40px;" value="'.$date->format("%a").'" />
</tr>
<tr>
 <th colspan="4" align="center"># Rooms &nbsp;
<input type="text" class="txtbox_Tab" style="width:40px;" />
&nbsp; &nbsp;
# Adults: &nbsp; <input type="text" class="txtbox_Tab" style="width:40px;" />
&nbsp; &nbsp;  # Children: &nbsp; <input type="text" class="txtbox_Tab" style="width:40px;" />
</tr>
<tr>
<td colspan="4" align="center"><input type="button" class="smallbtn" style="width:100px; padding:2px; float:none;" value="Search hotels" /></td>
</tr>
</table>
</div>';

}
}
}

if(isset($_GET['custTripForm']) && isset($_GET['wlid']))
{

$sel_loc = "select distinct(loc_name) as loc_name, DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_GET['wlid']."' group by loc_name";
$res_loc = mysqli_query($conn,$sel_loc);
$res_loc_htl = mysqli_query($conn,$sel_loc);
$res_loc_trv = mysqli_query($conn,$sel_loc);
$res_loc_trvl = mysqli_query($conn,$sel_loc);
$res_loc_req = mysqli_query($conn,$sel_loc);

$sel_trpdt = "select  DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_GET['wlid']."' group by wl_id";
$res_trpdt = mysqli_query($conn,$sel_trpdt);
if($res_trpdt)
{
while($row = mysqli_fetch_array($res_trpdt))
{
$trpFrm = $row["Dmin"];
$trpTo = $row["Dmax"];
}
}

  echo '<div style="width:100%; display:block;"> 
  <span style="float:left; font-size:24px; margin-left:5px;">Custom create my trip and Get Quote </span>
  <span style="float:right;">
	<span style="text-decoration:none;" onClick="close_custom_trip();">
	<img src="Images/cancelbtn1.png" width="30px" height="30px"/></span>
	</span>	  
	    
   </div>';	
	   
	  echo '<hr style="height:0px; border:1px solid red; width:100%" />';
	   
	   echo '<div style="width:100%;">
	     
		 <div style="width:100%;"  class="div_elements">
	  <span style="float:left; font-size:16px; margin-left:5px; background:#FFFFCC; font-family:Calibri;">
	     Now you have researched the location and shortlisted your interested areas in &nbsp; </span>';
		 if($res_loc)
		 {
		 echo '<span id="span_destCity" style="float:left; color:#0066FF; font-weight:600; font-size:16px;">';
		 while($row = mysqli_fetch_array($res_loc))
		 {
		 echo '<span>'.$row["loc_name"].', </span>';
		 }
		 echo '</span>';				   
		}	 	 
		 echo '<span style="float:left; margin-left:3px;"> Go ahead to create your custom trip with your wishlist! Let\'s begin ...
	  </span>
	  </div>   
	  
	  </div>';
	  
	 echo '<div style="float:left; width:95%; font-family:calibri; font-size:14px; background:#fff; border:1px solid #ddd; border-radius:5px; padding:5px; margin-left:10px;">
	    <span style="float:left; margin-left:5px;">My travel dates</span>
		<span style="float:left; margin-left:5px;"><input type="text" class="txtbox_Tab" id="txtTrpfrom_dt" name="txtTrpfrom_dt" style="width:80px;" value="'.$trpFrm.'" /><img src="Images/calendar_icon.jpg" width="20px" height="18px"  onClick="oDP.show(event,\'txtTrpfrom_dt\',2); ShowContent(\'TripDates\');" /></span>
		<span style="float:left; margin-left:5px;"><input type="text" class="txtbox_Tab" id="txtTrpto_dt" name="txtTrpto_dt" style="width:80px;" value="'.$trpTo.'" /><img src="Images/calendar_icon.jpg" width="20px" height="18px" onClick="oDP.show(event,\'txtTrpto_dt\',2);ShowContent(\'TripDates\');" /></span>
		<span style="float:left; margin-left:40px; color:#444">My Current City </span>
		<span  style="float:left; margin-left:10px; color:#444444;">
				<select id="drpcurcity" name="drpcurcity" style="width:200px; height:25px;" onChange="dispTrvFrmCity(this.value);" >';
			  $q_locs_cur = "select locName from user_destinations where type='DOMESTIC'";
				 $res_locs_cur = mysqli_query($con,$q_locs_cur);
				 if($res_locs_cur)
				 {
				  while($rw = mysqli_fetch_array($res_locs_cur))
				  {
				    echo '<option value="'.$rw["locName"].'">'.$rw["locName"].'</option>';
				  }
				 }
				 
				echo '</select> </span>
	  </div>';
	  
	  echo '<div style="background:#fff; width:95%; height:auto; float:left; margin-left:10px; margin-top:10px; border:1px solid #DDDDDD; border-radius:5px;">
	      <div style="float:left; width:100%; padding:5px;">
				
		     <span style="float:left; margin-left:10px;"><img src="Images/icons/people.jpg" width="20px" height="20px" /></span>
	     
		 	 <span style="font-size:14px; font-family:calibri;  float:left; margin-left:10px;" >
			   <span style="float:left;">Adults &nbsp;<input type="text" id="txtAdults" name="txtAdults" class="txtbox_Tab" placeholder="0" style="width:30px;height:22px; margin:0 0 0 0;" onMouseOver="txtbox_color_onmouseover(\'txtAdults\');" onMouseOut="txtbox_color_onmouseout(\'txtAdults\');" /></span>			  
			   <span style="float:left; margin-left:10px;">Sr.Citizen(60+) &nbsp;<input type="text" id="txtKids12abv" name="txtSenior" class="txtbox_Tab" placeholder="0" style="width:30px;height:22px; margin:0 0 0 0;" onMouseOver="txtbox_color_onmouseover(\'drpccity\');" onMouseOut="txtbox_color_onmouseout(\'drpccity\');" /></span>
			   <span style="float:left; margin-left:10px;"><span style="color:#0066ff; font-weight:bold; cursor:pointer; text-decoration:underline;" onClick="show_block(\'chld0_2\');show_block(\'chld2_12\');show_block(\'chld12\');">Child</span></span>
			   	<span id="chld0_2" style="float:left; margin-left:5px; display:none;"> 0-2Yrs &nbsp;<input type="text" id="txtKids0_2" name="txtKids0_2" class="txtbox_Tab" placeholder="0" style="width:30px;height:22px; margin-left:1px; margin-right:1px;" onMouseOver="txtbox_color_onmouseover(\'drpKids\');" onMouseOut="txtbox_color_onmouseout(\'txtKids0_2\');" /></span>
			<span id="chld2_12" style="float:left; margin-left:10px; display:none;"> 2-12Yrs &nbsp;<input type="text" id="txtKids2_12" name="txtKids2_12" class="txtbox_Tab" placeholder="0" style="width:30px;height:22px;" onMouseOver="txtbox_color_onmouseover(\'drpccity\');" onMouseOut="txtbox_color_onmouseout(\'drpccity\');" /></span>
			<span id="chld12" style="float:left; margin-left:10px; display:none;">12+Yrs &nbsp;<input type="text" id="txtKids12abv" name="txtKids12abv" class="txtbox_Tab" placeholder="0" style="width:30px;height:22px; margin:0 0 0 0;" onMouseOver="txtbox_color_onmouseover(\'drpccity\');" onMouseOut="txtbox_color_onmouseout(\'drpccity\');" /></span>
				
			</span>		
			
		 </div>
	  </div>
	  
      <div style="float:left; width:99%; margin-top:10px;">
	     <div style="background:#fff; padding:5px; width:100%; float:left;  border:1px solid #DDDDDD; border-radius:5px;">
		  
		   <table id="cust_htl" width="100%" cellpadding="1" cellspacing="0"  style="font-size:14px; font-family:calibri; border:1px solid #ddd; float:left;">
		   <tr><th colspan="16"><span style="float:left;"><img src="Images/hotel.png" width="30px" height="30px" /></span><span style="float:left; margin-left:50px;">Hotel Preference with a budget range &nbsp; <input type="text" id="txtHtl_budg1" name="txtHtl_budg1" class="txtbox_Tab" style="width:70px;" />&nbsp; to &nbsp; <input type="text" class="txtbox_Tab" id="txtHtl_budg2" name="txtHtl_budg2" style="width:70px;" />&nbsp; 
		   <select id="drpHtlCurrency" style="width:auto; padding:3px; height:22px; margin-top:3px;">
		   <option value="INR">INR</option>
		   <option value="$">$</option>
		   <option value="&pound;">&pound;</option>
		   <option value="&#8364;">&#8364;</option>
		   <option value="&yen;">&yen;</option>
		   </select></span>
		   <hr style="float:left; border:1px solid #ccc; width:100%;" />
		   </th></tr>
		      <tr>
			   <th align="left">Location</th>
			   <th align="left">Check-in Date</th>
			   <th align="left">Check-out Date</th>
			   <th align="left">Duration</th>
			   <th align="left">Star Rate</th>
			   <th align="left">Occupancy</th>
			   <th align="left"># of rooms</th>
			   <th align="left">Extra Bed</th>
			   <th align="left">Food Plan</th>
			   <th align="left">Add Row</th>
			   <th align="left">Del Row</th>
			 </tr>';
			 if($res_loc_htl)
			 {
			 $i=2;
			 while($row = mysqli_fetch_array($res_loc_htl))
			 {
			   $i++;
			   $dt1 = date_create($row["Dmin"]);
			   $dt2 = date_create($row["Dmax"]);
			   $dur = date_diff($dt1,$dt2);
			   
			  echo '<tr id="trHtl_'.$row["loc_name"].'">';
			  echo '<td width="90px"><input type="text" class="txtbox_tab" style="width:90px; font-size:14px;" id="txtHtl_loc_'.$i.'" name="txtHtl_loc_'.$i.'" value="'.$row["loc_name"].'" /></td>';
			  echo '<td><input type="text" class="txtbox_tab" style="width:90px; font-size:14px;" id="txtHtl_chkIn_'.$i.'" name="txtHtl_chkIn_'.$i.'" onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" value="'.$row["Dmin"].'" /></td>';
			  echo '<td ><input type="text" class="txtbox_tab" style="width:90px; font-size:14px;" id="txtHtl_chkOut_'.$i.'" name="txtHtl_chkOut_'.$i.'" onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" value="'.$row["Dmax"].'" /></td>';
			  echo '<td ><input type="text" class="txtbox_tab" style="width:50px; font-size:14px;" id="txtHtl_dur_'.$i.'" name="txtHtl_dur_'.$i.'" value="'.$dur->format("%a").'" /></td>';
			  echo '<td><select id="txtHtl_star_'.$i.'" name="txtHtl_star_'.$i.'" style="width:40px;  font-size:14px;">
			  <option value="*">*</option>
			  <option value="**">**</option>
			  <option value="***">***</option>
			  <option value="****">****</option>
			  <option value="*****">*****</option>
			  </select></td>';
			  echo '<td><select id="txtHtl_occ_'.$i.'" name="txtHtl_occ_'.$i.'" style="width:60px; font-size:14px;">
			  <option value="Single">Single</option>
			  <option value="Double">Double</option>
			  </select>
			  </td>';
			  echo '<td><input type="text" class="txtbox_tab" style="width:40px; font-size:14px;;" id="txtHtl_rooms_'.$i.'" name="txtHtl_rooms_'.$i.'"  /></td>';
			  echo '<td><input type="text" class="txtbox_tab" style="width:40px; font-size:14px;" id="txtHtl_extrBed_'.$i.'" name="txtHtl_extrBed_'.$i.'"  /></td>';
			  echo '<td><select id="txtHtl_food_'.$i.'" name="txtHtl_food_'.$i.'" style="width:60px; font-size:14px;">
			  <option value="Veg">Veg</option>
			  <option value="Non-Veg">Non-Veg</option>
			  <option value="Jain">Jain</option>
			  </select>
			  </td>';
			  echo '<td align="center"><input type="button" class="smallbtn" width="30px" value="Add" onclick="ld_cust_trip_htl();" /></td>';
			  echo '<td align="center"><img src="Images/closebtn.png" width="15px" height="15px" style="cursor:pointer;" onclick="hide_block(\'trHtl_'.$row["loc_name"].'\');" /></td>';
			  echo '</tr>';
			 }
			 }
		   echo '</table>	    
		
		 </div>	 
		 <input type="text" id="txtHtl_rows" name="txtHtl_rows" style="visibility:hidden; width:30px;"  />
	  
	   </div>
	  
	   <div style="float:left; width:99%;  margin-top:0px;"> 
	  
	   <span style="width:55%; float:left; margin-left:6px; margin-right:5px;"> 
	        <div style="background:#fff; width:100%; padding:5px; float:left; border:1px solid #DDDDDD; border-radius:5px;">
			   
			   <table id="cust_trv" width="100%" cellpadding="1" cellspacing="0" style="font-size:14px; font-family:calibri; border:1px solid #ddd;">
			<tr><th colspan="9" align="left"><img src="Images/icons/trnsprt.jpg" width="25px" height="22px" />
			<label style="margin-left:5px;">Transport facility between cities</label>
			 <hr style="float:left; border:1px solid #ccc; width:100%;" />
			</th></tr>
			  <tr>				  
				   <th align="left">From</th>
				   <th align="left">To</th>
				   <th align="left">Date</th>
				   <th align="left">Travel Mode</th>
				   <th align="left">Add Row</th>
				   <th align="left">Delete Row</th>
				 </tr>';
				if($res_loc_trv) 	
				{
				$i=2;
				while($row = mysqli_fetch_array($res_loc_trv))
				{
				$i++;
				  echo '<tr id="trTrv_'.$row["loc_name"].'">';
				  echo '<td><input type="text" class="txtbox_Tab" style="width:80px; font-size:14px;" id="txtTrv_from_'.$i.'" name="txtTrv_from_'.$i.'" /></td>';
				  echo '<td><input type="text" class="txtbox_Tab" style="width:80px; font-size:14px;" id="txtTrv_to_'.$i.'" name="txtTrv_to_'.$i.'" value="'.$row["loc_name"].'" /></td>';
				  echo '<td><input type="text" class="txtbox_Tab" style="width:80px; font-size:14px;" id="txtTrv_date_'.$i.'" name="txtTrv_date_'.$i.'" onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" /></td>';
				  echo '<td><select id="txtTrv_mode_'.$i.'" name="txtTrv_mode_'.$i.'" style="width:60px; font-size:14px;">
				  <option value="By Flight">By Flight</option>
				  <option value="By Train">By Train</option>
				  <option value="By Bus">By Bus</option>
				  <option value="By Car">By Car</option>
				   </select>
				  </td>';
				  echo '<td><input type="button" class="smallbtn" style="width:40px;" value="Add" onclick="ld_cust_trip_trv();" /></td>';
				  echo '<td><img src="Images/closebtn.png" width="15px" height="15px" style="cursor:pointer;" onclick="hide_block(\'trTrv_'.$row["loc_name"].'\');" /></td>';
				  echo '</tr>';
				}
				}	
								  
			   echo '</table>
			   
			   </div>
			   <input type="text" id="txtTrv_rows" name="txtTrv_rows" style="visibility:hidden; width:30px;"  />
		</span>
		
		<span style="float:left; width:40%;  margin-left:6px; ">	   
			   <div style="background:#fff; width:100%; padding:5px; float:left; border:1px solid #DDDDDD; border-radius:5px;">			   
			   <table id="cust_trvl" width="100%" cellpadding="1" cellspacing="0" style="font-size:14px; font-family:calibri; border:1px solid #ddd;">
			<tr ><th colspan="9" align="left"><img src="Images/Taxi.png" width="25px" height="22px" /><label style="margin-left:5px;">Transport within city</label>
			 <hr style="float:left; border:1px solid #ccc; width:100%;" />
			</th></tr>
			       <tr>
				  <th align="left">Location</th>
				  <th align="left">Mode</th>				   
				   <th align="left"># of <img src="Images/icons/people.jpg" width="20px" height="20px" /></th>
				   <th align="left">From Date</th>
				   <th align="left">To Date</th>				   
				  </tr>	';
				  	if($res_loc_trvl)
					{
					$i=2;
					while($row = mysqli_fetch_array($res_loc_trvl))
					{
					$i++;
					 echo '<tr id="trTrvl_'.$row["loc_name"].'">';
					 echo '<td><input type="text" class="txtbox_Tab" style="width:80px; font-size:14px;" id="txtLTrv_loc_'.$i.'" name="txtLTrv_loc_'.$i.'" value="'.$row["loc_name"].'" /></td>';
					 echo '<td><select style="width:60px; font-size:14px;" id="txtLTrv_mode_'.$i.'" name="txtLTrv_mode_'.$i.'">
					 <option value="By Car">By Car</option>
					 <option value="By Taxi">By Taxi</option>
					 </select>
					 </td>';
					 echo '<td><input type="text" class="txtbox_Tab" style="width:40px; font-size:14px;" id="txtLTrv_numPasn_'.$i.'" name="txtLTrv_numPasn_'.$i.'"  /></td>';
					 echo '<td><input type="text" class="txtbox_Tab" style="width:60px; font-size:14px;" id="txtLTrv_datefrm_'.$i.'" name="txtLTrv_datefrm_'.$i.'"  onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" /></td>';
					  echo '<td><input type="text" class="txtbox_Tab" style="width:60px; font-size:14px;" id="txtLTrv_dateto_'.$i.'" name="txtLTrv_dateto_'.$i.'"  onclick="oDP.show(event,this.id,2); ShowContent(\'TripDates\');" /></td>';
					 echo '</tr>'; 
					}
					}		  
			   echo '</table>
				</div>
		</span>
	
	 </div>	
		
		<div style="float:left; width:100%; margin-top:10px;">		
		 <div style="background:#fff; width:95%; float:left;  padding:5px;   border:1px solid #DDDDDD; border-radius:5px; margin-left:10px;">		
            <table id="cust_req" width="100%" cellpadding="1" cellspacing="0" style="font-size:14px; font-family:calibri; border:1px solid #ddd;">
			<tr><th colspan="4" align="left"><label style="margin-left:5px;">Other Requirements (Ex. Tour Guide)</label>
			 <hr style="float:left; border:1px solid #ccc; width:100%;" />
			</th></tr>	
			  <tr>
			  <th align="center">Location</th>
			  <th align="center">Requirement </th>	
		  </tr>';
		  if($res_loc_req)
		  {$i=2;
		  while($row = mysqli_fetch_array($res_loc_req))
		  {
		  $i++;
		   echo '<tr>';
		   echo '<td align="center"><input type="text" class="txtbox_Tab" style="width:100px; font-size:14px;" id="txtReq_loc_'.$i.'" name="txtReq_loc_'.$i.'" value="'.$row["loc_name"].'" /></td>';
		   echo '<td align="center"><textarea id="txtReq_type_'.$i.'" name="txtReq_type_'.$i.'" style="width:500px; height:60px; font-size:14px;"></textarea></td>';
		   echo '</tr>';
		  }
		  }
		echo '</table>		
	   </div>		 
      </div>

       <div style="width:100%;" align="center">
 <span style="float:none; float:left; margin-left:40%;">
 
 <input type="submit" id="btnGetQuote" name="btnGetQuote" class="smallbtn" style="color:white; margin-right:2%; width:100px; float:none;" value="Get me Quote" onmouseover="count_cust_rows();" /></span>

  <span style="float:none; margin-left:10px; float:left;" onClick="show_preview_htl(); "> <input type="button" id="btnCust_preview" name="btnCust_preview" class="smallbtn" style="color:white; margin-right:2%; width:100px; float:none;" value="Preview" onClick="show_block(\'cust_trip_prev\'); show_block(\'div_greyBack\');  show_preview_trv(); show_preview_req(); show_preview_trvlcl(); " /></span>
</div>';
}

if(isset($_GET['mapView']) && isset($_GET['mapWlid']))
{
echo '<div style="float:left; width:100%;">  
   <div style="color:white; width:100%;"> 
  <span id="closeBtn" style="float:right; z-index:300;"/>
   <img src="Images/cancelbtn.png" width="40px" height="40px" style="cursor:pointer;" onClick="close_wshlst_map_svd();" />
   </span>
   </div>
     
   <span style="float:left; width:60%;">
   <div style="margin:5px 3px 3px 5px;">
     <span id="btnMapAll_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; cursor:pointer;"  onclick="showDayMapAll();">All</span></a>
	 <span id="btnMapDay1_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:purple; cursor:pointer;" onclick="showDayMapDay1();">Day 1</span></a>
	 <span id="btnMapDay2_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:#C71585; cursor:pointer;" onclick="showDayMapDay2();">Day 2</span></a>
	<span id="btnMapDay3_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:blue; cursor:pointer;" onclick="showDayMapDay3();">Day 3</span></a>
	 <span id="btnMapDay4_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:green; cursor:pointer;" onclick="showDayMapDay4();">Day 4</span></a>	 
   </div>
  
   <div id="map_selected_All_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
  <div id="map_selected_Day1_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day2_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day3_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day4_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>  
   
   </span>
   
         <span style="float:left; display:none;">      
   <span id="sp1" style="display:none;"></span>
   <span id="sp2" style="display:none;"></span>
  </span>
  	
   <span style="float:right; width:40%;">   
    <div id="div_All_Loc" style="margin-top:20px;">
	<div class="div_elements" style="float:left;width:100%;"><span id="onMap_city" style="float:left; color:#FF0033; font-size:16px;"></span></div>
	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:block; margin-top:5px;">	  
      <table id="map_table_All_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';		
		 if(isset($_GET['mapWlid']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWlid']."'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB_'.$i.'" id="td2_DB_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWlid'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day1_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 
		 if(isset($_GET['mapWlid']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWlid']."' and schedule='DAY1'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB1_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB1_'.$i.'" id="td2_DB1_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWlid'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB1_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB1_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB1_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day2_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 
		 if(isset($_GET['mapWlid']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWlid']."' and schedule='DAY2'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB2_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB2_'.$i.'" id="td2_DB2_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWlid'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB2_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB2_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB2_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		 
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day3_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 	 
		 if(isset($_GET['mapWlid']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWlid']."' and schedule='DAY3'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB3_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB3_'.$i.'" id="td2_DB3_'.$i.'"  onchange="update_sche_map(\''.$_GET['mapWlid'].'\',\''.$row["attr_name"].'\',this.value);"/></td>';
		  echo '<td id="td3_DB3_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB3_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB3_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day4_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 	 
		 if(isset($_GET['mapWlid']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWlid']."' and schedule='DAY4'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB4_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB4_'.$i.'" id="td2_DB4_'.$i.'"  onchange="update_sche_map(\''.$_GET['mapWlid'].'\',\''.$row["attr_name"].'\',this.value);"/></td>';
		  echo '<td id="td3_DB4_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB4_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB4_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		 
	  echo '</table>
	  </div>	 
	  <div style="margin-top:5px;">
	  <span style="float:left; font-size:12px; color:#222222; font-family:Calibri;">*Click on day to change(Ex. DAY1 to DAY4).<br/>After edit click on "Refresh" button above the map.</span>
	  <span style="float:right;"><span id="btnMapRefr" class="smallbtn" style="width:50px; heigh:20px; float:left; background:Maroon; cursor:pointer;" onclick="showSvdMap(\''.$_GET["mapWlid"].'\');">Refresh</span></span>
	  </div>
   </div>
   <div style="margin-top:10px; width:100%; float:left;">
   <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Save to<br/>profile</div></span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Download<br/>Now</div> </span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Create<br/>Trip</div></span>
	    <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Book<br/>Hotel</div></span>
   </div>
 </span>
</div>';
}


if(isset($_GET['mapWLIDup']) && isset($_GET['mapAttr']) && isset($_GET['mapDay']))
{

$q_sel_dt = "select trip_date, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."' and schedule='".$_GET['mapDay']."'";
$res_sel_dt = mysqli_query($conn,$q_sel_dt);
if($res_sel_dt)
{
while($row = mysqli_fetch_array($res_sel_dt))
{
 $updt_day = "update saved_wl set schedule='".$_GET['mapDay']."', trip_date='".$row["trip_date"]."' where wl_id='".$_GET['mapWLIDup']."' and attr_name='".$_GET['mapAttr']."'";
$res_updt_day = mysqli_query($conn,$updt_day); 
}
}
 $updt_day = "update saved_wl set schedule='".$_GET['mapDay']."' where wl_id='".$_GET['mapWLIDup']."' and attr_name='".$_GET['mapAttr']."'";
$res_updt_day = mysqli_query($conn,$updt_day);


echo '<div style="float:left; width:100%;">  
   <div style="color:white; width:100%;"> 
  <span id="closeBtn" style="float:right; z-index:300;"/>
   <img src="Images/cancelbtn.png" width="40px" height="40px" style="cursor:pointer;" onClick="close_wshlst_map_svd();" />
   </span>
   </div>
     
   <span style="float:left; width:60%;">
   <div style="margin:5px 3px 3px 5px;">
     <span id="btnMapAll_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; cursor:pointer;"  onclick="showDayMapAll();">All</span></a>
	 <span id="btnMapDay1_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:purple; cursor:pointer;" onclick="showDayMapDay1();">Day 1</span></a>
	 <span id="btnMapDay2_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:#C71585; cursor:pointer;" onclick="showDayMapDay2();">Day 2</span></a>
	<span id="btnMapDay3_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:blue; cursor:pointer;" onclick="showDayMapDay3();">Day 3</span></a>
	 <span id="btnMapDay4_svd" class="smallbtn" style="width:40px; heigh:20px; float:left; background:green; cursor:pointer;" onclick="showDayMapDay4();">Day 4</span></a>	 
   </div>
  
   <div id="map_selected_All_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
  <div id="map_selected_Day1_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day2_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day3_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day4_svd" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>  
   
   </span>
   
         <span style="float:left; display:none;">      
   <span id="sp1" style="display:none;"></span>
   <span id="sp2" style="display:none;"></span>
  </span>
  	
   <span style="float:right; width:40%;">   
    <div id="div_All_Loc" style="margin-top:20px;">
	<div class="div_elements" style="float:left;width:100%;"><span id="onMap_city" style="float:left; color:#FF0033; font-size:16px;"></span></div>
	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:block; margin-top:5px;">	  
      <table id="map_table_All_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';		
		 if(isset($_GET['mapWLIDup']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB_'.$i.'" id="td2_DB_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWLIDup'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day1_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 
		 if(isset($_GET['mapWLIDup']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."' and schedue='DAY1'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB1_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB1_'.$i.'" id="td2_DB1_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWLIDup'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB1_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB1_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB1_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day2_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 
		 if(isset($_GET['mapWLIDup']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."' and schedule='DAY2'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB2_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB2_'.$i.'" id="td2_DB2_'.$i.'" onchange="update_sche_map(\''.$_GET['mapWLIDup'].'\',\''.$row["attr_name"].'\',this.value);" /></td>';
		  echo '<td id="td3_DB2_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB2_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB2_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		 
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day3_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 	 
		 if(isset($_GET['mapWLIDup']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."' and schedule='DAY3'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB3_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB3_'.$i.'" id="td2_DB3_'.$i.'"  onchange="update_sche_map(\''.$_GET['mapWLIDup'].'\',\''.$row["attr_name"].'\',this.value);"/></td>';
		  echo '<td id="td3_DB3_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB3_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB3_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		
	  echo '</table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day4_svd" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>';
		 	 
		 if(isset($_GET['mapWLIDup']))
		 {
		  $q_map = "select distinct(attr_name) as attr_name, loc_name, schedule from saved_wl where wl_id='".$_GET['mapWLIDup']."' and schedule='DAY4'";
		 $res_map = mysqli_query($conn,$q_map);
		 $i = 0;
		 if($res_map)
		{
		 while($row = mysqli_fetch_array($res_map))
		 {
		   $i++;
		  echo '<tr style="font-size:12px;">';
		  echo '<td id="td1_DB4_'.$i.'">'.$i.'</td>';
		  echo '<td><input type="text" style="border:0px; background:transparent; width:60px;font-size:12px;" value="'.$row["schedule"].'" name="td2_DB4_'.$i.'" id="td2_DB4_'.$i.'"  onchange="update_sche_map(\''.$_GET['mapWLIDup'].'\',\''.$row["attr_name"].'\',this.value);"/></td>';
		  echo '<td id="td3_DB4_'.$i.'">'.$row["loc_name"].'</td>';
		  echo '<td id="td4_DB4_'.$i.'">'.$row["attr_name"].'</td>';
		  echo '<td id="td5_DB4_'.$i.'"></td>';
		  echo '<td></td>';
		  echo '</tr>';
		  }
	  }
	  }
		 
	  echo '</table>
	  </div>	 
	  <div style="margin-top:5px;">
	  <span style="float:left; font-size:12px; color:#222222; font-family:Calibri;">*Click on day to change(Ex. DAY1 to DAY4).<br/>After edit click on "Refresh" button above the map.</span>
	  <span style="float:right;"><span id="btnMapRefr" class="smallbtn" style="width:50px; heigh:20px; float:left; background:Maroon; cursor:pointer;" onclick="showSvdMap(\''.$_GET["mapWLIDup"].'\');">Refresh</span></span>
	  </div>
   </div>
   <div style="margin-top:10px; width:100%; float:left;">
   <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Save to<br/>profile</div></span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Download<br/>Now</div> </span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Create<br/>Trip</div></span>
	    <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Book<br/>Hotel</div></span>
   </div>
 </span>
</div>';

}

if(isset($_GET["Notes"]) && isset($_GET["WLID"]) && isset($_GET["Attr"]))
{
echo '<div style="float:left; width:100%;">
    <span style="float:right;"><img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_notes\');" /></span>
 </div>';
$notes = "select distinct(attr_name) as attr_name, notes from saved_wl where wl_id='".$_GET['WLID']."' and attr_name='".$_GET['Attr']."'"; 
$res_notes = mysqli_query($conn,$notes);
if($res_notes)
{
while($row = mysqli_fetch_array($res_notes))
{
echo '<div style="float:left; width:100%;">
<div style="float:left; width:100%;">
<span style="float:left; margin-left:10px;">'.$row["attr_name"].'</span>
</div>
<div style="float:left; width:100%; height:200px;">
<span style="float:left;">
<textarea id="txtANotes" style="width:300px; height:200px;" onchange="updtNotes(\''.$_GET["WLID"].'\',\''.$_GET["Attr"].'\',this.id)">'.$row["notes"].'</textarea>
</span>
</div>
</div>'; 
}
}
}

if(isset($_GET["Notes"]) && isset($_GET["WLID"]) && isset($_GET["Attr"]) && isset($_GET['txtNotes']))
{
$updtNotes = "update saved_wl set notes='".$_GET["txtNotes"]."' where wl_id='".$_GET['WLID']."' and attr_name='".$_GET['Attr']."'";
$res_updt_nts = mysqli_query($conn,$updtNotes);
if($res_updt_nts)
{
echo '<script type="text/javascript">';
 echo 'alert(\'Success : Notes updated\')';
 echo '</script>';
}
else
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Error : Try Again\')';
 echo '</script>';
} 

}

if(isset($_GET['Likes']) && isset($_GET['LOC']) && isset($_GET['ATTR']) && isset($_GET['CATE']))
{
echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>

<div sytle="float:left; width:100%;">
<span style="float:left; margin-left:5px; font-family:calibri; font-size:12px;">Already Visited</span>
<span style="float:left; margin-left:5px;"><input type="radio" name="rdVisit" id="rdYes" value="YES" />YES</span>
<span style="float:left; margin-left:5px;"><input type="radio" name="rdVisit" id="rdNo" value="NO" />NO</span>
</div>

<div style="float:left; width:100%; margin-top:5px;">
<span style="float:left; margin-left:5px; font-family:calibri; font-size:12px;">Like / Dislike</span>
<span style="float:left; margin-left:5px;"><input type="radio" name="rdlikes" id="rdlike" value="YES" checked="true" /><img src="Images/likebtn.png" width="30px" height="30px" /></span>
<span style="float:left; margin-left:5px;"><input type="radio" name="rdlikes" id="rddislike" value="NO" /><img src="Images/dislikebtn.png" width="30px" height="30px" /></span>

</div>

<div style="float:left; width:100%; margin-bottom:10px; margin-top:5px;">
  <span style="float:left; margin-left:20px;">
  <input type="text" id="txtLikesEmail" class="txtbox_Tab" style="width:160px;" placeholder="Enter Email ID" /></span>
  <span style="float:left; margin-left:10px;">
  <input type="button" class="smallbtn" style="width:60px; float:none;" value="Submit" onclick="chkLikeExists(\''.$_GET['LOC'].'\',\''.$_GET['ATTR'].'\',\'txtLikesEmail\',\''.$_GET['CATE'].'\');" /> 
  </span>
</div>';
}

if(isset($_GET['Likes']) && isset($_GET['LOC']) && isset($_GET['ATTR']) && isset($_GET['EMLID']) && isset($_GET['cateID']) && isset($_GET['Visit']) && isset($_GET["LIKE"]))
{
$chkUser = "select user_email, loc_name, attr_name, flag_like from likes_tab where loc_name='".$_GET['LOC']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
$res_user = mysqli_query($con,$chkUser);
if($res_user)
{
$rows_user = mysqli_num_rows($res_user);
if($rows_user>0)
{
while($row = mysqli_fetch_array($res_user))
{
 if($row["flag_like"] == "NO" && $_GET["LIKE"]=="YES")
 {
   $updt_likes = "update likes_tab set flag_like='YES' where loc_name='".$_GET['LOC']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
   mysqli_query($con,$updt_likes);
   
  $updt_likes = "update likes_tab set total_likes=total_likes+1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
  $updt_likes = "update likes_tab set total_dislikes=total_dislikes-1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
    $sel_likes = "select total_likes, total_dislikes from likes_tab where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' limit 1";
  $res_sel_likes = mysqli_query($con,$sel_likes);

if($res_sel_likes)
{
while($row = mysqli_fetch_array($res_sel_likes))
{
  $updt_likes_user = "update likes_tab set total_likes='".$row["total_likes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_likes_user);
  
    $updt_dislikes_user = "update likes_tab set total_dislikes='".$row["total_dislikes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_dislikes_user);
}
}
  echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>';

   echo 'Thank you for your feedback on '.$_GET['ATTR']; 
 }
 else if($row["flag_like"] == "YES" && $_GET["LIKE"]=="NO")
 {
  $updt_likes = "update likes_tab set flag_like='NO' where loc_name='".$_GET['LOC']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
   mysqli_query($con,$updt_likes);
   
  $updt_likes = "update likes_tab set total_likes=total_likes-1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
  $updt_likes = "update likes_tab set total_dislikes=total_dislikes+1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
    $sel_likes = "select total_likes, total_dislikes from likes_tab where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' limit 1";
  $res_sel_likes = mysqli_query($con,$sel_likes);

if($res_sel_likes)
{
while($row = mysqli_fetch_array($res_sel_likes))
{
  $updt_likes_user = "update likes_tab set total_likes='".$row["total_likes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_likes_user);
  
    $updt_dislikes_user = "update likes_tab set total_dislikes='".$row["total_dislikes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_dislikes_user);
  
}
}
 echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>';

   echo 'Thank you for your feedback on '.$_GET['ATTR'];
 }
 else if($row["flag_like"] == "YES" && $_GET["LIKE"]=="YES" || $row["flag_like"] == "NO" && $_GET["LIKE"]=="NO")
 {
 echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>';

   echo 'You have already given your feed back on '.$_GET['ATTR'];
 }
}
}
else
{
if($_GET['LIKE'] == "YES")
{
  $insrt_user = "insert into likes_tab (user_email,loc_name,cate_id,attr_name,flag_visited,flag_like,date_liked) values('".$_GET['EMLID']."','".$_GET['LOC']."','".$_GET['cateID']."','".$_GET['ATTR']."','".$_GET["Visit"]."','YES','".date('Y-m-d')."')";
  $res_set = mysqli_query($con,$insrt_user);
  
  $updt_likes = "update likes_tab set total_likes=total_likes+1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
  $sel_likes = "select total_likes, total_dislikes from likes_tab where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' limit 1";
  $res_sel_likes = mysqli_query($con,$sel_likes);

if($res_sel_likes)
{
while($row = mysqli_fetch_array($res_sel_likes))
{
  $updt_likes_user = "update likes_tab set total_likes='".$row["total_likes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_likes_user);
  
    $updt_dislikes_user = "update likes_tab set total_dislikes='".$row["total_dislikes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_dislikes_user);
}
}
  
  if($res_set)
  {
  echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>';

  echo 'Thank you for your feedback on '.$_GET['ATTR'];
  }
}
else
{

  $insrt_user = "insert into likes_tab (user_email,loc_name,cate_id,attr_name,flag_visited,flag_like,date_liked) values('".$_GET['EMLID']."','".$_GET['LOC']."','".$_GET['cateID']."','".$_GET['ATTR']."','".$_GET["Visit"]."','NO','".date('Y-m-d')."')";
  $res_set = mysqli_query($con,$insrt_user);
  
  $updt_likes = "update likes_tab set total_dislikes=total_dislikes+1 where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."'";
  mysqli_query($con,$updt_likes);
  
  $sel_likes = "select total_dislikes, total_likes from likes_tab where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' limit 1";
  $res_sel_likes = mysqli_query($con,$sel_likes);

if($res_sel_likes)
{
while($row = mysqli_fetch_array($res_sel_likes))
{
  $updt_dislikes_user = "update likes_tab set total_dislikes='".$row["total_dislikes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_dislikes_user);
  
    $updt_likes_user = "update likes_tab set total_likes='".$row["total_likes"]."' where loc_name='".$_GET['LOC']."' and cate_id='".$_GET['cateID']."' and attr_name='".$_GET['ATTR']."' and user_email='".$_GET['EMLID']."'";
  mysqli_query($con,$updt_likes_user);

}
}
  
  if($res_set)
  {
  echo '<div style="width:100%; float:left;">
 <span style="float:right; margin-left:5px;">
 <img src="Images/cancelbtn.png" width="30px" height="30px" onClick="hide_block(\'div_enter_email\');" />
 </span>
</div>';

  echo 'Thank you for your feedback on '.$_GET['ATTR'];
  }
}
}
}
}

if(isset($_GET['EmailExist']) && isset($_GET['EmailID']) && isset($_GET['loc']))
{ 
 $clntID=0;
		  $q_clnt_id = "select client_id from client_register where client_email='".$_GET['EmailID']."'";
   		$res_clnt_id = mysqli_query($conn,$q_clnt_id);
		  $res_clnt_num = mysqli_num_rows($res_clnt_id);
		  if($res_clnt_num > 0)
		     {
			 while($row = mysqli_fetch_array($res_clnt_id))
			 {
			   $clntID= $row["client_id"];
			 }
			 }

  $q_chk_email = "select client_uname from client_register where client_email = '".$_GET['EmailID']."'";
  $res_chk_email = mysqli_query($conn,$q_chk_email);
  if($res_chk_email)
    $row_chk_eml = mysqli_num_rows($res_chk_email);
  else
   $row_chk_eml = 0;	

  if($row_chk_eml>0)
   {       
   $q_chk_dest = "select distinct(loc_name) as loc_name, wl_id from wl_tab where client_id='". $clntID."' and loc_name = '".$_GET['loc']."' ";
		$res_chk_dest = mysqli_query($conn,$q_chk_dest);
		if($res_chk_dest)
		$rows_chk_dest = mysqli_num_rows($res_chk_dest);
		else
		$rows_chk_dest = 0;
		
		$q_chk_dest_mult = "select distinct(loc_name) as loc_name, wl_id from wl_tab where client_id='". $clntID."'";
		$res_chk_dest_mult = mysqli_query($conn,$q_chk_dest_mult);
		if($res_chk_dest_mult)
		  $rows_multi_chk_dest = mysqli_num_rows($res_chk_dest_mult);
        else
		 	$rows_multi_chk_dest = 0;	
		
		// ------------------------------------------------------------- Email Exists , Dest Exists  --------------------------------------------
	
		if($rows_chk_dest>0)
		{
	//	echo ' Email Exists , Dest Exists';
		while($rD = mysqli_fetch_array($res_chk_dest))
		{
		  $preLoc = $row["loc_name"];
		 }
		
		  echo '<div style="float:left; width:100%;" >
<div style="float:left; width:100%;" align="left">
 <span class="font-medium"> This email id and destination '.$_GET['loc'].' exists with us. Do you wish to add attractions to the existing wishlist?
</span>
</div>

<div style="float:left; margin:10px; font-size:16px;">
  <span style="float:left;"><input type="radio" name="rdadd_wl" id="rdaddwl_yes" checked="checked" value="YES" />YES, Add it to my existing wishlist in '.$_GET['loc'].' </span>
</div>

<div style="float:left; width:100%; margin-top:5px;">
<input type="submit" class="smallbtn" name="btn_crt_dest" id="btn_crt_dest" style="float:none; margin-left:20%; width:80px; height:24px; font-size:14px;" value="Submit"   />
</div>

</div>';
		}
	
			//--------------------------------------------------------------- Email Exists , Another single wishlist exists ------------------------------------------------------
		else if($rows_chk_dest<1 && $rows_multi_chk_dest==1)
		{ 
		//echo ' Email Exists , Dest Not';
		
	      	 $q_chk_wl = "select distinct(loc_name) as loc_name, wl_id from wl_tab where client_id='". $clntID."' order by wl_2 desc limit 1 ";
		$res_chk_wl = mysqli_query($conn,$q_chk_wl);
		if($res_chk_wl)
		  {
		    while($rWl = mysqli_fetch_array($res_chk_wl))
			{
			  $wlID = $rWl["wl_id"];
			  $wlLoc = $rWl["loc_name"];
			}
		  }
		
		  echo '<div style="display:block; width:100%; float:left;" >
<div style="float:left; width:100%;" align="left">
 <span class="font-medium"> This email id exists with us, you have a previous wishlist '.$wlID.' for locations '.$wlLoc.'. Do you wish to add attractions to the existing wishlist?
</span>
</div>

<div style="float:left; margin:10px; font-size:16px;">
  <span style="float:left;"><input type="radio" name="rdwl_add" id="rdwl_yes" value="YES" />YES, Add it to my existing wishlist in '.$wlLoc.' </span>
  <span style="float:left;"><input type="radio" name="rdwl_add" id="rdwl_no" value="NO"/>NO, Create a new wishlist for destination '.$_GET['loc'].'</span>
</div>

<div style="float:left; width:100%; margin-top:5px;">
<input type="submit" class="smallbtn" name="btn_crt_wl" id="btn_crt_wl" style="float:none; margin-left:20%; width:80px; height:24px; font-size:14px;" value="Submit"   />
</div>

</div>';
		}
		// ----------------------------------------------------------- For Multiple wishlists ----------------------------------------------------------------
		else if($rows_multi_chk_dest>1)
		{
		//echo ' Email Exists , Dest Multi';
		echo '<div style="display:block; float:left; width:100%;">
<div style="float:left; width:100%;">
<span style="float:left;" class="font-medium">Select a wishlist from the below table to save your attractions for '.$_GET['loc'].'</span>
</div>

<div style="float:left; width:100%;" align="left">
 <span class="font-medium"> 
 <table border="1px" width="90%" cellpadding="2" cellspacing="2">
   <tr>
   <th></th>
    <th width="100px">WL ID</th>
	<th width="100px">Location</th>
	<th width="100px">Date Created</th>
   </tr>'; 	
	$q_wl_show = "select wl_id, wl_3, loc_name from wl_tab where client_id=".$clntID."";
	$res_wl_show = mysqli_query($conn,$q_wl_show);
	if($res_wl_show)
	{
	 while($rC = mysqli_fetch_array($res_wl_show))
	 {
	  echo '<tr>';
	  echo '<td><input type="radio" name="rdWlCapt" value="'.$rC["wl_id"].'" /></td>';
	 echo '<td>'.$rC["wl_id"].'</td>';
	 echo '<td>'.$rC["loc_name"].'</td>';
	 echo '<td>'.$rC["wl_3"].'</td>';	
	 echo '</tr>'; 
	}	 
	}	
   echo '</tr>
 </table>
</span>
</div>

<div style="float:left; width:100%; margin-top:10px;"><span style="float:left;" class="font-medium">
<input type="radio" id="rd_crtNew" name="rd_crtNew" />OR I want to create a new wishlist for '.$_GET['loc'].'. </span></div>

<div style="float:left; width:100%; margin-top:5px;">
<span style="float:left;">
<input type="submit" id="btn_selWl_multi" name="btn_selWl_multi" class="smallbtn" style="width:80px; height:24px;" value="Submit" /></span></div>
</div>';
		}
		//-------------------------------------------------- Email Exists, No dest/ wl exists ---------------------------------------------			 
		else if($rows_multi_chk_dest<1)
		{
	//	echo ' Email Exists, No dest/ wl exists ';
		 echo '<div style="display:block; float:left; width:100%;">
<div style="float:left; width:100%;" align="left">
 <span class="font-medium">Your email id exists with us , click submit to create your wishlist.</span>
</div>

<div style="float:left; width:100%; margin-top:5px;">
<input type="submit" class="smallbtn" name="btn_noWl" id="btn_noWl" style="float:none; margin-left:20%; width:80px; height:24px; font-size:14px;" value="Submit"   />
</div>

</div>';
		}
		
	}

	else
	{
	//echo ' Email Not exists ';
	$q_reg_clnt = "insert into client_register values ('','CUSTOMER','".addslashes($_GET['EmailID'])."','','Prospect','','','".date('Ymd')."')";
		 $res_reg_clnt = mysqli_query($conn,$q_reg_clnt);
	  
	  if($res_reg_clnt)
	  {
	  echo '<div style="display:block; float:left; width:100%;">
<div style="float:left; width:100%;" align="left">
 <span class="font-medium">Your email id has been registered , click submit to create your wishlist.</span>
</div>
<div style="float:left; width:100%;">
<input type="submit" class="smallbtn" name="btn_eml_notExist" id="btn_eml_notExist" style="float:none; margin-left:20%; width:80px; height:24px; font-size:14px;" value="Submit"   /></div>
</div>';
	  }
	  
	}  
	
	
		
}



?>

</body>
</form>
</html>
