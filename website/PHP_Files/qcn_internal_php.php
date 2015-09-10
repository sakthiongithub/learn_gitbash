<?php

include("PHP_Connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
  session_start();


$thnk_reg = false;
$reset="";

  $pros = 0;
  $q_reg=0;
  $q_oneT=0;
  $act = 0 ;
 $l=0;
 $pck_id=""; 
 $trxn_id="";
  $pck_prc="";
   $percdedt="";
    $book_cost="";
	$dept_dt="";
	$daysprior="";
	$dedt ="";

//-------------------------------------  User Register ------------------------------------------

$flag_reg=false;
$txtId="";
$txtName="";
$txtUser="";
$txtgreen="";
$txtMonth="";
$txtDay="";
$txtYr="";
$txtGen="";
$txtpwd="";
$txtAlt="";
$txtmob="";
$txtLoc="";
$txtState="";
$txtCountry="";
$txtPin="";
$txtRole_user="";
$exists="";

$chkEml="";
$chkLog="";
$chkSocial="";
$chkAdmin="";
$chkLead="";
$chkPcks="";
$chkEnq="";
$chkPay="";
$chkCancel="";
$chkReg="";
$flag_reg = false;

$post_eml = "NO";
  $post_logact = "NO";
  $post_social ="NO";
  $post_admin = "NO";
  $post_ld_qt = "NO";
  $post_pck ="NO";
  $post_enq ="NO";
  $post_pay = "NO";
  $post_cncl ="NO";
  $post_reg = "NO";


if(isset($_POST['btnRegUser']))
{
  include("b2e_User_Session.php");
 $post_log=true;
 $flag_reg = true;
 
if(!isset($_POST["chk_eml"]))
 $_POST["chk_eml"]= "NO";
 
if(!isset($_POST["chk_log"]))
 $_POST["chk_log"] ="NO";
 
if(!isset($_POST["chk_social"]))
 $_POST["chk_social"] = "NO";

if(!isset($_POST["chk_admin"]))
  $_POST["chk_admin"] ="NO";
              
if(!isset($_POST["chk_ld_qt"]))
 $_POST["chk_ld_qt"]= "NO";
 
if(!isset($_POST["chk_pckg"]))
  $_POST["chk_pckg"]="NO"; 

if(!isset($_POST["chk_enq"]))
  $_POST["chk_enq"] = "NO";

if(!isset($_POST["chk_pay"]))
  $_POST["chk_pay"]="NO";
 
if(!isset($_POST["chk_cncl"]))
   $_POST["chk_cncl"]="NO"; 
 
if(!isset($_POST["chk_reg"]))
   $_POST["chk_reg"]="NO";     

$doj = $_POST["drpYr"]+"-"+$_POST["drpMonth"]+"-"+$_POST["drpDay"];
$doj = strtotime($doj);

if($_POST["txtEmpName"]!="" && $_POST["txtUserName"]!="" && $_POST["rdGen"]!="" && $_POST["drpRole"]!="" && $_POST["txtLoc"]!="")
{
$clnt_reg = "insert into client_register values('','QCN Employee','".$_POST["txtUserName"]."','','SignedUp','','".$_POST["drpRole"]."','".date('Y-m-d')."')";
$res_clnt_reg = mysqli_query($conn,$clnt_reg);

if($res_clnt_reg)
{ 
$sel_clnt = "select client_id, client_email from client_register where client_email='".$_POST["txtUserName"]."'"; 
$res_clnt = mysqli_query($conn,$sel_clnt);
 while($row = mysqli_fetch_array($res_clnt))
 { 
 $user_tab = "insert into user_tab values('".$row["client_id"]."','".$_POST["txtUserName"]."','','".$_POST["txtPwd"]."','".$_POST["drpRole"]."','QCN Employee','Active','".date('Y-m-d')."','','')";
 $res_user = mysqli_query($conn,$user_tab);
 
 $insrt_user = "insert into qcn_emp_register values('".$row["client_id"]."','".addslashes($_POST["txtEmpName"])."','".addslashes($_POST["txtUserName"])."','".addslashes($_POST["rdGen"])."','".$doj."','".addslashes($_POST["txtMobile"])."','".addslashes($_POST["txtLoc"])."','".addslashes($_POST["txtState"])."','".addslashes($_POST["txtCountry"])."','".addslashes($_POST["txtPinCode"])."','".addslashes($_POST["drpRole"])."','".$_POST["chk_eml"]."','".$_POST["chk_log"]."','".$_POST["chk_social"]."','".$_POST["chk_admin"]."','".$_POST["chk_ld_qt"]."','".$_POST["chk_pckg"]."','".$_POST["chk_enq"]."','".$_POST["chk_pay"]."','".$_POST["chk_cncl"]."','".$_POST["chk_reg"]."')";
 $res_insrt_user = mysqli_query($cnn,$insrt_user);

if($res_insrt_user)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success: User Registered\')';
 echo '</script>';
} 
else
{
echo '<script>';
echo 'alert(\'Error: Check if user ID already exists\')';
echo '</script>';
}
} 
}
}

else
{
echo '<script type="text/javascript">';
echo 'alert(\'Please Fill Details\')';
echo '</script>';
}
}

if(isset($_POST['btnEdit']))
{
  include("b2e_User_Session.php");
 $post_log=true;
 $flag_reg = true;
 
if(!isset($_POST["chk_eml"]))
 $_POST["chk_eml"]= "NO";
 
if(!isset($_POST["chk_log"]))
 $_POST["chk_log"] ="NO";
 
if(!isset($_POST["chk_social"]))
 $_POST["chk_social"] = "NO";

if(!isset($_POST["chk_admin"]))
  $_POST["chk_admin"] ="NO";
              
if(!isset($_POST["chk_ld_qt"]))
 $_POST["chk_ld_qt"]= "NO";
 
if(!isset($_POST["chk_pckg"]))
  $_POST["chk_pckg"]="NO"; 

if(!isset($_POST["chk_enq"]))
  $_POST["chk_enq"] = "NO";

if(!isset($_POST["chk_pay"]))
  $_POST["chk_pay"]="NO";
 
if(!isset($_POST["chk_cncl"]))
   $_POST["chk_cncl"]="NO"; 
 
if(!isset($_POST["chk_reg"]))
   $_POST["chk_reg"]="NO";     

$doj = $_POST["drpYr"]+"-"+$_POST["drpMonth"]+"-"+$_POST["drpDay"];
$doj = strtotime($doj);

$updt = "update qcn_emp_register set emp_name='".addslashes($_POST["txtEmpName"])."',  emp_gender='".addslashes($_POST["rdGen"])."', emp_doj='".$doj."', emp_mobile='".addslashes($_POST["txtMobile"])."', emp_location='".addslashes($_POST["txtLoc"])."', emp_state='".addslashes($_POST["txtState"])."', emp_country='".addslashes($_POST["txtCountry"])."', emp_pincode='".addslashes($_POST["txtPinCode"])."', emp_role='".addslashes($_POST["drpRole"])."', acc_eml_trfc='".$_POST["chk_eml"]."', acc_login_act='".$_POST["chk_log"]."', acc_social_act='".$_POST["chk_social"]."', acc_user_admin='".$_POST["chk_admin"]."', acc_leads_quotes='".$_POST["chk_ld_qt"]."', acc_packages='".$_POST["chk_pckg"]."', acc_enquiry='".$_POST["chk_enq"]."', acc_payment='".$_POST["chk_pay"]."', acc_cancel='".$_POST["chk_cncl"]."', acc_register='".$_POST["chk_reg"]."' where user_id='".$_POST["txtUserName"]."'";
$res_updt = mysqli_query($cnn,$updt);
if($res_updt)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success : User Info Updated\')';
 echo '</script>';
}
else
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Error : Try again!!\')';
 echo '</script>';
}
}


if(isset($_GET['userExist']))
{
  $sel_user = "select user_id from qcn_emp_register where user_id='".$_GET['userExist']."'";
  $res_user = mysqli_query($cnn,$sel_user);
  if($res_user)
   $rows_count = mysqli_num_rows($res_user);
  else
    $rows_count = 0;
	
if($rows_count>0)
    echo '<span style="color:#ff0000; font-size:12px; font-weight:600;">This UserName exists </span>';
  else
    echo '<span style="color:#009900; font-size:12px; font-weight:600;">This UserName doesnot exists</span>';
}


if(isset($_POST['btnSrcUser']))
{
include("b2e_User_Session.php");
$post_log=true;
$flag_reg = true;

$sel_user = "select user_id, emp_name, emp_role, emp_gender, emp_doj, emp_mobile, emp_location, emp_state, emp_country, emp_pincode,  acc_eml_trfc, acc_login_act, acc_social_act, acc_user_admin, acc_leads_quotes, acc_packages, acc_enquiry, acc_payment, acc_cancel, acc_register from qcn_emp_register where user_id = '".$_POST["txtUserName"]."'";
$res_user = mysqli_query($cnn,$sel_user);

if($res_user)
{
while($row = mysqli_fetch_array($res_user))
{
  $date = explode("-",$row["emp_doj"]);
  $txtName = $row["emp_name"];
  $txtUser = $row["user_id"];
  $txtMonth = $date[1];
  $txtDay = $date[2];
  $txtYr = $date[0];
  $txtGen = $row["emp_gender"];
  $txtLoc = $row["emp_location"];
  $txtState = $row["emp_state"];
  $txtCountry = $row["emp_country"];
  $txtPin = $row["emp_pincode"];
  $txtmob = $row["emp_mobile"];
  $txtRole_user = $row["emp_role"];
  $chkEml = $row["acc_eml_trfc"];
  $chkLog = $row["acc_login_act"];
  $chkSocial= $row["acc_social_act"];
  $chkAdmin= $row["acc_user_admin"];
  $chkLead=$row["acc_leads_quotes"];
  $chkPcks=$row["acc_packages"];
  $chkEnq=$row["acc_enquiry"];
  $chkPay=$row["acc_payment"];
  $chkCancel=$row["acc_cancel"];
  $chkReg=$row["acc_register"];
}
}
}

