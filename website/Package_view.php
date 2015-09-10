<!DOCTYPE> <!--html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php if(isset($_GET['vactype'])) echo $_GET['vactype']?></title>

<link rel="stylesheet" type="text/css" href="Stylesheets/plan_tripStyles.css">
<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />

<script src="Javascript/plan_tripScript.js" language="javascript"></script>
<script src="Javascript/context.js" language="javascript"></script>
<script src="Javascript/resize.js" language="javascript"></script>
<script src="Javascript/ExploreScript.js" language="javascript" type="text/javascript"></script>
<script src="Javascript/screenResolution_Script.js" language="javascript" type="text/javascript"></script>
</head>

<form name="frm" method="post">
<body>

<?php
if(isset($_GET['vactype']))
 $vac = $_GET['vactype'];
else
 $vac =""; 

?>

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
				  <div class="tripHeaderbtn" id="div_BuildTrip" style="background:#002929; color:#FFFFFF;"><?php echo $vac; ?>
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
  margin:10% 6% 0% 20%;
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
			
<div id="div_context_<?php echo $vac; ?>">
	   <div id="div_<?php echo $vac; ?>act1_context" class="div_contexts">
		    <?php echo $vac; ?> activity 1 blah blah blah, <?php echo $vac; ?> activity blah blah blah, <?php echo $vac; ?> activity blah blah blah,  <?php echo $vac; ?> activity blah blah blah
		 </div>	
		 <div id="div_<?php echo $vac; ?>act2_context" class="div_contexts">
		    <?php echo $vac; ?> activity 2 blah blah blah,  <?php echo $vac; ?> activity blah blah blah, <?php echo $vac; ?> activity blah blah blah,  <?php echo $vac; ?> activity blah blah blah
		 </div>	
		<div id="div_<?php echo $vac; ?>act3_context" class="div_contexts">
		    <?php echo $vac; ?> activity 3 blah blah blah, <?php echo $vac; ?> activity blah blah blah, <?php echo $vac; ?> activity blah blah blah,  <?php echo $vac; ?> activity blah blah blah
		 </div>	
		 <div id="div_<?php echo $vac; ?>act4_context" class="div_contexts">
		     <?php echo $vac; ?> activity 4 blah blah blah,  <?php echo $vac; ?> activity blah blah blah,  <?php echo $vac; ?> activity blah blah blah,  <?php echo $vac; ?> activity blah blah blah
		 </div>	
		 <div id="div_<?php echo $vac; ?>Sight1_context" class="div_contexts">
		   <?php echo $vac; ?> sightseeing 1 blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah
		 </div>	
		 <div id="div_<?php echo $vac; ?>Sight2_context" class="div_contexts">
		   <?php echo $vac; ?> sightseeing 2 blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah
		 </div>					
		<div id="div_<?php echo $vac; ?>Sight3_context" class="div_contexts">
		    <?php echo $vac; ?> sightseeing 3 blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah
		 </div>
		 <div id="div_<?php echo $vac; ?>Sight4_context" class="div_contexts">
		    <?php echo $vac; ?> sightseeing 4 blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah, <?php echo $vac; ?> sightseeing blah blah blah
		 </div>	
		 <div id="div_<?php echo $vac; ?>Rest1_context" class="div_contexts">
		   <?php echo $vac; ?> Rest and Relax 1 blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah
		 </div>	
		  <div id="div_<?php echo $vac; ?>Rest2_context" class="div_contexts">
		   <?php echo $vac; ?> Rest and Relax 2 blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah
		 </div>	
		  <div id="div_<?php echo $vac; ?>Rest3_context" class="div_contexts">
		   <?php echo $vac; ?> Rest and Relax 3 blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah,<?php echo $vac; ?> Rest and Relax blah blah blah
		 </div>	
		  <div id="div_<?php echo $vac; ?>Rest4_context" class="div_contexts">
		    <?php echo $vac; ?> Rest and Relax 4 blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah, <?php echo $vac; ?> Rest and Relax blah blah blah
		 </div>	
	</div>
	
