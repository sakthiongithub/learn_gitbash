function wlc_msg()
{
	if(document.getElementById('userLog').innerHMTL!="")
	{
		 document.getElementById('user_wlc').style.display='block';		
	}
	else
	  document.getElementById('btnSaveWL').style.display='none';
	
}
function blink() {
	
if(document.getElementById('userLog').innerHMTL!="")
	{
 if (i == 1) {
    document.getElementById('imgSave').style.display = 'none';
 } 
 
 else {
      document.getElementById('imgSave').style.display = 'block';
  }

 if(i == 1) i = 0;
 else
    i=1;
	}
}

function show_CustomerCare()
{
  document.getElementById('C_care_text_hidden').style.visibility='visible';
}

function hide_CustomerCare()
{  
  document.getElementById('btnCustomer').style.background='#002929';
  document.getElementById('C_care_text_hidden').style.visibility='hidden';
}
function errase(id)
{
	document.getElementById(id).innerHTML="";
   document.getElementById(id).value="";   
}

function show_block(id)
{
	document.getElementById(id).style.display='block';
}

function hide_block(id)
{
	document.getElementById(id).style.display='none';
}
    
function Highlight()
{
document.getElementById('highlight').style.display="block";
document.getElementById('parent').style.display='block';
document.getElementById('parent').style.background="gray";
document.getElementById('parent').style.filter="alpha(Opacity=50)";
document.getElementById('parent').style.opacity="0.5";
document.getElementById('parent').style.position='absolute';
document.getElementById('parent').style.width="100%";
}

function close_highlight()
{
document.getElementById('highlight').style.display='none';
document.getElementById('div_greyBack').style.display='none';
}

function show_DateTime()
{
	document.getElementById('div_DateTime').style.display='block';
}

function close_Dt()
{
	document.getElementById('div_DateTime').style.display='none';
}

function open_details()
{
	document.getElementById('div_IternaryDetails').style.display='block';
	document.getElementById('div_DateTime').style.display='none';
	document.getElementById('span_selectedDate').innerHTML=document.getElementById('dd').value;
	document.getElementById('span_selectedTime').innerHTML= document.getElementById('drpTravelTime').options[document.getElementById('drpTravelTime').options.selectedIndex].value;
}
function close_Details()
{
	document.getElementById('div_IternaryDetails').style.display='none';
}
function show_trip_email()
{
	document.getElementById('trip_email').style.visibility='visible';
}

function show_tr(id)
{
	document.getElementById(id).style.display='table-row';
}

function checkCity_shop()
{	
	  	display_images('div_Shopping_Street','div_Sightseeing','div_Historical','div_Nightlife','div_Amusement','div_Religious','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');	
}

function checkCity_sightsee()
{	  
display_images('div_Sightseeing','div_Shopping_Street','div_Historical','div_Nightlife','div_Amusement','div_Religious','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');
}

function checkCity_hist()
{
display_images('div_Historical','div_Shopping_Street','div_Sightseeing','div_Nightlife','div_Amusement','div_Religious','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');	
}

function checkCity_nightlife()
{
 	display_images('div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Amusement','div_Religious','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');
}

function checkCity_kids()
{
display_images('div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Religious','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');
}

function checkCity_religious()
{
	  	display_images('div_Religious','div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Cultural','div_mustSee','div_Exclusive','div_Offbeat');	
}

function checkCity_cultural()
{
 	display_images('div_Cultural','div_Religious','div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_mustSee','div_Exclusive','div_Offbeat');
	
}

function checkCity_mustsee()
{
	display_images('div_mustSee','div_Cultural','div_Religious','div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Exclusive','div_Offbeat');	
}

function checkCity_exclusive()
{
	display_images('div_Exclusive','div_mustSee','div_Cultural','div_Religious','div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Offbeat');	
}

function checkCity_offbeat()
{
	display_images('div_Offbeat','div_mustSee','div_Cultural','div_Religious','div_Amusement','div_Nightlife','div_Sightseeing','div_Shopping_Street','div_Historical','div_Exclusive');	
}

function display_images(imgId, block1, block2, block3, block4, block5, block6,block7,block8,block9)
{
	
	document.getElementById(imgId).style.display='block';
	document.getElementById(block1).style.display='none';
	document.getElementById(block2).style.display='none';
	document.getElementById(block3).style.display='none';
	document.getElementById(block4).style.display='none';
	document.getElementById(block5).style.display='none';
	document.getElementById(block6).style.display='none';
	document.getElementById(block7).style.display='none';
	document.getElementById(block8).style.display='none';
	document.getElementById(block9).style.display='none';
}

function btncolor_onclick(Clickid,btn1,btn2,btn3,btn4,btn5,btn6,btn7,btn8,btn9)
{
	//document.getElementById('div_selectedTab').innerHTML =document.getElementById(Clickid).innerHTML;   
	
	document.getElementById(Clickid).style.background= "#FFFFFF";
	document.getElementById(Clickid).style.color="#333333";	
	
	document.getElementById(btn1).style.background="#597272";
	document.getElementById(btn1).style.color='#FFFFFF';
	
	document.getElementById(btn2).style.background="#597272";
	document.getElementById(btn2).style.color='#FFFFFF';
	
	document.getElementById(btn3).style.background="#597272";
	document.getElementById(btn3).style.color='#FFFFFF';
	
	document.getElementById(btn4).style.background="#597272";
	document.getElementById(btn4).style.color='#FFFFFF';
	
	document.getElementById(btn5).style.background="#597272";
	document.getElementById(btn5).style.color='#FFFFFF';
	
	document.getElementById(btn6).style.background="#597272";
	document.getElementById(btn6).style.color='#FFFFFF';
	
	document.getElementById(btn7).style.background="#597272";
	document.getElementById(btn7).style.color='#FFFFFF';
	
	document.getElementById(btn8).style.background="#597272";
	document.getElementById(btn8).style.color='#FFFFFF';
	
	document.getElementById(btn9).style.background="#597272";
	document.getElementById(btn9).style.color='#FFFFFF';
}

function btncolor_onclick_popup(Clickid,btn1,btn2,btn3,btn4,btn5,btn6,btn7,btn8,btn9)
{
	document.getElementById(Clickid).style.background= "Red";
	document.getElementById(Clickid).style.color="#FFFFFF";	
	
	document.getElementById(btn1).style.background="#597272";
	document.getElementById(btn1).style.color='#FFFFFF';
	
	document.getElementById(btn2).style.background="#597272";
	document.getElementById(btn2).style.color='#FFFFFF';
	
	document.getElementById(btn3).style.background="#597272";
	document.getElementById(btn3).style.color='#FFFFFF';
	
	document.getElementById(btn4).style.background="#597272";
	document.getElementById(btn4).style.color='#FFFFFF';
	
	document.getElementById(btn5).style.background="#597272";
	document.getElementById(btn5).style.color='#FFFFFF';
	
	document.getElementById(btn6).style.background="#597272";
	document.getElementById(btn6).style.color='#FFFFFF';
	
	document.getElementById(btn7).style.background="#597272";
	document.getElementById(btn7).style.color='#FFFFFF';
	
	document.getElementById(btn8).style.background="#597272";
	document.getElementById(btn8).style.color='#FFFFFF';
	
	document.getElementById(btn9).style.background="#597272";
	document.getElementById(btn9).style.color='#FFFFFF';
}


