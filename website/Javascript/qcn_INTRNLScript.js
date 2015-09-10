function show_block(id)
{
document.getElementById(id).style.display='block';
}

function hide_block(id)
{
document.getElementById(id).style.display='none';
}

function reset_pwd()
{
  window.open(document.getElementById('sp_lnk').innerHTML);
}

function headerBtn_Color(btn,btn1,btn2,btn3,btn4,btn5,btn6,btn7,btn8,btn9)
{
	    document.getElementById(btn).className="arrow_act";
		document.getElementById(btn1).className ="arrow_box";
		document.getElementById(btn2).className ="arrow_box";
		document.getElementById(btn3).className ="arrow_box";
		document.getElementById(btn4).className ="arrow_box";
		document.getElementById(btn5).className ="arrow_box";
		document.getElementById(btn6).className ="arrow_box";
		document.getElementById(btn7).className ="arrow_box";
		document.getElementById(btn8).className ="arrow_box";
		document.getElementById(btn9).className ="arrow_box";
}

function trapz_clr_chng(id,id1,id2,id3,id4,id5)
{
	document.getElementById(id).className="btn_semi_trapez_onFocus";
	document.getElementById(id1).className="btn_semi_trapez";
	document.getElementById(id2).className="btn_semi_trapez";
	document.getElementById(id3).className="btn_semi_trapez";
	document.getElementById(id4).className="btn_semi_trapez";
	document.getElementById(id5).className="btn_semi_trapez";
}

function showDiv(d1,d2,d3,d4,d5,d6,d7,d8,d9,d10)
{
	document.getElementById(d1).style.display='block';
	document.getElementById(d2).style.display='none';
	document.getElementById(d3).style.display='none';
	document.getElementById(d4).style.display='none';
	document.getElementById(d5).style.display='none';
	document.getElementById(d6).style.display='none';
	document.getElementById(d7).style.display='none';
	document.getElementById(d8).style.display='none';
	document.getElementById(d9).style.display='none';
	document.getElementById(d10).style.display='none';
}

function userYest()
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
    document.getElementById("txt_trf_status").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?yest=true",true);
xmlhttp.send();	
}

function userTday()
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
    document.getElementById("txt_trf_status").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?tDay=true",true);
xmlhttp.send();	
}

function userWeek()
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
    document.getElementById("txt_trf_status").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?week=true",true);
xmlhttp.send();	
}

function userMTD()
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
	 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById("txt_trf_status").innerHTML = xmlhttp.responseText;
	 }
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?mnth=true",true);
xmlhttp.send();
}

function userYTD()
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
	 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById("txt_trf_status").innerHTML = xmlhttp.responseText;
	 }
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?year=true",true);
xmlhttp.send();
}

function userITD()
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
	 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById("txt_trf_status").innerHTML = xmlhttp.responseText;
	 }
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?ITD=true",true);
xmlhttp.send();
}

function sortDate()
{
	var d1 = document.getElementById('frmDateTrf').value;
	var d2 = document.getElementById('toDateTrf').value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('txt_trf_status').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?date1="+d1+"&date2="+d2,true);
xmlhttp.send();
}

function chng_bckgrnd(id1,id2,id3)
{
	document.getElementById(id1).style.background ='#ff0000';
	document.getElementById(id2).style.background = '#597272';
	document.getElementById(id3).style.background = '#597272';
}

