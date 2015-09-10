<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="Stylesheets/ExploreStyles.css" />
<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css" />
<link rel="stylesheet" type="text/css" href="Stylesheets/js-image-slider.css" />

<script src="Javascript/ExploreScript.js" language="Javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/screenResolution_Script.js" language="javascript"></script>
<script src="Javascript/context.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/Visibility.js" language="Javascript" type="text/javascript"></script>  
<script src="Javascript/Javascript_Codes.js" language="Javascript" type="text/javascript"></script>  
<!-- <script src="Javascript/rgt_clik_disb.js" language="javascript" type="text/javascript"></script> --->
<script src="Javascript/MapScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/wishlistScript.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?
	key=AIzaSyB2CDHh-kQdT1h6D626ecSH4Y_oNcioMo0&sensor=false"></script>
<style>
   .labels {
     color: white;
     background-color: red;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 10px;
     text-align: center;
     width: 10px;     
     white-space: nowrap;
   }
</style>
<?php include ("PHP_Files/PHP_Connection.php");  ?>	
<?php 
$flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
?>
	<?php
set_time_limit(10000);
	if(isset($_GET['loc']))
	   $p = $_GET['loc'];

	 if(isset($_GET['p']) && isset($_GET['c']) && isset($_GET['a']) && isset($_GET['f']) && isset($_GET['cm']) && isset($_GET['n']) && isset($_GET['e']) && isset($_GET['v']) && isset($_GET['w']))
{

			$q_desc_cmts = "insert into w_cms_comments values('','".addslashes($_GET['p'])."','".addslashes($_GET['c'])."','".addslashes($_GET['a'])."','".addslashes($_GET["f"])."','".addslashes($_GET['cm'])."','".date('Y-m-d')."','','".addslashes($_GET['n'])."','".addslashes($_GET['e'])."','".addslashes($_GET['v'])."','".addslashes($_GET['w'])."','','SUBMITTED')"; 
			
			$res_desc_cmts = mysqli_query($con,$q_desc_cmts);
			
			if($res_desc_cmts)
			{
			  echo '<script type="text/javascript">';
			  echo 'alert("Thank you for your contribution, It will be posted, post moderation.")';
	     	  echo '</script>';
			}
			else
			{
			echo '<script type="text/javascript"></script>';
			   echo 'alert("Error : Please try again")';
			   echo '</script>';
			}

} 
 
 
$q_loc = "select loc_name, attr_name from cityscape_content_publish";
$r_loc = mysqli_query($con,$q_loc);

   	  $p ="";
	  $q ="";
	  
if($r_loc)
{
 if(isset($_GET['loc']))
 {
   $p = $_GET['loc'];
   $flag_shop = true;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
 }
if(isset($_GET["p"]))
{
   $val = $_GET["p"];
	  $arr = array();
	  $arr = explode(" IN ",$val);
	  
while($row = mysqli_fetch_array($r_loc))
{	  
	  for($i=0; $i<=count($arr)-1; $i++)
	  {
	    if($arr[$i] == $row["loc_name"])
		{
		  $p = $row["loc_name"];
		  
		  $flag_shop = true;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		}
	  }
    
	  for($i=0; $i<=count($arr)-1; $i++)
	  {
	    if($arr[$i] == "SHOPPING")
		{
		  $flag_shop = true;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		  
		}
		else if($arr[$i] == "SIGHTSEEING") 
		 {
		 $flag_shop = false;
		  $flag_sight = true;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }		 
		 else if($arr[$i] == "HISTORICAL") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = true;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "CULTURAL") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = true;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		  else if($arr[$i] == "RELIGIOUS") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = true;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "FOOD-NIGHTLIFE") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = true;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "KIDS") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = true;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "MUST SEE") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = true;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "EXCLUSIVE") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = true;
		  $flag_must = false;
		  $flag_offbt = false;
		 }
		 else if($arr[$i] == "OFFBEAT") 
		 {
		 $flag_shop = false;
		  $flag_sight = false;
		  $flag_hist = false;
		  $flag_nite = false;
		  $flag_relg = false;
		  $flag_cult = false;
		  $flag_kids = false;
		  $flag_excl = false;
		  $flag_must = false;
		  $flag_offbt = true;
		 }
	  }
	    for($i=0; $i<=count($arr)-1; $i++)
	  {
	    if($arr[$i] == $row["attr_name"])
		{
		  $flag_attr = true;
		  $q = $row["attr_name"];
		}
	 }
	 }
	}
} 

 echo '<span id="sp_locName" style="visibility:hidden; font-size:10px;">'.$_GET['p'].'</span>';
 if(isset($_GET['secure']))
 echo '<span id="sp_secure" style="visibility:hidden;">'.$_GET['secure'].'</span>';
  ?>

<?php
if(isset($_GET['email']))
{
if($_GET['email'])
{
  $_SESSION["userEmail"] = $_GET['email'];
}
}
?>


<script language="javascript" type="text/javascript">
var photos=new Array()
var count=0;

function backward(id, img1 , img2 , img3 , img4, img5){

photos[0]= img1;
photos[1]= img2;
photos[2]= img3;
photos[3]= img4;
photos[4]= img5;
	
if (count>0){
window.status=''
count--
document.getElementById(id).src=photos[count];
}
}

function forward(id, img1 , img2 , img3 , img4, img5){
	
photos[0]= img1;
photos[1]= img2;
photos[2]= img3;
photos[3]= img4;
photos[4]= img5;
	
if (count<photos.length-1){
count++
document.getElementById(id).src=photos[count];
}
else window.status='End of gallery'
}
</script>

<script language="javascript" type="text/javascript">
var photos=new Array()
var count=0;

function backward_div(div1 , div2 , div3 , div4, div5){

photos[0]= div1;
photos[1]= div2;
photos[2]= div3;
photos[3]= div4;
photos[4]= div5;
	
if (count>0){
window.status=''
count--
document.getElementById(photos[count]).style.display="block";
}
}

function forward_div(div1 , div2 , div3 , div4, div5){
	
photos[0]= div1;
photos[1]= div2;
photos[2]= div3;
photos[3]= div4;
photos[4]= div5;
	
if (count<photos.length-1){
count++
document.getElementById(photos[count]).style.display="block";
}
else window.status='End of gallery'
}
</script>

<style>
			div.dSpan{
				border:0px;
				text-align: center;
				font-weight: bold;
				font-family: verdana;
				font-size: 10pt;
				color: #666666;
				cursor: pointer;
				background:#F5F5F5;
			}
			td.mTableTD{
				vertical-align: top;
			}
			td.dateTD{
				border: 1px solid #cccccc;
				font-size:14px;
				color:#555555;
				 font-family:Calibri;
				 font-weight:bold;
			}
			table.cTable{
				border: 1px solid #cccccc;
			}
		</style>

</head>

<?php 
	
	include("PHP_Files/php_exploreDest.php"); 
		
$pdate1 ="";
$pdate2 ="";
$j=000;
$k=000;
$locs="";
$user_cust = false;

if(isset($_GET["ID"]))
   $_SESSION["clientID"] = addslashes($_GET["ID"]);

else if(isset($_SESSION["WID"]))
   $_SESSION["WLID"] = $_GET["WID"];  

if(isset($_GET["p"]))
  $_SESSION["Loc_Insrt"] = $_GET["p"];
  
//if(isset($_SESSION["WLID"]))
 // echo $_SESSION["WLID"]."<BR/>";

$save_opt= false;
 
?>


<?php
if(isset($_GET["uid"]) && isset($_GET["wid"]))
{
   $wl_clm = true;
   $user_cust = true;
   $loc = array();
   $_SESSION["WLID"] = $_GET["wid"];
   $_SESSION["clientID"] = $_GET["uid"];
}

 if(isset($_SESSION["userEmail"]))
 {
		  $q_clnt_id = "select client_id from client_register where client_email='".$_SESSION["userEmail"]."'";
   		$res_clnt_id = mysqli_query($conn,$q_clnt_id);
		  $res_clnt_num = mysqli_num_rows($res_clnt_id);
		  if($res_clnt_num > 0)
		     {
			 while($row = mysqli_fetch_array($res_clnt_id))
			 {
			   $_SESSION["clientID"]= $row["client_id"];
			 }
			 }
	}

 if(isset($_SESSION["clientID"]))
 {
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
	}	
?>

<form name="frm" id="frm" method="post"  enctype="multipart/form-data" >
	
	

<body style="color:" onLoad=" ShowOnMap(); showMap_Pop(); wlc_msg(); ">
<div style="visibility: visible; position: absolute; display: none; z-index: 100000;" id="TripDates"></div>			
<script>
      	var oDP = new datePicker("TripDates");
</script>


<!-----------------------------------   Take Email ID --------------------------------------------------------------------->	
	 
<div id="getEmail" align="center" >
<div style="width:100%; float:left;">
  <span id="cls_email" style="float:right; margin-right:5px;" onClick="hide_block('getEmail');"><img src="Images/cancelbtn.png" width="25px" height="25px" /></span>
</div>
    <div align="left" style="float:left; margin:10px; height:auto; padding-top:10px;">
	  <span class="font-medium" style="float:left;">Access your wishlist anywhere,anytime. Please enter your <br/> email id to save/email:</span>
	  <span style="float:left; margin-left:10px; margin-top:3px;">
<input type="text" class="txtbox_Tab" style="width:300px;" name="txtWL_email" id="txtWL_email" value="<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>" />
</span><br/>
	  <span style="float:none; margin-left:10px;">
	   <button type="button" name="btnWLEmail" id="btnWLEmail" class="smallbtn" style="width:60px; height:24px;" onClick="checkEmlExists();">Submit</button>
	  </span>
	</div>
</div>	


<div id="chkedEml" class="WLIDpop"></div>




<!--------------------------------------------  Grey Back -------------------------------------------->
<div id="div_greyBack" style="display:none;"> </div>

<div id="greyDiv" <?php if($flag_attr == true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }  ?>> </div>


<!--------------------------------------------  Highlight On pic click   -------------------------->

