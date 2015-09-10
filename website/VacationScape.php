<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Vacation Scape</title>

<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="Javascript/Javascript_Codes.js" language="javascript"></script>

<script language="javascript" type="text/javascript">
var photos=new Array();
var count=0;
var Names = new Array();

function backward(id, img1 , img2 , img3 , img4, img5, img6){

photos[0]= img1;
photos[1]= img2;
photos[2]= img3;
photos[3]= img4;
photos[4]= img5;
photos[5]= img6;

Names[0] ="Calagute Beach";
Names[1] ="Benaulim Beach";
Names[2]="Baga Beach";
Names[3]="Arambol Beach";
Names[4]="Anjuna Beach";
Names[5]="Agonda Beach";
	
if (count>0){
window.status=''
count--
document.getElementById(id).src=photos[count];
document.getElementById('sp_attr_name').innerHTML = Names[count];
}
}

function forward(id, img1 , img2 , img3 , img4, img5, img6){
	
photos[0]= img1;
photos[1]= img2;
photos[2]= img3;
photos[3]= img4;
photos[4]= img5;
photos[5]= img6;

Names[0] = "Agonda Beach";
Names[1] ="Anjuna Beach";
Names[2]="Arambol Beach";
Names[3]="Baga Beach";
Names[4]="Benaulim Beach";
Names[5]="Calagute Beach";
	
if (count<photos.length-1){
count++
document.getElementById(id).src=photos[count];
document.getElementById('sp_attr_name').innerHTML = Names[count];
}
else window.status='End of gallery'
}
</script>

</head>

<body onload="crtBtn();">

<div align="center" id="master_container">
       <div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 		<div id="header_rightbtn">
    	<div>
	    		   <a href="#" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">
			  <span id="btnCustomer" class="smallbtn" style="width:90px; margin-right:3px; margin-bottom:3px; background:#F5F5F5; color:#B22222;">24x7 Support</span></a>
			  			
			   <a href="#" onClick="show_block('div_reg'); show_block('div_greyBack');">
			   <span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span></a>
			   
			   <a href="#" onClick="show_block('div_login'); show_block('div_greyBack');">
			   <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span></a>
       </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
		</div> 
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	
			
			
	</div>
    
	    <div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	</div>
</div>


<div id="div_entEmail">
          
			 <div style="width:100%;">
			 <img src="Images/closeBtn.png" width="30px" height="30px" style=" float:right; margin-right:0px; margin-top:0px;" onClick="hide_block('div_entEmail'); hide_block('div_greyBack');" /></div>     
				
			<div style=" display:block; margin-top:10px;">
		
			 <div style="float:left; width:100%;">
			  <span class="font-medium_indx" style="font-size:18px;  margin-left:35px;">
	<input type="text" id="txtUserEmail" name="txtUserEmail" class="txtbox_Tab" placeholder="Enter your E-mail Id" style="font-size:18px; width:260px; height:26px;" /></span>			<span class="smallbtn" style="float:right;  margin-right:25px; width:60px; height:24px; text-align:center; font-size:14px;" onClick="show_block('div_id_pwd');"> Submit </span> 
			  </div>
				  
			  <div id="div_id_pwd" style="float:left; width:100%; display:none; margin-top:10px;">
			  <div style="float:left; width:100%; color:#ff0000;"><span>This UserID is registered. Please enter your password to Login.</span></div>
			    <span class="font-medium_indx" style="font-size:18px;  margin-left:35px; float:left;">
					<input type="password"  id="txtUserPwd" placeholder="Enter Password" class="txtbox_Tab" style="font-size:18px; width:260px; height:26px;" />
				  </span>
				<span style="font-size:18px;  margin-left:20px; float:left;">
				<span class="smallbtn" style="float:none; width:60px; height:24px; text-align:center; font-size:16px;" onClick="hide_block('div_entEmail');"> Login </span>
				</span>
			  </div>
					  
			</div>
				 
  </div>
 
  

<div id="body_container">

<div style="float:left; width:100%; margin-top:3px;" class="font-medium_indx">
 <span style="float:left; font-size:22px;"> Your Selected </span>
 <span style="float:left;">
   <div id="vacTheme"></div>
 </span>
 <span style="float:left;  font-size:22px; margin-left:3px;"> Locations are ...</span>
</div>

  <div style="width:100%; height:50px; float:left; background:#ddd; margin-top:5px; border-radius:5px;" id="div_loc_hdr_btns"></div>

<div style="float:left; width:100%;  margin-top:7px;">
 <span id="sp_attr_name" class="font-medium_indx">Agonda Beach</span>
</div>

