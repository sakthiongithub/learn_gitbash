<?php

include("PHP_Connection.php");

if(isset($_GET['postTime']) && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['MYID']))
{
$wd_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."' and reg_by='SELF' and client_id='".$_GET['MYID']."' or Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."' and reg_by='".$_GET['MYID']."' ";
$res_wd_client= mysqli_query($conn,$wd_client);
$has_row = mysqli_num_rows($res_wd_client);

$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['postTime'] == "Yest")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and pck_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['postTime'] == "Tday")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and pck_date=DATE(NOW())";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['postTime'] == "Week")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and pck_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['postTime'] == "MTD")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and MONTH(pck_date)= DATE_FORMAT(DATE(NOW()),'%m') ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['postTime'] == "YTD")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and YEAR(pck_date)= DATE_FORMAT(DATE(NOW()),'%Y') ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['postTime'] == "ITD")
{
  $q_pck_dash ="select client_id, pck_id, pck_viewed, pck_name, duration, price, revised_price, trip_theme, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					 if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					// if($has_row>0)
					 {
					 echo '<td width="40px">
					 <input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="WDN" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
					 }
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}

if(isset($_GET['pckpop']) && isset($_GET['MYID']) && isset($_GET['pckID']))
{
$sel_user = "select client_id from user_tab where user_role='B2B_Partner_Operator' and sub_user='NO' and user_status='Active' and client_id='".$_GET['MYID']."'";
$res_user= mysqli_query($conn,$sel_user);
$has_user = mysqli_num_rows($res_user);
if($has_user>0)
{
  echo '<div style="width:100%; float:left;">';
  echo '<span style="float:right; margin-right:3px;">
  <img src="Images/closebtn.png" style="width:20px; height:20px;" onclick="hide_block(\'div_withdraw_pop\');" /></span>';
  echo '<div style="float:left; width:100%;">
   <table width="98%" class="font-medium" cellpadding="2" cellspacing="0">
     <tr>
	   <th align="right">Package ID:</th>
	   <td align="left">'.$_GET['pckID'].'</td>
	 </tr>
	 <tr>
	   <th align="right">Reason for withdraw:</th>
	   <td align="left"><textarea style="width:100%; height:60px;" id="txtAreasWD"></textarea></td>
	 </tr>
	 <tr>
	  <th align="right">Date of Withdraw:</th>
	  <td align="left">'.date('d-m-Y').'</td>
	 </tr>
	 <tr>
	  <td colspan="2" align="center">
	  <input type="button" class="smallbtn" style="width:120px; float:none;" value="Withdraw" onclick="setStatus(\''.$_GET['pckID'].'\',\''.$_GET['MYID'].'\',\'txtAreasWD\');" /></td>
	 </tr>
   </table>
  </div>';
  echo '</div>';
}
else
{
$sel_usermail = "select user_email from user_tab where user_role='B2B_Partner_Operator' and user_status='Active' and client_id='".$_GET['MYID']."'";
$res_usermail= mysqli_query($conn,$sel_usermail);
if($res_usermail)
{
while($row = mysqli_fetch_array($res_usermail))
{
echo '<div style="width:100%; float:left;">';
  echo '<span style="float:right; margin-right:3px;">
  <img src="Images/closebtn.png" style="width:20px; height:20px;" onclick="hide_block(\'div_withdraw_pop\');" /></span></div>';
 echo '<div style="float:left; width:100%;">';
 echo '<span class="font-medium">Sorry, your user id - <b>'.$row["user_email"].'</b> and you are a <b>sub-user</b>, <br/> only main user is authorized to withdraw package</span>';
 echo '</div>';
 }
 }
}
}

if(isset($_GET['pckWithdraw']) && isset($_GET['pID'])  && isset($_GET['Reason']))
{

$q_updt_st ="update b2b_pck_crt set status='Withdrawn', reason_for_withdraw='".addslashes($_GET['Reason'])."', date_withdrawn=DATE(NOW()) where pck_id='".$_GET['pID']."'";
$res_updt_st = mysqli_query($conn,$q_updt_st);
if($res_updt_st)
{
echo '<div style="width:100%; float:left;">';
  echo '<span style="float:right; margin-right:3px;">
  <img src="Images/closebtn.png" style="width:20px; height:20px;" onclick="hide_block(\'div_withdraw_pop\');" /></span></div>';
 echo '<div style="float:left; width:100%;">';
 echo '<span class="font-medium">Your package with id - <b>'.$_GET["pID"].'</b> has been withdrawn</span>';
 echo '</div>';
 echo '<div style="width:100%; float:left;"><span><input type="button" class="smallbtn" style="float:none; width:auto; padding:3px;" value="Close" onclick="hide_block(\'div_withdraw_pop\');" /></span></div>';

}
else
{
echo '<div style="width:100%; float:left;">';
  echo '<span style="float:right; margin-right:3px;">
  <img src="Images/closebtn.png" style="width:20px; height:20px;" onclick="hide_block(\'div_withdraw_pop\');" /></span></div>';
 echo '<div style="float:left; width:100%;">';
 echo '<span class="font-medium">Sorry, Try Again!!</span>';
 echo '</div>';
}

}

if(isset($_GET['revisePck']) && isset($_GET['pckID']))
{
echo '<div style="width:100%; float:left;">';
  echo '<span style="float:right; margin-right:3px;">
  <img src="Images/closebtn.png" style="width:20px; height:20px; cursor:pointer;" onclick="hide_block(\'div_revisepck\');" /></span></div>';

$sel_pck = "select pck_id, pck_name, duration, trip_theme, travellers, trip_dates, pck_agenda, pck_hml from b2b_pck_crt where pck_id='".$_GET['pckID']."'";
$res_pck = mysqli_query($conn,$sel_pck);
if($res_pck)
{
echo '<div style="float:left; width:100%;">';
while($row = mysqli_fetch_array($res_pck))
{
echo '<table class="font-small" width="100%" style="color:#444;">
<tr style="background:#ddd;">
 <th>Package Name</th>
 <th>Duration</th>
 <th>Trip Theme</th>
 <th>Travellers</th>
 <th>Trip Agenda</th>
 <th>Trip Intensity</th>
 <th>Departure Dates</th>
</tr>
<tr style="background:#eee;">
<td>'.$row["pck_name"].'</td>
<td>'.$row["duration"].'</td>
<td>'.$row["trip_theme"].'</td>
<td>'.$row["travellers"].'</td>
<td>'.$row["pck_agenda"].'</td>
<td>'.$row["pck_hml"].'</td>
<td>'.$row["trip_dates"].'</td>
</tr>
</table>';
}
echo '</div>';
} 

echo '<div style="float:left; width:100%; margin-top:5px;">
<span style="width:30%; float:left; cursor:pointer" onclick="Btn_Color(\'btn_rev_prc\',\'btn_rev_disc\',\'btn_rev_incl_excl\');">
 <div id="btn_rev_prc" class="font-medium" style="float:left; width:100%; border:1px solid #444; background:#002929; color:#fff;" onclick="revise_prc(\''.$_GET["pckID"].'\');">Revise<br/> Price</div>
</span>
<span style="width:30%; float:left; cursor:pointer; margin-left:10px;" onclick="Btn_Color(\'btn_rev_disc\',\'btn_rev_prc\',\'btn_rev_incl_excl\');">
 <div id="btn_rev_disc" class="font-medium" style="float:left; width:100%;  border:1px solid #444; background:#002929; color:#fff;" onclick="revise_offers(\''.$_GET["pckID"].'\');">Revise Discounts<br/> & Offers</div>
</span>
<span style="width:30%; float:left; cursor:pointer; margin-left:10px;" onclick="Btn_Color(\'btn_rev_incl_excl\',\'btn_rev_prc\',\'btn_rev_disc\');">
 <div id="btn_rev_incl_excl" class="font-medium" style="float:left; width:100%;  border:1px solid #444; background:#002929; color:#fff;" onclick="revise_incl(\''.$_GET["pckID"].'\');">Revise <br/> Inclusions & Exclusions</div>
</span>
</div>';

echo '</div>';
}

if(isset($_GET['revisePrc']) && isset($_GET['pckID']))
{
$sel_pck = "select pck_id, pck_cost, pck_name, prc_service, prc_edu,  duration, price, trip_theme, prc_based, trip_dates from b2b_pck_crt where pck_id='".$_GET['pckID']."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($row = mysqli_fetch_array($res_pck))
{
echo '<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px;"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'div_revise_prc\');" /></span>
</div>';

echo '<div style="float:left; width:100%;">
<table style="width:100%;">
<tr>
<td colspan="3" align="center"><span class="font-medium"> Package ID - '.$_GET['pckID'].'</span></td>
</tr>
<tr>
 <th align="left"></th>
 <th align="left" style="background:#ff0000; color:#fff;">Existing Values</th>
 <th align="left" style="background:#597272; color:#fff;">Revised Values</th>
</tr>
				   <tr>
				    <td colspan="3"><div style="height :2px; border-top:3px solid #222222; width:70%; margin-top:10px; margin-left:110px; float:left;"></div></td>
				   </tr>
				   <tr>
				    <td></td>
					<td style="background:#ff0000; color:#fff;">'.$row["prc_based"].'</td>
					<td style="background:#597272; color:#fff;">
					<div style="width:100%; float:left;">
					 <span style="float:left; margin-left:3px;"><input type="radio" name="rdbasis_rev" value="Person" />Person</span>
					 <span style="float:left; margin-left:3px;"><input type="radio" name="rdbasis_rev" value="Couple" />Couple</span>
					 <span style="float:left; margin-left:3px;"><input type="radio" name="rdbasis_rev" value="Group" />Group</span>
					 <span style="float:left; margin-left:3px;"><input type="radio" name="rdbasis_rev" value="Others" />Others</span>
					 </div>
					 <div style="float:left; width:100%;">
					   <span id="sp_grp" style="display:none;">
					    <input type="text" id="txtAdult_rev" class="txtbox_Tab" style="width:50px" placeholder="# Adults" />
						<input type="text" id="txtKids_rev" class="txtbox_Tab" style="width:50px" placeholder="# Kids" />
						<input type="text" id="txtKids_age_rev" class="txtbox_Tab" style="width:50px" placeholder="Kid\'s Age" />
					   </span>
					   <span id="sp_oth" style="display:none;">
					   <input type="text" class="txtbox_Tab" style="width:80px" id="txtoth_rev" />
					   </span>
					 </div>
					</td>
				   </tr>
				   
				     <tr>
					   <td><span class="font-medium">Package Cost</span></td>
					   <td style="background:#ff0000; color:#fff;">'.$row["pck_cost"].'</td>
					   <td style="background:#597272; color:#fff;"><input type="text" id="txt_packCost_rev" name="txt_packCost_rev" class="txtbox_crt" style="width:100px;" value="0" onKeyPress="calc_tax_rev();" onMouseOut="calc_ta_revx();" onChange="calc_tax_rev();"/></td>
					 </tr>
					 <tr>
					  <td><span class="font-medium" style="float:left;">Service Tax / GST Rate</span></td>
					  <td style="background:#ff0000; color:#fff;">'.$row["prc_service"].'</td>
					  <td style="background:#597272; color:#fff;"><select id="drptaxRate_rev" name="drptaxRate_rev" class="txtbox_crt" style="width:100px; height:30px;" onChange="calc_tax_rev();">
					 <option>0%</option>
					 <option>10.36%</option>
					 </select></td>
					 </tr>
					 <tr>
					    <td><span class="font-medium" style="float:left;">Service Tax  Amount</span></td>
						<td style="background:#ff0000; color:#fff;"></td>
						<td style="background:#597272; color:#fff;"><input type="text" id="txtTax_rev" class="txtbox_crt" style="width:130px;" onKeyPress="calc_tax_rev();"></td>
					 </tr>
					 <tr>
					   <td><span class="font-medium" style="float:left;">Education Cess</span></td>
					   <td style="background:#ff0000; color:#fff;">'.$row["prc_edu"].'</td>
					   <td style="background:#597272; color:#fff;"><input type="text"  id="txtCess_rev" name="txtCess_rev" class="txtbox_crt" style="width:130px;" value="0" onKeyPress="calc_tax_rev();"></td>
					 </tr>
					 <tr>
					   <td colspan="3"><div style="height :2px; border-top:3px solid #222222; width:70%; margin-top:10px; margin-left:110px; float:left;"></div></td>
					 </tr>
					 <tr>
					   <td><span class="font-medium" style="float:left;">Total Cost &nbsp;</span><span id="sp_basis" class="font-medium"></span></td>
					   <td style="background:#ff0000; color:#fff;">'.$row["price"].'</td>
					   <td style="background:#597272; color:#fff;"><span style="float:left;"><input type="text" id="txttotalPrice_rev" name="txttotalPrice_rev" class="txtbox_crt" style="width:130px;"/></span>
					   <span class="font-medium" style="background:#597272; color:#fff;">(in INR)</span></td>
					 </tr>
					 <tr>
					  <td colspan="3" align="center">
					  <input type="button" class="smallbtn" style="width:60px; float:none;" value="Submit" onclick="cnfrm_prc(\''.$_GET['pckID'].'\',\'txttotalPrice_rev\',\'txt_packCost_rev\',\'drptaxRate_rev\',\'txtCess_rev\',\'rdbasis_rev\');" /></td>
					 </tr>
				   </table>
</div>';
}
}
}

if(isset($_GET['revPrc']) && isset($_GET['pckID']) && isset($_GET['revCost']) && isset($_GET['revServ']) && isset($_GET['revCess']) && isset($_GET['revBasis']))
{
$updt_prc = "update b2b_pck_crt set prc_based_rev='".$_GET['revBasis']."', pck_cost_rev='".$_GET['revCost']."', prc_service_rev='".$_GET['revServ']."', prc_edu_rev='".$_GET['revCess']."', revised_price='".$_GET['revPrc']."' where pck_id='".$_GET['pckID']."' ";
$res_updt_prc = mysqli_query($conn,$updt_prc);
if($res_updt_prc)
{
echo '<div id="div_prc" style="float:left; width:100%;">';
echo '<div style="float:left; width:100%;">';
echo '<span style="float:right;"><img src="Images/cancelbtn.png" width="15px" height="15px" onclick="hide_block(\'div_prc\');" /></span>';
echo '</div>';
echo '<span>Success: Package price of '.$_GET['pckID'].' has been revised</span>';
echo '</div>';
}
else
{
echo '<div style="float:left; width:100%;">';
echo '<span>Error: Please try again</span>';
echo '</div>';
}
}