<div id="attr_div" <?php if($flag_attr == true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }  ?>>
 	<?php
		if($flag_attr == true && isset($_GET['p']))
		{		
			$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus from cityscape_content_publish where loc_name like'$p%' and attr_name='$q'";

$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {  
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];
 
echo ' <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'attr_div\'); hide_block(\'greyDiv\');" style="float:right; z-index:300;"/>
  <img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
    
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span style="float:left;"><a href="#" onClick="hide_block(\'attr_div\'); hide_block(\'greyDiv\');" style="color:#0066FF; text-decoration:underline; font-size:16px;">Explore Destinations</a>&nbsp; >> &nbsp;</span>
	<span style="float:left;"><a href="#" onClick="hide_block(\'attr_div\'); hide_block(\'greyDiv\');" style="color:#0066FF; text-decoration:underline; font-size:16px;">'.$row["cate_id"].'</a> &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div> 

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<a href="#" onClick="">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px"/></a></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <a  href="#" onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="color:black;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>
			 <a href="#" onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="color:black;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			 <img src="Images/LikeImage.png" style="width:20px; height:20px;" />
			 </span>
			 <span style="float:left; margin-left:5px;">3</span>
			 <span style="float:left; margin-left:2px;">likes</span>
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">
			           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>

			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <a href="#" onClick="btncolor_onclick_popup(\'btn_desc1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_desc1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_blog1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Description</span></a>
			 
			 <a href="#"  onclick="btncolor_onclick_popup(\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_blog1_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Best time to visit</span></a>
			 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Off season</span></a>
			 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Must Visit</span></a>
			 
			  <a href="#" onClick="btncolor_onclick_popup(\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\');">Expense</span></a>
			 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_Access1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Visiting Hours</span></a>	
			 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_view1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_view1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\');">View Hours</span></a>		
			 		 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_access1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">			
			 <span id="btn_access1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access1_'.$row["attr_name"].'\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_blog1_'.$row["attr_name"].'\' ,\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Accessibilty</span></a>
			 
			 <a href="#" onClick="btncolor_onclick_popup(\'btn_map1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_blog1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_map1_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp1_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_blog1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></a>		 
		   
		   	<a href="#" onClick="btncolor_onclick_popup(\'btn_blog1_'.$row["attr_name"].'\',\'btn_map1_'.$row["attr_name"].'\',\'btn_vistiHrs1_'.$row["attr_name"].'\',\'btn_mstVshop1_'.$row["attr_name"].'\',\'btn_OffSea1_'.$row["attr_name"].'\',\'btn_bestTm1_'.$row["attr_name"].'\',\'btn_desc1_'.$row["attr_name"].'\',\'btn_access1_'.$row["attr_name"].'\',\'btn_exp1_'.$row["attr_name"].'\',\'btn_view1_'.$row["attr_name"].'\');">
			 <span id="btn_blog1_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog1_'.$row["attr_name"].'\',\'sp1_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit1_'.$row["attr_name"].'\',\'sp_desc1_'.$row["attr_name"].'\',\'sp_OffSea1_'.$row["attr_name"].'\',\'sp_mstVist1_'.$row["attr_name"].'Shop\',\'sp_VisitHrs1_'.$row["attr_name"].'\',\'sp_Access1_'.$row["attr_name"].'\',\'sp_expense1_'.$row["attr_name"].'\',\'sp_ViewHrs1_'.$row["attr_name"].'\');">Blogs</span></a>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp1_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity" type="text" class="divMapBoxes" value="'.$row["loc_name"].'" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity" type="text" class="divMapBoxes"  value="'.$row["attr_name"]." , ".$row["loc_name"].'" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc1_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC1_'.$row["attr_name"].'\'); show_block(\'char_desc1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc1_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC1_'.$row["attr_name"].'" name="txtDESC1_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC1_'.$row["attr_name"].'" name="txtName_DESC1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC1_'.$row["attr_name"].'" name="txtEmail_DESC1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC1_yes_'.$row["attr_name"].'"  name="rd_DESC1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC1_no_'.$row["attr_name"].'" name="rd_DESC1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC1_'.$row["attr_name"].'" name="drp_wen_DESC1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc1_'.$row["attr_name"].'" name="btnDesc1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC1_'.$row["attr_name"].'\',\'txtName_DESC1_'.$row["attr_name"].'\',\'txtEmail_DESC1_'.$row["attr_name"].'\',\'rd_DESC1_yes_'.$row["attr_name"].'\',\'drp_wen_DESC1_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog1_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs1_'.$row["attr_name"].'\'); show_block(\'char_blog1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg1_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog1_'.$row["attr_name"].'" name="txtBlog1_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog1_'.$row["attr_name"].'" name="txtName_Blog1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog1_'.$row["attr_name"].'" name="txtEmail_Blog1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog1_yes_'.$row["attr_name"].'" name="rd_Blog1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog1_'.$row["attr_name"].'" name="drp_wen_Blog1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog1_'.$row["attr_name"].'" name="btnBlog1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog1_'.$row["attr_name"].'\',\'txtName_Blog1_'.$row["attr_name"].'\',\'txtEmail_Blog1_'.$row["attr_name"].'\',\'rd_Blog1_yes_'.$row["attr_name"].'\',\'drp_wen_Blog1_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span> 
			 
			 <span id="sp_BestTmVisit1_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV1_'.$row["attr_name"].'\'); show_block(\'char_btv1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv1_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV1_'.$row["attr_name"].'" name="txtBTV1_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV1_'.$row["attr_name"].'" name="txtName_BTV1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV1_'.$row["attr_name"].'" name="txtEmail_BTV1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV1_yes'.$row["attr_name"].'" name="rd_BTV1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_BTV1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV1_'.$row["attr_name"].'" name="drp_wen_BTV1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV1_'.$row["attr_name"].'" name="btnBTV1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV1_'.$row["attr_name"].'\',\'txtName_BTV1_'.$row["attr_name"].'\',\'txtEmail_BTV1_'.$row["attr_name"].'\',\'rd_BTV1_yes_'.$row["attr_name"].'\',\'drp_wen_BTV1_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>
			 
			 <span id="sp_OffSea1_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea1_'.$row["attr_name"].'\'); show_block(\'char_off1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea1_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs1_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff1_'.$row["attr_name"].'" name="txtOff1_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off1_'.$row["attr_name"].'" name="txtName_Off1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off1_'.$row["attr_name"].'" name="txtEmail_Off1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off1_yes'.$row["attr_name"].'" name="rd_Off1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off1_'.$row["attr_name"].'" name="drp_wen_Off1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff1_'.$row["attr_name"].'" name="btnOff1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff1_'.$row["attr_name"].'\',\'txtName_Off1_'.$row["attr_name"].'\',\'txtEmail_Off1_'.$row["attr_name"].'\',\'rd_Off1_yes_'.$row["attr_name"].'\',\'drp_wen_Off1_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_mstVist1_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV1_'.$row["attr_name"].'\');show_block(\'char_mv1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV1_'.$row["attr_name"].'" name="txtMV1_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV1_'.$row["attr_name"].'" name="txtName_MV1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV1_'.$row["attr_name"].'" name="txtEmail_MV1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV1_yes_'.$row["attr_name"].'" name="rd_MV1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV1_'.$row["attr_name"].'" name="drp_wen_MV1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV1_'.$row["attr_name"].'" name="btnMV1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV1_'.$row["attr_name"].'\',\'txtName_MV1_'.$row["attr_name"].'\',\'txtEmail_MV1_'.$row["attr_name"].'\',\'rd_MV1_yes_'.$row["attr_name"].'\',\'drp_wen_MV1_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs1_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH1_'.$row["attr_name"].'\'); show_block(\'char_vh1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh1_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH1_'.$row["attr_name"].'" name="txtVH1_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh1_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH1_'.$row["attr_name"].'" name="txtName_VH1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH1_'.$row["attr_name"].'" name="txtEmail_VH1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH1_yes_'.$row["attr_name"].'" name="rd_VH1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH1_'.$row["attr_name"].'" name="drp_wen_VH1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH1_'.$row["attr_name"].'" name="btnVH1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH1_'.$row["attr_name"].'\',\'txtName_VH1_'.$row["attr_name"].'\',\'txtEmail_VH1_'.$row["attr_name"].'\',\'rd_VH1_yes_'.$row["attr_name"].'\',\'drp_wen_VH1_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs1_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["apprx_time"].'</span></div>
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW1_'.$row["attr_name"].'\'); show_block(\'char_vw1_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw1_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW1_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW1_'.$row["attr_name"].'" name="txtVW1_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW1_'.$row["attr_name"].'" name="txtName_VW1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW1_'.$row["attr_name"].'" name="txtEmail_VW1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW1_yes_'.$row["attr_name"].'" name="rd_VW1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW1_'.$row["attr_name"].'" name="drp_wen_VW1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW1_'.$row["attr_name"].'" name="btnVW1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW1_'.$row["attr_name"].'\',\'txtEmail_VW1_'.$row["attr_name"].'\',\'rd_VW1_yes_'.$row["attr_name"].'\',\'drp_wen_VW1_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense1_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP1_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP1_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp1_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP1_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%; font-size:14px; font-family:Calibri;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP1_'.$row["attr_name"].'" name="txtFee_EXP1_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP1_'.$row["attr_name"].'\',\'txtCam_EXP1_'.$row["attr_name"].'\',\'txtOth_EXP1_'.$row["attr_name"].'\',\'txtTot_EXP1_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP1_'.$row["attr_name"].'" name="txtCam_EXP1_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP1_'.$row["attr_name"].'\',\'txtCam_EXP1_'.$row["attr_name"].'\',\'txtOth_EXP1_'.$row["attr_name"].'\',\'txtTot_EXP1_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP1_'.$row["attr_name"].'" name="txtOth_EXP1_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP1_'.$row["attr_name"].'\',\'txtCam_EXP1_'.$row["attr_name"].'\',\'txtOth_EXP1_'.$row["attr_name"].'\',\'txtTot_EXP1_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP1_'.$row["attr_name"].'" name="txtTot_EXP1_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP1_'.$row["attr_name"].'" name="txtName_EXP1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP1_'.$row["attr_name"].'" name="txtEmail_EXP1_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP1_yes_'.$row["attr_name"].'" name="rd_EXP1_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP1_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP1_'.$row["attr_name"].'" name="drp_wen_EXP1_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp1_'.$row["attr_name"].'" name="btnExp1_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP1_'.$row["attr_name"].'\',\'txtCam_EXP1_'.$row["attr_name"].'\',\'txtOth_EXP1_'.$row["attr_name"].'\',\'txtName_EXP1_'.$row["attr_name"].'\',\'txtEmail_EXP1_'.$row["attr_name"].'\',\'rd_EXP1_yes_'.$row["attr_name"].'\',\'drp_wen_EXP1_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_Access1_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="4">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
			   
			 /*   <div id="div_lnk_desc_cmr" align="right" style="width:100%; margin-top:5px;" onClick="show_block(\'add_access_div_'.$row["attr_name"].'\');" onDblClick="hide_block(\'add_access_div_'.$row["attr_name"].'\');">
			 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;">Edit/<br/>Add Comment</div>
				 </div>
		    
				<div id="add_access_div_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">			 
				<div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Name</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div>
				 <div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Email</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div> 
			   
			      <table width="100%" height="200px" border="1px" bordercolor="#ddd" cellpadding="0px" cellspacing="0px" style="text-align:center; border:1px solid #ddd;">
			     <tr>
				    <th rowspan="2" width="50px"><span class="font-medium" style="float:none">From</span></th>
					<th rowspan="2" width="50px"><span class="font-medium" style="float:none">To</span></th>
					<th rowspan="2" width="50px" style="word-wrap:true"><span class="font-medium" style="float:none">Distance(in Km)</span></th>
					<th colspan="3" width="180px" ><span class="font-medium" style="float:none">Approx. fare (in INR)</span></th>
				 </tr>
				 <tr>
					<th width="40px"><span class="font-medium" style="float:none">Taxi</span></th>
					<th width="40px"><span class="font-medium" style="float:none">Auto</span></th> 
					<th width="40px"><span class="font-medium" style="float:none">Bus</span></th>
				 </tr>
				 <tr>
				   <td><span class="font-medium">Airport</span></td>
				   <td rowspan="4"><span class="font-medium" id="sp_attr" style="font-size:14px;"></span></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
			     </tr>
				   <tr>
				   <td><span class="font-medium">Bus Stop</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
				   <tr>
				   <td><span class="font-medium">Railway<br/> Station</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
			   </table>
			   
			    <span><div class="smallbtn" style="width:30px;" onClick="show_block(\'div_msg_acc_cmr\'); hide_block(\'add_access_div_'.$row["attr_name"].'\');">Add</div></span> 			  
			 </div>  */
			 
			 echo '</div>
			 </span> 		 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;"><a href="#" onClick="">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></a></span> 
	
  </div>   ';
  
          }
		}
		}
		?>
</div>


<!-----------------------  	Wishlist-map Pop ups -------------------------------------------------------------------->

<div id="div_wishlst_map" style="display:none; overflow:scroll; height:550px; width:960px; position:absolute; background:#FFFFFF; box-shadow:2px 2px 2px grey;
   margin:1% 3% 0% 15%; z-index:10000; border:1px solid #333;">
   
   <div style="color:white; width:100%;"> 
  <span id="closeBtn" style="float:right; z-index:300;"/>
   <img src="Images/cancelbtn.png" width="40px" height="40px" style="cursor:pointer;" onClick="close_wshlst_map();" />
   </span>
   </div>
     
   <span style="float:left; width:60%;">
   <div style="margin:5px 3px 3px 5px;">
     <span id="btnMapAll" class="smallbtn" style="width:40px; heigh:20px; float:left; cursor:pointer;" >All</span></a>
	 <span id="btnMapDay1" class="smallbtn" style="width:40px; heigh:20px; float:left; background:purple; cursor:pointer;" >Day 1</span></a>
	 <span id="btnMapDay2" class="smallbtn" style="width:40px; heigh:20px; float:left; background:#C71585; cursor:pointer;" >Day 2</span></a>
	<span id="btnMapDay3" class="smallbtn" style="width:40px; heigh:20px; float:left; background:blue; cursor:pointer;">Day 3</span></a>
	 <span id="btnMapDay4" class="smallbtn" style="width:40px; heigh:20px; float:left; background:green; cursor:pointer;" >Day 4</span></a>	 
   </div>
  
   <div id="map_selected_All" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
  <div id="map_selected_Day1" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day2" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day3" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>
   <div id="map_selected_Day4" style="width:530px; height:480px; margin:15px 5px 10px 20px;float:left; display:none;"></div>  
   
   </span>
   
         <span style="float:left; display:none;">      
   <span id="sp1" style="display:none;"></span>
   <span id="sp2" style="display:none;"></span>
  </span>
  	
   <span style="float:right; width:40%;">   
    <div id="div_All_Loc" style="margin-top:20px;">
	<div class="div_elements" style="float:left;width:100%;"><span id="onMap_city" style="float:left; color:#FF0033; font-size:16px;"></span></div>
	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:block; margin-top:5px;">	  
      <table id="map_table_All" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>
	  </table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day1" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>
	  </table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day2" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>

	  </table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day3" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>
		 
  </table>
	  </div>
	  	<div style="margin-top:5px; background:#FFFFCC; width:380px; height:300px; border:1px solid grey; overflow:scroll; display:none;">
      <table id="map_table_Day4" width="200px" cellspacing="1px" cellpadding="5px" style="margin:3px 5px 3px 3px;">
	     <tr>
		   <th width="20px">Sl.No.</th>
		   <th>Day*</th>
		   <th>City</th>
		    <th>Attraction</th>			
		   <th>Distance(Km)</th>
		   <th>Price(INR)</th>
		 </tr>
	  </table>
	  </div>	 
	  <div style="margin-top:5px;">
	  <span style="float:left; font-size:12px; color:#222222; font-family:Calibri;">*Click on day to change(Ex. DAY1 to DAY4).<br/>After edit click on "Refresh" button above the map.</span>
	  <span style="float:right;"><span id="btnMapRefr" class="smallbtn" style="width:50px; heigh:20px; float:left; background:Maroon; cursor:pointer;">Refresh</span></span>
	  </div>
   </div>
   <div style="margin-top:10px; width:100%; float:left;">
   <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Save to<br/>profile</div></span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Download<br/>Now</div> </span>
	  <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Create<br/>Trip</div></span>
	    <span style="float:left; color:#FFFFFF; cursor:pointer;" onClick="close_wshlst_map();">
	  <div align="left" class="smallbtn" style="width:60px; height:30px; background:#993399;">Book<br/>Hotel</div></span>
   </div>
 </span>

</div>



<!----------------------- Saved Wishlist-map Pop ups -------------------------------------------------------------------->
<div id="div_wishlst_map_svd" style="display:none; overflow:scroll; height:550px; width:960px; position:absolute; background:#FFFFFF; box-shadow:2px 2px 2px grey;
   margin:1% 3% 0% 15%; z-index:10000; border:1px solid #333;">
 
</div>


<!---------------------------- Header and Footer ------------------------------------------------------------------->
<div id="master_container">

	<div id="fixedHeader">
 		<div id="headerTemplates">
		 
			 <div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>			
         
   		    <div id="header_CenterSpace"></div>
		
 	    	<div id="header_rightbtn">
    			
	    		   <span style="cursor:pointer;" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">
			  <span id="btnCustomer" class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px grey; margin-right:3px; margin-bottom:2px; background:#F5F5F5; color:#B22222;">24x7 Support</span></span>
			  	
				<?php		
			  if(isset($_GET['secure']))
				{		
				if($_GET['secure'] == "false")
				{
			echo  '<span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span>			   
			      <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span>';
			    }				
				else if($_GET['secure'] == "true")
				{
				echo '<img src="Images/icons/home.jpeg" width="30px" height="30px" style="cursor:pointer" onclick="cust_home();" />';
				}
				}
				else
				{
				echo  '<span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span>			   
			      <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span>';
				}
				?>
				 </div>	
		 
	       <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div> 
			 
	</div>	
	<div  style="float:left; width:100%; margin-bottom:3px;">
	<span id="user_wlc" style="float:left; display:none;">Welcome&nbsp;</span>
	<span id="user_eml" class="font_medium" style="float:left; margin-left:10px; font-size:14px;"><?php if(isset($_SESSION["userEmail"]) && $_SESSION["userEmail"]!="") echo $_SESSION["userEmail"];?></span>
	<input type="text" id="userLog" name="userLog" style="float:left; margin-left:10px; border:0px; background:transparent; outline:none; visibility:hidden;" value="<?php if(isset($_SESSION["clientID"]) && $_SESSION["clientID"]!="") echo $_SESSION["clientID"];?>">
	  </span>
	 </div> 
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:9px;"></div>	
</div>
    
	<div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">	
	<a href="Missing_pets.php"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px; cursor:pointer;">Missing Pets</span></a>	
	<span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px; cursor:pointer;">About Us</span>
  <span class="smallbtn" style="width:100px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px; cursor:pointer;" >Privacy Policy</span>
	<span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px; cursor:pointer;">Payment Security</span>
	<span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px; cursor:pointer;">Feedback </span>
	<span id="span_more" class="smallbtn" style="width:50px; cursor:pointer; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" onMouseOver="div_showMore();" onClick="div_hideMore();">More </span>
	</div>
	     </div>
		 
</div>


<div id="body_container" style="overflow:hidden;">

<div id="body_header" style="width:100%;">
			
