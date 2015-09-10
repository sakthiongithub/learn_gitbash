<!DOCTYPE><!-- html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Adventure Tour</title>
<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css">
<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />

<script src="Javascript/plan_tripScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/ExploreScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/context.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/resize.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/screenResolution_Script.js" language="javascript" type="text/javascript"></script>
</head>

<form name="frm" method="post">
<body>

<div id="master_container">
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
			  			
			   <a href="#"><span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px;">Register</span></a>
			   
			   <a href="#"><span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px;">Login</span></a>
       </div>	
		 
	 <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>
			  </div>  
		</div> 
		
		<div style="width:100%; float:left; position:relative;">
		 <span style="width:25%;float:left;">
				 <a href="#" style="text-decoration:none;" onMouseOver="ShowContent('contextBuild');" onMouseOut=" HideContent('contextBuild');"> 
				  <div class="tripHeaderbtn" id="div_BuildTrip" style="background:#002929; color:#FFFFFF;">Adventure Tour
				</div> </a></span>
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
  	
<div id="body_container">

<!---------------------------------------  Popups ------------------------------------>	
		
<div id="div_greyBack"
style="width:100%;
height:600px;
background: grey;
opacity:0.8;
display:none;
position:absolute;
z-index:100;
margin:0% 0% 0% 0%;">
</div>

<div id="div_travelDates"
style="display:none;
   background:white;
   box-shadow: 2px 0px 6px grey;
   width:40%; 
   opacity:0.9;
   height:auto;  
   border-radius:10px;
  margin:15% 65% 0% 37%;
  position:absolute;
  text-align:center;
  z-index:10000;">

	<div style="width:100%; position:relative;"> 
<span style="margin:10px 2px 0px 2px; font-size:22px; color:DarkSlateGray;">
Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
</div>
<div style="width:100%; position:relative; float:left;">
<span style="width:50%; float:left; margin-top:5%;">
<div style="margin-bottom:20px;">
   <span style="font-size:24px; margin-bottom:20px;">
       <span style="float:none;"><a href="#" style="text-decoration:none;" onClick="show_block('div_trvDate'); hide_block('div_sugstDates');">
	   <div style="width:145px; height:43px; font-weight:700; border-radius:5px; background:#283C5F; border:1px solid darkblue; box-shadow:2px 2px 6px grey; color:#FFFFFF; font-family:Georgia, Calibri; margin-left:120px; box-shadow: 2px 0px 8px 0px grey; font-size:16px;"> My travel dates are known</div></a></span>
    </span>
</div>
</span>
<span style="width:50%; float:left; margin-top:5%;">
<div>
<span style="float:left;" onClick=" show_block('div_greyBack');"><a href="#" style="text-decoration:none;" onClick="show_block('div_sugstDates'); hide_block('div_trvDate');">
<div style="width:140px;; height:43px; font-weight:700; border-radius:5px; background:red; border:1px solid OrangeRed; box-shadow:2px 2px 6px grey; margin-left:68px; color:#FFFFFF; font-family:Georgia,Calibri; box-shadow: 2px 0px 8px 0px grey; font-size:16px;">Just started planning</div></a></span>
</div> </span>
</div>


<div id="div_trvDate" style="display:none;width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;">
			<span style="width:40%; margin-left:0px;">
			  <span class="div_elements" style="font-size:18px;">From</span>			  
			  <span class="div_elements" style="font-size:18px; ">
			  <input type="text" id="txtfrmDt" class="div_elements" style="width:115px; height:20px;"/></span>
			  <span class="div_elements"><a href="#"><div style="background:url('Images/calendar_icon.jpg'); width:25px; height:25px;"></div></a></span> </span>
			  
			  <span style="margin-top:5px; width:40%; margin-left:10px">
			  <span class="div_elements" style="font-size:18px;">To</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtToDt" class="div_elements" style="width:115px; height:20px;"/></span>
			  <span class="div_elements"><a href="#"><div style="background:url('Images/calendar_icon.jpg'); width:25px; height:25px;"></div></a></span> </span>
					 		  
			  <div  class="div_elements" align="center" style="overflow:none; float:right; margin-bottom:5px; margin-right:100px;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_kn_dt('txtfrmDt','txtToDt');"> Submit </a></span>
			  </div>
			</div>
			
			<span style="width:50%; float:right; margin-right:75px;">
			<div id="div_sugstDates" style="display:none; width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;">
			 <span class="div_elements" style="font-size:18px; margin-right:5px;">Travelling in  </span>			  
			  <span class="div_elements" style="font-size:14px; ">
			   <select id="drp_SelDt" name="drp_SelDt" onFocus="load_months();" style="width:110px;">
			   </select>
			  </span>							 		  
			  <div  class="div_elements" style="overflow:none; float:right; margin-right:60px; margin-bottom:5px;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:60px; height:22px; float:none; font-size:16px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_unkn_Dt();"> Submit </a></span>
			  </div>
			</div>
			</span>
