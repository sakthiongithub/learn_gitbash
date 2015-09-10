
function Show_Block1_onclick()
{    
  document.getElementById('block1').style.display='block';
  document.getElementById('block2').style.display='none';
  document.getElementById('div_BookTravel').style.display='none';
 }

function Show_Block2_onclick()
{
  document.getElementById('block2').style.display='block';
   document.getElementById('block1').style.display='none';
   document.getElementById('div_BookTravel').style.display='none';
}

function Show_Block3_onclick()
{
 document.getElementById('block2').style.display='none';
   document.getElementById('block1').style.display='none';
   document.getElementById('div_BookTravel').style.display='block';
}

function Show_Block1()
{
 document.getElementById('block1').style.display='block';
  document.getElementById('back_img').style.display='none';
  document.getElementById('block2').style.display='none';
}

function Show_Block2()
{
	document.getElementById('block2').style.display='block';
   document.getElementById('back_img').style.display='none';
     document.getElementById('block1').style.display='none';
}


function Hide_Block1()
{   
  document.getElementById('block1').style.display='none'; 
}

function Hide_Block2()
{
  document.getElementById('block2').style.display='none';
}

function show_CustomerCare()
{
   document.getElementById('C_care_text_hidden').style.visibility='visible';   
}

function hide_CustomerCare()
{
    document.getElementById('C_care_text_hidden').style.visibility='hidden'; 
}

function div_showMore()
{
document.getElementById('div_more').style.display='none';
document.getElementById('span_more').innerHTML = "Less";
}

function div_hideMore()
{
document.getElementById('div_more').style.display='none';
document.getElementById('span_more').innerHTML = "More";
}




function show_box_trv()
{
	document.getElementById('div_box_cCity').style.display='block';
	var cCity= document.getElementById('txtcCity').value;
	document.getElementById('_cCity').innerHTML=cCity;
	document.getElementById('div_collectInputs').style.display ='block';
	document.getElementById('div_box_country').style.display ='block';	
	if(document.getElementById('rdIndia').checked==true)
	{
		     document.getElementById('_country').innerHTML="India";
			 document.getElementById('div_nums').style.display='none';
	}
	 else 
	 {
	     document.getElementById('_country').innerHTML="Abroad";
		 document.getElementById('div_nums').style.display='none';
	 }
}

function show_box_mode()
{
	document.getElementById('div_box_mode').style.display='block';
	if(document.getElementById('rdRoad').checked==true)
			document.getElementById('_mode').innerHTML="Road";
//if(document.getElementById('rdTrain').checked==true)
			//document.getElementById('_mode').innerHTML="Train";		
	if(document.getElementById('rdFlight').checked==true)
			document.getElementById('_mode').innerHTML="Air";
//	if(document.getElementById('rdSea').checked==true)
		//	document.getElementById('_mode').innerHTML="Sea";
}