<div id="div_CustomThanku" <?php if($thnk_msg == true) {?> style="display:block; height:220px; "<?php } else if($thnk_msg == false){?> style="display:none;" <?php }?> >
      
				 <div class="div_elements" style="font-size:24px;color:#0066FF;margin-top:15px; margin-left:10px;">
				       Thank you for submitting your custom vacation requirements. <Br/> Our support team will revert in next 48 hours<br/>
					   <span style="text-decoration:blink; color:#ff0000; font-size:16px;">
					   Your Reference ID : <?php  echo $leadID; ?></span>	
					   
			<div style="width:100%; float:left; margin-top:20px;">
			<span style="float:left;" class="div_elements">Your Name </span>
		   <span style="float:left;" class="div_elements">
			<input type="text" id="txtName_cust" name="txtName_cust" class="txtbox"  style="width:130px;" onMouseOver="txtbox_color_onmouseover('txtName_cust');" onMouseOut="txtbox_color_onmouseout('txtName_cust');" /></span>
		   <span class="div_elements" style="float:left; margin-left:10px;">Your e-mail </span>
		   <span style="float:left;" class="div_elements">
			<input type="text" id="txtemail_cust" name="txtemail_cust" class="txtbox"  style="width:130px;" onMouseOver="txtbox_color_onmouseover('txtemail');" onMouseOut="txtbox_color_onmouseout('txtemail');" onChange="valid_email('txtEmail_cust');" value="<?php if(isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"]; ?>" /></span>
			<span class="div_elements" style="float:left; margin-left:10px;">Your Phone </span>
			<span style="float:left;" class="div_elements">
			<input type="text" id="txtphone_cust" name="txtphone_cust" class="txtbox" style="width:130px;" maxlength="10" onMouseOver="txtbox_color_onmouseover('txtphone');" onMouseOut="txtbox_color_onmouseout('txtphone');" onKeyPress="return isNumber(event)"></span>
			</div>
			
			<div style="float:left; width:100%; margin-top:5px;">
			<span class="font_medium" style="font-size:14px; color:#ff0000; font-weight:100;">Your contact details will be used for communicating the quotes/responses only.</span>
			<span class="div_elements" style="float:right; margin-right:10px;">
			<input type="submit" id="btn_sub_quot_email" name="btn_sub_quot_email" class="smallbtn" style="text-decoration:none; color:white; margin-right:2%; width:60px;" value="Submit" /> </span>
			</div>

					 
	  </div>
</div>
	
<div id="contextInputsEmail"
		 style="border-radius:5px;
		 position:absolute;
		 padding:2px 2px 2px 2px;
		 margin-left:3px;
		 margin-right:3px;
		 height:auto;
		 width:auto;
		 display:none;
		 background:#FFFFCC;
		 color:white;
		 z-index:10000;
		 font-size:13px;
		 color:#4e5054;
		 border:1px solid gray;">
		 Email
		 </div>	
		 
<div id="contextInputsSave"
		 style="border-radius:5px;
		 position:absolute;
		 padding:2px 2px 2px 2px;
		 margin-left:3px;
		 margin-right:3px;
		 height:auto;
		 width:auto;
		 display:none;
		 background:#FFFFCC;
		 color:white;
		 z-index:10000;
		 font-size:13px;
		 color:#4e5054;
		 border:1px solid gray;">
		 Save
		 </div>	
		 

<div id="vacation_images_body">

<div id="header" align="left" style="height:42px;; background:#597272;">

  <span style="float:left; font-size:23px; font-weight:bold; color:#FFFFFF; font-family:'Lucida Handwriting'">
  <span style="margin-top:20px; margin-right:10px;"> Things to do in </span></span>
  
  <span id="cityUrl"  class="hdrFont">
  <?php 
  $q_city_hdr = "select distinct(loc_name) as loc_name from cityscape_content_publish where loc_name='$p'";
  $res_hdr = mysqli_query($con,$q_city_hdr);
  
  $sel_st = "select stateName, locName from user_destinations where locName like '%".$p."%'";
	$res_st = mysqli_query($con,$sel_st);
  if($res_hdr)
  {
  while($row= mysqli_fetch_array($res_hdr))
  { 
   if($res_st)
   {
   while($r=mysqli_fetch_array($res_st))
   {   
  echo '<span id="hdr_city" style="margin-top:20px;">'.$row["loc_name"].", ".$r["stateName"].'</span>'; 
   }
  }   
  }
  }
  ?>
  </span>
  
  <span style="float:right;">
	
	<div style="width:100%;">
     <span style="float:left;">
	 <div class="smallbtn" style="width:120px; font-size:14px; background: #333333">Best time to Visit</div></span>	
	 <span style="float:left;">
<div id="btn_currency" class="smallbtn" style="width:100px; font-size:14px; background:#333333; cursor:pointer;" onClick="show_block('div_currency');" onDblClick="hide_block('div_currency');">
	 <span style="color:#FFFFFF;">Currency</span></div>
	 <div id="div_currency" style="display:block; margin-right:3px;">
	<span style="float:left;">
	<select id="drplf_currency" style="font-size:11px; width:60px; height:22px;" onChange="chgCurrency();">
	 <option selected="selected" value="USD">1 USD</option>
	 <option value="POUND">1 POUND</option>
	 <option value="EURO">1 EURO</option>
	 <option></option>
	</select></span>	
	<span style="float:left; margin-left:3px;">
	  <select style="font-size:11px; width:50px; height:22px;">
	   <option selected="selected">INR</option>
	   <option>POUND</option>
	   <option>USD</option>
	   <option>EURO</option>
	  </select>
	</span>
	<span style="float:left;"><input id="txtCurrency" type="text" style="width:38px; font-size:11px; height:21px; border-radius:3px; margin-top:1px; background:#FFFFFF; color:#222222; border:0px; margin-left:3px; float:right" value="65.77" /></span>
	 </div>
	 </span>
   </div>
   
   </span>
 
 </div>
 
 <!------------------------------------------------------- Near By Places --------------------------------------------------------->
 
 <div style="width:100%; height:20px; background:#597272; margin-bottom:0px;">
   
        <div class="div_elements_visible" style="width:100%; margin-top:1px; margin-bottom:0px;">
					       <span style="font-size:12px; float:left; color:#FFFFFF;">Include nearby places within &nbsp;</span>
						  <span style="font-size:12px; float:left;">
						 
						   <select id="drpshrtDist" name="drpshrtDist" style="height:20px; width:80px; font-size:12px;" onChange="chgDist('<?php if(isset($_SESSION["clientID"])) echo $_SESSION["clientID"]?>','<?php if(isset($_SESSION["WLID"])) echo $_SESSION["WLID"] ?>');">
						   <option value="SELECT">Select</option>
						    <option value="1-100" <?php if(isset($_GET['dist']) && $_GET['dist']=="1-100"){ ?> selected="selected"<?php }?>>0-100</option>
						     <option value="100-200" <?php if(isset($_GET['dist']) && $_GET['dist']=="100-200"){ ?> selected="selected"<?php }?>>100-200</option>
						     <option value="200-300" <?php if(isset($_GET['dist']) && $_GET['dist']=="200-300"){ ?> selected="selected"<?php }?>>200-300</option>
							 <option value="300-400" <?php if(isset($_GET['dist']) && $_GET['dist']=="300-400"){ ?> selected="selected"<?php }?>>300-400</option>
							 <option value="400-500" <?php if(isset($_GET['dist']) && $_GET['dist']=="400-500"){ ?> selected="selected"<?php }?>>400-500</option>
							 <option value="500-750" <?php if(isset($_GET['dist']) && $_GET['dist']=="500-750"){ ?> selected="selected"<?php }?>>500-750</option>
							 <option value="750-1000" <?php if(isset($_GET['dist']) && $_GET['dist']=="750-1000"){ ?> selected="selected"<?php }?>>750-1000</option>
							 <option value="1000-4000" <?php if(isset($_GET['dist']) && $_GET['dist']=="1000-4000"){ ?> selected="selected"<?php }?>>1000+</option>			 
						</select>
					     
						  </span>
						  <span style="font-size:12px; float:left; color:#FFFFFF; margin-left:3px;">Km</span>
						  
						  <?php 
						  if(isset($_SESSION["clientID"]) && isset($_GET["WLID"]))
						  {
						  echo '<span class="hdrFont" style="font-size:12px; float:left; margin-left:10px;">Destinations Viewed:</span>';
	$q_viewed = "select distinct(loc_name) as loc_name, wl_id from saved_wl where client_id='".$_SESSION["clientID"]."' and wl_id='".$_GET["WLID"]."' order by date_saved desc";
		  $res_viewed = mysqli_query($conn,$q_viewed);
		  if($res_viewed)
		  {
		  while($row = mysqli_fetch_array($res_viewed))
		  {
		  
		   $_SESSION["WLID"]=$row["wl_id"];
			 $_SESSION["prev_Loc"] = $row["loc_name"];  
		   
		  if(isset($_SESSION["clientID"]))
		    $userID = $_SESSION["clientID"];					  
			else
			 $userID = "";		 
			
			 
			 if(isset($_SESSION["WLID"]))
			 {
			 if($_SESSION["WLID"]!="")
			  $wid = $_SESSION["WLID"];
			 else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			  }	
			   else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			 else
			   $wid =""; 
			
		  	echo '<span id="sp_'.$row["loc_name"].'" style="position:relative; float:left;">';
		    echo '<a id="view_'.$row["loc_name"].'"><div id="btn_view_'.$row["loc_name"].'" class="sp_view_cities" onclick="change_color(this.id,\''.$row["loc_name"].'\',\'view_'.$row["loc_name"].'\',\''.$userID.'\',\''.$row["wl_id"].'\');">'.$row["loc_name"].'</div></a>';
			echo '</span>';			
			}			 			 
		}
			echo '<script type="text/javascript">
			 function change_color(id,cty,view,d,user,wid)
			 {
			  document.getElementById(id).style.background="#ff0000";
			   document.getElementById(view).href = "ExploreDest_Cityscape.php?id=klsjdflk slkdjflksdfdskl lskjsdlkfsjdlkfsdjf&p="+cty+"&WLID="+wid+"&ID="+user;
			   document.getElementById(view).target = "_self";
			 }			
			 </script>';
			  echo '<span style="float:left;"><button type="submit" name="shw_WL" id="shw_WL" value="Show" class="smallbtn">Show</button></span>';
			 }			
		 ?>	
		 								  
	    </div>
		
		<div id="show_7res" style="float:left; margin-top:3px;">
		  <?php
		  if(isset($_GET['p']))
		  {
		  $city = $_GET['p'];
		  if(isset($_GET['dist']) && $_GET['dist']!="SELECT")
		  {
		      $dist = explode("-",$_GET['dist']);
				 
		  $q_nb = "select to_loc, distance from distance_matrix where from_loc like '$city%' and distance between $dist[0] and $dist[1] order by distance asc";
		  $res_nb = mysqli_query($con,$q_nb);
		  $i=0;
		  while($r = mysqli_fetch_array($res_nb))
		  {
		  $i++;
		  $cty = explode(",",$r["to_loc"]);
		 if($i<=7)
		 {
		 if(isset($_SESSION["clientID"]))
		    $userID = $_SESSION["clientID"];
			else
			 $userID = "";
			 
		 if(isset($_SESSION["WLID"]))
			 {
			 if($_SESSION["WLID"]!="")
			  $wid = $_SESSION["WLID"];
			 else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			  }	
			   else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			 else
			   $wid =""; 
			
			echo '<span id="sp_'.$i.'" style="position:relative; float:left;">';
		    echo '<a id="ref_'.$r["to_loc"].'"><div id="btn_nb_'.$r["to_loc"].'" class="sp_nr_cities" onclick="change_color(this.id,\''.$cty[0].'\',\'ref_'.$r["to_loc"].'\',\''.$_GET['dist'].'\',\''.$userID.'\',\''.$wid.'\');">'.$cty[0].'</div></a>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$row["to_loc"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$r["to_loc"].'\');hide_block(\'cls_'.$row["to_loc"].'\');" />';
			echo '</span>';	
			}		
			}
			echo '<script type="text/javascript">
			function change_color(id,cty,ref,d,user,wid)
 			{
  			document.getElementById(id).style.background="#ff0000";
 			 document.getElementById(ref).href = "ExploreDest_Cityscape.php?&ID="+user+"&WLID="+wid+"&p="+cty;
 			 document.getElementById(ref).target = "_self";
			}</script>';
			echo '<span style="float:left; cursor:pointer; color:#0066ff; margin-top:12px; font-size:12px; font-weight:bold;" onclick="show_block(\'show_14res\'); hide_block(\'show_7res\'); hide_block(\'show_allres\');">Show More..</span>';			 			 
		}
			
		  }
		  ?>
		</div>
		
		<div id="show_14res" style="float:left; margin-top:3px; display:none;">
		  <?php
		  if(isset($_GET['p']))
		  {
		  $city = $_GET['p'];
		  if(isset($_GET['dist']) && $_GET['dist']!="SELECT")
		  {
		      $dist = explode("-",$_GET['dist']);
				 
		  $q_nb = "select to_loc, distance from distance_matrix where from_loc like '$city%' and distance between $dist[0] and $dist[1] order by distance asc";
		  $res_nb = mysqli_query($con,$q_nb);
		  $i=0;
		  while($r = mysqli_fetch_array($res_nb))
		  {
		  $i++;
		  $cty = explode(",",$r["to_loc"]);
		 if($i<=14)
		 {
		 if(isset($_SESSION["clientID"]))
		    $userID = $_SESSION["clientID"];
			else
			 $userID = "";
			 
			 if(isset($_SESSION["WLID"]))
			 {
			 if($_SESSION["WLID"]!="")
			  $wid = $_SESSION["WLID"];
			 else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			  }	
			   else if(isset($_GET["WLID"]))
			   $wid = $_GET["WLID"];
			 else
			   $wid =""; 
			  
			
			echo '<span id="sp_'.$i.'" style="position:relative; float:left;">';
		    echo '<a id="ref_'.$r["to_loc"].'"><div id="btn_nb_'.$r["to_loc"].'" class="sp_nr_cities" onclick="change_color(this.id,\''.$cty[0].'\',\'ref_'.$r["to_loc"].'\',\''.$_GET['dist'].'\',\''.$userID.'\',\''.$wid.'\');">'.$cty[0].'</div></a>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$row["to_loc"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$r["to_loc"].'\');hide_block(\'cls_'.$row["to_loc"].'\');" />';
			echo '</span>';	
			}		
			}
			echo '<script type="text/javascript">
			function change_color(id,cty,ref,d,user,wid)
 			{
  			document.getElementById(id).style.background="#ff0000";
 			 document.getElementById(ref).href = "ExploreDest_Cityscape.php?&ID="+user+"&WLID="+wid+"&p="+cty;
 			 document.getElementById(ref).target = "_self";
			}</script>';
			echo '<span style="float:left; cursor:pointer; color:#0066ff; margin-top:12px; font-size:12px; font-weight:bold;" onclick="show_block(\'show_allres\'); hide_block(\'show_7res\'); hide_block(\'show_14res\');">Show More..</span>';			 			 
		}
			
		  }
		  ?>
		</div>
		
		<div id="show_allres" style="float:left; margin-top:3px; display:none;">
		  <?php
		  if(isset($_GET['p']))
		  {
		  $city = $_GET['p'];
		  if(isset($_GET['dist']) && $_GET['dist']!="SELECT")
		  {
		      $dist = explode("-",$_GET['dist']);
				 
		  $q_nb = "select to_loc, distance from distance_matrix where from_loc like '$city%' and distance between $dist[0] and $dist[1] order by distance asc";
		  $res_nb = mysqli_query($con,$q_nb);
		  
		  while($r = mysqli_fetch_array($res_nb))
		  {
		  $i++;
		  $cty = explode(",",$r["to_loc"]);
		  
		  if(isset($_SESSION["clientID"]))
		    $userID = $_SESSION["clientID"];
		else
			 $userID="";
			 
				if(isset($_SESSION["WLID"]))
			{
			   if($_SESSION["WLID"]!="")
			    $wid = $_SESSION["WLID"];
				else if(isset($_GET["WLID"]))
				 $wid = $_GET["WLID"];			
			}	
			else if(isset($_GET["WLID"]))  
			   $wid = $_GET["WLID"];
			
			echo '<span id="sp_'.$i.'" style="position:relative; float:left;">';
		    echo '<a id="ref_'.$r["to_loc"].'"><div id="btn_nb_'.$r["to_loc"].'" class="sp_nr_cities" onclick="change_color(this.id,\''.$cty[0].'\',\'ref_'.$r["to_loc"].'\',\''.$_GET['dist'].'\',\''.$userID.'\',\''.$wid.'\');">'.$cty[0].'</div></a>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$row["to_loc"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$r["to_loc"].'\');hide_block(\'cls_'.$row["to_loc"].'\');" />';
			echo '</span>';	
			}	
					 			 
		}		
			echo '<script type="text/javascript">
			function change_color(id,cty,ref,d,user,wid)
 			{
  			document.getElementById(id).style.background="#ff0000";
 			 document.getElementById(ref).href = "ExploreDest_Cityscape.php?&ID="+user+"&WLID="+wid+"&p="+cty;
 			 document.getElementById(ref).target = "_self";
			}</script>';
		  }
		  ?>
		</div>
		
 </div>


