function show_CustomerCare()
{
  document.getElementById('C_care_text_hidden').style.visibility='visible';
}

function showEml()
{
	document.getElementById('Sp_eml').innerHTML = document.getElementById('txtTrvlEml').value;
}

function hide_CustomerCare()
{  
  document.getElementById('btnCustomer').style.background='#002929';
  document.getElementById('C_care_text_hidden').style.visibility='hidden';
}

function Change_Color()
{
   document.getElementById('btnCustomer').style.background='#002929';
}
function close_Iter()
{
	document.getElementById('div_greyBack').style.display='none';
	document.getElementById('div_IternaryDays').style.display='none';
}

function ValidateEml()
 {
 var email = document.getElementById('txtTrvlEml').value;
   var atpos=email.indexOf("@");
 var dotpos=email.lastIndexOf(".");

 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
   {
   alert("Not a valid e-mail address");
   document.getElementById('email').color="red";
   return false;
   } 
 }

function popup()
{	
 var blocks= "document.getElementById('div_some_more').style.display='block'";
	var waitFor = 5000;	
	setTimeout(blocks,waitFor);	
}

function goBack()
{
	window.back();
}
function show_nextOpts()
{
		document.getElementById('option3').style.display='block';
	document.getElementById('option3_content').style.display='block';
	document.getElementById('div_some_more').style.display='none';
    document.getElementById('div_scroll').style.overflowY='scroll';
}

function display_popup()
{
	show_block('div_9opt'); hide_block('div_6opt'); hide_block('div_some_more');
   var block1="document.getElementById('div_moreOptions').style.display='block'";
	var block2="document.getElementById('body_header_btn').style.display='none'";
	var block3="document.getElementById('div_greyBack').style.display='block'";
	
	var delay=5000;

    setTimeout(block1,delay);
	setTimeout(block2,delay);
	setTimeout(block3,delay);
 
}  

function show_val(val)
{
	alert(val);
}

 function Show_All_Option()
 {
	 show_block('package_database');
	  hide_block('div_6opt');
	 hide_block('div_9opt');
	 document.getElementById('div_scroll').style.display='none';
	 document.getElementById('div_greyBack').style.display='none';
	 document.getElementById('body_header_btn').style.display='block';
	 document.getElementById('span_header').innerHTML="All Vacation Types";
 }
function close_popup()
{
	//document.getElementById('Refine_Search').style.display='none';
	document.getElementById('div_moreOptions').style.display='none';
	document.getElementById('div_greyBack').style.display='none';
	document.getElementById('body_header_btn').style.display='block';
} 

function show_RecommendBox()
{
	document.getElementById('Recommend_box').style.display='block';
}

function close_recommend()
{
	document.getElementById('Recommend_box').style.display='none';
}

function Show_Edits()
{
	document.getElementById('editcCity').style.visibility='visible';
	document.getElementById('editMode').style.visibility='visible';
	document.getElementById('editTraveller').style.visibility='visible';
	document.getElementById('editDuration').style.visibility='visible';
	document.getElementById('editLoc').style.visibility='visible';
	document.getElementById('editCity').style.visibility='visible';
	document.getElementById('editAcc').style.visibility='visible';
}


function close_package()
{
	document.getElementById('package_sec').style.display='none';
}


function remove_back_inputs()
{
	document.getElementById('left_inputs').style.display='none';
}

function show_inputs_again()
{
	document.getElementById('left_inputs').style.display='block';
}


function div_white(id,chk)
{
	if(document.getElementById(chk).checked == true)
	{
	document.getElementById(id).style.background="#ff0000";
	document.getElementById(id).style.color="#fff";
	}
	else if(document.getElementById(chk).checked == false)
	{
	document.getElementById(id).style.background="#F5F5F5";
	document.getElementById(id).style.color="#B22222";
	}
}
function div_green(id,chk)
{
	if(document.getElementById(chk).checked == true)
	{
		document.getElementById(id).style.background="#ff0000";
	document.getElementById(id).style.color="#fff";
	}
	else if(document.getElementById(chk).checked == false)
	{
	document.getElementById(id).style.background="#002929";
	document.getElementById(id).style.color="white";
    }
}


function bright(img)
{
	document.getElementById(img).style.opacity=1;
}

function show_list_Packages(blk,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10,img11,img12,img13,img14,img15,img16,img17,img18)
{
	document.getElementById(blk).style.display='block';
	document.getElementById(img1).style.display='none';
	document.getElementById(img2).style.display='none';
	document.getElementById(img3).style.display='none';
	document.getElementById(img4).style.display='none';
	document.getElementById(img5).style.display='none';
	document.getElementById(img6).style.display='none';
	document.getElementById(img7).style.display='none';
	document.getElementById(img8).style.display='none';
	document.getElementById(img9).style.display='none';
	document.getElementById(img10).style.display='none';
	document.getElementById(img11).style.display='none';
	document.getElementById(img12).style.display='none';
	document.getElementById(img13).style.display='none';
	document.getElementById(img14).style.display='none';
	document.getElementById(img15).style.display='none';
	document.getElementById(img16).style.display='none';
	document.getElementById(img17).style.display='none';
	document.getElementById(img18).style.display='none';
}

function display_pics(id,block1)
{
	if(document.getElementById(id).checked==true)
	   {
		   document.getElementById(block1).style.display='block'; 
		 document.getElementById('content').style.display='none';		
	  }
	 else
	  {
	     document.getElementById(block1).style.display='none'; 
	  }
		if(document.getElementById('chAct').checked==false && document.getElementById('chkSight').checked==false && document.getElementById('chkRest').checked==false)
	 {
		 document.getElementById('content').style.display='block';
	 }  
}

function water_actv(id,div)
{
	if(document.getElementById(id).checked == true)
	  document.getElementById(div).style.display='block';
}

function display_pics_txt(id,block1)
{
if(document.getElementById(id).checked==false)
	   {
		   document.getElementById(id).checked= true;
		   document.getElementById(block1).style.display='block'; 
		 document.getElementById('content').style.display='none';
		
	  }
	 else
	  {
		  document.getElementById(id).checked=false;
	     document.getElementById(block1).style.display='none'; 
		  document.getElementById('content').style.display='block';
	  }
	  
 if(document.getElementById('chAct').checked==false && document.getElementById('chkSight').checked==false && document.getElementById('chkRest').checked==false)
	 {
		 document.getElementById('content').style.display='block';
	 }


}
function check_none()
{
		  
 if(document.getElementById('chkLand').checked==false && document.getElementById('chkWater').checked==false && document.getElementById('chkSky').checked==false && document.getElementById('chkMountain').checked==false && document.getElementById('chkForest').checked==false)	
	  {
		   document.getElementById('content').style.display='block';
	  }
}