function btncolor_onclick_more(Clickid,btn1,btn2,btn3,btn4,btn5,btn6,btn7,btn8,btn9,btn10,btn11,btn12)
{
	document.getElementById(Clickid).style.background= "#FFFFFF";
	document.getElementById(Clickid).style.color="#333333";
	document.getElementById('div_selectedTab').innerHTML =document.getElementById(Clickid).innerHTML; 
	
	document.getElementById(btn1).style.background="#66A3FF";
	document.getElementById(btn1).style.color='#FFFFFF';
	
	document.getElementById(btn2).style.background="#66A3FF";
	document.getElementById(btn2).style.color='#FFFFFF';
	
	document.getElementById(btn3).style.background="#66A3FF";
	document.getElementById(btn3).style.color='#FFFFFF';
	
	document.getElementById(btn4).style.background="#66A3FF";
	document.getElementById(btn4).style.color='#FFFFFF';
	
	document.getElementById(btn5).style.background="#66A3FF";
	document.getElementById(btn5).style.color='#FFFFFF';
	
	document.getElementById(btn6).style.background="#66A3FF";
	document.getElementById(btn6).style.color='#FFFFFF';
	
	document.getElementById(btn7).style.background="#66A3FF";
	document.getElementById(btn7).style.color='#FFFFFF';
	
	document.getElementById(btn8).style.background="#66A3FF";
	document.getElementById(btn8).style.color='#FFFFFF';
	
	document.getElementById(btn9).style.background="#66A3FF";
	document.getElementById(btn9).style.color='#FFFFFF';
	
	document.getElementById(btn10).style.background="#66A3FF";
	document.getElementById(btn10).style.color='#FFFFFF';
	
	document.getElementById(btn11).style.background="#66A3FF";
	document.getElementById(btn11).style.color='#FFFFFF';
	
	document.getElementById(btn12).style.background="#66A3FF";
	document.getElementById(btn12).style.color='#FFFFFF';
}

function btncolor_onmouse(id)
{
	document.getElementById(id).style.border="1px solid #FFFFFF";
}

function btncolor_nomouse(id)
{
	document.getElementById(id).style.border='none';
}

function change_Shopping(imgId, block1, block2, block3, block4, block5, block6, block7, block8, block9)
{
	if(document.getElementById('drpshop_type').options[document.getElementById('drpshop_type').options.selectedIndex].value == "Malls" )
	{		
     	display_images(imgId, block1, block2, block3, block4, block5, block6,block7,block8,block9);
	}
	else
	{
 	    display_images( block1, imgId, block2, block3, block4, block5, block6,block7,block8,block9);
	}
}

function show_weather(id)
{
	document.getElementById('grey_back').style.display='block';
	document.getElementById(id).style.display="block";
}
function hide_weather(id)
{
	document.getElementById('grey_back').style.display='none';
	document.getElementById(id).style.display='none';
}
function hide_filters(id,id1,id2)
{
	document.getElementById(id).style.display='none';
	document.getElementById(id1).style.display='none';
	document.getElementById(id2).style.display='none';
}

function change_wishlist_font(id)
{
	document.getElementById(id).style.color='red';
}