function show_box_traveller()
{
	document.getElementById('div_box_traveller').style.display='block';
	if(document.getElementById('rdSingle').checked==true)
	{
		document.getElementById('div_kids').style.display='none';
		document.getElementById('_travellerHdr').innerHTML="I am travelling&nbsp;";
	   document.getElementById('_traveller').innerHTML="Single";
	   document.getElementById('div_your_Age').style.display='block';
	   if(document.getElementById('rdage45').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45').value;
	   if(document.getElementById('rdage45plus').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45plus').value;	 
	}
	if(document.getElementById('rdCouple').checked==true)
	{
	document.getElementById('div_kids').style.display='none';
	document.getElementById('_travellerHdr').innerHTML="Travelling with my&nbsp;";
	   document.getElementById('_traveller').innerHTML="spouse/partner";
	     document.getElementById('div_your_Age').style.display='block';
		  if(document.getElementById('rdage45').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45').value;
	   if(document.getElementById('rdage45plus').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45plus').value;	
	}
	if(document.getElementById('rdGroup').checked==true)
	{
		document.getElementById('div_kids').style.display='none';
	document.getElementById('_travellerHdr').innerHTML="Travelling with&nbsp;";
	   document.getElementById('_traveller').innerHTML="Group";
	   if(document.getElementById('rdage45').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45').value;
	   if(document.getElementById('rdage45plus').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage45plus').value;
		 if(document.getElementById('rdage60plus').checked == true)
	     document.getElementById('_traveller').innerHTML += document.getElementById('rdage60plus').value;
	    document.getElementById('div_your_Age').style.display='none';
	}
	   
	if(document.getElementById('rdFamilykid').checked==true)
	{ 
		document.getElementById('div_your_Age').style.display='none';
		document.getElementById('div_kids').style.display='block';
		 document.getElementById('_traveller').innerHTML="Family+Kids: ";
		document.getElementById('_travellerHdr').innerHTML="Travelling with&nbsp;";
		if(document.getElementById('chkkid').checked==true)
		   document.getElementById('_traveller').innerHTML +="0-2yrs, ";
		if(document.getElementById('chkchild').checked==true)
		   document.getElementById('_traveller').innerHTML +="2-12yrs, ";
		if(document.getElementById('chkchildplus').checked==true)
		   document.getElementById('_traveller').innerHTML +="12+yrs, ";
	}
	if(document.getElementById('rdGroupkid').checked==true)
	{
		 document.getElementById('div_your_Age').style.display='none';
      document.getElementById('div_kids').style.display='block';
	  document.getElementById('_traveller').innerHTML ="Group+Kids: ";
	  document.getElementById('_travellerHdr').innerHTML="Travelling with&nbsp;";
	  	if(document.getElementById('chkkid').checked==true)
		   document.getElementById('_traveller').innerHTML +="0-2yrs, ";
		if(document.getElementById('chkchild').checked==true)
		   document.getElementById('_traveller').innerHTML +="2-12yrs, ";
		if(document.getElementById('chkchildplus').checked==true)
		   document.getElementById('_traveller').innerHTML +="12+yrs, ";
	}
}

function show_box_dur()
{
	document.getElementById('div_box_Dur').style.display='block';
if(document.getElementById('rdIndia').checked == true)
{
	var tripDur=document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value;
if(document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value == "Weekend" || document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value == "3Days")
			{
				document.getElementById('_tripDurHdr').innerHTML = "It's a&nbsp;";
				document.getElementById('_tripDur').innerHTML= tripDur +"&nbsp;vacation";
				document.getElementById('div_confirmBtn').style.display='block';
			    document.getElementById('div_Loc').style.display='none';
				document.getElementById('nextbtn').style.display='block';
			}
else
{
	document.getElementById('_tripDurHdr').innerHTML = "want to go for&nbsp; ";
				document.getElementById('_tripDur').innerHTML= tripDur+"&nbsp;vacation";
				document.getElementById('div_Loc').style.display='block';
				document.getElementById('nextbtn').style.display='none';
			    document.getElementById('div_confirmBtn').style.display='none';
	}
}
else
{
	var tripDur=document.getElementById('drptime_abr').options[document.getElementById('drptime_abr').options.selectedIndex].value;
	document.getElementById('_tripDurHdr').innerHTML = "It's a&nbsp;";
	document.getElementById('_tripDur').innerHTML= tripDur+"&nbsp;vacation";
}
}

function show_box_Singleloc()
{
	document.getElementById('div_box_locType').style.display ='block';	
		document.getElementById('_locTypeHdr').innerHTML="Happy with&nbsp;";
	     document.getElementById('_locType').value = "Single Location";

}
function show_box_Multiloc()
	 {
		 document.getElementById('div_box_locType').style.display ='block';	
		 document.getElementById('_locTypeHdr').innerHTML="Want to go&nbsp;";
	     document.getElementById('_locType').value = "Multiple Locations";
	 }
	

function show_box_locNum()
{
	document.getElementById('div_box_locNum').style.display ='block';	
	 show_block('div_sugLoc');
	var locNum= document.getElementById('drpNum').options[document.getElementById('drpNum').options.selectedIndex].value;
	document.getElementById('_locNum').innerHTML = locNum + "&nbsp;locations";	
}

function show_box_prefCity_Single()
{
	document.getElementById('div_box_prefCity').style.display='block';	
	hide_block('div_box_locNum');
	  show_block('span_thanku');
	  show_block('div_confirmBtn'); 
	  hide_block('q_pref_loc');
	  if(document.getElementById('chk_qcnSiglLoc').checked == true)
	  {
		 document.getElementById('_prefCity_Hdr').innerHTML = "I am okay with QCN suggested destinations";
	  }
	  else
	  {
	  var pcity=document.getElementById('drpPrefCity_Single').value;
	  document.getElementById('_prefCity_Hdr').innerHTML =  "My preferred city is &nbsp";
	  document.getElementById('_prefCity').value = pcity; 
	  }
}

function show_box_prefCity()
{
	document.getElementById('div_box_prefCity').style.display='block';
	if(document.getElementById('chk_qcnLoc').checked == true)
	{
		document.getElementById('_prefCity_Hdr').innerHTML ="I am okay with QCN suggested destinations";
	}
}

function check_nxtbtn()
{
if(document.getElementById('span_quest').innerHTML == document.getElementById('span_thanku').innerHTML)	
{
  document.getElementById('nextbtn').style.display='none';
   document.getElementById('backBtn').style.display='none';
  document.getElementById('span_LetsBegin').style.display='none';
}
}
// change the selection on click...

function change_cCity()
{
	show_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
	   }
	  
}

function change_prefTravel()
{
	 hide_block('q_ccty');
	show_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
	   }
}
function change_travellers()
{
	 hide_block('q_ccty');
	hide_block('q_mode');
	show_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
	   }
}
function change_tripDur()
{
	 hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	       hide_block('q_abr_dur');
		   	show_block('q_dur');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
		   show_block('q_abr_dur');
		   	hide_block('q_dur');
	   }
}
function change_locType()
{
	 hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	       hide_block('q_abr_dur');
		   	show_block('q_dur');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
		   show_block('q_abr_dur');
		   	hide_block('q_dur');
	   }
}
function change_locNum()
{
	hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	show_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
	   }
}
function change_prefLoc()
{
	 hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	   {
		   show_block('div_confirmBtn');
		   hide_block('div_confirmBtn_abr');
	       hide_block('q_abr_dur');
		   	show_block('q_dur');
	   }
	else
	   {
		   hide_block('div_confirmBtn');
		   show_block('div_confirmBtn_abr');
		   show_block('q_abr_dur');
		   	hide_block('q_dur');
	   }
}
/*function change_package()
{
	document.getElementById('span_quest').innerHTML=document.getElementById('span_pack').innerHTML;
	document.getElementById('span_ans').innerHTML=document.getElementById('div_acc').innerHTML;	
} */
function change_bg_inputs()
{
	document.getElementById('div_box_country').style.background="lightgrey";
	document.getElementById('div_box_cCity').style.background="lightgrey";
	document.getElementById('div_box_mode').style.background="lightgrey";
	document.getElementById('div_box_traveller').style.background="lightgrey";
	document.getElementById('div_box_Dur').style.background="lightgrey";
	document.getElementById('div_box_locType').style.background="lightgrey";
	document.getElementById('div_box_locNum').style.background="lightgrey";
	document.getElementById('div_box_prefCity').style.background="lightgrey";
	//document.getElementById('div_box_Package').style.background="grey";
}