<div id="div_body">	

		<div id="div_vacation_types" style="position:relative; height:80px; background:#597272; border:1px solid lightgrey; color:#002929; border-radius:5px;">
	<?php 
	if($vac == "WATER SPORTS")
	{	
	echo '<div id="div_waterSport" style="display:block;">
		<div align="left" style="width:100%;">
	     <span style="font-size:18px; width:100%; float:left; margin-left:8px; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri;">
		 MY '.$vac.' PLANS ...</span>
		 </div>
		 <div align="center"  style="width:100%;  margin-left:50px;">
		 <span class="div_others_chkTxt"><input id="chAct" type="checkbox" onChange="show_block(\'sub_cate\');" />
		 <a href="#" onClick=" display_pics_txt(\'chAct\',\'content_Activities\');">Activities</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkSight" type="checkbox" onChange="display_pics(\'chkSight\',\'content_Sightseeing\');" />
		 <a href="#" onClick="display_pics_txt(\'chkSight\',\'content_Sightseeing\');">Sightseeing</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkRest" type="checkbox" onChange="display_pics(\'chkRest\',\'content_Rest\');" />
		 <a href="#" onClick="display_pics_txt(\'chkRest\',\'content_Rest\');">Rest & Relaxing</a></span>
		 
		 </div>
		 </div>';
		 
	 echo '<div id="sub_cate" style="width:100%; float:left; display:none;">';
	    echo '<span class="font-medium" style="float:left; color:#fff; margin-left:120px;"><input type="checkbox" value="Above Water" onchange="display_pics(\'chAct\',\'content_Activities\'); " />Above Water</span>';
		echo '<span class="font-medium" style="float:left; color:#fff; margin-left:10px;"><input type="checkbox" value="Near Water" onchange="display_pics(\'chAct\',\'content_Activities\'); " />Near Water</span>';
		echo '<span class="font-medium" style="float:left; color:#fff; margin-left:10px;"><input type="checkbox" value="Under Water" onchange="display_pics(\'chAct\',\'content_Activities\'); " />Under Water</span>';
	 echo '</div>';	
	 }
	 else 
	 {
	  	echo '<div id="div_waterSport" style="display:block;">
		<div align="left" style="width:100%;">
	     <span style="font-size:18px; width:100%; float:left; margin-left:8px; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri;">
		 MY '.$vac.' PLANS ...</span>
		 </div>
		 <div align="center"  style="width:100%;  margin-left:50px;">
		 <span class="div_others_chkTxt"><input id="chAct" type="checkbox" onChange="display_pics(\'chAct\',\'content_Activities\'); show_block(\'sub_cate\');" />
		 <a href="#" onClick=" display_pics_txt(\'chAct\',\'content_Activities\');">Activities</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkSight" type="checkbox" onChange="display_pics(\'chkSight\',\'content_Sightseeing\');" />
		 <a href="#" onClick="display_pics_txt(\'chkSight\',\'content_Sightseeing\');">Sightseeing</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkRest" type="checkbox" onChange="display_pics(\'chkRest\',\'content_Rest\');" />
		 <a href="#" onClick="display_pics_txt(\'chkRest\',\'content_Rest\');">Rest & Relaxing</a></span>
		 
		 </div>
		 </div>';
	 } 
		 
	?>
		 
		</div>

<div id="content" style="overflow-x:hidden; overflow-y:scroll; height:500px; position:relative; display:block;">
	   <span>
		  <img src="Images/Vacation type image/<?php echo $vac; ?>_Collage.png" width="940px" height="100%" sstyle="border-radius:5px; background-repeat:no repeat;" />
		  </span>		
		 </div> 
		 
<div style="overflow-y:scroll; height:400px; overflow-x:hidden; position:relative; width:100%; margin-left:15px;">
		 <div id="content_Activities" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		   <div class="Adventure_Catalog">
		       <div><span class="div_advent_types_hdr">Activites</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_<?php echo $vac; ?>Act" class="span_drpImg"> <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_act'); hide_block('up_arrow_<?php echo $vac; ?>Act'); show_block('down_arrow_<?php echo $vac; ?>Act');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_<?php echo $vac; ?>Act" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_junlge_act'); show_block('up_arrow_<?php echo $vac; ?>Act'); hide_block('down_arrow_<?php echo $vac; ?>Act');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>		
			<div id="div_list_junlge_act" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" /><?php echo $vac; ?> Safari</span>
			   <span class="span_drpListItems"><input type="checkbox" />Trekking</span>
			   <span class="span_drpListItems"><input type="checkbox" />Rope Way</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_act');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
	      	<?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
				<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   		   
		   </div>
		   </span>
		   
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/forest_adv2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>act1_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>act1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafar_activities1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>act2_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>act2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafar_activities2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>act3_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>act3_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafar_activities.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>act4_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>act4_context');" /></span>
		</div>
		
		<div id="content_Sightseeing" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		   <div class="Adventure_Catalog">
       <div><span class="div_advent_types_hdr">Sightseeing</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_<?php echo $vac; ?>Sight" class="span_drpImg"> <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_sight'); hide_block('up_arrow_<?php echo $vac; ?>Sight'); show_block('down_arrow_<?php echo $vac; ?>Sight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_<?php echo $vac; ?>Sight" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_junlge_sight'); show_block('up_arrow_<?php echo $vac; ?>Sight'); hide_block('down_arrow_<?php echo $vac; ?>Sight');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>			
			<div id="div_list_junlge_sight" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />National Parks</span>
			   <span class="span_drpListItems"><input type="checkbox" />Wild life sancturies</span>
			   <span class="span_drpListItems"><input type="checkbox" />Tribal life</span>
			   <span class="span_drpListItems"><input type="checkbox" />Zoos</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_sight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
	           	<?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer;">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_sightseeing.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Sight1_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Sight1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_sightseeing1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Sight2_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Sight2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junlgesafari_sightseeing2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Sight3_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Sight3_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_sightseeing3.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Sight4_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Sight4_context');" /></span>
		</div>
		
	<div id="content_Rest" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		   <div class="Adventure_Catalog">
	       <div><span class="div_advent_types_hdr">Rest & Relaxation</span></div>
			<div style="position:relative;" class="div_dropdown">
				<div>
			<span id="span_act_beach">---Select---</span>
			<span id="up_arrow_<?php echo $vac; ?>Rest" class="span_drpImg"> <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_Rest'); hide_block('up_arrow_<?php echo $vac; ?>Rest'); show_block('down_arrow_<?php echo $vac; ?>Rest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_<?php echo $vac; ?>Rest" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_junlge_Rest'); show_block('up_arrow_<?php echo $vac; ?>Rest'); hide_block('down_arrow_<?php echo $vac; ?>Rest');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>		
			<div id="div_list_junlge_Rest" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Tree House</span>
			   <span class="span_drpListItems"><input type="checkbox" />Water falls</span>			
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_junlge_Rest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
	          	<?php
		  echo '<div style="width:100%; margin-top:25px; cursor:pointer">
			<span class="span_viewPackageBtn" onclick="openPck(\'Packages.php\',\''.$_GET['type'].'\',\''.$_GET['vactype'].'\',\''.$_GET['loc'].'\',\''.$_GET['currLoc'].'\',\''.$_GET['dur'].'\',\''.$_GET['mode'].'\',\''.$_GET['locType'].'\',\''.$_GET['locNum'].'\',\''.$_GET['trvlr'].'\',\''.$_GET['agenda'].'\',\''.$_GET['intensity'].'\',\''.$_GET['gender'].'\',\''.$_GET['email'].'\',\''.$_GET['trvlDts'].'\');">View Pacakges </span>
			 <a href="#" style="text-decoration:none;" onClick="show_block(\'div_FriendRecomm\');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>';
		?> 
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_rest.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Rest1_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Rest1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_rest1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Rest2_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Rest2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_rest3.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Rest3_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Rest3_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/junglesafari_rest2.png" class="div_advent_imgs" onMouseOver="ShowContent('div_<?php echo $vac; ?>Rest4_context');" onMouseOut="HideContent('div_<?php echo $vac; ?>Rest4_context');" /></span>
		</div>
	
</div>

</div>


  
	</div>
</body>
</form>
</html>
