<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload Attraction</title>
<link rel="stylesheet" type="text/css" href="Stylesheets/ExploreStyles.css" />
<script src="Javascript/ExploreScript.js" language="Javascript" type="text/javascript"></script>

 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?
	key=AIzaSyB2CDHh-kQdT1h6D626ecSH4Y_oNcioMo0&sensor=false"></script>
	
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>
	
<script type="text/javascript">
    $(document).ready(function() {
    $("#btnPrev").onclick(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        var file = e.originalEvent.srcElement.files[i];

        var img = document.getElementById("img1");
        var reader = new FileReader();
        reader.onloadend = function() {
            img.src = reader.result;
        }
        reader.readAsDataURL(file);
       // $("#img1").append(img);
    }
});
    });
</script>
<?php include("PHP_Files/PHP_Connection.php"); ?>
<?php include("upload_content_dB.php"); ?>


</head>
<form method="post" enctype="multipart/form-data">
<body onload="cate_desc_upld();">

<?php
$loc_id="";
$loc_name="";
$loc_cate="";
$attr_name="";
$desc = "";
$btv = "";
$vh ="";
$off ="";
$mv ="";
$blogs="";

$dist_air = "";
    $prc_air_taxi ="";
    $prc_air_auto ="";
    $prc_air_bus ="";		
    $dist_rail ="";
    $prc_rail_taxi ="";
    $prc_rail_auto ="";
    $prc_rail_bus ="";	
     $dist_bus ="";
	 $prc_bus_taxi ="";
    $prc_bus_auto ="";
     $prc_bus_bus ="";
	 $attr_name_user="";
	 $google_search="";
	 
	   $Hr="";
$Min="";
$exp_fee="";
$exp_cam="";
$exp_oth="";
	 
$pic="";
$pic1="";
$pic2="";
$pic3="";
$pic4="";
$pic5="";
$pic_n="";
$pic1_n="";
$pic2_n="";
$pic3_n="";
$pic4_n="";
$query_loc="";
$count_cate="";
$count_attr="";
$txtcat="";

?>

<div id="master_container" >

	<div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace"></div>
		
 		<div id="header_rightbtn">
    			
	    <a href="#" style="text-decoration:none;" onClick="show_CustomerCare(); div_white('btnCustomer');" onMouseOver="hide_CustomerCare(); div_green('btnCustomer');">
		 <span id="btnCustomer" class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px grey; margin-right:3px; margin-bottom:2px; background:#F5F5F5; color:#B22222;">24x7 Support</span></a>
			  			
			   <span id="btnRegister" class="smallbtn" style="width:70px; box-shadow:2px 1px 2px 1px grey; margin-right:3px;">Register</span>
			   
			   <span id="btnLogin" class="smallbtn" style="width:60px; box-shadow:2px 1px 2px 1px grey; margin-right:3px;">Login</span>         </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
	</div>	 
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:9px;"></div>	
</div>
    
	<div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">		
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:100px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>
	     </div>
		 
</div>