function clnt_id(id,myID)
{
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	 {
		 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
		document.getElementById('div_chngStus').innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?ID="+id+"&MYID="+myID,true);
xmlhttp.send();
}

function update_user(id)
{
	var st = document.getElementById('drpStatusChng').options[document.getElementById('drpStatusChng').options.selectedIndex].value;
	var res = document.getElementById('txtAreason').value;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	 {
		 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
		document.getElementById('div_chngStus').innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?UpdID="+id+"&status="+st+"&resn="+res,true);
xmlhttp.send();	
}

function reset_pwd_admin(Eml,myID)
{
 if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	 {
		 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
		document.getElementById('div_chngStus').innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?EmlPwd="+Eml+"&MYID="+myID,true);
xmlhttp.send();	
}

function open_reset_pwd(id)
{
	window.open("Pwd_reset.php?emlID="+id);
}

function sortCustEml(id,myID)
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_cust_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?eID="+id+"&MYID="+myID,true);
 xmlhttp.send();
}


function load_cust(myID)
{
if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_cust_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?cust=true&MYID="+myID,true);
 xmlhttp.send();	
}

function load_b2b(myID)
{
if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_b2b_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?b2b=true&MYID="+myID,true);
 xmlhttp.send();	
}



function sortCustDor(id,myID)
{
	var dor = document.getElementById(id).value;
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_cust_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?DOR="+dor+"&MYID="+myID,true);
 xmlhttp.send();
}

function sortB2bDor(id,myID)
{
	var dorB2b = document.getElementById(id).value;
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_b2b_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?DORB2b="+dorB2b+"&MYID="+myID,true);
 xmlhttp.send();	
}

function sortTrfStatus(val)
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_trf_sts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?TrfSt="+val,true);
 xmlhttp.send();	
}

function update_tier(id,val)
{
if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_trf_sts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?ID="+id+"&Tier="+val,true);
 xmlhttp.send();		
}

function load_leads()
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_leads_tr').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?leads=true",true);
 xmlhttp.send();	
}

function load_quotes()
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_quotes_tr').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?quotes=true",true);
 xmlhttp.send();	
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

function show_btn_color(id1,id2,id3,id4,id5,id6)
{
		document.getElementById(id1).style.color='#ff0000';
		document.getElementById(id2).style.color='#fff';
		document.getElementById(id3).style.color='#fff';
		document.getElementById(id4).style.color='#fff';
		document.getElementById(id5).style.color='#fff';
		document.getElementById(id6).style.color='#fff';	
}

function userEnquiry(time,myID)
{
	if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?enq=true&MYID="+myID+"&time="+time,true);
xmlhttp.send();
}

function show_enq(div,id,myID)
{
	document.getElementById(div).style.display='block';
		if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq_pop').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?enqID="+id+"&MYID="+myID,true);
xmlhttp.send();
}

function show_tr(id)
{
	document.getElementById(id).style.display='table-row';
}


function updt_resp(id,myID,txt)
{
	var txtA = document.getElementById(txt).value;
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq_pop').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?UpdtEnqID="+id+"&MYID="+myID+"&resp="+txtA,true);
xmlhttp.send();		
}

function set_status(id,myID,st)
{	
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
else
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq_pop').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?UpdtStatID="+id+"&MYID="+myID+"&stat="+st,true);
xmlhttp.send();			
}

function userEnqITD(myID)
{
	if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?enqITD=true&MYID="+myID,true);
xmlhttp.send();
}

function rest_Utab(eml,id,txt)
{
	var txtA = document.getElementById(txt).value;
	if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('div_enq').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?resetEml="+eml+"&MYID="+myID+"&txtReset="+txtA,true);
xmlhttp.send();
}

function userLogout(id)
{
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('body_container').innerHTML ="";
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?clntIDLog="+id,true);
xmlhttp.send();
}

function load_logs(role,time)
{
	document.getElementById('div_b2e_logs').style.display='block';

if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('b2e_logs2').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?role="+role+"&logtimeHdr="+time,true);
xmlhttp.send();	
}

function show_emp(ID,role)
{
	document.getElementById('div_user_logs').style.display='block';
	if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('user_log_tab').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?b2e_logs_dtls=true&ID="+ID+"&role="+role,true);
xmlhttp.send();
}

function show_emp_oncount(val,role)
{
	var time = document.getElementById('spLogTime').innerHTML;

document.getElementById('b2e_logs2').innerHTML = "";

if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('b2e_logs2').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?empLogCount=true&C="+val+"&role="+role+"&time="+time,true);
xmlhttp.send();	
}

