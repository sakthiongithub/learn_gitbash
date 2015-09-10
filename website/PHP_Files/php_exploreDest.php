<?php

static $j=0;	
static $k=0;
$thnk_msg=false;
$wl_clm = false;
$wl_pop = false;

$emlId_reg = false;
$svd_eml = false;
$add_wl = false;
$save_dest = false;
$emlDest = false;
$wl_list = false;
$getEml = false;

$locats="";
$add_wl=false;

date_default_timezone_set("Asia/Calcutta");

$WL_locName = array();
		$WL_cate = array();
		$WL_attr = array();
		$WL_date = array();
		$WL_sche = array();
		$WL_time = array();
		$WL_appr_time = array();
		$WL_appr_exp = array();
		$WL_locID = array();

include("PHP_Connection.php");

if(isset($_POST["txtWL_email"]))
{
$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where userID='".$_POST["txtWL_email"]."' and loc_name='".$p."' order by wl_2 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($rwl = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $rwl["wl_id"];	
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $rwl["userID"];		
		   $_SESSION["clientID"] = $rwl["client_id"];   
		 }
		}
}

  
// ---------------------------------------------------------------  Store client details --------------------------------------------------------------------------  
  if(isset($_POST['btn_sub_quot_email']))
		  {			
			 if($_POST["txtemail_cust"]!="" && $_POST["txtphone_cust"]!="")
			 {
			 if(!isset($_SESSION["WLID"]) && isset($_GET['WLID']))
			    $_SESSION["WLID"] = $_GET['WLID'];
			 else if(!isset($_GET['WLID']) && isset($_GET['wid']))
			    $_SESSION["WLID"]= $_GET['wid']	;
			 
			 	$updt_lead_tab = "update cust_trip_trvler set user_name='".$_POST["txtName_cust"]."', user_email='".$_POST["txtemail_cust"]."', user_phone='".$_POST["txtphone_cust"]."' where wl_id='".$_SESSION["WLID"]."'";
				$res_updt_ld =  mysqli_query($conn,$updt_lead_tab);
		
			 if($res_updt_ld)
		        {				  
				   $thnk_msg=false;
				}
				else
				{
				  echo '<script type="text/javascript">';
				echo 'alert(\'Error : Please try again.\')';				
				echo '</script>';
				$thnk_msg=true; 
				$_SESSION["LID"] = "L".substr($_SESSION["WLID"],1,-6).date('ymd');
				}
			  }
			  else
			  {
			    echo '<script type="text/javascript">';
				echo 'alert(\'Error : Please enter your email-Id and Phone Number.\')';
				echo '</script>'; 
				$thnk_msg=true; 
				$_SESSION["LID"] = "L".substr($_SESSION["WLID"],1,-6).date('ymd');
			  }
			} 
		


//---------------------------------------------------------------  Add attraction to existing wishlist / no -----------------------------------------------

if(isset($_POST['btn_crt_dest']))
{
if(isset($_POST['rdadd_wl']))
{
if($_POST['rdadd_wl'] == 'YES')
{
 $q_chk_dest = "select distinct(loc_name) as loc_name, wl_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' ";
		$res_chk_dest = mysqli_query($conn,$q_chk_dest);
	
	if($res_chk_dest)
		{ 
		while($row = mysqli_fetch_array($res_chk_dest))
		{
		  $_SESSION["prev_Loc"] = $row["loc_name"];
		  $_SESSION["WLID"] = $row["wl_id"];
		  $_SESSION["userEmail"] = $_POST["txtWL_email"];
          $WL_rows = $_POST["txtWL_rows"];	
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
	     	{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		      
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}	
		}
	    }
}
else
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
		 
		  $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}
		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}
}
}
}

//-------------------------------------------------------------- Email ID not Exists ----------------------------------------------------

if(isset($_POST['btn_eml_notExist']))
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
		 
		  $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   //echo $_SESSION["WLID"];	
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}
		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}
    
}

//---------------------------------------------------------- Email ID exists and dest not but wl exists -------------------------------------------------------