function enable_domes()
{
	document.getElementById('rdIndia').disabled= false;
	document.getElementById('rdAbroad').disabled= false;
	document.getElementById('drpcCity').disabled= false;
	document.getElementById('rdRoad').disabled= false;
	//document.getElementById('rdTrain').disabled= false;
	document.getElementById('rdAir').disabled= false;
	//document.getElementById('rdSea').disabled= false;
	document.getElementById('rdSingle').disabled= false;
	document.getElementById('rdCouple').disabled= false;
	document.getElementById('rdGroup').disabled= false;
	document.getElementById('rdFamilykid').disabled= false;
	document.getElementById('rdGroupkid').disabled= false;
	document.getElementById('chkkid').disabled= false;
	document.getElementById('chkchild').disabled= false;
	document.getElementById('chkchildplus').disabled= false;
	document.getElementById('drpDur').disabled= false;
	document.getElementById('drploc').disabled= false;
	document.getElementById('drpNum').disabled= false;

}

function enable_abr()
{
	document.getElementById('rdIndia_abr').disabled= false;
	document.getElementById('rdAbroad_abr').disabled= false;
	document.getElementById('txtcCity').disabled= false;
	document.getElementById('rdSingle_abr').disabled= false;
	document.getElementById('rdCouple_abr').disabled= false;
	document.getElementById('rdGroup_abr').disabled= false;
	document.getElementById('rdFamilykid_abr').disabled= false;
	document.getElementById('rdGroupkid_abr').disabled= false;
	document.getElementById('chkkid_abr').disabled= false;
	document.getElementById('chkchild_abr').disabled= false;
	document.getElementById('chkchildplus_abr').disabled= false;
	document.getElementById('drpDur_abr').disabled= false;
}

function chk_locTyp(val)
{
 if(val == "Single Location")
 {
	document.getElementById('tr_singl_loc').style.display='table-row';
	document.getElementById('tr_mult_loc_num').style.display='none';
   document.getElementById('tr_mult_loc').style.display='none';
 }
 else if(val == "Multiple Locations")
  {
	  document.getElementById('tr_mult_loc_num').style.display='table-row';
	  document.getElementById('tr_mult_loc').style.display='table-row';
	  document.getElementById('tr_singl_loc').style.display='none';
  }
}

function chooseVal(id,val)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('txtAlocs').value += val+", ";
	}
	else if(document.getElementById(id).checked == false)
	{
		var str1 = new Array();
		var str = document.getElementById('txtAlocs').value;
		var spl = val+", ";
		str1 = str.split(spl);
		if(str1[0]!=undefined && str1[1]!=undefined)
		document.getElementById('txtAlocs').innerHTML = str1[0]+str1[1];
		else
		document.getElementById('txtAlocs').innerHTML="";
	}
}

function validate_email(id)
{
	if(document.getElementById(id).value=="")
	  alert('Enter your email id');
	else
	{
	  hide_block('div_CustomForm');
	  show_block('div_CustomThanku');
	}
}

function show_block(id)
{
	document.getElementById(id).style.display='block';
}

function hide_block(id)
{
	document.getElementById(id).style.display='none';
}

function show_tr_sngl(id)
{
	document.getElementById(id).style.display='table-row';
}


function show_tr(id1,id2,id3,id4,id5,id6)
{
	document.getElementById(id1).style.display='table-row';
	document.getElementById(id2).style.display='table-row';
	document.getElementById(id3).style.display='table-row';
	document.getElementById(id4).style.display='table-row';
	document.getElementById(id5).style.display='table-row';
	document.getElementById(id6).style.display='table-row';
}
function hide_tr(id1,id2,id3,id4,id5,id6)
{
	document.getElementById(id1).style.display='none';
	document.getElementById(id2).style.display='none';
	document.getElementById(id3).style.display='none';
	document.getElementById(id4).style.display='none';
	document.getElementById(id5).style.display='none';
	document.getElementById(id6).style.display='none';
}

function btnExpand_onclick(id)
{
	document.getElementById(id).src="Images/collapse_icon_up.png";
}
function btnCollapse_ondblclick(id)
{
	document.getElementById(id).src="Images/expand_icon.png";
}
function change_font_color_grid(id,id1,img1,img2)
{
	document.getElementById(id).style.color="Red";
	document.getElementById(id1).style.color="";
	document.getElementById(img1).src="Images/gridView_red.png";
	document.getElementById(img2).src="Images/listView.png";
}
function change_font_color_list(id,id1,img1,img2)
{
	document.getElementById(id).style.color="Red";
	document.getElementById(id1).style.color="";
	document.getElementById(img1).src="Images/listView_red.png";
	document.getElementById(img2).src="Images/gridView.png";
}
function div_chk_clr(chkid,spanId)
{
  	if(document.getElementById(chkid).checked==true)
	 {
	  document.getElementById(spanId).style.color="red";
	  document.getElementById(spanId).innerHTML="Added to wishlist";
	 }
	else
	{
	  document.getElementById(spanId).style.color=""; 
	  document.getElementById(spanId).innerHTML="Add to wishlist";
	}
 }


function chng_left_font_clr_onclick(main,f1,f2,f3,f4,f5,f6,f7,f8,f9,f10,f11,f12,f13,f14,f15,f16,f17,f18)
{
	document.getElementById(main).style.background="red";
	document.getElementById(f1).style.background="#444444";
	document.getElementById(f2).style.background="#444444";
	document.getElementById(f3).style.background="#444444";
	document.getElementById(f4).style.background="#444444";
	document.getElementById(f5).style.background="#444444";
	document.getElementById(f6).style.background="#444444";
	document.getElementById(f7).style.background="#444444";
	document.getElementById(f8).style.background="#444444";
	document.getElementById(f9).style.background="#444444";
	document.getElementById(f10).style.background="#444444";
	document.getElementById(f11).style.background="#444444";
	document.getElementById(f12).style.background="#444444";
	document.getElementById(f13).style.background="#444444";
	document.getElementById(f14).style.background="#444444";
	document.getElementById(f15).style.background="#444444";
	document.getElementById(f16).style.background="#444444";
	document.getElementById(f17).style.background="#444444";
	document.getElementById(f18).style.background="#444444";
}
function show_table_row(chkId,id,disId)
{
	document.getElementById(disId).style.display='none';
	if(document.getElementById(chkId).checked==true)
	document.getElementById(id).style.display="table-row";
	else
	document.getElementById(id).style.display="none";
}
function show_trs(id)
{
	document.getElementById(id).style.display="table-row";
}
function hide_trs(id)
{
	document.getElementById(id).style.display='none';
}
function reduce_width(id)
{
	document.getElementById(id).style.height="600px";
}

function disp_kn_dt(dt1,dt2)
{
 var frmDt = document.getElementById(dt1).value;
 var toDt = document.getElementById(dt2).value;
 document.getElementById('sp_trvDate').innerHTML = "From:&nbsp;"+frmDt+"&nbsp;To:&nbsp;"+toDt;
 document.getElementById('div_pg_Dt').style.background="#FFFFCC";
}