if(isset($_GET['userDeact']))
{
$sel_user = "update user_tab set user_status='Deactivated' where user_id='".$_GET['userDeact']."' ";
$res_user = mysqli_query($conn,$sel_user);
if($res_user)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success: User ID '.$_GET['userDeact'].' Deactivated\')';
 echo '</script>';
}
else
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Error: Please try again!!\')';
 echo '</script>';
}
}



/*if(isset($_POST['btnReg_eml']))
{
$_SESSION["userEmail"] = $_POST["txtReg_email"];
$q_chk_eml = "select user_email, user_tab from user_tab where user_email = '".$_POST["txtReg_email"]."' or user_id='".$_POST["txtReg_email"]."'";
$res_chk_eml = mysqli_query($conn,$q_chk_eml);
if($res_chk_eml)
$row_chk_eml = mysqli_num_rows($res_chk_eml);
else
 $row_chk_eml=0;

if($row_chk_eml > 0 )
{
  echo '<script type="text/javascript">';
	echo 'alert(\'This email-id is already registered with us.<br/> Please check your mail for password reset link.\')';
	echo '</script>';
	 $thnk_reg = true;
	 $lnk = "Pwd_reset.php?emlID=".$_SESSION["userEmail"];
}

else
{
  $q_reg_cust = "insert into client_register values('','QCN Employee','".addslashes($_POST["txtReg_email"])."','','Register','','','".date('Y-m-d')."')";
  $res_reg_cust = mysqli_query($conn,$q_reg_cust);
  if($res_reg_cust)
  {
   echo '<script type="text/javascript">';
	echo 'alert(\'Success: You are registered.<br/> Please check your email id for password link.\')';
	echo '</script>';
	 $thnk_reg = true;
	 $lnk = "Pwd_reset.php?emlID=".$_SESSION["userEmail"];
  }

}

}*/

if(isset($_POST['b2CLogin']))
{

$q_cust_id_Eml = "select client_id,  user_id, user_pwd from user_tab where user_id = '".$_POST["txtLogId_b2c"]."'";
$res_cust_Eml = mysqli_query($conn,$q_cust_id_Eml);
$res_custEml = mysqli_num_rows($res_cust_Eml);

if($res_custEml > 0)
{
$_POST["txtSessionEml"] = $_POST["txtLogId_b2c"];
$q_chk_status_Eml = "select user_status from user_tab where user_id='".$_POST["txtLogId_b2c"]."' and user_status='Active'";
$res_chk_status_Eml = mysqli_query($conn,$q_chk_status_Eml);
$row_status_Eml = mysqli_num_rows($res_chk_status_Eml);

$q_cust_eml_pwd = "select user_pwd, user_id from user_tab where user_id='".$_POST["txtLogId_b2c"]."'";  
  $res_pwd_Eml = mysqli_query($conn,$q_cust_eml_pwd);
  
if($row_status_Eml > 0)
 {
  $q_chk_pwd_Eml = "select client_id, user_pwd, user_email, user_id from user_tab where user_id='".$_POST["txtLogId_b2c"]."' and user_pwd='".$_POST["txtLogPwd_b2c"]."'";
  $res_chk_pwd_Eml = mysqli_query($conn,$q_chk_pwd_Eml);
  $row_chk_pwd_Eml = mysqli_num_rows($res_chk_pwd_Eml);
  if($row_chk_pwd_Eml > 0)
    {
	
while($r = mysqli_fetch_array($res_chk_pwd_Eml))
{
  $userID = $r["user_id"];
  $userEml = $r["user_email"];
  $clientId = $r["client_id"];
  $_SESSION["userEmail"] = $r["user_id"];
}
	  $post_log=true;
	    include("b2e_User_Session.php");
	  
  $insrt_log = "insert into user_logs values ('','".$clientId."','".$userEml."','".$userID."','".date('Y-m-d')."','".date('H:i:s')."','','','QCN EMPLOYEE')";
      mysqli_query($conn,$insrt_log);	
	  
	  while($rP = mysqli_fetch_array($res_pwd_Eml))
	  {
      $_SESSION["userEmail"] = $rP["user_id"];
	  }
	 }
   else
     {
	 while($rP = mysqli_fetch_array($res_pwd_Eml))
	  {
	  $_SESSION["userEmail"] = $rP["user_id"];
	    if($rP["user_pwd"] != $_POST["txtLogPwd_b2c"])
		 {
		  echo '<script type="text/javascript">';
echo 'alert(\'Error: Invalid UserName and Password.\')';
echo '</script>';
			   $reset = "Reset your password?";

		 }
	  }
	 }	 	 
 }	 
else
 {
   echo '<script type="text/javascript">';
   echo 'alert(\'Access Denied\')';
   echo '</script>';
 }	 

}

else
{
echo '<script type="text/javascript">';
echo 'alert(\'Error: Invalid UserName and Password.\')';
echo '</script>';
}
}


if(isset($_GET['clntIDLog']))
{
$insrt_log = "update user_logs set logout_date='".date('Y-m-d')."' , logout_time = '".date('H:i:s')."' where client_id='".$_GET['clntIDLog']."' and login_date='".date('Y-m-d')."' and logout_date='0000-00-00' and logout_time='00:00:00'";
$res_log = mysqli_query($conn,$insrt_log);

if($res_log)
{
$post_log = false;
echo '<script type="text/javascript">';
echo 'alert(\'You are logged out\')';
echo '</script>';
session_destroy();
}
}

if(isset($_GET['yest']))
{
  $q_pros = "select * from client_register where status='Prospect' and date_reg=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and date_reg=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and date_reg=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and date_reg=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo ' <table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
  
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where date_reg=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	   $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
	 
}

if(isset($_GET['tDay']))
{
  $q_pros = "select * from client_register where status='Prospect' and date_reg=DATE(NOW())";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and date_reg=DATE(NOW())";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and date_reg=DATE(NOW())";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and date_reg=DATE(NOW())";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo ' <table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
  
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where date_reg=DATE(NOW())";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	  $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
	 
}

if(isset($_GET['week']))
{
  $q_pros = "select * from client_register where status='Prospect' and date_reg between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and date_reg between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and date_reg between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and date_reg between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo ' <table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
  
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where date_reg between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	  $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
	 
}

if(isset($_GET['mnth']))
{
  $q_pros = "select * from client_register where status='Prospect' and MONTH(date_reg) = date_format(now(),'%m')";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and MONTH(date_reg) = date_format(now(),'%m')";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and MONTH(date_reg) = date_format(now(),'%m')";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and MONTH(date_reg) = date_format(now(),'%m')";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo '<table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
  
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where MONTH(date_reg) = date_format(now(),'%m')";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	   $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
	 
}

if(isset($_GET['year']))
{
  $q_pros = "select * from client_register where status='Prospect' and YEAR(date_reg) = date_format(now(),'%Y')";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and YEAR(date_reg) = date_format(now(),'%Y')";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and YEAR(date_reg) = date_format(now(),'%Y')";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and YEAR(date_reg) = date_format(now(),'%Y')";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo '<table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
  
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where YEAR(date_reg) = date_format(now(),'%Y')";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	  $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
	 
}

if(isset($_GET['ITD']))
{
  $q_pros = "select * from client_register where status='Prospect'";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register'";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime'";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp'";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo '<table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
 
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	 $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
}

if(isset($_GET['date1']) && isset($_GET['date2']))
{
$d1 = date('Y-m-d',strtotime($_GET['date1']));
$d2 = date('Y-m-d',strtotime($_GET['date2']));

  $q_pros = "select * from client_register where status='Prospect' and date_reg between '".$d1."' and '".$d2."' ";
  $res_pros = mysqli_query($conn,$q_pros);
   if($res_pros)
     $pros = mysqli_num_rows($res_pros);
  
  $q_reg = "select * from client_register where status='Register' and date_reg between '".$d1."' and '".$d2."'";
  $res_reg = mysqli_query($conn,$q_reg);
   if($res_reg)
     $reg = mysqli_num_rows($res_reg);
	 
 $q_oneT = "select * from client_register where status='OneTime' and date_reg between '".$d1."' and '".$d2."'";
  $res_oneT = mysqli_query($conn,$q_oneT);
   if($res_oneT)
     $oneT = mysqli_num_rows($res_oneT);
	 
 $q_act = "select * from client_register where status='SignedUp' and date_reg between '".$d1."' and '".$d2."'";
  $res_act = mysqli_query($conn,$q_act);
   if($res_act)
     $act = mysqli_num_rows($res_act);	
	 
	 echo ' <table width="100%" class="spFonts" border="1px solid #ddd" cellspacing="0" cellpadding="5">
 <tr>
   <td align="right" style="background:#579292; color:#fff;">Prospects</td>
   <td align="left" style="background:#0066ff; color:#fff;">'. $pros.'</td>
    <td align="right" style="background:#579292; color:#fff;">Registered</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$reg.'</td>
    <td align="right" style="background:#579292; color:#fff;">OneTimers</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$oneT.'</td>
    <td align="right" style="background:#579292; color:#fff;">SignedUp Users</td>
   <td align="left" style="background:#0066ff; color:#fff;">'.$act.'</td>
 </tr>
 </table>
 
<div style="float:left; width:90%; margin-top:10px; margin-left:30px;">
   <table width="100%" class="spFonts" style="table-layout:fixed;">
     <tr style="background:#0066ff; color:#fff;">
	  <th width="10%" align="justify">Client ID</th>
	  <th width="20%" align="justify">Email</th>
	  <th width="20%" align="justify">Date Registered</th>
	  <th width="20%" align="justify">Status 
	   <select id="drpTrfStatus" style="width:100px; height:20px;" onchange="sortTrfStatus(this.value);">
	     <option value="SignedUp">Signed Up</option>
		 <option value="Register">Register</option>
		 <option value="Prospect">Prospect</option>
		 <option value="OneTime">One Time</option>
	  </select>
	  </th>
	 </tr>
	 </table>
	 </div>
	  
 <div style="float:left; width:90%; height:300px; overflow-y:scroll; overflow-x:hidden; margin-left:30px;">
	 <table width="100%" class="spFonts" style="table-layout:fixed">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where  date_reg between '".$d1."' and '".$d2."'";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	 $l++;
	  if($l%2==0)
	  {
	   echo '<tr style="background:#fff;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	   else
	   {
	   echo '<tr style="background:#ddd;">';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	   }
	  }
	 }
   echo '</table>
 </div>'; 
}