function periodic_logs(time)
{
	var role = document.getElementById('spClient').innerHTML;
	document.getElementById('spLogTime').innerHTML = time;
	
	document.getElementById('div_b2e_logs').style.display='block';
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('b2e_logs2').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?b2e_logs_2=true&role="+role+"&logtime="+time,true);
xmlhttp.send();	
	
}

function wrt_clnt(val)
{
	document.getElementById('spClient').innerHTML = val;
}

function periodic_leads(time)
{
document.getElementById('div_leads_tr').style.display='block';
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('div_leads_tr').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?LdTime="+time,true);
xmlhttp.send();		
}

function periodic_Quote(time)
{

 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_quotes_tr').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?QTime="+time,true);
 xmlhttp.send();		
}

function show_leadLoc(Loc)
{
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('div_leads_tr').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?ldLoc="+Loc,true);
xmlhttp.send();		
}

function show_QtLoc(Loc)
{
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('div_quotes_tr').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?QtLoc="+Loc,true);
xmlhttp.send();		
}

function show_date1(dt1,dt2)
{
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
  document.getElementById('div_leads_tr').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?ldLoc="+Loc,true);
xmlhttp.send();	
}

function sortB2bUEml(val,myID)
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_b2b_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?eb2bID="+val+"&MYID="+myID,true);
 xmlhttp.send();
}

function sortB2bComp(val,myID)
{
 if(window.XMLHttpRequest)
 {
	 xmlhttp = new XMLHttpRequest();
 }
 else
 {
	 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange = function()
 {
	 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	 {
		 document.getElementById('div_b2b_sorts').innerHTML = xmlhttp.responseText;
	 }
 }
 xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?comp="+val+"&MYID="+myID,true);
 xmlhttp.send();	
}

function showPostPeriod(time)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?posttime="+time,true);
xmlhttp.send();		
}

function showPurcPeriod(time)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?purctime="+time,true);
xmlhttp.send();		
}

function showInvPeriod(time)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?invtime="+time,true);
xmlhttp.send();		
}

function sortinvMY()
{
	var month = document.getElementById('drpDash_mnth_inv').options[document.getElementById('drpDash_mnth_inv').options.selectedIndex].value;
	var year =  document.getElementById('drpDash_year_inv').options[document.getElementById('drpDash_year_inv').options.selectedIndex].value;
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?invMonth="+month+"&invYear="+year,true);
xmlhttp.send();	
}

function showCnclPeriod(time)
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
    document.getElementById("cncl_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?qcncltime="+time,true);
xmlhttp.send();		
}

function sortpostDate(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostDtSort="+val,true);
xmlhttp.send();		
}

function sortpostMY()
{
	var month = document.getElementById('drpDash_mnth').options[document.getElementById('drpDash_mnth').options.selectedIndex].value;
	var year = document.getElementById('drpDash_year').options[document.getElementById('drpDash_year').options.selectedIndex].value;
	
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostMnth="+month+"&pckPostYear="+year,true);
xmlhttp.send();		
}


function sortpostName(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostNameSort="+val,true);
xmlhttp.send();		
}

function sortpostDur(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostDurSort="+val,true);
xmlhttp.send();		
}

function sortpostprc(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostPrcSort="+val,true);
xmlhttp.send();		
}

function sortpostVac(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostVacSort="+val,true);
xmlhttp.send();		
}

function sortpostLoc(val)
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
    document.getElementById("post_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPostLocSort="+val,true);
xmlhttp.send();		
}

function sortpurcDate(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcDtSort="+val,true);
xmlhttp.send();		
}

function sortpurcName(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcNameSort="+val,true);
xmlhttp.send();		
}

function sortpurcMY()
{
	var month = document.getElementById().options[document.getElementById().options.selectedIndex].value;
	var year = document.getElementById().options[document.getElementById().options.selectedIndex].value;
	
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcMonth="+month+"&pckPurcYear="+year,true);
xmlhttp.send();		
}