<div id="div_slideImgs" class="popUp_imgs_div" style="background:#eee; margin:3% 5% 0% 55%;">
     <div style="float:left; width:100%;"> <span style="float:right;">
	 <img src="Images/closeBtn.png" width="30px" height="30px" onclick="hide_block('div_slideImgs');"/></span> </div>
    <div id="div_imgs" style="float:left; width:100%; margin-left:10px;  margin-left:20px;"> 
	<span class="font-medium" style="color:#b22; float:left; text-align:left; margin:5px 5px 5px 5px;">Select pictures to upload, after upload close this pop up. These pictures will be stored</span>

	 <div style="float:left; width:100%; margin-top:10px;">
	 	  <span style="float:left;">
	              <input type="text" id="txt_src_t" name="txt_src_t" class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg" />
                  <input type="file" id="txt_src" name="txt_src" style="opacity:0; z-index:1; visibility:false;" value="upload image" onChange="document.getElementById('txt_src_t').value = this.value ; "  accept="image/x-png, image/gif, image/jpeg"/>
                  </span>
		</div>
	
      <div style="float:left; width:100%; margin-top:10px;">
	   <span style="float:left;">
        <input type="text"  id="txt_src_t1" name="txt_src_t1"  class="txtbox_Tab"  style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
        <input type="file" id="txt_src1" name="txt_src1" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById('txt_src_t1').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
        </span> </div>	
			
      <div style="float:left; width:100%; margin-top:10px;">
	   <span style="float:left;">
        <input type="text" id="txt_src_t2" name="txt_src_t2"  class="txtbox_Tab"  style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
        <input type="file"  id="txt_src2" name="txt_src2" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById('txt_src_t2').value = this.value; "  accept="image/x-png, image/gif, image/jpeg"/>
        </span>
		</div>
		 
      <div style="float:left; width:100%; margin-top:10px;"> <span style="float:left;">
        <input type="text"  id="txt_src_t3" name="txt_src_t3"   class="txtbox_Tab"  style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
        <input type="file"  id="txt_src3" name="txt_src3" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById('txt_src_t3').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
        </span> </div>
		
      <div style="float:left; width:100%; margin-top:10px;"> 
	   <span style="float:left;">
        <input type="text"  id="txt_src_t4" name="txt_src_t4"  class="txtbox_Tab" style="position:absolute;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
        <input type="file"  id="txt_src4" name="txt_src4" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById('txt_src_t4').value = this.value;"  accept="image/x-png, image/gif, image/jpeg"/>
		</span>
      </div>
	
	  
    </div>
  </div>  
  
<div id="div_preview" class="popUp_imgs_div" style="float:left; margin-left:15%; width:800px; height:400px; background:#cccccc;">
    <div style="float:left;width:100%;">
	  <span style="float:right;" onclick="hide_block('div_preview');">
	     <img src="Images/closeBtn.png" width="30px" height="30px" />
	  </span>
	</div>
	<div style="float:left; width:100%; margin:10px 10px 10px 10px;">
	  <span style="float:left; width:40%;">
	  <div  style="float:left; width:100%; margin-bottom:5px; text-align:left;">
	   <span id="div_attr" class="font-medium" style="float:left; color:rgb(255,55,1); font-size:20px;"></span>
	  </div>
	    <div id="div_imgpop_slides" style="position:relative; width:100%; height:250px;" onMouseOver="show_block('lftArr'); show_block('rgArr');" onMouseOut="hide_block('lftArr');hide_block('rgArr');">
                <div style="position:absolute; right:25px; bottom:20px;" onClick="backward('','','','','','');">
			 <img id="lftArr" src="Images/leftArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div>
		     <div style="position:absolute; right:0; bottom:20px;" onClick="forward('','','','','','');">
			 <img id="rgArr" src="Images/rightArrow.png" width="20px" height="25px" style="opacity:0.7;  display:none;"/></div>
		   <div style="width:100%; height:250px;">
		   <img id="img1" src="Images/Vacation type image/activities_beach1.png" alt="Image" width="100%" height="250px" /></div>	
		   </div>
	  </span>
	  <span style="float:left; width:55%; margin-left:10px;">
	   
	    <div style="float:left; width:100%;">
		  <span style="float:left;"><div id="btn_desc" class="smallbtn" style="padding:2px;" onclick="show_txt('txt_Desc'); clrthis(this.id,'btn_btv','btn_off','btn_vh','btn_mv','btn_vw','btn_exp','btn_blog');">Description</div></span>
		  <span style="float:left;"><div id="btn_btv" class="smallbtn" style="padding:2px;" onclick="show_txt('txt_BTV'); clrthis(this.id,'btn_desc','btn_off','btn_vh','btn_mv','btn_vw','btn_exp','btn_blog');">Best time visit</div></span>
		  <span style="float:left;"><div id="btn_off" class="smallbtn" style="padding:2px;" onclick="show_txt('txt_Offsea'); clrthis(this.id,'btn_btv','btn_desc','btn_vh','btn_mv','btn_vw','btn_exp','btn_blog');">Off-season</div></span>
		  <span style="float:left;"><div id="btn_vh" class="smallbtn" style="padding:2px;" onclick="show_txt('txt_visitHrs'); clrthis(this.id,'btn_btv','btn_off','btn_desc','btn_mv','btn_vw','btn_exp','btn_blog');">Visting Hours</div></span>
		  <span style="float:left;"><div id="btn_mv" class="smallbtn" style="padding:2px;" onclick="show_txt('txt_mustVisit'); clrthis(this.id,'btn_btv','btn_off','btn_vh','btn_desc','btn_vw','btn_exp','btn_blog');">Must visit</div></span>
		  <div style="float:left; width:100%; margin-top:5px;">
		  <span style="float:left;"><div id="btn_vw" class="smallbtn" style="padding:2px;" onclick="show_txt_hr('txt_viewHrs','txt_viewMin'); clrthis(this.id,'btn_btv','btn_off','btn_vh','btn_mv','btn_desc','btn_exp','btn_blog');">View Hours</div></span>
		 <span style="float:left;"><div id="btn_exp" class="smallbtn" style="padding:2px;" onclick="show_txt_exp('txt_exp_fee','txt_exp_cam','txt_exp_oth'); clrthis(this.id,'btn_btv','btn_off','btn_vh','btn_mv','btn_vw','btn_desc','btn_blog');">Expense</div></span>
		  <span style="float:left;"><div id="btn_blog" class="smallbtn" style="padding:2px;" onclick="show_txt('txtA_blogs'); clrthis(this.id,'btn_btv','btn_off','btn_vh','btn_mv','btn_vw','btn_exp','btn_desc');">Blogs</div></span>
		</div>
		</div>
		
		<div style="float:left; margin-top:20px;">
		  <span id="sp_txt" class="font-medium" style="float:left; text-align:left;"></span>
		</div>
		
		<div style="float:left;width:100%; margin-top:10px;">
		 <span style="float:right; margin-right:10px;">		
		 <input type="submit" id="btnSubmit_wc" name="btnSubmit_wc" value="Submit"  class="Acc_smallbtn" style="width:100px; height:30px; font-size:20px; background:#009900;" />		
		 </span>
		</div>
	 </span>
	</div>