function disp_unkn_Dt()
{
	var appDt = document.getElementById('drp_SelDt').options[document.getElementById('drp_SelDt').options.selectedIndex].value;
	if(document.getElementById('drp_SelDt').options[document.getElementById('drp_SelDt').options.selectedIndex].value=="mm/yyyy")
	{
		document.getElementById('sp_trvDate').innerHTML = "";
	}
	else
	{
	 document.getElementById('sp_trvDate').innerHTML = appDt;
	}
	  document.getElementById('div_pg_Dt').style.background="#FFFFCC";
}

var flag = 0;

function load_months()
{
	flag = flag+1;
	if(flag == 1)
	{
	var m_names = new Array("Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep","Oct", "Nov", "Dec","Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep","Oct", "Nov", "Dec"); 
var d = new Date(); 
var curr_date = d.getDate(); 
var curr_month = d.getMonth(); 
var curr_year = d.getFullYear();
var nxt_year = curr_year+1;

	var drpTag =document.getElementById('drp_SelDt');	
if(drpTag.value=="")
{
	drpTag.add(new Option("Next 10 days","Next 10 days"));
	drpTag.add(new Option(m_names[curr_month+1]+curr_year,m_names[curr_month+1]+curr_year));
	drpTag.add(new Option(m_names[curr_month+2]+curr_year,m_names[curr_month+2]+curr_year));
	drpTag.add(new Option(m_names[curr_month+3]+nxt_year,m_names[curr_month+3]+nxt_year)); 
}
}
}

function chk(id)
{
	if(document.getElementById(id).checked==false)
	document.getElementById(id).checked=true;
	else
	 document.getElementById(id).checked=false;
}
function check_chks(chk,id)
{
	if(document.getElementById(chk).checked == true)
	{
	    document.getElementById(id).checked="checked";
	}
}


function showAgenda(val,div,adv,wtr)
{
	if(val == "ADVENTURE TOUR")
	 {
     document.getElementById(adv).style.display='block';
	   document.getElementById(div).style.display='none';
	 }	
	else
	{
	 document.getElementById(div).style.display='block';
	 document.getElementById(adv).style.display='none';

	}
}

function hideAgenda(div,adv,wtr)
{
	document.getElementById(div).style.display='none';
	document.getElementById(adv).style.display='none';
	document.getElementById(wtr).style.display='none';
}

	var count = 0 ;
function sel_sugg_vac(id,val,btn,div,adv)
{
	 var type = document.getElementById('sptype').innerHTML;
var dur = document.getElementById('spDur').innerHTML;

//alert('asdasd'+type+'sadasds');

	if(document.getElementById(id).checked == true)
	  {	
	    document.getElementById(btn).style.background="#ff0000";
		document.getElementById(btn).style.color="#fff";
	 
	if(type==" India")
	   {
		   var num = document.getElementById('spNum').innerHTML;
		   count = count+1;
	    if(count <= num)
	  {	
	   var d = document.createElement('div');
	   d.style.float="left";
	  d.style.width ="100%";
	  d.setAttribute("id",val);
	   
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("value",val);
	   inp.style.float="left";
	  inp.onclick = function() 
	   {
		   if(this.checked == true)
		   {
			   document.getElementById('div_sel_vacThms').className="input_Ans";
			   document.getElementById('div_sel_vacThms').style.fontSize="12px";
		 	 document.getElementById('div_sel_vacThms').innerHTML += this.value+", ";
			 
			  var spn = document.createElement('span');
			 spn.style.float="left";
			 spn.style.marginLeft = "4px";
			 
			 var div = document.createElement('div');
			 div.setAttribute("class","smallbtn");
			 div.style.width = "auto";
			 div.setAttribute("id","div_"+val);
			 div.innerHTML = val;
			 div.onclick = function()
				 {
					  if(this.innerHTML == "ADVENTURE TOUR")
					  {
						  //alert("Adv");
					this.style.background="#ff000";
					 show_block('div_adv_opt');
					 hide_block('div_oth_opt');
					  }
				 else 
					 {
						this.style.background="#ff000";
					 hide_block('div_adv_opt');
					 show_block('div_oth_opt');
					 document.getElementById('vac_type').innerHTML = this.innerHTML;
					 }
				 };
			 
			 spn.appendChild(div);
			 document.getElementById('div_show_vac').appendChild(div);
		   }
		   else
		    {
				var arr = new Array();
				var str = document.getElementById('div_sel_vacThms').innerHTML;
				var spl = this.value+", ";
			  arr = str.split(spl);
			  document.getElementById('div_sel_vacThms').innerHTML = arr[0]+arr[1];
			}
	   };
	   
	   var spIn = document.createElement('sp');
	   spIn.innerHTML = val;
	   spIn.setAttribute("class","input_Ans");
	   spIn.style.fontSize="12px";
	   
	   d.appendChild(inp);
	   d.appendChild(spIn);
	   
	   document.getElementById('sel_vac_thm_chk').appendChild(d);
	 }
	 
	   else
	  {
		  alert('You can select a max of '+num+' vacations');
		  document.getElementById(id).checked = false;
		  document.getElementById(btn).style.background="#fbfbfb";
		document.getElementById(btn).style.color="#b22";
		document.getElementById(val).style.display='none';
	  }
	   }
	   	 
	 if(type == " Abroad")
	 {
  	   var d = document.createElement('div');
	   d.style.float="left";
	  d.style.width ="100%";
	  d.setAttribute("id",val);
	   
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("value",val);
	   inp.style.float="left";
	  inp.onclick = function() 
	   {
		   if(this.checked == true)
		   {
			   document.getElementById('div_sel_vacThms').className="input_Ans";
			   document.getElementById('div_sel_vacThms').style.fontSize="12px";
		 	 document.getElementById('div_sel_vacThms').innerHTML += this.value+", ";
			 
			  var spn = document.createElement('span');
			 spn.style.float="left";
			 spn.style.marginLeft = "4px";
			 
			 var div = document.createElement('div');
			 div.setAttribute("class","smallbtn");
			 div.style.width = "auto";
			 div.setAttribute("id","div_"+val);
			 div.innerHTML = val;
			  div.onclick = function()
				 {
					  if(this.innerHTML == "ADVENTURE TOUR")
					  {
						  //alert("Adv");
					this.style.background="#ff000";
					 show_block('div_adv_opt');
					 hide_block('div_oth_opt');
					  }
				 else 
					 {
						this.style.background="#ff000";
					 hide_block('div_adv_opt');
					 show_block('div_oth_opt');
					 document.getElementById('vac_type').innerHTML = this.innerHTML;
					 }
				 };
			 
			 spn.appendChild(div);
			 document.getElementById('div_show_vac').appendChild(div);
		   }
		   else
		    {
				var arr = new Array();
				var str = document.getElementById('div_sel_vacThms').innerHTML;
				var spl = this.value+", ";
			  arr = str.split(spl);
			  document.getElementById('div_sel_vacThms').innerHTML = arr[0]+arr[1];
			}
	   };
	   
	   var spIn = document.createElement('sp');
	   spIn.innerHTML = val;
	   spIn.setAttribute("class","input_Ans");
	   spIn.style.fontSize="12px";
	   
	   d.appendChild(inp);
	   d.appendChild(spIn);
	   
	   document.getElementById('sel_vac_thm_chk').appendChild(d);
	} 

 /* 	{
		document.getElementById(btn).style.background="#ff0000";
		document.getElementById(btn).style.color="#fff";
		document.getElementById(div).style.display='none';
		document.getElementById(val).style.display='none';
		count = count-1;
	} */
		  
	if(val == "ADVENTURE TOUR")
	 {
     document.getElementById(adv).style.display='block';
	   document.getElementById(div).style.display='none';
	 }
	else
	{
	 document.getElementById(div).style.display='block';
	 document.getElementById(adv).style.display='none';
	} 
	 
  }

else
	{
		count = count-1;
		//alert(count);
		document.getElementById(btn).style.background="#fbfbfb";
		document.getElementById(btn).style.color="#b22";
	document.getElementById(div).style.display='none';
	 document.getElementById(adv).style.display='none';
	 document.getElementById(val).style.display='none';
		
	}
}