function change_bgcolor(id, id1, id2)
{
	document.getElementById(id).style.color="#fff";
	document.getElementById(id).style.background="rgb(255,55,1)";
	document.getElementById(id1).style.color="#888";
	document.getElementById(id1).style.background="#ddd";
	document.getElementById(id2).style.color="#888";
	document.getElementById(id2).style.background="#ddd";

}

function change_bgcolor_cust(id, id1, id2)
{
	document.getElementById(id).style.color="#ffff00";
	document.getElementById(id1).style.color="#fff";	
	document.getElementById(id2).style.color="#fff";

}

function none(id, id1, id2)
{
	document.getElementById(id).style.color="";
	document.getElementById(id1).style.color="";
	document.getElementById(id2).style.color="";
}

function show_dropdown()
{
	document.getElementById('imgDown').src="Images/dropdown_arrow_icon.png";
	document.getElementById('div_places').style.display='block';
}

function show_dest1()
{
			Show_Block1_onclick();
		change_bgcolor('div_PlanTrip','div_Explore','div_Book');
		
		document.getElementById('header_buttons').style.display='block';
		document.getElementById('body_header_btn_1s').style.display='block';
		document.getElementById('body_header_btn_2s').style.display='none';
		document.getElementById('body_header_btn_3s').style.display='none';
		document.getElementById('frntPage').style.display='none';
	
}

function show_dest2()
{
	
		Show_Block2_onclick();
		change_bgcolor('div_Explore2','div_PlanTrip2','div_Book2');
		
		document.getElementById('header_buttons').style.display='block';
		document.getElementById('body_header_btn_2s').style.display='block';
		document.getElementById('body_header_btn_1s').style.display='none';
		document.getElementById('body_header_btn_3s').style.display='none';
		
		document.getElementById('frntPage').style.display='none';
	
}