if(isset($_GET['revOffers']) && isset($_GET['PID']))
{
echo '<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px;"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'div_revise_offers\');" /></span>
</div>';
$sel_offer = "select offers, revised_offers from b2b_pck_crt where pck_id='".$_GET['PID']."'";
$res_offer = mysqli_query($conn,$sel_offer);
if($res_offer)
{
$i=1;
$j=2;
echo '<table id="tab_offer_rev" class="font-medium" style="width:100%; text-align:left" cellpadding="2" cellspacing="0"  onmouseover="cnt_htlRows(\''.$_GET["PID"].'\');">
		   <tr style="background:#0066ff; color:#fff;">
		   <th></th>
		    <th>Bank Name</th>
			<th>Payment Mode</th>
			<th>Card Type</th>
			<th>Card Name</th>
			<th>Offer type</th>
			<th>Offer Description</th>
			<th colspan="2">Offer validity<br/> From &nbsp; Till</th>
			<th>Add Row</th>
			<th>Del Row</th>
		   </tr>';
 while($row = mysqli_fetch_array($res_offer))
 {  

echo '<tr style="background:#ff0000; color:#fff;">
<td style="border-right:1px solid #fff;">Existing Values</td>';
if($row["revised_offers"]!="")
echo '<td colspan="10">'.$row["revised_offers"].'</td></tr>';
else
echo '<td colspan="10">'.$row["offers"].'</td></tr>';
 }
 }
echo '<tr>
   <td>Revised Values</td>
		     <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_bank_name_rev_2" name="txt_bank_name_rev_2" placeholder="Axis Bank" /></td>
			 <td>
			 <select id="txt_pay_mode_rev_2" name="txt_pay_mode_rev_2"  style="width:80px; font-size:12px;">
			   <option value="Credit Card">Credit Card</option>
			   <option value="Debit Card">Debit Card</option>
			   <option value="Netbanking">Netbanking</option>
			   <option value="Pay at the site">Pay at the site</option>			  
			 </select>
			 <td>
			  <select id="txt_card_type_rev_2" name="txt_card_type_rev_2" style="width:60px; font-size:12px;">
			   <option value="Visa">Visa </option>
			   <option value="MasterCard">MasterCard</option>
     		 </select>
		     </td>
			 <td>
			 <select id="txt_card_name_rev_2" name="txt_card_name_rev_2" onChange="if(this.value==\'Other\')show_block(\'txt_card_name_oth_2\');" style="width:60px; font-size:12px;">
			  <option value="Platinum">Platinum</option>
			  <option value="Titanium">Titanium</option>
			  <option value="Other">Other</option>
			 </select>
			 <input type="text" id="txt_card_name_oth_rev_2" name="txt_card_name_oth_rev_2" class="txtbox_Tab" style="width:60px; display:none; font-size:12px;" placeholder="specify others" />
			</td>	
			 <td>
			 <select id="txt_offer_type_rev_2" name="txt_offer_type_rev_2" style="width:60px; font-size:12px;">
			   <option value="Cashback">Cashback</option>
			   <option value="EMI">EMI</option>
			   <option value="Bonus Points">Bonus Points</option>
			 </select>
			</td>	
			 <td><input type="text" class="txtbox_Tab" style="width:100px; font-size:12px;" id="txt_offer_desc_rev_2" name="txt_offer_desc_rev_2" placeholder="3% cashback over Rs.3000" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_from_rev_2" name="txt_valid_from_rev_2" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block(\'TripDates\');" /></td>	
			 <td><input type="text" class="txtbox_Tab" style="width:60px; font-size:12px;" id="txt_valid_till_rev_2" name="txt_valid_till_rev_2" placeholder="21-06-2014" onClick="oDP.show(event,this.id,2); show_block(\'TripDates\');" /></td>		 
		    <td align="center"><input type="button" class="smallbtn" style="width:40px; float:none; font-size:12px;" id="btn_disc_add_rev_2" name="btn_disc_add_rev_2" value="Add" onClick="add_discounts_rev();" /></td>
	<td align="center"><img src="Images/cancelbtn.png" style="width:13px; height:13px;" id="btn_disc_del_rev_2" /></td>
	  </tr>';
	  echo '<tr>
	  <td colspan="11" align="center">
	  <input type="submit" id="btnRev_offers" name="btnRev_offers" value="Submit" class="smallbtn" style="width:80px; float:none;" /></td>
	  </tr>'; 
 echo ' </table>';
} 


if(isset($_GET['revIncl']) && isset($_GET['PID']))
{

echo '<div style="float:left; width:100%;">
<span style="float:right; margin-right:3px;"><img src="Images/closebtn.png" width="20px" height="20px" onclick="hide_block(\'div_revise_incl\');" /></span>
</div>';

$sel_incl = "select loc_name, htl_name, incl, revised_incl, revised_excl, excl from b2b_htl_crt where pck_id='".$_GET['PID']."'";
$res_incl = mysqli_query($conn,$sel_incl);
$res_inp_incl = mysqli_query($conn,$sel_incl);
$rows_inp_incl = mysqli_num_rows($res_inp_incl);

$res_excl = mysqli_query($conn,$sel_incl);
$res_inp_excl = mysqli_query($conn,$sel_incl);
$rows_inp_excl = mysqli_num_rows($res_inp_excl);

if($res_incl)
{
echo '<div style="float:left; width:100%; margin-top:5px;">';
echo '<table id="tab_rev_incl" name="tab_rev_incl" width="100%" style="table-layout:fixed; word-wrap:break-word;" onmouseover="cnt_htlRows(\''.$_GET["PID"].'\');">
<tr>
 <th colspan="11">Inclusions for Package '.$_GET['PID'].'</th>
</tr>
<tr style="background:#0066ff; color:#fff;">
<th></th>
<th>Location</th>
<th>Hotel</th>
<th>Breakfast</th>
<th>Lunch</th>
<th>Dinner</th>
<th>Laundry</th>
<th>SPA</th>
<th>Acloholic Beverages</th>
<th>Wifi</th>
<th>Others</th>
</tr>';
 if($res_inp_incl)
 {
 if($rows_inp_incl)
 {
 $k=0;
 $countK=0;
 while($row = mysqli_fetch_array($res_inp_incl))
 {
 $k++;
 $countK++;
   echo '<tr style="background:#ffff00;">';
   echo '<td>Revised<br/> Values</td>';
   echo '<td><input type="text" style="border:0px; outline:none; width:60px; background:transparent;" value="'.$row["loc_name"].'" name="txtRev_loc_'.$k.'" /></td>';
   echo '<td><input type="text" style="border:0px; outline:none; width:60px; background:transparent;" value="'.$row["htl_name"].'" name="txtRev_htl_'.$k.'" /></td>';
   echo '<td><input type="checkbox" name="chkBf_rev_incl_'.$k.'" value="Breakfast" /></td>';
   echo '<td><input type="checkbox" name="chkLun_rev_incl_'.$k.'" value="Lunch" /></td>';
   echo '<td><input type="checkbox" name="chkDin_rev_incl_'.$k.'" value="Dinner" /></td>';
   echo '<td><input type="checkbox" name="chkLndry_rev_incl_'.$k.'" value="Laundry" /></td>';
   echo '<td><input type="checkbox" name="chkSPA_rev_incl_'.$k.'" value="SPA" /></td>';
   echo '<td><input type="checkbox" name="chkAlco_rev_incl_'.$k.'" value="Alcoholic Beverages" /></td>';
   echo '<td><input type="checkbox" name="chkWifi_rev_incl_'.$k.'" value="Wifi" /></td>';
   echo '<td><input type="text" class="txtbox_Tab" style="width:50px;" id="chkOth_rev_incl_'.$k.'" name="chkOth_rev_incl_'.$k.'" placeholder="Others" /></td>';
   echo '</tr>';
 }
 } 
 }

 while($row = mysqli_fetch_array($res_incl))
 {
  echo '<tr style="background:#ff0000; color:#fff;">';
  echo '<td>Existing<br/> Values</td>';
  echo '<td>'.$row["loc_name"].'</td>';
  echo '<td>'.$row["htl_name"].'</td>';
  if($row["revised_incl"] !="")
    echo '<td colspan="8">'.$row["revised_incl"].'</td>';
	else
  echo '<td colspan="8">'.$row["incl"].'</td>';
  echo '</tr>';
 }
 }

 echo '</table>';
 echo '</div>';
if($res_excl)
{ 
 echo '<div style="float:left; width:100%; margin-top:20px;">';
echo '<table  width="100%" style="table-layout:fixed; word-wrap:break-word;">
<tr>
 <th colspan="11">Inclusions for Package '.$_GET['PID'].'</th>
</tr>
<tr style="background:#0066ff; color:#fff;">
<th></th>
<th>Location</th>
<th>Hotel</th>
<th>Breakfast</th>
<th>Lunch</th>
<th>Dinner</th>
<th>Laundry</th>
<th>SPA</th>
<th>Acloholic Beverages</th>
<th>Wifi</th>
<th>Others</th>
</tr>';
 if($res_inp_excl)
 {
 if($rows_inp_excl)
 {
 $k=0;
 $countK=0;
 while($row = mysqli_fetch_array($res_inp_excl))
 {
 $k++;
 $countK++;
   echo '<tr style="background:#ffff00;">';
   echo '<td>Revised<br/> Values</td>';
   echo '<td><span id="sp_exclLoc_'.$k.'">'.$row["loc_name"].'</td>';
   echo '<td><span id="sp_exclHtl_'.$k.'">'.$row["htl_name"].'</td>';
   echo '<td><input type="checkbox" name="chkBf_rev_excl_'.$k.'" value="Breakfast" /></td>';
   echo '<td><input type="checkbox" name="chkLun_rev_excl_'.$k.'" value="Lunch" /></td>';
   echo '<td><input type="checkbox" name="chkDinn_rev_excl_'.$k.'" value="Dinner" /></td>';
   echo '<td><input type="checkbox" name="chkLndry_rev_excl_'.$k.'" value="Laundry" /></td>';
   echo '<td><input type="checkbox" name="chkSPA_rev_excl_'.$k.'" value="SPA" /></td>';
   echo '<td><input type="checkbox" name="chkAlco_rev_excl_'.$k.'" value="Alcoholic Beverages" /></td>';
   echo '<td><input type="checkbox" name="chkWifi_rev_excl_'.$k.'" value="Wifi" /></td>';
   echo '<td><input type="text" class="txtbox_Tab" style="width:50px;" id="chkOth_rev_excl_'.$k.'" name="chkOth_rev_excl_'.$k.'" placeholder="Others" /></td>';
   echo '</tr>';
 }
 }
 }
 while($row = mysqli_fetch_array($res_excl))
 {
  echo '<tr style="background:#ff0000; color:#fff;">';
  echo '<td>Existing<br/> Values</td>';
  echo '<td>'.$row["loc_name"].'</td>';
  echo '<td>'.$row["htl_name"].'</td>';
  if($row["revised_excl"]!="")
   echo '<td colspan="8">'.$row["revised_excl"].'</td>';
  else 
  echo '<td colspan="8">'.$row["excl"].'</td>';
  echo '</tr>';
 }

 echo '<tr><td colspan="11" align="center">
  <input type="submit" id="btnSubmitIncl" name="btnSubmitIncl" class="smallbtn" style="width:80px; float:none;" value="Submit" /></td></tr>';
 echo '</table>';
 echo '</div>';
}
}

if(isset($_GET['cntHtlIncl_rev']) && isset($_GET['PID']))
{
 $get_rows = "select htl_name from b2b_htl_crt where pck_id='".$_GET['PID']."'";
 $res_rows = mysqli_query($conn,$get_rows);
 $cnt_rows = mysqli_num_rows($res_rows);
 echo '<input type="text" id="txtHtl_rev" name="txtHtl_rev"  style="visibility:hidden;" value="'.$cnt_rows.'" />';
 echo '<input type="text" id="txtID" name="txtID" style="visibility:hidden;" value="'.$_GET['PID'].'" />';
}

if(isset($_GET['postVac'])  && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['postVac'] == "Asc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by trip_theme asc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['postVac'] == "Desc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by trip_theme desc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{
 $q_pck_dash ="select client_id, pck_id,pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and trip_theme like '%".$_GET['postVac']."%'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['myID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['sortPostLoc'])  && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortPostLoc'] == "Asc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by locations asc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['sortPostLoc'] == "Desc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by locations desc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{
 $q_pck_dash ="select client_id, pck_id,pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and locations like '%".$_GET['sortPostLoc']."%'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}


echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['myID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['postDtSort'])  && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['postDtSort'] == "Asc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by pck_date asc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['postDtSort'] == "Desc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by pck_date desc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{
$date = date('Y-m-d',strtotime($_GET['postDtSort']));
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by pck_date='".$date."'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['myID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['Postmnth']) && isset($_GET['Postyear']) && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and MONTH(pck_date)='".$_GET['Postmnth']."' and YEAR(pck_date)='".$_GET['Postyear']."'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
  
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$_GET["ID"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['MYID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}

if(isset($_GET['sortPostPrc']) && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortPostPrc']=="Asc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by price asc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['sortPostPrc'] == "Desc")
{
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by price desc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{
$prc = explode("-",$_GET['sortPostPrc']);
 $q_pck_dash ="select client_id, pck_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and price between '".$prc[0]."' and '".$prc[1]."'";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					 if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['myID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';

}
}
}


if(isset($_GET['sortPostName'])  && isset($_GET['Comp']) && isset($_GET['Reg']) && isset($_GET['myID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortPostName'] == "Asc")
{
 $q_pck_dash ="select distinct(pck_id) as pck_id , client_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by pck_name asc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['sortPostName'] == "Desc")
{
 $q_pck_dash ="select distinct(pck_id) as pck_id, client_id, pck_name, duration, price, revised_price, trip_theme, pck_viewed, locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' order by pck_name desc";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; word-wrap:break-word;" cellspacing="0">';

				 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				    $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 
					 $cnt_query = "select queryon_id from query_tab where queryon_id='".$row["pck_id"]."'";
					 $res_query = mysqli_query($conn,$cnt_query);
					 if($res_query)
					  $query = mysqli_num_rows($res_query);
					 else
					   $query = 0 ;
					   
					  $cnt_cncl = "select pck_id from cancel_tab where pck_id='".$row["pck_id"]."'" ;
					  $res_cncl = mysqli_query($conn,$cnt_cncl);
					  if($res_cncl)
					    $cncl = mysqli_num_rows($res_cncl);
					  else
					    $cncl = 0;	 
				   
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_id"].'</td>';
					 echo '<td width="90px">'.$row["pck_name"].'</td>';
					 echo '<td width="50px">'.$row["duration"].'</td>';
					 if($row["revised_price"]=="")
					 echo '<td align="center" width="110px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="110px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="130px">'.$loc[0].'...</td>';
					 echo '<td width="40px">'.$row["pck_viewed"].'</td>';
					 echo '<td width="40px">'.$count.'</td>';
					 echo '<td width="40px">'.$cncl.'</td>';
					 echo '<td width="40px"><span style="color:#0066ff; cursor:pointer;" onclick="open_query();">'.$query.'</span></td>';
					 echo '<td width="40px"><input type="button" class="smallbtn" style="width:40px; font-size:10px;" value="Click" onclick="withdraw_pop(\''.$row["pck_id"].'\',\''.$_GET['myID'].'\',\''.$_GET['Comp'].'\',\''.$_GET['Reg'].'\');" /></td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}

//--------------------------------------------------------------  Dashboard Purchase -----------------------------------------------------------------------------------


if(isset($_GET['purcTime']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['purcTime'] == "Yest")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and date_of_purchase =DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['purcTime'] == "Tday")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and date_of_purchase =DATE(NOW()) ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['purcTime'] == "Week")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and date_of_purchase between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['purcTime'] == "MTD")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and MONTH(date_of_purchase) =DATE_FORMAT(DATE(NOW()),'%m') ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['purcTime'] == "YTD")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and YEAR(date_of_purchase) =DATE_FORMAT(DATE(NOW()),'%Y') ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['purcTime'] == "ITD")
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';

				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."'";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}
}
}



if(isset($_GET['sortPurcVac']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
 
				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['sortPurcVac'] == "Asc")
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by trip_theme asc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					  if($_GET['sortPurcVac'] == "Desc")
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by trip_theme desc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					else
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' where trip_theme like '%".$_GET['sortPurcVac']."%' ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(", ",$row["trip_theme"]);
					 $loc = explode(", ",$row["locations"]);
					     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$_GET['sortPurcVac'].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
						 }
					 }
				   }
				 }
				 
				 echo '</table>';
			
}
}
}

if(isset($_GET['sortPurcLoc']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
 
				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['sortPurcLoc'] == "Asc")
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by trip_theme asc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					  if($_GET['sortPurcLoc'] == "Desc")
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by trip_theme desc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					else
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' where trip_theme like '%".$_GET['sortPurcLoc']."%' ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(", ",$row["trip_theme"]);
					 $loc = explode(", ",$row["locations"]);
					     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$_GET['sortPurcLoc'].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 
				 echo '</table>';

}
}
}