if(isset($_POST['btn_crt_wl']))
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
if(isset($_POST['rdwl_add']))
{
if($_POST['rdwl_add'] == "YES")
{
$q_chk_wl = "select distinct(loc_name) as loc_name, wl_id from wl_tab where client_id='". $_SESSION["clientID"]."' order by wl_3 desc limit 1 ";
		$res_chk_wl = mysqli_query($conn,$q_chk_wl);
		if($res_chk_wl)
		  {
		    while($rWl = mysqli_fetch_array($res_chk_wl))
			{
			  $_SESSION["WLID"] = $rWl["wl_id"];
			  $loc = $rWl["loc_name"];			  
			}
		  }
		     $loc .=", ".$p; 
		  $updt_wl_loc = "update wl_tab set loc_name='".$loc."' where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
		  $res_updt_wl_loc = mysqli_query($conn,$updt_wl_loc);
		  
		  $WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}
}
else
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
		 
		  $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   //echo $_SESSION["WLID"];	
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}
		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}

}
}
}

//---------------------------------------------------------  For multiple wishlists -----------------------------------------------

if(isset($_POST['btn_selWl_multi']))
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
if(isset($_POST["rdWlCapt"]))
{
 $_SESSION["WLID"] = $_POST["rdWlCapt"];
 $WL_rows = $_POST["txtWL_rows"];
 
 $getloc = "select loc_name from wl_tab where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
 $resLoc = mysqli_query($conn,$getloc);
 if($resLoc)
 {
 while($rL = mysqli_fetch_array($resLoc))
 {
   $loc = $rL["loc_name"];
 }
 }	
 
 $loc .=", ".$p;
 
   $updt_wl_loc = "update wl_tab set loc_name='".$loc."' where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
		  $res_updt_wl_loc = mysqli_query($conn,$updt_wl_loc);
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		   
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		  
	       	   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}

}
else if(isset($_POST['rd_crtNew']))
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
		 
		  $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   //echo $_SESSION["WLID"];	
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}
		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
	    	{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}

}
}

//-----------------------------------------------------------  Email ID exists , no dest / wishlist exists -----------------------------------

if(isset($_POST['btn_noWl']))
{
$_SESSION["userEmail"] = $_POST["txtWL_email"];	
	  
		$wl_clm=true;	
		 
		 $sel_clnt ="select client_id from client_register where client_email='".$_POST["txtWL_email"]."'";
		 $res_clnt = mysqli_query($conn,$sel_clnt);
		 while($row = mysqli_fetch_array($res_clnt))
		 {
		   $_SESSION["clientID"] = $row["client_id"];
		 }
		 
		  $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
		{
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   //echo $_SESSION["WLID"];	
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}
		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_locID = "select locId from user_destinations where locName='".$WL_locName[$i]."'";
		  $res_locID = mysqli_query($con,$q_locID);
		  while($row = mysqli_fetch_array($res_locID))
		  {
		    $WL_locID[$i] = $row["locId"] ;
		  }
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
		  if($res_insrt_wl)
		  {
		  $wl_clm = true;
		  }
		  else
		   echo "Error :".mysqli_error($conn);
		}

}

	
// -------------------------------------------------------   Save wishlist ------------------------------------------------------

if(isset($_POST['btnSaveWL']))
{

if(isset($_GET["ID"]) && isset($_GET["WLID"]))
{
  if($_GET["WLID"]!="" && $_GET["ID"]!="")
  {
$wl_clm=true;
//$add_wl = true;

$q_pre_loc = "select loc_name from wl_tab where client_id='".$_GET["ID"]."' and wl_id='".$_GET["WLID"]."'";
$res_pre_loc = mysqli_query($conn,$q_pre_loc);
if($res_pre_loc)
{
 while($row = mysqli_fetch_array($res_pre_loc))
 {
   $_SESSION["prev_Loc"] = $row["loc_name"];
   $_SESSION["WLID"] = $_GET["WLID"];
   $_SESSION["clientID"] = $_GET["ID"];
 }
}

$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
     	   $_POST['txtWL_date_'.$i] = date('Ymd');
			     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		   $_POST["txtWL_time_strt_".$i] = "7-AM";
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		   $_POST["txtWL_time_end_".$i]="8-PM";
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
	}
 } 
 }
 
else if(isset($_SESSION["clientID"]) && isset($_SESSION["WLID"])) 
{
if($_SESSION["WLID"]!="" && $_SESSION["clientID"]!="")
{
$wl_clm=true;
//$add_wl = true;

$q_pre_loc = "select loc_name from wl_tab where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
$res_pre_loc = mysqli_query($conn,$q_pre_loc);
if($res_pre_loc)
{
 while($row = mysqli_fetch_array($res_pre_loc))
 {
   $_SESSION["prev_Loc"] = $row["loc_name"];
 }
}

$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		   
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);	
  }
}

}