function show_dest3()
{
	
		Show_Block3_onclick();
		change_bgcolor('div_Book3','div_PlanTrip3','div_Explore3');
		
		document.getElementById('header_buttons').style.display='block';
		document.getElementById('body_header_btn_3s').style.display='block';
		document.getElementById('body_header_btn_1s').style.display='none';
		document.getElementById('body_header_btn_2s').style.display='none';
		
		document.getElementById('frntPage').style.display='none';
	
}

function show_Partn()
{
	document.getElementById('hrefPartn_reg').href = "CreatePackTool.php?id=lksdfj lksjdflksjd flsjflksdjflksj lksjflskfj lskdjfsjfsdkfjsdlkfjslk lsdflsdjf lksjfslkfjsdklfjsdlkfjsldkfjsldk lsdjflksdj lskdjflks sdf&status=Register";
}

function show_partn_log()
{
	document.getElementById('hrefPartn_log').href = "CreatePackTool.php?id=lksdfj lksjdflksjd flsjflksdjflksj lksjflskfj lskdjfsjfsdkfjsdlkfjslk lsdflsdjf lksjfslkfjsdklfjsdlkfjsldkfjsldk lsdjflksdj lskdjflks sdf&status=Login";
}

function show_Cust()
{
	document.getElementById('hrefCust_reg').href = "Cust_Page.php?id=lksdfj lksjdflksjd flsjflksdjflksj lksjflskfj lskdjfsjfsdkfjsdlkfjslk lsdflsdjf lksjfslkfjsdklfjsdlkfjsldkfjsldk lsdjflksdj lskdjflks sdf&status=Register";
}

function show_cust_log()
{
	document.getElementById('hrefCust_log').href = "Cust_Page.php?id=lksdfj lksjdflksjd flsjflksdjflksj lksjflskfj lskdjfsjfsdkfjsdlkfjslk lsdflsdjf lksjfslkfjsdklfjsdlkfjsldkfjsldk lsdjflksdj lskdjflks sdf&status=Login";
}

function chkDur_len()
{
	if(document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value == "Weekend" || document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value == "3Days")
	{
	  document.getElementById('div_confirmBtn').style.display = 'block';
	  document.getElementById('q_loc_type').style.display='none';
	}
	else
	{
		document.getElementById('div_confirmBtn').style.display = 'none';
	  document.getElementById('q_loc_type').style.display='block';
	}
}



function chkInAbr_mode()
{
	hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');

	if(document.getElementById('rdIndia').checked == true)
	{
		show_block('q_mode');
		hide_block('q_trvler');
	}
	else if(document.getElementById('rdAbroad').checked == true)
	{
		show_block('q_trvler');
		hide_block('q_mode');
	}
}

function chkInd_mode()
{
	hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	{
		show_block('q_mode');
		hide_block('q_trvler');
	}
	else if(document.getElementById('rdAbroad').checked == true)
	{
		show_block('q_ccty');
		hide_block('q_mode');
	}
}

function chkInAbr_dur()
{
	hide_block('q_ccty');
	hide_block('q_mode');
	hide_block('q_trvler');
	hide_block('q_abr_dur');
	hide_block('q_dur');
	hide_block('q_pref_loc');
	hide_block('q_multi_locs');
	hide_block('span_thanku');
	if(document.getElementById('rdIndia').checked == true)
	{
		show_block('q_dur');
		hide_block('q_abr_dur');
	}
	else if(document.getElementById('rdAbroad').checked == true)
	{
		show_block('q_abr_dur');
		hide_block('q_dur');
	}
}

function chkDest()
{
if(document.getElementById('chk_qcnLoc').checked == true)
	{
		show_block('span_thanku'); 
		show_block('div_confirmBtn');
		hide_block('q_multi_locs');
	}
	else if(document.getElementById('txtPref_multiLoc').value =="")
	{
		hide_block('span_thanku');
		hide_block('div_confirmBtn');
		show_block('q_multi_locs');
		show_block('div_sel_loc');
		alert('Error : Please select locations');
	}	
	else
	{
		show_block('span_thanku'); 
		show_block('div_confirmBtn');
		hide_block('q_multi_locs');
	}
}