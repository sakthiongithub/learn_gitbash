function cnt_dedt_rows()
{
	var cnt_rows = document.getElementById('tab_cncl_terms').rows.length;
	document.getElementById('txtcncl_deduct').value = cnt_rows;
	
	var ref_rows = document.getElementById('tab_refund').rows.length;
	document.getElementById('txtcncl_refund').value = ref_rows;
}

function cnt_offer_rows()
{
	var cnt_rows = document.getElementById('tab_discounts').rows.length;
	document.getElementById('txtcncl_disc').value = cnt_rows;
}

function cnt_sug_rows()
{
	document.getElementById('txtSug_htl_rows').value = document.getElementById('tab_sugg_htl').rows.length;
	document.getElementById('txtSug_trv_rows').value = document.getElementById('tab_Sug_trv').rows.length;
	document.getElementById('txtSug_trvl_rows').value = document.getElementById('tab_Sug_trvl').rows.length;
	document.getElementById('txtSug_othr_rows').value = document.getElementById('tab_Sug_othr').rows.length;
	document.getElementById('txtSug_itin_rows').value = document.getElementById('tab_sugg_itin').rows.length;
}

function selVac(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('sp_theme').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('sp_theme').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_theme').innerHTML = val[0]+val[1];
	}	
}

function selVac_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('sp_theme').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_theme').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_theme').innerHTML = val[0]+val[1];
	}	
}
function chkThis(id)
{
	if(document.getElementById(id).value == "ADVENTURE TOUR")
	{
		show_block('div_adv_sub_type');
	}
	else
	  hide_block('div_adv_sub_type');
}

function selIncl(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('sp_incl').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('sp_incl').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_incl').innerHTML = val[0]+val[1];
	}	
}

function selIncl_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('sp_incl').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_incl').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_incl').innerHTML = val[0]+val[1];
	}	
}

function selIncl_mod(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('txtMod_incls').value += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('txtMod_incls').value;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('txtMod_incls').value = val[0]+val[1];
	}	
}

function selIncl_mod_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('txtMod_incls').value += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('txtMod_incls').value;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('txtMod_incls').value = val[0]+val[1];
	}	
}


function selExcl(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('sp_excl').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('sp_excl').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_excl').innerHTML = val[0]+val[1];
	}	
}

function selExcl_mod(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('txtMod_excls').value += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('txtMod_excls').value;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('txtMod_excls').value = val[0]+val[1];
	}	
}

function selExcl_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('sp_excl').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_excl').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_excl').innerHTML = val[0]+val[1];
	}	
}

function selExcl_mod_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('txtMod_excls').value += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('txtMod_excls').value;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('txtMod_excls').value = val[0]+val[1];
	}	
}


function htl_rows()
{
	 var sp_loc = document.getElementById('sp_loc').innerHTML;   
	 var locs = new Array(); 
	 var htl;
	 var count=0;
	 var tab_count=0;
	 var loc_cnt = 0;
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");  
 for(var k =0; k<locs.length-1; k++)
 {	 
   // loc_cnt = locs.length;
    count = document.getElementById('tab_'+locs[k]).rows.length;
	count = count-2;
	tab_count += count;	
 }
   }
   else
       tab_count = document.getElementById('tab_'+sp_loc).rows.length;

	document.getElementById('txtHtlRows').value = tab_count;
	
	
	
}

function attrRows()
{
	var attr = document.getElementById('tab_attraction').rows.length;
	document.getElementById('txtAttrCnt').value = attr;
}

function show_section(div, div1, div2, div3, div4, div5)
{
	    document.getElementById(div).style.display='block';
		document.getElementById(div1).style.display='none';
		document.getElementById(div2).style.display='none';
		document.getElementById(div3).style.display='none';
		document.getElementById(div4).style.display='none';
		document.getElementById(div5).style.display='none';
}


function show_btn_color(btn,btn1,btn2,btn3,btn4, btn5)
{	
	document.getElementById(btn).style.color="#FF0000";
	document.getElementById(btn1).style.color="#FFFfff";
	document.getElementById(btn2).style.color="#FFFfff";	
    document.getElementById(btn3).style.color="#FFFfff";
	document.getElementById(btn4).style.color="#FFFfff";
	document.getElementById(btn5).style.color="#FFFfff";
}

function headerBtn_Color(btn, btn1, btn2, btn3, btn4, btn5)
{
	    document.getElementById(btn).className="arrow_act";
		document.getElementById(btn1).className ="arrow_box";
		document.getElementById(btn2).className ="arrow_box";
		document.getElementById(btn3).className ="arrow_box";
		document.getElementById(btn4).className ="arrow_box";
		document.getElementById(btn5).className ="arrow_box";
}


function disp_block(id_view, id1, id2, id3, id4, id5, id6, id7)
{
        document.getElementById(id_view).style.display='block';
		document.getElementById(id1).style.display='none';
		document.getElementById(id2).style.display='none';
		document.getElementById(id3).style.display='none';
		document.getElementById(id4).style.display='none';
		document.getElementById(id5).style.display='none';
		document.getElementById(id6).style.display='none';
		document.getElementById(id7).style.display='none';
}

function show_block(id)
{
	document.getElementById(id).style.display='block';
}
function hide_block(id)
{
	document.getElementById(id).style.display='none';
}
function show_tr(id)
{
	document.getElementById(id).style.display='table-row';
}

function hide_tr(id)
{
	document.getElementById(id).style.display='none';
}
function errase(id)
{
	document.getElementById(id).value="";
}
function show_value(id)
{
	document.getElementById(id).value="Other? Specify";
}

function pressOr()
{
	document.getElementById('txtAndOr').value="Or";
}

function pressAnd()
{
	document.getElementById('txtAndOr').value="And";
}

function reset_pwd()
{
window.open(document.getElementById('sp_lnk').innerHTML);
}

function change_btn_color(actbtn,btn1,btn2,btn3,btn4,btn5,btn6,btn7)
{
	document.getElementById(actbtn).className ="btn_semi_trapez_onFocus";
	document.getElementById(btn1).className ="btn_semi_trapez";
	document.getElementById(btn2).className ="btn_semi_trapez";
	document.getElementById(btn3).className ="btn_semi_trapez";
	document.getElementById(btn4).className ="btn_semi_trapez";
	document.getElementById(btn5).className ="btn_semi_trapez";
	document.getElementById(btn6).className ="btn_semi_trapez";
	document.getElementById(btn7).className ="btn_semi_trapez";
}

