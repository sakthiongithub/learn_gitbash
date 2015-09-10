<?php 
	
if(isset($_POST["btnSubmit_wc"]))
{
include("PHP_Files/PHP_Connection.php");

//echo 'Your Content Uploaded ........ '; 

if(isset($_GET['city']))
   $drpLocId = str_split($_GET['city'],3);
if(isset($_GET['city']))   
  $drpLocName =explode(',',$_GET['city']);
if(isset($_GET['cate']))  
   $drpCate = $_GET['cate'];   
   
if(isset($_POST['txtAttrName']))    
   $attrName = addslashes($_REQUEST['txtAttrName']);
if(isset($_POST['txt_Desc']))
   $attrDesc =addslashes($_REQUEST['txt_Desc']);
if(isset($_POST['txt_BTV']))   
    $attrBTV = addslashes($_POST['txt_BTV']);
if(isset($_POST['txt_Offsea']))	
    $attrOffsea = addslashes($_REQUEST['txt_Offsea']);
if(isset($_POST['txt_visitHrs']))		
   $attrVH = addslashes($_REQUEST['txt_visitHrs']);
if(isset($_POST['txt_mustVisit']))   
    $attrMV = addslashes($_REQUEST['txt_mustVisit']);
if(isset($_POST['txt_viewHrs']))
     $viewHrs = $_REQUEST["txt_viewHrs"];
if(isset($_POST['txt_viewMin']))
     $viewMin = $_REQUEST["txt_viewMin"];
if(isset($_POST['txt_exp_fee']))
     $fee = (int)$_REQUEST["txt_exp_fee"];
if(isset($_POST["txt_exp_cam"]))
     $cam = (int)$_REQUEST["txt_exp_cam"];
if(isset($_POST["txt_exp_oth"]))
     $othExp = (int)$_REQUEST["txt_exp_oth"];	
if(isset($_POST['txtA_blogs'])) 	
    $attrBlog = addslashes($_REQUEST['txtA_blogs']);
if(isset($_POST["txt_air_dist"])) 	
    $disAir = (float)$_REQUEST["txt_air_dist"];
if(isset($_POST["txt_rail_dist"]))	
    $disRail = (float)$_REQUEST["txt_rail_dist"];
if(isset($_POST["txt_bus_dist"]))
    $disBus = (float)$_REQUEST["txt_bus_dist"];
if(isset($_POST["txt_air_taxi"]))	
    $prcAirTaxi = (float)$_REQUEST["txt_air_taxi"];
if(isset($_POST["txt_air_auto"]))		
    $prcAirAuto = (float)$_REQUEST["txt_air_auto"];
if(isset($_POST["txt_air_bus"]))	
    $prcAirBus = (float)$_REQUEST["txt_air_bus"];
if(isset($_POST["txt_rail_taxi"]))	
    $prcRailTaxi = (float)$_REQUEST["txt_rail_taxi"];
if(isset($_POST["txt_rail_auto"]))	
    $prcRailAuto = (float)$_REQUEST["txt_rail_auto"];
if(isset($_POST["txt_rail_bus"]))		
     $prcRailBus = (float)$_REQUEST["txt_rail_bus"];
if(isset($_POST["txt_bus_taxi"]))	 
    $prcBusTaxi = (float)$_REQUEST["txt_bus_taxi"];
if(isset($_POST["txt_bus_auto"]))
     $prcBusAuto = (float)$_REQUEST["txt_bus_auto"];
if(isset($_POST["txt_bus_bus"]))
     $prcBusBus = (float)$_REQUEST["txt_bus_bus"];
if(isset($_POST["txtCustName"]))
 	 $custName = addslashes($_REQUEST["txtCustName"]);
if(isset($_POST["txtCustEmail"]))
 	 $custEmail = addslashes($_REQUEST["txtCustEmail"]);	 

if(isset($_FILES["txt_src"]) && $_FILES["txt_src"]["tmp_name"]!="")
{
    $pic1 = addslashes(file_get_contents($_FILES["txt_src"]["tmp_name"]));
	$pic1_size =  filesize($_FILES["txt_src"]["tmp_name"]);
	$pic1_name =  addslashes($_FILES["txt_src"]["name"]);
	$pic1_type =  addslashes($_FILES["txt_src"]["type"]);
 }
 
 else
   {
   $pic1 = "";
	$pic1_size =  "";
	$pic1_name = "";
	$pic1_type = "";   
   }

if(isset($_FILES["txt_src1"]) && $_FILES["txt_src1"]["tmp_name"]!="")
{
   $pic2 =addslashes(file_get_contents($_FILES["txt_src1"]["tmp_name"]));
$pic2_size =  filesize($_FILES["txt_src1"]["tmp_name"]);
$pic2_name =  addslashes($_FILES["txt_src1"]["name"]);
$pic2_type =  addslashes($_FILES["txt_src1"]["type"]);
 }
 
 else
   {
   $pic2 = "";
	$pic2_size =  "";
	$pic2_name = "";
	$pic2_type = "";   
   }

if(isset($_FILES["txt_src2"]) && $_FILES["txt_src2"]["tmp_name"]!="")
{
    $pic3 = addslashes(file_get_contents($_FILES["txt_src2"]["tmp_name"]));
	$pic3_size =  filesize($_FILES["txt_src2"]["tmp_name"]);
	$pic3_name =  addslashes($_FILES["txt_src2"]["name"]);
	$pic3_type =  addslashes($_FILES["txt_src2"]["type"]);
}

else
   {
   $pic3 = "";
	$pic3_size =  "";
	$pic3_name = "";
	$pic3_type = "";   
   }

if( isset($_FILES["txt_src3"]) && $_FILES["txt_src3"]["tmp_name"]!="")
{
    $pic4 = addslashes(file_get_contents($_FILES["txt_src3"]["tmp_name"]));
	$pic4_size =  filesize($_FILES["txt_src3"]["tmp_name"]);
	$pic4_name =  addslashes($_FILES["txt_src3"]["name"]);
	$pic4_type =  addslashes($_FILES["txt_src3"]["type"]);
}

else
   {
   $pic4 = "";
	$pic4_size =  "";
	$pic4_name = "";
	$pic4_type = "";   
   }

if(isset($_FILES["txt_src4"]) && $_FILES["txt_src4"]["tmp_name"]!="")
{
    $pic5 = addslashes(file_get_contents($_FILES["txt_src4"]["tmp_name"]));
$pic5_size =  filesize($_FILES["txt_src4"]["tmp_name"]);
$pic5_name =  addslashes($_FILES["txt_src4"]["name"]);
$pic5_type =  addslashes($_FILES["txt_src4"]["type"]);
}

else
   {
   $pic5 = "";
	$pic5_size =  "";
	$pic5_name = "";
	$pic5_type = "";   
   }

$tot_time =$viewHrs.":".$viewMin;
$exp_indv = $fee."+".$cam."+".$othExp;
$tot_exp = (int)$fee+(int)$cam+(int)$othExp;

$q_get_cntry = "select type, country, statename, loc_id from cityscape_attractions_content_review where loc_name = '".$drpLocName[0]."'";
$res_get = mysqli_query($con,$q_get_cntry);

if($res_get)
{
while($row = mysqli_fetch_array($res_get))
{
  $rdType = $row["type"];
  $drpCountry = $row["country"];
  $drpState = $row["statename"];
  $drpLocId = $row["loc_id"];
  
$q_insert = "insert into w_cms values('".$rdType."','".$drpCountry."','".$drpState."','".$drpLocId."','".$drpLocName[0]."','".$drpCate."','".$attrName."','".$pic1."','".$pic2."','".$pic3."','".$pic4."','".$pic5."','".$pic1_name."','".$pic2_name."','".$pic3_name."','".$pic4_name."','".$pic5_name."','".$pic1_type."','".$pic2_type."','".$pic3_type."','".$pic4_type."','".$pic5_type."','".$pic1_size."','".$pic2_size."','".$pic3_size."','".$pic4_size."','".$pic5_size."','".$attrDesc."','".$attrBTV."','".$attrOffsea."','".$attrVH."','".$attrMV."','".$tot_time."','".$exp_indv."','".$tot_exp."','".$attrBlog."',".$disAir.",".$disRail.",".$disBus.",".$prcAirTaxi.",".$prcAirAuto.",".$prcAirBus.",".$prcRailTaxi.",".$prcRailAuto.",".$prcRailBus.",".$prcBusTaxi.",".$prcBusAuto.",".$prcBusBus.",'".$custName."','".$custEmail."','SUBMITTED','".date('Y-m-d')."','','')";
}
}
//if($_FILES["txt_src"]["tmp_name"] != "" || $_FILES["txt_src1"]["tmp_name"] !="" || $_FILES["txt_src2"]["tmp_name"] !="" || $_FILES["txt_src3"]["tmp_name"] !="" || $_FILES["txt_src4"]["tmp_name"] !="")
{
$res_insrt = mysqli_query($con,$q_insert);  

if($res_insrt)
{
 echo '<script type="text/javascript">';
  echo 'alert("Success: Content successfully saved.");';
 echo '</script>';
}

else
  {
  //echo "Error :". mysqli_error($con);
echo '<script type="text/javascript">';
 echo 'alert("Error: Choose different name for attraction");';
 echo '</script>';
  $attr_name = $_POST['txtAttrName'];
$desc = $_POST["txt_Desc"];
$btv = $_POST["txt_BTV"];
$vh =$_POST["txt_visitHrs"];
$off =$_POST["txt_Offsea"];
$mv =$_POST["txt_mustVisit"];
 $viewHrs = $_POST["txt_viewHrs"];
  $viewMin = $_POST["txt_viewMin"];
   $fee = (int)$_POST["txt_exp_fee"];
   $cam = (int)$_POST["txt_exp_cam"];
   $othExp = (int)$_POST["txt_exp_oth"];	
$blogs=$_POST["txtA_blogs"];
}

}

/*else
  {
 echo '<script type="text/javascript">';
 echo 'alert("Error: Upload minimum 1 picture.");';
 echo '</script>';

  $attr_name = $_POST['txtAttrName'];
$desc = $_POST["txt_Desc"];
$btv = $_POST["txt_BTV"];
$vh =$_POST["txt_visitHrs"];
$off =$_POST["txt_Offsea"];
$mv =$_POST["txt_mustVisit"];
 $viewHrs = $_POST["txt_viewHrs"];
  $viewMin = $_POST["txt_viewMin"];
   $fee = (int)$_POST["txt_exp_fee"];
   $cam = (int)$_POST["txt_exp_cam"];
   $othExp = (int)$_POST["txt_exp_oth"];
$blogs=$_POST["txtA_blogs"];
}*/ 

}


?> 