<!------------------------------------------ Wishlist ------------------------------------------------>

<div id="div_trpTime" class="popUp_dest" style="width:200px; height:auto; padding:5px; display:none;">
  <div style="float:left; width:100%">
    <span style="float:right; margin-right:-1px;"><img src="Images/closebtn.png" width="15px" height="15px" /></span>
  </div>
  <div style="float:left; width:100%;">
    <table width="100%" style="font-size:12px;" cellpadding="0" cellspacing="0">
	 <tr>
	 <th align="center">Starts At</th>
	 <th align="center">Ends At</th>
	 </tr>
	 <tr>
	  <td align="center">
	  
	  </td>
	  <td align="center">
	   
	  </td>
	 </tr>
	</table>
  </div>
</div>	

<div id="div_notes" class="popUp_imgs_div" style="width:300px; height:auto;"></div>

	 
<div id="div_wishlist" <?php if($wl_clm == true){?> style="display:block;" <?php } else if($user_cust == true){?> style="display:block;" <?php } ?> >
	 		 
    <div  style="width:100%; background:#002929; float:none; text-align:left; margin:0 0 0 0;font-family:'Lucida Handwriting'; font-weight:600; position:relative; opacity:1; color:#FFFFFF;">My  Wishlist in&nbsp;<span id="wsh_hdr">
	<?php
	$arrCity = array();
	if(isset($_SESSION["clientID"]) && isset($_SESSION["WLID"]))
	{
	$q_city_hdr = "select distinct(loc_name) as loc_name from saved_wl where client_id = '".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
  $res_hdr = mysqli_query($conn,$q_city_hdr);
  if($res_hdr)
  {
  while($row= mysqli_fetch_array($res_hdr))
  {
  echo '<span id="hdr_city_wl" style="margin-top:20px; color:#fff;">'.$row["loc_name"].',</span>'; 
 
  $arrCity[] = $row["loc_name"];
 
  echo '<script type="text/javascript">';
  echo 'var arrCity = new Array();';
  $js_arr = json_encode($arrCity);
  echo 'arrCity = '.$js_arr.';';
  echo '</script>';
  
  }
   echo '<span style="margin-top:20px; color:#fff; margin-left:20px;">Wishlist ID : '.$_SESSION["WLID"].'</span>';
  $cnt_city = count($arrCity);
   }
  }
  else
  {
   echo '<span id="hdr_city" style="margin-top:20px; color:#fff; ">'.$p.'</span>';
  if(isset($_SESSION["WLID"])) {   echo '<span style="margin-top:20px; color:#fff; margin-left:20px;">Wishlist ID : '.$_SESSION["WLID"].'</span>'; }
  }
  ?>
	</span>
	<span id="sp_stay" style="margin-left:100px; font-size:14px;"></span>
	<span style="float:right; cursor:pointer;" onClick="hide_block('div_wishlist');">
	<img src="Images/cancelbtn_drkGrn.png" width="25px" height="20px" /></span>
	</div>
  
    <div style="width:100%; height:auto; background:url('Images/notebook_img.png')repeat;">
         <div id="div_wish_tab" class="div_wishlist_tabwrite" style="position:relative; z-index:0; table-layout:fixed; word-wrap:break-word; float:left; width:100%; background:#FFFFFF; opacity:0.8; color:black; overflow-x:hidden; overflow-y:scroll; height:auto; max-height:200px; border:0px solid grey;">	
	
	 <table class="div_wishlist_tabwrite" style="position:relative; width:100%; table-layout:fixed; word-wrap:break-word; color:#555;" cellpadding="1" cellspacing="0">
	 <tr style="background:#FFFFCC; ">
	 <th align="left" width="15px">#</th>	 	 	 		  
	  <th align="left" width="100px">Location</th>
	   <th align="left" width="90px">Category</th>
	  <th align="left" width="130px">Attraction</th>
	    <th id="td_chk_all" align="left" width="50px" style="display:none;">
	      <span style="width:100%;"><input type="checkbox" id="chkselectAll" />Select All</span>
		  </th>	     
  	  <th align="left" width="80px">Trip Date</th>
	  <th align="left" width="60px">Schedule<br/>Itinerary</th>
	   <th align="left" width="120px">Trip <br/>Time<br/>From &nbsp; To</th>
	     <th align="left" width="50px">Approx<br/> Visit Time</th>
	  <th align="left" width="50px">Approx Expense</th>
	   <th align="left" width="40px">Notes</th>
	   <th align="left" width="52px">Delete<br/>
		<img id="imgDel" src="Images/cancelbtn.png" width="20px" height="20px"> All</th>
	   </tr>	   
   </table>
  
   <table id="tab_saved_WL" class="div_wishlist_tabwrite" style="position:relative; z-index:0; table-layout:fixed; word-wrap:break-word; float:left;" cellpadding="1" cellspacing="0">
  <?php 
  if(isset($_SESSION["clientID"]) && isset($_SESSION["WLID"]))
  {
     $q_saved_wl = "select distinct(attr_name) as attr_name, wl_id, loc_name, cate_id, DATE_FORMAT(trip_date,'%d-%m-%Y') as trip_date, schedule, trip_time, apprx_visit_time, notes, apprx_expense from saved_wl where client_id='".$_SESSION["clientID"]."' and wl_id='".$_SESSION["WLID"]."'";
	 
	$res_saved_wl = mysqli_query($conn,$q_saved_wl);
	
	$i=0;
	if($res_saved_wl)
	{
     while($row = mysqli_fetch_array($res_saved_wl))
	 {
	 $attr = $row["attr_name"];
	  $btnAtr = array();
	  $btnAtr = str_replace(" ","_",$attr);	  
	  $time = explode(":",$row["trip_time"]);
	  
	  $strt = explode("-",$time[0]);
	  $end = explode("-",$time[1]);
	    	
	    $i= $i+1;
	  echo  '<tr>    
	   <td width="15px">'.$i.'</td>
	   <td  width="115px">'.$row["loc_name"].'</td>
	   <td  width="100px">'.$row["cate_id"].'</td>
	   <td width="150px">'.$row["attr_name"].'</td>
	   <td id="trp_dt_'.$i.'"  "width="120px">
	   <input type="text" id="txtSvdDt_'.$i.'" style="width:100%;"  value="'.$row["trip_date"].'"  onChange="svdDt(this.value,\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');"    /></td>
	  <td  width="60px" align="center">'.$row["schedule"].'</td>
	   <td  width="140px">
	    <span><select id="txtSvdStartTime_'.$i.'" style="width:auto; font-size:12px;" placeholder="starts at" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
		<option value="'.$strt[0].'">'.$strt[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	   <span>
	   <select id="drpStartType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$strt[1].'">'.$strt[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span> &nbsp;
	   <span><select id="txtSvdEndTime_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	   <option value="'.$end[0].'">'.$end[0].'</option>
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	   </select></span>
	    <span>
	   <select id="drpEndType_'.$i.'" style="width:auto; font-size:12px;" onChange="svdTime(\'txtSvdStartTime_'.$i.'\',\'txtSvdEndTime_'.$i.'\',\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\'drpStartType_'.$i.'\',\'drpEndType_'.$i.'\');">
	    <option value="'.$end[1].'">'.$end[1].'</option>
	    <option value="AM">AM</option>
		<option value="PM">PM</option>
	   </select>
	   </span>	   
	  </td>
	  <td  width="50px">'.$row["apprx_visit_time"].'</td>
	   <td  width="50px">'.$row["apprx_expense"].'</td>
	   <td  width="40px">
	   <span onclick="showNotes(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\');" style="color:#0066ff; text-decoration:underline; cursor:pointer;">Notes..</span></td>
	   <td  style="width:52px;">	   
	   <img src="Images/cancelbtn.png"  width="20px" height="20px" style="cursor:pointer;" onclick="delSvdAttr(\''.$row["wl_id"].'\',\''.$row["attr_name"].'\',\''.$row["trip_date"].'\');" /></td>	   
	</tr>';
	 }
	} 
	}	
	?>
	</table>
	
  <table id="tab_wishlist" class="div_wishlist_tabwrite" style="position:relative; z-index:0; table-layout:fixed; word-wrap:break-word; float:left; background:url(Images/Background) no-repeat;" cellpadding="1" cellspacing="0">
    <tr>
	   <th align="left"  width="15px"></th>	 	 	 		  
	  <th align="left"  width="110px"></th>
	   <th align="left" width="90px"></th>
	  <th align="left" width="150px"></th>
	    <th id="td_chk_all" align="left" width="50px" ></th>	     
  	  <th align="left" width="80px" > </th>
	  <th align="left"   width="60px"></th>
	   <th align="left"  width="150px"></th>
	     <th align="left"   width="50px"></th>
	  <th align="left"   width="50px" ></th>
	   <th align="left"   width="40px"></th>
	   <th align="left"  width="52px"></th>
	</tr>
   </table>  

      </div>
	  
    </div> 
	
	 <input type="text" id="txtWL_rows" name="txtWL_rows" style="visibility:hidden;" />
	
	<div id="div_wishlist_btns_saved" align="right" style="width:100%; display:block; overflow:hidden; margin-left:0%; margin-top:0%; float:left; z-index:1;"> 	
	  <span style="cursor:pointer; color:#FFFFFF;" onClick="showSvdMap('<?php if(isset($_SESSION["WLID"])) echo $_SESSION["WLID"]; ?>');">
   <div id="btn_wshlst_mapView_saved" align="left" class="btn_wishlist" style="background:#ff0000;">
   <span style="padding:3px 5px 5px 27px; float:left;">Map View</span></div></span>  
	  	  <span style="text-decoration:none; color:#FFFFFF; cursor:pointer;" onClick="loadCustTrip('<?php if(isset($_SESSION["WLID"])) echo $_SESSION["WLID"]; ?>'); ">
		  <div align="left" class="btn_wishlist" style="background:green;" >
		  <span style="padding:3px 5px 5px 8px; float:left;">Create My Trip</span></div></span>
		  <span style="cursor:pointer; color:#FFFFFF;" onClick="show_hotel('<?php if(isset($_SESSION["WLID"])) echo $_SESSION["WLID"]; ?>');">	
		  <div align="left" class="btn_wishlist" style="background:#000066;"><span style="padding:3px 5px 5px 22px; float:left;">Book hotels </span></div></span>
		<!---<span style="cursor:pointer; color:#FFFFFF;" onClick="show_block('div_FriendRecomm');">
	    <div id="btn_wsh_mail" align="left" onMouseOver="ShowContent('contextInputsEmail');" onMouseOut="HideContent('contextInputsEmail');">
	   <span style="padding:3px 5px 5px 11px; float:left;">
	   <img src="Images/email_Icon.jpg" width="35px" height="35px" />
	   </span></div>  -------------->
	   </span>	   
	  	  </div>		  
	
	<div id="div_wishlist_btns" align="right" style="width:100%; display:none; overflow:hidden; margin-left:0%; margin-top:0%; float:left;"> 	
	  <span style="cursor:pointer; color:#FFFFFF;" onClick="show_block('div_greyBack'); show_block('div_wishlst_map'); map_hdr();">
   <div id="btn_wshlst_mapView" align="left" class="btn_wishlist" style="background:#ff0000;"><span style="padding:3px 5px 5px 27px; float:left;">Map View</span></div></span>  
	 <!-- 	  <span style="text-decoration:none; color:#FFFFFF; cursor:pointer;" onClick="show_custom_trip(); ld_cust_trip_htl();ld_cust_trip_trv();ld_cust_trip_trvl();ld_cust_trip_req();">
		  <div align="left" class="btn_wishlist" style="background:green;"><span style="padding:3px 5px 5px 8px; float:left;">Create My Trip</span></div></span>
		  <span style="cursor:pointer; color:#FFFFFF;" onClick="show_hotel();">	
		  <div align="left" class="btn_wishlist" style="background:#000066;"><span style="padding:3px 5px 5px 22px; float:left;">Book hotels </span></div></span>
		 <!--------<span style="cursor:pointer; color:#FFFFFF;" onClick="show_block('div_FriendRecomm');">
	  <div id="btn_wsh_mail" align="left" onMouseOver="ShowContent('contextInputsEmail');" onMouseOut="HideContent('contextInputsEmail');">
	   <span style="padding:3px 5px 5px 11px; float:left;">
	   <img src="Images/email_Icon.jpg" width="35px" height="35px" /></span></div>
	   </span>------------>
	   
	    <span style="cursor:pointer; color:#FFFFFF; float:left; margin-left:5px;">	
		  <button name="btnSaveWL" id="btnSaveWL" type="submit" style="border:0px; background:transparent; cursor:pointer; margin-top:0px;" onClick="show_block('div_wishlist'); hide_block('div_wishlist_btns_saved');">		 
		  <div align="left" class="smallbtn" style="width:50px; height:23px; background:#009900;">
		  <span style="float:left; padding:10px; padding-top:3px; font-size:14px; font-family:Calibri; font-weight:bold;">Save</span></div>
		  </button>
		  </span>
		  
		   <span id="imgSave" style="float:left;">
		   <span  style="float:left"><img  src="Images/Arrows/curved_left_arrow.jpg" width="30px" height="20px" alt="save" /></span>
		   </span>	  
	
	  	  </div>  
	  
</div>


<!----------------------- Custom Trip ----------------------------------------->
<div id="div_custom_trip">

</div>



<!-------------------------------------Hotel Popup ---------------------------------------------------------->	
<div id="div_cust_hotel" style="float:left; width:100%; position:relative; width:945px; height:300px; display:none; margin-bottom:5%;  border:1px solid grey;">
<div style="float:left; width:100%;">
 <span style="float:right;"><img src="Images/closebtn.png" width="30px" height="30px" onClick="hide_block('div_cust_hotel'); show_block('vacation_image_btns'); show_block('div_attr'); show_block('div_maps');" /></span>
</div>
<div id="custHtlLoc" style="float:left; width:100%;">