</div>

<div id="div_context_adventure">
		<div id="div_landadv1_context" class="div_contexts">
		    		   1. Adventure travel is a type of tourism, involving exploration or travel to remote, exotic and possibly hostile areas. Adventure tourism is rapidly growing in popularity, as tourists seek different kinds of vacations. According to the U.S. based Adventure Travel Trade Association, adventure travel may be any tourist activity, including two of the following three components: a physical activity, a cultural exchange or interaction and engagement with nature.
		 </div>	
		 <div id="div_landadv2_context" class="div_contexts">
		   		2.   Adventure travel is a type of tourism, involving exploration or travel to remote, exotic and possibly hostile areas. Adventure tourism is rapidly growing in popularity, as tourists seek different kinds of vacations. According to the U.S. based Adventure Travel Trade Association, adventure travel may be any tourist activity, including two of the following three components: a physical activity, a cultural exchange or interaction and engagement with nature.
		 </div>	
		<div id="div_landadv3_context" class="div_contexts">
		    		  3.  Adventure travel is a type of tourism, involving exploration or travel to remote, exotic and possibly hostile areas. Adventure tourism is rapidly growing in popularity, as tourists seek different kinds of vacations. According to the U.S. based Adventure Travel Trade Association, adventure travel may be any tourist activity, including two of the following three components: a physical activity, a cultural exchange or interaction and engagement with nature.
		 </div>	
		 <div id="div_landadv4_context" class="div_contexts">
		   		  4.  Adventure travel is a type of tourism, involving exploration or travel to remote, exotic and possibly hostile areas. Adventure tourism is rapidly growing in popularity, as tourists seek different kinds of vacations. According to the U.S. based Adventure Travel Trade Association, adventure travel may be any tourist activity, including two of the following three components: a physical activity, a cultural exchange or interaction and engagement with nature.
		 </div>	
		 <div id="div_wateradv1_context" class="div_contexts">
		   The water adventure 1 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		 <div id="div_wateradv2_context" class="div_contexts">
		   The water adventure 2 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>					
		<div id="div_wateradv3_context" class="div_contexts">
		    The water adventure 3 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>
		 <div id="div_wateradv4_context" class="div_contexts">
		    The land adventure 4 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		 <div id="div_skyadv1_context" class="div_contexts">
		    A sky adventure 1 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_skyadv2_context" class="div_contexts">
		    A sky adventure 2 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_skyadv3_context" class="div_contexts">
		    A sky adventure 3 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_skyadv4_context" class="div_contexts">
		    A sky adventure 4 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		 	 <div id="div_mountainadv1_context" class="div_contexts">
		   The mountain adventure 1 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		 <div id="div_mountainadv2_context" class="div_contexts">
		   The mountain adventure 2 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>					
		<div id="div_mountainadv3_context" class="div_contexts">
		    The mountain adventure 3 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>
		 <div id="div_mountainadv4_context" class="div_contexts">
		    The mountain adventure 4 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		 <div id="div_forestadv1_context" class="div_contexts">
		    A forest adventure 1 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_forestadv2_context" class="div_contexts">
		    A forest adventure 2 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_forestadv3_context" class="div_contexts">
		    A forest adventure 3 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>	
		  <div id="div_forestadv4_context" class="div_contexts">
		    A forest adventure 4 blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah, A land adventure blah blah blah
		 </div>					