<div style="width:100%; float:left; height:370px;  bottom-margin:10px;">

  <span style="width:70%; float:left;">

  <div id="div_imgpop_slides" style="position:relative; width:100%; height:390px;" onMouseOver="show_block('lftArr'); show_block('rgArr');" onMouseOut="hide_block('lftArr');hide_block('rgArr');">			
			 <a href="#" onClick="forward('img_slide','Images/Goa_beaches/agonda_bch_1.jpg','Images/Goa_beaches/anjuna_bch.jpg','Images/Goa_beaches/arambol_bch.jpg','Images/Goa_beaches/baga_bch.jpg','Images/Goa_beaches/benaulim_bch.jpg','Images/Goa_beaches/calagute_bch.jpg');" style="color:black;"><div style="position:absolute; top:10px; left:30px;">
			 <img id="rgArr" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>			 
			
			 <a  href="#" onClick="backward('img_slide','Images/Goa_beaches/calagute_bch.jpg','Images/Goa_beaches/benaulim_bch.jpg','Images/Goa_beaches/baga_bch.jpg','Images/Goa_beaches/arambol_bch.jpg','Images/Goa_beaches/anjuna_bch.jpg','Images/Goa_beaches/agonda_bch_1.jpg');" style="color:black;"><div style="position:absolute; top:10px; left:5px;">
			 <img id="lftArr" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>
		 
		   <div style="width:100%; height:220px;">
		   <img id="img_slide" src="Images/Goa_beaches/agonda_bch_1.jpg" width="100%" height="370px" /></div>	
		  
		   </div>		   
		   
    <div style="background:#f5f5f5; width:100%;  position:relative;">
	
	  <div id="btv_div" onmouseover="show_block('btv_div');" onmouseout="hide_block('btv_div');">
	     <table style="width:100%; height:100%; float:right;"  border="1px solid #999" cellpadding="0" cellspacing="0" class="font-medium_indx">
		   <tr>
		   <td rowspan="3"><?php echo "Year-".date('Y'); ?></td>
		     <td>Jan</td>
			 <td>Feb</td>
			 <td>Mar</td>
			 <td>Apr</td>
			 <td>May</td>
			 <td>Jun</td>
		     <td>Jul</td>
			 <td>Aug</td>
			 <td>Sep</td>
			 <td>Oct</td>
			 <td>Nov</td>
			 <td>Dec</td>
		   </tr>
		   <tr>
		     <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/cross.png" width="15px" height="15px" /></td>
			 <td><img src="Images/cross.png" width="15px" height="15px" /></td>
			 <td><img src="Images/cross.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
		     <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
			 <td><img src="Images/done.png" width="15px" height="15px" /></td>
		   </tr>
		   
		   <tr>
		     <td><img src="Images/clearsky.png" width="20px" height="15px" /></td>
			 <td><img src="Images/clearsky.png" width="20px" height="15px" /></td>
			 <td><img src="Images/sunny.png" width="20px" height="15px" /></td>
			 <td><img src="Images/sunny.png" width="20px" height="15px" /></td>
			 <td><img src="Images/sunny.png" width="20px" height="15px" /></td>
			 <td><img src="Images/cloudy.png" width="20px" height="15px" /></td>
		     <td><img src="Images/rainy.png" width="20px" height="15px" /></td>
			 <td><img src="Images/rainy.png" width="20px" height="15px" /></td>
			 <td><img src="Images/rainy.png" width="20px" height="15px" /></td>
			 <td><img src="Images/rainy.png" width="20px" height="15px" /></td>
			 <td><img src="Images/clearsky.png" width="20px" height="15px" /></td>
			 <td><img src="Images/clearsky.png" width="20px" height="15px" /></td>
		   </tr>

		 </table>
	  </div>
	  
	  
	
	<?php 

  include ("PHP_Files/PHP_Connection.php");
     if(isset($_GET['l']))
	 {
	      $loc = $_GET['l'];
	$locs = array();
	$locs = explode(",",$loc);
	$cate = $locs[0];
	
	if(isset($_GET['sltLoc']))
     $l1 = $_GET['sltLoc'];
	 
	 else
	   $l1 = $locs[1] ;	 
			
	$q_attr = "select loc_name, attr_pic, attr_pic_1, attr_pic_2, attr_pic_3, attr_pic_4,  attr_btv from cityscape_content_publish where loc_name='$l1' and cate_id='".$cate."' limit 1";
	
	$q_cnt ="select count(attr_name) as count_attr from cityscape_content_publish where loc_name='$l1'";
	$res_cnt = mysqli_query($con,$q_cnt);
	
	$cnt_cate = "select attr_name from cityscape_content_publish where cate_id='".$cate."' and loc_name='$l1'";
	$res_cate = mysqli_query($con,$cnt_cate);
	$cnt_cate = mysqli_num_rows($res_cate);
	
	if($res_cnt)
	{
	  while($r= mysqli_fetch_array($res_cnt))
	  {
	    $cnt = $r["count_attr"];
	  }
	}

$res_attr = mysqli_query($con,$q_attr);
if($res_attr)
  {
   while($row = mysqli_fetch_array($res_attr))
   {
	
	/*echo '<div id="div_imgpop_slides" style="position:relative; width:100%; " onMouseOver="show_block(\'lftArr_'.$row["loc_name"].'\'); show_block(\'rgArr_'.$row["loc_name"].'\');" onMouseOut="hide_block(\'lftArr_'.$row["loc_name"].'\');hide_block(\'rgArr_'.$row["loc_name"].'\');">	    
			
			 <a href="#" onClick="forward(\'img_'.$row["loc_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\');" style="color:black;"><div style="position:absolute; top:10px; left:30px;">
			 <img id="rgArr_'.$row["loc_name"].'" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>
			 
			 <a  href="#" onClick="backward(\'img_'.$row["loc_name"].'\',\'data:image/png;base64,' . base64_encode($row["attr_pic"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_4"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_3"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_2"]) .'\',\'data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'\');" style="color:black;"><div style="position:absolute; top:10px; left:5px;">
			 <img id="lftArr_'.$row["loc_name"].'" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div></a>
		 
		   <div style="width:100%; height:220px;">
		   <img id="img_'.$row["loc_name"].'" src="data:image/png;base64,' . base64_encode($row["attr_pic_1"]) .'" width="100%" height="370px" /></div>	
		   </div>'; */
		   
		   }
	   }
	   } 
	?>
	
	</div>
	
	<div style="float:left; width:100%; margin-top:0px; position:relative;">
 <span style="float:left; width:70%;">
  <span style="float:left;"><input type="checkbox" id="chk_wl" width="20px" style="zoom:2; cursor:pointer;" onclick="enterEmail(this.id);" /></span>
  <span class="font-medium_indx" style="margin-left:5px; font-size:22px; cursor:pointer;" onclick="chkEmail('chk_wl');"> Add to My Wishlist</span>
 </span>
 <span style="float:right; width:30%;  cursor:pointer;">
 <?php $likes=0; ?>
  <span style="float:left;"><img src="Images/likebtn.png" width="40px" height="30px"  onclick="count_likes();" /></span>
  <span style="float:left; font-size:26px;" class="font-medium_indx" id="likeBtn_vac"> <?php echo $likes; ?> </span>
  
 </span>