else if(isset($_GET["ID"]))
{
$wl_clm=true;
	         $add_wl= true;
			 $wl_list= true;
			
			$svd_eml= false;
			$emlId_reg = false;
			$save_dest = false;
			$emlDest = false;
 $q_wl_insrt = "insert into wl_tab values('W','',now(),'','".$_SESSION["clientID"]."','".addslashes($_POST["txtWL_email"])."','".$p."')";
	  $res_wl_insrt = mysqli_query($conn,$q_wl_insrt);
	  
	  $q_wl_wid = "update wl_tab set wl_id= concat(wl_1,wl_2,date_format(wl_3,'%m%d%y'))";
	  $res_wl_wid = mysqli_query($conn,$q_wl_wid);
	    
		$q_get_wl = "select wl_id, userID, loc_name, client_id from wl_tab where client_id='".$_SESSION["clientID"]."' and loc_name='".$p."' order by wl_3 desc limit 1";
		$res_get_wl= mysqli_query($conn,$q_get_wl);
		if($res_get_wl)
        {
		 while($r = mysqli_fetch_array($res_get_wl))
		 {
		   $_SESSION["WLID"] = $r["wl_id"];
		   $wl_clm = true;
		   $_SESSION["userEmail"] = $r["userID"];
		   $_SESSION["clientID"] = $r["client_id"];		   
		 }
		}		
		$WL_rows = $_POST["txtWL_rows"];
		
		for($i=1 ; $i<=$WL_rows; $i++)
		{
		if(!isset($_POST['txtWL_date_'.$i]))
		{
		  if($i!=1)
		  {
		   $j = $i-1;		   
     	   $_POST['txtWL_date_'.$i] = $_POST['txtWL_date_'.$j];
		   }
		   else
		   $_POST['txtWL_date_'.$i] = date('Ymd');
		}	     
		if(!isset($_POST["txtWL_time_strt_".$i]))
		{
		if($i!=1)
		  {
		    $j = $i-1;
		   $_POST["txtWL_time_strt_".$i] = $_POST["txtWL_time_strt_".$j];
		   }
		   else
		   $_POST['txtWL_time_strt_'.$i] = "7-AM";
		}
		   
		if(!isset($_POST["txtWL_time_end_".$i]))
		{
		if($i!=1)
		  {
			$j = $i-1;
		   $_POST["txtWL_time_end_".$i]= $_POST["txtWL_time_end_".$j];
		   }
		   else
		   {
		     $_POST["txtWL_time_end_".$i]="8-PM";
		   }
		  }      
		
		  $WL_locName[$i] = addslashes($_POST["txtWL_loc_".$i]);
		  $WL_cate[$i] = addslashes($_POST["txtWL_cate_".$i]);
		  $WL_attr[$i] = addslashes($_POST["txtWL_attr_".$i]);
		  $WL_date[$i] = date('Y-m-d',strtotime($_POST['txtWL_date_'.$i]));
		  $WL_sche[$i] = addslashes($_POST["txtWL_sche_".$i]);
		  $WL_time[$i] = addslashes($_POST["txtWL_time_strt_".$i]).":".addslashes($_POST["txtWL_time_end_".$i]);
		  $WL_appr_time[$i] = addslashes($_POST["txtWL_apprTime_".$i]);
		  $WL_appr_exp[$i] = addslashes($_POST["txtWL_apprExp_".$i]);
		  $WL_notes[$i] = addslashes($_POST["txtNotes_".$i]);
		  
		   if($WL_date[$i] == "01-01-1970" || $WL_date[$i] == "") 
		      $WL_date[$i] = date('Ymd');
		  
		  $q_insrt_wl = "insert into saved_wl values('".addslashes($_SESSION["clientID"])."','".$_SESSION["WLID"]."','".$WL_locID[$i]."','".addslashes($WL_locName[$i])."','".$WL_cate[$i]."','".addslashes($WL_attr[$i])."','".$WL_date[$i]."','".$WL_sche[$i]."','".$WL_time[$i]."','".addslashes($WL_appr_time[$i])."','".addslashes($WL_appr_exp[$i])."','".addslashes($WL_notes[$i])."','".date('Y-m-d')."');";
  $res_insrt_wl = mysqli_query($conn,$q_insrt_wl);
}

}		
else
{
$getEml = true;
}
}