</div>  

<div id="body_container" style="overflow:hidden; margin-bottom:5%; width:960px;">

<div id="div_new_dest">
          <div style="width:950px; float:left; background:#f5f5f5;">
		  <div style="float:left; width:100%;" class="font-medium">
           <span style="float:left; margin-left:10px; font-size:24px;">Location Name :</span> 
	            
              <?php
				  if(isset($_GET['city']))
				  {
					echo '<span id="sp_city" style="float:left; color:rgb(255,55,1); margin-left:7px; font-size:24px;">'.$_GET['city'].'</span>';
				  }
				?>
             <span style="float:left; margin-left:20px; font-size:24px;">Category ID :</span>
				<?php
				  if(isset($_GET['cate']))
				  {
                   echo '<span id="sp_cate" class="font-medium" style="float:left; margin-left:10px; color:rgb(255,55,1); font-size:24px;">'.$_GET['cate'].'</span>';
				  }
				?>
		
				</div>
				<div style="float:left; width:100%;">
				   <span class="headingSmallFont" style="float:left; color:#ff0000; margin-top:10px; margin-left:10px;" id="sp_cate_desc_msg"></span>
				</div>
                 
				 <div style="float:left; width:100%;">
				    <span style="float:left; margin-left:10px;">				
                  <input type="text"  name="txtAttrName" id="txtAttrName" class="txtbox_Tab" placeholder="ADD ATTRACTION"  style="width:400px; height:40px; font-size:24px;" onchange="toUpper('txtAttrName'); cal_dist();" value="<?php echo $attr_name; ?>"  />
				
                  </span>
				  
				  <span style="float:left; margin-left:10px;">
				 <div class="smallbtn" style="width:130px; height:55px; cursor:pointer; background:#0066ff; opacity:0.8;" onclick="show_block('div_slideImgs');">
				 <span style="float:left; padding:5px; font-size:20px;">
				 Upload Pictures</span></div>
				</span>
				  
				 </div> 		
          </div>
         
		  <div id="div_dtl_attr" style="float:left;width:950px; margin-top:10px; background:#F5F5F5; display:block;">
		   
		   <div style="float:left; margin-left:10px;" class="headingSmallFont">
		     <span style="float:left;">You have : </span>
			 <span style="float:left;" id="sp_count"></span>
			 <span style="float:left;">&nbsp; characters left</span>
		   </div>
		
			     <div style="float:left; width:100%; margin-top:10px;">
		     <span style="float:left;">
			    <textarea id="txt_Desc"  maxlength="400" name="txt_Desc" placeholder="ADD DESCRIPTION OF MAX 400 CHARACTERS" style="height:100px; width:945px; font-size:18px;" onkeyup="show_charCount();"><?php echo $desc; ?></textarea>
                  </span>
				  </div>
				  
				 <div style="float:left; margin-top:10px; width:100%;"> 
				  <input type="text" id="txt_BTV" name="txt_BTV" class="txtbox_Tab" style="font-size:18px; width:500px;" placeholder="BEST TIME TO VISIT" maxlength="200" value="<?php echo $btv; ?>"  />
                 </div>
				 			 
				 <div style="float:left; margin-top:10px; width:100%;"> 
                  <input type="text" class="txtbox_Tab" id="txt_Offsea" name="txt_Offsea"  style="font-size:18px; width:500px;" maxlength="200" placeholder="OFFSEASON" value="<?php echo $off; ?>" />
                  </div>			
				
			     <div style="float:left; margin-top:10px; width:100%;">              
                  <input type="text" id="txt_visitHrs" name="txt_visitHrs"  class="txtbox_Tab" style="font-size:18px;  width:500px;" Placeholder="VISITING HOURS" maxlength="200" value="<?php echo $vh; ?>" />
                  </div>				  
				  
				 <div style="float:left; margin-top:10px; width:100%;"> 
				  <input type="text" id="txt_mustVisit" name="txt_mustVisit" class="txtbox_Tab" style="font-size:18px;  width:500px;" maxlength="200" placeholder="MUST VISIT"  value="<?php echo $mv; ?>" />
                  </div>								
			   
			     <div style="float:left;width:100%; margin-top:10px;">
				 <span>
            <input type="text" id="txt_viewHrs" name="txt_viewHrs"  class="txtbox_Tab" placeholder="VIEW HOURS" style="width:120px; font-size:18px;" onkeypress="return isNumber(event)" value="<?php echo $Hr; ?>" />
                  </span>
				  <span style="margin-left:5px;">
            <input type="text" id="txt_viewMin" name="txt_viewMin"  class="txtbox_Tab" style="width:120px; font-size:18px;" placeholder="VIEW MIN" onkeypress="return isNumber(event)" value="<?php echo $Min; ?>" />
                  </span>
				  </div>
				  
				  <div style="float:left; margin-top:10px; width:100%;">
				  <span>
            <input type="text" id="txt_exp_fee" name="txt_exp_fee"  class="txtbox_Tab" placeholder="ENTRY FEE (if any)" style="width:160px; font-size:18px;" onkeypress="return isNumber(event)" value="<?php echo $exp_fee; ?>" />
				  </span>
				  <span>
              <input type="text" id="txt_exp_cam" name="txt_exp_cam"  class="txtbox_Tab" style="width:160px; font-size:18px;" placeholder="CAMERA FEE (if any)" onkeypress="return isNumber(event)" value="<?php echo $exp_cam; ?>" /> </span>
			  <span>
                  <input type="text" id="txt_exp_oth" name="txt_exp_oth"  class="txtbox_Tab" style="width:150px; font-size:18px;" placeholder="OTHER EXPENSE"  onkeypress="return isNumber(event)" value="<?php echo $exp_oth; ?>" /> </span>
				 </div>

				  <div style="float:left; width:100%; margin-top:10px;">
				   <span>
                  <textarea id="txtA_blogs" name="txtA_blogs" wrap="soft" onchange="validate_attr('txtA_blogs');" placeholder="LIST ALL THE BLOGS/WEBSITES/OTHER SOURCES WHICH GIVES A BRIEF ABOUT THIS ATTRACTION" style="height:100px; width:940px; font-size:18px;" ><?php echo $blogs; ?></textarea>
                  </span>
				  </div>			  
				  
				  <div style="float:left; width:100%; margin-top:10px;">
				  <span style="float:left; margin-left:20px;">
				    <input type="text" id="txtName" name="txtCustName" class="txtbox_Tab" placeholder="YOUR NAME" />
				  </span>
				  <span style="float:left; margin-left:10px;">
				    <input type="text" id="txtEmail" name="txtCustEmail" class="txtbox_Tab" placeholder="YOUR VALID EMAIL-ID" />
				  </span>
				     <span style="float:right;">
			<input type="button" id="btnPrev" name="btnPrev" class="smallbtn" style="width:130px; height:30px; background:rgb(255,55,1); color:#fff; font-size:16px; box-shadow:0;" value="Preview" onclick="valid();"/>					   
					 </span>
				  </div>
				  <table width="800px" height="100px" border="1px" bordercolor="#ddd" cellpadding="0px" cellspacing="0px" style="text-align:center; border:1px solid #ddd; visibility:hidden;">
                    <tr>
                      <th rowspan="2" width="30px" align="center"><span class="font-medium" style="float:none">From</span></th>
                      <th rowspan="2" width="100px"><span class="font-medium" style="float:none; wrap:soft;">To</span></th>
                      <th rowspan="2" width="50px" style="word-wrap:true"><span class="font-medium" style="float:none">Distance<br/>(in Km)</span></th>
                      <th colspan="3" width="180px" ><span class="font-medium" style="float:none">Approximate fare (in INR)</span></th>
                    </tr>
                    <tr>
                      <th width="40px"><span class="font-medium" style="float:none">Taxi</span></th>
                      <th width="40px"><span class="font-medium" style="float:none">Auto</span></th>
                      <th width="40px"><span class="font-medium" style="float:none">Bus</span></th>
                    </tr>
                    <tr>
                      <td align="center"><span class="font-medium" style="float:none">Airport</span></td>
                      <td rowspan="4" align="center"><span class="font-medium" id="sp_attr" style="font-size:14px; float:none; text-align:center"><?php echo $attr_name_user; ?>
					  </span></td>
                <td><input type="text" id="txt_air_dist" name="txt_air_dist" class="txtbox_Tab" style="width:60px;" value="<?php echo $dist_air; ?>"  onkeypress="return isNumber(event)" /></td>
                <td><input type="text" id="txt_air_taxi" name="txt_air_taxi" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_air_taxi; ?>" onkeypress="return isNumber(event)" /></td>
               <td><input type="text" name="txt_air_auto" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_air_auto; ?>" onkeypress="return isNumber(event)"/></td>
               <td><input type="text" name="txt_air_bus" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_air_bus; ?>" onkeypress="return isNumber(event)"/></td>
                    </tr>
                    <tr>
                      <td align="center"><span class="font-medium" style="float:none">Railway<br/>
                        Station</span></td>
                      <td><input type="text" id="txt_rail_dist" name="txt_rail_dist" class="txtbox_Tab" style="width:60px;" value="<?php echo $dist_rail; ?>" onkeypress="return isNumber(event)" /></td>
                      <td><input type="text" id="txt_rail_taxi" name="txt_rail_taxi" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_rail_taxi; ?>" onkeypress="return isNumber(event)" /></td>
                      <td><input type="text" name="txt_rail_auto" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_rail_auto; ?>" onkeypress="return isNumber(event)" /></td>
                      <td><input type="text" name="txt_rail_bus" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_rail_bus; ?>" onkeypress="return isNumber(event)" /></td>
                    </tr>
                    <tr>
                      <td align="center"><span class="font-medium" style="float:none">Bus Stop</span></td>
                      <td><input type="text" id="txt_bus_dist" name="txt_bus_dist" class="txtbox_Tab" style="width:60px;" value="<?php echo $dist_bus; ?>" onkeypress="return isNumber(event)" /></td>
                      <td><input type="text" id="txt_bus_taxi" name="txt_bus_taxi" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_bus_taxi; ?>" onkeypress="return isNumber(event)"/></td>
                      <td><input type="text" name="txt_bus_auto" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_bus_auto; ?>" onkeypress="return isNumber(event)"/></td>
                      <td><input type="text" name="txt_bus_bus" class="txtbox_Tab" style="width:60px;" value="<?php echo $prc_bus_bus; ?>" onkeypress="return isNumber(event)" /></td>
                    </tr>
                  </table>
				
				  
	
		  </div>
        </div>



</div>
</body>
</form>
</html>