function showMap(id)
{
	var attr= document.getElementById(id).value;
var	Loc = document.getElementById('hdr_city').innerHTML ;
	if(document.getElementById(id).checked==true)
	{
	document.getElementById('frmCity_map').value ="General Post Office,"+Loc+", India" ;
	document.getElementById('toCity_map').value = attr+", "+Loc+", India";
		ShowOnMap();
	document.getElementById('toCity_map').style.border="1px solid green";
	document.getElementById('toCity_map').style.background="#FFFFCC";
	document.getElementById('toCity_map').style.border = "1px solid green";	
	}
	else
	{
	  document.getElementById('frmCity_map').value =  "General Post Office, "+Loc+", India";
	  document.getElementById('toCity_map').value = Loc+" City, India";
	  	ShowOnMap();
	  document.getElementById('toCity_map').style.border="1px solid #DDDDDD";
	  document.getElementById('toCity_map').style.background="#FFFFFF";
	  document.getElementById('frmCity_map').style.border = "1px solid #DDDDDD";
	}

}
 
  
function showMap_Pop(frmcity,tocity,map_id)
{		
	 var directionsService = new google.maps.DirectionsService();
     var directionsDisplay = new google.maps.DirectionsRenderer();

     var map = new google.maps.Map(document.getElementById(map_id), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
	 
     directionsDisplay.setMap(map);	 

     var request = {
       origin: document.getElementById(frmcity).value, 
       destination:document.getElementById(tocity).value,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
	
}    
  

function show_custom_trip()
{
document.getElementById('div_custom_trip').style.display='block';
document.getElementById('vacation_image_btns').style.display='none';

 hide_block('div_attr');
 hide_block('div_hotel');
 hide_block('div_maps');   
}

function close_custom_trip()
{
	 hide_block('div_custom_trip');
	  document.getElementById('div_attr').style.display="block";
	 document.getElementById('div_maps').style.display="block";
	 document.getElementById('vacation_image_btns').style.display="block";
	 document.getElementById('span_destCity').innerHTML ="";
	 document.getElementById('div_list_custtrp').innerHTML="";
}

function show_block_iternary(id)
{
	document.getElementById(id).style.display='block';
	document.getElementById('div_wishlist').style.width="450px";
}
function errase(id)
{
	document.getElementById(id).value="";
}

function txtbox_color_onmouseover(id)
{
	document.getElementById(id).style.border = "1px solid OrangeRed";
}

function txtbox_color_onmouseout(id)
{
	document.getElementById(id).style.border="1px solid grey";
}

function show_remainders()
{
	if(document.getElementById('drpRemainder').options[document.getElementById('drpRemainder').options.selectedIndex].value=="1")
	{
	  document.getElementById('span_date2').style.display='block';
	    document.getElementById('span_date3').style.display='none';
	}
	if(document.getElementById('drpRemainder').options[document.getElementById('drpRemainder').options.selectedIndex].value=="2")
	{
		document.getElementById('span_date2').style.display='block';
	  document.getElementById('span_date3').style.display='block';
	}
	if(document.getElementById('drpRemainder').options[document.getElementById('drpRemainder').options.selectedIndex].value=="0")
	{
	  document.getElementById('span_date2').style.display='none';
	    document.getElementById('span_date3').style.display='none';
	}
}

function div_wl_clr(chkid,spanId)
{
  	if(document.getElementById(chkid).checked==true)
	 {
	  document.getElementById(spanId).style.color="red";
	  document.getElementById(spanId).innerHTML="Added to wishlist";
	  document.getElementById(spanId).style.fontSize="10px";
	  setInterval('blink()', 1000);
	 }
	else
	{
	  document.getElementById(spanId).style.color="#0066FF";
	  document.getElementById(spanId).innerHTML="Add to wishlist";
	  document.getElementById(spanId).style.fontSize="10px";
	  setInterval('show_block(\'btnsaveWL\')',300);
	}
	
 }

function div_wl_clr_none(chkid,spanId)
{
	if(document.getElementById(chkid).checked==true)
	{
	  document.getElementById(spanId).style.color="red";
	  document.getElementById(spanId).innerHTML="Added to wishlist";
	   document.getElementById(spanId).style.fontSize="10px";
	}
	else
	{
	  document.getElementById(spanId).style.color="";   
	  document.getElementById(spanId).innerHTML="Add to wishlist";
	  document.getElementById(spanId).style.fontSize="10px";
	}
}
function chgCurrency()
{
	if(document.getElementById('drplf_currency').options[document.getElementById('drplf_currency').options.selectedIndex].value=="USD")
	{
		document.getElementById('txtCurrency').value="60.42";
	}
	else if(document.getElementById('drplf_currency').options[document.getElementById('drplf_currency').options.selectedIndex].value=="POUND")
	{
		document.getElementById('txtCurrency').value="106.42";
	}
	else if(document.getElementById('drplf_currency').options[document.getElementById('drplf_currency').options.selectedIndex].value=="EURO")
	{
		document.getElementById('txtCurrency').value="86.78";
	}
}

function chg_nr_cities(drpId,id1,id2,id3,id4)
{
     if(document.getElementById(drpId).options[document.getElementById(drpId).options.selectedIndex].value=="none")
	{
		document.getElementById(id1).style.display='none';
		document.getElementById(id2).style.display='none';
		document.getElementById(id3).style.display='none';
		document.getElementById(id4).style.display='none';
	}
	if(document.getElementById(drpId).options[document.getElementById(drpId).options.selectedIndex].value=="100-200")
	{
	document.getElementById(id1).style.display='block';
		document.getElementById(id2).style.display='none';
		document.getElementById(id3).style.display='none';
		document.getElementById(id4).style.display='none';
	}
		if(document.getElementById(drpId).options[document.getElementById(drpId).options.selectedIndex].value=="200-300")
	{
		document.getElementById(id1).style.display='none';
		document.getElementById(id2).style.display='block';
		document.getElementById(id3).style.display='none';
		document.getElementById(id4).style.display='none';
	}
		if(document.getElementById(drpId).options[document.getElementById(drpId).options.selectedIndex].value=="300-400")
	{
			document.getElementById(id1).style.display='none';
		document.getElementById(id2).style.display='none';
		document.getElementById(id3).style.display='block';
		document.getElementById(id4).style.display='none';
	}
	
	if(document.getElementById(drpId).options[document.getElementById(drpId).options.selectedIndex].value=="400-500")
	{
		document.getElementById(id1).style.display='none';
		document.getElementById(id2).style.display='none';
		document.getElementById(id3).style.display='none';
		document.getElementById(id4).style.display='block';
	}
}

function displ_currLoc(val)
{
	var city = "Enter your Location";
	 var x = city;
	 city = val ;
	document.getElementById('frmCity_map_pop').value=city+", India";
}

  	  
function close_wshlst_map()
{
	document.getElementById('div_wishlst_map').style.display='none';
	document.getElementById('div_greyBack').style.display='none';
}

function close_wshlst_map_svd()
{
	document.getElementById('div_wishlst_map_svd').style.display='none';
	document.getElementById('div_greyBack').style.display='none';
	document.getElementById('map_table_All_svd').innerHTML ="";
	document.getElementById('map_table_Day1_svd').innerHTML ="";
	document.getElementById('map_table_Day2_svd').innerHTML ="";
	document.getElementById('map_table_Day3_svd').innerHTML ="";
	document.getElementById('map_table_Day4_svd').innerHTML ="";
}

function chg_hdrBtn_clr(id)
{
	document.getElementById(id).style.borderBottomColor="#FF0000";
	document.getElementById(id).style.color="#FFFFFF";
}
function rpl_hdrBtn_clr(id)
{
	document.getElementById(id).style.borderBottomColor="#0066FF";
	document.getElementById(id).style.color="#FFFFFF";
}
function show_hdr()
{
	document.getElementById('wsh_hdr').innerHTML= document.getElementById('hdr_city').innerHTML;
}

function check_page_box(id,txt)
{
	document.getElementById(id).checked = true;
	document.getElementById(txt).style.color = "#ff0000";
}
function sh_ch_cnt(id,sp)
{
	var val = document.getElementById(id).value;
	var c = 403 - val.length;
	document.getElementById(sp).innerHTML = c;
}

function chgDist(ID,WID)
{
	var dist = document.getElementById('drpshrtDist').options[document.getElementById('drpshrtDist').options.selectedIndex].value;
	window.location.href = window.location.href+"&dist="+dist+"&ID="+ID+"&WLID="+WID;
}

function open_cnt_upload(id,cate)
{
	var city = document.getElementById('hdr_city').innerHTML;
	document.getElementById(id).href="upload_cnt.php?id=jkhdj kjasdjadhkl hklshsjhfsd hslkfsh dlfksdhf shs hsfdfh sdlfsh dfsd hldskfh sdkfhsdfhsd fhsdsh hsdfhsdfsh d&city="+city+"&cate="+cate;
	document.getElementById(id).target="_blank";
}

function cate_desc_upld()
{
	 var cate_id = document.getElementById('sp_cate').innerHTML;
		 
	if(cate_id == "SHOPPING")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add street shopping, Large Malls, Unique shops ";
	else if(cate_id == "SIGHTSEEING")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Attraction for Sightseeing - Gardens, lake, high-points etc ";
	else if(cate_id == "HISTORICAL")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Attractions of historical significance - Forts, monuments etc ";
	 else if(cate_id == "FOOD-NIGHTLIFE")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add popular food joints, fine dining places, discos, Pubs, Lounge, Bars etc";
	 else if(cate_id == "RELIGIOUS")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Places of worship, Shrines, religious centers ";
	 else if(cate_id == "CULTURAL")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Art Galleries, theaters, peforming arts place";
	 else if(cate_id == "KIDS")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Kids attractions - rides, drops, activities, museums, planetorium etc ";
	 else if(cate_id == "EXCLUSIVE")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Unique events in the destination (Kala ghoda fest, Mumbai. Groundnut fair, Blr etc)";
	 else if(cate_id == "MUST SEE")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add Uniquely popular place, shops (MTR in Blr, flea Market in Goa etc)";
	 else if(cate_id == "OFFBEAT")
	  document.getElementById('sp_cate_desc_msg').innerHTML = "Add not so familiar/underbelly of the destination. (Chor Bazaar, Dhobhi Ghat in Mum)";
	   
}

function show_txt(id)
{
	document.getElementById('sp_txt').innerHTML = document.getElementById(id).value;
}

function show_txt_hr(id1,id2)
{
	document.getElementById('sp_txt').innerHTML = document.getElementById(id1).value+"Hrs : "+document.getElementById(id2).value+"Min";
}

function show_txt_exp(id1,id2,id3)
{
	var entry = document.getElementById(id1).value;
	var cam = document.getElementById(id2).value;
	var oth = document.getElementById(id3).value;
	
	var total = parseInt(entry)+parseInt(cam)+parseInt(oth);
	
	document.getElementById('sp_txt').innerHTML = "Entry Fee : "+entry+" <br/> Camera Fee : "+cam+"<br/> Other Expenses : "+oth+" <br/> Approx total expense : "+total;
}

function show_charCount()
{
	var char = document.getElementById('txt_Desc').value;
	var count = 400 - char.length;
	document.getElementById('sp_count').innerHTML = count;
}
function clrthis(id1,id2,id3,id4,id5,id6,id7,id8)
{
	document.getElementById(id1).style.background="rgb(255,55,1)";
	document.getElementById(id2).style.background="#597272";
	document.getElementById(id3).style.background="#597272";
	document.getElementById(id4).style.background="#597272";
	document.getElementById(id5).style.background="#597272";
	document.getElementById(id6).style.background="#597272";
	document.getElementById(id7).style.background="#597272";
	document.getElementById(id8).style.background="#597272";
}

function isNumber(evt) {
   evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		alert('Error : Enter only numerical value');
        return false;		
    }
    return true;
}

function valid()
{
	var x=document.getElementById('txtEmail').value;					
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");

var desc = document.getElementById('txt_Desc').value;

	if(document.getElementById('txtAttrName').value=="" || document.getElementById('txt_Desc').value=="" || document.getElementById('txt_BTV').value=="" || document.getElementById('txt_Offsea').value=="" || document.getElementById('txt_visitHrs').value=="" || document.getElementById('txt_mustVisit').value=="" || document.getElementById('txtA_blogs').value=="" || document.getElementById('txtName').value=="" || document.getElementById('txtEmail').value=="")
	{

		alert('Error : Fill All Details');
	}
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
 		 alert("Error : Not a valid e-mail address");
 			
	}
	else if(desc.length<200)
	{
		alert('Error : Enter Minimum of 200 characters in description');
	}
	else if(document.getElementById('txt_src_t').value=="" && document.getElementById('txt_src_t1').value=="" && document.getElementById('txt_src_t2').value==""  && document.getElementById('txt_src_t3').value=="" && document.getElementById('txt_src_t4').value=="")
	{
		alert('Upload minimum 1 picture');
	}
	else
	 {
		document.getElementById('div_preview').style.display="block";
		document.getElementById('div_attr').innerHTML = document.getElementById('txtAttrName').value;
	    document.getElementById('img1').src = document.getElementById('txt_src_t').value;  
	 }
}