$clntID = "";
$clntEml = "";
$clntStat = "";

if(isset($_GET['ID']) && isset($_GET['MYID']))
{
  $q_clnt = "select client_id, client_email, status from client_register where client_id='".$_GET['ID']."'";
  $res_clnt = mysqli_query($conn,$q_clnt);
  if($res_clnt)
  {
    while($row = mysqli_fetch_array($res_clnt))
	{
	  $clntID = $row["client_id"];
	  $clntEml = $row["client_email"];
	  $clntStat = $row["status"];
	  
	  echo '
	   <div style="float:left; width:100%;">
   <span style="float:right; margin-right:5px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'div_chngStus\');" /></span>
 </div>
	  <div style="float:left; width:100%; margin:10px;">
  <div style="float:left; width:100%;">
    <table style="float:left; width:100%" cellspacing="0" class="spFonts" cellpadding="3">
	<tr>
	  <th align="right">Client ID:</th>
	  <td align="left">'.$clntID.'</td>
	 </tr>
	 <tr>
	  <th align="right">Client Email:</th>
	  <td align="left">'.$clntEml.'</td>
	 </tr>
	 <tr>
	  <th align="right">Current Status:</th>
	  <td align="left">'.$clntStat.'</td>
	 </tr>
	 <tr>
	  <th align="right">Change Status to:</th>
	  <td align="left">
	    <select id="drpStatusChng" style="padding:1px; width:100px;">
		<option value="Active">Active</option>
		<option value="Suspend">Suspend</option>
		<option value="Freeze">Freeze</option>
		<option value="De-activate">De-activate</option>
		</select>
	   </td>
	 </tr>
	  <tr>
	  <th align="right">Reason for change:</th>
	  <td align="left"><textarea id="txtAreason" style="width:200px; height:60px;"></textarea></td>
	 </tr>
	  <tr>
	  <th align="right">Changed By:</th>
	  <td align="left">'.$_GET['MYID'].'</td>
	 </tr>
	 <tr>
<td colspan="2" align="center"><input type="button" class="smallbtn" style="width:80px; height:22px; float:none;" value="Submit" onclick="update_user(\''.$_GET['ID'].'\');" /></td>
	 </tr>
	</table>
  </div>
</div>';
	}
  }
}

if(isset($_GET['UpdID']) && isset($_GET['status']) && isset($_GET['resn']))
{
$q_updt = "update user_tab set user_status='".$_GET['status']."', reset_status_reason = '".$_GET['resn']."' where client_id='".$_GET['ID']."'";
$res_updt = mysqli_query($conn,$q_updt);
}

if(isset($_GET['EmlPwd']) && isset($_GET['MYID']))
{
 echo '
	   <div style="float:left; width:100%;">
   <span style="float:right; margin-right:5px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'div_chngStus\');" /></span>
 </div>
	  <div style="float:left; width:100%; margin:10px;">
  <div style="float:left; width:100%;">
  <table width="100%" cellpadding="1" cellspacing="0" class="spFonts">
    <tr>
	 <td align="right">Link to reset password :</td>
	 <td align="left"><span class="spFonts" style="float:left; cursor:pointer; color:#0066ff; text-decoration:underline;" onclick="open_reset_pwd(\''.$_GET['EmlPwd'].'\');"/>Pwd_reset.php?email=\''.$_GET['EmlPwd'].'\'</span></td>
	</tr>
	<tr>
	  <td align="right">Reason for reset:</td>
	  <td align="left"><textarea id="txtAresetReas" style="width:300px; height:60px;"></textarea></td>
	</tr>
	<tr>
	  <td align="right">Reset link sent by:</td>
	  <td align="left" style="color:#ff0000;">'.$_GET['MYID'].'</td>
	</tr>
	<tr>
	  <td colspan="2" align="center"><input type="button" class="smallbtn" style="width:60px;" value="Submit" onclick="rest_Utab(\''.$_GET['EmlPwd'].'\',\''.$_GET['MYID'].'\',\'txtAresetReas\');" /></td>
	</tr>
  </table>
  </div>';
}