function showVac_thm(val)
{

			 
			  var spn = document.createElement('span');
			 spn.style.float="left";
			 spn.style.marginLeft = "4px";
			 
			 var div = document.createElement('div');
			 div.setAttribute("class","smallbtn");
			 div.style.width = "auto";
			 div.setAttribute("id","div_"+val);
			 div.innerHTML = val;
			  div.onclick = function()
				 {
					  if(this.innerHTML == "ADVENTURE TOUR")
					  {
						  //alert("Adv");
					this.style.background="#ff000";
					 show_block('div_adv_opt');
					 hide_block('div_oth_opt');
					  }
				 else 
					 {
						this.style.background="#ff000";
					 hide_block('div_adv_opt');
					 show_block('div_oth_opt');
					 document.getElementById('vac_type').innerHTML = this.innerHTML;
					 }
				 };
			 
			 spn.appendChild(div);
			 document.getElementById('div_show_vac').appendChild(div);
		 
	  
}


function LdCntry(val)
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
    document.getElementById("sp_drp_cntry").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?cntry_cont="+val,true);
xmlhttp.send();	
}

function LdStates(val)
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
    document.getElementById("sp_drp_state").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?states_intl="+val,true);
xmlhttp.send();	
}

function wrt_dest(loc)
{
	document.getElementById('sp_sel_dest').innerHTML += loc+", ";
}

function show_Pkdest(curLoc,loc,dur,type,gender)
{
	var vac = document.getElementById('div_sel_vacThms').innerHTML;
	var ag = document.getElementById('sp_agendas').innerHTML;
	var inten = document.getElementById('sp_inten').innerHTML;
	var mode = document.getElementById('spMode').innerHTML;
	var loctype = document.getElementById('splocType').innerHTML;
	var num = document.getElementById('spNum').innerHTML;
	var trvlr = document.getElementById('spTrvlr').innerHTML;
	var eml = document.getElementById('Sp_eml').innerHTML;
	var trpDts = document.getElementById('sp_trvDate').innerHTML;
  window.open("Packages.php?type="+type+"&vactype="+vac+"&loc="+loc+"&currLoc="+curLoc+"&dur="+dur+"&agenda="+ag+"&intensity="+inten+"&mode="+mode+"&locType="+loctype+"&locNum="+num+"&trvlr="+trvlr+"&gender="+gender+"&email="+eml+"&trvlDts="+trpDts);
}

function show_Pkdest_intl()
{	
	var vac = document.getElementById('div_sel_vacThms').innerHTML;
	var ag = document.getElementById('sp_agendas').innerHTML;
	var inten = document.getElementById('sp_inten').innerHTML;
	var loc = document.getElementById('sp_sel_dest').innerHTML;
	var trvlr = document.getElementById('spTrvlr').innerHTML;
	var eml = document.getElementById('Sp_eml').innerHTML;
	var trpDts = document.getElementById('sp_trvDate').innerHTML;
    var cCity = document.getElementById('spCurr').innerHTML;
	var dur = document.getElementById('spDur').innerHTML;
	//var gender = document.getElementById('spGen').innerHTML;
	
  window.open("Packages.php?type=Abroad&vactype="+vac+"&loc="+loc+"&currLoc="+cCity+"&dur="+dur+"&mode=Air&agenda="+ag+"&intensity="+inten+"&locType=&locNum=&trvlr="+trvlr+"&email="+eml+"&trvlDts="+trpDts+"&gender=");
}

function show_Pkdest_intl_popl()
{
	var vac = document.getElementById('div_sel_vacThms').innerHTML;
	var ag = document.getElementById('sp_agendas').innerHTML;
	var inten = document.getElementById('sp_inten').innerHTML;
	var loc = document.getElementById('sp_popl_dest').innerHTML;
	var trvlr = document.getElementById('spTrvlr').innerHTML;
	var eml = document.getElementById('Sp_eml').innerHTML;
	var trpDts = document.getElementById('sp_trvDate').innerHTML;
	var cCity = document.getElementById('spCurr').innerHTML;
	var dur = document.getElementById('spDur').innerHTML;
	//var gender = document.getElementById('spGen').innerHTML;
	
  window.open("Packages.php?type=Abroad&vactype="+vac+"&loc="+loc+"&currLoc="+cCity+"&dur="+dur+"&mode=Air&agenda="+ag+"&intensity="+inten+"&locType=&locNum=&trvlr="+trvlr+"&email="+eml+"&trvlDts="+trpDts+"&gender=");	
}


function show_pck_loc()
{
	var conti = document.getElementById('drpCont_abr').options[document.getElementById('drpCont_abr').options.selectedIndex].value;
var cntry = document.getElementById('drpCntry_conti').options[document.getElementById('drpCntry_conti').options.selectedIndex].value;
var loc = cntry+", "+conti;
var vac = document.getElementById('div_sel_vacThms').innerHTML;
  window.open("Packages.php?loc="+loc+"&vac="+vac);	
}

function wrt_thm(val)
{	
  document.getElementById('div_sel_vacThms').innerHTML = val;
  show_dest();
//  alert(document.getElementById('div_sel_vacThms').innerHTML);
}

function show_dest()
{
var vac = document.getElementById('div_sel_vacThms').innerHTML;
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById('sp_sel_dest_popl').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?showPopulDest=true&popVac="+vac,true);
xmlhttp.send();	
	
}
var cntDest = 0 ;
function write_vac(id,val)
{
	if(document.getElementById(id).checked == true)
	{
		cntDest = cntDest +1;
		if(cntDest <= 7)
		{
	 document.getElementById('sp_popl_dest').innerHTML +=val+", ";
		}
		else
		{
		 alert('Can select maximum of 7 locations');
		 document.getElementById(id).checked = false;
		}
	}
}


