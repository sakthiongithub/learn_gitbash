<?php
include("PHP_Connection.php");
$enqFrm = false;
$durChk = true;
$trvDts = false;







if(isset($_POST['btnSub_custm_frm_abr']))
{
$trvlr = $_POST["rdtravel_abr"];

if($_POST["rdtravel_abr"]=="Single" || $_POST["rdtravel_abr"]=="Couple" || $_POST["rdtravel_abr"] =="Group")
{
 if(isset($_POST["chkageL45_abr"]))
  $trvlr .=$_POST["chkageL45_abr"].", ";
 if(isset($_POST["chkageM45_abr"]))
  $trvlr .=$_POST["chkageM45_abr"].", "; 
}

if($_POST["rdtravel_abr"]=="Family+Kids" || $_POST["rdtravel_abr"]=="Group+Kids")
{
  if(isset($_POST["chkkid_abr"]))
  $trvlr .=$_POST["chkkid_abr"].", ";
  
   if(isset($_POST["chkchild_abr"]))
  $trvlr .=$_POST["chkchild_abr"].", ";
  
   if(isset($_POST["chkchildplus_abr"]))
  $trvlr .=$_POST["chkchildplus_abr"];
}

if($_POST["drp_SelDt"]!="")
$trvDt = addslashes($_POST["drp_SelDt"]);
else
  $trvDt = $_POST["txtfrmDt"]." to ".$_POST["txtToDt"];
  
$locs = addslashes($_POST["txtAlocs"]);  

$gen = $_POST["chkgen_abr"];
  if(isset($_POST["rdLocType"]))
  $rdlocType=$_POST["rdLocType"];
  else
  $rdlocType="";  

if($_POST["txtemails_abr"]!="")
{
 $q_sub_abr = "insert into build_trip_query values('','', '".addslashes($_POST["rd_abr"])."', '".addslashes($_POST["txtcCity"])."', '".addslashes($_POST["rdmode"])."', '".$trvlr."', '".$gen."', '".addslashes($_POST["drpDur_abr"])."', '".addslashes($_POST["rdLocType"])."','".$_POST["drpNumloc"]."', '".$locs."', '".addslashes($trvDt)."', '".addslashes($_POST["txtemails_abr"])."', '".addslashes($_POST["txtphs_abr"])."', '".addslashes($_POST["txtspl_requirements_abr"])."','','','','Active','','".date('Y-m-d')."')";
 $res_sub_abr = mysqli_query($conn,$q_sub_abr);
 if($res_sub_abr)
 {
   echo '<script type="text/javascript">';
   echo 'show_block(\'div_CustomThanku\');';
    echo 'hide_block(\'div_travelDates\');';
   echo '</script>';
   
   $q_updt_abr = "update build_trip_query set Enq_ID=concat('E',slNo,'".date('dmy')."') where email_id='".$_POST["txtemails_abr"]."'";
   $res_updt_abr = mysqli_query($conn,$q_updt_abr);
   
    $sel_enqID_abr = "select enq_id from build_trip_query where email_id='".$_POST["txtemails"]."'";
   $res_enqID_abr = mysqli_query($conn,$sel_enqID_abr);
   while($r = mysqli_fetch_array($res_enqID_abr))
   {
      $enqID = $r["Enq_ID"];
   }
}
  else
   {
   echo '<script type="text/javascript">';
   echo 'alert(\'Error : \');';
   echo '</script>';
   } 
}
 
}


if(isset($_POST["btnSub_custm_frm"]))
{
if($_POST["drp_SelDt"]!="")
$trvDt = $_POST["drp_SelDt"];
else if( $_POST["txtfrmDt"]!="" || $_POST["txtToDt"]!="")
  $trvDt = $_POST["txtfrmDt"]." to ".$_POST["txtToDt"];
else
  $trvDt="";  

$trvlr = $_POST["rdtravel"];

if($_POST["rdtravel"]=="Single" || $_POST["rdtravel"]=="Couple" || $_POST["rdtravel"]=="Group")
{
 if(isset($_POST["chkage45"]))
  $trvlr .=$_POST["chkage45"].", ";
}


if($_POST["rdtravel"]="Family+Kids" || $_POST["rdtravel"]="Group+Kids")
{
  if(isset($_POST["chkkid"]))
  $trvlr .=$_POST["chkkid"].", ";
  
   if(isset($_POST["chkchild"]))
  $trvlr .=$_POST["chkchild"].", ";
  
   if(isset($_POST["chkchildplus"]))
  $trvlr .=$_POST["chkchildplus"];
}

if($_POST["drpSiglLoc"]!="0")
{
  $locs = $_POST["drpSiglLoc"];
}
else
  $locs = $_POST["txtAlocs"]; 
  
  if(isset($_POST["rdLocType"]))
  $rdlocType=$_POST["rdLocType"];
  else
  $rdlocType="";  
  
  $gen = $_POST["chkgen"];

 $q_sub = "insert into build_trip_query values('','', '".$_POST["rd"]."', '".$_POST["drpcCity"]."', '".$_POST["rdmode"]."', '".$trvlr."', '".$gen."', '".$_POST["drpDur"]."', '".$rdlocType."','".$_POST["drpNumloc"]."', '', '".$trvDt."', '".$_POST["txtemails"]."', '".$_POST["txtphs"]."', '".$_POST["txtspl_requirements"]."','','','','Active','','".date('Y-m-d')."')";
 $res_sub = mysqli_query($conn,$q_sub);
if($res_sub)
 {
   echo '<script type="text/javascript">';
   echo 'show_block(\'div_CustomThanku\');';
    echo 'hide_block(\'div_travelDates\');';
   echo '</script>';
   
   $enqFrm = true;
   
   $q_updt = "update build_trip_query set Enq_ID=concat('E',slNo,'".date('dmy')."') where email_id='".$_POST["txtemails"]."'";
   $res_updt = mysqli_query($conn,$q_updt);
   
   $sel_enqID = "select enq_id from build_trip_query where email_id='".$_POST["txtemails"]."'";
   $res_enqID = mysqli_query($conn,$sel_enqID);
   while($r = mysqli_fetch_array($res_enqID))
   {
      $enqID = $r["enq_id"];
   }
   
 }
  else
   {
    echo '<script type="text/javascript">';
   echo 'alert(\'Error : \');';
   echo '</script>';
   } 
}


?>