function change_btn_bg(id,id1)
{
	document.getElementById(id).style.background = "#FF0000";
	document.getElementById(id1).style.background = "#002929";
}
function change_pack()
{
	document.getElementById('btn_pack').style.background="#FF0000";
	document.getElementById('btn_acc_trp').style.background="#002929";
}

function change_acc()
{
	document.getElementById('btn_acc_trp').style.background="#FF0000";
	document.getElementById('btn_pack').style.background="#002929";
}

function Btn_Color(id1,id2,id3)
{
	document.getElementById(id1).style.background ="#FF0000";
	document.getElementById(id2).style.background ="#002929";
	document.getElementById(id3).style.background ="#002929";
}

function show_active_btn(val)
{
	document.getElementById('btn_act_div').style.display='block';
	document.getElementById('btn_act_div').innerHTML = val;
}

function show_user()
{
	Session["User"]=document.getElementById('sp_user').innerHTML;
	document.getElementById('sp_sess').innerHTML = Session["User"];
}



function show_btn_onmouse(btn)
{
	document.getElementById(btn).style.background="#FFF";
	document.getElementById(btn).style.color="#555";
	{
		document.getElementById(id).style.color ="#0066CC";
	}
}

function show_mouseout(id)
{
	document.getElementById(id).style.background="#597272";
	document.getElementById(id).style.color="#FFF";
	document.getElementById(id).onclick=function()
	{
		document.getElementById(id).style.color ="#0066CC";
	}
}

function disp_subCate(id,id2)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById(id2).style.display='block';
	}
	else
	{
		document.getElementById(id2).style.display='none';
	}
}

function showPckPost(id,Val)
{
	if(document.getElementById(id).checked == true)
	 document.getElementById('txtPckShown').value = Val;
}

function wrt_chkVal(id,txtId,val)
{
	if(document.getElementById(id).checked == true)
	  document.getElementById(txtId).value += val+", ";
	else
	  {
		 document.getElementById(id).checked = false;
		var st = new Array();
		var str = document.getElementById(txtId).value;
		var spl = val;
		st = str.split(spl);
		document.getElementById(txtId).innerHTML = st[0]+st[1]; 
	  }
}

function wrt_val(id,txtId,val)
{
	if(document.getElementById(id).checked == true)
	  document.getElementById(txtId).value = val;
}

function disp_none()
{
	document.getElementById('adlt_age').style.display='none';
	document.getElementById('kids_age').style.display='none';
}

function btn_color(id1, id2)
{
	document.getElementById(id1).className="btn_semi_trapez_onFocus";
	document.getElementById(id2).className="btn_semi_trapez";
}

function UploadImg1()
{
	var imgSrc=document.getElementById('imgfile1').value;
	document.getElementById('img_title1').src = imgSrc;
}
function UploadImg2()
{
	var imgSrc=document.getElementById('imgfile2').value;
	document.getElementById('img_title2').src = imgSrc;
} 

function chk_count()
{
	if(document.getElementById('chkAct').checked==true && document.getElementById('chkSight').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkAct').checked==true && document.getElementById('chkRest').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkSight').checked==true && document.getElementById('chkAct').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkSight').checked==true && document.getElementById('chkRest').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkRest').checked==true && document.getElementById('chkAct').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkRest').checked==true && document.getElementById('chkSight').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else if(document.getElementById('chkRest').checked==true && document.getElementById('chkSight').checked==true && document.getElementById('chkAct').checked==true)
	{
		//document.getElementById('sp_multi').style.display='block';
		 document.getElementById('rdMult').checked = true;
	}
	else
	{
		//document.getElementById('sp_multi').style.display='none';
		 document.getElementById('rdMult').checked = false;
	}
}
var cnt_adv = 0;
function chk_Adv_cnt(id)
{
	if(document.getElementById(id).checked == true)
	  cnt_adv = cnt_adv + 1;
	else
	  cnt_adv = cnt_adv -1;
	  
	if(cnt_adv > 1)
	{
		document.getElementById('rdMult').checked = true;
	  document.getElementById('sp_multi').style.display = 'block';
	}
}

function selTripAgen_sp(id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
	  document.getElementById('trp_agenda').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var val = new Array();
		var str = document.getElementById('trp_agenda').innerHTML;
		var spl = document.getElementById(id).value+",";
		val = str.split(spl);
		document.getElementById('trp_agenda').innerHTML = val[0]+val[1];
	}
} 

function selTripAgen(id)
{
	if(document.getElementById(id).checked == true)
	  document.getElementById('trp_agenda').innerHTML += document.getElementById(id).value+", ";
	else
	{
		var val = new Array();
		var str = document.getElementById('trp_agenda').innerHTML;
		var spl = document.getElementById(id).value+",";
		val = str.split(spl);
		document.getElementById('trp_agenda').innerHTML = val[0]+val[1];
	}  
}

function selTrpInt()
{
	if(document.getElementById('rdHgh').checked == true)
	   document.getElementById('trp_inten').innerHTML = "High";
	if(document.getElementById('rdMed').checked == true)
	   document.getElementById('trp_inten').innerHTML = "Medium";
	if(document.getElementById('rdLow').checked == true)
	   document.getElementById('trp_inten').innerHTML = "Low"; 
}

function selTrpInt_sp(id,val)
{
	if(document.getElementById(id).checked == false)
	{
		 document.getElementById(id).checked=true;
	   document.getElementById('trp_inten').innerHTML = val;
	}
}

