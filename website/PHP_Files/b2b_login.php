<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
session_start();

include("PHP_Connection.php");
date_default_timezone_set("Asia/Calcutta");

$page_status="";
$leads_page=false;
$aft_log=false;
$quote = false;
$reg_msg="";

//..................................................................... B2b Register flags .............................................................

$cmpn_name ="";
$hdq_loc="";
$req_name="";
$empCode="";
$design="";
$reg_off="";
$state="";
$tab_perEml="";
$prefEml="";
$cellNo="";
$landNo="";


//-------------Sub-User flags -------------

$txtEmpCode = "";
$txtEmpName ="";
$txtEmpEml ="";
$txtEmpLoc = "";
$txtEmpDesig ="";

//----- Access Flags ------------------
	 
$acc_pck_yes=false;
$acc_dash_yes=false;
$acc_ld_yes=false;
$acc_serv_yes=false;
$acc_prof_yes=false;
$acc_pay_yes=false;


if(isset($_POST['b2bLogin']))
{
 $q_blogin = "select user_email, user_id, user_pwd from user_tab where user_email ='".$_POST["txtLogId_b2b"]."' and user_pwd='".$_POST["txtLogPwd_b2b"]."' and user_role='B2B_Partner_Operator' and user_status='Active' ";
  $res_blogin = mysqli_query($conn,$q_blogin);
  $res_num_rows = mysqli_num_rows($res_blogin);
  
  $q_idblogin = "select user_email, user_id, user_pwd from user_tab where user_id ='".$_POST["txtLogId_b2b"]."' and user_pwd='".$_POST["txtLogPwd_b2b"]."' and user_role='B2B_Partner_Operator' and user_status='Active'";
  $res_idlogin = mysqli_query($conn,$q_idblogin);
  $res_id_rows = mysqli_num_rows($res_idlogin);
  
  $q_blogin_id = "select client_email, client_ID from client_register where client_email ='".$_POST["txtLogId_b2b"]."'";
  $res_blogin_id = mysqli_query($conn,$q_blogin_id);
  $res_num_rows_id = mysqli_num_rows($res_blogin_id);

 
 if($res_num_rows >0)
  {  
   $leads_page=true;
 
   $_GET["status"]=""; 
	while($r = mysqli_fetch_array($res_blogin))
	{
	 $q_b_dtls = "select client_id, logo_pic, requester_name, company_name, email_id_prof, mobile, Acc_lds, Acc_pckg, Acc_dashb, Acc_serv, Acc_prof, Acc_pay from b2b_profile where email_id_prof='".$r["user_email"]."'";
   $res_b_dtls = mysqli_query($conn,$q_b_dtls); 
    while($row = mysqli_fetch_array($res_b_dtls))
	{ 	 
		  $_SESSION["clientID"] = $row["client_id"];
		  $_SESSION["FullName"]= $row["requester_name"];
		  $_SESSION["CompName"] = $row["company_name"];
		  $_SESSION["userID"] = $row["email_id_prof"];
		  $_SESSION["logoPic"] = $row["logo_pic"];
		  $_SESSION["userEmail"] = $row["email_id_prof"];
		  $_SESSION["Phone"] = $row["mobile"];
		  
		  $lds = explode("-",$row["Acc_lds"]);
		  $pckg = explode("-",$row["Acc_pckg"]);
		  $dashb = explode("-",$row["Acc_dashb"]);
		  $serv = explode("-",$row["Acc_serv"]);
		  $prof = explode("-",$row["Acc_prof"]);
		  $pay = explode("-",$row["Acc_pay"]);
		  
		  if($lds[0] == "YES")
		    $acc_ld_yes = true;
		 if($pckg[0] == "YES")
		    $acc_pck_yes = true;
		 if($dashb[0] == "YES")
		    $acc_dash_yes = true;
		 if($serv[0] == "YES")
		    $acc_serv_yes = true;
		 if($prof[0] == "YES")
		    $acc_prof_yes = true;
		 if($pay[0] == "YES")
		    $acc_pay_yes = true;	
			   
   $insrt_log = "insert into user_logs values ('','".$row["client_id"]."','".$r["user_email"]."','".$r["user_id"]."','".date('Y-m-d')."','".date('H:i:s')."','','','B2B_Partner_Operator')";
   $res_log = mysqli_query($conn,$insrt_log);				
		  	
	  }
	  }
	 }
	 
	 else if($res_id_rows >0)
     {
       $leads_page=true; 
	   $_GET["status"]="";
while($r = mysqli_fetch_array($res_idlogin))
	{
	  $q_b_dtls = "select client_id, logo_pic, requester_name, company_name, email_id_prof, mobile,  Acc_lds, Acc_pckg, Acc_dashb, Acc_serv, Acc_prof, Acc_pay from b2b_profile where email_id_prof='".$r["user_email"]."'";
   $res_b_dtls = mysqli_query($conn,$q_b_dtls);  
    while($row = mysqli_fetch_array($res_b_dtls))
	{   		  
		  $_SESSION["clientID"] = $row["client_id"];
		  $_SESSION["FullName"]= $row["requester_name"];
		  $_SESSION["CompName"] = $row["company_name"];
		  $_SESSION["userID"] = $row["email_id_prof"];
		  $_SESSION["logoPic"] = $row["logo_pic"];
		  $_SESSION["userEmail"] = $row["email_id_prof"];
		  
		  $lds = explode("-",$row["Acc_lds"]);
		  $pckg = explode("-",$row["Acc_pckg"]);
		  $dashb = explode("-",$row["Acc_dashb"]);
		  $serv = explode("-",$row["Acc_serv"]);
		  $prof = explode("-",$row["Acc_prof"]);
		  $pay = explode("-",$row["Acc_pay"]);
		  
		  if($lds[0] == "YES")
		    $acc_ld_yes = true;
		 if($pckg[0] == "YES")
		    $acc_pck_yes = true;
		 if($dashb[0] == "YES")
		    $acc_dash_yes = true;
		 if($serv[0] == "YES")
		    $acc_serv_yes = true;
		 if($prof[0] == "YES")
		    $acc_prof_yes = true;
		 if($pay[0] == "YES")
		    $acc_pay_yes = true;	
			
	  $insrt_log = "insert into user_logs values ('','".$row["client_id"]."','".$r["user_email"]."','".$r["user_id"]."','".date('Y-m-d')."','".date('H:i:s')."','','','B2B_Partner_Operator')";
   $res_log = mysqli_query($conn,$insrt_log);		
	  }
	 }

	 }
	 else if($res_num_rows_id>0)
	 {
	   $thnk_reg= true;
	   $reg_msg = "Your email Id exists with us, ";
       $lnk = "Pwd_reset.php?emlID=".$_POST["txtLogId_b2b"];
	   $page_status="Login";	
	 }
	  else
	   {
	     $_GET["status"]="Login";
		 $leads_page=false; 
		  echo '<script type="text/javascript">';
		 echo 'alert(\'Error : Invalid UserName and Password\');';
		 echo '</script>';	   
	   }	  
}