function sortpurcYear(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcYear="+val,true);
xmlhttp.send();		
}

function sortpurcDur(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcDurSort="+val,true);
xmlhttp.send();		
}

function sortpurcPrc(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcPrcSort="+val,true);
xmlhttp.send();		
}

function sortpurcVac(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcVacSort="+val,true);
xmlhttp.send();		
}

function sortpurcLoc(val)
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
    document.getElementById("purc_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckPurcLocSort="+val,true);
xmlhttp.send();		
}

function sortinvDate(val)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckInvDtSort="+val,true);
xmlhttp.send();		
}

function sortinvName(val)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckInvNameSort="+val,true);
xmlhttp.send();		
}


function sortinvPrc(val)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckInvPrcSort="+val,true);
xmlhttp.send();		
}

function sortinvVac(val)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckInvVacSort="+val,true);
xmlhttp.send();		
}

function sortinvValid(val)
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
    document.getElementById("inv_sum_tabs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?pckInvValidSort="+val,true);
xmlhttp.send();		
}

function sortLeadDate()
{
    var val1 = document.getElementById('ldDt1').value;
	var val2 = document.getElementById('ldDt2').value;

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
    document.getElementById("div_leads_tr").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?leadDate1="+val1+"&leadDate2="+val2,true);
xmlhttp.send();		
}

function sortQuoteDate()
{
	var val1 = document.getElementById('txtQtDt1').value;
	var val2 = document.getElementById('txtQtDt2').value;

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
    document.getElementById("div_quotes_tr").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?quoteDt1="+val1+"&quoteDt2="+val2,true);
xmlhttp.send();		
}

function userqcnclPeriod(time)
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
    document.getElementById("qcncncl_sum_tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?cnclTime="+time,true);
xmlhttp.send();		
}

function AddRowReq()
{
	var tab = document.getElementById('tab_openCncl');
	var  j = tab.rows.length;
	
	var row = tab.insertRow(j);
	
	var cell = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txtReqID_"+j);
	i.setAttribute("name","txtReqID_"+j);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="98%";
	i.style.padding="1px";
	cell.appendChild(i);
	
	var cell = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txtPurcType_"+j);
	i.setAttribute("name","txtPurcType_"+j);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="98%";
	i.style.padding="1px";
	cell.appendChild(i);
	
	var cell = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txtTrxnID_"+j);
	i.setAttribute("name","txtTrxnID_"+j);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="98%";
	i.style.padding="1px";
	cell.appendChild(i);
	
	var cell = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txtReason_"+j);
	i.setAttribute("name","txtReason_"+j);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="98%";
	i.style.padding="1px";
	cell.appendChild(i);
	
	var cell = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txtReqDate_"+j);
	i.setAttribute("name","txtReqDate_"+j);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="98%";
	i.style.padding="1px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block("TripDate");
	}
	cell.appendChild(i);
	
	var cell = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.style.width="98%";
	i.style.padding="1px";
	i.setAttribute("id",j);
	i.setAttribute("value","Cancel");
	i.onclick = function()
	{
		show_block('div_cancel_pck');
		show_pck('txtPurcType_'+this.id,'txtTrxnID_'+this.id,'txtReqDate_'+this.id,'txtReason_'+this.id,'txtReqID_'+this.id);
	}
	cell.appendChild(i);
	
	var cell = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.style.width="98%";
	i.style.padding="1px";
	i.setAttribute("value","Add New Request");
	i.onclick = function()
	{
	  	AddRowReq();
	}
	cell.appendChild(i);
	
}