function show_preview()
{

	document.getElementById('sp_title').innerHTML = document.getElementById('txt_packName').value;
	document.getElementById('img_title1').src = document.getElementById('imgfile1').value;
	document.getElementById('img_title2').src = document.getElementById('imgfile2').value;
	
	//document.getElementById('sp_dur').innerHTML = document.getElementById('drpNights').options[document.getElementById('drpNights').options.selectedIndex].value+"&nbsp;/&nbsp;"+                                                   document.getElementById('drpDays').options[document.getElementById('drpDays').options.selectedIndex].value;
	
	document.getElementById('sp_valid').innerHTML = document.getElementById('txtfrmDt').value+" &nbsp; To &nbsp;"+document.getElementById('txttoDt').value;
	//document.getElementById('sp_trpDt').innerHTML = document.getElementById('txtFrmtrv_dt1').value+"&nbsp; To &nbsp;"+document.getElementById('txtTotrv_dt1').value;

	document.getElementById('sp_packPrice').innerHTML = document.getElementById('txt_packCost').value;
	document.getElementById('sp_price').innerHTML = document.getElementById('txttotalPrice').value;
	document.getElementById('sp_tax').innerHTML = document.getElementById('drptaxRate').options[document.getElementById('drptaxRate').options.selectedIndex].value;
	document.getElementById('sp_cess').innerHTML = document.getElementById('txtCess').value;	
	document.getElementById('sp_status').innerHTML = document.getElementById('txtNumPack').value;
	document.getElementById('sp_pckNum').innerHTML = document.getElementById('txtNumPack').value
		
	
if(document.getElementById('rdPerPerson').checked==true)
	{
		document.getElementById('sp_price').innerHTML +="&nbsp; / &nbsp;"+document.getElementById('rdPerPerson').value;
	}
	else if(document.getElementById('rdCouple').checked==true)
	{
		document.getElementById('sp_price').innerHTML +="&nbsp; / &nbsp;"+document.getElementById('rdCouple').value;
	}
	else if(document.getElementById('rdGrp').checked==true)
	{
		document.getElementById('sp_price').innerHTML +="&nbsp; / &nbsp;"+document.getElementById('rdGrp').value+" of "+ document.getElementById('drpPerAdult').options[document.getElementById('drpPerAdult').options.selectedIndex].value+" Adults, and"+document.getElementById('drpKidBel12').options[document.getElementById('drpKidBel12').options.selectedIndex].value+" Kids below 12Yrs"+document.getElementById('drpKidAbv12').options[document.getElementById('drpKidAbv12').options.selectedIndex].value+" Kids above 12Yrs";
	}
	
   else if(document.getElementById('rdOther').checked==true)
	{
		document.getElementById('sp_price').innerHTML +="&nbsp; / &nbsp;"+document.getElementById('txtOther').value;
	}
}


/*	document.getElementById('btn_or').onclick = function()
	{
	document.getElementById('sp_trpDt').innerHTML += "&nbsp; Or &nbsp;"+document.getElementById('txtFrmtrv_dt2').value+"&nbsp; - &nbsp;"+document.getElementById('txtTotrv_dt2').value;
	}
	document.getElementById('btn_and').onclick = function()
	{
	document.getElementById('sp_trpDt').innerHTML += "&nbsp; And &nbsp;"+document.getElementById('txtFrmtrv_dt2').value+"&nbsp; - &nbsp;"+document.getElementById('txtTotrv_dt2').value;
	}  */
function show_intraCity()
{
	document.getElementById('sp_intracity').innerHTML = document.getElementById('drpInternalFac').options[document.getElementById('drpInternalFac').options.selectedIndex].value;
}

function chk_dom_loc(id)
{
	if(document.getElementById('rdMulti').checked == true)
	{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('sp_loc').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		var val = new Array();
		var str = document.getElementById('sp_loc').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_loc').innerHTML = val[0]+val[1];
	}
	}
	
}

function selLocDomes(id)
{
if(document.getElementById('rdMulti').checked == true)
	{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked =true;
		document.getElementById('sp_loc').innerHTML += document.getElementById(id).value+", ";
	}
	else
	{
		document.getElementById(id).checked =false;
		var val = new Array();
		var str = document.getElementById('sp_loc').innerHTML;
		var spl = document.getElementById(id).value+", ";
		val = str.split(spl);
		document.getElementById('sp_loc').innerHTML = val[0]+val[1];
	}
	}	
}

function chk_intl_loc(id)
{
  if(document.getElementById('rdMulti').checked == true)
	{
	if(document.getElementById(id).checked == true)
	{
		var arr = new Array();
		var dest = document.getElementById(id).value;
		arr = dest.split(",");
		var loc=""; 
		
		for(var i =0 ; i<arr.length; i++)
		   loc += arr[i]+" ";
		   
		document.getElementById('sp_loc').innerHTML += loc+", ";
	}
	else
	{
		var arr = new Array();
		var dest = document.getElementById(id).value;
		arr = dest.split(", ");
		var loc=""; 
		
		for(var i =0 ; i<arr.length; i++)
		   loc += arr[i]+" ";
		
		var val = new Array();
		var str = document.getElementById('sp_loc').innerHTML;
		var spl = loc+", ";
		val = str.split(spl);
		//alert(loc);
		document.getElementById('sp_loc').innerHTML = val[0]+val[1];
	}
	}
}

function selIntlLoc(id)
{
	if(document.getElementById('rdMulti').checked == true)
	{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		var arr = new Array();
		var dest = document.getElementById(id).value;
		arr = dest.split(", ");
		var loc=""; 
		
		for(var i =0 ; i<arr.length; i++)
		   loc += arr[i]+" ";
		   
		document.getElementById('sp_loc').innerHTML += loc+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var arr = new Array();
		var dest = document.getElementById(id).value;
		arr = dest.split(", ");
		var loc=""; 
		
		for(var i =0 ; i<arr.length; i++)
		   loc += arr[i]+" ";
		
		var val = new Array();
		var str = document.getElementById('sp_loc').innerHTML;
		var spl = loc+", ";
		val = str.split(spl);
		//alert(loc);
		document.getElementById('sp_loc').innerHTML = val[0]+val[1];
	}
	}
}

function sel_one_Loc(val)
{
	if(document.getElementById('rdSingle').checked == true)
	{
		var dest = val;
		document.getElementById('sp_loc').innerHTML = dest;
	}
}
	
function show_travler()
{
	if(document.getElementById('chkSingle').checked==true && document.getElementById('chkage45').checked==true)
	document.getElementById('sp_trv').innerHTML += document.getElementById('chkSingle').value+"-"+document.getElementById('chkage45').value+", &nbsp;";
	
	if(document.getElementById('chkSingle').checked==true && document.getElementById('chkage45plus').checked==true)
	document.getElementById('sp_trv').innerHTML += document.getElementById('chkSingle').value+"-"+document.getElementById('chkage45plus').value+", &nbsp;";
	
   if(document.getElementById('chkCouple').checked==true && document.getElementById('chkage45').checked==true)
	document.getElementById('sp_trv').innerHTML += document.getElementById('chkCouple').value+"-"+document.getElementById('chkage45').value+", &nbsp;";
	
	if(document.getElementById('chkCouple').checked==true && document.getElementById('chkage45plus').checked==true)
	document.getElementById('sp_trv').innerHTML += document.getElementById('chkCouple').value+"-"+document.getElementById('chkage45plus').value+", &nbsp;";
 		
	if(document.getElementById('chkGroup').checked==true)
	   document.getElementById('sp_trv').innerHTML += document.getElementById('chkGroup').value+",";
	   
    if(document.getElementById('chkFamilykid').checked==true )
	document.getElementById('sp_trv').innerHTML += document.getElementById('chkFamilykid').value+"--" ;
 		
	if(document.getElementById('chkGroupkid').checked==true)
	   document.getElementById('sp_trv').innerHTML += document.getElementById('chkGroupkid').value+"--";   
	   
	if(document.getElementById('chkkid').checked==true) 
	  document.getElementById('sp_trv').innerHTML +=document.getElementById('chkkid').value+", &nbsp;";
	  
	if(document.getElementById('chkchild').checked==true) 
	  document.getElementById('sp_trv').innerHTML +=document.getElementById('chkchild').value+", &nbsp;"; 
	  
    if(document.getElementById('chkchildplus').checked==true) 
	  document.getElementById('sp_trv').innerHTML +=document.getElementById('chkchildplus').value+", &nbsp;";
 }
 



 
