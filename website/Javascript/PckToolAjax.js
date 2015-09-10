//--------------------------------------------------------------------------  Change of Vacation ----------------------------------------------------------
function sortPostVac(val,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?postVac="+val+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();	
}


//-------------------------------------------------------------  Change of Month and Year ------------------------------------------------------

function sortDashMY(comp,reg, myID)
{
	var mnth = document.getElementById('drpPost_mnth').options[document.getElementById('drpPost_mnth').options.selectedIndex].value;
	var year = document.getElementById('drpPost_year').options[document.getElementById('drpPost_year').options.selectedIndex].value;
	
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Postmnth="+mnth+"&Postyear="+year+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();	
}

//------------------------------------------------------------------------  Sort Posted price  -----------------------------------------------------------------------
function sortPostprc(val,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPostPrc="+val+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();		
}



//------------------------------------------------------------------------  Sort purchase date Ascending -----------------------------------------------------------------------
function sortPostDate(type,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?postDtSort="+type+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();		
}


//------------------------------------------------------------------------  Sort package name  -----------------------------------------------------------------------
function sortPostName(type,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPostName="+type+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();		
}

//------------------------------------------------------------------------  Sort location name -----------------------------------------------------------------------
function sortPostLoc(type,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPostLoc="+type+"&Comp="+comp+"&Reg="+reg+"&myID="+myID,true);
xmlhttp.send();	
}


//------------------------------------------------------------------------  Posted package periodic sort -----------------------------------------------------------------------
function showDashPeriod(time,comp,reg, myID)
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
    document.getElementById("post_Tab").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?postTime="+time+"&Comp="+comp+"&Reg="+reg+"&MYID="+myID,true);
xmlhttp.send();		
}



//--------------------------------------------------------------------- Dashboard - Purchase ----------------------------------------------------------------------------