</div>
<div id="cust_htl_dtls" style="float:left; width:100%;">
<?php
if(isset($_SESSION["WLID"]))
{
$sel_loc = "select distinct(loc_name) as loc_name, DATE_FORMAT(max(trip_date),'%d-%m-%Y') as Dmax, DATE_FORMAT(min(trip_date),'%d-%m-%Y') as Dmin from saved_wl where wl_id='".$_SESSION["WLID"]."' group by loc_name";
$res_loc_drp = mysqli_query($conn,$sel_loc);
echo '<div style="float:left; width:100%; margin-top:20px;">
<table width="80%" cellpadding="5" cellspacing="0" style="table-layout:fixed; word-wrap:break-word;">
<tr>
 <th align="right">Location :</th>
<td align="left">
<input type="text" id="txtcustHtlLoc" class="txtbox_Tab" style="width:200px;" placeholder="Type Location" onchange="load_chk_dates(this.value,\''.$_SESSION["WLID"].'\');" /><br/> 
<select id="drpcustHtlLoc" style="width:180px;" onchange="load_chk_dates(this.value,\''.$_SESSION["WLID"].'\'); hide_block(\'txtcustHtlLoc\');">';
if($res_loc_drp)
{
echo '<option value="Select">Select Location</option>';
while($row = mysqli_fetch_array($res_loc_drp))
{
  echo '<option value="'.$row["loc_name"].'">'.$row["loc_name"].'</option>';
}
}

echo '</select>
</td>
</tr>
<tr>
 <th align="center" colspan="4">Check-in: &nbsp;
<input type="text" class="txtbox_Tab" style="width:100px;" placeholder="Check-in date" onclick="oDP.show(event,this.id,2); show_block(\'TripDates\');"  /> 
&nbsp;&nbsp;Check-out: &nbsp;<input type="text" class="txtbox_Tab" style="width:100px;" placeholder="Check-out date" onclick="oDP.show(event,this.id,2); show_block(\'TripDates\');" />&nbsp; &nbsp;
# Days &nbsp;<input type="text" class="txtbox_Tab" style="width:40px;" />
</tr>
<tr>
 <th colspan="4" align="center"># Rooms &nbsp;
<input type="text" class="txtbox_Tab" style="width:40px;" />
&nbsp; &nbsp;
# Adults: &nbsp; <input type="text" class="txtbox_Tab" style="width:40px;" />
&nbsp; &nbsp;  # Children: &nbsp; <input type="text" class="txtbox_Tab" style="width:40px;" />
</tr>
<tr>
<td colspan="4" align="center"><input type="button" class="smallbtn" style="width:100px; padding:2px; float:none;" value="Search hotels" /></td>
</tr>
</table>
</div>';
}
?>
</div>

</div>


<!-----------------------------------------------  Category Buttons ---------------------------------------------------->	

<div id="vacation_image_btns" <?php if($user_cust == false){?> style="display:block;" <?php } else {?> style="display:none;"<?php }?> >

<span class="div_btn_caption" onClick="btncolor_onclick('div_btn_shop','div_btn_sightsee','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');">
<div id="div_btn_shop" class="div_themes_caption" onClick="checkCity_shop();" <?php if($flag_shop==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?>  onMouseOver="btncolor_onmouse('div_btn_shop');" onMouseOut="btncolor_nomouse('div_btn_shop');">Shopping</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');">
<div id="div_btn_sightsee" class="div_themes_caption" onClick="checkCity_sightsee();"  onMouseOver="btncolor_onmouse('div_btn_sightsee');" onMouseOut="btncolor_nomouse('div_btn_sightsee');" <?php if($flag_sight==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Sightseeing</div></span>

<span class="div_btn_caption" onClick="  btncolor_onclick('div_btn_history','div_btn_sightsee','div_btn_shop','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_history" onClick="checkCity_hist();" onMouseOver="btncolor_onmouse('div_btn_history');" onMouseOut="btncolor_nomouse('div_btn_history');" <?php if($flag_hist==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Historical</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_nightlife','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_nightlife" onClick="checkCity_nightlife(); btncolor_onclick('div_btn_nightlife');" onMouseOver="btncolor_onmouse('div_btn_nightlife');" onMouseOut="btncolor_nomouse('div_btn_nightlife');" <?php if($flag_nite==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Food-NightLife</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_amusement','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_amusement" onClick="checkCity_kids(); btncolor_onclick('div_btn_amusement');" onMouseOver="btncolor_onmouse('div_btn_amusement');" onMouseOut="btncolor_nomouse('div_btn_amusement');" <?php if($flag_kids==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >For Kids</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_religious','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_religious" onClick="checkCity_religious();" onMouseOver="btncolor_onmouse('div_btn_religious');" onMouseOut="btncolor_nomouse('div_btn_religious');" <?php if($flag_relg==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Religious</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_cultural','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_mustSee','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_cultural" onClick="checkCity_cultural();" onMouseOver="btncolor_onmouse('div_btn_cultural');" onMouseOut="btncolor_nomouse('div_btn_cultural');" <?php if($flag_cult==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Cultural</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_mustSee','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_cityExclusive','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_mustSee" onClick="checkCity_mustsee();" onMouseOver="btncolor_onmouse('div_btn_mustSee');" onMouseOut="btncolor_nomouse('div_btn_mustSee');" <?php if($flag_must==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Must See</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_cityExclusive','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityOffbeat');"><div class="div_themes_caption" id="div_btn_cityExclusive" onClick="checkCity_exclusive();" onMouseOver="btncolor_onmouse('div_btn_cityExclusive');" onMouseOut="btncolor_nomouse('div_btn_cityExclusive');" <?php if($flag_excl==true){?> style="background:#fff; color:#567272;" <?php } else {?> style="background:#567272; color:#fff;" <?php }?> >Exclusive</div></span>

<span class="div_btn_caption" onClick=" btncolor_onclick('div_btn_cityOffbeat','div_btn_sightsee','div_btn_shop','div_btn_history','div_btn_nightlife','div_btn_amusement','div_btn_religious','div_btn_cultural','div_btn_mustSee','div_btn_cityExclusive');"><div class="div_themes_caption" id="div_btn_cityOffbeat" onClick="checkCity_offbeat();" onMouseOver="btncolor_onmouse('div_btn_cityOffbeat');" onMouseOut="btncolor_nomouse('div_btn_cityOffbeat');" <?php if($flag_offbt==true){?> style="background:#fff; color:#567272; width:85px;" <?php } else {?> style="background:#567272; color:#fff; width:85px;" <?php }?> >Offbeat</div></span>


</div>


<!-------------------------------------------------  Attractions  ---------------------------------------------------->

<span style="width:62%; float:left; background:#F5F5F5; margin-bottom:5%; z-index:1000;">

<div id="div_enter_email" class="popUp_imgs_div" style="width:300px; z-index:1000000; height:auto; padding:5px;"></div>

<div id="div_attr" <?php if($user_cust == false){?> style="display:block;" <?php } else{?> style="display:none;" <?php }?>>

<!---------------------------------------- Shopping (street) Images --------------------------------------------->
<div id="div_Shopping_Street" class="div_cityImgs_Outer" <?php if($flag_shop==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php   
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, accepted, emp_id from cityscape_content_publish where loc_name like '$p%' and cate_id='SHOPPING'";
$res_attr = mysqli_query($con,$q_attr);

if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   { 
      $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
	       
     echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>';
     if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" name="chk_shp_'.$chkAtr.'" id="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	    <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';

		
$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:60px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		 <span style="float:left; margin-left:5px;">		    
			<img src="Images/dislikebtn.png" width="20px" height="20px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_dislikes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_dislikes"]; 
	   }	
		}
		echo '</span>	
		  </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">			
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
			   
			 /*   <div id="div_lnk_desc_cmr" align="right" style="width:100%; margin-top:5px;" onClick="show_block(\'add_access_div_'.$row["attr_name"].'\');" onDblClick="hide_block(\'add_access_div_'.$row["attr_name"].'\');">
			 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;">Edit/<br/>Add Comment</div>
				 </div>
		    
				<div id="add_access_div_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">			 
				<div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Name</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div>
				 <div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Email</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div> 
			   
			      <table width="100%" height="200px" border="1px" bordercolor="#ddd" cellpadding="0px" cellspacing="0px" style="text-align:center; border:1px solid #ddd;">
			     <tr>
				    <th rowspan="2" width="50px"><span class="font-medium" style="float:none">From</span></th>
					<th rowspan="2" width="50px"><span class="font-medium" style="float:none">To</span></th>
					<th rowspan="2" width="50px" style="word-wrap:true"><span class="font-medium" style="float:none">Distance(in Km)</span></th>
					<th colspan="3" width="180px" ><span class="font-medium" style="float:none">Approx. fare (in INR)</span></th>
				 </tr>
				 <tr>
					<th width="40px"><span class="font-medium" style="float:none">Taxi</span></th>
					<th width="40px"><span class="font-medium" style="float:none">Auto</span></th> 
					<th width="40px"><span class="font-medium" style="float:none">Bus</span></th>
				 </tr>
				 <tr>
				   <td><span class="font-medium">Airport</span></td>
				   <td rowspan="4"><span class="font-medium" id="sp_attr" style="font-size:14px;"></span></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
			     </tr>
				   <tr>
				   <td><span class="font-medium">Bus Stop</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
				   <tr>
				   <td><span class="font-medium">Railway<br/> Station</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
			   </table>
			   
			    <span><div class="smallbtn" style="width:30px;" onClick="show_block(\'div_msg_acc_cmr\'); hide_block(\'add_access_div_'.$row["attr_name"].'\');">Add</div></span> 			  
			 </div>  */
			 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

}
}
?>

<a style="text-decoration:none;" id="ref_shp" onClick="open_cnt_upload('ref_shp','SHOPPING');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>

<!--------------------------------------- Sightseeing  Images -------------------------------------->	
<div id="div_Sightseeing" class="div_cityImgs_Outer" <?php if($flag_sight==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>  
  <?php
   
 $q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like '$p%' and cate_id='SIGHTSEEING'";

$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
   $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);
	  
     echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" name="chk_shp_'.$row["attr_name"].'" id="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	      <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';

		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">			
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
	</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
			   
			 /*   <div id="div_lnk_desc_cmr" align="right" style="width:100%; margin-top:5px;" onClick="show_block(\'add_access_div_'.$row["attr_name"].'\');" onDblClick="hide_block(\'add_access_div_'.$row["attr_name"].'\');">
			 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;">Edit/<br/>Add Comment</div>
				 </div>
		    
				<div id="add_access_div_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">			 
				<div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Name</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div>
				 <div class="div_elements" style="float:left; width:100%;">
				   <span style="float:left;">Email</span>
				   <span style="float:left;"><input type="text" class="txtbox" /></span>
				 </div> 
			   
			      <table width="100%" height="200px" border="1px" bordercolor="#ddd" cellpadding="0px" cellspacing="0px" style="text-align:center; border:1px solid #ddd;">
			     <tr>
				    <th rowspan="2" width="50px"><span class="font-medium" style="float:none">From</span></th>
					<th rowspan="2" width="50px"><span class="font-medium" style="float:none">To</span></th>
					<th rowspan="2" width="50px" style="word-wrap:true"><span class="font-medium" style="float:none">Distance(in Km)</span></th>
					<th colspan="3" width="180px" ><span class="font-medium" style="float:none">Approx. fare (in INR)</span></th>
				 </tr>
				 <tr>
					<th width="40px"><span class="font-medium" style="float:none">Taxi</span></th>
					<th width="40px"><span class="font-medium" style="float:none">Auto</span></th> 
					<th width="40px"><span class="font-medium" style="float:none">Bus</span></th>
				 </tr>
				 <tr>
				   <td><span class="font-medium">Airport</span></td>
				   <td rowspan="4"><span class="font-medium" id="sp_attr" style="font-size:14px;"></span></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   <td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
			     </tr>
				   <tr>
				   <td><span class="font-medium">Bus Stop</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
				   <tr>
				   <td><span class="font-medium">Railway<br/> Station</span></td>
				    <td><input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
					<td> <input type="text" class="txtbox_Tab" style="width:40px;"  /></td>
				   </tr>
			   </table>
			   
			    <span><div class="smallbtn" style="width:30px;" onClick="show_block(\'div_msg_acc_cmr\'); hide_block(\'add_access_div_'.$row["attr_name"].'\');">Add</div></span> 			  
			 </div>  */
			 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';
  
   }
  }	  
  ?>
<a style="text-decoration:none;" id="ref_sig" onClick="open_cnt_upload('ref_sig','SIGHTSEEING');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a> 
</div>	

<!----------------------------------------- Historical Images -------------------------------------->
<div id="div_Historical" class="div_cityImgs_Outer" <?php if($flag_hist==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like '$p%' and cate_id='HISTORICAL'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
     $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
 echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	       <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">			
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
					 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

  }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_hist" onClick="open_cnt_upload('ref_hist','HISTORICAL');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	
		
<!-------------------------------------- Kids  Amusement Images  ------------------------------------------>	
<div id="div_Amusement" class="div_cityImgs_Outer" <?php if($flag_kids==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
  	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like '$p%' and cate_id='KIDS'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
     $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);
	     
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	       <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">		
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
			 		 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

   }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_kid" onClick="open_cnt_upload('ref_kid','KIDS');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	
		
<!--------------------------------------- Religious Images ------------------------------------------->
<div id="div_Religious" class="div_cityImgs_Outer" <?php if($flag_relg==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
 	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='RELIGIOUS'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
      
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	       <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">			
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
			 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';
  }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_rel" onClick="open_cnt_upload('ref_rel','RELIGIOUS');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>		
		
<!------------------------------------- Cultural Images ---------------------------------------->
<div id="div_Cultural" class="div_cityImgs_Outer" <?php if($flag_cult==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='CULTURAL'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	       <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">		
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
					 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

  }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_cult" onClick="open_cnt_upload('ref_cult','CULTURAL');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	
		
<!--------------------------------------  NightLife Images ---------------------------------------------->
<div id="div_Nightlife" class="div_cityImgs_Outer" <?php if($flag_nite == true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
 	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='FOOD-NIGHTLIFE'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	      <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		  <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
	 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

   }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_nite" onClick="open_cnt_upload('ref_nite','FOOD-NIGHTLIFE');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	
		
<!--------------------------------------  Must See Places ------------------------------------------>
<div id="div_mustSee" class="div_cityImgs_Outer" <?php if($flag_must==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='MUST SEE'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	      <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		  <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
	
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';
   }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_must" onClick="open_cnt_upload('ref_must','MUST SEE');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	

<!--------------------------------------  Exclusive Places ------------------------------------------>
<div id="div_Exclusive" class="div_cityImgs_Outer" <?php if($flag_excl==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php 
	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='EXCLUSIVE'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	      <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
					 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

   }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_excl" onClick="open_cnt_upload('ref_excl','EXCLUSIVE');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	

<!--------------------------------------  Offbeat Places ------------------------------------------>
<div id="div_Offbeat" class="div_cityImgs_Outer" <?php if($flag_offbt==true){?> style="display:block;" <?php } else {?> style="display:none;" <?php }?>>
  
  <?php   
	 
$q_attr = "select loc_name, cate_id, attr_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4, apprx_time, total_expense, apprx_expense, attr_desc, attr_btv, attr_vh, attr_mv, attr_offsea, attr_blogs, attr_dis_air, attr_dis_rail, attr_dis_road, price_air_taxi, price_air_auto, price_air_bus, price_rail_taxi, price_rail_auto, price_rail_bus, price_bus_taxi, price_bus_auto, price_bus_bus, emp_id, accepted from cityscape_content_publish where loc_name like'$p%' and cate_id='OFFBEAT'";
$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
    $attr = $row["attr_name"];
	  $chkAtr = array();
	  $chkAtr = str_replace(" ","_",$attr);	  
   