</div>

  </span>
  
  <span style="float:left; width:30%;">
       
	   <div style="background:#fbfbfb; width:100%; height:390px;">
	  
	   <div style="float:left; width:100%;">
	   <span style="float:left; width:50%;">
		<a id="hrefBhtl" onclick="bookHotel();">
		   <div class="vscape_tiles" style="background:#669900; opacity:0.8;">
		   <span style="float:left; margin-top:20px; margin-left:7px; margin-right:3px; font-size:20px;"><?php echo $cnt_cate." ".$cate."<br/> in <br/> ".$l1;?></span></div>
	   </a>
	   </span>
	       <span style="float:left; width:50%;">
		 <a id="hrefTrv" onclick="bookTrv();">
		   <div class="vscape_tiles" style="background:rgb(255,51,1); opacity:0.8;">
		   <span style="float:left; margin-top:20px; margin-left:5px; font-size:22px;">Book <br/> Travel + Hotel</span></div></a>
		</span>		
	   </div>
	   
	   <div style="float:left; width:100%;">
	   <span style="float:left; width:50%;">
		  <div class="vscape_tiles" style="background:#0066ff; opacity:0.8;" onclick="show_btv();" onmouseout="hide_block('btv_div');">
		  <span style="float:left; margin-top:25px; font-size:22px;">Best Time to Visit</span></div>
		</span>   
	    <span style="float:left; width:50%;">
		<a id="hrefExp" onclick="Thingstodo();">
		  <div class="vscape_tiles" style="background:#669900; opacity:0.9;">
		  <span style="float:left; margin-top:10px; font-size:20px;"><?php echo $cnt;?> Things  <br/> to do in <?php echo $l1;?></span></div>
		</a>
		</span>		
	   </div>
	   
	   <div style="float:left; width:100%;">
	   <span style="float:left; width:50%;">
		<a id="hrefPck" onclick="showPackages();">
		   <div class="vscape_tiles" style="background:rgb(255,51,1); opacity:0.8;"><span style="float:left; margin-top:5px; font-size:22px; margin-left:15px;">View <br/> packages</span></div>
		   </a>
		</span>	
	    <span style="float:left; width:50%;">
		<a id="hrefKids" onclick="showKids();">
		  <div class="vscape_tiles" style="background:#0066ff; opacity:0.8;"><span style="float:left; margin-top:25px; margin-left:15px; font-size:22px;">For Kids <br/> in <?php echo $l1;?></span></div>
		  </a>
		</span>		
	   </div>
	   
	</div>
  
  </span>
  
  <span id="selectedDest" style="visibility:hidden;"><?php echo $l1 ; ?></span>
  