/* function updatePick(e)
{
	document.getElementById('sp_pickup').innerHTML ='';
for (var i=0; i<document.form_pickLoc.elements.length; i++)
  {
if (document.form_pickLoc.elements[i].type == 'checkbox' && document.form_pickLoc.elements[i].checked)
 {
 document.getElementById('sp_pickup').innerHTML += document.form_pickLoc.elements[i].nextSibling.data;
  document.getElementById('sp_pickup').innerHTML += ',&nbsp;';
  }
  }
}

 function updateDropLoc(e)
{
	document.getElementById('sp_drop').innerHTML ='';
for (var i=0; i<document.form_dropLoc.elements.length; i++)
  {
if (document.form_dropLoc.elements[i].type == 'checkbox' && document.form_dropLoc.elements[i].checked)
 {
 document.getElementById('sp_drop').innerHTML += document.form_dropLoc.elements[i].nextSibling.data;
  document.getElementById('sp_drop').innerHTML += ',&nbsp;';
  }
  }
}



function updateInc(e)
{
	document.getElementById('sp_incl').innerHTML ='';
for (var i=0; i<document.form_inc.elements.length; i++)
  {
if (document.form_inc.elements[i].type == 'checkbox' && document.form_inc.elements[i].checked)
 {
 document.getElementById('sp_incl').innerHTML += document.form_inc.elements[i].nextSibling.data;
  document.getElementById('sp_incl').innerHTML += ',&nbsp;';
  }
  }
}*/

function show_Ways()
{
	if(document.getElementById('rdOne').checked==true)
	   {
		document.getElementById('div_OneWay').style.display='block';
		 document.getElementById('div_returnJour').style.display='none';
		  document.getElementById('div_onward').style.display='none';
	   }
	  
	   else if(document.getElementById('rdTwo').checked==true)
	   {
		    document.getElementById('sp_intercity').innerHTML = document.getElementById('rdTwo').value;
		    document.getElementById('div_returnJour').style.display='block';
		  document.getElementById('div_onward').style.display='block';
		    document.getElementById('div_OneWay').style.display='none';
			document.getElementById('sp_dest2').innerHTML = document.getElementById('txtTo_onwd').value+"&nbsp; By &nbsp;"+document.getElementById('drpMode_ret').options[document.getElementById('drpMode_ret').options.selectedIndex].value;
			document.getElementById('sp_dest').innerHTML =document.getElementById('txtFrom_ret').value +"&nbsp; By &nbsp;"+document.getElementById('drpMode_arri').options[document.getElementById('drpMode_arri').options.selectedIndex].value;
			
				 show_block('div_trans_chk');
				  show_tr('ld_pickup');
				   show_tr('ld_drop');
				    show_tr('ld_dest');
					  show_tr('ld_dest2');
				  
	   }
   
    else if(document.getElementById('rdNone').checked==true)
	   {
		     show_block('div_trans_chk');
		    document.getElementById('div_returnJour').style.display='none';
		  document.getElementById('div_onward').style.display='none';
		  document.getElementById('div_OneWay').style.display='none';
		 document.getElementById('sp_intercity').innerHTML ="&nbsp;:&nbsp;"+document.getElementById('rdNone').value;
		 	 
	   }  
	   
    if(document.getElementById('rdArr').checked==true)
     	{
		document.getElementById('div_onward').style.display='block';
		  document.getElementById('div_returnJour').style.display='none';
		  document.getElementById('sp_dest').innerHTML =document.getElementById('txtFrom_ret').value +"&nbsp; By &nbsp;"+document.getElementById('drpMode_arri').options[document.getElementById('drpMode_arri').options.selectedIndex].value;
	    }
    else if(document.getElementById('rdReturn').checked==true)
	   {
		  document.getElementById('div_returnJour').style.display='block';
		  document.getElementById('div_onward').style.display='none';
		  document.getElementById('sp_dest2').innerHTML = document.getElementById('txtTo_onwd').value+"&nbsp; By &nbsp;"+document.getElementById('drpMode_ret').options[document.getElementById('drpMode_ret').options.selectedIndex].value;
	   }
  
}
function show_intercity()
 {
	 show_tr('ld_intercity');
	 if(document.getElementById('rdOne').checked ==true && document.getElementById('rdArr').checked ==true)
	   {
		   	 show_block('div_onward');
			 show_block('div_trans_chk_on');
		   show_tr('ld_pickup');
		   hide_tr('ld_drop');
		 document.getElementById('sp_intercity').innerHTML = document.getElementById('rdOne').value+":&nbsp;"+document.getElementById('rdArr').value;
		 show_tr('ld_dest');	
		 hide_tr('ld_dest2');
		 
		 if(document.getElementById('chkTransfer_on').checked == true)
		 {
		    show_block('div_trf_mode_on');
	     hide_block('div_trf_mode_ret');
		 }
		 
		 document.getElementById('sp_dest').innerHTML =document.getElementById('txtTo_onwd').value+"&nbsp; Via &nbsp;"+document.getElementById('drpMode_onwd_arri').options[document.getElementById('drpMode_onwd_arri').options.selectedIndex].value;
		 document.getElementById('sp_transfer').innerHTML = "Yes, By means of "+ document.getElementById('drp_trf_means_ret').options[document.getElementById('drp_trf_means_ret').options.selectedIndex].value;
	   }
	   
	else if(document.getElementById('rdOne').checked ==true && document.getElementById('rdReturn').checked ==true)
	   {
		   hide_tr('ld_pickup');
		   show_tr('ld_drop');
		   hide_tr('ld_dest');
	      show_block('div_returnJour');
		 document.getElementById('sp_intercity').innerHTML = document.getElementById('rdOne').value+":&nbsp;"+document.getElementById('rdReturn').value;
		 show_tr('ld_dest2');
		 
		 if(document.getElementById('chkTransfer_ret').checked == true)
		 {
		    hide_block('div_trf_mode_on');
	         show_block('div_trf_mode_ret');
		 }
		 
		 document.getElementById('sp_dest2').innerHTML =document.getElementById('txtFrom_ret').value+"&nbsp; Via &nbsp;"+document.getElementById('drpMode_ret_onwd').options[document.getElementById('drpMode_ret_onwd').options.selectedIndex].value;
		 
		 document.getElementById('sp_transfer').innerHTML = "Yes, By means of "+ document.getElementById('drp_trf_means_ret').options[document.getElementById('drp_trf_means_ret').options.selectedIndex].value;
	   }
		   
 }
 
 function calc_tax()
 {
	 var Pack_Cost = parseInt(document.getElementById('txt_packCost').value);
	 var eduCess = parseInt(document.getElementById('txtCess').value);
	 var rate = parseInt(document.getElementById('drptaxRate').options[document.getElementById('drptaxRate').options.selectedIndex].value);
	 var taxRate = Pack_Cost*(rate/100);
	 var taxAmt =parseInt(taxRate) + Pack_Cost;
	 document.getElementById('txtTax').value = parseInt(taxAmt);
	 document.getElementById('txttotalPrice').value = taxAmt+eduCess;
 }
 
  function calc_tax_mod()
 {
	 var Pack_Cost = parseInt(document.getElementById('txtMod_pckCost').value);
	 var eduCess = parseInt(document.getElementById('txtMod_edu').value);
	 var rate = parseInt(document.getElementById('txtMod_serv').value);
	 var taxRate = Pack_Cost*(rate/100);
	 var taxAmt =parseInt(taxRate) + Pack_Cost;
	document.getElementById('txtMod_price').value = taxAmt+eduCess;
 }
 
 function calc_tax_rev()
 {
	 var Pack_Cost = parseInt(document.getElementById('txt_packCost_rev').value);
	 var eduCess = parseInt(document.getElementById('txtCess_rev').value);
	 var rate = parseInt(document.getElementById('drptaxRate_rev').options[document.getElementById('drptaxRate_rev').options.selectedIndex].value);
	 var taxRate = Pack_Cost*(rate/100);
	 var taxAmt =parseInt(taxRate) + Pack_Cost;
	 document.getElementById('txtTax_rev').value = parseInt(taxAmt);
	 document.getElementById('txttotalPrice_rev').value = taxAmt+eduCess;	 
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

function btncolor(id1,id2,id3)
{
	document.getElementById(id1).style.background="rgb(255,55,1)";
	document.getElementById(id2).style.background="#002929";
	document.getElementById(id3).style.background="#002929";
}

function delete_row(id)
{
	document.getElementById(id).style.display='none';
}

function open_pdf(QID,LID)
{
	window.open("PHP_Files/Quote_dwnl_pdf.php?QID="+QID+"&LID="+LID);
}
 
function show_div(id,div1,div2)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById(div1).style.display = 'block';
		document.getElementById(div2).style.display = "none";
	}
	else
	  {
		  document.getElementById(div1).style.display = 'block';
		document.getElementById(div2).style.display = "none";
	  }
}
function toUpper(id)
{
	 document.getElementById(id).value = document.getElementById(id).value.toUpperCase();
}