if(isset($_GET['eID']) && isset($_GET['MYID']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:13px;  word-wrap:break-word;">';
	$j = 0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_UName, DATE_FORMAT(client_register.date_reg,'%d-%m-%Y') as date_reg, client_register.status, DATE_FORMAT(user_tab.date_act,'%d-%m-%Y') as date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='CUSTOMER' and client_register.client_email like '%".$_GET["eID"]."%'";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $j++;
	 if($j%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\');reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
  echo '</table>';
}

if(isset($_GET['DOR']) && isset($_GET['MYID']))
{
$date = date('Y-m-d',strtotime($_GET["DOR"]));
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:13px;  word-wrap:break-word;">';
	$j = 0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_UName, DATE_FORMAT(client_register.date_reg,'%d-%m-%Y') as date_reg, client_register.status, DATE_FORMAT(user_tab.date_act,'%d-%m-%Y') as date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='CUSTOMER' and client_register.date_reg='".$date."'";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $j++;
	 if($j%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['myID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\');reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
  echo '</table>';
}

if(isset($_GET['TrfSt']))
{
echo '<table width="100%" class="spFonts" style="table-layout:fixed;">';
	 $q_all ="select client_id, client_email, date_reg, status from client_register where status='".$_GET['TrfSt']."'";
	 $res_all = mysqli_query($conn,$q_all);
	 if($res_all)
	 {
	  while($row = mysqli_fetch_array($res_all))
	  {
	   echo '<tr>';
	   echo '<td width="10%" align="justify">'.$row["client_id"].'</td>';
	   echo '<td  width="20%" align="justify">'.$row["client_email"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["date_reg"].'</td>';
	   echo '<td width="20%" align="justify">'.$row["status"].'</td>';
	   echo '</tr>';
	  }
	 }
   echo '</table>';
}

if(isset($_GET['cust']) && isset($_GET['MYID']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:13px;  word-wrap:break-word;">';
	$j = 0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_UName, DATE_FORMAT(client_register.date_reg,'%d-%m-%Y') as date_reg, client_register.status, DATE_FORMAT(user_tab.date_act,'%d-%m-%Y') as date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='CUSTOMER'";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $j++;
	 if($j%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="50px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
echo '</table>';
}


if(isset($_GET['b2b']) && isset($_GET['MYID']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_tier, client_register.linkedUser, client_register.client_UName, DATE_FORMAT(client_register.date_reg,'%d-%m-%Y') as date_reg, client_register.status, DATE_FORMAT(user_tab.date_act,'%d-%m-%Y') as date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='B2B_Partner_Operator'";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $k++;
	 if($k%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	  echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px; padding:2px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	   echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width=60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	 echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
echo '</table>';
  
}

if(isset($_GET['DORB2b']) && isset($_GET['MYID']))
{
$_GET['DORB2b'] = date('Y-m-d', strtotime($_GET['DORB2b']));
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_tier, client_register.linkedUser, client_register.client_UName, client_register.date_reg, client_register.status, user_tab.date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='B2B_Partner_Operator' where client_register.date_reg ='".$_GET['DORB2b']."' ";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $k++;
	 if($k%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	  echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px; padding:2px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	   echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width=60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	 echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['eb2bID']) && isset($_GET['MYID']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_tier, client_register.linkedUser, client_register.client_UName, client_register.date_reg, client_register.status, user_tab.date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id and client_register.client_role='B2B_Partner_Operator' where client_register.client_email like '%".$_GET['eb2bID']."%' or client_register.client_UName like '%".$_GET['eb2bID']."%'";
	$res_cust = mysqli_query($conn,$q_cust);
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $k++;
	 if($k%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	  echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px; padding:2px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	   echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width=60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	 echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['comp']) && isset($_GET['MYID']))
{
	$q_cust = "select client_register.client_id, client_register.client_email, client_register.client_tier, client_register.linkedUser, client_register.client_UName, client_register.date_reg, client_register.status, user_tab.date_act from client_register inner join user_tab on client_register.client_id = user_tab.client_id  inner join b2b_profile on user_tab.client_id = b2b_profile.client_id where client_register.client_role='B2B_Partner_Operator' and b2b_profile.company_name like '%".$_GET['comp']."%'";
	$res_cust = mysqli_query($conn,$q_cust);

echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	if($res_cust)
	{
	 while($row = mysqli_fetch_array($res_cust))
	 {
	 $k++;
	 if($k%2 == 0)
	 {
	 echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	  echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px; padding:2px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	   echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width=60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';	
	   }
	   else
	    {
		 echo '<tr style="background:#ccc;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="80px" align="left">'.$row["client_email"].'</td>';
	 echo '<td width="60px" align="left">'.$row["client_UName"].'</td>';
	 echo '<td width="70px" align="left">
	  <select id="drpTier" style="width:70px;" onchange="update_tier(\''.$row["client_id"].'\',this.value);">
	   <option value="'.$row["client_tier"].'">'.$row["client_tier"].'</option>
	   <option value="PLATINUM">PLATINUM</option>
	   <option value="DIAMOND">DIAMOND</option>
	   <option value="GOLD">GOLD</option>
	   <option value="SILVER">SILVER</option>
	  </select>
	  </td>';
	 echo '<td width="40px" align="left">'.$row["linkedUser"].'</td>';
	 echo '<td width="50px" align="left">'.$row["date_reg"].'</td>';		  
	 echo '<td width="50px" align="left">'.$row["date_act"].'</td>';
	 echo '<td width="40px" align="left">'.$row["status"].'</td>';
	 echo '<td width="60px" align="left"><input type="button" value="Set Password" class="smallbtn" style="font-size:10px; background:#579292" onclick=" show_block(\'div_chngStus\'); reset_pwd_admin(\''.$row["client_email"].'\',\''.$_GET['MYID'].'\');" /></td>';
	 echo '<td width="50px" align="left"><input type="button" value="Reset Status" class="smallbtn" style="font-size:10px; background:#579292" onclick="show_block(\'div_chngStus\'); clnt_id(\''.$row["client_id"].'\',\''.$_GET['MYID'].'\');" /></td>';
	   echo '<tr>';
		}  
	 }
	}
echo '</table>';
}


if(isset($_GET['ID']) && isset($_GET['Tier']))
{
$q_updt_tier = "update client_register set client_tier='".$_GET['Tier']."' where client_id='".$_GET['ID']."'";
$res_updt = mysqli_query($conn,$q_updt_tier);
if($res_updt)
{
 echo '<script type="text/javascript">';
 echo 'alert(\'Success: The client tier for ID '.$_GET['ID'].' has been changed to '.$_GET['Tier'].'\')';
 echo '</script>';
}

}

if(isset($_GET['leads']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler";
	$res_lead = mysqli_query($conn,$q_lead);
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 $expr= date('d-m-Y', strtotime('+2 day', strtotime($row["lead_date"])));
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['quotes']))
{
echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, DATE_FORMAT(quote_dtls.quote_date,'%d-%m-%Y') as quote_date, DATE_FORMAT(quote_dtls.qt_expire_date,'%d-%m-%Y') as qt_expire_date , quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id";
	$res_lead = mysqli_query($conn,$q_lead);
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['enq']) && isset($_GET['MYID']) && isset($_GET['time']))
{
if($_GET['time'] == "Yest")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query where enq_date = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)";
 $res_enq = mysqli_query($conn,$q_enq);
}
if($_GET['time'] == "Tday")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query where enq_date = DATE(NOW())";
 $res_enq = mysqli_query($conn,$q_enq);
}
if($_GET['time'] == "Week")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query where enq_date between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
 $res_enq = mysqli_query($conn,$q_enq);
}
if($_GET['time'] == "MTD")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query where MONTH(enq_date) = DATE_FORMAT(DATE(NOW()),'%m')";
 $res_enq = mysqli_query($conn,$q_enq);
}
if($_GET['time'] == "YTD")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query where YEAR(enq_date) = DATE_FORMAT(DATE(NOW()),'%Y')";
 $res_enq = mysqli_query($conn,$q_enq);
}
if($_GET['time'] == "ITD")
{
 $q_enq = "select enq_id, email_id, viewed, contacted, response, status from build_trip_query";
 $res_enq = mysqli_query($conn,$q_enq);
}

 if($res_enq)
 {
 echo '<table width="100%" class="spFonts" cellpadding="1" cellspacing="0"  style="table-layout:fixed; word-wrap:break-word;">';
  while($row = mysqli_fetch_array($res_enq))
  {
    echo '<tr>';
	echo '<td width="80px" align="left">'.$row["enq_id"].'</td>';
	echo '<td width="100px" align="left">'.$row["email_id"].'</td>';
	echo '<td width="60px" align="left"><span style="color:#0066ff; cursor:pointer; text-decoration:underline;" onclick="show_enq(\'div_enq_pop\',\''.$row["enq_id"].'\',\''.$_GET['MYID'].'\')">View Details</a></td>';
	echo '<td width="70px" align="left">'.$row["viewed"].'</td>';
	echo '<td width="50px" align="left">'.$row["contacted"].'</td>';
	echo '<td width="120px" align="left">'.$row["response"].'</td>';
	echo '<td width="80px" align="left">
	 <select id="drpEnqStatus" class="spFonts" style="width:80px; height:20px;" onchange="set_status(\''.$row["enq_id"].'\',\''.$_GET['MYID'].'\',this.value);">
	  <option value="'.$row["status"].'">'.$row["status"].'</option>
	  <option value="Active">Active</option>
	  <option value="Closed">Closed</option>
	  <option value="To be Followed">To be followed</option>
	 </select>
	</td>';
	echo '</tr>';
  }
  echo '</table>';
 }
}



if(isset($_GET['enqID']) && isset($_GET['MYID']))
{
echo ' <div style="float:left; width:100%; margin-top:10px;">
<span class="spFonts" style="float:left; margin-left:50px; font-size:18px; color:#0066ff; font-weight:bold; text-decoration:underline;">
Enquiry Details of ID : '.$_GET['enqID'].'</span>
 <span style="float:right; margin-right:3px;"><img src="Images/cancelbtn.png" width="25px" height="25px" onclick="hide_block(\'div_enq_pop\');" /></span>
 </div>';
 
 $updt_view = "update build_trip_query set viewed = 'Viewed by -".$_GET['MYID']."' where enq_id='".$_GET['enqID']."'";
 $res_view = mysqli_query($conn,$updt_view);
  
$q_enq = "select enq_id, curr_loc, country, trip_dur, pref_loc, trvl_dates, email_id, phone, comments from build_trip_query where enq_id='".$_GET['enqID']."'";
$res_enqId = mysqli_query($conn,$q_enq);
if($res_enqId)
{
while($row = mysqli_fetch_array($res_enqId))
{
  echo '<div style="float:left; width:100%; margin-top:5px;">
  <table width="100%"  cellpadding="1" cellspacing="0">
    <tr>
	  <td align="right">Enquiry ID</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["enq_id"].'</td>
	</tr>
	<tr>
	  <td align="right">Current Location</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["curr_loc"].'</td>
	</tr>
	<tr>
	  <td align="right">Want to travel in</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["country"].'</td>
	</tr>
	<tr>
	  <td align="right">Trip Duration</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["trip_dur"].'</td>
	</tr>
	
	<tr>
	  <td align="right">Preferred locations</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["pref_loc"].'</td>
	</tr>
	<tr>
	  <td align="right">Travel Dates</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["trvl_dates"].'</td>
	</tr>
	<tr>
	  <td align="right">Email ID</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["email_id"].'</td>
	</tr>
	<tr>
	  <td align="right">Phone</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["phone"].'</td>
	</tr>
	<tr>
	  <td align="right">Comments</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$row["comments"].'</td>
	</tr>
	<tr id="tr_reBtn">
	  <td colspan="3" align="center"><button type="button" class="smallbtn" style="width:80px; height:22px; float:none;" onclick="show_tr(\'tr_resp\'); show_tr(\'tr_id\'); show_tr(\'tr_btn\'); hide_block(\'tr_reBtn\');">Respond</button></td>
	</tr>
	<tr id="tr_resp" style="display:none;">
	 <td align="right">Comment</td>
	 <td align="center">:</td>
	 <td align="left"><textarea id="txtAresp" name="txtAresp" style="width:300px; height:60px;"></textarea></td>
	</tr>
	<tr id="tr_id" style="display:none;">
	  <td align="right">Viewed by</td>
	  <td align="center">:</td>
	  <td align="left" style="color:#ff0000;">'.$_GET['MYID'].'</td>
	</tr>
	<tr id="tr_btn" style="display:none;">
	  <td colspan="3" align="center"><button type="button" class="smallbtn" style="width:80px; height:22px; float:none;" onclick="updt_resp(\''.$_GET['enqID'].'\',\''.$_GET['MYID'].'\',\'txtAresp\'); hide_block(\'div_enq_pop\');">Submit</button></td>
	</tr>
  </table>
  </div>';
}
}
}

if(isset($_GET['UpdtStatID']) && isset($_GET['MYID']) &&  isset($_GET['stat']))
{
$q_updtStat = "update build_trip_query set status='".$_GET['stat']."' where enq_id='".$_GET['UpdtStatID']."'";
mysqli_query($conn,$q_updtStat);
}

if(isset($_GET['UpdtEnqID']) && isset($_GET['MYID']) && isset($_GET['resp']))
{
$q_updtId = "update build_trip_query set contacted='YES', response='".$_GET['resp']."', resp_by='".$_GET['MYID']."' where enq_id='".$_GET['UpdtEnqID']."'";
mysqli_query($conn,$q_updtId);
}

if(isset($_GET['resetEml']) && isset($_GET['MYID']) && isset($_GET['txtReset']))
{
$q_reset = "update user_tab set reset_status_reason='".$_GET['txtReset']."', resetlink_by='".$_GET['MYID']."' where user_email='".$_GET['resetEml']."'";
mysqli_query($conn,$q_reset);
}

if(isset($_GET['b2e_logs_dtls']) && isset($_GET['ID']) && isset($_GET['role']))
{
$sl=0;
echo '<table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed; word-wrap:break-word;">
  <tr style="background:#0066ff; color:#fff;">
    <th align="center" width="30px">SlNo</th>
	<th align="left" width="60px">Client ID</th>
	<th align="left" width="120px">Email ID</th>
	<th align="left" width="60px">UserName</th>
	<th align="left" width="60px">Login Date</th>
	<th align="left" width="60px">Login time</th>
	<th align="left" width="60px">Logout date</th>
	<th align="left" width="60px">Logout Time</th>
  </tr>
';
 $q_logs = "select client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and client_id='".$_GET['ID']."'";
 $res_logs = mysqli_query($conn,$q_logs);
 if($res_logs)
 {
  while($row = mysqli_fetch_array($res_logs))
  {
  $sl++;
    echo '<tr>';
	echo '<td align="center" width="30px">'.$sl.'</td>';
	echo '<td align="left" width="60px">'.$row["client_id"].'</td>';
	echo '<td align="left" width="120px">'.$row["client_email"].'</td>';
	echo '<td align="left" width="60px">'.$row["client_Uname"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_time"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_time"].'</td>';
	echo '</tr>';
  }
 }
 echo '</table>';
}


if(isset($_GET['b2e_logs_2']) && isset($_GET['role']) && isset($_GET['logtime']))
{
if($_GET['logtime'] == "Tday")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date, client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}
else if($_GET['logtime'] == "Yest")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date, client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}
else if($_GET['logtime'] == "Week")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}
else if($_GET['logtime'] == "Month")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}