function chkLnd(val)
{
	if(val == "Land")
	{
	document.getElementById('chkLand').checked = true;
	 display_pics('chkLand','content_Land');
	}
	if(val == "Water")
	{
		document.getElementById('chkWater').checked = true;
		display_pics('chkWater','content_Water');
	}
	if(val == "Sky")
	{
	document.getElementById('chkSky').checked = true;
	display_pics('chkSky','content_Sky');
	}
	if(val == "Mountain")
	{
		document.getElementById('chkMountain').checked = true;
	 display_pics('chkMountain','content_Mountain');
	}
	if(val == "Forest-Jungle")
	{
	document.getElementById('chkForest').checked = true;
	 display_pics('chkForest','content_Forest');
	}
	if(val == "Bch_Act")
	{
		document.getElementById('chkBchAct').checked = true;
		display_pics('chkBchAct','content_Activities');
	}
	if(val == "Bch_Sight")
	{
	document.getElementById('chkBchSight').checked = true;
	 display_pics('chkBchSight','content_Sightseeing');
	}
	if(val == "Bch_Rest")
	{
		document.getElementById('chkBchRest').checked = true;
	  display_pics('chkBchRest','content_Rest');
	}	
	if(val == "Jung_Act")
	{
	document.getElementById('chkJngAct').checked = true;
	 display_pics('chkJngAct','content_Activities');
	}
	if(val == "Jung_Sight")
	{
		document.getElementById('chkJngSight').checked = true;
		display_pics('chkJngSight','content_Sightseeing');
	}
	if(val == "Jung_Rest")
	{
		document.getElementById('chkJngRest').checked = true;
		display_pics('chkJngRest','content_Rest');
	}
}

function blurImg(id)
{
	document.getElementById(id).style.opacity
}

//---------------------------------------------------------  Package Script-------------------------------------------------------------------------

function show_htl(div,id)
{
	document.getElementById(div).style.display="block";
	document.getElementById('txtPckID').value = id;
}

function buyPckID(pckID)
{
	window.open("BuyNow.php?pckID="+pckID+"&pck_type=Package");
}

function show_pckDtls(div,id)
{
	document.getElementById(div).style.display='block';
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
    document.getElementById(div).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pck_dtls.php?pckID="+id,true);
xmlhttp.send();	
}

function sortPck()
{
	document.getElementById('package_sec_gridView').style.display='none';
	var loc = document.getElementById('sp_loc').innerHTML;
	var type = document.getElementById('sp_type').innerHTML;
	var dur = document.getElementById('drpDur').options[document.getElementById('drpDur').options.selectedIndex].value;
	var trvler = document.getElementById('drpTrvler').options[document.getElementById('drpTrvler').options.selectedIndex].value;
	var vac = document.getElementById('drpVac').options[document.getElementById('drpVac').options.selectedIndex].value;
	
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
    document.getElementById('pck_sort').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pck_sort.php?type="+type+"&loc="+loc+"&dur="+dur+"&trvler="+trvler+"&vac="+vac,true);
xmlhttp.send();	
}

function dwln_pck(pckID)
{
window.open("PHP_Files/pck_dtls_dwnl.php?pckID="+pckID);	
}

function raisepckQuery(pid,id)
{
	document.getElementById('div_Query').style.display='block';
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
    document.getElementById("div_Query").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?QPID="+pid,true);
xmlhttp.send();	
}

function subpckQuery(pckid, query, eml)
{
	document.getElementById("div_Query").style.display='none';
	
	var quer = document.getElementById(query).value;
	var Email = document.getElementById(eml).value;
	
   var atpos=Email.indexOf("@");
 var dotpos=Email.lastIndexOf(".");

 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=Email.length)
   {
   alert("Not a valid e-mail address");
   } 
else
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
    document.getElementById("div_Query").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?PCKID="+pckid+"&Query="+quer+"&Email="+Email,true);
xmlhttp.send();
}
}

function spanWrite(id,val)
{
	if(document.getElementById(id).checked == true)
	document.getElementById('sp_agendas').innerHTML += val+", ";
}

function spanIntWrite(id,val)
{
	if(document.getElementById(id).checked == true)
	document.getElementById('sp_inten').innerHTML = val;
}

function openPage(page,type,vac,loc,city,dur,mode,loctype,num,trvlr,gender)
{
	var ag = document.getElementById('sp_agendas').innerHTML;
	var inten = document.getElementById('sp_inten').innerHTML;
	var eml = document.getElementById('Sp_eml').innerHTML;
	var trpDts = document.getElementById('sp_trvDate').innerHTML;
	window.open(page+"?type="+type+"&vactype="+vac+"&loc="+loc+"&currLoc="+city+"&dur="+dur+"&mode="+mode+"&agenda="+ag+"&intensity="+inten+"&locType="+loctype+"&locNum="+num+"&trvlr="+trvlr+"&gender="+gender+"&email="+eml+"&trvlDts="+trpDts);
}

function openPck(page,type,vac,loc,city,dur,mode,loctype,num,trvlr,ag,inten,gender,email,trvDt)
{
	window.open(page+"?type="+type+"&vactype="+vac+"&loc="+loc+"&currLoc="+city+"&dur="+dur+"&mode="+mode+"&agenda="+ag+"&intensity="+inten+"&locType="+loctype+"&locNum="+num+"&trvlr="+trvlr+"&agenda="+ag+"&intensity="+inten+"&gender="+gender+"&email="+email+"&trvlDts="+trvDt);	
}

function openPagePck(page,type,vac,loc,city,dur,mode,loctype,num,trvlr,gender)
{
window.open(page+"?type="+type+"&vactype="+vac+"&loc="+loc+"&currLoc="+city+"&dur="+dur+"&mode="+mode+"&locType="+loctype+"&locNum="+num+"&trvlr="+trvlr+"&intensity=&agenda=&gender="+gender+"&email="+email+"&trvlDts="+trvDt);	
}

function changeUrl(id,page,type,vac,loc,city,dur,mode,loctype,num,trvlr,gender,email,trvDt)
{
//	alert(this.location.href);
document.getElementById(id).href = page+"?type="+type+"&vactype="+vac+"&loc="+loc+"&currLoc="+city+"&dur="+dur+"&mode="+mode+"&locType="+loctype+"&locNum="+num+"&trvlr="+trvlr+"&intensity=&agenda=&gender="+gender+"&email="+email+"&trvlDts="+trvDt;
}

function show_Partn()
{
	window.open("CreatePackTool.php?id=lksdfj lksjdflksjd flsjflksdjflksj lksjflskfj lskdjfsjfsdkfjsdlkfjslk lsdflsdjf lksjfslkfjsdklfjsdlkfjsldkfjsldk lsdjflksdj lskdjflks sdf&status=Register");
}

function showDestpck(dest)
{
	window.open(window.location.href+"&loc="+dest);
}