function showIntl_Loc()
{	
str = document.getElementById('drpCountry').options[document.getElementById('drpCountry').options.selectedIndex].value;
	if(document.getElementById('rdInterNl').checked == true)
	{
if(document.getElementById('rdSingle').checked == true)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_d").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/loadCountry.php?cntryS="+str,true);
xmlhttp.send();	
}
else if(document.getElementById('rdMulti').checked == true)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_d").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/loadCountry.php?cntryM="+str,true);
xmlhttp.send();	
}	
}
}

function showDistr()
{
	var distr = document.getElementById('drpState').options[document.getElementById('drpState').options.selectedIndex].value;
if(document.getElementById('rdDomes').checked == true)
	{
if(document.getElementById('rdSingle').checked == true)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_d").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/loadStates.php?distS="+distr,true);
xmlhttp.send();	
}
else if(document.getElementById('rdMulti').checked == true)
{
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_d").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/loadStates.php?distM="+distr,true);
xmlhttp.send();
}
}
}

function chk_loc_type(id)
{
  if(document.getElementById(id).checked != true)
    document.getElementById(id).checked = true;
  else
    document.getElementById(id).checked=false;
}


function delete_row(id)
{
	document.getElementById(id).style.display='none';
}

function show_basis()
{
 if(document.getElementById('rdPerPerson').checked==true)	
    document.getElementById('sp_basis').innerHTML = "(Per &nbsp;"+document.getElementById('rdPerPerson').value+")";
 if(document.getElementById('rdCouple').checked==true)	
    document.getElementById('sp_basis').innerHTML = "(Per &nbsp;"+document.getElementById('rdCouple').value+")";
 if(document.getElementById('rdGrp').checked==true)	
    document.getElementById('sp_basis').innerHTML = "(Per &nbsp;"+document.getElementById('rdGrp').value+" of : "+document.getElementById('drpPerAdult').value+"-Adults,<br/>"+document.getElementById('drpKidBel12').value+"-kids <12Yrs and "+document.getElementById('drpKidAbv12').value+"-kids > 12Yrs)";
 if(document.getElementById('txtOther').checked==true)	
    document.getElementById('sp_basis').innerHTML = "(Per &nbsp;"+document.getElementById('rdOther').value+": "+document.getElementById('txtOther').value+")";
}

function chng_hdr_clr(id)
{
	document.getElementById(id).style.color="#ff0000";
}

function show_leads()
{
	show_block('Package_Form');
  show_section('Lead_Form','div_Package_Designer','div_Dashboard_Summary','div_Payment_Details','div_Service','div_Profile');
hide_block('Pay_btns');
hide_block('Pck_btns');
show_active_btn('Leads');
hide_block('div_onload_page');
}

function show_package()
{
	show_block('Package_Form');
	show_block('div_Package_Designer');
   show_block('create_pack');
    show_block('Pck_btns');
	show_active_btn('Create Package');
	hide_block('revise_pack');	
	hide_block('Pay_btns');
	 hide_block('modify_pack');	
	 hide_block('pck_crt_mod');
	 show_block('prev_div');
	 hide_block('div_onload_page');
	 show_section('div_Package_Designer','div_Dashboard_Summary','div_Payment_Details','div_Service','div_Profile','Lead_Form');
}