else if($_GET['logtime'] == "Year")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}
else if($_GET['logtime'] == "ITD")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."'  group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."'  group by client_id";
 $res_logs = mysqli_query($conn,$q_logs_all);
}

echo '<table width="100%" class="spFonts" cellpadding="1" cellspacing="0" style="table-layout:fixed;  word-wrap:break-word;">';
echo '<tr>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Unique Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["unqLogsB2e"].'</td>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Multi Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["mulLogsB2e"].'</td>
   </tr>
   <tr style="background:#0066ff; color:#fff;">
    <th align="left" width="60px">Client ID</th>
	<th align="left" width="80px">Email ID</th>
	<th align="left" width="60px">User ID</th>
	<th align="left" width="60px">Login Date</th>
	<th align="left" width="60px">Login Time</th>
	<th align="left" width="60px">Logout Date</th>
	<th align="left" width="60px">Logout Time</th>
	<th align="center" width="50px">
	<select id="drpCountLogs" style="width:30px;" onchange="show_emp_oncount(this.value,document.getElementById(\'spClient\').innerHTML);">';
	for($i=0; $i<110; $i++)
	{
	 echo '<option value="'.$i.'">'.$i.'</option>';	
   }
echo '</select>
   </th>
   </tr>';
 if($res_logs)
 {
  while($row = mysqli_fetch_array($res_logs))
  {
    echo '<tr>';
	echo '<td align="left" width="60px">'.$row["client_id"].'</td>';
	echo '<td align="left" width="80px">'.$row["client_email"].'</td>';
	echo '<td align="left" width="60px">'.$row["client_Uname"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_time"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_time"].'</td>';
	echo '<td align="center" width="50px"><span style="color:#0066ff; text-decoration:underline; cursor:pointer;" onclick="show_emp(\''.$row["client_id"].'\',\''.$_GET['role'].'\');">'.$row["count"].'</span></td>';
	echo '</tr>';
  }
 }
 echo '</table>';

}


if(isset($_GET['logtimeHdr']) && isset($_GET['role']))
{
if($_GET['logtimeHdr'] == "Tday")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE(NOW()) group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
}
else if($_GET['logtimeHdr'] == "Yest")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
}
else if($_GET['logtimeHdr'] == "Week")
{
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and login_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
 
 }
else if($_GET['logtimeHdr'] == "Month")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and MONTH(login_date)=DATE_FORMAT(NOW(),'%m') group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
}

else if($_GET['logtimeHdr'] == "Year")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' and YEAR(login_date)=DATE_FORMAT(NOW(),'%Y') group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
}
else if($_GET['logtimeHdr'] == "ITD")
{
$q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."'  group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
  $q_logs_all = "select distinct(client_id), count(*) as count , client_id, client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."'  group by login_date,client_id ";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_cnt = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."'  group by login_date,client_id order by count(*)  asc";
 $res_cnt = mysqli_query($conn,$q_logs_cnt);
}

 echo '<table width="100%" class="spFonts" cellpadding="1" cellspacing="0" style="table-layout:fixed;  word-wrap:break-word;">';
 echo '<tr>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Unique Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["unqLogsB2e"].'</td>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Multi Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["mulLogsB2e"].'</td>
   </tr>
   <tr style="background:#0066ff; color:#fff;">
    <th align="left" width="60px">Client ID</th>
	<th align="left" width="80px">Email ID</th>
	<th align="left" width="60px">User ID</th>
	<th align="left" width="60px">Login Date</th>
	<th align="left" width="60px">Login Time</th>
	<th align="left" width="60px">Logout Date</th>
	<th align="left" width="60px">Logout Time</th>
	<th align="center" width="50px">
	<select id="drpCountLogs" style="width:30px;" onchange="show_emp_oncount(this.value,document.getElementById(\'spClient\').innerHTML);">';
	for($i=0; $i<110; $i++)
	{
	 echo '<option value="'.$i.'">'.$i.'</option>';	
   }
echo '</select>
   </th>
   </tr>';
 if($res_logs)
 {
  while($row = mysqli_fetch_array($res_logs))
  {
    echo '<tr>';
	echo '<td align="left" width="60px">'.$row["client_id"].'</td>';
	echo '<td align="left" width="80px">'.$row["client_email"].'</td>';
	echo '<td align="left" width="60px">'.$row["client_Uname"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_time"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_time"].'</td>';
	echo '<td align="center" width="50px"><span style="color:#0066ff; text-decoration:underline; cursor:pointer;" onclick="show_emp(\''.$row["client_id"].'\',\''.$_GET['role'].'\');">'.$row["count"].'</span></td>';
	echo '</tr>';
  }
 }
 echo '</table>';

}

if(isset($_GET['empLogCount']) && isset($_GET['C']) && isset($_GET['role']))
{
  $q_logs_all = "select distinct(client_id) as client_id, count(*) as count , client_email, client_Uname, login_date, login_time , logout_date, logout_time from user_logs where client_role='".$_GET['role']."'  group by client_id  having count(*)='".$_GET['C']."'";
 $res_logs = mysqli_query($conn,$q_logs_all);
 
 $q_logs_mul = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."'  group by login_date,client_id having count(*)>1";
 $res_logs_mul = mysqli_query($conn,$q_logs_mul);
if($res_logs_mul)
 $_SESSION["mulLogsB2e"] = mysqli_num_rows($res_logs_mul); 

 $q_logs_unq = "select distinct(client_id), count(*) as count from user_logs where client_role='".$_GET['role']."' group by login_date,client_id having count(*)=1";
 $res_logs_unq = mysqli_query($conn,$q_logs_unq);
if($res_logs_unq)
 $_SESSION["unqLogsB2e"] = mysqli_num_rows($res_logs_unq); 
 
 echo '<table width="100%" class="spFonts" cellpadding="1" cellspacing="0" style="table-layout:fixed;  word-wrap:break-word;">';
 echo '<tr>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Unique Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["unqLogsB2e"].'</td>
   <td colspan="3" width="40%" align="right" style="background:#597272; color:#fff;">Multi Logins / day</td>
   <td colspan="1" width="10%" align="center" style="background:#ccc; color:#444;">'.$_SESSION["mulLogsB2e"].'</td>
   </tr>
   <tr style="background:#0066ff; color:#fff;">
    <th align="left" width="60px">Client ID</th>
	<th align="left" width="80px">Email ID</th>
	<th align="left" width="60px">User ID</th>
	<th align="left" width="60px">Login Date</th>
	<th align="left" width="60px">Login Time</th>
	<th align="left" width="60px">Logout Date</th>
	<th align="left" width="60px">Logout Time</th>
	<th align="center" width="50px">
	<select id="drpCountLogs" style="width:30px;" onchange="show_emp_oncount(this.value,document.getElementById(\'spClient\').innerHTML);">';
	for($i=0; $i<110; $i++)
	{
	 echo '<option value="'.$i.'">'.$i.'</option>';	
   }
echo '</select>
   </th>
   </tr>';
 if($res_logs)
 {
  while($row = mysqli_fetch_array($res_logs))
  {
    echo '<tr>';
	echo '<td align="left" width="60px">'.$row["client_id"].'</td>';
	echo '<td align="left" width="80px">'.$row["client_email"].'</td>';
	echo '<td align="left" width="60px">'.$row["client_Uname"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["login_time"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_date"].'</td>';
	echo '<td align="left" width="60px">'.$row["logout_time"].'</td>';
	echo '<td align="center" width="50px"><span style="color:#0066ff; text-decoration:underline; cursor:pointer;" onclick="show_emp(\''.$row["client_id"].'\',\''.$_GET['role'].'\');">'.$row["count"].'</span></td>';
	echo '</tr>';
  }
 }
 echo '</table>';
}


if(isset($_GET['LdTime']))
{

if($_GET['LdTime'] == "Tday")
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where lead_gen = DATE(NOW())";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['LdTime'] == "Yest")
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where lead_gen = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['LdTime'] == "Week")
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where lead_gen between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
	$res_lead = mysqli_query($conn,$q_lead);
 
 }
else if($_GET['LdTime'] == "MTD")
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where MONTH(lead_gen) = DATE_FORMAT(NOW(),'%m') ";
	$res_lead = mysqli_query($conn,$q_lead);
}

else if($_GET['LdTime'] == "YTD")
{

$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where YEAR(lead_gen) = DATE_FORMAT(NOW(),'%Y') ";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['LdTime'] == "ITD")
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler";
	$res_lead = mysqli_query($conn,$q_lead);
}


echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;	
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 $expr= date('d-m-Y', strtotime('+2 day', strtotime($row["lead_date"])));
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
		}  
	 }
	}
echo '</table>';

}

if(isset($_GET['QTime']))
{

if($_GET['QTime'] == "Tday")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where quote_dtls.quote_date=DATE(NOW())";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['QTime'] == "Yest")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where quote_dtls.quote_date= DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['QTime'] == "Week")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where quote_dtls.quote_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW())";
	$res_lead = mysqli_query($conn,$q_lead);
 
 }
else if($_GET['QTime'] == "MTD")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where MONTH(quote_dtls.quote_date)= DATE_FORMAT(DATE(NOW()),'%m')";
	$res_lead = mysqli_query($conn,$q_lead);
}

else if($_GET['QTime'] == "YTD")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id  where  YEAR(quote_dtls.quote_date)= DATE_FORMAT(DATE(NOW()),'%Y')";
	$res_lead = mysqli_query($conn,$q_lead);
}
else if($_GET['QTime'] == "ITD")
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id";
	$res_lead = mysqli_query($conn,$q_lead);
}


echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';
		}  
	 }
	}
echo '</table>';

}