//--------------------------------------------------------------------------  Change of Location ----------------------------------------------------------
function sortPurcLoc(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcLoc="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}

//------------------------------------------------------------------------------  Change of Date --------------------------------------------------------------------
function sortPurcDate(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcDate="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}

//-------------------------------------------------------------  Change of Month and Year ------------------------------------------------------

function sortPurcMY()
{
	var mnth = document.getElementById('drpPurcMonth').options[document.getElementById('drpPurcMonth').options.selectedIndex].value;
	var year = document.getElementById('drpPurcYear').options[document.getElementById('drpPurcYear').options.selectedIndex].value;

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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcMonth="+mnth+"&sortPurcYear="+year+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}

//------------------------------------------------------------------- Change of Price Range-------------------------------------------------------------------------

function sortPurcPrc(val,comp,reg)
{
	var str = document.getElementById('drpDashPrice_purc').options[document.getElementById('drpDashPrice_purc').options.selectedIndex].value;
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcPrc="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}

//------------------------------------------------------------------------  Sort Vacation Ascending -----------------------------------------------------------------------

function sortPurcVac(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcVac="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}

//------------------------------------------------------------------------  Sort package name Ascending -----------------------------------------------------------------------
function sortPurcName(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcName="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}


//------------------------------------------------------------------------  Show periodic purchase -----------------------------------------------------------------------
function PeriodicPurc(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?purcTime="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}



//------------------------------------------------------------------  Sort Duration purchase ----------------------------------------------------
function sortPurcDur(val,comp,reg)
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
    document.getElementById("txt_Tab_purc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortPurcDur="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}



//-------------------------------------------------------------  Change of Month and Year - Inventory ------------------------------------------------------

function PeriodicInv(time,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?invTime="+time+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
	
}

function sortDashMY_inv()
{
	var mnth_inv = document.getElementById('drpDash_mnth_inv').options[document.getElementById('drpDash_mnth_inv').options.selectedIndex].value;
	var year_inv = document.getElementById('drpDash_year_inv').options[document.getElementById('drpDash_year_inv').options.selectedIndex].value;
	
	var ID= document.getElementById('div_clntID').innerHTML ; 
	
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?mnth_inv="+mnth+"&year_inv="+year+"&ID="+ID,true);
xmlhttp.send();	
}

//------------------------------------------------------------- Sort Package Name for Inventory -----------------------------------------------------------
function sortInvName(val,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortInvName="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();	
}

//--------------------------------------------------------------------- Sort Validity - Inventory -----------------------------------------------------------------
function sortValidDt_inv()
{
	var Dt1 = document.getElementById('txtValFrom_inv').value ; 
	var Dt2 = document.getElementById('txtValTo_inv').value;
	
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Dt1_inv="+Dt1+"Dt2_inv="+Dt2+"&ID="+ID,true);
xmlhttp.send();	
}



//------------------------------------------------------------------------  Sort price  - Inventory-----------------------------------------------------------------------
function sortInvPrc(val,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortInvPrc="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}

//------------------------------------------------------------------------  Sort Vacation -Inventory -----------------------------------------------------------------------

function sortInvVac(val,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortInvVac="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}


//------------------------------------------------------------------------------- Sort Validity -----------------------------------------------------------------

function sortInvValid(val,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortInvValid="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
}

function sortInvDate(val,comp,reg)
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
    document.getElementById("txt_Tab_inv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?sortInvDate="+val+"&Comp="+comp+"&Reg="+reg,true);
xmlhttp.send();		
	
}

//------------------------------------------------------------   Dashboard Cancellations ----------------------------------------------------------------

function closed_cncls(time,comp,reg)
{
	document.getElementById('closecncl_sum_tab').style.display='block';
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



//------------------------------------------------------------------------- Modify Package ---------------------------------------------------------------------------
//---------------------------------------------------------------------Sort Package title - Asc -------------------------------------------------------------------
function pckMod_sort(type)
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckMod_sort="+type+"&ID="+ID,true);
xmlhttp.send();		
}


//---------------------------------------------------------------------Sort Package Date - Asc -------------------------------------------------------------------
function pckModDt_sort(type)
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckModDt_sort="+type+"&ID="+ID,true);
xmlhttp.send();		
}


//---------------------------------------------------------------------Sort Package Location - Asc -------------------------------------------------------------------
function pckModLoc_sort(type)
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckModLoc_sort="+type+"&ID="+ID,true);
xmlhttp.send();		
}


//----------------------------------------------------------------------------  Show By Location  -------------------------------------------------------------------
function show_Loc()
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
	var loc = document.getElementById('drpMod_loc').options[document.getElementById('drpMod_loc').options.selectedIndex].value;
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?locMod="+loc+"&ID="+ID,true);
xmlhttp.send();		
}

//----------------------------------------------------------------------------  Show By Vacation  -------------------------------------------------------------------
function show_Vac()
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
	var vac = document.getElementById('drpMod_vac').options[document.getElementById('drpMod_vac').options.selectedIndex].value;
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?vacMod="+vac+"&ID="+ID,true);
xmlhttp.send();		
}

//----------------------------------------------------------------------------  Show Within Dates  -------------------------------------------------------------------
function show_InDates()
{
	var ID= document.getElementById('div_clnt_id').innerHTML ; 
	var dt1 = document.getElementById('pck_date1').value;
	var dt2 = document.getElementById('pck_date2').value;
	
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
    document.getElementById("div_mod").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?pckDt1="+dt1+"pckDt2="+dt2+"&ID="+ID,true);
xmlhttp.send();		
}

//----------------------------------------------------------------------------------- Dashboard Cancellation -----------------------------------------------------------
//------------------------------------------------------------------  Sort Duration - Cancellation ----------------------------------------------------
function sortDashDur_cncl()
{
	var dur = document.getElementById('drpDur_cncl').options[document.getElementById('drpDur_cncl').options.selectedIndex].value;
var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("txt_Tab_cancel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?Dur_cncl="+dur+"&ID="+ID,true);
xmlhttp.send();		
}

//------------------------------------------------------------------------  Sort location name Ascending -----------------------------------------------------------------------
function locNameAsc_cncl()
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("txt_Tab_cancel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?locNameAsc_cncl="+true+"&ID="+ID,true);
xmlhttp.send();	
}

//------------------------------------------------------------------------  Sort location name descending -----------------------------------------------------------------------

function locNameDesc_cncl()
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("txt_Tab_cancel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?locNameDesc_cncl="+true+"&ID="+ID,true);
xmlhttp.send();		
}

//----------------------------------------------------------------- Lead Details Pop up ------------------------------------------------------------------------

function Show_newLead(wlID, LID, UName, LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_leads").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID="+wlID+"&LeadID="+LID+"&ID="+ID+"&LDate="+LDate+"&UName="+UName,true);
xmlhttp.send();		
}

//----------------------------------------------------------------- Quote Details Pop up ------------------------------------------------------------------------

function Show_newQuotes(LID, QID)
{
	//var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_response").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/Quote_dtls_popup_ajax.php?LID="+LID+"&QID="+QID,true);
xmlhttp.send();		
}

//------------------------------------------------   View Lead ----------------------------------------------------------------------------

function viewLead(WLID,LID,UName,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
     document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_View="+WLID+"&LID_View="+LID+"&ID="+ID+"&UName="+UName+"&LDate="+LDate,true);
xmlhttp.send();		
}

//------------------------------------------------   Reject Lead ----------------------------------------------------------------------------

function rejLead(WLID,LID,UName,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_rej="+WLID+"&LID_rej="+LID+"&ID="+ID+"&UName="+UName+"&LDate="+LDate,true);
xmlhttp.send();		
}

//------------------------------------------------   Accept Lead ----------------------------------------------------------------------------

function acptLead(WLID,LID,UName,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_acp="+WLID+"&LID_acp="+LID+"&ID="+ID+"&UName="+UName+"&LDate="+LDate,true);
xmlhttp.send();		
}


//------------------------------------------------   Viewed - Quote Lead ----------------------------------------------------------------------------

function viewLead_Q(WLID,LID,Uname,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_View_q="+WLID+"&LID_View_q="+LID+"&ID="+ID+"&UName="+Uname+"&LDate="+LDate,true);
xmlhttp.send();		
}

//------------------------------------------------   Viewed - Reject Lead ----------------------------------------------------------------------------

function rejLead_view(WLID,LID,UName,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_rej_view="+WLID+"&LID_rej_view="+LID+"&ID="+ID+"&UName="+UName+"&LDate="+LDate,true);
xmlhttp.send();		
}

//------------------------------------------------   Viewed - Accept Lead ----------------------------------------------------------------------------

function acptLead_view(WLID,LID,UName,LDate)
{
	var ID= document.getElementById('div_clntID').innerHTML ; 
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
    document.getElementById("dtls_lead").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/lead_dtls_popup_ajax.php?WLID_acp_view="+WLID+"&LID_acp_view="+LID+"&ID="+ID+"&UName="+UName+"&LDate="+LDate,true);
xmlhttp.send();		
}

