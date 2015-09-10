<?php

include("PHP_Connection.php");
date_default_timezone_set("Asia/Calcutta");

$trvlr="";
$incl ="";
$dur="";
$valid="";
$vacThm="";
$vId="";
$vacId="";
$i=0;

$crt_subUser = false;
$crt_Pck_flag = false;  


if(isset($_POST['btnSub_pck']))
{  
  set_time_limit(10000);

$leads_page=true;

$_GET["status"]=""; 

$vacThm = addslashes($_POST["sp_theme"]);

$vId = array();

$vId = explode(", ",$vacThm);

$q_vid = "select vac_id from vac_type where vac_title ='".$vId[0]."'";
$res_vid = mysqli_query($conn,$q_vid);
$has_row = mysqli_num_rows($res_vid);
if($res_vid)
{
 while($row = mysqli_fetch_array($res_vid))
  {
   $vacId = $row["vac_id"];
  }
}
else
 echo "Error :".mysqli_error($conn);
 
 
if($_FILES["imgfile1"]["error"] != 4 && $_FILES["imgfile1"]["tmp_name"]!="")
{ 
$pic1 = addslashes(file_get_contents($_FILES["imgfile1"]["tmp_name"]));	
 }
 else
  $pic1 ="";


if($_FILES["imgfile2"]["error"] != 4 && $_FILES["imgfile2"]["tmp_name"]!="")
{ 
$pic2 = addslashes(file_get_contents($_FILES["imgfile2"]["tmp_name"]));	
 }
 else
  $pic2 ="";  



if(isset($_POST["rdAgenda"]))
  $agenda = 'M';
else if(isset($_POST["chkSight"])) 
$agenda = 'S';
else if(isset($_POST["chkAct"])) 
$agenda = 'A';
else if(isset($_POST["chkRest"]))
$agenda ='R';

$pck_agend_dtl = $_POST["trp_agenda"];


if(isset($_POST["rdInten"]))
$inten =$_POST["rdInten"];

if(isset($_POST["chkSingle"]) && isset($_POST["chkage45"]))
$trvlr .= $_POST["chkSingle"].$_POST["chkage45"]."-".$_POST["rdGen"].", ";

if(isset($_POST["chkSingle"]) && isset($_POST["chkage45plus"]))
$trvlr .= $_POST["chkSingle"].$_POST["chkage45plus"]."-".$_POST["rdGen"].", ";

if(isset($_POST["chkCouple"]) && isset($_POST["chkage45"]))
$trvlr .= $_POST["chkCouple"].$_POST["chkage45"].", ";

if(isset($_POST["chkCouple"]) && isset($_POST["chkage45plus"]))
$trvlr .= $_POST["chkCouple"].$_POST["chkage45plus"].", ";

if(isset($_POST["chkGroup"]) && isset($_POST["chkage45"]))
$trvlr .=$_POST["chkGroup"].$_POST["chkage45"].", ";

if(isset($_POST["chkGroup"]) && isset($_POST["chkage45plus"]))
$trvlr .=$_POST["chkGroup"].$_POST["chkage45plus"].", ";

if(isset($_POST["chkFamilykid"]))
{
$trvlr .=$_POST["chkFamilykid"].", ";
  
  if(isset($_POST["chkkid"]))
  $trvlr .=$_POST["chkchild"].", ";
  
   if(isset($_POST["chkchild"]))
  $trvlr .=$_POST["chkkid"].", ";
  
   if(isset($_POST["chkchildplus"]))
  $trvlr .=$_POST["chkchildplus"];
}

if(isset($_POST["chkGroupkid"]))
{
$trvlr .=$_POST["chkGroupkid"].", ";
  
  if(isset($_POST["chkkid"]))
  $trvlr .=$_POST["chkchild"].", ";
  
   if(isset($_POST["chkchild"]))
  $trvlr .=$_POST["chkkid"].", ";
  
   if(isset($_POST["chkchildplus"]))
  $trvlr .=$_POST["chkchildplus"].", ";
}
	  
$dur = $_POST["txtDur"];
$valid = $_POST["txtvalidfrmDt"]." to ".$_POST["txtvalidtoDt"];

/*if($_POST["txtAndOr"] == "Or")
$tripDt = $_POST["txtTripFrmDt"]." , ".$_POST["txtTripToDt"]." Or ".$_POST["txtFrmtrv_dt2"]." , ".$_POST["txtTotrv_dt2"]; 

if($_POST["txtAndOr"] == "And")
$tripDt = $_POST["txtTripFrmDt"]." , ".$_POST["txtTripToDt"]." And ".$_POST["txtFrmtrv_dt2"]." , ".$_POST["txtTotrv_dt2"];

if($_POST["txtAndOr"] == "")
$tripDt = $_POST["txtTripFrmDt"]." , ".$_POST["txtTripToDt"];*/

$incl = $_POST["sp_incl"];
$excl = $_POST["sp_excl"];

if(isset($_POST["rdloc"]))
{
$num_loc = $_POST["rdloc"];
$locs =  $_POST["sp_loc"];
}


if(isset($_POST["rdcost"]))
{
 $prc_basedOn = "Per ".$_POST["rdcost"];
 if($_POST["rdcost"]=="Group")
   $prc_basedOn = "Per "."Adults-".$_POST["drpPerAdult"].", Kids-".$_POST["drpKidBel12"].":".$_POST["drpKidAbv12"];
  }


$locss = array();

$locss = explode(", ",$_POST["sp_loc"]);
$loc_count = count($locss);

$trpDtscnt = $_POST['sp_dt_count'];
$trpDt ="";

for($i=1; $i<=$trpDtscnt; $i++)
{
  $trpDt .= $_POST["txtdepDt_".$i].", ";
}

//-------------------------------------------------------------------- Hotel Values ---------------------------------------------------------------------

$htl_loc = array();
$str_rate = array();
$htl_dur = array();
$htl_name= array();
$htl_room = array();
$htl_occu = array();
$htl_beds = array();
$htl_img = array();
$htl_loc_id = array();
$htl_incl = array();
$htl_excl = array();
$htl_opt = array();
$htl_food = array();

$htl_Rows = $_POST["txtHtlRows"];

$htl_count=0;
$k = 0;
for($i=2; $i<$htl_Rows; $i++)
{
for($j=0; $j<=$loc_count; $j++)
{
if(isset($_POST["txtHtl_name_".$locss[$j]."_".$i]))
{
$htl_loc[$k] = addslashes($_POST["txtHtl_loc_".$locss[$j]."_0"]);
if(isset($_POST["chk_".$locss[$j]."_".$i]))
   $htl_name[$k] = addslashes($_POST["txtHtl_name_".$locss[$j]."_".$i])."/Similar";
else  
$htl_name[$k] = addslashes($_POST["txtHtl_name_".$locss[$j]."_".$i]);
$str_rate[$k] = addslashes($_POST["txtHtl_rate_".$locss[$j]."_".$i]);
$htl_dur[$k] = addslashes($_POST["txtHtl_dur_".$locss[$j]."_".$i]);
$htl_room[$k] = $_POST["txtHtl_room_".$locss[$j]."_".$i];
$htl_occu[$k] = addslashes($_POST["txtHtl_occu_".$locss[$j]."_".$i]);
$htl_beds[$k] = $_POST["txtHtl_extbed_".$locss[$j]."_".$i];
$htl_food[$k] = $_POST["drpHtl_food_".$locss[$j]."_".$i];
if(isset($_FILES["HtlImg_".$locss[$j]."_".$i]["error"]))
   if($_FILES["HtlImg_".$locss[$j]."_".$i]["error"]!=4)
     $htl_img[$k] = addslashes(file_get_contents($_FILES["HtlImg_".$locss[$j]."_".$i]["tmp_name"]));
else
    $htl_img[$k]="";
else
    $htl_img[$k]="";	
	
$k++;
$htl_count++;
}
}
}


for($i=0; $i<$htl_count; $i++)
{
$q_loc_id = "select locId from user_destinations where locName='".$htl_loc[$i]."'";
$res_loc_id = mysqli_query($con,$q_loc_id);
if($res_loc_id)
{
while($row = mysqli_fetch_array($res_loc_id))
{
  $htl_loc_id[$i] = $row["locId"];
}
}
}

$k=0;
for($i=1; $i<$htl_count; $i++)
{
if(isset($_POST["txtIncl_prev_".$i]))
  $htl_incl[$k] = $_POST["txtIncl_prev_".$i];
else
    $htl_incl[$k]="";
 $k++;
}

$k=0;
for($i=1; $i<$loc_count; $i++)
{
if(isset($_POST["txtExcl_prev_".$i]))
 $htl_excl[$k] = $_POST["txtExcl_prev_".$i];
else
  $htl_excl[$k] ="";
$k++;
}

//----------------------------------------------------------------  Transport ---------------------------------------------------------------------

if($_POST["rdP2p"]!="No")
{
if(isset($_POST["rdWay"]))
{
if($_POST["rdWay"] == "OneWay")
   {
     if($_POST["rdarr"] == "Onward")
	 {
	    $ic_trp = "OneWay-Onward";
	 }
	 else if($_POST["rdarr"] == "Return")
	 {
	    $ic_trp = "OneWay-Return";
	 }
   }
else
{
$ic_trp = $_POST["rdWay"];
}   
}
if(isset( $_POST["txtFrom_onw"]))
$fromDest_onwd =  $_POST["txtFrom_onw"];
else
$fromDest_onwd = "";
if(isset($_POST["sp_drop"]))
$toDest_onwd =  $_POST["sp_drop"];
else
$toDest_onwd="";
$frmDest_onwd_mode = $_POST["drpMode_ret_onwd"];


if(isset($_POST["drp_trf_means_onwd"]) && $_POST["drp_trf_means_onwd"]!="Means")
  $on_trf_mns = $_POST["drp_trf_means_onwd"];
else if(isset($_POST["txttrfMode_on"]))
    $on_trf_mns = $_POST["txttrfMode_on"];

if(isset($_POST["sp_pickup"] ))
$frmDest_ret = $_POST["sp_pickup"] ;
else
$frmDest_ret ="";
if(isset($_POST["txtTo_onwd"]))
$toDest_ret = $_POST["txtTo_onwd"];
else
$toDest_ret="";

$frmDest_ret_mode = $_POST["drpMode_onwd_arri"];
if(isset($_POST["chkTransfer_ret"]))
{
if(isset($_POST["drp_trf_means_ret"]) && $_POST["drp_trf_means_ret"]!="Means")
$ret_trf_mns = $_POST["drp_trf_means_ret"];
else if(isset($_POST["txttrfMode_ret"]))
    $ret_trf_mns = $_POST["txttrfMode_ret"];
}	
}
else
{
$ic_trp = "None";
$fromDest_onwd = "";
$toDest_onwd = "";
$frmDest_onwd_mode = "";
$on_trf_mns="";
$frmDest_ret = "" ;
$toDest_ret = "";
$frmDest_ret_mode ="";
$ret_trf_mns ="";
}

$org_loc = array();
$dest_loc = array();
$mode_p = array();
$mns_p = array();


for($i=1; $i<=$loc_count; $i++)
{
if($_POST['rdc2c']!="No")
{
if(isset($_POST["txttrv_frm_".$i]))
$org_loc[$i] = $_POST["txttrv_frm_".$i];
else
$org_loc[$i]="";
if(isset($_POST["txttrv_to_".$i]))
$dest_loc[$i] = $_POST["txttrv_to_".$i];
else
$dest_loc[$i]="";
if(isset($_POST["txttrv_mode_".$i]))
$mode_p[$i] = $_POST["txttrv_mode_".$i];
else
$mode_p[$i]="";
if(isset($_POST["txttrv_means_".$i]))
$mns_p[$i] = $_POST["txttrv_means_".$i];
else
$mns_p[$i]="";
}
else
{
$org_loc[$i]="";
$dest_loc[$i]="";
$mode_p[$i]="";
$mns_p[$i]="";
}
}

$loc = array();
$mod_L = array();
$mns_L = array();


for($i=1; $i<=$loc_count; $i++)
{
if($_POST["rdlcl"]!="No")
{
if(isset($_POST["txtltrv_city_".$i]))
$loc[$i] = $_POST["txtltrv_city_".$i];
else
$loc[$i]="";
if(isset($_POST["txtltrv_mode_".$i]))
$mod_L[$i] = $_POST["txtltrv_mode_".$i];
else
$mod_L[$i]="";
if(isset($_POST["txtltrv_means_".$i]))
$mns_L[$i] = $_POST["txtltrv_means_".$i];
else
$mns_L[$i]=""; 
}
else
{
$loc[$i]="";
$mod_L[$i]="";
$mns_L[$i]="";
}
}

//------------------------------------------------------------------------  Attraction ----------------------------------------------------------------------------

$attr_day = array();
$attr_loc = array();
$attr_name = array();
$attr_cate = array();
$attr_strt_tm = array();
$attr_arrv_tm = array();
$attr_tm_allo = array();
$attr_loc_id = array();

$attrRows = $_POST["txtAttrCnt"];

for($i=1; $i<$attrRows; $i++)
{
if(isset($_POST["txtAttr_day_".$i]))
  $attr_day[$i] = $_POST["txtAttr_day_".$i];
if(isset($_POST["txtAttr_loc_".$i]))  
$attr_loc[$i] = $_POST["txtAttr_loc_".$i];
if(isset($_POST["drpAttr_cate_".$i]))
$attr_cate[$i] = $_POST["drpAttr_cate_".$i];
if(isset($_POST["txtAttr_attr_".$i]))
$attr_name[$i] = $_POST["txtAttr_attr_".$i];
if(isset($_POST["txtAttr_str_".$i]))
$attr_strt_tm[$i] = $_POST["txtAttr_str_".$i];
if(isset($_POST["txtAttr_arv_".$i]))
$attr_arrv_tm[$i] = $_POST["txtAttr_arv_".$i];
if(isset($_POST["txtAttr_tm_".$i]))
$attr_tm_allo[$i] = $_POST["txtAttr_tm_".$i];

$q_loc_id = "select locId from user_destinations where locName='".$attr_loc[$i]."'";
$res_loc_id = mysqli_query($con,$q_loc_id);
if($res_loc_id)
{
while($row = mysqli_fetch_array($res_loc_id))
{
  $attr_loc_id[$i] = $row["locId"];
}
}
}

// -------------------------------------------------------------- Deductions ------------------------------------------------------------------------------------------

$dedn_day = array();
$dedn_rate = array();
$dedn = "";
$dedu_rows = $_POST["txtcncl_deduct"];

if($_POST['rdRef']=="Yes")
{
for($i=1; $i<$dedu_rows; $i++)
{
if(isset($_POST["txt_cncl_day_".$i]))
  $dedn_day[$i] = addslashes($_POST["txt_cncl_day_".$i]);
if(isset($_POST["txt_cncl_rate_".$i]))  
  $dedn_rate[$i] = addslashes($_POST["txt_cncl_rate_".$i]);
  $dedn .= $dedn_rate[$i]." - ".$dedn_day[$i].", ";
}
} 
else
{
for($i=1; $i<$dedu_rows; $i++)
{
  $dedn_day[$i] = "";
  $dedn_rate[$i] = "";
  $dedn ="";
}
} 
if($_POST["txtATerms"] !="")
$terms = $_POST["txtATerms"];
else if($_FILES["docfile"]["error"] != 4 && $_FILES["docfile"]["tmp_name"]!="")
      $terms = addslashes(file_get_contents($_FILES["docfile"]["tmp_name"]));	
else
   $terms =""; 
 
   
//----------------------------------------------------------------------  Refund ------------------------------------------------------------------------------------

if(isset($_POST['rdRef']))
  $refSt = $_POST['rdRef'];
else
  $refSt = "NO";  

$ref_day = array();
$ref_amt = array();
$ref_type = array();
$ref = "";
$ref_rows = $_POST["txtcncl_refund"];

if($_POST['rdRef']=="Yes")
{
for($i=1; $i<$ref_rows; $i++)
{
if(isset($_POST["txt_ref_amt_".$i]))
  $ref_amt[$i] = addslashes($_POST["txt_ref_amt_".$i]);
if(isset($_POST["txt_ref_type_".$i]))  
  $ref_type[$i] = addslashes($_POST["txt_ref_type_".$i]);
if(isset($_POST["txt_ref_days_".$i]))  
   $ref_day[$i] = addslashes($_POST["txt_ref_days_".$i]);
  $ref .= "Amount of ".$ref_amt[$i]." refunded ".$ref_type[$i]." within ".$ref_day[$i]." working days";
}
 }
 else
 {
 $ref = "";
 } 
//------------------------------------------------------------  Discounts ----------------------------------------------------------------------------------------

$disc_bank = array();
$pay_mode = array();
$card_type = array();
$card_name = array();
$offer_type = array();
$offer_desc = array();
$valid_frm = array();
$valid_till = array();
$disc ="";

$disc_rows = $_POST["txtcncl_disc"];

for($i=1; $i<$disc_rows; $i++)
{
if(isset($_POST["txt_bank_name_".$i]))
  $disc_bank[$i] = addslashes($_POST["txt_bank_name_".$i]);
if(isset($_POST["txt_pay_mode_".$i]))  
  $pay_mode[$i] = addslashes($_POST["txt_pay_mode_".$i]);
if(isset($_POST["txt_card_type_".$i]))  
  $card_type[$i] = addslashes($_POST["txt_card_type_".$i]);
if(isset($_POST["txt_card_name_".$i]))  
  $card_name[$i] = addslashes($_POST["txt_card_name_".$i]);
if(isset($_POST["txt_offer_type_".$i]))  
  $offer_type[$i] = addslashes($_POST["txt_offer_type_".$i]);
if(isset($_POST["txt_offer_desc_".$i]))  
  $offer_desc[$i] = addslashes($_POST["txt_offer_desc_".$i]);
if(isset($_POST["txt_valid_from_".$i]))  
  $valid_frm[$i] = addslashes($_POST["txt_valid_from_".$i]);
if(isset($_POST["txt_valid_till_".$i]))  
  $valid_till[$i] = addslashes($_POST["txt_valid_till_".$i]);
  
  if($card_name[$i] == "Other")
  $card_name[$i] = addslashes($_POST["txt_card_name_oth_".$i]);
  
  $disc .= $i.") Bank Name -".$disc_bank[$i].", Mode of pay- ".$pay_mode[$i].", Card Type- ".$card_type[$i].", Card Name-".$card_name[$i].", Offer type-".$offer_type[$i].", Offer Description-".$offer_desc[$i].", Validity-".$valid_frm[$i].",  Till -".$valid_till[$i]." and ";
}


$pckPostDt = $_POST["pckPostDtFrm"]." to ". $_POST["pckPostDtTo"];

$pckPostAs = $_POST["pckPostStyle"];


//------------------------------------------------------------------------------------------------------------------------------------------------------------------

if(isset($_POST["rdloc"]))
{
if($_POST["rdtype"]=="DOMESTIC")
    $_POST["drpCountry"] = "INDIA";

  $q_pck = "insert into b2b_pck_crt values('".$_SESSION["clientID"]."','".$_SESSION["userEmail"]."','".$_POST["txt_packName"]."','".addslashes($pic1)."','".addslashes($pic2)."','".addslashes($vacThm)."','".addslashes($pck_agend_dtl)."','".addslashes($trvlr)."','".$_POST["rdtype"]."','".$_POST["drpCountry"]."','".$num_loc."','".addslashes($locs)."','".addslashes($dur)."','".addslashes($valid)."','".addslashes($trpDt)."','".addslashes($pckPostDt)."','".addslashes($pckPostAs)."','".addslashes($incl)."','".addslashes($excl)."','".$prc_basedOn."','".$_POST["txt_packCost"]."','".$_POST["drptaxRate"]."','".$_POST["txtCess"]."','".$_POST["txttotalPrice"]."','','','','','','".$_POST["txtNumPack"]."','".$refSt."','".$dedn."','".$ref."','".$terms."','".$disc."','','".$vacId ."','".$agenda."','".$inten."','".date('ymd')."','','','','Active','','')";  
  $res_pck = mysqli_query($conn,$q_pck);
  
  $q_upd_id = "update b2b_pck_crt set pck_id=concat('P',pck_sl,pck_vacId,pck_agenda,pck_hml,'".substr($_SESSION["clientID"],9,10)."','".date('mdy')."') where client_id='".$_SESSION["clientID"]."'";
   
  if($res_pck)
  {
  $res_pck_id= mysqli_query($conn,$q_upd_id);
   if($res_pck_id)
   {
 $q_pck_id ="select pck_id, user_id, client_id from b2b_pck_crt where client_id='".$_SESSION["clientID"]."' order by pck_sl desc limit 1";
  $res_pck_id = mysqli_query($conn,$q_pck_id);
  
  if($res_pck_id)
  {    
   while($row = mysqli_fetch_array($res_pck_id))
     {
	   $_SESSION["PckID"] = $row["pck_id"];
	   $_SESSION["userEmail"] = $row["user_id"];
	   $_SESSION["clientID"] = $row["client_id"];
	 //  echo $_SESSION["PckID"]."----".$_SESSION["userEmail"];
	   include("b2b_User_Session.php");
	  	   
	 }	 
  } 
  $i=0;
  
  //----------------------------------------------------------------- Insert Accomodation ----------------------------------------------------------------------------
 for($i=0; $i<$htl_count; $i++)
  {
  $q_htl_insrt = "insert into b2b_htl_crt values('".$_SESSION["clientID"]."','".$_SESSION["PckID"]."','".$htl_loc_id[$i]."','".$htl_loc[$i]."','".$htl_name[$i]."','".$htl_dur[$i]."','".$str_rate[$i]."','".$htl_room[$i]."','".$htl_occu[$i]."','".$htl_beds[$i]."','".$htl_img[$i]."','".$htl_food[$i]."','".$htl_incl[$i]."','".$htl_excl[$i]."','','')";
   $res_htl_insrt = mysqli_query($conn,$q_htl_insrt);
  // if(!$res_htl_insrt)
    // echo "Error : ".mysqli_error($conn);
   }
  //------------------------------------------------------------------ Insert All Transports ----------------------------------------------------------------------------
 for($i=1; $i<$loc_count; $i++)
  { 
   $q_trv_insrt = "insert into b2b_trnprt values('".$_SESSION["clientID"]."','".$_SESSION["PckID"]."','".$ic_trp."','".$fromDest_onwd."','".$toDest_onwd."','".$frmDest_onwd_mode."','".$on_trf_mns."','".$frmDest_ret."','".$toDest_ret."','".$frmDest_ret_mode."','".$ret_trf_mns."','".$org_loc[$i]."','".$dest_loc[$i]."','".$mode_p[$i]."','".$mns_p[$i]."','".$loc[$i]."','".$mod_L[$i]."','".$mns_L[$i]."')";
   $res_trv_insrt = mysqli_query($conn,$q_trv_insrt);
   }
   
   //-------------------------------------------------------------------  Insert All Attractions -------------------------------------------------------------------
 for($i=1; $i<$attrRows; $i++)
   {
     // $attr_tm_allo[$i] =(int) $attr_arrv_tm[$i] - (int) $attr_strt_tm[$i];
     $q_insrt_attr = "insert into b2b_attr_crt values ('".$_SESSION["clientID"]."','".$_SESSION["PckID"]."','".$attr_day[$i]."','".$attr_loc_id[$i]."','".$attr_loc[$i]."','".$attr_cate[$i]."','".$attr_name[$i]."','".$attr_strt_tm[$i]."','".$attr_arrv_tm[$i]."','".$attr_tm_allo[$i]."')";
	 $res_insrt_attr = mysqli_query($conn,$q_insrt_attr);
   }     
	$pck_crt=true;
	 include("b2b_User_Session.php");
}
}
}
else
{
  echo '<script type="text/javascript">';
  echo 'alert(\'Error: Please select locations.\');';
  echo '</script>';
  
  $crt_Pck_flag = true;
    $q_pck_id ="select  user_id, client_id from b2b_tab where client_id='".$_SESSION["clientID"]."' and user_id='".$_SESSION["userEmail"]."'";
  $res_pck_id = mysqli_query($conn,$q_pck_id);
  if($res_pck_id)
  {
  while($row = mysqli_fetch_array($res_pck_id))
     {
	   $_SESSION["userEmail"] = $row["user_id"];
	   $_SESSION["clientID"] = $row["client_id"];
	   include("b2b_User_Session.php");	  	   
	 }	 
  }
  
    $q_pck_eml ="select user_email, client_id from b2b_tab where client_id='".$_SESSION["clientID"]."' and user_email='".$_SESSION["userEmail"]."'";
  $res_pck_eml = mysqli_query($conn,$q_pck_eml);
  if($res_pck_eml)
  {
  while($row = mysqli_fetch_array($res_pck_eml))
     {
	   $_SESSION["userEmail"] = $row["user_email"];
	   $_SESSION["clientID"] = $row["client_id"];
	   include("b2b_User_Session.php");	  	   
	 }	 
  }
}    
}