function valid_email(id)
{
		var x=document.getElementById(id).value;					
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
 	 alert("Error : Not a valid e-mail address"); 			
	}
}

function isNumber(evt) {
   evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function toUpper(id)
{
	var val =document.getElementById(id).value;
	document.getElementById(id).value = val.toUpperCase();
}

function cal_dist()
{
	
  var LocName = document.getElementById('sp_city').innerHTML;

	var directionsService = new google.maps.DirectionsService();
	 var request_air = {
				origin:"Airport in "+LocName, 
				destination:document.getElementById('txtAttrName').value+ " in " +LocName,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request_air, function(response, status) {
			  var val =  (response.routes[0].legs[0].distance.value / 1000).toFixed(2);
			 if(val != "")
			 {
			 document.getElementById('txt_air_dist').value = val;
			 val = Math.round(val);
			 var tot_dist_minus2 = parseInt(val) - 2;
			 if(parseInt(val) == 0)
			   Total_fare =0;
			 if(tot_dist_minus2 <= 2 && tot_dist_minus2 >0)
			   Total_fare = 60;
			  else if(tot_dist_minus2 > 2)
			    Total_fare = 60 + (tot_dist_minus2 * 25); 
			  document.getElementById('txt_air_taxi').value = Total_fare;
			 }
			 else
				{
			   document.getElementById('txt_air_dist').value = 0.00;
			   document.getElementById('txt_air_taxi').value =0;
				}
			});
			
		 var request_rail = {
				origin:"Nearest Railway Station in "+LocName, 
				destination:document.getElementById('txtAttrName').value+ " in " +LocName,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request_rail, function(response, status) {
			  var val =  (response.routes[0].legs[0].distance.value / 1000).toFixed(2);
			  if(val != "")
			  {
			 document.getElementById('txt_rail_dist').value = val;
			 val = Math.round(val);
			  var tot_dist_minus2 = parseInt(val) - 2;
			  if(parseInt(val) == 0)
			   Total_fare =0;
			  if(tot_dist_minus2 <= 2 && tot_dist_minus2 >0)
			     Total_fare = 60;
			  else if(tot_dist_minus2 > 2)
			    Total_fare = 60 + (tot_dist_minus2 * 25); 
			  document.getElementById('txt_rail_taxi').value = Total_fare;
			  }
			 else
			   document.getElementById('txt_rail_dist').value = 0.00;
			});	
			
			 var request_bus = {
				origin:"Nearest Bus Stand in "+LocName, 
				destination:document.getElementById('txtAttrName').value+ " in " +LocName,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request_bus, function(response, status) {
			  var val =  (response.routes[0].legs[0].distance.value / 1000).toFixed(2);
			  if(val != "")
			  {
			 document.getElementById('txt_bus_dist').value = val;
			 val = Math.round(val);
			  var tot_dist_minus2 = parseInt(val) - 2;
			  if(parseInt(val) == 0)
			   Total_fare =0;
			 if(tot_dist_minus2 <= 2 && tot_dist_minus2 > 0)
			   Total_fare = 60;
			  else if(tot_dist_minus2 > 2)
			    Total_fare = 60 + (tot_dist_minus2 * 25);	
			  document.getElementById('txt_bus_taxi').value = Total_fare;
			  }
			 else
			   document.getElementById('txt_bus_dist').value = 0.00;
			
			});
		
}

function show_in_link(loc,cate,attr,field,cmts,name,email,visit_y,when)
{
	var cmt = document.getElementById(cmts).value;
	var mail = document.getElementById(email).value;
	var nm = document.getElementById(name).value;
 	var wen = document.getElementById(when).options[document.getElementById(when).options.selectedIndex].value;
	if(document.getElementById(visit_y).checked == true)
	     var rd = "YES";
	else 
	     var rd = "NO";

   if(cmt!="" && mail!="" && nm!="")
   {
	window.location.href = "ExploreDest_Cityscape.php?id=jkdsh ksdkjksjdfhsd jkskshsfsdshfsdhksdflksdjfklsj df dsklsdf lkskdjflskdjfkjl&p="+loc+"&c="+cate+"&a="+attr+"&f="+field+"&cm="+cmt+"&n="+nm+"&e="+mail+"&w="+wen+"&v="+rd;
   }
   else
      alert("Please enter your name and email along with the comment");
}


function isNumber(evt) {
   evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function cal_exp_w(fee, cam, oth, total)
{
 var f= document.getElementById(fee).value;
 var c = document.getElementById(cam).value;
 var o = document.getElementById(oth).value;
 
 if(f == "")
   f = 0;
 if(c=="")
  c=0;
  if(o=="")
    o=0;
 document.getElementById(total).value =parseInt(f) + parseInt(c) + parseInt(o);
}


function show_EXP_link(loc,cate,attr,field,fee,cam,oth,name,email,visit_y,when)
{	
	var cmt = document.getElementById(fee).value+"%2B"+document.getElementById(cam).value+"%2B"+document.getElementById(oth).value;
	var mail = document.getElementById(email).value;
	var nm = document.getElementById(name).value;
 	var wen = document.getElementById(when).options[document.getElementById(when).options.selectedIndex].value;
	if(document.getElementById(visit_y).checked == true)
	     var rd = "YES";
	else 
	     var rd = "NO";

   if(cmt!="" && mail!="" && nm!="")
   {
	window.location.href = "ExploreDest_Cityscape.php?id=jkdsh ksdkjksjdfhsd jkskshsfsdshfsdhksdflksdjfklsj df dsklsdf lkskdjflskdjfkjl&p="+loc+"&c="+cate+"&a="+attr+"&f="+field+"&cm="+cmt+"&n="+nm+"&e="+mail+"&w="+wen+"&v="+rd;
   }
   else
      alert("Please enter your name and email along with the comment");
}

function count_cust_rows()
{
document.getElementById('txtHtl_rows').value = document.getElementById('cust_htl').rows.length;	
//alert(document.getElementById('txtHtl_rows').value);
	document.getElementById('txtTrv_rows').value = document.getElementById('cust_trv').rows.length;
}


function ld_cust_trip_htl()
{
for(var i=0; i<arrCity.length; i++)
{ 
	var t = document.getElementById('cust_htl');
	var len = t.rows.length;
	
	var row = t.insertRow(len);
	row.setAttrbute("id","trHtl_"+len);
	
	var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute('type','text');
	 j.setAttribute('class','txtbox_tab');
	 j.setAttribute('id','txtHtl_loc_'+len);
	 j.setAttribute('name','txtHtl_loc_'+len);
	 j.style.width="90px";
	 j.style.fontSize="14px";
	 j.setAttribute('value',arrCity[i]);
	// j.onclick = function(){alert(this.id);};
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('input');
	 j.setAttribute('type','text');
	 j.setAttribute('class','txtbox_tab');
	 j.setAttribute('id','txtHtl_chkIn_'+len);
	 j.setAttribute('name','txtHtl_chkIn_'+len);
	 j.style.width="90px";
	 j.style.fontSize="14px";
	 j.onclick = function()
		{
			oDP.show(event,this.id,2);
			ShowContent('TripDates');
		}
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(2);
	 var j= document.createElement('input');
	 j.setAttribute('type','text');
	 j.setAttribute('class','txtbox_tab');
	 j.setAttribute('id','txtHtl_chkOut_'+len);
	  j.setAttribute('name','txtHtl_chkOut_'+len);
	 j.style.width="90px";
	 j.style.fontSize="14px";
	 j.onclick = function()
		{
			oDP.show(event,this.id,2);
			ShowContent('TripDates');
		}
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(3);
	 var j = document.createElement('input');
	 j.setAttribute('type','text');
	 j.setAttribute('class','txtbox_tab');
	 j.setAttribute('id','txtHtl_dur_'+len);
	 j.setAttribute('name','txtHtl_dur_'+len);	 
	 j.style.width="50px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(4);
	 var j = document.createElement('select');
	 j.add(new Option("*","*"));
	 j.add(new Option("**","**"));
	 j.add(new Option("***","***"));
	 j.add(new Option("****","*****"));
	 j.add(new Option("*****","*****"));
	 j.setAttribute('id','txtHtl_star_'+len);
	 j.setAttribute('name','txtHtl_star_'+len);
	 j.style.width="40px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(5);
	 var j = document.createElement('select');
	 j.add(new Option("Single","Single"));
	 j.add(new Option("Double","Double"));
	 j.setAttribute('id','txtHtl_occ_'+len);
	 j.setAttribute('name','txtHtl_occ_'+len);
	 j.style.width="60px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(6);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute('id','txtHtl_rooms_'+len);
	 j.setAttribute('name','txtHtl_rooms_'+len);
	 j.style.width="40px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(7);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute('id','txtHtl_extrBed_'+len);
	 j.setAttribute('name','txtHtl_extrBed_'+len);
	 j.style.width="40px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(8);
	 var j = document.createElement('select');
	 j.add(new Option("Veg","Veg"));
	 j.add(new Option("Non-Veg","Non-Veg"));
	 j.add(new Option("Jain","Jain"));
	 j.setAttribute('id','txtHtl_food_'+len);
	 j.setAttribute('name','txtHtl_food_'+len);
	j.style.width="60px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(9);
	 var j = document.createElement('input');
	 j.setAttribute('type','button');
	 j.setAttribute('class','smallbtn');
	 j.setAttribute('id','btnHtl_add_'+len);
	 j.setAttribute('value','Add');
	 j.style.width="40px";
	 j.style.fontSize="14px";
	  j.onclick = function(){ld_cust_trip_htl();}	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(10);
	 cel.setAttribute('align','center');
	 var j = document.createElement('img');
	 j.setAttribute('src','Images/closebtn.png');
	 j.setAttribute('id',len);
	 j.style.width="15px";
	 j.style.height="15px";
	 j.onclick = function(){
		 hide_block('trHtl_'+this.id);
		 };	 
	 cel.appendChild(j);
}
}

function show_preview_htl()
{
	document.getElementById('sp_prev_cities').innerHTML = document.getElementById('span_destCity').innerHTML;
	
	var tab = document.getElementById('tab_htl_prev');
	var t = document.getElementById('cust_htl');
	var len = t.rows.length;
	var indx = tab.rows.length;

if(len != indx)
{
for(var i=2; i<=len; i++)
	 {
	 var row = tab.insertRow(i);

	  var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'htl_p1'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_loc_'+i).value);
	 j.style.width="100px";	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p2'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_chkIn_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(2);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'htl_p3'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_chkOut_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 	 var cel = row.insertCell(3);
	 var j = document.createElement('input');
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p4'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_dur_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j); 
	 
	  var cel = row.insertCell(4);
	 var j = document.createElement('input');
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p5'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_star_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	  var cel = row.insertCell(5);
	 var j = document.createElement('input');
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p6'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_occ_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	  var cel = row.insertCell(6);
	 var j = document.createElement('input');
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p7'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_rooms_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	  var cel = row.insertCell(7);
	 var j = document.createElement('input');
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','htl_p8'+indx);
	 j.setAttribute("value",document.getElementById('txtHtl_extrBed_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	  var cel = row.insertCell(8);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','tdhtl8'+len);
	 j.setAttribute("value",document.getElementById('txtHtl_food_'+i).options[document.getElementById('txtHtl_food_'+indx).selectedIndex].value);
	 j.style.width="50px";
	 cel.appendChild(j);
}
}
}

function dispTrvFrmCity(val)
{
	document.getElementById('txtTrv_from_3').value = val;
	document.getElementById('drpcurcity_p').value = val;
}

function ld_cust_trip_trv()
{
for(var i=0; i<arrCity.length; i++)
{
	var t_trv = document.getElementById('cust_trv');
	var len = t_trv.rows.length;
	
	var row = t_trv.insertRow(len);
	row.setAttribute("id","trTrv_"+len);
	
	var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute("id",'txtTrv_from_'+len);
	 j.setAttribute("name",'txtTrv_from_'+len);
	 j.style.width="80px";	 
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute('id','txtTrv_to_'+len);
	 j.setAttribute("name",'txtTrv_to_'+len);
	 j.setAttribute("value",arrCity[i]);
	 j.style.width="80px";
	 j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(2);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute("id",'txtTrv_date_'+len);
	 j.setAttribute("name",'txtTrv_date_'+len);
	 j.style.width="80px";
	 j.style.fontSize="14px";
	  j.onclick = function()
		{
			oDP.show(event,this.id,2);
			ShowContent('TripDates');
		}
	 cel.appendChild(j);
	 
	 	 var cel = row.insertCell(3);
	 var j = document.createElement('select');
	 j.add(new Option("By Flight","By Flight"));
	 j.add(new Option("By Train","By Train"));
	 j.add(new Option("By Car","By Car"));
	 j.add(new Option("By Bus","By Bus"));
	 j.setAttribute("id","txtTrv_mode_"+len);
	 j.setAttribute("name",'txtTrv_mode_'+len);
	 j.style.width="60px";
	 j.style.fontSize="14px";
	 cel.appendChild(j); 
	 
	 var cel = row.insertCell(4);
	 var j = document.createElement('input');
	 j.setAttribute("type","button");
	 j.setAttribute("class","smallbtn");
	 j.setAttribute("value","Add");
	 j.setAttribute("id","btnTrv_add_"+len);
	 j.style.width="40px";
	 j.onclick = function(){ld_cust_trip_trv(); };
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(5);
	 cel.setAttribute('align','center');
	 var j = document.createElement('img');
	 j.setAttribute('src','Images/closebtn.png');
	 j.setAttribute('id',len);
	 j.style.width="15px";
	 j.style.height="15px";
	 j.style.cursor="pointer";
	 j.onclick = function(){
		 hide_block('trTrv_'+this.id);
		 };
	 cel.appendChild(j);
	
}
}


function show_preview_trv()
{
	var tab = document.getElementById('tab_trv_prev');
	var t = document.getElementById('cust_trv');
	var len = t.rows.length;
	var indx = tab.rows.length;

if(len != indx)
{
	for(var i =2; i<len; i++)
	{
		 var indx = tab.rows.length;
	   var row = tab.insertRow(indx);
	   
	  var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'trv_p1'+indx);
	 j.setAttribute("value",document.getElementById('txtTrv_from_'+i).value);
	 j.style.width="100px";	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','trv_p2'+indx);
	 j.setAttribute("value",document.getElementById('txtTrv_to_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(2);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'trv_p3'+indx);
	 j.setAttribute("value",document.getElementById('txtTrv_date_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 	 var cel = row.insertCell(3);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','trv_p4'+indx);
	 j.setAttribute("value",document.getElementById('txtTrv_mode_'+i).options[document.getElementById('txtTrv_mode_'+i).options.selectedIndex].value);
	 j.style.width="100px";
	 cel.appendChild(j); 
	   
	}
}
}



function ld_cust_trip_trvl()
{
	var dest = document.getElementById('span_destCity').innerHTML;
for(var i=0; i<arrCity.length-1; i++)
{
	var t_trvl = document.getElementById('cust_trvl');
	var len = t_trvl.rows.length;
	
	var row = t_trvl.insertRow(len);
	
	var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute("id",'txtLTrv_loc_'+len);
	 j.setAttribute("name",'txtLTrv_loc_'+len);
	 j.setAttribute("value",arrCity[i]);
	 j.style.width="80px";	
	  j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j = document.createElement('select');
	 j.add(new Option("By Car","By Car"));
	 j.add(new Option("By Taxi","By Taxi"));
	 j.setAttribute("id",'txtLTrv_mode_'+len);
	 j.setAttribute("name",'txtLTrv_mode_'+len);
	 j.style.width="60px";
	  j.style.fontSize="14px";
	 cel.appendChild(j); 
	 
	 var cel = row.insertCell(2);
	 var j =document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");	
	 j.setAttribute("id",'txtLTrv_numPasn_'+len);
	 j.setAttribute("name",'txtLTrv_numPasn_'+len);
	 j.style.width="40px";
	  j.style.fontSize="14px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(3);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute('id','txtLTrv_datefrm_'+len);
	 j.setAttribute("name",'txtLTrv_datefrm_'+len);
	 j.style.width="60px";
	  j.style.fontSize="14px";
	   j.onclick = function()
		{
			oDP.show(event,this.id,2);
			ShowContent('TripDates');
		}
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(4);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute('id','txtLTrv_dateto_'+len);
	 j.setAttribute("name",'txtLTrv_dateto_'+len);
	 j.style.width="60px";
	  j.style.fontSize="14px";
	   j.onclick = function()
		{
			oDP.show(event,this.id,2);
			ShowContent('TripDates');
		}
	 cel.appendChild(j);
}
}

function show_preview_trvlcl()
{
	var tab = document.getElementById('tab_trvl_prev');
	var t = document.getElementById('cust_trvl');
	var len = t.rows.length;
	var indx = tab.rows.length;

if(len != indx)
{
	for(var i =2; i<len; i++)
	{
		 var indx = tab.rows.length;
	   var row = tab.insertRow(indx);	  
	   
	  var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'trvl_p1'+indx);
	 j.setAttribute("value",document.getElementById('txtLTrv_loc_'+i).value);
	 j.style.width="100px";	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','trvl_p2'+indx);
	j.setAttribute("value",document.getElementById('txtLTrv_mode_'+i).options[document.getElementById('txtLTrv_mode_'+i).options.selectedIndex].value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(2);
	 var j= document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'trvl_p3'+indx);
	j.setAttribute("value",document.getElementById('txtLTrv_numPasn_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j);
	 
	 	 var cel = row.insertCell(3);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','trvl_p4'+indx);
	j.setAttribute("value",document.getElementById('txtLTrv_datefrm_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j); 
	 
	 var cel = row.insertCell(4);
	 var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','trvl_p4'+indx);
	j.setAttribute("value",document.getElementById('txtLTrv_dateto_'+i).value);
	 j.style.width="100px";
	 cel.appendChild(j); 
  }
}
}

function ld_cust_trip_req()
{
	var dest = document.getElementById('span_destCity').innerHTML;

for(var i=0; i<arrCity.length-1; i++)
{
	var t_req = document.getElementById('cust_req');
	var len = t_req.rows.length;
	
	var row = t_req.insertRow(len);
	
	var cel = row.insertCell(0);
	cel.setAttribute("align","center");
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("id","txtReq_loc_"+len);
	 j.setAttribute("name","txtReq_loc_"+len);
	 j.setAttribute("class","txtbox_tab");
	 j.setAttribute("value",arrCity[i]);
	 j.style.width="100px";	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 cel.setAttribute("align","center");
	 var j = document.createElement('textarea');
	  j.setAttribute("id","txtReq_type_"+len);
	  j.setAttribute("name","txtReq_type_"+len);
	 j.setAttribute("class","txtbox_tab");
	 j.style.width="500px";
	 j.style.height="60px";
	 cel.appendChild(j);
}

}


function show_preview_req()
{	
	var tab = document.getElementById('tab_req_prev');
	var t = document.getElementById('cust_req');
	var len = t.rows.length;
	var indx = tab.rows.length;

if(len != indx)
{
	for(var i =2; i<len; i++)
	{
	   var row = tab.insertRow(indx);
	   
	  var cel = row.insertCell(0);
	var j = document.createElement('input');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute("id",'req_p1'+indx);
	 j.setAttribute("value",document.getElementById('txtReq_loc_'+i).value);
	 j.style.width="100px";	 
	 cel.appendChild(j);
	 
	 var cel = row.insertCell(1);
	 var j =document.createElement('textarea');
	 j.setAttribute("type","text");
	 j.setAttribute("class","txtbox_Tab_brdless");
	 j.setAttribute('id','req_p2'+indx);
	 j.setAttribute("value",document.getElementById('txtReq_type_'+i).value);
	 j.style.width="500px";
	 j.style.height="60px";
	 cel.appendChild(j);
	}
	}
	
		document.getElementById('txtAdults_p').value = document.getElementById('txtAdults').value;
	document.getElementById('txtKids0_2_p').value = document.getElementById('txtKids0_2').value;
	document.getElementById('txtKids2_12_p').value = document.getElementById('txtKids2_12').value;
	document.getElementById('txtKids12abv_p').value = document.getElementById('txtKids12abv').value;
	document.getElementById('txtSenior_p').value = document.getElementById('txtSenior').value;
	
	document.getElementById('drpcurcity_p').value = document.getElementById('drpcurcity').options[document.getElementById('drpcurcity').options.selectedIndex].value;
}

function shw_brder_trvler()
{
	var tab =  document.getElementById('tab_trvler');
   document.getElementById('tab_trvler').border="1px";
   var inp = tab.getElementsByTagName('input');
   inp.setAttribute("class","txtbox_Tab");
}

function shw_brder_htl()
{
	var tab =  document.getElementById('tab_htl_prev');
   document.getElementById('tab_htl_prev').border="1px";
   var inp = tab.getElementsByTagName('input');
   inp.setAttribute("class","txtbox_Tab");
}

function shw_brder_trv()
{
	var tab =  document.getElementById('tab_trv_prev');
	document.getElementById('tab_trv_prev').border="1px";
	var inp = tab.getElementsByTagName('input');
   inp.setAttribute("class","txtbox_Tab");
}

function shw_brder_trvl()
{
	var tab =  document.getElementById('tab_trv_prev');
	 document.getElementById('tab_trvl_prev').border="1px";
	var inp = tab.getElementsByTagName('input');
   inp.setAttribute("class","txtbox_Tab");
}


function shw_brder_req()
{
	var tab =  document.getElementById('tab_trv_prev');
 document.getElementById('tab_req_prev').border="1px";
	var inp = tab.getElementsByTagName('input');
   inp.setAttribute("class","txtbox_Tab");
}

function delSvdAttr(wlid, attr, date)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tab_saved_WL").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?WLID="+wlid+"&Attr="+attr+"&deldate="+date,true);
xmlhttp.send();	
}

function svdDt(dt,wlid,attr)
{
	if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tab_saved_WL").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?dtWLID="+wlid+"&dtAttr="+attr+"&Date="+dt,true);
xmlhttp.send();	
}

function svdTime(t1,t2,wlid,attr,strtype,endtype)
{
	var tm1 = document.getElementById(t1).value;
	var tm2 = document.getElementById(t2).value;	
    var strtTp  = document.getElementById(strtype).options[document.getElementById(strtype).options.selectedIndex].value;
	var endTp  = document.getElementById(endtype).options[document.getElementById(endtype).options.selectedIndex].value;
	
	var time = tm1+"-"+strtTp+":"+tm2+"-"+endTp;
	
	if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tab_saved_WL").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?tmWLID="+wlid+"&tmAttr="+attr+"&Time="+time,true);
xmlhttp.send();	
}


function change_color(id,cty,ref,d,user,wid)
 {
  document.getElementById(id).style.background="#ff0000";
  document.getElementById(ref).href = "ExploreDest_Cityscape.php?&ID="+user+"&WLID="+wid+"&p="+cty;
  document.getElementById(ref).target = "_self";
}

function show_hotel(wl)
{
	show_block('div_cust_hotel');
	hide_block('vacation_image_btns');
 hide_block('div_attr');
 hide_block('div_maps');
 hide_block('div_custom_trip');

	if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("custHtlLoc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?showHtl=true&wlid="+wl,true);
xmlhttp.send();	
}

function load_chk_dates(loc,wlid)
{
	document.getElementById('txtcustHtlLoc').value = document.getElementById('drpcustHtlLoc').options[document.getElementById('drpcustHtlLoc').options.selectedIndex].value; 
	
		
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("cust_htl_dtls").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?chkDates=true&wlid="+wlid+"&locNm="+loc,true);
xmlhttp.send();	
}

function loadCustTrip(wlid)
{
	show_block('div_custom_trip');
		hide_block('div_cust_hotel');
	hide_block('vacation_image_btns');
 hide_block('div_attr');
 hide_block('div_maps');
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_custom_trip").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?custTripForm=true&wlid="+wlid,true);
xmlhttp.send();		
}

function showSvdMap(wlid)
{
	show_block('div_greyBack'); 
	show_block('div_wishlst_map_svd');
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_wishlst_map_svd").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?mapView=true&mapWlid="+wlid,true);
xmlhttp.send();		
}

function showNotes(wlid,attr)
{
	show_block('div_notes');
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_notes").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?Notes=true&WLID="+wlid+"&Attr="+attr,true);
xmlhttp.send();		
}

function updtNotes(wlid,attr,txtA)
{
 var Notes = document.getElementById(txtA).value;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_notes").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?Notes=true&WLID="+wlid+"&Attr="+attr+"&txtNotes="+Notes,true);
xmlhttp.send();			
}