function modify_pck()
{
	show_block('Package_Form');
	show_block('div_Package_Designer');
    show_block('modify_pack');
	show_active_btn('Modify Package');
	hide_block('revise_pack');
	hide_block('Pay_btns');
	hide_block('create_pack');
	 hide_block('Pck_btns');
	 hide_block('pck_crt_mod');
	 hide_block('prev_div');
	 hide_block('div_onload_page');
	 show_section('div_Package_Designer','div_Dashboard_Summary','div_Payment_Details','div_Service','div_Profile','Lead_Form');
}

function revise_pck()
{
	show_block('Package_Form');
	show_block('div_Package_Designer');
	show_block('revise_pack')
    hide_block('modify_pack');
	show_active_btn('Revise Package');
	hide_block('Pay_btns');
	hide_block('create_pack');
	 hide_block('Pck_btns');
	 hide_block('pck_crt_mod');
	 hide_block('prev_div');
	 hide_block('div_onload_page');
	 show_section('div_Package_Designer','div_Dashboard_Summary','div_Payment_Details','div_Service','div_Profile','Lead_Form');
}

function show_dashboard()
{
	show_block('Package_Form');
	show_active_btn('Dashboard');
	show_section('div_Dashboard_Summary','div_Package_Designer','div_Payment_Details','div_Service','div_Profile','Lead_Form');
	hide_block('Pck_btns');
	hide_block('pck_crt_mod');
	hide_block('Pay_btns');
	hide_block('div_onload_page');
}

function show_services()
{
	show_block('Package_Form');
	show_active_btn('Services');
	show_section('div_Service','div_Dashboard_Summary','div_Package_Designer','div_Payment_Details','div_Profile','Lead_Form');
	hide_block('Pck_btns');
	hide_block('pck_crt_mod');
	hide_block('Pay_btns');
	hide_block('div_onload_page');
}

function show_content()
{
	show_block('Package_Form');
	show_active_btn('Access Previliges');
	show_section('div_Profile','div_Service','div_Dashboard_Summary','div_Package_Designer','div_Payment_Details','Lead_Form');
	hide_block('Pck_btns');
	hide_block('pck_crt_mod');
	hide_block('Pay_btns');
	hide_block('div_onload_page');
}

function show_payment()
{
	show_block('Package_Form');
	show_active_btn('Payment');
	show_block('Pay_btns');
	show_section('div_Payment_Details','div_Service','div_Dashboard_Summary','div_Package_Designer','div_Profile','Lead_Form');
	hide_block('Pck_btns');
	hide_block('pck_crt_mod');
	hide_block('div_onload_page');
}

function wrt_loc(loc)
{
	document.getElementById('searchPck_purc').value = loc;
	document.getElementById('searchPck').value = loc;
}

function trapz_clr_chng(id,id1,id2,id3,id4,id5,id6)
{
	document.getElementById(id).className="btn_semi_trapez_onFocus";
	document.getElementById(id1).className="btn_semi_trapez";
	document.getElementById(id2).className="btn_semi_trapez";
	document.getElementById(id3).className="btn_semi_trapez";
	document.getElementById(id4).className="btn_semi_trapez";
	document.getElementById(id5).className="btn_semi_trapez";
}

function chngColr(id,clr)
{
	document.getElementById(id).style.background = clr;
	document.getElementById(id).style.color="#fff";
}

function disbl(id1,id2)
{
	document.getElementById(id1).disabled= true;
	document.getElementById(id2).disabled= true;
}

function check_trp(id)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById('chkP2PIncl').checked = true;
		document.getElementById('chkC2CIncl').checked = true;
	}
	else
	{
		document.getElementById('chkP2PIncl').checked = false;
		document.getElementById('chkC2CIncl').checked == false;
	}
}

function chk_checked_p2p(id,div,sp,id2)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById(div).style.display='block';
		document.getElementById(sp).style.color = "#009900";
		load_dest_IC();  
	}
	else if(document.getElementById(id2).checked == true)
	{
		document.getElementById(div).style.display='none';
		document.getElementById(sp).style.color = "#ff0000";
	}
}

function chk_checked_c2c(id,div,sp,id2)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById(div).style.display='block';
		document.getElementById(sp).style.color = "#009900";
		 createMode(); 
	}
	else if(document.getElementById(id2).checked == true)
	{
		document.getElementById(div).style.display='none';
		document.getElementById(sp).style.color = "#ff0000";
	}
}

function Exclude_trvl(tab)
{
	var count = document.getElementById(tab).rows.length;
	for(var i=1; i<=count; i++)
	{
	document.getElementById(tab).deleteRow(i);
	}
}

function chk_checked_lcl(id,div,sp,id2)
{
	if(document.getElementById(id).checked == true)
	{
		document.getElementById(div).style.display='block';
		document.getElementById(sp).style.color = "#009900";
        createLMode(); 
	}
	else if(document.getElementById(id2).checked == true)
	{
		document.getElementById(div).style.display='none';
		document.getElementById(sp).style.color = "#ff0000";
	}
}

function calc_htl_pric(prc,dur,inp)
{
	var d = document.getElementById(dur).value;
	document.getElementById(inp).value = parseInt(prc)*parseInt(d);
}

function prc_trpt(prc,adlt,kid02,kid212,inp)
{
	var trv = parseInt(adlt)+(parseInt(kid212))/2;
	document.getElementById(inp).value = trv * prc;
}

var r=1;

function add_dep_date()
{
r++;
//alert(r);
var sp1 = document.createElement('span');
sp1.style.float="left";
sp1.style.marginLeft="5px";
var inp1 = document.createElement('input');
inp1.setAttribute("type","text");
inp1.setAttribute("class","txtbox_Tab");
inp1.style.width="80px";
inp1.setAttribute("id","txtdepDt_"+r);
inp1.setAttribute("name","txtdepDt_"+r);
inp1.onclick = function()
{
	oDP.show(event,this.id,2);
	show_block('datepick');
}
sp1.appendChild(inp1);

var sp2 = document.createElement('span');
sp2.style.float="left";
var inp2 = document.createElement('input');
inp2.setAttribute("type","button");
inp2.setAttribute("class","smallbtn");
inp2.style.width="40px";
inp2.setAttribute("value","Add");
inp2.onclick = function()
{
   add_dep_date();
}
sp2.appendChild(inp2);

document.getElementById('div_dep_dt').appendChild(sp1);
document.getElementById('div_dep_dt').appendChild(sp2);

document.getElementById('sp_dt_count').value = r;

}