if(isset($_GET['sortPurcDate']) && isset($_GET['ID']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortPurcDate'] == "Asc")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' order by date_of_purchase asc";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['sortPurcDate'] == "Desc")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' order by date_of_purchase desc";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else
{
$date = date('Y-m-d',strtotime($_GET['sortPurcDate']));
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."' and date_of_purchase='".$date."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
				 
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				     $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}

}
}

if(isset($_GET['sortPurcMonth']) && isset($_GET['sortPurcYear']) && isset($_GET['Comp']) && $_GET['Reg'])
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client"]."'  and  MONTH(date_of_purchase)='".$_GET['sortPurcMonth']."' and YEAR(date_of_purchase)='".$_GET['sortPurcYear']."'";

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
			 $res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				      $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['sortPurcPrc']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."'";
 $res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['sortPurcPrc'] == "Asc")
				   {
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by price asc";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
				   }
				   else if($_GET['sortPurcPrc'] == "Desc")
				   {
				$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by price desc";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
				  }
				   else
				   {
				   $prc = explode("-",$_GET['sortPurcPrc']);
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' and price between '".$prc[0]."' and '".$prc[1]."'";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					} 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['sortPurcDur']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r= mysqli_fetch_array($res_client))
{
 $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r["client_id"]."'";
 $res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
				    if($_GET['sortPurcDur'] == "Asc")
				   {
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by duration asc";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
				   }
				   else if($_GET['sortPurcDur'] == "Desc")
				   {
				$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by duration desc";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					}
				
				   else
				   {
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where duration ='".$_GET['sortPurcDur']."'";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
					} 
					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}
}
}


if(isset($_GET['sortPurcName']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
  $q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , pck_id , book_id, trxn_id from buy_pck where posted_by='".$r['client_id']."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';

				 if($res_pckpurc_dash)
				 {
				   while($rId = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['sortPurcName']=="Asc")
				   {
				    $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by pck_name asc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
				   }
				   else if($_GET['sortPurcName'] == "Desc")
				   {
				    $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$rId["pck_id"]."' order by pck_name desc ";
					 $res_pck_dtls = mysqli_query($conn,$pck_dtls);
				   }
				 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$rId["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="170px">'.$rId["purc_date"].'</td>';
					  echo '<td width="160px">'.$loc[0].'...</td>';
					  echo '<td width="120px">'.$vac[0].'...</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px" >'.$row["price"].'</td>';			
					  echo '<td width="120px">'.$row["pck_name"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["book_id"].'</td>';
					    echo '<td width="50px" style="word-wrap:break-word;">'.$rId["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}
}
}




// ------------------------------------------------------------------ Dashboard Inventory -------------------------------------------------------------------------------



if(isset($_GET['invTime']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{

if($_GET['invTime'] == "Yest")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."' and pck_date = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
if($_GET['invTime'] == "Tday")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."' and pck_date = DATE(NOW())";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
if($_GET['invTime'] == "Week")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."' and pck_date between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
if($_GET['invTime'] == "MTD")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."' and MONTH(pck_date) = DATE_FORMAT(DATE(NOW()),'%m')";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
if($_GET['invTime'] == "YTD")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."' and YEAR(pck_date) = DATE_FORMAT(DATE(NOW()),'%Y')";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
if($_GET['invTime'] == "ITD")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r['client_id']."'";
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
echo '<table class="font-medium" width="100%" border="1px solid #DDD" style="text-align:left; font-size:14px; margin-left:0px; table-layout:fixed;" cellspacing="0">';
 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';					 
					 
				   }
				 }
				 echo '</table>';

}
}
}

if(isset($_GET['mnth_inv']) && isset($_GET['year_inv']) && isset($_GET['ID']))
{
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';

  $q_pck_dash_inv ="select pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$_GET["ID"]."'";
				 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				     $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				      echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px"></td>';
    				  echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '</tr>';
				   }
				 }
 echo '</table>';
}

if(isset($_GET['Dt1_inv']) && isset($_GET['Dt2_inv']) && isset($_GET['ID']))
{
echo $_GET['Dt1_inv'];
/*echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';

$dt1 = date('d-m-Y',strtotime($_GET['Dt1_inv']));
$dt2 = date('d-m-Y',strtotime($_GET['Dt2_inv']));

  $q_pck_dash_inv ="select pck_name, duration, price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$_GET["ID"]."' and validity between ".$_GET['Dt1_inv']." and ".$_GET['Dt2_inv']." ";
				 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {				    
				     $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
					 $valid = explode(" to ",$row["validity"]);
					 $dt_v1 = date('d-m-Y',strtotime($valid[0]));
					 $dt_v2 = date('d-m-Y',strtotime($valid[1]));
					 
					if($dt_v1 >= $dt1 && $dt_v2<=$dt2) 
					{
					echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px"></td>';
    				  echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '</tr>';	
					 }   
				   }
				 }
 echo '</table>';*/
}

if(isset($_GET['sortInvName']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortInvName'] == "Asc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['sortInvName'] == "Desc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by pck_name desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}


if(isset($_GET['sortInvPrc']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortInvPrc'] == "Asc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by price asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['sortInvPrc'] == "Desc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by price desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
$prc = explode("-",$_GET['sortInvPrc']);
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  and price between '".$prc[0]."' and '".$prc[1]."'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}


if(isset($_GET['sortInvVac']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortInvVac'] == "Asc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by trip_theme asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['sortInvVac'] == "Desc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by trip_theme desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{

 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and trip_theme like '%".$_GET['sortInvVac']."%'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}

if(isset($_GET['sortInvDate']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortInvDate'] == "Asc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by pck_date asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['sortInvDate'] == "Desc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by pck_date desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and pck_date ='".$_GET['sortInvDate']."'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}
}
}

if(isset($_GET['sortInvValid']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{
if($_GET['sortInvValid'] == "Asc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by validity asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['sortInvValid'] == "Desc")
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by validity desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."' and validity like '%".$_GET['sortInvValid']."'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed;" cellspacing="0">';

 $q_pck_dash_inv ="select pck_id, pck_name, duration, price, revised_price, trip_theme, locations, validity, inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date from b2b_pck_crt where client_id='".$r["client_id"]."'  order by validity asc";
				 $res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
				 if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where posted_by = '".$r["client_id"]."' and pck_id='".$row["pck_id"]."'";
					 $res_cnt_pck = mysqli_query($conn,$cnt_pck);
					 if($res_cnt_pck)
					 $count = mysqli_num_rows($res_cnt_pck);
					else
					 $count=0;
					 $inv = (int)$row["inventory"] - $count;
				     
				      $day = explode("-",$row["pck_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="120px">'.$row["pck_date"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					if($row["revised_price"]=="")
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 else
					  echo '<td align="center" width="120px">'.$row["revised_price"].'</td>';
					 echo '<td width="120px">'.$vac[0].'...</td>';
				  echo '<td width="105px">'.$row["validity"].'</td>';
				    echo '<td width="50px">'.$row["inventory"].'</td>';
					 echo '<td width="50px">'.$count.'</td>';
    				  echo '<td width="50px">'.$inv.'</td>';					 
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

}
}




//---------------------------------------------------------------  Dashboard Cancellation --------------------------------------------------------------------------

if(isset($_GET['cncltime']) && isset($_GET['Comp']) && isset($_GET['Reg']))
{
$sel_client = "select client_id from b2b_profile where Company_name='".$_GET['Comp']."' and regional_office='".$_GET['Reg']."'";
$res_client= mysqli_query($conn,$sel_client);
if($res_client)
{
while($r = mysqli_fetch_array($res_client))
{

$sel_pck = "select pck_id from b2b_pck_crt where client_id='".$r["client_id"]."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($rw = mysqli_fetch_array($res_pck))
{

if($_GET['cncltime'] == "Yest")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where cncl_process_date=DATE_SUB(DATE(NOW()), INTERVAL 1 DAY) where pck_id='".$rw["pck_id"]."' ";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['cncltime'] == "Tday")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where cncl_process_date=DATE(NOW()) where pck_id='".$rw["pck_id"]."'";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['cncltime'] == "Week")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where pck_id='".$rw["pck_id"]."' and  cncl_process_date between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['cncltime'] == "MTD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where pck_id='".$rw["pck_id"]."' and MONTH(cncl_process_date)=DATE_FORMAT(DATE(NOW()),'%m')";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['cncltime'] == "YTD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where pck_id='".$rw["pck_id"]."' and YEAR(cncl_process_date) = DATE_FORMAT(DATE(NOW()),'%Y')";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['cncltime'] == "ITD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where pck_id='".$rw["pck_id"]."' ";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

$k=0;

echo '<table id="tab_closecncl" class="spFonts" cellpspacing="0" width="100%" style="float:left; table-layout:fixed; word-wrap:break-word; font-size:12px;">
  <tr style="background:#0066ff; color:#fff;">
   <th width="90px">CancelID</th>
   <th width="50px">Cancel Type</th>
   <th width="90px">Transaction ID</th>
   <th width="100px">Reason for Cancel</th>
   <th width="50px">Request Date</th>
   <th width="50px">Cancel Date</th>
   <th width="50px">Refund Date</th>
   <th width="35px">% deducted</th>
   <th width="50px">Refund Amount</th>
  </tr>';
  if($res_cncl)
{
while($row = mysqli_fetch_array($res_cncl))
{
$k++;
if($k%2 == 0)
{
  echo '<tr style="background:#fff;">
   <td>'.$row["cncl_id"].'</td>
   <td>'.$row["cncl_type"].'</td>
   <td>'.$row["trxn_id"].'</td>
   <td>'.$row["reason"].'</td>
   <td>'.$row["cncl_req_date"].'</td>
   <td>'.$row["cncl_process_date"].'</td>
   <td>'.$row["refund_date"].'</td>
   <td>'.$row["deductions"].'</td>
   <td>'.$row["refund_amount"].'</td>
  </tr>';
  }
  else
  {
    echo '<tr style="background:#ddd">
   <td>'.$row["cncl_id"].'</td>
   <td>'.$row["cncl_type"].'</td>
   <td>'.$row["trxn_id"].'</td>
   <td>'.$row["reason"].'</td>
   <td>'.$row["cncl_req_date"].'</td>
   <td>'.$row["cncl_process_date"].'</td>
   <td>'.$row["refund_date"].'</td>
   <td>'.$row["deductions"].'</td>
   <td>'.$row["refund_amount"].'</td>
  </tr>';
  }
}
echo '</table>';
}
}
}
}
}
}


// ------------------------------------------------------------ Package Modify -------------------------------------------------------------------------------------------
if(isset($_GET['pckMod_sort']) && isset($_GET['ID']))
{
if($_GET['pckMod_sort'] == "Asc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by pck_name asc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}
else if($_GET['pckMod_sort'] == "Desc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by pck_name desc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}

echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
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
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
			    }
				}
			  }
 echo '</table>';
}

if(isset($_GET['pckModDt_sort']) && isset($_GET['ID']))
{
if($_GET['pckModDt_sort'] == "Asc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by pck_date asc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}
else if($_GET['pckModDt_sort'] == "Desc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by pck_date desc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}

echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
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
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
			    }
				}
			  }
 echo '</table>';
}

if(isset($_GET['pckModLoc_sort']) && isset($_GET['ID']))
{
if($_GET['pckModLoc_sort'] == "Asc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by locations asc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}
else if($_GET['pckModLoc_sort'] == "Desc")
{
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity  from b2b_pck_crt where client_id='".$_GET["ID"]."' order by locations desc";
$res_sel_pck = mysqli_query($conn,$q_sel_pck);
}

echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
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
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
			    }
				}
			  }
 echo '</table>';
}

if(isset($_GET['vacMod']) && isset($_GET['ID']))
{
echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity, trip_theme from b2b_pck_crt where client_id='".$_GET["ID"]."' order by locations desc";
			  $res_sel_pck = mysqli_query($conn,$q_sel_pck);
			  if($res_sel_pck)
			  {
			    $sl=0;
			   while($row = mysqli_fetch_array($res_sel_pck))
			   {
			    
				$loc = explode(",",$row["locations"]);
				$vac = explode(",",$row["trip_theme"]);
								$exp = explode("to ",$row["validity"]);
   $dt1 = date_create(date('Y-m-d'));   
   $dt2 = date_create(date('Y-m-d',strtotime($exp[1])));   
   $diff = date_diff($dt1,$dt2);   
	
   if($diff->format("%R%a") < 0)
   {
		$sl++;
				for($i=0; $i<count($vac); $i++)
				{
				if($vac[$i] == $_GET['vacMod'])
				{
				echo '<tr>';
			     echo '<td width="30px">'.$sl.'</td>';
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
				 }
			    }
				}
			  }
			  }
echo '</table>';
}

if(isset($_GET['locMod']) && isset($_GET['ID']))
{
echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, validity, trip_theme from b2b_pck_crt where client_id='".$_GET["ID"]."'";
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
   { $sl++;
				for($i=0; $i<count($loc); $i++)
				{
				if($loc[$i] == $_GET['locMod'])
				{
				echo '<tr>';
			     echo '<td width="30px">'.$sl.'</td>';
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
			    }
				}
				}
				}
			  }
echo '</table>';
}

if(isset($_GET['pckDt1']) && isset($_GET['pckDt2']) && isset($_GET['ID']))
{
$dt1 = date('Y-m-d',strtotime($_GET['pckDt1']));
$dt2 = date('Y-m-d',strtotime($_GET['pckDt2']));

echo '<table style="width:100%; table-layout:fixed;" cellpadding="0" class="font-small" cellspacing="0" border="1px solid #bbb">';
$q_sel_pck = "select pck_id, pck_name, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, locations, trip_theme from b2b_pck_crt where client_id='".$_GET["ID"]."' and pck_date between '".$dt1."' and '".$dt2."'";
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
   { $sl++;
				echo '<tr>';
			     echo '<td width="30px">'.$sl.'</td>';
			     echo '<td width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_name"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$row["pck_date"].'</span></td>';
				 echo '<td  width="100px"><span style="cursor:pointer;" onclick="openPck_mod(\''.$row["pck_id"].'\');">>'.$loc[0].'...</span></td>';
				 echo '</tr>';
				}
			  }
			  }
echo '</table>';
}

if(isset($_GET['WLID']))
{
echo '
   <div style="float:left; width:100%;">
    <span style="float:right;" onClick="hide_block(\'div_wl_dtl\');"><img src="Images/cancelbtn.png" width="30px" height="30px" /></span>
   </div>
 <div style="float:left; width:95%; height:300px; overflow-y:scroll; overflow-x:hidden; margin:20px;">
  <table width="100%" border="1px" cellpadding="2" cellspacing="0" style="font-size:14px; font-family:Calibri; table-layout:fixed; word-wrap:break-word; ">
    <tr style="background:#0066ff; opacity:0.7; color:#fff;">
	 <th width="60px">Wishlist ID</th>
	 <th width="80px">Loc_Name</th>
	 <th width="80px">Category</th>
	 <th width="80px">Attraction Name</th>
	 <th width="80px">Trip Dates</th>
	  <th width="40px">Schedule</th>
	 <th width="40px">Trip Time</th>
	 <th width="60px">Apprx Visit Time</th>
	 <th width="50px">Apprx Expense</th>
	 <th width="80px">Date saved</th>
	</tr></table>';
	
echo '<table width="100%"  border="1px" cellpadding="2" cellspacing="0" style="font-size:14px; font-family:Calibri; table-layout:fixed; word-wrap:break-word; ">';
	  $q_wl_comp = "select wl_id, loc_name, cate_id, attr_name, DATE_FORMAT(`trip_date`,'%d-%m-%Y') as  trip_date, schedule, trip_time, apprx_visit_time, apprx_expense, DATE_FORMAT(`date_saved`,'%d-%m-%Y') as date_saved from saved_wl where wl_id='".$_GET["WLID"]."'";
	  $res_wl_cmp = mysqli_query($conn, $q_wl_comp);
	  if($res_wl_cmp)
	  {
	   while($row = mysqli_fetch_array($res_wl_cmp))
	   {
	      echo '<tr>';
		  echo '<td width="60px">'.$row["wl_id"].'</td>';
		  echo '<td width="80px">'.$row["loc_name"].'</td>';
		  echo '<td width="80px">'.$row["cate_id"].'</td>';
		  echo '<td width="80px">'.$row["attr_name"].'</td>';
		  echo '<td width="80px">'.$row["trip_date"].'</td>';
		  echo '<td width="40px">'.$row["schedule"].'</td>';
		  echo '<td  width="40px">'.$row["trip_time"].'</td>';
		  echo '<td width="60px">'.$row["apprx_visit_time"].'</td>';
		  echo '<td width="50px">'.$row["apprx_expense"].'</td>';
		  echo '<td width="80px">'.$row["date_saved"].'</td>';
		  echo '</tr>';		
	   }
	  }

echo ' </table>
  </div>';

}