echo '<span style="cursor:pointer;">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" onMouseOver="div_wl_clr(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');" onMouseOut="div_wl_clr_none(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\');"> 
  <div class="div_imgName"><span style="margin-top:80px;">'.$row["attr_name"].'</span></div>
    '; if($row["attr_pic"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
		  } else if($row["attr_pic_1"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_1"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_2"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_2"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	 } else if($row["attr_pic_3"]!=""){
	   	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_3"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\');" />';
		 } else if($row["attr_pic_4"]!=""){ 	
	echo '<img class="div_images" src="data:image/png;base64,' .base64_encode($row["attr_pic_4"]) . '" onClick="show_block(\'div_greyBack_'.$row["attr_name"].'\'); show_block(\'highlight_'.$row["attr_name"].'\'); show_highlight(\'div_'.$row["attr_name"].'_exp\'); " />';
	  } 			
	 echo '<div style="width:100%; position:absolute; bottom:0; border-top:2px solid #DDDDDD;">
	    <span class="link_fonts">
<input type="checkbox" id="chk_shp_'.$row["attr_name"].'" name="chk_shp_'.$row["attr_name"].'" onChange="showMap(\'chk_shp_'.$row["attr_name"].'\');" onClick="Add_WishList_Selected(\'chk_shp_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\''.$row["apprx_time"].'\',\''.$row["total_expense"].'\',\'shp_'.$row["attr_name"].'_txt\');" value="'.$row["attr_name"].'"/>
		  <span id="shp_'.$row["attr_name"].'_txt">Add to Wishlist</span>
		  <span id="shp_'.$row["attr_name"].'_time" style="display:none;">'.$row["apprx_time"].'</span>
		  <span id="shp_'.$row["attr_name"].'_price" style="display:none;">'.$row["total_expense"].'</span>
		</span>
	       <span class="like_tab">
		<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo $rl["total_likes"]; 
	   }	
		}
		echo '</span>
		<div style="width:100%; border-top:2px solid #DDDDDD; height:auto; float:left; font-size:10px; font-family:Calibri; color:#ff0000;">';
		    $q_name_w = "select cust_name, DATE_FORMAT(`post_date`,'%d-%m-%Y') as post_date from w_cms where cust_email='".$row["emp_id"]."'";
			 $res_name_w = mysqli_query($con,$q_name_w);
			 $res_num = mysqli_num_rows($res_name_w);
			 if($res_num > 0)
			 {
			 while($r_nm_w = mysqli_fetch_array($res_name_w))
			 {
			   echo '<span style="float:right; margin-right:2px;">Contributed By : '.$r_nm_w["cust_name"].'</span>';
			   
			 }
			 }
			 else
			 {
			  $q_cms_name = "select emp_name from user_register where emp_id='".$row["emp_id"]."'";
			   $res_cms_name = mysqli_query($con,$q_cms_name);
			   if($res_cms_name)
			   {
			     while($r_cms=mysqli_fetch_array($res_cms_name))
				 {
				   echo '<span style="float:right;  margin-right:2px;">Contributed By : '.$r_cms["emp_name"].'</span>';
				 }
			   }
			 }
		echo '</div>
		</div>
		</div>
		</span></span>';
   
		
		
		$exps = $row["apprx_expense"];
$arr2 = array();
$arr2 = explode("+",$exps);
$exp_fee = $arr2[0];
$exp_cam = $arr2[1];
$exp_oth = $arr2[2];
$tot_exp = $arr2[0]+$arr2[1]+$arr2[2];

$time = $row["apprx_time"];
$tm = array();
$tm = explode(":",$time);
$hr = $tm[0];
$min = $tm[1];
   
echo  '<div id="div_greyBack_'.$row["attr_name"].'" class="greyBg"> </div>
       
	     <div id="highlight_'.$row["attr_name"].'" class="classHL"> 
  <div style="color:white; width:100%;"> 
  <span id="closeBtn" onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="float:right; margin-top:0px; z-index:300;"/><img src="Images/cancelbtn.png" width="40px" height="40px"  /> </span></div>
  
  <div style="width:100%; height:18px; margin:3% 0% 0% 4%;">
    <span style="float:left;"><a href="index.php" style="color:#0066FF; text-decoration:underline; font-size:16px;">Home</a> &nbsp; >> &nbsp;</span>
	<span  onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; cursor:pointer; float:left; font-size:16px;">Explore Destinations &nbsp; >> &nbsp;</span>
	<span onClick="hide_block(\'highlight_'.$row["attr_name"].'\'); hide_block(\'div_greyBack_'.$row["attr_name"].'\');" style="color:#0066FF; float:left; cursor:pointer font-size:16px;">'.$row["cate_id"].' &nbsp; >> &nbsp;</span>
	<span style="float:left;">'.$row["attr_name"].'</span>