if(isset($_POST['btn_b2bLogout']))
{
  $leads_page=false;
  $insrt_log = "update user_logs set logout_date='".date('Y-m-d')."' , logout_time = '".date('H:i:s')."' where client_id='".$_SESSION["clientID"]."' and login_date='".date('Y-m-d')."' and logout_date='0000-00-00' and logout_time='00:00:00'";
   $res_log = mysqli_query($conn,$insrt_log);	
   
  session_destroy(); 
  $_POST["txtLogId_b2b"] = "";
  $_POST["txtLogPwd_b2b"]="";
  $_GET["status"]="Login";
  $_SESSION["clientID"]="";
  header("Location:CreatePackTool.php?status=Login");  
}



if(isset($_POST['btn_regB2b']))
{
if(isset($_FILES["cmp_Img"]))
{
if($_FILES["cmp_Img"]["error"] != 4 && $_FILES["cmp_Img"]["tmp_name"]!="")
{
    $pic = addslashes(file_get_contents($_FILES["cmp_Img"]["tmp_name"]));
	$pic_size =  filesize($_FILES["cmp_Img"]["tmp_name"]);
 }
 }
 else
   $pic = "";

if($_POST["txtTab_cmpName"] !="" && $_POST["txtTab_headQuarter"]!="" && $_POST["txtTab_reqName"]!="" && $_POST["txtTab_empCode"]!="" && $_POST["txtTab_desig"]!="" && $_POST["txtTab_regional"]!="" && $_POST["txtTab_state"]!="" && $_POST["txtTab_emailPer"]!="" && $_POST["txtTab_emailProf"]!="" && $_POST["txtTab_cellNo"]!="" && $_POST["txtTab_landNo1"]!="")
{
   $q_insrt_clnt = "insert into client_register values('','B2B_Partner_Operator','".addslashes($_POST["txtTab_emailProf"])."','','Register','".$_POST["txtClntType"]."','Main-User','".date('Y-m-d')."')";
  $res_b2b_clnt = mysqli_query($conn,$q_insrt_clnt);
  
  $get_clnt_id = "select client_id from client_register where client_email='".$_POST["txtTab_emailProf"]."'";
  $res_clnt_id = mysqli_query($conn,$get_clnt_id);
  
  if($res_clnt_id)
  {
   while($r = mysqli_fetch_array($res_clnt_id))
   {
     $id = $r["client_id"];
   }
  }
   
  $q_insrt_bReg = "insert into b2b_profile values ('".$id."','".addslashes($_POST["txtTab_cmpName"])."','".$pic."','".addslashes($_POST["txtTab_headQuarter"])."','".addslashes($_POST["txtTab_reqName"])."','".addslashes($_POST["txtTab_empCode"])."','".addslashes($_POST["txtTab_desig"])."','".addslashes($_POST["txtTab_regional"])."','".addslashes($_POST["txtTab_state"])."','".addslashes($_POST["txtTab_emailProf"])."','".addslashes($_POST["txtTab_emailPer"])."','".addslashes($_POST["txtTab_cellNo"])."','".addslashes($_POST["txtTab_landNo1"]."-".$_POST["txtTab_landNo2"])."','','".date('Ymd')."','YES-','YES-','YES-','YES-','YES-','YES-','SELF')";
  $res_reg_b2b_prf = mysqli_query($conn,$q_insrt_bReg);
  
  if($res_reg_b2b_prf)
  {   
   $reg_msg = "Thank you for registering with us, ";
   $thnk_reg= true;
  $lnk = "Pwd_reset.php?emlID=".$_POST["txtTab_emailProf"];
	$page_status="Login";	
  }
  else
   {
     echo '<script type="text/javascript">';
	echo 'alert(\'Error : Please try again\');';
	echo '</script>';
	$page_status="Register";
   }
 }
 
 else
  {
  echo '<script type="text/javascript">';
	echo 'alert(\'Error : Please enter all the details.\');';
	echo '</script>';
	
	$page_status="Register";
	$cmpn_name =$_POST["txtTab_cmpName"];
$hdq_loc=$_POST["txtTab_headQuarter"];
$req_name=$_POST["txtTab_reqName"];
$empCode=$_POST["txtTab_empCode"];
$design=$_POST["txtTab_desig"];
$reg_off=$_POST["txtTab_regional"];
$state=$_POST["txtTab_state"];
$tab_perEml=$_POST["txtTab_emailPer"];
$profEml=$_POST["txtTab_emailProf"];
$cellNo=$_POST["txtTab_cellNo"];
$landNo=$_POST["txtTab_landNo1"]."-".$_POST["txtTab_landNo2"];
	
  }
}