if(isset($_POST['btnSubmit_Q']))
{

$quote = true;
$lead_page = true;
$status="";

include("lead_dtls_popup_ajax.php");

//$qID = $_POST["txtQID"];
$lID = $_POST["txtLeadID"];
$wID = $_POST["txtWID"];
$qID  = 'Q'.substr($_POST["txtWID"],1,-6).substr($_SESSION["clientID"],7,10).date('mdy').'';


$Htl_rows = (int)$_POST["txtSug_htl_rows"]-1;
$Trv_rows = (int)$_POST["txtSug_trv_rows"]-1;
$Trvl_rows = (int)$_POST["txtSug_trvl_rows"]-1;
$Req_rows = (int)$_POST["txtSug_othr_rows"]-1;
$Itin_rows = (int)$_POST["txtSug_itin_rows"]-1;

$htl_opt = array();
$htl_loc = array();
$htl_name = array();
$htl_chkIn = array();
$htl_chkout = array();
$htl_rooms = array();
$htl_roomtype = array();
$htl_star = array();
$htl_occ = array();
$htl_food = array();
$htl_price = array();
$htl_dur = array();
$htl_totl = array();

$htl_cmnt = addslashes($_POST["txtSug_htl_cmt"]);

for($i = 2; $i<$Htl_rows; $i++)
{
if($_POST["txtSug_htl_loc_".$i]!="")
{
$htl_opt[$i] = addslashes($_POST["txtSug_htl_opt_".$i]);
$htl_loc[$i] = addslashes($_POST["txtSug_htl_loc_".$i]);
$htl_chkIn[$i] = date('Y-m-d',strtotime($_POST["txtSug_htl_chkin_".$i]));
$htl_chkout[$i] = date('Y-m-d',strtotime($_POST["txtSug_htl_chkout_".$i]));
$htl_star[$i] = addslashes($_POST["txtSug_htl_rate_".$i]);
$htl_roomtype[$i] = addslashes($_POST["txtSug_htl_roomtype_".$i]);
$htl_rooms[$i] = addslashes($_POST["txtSug_htl_room_".$i]);
$htl_occ[$i] = addslashes($_POST["txtSug_htl_occup_".$i]);
$htl_name[$i] = addslashes($_POST["txtSug_htl_name_".$i]);
$htl_food[$i] = addslashes($_POST["txtSug_htl_food_".$i]);
$htl_price[$i] = addslashes($_POST["txtSug_htl_price_".$i]);
$htl_dur[$i] = addslashes($_POST["txtSug_htl_dur_".$i]);
$htl_totl[$i] = addslashes($_POST["txtSug_htl_totl_".$i]);

$q_insrt_sug_htl = "insert into quote_hotel values ('".$lID."','".$qID."','".$htl_opt[$i]."','".$htl_loc[$i] ."','".$htl_chkIn[$i]."','".$htl_chkout[$i]."','".$htl_star[$i]."','".$htl_roomtype[$i]."','".$htl_rooms[$i]."','".$htl_occ[$i]."','".$htl_name[$i]."','".$htl_food[$i]."','".$htl_price[$i]."','".$htl_dur[$i]."','".$htl_totl[$i]."','".$htl_cmnt."');";
$res_sug_htl = mysqli_query($conn,$q_insrt_sug_htl);
}
}


//------------------------------------------------------------- Suggested Travel ----------------------------------------------------------

$trv_type = array();
$trv_frm = array();
$trv_to = array();
$trv_mode = array();
$trv_dtls = array();
$trv_date = array();
$trv_time = array();
$trv_prc = array();
$trv_totl = array();

$trv_cmnt = addslashes($_POST["txtSug_trv_cmt"]);

for($i=2; $i<$Trv_rows; $i++)
{
if($_POST["txtSug_trvON_frm_".$i]!="")
{
$trv_type[$i] = addslashes($_POST["txtSug_trv_Ontype_".$i]);
$trv_frm[$i] = addslashes($_POST["txtSug_trvON_frm_".$i]);
$trv_to[$i] = addslashes($_POST["txtSug_trvON_to_".$i]);
$trv_mode[$i] = addslashes($_POST["txtSug_trvON_mode_".$i]);
$trv_dtls[$i] = addslashes($_POST["txtSug_trvON_dtls_".$i]);
$trv_date[$i] = date('Y-m-d',strtotime($_POST["txtSug_trvON_date_".$i]));
$trv_time[$i] = addslashes($_POST["txtSug_trvON_time_".$i]);
$trv_prc[$i] = addslashes($_POST["txtSug_trvON_tktprc_".$i]);
$trv_totl[$i] = addslashes($_POST["txtSug_trvON_Ttotl_".$i]);

$q_sug_trv = "insert into quote_trpt values('".$lID."','".$qID."','".$trv_type[$i]."','".$trv_frm[$i]."','".$trv_to[$i]."','".$trv_mode[$i]."','".$trv_dtls[$i]."','".$trv_date[$i]."','".$trv_time[$i]."','".$trv_prc[$i]."','".$trv_totl[$i]."','".$trv_cmnt."');";
$res_sug_trv = mysqli_query($conn,$q_sug_trv);
}
}

//------------------------------------------------------------- Suggested Travel local ----------------------------------------------------------


$trvl_loc = array();
$trvl_veh = array();
$trvl_vehName = array();
$trvl_pasn = array();
$trvl_rate = array();
$trvl_dist = array();
$trvl_rtKm = array();
$trvl_totl = array();

$trvl_cmnt = addslashes($_POST["txtSug_trv_cmt"]);

for($i=2; $i<$Trvl_rows; $i++)
{
if($_POST["txtSug_trvON_frm_".$i]!="")
{
$trvl_loc[$i] = addslashes($_POST["txtSug_trvl_loc_".$i]);
$trvl_veh[$i] = addslashes($_POST["txtSug_vehi_".$i]);
$trvl_vehName[$i] = addslashes($_POST["txtSug_Vname_".$i]);
$trvl_pasn[$i] = addslashes($_POST["txtSug_pass_".$i]);
$trvl_rate[$i] = addslashes($_POST["txtSug_rate_".$i]);
$trvl_dist[$i] = addslashes($_POST["txtSug_dist_".$i]);
$trvl_rtKm[$i] = addslashes($_POST["txtSug_addi_".$i]);
$trvl_totl[$i] = addslashes($_POST["txtSug_Vtotl_".$i]);

$q_sug_trvl = "insert into quote_lcl_trvl values('".$lID."','".$qID."','".$trvl_loc[$i]."','".$trvl_veh[$i]."','".$trvl_vehName[$i]."','".$trvl_pasn[$i]."','".$trvl_rate[$i]."','".$trvl_dist[$i]."','".$trvl_rtKm[$i]."','".$trvl_totl[$i]."','".$trvl_cmnt."');";
$res_sug_trvl = mysqli_query($conn,$q_sug_trvl);
}
}


//------------------------------------------------------------- Suggested Other Requirements ----------------------------------------------------------

$req_type = array();
$req_loc = array();
$req_rtDay = array();
$req_days = array();

$req_cmnt = addslashes($_POST["txtSug_req_cmt"]);

for($i=2; $i<$Req_rows; $i++)
{
$req_type[$i] = addslashes($_POST["txtSug_othr_".$i]);
$req_loc[$i] = addslashes($_POST["txtSug_loc_".$i]);
$req_rtDay[$i] = addslashes($_POST["txtSug_rpd_".$i]);
$req_days[$i] = addslashes($_POST["txtSug_noD_".$i]);
$totl_opt1 = addslashes($_POST["txtGrnd_totl_opt1"]);
$totl_opt2 = addslashes($_POST["txtGrnd_totl_opt2"]);

$q_sug_req = "insert into quote_othrs values ('".$lID."','".$qID."','".$req_type[$i]."','".$req_loc[$i]."','".$req_rtDay[$i]."','".$req_days[$i]."','".$totl_opt1."','".$totl_opt2."','".$req_cmnt."');";
$res_sug_req = mysqli_query($conn,$q_sug_req);
}

//------------------------------------------------------------- Suggested Itinerary ----------------------------------------------------------

$itin_loc = array();
$itin_cate = array();
$itin_attr = array();
$itin_date = array();
$itin_day = array();

$itin_cmnt = addslashes($_POST["txtSug_attr_cmnt"]);

for($i=2; $i<$Itin_rows; $i++)
{
$itin_loc[$i] = addslashes($_POST["txtSug_itin_loc_".$i]);
$itin_cate[$i] = addslashes($_POST["txtSug_itin_cate_".$i]);
$itin_attr[$i] = addslashes($_POST["txtSug_itin_attr_".$i]);
$itin_date[$i] = date('Y-m-d',strtotime($_POST["txtSug_itin_date_".$i]));
$itin_day[$i] = addslashes($_POST["txtSug_itin_schd_".$i]);

$q_itin = "insert into quote_itinerary values('".$lID."','".$qID."','".$itin_loc[$i]."','".$itin_cate[$i]."','".$itin_attr[$i]."','".$itin_date[$i]."','".$itin_day[$i]."','".$itin_cmnt."');";
$res_itin = mysqli_query($conn,$q_itin);
}

$q_updt_q = "update cust_trip_trvler set quote_id='".$qID."' where lead_id='".$lID."'";
$res_updt_q = mysqli_query($conn,$q_updt_q);

$ldDate = date('Y-m-d',strtotime($_POST["txtLeadDate"]));
$qDate = date('Y-m-d',strtotime($_POST["txtQDate"]));
$qExpDate = date('Y-m-d',strtotime($_POST["txtQExpDate"]));

$q_locs_ld = "select loc_name from cust_trip_trvler where lead_id='".$lID."'";
$res_ld_loc = mysqli_query($conn,$q_locs_ld);

if($res_ld_loc)
{
while($row = mysqli_fetch_array($res_ld_loc))
{
  $locs = $row["loc_name"];
}

$q_dtls = "insert into quote_dtls values('".$_SESSION["clientID"]."','".$lID."','".$ldDate."','".$locs."','".$qID."','".$qDate."','".$qExpDate."','Response','Responded')";
$res_dtls = mysqli_query($conn,$q_dtls);
if($res_dtls)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success: Response to the lead-'.$lID.' is generated\')';
 echo '</script>';
 
 $q_updt_qrt = "update lead_route_tab set quote_id='".$qID."', quote_date = '".$qDate."', client_ld_status='Responded'  where lead_id='".$lID."' and client_id_b2b='".$_SESSION["clientID"]."'";
 $res_updt_qrt = mysqli_query($conn,$q_updt_qrt);
}
}
}