if(isset($_GET['ldLoc']))
{
$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where loc_name like '%".$_GET['ldLoc']."%'";
	$res_lead = mysqli_query($conn,$q_lead);
	
	echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;	
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 $expr= date('d-m-Y', strtotime('+2 day', strtotime($row["lead_date"])));
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
		}  
	 }
	}
echo '</table>';

}

if(isset($_GET['QtLoc']))
{
$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, quote_dtls.quote_date, quote_dtls.qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where quote_dtls.locations like '%".$_GET['QtLoc']."%'";
	$res_lead = mysqli_query($conn,$q_lead);
	
	echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';
		}  
	 }
	}
echo '</table>';
}


if(isset($_GET['posttime']))
{
if($_GET['posttime'] == "Yest")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where pck_date=DATE_SUB(DATE(NOW()),INTERVAL 1 DAY) ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['posttime'] == "Tday")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where  pck_date=DATE(NOW())";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['posttime'] == "Week")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where pck_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW()) ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['posttime'] == "MTD")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where MONTH(pck_date)= DATE_FORMAT(DATE(NOW()),'%m') ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['posttime'] == "YTD")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where YEAR(pck_date)= DATE_FORMAT(DATE(NOW()),'%Y') ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
if($_GET['posttime'] == "ITD")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
  echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckPostMnth']) && isset($_GET['pckPostYear']))
{

  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id and YEAR(pck_date) = DATE_FORMAT(DATE(NOW()),'%".$_GET['pckPostYear']."') and MONTH(pck_date) = DATE_FORMAT(DATE(NOW()),'%".$_GET['pckPostMnth']."')";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);

 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['purctime']))
{
if($_GET['purctime'] == "Yest")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and date_of_purchase = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY) and DATE(NOW())";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
if($_GET['purctime'] == "Tday")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and date_of_purchase = DATE(NOW())";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
if($_GET['purctime'] == "Week")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and date_of_purchase between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
if($_GET['purctime'] == "MTD")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and MONTH(date_of_purchase) = DATE_FORMAT(DATE(NOW()),'%m')";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
if($_GET['purctime'] == "YTD")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and YEAR(date_of_purchase) = DATE_FORMAT(DATE(NOW()),'%Y')";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
if($_GET['purctime'] == "ITD")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}				 

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);				 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}


if(isset($_GET['invtime']))
{

if($_GET['invtime'] == "Yest")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.pck_date = DATE_SUB(DATE(NOW()),INTERVAL 1 DAY)  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

if($_GET['invtime'] == "Tday")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.pck_date = DATE(NOW())  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}				 

if($_GET['invtime'] == "Week")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.pck_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAY) and DATE(NOW())  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

if($_GET['invtime'] == "MTD")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where MONTH(b2b_pck_crt.pck_date) = DATE_FORMAT(DATE(NOW()),'%m')  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

if($_GET['invtime'] == "YTD")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where YEAR(b2b_pck_crt.pck_date) = DATE_FORMAT(DATE(NOW()),'%Y')  order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