function likeAttr(div,loc,attr,cate)
{
	show_block(div);
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_enter_email").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?Likes=true&LOC="+loc+"&ATTR="+attr+"&CATE="+cate,true);
xmlhttp.send();		
}

function checkEmlExists()
{
	var userEml = document.getElementById('txtWL_email').value;
	var loc = document.getElementById('sp_locName').innerHTML;
	document.getElementById('chkedEml').style.display='block';
//	alert(loc);
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("chkedEml").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?EmailExist=true&EmailID="+userEml+"&loc="+loc,true);
xmlhttp.send();		
}

function wrt_wl(wlid)
{
	document.getElementById('WLID_capt').value = wlid;
}

function chkLikeExists(loc,attr,id,cate)
{
	var eml = document.getElementById(id).value;
	var visit ="";
	var like = "";
	
	if(document.getElementById('rdYes').checked == true)
	 visit= document.getElementById('rdYes').value;
	else if(document.getElementById('rdNo').checked == true) 
	visit= document.getElementById('rdNo').value;
	
	if(document.getElementById('rdlike').checked == true)
	 like = document.getElementById('rdlike').value;
	else if(document.getElementById('rddislike').checked == true)
	 like = document.getElementById('rddislike').value;
	
if(window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_enter_email").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?Likes=true&LOC="+loc+"&ATTR="+attr+"&EMLID="+eml+"&cateID="+cate+"&Visit="+visit+"&LIKE="+like,true);
xmlhttp.send();		
}