function expDest(dest)
{
	window.open("ExploreDest_Cityscape.php?p="+dest);
}

function bookDest(dest,frm)
{
window.open("index.php?bFlt=true&loc="+dest+"&frm="+frm);
}
function showSubsec(id,val,div)
{
	if(document.getElementById(id).checked == true)
	{
	if(val == "WATER SPORTS")
	  show_block(div);
	else
	  hide_block(div);
	}
}

function showItin(pckID)
{
	show_block('div_IternaryDays');
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
    document.getElementById("div_IternaryDays").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Itin=true&PCKID="+pckID,true);
xmlhttp.send();		
}

function showHtlDtls(pckID)
{
	show_block('div_HotelDtls');
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
    document.getElementById("div_HotelDtls").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Hotel=true&PCKID="+pckID,true);
xmlhttp.send();		
}


function addToCompare(chk,id)
{
	if(document.getElementById(chk).checked == true)
	{		
		show_block('div_compare_packs');
		
		if(document.getElementById('span_img_cmp_name1').innerHTML == "")
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
    document.getElementById("spC1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Compare_1=true&PCKID="+id,true);
xmlhttp.send();	
		}
		
		
		else if(document.getElementById('span_img_cmp_name2').innerHTML == "")
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
    document.getElementById("spC2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Compare_2=true&PCKID="+id,true);
xmlhttp.send();	
		}
		
		
		else if(document.getElementById('span_img_cmp_name3').innerHTML == "")
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
    document.getElementById("spC3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Compare_3=true&PCKID="+id,true);
xmlhttp.send();	
		}
		
		
		else if(document.getElementById('span_img_cmp_name4').innerHTML == "")
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
    document.getElementById("spC4").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Compare_4=true&PCKID="+id,true);
xmlhttp.send();	
		}
		
}
	
}

function Compare_pcks()
{
	show_block('compare_imgs');
	 show_block('div_greyBack');
	 
	 var id1="";
	 var id2="";
	 var id3="";
	 var id4="";
	 
	if(document.getElementById('span_img_cmp_name1').innerHTML !="") 
	 id1= document.getElementById('sp_pck_id_1').innerHTML;

if(document.getElementById('span_img_cmp_name2').innerHTML !="") 
	 id2 = document.getElementById('sp_pck_id_2').innerHTML;

if(document.getElementById('span_img_cmp_name3').innerHTML !="") 
	 id3 = document.getElementById('sp_pck_id_3').innerHTML;

if(document.getElementById('span_img_cmp_name4').innerHTML !="") 
	 id4 = document.getElementById('sp_pck_id_4').innerHTML;

	
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
    document.getElementById("compare_imgs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Compare_pcks=true&PCKID1="+id1+"&PCKID2="+id2+"&PCKID3="+id3+"&PCKID4="+id4,true);
xmlhttp.send();	
}

function clear_blocks(imgId,imgName,id)
{
	document.getElementById(imgId).src = "";
		document.getElementById(imgName).innerHTML="";
	document.getElementById(id).innerHTML = "";	
}

function errase(id)
{
	document.getElementById(id).value="";
}

function suggDestSel(val,type,cloc,dist1,dist2,vac)
{
	show_block('sug_dest');
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
    document.getElementById("sug_dest").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?SuggestDest=true&value="+val+"&Type="+type+"&curLoc="+cloc+"&dis1="+dist1+"&dis2="+dist2+"&vactype="+vac,true);
xmlhttp.send();	
}

function suggDestMulti(val,type,cloc,dist1,dist2,vac)
{
	show_block('sug_dest');
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
    document.getElementById("sug_dest").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?MultiSuggestDest=true&value="+val+"&Type="+type+"&curLoc="+cloc+"&dis1="+dist1+"&dis2="+dist2+"&vactype="+vac,true);
xmlhttp.send();	
}

/*<span  style="position:relative; float:left;">';
		  echo '<div id="btn_nb_'.$rL["locname"].'" class="sp_nr_cities" onclick="showDestpck(\''.$rL["locname"].'\');">'.$rL["locname"].'</div>';
			echo '<img src="Images/closeBtn.png" id="cls_'.$rL["locname"].'" width="15px" height="15px" style="position:absolute; top:-2px; right:-2px; float:left; cursor:pointer;" onclick="hide_block(\'btn_nb_'.$rL["locname"].'\'); hide_block(\'cls_'.$rL["locname"].'\');" />';
			echo '</span>'; */
var countDest = 3;
function crtBtn(id,sp)
{
	if(document.getElementById(id).checked == true)
	{	
		 countDest = countDest+1;
		 if(countDest <=7)
		 {
		 var val = document.getElementById(sp).innerHTML;
		 document.getElementById(sp).style.color="#ff0000";
		 
		// alert(val);
	
	    var sp1 = document.createElement('span');
		var d1 = document.createElement('div');
		var img = document.createElement('img');
		
		sp1.style.position="relative";		
		sp1.style.float="left";
		sp1.style.marginLeft = "3px";
		
		d1.setAttribute("class","sp_nr_cities");
		d1.setAttribute("id","btn_nb_"+val);
		d1.innerHTML = val;
		d1.onclick = function()
		{
			showDestpck(val);
		}
		
		img.setAttribute("src","Images/closeBtn.png");
		img.setAttribute("id","cls_"+val);
		img.style.width="15px";
		img.style.height="15px";
		img.style.position="absolute";
		img.style.top="-2px";
		img.style.right="-2px";
		img.style.float="left";
		img.style.cursor="pointer";
		img.onclick = function()
		{
			hide_block('btn_nb_'+val);
			hide_block('cls_'+val);
			countDest = countDest -1;
			removeDest(val);
		};
		
		sp1.appendChild(d1);
		sp1.appendChild(img);
		
		document.getElementById('firstSeven').appendChild(sp1);
	 }
		 else
		 {
			 countDest = countDest -1;
			 document.getElementById(id).checked = false;
			 document.getElementById(sp).style.color = "#444";
			 alert('You can select a max of 7 destinations.\n To select others please delete one of the above selected location.');
		 }
	}
}

function reduceCount()
{	
	countDest = countDest-1;
}

/*function removeDest(val)
{
	//var loc = document.getElementById('sp_loc_updt').innerHTML;
			var splt = window.location.href.split(val+", ");
			var dests = splt[0]+splt[1];
			document.getElementById('sp_loc_updt').innerHTML = dests;
			//alert(dests);
			window.open(window.location.href+"&loc="+lloc);
}*/

function update_dest(dest)
{
	var loc = document.getElementById('sp_loc_updt').innerHTML;
	var lloc = loc+dest;
	window.close(window.location.href); 
	window.open(window.location.href+"&loc="+lloc);
}