if($_GET['invtime'] == "ITD")
{
 $q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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


if(isset($_GET['pckPostDtSort']))
{
if($_GET['pckPostDtSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by pck_date asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else if($_GET['pckPostDtSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by pck_date desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
 {
 $_GET['pckPostDtSort'] = date('Y-m-d', strtotime($_GET['pckPostDtSort']));
 $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where pck_date = '".$_GET['pckPostDtSort']."' ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash); 
 }
 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
				 echo '</table>';
}



if(isset($_GET['pckPostNameSort']))
{
if($_GET['pckPostNameSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.pck_name asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

else if($_GET['pckPostNameSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.pck_name desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}


 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}


if(isset($_GET['pckPostDurSort']))
{
if($_GET['pckPostDurSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.duration asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

else if($_GET['pckPostDurSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.duration desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}


 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckPostPrcSort']))
{
if($_GET['pckPostPrcSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.price asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

else if($_GET['pckPostPrcSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.price desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{
$prc1 = explode("-",$_GET['pckPostPrcSort']) ;
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.price between '".$prc1[0]."' and '".$prc1[1]."' ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';}


if(isset($_GET['pckPostVacSort']))
{
if($_GET['pckPostVacSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.price asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

else if($_GET['pckPostVacSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.price desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{

  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.trip_theme like '%".$_GET['pckPostVacSort']."%' ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckPostLocSort']))
{
if($_GET['pckPostLocSort']=="Asc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.locations asc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

else if($_GET['pckPostLocSort']=="Desc")
{
  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.locations desc ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}
else
{

  $q_pck_dash ="select b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.locations like '%".$_GET['pckPostLocSort']."%' ";
  $res_pck_dash = mysqli_query($conn,$q_pck_dash);
}

 echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444" cellspacing="0">';
		 if($res_pck_dash)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash))
				   {
				     $day = explode("-",$row["pck_date"]);
					  $vac = explode(", ",$row["trip_theme"]);
					   $loc = explode(",",$row["locations"]);
					  echo '<tr>';
					 echo '<td width="100px">'.$row["pck_date"].'</td>';
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';
					 echo '<td width="100px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
					 echo '<td width="150px">'.$vac[0].'</td>';
					 echo '<td width="100px">'.$loc[0].'</td>';
					 echo '</tr>';
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckPurcYear']) && isset($_GET['pckPurcMonth']))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' and YEAR(date_of_purchase) = DATE_FORMAT(DATE(NOW()),'%".$_GET['pckPurcYear']."') and MONTH(date_of_purchase) = DATE_FORMAT(DATE(NOW()),'%".$_GET['pckPurcMonth']."')";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);				 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}


if(isset($_GET['pckPurcDtSort']))
{
if($_GET['pckPurcDtSort'] == "Asc")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' order by date_of_purchase asc";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else if($_GET['pckPurcDtSort'] == "Desc")
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package'  order by date_of_purchase desc";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
else
{
$date = date('Y-m-d', strtotime($_GET['pckPurcDtSort']));
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package'  where date_of_purchase = '".$date."'";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
}
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);				 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckPurcNameSort']))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['pckPurcNameSort'] == "Asc")
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by pck_name asc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);
}
				 else if($_GET['pckPurcNameSort'] == "Desc")
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by pck_name desc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);
}					 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';



}

if(isset($_GET['pckPurcVacSort']))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);
echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
				   if($_GET['pckPurcVacSort'] == "Asc")
				   {
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by trip_theme asc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);	
				   }
				   else if($_GET['pckPurcVacSort'] == "Desc")
				   {
				   $pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by trip_theme desc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);	
				   }
				   else
				   {
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' and trip_theme like '%".$_GET['pckPurcVacSort']."%' ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);	
}			 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}


if(isset($_GET['pckPurcPrcSort']))
{
$prc = explode("-",$_GET['pckPurcPrcSort']);

$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id  where category='Package' ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
 if($res_pckpurc_dash)
 {
  while($r = mysqli_fetch_array($res_pckpurc_dash))
  {
if($_GET['pckPurcPrcSort'] == "Asc")
{	
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by price asc";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);
}
else if($_GET['pckPurcPrcSort'] == "Desc")
{
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by price desc";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);
}
else
{			   
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' and price between '".$prc[0]."' and '".$prc[1]."'";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);				 
}
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';



}

if(isset($_GET['pckPurcDurSort']))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package'  ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {

$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' and duration='".$_GET['pckPurcDurSort']."'";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);

					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';

}

if(isset($_GET['pckPurcLocSort']))
{
$q_pckpurc_dash ="select DATE_FORMAT(date_of_purchase,'%d-%m-%Y') as purc_date , buy_pck.pck_id , buy_pck.book_id, buy_pck.trxn_id, b2b_profile.company_name from buy_pck inner join b2b_profile on buy_pck.posted_by = b2b_profile.client_id where category='Package' ";
$res_pckpurc_dash = mysqli_query($conn,$q_pckpurc_dash);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left; width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';  			
				 if($res_pckpurc_dash)
				 {
				   while($r = mysqli_fetch_array($res_pckpurc_dash))
				   {
if($_GET['pckPurcLocSort'] == "Asc")
{				   
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by locations asc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);	
}
else if($_GET['pckPurcLocSort'] == "Desc")
{
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' order by locations desc ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);	
}	
else
{
$pck_dtls = "select pck_date, trip_theme, locations, duration, price, pck_name from b2b_pck_crt where pck_id='".$r["pck_id"]."' and locations like '%".$_GET['pckPurcLocSort']."%' ";
$res_pck_dtls = mysqli_query($conn,$pck_dtls);
}		 
					 if($res_pck_dtls)
					 {
					 while($row = mysqli_fetch_array($res_pck_dtls))
					 {
				     $day = explode("-",$r["purc_date"]);
					 $vac = explode(",",$row["trip_theme"]);
					 $loc = explode(",",$row["locations"]);
				     echo '<tr>';
					 echo '<td width="90px">'.$r["purc_date"].'</td>';
					  echo '<td width="100px">'.$loc[0].'...</td>';
					  echo '<td width="100px">'.$vac[0].'...</td>';
					 echo '<td width="80px">'.$row["duration"].'</td>';
					 echo '<td align="center" width="80px" >'.$row["price"].'</td>';
					 echo '<td width="100px">'.$r["company_name"].'</td>';			
					  echo '<td width="80px">'.$row["pck_name"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["book_id"].'</td>';
					    echo '<td width="80px" style="word-wrap:break-word;">'.$r["trxn_id"].'</td>';
					 echo '</tr>';
					 }
					 }
				   }
				 }
				 echo '</table>';
}

if(isset($_GET['pckInvValidSort']))
{
if($_GET['pckInvValidSort'] == "Asc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id  order by b2b_pck_crt.validity asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['pckInvValidSort'] == "Desc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.validity desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.validity like '%".$_GET['pckInvValidSort']."%'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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

if(isset($_GET['pckInvVacSort']))
{
if($_GET['pckInvVacSort'] == "Asc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.trip_theme asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['pckInvVacSort'] == "Desc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.trip_theme desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.trip_theme like '%".$_GET['pckInvVacSort']."%'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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


if(isset($_GET['pckInvPrcSort']))
{
if($_GET['pckInvPrcSort'] == "Asc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by  b2b_pck_crt.price asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['pckInvPrcSort'] == "Desc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by  b2b_pck_crt.price desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else
{
$prc = explode("-",$_GET['pckInvPrcSort']);
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where b2b_pck_crt.price between '".$prc[0]."' and '".$prc[1]."'";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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

if(isset($_GET['pckInvNameSort']))
{
if($_GET['pckInvNameSort'] == "Asc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by  b2b_pck_crt.pck_name asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['pckInvNameSort'] == "Desc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by  b2b_pck_crt.pck_name desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}


echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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

if(isset($_GET['pckInvDtSort']))
{
if($_GET['pckInvDtSort'] == "Asc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by  b2b_pck_crt.pck_date asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}
else if($_GET['pckInvDtSort'] == "Desc")
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id order by b2b_pck_crt.pck_date desc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);
}


echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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

if(isset($_GET['invMonth']) && isset($_GET['invYear']))
{
$q_pck_dash_inv ="select b2b_pck_crt.pck_id, b2b_pck_crt.pck_name, b2b_pck_crt.duration, b2b_pck_crt.price, b2b_pck_crt.trip_theme, b2b_pck_crt.locations, b2b_pck_crt.validity, b2b_pck_crt.inventory, DATE_FORMAT(`pck_date`,'%d-%m-%Y') as pck_date, b2b_profile.company_name from b2b_pck_crt inner join b2b_profile on b2b_pck_crt.client_id = b2b_profile.client_id where MONTH(b2b_pck_crt.pck_date) = DATE_FORMAT(DATE(NOW()), '%".$_GET['invMonth']."') and YEAR(b2b_pck_crt.pck_date) = DATE_FORMAT(DATE(NOW()), '%".$_GET['invYear']."') order by  b2b_pck_crt.pck_date asc";
$res_pck_dash_inv = mysqli_query($conn,$q_pck_dash_inv);

echo '<table class="font-medium" border="1px solid #DDD" style="text-align:left;width:100%; font-size:14px; table-layout:fixed; color:#444;" cellspacing="0">';
                if($res_pck_dash_inv)
				 {
				   while($row = mysqli_fetch_array($res_pck_dash_inv))
				   {
				   $cnt_pck = "select pck_id, book_id, trxn_id  from buy_pck where  pck_id='".$row["pck_id"]."'";
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
					 echo '<td width="100px">'.$row["company_name"].'</td>';
					 echo '<td width="120px">'.$row["pck_name"].'</td>';					
					 echo '<td align="center" width="120px">'.$row["price"].'</td>';
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

if(isset($_GET['leadDate1']) && isset($_GET['leadDate2']))
{
$date1 = date('Y-m-d', strtotime($_GET['leadDate1']));
$date2 = date('Y-m-d', strtotime($_GET['leadDate2']));

echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_lead = "select client_id, lead_id, wl_id, DATE_FORMAT(lead_gen,'%d-%m-%Y %H:%i:%s') as lead_gen, lead_date, loc_name from cust_trip_trvler where lead_date between '".$date1."' and '".$date2."'";
	$res_lead = mysqli_query($conn,$q_lead);
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 $expr= date('d-m-Y', strtotime('+2 day', strtotime($row["lead_date"])));
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["wl_id"].'</td>';
	  echo '<td width="100px" align="left">'.$row["loc_name"].'</td>';
	 echo '<td width="100px" align="left">'.$row["lead_gen"].'</td>';		
	 echo '<td width="80px" align="left">'.$expr.'</td>';
	 echo '<tr>';	
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['quoteDt1']) && isset($_GET['quoteDt2']))
{
$date1 = date('Y-m-d', strtotime($_GET['quoteDt1']));
$date2 = date('Y-m-d', strtotime($_GET['quoteDt2']));

echo '<table width="100%" cellspacing="0" cellpadding="1px" class="spFonts" style="table-layout:fixed; font-size:12px; word-wrap:break-word;">';
	$k=0;
	$q_lead = "select quote_dtls.client_id, quote_dtls.lead_id, quote_dtls.quote_id, DATE_FORMAT(quote_dtls.quote_date,'%d-%m-%Y') as quote_date, DATE_FORMAT(quote_dtls.qt_expire_date,'%d-%m-%Y') as qt_expire_date, quote_dtls.locations, b2b_profile.company_name from quote_dtls inner join b2b_profile on quote_dtls.client_id = b2b_profile.client_id where quote_dtls.quote_date between '".$date1."' and '".$date2."' ";
	$res_lead = mysqli_query($conn,$q_lead);
	if($res_lead)
	{
	 while($row = mysqli_fetch_array($res_lead))
	 {
	 $k++;
	 if($k%2 == 0)
	 {	   
	 echo '<tr style="background:#eee;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';	
	   }
	   else
	    {
	echo '<tr style="background:#fff;">';
	 echo '<td width="50px" align="left">'.$row["client_id"].'</td>';
	  echo '<td width="80px" align="left">'.$row["company_name"].'</td>';
	 echo '<td width="50px" align="left">'.$row["quote_id"].'</td>';
	 echo '<td width="50px" align="left">'.$row["lead_id"].'</td>';
	 echo '<td width="100px" align="left">'.$row["locations"].'</td>';
	  echo '<td width="60px" align="left">'.$row["quote_date"].'</td>';
	 echo '<td width="60px" align="left">'.$row["qt_expire_date"].'</td>';		
	 echo '<tr>';
		}  
	 }
	}
echo '</table>';
}

if(isset($_GET['qcncncl']) && isset($_GET['MYID']))
{
$q_qcncncl = "select slno, cncl_ID, cncl_type, cncl_req_date, cncl_process_date, refund_date, refund_amount, pck_id, trxn_id, b2b_posted, reason, emp_id_cnclled from cancel_tab";
$res_qcncncl = mysqli_query($conn,$q_qcncncl);

echo '<div style="float:left; width:100%; height:400px; overflow-y:scroll; overflow-x:hidden">
<table width="100%" cellpadding="1" cellspacing="0" style="table-layout:fixed; word-wrap:break-word; background:#0066ff; color:#fff; font-size:12px;">
    <tr>
	  <th width="35px">SlNo</th>
	  <th width="60px">CancelID</th>
	  <th width="60px">Cancel Type</th>
	  <th width="60px">Request Date</th>
	  <th width="60px">Cancel Date</th>
	  <th width="60px">Refund Date</th>
	  <th width="60px">Refund Amount</th>
	  <th width="80px">Package ID</th>
	  <th width="60px">Transaction ID</th>
	  <th width="80px">Posted By</th>
	  <th width="100px">Reason for Cancel</th>
	</tr>
';
if($res_qcncncl)
{
while($row = mysqli_fetch_array($res_qcncncl))
{
  echo '<tr>';
  echo '<td>'.$row["slno"].'</td>';
  echo '<td>'.$row["cncl_ID"].'</td>';
  echo '<td>'.$row["cncl_type"].'</td>';
  echo '<td>'.$row["cncl_req_date"].'</td>';
  echo '<td>'.$row["cncl_process_date"].'</td>';
  echo '<td>'.$row["refund_date"].'</td>';
  echo '<td>'.$row["refund_amount"].'</td>';
  echo '<td>'.$row["pck_id"].'</td>';
  echo '<td>'.$row["trxn_id"].'</td>';
  echo '<td>'.$row["b2b_posted"].'</td>';
  echo '<td>'.$row["reason"].'</td>'; 
  echo '</tr>';  
}
}
echo '</table></div>';
}

if(isset($_GET['cnclpck_id']) && isset($_GET['cncltrxn_id']) && isset($_GET['MYID']) && isset($_GET['Req_Dt']) && isset($_GET['Reason']) && isset($_GET['Req_ID']))
{

$refDt="";

$_GET['Req_Dt'] = date('Y-m-d', strtotime($_GET['Req_Dt']));
$buy_tab = "select pck_id, trxn_id, category, DATE_FORMAT(dept_date,'%d-%m-%Y') as dept_date, total_amount from buy_pck where trxn_id='".$_GET['cncltrxn_id']."' and pck_id='".$_GET['cnclpck_id']."' ";
$res_buy = mysqli_query($conn,$buy_tab);

$dedt_tab = "select deductions from b2b_pck_crt where pck_id='".$_GET['cnclpck_id']."'";
$res_dedt = mysqli_query($conn,$dedt_tab);

if($res_buy)
{
while($rBuy = mysqli_fetch_array($res_buy))
{
  $pck_prc = $rBuy["total_amount"];
  $dept_dt = $rBuy["dept_date"];
  $deptDt = date('Y-m-d', strtotime($rBuy['dept_date']));
  $cate = $rBuy["category"];
}
}

$date1=date_create($_GET['Req_Dt']);
$date2=date_create($deptDt);
$diff=date_diff($date1,$date2);

if($res_dedt)
{
while($row = mysqli_fetch_array($res_dedt))
{
  $dedt = $row["deductions"];
}
}

$date=date_create(date('Y-m-d'));
date_add($date,date_interval_create_from_date_string("3 days"));


echo '<table class="spFonts" width="100%" cellpadding="1px" cellspacing="0" style="table-layout:fixed;">
     <tr style="background:#eee;">
	   <th align="right">Package ID:</th>
	   <td align="left" style="color:#ff0000;">'.$_GET['cnclpck_id'].'</td>
	 </tr>
	 <tr style="background:#fff;">
	   <th align="right">Transaction ID:</th>
	   <td align="left" style="color:#ff0000;">'.$_GET['cncltrxn_id'].'</td>
	 </tr>
	 <tr style="background:#eee;">
	   <th align="right">Total Price:</th>
	   <td align="left" style="color:#ff0000;">'.$pck_prc.'</td>
	 </tr>
	 <tr style="background:#fff;">
	   <th align="right">Cancelled On:</th>
	<td align="left"> <input type="text" id="cncl_dt" name="cncl_dt" readonly="true" class="txtbox_Tab" value="'.date('d-m-Y').'" style="width:100px; float:none; border:0px; background:transparent; color:#ff0000; font-size:12px;" onclick="oDP.show(event,this.id,2); show_block(\'datepicker\');" /></td>
	 </tr>
	  <tr style="background:#eee;">
	   <th align="right">Departure date:</th>
	   <td align="left" style="color:#ff0000;"><span id="deptDt">'.$dept_dt.'</span></td>
	 </tr>
	 <tr style="background:#fff;">
	   <th align="right"># days prior:</th>
	   <td align="left" style="color:#ff0000;"><span id="daysPrior">'; echo $diff->format("%R%a Days"); echo '</span></td>
	 </tr>
	 <tr style="background:#eee;">
	   <th align="right">Deduction Rules:</th>
	   <td align="left" style="color:#ff0000;">'.$dedt.'</td>
	 </tr>
	 <tr style="background:#fff;">
	   <th align="right">% Deducted:</th>
	   <td align="left"><input class="txtbox_Tab" style="width:80px; float:none;" id="percDedt" placeholder="%deducted" onchange="cal_prc(this.value,\''.$pck_prc.'\');" /></td>
	 </tr>
      <tr style="background:#fff;">
	  <th align="right">Refund Amount:</th>
	  <td align="left"><input readonly="true" type="text" id="ref_amt" name="ref_amt" class="txtbox_Tab" style="width:100px;"/></td>
	 </tr>	 
	 <tr style="background:#eee;">
	  <th align="right">Refund On:</th>
	  <td align="left"><input type="text" id="ref_dt" name="ref_dt" value="'.date_format($date,"d-m-Y").'" class="txtbox_Tab" style="width:100px;" onclick="oDP.show(event,this.id,2); show_block(\'datepicker\');" /></td>
	 </tr>
	 <tr style="background:#fff;">
	  <th align="right">Cancel done by:</th>
	  <td align="left" style="color:#ff0000;">'.$_GET['MYID'].'</td>
	 </tr>
	 <tr><tD colspan="2" align="center"><input type="button" value="submit" class="smallbtn" style="width:60px; float:none;" onclick="insrt_cncl(\'percDedt\',\'ref_dt\',\''.$_GET['Reason'].'\',\''.$_GET['MYID'].'\',\''.$_GET['Req_ID'].'\',\''.$_GET['Req_Dt'].'\',\''.$_GET['cnclpck_id'].'\',\''.$_GET['cncltrxn_id'].'\');" /></tD></tr>
   </table>';
}


if(isset($_GET['Perc']) && isset($_GET['Ref_Dt']) && isset($_GET['Reason']) && isset($_GET['MYID']) && isset($_GET['Req_ID']) && isset($_GET['Req_Dt']) && isset($_GET['trxnID']) && isset($_GET['pckID']))
{
$b2bName = "";
$_GET['Req_Dt'] = date('Y-m-d', strtotime($_GET['Req_Dt']));
$_GET['Ref_Dt'] = date('Y-m-d', strtotime($_GET['Ref_Dt']));

$buy_tab = "select pck_id, trxn_id, category, posted_by, user_id, dept_date, total_amount from buy_pck where trxn_id='".$_GET['trxnID']."' and pck_id='".$_GET['pckID']."' ";
$res_buy = mysqli_query($conn,$buy_tab);

if($res_buy)
{
while($rBuy = mysqli_fetch_array($res_buy))
{
  $pck_prc = $rBuy["total_amount"];
  $dept_dt = $rBuy["dept_date"];
  $deptDt = date('Y-m-d', strtotime($rBuy['dept_date']));
  $cate = $rBuy["category"];
  $userID= $rBuy["user_id"];
  $clientID= $rBuy["posted_by"];
}
}

$date1=date_create($_GET['Req_Dt']);
$date2=date_create($deptDt);
$diff=date_diff($date1,$date2);

if($cate == "Package")
$cnclID = "XCP".$_GET['Req_ID'].date('dmY');
else if($cate == "Quote")
$cnclID = "XCQ".$_GET['Req_ID'].date('dmY');

$percAmt = (int)$pck_prc * ((int)$_GET['Perc']/100); 
$refAmt = (int)$pck_prc - $percAmt;

$selComp = "select company_name from b2b_profile where client_id='".$clientID."'";
$res_sel = mysqli_query($conn,$selComp);
while($r = mysqli_fetch_array($res_sel))
{
$b2bName = $r["company_name"];
}

$insrt_cncl = "insert into cancel_tab values('".$userID."','".$cnclID."','".$cate."','".$dept_dt."','".$_GET['Req_Dt']."','".$diff->format("%R%a")."','".date('Y-m-d')."','".$_GET['Perc']."','".$_GET['Ref_Dt']."','".$refAmt."','".$_GET['pckID']."','".$_GET['trxnID']."','".$b2bName."','".$_GET['Reason']."','".$_GET['MYID']."','Closed')";

$res_cncl = mysqli_query($conn,$insrt_cncl);
if($res_cncl)
{
echo '<script type="text/javascript">';
echo 'alert(\'Success : Booking has been cancelled\')';
echo '</script>';
}
else
{
echo '<script type="text/javascript">';
echo 'alert(\'Error : Try again later\')';
echo '</script>';
}

}

if(isset($_GET['qcncltime']))
{
if($_GET['qcncltime'] == "Yest")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where cncl_process_date=DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['qcncltime'] == "Tday")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where cncl_process_date=DATE(NOW())";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['qcncltime'] == "Week")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where cncl_process_date between DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and DATE(NOW())";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['qcncltime'] == "MTD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where MONTH(cncl_process_date)=DATE_FORMAT(DATE(NOW()),'%m')";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['qcncltime'] == "YTD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab where YEAR(cncl_process_date)=DATE_FORMAT(DATE(NOW()),'%Y')";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

if($_GET['qcncltime'] == "ITD")
{
$cncl_tab = "select cncl_id, cncl_type, trxn_id, reason, deductions, date_format(cncl_process_date,'%d-%m-%Y') as cncl_process_date, date_format(refund_date,'%d-%m-%Y') as refund_date, refund_amount, date_format(cncl_req_date,'%d-%m-%Y') as cncl_req_date  from cancel_tab ";
$res_cncl = mysqli_query($conn,$cncl_tab);
}

$k=0;
if($res_cncl)
{
echo '<table id="tab_closecncl" class="spFonts" cellpspacing="0" width="100%" style="float:left; table-layout:fixed; word-wrap:break-word; font-size:12px;">
  <tr style="background:#283C5F; color:#FFF;">
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



if(isset($_GET['querytime']))
{
if($_GET['querytime'] == "Yest")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab where query_date= DATE_SUB(DATE(NOW()),INTERVAL 1 DAYS)";
 $res_query = mysqli_query($conn,$q_query);
}
if($_GET['querytime'] == "Tday")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab where query_date= DATE(NOW())";
 $res_query = mysqli_query($conn,$q_query);
}

if($_GET['querytime'] == "Week")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab where query_date between DATE_SUB(DATE(NOW()),INTERVAL 7 DAYS) and DATE(NOW())";
 $res_query = mysqli_query($conn,$q_query);
}

if($_GET['querytime'] == "MTD")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab where MONTH(query_date)= DATE_FORMAT(DATE(NOW()), '%m')";
 $res_query = mysqli_query($conn,$q_query);
}

if($_GET['querytime'] == "YTD")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab where YEAR(query_date)= DATE_FORMAT(DATE(NOW()), '%Y')";
 $res_query = mysqli_query($conn,$q_query);
}

if($_GET['querytime'] == "ITD")
{
 $q_query= "select query_id, query_type, DATE_FORMAT(query_date,'%d-%m-%Y') as query_date, query_comment, response_id, DATE_FORMAT(response_date,'%d-%m-%Y') as response_date, response_comment, query_by, resp_client_id, status from query_tab";
 $res_query = mysqli_query($conn,$q_query);
}

echo '<table class="spFonts" cellpadding="1" cellspacing="0" width="100%">
<tr>
<th>QueryID</th>
<th>Query Type</th>
<th>Query Date</th>
<th>Details</th>
<th>Response ID</th>
<th>Response Date</th>
<th>Query By</th>
<th>Responded By</th>
<th>Status</th>
</tr>';

if($res_query)
 {
 while($row = mysqli_fetch_array($res_query))
 {
  echo '<tr>';
  echo '<td>'.$row["query_id"].'</td>';
  echo '<td>'.$row["query_type"].'</td>';
  echo '<td>'.$row["query_date"].'</td>';
  echo '<td><span style="color:#0066ff; cursor:pointer;" onclick="readQuery_Resp(\''.$row["query_id"].'\');">Read..</span></td>';
  echo '<td>'.$row["response_id"].'</td>';
  echo '<td>'.$row["response_date"].'</td>';
  echo '<td>'.$row["query_by"].'</td>';
  echo '<td>'.$row["resp_client_id"].'</td>';
  echo '<td>'.$row["status"].'</td>';
  echo '</tr>'; 
 }
 }
echo '</table>';
}

if(isset($_GET['QueryID']))
{
echo '<div style="float:left; width:100%">
<span style="float:right;"><img src="Images/closebtn.png" width="30px" height="30px" onclick="hide_block(\'div_qresp\');" /></span>
</div>';
$q_resp= "select query_comment, response_comment from query_tab where query_id='".$_GET['QueryID']."'";
$res_resp = mysqli_query($conn,$q_resp);
if($res_resp)
{
while($row= mysqli_fetch_array($res_resp))
{
echo '<div style="width:100%; float:left">
 <h4>Query</h4>
 <p>'.$row["query_comment"].'</p>
</div>';
echo '<div style="width:100%; float:left">
 <h4>Response</h4>
 <p>'.$row["response_comment"].'</p>
</div>';
}
}
}

?>