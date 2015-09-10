<?php 

include("PHP_Connection.php");

if(isset($_SESSION["userEmail"]))
{
$q_blogin = "select user_email, user_id, user_pwd from user_tab where user_email ='".$_SESSION["userEmail"]."'";
  $res_blogin = mysqli_query($conn,$q_blogin);
  $res_num_rows = mysqli_num_rows($res_blogin);
  
  $q_idblogin = "select user_email, user_id, user_pwd from user_tab where user_id ='".$_SESSION["userEmail"]."'";
  $res_idlogin = mysqli_query($conn,$q_idblogin);
  $res_id_rows = mysqli_num_rows($res_idlogin);
  
 if($res_num_rows >0)
  {
   $leads_page=true; 
    $_GET["status"]=""; 
	while($r = mysqli_fetch_array($res_blogin))
	{
	 $q_b_dtls = "select client_id, logo_pic, requester_name, company_name, regional_office, email_id_prof, mobile,  Acc_lds, Acc_pckg, Acc_dashb, Acc_serv, Acc_prof, Acc_pay from b2b_profile where email_id_prof='".$r["user_email"]."'";
   $res_b_dtls = mysqli_query($conn,$q_b_dtls); 
    while($row = mysqli_fetch_array($res_b_dtls))
	{ 	 
		  $_SESSION["clientID"] = $row["client_id"];
		  $_SESSION["FullName"]= $row["requester_name"];
		  $_SESSION["CompName"] = $row["company_name"];
		  $_SESSION["userID"] = $row["email_id_prof"];
		  $_SESSION["logoPic"] = $row["logo_pic"];
		  $_SESSION["userEmail"] = $r["user_email"];
		  $_SESSION["Phone"] = $row["mobile"];
		  $_SESSION["Region"] = $row["regional_office"];
		  
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
		  	
	  }
	  }
	 }
	 
	 else if($res_id_rows >0)
     {
       $leads_page=true; 
	   $_GET["status"]="";
while($r = mysqli_fetch_array($res_idlogin))
	{
	  $q_b_dtls = "select client_id, logo_pic, requester_name, company_name, email_id_prof from b2b_profile where email_id_prof='".$r["user_email"]."'";
   $res_b_dtls = mysqli_query($conn,$q_b_dtls);  
    while($row = mysqli_fetch_array($res_b_dtls))
	{   		  
		  $_SESSION["clientID"] = $row["client_id"];
		  $_SESSION["FullName"]= $row["requester_name"];
		  $_SESSION["CompName"] = $row["company_name"];
		  $_SESSION["userID"] = $row["email_id_prof"];
		  $_SESSION["logoPic"] = $row["logo_pic"];
		  $_SESSION["userEmail"] = $r["user_email"];
	  }
	 }
	 }

	 else if(isset($_SESSION["PckID"]))
	 {
	 $q_pck_id ="select pck_id, user_id, client_id from b2b_pck_crt where client_id='".$_SESSION["clientID"]."' and user_id='".$_SESSION["userEmail"]."' order by pck_date limit 1";
  $res_pck_id = mysqli_query($conn,$q_pck_id);
  
  if($res_pck_id)
  {
   while($row = mysqli_fetch_array($res_pck_id))
     {
	   $_SESSION["PckID"] = $row["pck_id"];
	   $_SESSION["userEmail"] = $row["user_id"];
	   $_SESSION["clientID"] = $row["client_id"];
	 
	 echo $_SESSION["PckID"]."-".$_SESSION["userEmail"]."-".$_SESSION["clientID"];
	 }
	 
  }
  $q_b_dtls = "select client_id, logo_pic, requester_name, company_name, email_id_prof from b2b_profile where email_id_prof='".$_SESSION["userEmail"]."'";
   $res_b_dtls = mysqli_query($conn,$q_b_dtls);  
    while($row = mysqli_fetch_array($res_b_dtls))
	{   		  
		  $_SESSION["clientID"] = $row["client_id"];
		  $_SESSION["FullName"]= $row["requester_name"];
		  $_SESSION["CompName"] = $row["company_name"];
		  $_SESSION["userID"] = $row["email_id_prof"];
		  $_SESSION["logoPic"] = $row["logo_pic"];
		  $_SESSION["userEmail"] = $r["user_email"];
	  }
  
	 }
	 }

?>
