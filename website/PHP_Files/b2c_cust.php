<?php

include("PHP_Connection.php");

static $countLogin = 0;
$reset="";

if(isset($_POST['b2CLogin']))
{
$q_cust_id_Eml = "select client_id, client_email from client_register where client_role='CUSTOMER' and client_email = '".$_POST["txtLogId_b2c"]."'";
$res_cust_Eml = mysqli_query($conn,$q_cust_id_Eml);
$rows_custEml = mysqli_num_rows($res_cust_Eml);

$q_cust_idU_Eml = "select user_status from user_tab where user_role='CUSTOMER' and user_email='".$_POST["txtLogId_b2c"]."'  or user_id='".$_POST["txtLogId_b2c"]."' and user_role='CUSTOMER'";
$res_custU_Eml = mysqli_query($conn,$q_cust_idU_Eml);
$res_custUEml = mysqli_num_rows($res_custU_Eml);

if($rows_custEml > 0 && $res_custUEml == 0)
{
$thnk_reg = true;
 $lnk = "Pwd_reset.php?emlID=".$_POST["txtLogId_b2c"];
}
else if($res_custUEml >0)
{
$q_cust_eml_status = "select user_pwd, user_email from user_tab where user_role='CUSTOMER' and user_email='".$_POST["txtLogId_b2c"]."' and user_status='Active' or user_id='".$_POST["txtLogId_b2c"]."' and user_role='CUSTOMER' and user_status='Active'";  
  $res_pwd_status = mysqli_query($conn,$q_cust_eml_status);
  $rows_eml_status = mysqli_num_rows($res_pwd_status);

 if($rows_eml_status>0)
 {
  $q_chk_pwd_Eml = "select client_id, user_pwd, user_id, user_email from user_tab where user_email='".$_POST["txtLogId_b2c"]."' and user_pwd='".$_POST["txtLogPwd_b2c"]."' or user_id='".$_POST["txtLogId_b2c"]."' and user_pwd='".$_POST["txtLogPwd_b2c"]."'";
  $res_chk_pwd_Eml = mysqli_query($conn,$q_chk_pwd_Eml);
  $row_chk_pwd_Eml = mysqli_num_rows($res_chk_pwd_Eml);
  if($row_chk_pwd_Eml > 0)
    {	
while($r = mysqli_fetch_array($res_chk_pwd_Eml))
{
  $userID = $r["user_id"];
  $userEml = $r["user_email"];
  $clientId = $r["client_id"];
   $_SESSION["userEmail"] = $r["user_email"];
}
	  $post_log=true;
	  
	  $insrt_log = "insert into user_logs values ('','".$clientId."','".$userEml."','".$userID."','".date('Y-m-d')."','".date('H:i:s')."','','','CUSTOMER')";
   $res_log = mysqli_query($conn,$insrt_log);	
	
	 }
   else
     {
	 while($rP = mysqli_fetch_array($res_pwd_Eml))
	  {
	  $_SESSION["userEmail"] = $rP["user_email"];
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
 echo 'alert(\'Invalid Username and password\');';
 echo '</script>';
 }
  
}


if(isset($_POST['btnReg_eml']))
{
$q_chk_clnt = "select client_email, Client_UName from client_register where client_email='".$_POST["txtReg_email"]."'";
$res_chk_clnt = mysqli_query($conn,$q_chk_clnt);
if($res_chk_clnt)
$row_chk_eml = mysqli_num_rows($res_chk_clnt);

if($row_chk_eml > 0 )
{
  echo '<script type="text/javascript">';
	echo 'alert(\'This email-id is already registered with us.<br/> Please check you mail for password reset link.\')';
	echo '</script>';
	 $thnk_reg = true;
	 $lnk = "Pwd_reset.php?emlID=".$_POST["txtReg_email"];
}


else
{
  $q_reg_cust = "insert into client_register values('','CUSTOMER','".addslashes($_POST["txtReg_email"])."','','Register','','','".date('Ymd')."')";
  $res_reg_cust = mysqli_query($conn,$q_reg_cust);
  if($res_reg_cust)
  {
   echo '<script type="text/javascript">';
	echo 'alert(\'Success: You are registered.<br/> Please check your email id for password link.\')';
	echo '</script>';
	 $thnk_reg = true;
	 $lnk = "Pwd_reset.php?emlID=".$_POST["txtReg_email"];
  }

}
}

if(isset($_POST['btnReset_pwd']))
{
if($_POST["txtPwd_client"] == $_POST["txtc_pwd"])
{

$q_chk_user_eml = "select user_id, user_email from user_tab where user_email = '".$_GET["emlID"]."' or user_id = '".$_GET["emlID"]."'";
$res_chk_user_eml = mysqli_query($conn,$q_chk_user_eml);
$row_user_eml = mysqli_num_rows($res_chk_user_eml);

if($row_user_eml >  0)
{
$updt_userPwd = "update user_tab set user_pwd = '".addslashes($_POST["txtPwd_client"])."', resetlink_by='".$_GET["emlID"]." on-".date('Y-m-d')."' where user_email='".$_GET["emlID"]."' or user_id='".$_GET["emlID"]."' ";
$res_userPwd = mysqli_query($conn,$updt_userPwd);
if($res_userPwd)
{
  echo '<script type="text/javascript">';
  echo 'alert(\'Success: Your Password is reset.\')';
  echo '</script>';
}
}

else
{
   $q_get_clnt_id = "select client_id, client_role, linkedUser from client_register where client_email='".$_GET["emlID"]."'";
   $res_clnt_id = mysqli_query($conn,$q_get_clnt_id);	
   
   if($res_clnt_id)	
   {
     while($row = mysqli_fetch_array($res_clnt_id))
	 {

 if($row["client_role"] =="B2B_Partner_Operator" && $row["linkedUser"] == "Sub-User")
  {
	 $q_insrt_clnt = "insert into user_tab values('".$row["client_id"]."','".$_POST["txtID_client"]."','".$_GET["emlID"]."','".$_POST["txtPwd_client"]."','YES','".$row["client_role"]."','Active','".date('Ymd')."','','');";
  }
else
  {	
   $q_insrt_clnt = "insert into user_tab values('".$row["client_id"]."','".$_POST["txtID_client"]."','".$_GET["emlID"]."','".$_POST["txtPwd_client"]."','NO','".$row["client_role"]."','Active','".date('Ymd')."','','');";
   }
   
   $res_insrt_clnt = mysqli_query($conn,$q_insrt_clnt);   
    $q_up_status = "update client_register set status='SignedUp', client_UName='".$_POST["txtID_client"]."' where client_id='".$row["client_id"]."'";
	
   if($res_insrt_clnt)
   {
   mysqli_query($conn,$q_up_status);
     echo '<script type="text/javascript">';
	 echo 'alert(\'Success: Your password is set.\')';
	 echo '</script>';
   }
   else
   {
   echo "Error :".mysqli_error($conn);
     echo '<script type="text/javascript">';
	 echo 'alert(\'Error: Please try again.\')';
	 echo '</script>';
	 }
	}

	 }
    }
	
}

else
{
 echo '<script type="text/javascript">';
	 echo 'alert(\'Error: Passwords do not match.\')';
	 echo '</script>';
}

}

if(isset($_POST['b2c_logout']))
{
  $post_log=false;
  $insrt_log = "update user_logs set logout_date='".date('Y-m-d')."' , logout_time = '".date('H:i:s')."' where client_id='".$_SESSION["clientID"]."' and logout_date='0000-00-00' and logout_time='00:00:00'";
   $res_log = mysqli_query($conn,$insrt_log);	
 if($res_log)
 { 
   echo '<script type="text/javascript"> ';
   echo 'alert(\'You are logged out\')';
   echo '</script>';
    
  session_destroy(); 
  $_POST["txtLogId_b2c"] = "";
  $_POST["txtLogPwd_b2c"]="";
  $_GET["status"]="Login";
  header("Location:Cust_Page.php?status=Login"); 
}
}


?>