function cust_home()
{
	var eml = document.getElementById('user_eml').innerHTML;
	window.open("Cust_Page.php?secure=true&email="+eml);
}

function showDayMapDay1()
{	
	 document.getElementById('map_selected_Day1_svd').style.display='block'; 	
	document.getElementById('map_selected_Day2_svd').style.display='none';
	document.getElementById('map_selected_Day3_svd').style.display='none';
	document.getElementById('map_selected_Day4_svd').style.display='none';
	
	document.getElementById('map_selected_All_svd').style.display='none';
	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_Day1_svd'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day1_svd');
var address = [];
var mark=[];
var info = [];

var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('td4_DB1_'+i).innerHTML+", "+ document.getElementById('td3_DB1_'+i).innerHTML;

			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker = new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day1.png',
              map: map
		   });
				
var contentString = '<div id="content">'+this.html+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	  maxWidth:100
  });

 google.maps.event.addListener(marker, 'click', function() {
	//infowindow.setContent(this.html);
    infowindow.open(map,this);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
}
if(t.rows.length>2)
{
for(var i=1; i<t.rows.length; i++)
{
directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('td2_DB1_'+i).innerHTML+","+document.getElementById('td3_DB1_'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('td4_DB1_1').innerHTML+","+document.getElementById('td3_DB1_1').innerHTML, 
       destination:document.getElementById('td4_DB1_'+j).innerHTML+","+document.getElementById('td3_DB1_'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
}
}
}


function showDayMapDay2()
{	
	 document.getElementById('map_selected_Day1_svd').style.display='none'; 	
	document.getElementById('map_selected_Day2_svd').style.display='block';
	document.getElementById('map_selected_Day3_svd').style.display='none';
	document.getElementById('map_selected_Day4_svd').style.display='none';
	
	document.getElementById('map_selected_All_svd').style.display='none';
	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_Day2_svd'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day2_svd');
var address = [];
var mark=[];
var info = [];

var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('td4_DB2_'+i).innerHTML+", "+ document.getElementById('td3_DB2_'+i).innerHTML;

			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker = new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day2.png',
              map: map
		   });
				