//  ------------------------------------------------------------   Store Custom Trip Details -----------------------------------------------------------------		
if(isset($_POST['btnGetQuote']) || isset($_POST['btnCust_Quotes']))
{

$wl_clm = true;

if(!isset($_SESSION["WLID"]) && isset($_GET['WLID']))
  $_SESSION["WLID"] = $_GET["WLID"];

if(!isset($_GET["WLID"]) && isset($_GET['wid']))
  $_SESSION["WLID"] = $_GET["wid"];  
  
if(!isset($_SESSION["clientID"]) && isset($_GET['ID']))
  $_SESSION["clientID"] = $_GET["ID"];
  
if(!isset($_GET['ID']) && isset($_GET['uid']))
  $_SESSION["clientID"] = $_GET["uid"]; 

  
$leadID = "L".substr($_SESSION["WLID"],1,-6).date('mdy'); 

$trpDates = $_POST["txtTrpfrom_dt"]." to ".$_POST["txtTrpto_dt"];


$date1=date_create(date('Y-m-d', strtotime($_POST["txtTrpfrom_dt"])));
$date2=date_create(date('Y-m-d', strtotime($_POST["txtTrpto_dt"])));
$diff=date_diff($date1,$date2);

$locs ="";
$q_locs = "select distinct(loc_name) as loc_name, wl_id from saved_wl where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
$res_locs = mysqli_query($conn,$q_locs);
if($res_locs)
{
while($row = mysqli_fetch_array($res_locs))
{
  $locs .= $row["loc_name"].",";
}
}


//--------------------------------------------------------- Cust_trip_hotel ----------------------------------------------------------------------------------

$htl_loc = array();
$htl_chkIn = array();
$htl_chkOut = array();
$htl_dur = array();
$htl_strRate = array();
$htl_occ = array();
$htl_rooms = array();
$htl_extrbed = array();
$htl_food = array();

$htl_rows = (int)$_POST["txtHtl_rows"] + 1 ;


//------------------------------------------------------------------ Cust_trip_transport ------------------------------------------------------------------

$trv_frm = array();
$trv_to = array();
$trv_date = array();
$trv_mode = array();
$ltrv_loc = array();
$ltrv_mode = array();
$ltrv_num_pasn = array();
$ltrv_date = array();
$req_loc = array();
$req_type = array();

$trv_rows = (int)$_POST["txtTrv_rows"] + 1;

		  $q_clnt_id = "select client_email from client_register where client_id='".$_SESSION["clientID"]."'";
   		$res_clnt_id = mysqli_query($conn,$q_clnt_id);
		  $res_clnt_num = mysqli_num_rows($res_clnt_id);
		  if($res_clnt_num > 0)
		     {
			 while($row = mysqli_fetch_array($res_clnt_id))
			 {
			   $_SESSION["userEmail"]= $row["client_email"];
			 }
			 }


//--------------------------------------------------------------- Cust_trip_travellers ---------------------------------------------------------------------------------

 $q_insrt_trvler = "insert into cust_trip_trvler values ('".$_SESSION["clientID"]."','".$_SESSION["userEmail"]."','".$_SESSION["WLID"]."','','','','".addslashes($_POST["txtAdults"])."','".addslashes($_POST["txtKids0_2"])."','".addslashes($_POST["txtKids2_12"])."','".addslashes($_POST["txtKids12abv"])."','".addslashes($_POST["txtSenior"])."','".$trpDates."','".$diff->format("%a Days")."','".addslashes($_POST["drpcurcity"])."','".$leadID."','','".date('Ymd')."','".date('Y-m-d H:i:s')."','".$locs."')"; 
 $res_insrt_trvler = mysqli_query($conn,$q_insrt_trvler);
 
 $q_lrt = "insert into lead_route_tab values ('','".$leadID."','".$_SESSION["WLID"]."','".date('Ymd')."','".date('Ymd H:i:s')."','".$locs."')";
 $res_lrt = mysqli_query($conn,$q_lrt);
 
 if($res_insrt_trvler)
 {
 
 //--------------------------------------------------------- Cust_trip_hotel ----------------------------------------------------------------------------------

 for($i = 1; $i<= $htl_rows; $i++)
{

$htl_loc[$i] = "";
$htl_chkIn[$i] = "";
$htl_chkOut[$i] = "";
$htl_dur[$i] = "";
$htl_strRate[$i] = "";
$htl_occ[$i] = "";
$htl_rooms[$i] = "";
$htl_extrbed[$i] = "";
$htl_food[$i] = "";

if($_POST["txtHtl_loc_".$i]!="")
{
$htl_loc[$i] = addslashes($_POST["txtHtl_loc_".$i]);
$htl_chkIn[$i] = date('Ymd',strtotime($_POST["txtHtl_chkIn_".$i]));
$htl_chkOut[$i] = date('Ymd',strtotime($_POST["txtHtl_chkOut_".$i]));
$htl_strRate[$i] = addslashes($_POST["txtHtl_star_".$i]);
$htl_occ[$i] = addslashes($_POST["txtHtl_occ_".$i]);
$htl_rooms[$i] = addslashes($_POST["txtHtl_rooms_".$i]);
$htl_extrbed[$i] = addslashes($_POST["txtHtl_extrBed_".$i]);
$htl_food[$i] = addslashes($_POST["txtHtl_food_".$i]);
$htl_dur[$i] = addslashes($_POST["txtHtl_dur_".$i]);
/*$date1=date_create($htl_chkIn[$i]);
$date2=date_create($htl_chkOut[$i]);
$htl_dur[$i] = date_diff($date1,$date2);
$htl_dur[$i] -> date_format('%a');*/

$htl_budgt = addslashes($_POST["txtHtl_budg1"])." to ".addslashes($_POST["txtHtl_budg2"]);



 $q_insrt_htl = "insert into cust_trip_htl values('".$_SESSION["clientID"]."','".$_SESSION["WLID"]."','','".$htl_loc[$i]."','".$htl_chkIn[$i]."','".$htl_chkOut[$i]."','".$htl_dur[$i]."','".$htl_strRate[$i]."','".$htl_occ[$i]."','".$htl_rooms[$i]."','".$htl_extrbed[$i]."','".$htl_food[$i]."','".$htl_budgt."')";
 $res_htl_insrt = mysqli_query($conn,$q_insrt_htl);
}
}


for($i = 1; $i<= $trv_rows+1; $i++)
{
$trv_frm[$i] = " ";
$trv_to[$i] = " ";
$trv_date[$i] = "";
$trv_mode[$i] = "";
$ltrv_loc[$i] = "";
$ltrv_mode[$i] = "";
$ltrv_num_pasn[$i] = "";
$ltrv_date[$i] = "";
$req_loc[$i] = "";
$req_type[$i] = "";


if($_POST["txtTrv_from_".$i]!="")
{
$trv_frm[$i] = addslashes($_POST["txtTrv_from_".$i]);
$trv_to[$i] = addslashes($_POST["txtTrv_to_".$i]);
$trv_date[$i] = date('Ymd',strtotime($_POST["txtTrv_date_".$i]));
$trv_mode[$i] = addslashes($_POST["txtTrv_mode_".$i]);
$ltrv_loc[$i] = addslashes($_POST["txtLTrv_loc_".$i]);
$ltrv_mode[$i] = addslashes($_POST["txtLTrv_mode_".$i]);
$ltrv_num_pasn[$i] = addslashes($_POST["txtLTrv_numPasn_".$i]);
$ltrv_date[$i] = date('Ymd',strtotime($_POST["txtLTrv_datefrm_".$i]))." to ".date('Ymd',strtotime($_POST["txtLTrv_dateto_".$i]));
$req_loc[$i] = addslashes($_POST["txtReq_loc_".$i]);
$req_type[$i] = addslashes($_POST["txtReq_type_".$i]);

 $q_insrt_trv = "insert into cust_trip_trv values('".$_SESSION["clientID"]."','".$_SESSION["WLID"]."','','".$trv_frm[$i]."','".$trv_to[$i]."','".$trv_date[$i]."','".$trv_mode[$i]."','".$ltrv_loc[$i]."','".$ltrv_mode[$i]."','".$ltrv_num_pasn[$i]."','".$ltrv_date[$i]."','".$req_loc[$i]."','".$req_type[$i]."')";
 $res_trv_insrt = mysqli_query($conn,$q_insrt_trv);
 }
}
  $thnk_msg = true;
  
  }
  else
   {
   $user_cust = true;
    $thnk_msg = false;

   echo '<script type="text/javascript">';
   echo 'alert(\'Error : The custom trip for this wishlist already exists\')';
   echo '</script>';
   }
}
	
if(isset($_POST['shw_WL']))	
{
$wl_clm = true;
}


if(isset($_POST['btnCls_Eml']))
{
$svd_eml = false;
$wl_clm=true;

}
if(isset($_POST['btnCls_EmlDest']))
{
$emlDest = false;
$wl_clm=true;
}




?>