function show_pck(pck_id, trxn_id, myID, reqDt, rsID, reqID)
{
	var pck = document.getElementById(pck_id).value;
	var trxn = document.getElementById(trxn_id).value;
	var reqdt = document.getElementById(reqDt).value;
	var reas  = document.getElementById(rsID).value;
	var reqId = document.getElementById(reqID).value;
	
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
			document.getElementById('cncl_pop').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?cnclpck_id="+pck+"&cncltrxn_id="+trxn+"&MYID="+myID+"&Req_Dt="+reqdt+"&Req_ID="+reqId+"&Reason="+reas,true);
xmlhttp.send();	
}

function cal_prc(per,prc)
{
	var cent =  parseInt(prc)*(parseInt(per)/100);
	var val = parseInt(prc)-parseInt(cent);
	document.getElementById('ref_amt').value = val;
}

function insrt_cncl(Perc,Ref_Dt,Reason,myID,Req_ID,Req_Dt,pck_id,trxn_id)
{
	var perc = document.getElementById(Perc).value;
	var refDt = document.getElementById(Ref_Dt).value;
	
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
			document.getElementById('cncl_pop').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?Perc="+perc+"&Ref_Dt="+refDt+"&MYID="+myID+"&Req_Dt="+Req_Dt+"&Reason="+Reason+"&Req_ID="+Req_ID+"&trxnID="+trxn_id+"&pckID="+pck_id,true);
xmlhttp.send();	
}


function userQuery(time)
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
			document.getElementById('query_tab').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?querytime="+time,true);
xmlhttp.send();		
}

function readQuery_Resp(queryID)
{
	document.getElementById('div_qresp').style.display='block';
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
			document.getElementById('div_qresp').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?QueryID="+queryID,true);
xmlhttp.send();	
}

function checkUserExist()
{
	var uName = document.getElementById('txtUserName').value;
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
			document.getElementById('div_userExist').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?userExist="+uName,true);
xmlhttp.send();		
}

function deactUser()
{
	var uID = document.getElementById('txtUserName').value;
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
			document.getElementById('div_userExist').innerHTML = xmlhttp.responseText;
		}
	}
xmlhttp.open("GET","PHP_Files/qcn_internal_php.php?userDeact="+uID,true);
xmlhttp.send();		
}


function chk_all_admin(val)
{
	if(val =="Admin")
	{
		document.getElementById('chk_eml').checked="true";
		document.getElementById('chk_log').checked="true";
		document.getElementById('chk_social').checked="true";
		document.getElementById('chk_admin').checked="true";
		document.getElementById('chk_ld_qt').checked="true";
		document.getElementById('chk_pckg').checked="true";
		document.getElementById('chk_enq').checked="true";
		document.getElementById('chk_pay').checked="true";
		document.getElementById('chk_cncl').checked="true";
		document.getElementById('chk_reg').checked="true";
	}
	else if(val=="Select" || val=="User")
	{
		document.getElementById('chk_eml').checked="false";
		document.getElementById('chk_log').checked="false";
		document.getElementById('chk_social').checked="false";
		document.getElementById('chk_admin').checked="false";
		document.getElementById('chk_ld_qt').checked="false";
		document.getElementById('chk_pckg').checked="false";
		document.getElementById('chk_enq').checked="false";
		document.getElementById('chk_pay').checked="false";
		document.getElementById('chk_cncl').checked="false";
		document.getElementById('chk_reg').checked="false";
	}
}

function upload_days()
{
	var drp_days = document.getElementById('drpDay');
drp_days.add(new Option("Day","Day"));

if(document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Jan" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Mar" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "May" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Jul" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Aug" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Oct" || document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Dec")
	{
		for(var i=1; i<=31; i++)
		  {
			drp_days.add(new Option(""+i+"",""+i+""));  
		  }
	}
	else if(document.getElementById('drpMonth').options[document.getElementById('drpMonth').options.selectedIndex].value == "Feb")
	 {
		for(var i=1; i<=28; i++)
		  {
			drp_days.add(new Option(""+i+"",""+i+""));  
		  }
	}
	else
	{
		for(var i=1; i<=30; i++)
		  {
			drp_days.add(new Option(""+i+"",""+i+""));  
		  }
	}

}