if(isset($_GET['WLL']))
{
echo '
   <div style="float:left; width:100%;">
    <span style="float:right;" onClick="hide_block(\'div_wl_dtl\');"><img src="Images/cancelbtn.png" width="30px" height="30px" /></span>
   </div>
 <div style="float:left; width:95%; height:300px; overflow-y:scroll; overflow-x:hidden; margin:20px;">
  <table width="100%" border="1px" cellpadding="2" cellspacing="0" style="font-size:14px; font-family:Calibri; table-layout:fixed; word-wrap:break-word; ">
    <tr style="background:#0066ff; opacity:0.7; color:#fff;">
	 <th width="80px">Loc_Name</th>
	 <th width="80px">Category</th>
	 <th width="80px">Attraction Name</th>
	 <th width="80px">Trip Dates</th>
	 <th width="40px">Trip Time</th>
	</tr></table>';
	
echo '<table width="100%"  border="1px" cellpadding="2" cellspacing="0" style="font-size:14px; font-family:Calibri; table-layout:fixed; word-wrap:break-word; ">';
	  $q_wl_comp = "select wl_id, loc_name, cate_id, attr_name, DATE_FORMAT(`trip_date`,'%d-%m-%Y') as  trip_date, trip_time from saved_wl where wl_id='".$_GET["WLL"]."'";
	  $res_wl_cmp = mysqli_query($conn, $q_wl_comp);
	  if($res_wl_cmp)
	  {
	   while($row = mysqli_fetch_array($res_wl_cmp))
	   {
	      echo '<tr>';
		  echo '<td width="80px" align="left" style="padding-left:10px;">'.$row["loc_name"].'</td>';
		  echo '<td width="80px" align="left" style="padding-left:10px;">'.$row["cate_id"].'</td>';
		  echo '<td width="80px" align="left" style="padding-left:10px;">'.$row["attr_name"].'</td>';
		  echo '<td width="80px">'.$row["trip_date"].'</td>';
		  echo '<td  width="40px">'.$row["trip_time"].'</td>';
		  echo '</tr>';		
	   }
	  }

echo ' </table>
  </div>';

}


if(isset($_GET['LLoc']))
{
echo '<table width="99%" class="font-medium_indx" cellpadding="2px" cellspacing="0" style="table-layout:fixed; font-size:12px; font-weight:500; word-wrap:break-word;">' ;
	    
	   $q_qts = "select lead_id, curr_city, loc_name, duration, trip_dates, wl_id, trvlr_adults, trvlr_kids_0_2, trvlr_kids_2_12, trvlr_kids_12, user_name from cust_trip_trvler where loc_name like '%".$_GET['LLoc']."%' order by lead_date desc ";
	   $res_qts = mysqli_query($conn,$q_qts);
	    $count = 0 ;
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
    
			  
				 echo '<tr style="margin-top:40px;">
		   <td style="width:60px" align="left">'.$row["lead_id"].'</td>
		   <td width="80px" align="left">'.$row["curr_city"].'</td>
		   <td width="100px" align="left">'.$row["loc_name"].'</td>
		   <td width="50px" align="left">'.$row["duration"].'</td>
		   <td width="55px" align="left"><span style="color:#0066ff; text-decoration:underline; cursor:pointer" onClick="show_block(\'div_wl_dtl\'); showWL(\''.$row["wl_id"].'\');">View</span></td>
		   <td width="70px" align="left">'.$row["trip_dates"].'</td>
		   <td width="50px" align="left">'.$trvler.'</td>
		   <td width="180px" align="left"><b>Hotel :</b>'. $req_htl.'<br/>
		   <hr style="width:100%; border:1px solid #ddd;" /> <b>Travel :</b>'.$req_trv.'<br/>
		   <hr style="width:100%; border:1px solid #ddd;" /> <b>Local Travel :</b>'.$req_trvl.'</td>
		   <td width="80px" align="left">'.$row["user_name"].'</td>
		   <td width="60px" align="left">Yes</td>
		   <td width="80px" align="left"><div style="float:left; width:100%;">3</div>
		   <div style="float:left; width:100%;"><button type="button" class="smallbtn" style="width:70px; background:#009900;">Respond</button></div>
		   </td>
		 </tr>';
		 echo '<tr><td colspan="11"><hr style="border:1px solid #ddd; width:100%;" /></td></tr>';
		 }
		 }
	}

