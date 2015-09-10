<?php

include("PHP_Connection.php");

if(!isset($_SESSION["userEmail"]))
$_SESSION["userEmail"] = $_POST["txtSessionEml"]; 

if(isset($_SESSION["userEmail"]))
{ 

$post_log = true;

$sel_emp = "select user_id, emp_name, emp_role, acc_eml_trfc, acc_login_act, acc_social_act, acc_user_admin, acc_leads_quotes, acc_packages, acc_enquiry, acc_payment, acc_cancel, acc_register from qcn_emp_register where user_id='".$_SESSION["userEmail"]."'"; 
$res_emp = mysqli_query($cnn,$sel_emp);
 
if($res_emp)
{
while($row = mysqli_fetch_array($res_emp))
{
  $post_eml = $row["acc_eml_trfc"];
  $post_logact = $row["acc_login_act"];
  $post_social = $row["acc_social_act"];
  $post_admin = $row["acc_user_admin"];
  $post_ld_qt = $row["acc_leads_quotes"];
  $post_pck = $row["acc_packages"];
  $post_enq = $row["acc_enquiry"];
  $post_pay = $row["acc_payment"];
  $post_cncl = $row["acc_cancel"];
  $post_reg = $row["acc_register"];
}
}

$q_id = "select client_id from user_register where client_email = '".$_SESSION["userEmail"]."'";
$res_id = mysqli_query($conn,$q_id);
if($res_id)
{
 while($row = mysqli_fetch_array($res_id))
 {
   $_SESSION["clientID"] = $row["client_id"];
 }
} 
}

?>