</div>		
		
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
  margin:15% 6% 0% 20%;
  position:absolute;
  text-align:center;
  z-index:10000;">
          
			 <div style="width:100%;">
			 <span style="float:right; margin-right:10px; margin-top:5px;" onClick="hide_block('div_FriendRecomm'); hide_block('div_greyBack');">
			 <a href="#"><img src="Images/cancelbtn.png" width="30px" height="30px" /></a></span></div>     
				 <div id="Recommend_box" style=" display:block; margin-top:40px; height:100px;">
			<div style="margin-top:5px;">
			  <span class="div_elements" style="font-size:18px; margin-left:10px;">Your Name</span>			  
			  <span class="div_elements" style="font-size:18px; margin-left:60px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span> </div>
			  
			    <div class="div_elements" style="font-size:18px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px;">Your e-mail Id</span>
			  <span class="div_elements" style="font-size:18px;  margin-left:35px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			  </div>
			  
			  <div class="div_elements" style="margin-top:5px; width:100%;">
			  <a href="#" onClick="show_block('div_frndEmail');show_block('div_frndEmail1');">
			  <span  style="font-size:18px; margin-left:10px; color:#0066FF;">Refer to a friend?</span></a>	
			  </div>
			  
			  <div id="div_frndEmail" class="div_elements" style="font-size:18px; display:none; margin-top:5px;">
			  <span class="div_elements" style="font-size:18px;  margin-left:10px;">Friend's e-mail Id</span>
			  </div>
			  <div id="div_frndEmail1" class="div_elements" style="font-size:18px; display:none;">
			  <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			  <a href="#" onClick="show_block('div_frndEmail2')"><span class="smallbtn" style="width:40px;">Add</span></a>
			  </div>
			  <div id="div_frndEmail2" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			    <a href="#" onClick="show_block('div_frndEmail3')"><span class="smallbtn" style="width:40px;">Add</span></a>
			  </div>
			  <div id="div_frndEmail3" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			    <a href="#" onClick="show_block('div_frndEmail4')"><span class="smallbtn" style="width:40px;">Add</span></a>
			  </div>
			  <div id="div_frndEmail4" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			    <a href="#" onClick="show_block('div_frndEmail5')"><span class="smallbtn" style="width:40px;">Add</span></a>
				</div>
				<div id="div_frndEmail5" class="div_elements" style="font-size:18px; display:none;">
			   <span class="div_elements" style="font-size:18px;  margin-left:20px;">
			  <input type="text" id="txtsenderEmail" class="div_elements" style="width:165px; height:20px;"/></span>
			    <a href="#" onClick="show_block('div_frndEmail6')"><span class="smallbtn" style="width:40px;">Add</span></a>
			  </div>
			  
			  <div  class="div_elements" align="center" style="overflow:none;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_FriendRecomm');"> Submit </a></span>
			  </div>
			</div>
				 
			</div>
	
<div id="div_body">

   <div id="div_vacation_types" style=" position:relative; background:#597272; height:60px; margin-bottom:0px; margin-top:1px; color:#002929; border-radius:5px;">		
		<div id="div_advent_sections" style="display:block;">
		<div align="left" style="width:100%;">
	     <span style="font-size:18px; width:100%; float:left; margin-left:8px; position:relative; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri">
		 Select your adventure zone...</span>
		 </div>
		 <div  style="width:100%; margin-left:18px;">
		 <span class="div_advent_chkTxt"><input id="chkLand" type="checkbox" onChange="display_pics('chkLand','content_Land');" />
		 <a href="#" onClick="display_pics_txt('chkLand','content_Land'); check_none();">Land</a></span>
		 
		 <span class="div_advent_chkTxt"><input id="chkWater" type="checkbox" onChange="display_pics('chkWater','content_Water');" />
		 <a href="#" onClick="display_pics_txt('chkWater','content_Water'); check_none();">Water</a></span>
		 
		 <span class="div_advent_chkTxt"><input id="chkSky" type="checkbox" onChange="display_pics('chkSky','content_Sky');" />
		 <a href="#" onClick="display_pics_txt('chkSky','content_Sky'); check_none();">Sky</a></span>
		 
		  <span class="div_advent_chkTxt"><input id="chkMountain" type="checkbox" onChange="display_pics('chkMountain','content_Mountain');" />
		  <a href="#" onClick="display_pics_txt('chkMountain','content_Mountain'); check_none();">Mountain </a></span>
		  
		    <span class="div_advent_chkTxt"><input id="chkForest" type="checkbox" onChange="display_pics('chkForest','content_Forest');" />
			<a href="#" onClick=" display_pics_txt('chkForest','content_Forest'); check_none();">Forest-Jungle</a></span>
		 </div>
		 </div>