if(isset($_POST['btnSubmitIncl']))
{
include("b2b_User_Session.php");
$loc = array();
$htl = array();
$incl = array();
$excl = array();

$pid = $_POST["txtID"];

$count = $_POST["txtHtl_rev"];

//echo $count."----".$pid;

for($i=1; $i<=$count; $i++)
{
  $loc[0]="";
  $htl[0]="";
  $incl[0]="";
  $excl[0]="";
  
  $loc[$i] = $_POST["txtRev_loc_".$i];
  $htl[$i] = $_POST["txtRev_htl_".$i];
  
  if(isset($_POST["chkBf_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkBf_rev_incl_".$i].", ";
 if(isset($_POST["chkLun_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkLun_rev_incl_".$i].", ";
 if(isset($_POST["chkDin_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkDin_rev_incl_".$i].", ";
 if(isset($_POST["chkLndry_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkLndry_rev_incl_".$i].", ";
 if(isset($_POST["chkSPA_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkSPA_rev_incl_".$i].", ";
 if(isset($_POST["chkAlco_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkAlco_rev_incl_".$i].", ";
 if(isset($_POST["chkWifi_rev_incl_".$i]))
    $incl[$i] .= $_POST["chkWifi_rev_incl_".$i].", ";

 if(isset($_POST["chkBf_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkBf_rev_excl_".$i].", ";
 if(isset($_POST["chkLun_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkLun_rev_excl_".$i].", ";
 if(isset($_POST["chkDinn_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkDinn_rev_excl_".$i].", ";
 if(isset($_POST["chkLndry_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkLndry_rev_excl_".$i].", ";
 if(isset($_POST["chkSPA_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkSPA_rev_excl_".$i].", ";
 if(isset($_POST["chkAlco_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkAlco_rev_excl_".$i].", ";
if(isset($_POST["chkWifi_rev_excl_".$i]))
    $excl[$i] .= $_POST["chkWifi_rev_excl_".$i].", ";											

 $updt_incl = "update b2b_htl_crt set revised_incl='".$incl[$i]."', revised_excl='".$excl[$i]."' where loc_name='".$loc[$i]."' and htl_name='".$htl[$i]."' and pck_id='".$pid."'"; 
 $res_incl = mysqli_query($conn,$updt_incl);
 if($res_incl)
 {
  echo '<script type="text/javascript">';
  echo 'alert(\'Success: Exclusions and Inclusions revised\')';
  echo '</script>';
 }
 else
 {
   echo mysqli_error($conn);
 }
}
}

if(isset($_POST['btnRev_offers']))
{
$disc_bank_rev = array();
$pay_mode_rev = array();
$card_type_rev = array();
$card_name_rev = array();
$offer_type_rev = array();
$offer_desc_rev = array();
$valid_frm_rev = array();
$valid_till_rev = array();
$disc_rev ="";

$disc_rows_rev = $_POST["txtOff_rev"];
$pid = $_POST["txtID"];

for($i=2; $i<=$disc_rows_rev; $i++)
{
$j=$i-1;
if(isset($_POST["txt_bank_name_rev_".$i]))
  $disc_bank_rev[$i] = addslashes($_POST["txt_bank_name_rev_".$i]);
if(isset($_POST["txt_pay_mode_rev_".$i]))  
  $pay_mode_rev[$i] = addslashes($_POST["txt_pay_mode_rev_".$i]);
if(isset($_POST["txt_card_type_rev_".$i]))  
  $card_type_rev[$i] = addslashes($_POST["txt_card_type_rev_".$i]);
if(isset($_POST["txt_card_name_rev_".$i]))  
  $card_name_rev[$i] = addslashes($_POST["txt_card_name_rev_".$i]);
if(isset($_POST["txt_offer_type_rev_".$i]))  
  $offer_type_rev[$i] = addslashes($_POST["txt_offer_type_rev_".$i]);
if(isset($_POST["txt_offer_desc_rev_".$i]))  
  $offer_desc_rev[$i] = addslashes($_POST["txt_offer_desc_rev_".$i]);
if(isset($_POST["txt_valid_from_rev_".$i]))  
  $valid_frm_rev[$i] = addslashes($_POST["txt_valid_from_rev_".$i]);
if(isset($_POST["txt_valid_till_rev_".$i]))  
  $valid_till_rev[$i] = addslashes($_POST["txt_valid_till_rev_".$i]);
  
  if($card_name_rev[$i] == "Other")
  $card_name_rev[$i] = addslashes($_POST["txt_card_name_oth_rev_".$i]);
  
  $disc_rev .= $j.") Bank Name -".$disc_bank_rev[$i].", Mode of pay- ".$pay_mode_rev[$i].", Card Type- ".$card_type_rev[$i].", Card Name-".$card_name_rev[$i].", Offer type-".$offer_type_rev[$i].", Offer Description-".$offer_desc_rev[$i].", Validity-".$valid_frm_rev[$i].",  Till -".$valid_till_rev[$i]." and ";
  
  $updt_off = "update b2b_pck_crt set revised_offers='".$disc_rev."' where pck_id='".$pid."'";
  mysqli_query($conn,$updt_off);
}
}

//------------------------------------------------------------  Modify Package ---------------------------------------------------------------------------------------------

if(isset($_POST['btnSubPck_mod']))
{

$leads_page=true;

$_GET["status"]=""; 

$vacThm = addslashes($_POST["txtMod_theme"]);

$vId = array();

$vId = explode(", ",$vacThm);

$q_vid = "select vac_id from vac_type where vac_title ='".$vId[0]."'";
$res_vid = mysqli_query($conn,$q_vid);
$has_row = mysqli_num_rows($res_vid);
if($res_vid)
{
 while($row = mysqli_fetch_array($res_vid))
  {
   $vacId = $row["vac_id"];
  }
}
else
 echo "Error :".mysqli_error($conn);
 
 
if($_FILES["Mod_pckImg1"]["error"] != 4 && $_FILES["Mod_pckImg1"]["tmp_name"]!="")
{ 
$pic1 = addslashes(file_get_contents($_FILES["Mod_pckImg1"]["tmp_name"]));	
 }
 else
  $pic1 ="";


if($_FILES["Mod_pckImg2"]["error"] != 4 && $_FILES["Mod_pckImg2"]["tmp_name"]!="")
{ 
$pic2 = addslashes(file_get_contents($_FILES["Mod_pckImg2"]["tmp_name"]));	
 }
 else
  $pic2 ="";  



if(isset($_POST["rdMod_multi"]))
  $agenda = 'M';
else if(isset($_POST["chkMod_sig"])) 
$agenda = 'S';
else if(isset($_POST["chkMod_act"])) 
$agenda = 'A';
else if(isset($_POST["chkMod_rest"]))
$agenda ='R';

$pck_agend_dtl = $_POST["txtMod_agenda"];


if(isset($_POST["rdInt_Mod"]))
$inten =$_POST["rdInt_Mod"];

if(isset($_POST["chkSingle"]) && isset($_POST["chkage45"]))
$trvlr .= $_POST["chkSingle"].$_POST["chkage45"].", ";

if(isset($_POST["chkSingle"]) && isset($_POST["chkage45plus"]))
$trvlr .= $_POST["chkSingle"].$_POST["chkage45plus"].", ";

if(isset($_POST["chkCouple"]) && isset($_POST["chkage45"]))
$trvlr .= $_POST["chkCouple"].$_POST["chkage45"].", ";

if(isset($_POST["chkCouple"]) && isset($_POST["chkage45plus"]))
$trvlr .= $_POST["chkCouple"].$_POST["chkage45plus"].", ";

if(isset($_POST["chkGroup"]) && isset($_POST["chkage45"]))
$trvlr .=$_POST["chkGroup"].$_POST["chkage45"].", ";

if(isset($_POST["chkGroup"]) && isset($_POST["chkage45plus"]))
$trvlr .=$_POST["chkGroup"].$_POST["chkage45plus"].", ";

if($_POST["txtMod_trvler"]!="" && !isset($_POST["chkSingle"]) && !isset($_POST["chkCouple"]) && !isset($_POST["chkGroup"]) && !isset($_POST["chkFamilykid"]) && !isset($_POST["chkGroupkid"]))
{
$trvlr = $_POST["txtMod_trvler"];
}

if(isset($_POST["chkFamilykid"]))
{
$trvlr .=$_POST["chkFamilykid"].", ";
  
  if(isset($_POST["chkkid"]))
  $trvlr .=$_POST["chkchild"].", ";
  
   if(isset($_POST["chkchild"]))
  $trvlr .=$_POST["chkkid"].", ";
  
   if(isset($_POST["chkchildplus"]))
  $trvlr .=$_POST["chkchildplus"];
}

if(isset($_POST["chkGroupkid"]))
{
$trvlr .=$_POST["chkGroupkid"].", ";
  
  if(isset($_POST["chkkid"]))
  $trvlr .=$_POST["chkchild"].", ";
  
   if(isset($_POST["chkchild"]))
  $trvlr .=$_POST["chkkid"].", ";
  
   if(isset($_POST["chkchildplus"]))
  $trvlr .=$_POST["chkchildplus"].", ";
}
  
$dur = $_POST["txtMode_dur"];
$valid = $_POST["txtMod_valid_frm"]." to ".$_POST["txtMod_valid_till"];

$incl = $_POST["txtMod_incls"];
$excl = $_POST["txtMod_excls"];

$num_loc = $_POST["txtMod_numLoc"];
$prc_basedOn = $_POST["txtMod_based"];
$trpDt = $_POST["txtMod_trpDt"];

if(isset($_POST["rdInt_Mod"]))
$inten = $_POST["rdInt_Mod"];
else
{
if($_POST["txtMod_inten"] == "Medium")
 $inten ="M" ;
if($_POST["txtMod_inten"] == "High")
 $inten ="H" ;
 if($_POST["txtMod_inten"] == "Low")
 $inten ="L" ; 
 }
 
$pck_agend_dtl = $_POST["txtMod_agenda"];
if($_POST["txtMod_agenda"] == "Sightsee")
$agenda = "S" ;
else if($_POST["txtMod_agenda"] == "Activities")
$agenda = "A" ;
else if($_POST["txtMod_agenda"] == "Rest-Relaxation")
$agenda = "R" ;
else
$agenda ="M";


if($_POST["txtTypes"]=="DOMESTIC")
    $country = "INDIA";
else
 $country=$_POST["drpMod_cntry"];
 
 
$pckPostDt = $_POST["txtMod_postDtFrm"]." to ". $_POST["txtMod_postDtTo"];
$dtValid = $_POST["txtMod_valid_frm"]." to ".$_POST["txtMod_valid_till"];
if(isset($_POST["rdShown_Mod"]))
$pckShown = $_POST["rdShown_Mod"];
else
$pckShown = $_POST["txtPckShown"];

//-------------------------------------------------------------------- Modify Hotel Values ---------------------------------------------------------------------

$htl_loc = array();
$str_rate = array();
$htl_dur = array();
$htl_name= array();
$htl_room = array();
$htl_occu = array();
$htl_beds = array();
$htl_img = array();
$htl_loc_id = array();
$htl_incl = array();
$htl_excl = array();
$htl_opt = array();
$htl_food = array();

$htl_Rows = $_POST["txtHtlMod_rows"];

$htl_count=0;
$k = 0;
for($i=1; $i<=$htl_Rows; $i++)
{
if($_POST["txtHtlMod_htl_".$i]!="")
{
$k++;
$htl_count++;
$htl_loc[$k] = addslashes($_POST["txtHtlMod_loc_".$i]);
$htl_name[$k] = addslashes($_POST["txtHtlMod_htl_".$i]);
$str_rate[$k] = addslashes($_POST["txtHtlMod_star_".$i]);
$htl_dur[$k] = addslashes($_POST["txtHtlMod_dur_".$i]);
$htl_room[$k] = $_POST["txtHtlMod_room_".$i];
$htl_occu[$k] = addslashes($_POST["txtHtlMod_occ_".$i]);
$htl_beds[$k] = $_POST["txtHtlMod_bed_".$i];
$htl_food[$k] = $_POST["txtHtlMod_food_".$i];
$htl_incl[$k] = addslashes($_POST["txtHtlMod_incl_".$i]);
$htl_excl[$k] = addslashes($_POST["txtHtlMod_excl_".$i]);
if(isset($_FILES["HtlImg_".$i]["error"]))
   if($_FILES["HtlImg_".$i]["error"]!=4)
     $htl_img[$k] = addslashes(file_get_contents($_FILES["HtlImg_".$i]["tmp_name"]));
else
    $htl_img[$k]="";
else
    $htl_img[$k]="";	
	
}

}


for($i=0; $i<$htl_count; $i++)
{
$q_loc_id = "select locId from user_destinations where locName='".$htl_loc[$i]."'";
$res_loc_id = mysqli_query($con,$q_loc_id);
if($res_loc_id)
{
while($row = mysqli_fetch_array($res_loc_id))
{
  $htl_loc_id[$i] = $row["locId"];
}
}
}



//---------------------------------------------------------------- Modify  Transport ---------------------------------------------------------------------

if($_POST["txtMod_trp_OWfrm"] == "" && $_POST["txtMod_trp_Rtfrm"]=="")
$ic_trp ="None";
else if($_POST["txtMod_trp_OWfrm"]=="" || $_POST["txtMod_trp_Rtfrm"]=="")
$ic_trp = "OneWay";
else if($_POST["txtMod_trp_OWfrm"]!="" && $_POST["txtMod_trp_Rtfrm"]!="")
$ic_trp = "TwoWay";

if(isset($_POST["txtMod_trp_OWfrm"]))
$fromDest_onwd =  $_POST["txtMod_trp_OWfrm"];
else
$fromDest_onwd = "";
if(isset($_POST["txtMod_trp_OWto"]))
$toDest_onwd =  $_POST["txtMod_trp_OWto"];
else
$toDest_onwd="";
if(isset($_POST["txtMod_trp_OWmode"]))
$frmDest_onwd_mode = $_POST["txtMod_trp_OWmode"];
else
$frmDest_onwd_mode="";
if(isset($_POST["txtMod_trp_OWmeans"]))
  $on_trf_mns = $_POST["txtMod_trp_OWmeans"];
else 
    $on_trf_mns = "";

if(isset($_POST["txtMod_trp_Rtfrm"] ))
$frmDest_ret = $_POST["txtMod_trp_Rtfrm"] ;
else
$frmDest_ret ="";
if(isset($_POST["txtMod_trp_Rtto"]))
$toDest_ret = $_POST["txtMod_trp_Rtto"];
else
$toDest_ret="";
if(isset($_POST["txtMod_trp_Rtmode"]))
$frmDest_ret_mode = $_POST["txtMod_trp_Rtmode"];
else
 $frmDest_ret_mode = "";
if(isset($_POST["txtMod_trp_Rtmeans"]))
$ret_trf_mns = $_POST["txtMod_trp_Rtmeans"];
else 
    $ret_trf_mns = "";


$org_loc = array();
$dest_loc = array();
$mode_p = array();
$mns_p = array();

$trp_count = $_POST["txtp2pMod_rows"];

for($i=1; $i<=$trp_count; $i++)
{
if($_POST['txtMod_origin_1']!="")
{
if(isset($_POST["txtMod_origin_".$i]))
$org_loc[$i] = $_POST["txtMod_origin_".$i];
else
$org_loc[$i]="";
if(isset($_POST["txtMod_dest_".$i]))
$dest_loc[$i] = $_POST["txtMod_dest_".$i];
else
$dest_loc[$i]="";
if(isset($_POST["txtMod_mode_".$i]))
$mode_p[$i] = $_POST["txtMod_mode_".$i];
else
$mode_p[$i]="";
if(isset($_POST["txtMod_means_".$i]))
$mns_p[$i] = $_POST["txtMod_means_".$i];
else
$mns_p[$i]="";
}
else
{
$org_loc[$i]="";
$dest_loc[$i]="";
$mode_p[$i]="";
$mns_p[$i]="";
}
}

$loc = array();
$mod_L = array();
$mns_L = array();

for($i=1; $i<=$trp_count; $i++)
{
if($_POST["txtMod_lloc_1"]!="")
{
if(isset($_POST["txtMod_lloc_".$i]))
$loc[$i] = $_POST["txtMod_lloc_".$i];
else
$loc[$i]="";
if(isset($_POST["txtMod_lmode_".$i]))
$mod_L[$i] = $_POST["txtMod_lmode_".$i];
else
$mod_L[$i]="";
if(isset($_POST["txtMod_lmeans_".$i]))
$mns_L[$i] = $_POST["txtMod_lmeans_".$i];
else
$mns_L[$i]=""; 
}
else
{
$loc[$i]="";
$mod_L[$i]="";
$mns_L[$i]="";
}
}

//------------------------------------------------------------------------ Modify  Attraction ----------------------------------------------------------------------------

$attr_day = array();
$attr_loc = array();
$attr_name = array();
$attr_cate = array();
$attr_strt_tm = array();
$attr_arrv_tm = array();
$attr_tm_allo = array();
$attr_loc_id = array();

$attrRows = $_POST["txtAttrmod_rows"];

for($i=1; $i<=$attrRows; $i++)
{
if(isset($_POST["txtAttrMod_day_".$i]))
  $attr_day[$i] = $_POST["txtAttrMod_day_".$i];
if(isset($_POST["txtAttrMod_loc_".$i]))  
$attr_loc[$i] = $_POST["txtAttrMod_loc_".$i];
if(isset($_POST["drpAttrMod_cate_".$i]))
$attr_cate[$i] = $_POST["drpAttrMod_cate_".$i];
if(isset($_POST["txtAttrMod_attr_".$i]))
$attr_name[$i] = $_POST["txtAttrMod_attr_".$i];
if(isset($_POST["txtAttrMod_str_".$i]))
$attr_strt_tm[$i] = $_POST["txtAttrMod_str_".$i];
if(isset($_POST["txtAttrMod_arv_".$i]))
$attr_arrv_tm[$i] = $_POST["txtAttrMod_arv_".$i];
if(isset($_POST["txtAttrMod_tm_".$i]))
$attr_tm_allo[$i] = $_POST["txtAttrMod_tm_".$i];

$q_loc_id = "select locId from user_destinations where locName='".$attr_loc[$i]."'";
$res_loc_id = mysqli_query($con,$q_loc_id);
if($res_loc_id)
{
while($row = mysqli_fetch_array($res_loc_id))
{
  $attr_loc_id[$i] = $row["locId"];
}
}
}

// -------------------------------------------------------------- Modify Deductions ------------------------------------------------------------------------------------------

$dedn_day = array();
$dedn_rate = array();
$dedn = "";
$dedu_rows = $_POST["txtdedcMod_rows"];

if($_POST['txt_cncl_rateM_2']!="")
{
for($i=2; $i<=$dedu_rows; $i++)
{
if(isset($_POST["txt_cncl_dayM_".$i]))
  $dedn_day[$i] = addslashes($_POST["txt_cncl_dayM_".$i]);
if(isset($_POST["txt_cncl_rateM_".$i]))  
  $dedn_rate[$i] = addslashes($_POST["txt_cncl_rateM_".$i]);
  $dedn .= $dedn_rate[$i]." - ".$dedn_day[$i].", ";
}
} 
else if($_POST["txtMod_prev_dedc"]!="")
{
$dedn = $_POST["txtMod_prev_dedc"];
}
else
{ 
 $dedn ="";
} 

//--------------------------------------------------------------------  Terms & Conditions --------------------------------------------------->

if($_POST["txtATerms"] !="")
$terms = $_POST["txtATerms"];
else if($_FILES["docfile"]["error"] != 4 && $_FILES["docfile"]["tmp_name"]!="")
      $terms = addslashes(file_get_contents($_FILES["docfile"]["tmp_name"]));	
else
   $terms =""; 
 
   
//---------------------------------------------------------------------- Modify Refund ------------------------------------------------------------------------------------

$ref_day = array();
$ref_amt = array();
$ref_type = array();
$ref = "";
$ref_rows = $_POST["txtrefMod_rows"];

if($_POST['txt_ref_typeM_2']!="")
{
$refSt="Yes";
for($i=2; $i<=$ref_rows; $i++)
{
if(isset($_POST["txt_ref_amtM_".$i]))
  $ref_amt[$i] = addslashes($_POST["txt_ref_amtM_".$i]);
if(isset($_POST["txt_ref_typeM_".$i]))  
  $ref_type[$i] = addslashes($_POST["txt_ref_typeM_".$i]);
if(isset($_POST["txt_ref_daysM_".$i]))  
   $ref_day[$i] = addslashes($_POST["txt_ref_daysM_".$i]);
  $ref .= "Amount of ".$ref_amt[$i]." refunded ".$ref_type[$i]." within ".$ref_day[$i]." working days";
}
 }
 else if($_POST["txtMod_prev_ref"]!="")
 {
 $refSt="Yes";
  $ref = $_POST["txtMod_prev_ref"];
 } 
 else
 {
 $ref ="None";
 $refSt="No";
 }


//------------------------------------------------------------Modify  Discounts ----------------------------------------------------------------------------------------

$disc_bank = array();
$pay_mode = array();
$card_type = array();
$card_name = array();
$offer_type = array();
$offer_desc = array();
$valid_frm = array();
$valid_till = array();
$disc ="";

$disc_rows = $_POST["txtoffMod_rows"];

if($_POST["txt_bank_nameM_1"]!="")
{
for($i=2; $i<=$disc_rows; $i++)
{
if(isset($_POST["txt_bank_nameM_".$i]))
  $disc_bank[$i] = addslashes($_POST["txt_bank_nameM_".$i]);
if(isset($_POST["txt_pay_modeM_".$i]))  
  $pay_mode[$i] = addslashes($_POST["txt_pay_modeM_".$i]);
if(isset($_POST["txt_card_typeM_".$i]))  
  $card_type[$i] = addslashes($_POST["txt_card_typeM_".$i]);
if(isset($_POST["txt_card_nameM_".$i]))  
  $card_name[$i] = addslashes($_POST["txt_card_nameM_".$i]);
if(isset($_POST["txt_offer_typeM_".$i]))  
  $offer_type[$i] = addslashes($_POST["txt_offer_typeM_".$i]);
if(isset($_POST["txt_offer_descM_".$i]))  
  $offer_desc[$i] = addslashes($_POST["txt_offer_descM_".$i]);
if(isset($_POST["txt_valid_fromM_".$i]))  
  $valid_frm[$i] = addslashes($_POST["txt_valid_fromM_".$i]);
if(isset($_POST["txt_valid_tillM_".$i]))  
  $valid_till[$i] = addslashes($_POST["txt_valid_tillM_".$i]);
  
  if($card_name[$i] == "Other")
  $card_name[$i] = addslashes($_POST["txt_card_name_othM_".$i]);
  
  $disc .= $i.") Bank Name -".$disc_bank[$i].", Mode of pay- ".$pay_mode[$i].", Card Type- ".$card_type[$i].", Card Name-".$card_name[$i].", Offer type-".$offer_type[$i].", Offer Description-".$offer_desc[$i].", Validity-".$valid_frm[$i].",  Till -".$valid_till[$i]." and ";
}
}
else if($_POST["txtMod_prev_offers"]!="")
{ 
  $disc .= $_POST["txtMod_prev_offers"];
}
else
{
$disc ="None";
}  


//----------------------------------------------------  Modify Store Package  ------------------------------------------------------------------------------------------
	

  $q_pck = "insert into b2b_pck_crt values('".$_SESSION["clientID"]."','".$_SESSION["userEmail"]."','".$_POST["txtMod_pckName"]."','".addslashes($pic1)."','".addslashes($pic2)."','".addslashes($_POST["txtMod_theme"])."','".addslashes($pck_agend_dtl)."','".addslashes($trvlr)."','".$_POST["rdlocType"]."','".$country."','".$num_loc."','".addslashes($_POST["txtMod_loc"])."','".addslashes($_POST["txtMode_dur"])."','".addslashes($dtValid)."','".addslashes($_POST["txtMod_trpDt"])."','".addslashes($pckPostDt)."','".addslashes($pckShown)."','".addslashes($incl)."','".addslashes($excl)."','".$prc_basedOn."','".$_POST["txt_packCost"]."','".$_POST["drptaxRate"]."','".$_POST["txtCess"]."','".$_POST["txttotalPrice"]."','','','','','','".$_POST["txtNumPack"]."','".$refSt."','".$dedn."','".$ref."','".$terms."','".$disc."','','".$vacId ."','".$agenda."','".$inten."','".date('ymd')."','','','','Active','','')";  
  $res_pck = mysqli_query($conn,$q_pck);
  
  $q_upd_id = "update b2b_pck_crt set pck_id=concat('P',pck_sl,pck_vacId,pck_agenda,pck_hml,'".substr($_SESSION["clientID"],9,10)."','".date('mdy')."') where client_id='".$_SESSION["clientID"]."' and pck_name='".$_POST["txtMod_pckName"]."' and pck_date='".date('Y-m-d')."'";
   
  if($res_pck)
  {
  $res_pck_id= mysqli_query($conn,$q_upd_id);
   if($res_pck_id)
   {
 $q_pck_id ="select pck_id, user_id, client_id from b2b_pck_crt where client_id='".$_SESSION["clientID"]."' order by pck_sl desc limit 1";
  $res_pck_id = mysqli_query($conn,$q_pck_id);
  
  if($res_pck_id)
  {    
   while($row = mysqli_fetch_array($res_pck_id))
     {
	   $_SESSION["NewID"] = $row["pck_id"];
	   $_SESSION["userEmail"] = $row["user_id"];
	   $_SESSION["clientID"] = $row["client_id"];
	 //  echo $_SESSION["PckID"]."----".$_SESSION["userEmail"];
	   include("b2b_User_Session.php");
	  	   
	 }	 
  } 

  $i=0;
  
  //-----------------------------------------------------------------Modify Insert Accomodation ----------------------------------------------------------------------------
 for($i=1; $i<=$htl_count; $i++)
  {
  $q_htl_insrt = "insert into b2b_htl_crt values('".$_SESSION["clientID"]."','".$_SESSION["NewID"]."','".$htl_loc_id[$i]."','".$htl_loc[$i]."','".$htl_name[$i]."','".$htl_dur[$i]."','".$str_rate[$i]."','".$htl_room[$i]."','".$htl_occu[$i]."','".$htl_beds[$i]."','".$htl_img[$i]."','".$htl_food[$i]."','".$htl_incl[$i]."','".$htl_excl[$i]."','','')";
   $res_htl_insrt = mysqli_query($conn,$q_htl_insrt);
  // if(!$res_htl_insrt)
    // echo "Error : ".mysqli_error($conn);
   }
  //------------------------------------------------------------------Modify Insert All Transports ----------------------------------------------------------------------------
 for($i=1; $i<$trp_count; $i++)
  { 
   $q_trv_insrt = "insert into b2b_trnprt values('".$_SESSION["clientID"]."','".$_SESSION["NewID"]."','".$ic_trp."','".$fromDest_onwd."','".$toDest_onwd."','".$frmDest_onwd_mode."','".$on_trf_mns."','".$frmDest_ret."','".$toDest_ret."','".$frmDest_ret_mode."','".$ret_trf_mns."','".$org_loc[$i]."','".$dest_loc[$i]."','".$mode_p[$i]."','".$mns_p[$i]."','".$loc[$i]."','".$mod_L[$i]."','".$mns_L[$i]."')";
   $res_trv_insrt = mysqli_query($conn,$q_trv_insrt);
   if(!$res_trv_insrt)
     echo "Error :".mysqli_error($conn);
   }
   
   //-------------------------------------------------------------------Modify  Insert All Attractions -------------------------------------------------------------------
 for($i=1; $i<$attrRows; $i++)
   {
     // $attr_tm_allo[$i] =(int) $attr_arrv_tm[$i] - (int) $attr_strt_tm[$i];
     $q_insrt_attr = "insert into b2b_attr_crt values ('".$_SESSION["clientID"]."','".$_SESSION["NewID"]."','".$attr_day[$i]."','".$attr_loc_id[$i]."','".$attr_loc[$i]."','".$attr_cate[$i]."','".$attr_name[$i]."','".$attr_strt_tm[$i]."','".$attr_arrv_tm[$i]."','".$attr_tm_allo[$i]."')";
	 $res_insrt_attr = mysqli_query($conn,$q_insrt_attr);
   }     
	 include("b2b_User_Session.php");
  }
  }

else
{
echo "Error : ".mysqli_error($conn);
  echo '<script type="text/javascript">';
  echo 'alert(\'Error: Please select locations.\');';
  echo '</script>';
}    
}



?>