// -------------------------------------------------------------------------- Create Sub-Users -------------------------------------------------------------------
if(isset($_POST['btn_sub_acc_prev']))
{
$leads_page=true;
include("b2b_User_Session.php");

$acc_lead ="";
$acc_pckg ="";
$acc_dash="";
$acc_serv ="";
$acc_prof ="";
$acc_pay="";

$acc_pckg_crt ="";
$acc_pckg_mod="";  	   

$empCode = addslashes($_POST["txtTab_empCode_sub"]);
$empName = addslashes($_POST["txtTab_empName"]);
$empDesig = addslashes($_POST["txtTab_empDesig"]);
$empEmail = addslashes($_POST["txtTab_empEmail"]);
$empLoc = addslashes($_POST["txtTab_empLoc"]);

$empPh = addslashes($_POST["txtTab_empMobile"]);
$empVeri = addslashes($_POST["txtVerify_Code"]);

if(isset($_POST["chk_view_ld"]) || isset($_POST["chk_resp_ld"]) || isset($_POST["chk_appr_ld"]) || isset($_POST["chk_publ_ld"]) || isset($_POST["chk_wthdr_ld"]))
$acc_lead = "YES-";

if(isset($_POST["chk_view_ld"]))
$acc_lead .="View, ";
if(isset($_POST["chk_resp_ld"]))
$acc_lead .="Respond, ";
if(isset($_POST["chk_appr_ld"]))
$acc_lead .="Approve, ";
if(isset($_POST["chk_publ_ld"]))
$acc_lead .="Publish, ";
if(isset($_POST["chk_wthdr_ld"]))
$acc_lead .="Withdraw, ";

if(isset($_POST["chk_cre_pck"]) || isset($_POST["chk_mod_pck"]) || isset($_POST["chk_appr_pck"]) || isset($_POST["chk_publ_pck"]) || isset($_POST["chk_wthdr_pck"]))
$acc_pckg = "YES-";

if(isset($_POST["chk_cre_pck"]))
$acc_pckg .="Create, ";
if(isset($_POST["chk_mod_pck"]))
$acc_pckg .="Modify, ";
if(isset($_POST["chk_appr_pck"]))
$acc_pckg .="Approve, ";
if(isset($_POST["chk_publ_pck"]))
$acc_pckg .="Publish, ";
if(isset($_POST["chk_wthdr_pck"]))
$acc_pckg .="Withdraw, ";

if(isset($_POST["chk_view_sales"]) || isset($_POST["chk_resp_sales"]) || isset($_POST["chk_appr_sales"]) || isset($_POST["chk_autho_sales"]) || isset($_POST["chk_dwnl_sales"]))
$acc_dash ="YES-";

if(isset($_POST["chk_view_sales"]))
$acc_dash .="View, ";
if(isset($_POST["chk_resp_sales"]))
$acc_dash .="Respond, ";
if(isset($_POST["chk_appr_sales"]))
$acc_dash .="Approve, ";
if(isset($_POST["chk_autho_sales"]))
$acc_dash .="Authorise, ";
if(isset($_POST["chk_dwnl_sales"]))
$acc_dash .="Download, ";

if(isset($_POST["chk_crt_services"]) || isset($_POST["chk_view_services"]) || isset($_POST["chk_resp_services"]) || isset($_POST["chk_upl_services"]) || isset($_POST["chk_dwnl_services"]))
$acc_serv ="YES-";

if(isset($_POST["chk_crt_services"]))
$acc_serv .="Create, ";
if(isset($_POST["chk_view_services"]))
$acc_serv .="View, ";
if(isset($_POST["chk_resp_services"]))
$acc_serv .="Respond, ";
if(isset($_POST["chk_upl_services"]))
$acc_serv .="Upload, ";
if(isset($_POST["chk_dwnl_services"]))
$acc_serv .="Download, ";

//if(isset($_POST["chk_crt_cntMng"]) || isset($_POST["chk_author_cntMng"]) || isset($_POST["chk_upld_cntMng"]) || isset($_POST["chk_review_cntMng"]) || isset($_POST["chk_appr_cntMng"]) || isset($_POST["chk_publ_cntMng"]))
$acc_prof ="NO-";

/*if(isset($_POST["chk_crt_cntMng"]))
$acc_prof .="Create, ";
if(isset($_POST["chk_author_cntMng"]))
$acc_prof .="Authorize, ";
if(isset($_POST["chk_upld_cntMng"]))
$acc_prof .="Upload, ";
if(isset($_POST["chk_review_cntMng"]))
$acc_prof .="Review, ";
if(isset($_POST["chk_appr_cntMng"]))
$acc_prof .="Approve, ";
if(isset($_POST["chk_publ_cntMng"]))
$acc_prof .="Publish, "; */

if(isset($_POST["chk_view_pay"]) || isset($_POST["chk_resp_pay"]) || isset($_POST["chk_appr_pay"]) || isset($_POST["chk_autho_pay"]) || isset($_POST["chk_dwnl_pay"]) || isset($_POST["chk_ref_pay"]))
$acc_pay ="YES-";

if(isset($_POST["chk_view_pay"]))
$acc_pay .="View, ";
if(isset($_POST["chk_resp_pay"]))
$acc_pay .="Respond, ";
if(isset($_POST["chk_appr_pay"]))
$acc_pay .="Approve, ";
if(isset($_POST["chk_autho_pay"]))
$acc_pay .="Authorize, ";
if(isset($_POST["chk_dwnl_pay"]))
$acc_pay .="Download, ";
if(isset($_POST["chk_ref_pay"]))
$acc_pay .="Refund, ";

$get_user_dtl = "select headquator_location, state, landline, regional_office from b2b_profile where client_id='".$_SESSION["clientID"]."'";
$res_user_dtl = mysqli_query($conn,$get_user_dtl);

if($res_user_dtl)
{
 while($row = mysqli_fetch_array($res_user_dtl))
 {
   $hdQutr = $row["headquator_location"];
   $state = $row["state"];
   $lndline = $row["landline"];
 }
}

if($_POST["txtTab_empCode_sub"]!="" && $_POST["txtTab_empName"]!="" && $_POST["txtTab_empDesig"]!="" && $_POST["txtTab_empEmail"]!="" && $_POST["txtTab_empLoc"]!="")
{
$q_insrt_clnt_sub ="insert into client_register values('','B2B_Partner_Operator','".$_POST["txtTab_empEmail"]."','','Inactive','PLATINUM','Sub-User','".date('y-m-d')."')";
$res_clnt_sub = mysqli_query($conn,$q_insrt_clnt_sub);

$sel_sub_id = "select client_id from client_register where client_email='".$_POST["txtTab_empEmail"]."'";
$res_sel_sub = mysqli_query($conn,$sel_sub_id);
if($res_sel_sub)
{
 while($rid = mysqli_fetch_array($res_sel_sub))
 {
$q_insrt_sub = "insert into b2b_profile values('".$rid["client_id"]."','".$_SESSION["CompName"]."','".addslashes($_SESSION["logoPic"])."','".$hdQutr."','".$empName."','".$empCode."','".$empDesig."','".$empLoc."','".$state."','".$empEmail."','','".$empPh."','".$lndline."','".$empVeri."','".date('Ymd')."','".$acc_lead."','".$acc_pckg."','".$acc_dash."','".$acc_serv."','".$acc_prof."','".$acc_pay."','".$_SESSION["clientID"]."')";
$res_sub_insrt = mysqli_query($conn,$q_insrt_sub);
 }
}



if($res_sub_insrt)
{
echo '<script type="text/javascript">';
echo 'alert(\'Success: Sub-User Created\');';
echo '</script>';
}
else
{
echo '<script type="text/javascript">';
echo 'alert(\'Error: Check if user-ID already exists.\');';
echo '</script>';

echo mysqli_error($conn);

$crt_subUser = true;
$txtEmpCode = $_POST["txtTab_empCode_sub"];
$txtEmpName = $_POST["txtTab_empName"];
$txtEmpEml = $_POST["txtTab_empEmail"];
$txtEmpLoc = $_POST["txtTab_empLoc"];
$txtEmpDesig = $_POST["txtTab_empDesig"];
}
}
else
{
echo '<script type="text/javascript">';
echo 'alert(\'Error: Please enter all details.\');';
echo '</script>';

$crt_subUser = true;
$txtEmpCode = $_POST["txtTab_empCode_sub"];
$txtEmpName = $_POST["txtTab_empName"];
$txtEmpEml = $_POST["txtTab_empEmail"];
$txtEmpLoc = $_POST["txtTab_empLoc"];
$txtEmpDesig = $_POST["txtTab_empDesig"];
}
}


?>