var contentString = '<div id="content">'+this.html+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	  maxWidth:100
  });

 google.maps.event.addListener(marker, 'click', function() {
	//infowindow.setContent(this.html);
    infowindow.open(map,this);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
}
if(t.rows.length>2)
{
for(var i=1; i<t.rows.length; i++)
{
directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('td2_DB2_'+i).innerHTML+","+document.getElementById('td3_DB2_'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('td4_DB2_1').innerHTML+","+document.getElementById('td3_DB2_1').innerHTML, 
       destination:document.getElementById('td4_DB2_'+j).innerHTML+","+document.getElementById('td3_DB2_'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });

}
}
}

function showDayMapDay3()
{	
	 document.getElementById('map_selected_Day1_svd').style.display='none'; 	
	document.getElementById('map_selected_Day2_svd').style.display='none';
	document.getElementById('map_selected_Day3_svd').style.display='block';
	document.getElementById('map_selected_Day4_svd').style.display='none';
	
	document.getElementById('map_selected_All_svd').style.display='none';
	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_Day3_svd'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day3_svd');
var address = [];
var mark=[];
var info = [];

var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('td4_DB3_'+i).innerHTML+", "+ document.getElementById('td3_DB3_'+i).innerHTML;

			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker = new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day3.png',
              map: map
		   });
				