</div>  
		
  <div id="content" style="overflow-x:hidden; overflow-y:scroll; height:500px; margin-top:1px; display:block; position:relative; float:left;">
	  <span style="float:left;">
		  <img align="left" src="Images/Vacation type image/Adventure_tour_Landing page.png" width="940px" height="100%" style="border-radius:5px; float:left;" />
		  </span>		
		 </div>

 <div class="div_adventure_catagories">
		
		 <div id="content_Land" class="div_advent_cata_inner">		 	 
		   <span style="width:19.5%; float:left;">
		   <div class="Adventure_Catalog">		   
		   <div><span class="div_advent_types_hdr">Land Adventures</span></div>
			<div class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_adv" class="span_drpImg">
			<a href="#" style="text-decoration:none;" onClick="hide_block('div_list_landAdvent'); hide_block('up_arrow_adv'); show_block('down_arrow_adv');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_adv" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;" onClick="show_block('div_list_landAdvent'); show_block('up_arrow_adv'); hide_block('down_arrow_adv');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>			
			<div id="div_list_landAdvent" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Sand Dune Thrill</span>
			   <span class="span_drpListItems"><input type="checkbox" />Barren land ride</span>
			   <span class="span_drpListItems"><input type="checkbox" />Rocky Lane</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_landAdvent'); hide_block('up_arrow_adv'); show_block('down_arrow_adv');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div>
	
	<?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?>   		   
		   </div>
		   </span>
		   
		   <span class="span_advent_imgs">
		   <img src="Images/Vacation type image/DesertSafari2.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_landadv1_context');" onMouseOut="HideContent('div_landadv1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/DesertSafari.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_landadv2_context');" onMouseOut="HideContent('div_landadv2_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/land_adv1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_landadv3_context');" onMouseOut="HideContent('div_landadv3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/land_adv2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_landadv4_context');" onMouseOut="HideContent('div_landadv4_context');"/></span>
		</div>
		
		   <div id="content_Water" class="div_advent_cata_inner">		 
		   <span style="width:19.5%; float:left;">
		   <div class="Adventure_Catalog">
		    <div><span class="div_advent_types_hdr">Water Adventures</span></div>
			<div class="div_dropdown">
		    <div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_wateradv" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_waterAdvent'); hide_block('up_arrow_wateradv'); show_block('down_arrow_wateradv');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_wateradv" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;" onClick="show_block('div_list_waterAdvent'); show_block('up_arrow_wateradv'); hide_block('down_arrow_wateradv');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>			
			<div id="div_list_waterAdvent" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Rafting</span>
			   <span class="span_drpListItems"><input type="checkbox" />Surfing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Wind Surfing</span>
			    <span class="span_drpListItems"><input type="checkbox" />Banana boat</span>
				 <span class="span_drpListItems"><input type="checkbox" />Parasailing</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_waterAdvent');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div>
			
		  <?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?>   	
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/watersports3.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_wateradv1_context');" onMouseOut="HideContent('div_wateradv1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/watersports1.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_wateradv2_context');" onMouseOut="HideContent('div_wateradv2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/watersports5.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_wateradv3_context');" onMouseOut="HideContent('div_wateradv3_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/watersports4.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_wateradv4_context');" onMouseOut="HideContent('div_wateradv4_context');" /></span>
		</div>
		
			<div id="content_Sky" class="div_advent_cata_inner">		 
		   <span style="width:19.5%; float:left;">
		   <div class="Adventure_Catalog">		   
		    <div><span class="div_advent_types_hdr">Sky Adventures</span></div>
			<div class="div_dropdown">
			    <div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_skyadv" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_skyAdvent'); hide_block('up_arrow_skyadv'); show_block('down_arrow_skyadv');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_skyadv" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;" onClick="show_block('div_list_skyAdvent'); show_block('up_arrow_skyadv'); hide_block('down_arrow_skyadv');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>		
			<div id="div_list_skyAdvent" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Sky dive</span>
			   <span class="span_drpListItems"><input type="checkbox" />Paragliding</span>
			   <span class="span_drpListItems"><input type="checkbox" />Wind Surfing</span>
		     <span class="span_drpListItems" style="text-align:center;">
			 <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_skyAdvent');">
			 <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div>
			   
		<?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/paragliding.png" class="div_advent_imgs" onMouseOver="ShowContent('div_skyadv1_context');" onMouseOut="HideContent('div_skyadv1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/skyJump.png" class="div_advent_imgs" onMouseOver="ShowContent('div_skyadv2_context');" onMouseOut="HideContent('div_skyadv2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/sky_Adv2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_skyadv3_context');" onMouseOut="HideContent('div_skyadv3_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/sky_Adv1.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_skyadv4_context');" onMouseOut="HideContent('div_skyadv4_context');" /></span>
		</div>
		
			<div id="content_Mountain" class="div_advent_cata_inner">		 
		   <span style="width:19.5%; float:left;">
		   <div class="Adventure_Catalog">
		   <div><span class="div_advent_types_hdr">Mountain Adventures</span></div>
			<div class="div_dropdown">
		   <div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_mountainadv" class="span_drpImg">
			<a href="#" onClick="hide_block('div_list_mountainAdvent'); hide_block('up_arrow_mountainadv'); show_block('down_arrow_mountainadv');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_mountainadv" class="span_drpImg" style="display:block;">
			<a href="#" style="text-decoration:none;" onClick="show_block('div_list_mountainAdvent'); show_block('up_arrow_skyadv'); hide_block('down_arrow_mountainadv');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>			
			<div id="div_list_mountainAdvent" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Trekking</span>
			   <span class="span_drpListItems"><input type="checkbox" />Rock Climbing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Rope way</span>
		     <span class="span_drpListItems" style="text-align:center;">
			 <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_mountainAdvent');">
			 <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div>
	 
		  <?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/adventuretour2.jpg" class="div_advent_imgs" onMouseOver="ShowContent('div_mountainadv1_context');" onMouseOut="HideContent('div_mountainadv1_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/mountain_adv2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_mountainadv2_context');" onMouseOut="HideContent('div_mountainadv2_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/mountain_adv1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_mountainadv3_context');" onMouseOut="HideContent('div_mountainadv3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/mountain_adv3.png" class="div_advent_imgs" onMouseOver="ShowContent('div_mountainadv4_context');" onMouseOut="HideContent('div_mountainadv4_context');"/></span>
		</div>
		
			<div id="content_Forest" class="div_advent_cata_inner">		 
		   <span style="width:19.5%; float:left;">
		   <div class="Adventure_Catalog" >
		   	   <div><span class="div_advent_types_hdr">Forest Adventures</span></div>
			<div class="div_dropdown">
		   <div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_forestadv" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_forestAdvent'); hide_block('up_arrow_forestadv'); show_block('down_arrow_forestadv');">
			<img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			<span id="down_arrow_forestadv" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;" onClick="show_block('div_list_forestAdvent'); show_block('up_arrow_forestadv'); hide_block('down_arrow_forestadv');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			</div>		
			<div id="div_list_forestAdvent" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Safari</span>
			   <span class="span_drpListItems"><input type="checkbox" />Trekking</span>
			   <span class="span_drpListItems"><input type="checkbox" />Rope way</span>
		     <span class="span_drpListItems" style="text-align:center;">
			 <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_forestAdvent');">
			 <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px"/></a></span>
			</div> 
			</div>
			
		  <?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/forest_adv1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_forestadv1_context');" onMouseOut="HideContent('div_forestadv1_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/forest_adv2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_forestadv2_context');" onMouseOut="HideContent('div_forestadv2_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/forest_adv3.png" class="div_advent_imgs" onMouseOver="ShowContent('div_forestadv3_context');" onMouseOut="HideContent('div_forestadv3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/forest_adv4.png" class="div_advent_imgs" onMouseOver="ShowContent('div_forestadv4_context');" onMouseOut="HideContent('div_forestadv4_context');"/></span>
		</div>
		
		</div> 

</div>  
</div>
</body>
</form>
</html>