function closed_cncls(time,comp,reg)
{
if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('closecncl_sum_tab').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?cncltime="+time+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}

function show_inv()
{
	document.getElementById('spInven').innerHTML = document.getElementById('txtNumPack').value;
	var c = document.getElementById('sp_dt_count').value;
	for(var i =1 ; i<=parseInt(c); i++)
	{
		if(i == c)
		document.getElementById('spTrpDts').innerHTML += document.getElementById('txtdepDt_'+i).value;
		else
		 document.getElementById('spTrpDts').innerHTML += document.getElementById('txtdepDt_'+i).value+",  ";
	}
}

function show_Query(QuerID, myID)
{
	show_block('Query_Dtls'); 
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('Query_Dtls').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?QueryID="+QuerID+"&MYID="+myID,true);
xmlhttp.send();
}

function crt_resp(resp, myID, QuerID)
{
	hide_block('Query_Dtls'); 

var txtResp = document.getElementById(resp).value;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('Query_Dtls').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Resp="+txtResp+"&MYID="+myID+"&QuerID="+QuerID+"&Status="+status,true);
xmlhttp.send();	
}


function open_query()
{
headerBtn_Color('btn_Services','btn_Packages','btn_Leads','btn_Dashboard','btn_profile','btn_payment');
show_services();
show_section('div_serv_quer','div_serv_req','div_serv_compl');
show_btn_color('btn_Serv_Query','btn_Serv_Request','btn_Serv_Complaint');
}

function open_leads()
{
headerBtn_Color('btn_Leads','btn_Services','btn_Packages','btn_Dashboard','btn_profile','btn_payment');
show_leads();
show_btn_color('btn_lead_new','btn_lead_quote','btn_lead_purc');
show_section('tab_new_lds','tab_quotes','tab_purchs');
}

function open_pcks(comp,reg)
{
headerBtn_Color('btn_Dashboard','btn_Leads','btn_Services','btn_Packages','btn_profile','btn_payment');
show_dashboard();
show_section('div_dash_pck','div_dash_inv','div_dash_purc','div_dash_cancel','div_dash_request');
show_btn_color('btn_dash_Package','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Cancel','btn_dash_Reqst');
trapz_clr_chng('btn_itd_post','btn_yest_post','btn_tday_post','btn_wkly_post','btn_ytd_post','btn_mtd_post');
showDashPeriod('ITD',comp,reg);
trapz_clr_chng('btn_itd_post','btn_yest_post','btn_tday_post','btn_wkly_post','btn_ytd_post','btn_mtd_post');}

function open_cncls(comp,reg)
{
headerBtn_Color('btn_Dashboard','btn_Leads','btn_Services','btn_Packages','btn_profile','btn_payment');
show_dashboard();
show_section('div_dash_cancel','div_dash_pck','div_dash_inv','div_dash_purc','div_dash_request');
show_btn_color('btn_dash_Cancel','btn_dash_Package','btn_dash_Inventory','btn_dash_Purchase','btn_dash_Reqst');
closed_cncls('Tday',comp,reg);
}

//---------------------------------------------------------- Change status of package posted to withdrawn --------------------------------------------------------
function withdraw_pop(pckId,myid)
{
	show_block('div_withdraw_pop');
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_withdraw_pop').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckpop=true&MYID="+myid+"&pckID="+pckId,true);
xmlhttp.send();	
}

function setStatus(pckid,myid,rId)
{
	var reason = document.getElementById(rId).value;
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
    document.getElementById("div_withdraw_pop").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckWithdraw=true&pID="+pckid+"&Reason="+reason,true);
xmlhttp.send();	
//hide_block('div_withdraw_pop');
}

function revisePck(pckid)
{
show_block('div_revisepck');
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revisepck').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?revisePck=true&pckID="+pckid,true);
xmlhttp.send();		
}

function revise_prc(pckId)
{
show_block('div_revise_prc');
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revise_prc').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?revisePrc=true&pckID="+pckId,true);
xmlhttp.send();			
}

function cnfrm_prc(pid,prc,cost,tax,cess)
{
	var price = document.getElementById(prc).value;
	var pckCost = document.getElementById(cost).value;
	var Serv = document.getElementById(tax).options[document.getElementById(tax).options.selectedIndex].value;
	var cess = document.getElementById(cess).value;
	var basis = document.frm.rdbasis_rev.value;
 if(confirm("Do you want to revise the price to INR "+price+" for package "+pid+"?")==true)
 {
	 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revise_prc').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckID="+pid+"&revPrc="+price+"&revCost="+pckCost+"&revServ="+Serv+"&revCess="+cess+"&revBasis="+basis,true);
xmlhttp.send();	
 }
 else
 {
	hide_block('div_revise_prc');
 }
}


function revise_offers(pckid)
{
	show_block('div_revise_offers');
	 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revise_offers').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?revOffers=true&PID="+pckid,true);
xmlhttp.send();	
}

function cnfrm_offers(pid,bnkNm,payMode,cardtype,cardNm,crdNmOth,offType,offDesc,valFrm,valTill)
{
	var bank = document.getElementById(bnkNm).value;
	var Mode = document.getElementById(payMode).options[document.getElementById(payMode).options.selectedIndex].value;
	var CardType = document.getElementById(cardtype).options[document.getElementById(cardtype).options.selectedIndex].value;
	var CardName = document.getElementById(cardNm).options[document.getElementById(cardNm).options.selectedIndex].value;
	if(CardName == "Other")
	  var CardName = document.getElementById(crdNmOth).value;
	var offerType = document.getElementById(offType).options[document.getElementById(offType).options.selectedIndex].value;  
	var offerDesc = document.getElementById(offDesc).value;
	var ValidFrm = document.getElementById(valFrm).value;
	var ValidTill = document.getElementById(valTill).value;
	
if(confirm("Do you want to revise the price to Discounts & Offers for package "+pid+"?")==true)
 {
	 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revise_offers').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?revOffers=true&PID="+pckid,true);
xmlhttp.send();	 
 }
 else
 {
	 hide_block('div_revise_offers');
 }
}

function revise_incl(pckid)
{
	show_block('div_revise_incl');
	 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revise_incl').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?revIncl=true&PID="+pckid,true);
xmlhttp.send();
}

function cnt_htlRows(pckid)
{
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_revHtl').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?cntHtlIncl_rev=true&PID="+pckid,true);
xmlhttp.send();			
}

function chkExpiry(pckid)
{
	show_block('pckMod_chkExp');
if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('pckMod_chkExp').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?chkExpiry=true&PID="+pckid,true);
xmlhttp.send();		
}

function putValVac(val,txt)
{
	if(document.getElementById(val).checked==true)
	{
	document.getElementById(txt).value +=val+", "; 
	}
	else
	{
		var st = new Array();
		var str = document.getElementById(txt).value;
		var spl = val+", ";
		st = str.split(spl);
		document.getElementById(txt).value = st[0]+st[1];
	}
}

function putValVac_sp(val,txt)
{
	if(document.getElementById(val).checked==true)
	{
	document.getElementById(val).checked = true;	
	document.getElementById(txt).value +=val+", "; 
	}
	else
	{
		document.getElementById(val).checked = false;	
		var st = new Array();
		var str = document.getElementById(txt).value;
		var spl = val+", ";
		st = str.split(spl);
		document.getElementById(txt).value = st[0]+st[1];
	}
}

ag_count=0;
function putValIncl(id,val,txt)
{
	if(document.getElementById(id).checked==true)
	{
	document.getElementById(txt).value +=val+", "; 
	ag_count = ag_count+1;
	}
	else
	{
		ag_count = ag_count-1;
		var st = new Array();
		var str = document.getElementById(txt).value;
		var spl = val+", ";
		st = str.split(spl);
		document.getElementById(txt).value = st[0]+st[1];
	}
	if(ag_count > 1)
	{
		document.getElementById('chkMod_multi').checked =true;
	}
}


function openPck_mod(pckid)
{
	show_block('div_mod_pck');
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_mod_pck').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/modifyPck.php?modifyPck=true&pckID="+pckid,true);
xmlhttp.send();		
}

function selTxt(Val,txtID)
{
	document.getElementById(txtID).value = Val;
}

function tabMod_rows()
{
  document.getElementById('txtAttrmod_rows').value = parseInt(document.getElementById('mod_attr').rows.length); 
  document.getElementById('txtHtlMod_rows').value = parseInt(document.getElementById('tabMod_htl').rows.length); 
  document.getElementById('txtp2pMod_rows').value = parseInt(document.getElementById('tabMod_p2p').rows.length); 
  document.getElementById('txtlclMod_rows').value = parseInt(document.getElementById('tabMod_lcl').rows.length); 
  document.getElementById('txtoffMod_rows').value = parseInt(document.getElementById('tab_discounts_Mod').rows.length); 
  document.getElementById('txtdedcMod_rows').value = parseInt(document.getElementById('tab_cncl_terms_Mod').rows.length); 
   document.getElementById('txtrefMod_rows').value = parseInt(document.getElementById('tab_refund_Mod').rows.length); 
}

function showAge(id,div)
{
	if(document.getElementById(id).checked == true)
	  show_block(div);
	 else
	  hide_block(div);
}

function ldLoc_mod(st)
{
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_locMod').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?locMod=true&state="+st,true);
xmlhttp.send();		
}

function ldSt_mod(c)
{
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_cntrMod').innerHTML = xmlhttp.responseText;
			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?StMod=true&Country="+c,true);
xmlhttp.send();		
}

function mkEdit_tr(tr)
{
	document.getElementById(tr).style.display='table-row';
}

function putValTxt(valid,txtid)
{
	document.getElementById(txtid).value += document.getElementById(valid).value+", ";
}

function addLocs(val)
{
	document.getElementById('txtMod_loc').value +=val+", ";
}

function show_SubUser(id,reg)
{
	 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_editSubUser').innerHTML = xmlhttp.responseText;			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?subUser=true&userID="+id+"&regBy="+reg,true);
xmlhttp.send();	
}

function passEditVals(id,Uname,desg,cmp,hd,regn,eml,Dt,chkld,chkpck,chkdb,chkServ,chkPrf,chkPay,regBy)
{
	var userName = document.getElementById(Uname).value;
	var Designation = document.getElementById(desg).value;
	var company = document.getElementById(cmp).value;
	var Headqtr = document.getElementById(hd).value;
	var regional = document.getElementById(regn).value;
	var userID = document.getElementById(eml).value;
	var dateReg = document.getElementById(Dt).value;
	
	if(document.getElementById(chkld).checked == true)
	var Lead = "YES-";
	else
	 var Lead = "NO";
	
	if(document.getElementById(chkpck).checked == true)
	var Pckg = "YES-";
	else
	 var Pckg = "NO";
	
	if(document.getElementById(chkdb).checked == true)
	var Dash = "YES-";
	else
	 var Dash = "NO";
	
	if(document.getElementById(chkServ).checked == true)
	var Serv = "YES-";
	else
	 var Serv = "NO";
	
	if(document.getElementById(chkPrf).checked == true)
	var Prof = "YES-";
	else
	 var Prof = "NO";
	
	if(document.getElementById(chkPay).checked == true)
	var Pay = "YES-";
	else
	 var Pay = "NO";
	 
	  if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_editSubUser').innerHTML = xmlhttp.responseText;			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?EditUser=true&userID="+id+"&EmpName="+userName+"&CmpName="+company+"&Desg="+Designation+"&HdQ="+Headqtr+"&Regl="+regional+"&userEml="+userID+"&regDt="+dateReg+"&Leads="+Lead+"&Pckgs="+Pckg+"&DashB="+Dash+"&Serv="+Serv+"&Prf="+Prof+"&Pay="+Pay+"&regBy="+regBy,true);
xmlhttp.send();	
}

function deactUser(id)
{
	alert(id);
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("XMLHTTP.Microsoft");
	}
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status==200)
		{
			document.getElementById('div_editSubUser').innerHTML = xmlhttp.responseText;			
		}
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?userDeact=true&userEml="+id,true);
xmlhttp.send();		
}

function blink_fonts() 
{
 if (i == 1) {
    document.getElementById('cnt_query').style.display = 'none';
	document.getElementById('cnt_leads').style.display = 'none';
	document.getElementById('cnt_sold').style.display = 'none';
	document.getElementById('cnt_cncel').style.display = 'none';
 } 
 
 else {
      document.getElementById('cnt_query').style.display = 'block';
	  document.getElementById('cnt_leads').style.display = 'block';
	  document.getElementById('cnt_sold').style.display = 'block';
	  document.getElementById('cnt_cncel').style.display = 'block';
  }

 if(i == 1) i = 0;
 else
    i=1;
	}