</div>

<div style="float:left; width:60%; position:relative; margin-top:60px; margin-bottom:30px; background:rgb(251,55,0); color:#fff;">

<div style="float:left; width:100%; margin-top:20px;">
<span class="font-medium_indx" style="color:#fff; float:left;" >From:</span>
<?php if(isset($_GET["frmLoc"])) { $frmL = explode(',',$_GET["frmLoc"]); } ?>
 <span style="float:left; margin-left:5px;"><input type="text" class="txtbox_Tab" id="vac_frm_city" name="vac_frm_city" value="<?php if(isset($_GET["frmLoc"])) echo $frmL[0]; ?>" /></span>
 <span class="font-medium_indx"  style="float:left; margin-left:10px; color:#fff;">To:</span>
  <span style="float:left; margin-left:5px;"><input type="text" class="txtbox_Tab" id="vac_to_city" name="vac_to_city" value="<?php echo $l1; ?>" /></span>
</div>

<div style="float:left; width:100%; margin-top:10px; position:relative; margin-left:20%; margin-bottom:10px;">
  <span style="float:left; margin-left:10px;">
    <input type="button" id="btn_sub_vac" name="btn_sub_vac" class="smallbtn" style="width:100px; height:24px; font-size:15px;" value="Flight Fare" onclick="show_block('div_prc_cal');"  />
  </span>
  <span style="float:left; margin-left:10px;">
    <input type="button" id="btn_sub_vac" name="btn_sub_vac" class="smallbtn" style="width:100px; height:24px; font-size:15px;" value="Bus Fare" onclick="show_block('div_prc_cal');" />
  </span>
  <span style="float:left; margin-left:10px;">
    <input type="button" id="btn_sub_vac" name="btn_sub_vac" class="smallbtn" style="width:100px; height:24px; font-size:15px;" value="Train Fare" onclick="show_block('div_prc_cal');"  />
  </span>
</div>

<div id="div_prc_cal" style="display:none; position:absolute; margin-bottom:200px;" onclick="hide_block('div_prc_cal');">
<?php

$date = time();
$day = date('d',$date);
$year = date('Y',$date);
$month = date('m',$date);

if($month <12)
{
  $nxt_mnth = date('m',$date)+1;
  }
else
{
 $year = $year+1;
 $nxt_mnth = 1; 
 } 

$first_day =mktime(0,0,0,$month,1,$year);
$frst_day_nxt = mktime(0,0,0,$nxt_mnth,1,$year);

$day_of_week = date('D',$first_day);
$day_of_week_nxt = date('D',$frst_day_nxt);

$title = date('F',$first_day);
$title_nxt = date('F',$frst_day_nxt);

switch($day_of_week)
{
 case "Sun": $blank = 0; break;
 case "Mon": $blank = 1; break;
 case "Tue": $blank = 2; break;
 case "Wed": $blank = 3; break;
 case "Thu": $blank = 4; break;
 case "Fri": $blank = 5; break;
 case "Sat": $blank = 6; break;
}

$days_in_month = cal_days_in_month(0,$month, $year);

$days_in_month_nxt = cal_days_in_month(0,$nxt_mnth, $year);

echo "<div style=\"float:left;width:100%\">";
echo "<span style=\"float:left;\">";
echo "<table border=\"1px\" width=\"400px\" cellspacing=\"0px\" style=\"color:#555;font-family:Calibri;\">";
echo "<tr style=\"background:#262a73; color:#fff;\"><td colspan=\"7\" align=\"center\">&nbsp;&nbsp; $title $year <span style=\"cursor:pointer; float:right; margin-right:50px;\" onclick=\"decr_cnt();\"> > </span> </td></tr>";
echo "<tr style=\"background:#7183d0; color:#fff;\"><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>";

$day_count =1;
echo "</tr>";

while($blank>0)
{
echo "<td style=\"background:#fff;\"></td>";
$blank=$blank-1;
$day_count++;
}

$day_num =1;

while($day_num <= $days_in_month)
{
echo "<td style=\"background:#fff;\">$day_num<br/>Rs. xxx</td>";
$day_num++;
$day_count++;

if($day_count > 7)
{
 echo "<tr style=\"background:#fff;\"></tr>";
 $day_count =1;
}

}
echo "</table>";
echo "</span>";
echo "<span style=\"float:left;\">";
echo "</span>";
echo "</div>";
?>
</div>

</div>


</div>
</body>
</html>
