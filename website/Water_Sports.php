<!DOCTYPE> <!--html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WaterSport Tour</title>

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
				  <div class="tripHeaderbtn" id="div_BuildTrip" style="background:#002929; color:#FFFFFF;">WaterSport Tour
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

<div id="div_travelDates"
style="display:none;
   background:white;
   box-shadow: 2px 0px 6px grey;
   width:40%; 
   opacity:0.9;
   height:auto;  
   border-radius:10px;
  margin:10% 6% 0% 30%;
  position:absolute;
  text-align:center;
  z-index:10000;">

    <div  style="width:100%; margin-top:1px; position:relative;">	
 <span style="font-size:24px; font-weight:700; color:black; float:right; margin-right:5px;">
 <a href="#" onClick="hide_block('div_greyBack'); hide_block('div_travelDates');">
 <img id="cancelimg" src="Images/cancelbtn.png" width="30px" height="30px" style="text-decoration:none;" /></a></span> 
 	</div>
	<div style="width:100%; position:relative;" align="center"> 
<span style="margin-left:0%; font-size:22px; color:DarkSlateGray;">Please enter your <span style="font-weight:bold;">Travel Dates</span></span>
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
			  <span class="div_elements"><a href="#"><div style="background:url(Images/calendar_icon.jpg); width:25px; height:25px;"></div></a></span> </span>
			  
			  <span style="margin-top:5px; width:40%; margin-left:10px">
			  <span class="div_elements" style="font-size:18px;">To</span>			  
			  <span class="div_elements" style="font-size:18px;">
			  <input type="text" id="txtToDt" class="div_elements" style="width:115px; height:20px;"/></span>
			  <span class="div_elements"><a href="#"><div style="background:url(Images/calendar_icon.jpg); width:25px; height:25px;"></div></a></span> </span>
					 		  
			  <div  class="div_elements" style="overflow:none; float:right; margin-right:40px; margin-bottom:5px;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_kn_dt('txtfrmDt','txtToDt');"> Submit </a></span>
			  </div>
			</div>
			
			<div id="div_sugstDates" style="display:none; width:100%; text-align:center; position:relative; margin-top:5px; margin-left:40px;">
			 <span class="div_elements" style="font-size:18px; margin-right:5px;">Planning in  </span>			  
			  <span class="div_elements" style="font-size:14px; ">
			   <select id="drp_SelDt" name="drp_SelDt" onFocus="load_months();" style="width:120px;">
			   </select>
			  </span>
							 		  
			  <div  class="div_elements" style="overflow:none; float:right; margin-right:60px; margin-bottom:5px;">
			  <span class="smallbtn" style="box-shadow:1px 1px 1px 1px grey; width:90px; height:26px; float:none; font-size:18px; margin-left:160px; margin-top:10px;">
			  <a href="#" style="text-decoration:none; color:white;" onClick="hide_block('div_travelDates'); hide_block('div_greyBack'); disp_unkn_Dt();"> Submit </a></span>
			  </div>
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