var contentString = '<div id="content">'+this.html+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	  maxWidth:100
  });

 google.maps.event.addListener(marker, 'click', function() {
	//infowindow.setContent(this.html);
    infowindow.open(map,this);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});

}
if(t.rows.length>2)
{
for(var i=1; i<t.rows.length; i++)
{
directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('td2_DB3_'+i).innerHTML+","+document.getElementById('td3_DB3_'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('td4_DB3_1').innerHTML+","+document.getElementById('td3_DB3_1').innerHTML, 
       destination:document.getElementById('td4_DB3_'+j).innerHTML+","+document.getElementById('td3_DB3_'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
}
}
}

function showDayMapDay4()
{	
	 document.getElementById('map_selected_Day1_svd').style.display='none'; 	
	document.getElementById('map_selected_Day2_svd').style.display='none';
	document.getElementById('map_selected_Day3_svd').style.display='none';
	document.getElementById('map_selected_Day4_svd').style.display='block';
	
	document.getElementById('map_selected_All_svd').style.display='none';
	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_Day4_svd'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day4_svd');
var address = [];
var mark=[];
var info = [];

var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('td4_DB4_'+i).innerHTML+", "+ document.getElementById('td3_DB4_'+i).innerHTML;

			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker = new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day4.png',
              map: map
		   });
				
var contentString = '<div id="content">'+this.html+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	  maxWidth:100
  });

 google.maps.event.addListener(marker, 'click', function() {
	//infowindow.setContent(this.html);
    infowindow.open(map,this);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
}
if(t.rows.length>2)
{
for(var i=1; i<t.rows.length; i++)
{
directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('td2_DB4_'+i).innerHTML+","+document.getElementById('td3_DB4_'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('td4_DB4_1').innerHTML+","+document.getElementById('td3_DB4_1').innerHTML, 
       destination:document.getElementById('td4_DB4_'+j).innerHTML+","+document.getElementById('td3_DB4_'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
	   
}
}
}

function update_sche_map(wlid,attr,day)
{
	if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div_wishlst_map_svd").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/exploreDestAjax.php?mapWLIDup="+wlid+"&mapAttr="+attr+"&mapDay="+day,true);
xmlhttp.send();			
}

function showDayMapAll()
{	
	 document.getElementById('map_selected_Day1_svd').style.display='none'; 	
	document.getElementById('map_selected_Day2_svd').style.display='none';
	document.getElementById('map_selected_Day3_svd').style.display='none';
	document.getElementById('map_selected_Day4_svd').style.display='none';
	
	document.getElementById('map_selected_All_svd').style.display='block';
	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_All_svd'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_All_svd');
var address = [];
var mark=[];
var info = [];

var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{

 address[i] = document.getElementById('td4_DB_'+i).innerHTML+", "+ document.getElementById('td3_DB_'+i).innerHTML;

 if(document.getElementById('td2_DB_'+i).value=="SELECT")
	    {	

			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker = new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day0.png',
              map: map
		   });
				
var contentString = '<div id="content">'+this.html+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString,
	  maxWidth:100
  });

 google.maps.event.addListener(marker, 'click', function() {
	//infowindow.setContent(this.html);
    infowindow.open(map,this);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
	  } 

 else if(document.getElementById('td2_DB_'+i).value == "DAY1")
	    {	
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
            
			var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day1.png',
              map: map
		   });
			
var contentString = '<div id="content">'+res[1]+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
		 
	  }
	  
	else if(document.getElementById('td2_DB_'+i).value=="DAY2")
	  {
   			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day2.png',
              map: map
            });
			
var contentString = '<div id="content">'+res[1]+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
	  }
	  
	else if(document.getElementById('td2_DB_'+i).value=="DAY3")
	  {
		  	var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
            var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day3.png',
              map: map
            });
			
	 var info= new google.maps.InfoWindow({
           content:address[i]
  });

google.maps.event.addListener(marker, 'click', function() {
  info.open(map,marker);
  }); 
 });
	  }
	  
	else if(document.getElementById('td2_DB_'+i).value=="DAY4")
	  {
		  var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
           var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day4.png',
              map: map
            });
			
var contentString = '<div id="content">'+res[1]+'</div>';				
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

google.maps.event.addDomListener(window, 'load', initialize);
});
	  }

}

directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('td2_DB_'+i).innerHTML+","+document.getElementById('td3_DB_'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('td4_DB_1').innerHTML+","+document.getElementById('td3_DB_1').innerHTML, 
       destination:document.getElementById('td4_DB_'+j).innerHTML+","+document.getElementById('td3_DB_'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
	 
	 document.getElementById('td5_DB_1').innerHTML=0;
		
 var directionsService = new google.maps.DirectionsService();
 
 var request1 = {
				origin:document.getElementById('td4_DB_1').innerHTML+","+document.getElementById('td3_DB_1').innerHTML, 
				destination:document.getElementById('td4_DB_2').innerHTML+","+document.getElementById('td3_DB_2').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request1, function(response, status) {
				document.getElementById('td5_DB_2').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
 var request2 = {
				origin:document.getElementById('td4_DB_2').innerHTML+","+document.getElementById('td3_DB_2').innerHTML, 
				destination:document.getElementById('td4_DB_3').innerHTML+","+document.getElementById('td3_DB_3').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request2, function(response, status) {
				document.getElementById('td5_DB_3').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
			
 var request3 = {
				origin:document.getElementById('td4_DB_3').innerHTML+","+document.getElementById('td3_DB_3').innerHTML, 
				destination:document.getElementById('td4_DB_4').innerHTML+","+document.getElementById('td3_DB_4').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request3, function(response, status) {
				document.getElementById('td5_DB_4').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
 var request4 = {
				origin:document.getElementById('td4_DB_4').innerHTML+","+document.getElementById('td3_DB_4').innerHTML, 
				destination:document.getElementById('td4_DB_5').innerHTML+","+document.getElementById('td3_DB_5').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request4, function(response, status) {
				document.getElementById('td5_DB_5').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});			
 var request5 = {
				origin:document.getElementById('td4_DB_5').innerHTML+","+document.getElementById('td3_DB_5').innerHTML, 
				destination:document.getElementById('td4_DB_6').innerHTML+","+document.getElementById('td3_DB_6').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request5, function(response, status) {
				document.getElementById('td5_DB_6').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
		 var request6 = {
				origin:document.getElementById('td4_DB_6').innerHTML+","+document.getElementById('td3_DB_6').innerHTML, 
				destination:document.getElementById('td4_DB_7').innerHTML+","+document.getElementById('td3_DB_7').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request6, function(response, status) {
				document.getElementById('td5_DB_7').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
			
			 var request7 = {
				origin:document.getElementById('td4_DB_7').innerHTML+","+document.getElementById('td3_DB_7').innerHTML, 
				destination:document.getElementById('td4_DB_8').innerHTML+","+document.getElementById('td3_DB_8').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request7, function(response, status) {
				document.getElementById('td5_DB_8').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
			
			 var request8 = {
				origin:document.getElementById('td4_DB_8').innerHTML+","+document.getElementById('td3_DB_8').innerHTML, 
				destination:document.getElementById('td4_DB_9').innerHTML+","+document.getElementById('td3_DB_9').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request8, function(response, status) {
				document.getElementById('td5_DB_9').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
			
			 var request9 = {
				origin:document.getElementById('td4_DB_9').innerHTML+","+document.getElementById('td3_DB_9').innerHTML, 
				destination:document.getElementById('td4_DB_10').innerHTML+","+document.getElementById('td3_DB_10').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request9, function(response, status) {
				document.getElementById('td5_DB_10').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
			
			 var request10 = {
				origin:document.getElementById('td4_DB_10').innerHTML+","+document.getElementById('td3_DB_10').innerHTML, 
				destination:document.getElementById('td4_DB_11').innerHTML+","+document.getElementById('td3_DB_11').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request10, function(response, status) {
				document.getElementById('td5_DB_11').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});
}