function show_locs(val)
{
	if(val=="3-7Days" || val=="7-10Days" || val=="over 10Days" )
	{
	document.getElementById('tr_locType').style.display='table-row';
	}
	else if(val=="3Days" || val=="Weekend")
	{
	document.getElementById('tr_locType').style.display='none';
	document.getElementById('tr_mult_loc_num').style.display='none';
	document.getElementById('tr_singl_loc').style.display='none';
	document.getElementById('tr_mult_loc').style.display='none';
    document.getElementById('rdsinglType').checked = false;
	document.getElementById('rdmulType').checked = false;
	}
		
}

function showPck_ccity(vac,type,loc,custDt,flgDt,rowCnt,cCity,dis0,dis1)
{
	var locs = document.getElementById(loc).innerHTML;

	var dest = new Array();
	dest = locs.split(", ");
	
	var cnt = dest.length;	
	  cnt = cnt-1;
 if(locs!="" && cnt==0) 
	  cnt= 1;
	  
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
    document.getElementById("pck_cCity_dur").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?viewPck=true&vactype="+vac+"&Type="+type+"&Loc="+locs+"&locCount="+cnt+"&custDt="+custDt+"&flagDt="+flgDt+"&rowCount="+rowCnt+"&currLoc="+cCity+"&dis0="+dis0+"&dis1="+dis1,true);
xmlhttp.send();		
}

function show_lst_Pck(vac,type,loc,custDt,flgDt,rowCnt,cCity,dis0,dis1)
{
	var locs = document.getElementById(loc).innerHTML;

	var dest = new Array();
	dest = locs.split(", ");
	
	var cnt = dest.length;	
	  cnt = cnt-1;
 if(locs!="" && cnt==0) 
	  cnt= 1;
	  
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
    document.getElementById("div_lst_pckTab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?ListPck=true&vactype="+vac+"&Type="+type+"&Loc="+locs+"&locCount="+cnt+"&custDt="+custDt+"&flagDt="+flgDt+"&rowCount="+rowCnt+"&currLoc="+cCity+"&dis0="+dis0+"&dis1="+dis1+"&listDisplay=true",true);
xmlhttp.send();		
}


function cust_home()
{
	var eml = document.getElementById('Sp_eml').innerHTML;
	window.open("Cust_Page.php?secure=true&email="+eml);
}

function shuffle_pck()
{
	if(document.getElementById('rdIndia').checked == true)
	{		
	var type = document.getElementById('rdIndia').value;
	var currLoc = document.getElementById('drpcCity').options[document.getElementById('drpcCity').options.selectedIndex].value;
	var dur = document.getElementById('drpDur').options[document.getElementById('drpDur').options.selectedIndex].value;
	
	if(document.getElementById('rdRoad').checked == true)
	var mode = document.getElementById('rdRoad').value;
	else
	var mode = document.getElementById('rdAir').value
	
	var agenda ="";
	var intensity="";
	
	if(document.getElementById('rdsinglType').checked == true)
	{
	var loctype = document.getElementById('rdsinglType').value;
	var loc = document.getElementById('drpSiglLoc').options[document.getElementById('drpSiglLoc').options.selectedIndex].value;
	}
	else
   {
    var loctype = document.getElementById('rdmulType').value;
	var loc = document.getElementById('txtAlocs').value;
   }	
	
	var locnum = document.getElementById('drpNumLoc').options[document.getElementById('drpNumLoc').options.selectedIndex].value;
	
	if(document.getElementById('rdSingle').checked == true)
	var trvlr = document.getElementById('rdSingle').value;
	else if(document.getElementById('rdCouple').checked == true)
	var trvlr = document.getElementById('rdCouple').value;
	else if(document.getElementById('rdGroup').checked == true)
	var trvlr = document.getElementById('rdGroup').value;
	else if(document.getElementById('rdFamilykid').checked == true)
	var trvlr = document.getElementById('rdFamilykid').value;
	else if(document.getElementById('rdGroupkid').checked == true)
	var trvlr = document.getElementById('rdGroupkid').value;
	
	if(document.getElementById('chkageL45').checked == true)
	trvlr += document.getElementById('chkageL45').value;
	else if(document.getElementById('chkageM45').checked == true)
	trvlr += document.getElementById('chkageM45').value;
	
	if(document.getElementById('chkgenM').checked == true)
	var gender= document.getElementById('chkgenM').value;
	else if(document.getElementById('chkgenF').checked == true)
	var gender = document.getElementById('chkgenF').value;
	
	if(document.getElementById('chkkid').checked == true)
	trvlr += document.getElementById('chkkid').value;
	if(document.getElementById('chkchild').checked == true)
	trvlr += document.getElementById('chkchild').value;
	if(document.getElementById('chkchildplus').checked == true)
	trvlr += document.getElementById('chkchildplus').value;
	
   var vac = document.getElementById('sp_vac_type').innerHTML;	
	var email = document.getElementById('session_email').innerHTML;
	var dts = document.getElementById('trvl_dts').innerHTML;
		
	//window.close(window.location.href);
	if(dur == "Weekend" || dur == "3Days")
	{
	document.getElementById('href_shuffle_1').href="Build_Trip.php?type="+type+"&vactype="+vac+"&locs=&cCity="+currLoc+"&dur="+dur+"&mode="+mode+"&agenda=&intensity=&locType=&locNum=&loc=&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts;	
	}
	else
	{
    document.getElementById('href_shuffle_1').href="Build_Trip.php?type="+type+"&vactype="+vac+"&cCity="+currLoc+"&dur="+dur+"&mode="+mode+"&agenda=&intensity=&locType="+loctype+"&locNum="+locnum+"&locs="+loc+"&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts;	
	}
	}
	else
	{
	var type = document.getElementById('rdAbroad').value;
	var currLoc = document.getElementById('drpcCity').options[document.getElementById('drpcCity').options.selectedIndex].value;
	var dur = document.getElementById('drpDur_abr').options[document.getElementById('drpDur_abr').options.selectedIndex].value;
	
	if(document.getElementById('rdSingle_abr').checked == true)
	var trvlr = document.getElementById('rdSingle_abr').value;
	else if(document.getElementById('rdCouple_abr').checked == true)
	var trvlr = document.getElementById('rdCouple_abr').value;
	else if(document.getElementById('rdGroup_abr').checked == true)
	var trvlr = document.getElementById('rdGroup_abr').value;
	else if(document.getElementById('rdFamilykid_abr').checked == true)
	var trvlr = document.getElementById('rdFamilykid_abr').value;
	else if(document.getElementById('rdGroupkid_abr').checked == true)
	var trvlr = document.getElementById('rdGroupkid_abr').value;
	
	if(document.getElementById('chkageL45_abr').checked == true)
	trvlr += document.getElementById('chkageL45_abr').value;
	else if(document.getElementById('chkageM45_abr').checked == true)
	trvlr += document.getElementById('chkageM45_abr').value;
	
	if(document.getElementById('chkgenM_abr').checked == true)
	var gender= document.getElementById('chkgenM_abr').value;
	else if(document.getElementById('chkgenF_abr').checked == true)
	var gender = document.getElementById('chkgenF_abr').value;
	
	if(document.getElementById('chkkid_abr').checked == true)
	trvlr += document.getElementById('chkkid_abr').value;
	if(document.getElementById('chkchild_abr').checked == true)
	trvlr += document.getElementById('chkchild_abr').value;
	if(document.getElementById('chkchildplus_abr').checked == true)
	trvlr += document.getElementById('chkchildplus_abr').value;
	
	var vac = document.getElementById('sp_vac_type').innerHTML;
	var email = document.getElementById('session_email').innerHTML;
	var dts = document.getElementById('trvl_dts').innerHTML;
			
    document.getElementById('href_shuffle_2').href = "Build_Trip.php?type="+type+"&vactype="+vac+"&loc=&cCity="+currLoc+"&dur="+dur+"&mode=&agenda=&intensity=&locType=&locNum=&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts+"&locs=";
	}
}