<div id="div_body">	
	
	<div id="div_vacation_types" style="position:relative; height:70px; padding:5px; background:#597272; border:1px solid lightgrey; color:#002929; border-radius:5px;">
	
	<div id="div_WaterSportSelect" style="display:block;">
		<div align="left" style="width:100%;">
	     <span style="font-size:20px; width:100%; float:left; margin-left:8px; color:#CCFFFF; font-weight:500; font-family:Georgia, Calibri;">
		 My WaterSport plans...</span>
		 </div>
		 <div align="center"  style="width:100%; margin-left:50px;">
		  <span class="div_others_chkTxt"><input id="chAct" type="checkbox" onChange="display_pics('chAct','content_Activities'); water_actv('chAct','div_water_act'); " />
		  <a href="#" onClick="display_pics_txt('chAct','content_Activities');">Activities</a></span>
		 
		  <span class="div_others_chkTxt"><input id="chkSight" type="checkbox" onChange="display_pics('chkSight','content_Sightseeing');" />
		  <a href="#" onClick="display_pics_txt('chkSight','content_Sightseeing');">Sightseeing</a></span>
		 
		 <span class="div_others_chkTxt"><input id="chkRest" type="checkbox" onChange="display_pics('chkRest','content_Rest');" />
		 <a href="#" onClick="display_pics_txt('chkRest','content_Rest');">Rest & Relaxing</a></span>
		 
		 </div>
		 
		 <div id="div_water_act" style="float:left; width:100%; display:none; margin-top:5px;">
		   <span style="float:left; margin-left:150px;"><input type="checkbox" id="chkAbvWater" name="chkAbvWater" value="Above Water" /></span>
		   <span class="input_Ans" style="float:left; color:#fff;">Above Water</span>
		   <span style="float:left;"><input type="checkbox" id="chkNearWater" name="chkNearWater" value="Near Water" /></span>
		   <span class="input_Ans" style="float:left; color:#fff;">Near Water</span>
		   <span style="float:left;"><input type="checkbox" id="chkUndWater" name="chkUndWater" value="Under Water" /></span>
		   <span class="input_Ans" style="float:left; color:#fff;">Under Water</span>
		 </div>
		 
		 </div>
		</div>
	
			
	<div id="div_context_WaterSport">
	   <div id="div_WaterSportact1_context" class="div_contexts">
		    WaterSport activity 1 blah blah blah, WaterSport activity blah blah blah, WaterSport activity blah blah blah,  WaterSport activity blah blah blah
		 </div>	
		 <div id="div_WaterSportact2_context" class="div_contexts">
		    WaterSport activity 2 blah blah blah,  WaterSport activity blah blah blah, WaterSport activity blah blah blah,  WaterSport activity blah blah blah
		 </div>	
		<div id="div_WaterSportact3_context" class="div_contexts">
		    WaterSport activity 3 blah blah blah, WaterSport activity blah blah blah, WaterSport activity blah blah blah,  WaterSport activity blah blah blah
		 </div>	
		 <div id="div_WaterSportact4_context" class="div_contexts">
		     WaterSport activity 4 blah blah blah,  WaterSport activity blah blah blah,  WaterSport activity blah blah blah,  WaterSport activity blah blah blah
		 </div>	
		 <div id="div_WaterSportSight1_context" class="div_contexts">
		   WaterSport sightseeing 1 blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah
		 </div>	
		 <div id="div_WaterSportSight2_context" class="div_contexts">
		   WaterSport sightseeing 2 blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah
		 </div>					
		<div id="div_WaterSportSight3_context" class="div_contexts">
		    WaterSport sightseeing 3 blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah
		 </div>
		 <div id="div_WaterSportSight4_context" class="div_contexts">
		    WaterSport sightseeing 4 blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah, WaterSport sightseeing blah blah blah
		 </div>	
		 <div id="div_WaterSportRest1_context" class="div_contexts">
		   WaterSport Rest and Relax 1 blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah
		 </div>	
		  <div id="div_WaterSportRest2_context" class="div_contexts">
		   WaterSport Rest and Relax 2 blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah
		 </div>	
		  <div id="div_WaterSportRest3_context" class="div_contexts">
		   WaterSport Rest and Relax 3 blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah,WaterSport Rest and Relax blah blah blah
		 </div>	
		  <div id="div_WaterSportRest4_context" class="div_contexts">
		    WaterSport Rest and Relax 4 blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah, WaterSport Rest and Relax blah blah blah
		 </div>	
	</div>		

     <div id="content" style="overflow-x:hidden; overflow-y:scroll; height:500px; position:relative; display:block;">
		  <span>
		   <img src="Images/Vacation type image/WaterSport_Collage.png" width="940px" height="100%" style="border-radius:5px; background-repeat:no repeat;" />
		  </span>		
		 </div>
 
	 <div style="overflow-y:scroll; height:400px; overflow-x:hidden; width:100%;">
		 <div id="content_Activities" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style= "width:19%; float:left;">
		   <div class="Adventure_Catalog">
		    <div><span class="div_advent_types_hdr">Activites</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_WaterSport">---Select---</span>
			<span id="up_arrow_WaterSportAct" class="span_drpImg"> <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_act'); hide_block('up_arrow_WaterSportAct'); show_block('down_arrow_WaterSportAct');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_WaterSportAct" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_WaterSport_act'); show_block('up_arrow_WaterSportAct'); hide_block('down_arrow_WaterSportAct');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>			
			<div id="div_list_WaterSport_act" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Wind Surfing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Surfing</span>
			   <span class="span_drpListItems"><input type="checkbox" />BananaBoat</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_act');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
			
	  <div style="width:100%; margin-top:25px;">
			<a href="Packages.php?type=WATER SPORTS" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   		   
		   </div>
		   </span>
		   
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_WaterSport1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportact1_context');" onMouseOut="HideContent('div_WaterSportact1_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_activity_windsurfing.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportact2_context');" onMouseOut="HideContent('div_WaterSportact2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_WaterSport5.png"class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportact3_context');" onMouseOut="HideContent('div_WaterSportact3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/activities_WaterSport7.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportact4_context');" onMouseOut="HideContent('div_WaterSportact4_context');"/></span>
		</div>
		
		<div id="content_Sightseeing" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		   <div class="Adventure_Catalog">		   
		       <div><span class="div_advent_types_hdr">Sightseeing</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_WaterSport">---Select---</span>
			<span id="up_arrow_WaterSportSight" class="span_drpImg" > <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_sight'); hide_block('up_arrow_WaterSportSight'); show_block('down_arrow_WaterSportSight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_WaterSportSight" class="span_drpImg" style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_WaterSport_sight'); show_block('up_arrow_WaterSportSight'); hide_block('down_arrow_WaterSportSight');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
			  </div>			
			<div id="div_list_WaterSport_sight" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Dolphin View</span>
			   <span class="span_drpListItems"><input type="checkbox" />Cave Islands</span>
			   <span class="span_drpListItems"><input type="checkbox" />Snorkeling</span>
			     <span class="span_drpListItems"><input type="checkbox" />Coral view</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_sight');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
				   
			 <div style="width:100%; margin-top:25px;">
			<a href="Packages.php?type=WATER SPORTS" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_sightseeing5.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportSight1_context');" onMouseOut="HideContent('div_WaterSportSight1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_sightseeing1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportSight2_context');" onMouseOut="HideContent('div_WaterSportSight2_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_sightseeing_Indonasia_caveIsland.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportSight3_context');" onMouseOut="HideContent('div_WaterSportSight3_context');" /></span>
		   <span style="width:19.6%; float:left;"><img src="Images/Vacation type image/WaterSport_rest6.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportSight4_context');" onMouseOut="HideContent('div_WaterSportSight4_context');" /></span>
		</div>
		
	<div id="content_Rest" style="overflow-x:hidden; overflow-y:hidden; height:auto; margin-top:2px; display:none; width:100%;">		 
		   <span style="width:19%; float:left;">
		     <div class="Adventure_Catalog">		   
		       <div><span class="div_advent_types_hdr">Rest & Relaxation</span></div>
			<div style="position:relative;" class="div_dropdown">
			<div>
			<span id="span_act_WaterSport">---Select---</span>
			<span id="up_arrow_WaterSportRest" class="span_drpImg"><a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_rest');  hide_block('up_arrow_WaterSportRest'); show_block('down_arrow_WaterSportRest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span>
			<span id="down_arrow_WaterSportRest" class="span_drpImg"  style="display:block;"><a href="#" style="text-decoration:none;"  onclick="show_block('div_list_WaterSport_rest'); show_block('up_arrow_WaterSportRest'); hide_block('down_arrow_WaterSportRest');">
			<img src="Images/dropdown_arrow_icon.png" width="10px" height="10px" /></a></span>
		    </div>			
			<div id="div_list_WaterSport_rest" class="div_drpListItems_pac">			 
			  <span class="span_drpListItems"><input type="checkbox" />Sun Bathing</span>
			   <span class="span_drpListItems"><input type="checkbox" />Sea food</span>
			   <span class="span_drpListItems" style="text-align:center;">
			   <a href="#" style="text-decoration:none;" onClick="hide_block('div_list_WaterSport_rest');">
			   <img src="Images/dropdownlast_arrow_icon.png" width="10px" height="10px" /></a></span> </div>
			</div>
			
 			<div style="width:100%; margin-top:25px;">
			<a href="Packages.php?type=WATER SPORTS" style="text-decoration:none;">
			<span class="span_viewPackageBtn">View Pacakges </span></a>
			 <a href="#" style="text-decoration:none;" onClick="show_block('div_FriendRecomm');">
			 <span class="span_emailBtn">E-mail a Friend</span></a>
			</div>
		   
		   </div></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_rest1.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportRest1_context');" onMouseOut="HideContent('div_WaterSportRest1_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_rest.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportRest2_context');" onMouseOut="HideContent('div_WaterSportRest2_context');" /></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_rest2.png"class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportRest3_context');" onMouseOut="HideContent('div_WaterSportRest3_context');"/></span>
		   <span class="span_advent_imgs"><img src="Images/Vacation type image/WaterSport_rest5.png" class="div_advent_imgs" onMouseOver="ShowContent('div_WaterSportRest4_context');" onMouseOut="HideContent('div_WaterSportRest4_context');" /></span>
		</div>
	
</div>
</div>


  
	</div>
</div>
</body>
</form>
</html>