if(isset($_GET['area']))
{
$disp_pets = "select pet_name, pet_pic, pet_type, DATE_FORMAT(miss_from,'%d-%m-%Y') miss_from, reward, area from missing_pets where area like '%".$_GET["area"]."%'";
$res_disp = mysqli_query($conn,$disp_pets);

if($res_disp)
{
while($row = mysqli_fetch_array($res_disp))
{
 echo ' <span style="float:left; width:30%; margin-top:10px; margin-left:10px; border-radius:5px;">
    <div style="float:left; width:280px; height:250px; background:#fff; border-radius:5px;">
	  <div style="float:left; width:100%; padding-top:10px;">
	     <img src="data:image/png;base64,'.base64_encode($row["pet_pic"]).'" style="border-radius:5px;" width="200px" height="180px" />
	  </div>
	  <div style="float:left; width:100%; margin-top:5px; padding:2px;">
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Type: &nbsp;<label style="color:#ff0000;">'.$row["pet_type"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Missing from: &nbsp;<label style="color:#ff0000;">'.$row["miss_from"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Area: &nbsp;<label style="color:#ff0000;">'.$row["area"].'</label></span></div>';
	   if($row["reward"]!="")
	   {
	  echo ' <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Reward: &nbsp;<label style="color:#ff0000;">'.$row["reward"].'</label></span></div>';
	   }
	 echo '</div>
	</div>
  </span>';
 }
 } 

}

if(isset($_GET['date']))
{
$disp_pets = "select pet_name, pet_pic, pet_type, DATE_FORMAT(miss_from,'%d-%m-%Y') miss_from, reward, area from missing_pets where miss_from ='".$_GET["date"]."'";
$res_disp = mysqli_query($conn,$disp_pets);

if($res_disp)
{
while($row = mysqli_fetch_array($res_disp))
{
 echo ' <span style="float:left; width:30%; margin-top:10px; margin-left:10px; border-radius:5px;">
    <div style="float:left; width:280px; height:250px; background:#fff; border-radius:5px;">
	  <div style="float:left; width:100%; padding-top:10px;">
	     <img src="data:image/png;base64,'.base64_encode($row["pet_pic"]).'" style="border-radius:5px;" width="200px" height="180px" />
	  </div>
	  <div style="float:left; width:100%; margin-top:5px; padding:2px;">
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Type: &nbsp;<label style="color:#ff0000;">'.$row["pet_type"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Missing from: &nbsp;<label style="color:#ff0000;">'.$row["miss_from"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Area: &nbsp;<label style="color:#ff0000;">'.$row["area"].'</label></span></div>';
	   if($row["reward"]!="")
	   {
	  echo ' <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Reward: &nbsp;<label style="color:#ff0000;">'.$row["reward"].'</label></span></div>';
	   }
	 echo '</div>
	</div>
  </span>';
 }
 } 

}
if(isset($_GET['type']))
{
$disp_pets = "select pet_name, pet_pic, pet_type, DATE_FORMAT(miss_from,'%d-%m-%Y') miss_from, reward, area from missing_pets where pet_type like '%".$_GET["type"]."%'";
$res_disp = mysqli_query($conn,$disp_pets);

if($res_disp)
{
while($row = mysqli_fetch_array($res_disp))
{
 echo ' <span style="float:left; width:30%; margin-top:10px; margin-left:10px; border-radius:5px;">
    <div style="float:left; width:280px; height:250px; background:#fff; border-radius:5px;">
	  <div style="float:left; width:100%; padding-top:10px;">
	     <img src="data:image/png;base64,'.base64_encode($row["pet_pic"]).'" style="border-radius:5px;" width="200px" height="180px" />
	  </div>
	  <div style="float:left; width:100%; margin-top:5px; padding:2px;">
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Type: &nbsp;<label style="color:#ff0000;">'.$row["pet_type"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Missing from: &nbsp;<label style="color:#ff0000;">'.$row["miss_from"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Area: &nbsp;<label style="color:#ff0000;">'.$row["area"].'</label></span></div>';
	   if($row["reward"]!="")
	   {
	  echo ' <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Reward: &nbsp;<label style="color:#ff0000;">'.$row["reward"].'</label></span></div>';
	   }
	 echo '</div>
	</div>
  </span>';
 }
 } 

}

if(isset($_GET['LID']))
{
$q_qts = "select distinct(quote_dtls.quote_id) as quote_id, quote_dtls.client_id, quote_othrs.totl_opt1 from quote_dtls inner join quote_othrs on quote_dtls.quote_id = quote_othrs.quote_id where quote_dtls.lead_id='".$_GET['LID']."' limit 3";
$res_qts = mysqli_query($conn,$q_qts);
if($res_qts)
{
echo '<table width="98%" cellpadding="1" cellspacing="0" style="font-size:13px; font-family:calibri; word-wrap:break-word;">';
echo '<tr style="background:#0066ff; color:#fff;">
  <th align="left">Quote ID</th>
  <th align="left">Partner</th>
  <th align="left">Price(INR)</th>
  </tr>';
 while($row= mysqli_fetch_array($res_qts))
 {
   $q_comp = "select company_name from b2b_profile where client_id='".$row["client_id"]."'";
   $res_comp = mysqli_query($conn,$q_comp);
   if($res_comp)
   {
    while($rC = mysqli_fetch_array($res_comp))
	{ 	  
	  echo '<tr>';
	  echo '<td align="left">'.$row["quote_id"].'</td>';
	  echo '<td align="left">'.$rC["company_name"].'</td>';
	  echo '<td align="left">'.$row["totl_opt1"].'</td>';
	  echo '</tr>';
	  
	}
   }
 }
 echo '</table>';
}
}

if(isset($_GET['QLID']) && isset($_GET['QID']) && isset($_GET['WID']) && isset($_GET['MYID']))
{
  echo '<div style="float:left; width:100%;">
  <span style="float:right; margin-right:2px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'div_capt_Q\');" /></span>
  </div>';
  
  echo '<table width="98%" cellpadding="1" cellspacing="0" style="font-size:13px; font-family:Calibri;">
    <tr>
	  <td align="right" style="color:#ff0000;">Quote ID :</td>
	  <td align="left">'.$_GET['QID'].'</td>
	</tr>
	<tr>
	  <td align="right" style="color:#ff0000;">Query :</td>
	  <td align="left"><textarea id="txtAcustQuery" style="width:300px; height:60px; font-size:14px; font-family:Calibri;"></textarea></td>
	</tr>
	<tr>
	  <td align="right" style="color:#ff0000;">Query Raised by :</td>
	  <td>'.$_GET['MYID'].'</td>
	</tr>
	<tr><td colspan="2" align="center"><input type="button" value="Submit" class="smallbtn" style="width:60px; height:22px; float:none;" onclick="storeQuery(\''.$_GET['QID'].'\',\''.$_GET['MYID'].'\',\'txtAcustQuery\');" /></td></tr>
  </table>';
}

if(isset($_GET['QID']) && isset($_GET['MYID']) && isset($_GET['QCOMM']))
{  
  $sel_clnt = "select client_id from quote_dtls where quote_id='".$_GET['QID']."'";
  $res_clnt = mysqli_query($conn,$sel_clnt);
  
  if($res_clnt)
  {
  while($row = mysqli_fetch_array($res_clnt))
  {
  $q_q_qury = "insert into query_tab values ('','','Quote','".$_GET['QID']."',".$row["client_id"].",'".date('Y-m-d')."','".$_GET['QCOMM']."','".$_GET['MYID']."','','','','','Active')";
  $res_q_qury = mysqli_query($conn,$q_q_qury);
  
  $q_updt_q = "update query_tab set query_id=concat('Q',Slno,'".date('dmy')."')";
  $res_q = mysqli_query($conn,$q_updt_q);
  
  if($res_q)
  {
    echo '<script type="text/javascript">';
	echo 'alert(\'You will receive response in another 48 hours of working days\')';
	echo '</script>';
  }
  }
  }
}

if(isset($_GET['QueryID']) && isset($_GET['MYID']))
{
echo '<div style="float:left; width:100%;">
<span style="float:right; margin-right:2px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'Query_Dtls\');" /></span></div>';

$q_quer = "select query_comment, query_id from query_tab where query_id='".$_GET['QueryID']."'";
$res_query = mysqli_query($conn,$q_quer);

if($res_query)
{
while($row = mysqli_fetch_array($res_query))
{
echo '<div style="float:left; width:100%; margin-top:10px;">';
echo '<table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
<tr>
 <th width="200px">Query ID</th>
 <td>'.$row["query_id"].'</td>
</tr>
<tr>
 <th>Query Comment</th>
 <td>'.$row["query_comment"].'</td>
</tr>
<tr>
 <td colspan="2" align="center">
 <input type="button" class="smallbtn" style="width:60px; float:none;" value="Respond" onclick="show_block(\'tab_resp\');" /></td>
 </tr>
</table>';
}
}
echo '<table id="tab_resp" width="100%" style="margin-top:10px; display:none;" cellpadding="1" cellspacing="0">
<tr>
<th>Response</th>
<td><textarea style="float:left; width:300px; height:60px;" id="txtAresp"></textarea></td>
</tr>
<tr>
<th>Responded By</th>
<td>'.$_GET['MYID'].'</td>
</tr>
<tr>
 <td colspan="2" align="center">
 <input type="button" class="smallbtn" value="Submit" style="width:60px; float:none;" onclick="crt_resp(\'txtAresp\',\''.$_GET['MYID'].'\',\''.$_GET['QueryID'].'\');" /></td>
</tr>
</table>';

echo '</div>';
}

if(isset($_GET['Resp']) && isset($_GET['MYID']) && isset($_GET['QuerID']))
{
$QID = explode("Q",$_GET['QuerID']);
$respID = "R".$QID[1];
$q_resp= "update query_tab set response_id='".$respID."', response_date='".date('Ymd')."', status='Responded', response_comment='".addslashes($_GET['Resp'])."', Resp_Client_ID='".addslashes($_GET['MYID'])."' where query_id='".$_GET['QuerID']."'";
$res_resp = mysqli_query($conn,$q_resp);

if($res_resp)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success: The query is responded\')';
 echo '</script>';
}
else
{
echo "Error :".mysqli_error($conn);
}
}

if(isset($_GET['QueryRespID']))
{
echo '<div style="width:100%; float:left;">
<span style="float:right; margin-right:2px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'queryResp_dtls\');" /></span></div>';
$q_resp = "select query_comment, response_comment from query_tab where query_id='".$_GET['QueryRespID']."'";
$res_resp = mysqli_query($conn,$q_resp);
if($res_resp)
{
while($row = mysqli_fetch_array($res_resp))
{
echo '<div style="float:left; width:100%; margin-top:10px;">
<h4>Query</h4>
<p>'.$row["query_comment"].'</p>
</div>';

echo '<div style="float:left; width:100%; margin-top:10px;">
<h4>Response</h4>
<p>'.$row["response_comment"].'</p>
</div>';
}
}
}

if(isset($_GET['QPID']))
{
echo '<div style="width:100%; float:left;">
<span style="float:right; margin-right:2px;"><img src="Images/closebtn.png" width="25px" height="25px" onclick="hide_block(\'div_Query\');" /></span></div>';

echo '<table class="font-medium" width="98%" cellpadding="1" cellspacing="0">
<tr>
<th width="200px" align="right">Package ID:</th>
 <td align="left">'.$_GET['QPID'].'</td>
</tr>
<tr>
 <th align="right">Query:</th>
 <td align="left"><textarea id="txtApckQuery" style="width:350px; height:60px;"></textarea></td>
</tr>
<tr>
 <th align="right">Your Email:</th>
 <td align="left"><input type="text" class="txtbox_Tab" style="width:200px;" id="txtEml" /> </td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="button" value="Submit" class="smallbtn" style="float:none;" onclick="subpckQuery(\''.$_GET['QPID'].'\',\'txtApckQuery\',\'txtEml\');" /></td>
</tr>
</table>';

}

if(isset($_GET['PCKID']) && isset($_GET['Query']) && isset($_GET['Email']))
{
$q_pck_clnt = "select client_id from b2b_pck_crt where pck_id='".$_GET['PCKID']."'";
$res_pck_clnt = mysqli_query($conn,$q_pck_clnt);

if($res_pck_clnt)
{
while($row = mysqli_fetch_array($res_pck_clnt))
{
 $q_query_pck = "insert into query_tab values('','','Package','".$_GET['PCKID']."','".$row["client_id"]."','".date('Y-m-d')."','".addslashes($_GET['Query'])."','".$_GET['Email']."','','','','','Active')";
 $res_q_pck = mysqli_query($conn,$q_query_pck);
 if($res_q_pck)
 {
    $q_updt_q = "update query_tab set query_id=concat('Q',Slno,'".date('dmy')."')";
  $res_q = mysqli_query($conn,$q_updt_q);
 }
}
}
}

if(isset($_GET['chkExpiry']) && isset($_GET['PID']))
{
echo '<div style="float:left; width:100%;">
<span style="float:right;"><img src="Images/closebtn.png" width="25px" height="25px" onclick="hide_block(\'pckMod_chkExp\');" /></span>
</div>';

echo '<div class="font-medium" style="float:left; width:100%;">';
 $sel_pck = "select validity from b2b_pck_crt where pck_id='".$_GET['PID']."'";
 $res_pck = mysqli_query($conn,$sel_pck);
 if($res_pck)
 {
 while($row = mysqli_fetch_array($res_pck))
 {
   $exp = explode("to ",$row["validity"]);
   $dt1 = date_create(date('Y-m-d'));   
   $dt2 = date_create(date('Y-m-d',strtotime($exp[1])));   
   $diff = date_diff($dt1,$dt2);   
	
   if($diff->format("%R%a") > 0)
   {
     echo '<span style="float:left; margin-left:10px;">You are not allowed to Modify<br/> Click here to revise package  <span style="color:#0066ff; cursor:pointer;" onclick="revise_pck(); hide_block(\'pckMod_chkExp\');">Revise Package</span></span>';
   }
   else
    {  
	  echo '<div style="float:left; width:100%; margin-top:5px;">
	  <span style="float:left;">You are allowed to -</span><br/>
	  	   <span style="float:left; color:#0066ff; font-size:12px;">Replace/Delete Locations,</span><br/>
		<span style="float:left; color:#0066ff; font-size:12px;">Add/replace/delete Hotels and their inclusions/exclusions,</span><br/>
		<span style="float:left; color:#0066ff; font-size:12px;">Add/replace/delete Attractions,</span><br/>
		<span style="float:left; color:#0066ff; font-size:12px;">Change existing dates, price, duration, travellers, package images, package name .. etc</span></div>
		
		<div style="float:left; width:100%; margin-top:5px;">
	   <span style="float:left;">You are not allowed to -</span><br/>
	    <span style="float:left; color:#0066ff; font-size:12px;">Add locations</span></div>
		
		<div style="float:left; width:100%; margin-top:5px;">
	   <span style"float:left;>Click here to Modify package  <span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="openPck_mod(\''.$_GET['PID'].'\');  hide_block(\'pckMod_chkExp\');">Modify Package</span><span></div>';
	}
 }
 }
 echo '</div>';
}

if(isset($_GET['Itin']) && isset($_GET['PCKID']))
{
echo '<div style="float:left; width:100%;">
<label class="PckFonts">Day-wise Itinerary</label>
<span style="float:right; margin-right:10px;">
<img src="Images/closebtn.png" width="30px" height="30px" onclick="hide_block(\'div_IternaryDays\');" />
</span>
</div>';

$sel_itin = "select day, loc_name, attr_cate, attr_name, start_time, arrival_time, time_allocated from b2b_attr_crt where pck_id='".$_GET['PCKID']."'";
$res_itin = mysqli_query($conn,$sel_itin);
if($res_itin)
{
echo '<div style="float:left; width:100%;">';
echo '<table class="font-medium" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;">';
echo '<tr>
<th align="left">Day</th>
<th align="left">Location</th>
<th align="left">Category</th>
<th align="left">Attraction</th>
<th align="left">Start Time</th>
<th align="left">Arrival</th>
<th align="left">Time Allocated</th>
</tr>';
while($row = mysqli_fetch_array($res_itin))
{
echo '<tr>';
echo '<td align="left">'.$row["day"].'</td>';
echo '<td align="left">'.$row["loc_name"].'</td>';
echo '<td align="left">'.$row["attr_cate"].'</td>';
echo '<td align="left">'.$row["attr_name"].'</td>';
echo '<td align="left">'.$row["start_time"].'</td>';
echo '<td align="left">'.$row["arrival_time"].'</td>';
echo '<td align="left">'.$row["time_allocated"].'</td>';
echo '</tr>';
}
echo '</table>';
echo '</div>';
}
}

if(isset($_GET['Hotel']) && isset($_GET['PCKID']))
{
echo '<div style="float:left; width:100%;">
<label class="PckFonts">Accomodation</label>
<span style="float:right; margin-right:10px;">
<img src="Images/closebtn.png" width="30px" height="30px" onclick="hide_block(\'div_HotelDtls\');" />
</span>
</div>';

$q_pck_htl = "select pck_id, loc_name, htl_name, duration,  star_rate, rooms, occupancy, extra_bed, htl_img, food_type, incl, excl, revised_incl, revised_excl from b2b_htl_crt where pck_id='".$_GET["PCKID"]."'";
$res_pck_htl = mysqli_query($conn,$q_pck_htl);


echo '<div style="float:left;width:100%; margin-top:10px; margin-left:5px; height:400px; overflow-y:scroll; overflow-x:hidden;">';
  if($res_pck_htl)
{
while($row = mysqli_fetch_array($res_pck_htl))
{
echo '<span style="float:left: width :80%; margin-left:10px;">
  <table width="100%" border="0px" height="auto" cellpadding="1" cellspacing="0" class="PckFonts" style="font-size:15px; font-family:Calibri; table-layout:fixed;">';
    echo '<tr>
	<td rowspan="9" width="40%"><img src="data:image/png;base64,'.base64_encode($row["htl_img"]).'" width="200px" height="200px" /></td>
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
	 echo $row["incl"];
	 else
	 echo $row["revised_incl"];
	 echo '</td>
	</tr>
	  <tr>
	 <th align="right">Exclusions</th>
	    <td>:</td>
	 <td align="left">';
	 if($row["revised_excl"] == "")
	 echo $row["excl"];
	 else
	 echo $row["revised_excl"];
	 echo '</td>
	</tr>
	<tr><td colspan="4" align="center"><hr style="border:1px dotted #444; width="100%"" /></td></tr>';

}
}
echo  ' </table>
</span>
</div>';

}


if(isset($_GET['Compare_1']) && isset($_GET['PCKID']))
{
$sel_pck = "select pck_id, pck_img1, pck_name from b2b_pck_crt where pck_id='".$_GET['PCKID']."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($row = mysqli_fetch_array($res_pck))
{
 echo '<img id="div_img_cmp_1" class="div_img_compare" src="data:image/png,'.base64_encode($row["pck_img1"]).'" />
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name1" class="div_img_cmp_name">'.$row["pck_name"].'</span>	
	<span class="div_cmp_cancelbtn">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" style="cursor:pointer;" onClick="clear_blocks(\'div_img_cmp_1\',\'span_img_cmp_name1\',\'sp_pck_id_1\');" />
	</span>
	<span id="sp_pck_id_1" style="visibility:hidden;">'.$row["pck_id"].'</span>	
  </div>';
  }
  }
}


if(isset($_GET['Compare_2']) && isset($_GET['PCKID']))
{
$sel_pck = "select pck_id, pck_img1, pck_name from b2b_pck_crt where pck_id='".$_GET['PCKID']."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($row = mysqli_fetch_array($res_pck))
{
 echo '<img id="div_img_cmp_2" class="div_img_compare" src="data:image/png,'.base64_encode($row["pck_img1"]).'" />
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name2" class="div_img_cmp_name">'.$row["pck_name"].'</span>	
	<span class="div_cmp_cancelbtn">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" style="cursor:pointer;" onClick="clear_blocks(\'div_img_cmp_2\',\'span_img_cmp_name2\',\'sp_pck_id_2\');" />
	</span>	
	<span id="sp_pck_id_2" style="visibility:hidden;">'.$row["pck_id"].'</span>
  </div>';
  }
  }
}

if(isset($_GET['Compare_3']) && isset($_GET['PCKID']))
{
$sel_pck = "select pck_id, pck_img1, pck_name from b2b_pck_crt where pck_id='".$_GET['PCKID']."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($row = mysqli_fetch_array($res_pck))
{
 echo '<img id="div_img_cmp_3" class="div_img_compare" src="data:image/png,'.base64_encode($row["pck_img1"]).'" />
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name3" class="div_img_cmp_name">'.$row["pck_name"].'</span>	
	<span class="div_cmp_cancelbtn">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" style="cursor:pointer;" onClick="clear_blocks(\'div_img_cmp_3\',\'span_img_cmp_name3\',\'sp_pck_id_3\');" />
	</span>
	<span id="sp_pck_id_3" style="visibility:hidden;">'.$row["pck_id"].'</span>	
  </div>';
  }
  }
}

if(isset($_GET['Compare_4']) && isset($_GET['PCKID']))
{
$sel_pck = "select pck_id, pck_img1, pck_name from b2b_pck_crt where pck_id='".$_GET['PCKID']."'";
$res_pck = mysqli_query($conn,$sel_pck);

if($res_pck)
{
while($row = mysqli_fetch_array($res_pck))
{
 echo '<img id="div_img_cmp_4" class="div_img_compare" src="data:image/png,'.base64_encode($row["pck_img1"]).'" />
    <div class="div_cmp_imgtxt">
	<span id="span_img_cmp_name4" class="div_img_cmp_name">'.$row["pck_name"].'</span>	
	<span class="div_cmp_cancelbtn">
	<img src="Images/cancelbtnwhite.png" width="10px" height="10px" style="cursor:pointer;" onClick="clear_blocks(\'div_img_cmp_4\',\'span_img_cmp_name4\',\'sp_pck_id_4\');" />
	</span>
	<span id="sp_pck_id_4" style="visibility:hidden;">'.$row["pck_id"].'</span>	
  </div>';
  }
  }
}

if(isset($_GET['Compare_pcks']) && isset($_GET['PCKID1']) && isset($_GET['PCKID2']) && isset($_GET['PCKID3']) && isset($_GET['PCKID4']))
{

echo '<div style="width:100%; float:left;">
<span style="float:right; cursor:pointer;">
<img src="Images/cancelbtn.png" width="20px" height="20px" onclick="hide_block(\'compare_imgs\'); hide_block(\'div_greyBack\');" />
</span></div>';

echo '<div style="float:left; width:100%; padding:5px;">';
echo '<table class="font-medium_indx" cellpadding="1" cellspacing="0" style="table-layout:fixed; float:left; background:#fff; font-size:14px;">
<tr>
<td width="200px">
 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
 <tr><th width="200px" height="100px">Package Image</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Package Name</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Package Details</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Duration</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Departure Dates</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Validity</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Tarrif For</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Accomodation</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Transportation</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Day-wise itinerary</th></tr>
 <tr><th width="200px" height="80px" style="background:#bbb;" align="right" style="padding-right:20px;">Package Price</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Inventory Status</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Cashback on Payment</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">EMI Option</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Tour Operator Rating</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Tour Operator Name</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="60px" align="right" style="padding-right:20px;">Tour Operator Logo</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Hotel Details</th></tr></table>
</td>';

$q_sel_pck_grd1 = "select distinct(pck_id) as pck_id, client_id, pck_name, duration, prc_based, validity, trip_dates, incls, revised_offers, offers, inventory, refundable, pck_img1, price from b2b_pck_crt  where pck_id='".$_GET['PCKID1']."'";
	  $res_sel_pck_grd1 = mysqli_query($conn,$q_sel_pck_grd1);
	  if( $res_sel_pck_grd1)
	  {
	  while($row = mysqli_fetch_array($res_sel_pck_grd1))
	  {
	  		if(strpos($row["incls"],"comodation")>0)
		  $acc ="Included";
		 else
		 $acc = "Excluded";
		 
		 if(strpos($row["incls"],"portation")>0)
		  $trp ="Included";
		 else
		 $trp = "Excluded"; 
		 
		if($row["revised_offers"]!="")
		{
		if(strpos($row["revised_offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		else
		{
		  if(strpos($row["offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		
		$sel_clnt = "select company_name, logo_pic from b2b_profile where client_id='".$row["client_id"]."'";
		$res_clnt = mysqli_query($conn,$sel_clnt);
		if($res_clnt)
		{
		while($clnt = mysqli_fetch_array($res_clnt))
		{
 echo '<td>
		 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
		 <tr><td width="200px" height="100px"><img src="data:image/png;base64,'.base64_encode($row["pck_img1"]).'"  width="190px" height="95px" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["pck_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"></td></tr>
 <tr><td width="200px" height="30px">'.$row["duration"].'</td></tr>
   <tr><td width="200px" height="30px">'.$row["trip_dates"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["validity"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["prc_based"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$acc.'</td></tr>
 <tr><td width="200px" height="30px">'.$trp.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showItin(\''.$row["pck_id"].'\');">View Details</span></td></tr>
 <tr><td width="200px" height="80px" style="background:#bbb;"><span style="font-weight:bolder; float:left; font-size:18px; margin-left:20px;">'.$row["price"].'</span><br/><br/>
	   <span style="float:left;">
	   <div class="div_buyPackage" onClick="buyPckID(\''.$row["pck_id"].'\');">
	    Buy Now</a></div></span>
	 <span style="float:left; margin-left:5px;">
	 <div class="div_emailbtn_Package">
	 <span  onclick="show_block(\'div_FriendRecomm\');">E-mail</span> </div></span>
	  <span style="float:left; margin-left:5px;">
	 <a href="#"><div id="btnWish1" class="div_addToWishlist_Package">
	 Add to Cart</div></a></span>	</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["inventory"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["refundable"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$emi.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">Tour Operator Rating</td></tr>
 <tr><td width="200px" height="30px">'.$clnt["company_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="60px"><img src="data:images/png;base64,'.base64_encode($clnt["logo_pic"]).'" width="50px" height="50px" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showHtlDtls(\''.$row["pck_id"].'\');">View Details</span></td></tr></table>
   </td>';
   }
   }
   }
   }

$q_sel_pck_grd2 = "select distinct(pck_id) as pck_id, client_id, pck_name, duration, prc_based, validity, trip_dates, incls, revised_offers, offers, inventory, refundable, pck_img1, price from b2b_pck_crt  where pck_id='".$_GET['PCKID2']."'";
	  $res_sel_pck_grd2 = mysqli_query($conn,$q_sel_pck_grd2);
	  if( $res_sel_pck_grd2)
	  {
	  while($row = mysqli_fetch_array($res_sel_pck_grd2))
	  {		if(strpos($row["incls"],"comodation")>0)
		  $acc ="Included";
		 else
		 $acc = "Excluded";
		 
		 if(strpos($row["incls"],"portation")>0)
		  $trp ="Included";
		 else
		 $trp = "Excluded"; 
		 
		if($row["revised_offers"]!="")
		{
		if(strpos($row["revised_offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		else
		{
		  if(strpos($row["offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		$sel_clnt = "select company_name, logo_pic from b2b_profile where client_id='".$row["client_id"]."'";
		$res_clnt = mysqli_query($conn,$sel_clnt);
		if($res_clnt)
		{
		while($clnt = mysqli_fetch_array($res_clnt))
		{
 echo '<td>
		 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
		 <tr><td width="200px" height="100px"><img src="data:image/png;base64,'.base64_encode($row["pck_img1"]).'"  width="190px" height="95px" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["pck_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"></td></tr>
 <tr><td width="200px" height="30px">'.$row["duration"].'</td></tr>
   <tr><td width="200px" height="30px">'.$row["trip_dates"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["validity"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["prc_based"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$acc.'</td></tr>
 <tr><td width="200px" height="30px">'.$trp.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showItin(\''.$row["pck_id"].'\');">View Details</span></td></tr>
 <tr><td width="200px" height="80px" style="background:#bbb;"><span style="font-weight:bolder; float:left; font-size:18px; margin-left:20px;">'.$row["price"].'</span><br/><br/>
	   <span style="float:left;">
	   <div class="div_buyPackage" onClick="buyPckID(\''.$row["pck_id"].'\');">
	    Buy Now</a></div></span>
	 <span style="float:left; margin-left:5px;">
	 <div class="div_emailbtn_Package">
	 <span  onclick="show_block(\'div_FriendRecomm\');">E-mail</span> </div></span>
	  <span style="float:left; margin-left:5px;">
	 <a href="#"><div id="btnWish1" class="div_addToWishlist_Package">
	 Add to Cart</div></a></span>	</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["inventory"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["refundable"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$emi.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">Tour Operator Rating</td></tr>
 <tr><td width="200px" height="30px">'.$clnt["company_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="60px"><img src="data:images/png;base64,'.base64_encode($clnt["logo_pic"]).'" width="50px" height="50px" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showHtlDtls(\''.$row["pck_id"].'\');">View Details</span></td></tr></table>
   </td>';
   }
   }
   }
   }
   
   $q_sel_pck_grd3 = "select distinct(pck_id) as pck_id, client_id, pck_name, duration, prc_based, validity, trip_dates, incls, revised_offers, offers, inventory, refundable, pck_img1, price from b2b_pck_crt  where pck_id='".$_GET['PCKID3']."'";
	  $res_sel_pck_grd3 = mysqli_query($conn,$q_sel_pck_grd3);
	  if( $res_sel_pck_grd3)
	  {
	  while($row = mysqli_fetch_array($res_sel_pck_grd3))
	  {
	  		if(strpos($row["incls"],"comodation")>0)
		  $acc ="Included";
		 else
		 $acc = "Excluded";
		 
		 if(strpos($row["incls"],"portation")>0)
		  $trp ="Included";
		 else
		 $trp = "Excluded"; 
		 
		if($row["revised_offers"]!="")
		{
		if(strpos($row["revised_offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		else
		{
		  if(strpos($row["offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		$sel_clnt = "select company_name, logo_pic from b2b_profile where client_id='".$row["client_id"]."'";
		$res_clnt = mysqli_query($conn,$sel_clnt);
		if($res_clnt)
		{
		while($clnt = mysqli_fetch_array($res_clnt))
		{
 echo '<td>
		 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
		 <tr><td width="200px" height="100px"><img src="data:image/png;base64,'.base64_encode($row["pck_img1"]).'"  width="190px" height="95px" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["pck_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"></td></tr>
 <tr><td width="200px" height="30px">'.$row["duration"].'</td></tr>
   <tr><td width="200px" height="30px">'.$row["trip_dates"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["validity"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["prc_based"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$acc.'</td></tr>
 <tr><td width="200px" height="30px">'.$trp.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showItin(\''.$row["pck_id"].'\');">View Details</span></td></tr>
 <tr><td width="200px" height="80px" style="background:#bbb;"><span style="font-weight:bolder; float:left; font-size:18px; margin-left:20px;">'.$row["price"].'</span><br/><br/>
	   <span style="float:left;">
	   <div class="div_buyPackage" onClick="buyPckID(\''.$row["pck_id"].'\');">
	    Buy Now</a></div></span>
	 <span style="float:left; margin-left:5px;">
	 <div class="div_emailbtn_Package">
	 <span  onclick="show_block(\'div_FriendRecomm\');">E-mail</span> </div></span>
	  <span style="float:left; margin-left:5px;">
	 <a href="#"><div id="btnWish1" class="div_addToWishlist_Package">
	 Add to Cart</div></a></span>	</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["inventory"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["refundable"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$emi.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">Tour Operator Rating</td></tr>
 <tr><td width="200px" height="30px">'.$clnt["company_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="60px"><img src="data:images/png;base64,'.base64_encode($clnt["logo_pic"]).'" width="50px" height="50px" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showHtlDtls(\''.$row["pck_id"].'\');">View Details</span></td></tr></table>
   </td>';
   }
   }
   }
   }
   
   $q_sel_pck_grd4 = "select distinct(pck_id) as pck_id, client_id, pck_name, duration, prc_based, validity, trip_dates, incls, revised_offers, offers, inventory, refundable, pck_img1, price from b2b_pck_crt  where pck_id='".$_GET['PCKID4']."'";
	  $res_sel_pck_grd4 = mysqli_query($conn,$q_sel_pck_grd4);
	  if( $res_sel_pck_grd4)
	  {
	  while($row = mysqli_fetch_array($res_sel_pck_grd4))
	  {
	  		if(strpos($row["incls"],"comodation")>0)
		  $acc ="Included";
		 else
		 $acc = "Excluded";
		 
		 if(strpos($row["incls"],"portation")>0)
		  $trp ="Included";
		 else
		 $trp = "Excluded"; 
		 
		if($row["revised_offers"]!="")
		{
		if(strpos($row["revised_offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		else
		{
		  if(strpos($row["offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		$sel_clnt = "select company_name, logo_pic from b2b_profile where client_id='".$row["client_id"]."'";
		$res_clnt = mysqli_query($conn,$sel_clnt);
		if($res_clnt)
		{
		while($clnt = mysqli_fetch_array($res_clnt))
		{
 echo '<td>
		 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
		 <tr><td width="200px" height="100px"><img src="data:image/png;base64,'.base64_encode($row["pck_img1"]).'"  width="190px" height="95px" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["pck_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"></td></tr>
 <tr><td width="200px" height="30px">'.$row["duration"].'</td></tr>
   <tr><td width="200px" height="30px">'.$row["trip_dates"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["validity"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["prc_based"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$acc.'</td></tr>
 <tr><td width="200px" height="30px">'.$trp.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showItin(\''.$row["pck_id"].'\');">View Details</span></td></tr>
 <tr><td width="200px" height="80px" style="background:#bbb;"><span style="font-weight:bolder; float:left; font-size:18px; margin-left:20px;">'.$row["price"].'</span><br/><br/>
	   <span style="float:left;">
	   <div class="div_buyPackage" onClick="buyPckID(\''.$row["pck_id"].'\');">
	    Buy Now</a></div></span>
	 <span style="float:left; margin-left:5px;">
	 <div class="div_emailbtn_Package">
	 <span  onclick="show_block(\'div_FriendRecomm\');">E-mail</span> </div></span>
	  <span style="float:left; margin-left:5px;">
	 <a href="#"><div id="btnWish1" class="div_addToWishlist_Package">
	 Add to Cart</div></a></span>	</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["inventory"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["refundable"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$emi.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">Tour Operator Rating</td></tr>
 <tr><td width="200px" height="30px">'.$clnt["company_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="60px"><img src="data:images/png;base64,'.base64_encode($clnt["logo_pic"]).'" width="50px" height="50px" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showHtlDtls(\''.$row["pck_id"].'\');">View Details</span></td></tr></table>
   </td>';
   }
   }
   }
   }
echo '</tr>';
echo '</table>';
echo '</div>';
}

if(isset($_GET['SuggestDest']) && isset($_GET['value']) && isset($_GET['Type']) && isset($_GET['curLoc']) && isset($_GET['dis1']) && isset($_GET['dis2']) && isset($_GET['vactype']))
{
$vac_dest="";
  
	   $getDistLoc = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['curLoc']."%' and to_loc like '%".$_GET['value']."%' and distance between ".$_GET['dis1']." and ".$_GET['dis2']." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
	
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	    echo '<div  style="float:left; width:100%;">';	
	   if($res_vacID_S)
	   {	  
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		    $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."' and type='".$_GET['Type']."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	
	       if($res_locVac)
			{				
	       while($rL = mysqli_fetch_array($res_locVac))
			{
			  echo '<div style="float:left; width:100%; padding:5px; background:#ddd;">
			  <span style="float:left;">
			  <input type="checkbox" id="chk_'.$rL["locname"].'" value="'.$rL["locname"].'" onclick="crtBtn(this.id,\'spLocNm_'.$rL["locname"].'\'); update_dest(this.value);" /></span>
			  <span id="spLocNm_'.$rL["locname"].'" style="float:left; cursor:pointer;" onclick="crtBtn(\'chk_'.$rL["locname"].'\',this.id);">'.$rL["locname"].'-'.$row["distance"].'</span></div>';
				  		
	        }
				  
		   }
		   		 
		  }
		 }
		    echo '</div>';
	  }
	}
}

if(isset($_GET['MultiSuggestDest']) && isset($_GET['value']) && isset($_GET['Type']) && isset($_GET['curLoc']) && isset($_GET['dis1']) && isset($_GET['dis2']) && isset($_GET['vactype']))
{
$vac_dest="";
    	   $vac = explode(", ",$_GET['vactype']);	   
	   for($i=0; $i<count($vac); $i++)
	   {
	     $getDistLoc = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['currLoc']."%' and to_loc like '%".$_GET['value']."%' and  distance between ".$_GET['dis1']." and ".$_GET['dis2']." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
	echo '<div id="firstSeven" style="float:left; width:100%;">';	
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	  $toLoc = explode(" , ",$row["to_loc"]);
	   $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[$i]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	     {
	     while($r = mysqli_fetch_array($res_vacID_M))
		 {
		    $sel_locVac = "select locname from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."' and type='".$_GET['Type']."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			
			if($res_locVac)
			{			
	       while($rL = mysqli_fetch_array($res_locVac))
			{
		   echo '<div style="float:left; width:100%; padding:5px; background:#ddd;">
			  <span style="float:left;">
			  <input type="checkbox" id="chk_'.$rL["locname"].'" value="'.$rL["locname"].'" onclick="crtBtn(this.id,\'spLocNm_'.$rL["locname"].'\'); update_dest(this.value);" /></span>
			  <span id="spLocNm_'.$rL["locname"].'" style="float:left; cursor:pointer;" onclick="crtBtn(\'chk_'.$rL["locname"].'\',this.id);">'.$rL["locname"].'-'.$row["distance"].'</span></div>';			  		  		
	        }
		
		   }
		   
			}
		 }
	   }
	   }
	 
	  }
echo '</div>';
}

if(isset($_GET['viewPck']) && isset($_GET['vactype']) && isset($_GET['Type']) && isset($_GET['Loc']) && isset($_GET['locCount']) && isset($_GET['custDt']) && isset($_GET['flagDt']) && isset($_GET['rowCount']) && isset($_GET['currLoc']) && isset($_GET['dis0']) && isset($_GET['dis1']))
{

$flagDts = false;
$custDt = $_GET['custDt'];

$rowsCnt = (int)$_GET['rowCount'];

if($_GET['Type'] == "India")
 $_GET['Type'] = "DOMESTIC";
else
 $_GET['Type'] = "INTERNATIONAL"; 
  
  //echo $_GET['vactype'];

if($_GET['locCount'] == 1)
{
//echo $_GET['Loc'];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, pck_img1, validity,  trip_dates, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%' and locations like '%".$_GET['Loc']."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

if($_GET['locCount'] == 2)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1]."-".$_GET['vactype'];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 3)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}
else if($_GET['locCount'] == 4)
{
$loc = explode(", ",$_GET["Loc"]);

//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3];

  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 5)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4];
  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 6)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4].", ".$loc[5];
  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[5]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%".$loc[5]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 7)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4].", ".$loc[5].", ".$loc[6];
   $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_name, duration, validity,  trip_dates, pck_img1, price from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[5]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[6]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%".$loc[5]."%".$loc[6]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}


	  if($res_sel_pck_grd)
	   $cnt_rows = mysqli_num_rows($res_sel_pck_grd);	 
	   else
	    $cnt_rows =0;

	 if($cnt_rows >0)
	 { 
	  if($res_sel_pck_grd)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_grd))
		{
		  $trpDt = explode(",",$row["trip_dates"]);
		  for($j=0; $j<count($trpDt); $j++)
		  {
		  $trpMnth = explode("-",$trpDt[$j]);
		
		 if(isset($trpMnth[1]))
         {
		  if($trpMnth[1] >= $custDt || $trpMnth[1]<=(int)$custDt+1)
		    $flagDts = true;
		 else
		    $flagDts = false;	
		  }				  
		  }
			$vTil = explode(" ",$row["validity"]);
		$dt1 = date_create(date('Y-m-d'));
		$dt2 = date_create(date('Y-m-d',strtotime($vTil[2])));
		$mindiff = date_diff($dt1,$dt2);
	
		if($mindiff->format("%R%a") >0 && $flagDts == true)
		{
		$rowsCnt = $rowsCnt+1;
	
		 echo ' <span style="width:20%; float:left;">
		<div  class="div_grid_main">
		<div align="center" class="div_grid_img_name"><span id="div_name_'.$row["pck_id"].'">'.$row["pck_name"].' </span></div>
		<div style="position:relative;" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');">
	     <img id="img_'.$row["pck_id"].'" src="data:image/png,'.base64_encode($row["pck_img1"]).'" alt="'.$row["pck_name"].'" class="div_grid_images" />
		     <div class="div-grid_img_package_details">'.$row["duration"].'</div>
		 </div>	
		  <div class="div_grid_package_cost" align="center"><span>Rs'.$row["price"].'/-</span></div>	
		 <div style="width:100%;">	
		  <div><span class="div_grid_buyBtn" onClick="buyPckID(\''.$row["pck_id"].'\');">Buy</span></div> 
		  <div><span class="div_grid_emailBtn" onClick="show_block(\'div_FriendRecomm\');">Email</span></div>	 
		 </div>
			   <div style="width:100%;" align="center">
		  <span class="div_grid_compare">
		   <input id="grdChk_'.$row["pck_id"].'" type="checkbox" onclick="addToCompare(this.id,\''.$row["pck_id"].'\');" />
		     <span id="pack1">Add to compare</span></span></div>
		 </div>
	 </span>';
	
	  }
	   
	    }
		}
		}
	
		
		if($rowsCnt ==0)
		{
	 $five = 0;
	 
	 echo '<span style="float:left; width:50%">';
	 echo '<div style="float:left; width:100%;">';
	 
	 echo '<div style="float:left; width:100%;">
		  <span class="font-medium" style="color:#0066ff; font-size:22px;">
		  Explore '.$_GET['vactype'].' for following locations...
		  </span>
		 </div>';	 
	 
	  		  if(strpos($_GET['Loc'],", ")>0)
	           	  {
		    echo '<span style="color:#fff; font-size:12px; font-family:Calibri;">';
		    $dest = explode(", ",$_GET['Loc']);
			for($i=0; $i<=count($dest)-1; $i++)
        	{
			  if($i<=5)
			  {
			  echo '<span style="float:left; margin-left:10px;  font-size:12px; font-family:Calibri; text-decoration:underline; color:#0066ff; cursor:pointer;" onclick="expDest(\''.$dest[$i].'\');">';
			   echo $dest[$i];
			  echo '</span>';
			  }
			}
		  }
		  else
	     	  {
		  echo '<span style="float:left; margin-left:10px;  font-size:12px; font-family:Calibri; text-decoration:underline; color:#0066ff; cursor:pointer;" onclick="expDest(\''.$_GET['Loc'].'\');">';
			   echo $_GET['Loc'];
			  echo '</span>';
		  }
		
		  
		 echo '<div style="float:left; width:100%;">
		 <span class="font-medium" style="cursor:pointer; color:#0066ff;" onclick="show_block(\'ExpallOpts\');">More options...</span></div>';
			 
		 $getDistLocAll = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$_GET['dis0']." and ".$_GET['dis1']." order by distance asc";
		 $resDistAll = mysqli_query($con,$getDistLocAll);
		 if($resDistAll)
	   { 
	 echo '<div id="ExpallOpts" style="width:100%; float:left; display:none;">
		 <select id="expCity" onchange="expDest(this.value);">';	
	 while($row = mysqli_fetch_array($resDistAll))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	   if($res_vacID_S)
	   {
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		    $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	       if($res_locVac)
			{						
	       while($rL = mysqli_fetch_array($res_locVac))
			{		
			 echo '<option value="'.$rL["locname"].'">'.$rL["locname"].'</option>';	
	   	   }
		  
		   }
		   }
		   }
		   }
		   echo '</select></div>';
	    
	     }
	  
	  echo '</div>';
	  echo '</span>';
	  
	   echo '<span style="float:left; width:50%">';
	 echo '<div style="float:left; width:100%;">';
	 
	 echo '<div style="float:left; width:100%;">
		  <span class="font-medium" style="color:#0066ff; font-size:22px;">
		  Book hotel, travel of '.$_GET['vactype'].' for following locations...
		  </span>
		 </div>';	 
 		  if(strpos($_GET['Loc'],", ")>0)
		  {
		    echo '<span style="color:#fff; font-size:12px; font-family:Calibri;">';
		    $dest = explode(", ",$_GET['Loc']);
			for($i=0; $i<=count($dest)-1; $i++)
        	{
			  echo '<span style="float:left; margin-left:10px;  font-size:12px; font-family:Calibri; text-decoration:underline; color:#0066ff; cursor:pointer;" onclick="bookDest(\''.$dest[$i].'\');">';
			   echo $dest[$i];
			  echo '</span>';
			}
		  }
	
		  else
	     	  {
		  echo '<span style="float:left; margin-left:10px;  font-size:12px; font-family:Calibri; text-decoration:underline; color:#0066ff; cursor:pointer;" onclick="bookDest(\''.$_GET['Loc'].'\');">';
			   echo $_GET['Loc'];
			  echo '</span>';
		  }
		  
	 	 echo '<div style="float:left; width:100%;">
		 <span class="font-medium" style="cursor:pointer; color:#0066ff;" onclick="show_block(\'BookallOpts\');">More options...</span></div>';
			 
		 $getDistbookAll = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$_GET['dis0']." and ".$_GET['dis1']." order by distance asc";
		 $resDistbookAll = mysqli_query($con,$getDistbookAll);
		 if($resDistbookAll)
	   { 
	 echo '<div id="BookallOpts" style="width:100%; float:left; display:none;">
		 <select id="expCity" onchange="bookDest(this.value);">';	
	 while($row = mysqli_fetch_array($resDistbookAll))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	   if($res_vacID_S)
	   {
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		    $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	       if($res_locVac)
			{						
	       while($rL = mysqli_fetch_array($res_locVac))
			{		
			 echo '<option value="'.$rL["locname"].'">'.$rL["locname"].'</option>';	
	   	   }
		  
		   }
		   }
		   }
	 }
		   echo '</select></div>';
	    
	     }
	 
	 echo '</div>';	 
	 echo '</span>';
	 
	  echo '<div style="float:left; width:100%; margin-top:100px;">';
		 echo '<span style="color:#0066ff; cursor:pointer;" onclick="show_Partn();">B2B partner? Post a package..</span>';
		 echo '</div>';
	    
		}
		
		else
		{
		$three = 0;
		$threeb=0;
		echo '<span style="width:20%; float:left;">
		<div class="div_grid_main">
	<div style="float:left; width:100%;">';
	  echo 'Exlore <br/>';
	  
	    if(strpos($_GET['Loc'],", ")>0)
	  {
	   $loc = explode(", ",$_GET['Loc']);
	    if($loc[1] !="")
		{
		for($i=0; $i<count($loc); $i++)
		{
		 echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="expDest(\''.$loc[$i].'\');">'.$loc[$i].'</div>';
		 }
		}
		else
		{
		echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="expDest(\''.$loc.'\');">'.$loc[$i].'</div>';
		}
	  }
	  else if($_GET['Loc']!="")
	  {
	  echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="expDest(\''.$_GET['Loc'].'\');">'.$_GET['Loc'].'</div>';
	  }
	  else
	  {
		$getDistLoc = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$_GET['dis0']." and ".$_GET['dis1']." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
	echo '<div id="firstFive" style="float:left; width:100%; margin-top:5px; ">';
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	   if($res_vacID_S)
	   {
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		    $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	       if($res_locVac)
			{						
	       while($rL = mysqli_fetch_array($res_locVac))
	       {
			$three = $three+1;
			if($three<=3)
	       {
			echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="expDest(\''.$rL["locname"].'\');">'.$rL["locname"].'</div>';
	       }
		   }		  
		   }
		   }
		   }	 
	 }
	 }

	 echo '</div>';  
		
  echo '</div>';
	}  
  echo '<hr style="border:1px solid #ff0000; width:100%; float:left;" />';
  
 	echo '<div style="float:left; width:100%;">';
	  echo 'Book <br/>';
	  
	  if(strpos($_GET['Loc'],", ")>0)
	  {
	   $loc = explode(", ",$_GET['Loc']);
	    if($loc[1] !="")
		{
		for($i=0; $i<count($loc); $i++)
		{
		 echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="bookDest(\''.$loc[$i].'\',\''.$_GET['currLoc'].'\');">'.$loc[$i].'</div>';
		 }
		}
		else
		{
		echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="bookDest(\''.$loc.'\',\''.$_GET['currLoc'].'\');">'.$loc[$i].'</div>';
		}
	  }
	  else if($_GET['Loc']!="")
	  {
	  echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="bookDest(\''.$_GET['Loc'].'\',\''.$_GET['currLoc'].'\');">'.$_GET['Loc'].'</div>';
	  }
	  else
	  {  
		$getDistLoc = "select to_loc, distance from distance_matrix where type='".$_GET['Type']."' and from_loc like '%".$_GET['currLoc']."%' and distance between ".$_GET['dis0']." and ".$_GET['dis1']." order by distance asc";
	$resDist = mysqli_query($con,$getDistLoc);
	echo '<div id="firstFive" style="float:left; width:100%; margin-top:5px; ">';
	if($resDist)
	{ 
	 while($row = mysqli_fetch_array($resDist))
	 {
	    $toLoc = explode(" , ",$row["to_loc"]);
	  $sel_vacID_S = "select vac_id from dam_vactype where vac_title='".$_GET['vactype']."'";
	   $res_vacID_S = mysqli_query($dam,$sel_vacID_S);
	   if($res_vacID_S)
	   {
	     while($r = mysqli_fetch_array($res_vacID_S))
		 {
		    $sel_locVac = "select locname, statename from vac_dest_tab where ".$r["vac_id"]." = 'Y' and locname='".$toLoc[0]."'";
			$res_locVac = mysqli_query($con,$sel_locVac);
	       if($res_locVac)
			{						
	       while($rL = mysqli_fetch_array($res_locVac))
	       {
			$threeb = $threeb+1;
			if($threeb<=3)
	       {
			echo '<div style="float:left; text-align:left; width:100%; color:#0066ff; cursor:pointer;  font-size:12px; font-family:Calibri;" onclick="bookDest(\''.$rL["locname"].'\',\''.$_GET['currLoc'].'\');">'.$rL["locname"].'</div>';
	       }
		   }		  
		   }
		   }
		   }	 
	 	}
	}

	 echo '</div>';  
	
  echo '</div>'; 
  
 echo '</div></span>';
 }
}
}
/*

if(isset($_GET['ListPck']) && isset($_GET['vactype']) && isset($_GET['Type']) && isset($_GET['Loc']) && isset($_GET['locCount']) && isset($_GET['custDt']) && isset($_GET['flagDt']) && isset($_GET['rowCount']) && isset($_GET['currLoc']) && isset($_GET['dis0']) && isset($_GET['dis1']) && isset($_GET['listDisplay']))
{
	
echo '<table class="font-medium_indx" cellpadding="1" cellspacing="0" style="table-layout:fixed; float:left; background:#fff; font-size:14px;">
<tr>
<td width="200px">
 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
 <tr><th width="200px" height="100px">Package Image</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Package Name</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Add to Compare</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Package Details</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Duration</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Departure Dates</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Validity</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Tarrif For</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Accomodation</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Transportation</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Day-wise itinerary</th></tr>
 <tr><th width="200px" height="80px" style="background:#bbb;" align="right" style="padding-right:20px;">Package Price</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Inventory Status</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Cashback on Payment</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">EMI Option</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Tour Operator Rating</th></tr>
 <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Tour Operator Name</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="60px" align="right" style="padding-right:20px;">Tour Operator Logo</th></tr>
  <tr><th width="200px" height="30px" align="right" style="padding-right:20px;">Add to Compare</th></tr>
 <tr style="background:#ccc;"><th width="200px" height="30px" align="right" style="padding-right:20px;">Hotel Details</th></tr></table>
</td>';


$flagDts = false;
$custDt = $_GET['custDt'];

$rowsCnt = (int)$_GET['rowCount'];

if($_GET['Type'] == "India")
 $_GET['Type'] = "DOMESTIC";
else
 $_GET['Type'] = "INTERNATIONAL"; 

if($_GET['locCount'] == 1)
{
//echo $_GET['Loc'];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, revised_offers, offers, refundable, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%' and locations like '%".$_GET['Loc']."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

if($_GET['locCount'] == 2)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1]."-".$_GET['vactype'];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, revised_offers, offers, refundable, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 3)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2];
 $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, revised_offers, offers, refundable, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}
else if($_GET['locCount'] == 4)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3];
  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, revised_offers, offers, refundable, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 5)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4];
  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 6)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4].", ".$loc[5];
  $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[5]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%".$loc[5]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

else if($_GET['locCount'] == 7)
{
$loc = explode(", ",$_GET["Loc"]);
//echo $loc[0].", ".$loc[1].", ".$loc[2].", ".$loc[3].", ".$loc[4].", ".$loc[5].", ".$loc[6];
   $q_sel_pck_grd = "select distinct(pck_id) as pck_id, pck_img1, pck_img2, pck_name, validity,  trip_dates, duration, prc_based, price, inventory, incls, client_id from b2b_pck_crt where trip_theme like '%".$_GET['vactype']."%'  and locations like '%".$loc[0]."%' and type='".$_GET['Type']."' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[1]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[2]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[3]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[4]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[5]."%' or trip_theme like '%".$_GET['vactype']."%' and type='".$_GET['Type']."'  and  locations like '%".$loc[6]."%' or  trip_theme like '%".$_GET['vactype']."%' and locations like '%".$loc[0]."%".$loc[1]."%".$loc[2]."%".$loc[3]."%".$loc[4]."%".$loc[5]."%".$loc[6]."%' and type='".$_GET['Type']."'";
	  $res_sel_pck_grd = mysqli_query($conn,$q_sel_pck_grd);
}

	  if($res_sel_pck_grd)
	   $cnt_rows = mysqli_num_rows($res_sel_pck_grd);	 

	 if($cnt_rows >0)
	 { 
	  if($res_sel_pck_grd)
	   {
	    while($row = mysqli_fetch_array($res_sel_pck_grd))
		{
		 
		 $dest = array();	 
	 
		if(strpos($row["incls"],"comodation")>0)
		  $acc ="Included";
		 else
		 $acc = "Excluded";
		 
		 if(strpos($row["incls"],"portation")>0)
		  $trp ="Included";
		 else
		 $trp = "Excluded"; 
		 
		if($row["revised_offers"]!="")
		{
		if(strpos($row["revised_offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		else
		{
		  if(strpos($row["offers"],"EMI")>0)
		    $emi = "YES";
		  else
		   $emi = "NO";	
		}
		 
		 
		  $trpDt = explode(",",$row["trip_dates"]);
		  for($j=0; $j<count($trpDt); $j++)
	           	  {
		  $trpMnth = explode("-",$trpDt[$j]);		
		 if(isset($trpMnth[1]))
         {
		  if($trpMnth[1] >= $custDt || $trpMnth[1]<=(int)$custDt+1)
		    $flagDts = true;
		 else
		    $flagDts = false;	
		  }				  
		  }
			$vTil = explode(" ",$row["validity"]);
		$dt1 = date_create(date('Y-m-d'));
		$dt2 = date_create(date('Y-m-d',strtotime($vTil[2])));
		$mindiff = date_diff($dt1,$dt2);
		
		$sel_clnt = "select company_name, logo_pic from b2b_profile where client_id='".$row["client_id"]."'";
		$res_clnt = mysqli_query($conn,$sel_clnt);
		
		if($res_clnt)
		{
		while($clnt = mysqli_fetch_array($res_clnt)) 
	    {

		if($mindiff->format("%R%a") >0 && $flagDts == true)
		{
        echo '<td>
		 <table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed;">
		 <tr><td width="200px" height="100px"><img src="data:image/png;base64,'.base64_encode($row["pck_img1"]).'" width="190px" height="95px" onClick="show_pckDtls(\'dtls_pck\',\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["pck_name"].'</td></tr>
 <tr><td width="200px" height="30px"><input type="checkbox" id="LstChk_'.$row["pck_id"].'" onclick="addToCompare(this.id,\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"></td></tr>
 <tr><td width="200px" height="30px">'.$row["duration"].'</td></tr>
  <tr><td width="200px" height="30px">'.$row["trip_dates"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["validity"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["prc_based"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$acc.'</td></tr>
 <tr><td width="200px" height="30px">'.$trp.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showItin(\''.$row["pck_id"].'\');">View Details</span></td></tr>
 <tr><td width="200px" height="80px" style="background:#bbb;"><span style="font-weight:bolder; float:left; font-size:18px; margin-left:20px;">'.$row["price"].'</span><br/><br/>
	   <span style="float:left;">
	   <div class="div_buyPackage" onClick="buyPckID(\''.$row["pck_id"].'\');">
	    Buy Now</a></div></span>
	 <span style="float:left; margin-left:5px;">
	 <div class="div_emailbtn_Package">
	 <span onClick="show_block(\'div_FriendRecomm\');">E-mail</span> </div></span>
	  <span style="float:left; margin-left:5px;">
	 <a href="#"><div id="btnWish1" class="div_addToWishlist_Package">
	 Add to Cart</div></a></span>	</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$row["inventory"].'</td></tr>
 <tr><td width="200px" height="30px">'.$row["refundable"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">'.$emi.'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px">Tour Operator Rating</td></tr>
 <tr><td width="200px" height="30px">'.$clnt["company_name"].'</td></tr>
 <tr style="background:#ccc;"><td width="200px" height="60px"><img src="data:images/png;base64,'.base64_encode($clnt["logo_pic"]).'" width="50px" height="50px" /></td></tr>
 <tr><td width="200px" height="30px"><input type="checkbox" id="LstChk_'.$row["pck_id"].'" onclick="addToCompare(this.id,\''.$row["pck_id"].'\');" /></td></tr>
 <tr style="background:#ccc;"><td width="200px" height="30px"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="showHtlDtls(\''.$row["pck_id"].'\');">View Details</span></td></tr></table>
   </td>';
	    }
		}
		}
	   
	   }
		}
	}
	
		echo '</tr></table>';
	
	}  */
	
	

if(isset($_GET['showPopulDest']) && isset($_GET['popVac']))
{
$locs = "";
if(strpos($_GET['popVac'],", ")>1)
{
   $vac = explode(", ",$_GET['popVac']);
   $vacC = count($vac);
echo '<div style="width:200px; height:80px; overflow-y:scroll; overflow-x:hidden; border:1px solid #444;">';
   if($vacC == 2)
   {
   $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."' or vac_title='".$vac[1]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			   echo '<div style="float:left; width:100%;"><span style="float:left;">
			   <input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
		}
	  } 
   }
   else if($vacC == 3)
   {
    $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."' or vac_title='".$vac[1]."' or vac_title='".$vac[2]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname  from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			   echo '<div style="float:left; width:100%;"><span style="float:left;"><input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
		}
	  } 
     }
	 else if($vacC == 4)
    {
    $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."' or vac_title='".$vac[1]."' or vac_title='".$vac[2]."' or vac_title='".$vac[3]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			  echo '<div style="float:left; width:100%;"><span style="float:left;"><input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
		}
	  } 
     }
	 else if($vacC == 5)
     {
    $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."' or vac_title='".$vac[1]."' or vac_title='".$vac[2]."' or vac_title='".$vac[3]."' or vac_title='".$vac[4]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname  from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			  echo '<div style="float:left; width:100%;"><span style="float:left;"><input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
		}
	  } 
     }
	  else if($vacC == 6)
     {
    $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."' or vac_title='".$vac[1]."' or vac_title='".$vac[2]."' or vac_title='".$vac[3]."' or vac_title='".$vac[4]."' or vac_title='".$vac[5]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname  from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			  echo '<div style="float:left; width:100%;"><span style="float:left;"><input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
		}
	  } 
     }

	 else
	 {
	 echo 'Sorry Can select a max of 6 vacation themes';
	 }
 echo '</div>';	  
}
else
{
$vac = explode(",",$_GET['popVac']);
 $sel_vacID_M = "select vac_id from dam_vactype where vac_title='".$vac[0]."'";
	   $res_vacID_M = mysqli_query($dam,$sel_vacID_M);
echo '<div style="width:200px; height:80px; overflow-y:scroll; overflow-x:hidden; border:1px solid #444;">';	   
	   if($res_vacID_M)
	         {
	     while($r = mysqli_fetch_array($res_vacID_M))
		     {
		    $sel_locVac = "select distinct(locname) as locname  from vac_dest_tab where ".$r["vac_id"]." = 'Y' and type='INTERNATIONAL'";
			$res_locVac = mysqli_query($con,$sel_locVac);
			if($res_locVac)
			{
		     while($rLoc = mysqli_fetch_array($res_locVac))
			 {
			   echo '<div style="float:left; width:100%;"><span style="float:left;">
			   <input type="checkbox" id="chk_'.$rLoc["locname"].'" value="'.$rLoc["locname"].'" onclick="write_vac(this.id,this.value);" /></span>
			   <span style="float:left; font-size:14px; font-family:calibri;">'.$rLoc["locname"].'</span></div>';
			 }
			}
			}
			}			
echo '</div>';			
}
}




if(isset($_GET['subUser']) && isset($_GET['userID']) && isset($_GET['regBy']))
{
//echo 'kjsdfhksjdhfskjfhskjdfhdskjf';
 $sel_User = "select emp_code, company_name, headquator_location, requester_name, designation, regional_office, state, email_id_prof, mobile, DATE_FORMAT(`date_registered`,'%d-%m-%Y') as date_registered, acc_lds, acc_pckg, acc_dashb, acc_serv, acc_prof, acc_pay from b2b_profile where emp_code = '".$_GET['userID']."' and reg_by='".$_GET['regBy']."'" ;
 $res_user = mysqli_query($conn,$sel_User);
 
 if($res_user)
 {
 while($r = mysqli_fetch_array($res_user))
 {
  echo '<table  class="font-medium" style="float:left; width:60%; height:350px;" cellpadding="2" cellspacing="0">
		    <tr>
			  <th align="right">Employee ID</th>
			  <td align="left">
			   <select style="width:150px;" onChange="show_SubUser(this.value,\''.$_GET['regBy'].'\');">';			
				$sel_subUser = "select emp_code from b2b_profile where reg_by='".$_GET['regBy']."'";
				$res_subUser = mysqli_query($conn,$sel_subUser);
				if($res_subUser)
				{
				while($row = mysqli_fetch_array($res_subUser))
				{
				 if($row["emp_code"] == $_GET['userID'])
				      echo '<option selected="selected" value="'.$row["emp_code"].'">'.$row["emp_code"].'</option>';
				else	  
				  echo '<option value="'.$row["emp_code"].'">'.$row["emp_code"].'</option>';
				}
				}
				
			  echo '</select>
			  </td>
			  <th align="right">Employee Name</th>
			  <td><input type="text" id="txt_name" class="txtbox_Tab" style="width:150px;" value="'.$r["requester_name"].'"  /></td>
			</tr>
			<tr>
			<th align="right">Designation</th>
			<td><input type="text" id="txt_desig" class="txtbox_Tab" style="width:150px;" value="'.$r["designation"].'"   /></td>
			<th align="right">Company Name</th>
			<td><input type="text" id="txt_cmpName" class="txtbox_Tab" style="width:150px;" value="'.$r["company_name"].'"   /></td>
			</tr>
			<tr>
			  <th align="right">Headquator</th>
			  <td><input type="text" id="txt_hdloc" class="txtbox_Tab" style="width:150px;" value="'.$r["headquator_location"].'"  /></td>
			  <th align="right">Regional Office</th>
			  <td><input type="text" id="txt_reg" class="txtbox_Tab" style="width:150px;" value="'.$r["regional_office"].'"   /></td>
			</tr>
			<tr>
			  <th align="right">User ID</th>
			  <td><input type="text" id="txt_userid" class="txtbox_Tab" style="width:150px;" value="'.$r["email_id_prof"].'"  /></td>
			   <th align="right">Date Registered</th>
			  <td><input type="text" id="txt_regDt" class="txtbox_Tab" style="width:150px;" value="'.$r["date_registered"].'" readonly="true" /></td>
			</tr>		
			<tr>
			  <th align="right">Access to Leads';
			  if(strpos($r["acc_lds"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_lead" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_lead"  /></th>';	
			 
			  echo '<th align="right">Access to Packages';
			   if(strpos($r["acc_pckg"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_pckg" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_pckg"  /></th>';
			
			echo '</tr>
			<tr>
			 <th align="right">Access to Dashboard';			 
			   if(strpos($r["acc_dashb"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_dashb" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_dashb"  /></th>';
			   
			  echo '<th align="right">Access to Services';
			   if(strpos($r["acc_serv"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_serv" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_serv"  /></th>';
			
			echo '</tr>
			<tr>
			 <th align="right">Access to profile';
			  if(strpos($r["acc_prof"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_prof" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_prof"  /></th>';
			 
			  echo '<th align="right">Access to Payment';
			  if(strpos($r["acc_pay"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_pay" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_pay"  /></th>';
			echo '</tr>
		   </table>';
		  
		   echo '<div style="float:left; width:100%;">
		   <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:60px; font-size:16px; height:24px;" value="Edit" onclick="passEditVals(\''.$_GET['userID'].'\',\'txt_name\',\'txt_desig\',\'txt_cmpName\',\'txt_hdloc\',\'txt_reg\',\'txt_userid\',\'txt_regDt\',\'chk_lead\',\'chk_pckg\',\'chk_dashb\',\'chk_serv\',\'chk_prof\',\'chk_pay\',\''.$_GET['regBy'].'\');" /></span>
		    <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:90px; font-size:16px; height:24px;" value="Deactivate" onClick="deactUser(\''.$r['email_id_prof'].'\'); /></span>
			 <span style="float:left; margin-left:10px;"></span>
		   </div>';
		   }
		    }
}

if(isset($_GET['EditUser']) && isset($_GET['userID']) && isset($_GET['EmpName']) && isset($_GET['CmpName']) && isset($_GET['Desg']) && isset($_GET['userEml']) && isset($_GET['HdQ']) && isset($_GET['Regl']) && isset($_GET['regDt']) && isset($_GET['Leads']) && isset($_GET['Pckgs']) && isset($_GET['DashB']) && isset($_GET['Serv']) && isset($_GET['Prf']) && isset($_GET['Pay']) && isset($_GET['regBy']))
{

$edit_user= "update b2b_profile set requester_name='".$_GET['EmpName']."', company_name='".$_GET['CmpName']."', designation='".$_GET['Desg']."', headquator_location='".$_GET['HdQ']."', regional_office='".$_GET['Regl']."', email_id_prof='".$_GET['userEml']."',  date_registered='".date('Y-m-d',strtotime($_GET['regDt']))."',acc_lds='".$_GET['Leads']."', acc_pckg='".$_GET['Pckgs']."', acc_dashb='".$_GET['DashB']."', acc_serv='".$_GET['Serv']."', acc_prof='".$_GET['Prf']."', acc_pay='".$_GET['Pay']."' where emp_code='".$_GET['userID']."' and reg_by='".$_GET['regBy']."' ";
$res_edit = mysqli_query($conn,$edit_user);

if($res_edit)
{
 $sel_User = "select emp_code, company_name, headquator_location, requester_name, designation, regional_office, state, email_id_prof, mobile, DATE_FORMAT(`date_registered`,'%d-%m-%Y') as date_registered, acc_lds, acc_pckg, acc_dashb, acc_serv, acc_prof, acc_pay from b2b_profile where emp_code = '".$_GET['userID']."' and reg_by='".$_GET['regBy']."'" ;
 $res_user = mysqli_query($conn,$sel_User);
 
 if($res_user)
 {
 while($r = mysqli_fetch_array($res_user))
 {
  echo '<table  class="font-medium" style="float:left; width:60%; height:350px;" cellpadding="2" cellspacing="0">
		    <tr>
			  <th align="right">Employee ID</th>
			  <td align="left">
			   <select style="width:150px;" onChange="show_SubUser(this.value,\''.$_GET['regBy'].'\');">';			
				$sel_subUser = "select emp_code from b2b_profile where reg_by='".$_GET['regBy']."'";
				$res_subUser = mysqli_query($conn,$sel_subUser);
				if($res_subUser)
				{
				while($row = mysqli_fetch_array($res_subUser))
				{
				 if($row["emp_code"] == $_GET['userID'])
				      echo '<option selected="selected" value="'.$row["emp_code"].'">'.$row["emp_code"].'</option>';
				else	  
				  echo '<option value="'.$row["emp_code"].'">'.$row["emp_code"].'</option>';
				}
				}
				
			  echo '</select>
			  </td>
			  <th align="right">Employee Name</th>
			  <td><input type="text" id="txt_name" class="txtbox_Tab" style="width:150px;" value="'.$r["requester_name"].'"  /></td>
			</tr>
			<tr>
			<th align="right">Designation</th>
			<td><input type="text" id="txt_desig" class="txtbox_Tab" style="width:150px;" value="'.$r["designation"].'"   /></td>
			<th align="right">Company Name</th>
			<td><input type="text" id="txt_cmpName" class="txtbox_Tab" style="width:150px;" value="'.$r["company_name"].'"   /></td>
			</tr>
			<tr>
			  <th align="right">Headquator</th>
			  <td><input type="text" id="txt_hdloc" class="txtbox_Tab" style="width:150px;" value="'.$r["headquator_location"].'"  /></td>
			  <th align="right">Regional Office</th>
			  <td><input type="text" id="txt_reg" class="txtbox_Tab" style="width:150px;" value="'.$r["regional_office"].'"   /></td>
			</tr>
			<tr>
			  <th align="right">User ID</th>
			  <td><input type="text" id="txt_userid" class="txtbox_Tab" style="width:150px;" value="'.$r["email_id_prof"].'"  /></td>
			   <th align="right">Date Registered</th>
			  <td><input type="text" id="txt_regDt" class="txtbox_Tab" style="width:150px;" value="'.$r["date_registered"].'" readonly="true" /></td>
			</tr>		
			<tr>
			  <th align="right">Access to Leads';
			  if(strpos($r["acc_lds"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_lead" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_lead"  /></th>';	
			 
			  echo '<th align="right">Access to Packages';
			   if(strpos($r["acc_pckg"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_pckg" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_pckg"  /></th>';
			
			echo '</tr>
			<tr>
			 <th align="right">Access to Dashboard';			 
			   if(strpos($r["acc_dashb"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_dashb" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_dashb"  /></th>';
			   
			  echo '<th align="right">Access to Services';
			   if(strpos($r["acc_serv"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_serv" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_serv"  /></th>';
			
			echo '</tr>
			<tr>
			 <th align="right">Access to profile';
			  if(strpos($r["acc_prof"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_prof" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_prof"  /></th>';
			 
			  echo '<th align="right">Access to Payment';
			  if(strpos($r["acc_pay"],"ES-")>0)
			    echo '<input type="checkbox" id="chk_pay" checked="checked" /></th>';
			 else
			   echo '<input type="checkbox" id="chk_pay"  /></th>';
			echo '</tr>
		   </table>';
		  
		   echo '<div style="float:left; width:100%;">
		   <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:60px; font-size:16px; height:24px;" value="Edit" onclick="passEditVals(\''.$_GET['userID'].'\',\'txt_name\',\'txt_desig\',\'txt_cmpName\',\'txt_hdloc\',\'txt_reg\',\'txt_userid\',\'txt_regDt\',\'chk_lead\',\'chk_pckg\',\'chk_dashb\',\'chk_serv\',\'chk_prof\',\'chk_pay\',\''.$_GET['regBy'].'\');" /></span>
		    <span style="float:left; margin-left:10px;"><input type="button" class="smallbtn" style="width:90px; font-size:16px; height:24px;" value="Deactivate" onClick="deactUser(\''.$r['email_id_prof'].'\');" /></span>
			 <span style="float:left; margin-left:10px;"></span>
		   </div>';
	}
	 }
}

}

if(isset($_GET['userDeact']) && isset($_GET['userEml']))
{
 $deact_user= "update user_tab set user_status='Deactivated' where user_email='".$_GET['userEml']."' and sub_user='YES'";
 $res_deact = mysqli_query($conn,$deact_user);
 if($deact_user)
 {
   echo '<script type="text/javascript">';
   echo 'alert(\'Success: User Deactivated\');';
   echo '</script>';
 }
 else
   echo mysqli_error($conn);
}

/*if(isset($_GET['locMod']) && isset($_GET['state']))
{
$sel_loc = "select locname from user_destinations where statename='".$_GET['state']."'";
$res_loc = mysqli_query($con,$sel_loc);
if($res_loc)
{
 echo '<select style="width:150px; float:left; font-size:12px;" onchange="addLocs(this.value);">';
 while($row = mysqli_fetch_array($res_loc))
 {  
   echo '<option value="'.$row["locname"].'">'.$row["locname"].'</option>';
 }
 echo '</select>';
}
}

if(isset($_GET['StMod']) && isset($_GET['Country']))
{
$sel_loc = "select locname from user_destinations where country='".$_GET['Country']."'";
$res_loc = mysqli_query($con,$sel_loc);
if($res_loc)
{
 echo '<select style="width:150px; float:left; font-size:12px;" onchange="addLocs(this.value);">';
 while($row = mysqli_fetch_array($res_loc))
 {  
   echo '<option value="'.$row["locname"].'">'.$row["locname"].'</option>';
 }
 echo '</select>';
}
}*/

?>