function build_pck_again()
{

	if(document.getElementById('rdIndia').checked == true)
	{		
	var type = document.getElementById('rdIndia').value;
	var currLoc = document.getElementById('drpcCity').options[document.getElementById('drpcCity').options.selectedIndex].value;
	var dur = document.getElementById('drpDur').options[document.getElementById('drpDur').options.selectedIndex].value;
		
	if(document.getElementById('rdRoad').checked == true)
	var mode = document.getElementById('rdRoad').value;
	else
	var mode = document.getElementById('rdAir').value
	
	var agenda ="";
	var intensity="";
	
	if(document.getElementById('rdsinglType').checked == true)
	{
	var loctype = document.getElementById('rdsinglType').value;
	var loc = document.getElementById('drpSiglLoc').options[document.getElementById('drpSiglLoc').options.selectedIndex].value;
	}
	else
   {
    var loctype = document.getElementById('rdmulType').value;
	var loc = document.getElementById('txtAlocs').value;
   }	
	
	var locnum = document.getElementById('drpNumLoc').options[document.getElementById('drpNumLoc').options.selectedIndex].value;
	
	if(document.getElementById('rdSingle').checked == true)
	var trvlr = document.getElementById('rdSingle').value;
	else if(document.getElementById('rdCouple').checked == true)
	var trvlr = document.getElementById('rdCouple').value;
	else if(document.getElementById('rdGroup').checked == true)
	var trvlr = document.getElementById('rdGroup').value;
	else if(document.getElementById('rdFamilykid').checked == true)
	var trvlr = document.getElementById('rdFamilykid').value;
	else if(document.getElementById('rdGroupkid').checked == true)
	var trvlr = document.getElementById('rdGroupkid').value;
	
	if(document.getElementById('chkageL45').checked == true)
	trvlr += document.getElementById('chkageL45').value;
	else if(document.getElementById('chkageM45').checked == true)
	trvlr += document.getElementById('chkageM45').value;
	else if(document.getElementById('chkageM60').checked == true)
	trvlr += document.getElementById('chkageM60').value;
	
	if(document.getElementById('chkgenM').checked == true)
	var gender= document.getElementById('chkgenM').value;
	else if(document.getElementById('chkgenF').checked == true)
	var gender = document.getElementById('chkgenF').value;
	
	if(document.getElementById('chkkid').checked == true)
	trvlr += document.getElementById('chkkid').value;
	if(document.getElementById('chkchild').checked == true)
	trvlr += document.getElementById('chkchild').value;
	if(document.getElementById('chkchildplus').checked == true)
	trvlr += document.getElementById('chkchildplus').value;

 	var email = document.getElementById('Sp_eml').innerHTML;
	var dts = document.getElementById('sp_trvDate').innerHTML;
	var rank = document.getElementById('sp_rank').innerHTML;
		
	//window.close(window.location.href);
	if(dur == "Weekend" || dur=="3Days")
	{
    document.getElementById('href_buildpck_1').href="Build_Trip.php?type="+type+"&cCity="+currLoc+"&dur="+dur+"&mode="+mode+"&agenda=&intensity=&locType=&locNum=&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts+"&locs=&rank="+rank;	
	}
	else
	{
	document.getElementById('href_buildpck_1').href="Build_Trip.php?type="+type+"&cCity="+currLoc+"&dur="+dur+"&mode="+mode+"&agenda=&intensity=&locType="+loctype+"&locNum="+locnum+"&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts+"&locs="+loc+"&rank="+rank;		
	}
	
	}
	else
	{
	var type = document.getElementById('rdAbroad').value;
	var currLoc = document.getElementById('drpcCity').options[document.getElementById('drpcCity').options.selectedIndex].value;
	var dur = document.getElementById('drpDur_abr').options[document.getElementById('drpDur_abr').options.selectedIndex].value;
	
	if(document.getElementById('rdSingle_abr').checked == true)
	var trvlr = document.getElementById('rdSingle_abr').value;
	else if(document.getElementById('rdCouple_abr').checked == true)
	var trvlr = document.getElementById('rdCouple_abr').value;
	else if(document.getElementById('rdGroup_abr').checked == true)
	var trvlr = document.getElementById('rdGroup_abr').value;
	else if(document.getElementById('rdFamilykid_abr').checked == true)
	var trvlr = document.getElementById('rdFamilykid_abr').value;
	else if(document.getElementById('rdGroupkid_abr').checked == true)
	var trvlr = document.getElementById('rdGroupkid_abr').value;
	
	if(document.getElementById('chkageL45_abr').checked == true)
	trvlr += document.getElementById('chkageL45_abr').value;
	else if(document.getElementById('chkageM45_abr').checked == true)
	trvlr += document.getElementById('chkageM45_abr').value;
	else if(document.getElementById('chkageM60_abr').checked == true)
	trvlr += document.getElementById('chkageM60_abr').value;
	
	if(document.getElementById('chkgenM_abr').checked == true)
	var gender= document.getElementById('chkgenM_abr').value;
	else if(document.getElementById('chkgenF_abr').checked == true)
	var gender = document.getElementById('chkgenF_abr').value;
	
	if(document.getElementById('chkkid_abr').checked == true)
	trvlr += document.getElementById('chkkid_abr').value;
	if(document.getElementById('chkchild_abr').checked == true)
	trvlr += document.getElementById('chkchild_abr').value;
	if(document.getElementById('chkchildplus_abr').checked == true)
	trvlr += document.getElementById('chkchildplus_abr').value;	

	var email = document.getElementById('Sp_eml').innerHTML;
	var dts = document.getElementById('sp_trvDate').innerHTML;
	var rank = document.getElementById('sp_rank').innerHTML;
			
    document.getElementById('href_buildpck_2').href = "Packages.php?type="+type+"&cCity="+currLoc+"&dur="+dur+"&mode=&agenda=&intensity=&locType=&locNum=&trvlr="+trvlr+"&agenda=&intensity=&gender="+gender+"&email="+email+"&trvlDts="+dts+"&locs=&rank="+rank;
	}
}