</div>

  <div style="width:92%; height:85%; margin:1% 4% 2% 4%; background:#F5F5F5; border:1px solid #DDDDDD; display:block;">    

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110;">
	<img id="ltScroll" src="Images/arrowLeft.png" width="30px" height="30px" style="cursor:pointer;"/></span>		
	
	<span style="float:left; width:92%; height:99%; background:#FBFBFB; margin:4px 0px 0px 2px;">
	
    <div id="scroll_slide" style="background:transparent; margin-top:1%; margin-bottom:1%; position:relative; display:none; "> </div>
	 
		<div id="div_'.$row["attr_name"].'_exp"  style="width:730px; display:block;" >
		 
		 <div style="background:#FBFBFB;">
		 	 
	     <span style="width:46%; height:90%; margin:2% 2% 1% 1%; float:left;">
		 
		 <div><span class="attr_name_pop">'.$row["attr_name"].'</span>
		 <span style="float:right; margin-right:3px;">
		    <span id="str1" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str2" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str3" class="div_starImgs" style="background:url(\'Images/blue_star.gif\');"></span>
			<span id="str4" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
			<span id="str5" class="div_starImgs" style="background:url(\'Images/white_star.gif\');"></span>
		 </span></div>
		 
		 <div style="position:relative; width:100%; height:290px;">
		   <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block(\'lftArr_'.$row["attr_name"].'\'); show_block(\'rgArr_'.$row["attr_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["attr_name"].'\');hide_block(\'rgArr_'.$row["attr_name"].'\');">
		   	       <span onClick="backward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:25px; bottom:30px;">
			 <img id="lftArr_'.$row["attr_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
			 <span onClick="forward(\'img_'.$row["attr_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="cursor:pointer;"><div style="position:absolute; right:0; bottom:30px;">
			 <img id="rgArr_'.$row["attr_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></span>
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["attr_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="100%" /></div>	
		   </div>
		   <div style="width:100%; position:absolute; bottom:10px; margin-top:10px;">	
		   <span style="margin-left:2px; float:left; font-size:24px; font-family:Calibri; color:#222222;">
		   <input type="checkbox" id="chk_shpPop_'.$row["attr_name"].'" onClick="Add_WishList_Selected(\'chk_shpPop_'.$row["attr_name"].'\',\''.$row["cate_id"].'\',\'shp_'.$row["attr_name"].'_time\',\'shp_'.$row["attr_name"].'_price\',\'shp_'.$row["attr_name"].'_txt\'); check_page_box(\'chk_shp_'.$row["attr_name"].'\',\'shp_'.$row["attr_name"].'_txt\')" value="'.$row["attr_name"].'" />Add to wishlist
		   </span>
		   <span style="float:left; margin-left:100px;">		    
			<img src="Images/LikeImage.png" width="15px" height="15px" style="cursor:pointer;" onclick="likeAttr(\'div_enter_email\',\''.$row["loc_name"].'\',\''.$row["attr_name"].'\',\''.$row["cate_id"].'\')" /> ';
		$sel_likes = "select total_likes from likes_tab where loc_name='".$row["loc_name"]."' and cate_id='".$row["cate_id"]."' and attr_name='".$row["attr_name"]."' limit 1";
	  $res_likes = mysqli_query($con,$sel_likes);
		if($res_likes)
	 	{
	   while($rl = mysqli_fetch_array($res_likes))
	   {
	     echo "&nbsp;".$rl["total_likes"]; 
	   }	
		}
		echo '</span>		
		   </div>	
		   
		   <div style="float:left; width:100%; margin-top:50px;">
		   <span class="div_elements" style="float:left;">Add '.$row["attr_name"].' Images</span>
		    <span style="float:left;">
           <input type="text" id="txt_src"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
<input type="file" id="img_url" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById(\'txt_src\').value = this.value;"  accept="image/x-png, image/gif, image/jpeg, video/.flv, video/.mpeg, vedio/.wmv"/>
			</span>
		   <span style="float:left;"><div class="smallbtn" style="width:40px;">Upload</div></span>
		   </div>   
	     
		 </div>
		
		 </span> 
		 
		 <span style="width:49%; margin:1% 1% 1% 1%; float:left;">
		  
		   <div style="width:100%; height:60px; margin:1px 1px 1px 1px; border-radius:3px; position:relative;">
		   
		     <span onClick="btncolor_onclick_popup(\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_desc_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_desc_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Description</span></span>
			 
			 <span onclick="btncolor_onclick_popup(\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_bestTm_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Best time to visit</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_OffSea_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_OffSea_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Off season</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_mstVshop_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Must Visit</span></span>
			 
			  <span onClick="btncolor_onclick_popup(\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\');">			 
			 <span id="btn_exp_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">Expense</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_vistiHrs_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_Access_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Visiting Hours</span></span>	
			 
			 <span onClick="btncolor_onclick_popup(\'btn_view_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_view_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_ViewHrs_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\');">View Hours</span></span>		
			 		 
			 <span onClick="btncolor_onclick_popup(\'btn_access_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">			
			 <span id="btn_access_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_Access_'.$row["attr_name"].'\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_blog_'.$row["attr_name"].'\' ,\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Accessibilty</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_blog_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\'); showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');">
			 <span id="btn_map_'.$row["attr_name"].'" class="div_popImg_hdr" style="background:red;" onClick="display_images(\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_blog_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\'); displ_currLoc('.$row["loc_name"].');">Direction</span></span>		 
		   
		   	<span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Blogs</span></span>
			 
			 <span onClick="btncolor_onclick_popup(\'btn_blog_'.$row["attr_name"].'\',\'btn_map_'.$row["attr_name"].'\',\'btn_vistiHrs_'.$row["attr_name"].'\',\'btn_mstVshop_'.$row["attr_name"].'\',\'btn_OffSea_'.$row["attr_name"].'\',\'btn_bestTm_'.$row["attr_name"].'\',\'btn_desc_'.$row["attr_name"].'\',\'btn_access_'.$row["attr_name"].'\',\'btn_exp_'.$row["attr_name"].'\',\'btn_view_'.$row["attr_name"].'\');">
			 <span id="btn_blog_'.$row["attr_name"].'" class="div_popImg_hdr" onClick="display_images(\'sp_blog_'.$row["attr_name"].'\',\'sp_'.$row["attr_name"].'_Map\',\'sp_BestTmVisit_'.$row["attr_name"].'\',\'sp_desc_'.$row["attr_name"].'\',\'sp_OffSea_'.$row["attr_name"].'\',\'sp_mstVist_'.$row["attr_name"].'Shop\',\'sp_VisitHrs_'.$row["attr_name"].'\',\'sp_Access_'.$row["attr_name"].'\',\'sp_expense_'.$row["attr_name"].'\',\'sp_ViewHrs_'.$row["attr_name"].'\');">Tourist Traps</span></span>
	     </div> 
			   	   
		  <div style="width:100%; height:350px; background:#FFFFFF; margin:2px 2px 2px 2px; overflow-y:scroll; overflow-x:hidden;">
		  
		     <span id="sp_'.$row["attr_name"].'_Map">
	    <div style="width: 100%; overflow:scroll; border:1px solid #DDDDDD;">
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="General Post Office,'.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_'.$row["attr_name"].'" type="text" class="divMapBoxes" value="'.$row["attr_name"].','.$row["loc_name"].'" onchange="showMap_Pop(\'frmCity_'.$row["attr_name"].'\',\'toCity_'.$row["attr_name"].'\',\'map_'.$row["attr_name"].'\');" /></span>
	 <div id="map_'.$row["attr_name"].'" style="width:400px; height: 230px; overflow:scroll; margin-left:5px;"></div>
	 </div> </span>
	 
	         <span id="sp_desc_'.$row["attr_name"].'" class="div_popImgdes">
			  
			   <div align="left" style="float:left; width:100%;">
			   <span style="float:left">'.$row["attr_desc"].'</span></div>
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_desc = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Description'";
				$res_nm_desc = mysqli_query($con,$q_nm_desc);
				if($res_nm_desc)
				{
				  while($r_desc = mysqli_fetch_array($res_nm_desc))
				  {
				    if($r_desc["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_desc["accepted_date"].' By :'.$r_desc["name"].'</span>';
				  }
				 }
			   echo '</div>

			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_DESC_'.$row["attr_name"].'\'); show_block(\'char_desc_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_DESC_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			 
				 <div id="char_desc_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_desc_'.$row["attr_name"].'"></span></div>
				 
			   <div id="div_DESC_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtDESC_'.$row["attr_name"].'" name="txtDESC_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_desc_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_DESC_'.$row["attr_name"].'" name="txtName_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_DESC_'.$row["attr_name"].'" name="txtEmail_DESC_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_yes_'.$row["attr_name"].'"  name="rd_desc_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_DESC_no_'.$row["attr_name"].'" name="rd_desc_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_DESC_'.$row["attr_name"].'" name="drp_wen_DESC_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnDesc_'.$row["attr_name"].'" name="btnDesc_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Description\',\'txtDESC_'.$row["attr_name"].'\',\'txtName_DESC_'.$row["attr_name"].'\',\'txtEmail_DESC_'.$row["attr_name"].'\',\'rd_DESC_yes_'.$row["attr_name"].'\',\'drp_wen_DESC_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				   
				  			 
			 </span> 
	 
			 <span id="sp_blog_'.$row["attr_name"].'" class="div_popImgdes">
			   <span style="color:rgb(255,55,1);"> Read more about '.$row["attr_name"].'</span>
				<div align="left" style="font-size:12px; width:100%; margin-right:5px;">'.$row["attr_blogs"].'</div>
				
				<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_blog = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Blogs'";
				$res_nm_blog = mysqli_query($con,$q_nm_blog);
				if($res_nm_blog)
				{
				  while($r_blog = mysqli_fetch_array($res_nm_blog))
				  {
				    if($r_blog["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_blog["accepted_date"].' By :'.$r_blog["name"].'</span>';
				  }
				 }
			   echo '</div>
				
				    
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_blogs_'.$row["attr_name"].'\'); show_block(\'char_blog_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				
				<div id="char_blog_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_blg_'.$row["attr_name"].'"></span></div>	
						
				<div id="div_blogs_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
<textarea  id="txtBlog_'.$row["attr_name"].'" name="txtBlog_'.$row["attr_name"].'" placeholder="MAX 400 CHARACTERS" maxlength=403 style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_blg_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Blog_'.$row["attr_name"].'" name="txtName_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Blog_'.$row["attr_name"].'" name="txtEmail_Blog_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Blog_yes_'.$row["attr_name"].'" name="rd_Blog_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Blog_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Blog_'.$row["attr_name"].'" name="drp_wen_Blog_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBlog_'.$row["attr_name"].'" name="btnBlog_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Blogs\',\'txtBlog_'.$row["attr_name"].'\',\'txtName_Blog_'.$row["attr_name"].'\',\'txtEmail_Blog_'.$row["attr_name"].'\',\'rd_Blog_yes_'.$row["attr_name"].'\',\'drp_wen_Blog_'.$row["attr_name"].'\'); " /></span>
				  </div>				  
				 </div>				 
			 </span>		 
			 
			 
			 <span id="sp_mstVist_'.$row["attr_name"].'Shop" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_mv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_mv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Must Visit'";
				$res_nm_mv = mysqli_query($con,$q_nm_mv);
				if($res_nm_mv)
				{
				  while($r_mv = mysqli_fetch_array($res_nm_mv))
				  {
				    if($r_mv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_mv["accepted_date"].' By :'.$r_mv["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			       <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_MV_'.$row["attr_name"].'\');show_block(\'char_mv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_MV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				 				 
				 <div id="char_mv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_mv_'.$row["attr_name"].'"></span></div>
				 
				 <div id="div_MV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtMV_'.$row["attr_name"].'" name="txtMV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_mv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_MV_'.$row["attr_name"].'" name="txtName_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_MV_'.$row["attr_name"].'" name="txtEmail_MV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_MV_yes_'.$row["attr_name"].'" name="rd_MV_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_MV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_MV_'.$row["attr_name"].'" name="drp_wen_MV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnMV_'.$row["attr_name"].'" name="btnMV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Must Visit\',\'txtMV_'.$row["attr_name"].'\',\'txtName_MV_'.$row["attr_name"].'\',\'txtEmail_MV_'.$row["attr_name"].'\',\'rd_MV_yes_'.$row["attr_name"].'\',\'drp_wen_MV_'.$row["attr_name"].'\');"/></span>
				  </div>
				  </div>
				  				 
			 </span>
			 
			 <span id="sp_VisitHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_vh"].'</span></div>
			  			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vh = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Visiting Hours'";
				$res_nm_vh = mysqli_query($con,$q_nm_vh);
				if($res_nm_vh)
				{
				  while($r_vh = mysqli_fetch_array($res_nm_vh))
				  {
				    if($r_vh["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vh["accepted_date"].' By :'.$r_vh["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
			      	<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VH_'.$row["attr_name"].'\'); show_block(\'char_vh_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VH_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
								 
				 <div id="char_vh_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vh_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VH_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtVH_'.$row["attr_name"].'" name="txtVH_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vh_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VH_'.$row["attr_name"].'" name="txtName_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VH_'.$row["attr_name"].'" name="txtEmail_VH_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VH_yes_'.$row["attr_name"].'" name="rd_VH_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VH_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VH_'.$row["attr_name"].'" name="drp_wen_VH_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVH_'.$row["attr_name"].'" name="btnVH_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Visiting Hours\',\'txtVH_'.$row["attr_name"].'\',\'txtName_VH_'.$row["attr_name"].'\',\'txtEmail_VH_'.$row["attr_name"].'\',\'rd_VH_yes_'.$row["attr_name"].'\',\'drp_wen_VH_'.$row["attr_name"].'\');" /></span>
				  </div>
				   </div>
				  				
			 </span>
			
			 <span id="sp_ViewHrs_'.$row["attr_name"].'" class="div_popImgdes">
			  <div align="left" style="float:left; width:100%;"><span style="float:left">'.$hr.'&nbsp;Hrs : '.$min.'&nbsp;mins</span></div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_vw = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='View Hours'";
				$res_nm_vw = mysqli_query($con,$q_nm_vw);
				if($res_nm_vw)
				{
				  while($r_vw = mysqli_fetch_array($res_nm_vw))
				  {
				    if($r_vw["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_vw["accepted_date"].' By :'.$r_vw["name"].'</span>';
				  }
				 }
			   echo '</div>
			  
				 <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_VW_'.$row["attr_name"].'\'); show_block(\'char_vw_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_VW_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
			
				 
				 <div id="char_vw_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_vw_'.$row["attr_name"].'"></span></div>
				 
				<div id="div_VW_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtVW_'.$row["attr_name"].'" name="txtVW_'.$row["attr_name"].'" type="text" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_vw_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_VW_'.$row["attr_name"].'" name="txtName_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_VW_'.$row["attr_name"].'" name="txtEmail_VW_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_VW_yes_'.$row["attr_name"].'" name="rd_VW_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_VW_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_VW_'.$row["attr_name"].'" name="drp_wen_VW_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnVW_'.$row["attr_name"].'" name="btnVW_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'View Hours\',\'txtVW_'.$row["attr_name"].'\',\'txtName_VW_'.$row["attr_name"].'\',\'txtEmail_VW_'.$row["attr_name"].'\',\'rd_VW_yes_'.$row["attr_name"].'\',\'drp_wen_VW_'.$row["attr_name"].'\');"/></span>
				  </div>
				   </div>				  				
			 </span>
			 
			 <span id="sp_expense_'.$row["attr_name"].'" class="div_popImgdes">
			  
			  <div align="left" style="float:left; width:100%;">
			    <span style="float:left">Likely Expense : '.$tot_exp.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%; margin-top:20px;">			       
			     <span style="float:left"> Entry Fee : '.$exp_fee.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Camera Fee : '.$exp_cam.'</span>
			  </div>
			  
			  <div align="left" style="float:left; width:100%;">			       
			     <span style="float:left"> Other Fee : '.$exp_oth.'</span>
			  </div>
			  
			  <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_exp = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Expense'";
				$res_nm_exp = mysqli_query($con,$q_nm_exp);
				if($res_nm_exp)
				{
				  while($r_exp = mysqli_fetch_array($res_nm_exp))
				  {
				    if($r_exp["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_exp["accepted_date"].' By :'.$r_exp["name"].'</span>';
				  }
				 }
			   echo '</div>
		     	
				<div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_EXP_'.$row["attr_name"].'\'); show_block(\'char_exp_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_EXP_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
							 
				  <div id="char_exp_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Enter only in Numbers :</span>
				</div>
				 
				<div id="div_EXP_'.$row["attr_name"].'" style=" width:100%;display:none;">				 
				 <div class="div_elements" style="width:100%; float:left;">
				 <table style="width:100%;">
				   <tr>
				     <td>Entry Fee :</td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtFee_EXP_'.$row["attr_name"].'" name="txtFee_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');" /></td>
					 <td>Camera : </td>
					 <td><input type="text" class="txtbox_tab" style="width:50px;" id="txtCam_EXP_'.$row["attr_name"].'" name="txtCam_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
				   </tr>
				   <tr>
				    <td>Others : </td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" id="txtOth_EXP_'.$row["attr_name"].'" name="txtOth_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" onchange="cal_exp_w(\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtTot_EXP_'.$row["attr_name"].'\');"  /></td>
					<td>Likely Total :</td>
					<td><input type="text" class="txtbox_tab" style="width:50px;" readonly=true id="txtTot_EXP_'.$row["attr_name"].'" name="txtTot_EXP_'.$row["attr_name"].'" onkeypress="return isNumber(event);" /></td>
				   </tr>
				 </table>
				   </div>			
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_EXP_'.$row["attr_name"].'" name="txtName_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				 
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_EXP_'.$row["attr_name"].'" name="txtEmail_EXP_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_EXP_yes_'.$row["attr_name"].'" name="rd_EXP_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_EXP_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  
				  <div class="div_elements" style="width:100%; float:left;">
				  
				  <span style="float:left;">If yes, when?:</span>
				  
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_EXP_'.$row["attr_name"].'" name="drp_wen_EXP_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnExp_'.$row["attr_name"].'" name="btnExp_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_EXP_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Expense\',\'txtFee_EXP_'.$row["attr_name"].'\',\'txtCam_EXP_'.$row["attr_name"].'\',\'txtOth_EXP_'.$row["attr_name"].'\',\'txtName_EXP_'.$row["attr_name"].'\',\'txtEmail_EXP_'.$row["attr_name"].'\',\'rd_EXP_yes_'.$row["attr_name"].'\',\'drp_wen_EXP_'.$row["attr_name"].'\');"  /></span>
				  </div>
				   </div>
				  				
			 </span>  
			 
			 <span id="sp_OffSea_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_offsea"].'</span></div>
			   
			   	<div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_offsea = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Off Season'";
				$res_nm_offsea = mysqli_query($con,$q_nm_offsea);
				if($res_nm_offsea)
				{
				  while($r_offsea = mysqli_fetch_array($res_nm_offsea))
				  {
				    if($r_offsea["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_offsea["accepted_date"].' By :'.$r_offsea["name"].'</span>';
				  }
				 }
			   echo '</div>
			   
			        <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_Offsea_'.$row["attr_name"].'\'); show_block(\'char_off_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_Offsea_'.$row["attr_name"].'\')">Edit/<br/>Add Comment</div>
				 
				 <div id="char_off_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_ofs_'.$row["attr_name"].'"></span></div>	
									
				<div id="div_Offsea_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea class="txtbox_tab" id="txtOff_'.$row["attr_name"].'" name="txtOff_'.$row["attr_name"].'" placeholder="Type blog urls" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_ofs_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_Off_'.$row["attr_name"].'" name="txtName_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_Off_'.$row["attr_name"].'" name="txtEmail_Off_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_Off_yes'.$row["attr_name"].'" name="rd_Off_'.$row["attr_name"].'" value="YES"/>Yes</span>
				  <span style="float:left;"><input type="radio" name="rd_Off_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_Off_'.$row["attr_name"].'" name="drp_wen_Off_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				   <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnOff_'.$row["attr_name"].'" name="btnOff_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Off Season\',\'txtOff_'.$row["attr_name"].'\',\'txtName_Off_'.$row["attr_name"].'\',\'txtEmail_Off_'.$row["attr_name"].'\',\'rd_Off_yes'.$row["attr_name"].'\',\'drp_wen_Off_'.$row["attr_name"].'\'); "/></span>
				  </div>
				  </div>				 
			 </span>
			 
			 <span id="sp_BestTmVisit_'.$row["attr_name"].'" class="div_popImgdes">
			   <div align="left" style="float:left; width:100%;"><span style="float:left">'.$row["attr_btv"].'</span></div>
			   
			   <div style="width:100%; float:right; font-size:12px; color:#ff0000; font-family:Calibri;">';
			    $q_nm_btv = "select distinct(name) as name, accepted_date from w_cms_comments where attr_name='".$row["attr_name"]."' and field='Best Time Visit'";
				$res_nm_btv = mysqli_query($con,$q_nm_btv);
				if($res_nm_btv)
				{
				  while($r_btv = mysqli_fetch_array($res_nm_btv))
				  {
				    if($r_btv["accepted_date"] != '0000-00-00')
			          echo '<span>Updated On : '.$r_btv["accepted_date"].' By :'.$r_btv["name"].'</span>';
				  }
				 }
			   echo '</div>		   
			   
			    <div class="smallbtn" style="height:auto; padding:3px 3px 3px 3px; background:#ff0000; float:right;" onClick="show_block(\'div_BTV_'.$row["attr_name"].'\'); show_block(\'char_btv_'.$row["attr_name"].'\');" onDblClick="hide_block(\'div_BTV_'.$row["attr_name"].'\');">Edit/<br/>Add Comment</div>
				   
				   <div id="char_btv_'.$row["attr_name"].'" style="float:left; width:100%; display:none;">
				<span style="float:left; font-size:12px;">Max 400 characters :</span>
				<span style="float:left; font-size:12px; margin-left:3px;" id="cnt_btv_'.$row["attr_name"].'"></span></div>	

				 <div id="div_BTV_'.$row["attr_name"].'" style=" width:100%;display:none;">
				 <div class="div_elements" style="width:100%; float:left;">
				   <span style="float:left;">
				   <textarea id="txtBTV_'.$row["attr_name"].'" name="txtBTV_'.$row["attr_name"].'" placeholder="MAX 200 LETTERS" style="width:350px; height:80px;" onkeyup="sh_ch_cnt(this.id,\'cnt_btv_'.$row["attr_name"].'\');">
				   </textarea></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Name</span>
				  <span style="float:left; margin-left:5px;"><input id="txtName_BTV_'.$row["attr_name"].'" name="txtName_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span></div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">E-mail</span>
				  <span style="float:left; margin-left:4px;"><input id="txtEmail_BTV_'.$row["attr_name"].'" name="txtEmail_BTV_'.$row["attr_name"].'" type="text" class="txtbox_tab" /></span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">Visited there? :</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_yes'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="YES" />Yes</span>
				  <span style="float:left;"><input type="radio" id="rd_BTV_no'.$row["attr_name"].'" name="rd_BTV_'.$row["attr_name"].'" value="NO"/>No</span>
				  </div>
				  <div class="div_elements" style="width:100%; float:left;">
				  <span style="float:left;">If yes, when?:</span>
				  <span style="float:left; margin-left:5px;">
				  <select id="drp_wen_BTV_'.$row["attr_name"].'" name="drp_wen_BTV_'.$row["attr_name"].'" style="width:auto; font-size:14px; height:23px;">
				     <option>Select</option>
				     <option>A week back</option>
					 <option>Two weeks back</option>
					 <option>A month back</option>
					 <option>Two months back</option>
					 <option>3 months back</option>
					 <option>6 months back</option>
					 <option>A year back</option>
					 <option>More than a year back</option>
				   </select>
				  </span>
				  <span style="float:left; margin-left:20px;"><input type="button" value="Submit" id="btnBTV_'.$row["attr_name"].'" name="btnBTV_'.$row["attr_name"].'" class="smallbtn" style="width:50px; height:23px;" onclick="show_in_link(\''.$row["loc_name"].'\',\''.$row["cate_id"].'\',\''.$row["attr_name"].'\',\'Best Time Visit\',\'txtBTV_'.$row["attr_name"].'\',\'txtName_BTV_'.$row["attr_name"].'\',\'txtEmail_BTV_'.$row["attr_name"].'\',\'rd_BTV_yes'.$row["attr_name"].'\',\'drp_wen_BTV_'.$row["attr_name"].'\');"  /></span>
				  </div>				  
				 </div>				 
			 </span>	
			 
			 <span id="sp_Access_'.$row["attr_name"].'" class="div_popImgdes">
			  <div style="float:left; width:100%; height:250px; overflow:scroll;">
			    <div style="overflow:scroll;">
			     <table width="100%" height="200px" border="1px solid #EEEEEE" cellpadding="0px" cellspacing="0px" style="text-align:center; font-size:12px;">
			     <tr>
				    <th rowspan="2">From</th>
					<th rowspan="2">To</th>
					<th rowspan="2">Distance <br/>(in Km)</th>
					<th colspan="3" >Approx fare in INR</th>
				
				 </tr>
				 <tr>
					<th width="40px">Taxi</th>
					<th width="40px">Auto</th> 
					<th width="40px">Bus</th>
				 </tr>
				 <tr>
				   <td>Airport</td>
				   <td rowspan="3">'.$row["attr_name"].'</td>
				   <td>'.$row["attr_dis_air"].'</td>
				   <td>'.$row["price_air_taxi"].'</td>
				   <td>'.$row["price_air_auto"].'</td>
				   <td>'.$row["price_air_bus"].'</td>
			     </tr>
				   <tr>
				   <td>Railway Station</td>
				    <td>'.$row["attr_dis_rail"].'</td>
					<td>'.$row["price_rail_taxi"].'</td>
				   <td>'.$row["price_rail_auto"].'</td>
				   <td>'.$row["price_rail_bus"].'</td>
				   </tr>
				   <tr>
				   <td>Bus Station</td>
				    <td>'.$row["attr_dis_road"].'</td>
					<td>'.$row["price_bus_taxi"].'</td>
				   <td>'.$row["price_bus_auto"].'</td>
				   <td>'.$row["price_bus_bus"].'</td>
				   </tr>
			   </table>
		       </div>';
		 
			 echo '</div>
			 </span> 	  			 
			 
	     </div>
		 
		  </span>
		 
	   </div>
	 </div>
	 
	 </span>

	<span style="auto; float:left; height:100%; margin-top:20%; z-index:110; cursor:pointer">
	<img id="rtScroll" src="Images/arrowRight.png" width="30px" height="30px" /></span> 
	
  </div> 
</div> ';

   }
  }	  
  ?>
  <a style="text-decoration:none;" id="ref_offbt" onClick="open_cnt_upload('ref_offbt','OFFBEAT');">
  <span style="float:left; margin-left:5px; margin-top:5px;"> 
  <div class="div_cityImgs_Inner" > 
  <div class="div_imgName"><span style="margin-top:80px;"></span></div>	 
  <img class="div_images" src="Images/NoImage.png" style="height:180px" /> 	
	</div>
	</span></a>
</div>	
	

</div>

</span>

<!--------------------------------------------------- Right Map on Explore Page-------------------------------------------------------->

<span style="width:37%; margin-left:2px; float:right; margin-right:5px; z-index:1000;">
   <div id="div_maps" align="center" >
       <span style="float:left; color:green; font-weight:600;">A&nbsp;<input id="frmCity_map" type="text" class="divMapBoxes" value="<?php echo "GPO, ".$p; ?>" ></span>
	 <span style="float:left; color:red; font-weight:600;">B &nbsp;<input id="toCity_map" type="text" class="divMapBoxes"  value="<?php echo $p ; ?>"></span>
	 <div class="smallbtn" style="width:45px; height:20px; cursor:pointer;" onClick="ShowOnMap();">Submit</div>
     <div id="map" style="width: 380px; height: 400px; float: left;">	
	 </div> 
	 </div>	 
</span>

    
</div>



<!---------------------------------------  Recommend Popup ---------------------------------------------------------------->
<div id="div_FriendRecomm"
style="display:none;
   background:#FBFBFF;
   color:Grey;
   border:1px solid grey;
   box-shadow: 2px 0px 6px grey;
   opacity:0.9;
   width:30%;
   height:auto;  
   border-radius:10px;
   top:250px;
   left:300px;
  position:absolute;
  text-align:center;
  z-index:100000;">
          
			 <div style="width:100%;">
			 <span style="float:right; margin-right:10px; margin-top:5px; cursor:pointer;" onClick="hide_block('div_FriendRecomm'); hide_block('div_greyBack');">
			   <img src="Images/cancelbtn.png" width="30px" height="30px" /></span></div>     
				 <div id="Recommend_box" style=" display:block; margin-top:40px; height:100px;">
			<div style="margin-top:5px;">
			  <span class="div_elements" style="font-size:18px; margin-left:10px;">Your Name</span>			  
			  <span class="div_elements" style="font-size:18px; margin-left:60px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span> </div>
			  
			    <div class="div_elements" style="font-size:18px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px;">Your e-mail Id</span>
			  <span class="div_elements" style="font-size:18px;  margin-left:35px;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			  </div>
			  
			  <div class="div_elements" style="margin-top:5px; width:100%; cursor:pointer;">
			  <span onClick="show_block('div_frndEmail');show_block('div_frndEmail1');">
			  <span  style="font-size:18px; margin-left:10px; color:#0066FF; cursor:pointer;">Refer to a friend?</span></span>	
			  </div>
			  
			  <div id="div_frndEmail" class="div_elements" style="font-size:18px; display:none; margin-top:5px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px; cursor:pointer;">Friend's e-mail Id</span>
			  </div>
			  <div id="div_frndEmail1" class="div_elements" style="font-size:18px; display:none;">
			  <span class="div_elements" style="font-size:18px;  margin-left:20px; cursor:pointer;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			  <span onClick="show_block('div_frndEmail2')"><span class="smallbtn" style="width:40px;">Add</span></span>
			  </div>
			  <div id="div_frndEmail2" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px; cursor:pointer;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			    <span onClick="show_block('div_frndEmail3')"><span class="smallbtn" style="width:40px;">Add</span></span>
			  </div>
			  <div id="div_frndEmail3" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px; cursor:pointer;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			    <span onClick="show_block('div_frndEmail4')"><span class="smallbtn" style="width:40px;">Add</span></span>
			  </div>
			  <div id="div_frndEmail4" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px; cursor:pointer;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			    <span onClick="show_block('div_frndEmail5')"><span class="smallbtn" style="width:40px;">Add</span></span>
				</div>
				<div id="div_frndEmail5" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px; cursor:pointer;">
			  <input type="text" id="txtsenderEmail" class="txtbox_Tab" style="width:165px; height:20px;"/></span>
			   </div>
			  
			  <div  class="div_elements" align="center" style="overflow:none;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;">
			  <span style="cursor:pointer; color:white;" onClick="hide_block('div_FriendRecomm');"> Submit </span></span>
			  </div>
			</div>
				 
</div>





<!------------------------------------------------------------------ Custom Trip Preview ------------------------------------------------------------>

<div id="cust_trip_prev" style="float:left; width:70%; position:absolute; top:100px; background:#f5f5f5; color:#555; display:none; z-index:100000;">

<div style="float:left; width:100%; overflow:scroll; height:600px;">
  <div style="width:100%; display:block;"> 
  <span style="float:right;">
	<span style="text-decoration:none;" onClick="hide_block('cust_trip_prev'); hide_block('div_greyBack');">
	<img src="Images/cancelbtn.png" width="30px" height="30px"/></span>
	</span>	  
	    
	<div class="div_elements" style="width:100%; margin-right:2px; ">
	   <span style="float:left; font-size:24px; margin-left:5px;">Preview of Custom Trip in &nbsp;</span>
	   <span id="sp_prev_cities" style="margin-left:0px; float:left; color:#0066FF; font-weight:600; font-size:18px; width:auto;">
	   
	   </span></div>	   

	 
    </div>	
	   
	   <hr style="height:0px; border:1px solid red; width:100%" />

       <div style="float:left; width:100%;">	  
	  
	  <div style="background:#F5F5F5; width:100%; height:90px; float:left; margin-left:0px; border:1px solid #DDDDDD; opacity:0.8;" onMouseOver="chg_hdrBtn_clr('div_trvlr');" onMouseOut="rpl_hdrBtn_clr('div_trvlr');">
	      <div style="float:left; width:100%;">
	     <span style="float:left; width:30%;">		 
		 <div style="width:100%; float:left;">
	    <span style="float:left; margin-left:10px;  font-size:24px; color:#FF0000; font-family:Calibri Georgia;">My Current City </span></div>
		 <div style="width:100%; float:left;">
		<span  style="float:left; margin-left:10px; color:#444444;">
				<input type="text" id="drpcurcity_p" name="drpcurcity_p" class="txtbox_Tab_brdless" style="width:250px; height:25px;" />
			   	   <?php
				 include("PHP_Files/PHP_Connection.php");
				 $q_locs_cur = "select locName from user_destinations where type='DOMESTIC'";
				 $res_locs_cur = mysqli_query($con,$q_locs_cur);
				 if($res_locs_cur)
				 {
				  while($rw = mysqli_fetch_array($res_locs_cur))
				  {
				    echo '<option value="'.$rw["locName"].'">'.$rw["locName"].'</option>';
				  }
				 }
				 ?>
				</select> </span>
				
	  </div>		 
		 </span>
		 <span style="float:left; width:70%;">
	     	 <table id="tab_trvler" width="100%" height="30px" class="font-medium" cellpadding="0" cellspacing="0">
			 <tr><th colspan="9" align="center">Travellers
			 <span id="edt_trvler" class="edit_link" onClick="shw_brder_trvler();">Edit</span></th></tr>
		   <tr style="background:#eee;">
		    <th>Adults</th>
			<th>Kids <br/> 0-2Yrs</th>
			<th>Kids<br/> 2-12Yrs</th>
			<th>Kids <br/> 12+ Yrs</th>
			<th>Senior Citizens<br/>(60+)</th>
			</tr>
			<tr>
			<td align="center"><input type="text" id="txtAdults_p" name="txtAdults_p" class="txtbox_Tab_brdless" placeholder="0" style="width:50px;height:22px; margin:0 0 0 0;" onMouseOver="txtbox_color_onmouseover('txtAdults');" onMouseOut="txtbox_color_onmouseout('txtAdults');" />
			</td>
			<td align="center"><input type="text" id="txtKids0_2_p" name="txtKids0_2_p" class="txtbox_Tab_brdless" placeholder="0" style="width:50px;height:22px; margin-left:1px; margin-right:1px;"/></td>
			<td align="center"><input type="text" id="txtKids2_12_p" name="txtKids2_12_p" class="txtbox_Tab_brdless" placeholder="0" style="width:50px;height:22px;"  /></td>
<td align="center"><input type="text" id="txtKids12abv_p" name="txtKids12abv_p" class="txtbox_Tab_brdless" placeholder="0" style="width:50px;height:22px; margin:0 0 0 0;"/></td>
	<td align="center"><input type="text" id="txtSenior_p" name="txtSenior_p" class="txtbox_Tab_brdless" placeholder="0" style="width:50px;height:22px; margin:0 0 0 0;" /></td>
		   </tr>
		 </table>
		 </span>
		 </div>
	  </div>
	  
	  </div>
	  
	  <div style="float:left; width:100%; margin-top:10px;">
	  
	  <div style="float:left; width:100%;"> 
	  
	     <div style="background:#F5F5F5; width:100%; float:left; margin-left:0px; border:1px solid #DDDDDD; opacity:0.8; overflow:scroll;" onMouseOver="chg_hdrBtn_clr('div_hdrHotlBtn');" onMouseOut="rpl_hdrBtn_clr('div_hdrHotlBtn');">
		  
		   <table id="tab_htl_prev" width="100%"  cellpadding="0" cellspacing="0">
		   <tr><th colspan="16" style="background:#002929; color:#fff;">Hotel Preference with a budget range &nbsp; <input type="text" class="txtbox_Tab_brdless" style="width:100px;  color:#fff;" />&nbsp; to &nbsp; <input type="text" class="txtbox_Tab_brdless" style="width:100px; color:#fff;" />&nbsp; in INR <span id="edt_htl" class="edit_link" onClick="shw_brder_htl()">Edit</span></th></tr>
		   <tr style="background:#eee;">
			   <th align="left">Location</th>
			   <th align="left">Check-in Date</th>
			   <th align="left">Check-out Date</th>
			   <th align="left">Duration</th>
			   <th align="left">Star Rate</th>
			   <th align="left">Occupancy</th>
			   <th align="left"># of rooms</th>
			   <th align="left">Extra Bed</th>
			   <th align="left">Food Plan</th>		
			 </tr>
		   </table>	    
		 </div>
		   
	   </div>
	  
	  <div style="float:left; width:100%;"> 
	  
	   <div style="width:100%; float:left; margin-top:10px; margin-left:6px; margin-right:5px;"> 
	   
	   <div style="float:left; width:100%;">  
	        <div style="background:#F5F5F5; width:100%; float:left; margin-left:0px; border:1px solid #DDDDDD; opacity:0.8; overflow:scroll;" onMouseOver="chg_hdrBtn_clr('div_trvDtlBtn');" onMouseOut="rpl_hdrBtn_clr('div_trvDtlBtn');">
			   
			   <table id="tab_trv_prev" width="100%"  height="90px"  cellpadding="0" cellspacing="0">
			<tr style="background:#002929; color:#fff;">
			<th colspan="9">Travel Preference between cities <span id="edt_trv" class="edit_link" onClick="shw_brder_trv()">Edit</span></th></tr>
			  <tr style="background:#eee;">			  
				   <th width="120px" align="left">From</th>
				   <th width="120px" align="left">To</th>
				   <th width="80px" align="left">Date</th>
				   <th width="90px" align="left"> Travel Mode</th>
				 </tr>				  
			   </table>
			   
			   </div>
			   </div>
			   
		</div>
		
		<div style="float:left; width:100%; margin-top:30px; margin-left:6px; margin-right:5px;">	   
			 
			 <div style="float:left; width:100%;">
			 
			   <div style="background:#F5F5F5; width:100%; float:left; margin-left:0px; border:1px solid #DDDDDD; opacity:0.8; overflow:scroll;" onMouseOver="chg_hdrBtn_clr('div_trvDtlBtn');" onMouseOut="rpl_hdrBtn_clr('div_trvDtlBtn');">
			   
			   <table id="tab_trvl_prev" width="100%" height="90px" cellpadding="0" cellspacing="0">
			<tr style="background:#002929; color:#fff;"><th colspan="9">Travel Preference within cities 
			<span id="edt_trvl" class="edit_link" onClick="shw_brder_trvl();">Edit</span></th></tr>
			     <tr style="background:#eee;">
				  <th align="left">Location</th>
				  <th align="left">Mode</th>				   
				   <th align="left"># of Passengers</th>
				   <th align="left">Date</th>				   
				  </tr>				  
			   </table>
				</div>
				</div>
		</div>
		
		<div style="float:left; width:100%; margin-top:10px;">		
		  <div style="float:left; width:100%;">
		 <div style="background:#F5F5F5; width:100%; height:100px; float:left; margin-left:0px; border:1px solid #DDDDDD; opacity:0.8; overflow:scroll;" onMouseOver="chg_hdrBtn_clr('div_HdrCustBtn');" onMouseOut="rpl_hdrBtn_clr('div_HdrCustBtn');">		
            <table id="tab_req_prev" width="100%" cellpadding="0" cellspacing="0" style="overflow:scroll;">
			<tr><th colspan="2" style="background:#002929; color:#fff;">Other custom requirement, if any 
			<span id="edt_req" class="edit_link" onClick="shw_brder_req();">Edit</span></th></tr>
			<tr style="background:#eee;">
			  <th align="left">Location</th>
			  <th align="left">Requirement (Ex. Guide)</th>			   
			  </tr>
		</table>		
	   </div>	
	   </div>	 
</div>

       <div style="width:100%;" align="center">
 <span style="float:none; float:left; margin-left:40%;"> 
 <input type="submit" id="btnCust_Quotes" name="btnCust_Quotes" class="smallbtn" style="color:white; margin-right:2%; width:100px; float:none;" value="Get me Quotes" onClick="hide_block('div_greyBack');" ></span>
  <span style="float:none; float:left; margin-left:10px;"> 
 <input type="button" id="btnEdit_Quotes" name="btnEdit_Quotes" class="smallbtn" style="color:white; margin-right:2%; width:60px; float:none;" value="Edit" onClick="hide_block('div_greyBack'); hide_block('cust_trip_prev');" ></span>
</div>

    </div>

</div>

 
  </div>

</div>

</div>
</div>




<input type="text" id="WLID_capt" name="WLID_capt" style="visibility:hidden;" />


</body>
</form>
</html>
   




