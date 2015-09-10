function show_block(id)
{
	document.getElementById(id).style.display='block';
}

function hide_block(id)
{
	document.getElementById(id).style.display='none';
}


function getip(json){
  ip = json.ip;
 alert(ip);
}


function wrt_locPck(loc)
{
	document.getElementById('searchPck').value = loc;
}

function wrt_loc(loc)
{
	document.getElementById('searchid').value = loc;
}

function insertQS(secure)
{
	loc = document.getElementById('searchid').value;
	if(loc == "  ")
	{
	  alert("Error : Please enter a place or a category or an attraction to search");
	}
	else
	{
	loc = loc.toUpperCase();
	document.getElementById('hrefExplore').href = "ExploreDest_Cityscape.php?id=kjsdhf kahd ahsdakldjalkd jlakdjlkas jaskl djakajkdasjdks&p="+loc+"&secure="+secure;
    }
}

function insertQS_cust(secure)
{
	var loc = document.getElementById('searchid').value;
	var id= document.getElementById('sp_id').innerHTML;
	if(loc == "  ")
	{
	  alert("Error : Please enter a place or a category or an attraction to search");
	}
	else
	{
	loc = loc.toUpperCase();
	document.getElementById('hrefExplore').href = "ExploreDest_Cityscape.php?id=kjsdhf kahd ahsdakldjalkd jlakdjlkas jaskl djakajkdasjdks&p="+loc+"&ID="+id+"&secure="+secure;
    }
}

function toUpper(id)
{
	 document.getElementById(id).value = document.getElementById(id).value.toUpperCase();
}


function calNumDays()
{
	var dt1 = document.getElementById('txtCheckIn').value;
	var dt2 = document.getElementById('txtCheckOut').value;
	
	var d1 =[];
	var d2 =[];
 
	 d1 = dt1.split("/");
	 d2 = dt2.split("/");
	
	if(d2[1] == d1[1] && d2[2] == d1[2])
      document.getElementById('txtdays_htl').value = d2[0]-d1[0];
   else if(d2[1] > d1[1])
	{
		var m = d2[1]-d1[1] ;
		if(m==1)
		  {
			  if(d1[1]==1 || d1[1]==3 || d1[1]==7 || d1[1]==8 || d1[1]==10 || d1[1]==12)
			  {
				  var d1_diff = 31 - d1[0];
				  var d1_nxtmn = parseInt(d1_diff) + parseInt(d2[0]);
				  document.getElementById('txtdays_htl').value = d1_nxtmn;
			  }			  
		  else if(d1[1] == 2)
		  {
			    var d1_diff = 28 - d1[0];
				  var d1_nxtmn = parseInt(d1_diff) + parseInt(d2[0]);
				  document.getElementById('txtdays_htl').value = d1_nxtmn;
		  }
		  else
		  {
			    var d1_diff = 30 - d1[0];
				  var d1_nxtmn = parseInt(d1_diff) + parseInt(d2[0]);
				  document.getElementById('txtdays_htl').value = d1_nxtmn;
		  }
		  }
    }      
}

function btnflights_click(id1,id2,id3,id4,id5,id6)
{

document.getElementById('div_flight').style.display="block";
document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById('div_trains').style.display='none';
document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";


document.getElementById('div_cars').style.display='none';
document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById('div_bus').style.display='none';
document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById('div_hotel').style.display='none';
document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_packages').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}


function btntrains_click(id1,id2,id3,id4,id5,id6)
{
document.getElementById('div_trains').style.display="block";
document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById('div_flight').style.display='none';
document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";

document.getElementById('div_cars').style.display='none';
document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById('div_bus').style.display='none';
document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById('div_hotel').style.display='none';
document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_packages').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}


function btncars_click(id1,id2,id3,id4,id5,id6)
{
document.getElementById('div_cars').style.display="block";
document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById('div_flight').style.display='none';
document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";

document.getElementById('div_trains').style.display='none';
document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById('div_bus').style.display='none';
document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById('div_hotel').style.display='none';
document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_packages').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}

function btnbus_click(id1,id2,id3,id4,id5,id6)
{
document.getElementById('div_bus').style.display="block";
document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById('div_flight').style.display='none';
document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";

document.getElementById('div_trains').style.display='none';
document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById('div_cars').style.display='none';
document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById('div_hotel').style.display='none';
document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_packages').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}

function btnhotel_click(id1,id2,id3,id4,id5,id6)
{
     document.getElementById('div_hotel').style.display="block";
   document.getElementById('div_flight').style.display='none';
document.getElementById('div_trains').style.display='none';
document.getElementById('div_bus').style.display='none';
document.getElementById('div_cars').style.display='none';

document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";

document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_packages').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}

function btnpackages_click(id1,id2,id3,id4,id5,id6)
{
	document.getElementById('div_packages').style.display="block";
document.getElementById(id1).style.background="#F5F5F5";
document.getElementById(id1).style.color="#B22222";

document.getElementById('div_flight').style.display='none';
document.getElementById(id2).style.background="#002929";
document.getElementById(id2).style.color="White";

document.getElementById('div_trains').style.display='none';
document.getElementById(id3).style.background="#002929";
document.getElementById(id3).style.color="White";

document.getElementById('div_cars').style.display='none';
document.getElementById(id4).style.background="#002929";
document.getElementById(id4).style.color="White";

document.getElementById('div_hotel').style.display='none';
document.getElementById(id5).style.background="#002929";
document.getElementById(id5).style.color="White";

document.getElementById('div_bus').style.display='none';
document.getElementById(id6).style.background="#002929";
document.getElementById(id6).style.color="White";
}


function validation()
{
   if(document.getElementById('drpsource').selectedIndex.value==0)
{
  document.getElementById('lblsource').visibility='visible';
}

   if(document.getElementById('drpsource').selectedIndex.value==0)
{
  
  document.getElementById('lbldest').visibility='visible';
}
}
function Validate()
 {   
   var email = document.getElementById('txtemail').value;
   var atpos=email.indexOf("@");
 var dotpos=email.lastIndexOf(".");

 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
   {
   alert("Not a valid e-mail address");
   document.getElementById('email').color="red";
   return false;
   } 
 }
 
function change_color(id)
{
	document.getElementById(id).style.background="#002929";
}

function change_back(ele)
{
	document.getElementById(ele).style.background="#002929";
}

function div_white(id)
{
	document.getElementById(id).style.background="#F5F5F5";
	document.getElementById(id).style.color="#B22222";
}
function div_green(id)
{
	document.getElementById(id).style.background="#002929";
	document.getElementById(id).style.color="white";
}

function border_Gray(id)
{
	document.getElementById(id).style.border="1px solid grey";
}

function border_normal(id)
{
	document.getElementById(id).style.border="1px solid lightgrey";
}

function Stop_marq()
{
	document.getElementById('marq_frontPage').stop();
}

function start_marq()
{
	document.getElementById('marq_frontPage').start();
}

function show_explore(id)
{
	document.getElementById('div_explore_text').style.background="#ddd";
	document.getElementById(id).value="";
	document.getElementById(id).placeholder = "Type your destination";
	document.getElementById(id).style.color="#444";
}

function blur_td(img_td1, img_td2, img_td3, img_td4, img_td5, img_td6, img_td7, img_td8, img_td9, img_td10, img_td11, img_td12, img_td13, img_td14, img_td15, img_td16, img_td17, img_td18)
{
	document.getElementById(img_td1).style.opacity="0.3";
	document.getElementById(img_td2).style.opacity="0.3";
	document.getElementById(img_td3).style.opacity="0.3";
	document.getElementById(img_td4).style.opacity="0.3";
	document.getElementById(img_td5).style.opacity="0.3";
	document.getElementById(img_td6).style.opacity="0.3";
	document.getElementById(img_td7).style.opacity="0.3";
	document.getElementById(img_td8).style.opacity="0.3";
	document.getElementById(img_td9).style.opacity="0.3";
	document.getElementById(img_td10).style.opacity="0.3";
	document.getElementById(img_td11).style.opacity="0.3";
	document.getElementById(img_td12).style.opacity="0.3";
	document.getElementById(img_td13).style.opacity="0.3";
	document.getElementById(img_td14).style.opacity="0.3";
	document.getElementById(img_td15).style.opacity="0.3";
	document.getElementById(img_td16).style.opacity="0.3";
	document.getElementById(img_td17).style.opacity="0.3";
	document.getElementById(img_td18).style.opacity="0.3";
}

function unblur_td(img_td1, img_td2, img_td3, img_td4, img_td5, img_td6, img_td7, img_td8, img_td9, img_td10, img_td11, img_td12, img_td13, img_td14, img_td15, img_td16, img_td17, img_td18,id)
{
	document.getElementById(img_td1).style.opacity="1";
	document.getElementById(img_td2).style.opacity="1";
	document.getElementById(img_td3).style.opacity="1";
	document.getElementById(img_td4).style.opacity="1";
	document.getElementById(img_td5).style.opacity="1";
	document.getElementById(img_td6).style.opacity="1";
	document.getElementById(img_td7).style.opacity="1";
	document.getElementById(img_td8).style.opacity="1";
	document.getElementById(img_td9).style.opacity="1";
	document.getElementById(img_td10).style.opacity="1";
	document.getElementById(img_td11).style.opacity="1";
	document.getElementById(img_td12).style.opacity="1";
	document.getElementById(img_td13).style.opacity="1";
	document.getElementById(img_td14).style.opacity="1";
	document.getElementById(img_td15).style.opacity="1";
	document.getElementById(img_td16).style.opacity="1";
	document.getElementById(img_td17).style.opacity="1";
	document.getElementById(img_td18).style.opacity="1";
	
}

function return_journey(control,id)
{
	if(document.getElementById(control).checked==true)
	{
	  document.getElementById(id).style.background='#fff';
	  document.getElementById(id).disabled=false;
	}
}

function oneWay_Journey(control,id)
{
	if(document.getElementById(control).checked==true)
	{
	  document.getElementById(id).style.background='grey';
	  document.getElementById(id).disabled=true;
	}
	
}

function txtbox_color_onmouseover(id)
{
	document.getElementById(id).style.border = "1px solid OrangeRed";
}

function txtbox_color_onmouseout(id)
{
	document.getElementById(id).style.border="";
}

function showDates()
{
	dt= new Date();
	var day = dt.getDate();
	var month = dt.getMonth()+1;
	var year = dt.getFullYear();
	var dayreturn = dt.getDate()+2;
	document.getElementById('frmDate_Flight').value= day+"/"+month+"/"+year;
	document.getElementById('frmDate_Train').value= day+"/"+month+"/"+year;
	document.getElementById('frmDate_Bus').value= day+"/"+month+"/"+year;
	document.getElementById('frmDate_Car').value= day+"/"+month+"/"+year;
	document.getElementById('txtCheckIn').value= day+"/"+month+"/"+year;
	document.getElementById('txtCheckOut').value= dayreturn+"/"+month+"/"+year;
}
function setTimeImg()
{
	var lftImg = "document.getElementById('div_cmt_crl').style.display='none'";
	setInterval(lftImg,25000);
}

function load_months()
{
	var m_names = new Array("Jan", "Feb", "Mar", 
"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
"Oct", "Nov", "Dec"); 
var d = new Date(); 
var curr_date = d.getDate(); 
var curr_month = d.getMonth(); 
var curr_year = d.getFullYear();

	var drpTag =document.getElementById('drp_SelDt');
	if(drpTag.value=="")
	{
	//drpTag.add(new Option(curr_date+m_names[curr_month]+curr_year,curr_date+m_names[curr_month]+curr_year));
	drpTag.add(new Option("Next 10 days","Next 10 days"));
	drpTag.add(new Option(m_names[curr_month+1]+curr_year,m_names[curr_month+1]+curr_year));
	drpTag.add(new Option(m_names[curr_month+2]+curr_year,m_names[curr_month+2]+curr_year));
	drpTag.add(new Option(m_names[curr_month+3]+curr_year,m_names[curr_month+3]+curr_year)); 
	}
}

function show_dest_trvDt(id)
{
	document.getElementById('btn_mnths').onclick = function(){
		document.getElementById('trv_hdr').innerHTML = "My tentative travel date is :  ";
		document.getElementById('trv_dates').innerHTML =document.getElementById('drp_SelDt').options[document.getElementById('drp_SelDt').options.selectedIndex].value;
	}
	
		document.getElementById('btnFrmTo').onclick = function(){
			document.getElementById('trv_hdr').innerHTML = "My travel dates are :  ";
		document.getElementById('trv_dates').innerHTML ="From &nbsp;"+document.getElementById('txtfrmDt').value +"To &nbsp;"+ document.getElementById('txtToDt').value;
	}
	
}

function show_date_div(id,x,y,rL,rR,val,td,id2)
{
	document.getElementById(id).style.display='block';
	document.getElementById(id).style.marginTop = y;
    document.getElementById(id).style.marginLeft = x;
	document.getElementById(id).style.borderBottomLeftRadius = rL;
	document.getElementById(id).style.borderBottomRightRadius = rR;
	document.getElementById('sp_vacTh').innerHTML = val;
	document.getElementById(td).style.border="2px solid #999";
}

var i =0;
var j=0;
var arrLoc = Array();
function selectLoc(id)
{	
	if(document.getElementById(id).checked == true)
	{
		if(j<6)
		{
		var sp = document.createElement("span");
		 sp.style.float ="left";
		 sp.style.marginLeft = "15px";
		 sp.style.marginTop="10px";
		 sp.id = "sp1"+i;
		 
		var d1 = document.createElement("div");
		d1.className= "smallbtn";
		d1.id=sp.id;
		d1.style.width="auto";
		d1.style.height="23px";
		d1.style.padding = "2px 2px 2px 5px";
		d1.style.fontSize = "15px";
		d1.innerHTML = document.getElementById(id).value;
		
		arrLoc[i] = document.getElementById(id).value;
		
		var spImg = document.createElement("span");
	    spImg.style.float ="right";
		spImg.style.marginRight="-13px";
		spImg.style.marginTop="-30px";
		
		var img = document.createElement("img");
		img.src = "Images/closeBtn.png";
		img.style.width = "20px";
		img.style.height="20px";	
		img.id=sp.id;
		img.onclick = function()
		{
			document.getElementById(this.id).style.display='none';
			var arr = Array();
			arr = this.id.split("sp");
			i = arr[1];
			arrLoc[i]="";	
			j=j-1;
		};
		
		spImg.appendChild(img);
		d1.appendChild(spImg);
		
		sp.appendChild(d1);
		document.getElementById("div_loc_btns").appendChild(sp);
		
		i++;
		j++;
		}
		else
		  alert("Can select a maximum of 6 locations.");
	}
}

function selectLocName(id)
{
	if(document.getElementById(id).checked == false)
	 {
	 document.getElementById(id).checked = true;
	 if(j<6)
		{
		var sp = document.createElement("span");
		 sp.style.float ="left";
		 sp.style.marginLeft = "15px";
		 sp.style.marginTop="10px";
		 sp.id = "sp1"+i;
		 
		var d1 = document.createElement("div");
		d1.className= "smallbtn";
		d1.id=sp.id;
		d1.style.width="auto";
		d1.style.padding = "2px 2px 2px 5px";
		d1.style.fontSize = "15px";
		d1.innerHTML = document.getElementById(id).value;
		
		arrLoc[i] = document.getElementById(id).value;
		
		var spImg = document.createElement("span");
	    spImg.style.float ="right";
		spImg.style.marginRight="-13px";
		spImg.style.marginTop="-13px";
		
		var img = document.createElement("img");
		img.src = "Images/closeBtn.png";
		img.style.width = "20px";
		img.style.height="20px";	
		img.id=sp.id;
		img.onclick = function()
		{
		document.getElementById(this.id).style.display='none';
		var arr = Array();
			arr = this.id.split("sp");
			i = arr[1];
			arrLoc[i]="";	
			j=j-1;
		};
		
		spImg.appendChild(img);
		d1.appendChild(spImg);
		
		sp.appendChild(d1);
		document.getElementById("div_loc_btns").appendChild(sp);
		
		i++;
		j++;
		}
		else
		  alert("Can select a maximum of 6 locations.");
	
	 }
	 else if(document.getElementById(id).checked == true)
	  {
		  document.getElementById(id).checked = false;
	  }
}

function remove_border()
{
	document.getElementById('img_td1').style.border="0px";
	document.getElementById('img_td2').style.border="0px";
	document.getElementById('img_td3').style.border="0px";
	document.getElementById('img_td4').style.border="0px";
	document.getElementById('img_td5').style.border="0px";
	document.getElementById('img_td6').style.border="0px";
	document.getElementById('img_td7').style.border="0px";
	document.getElementById('img_td8').style.border="0px";
	document.getElementById('img_td9').style.border="0px";
	document.getElementById('img_td10').style.border="0px";
	document.getElementById('img_td11').style.border="0px";
	document.getElementById('img_td12').style.border="0px";
	document.getElementById('img_td13').style.border="0px";
	document.getElementById('img_td14').style.border="0px";
	document.getElementById('img_td15').style.border="0px";
	document.getElementById('img_td16').style.border="0px";
	document.getElementById('img_td17').style.border="0px";
	document.getElementById('img_td18').style.border="0px";
	document.getElementById('img_td19').style.border="0px";
}


function show_packages()
{
	var loc;
	for(var j=0; j<=arrLoc.length-1; j++)
	{
	 	loc = arrLoc[0]+","+arrLoc[1]+","+arrLoc[2]+","+arrLoc[3]+","+arrLoc[4]+","+arrLoc[5];
    }
	var frm = document.getElementById('drp_frm_ref').options[document.getElementById('drp_frm_ref').options.selectedIndex].value;

	var vac = document.getElementById('txtcate_ref').value;
	document.getElementById('hrefSelectCity').href="VacationScape.php?l="+vac+","+loc+"&frmLoc="+frm;
}


var likes = 0;
function count_likes()
{
	likes=parseInt(likes)+1;
	document.getElementById('likeBtn_vac').innerHTML = likes;
}
function enterEmail(id)
{
	if(document.getElementById(id).checked ==true)
	  document.getElementById('div_entEmail').style.display = 'block';
	else
	 document.getElementById('div_entEmail').style.display = 'none';
}
function chkEmail(id)
{
	if(document.getElementById(id).checked ==false)
	{
		document.getElementById(id).checked =true;
		document.getElementById('div_entEmail').style.display = 'block';
	}
	else if(document.getElementById(id).checked ==true)
	{
		document.getElementById(id).checked =false;
		document.getElementById('div_entEmail').style.display = 'none';
	}
}
function login()
{
	 document.getElementById('div_entEmail').style.display = 'block';
}

function show_btv()
{
	document.getElementById('btv_div').style.width="100%";
	document.getElementById('btv_div').style.display='block';
}

function showDest()
{
   var dest = document.getElementById('txtDest').value;
   dest = dest.toUpperCase();
   document.getElementById('href_'.dest).href="#"+dest;
}

function selectedLoc(id)
{
	document.getElementById(id).checked=false;
}

function bookTrv()
{
if(document.getElementById('selectedDest').innerHTML =="")
{	
	var ref = Array();
   ref = window.location.href.split("l=");
   var loc = ref[1].split(",");
   loc = decodeURI(loc[1]);
}
else
  loc = document.getElementById('selectedDest').innerHTML;
  var frm = document.getElementById('vac_frm_city').value;
  document.getElementById('hrefTrv').href = "index.php?bFlt=true&loc="+loc+"&frm="+frm;
	document.getElementById('hrefTrv').target = "_blank";
}

function Thingstodo()
{
if(document.getElementById('selectedDest').innerHTML =="")
{	
	var ref = Array();
   ref = window.location.href.split("l=");
   var loc = ref[1].split(",");
   loc = decodeURI(loc[1]);
}
else
  loc = document.getElementById('selectedDest').innerHTML;
    
  document.getElementById('hrefExp').href = "ExploreDest_Cityscape.php?id=kasjdj kasdjk ajdlka jaskldjalk alksdjk asdk jakd ksjdkas jdask jaskd ajsdkasdjkasdjaksdjaskd&loc="+loc;
	document.getElementById('hrefExp').target = "_blank";
}

function showPackages()
{
if(document.getElementById('selectedDest').innerHTML =="")
{	
	var ref = Array();
   ref = window.location.href.split("l=");
   var loc = ref[1].split(",");
   loc = decodeURI(loc[1]);
}
else
  loc = document.getElementById('selectedDest').innerHTML;
    
  document.getElementById('hrefPck').href = "Packages.php?loc="+loc;
	document.getElementById('hrefPck').target = "_blank";
}

function showKids()
{
if(document.getElementById('selectedDest').innerHTML =="")
{	
	var ref = Array();
   ref = window.location.href.split("l=");
   var loc = ref[1].split(",");
   loc = decodeURI(loc[1]);
}
else
  loc = "KIDS IN "+document.getElementById('selectedDest').innerHTML;
    
  document.getElementById('hrefKids').href = "ExploreDest_Cityscape.php?id=kasjdj kasdjk ajdlka jaskldjalk alksdjk asdk jakd ksjdkas jdask jaskd ajsdkasdjkasdjaksdjaskd&p="+loc;
	document.getElementById('hrefKids').target = "_blank";
}


function crtBtn()
{
	var ref = Array();
   ref = window.location.href.split("l=");
   var l= ref[1].split("&");  
   var loc = l[0].split(",");
   var id=0;
   
   document.getElementById('vacTheme').innerHTML = decodeURI(loc[0]);
i=1; 

 var aftLd = Array();
   aftLd = window.location.href.split("&id=");
   if(aftLd[1] == undefined)
   {
     id = 1;	
   }
   else
     var id = aftLd[1];

  for(var j=1; j<loc.length; j++)
  {
	  if(loc[j]!="undefined" && loc[j]!="undefined#" && loc[j]!="")
	    {		
	     var sp = document.createElement("span");
		 sp.style.float ="left";
		 sp.style.marginLeft = "15px";
		 sp.style.marginTop="10px";
		 sp.id = "sp"+i;
		 
		var d1 = document.createElement("div");
		d1.className = "smallbtn";
		d1.id="d"+i;
		if(i == id)
		  d1.style.background = "rgb(255,51,1)";
		d1.style.width="auto";
		d1.style.padding = "5px 5px 5px 10px";
		d1.onclick = function()
		{
			document.getElementById(this.id).style.background = "rgb(255,51,1)";
			
	     if(this.id == "d1")
		   {
		       document.getElementById("d2").style.background="#002929";		   
			   document.getElementById("d3").style.background="#002929";		   
			   document.getElementById("d4").style.background="#002929";		   
			   document.getElementById("d5").style.background="#002929";			   
			   document.getElementById("d6").style.background="#002929";
		   }
		    if(this.id == "d2")
		   {
		       document.getElementById("d1").style.background="#002929";		   
			   document.getElementById("d3").style.background="#002929";			   
			   document.getElementById("d4").style.background="#002929";			   
			   document.getElementById("d5").style.background="#002929";			   
			   document.getElementById("d6").style.background="#002929";		
		   }
		    if(this.id == "d3")
		   {
		  	   document.getElementById("d2").style.background="#002929";	
			   document.getElementById("d1").style.background="#002929";			   
			   document.getElementById("d4").style.background="#002929";			   
			   document.getElementById("d5").style.background="#002929";			   
			   document.getElementById("d6").style.background="#002929";		
		   }
		    if(this.id == "d4")
		   {
		   	   document.getElementById("d2").style.background="#002929";			   
			   document.getElementById("d3").style.background="#002929";		   
			   document.getElementById("d1").style.background="#002929";			   
			   document.getElementById("d5").style.background="#002929";		   
			   document.getElementById("d6").style.background="#002929";			   
		   }
		    if(this.id == "d5")
		   {
               document.getElementById("d2").style.background="#002929";			   
			   document.getElementById("d3").style.background="#002929";			   
			   document.getElementById("d4").style.background="#002929";			   
			   document.getElementById("d1").style.background="#002929";			   
			   document.getElementById("d6").style.background="#002929";			   
		   }
		   
		      if(this.id == "d6")
		   {
               document.getElementById("d2").style.background="#002929";			   
			   document.getElementById("d3").style.background="#002929";			   
			   document.getElementById("d4").style.background="#002929";			   
			   document.getElementById("d1").style.background="#002929";			   
			   document.getElementById("d5").style.background="#002929";			
		   }
		 };
		 var m=0;
		 var spNm = document.createElement('span');		 
		 spNm.style.fontSize = "15px";
		 spNm.innerHTML = decodeURI(loc[j]);
		 spNm.id = "spNm"+i;
		 spNm.style.background="transparent";
		 spNm.onclick = function()
		 { 
		 document.getElementById('selectedDest').innerHTML = this.innerHTML;
		 var locRef = Array();
		 locRef = window.location.href.split("&");
		 var ids= Array();
		 ids = this.id.split("spNm");
		 window.location.href = locRef[0]+"&"+locRef[1]+"&sltLoc="+this.innerHTML+"&id="+ids[1];
		 };
		
		var spImg = document.createElement("span");
	    spImg.style.float ="right";
		spImg.style.background="transparent";
		spImg.style.marginRight="-13px";
		spImg.style.marginTop="-13px";
		
		var img = document.createElement("img");
		img.src = "Images/closeBtn.png";
		img.style.background="transparent";
		img.style.width = "20px";
		img.style.height="20px";	
		img.id=d1.id;
		img.onclick = function()
		{
		document.getElementById(this.id).style.display='none';
		i=i-1;
		};
		
		spImg.appendChild(img);
		d1.appendChild(spImg);
		d1.appendChild(spNm);
		
		sp.appendChild(d1);
		document.getElementById("div_loc_hdr_btns").appendChild(sp);
		
		i++;
	
		}
  }
}

 function show_cate_list()
 {
   var loc = document.getElementById('searchLoc').value;
   var cate = document.getElementById('sp_vacTh').innerHTML;
   var km = document.getElementById('drpDist').options[document.getElementById('drpDist').options.selectedIndex].value;
   
   var p1 = Array();
   p1=cate.split(" ");
   if(p1[0]!="Sightseeing")
      var val = p1[0]+"_"+p1[1];
   else
      var val = p1[0];	 
    
   document.getElementById('show_cate').href="index.php?id=klsad ajskad jaskdk aaskdja lkdjaskl jaskld jadka skdjkj shfkdfjh dfhdfjh j eiouerreiutyer t eriuertiuer&cate="+val+"&locn="+loc+"&km="+km;
   document.getElementById('show_cate').target="_self";   
 }
 
function brdr_1()
{
  document.getElementById('div_plan_otr').style.border="2px solid #999";
}

function brdr_2()
{
  document.getElementById('div_exp_otr').style.border="2px solid #7c9ecf";
}

function brdr_3()
{
  document.getElementById('div_book_otr').style.border="2px solid #4da64d";
}

function brdr_none(id)
{
  document.getElementById(id).style.border="0px";
}
 
 function reld()
 {
	 window.location.href = "index.php";
 }

function sub_Abr()
{
document.getElementById('href_sub_abr').href="Build_Trip.php?type=Abroad";	
}

function curCty(val)
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
    document.getElementById("result_pl").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?curCty="+val,true);
xmlhttp.send();	
}

function mulCty(val)
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
    document.getElementById("result_mult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?multCty="+val,true);
xmlhttp.send();	
}

function snglCty(val)
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
    document.getElementById("result_sngl").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?snglCty="+val,true);
xmlhttp.send();	
}


function putValue(val,txt)
{
	document.getElementById(txt).value = val;
}

function chngBck(id)
{
	document.getElementById(id).style.background='#0066ff'; 
	document.getElementById(id).style.color='#222';
}
var dest_cnt =0 ;
function chkLoc_val(id,val)
{
	var count = document.getElementById('drpNum').options[document.getElementById('drpNum').options.selectedIndex].value;
	if(document.getElementById(id).checked == true)
	{
		dest_cnt = dest_cnt+1;
		if(dest_cnt <= count)
		{
		document.getElementById('txtPref_multiLoc').value =val;
		document.getElementById('_prefCity').innerHTML +=val+", ";
		}
		else
		   {
			   alert("Error : You are exceeding # of locations than "+count+"");
			   document.getElementById(id).checked = false;
		   }
	}
	else
	{
		document.getElementById(id).checked = false;
		var div = document.getElementById('_prefCity').innerHTML;
		var spl = val+", ";
		var arr = div.split(spl);
		document.getElementById('_prefCity').innerHTML = arr[0]+arr[1];
	}
}

function chkLoc_val_div(id,val)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
		document.getElementById('txtPref_multiLoc').value =val;
		document.getElementById('_prefCity').innerHTML +=val+", ";
	}
	else
	{
		document.getElementById(id).checked = false;
		var div = document.getElementById('_prefCity').innerHTML;
		var spl = val+", ";
		var arr = div.split(spl);
		document.getElementById('_prefCity').innerHTML = arr[0]+arr[1];
	}
}

function chkClick()
{
	if(document.getElementById('chk_qcnLoc').checked == true)
	{
		hide_block('div_sel_loc');
		document.getElementById('chk_qcnLoc').style.color = "#555";
	}
	else
	{
	  show_block('div_sel_loc');
	document.getElementById('chk_qcnLoc').style.color = "#999";
	}
}

 
 function sub_val_domes(secure)
 {
	 var curCty = document.getElementById('txtcCity').value;	 
	var mode = document.getElementById('_mode').innerHTML;
	var trvlr = document.getElementById('_traveller').innerHTML;
   var dur = document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value;
    var locType = document.getElementById('_locType').value;
	var locNum = document.getElementById('drpNum').options[document.getElementById('drpNum').options.selectedIndex].value;
   var locs = document.getElementById('_prefCity').value;
 
  if(document.getElementById('_traveller').innerHTML=="Single-Under 45" || document.getElementById('_traveller').innerHTML=="Single-Above 45")
  {
  if(document.getElementById('rdfemale').checked == true)
   var gen = document.getElementById('rdfemale').value;
   else if(document.getElementById('rdmale').checked == true)
    var gen = document.getElementById('rdmale').value;
  }
  else
   var gen ="";
	
 window.open("Build_Trip.php?type=India&cCity="+curCty+"&mode="+mode+"&trvlr="+trvlr+"&gender="+gen+"&dur="+dur+"&locType="+locType+"&locNum="+locNum+"&locs="+locs+"&dates=&secure="+secure);
 }
  function sub_val_abr(secure)
 {
	 var curCty = document.getElementById('txtcCity').value;	 
	var trvlr = document.getElementById('_traveller').innerHTML;
   var dur = document.getElementById('drptime_abr').options[document.getElementById('drptime_abr').options.selectedIndex].value;

if(document.getElementById('_traveller').innerHTML=="Single-Under 45" || document.getElementById('_traveller').innerHTML=="Single-Above 45")
  {
  if(document.getElementById('rdfemale').checked == true)
   var gen = document.getElementById('rdfemale').value;
   else if(document.getElementById('rdmale').checked == true)
    var gen = document.getElementById('rdmale').value;
  }
  else
   var gen ="";
window.open("Build_Trip.php?type=Abroad&cCity="+curCty+"&mode=Air&trvlr="+trvlr+"&gender="+gen+"&dur="+dur+"&locType=&locNum=&locs=&dates=&secure="+secure);
}

 function check_type_pck()
 {
	 if(document.getElementById('rdIndia_pck').checked == true)
	 {
		 show_block('pck_q3');
		 show_block('drpDur_d_pck');
		 hide_block('drpDur_abr_pck');
		 hide_block('pck_q2');
	 }
	 else if(document.getElementById('rdabr_pck').checked == true)
	 {
		 show_block('pck_q3');
		 show_block('drpDur_abr_pck');
		 hide_block('drpDur_d_pck');
		 hide_block('pck_q2');
	 }
	 else
	  alert('Error : Select you location type ');
 }
 
 function chk_pck_city()
 {
	 if(document.getElementById('rdIndia_pck').checked == true)
	  {
		 show_block('pck_q2');
		 show_block('domes_pck');
		 hide_block('abr_pck');
		 hide_block('pck_q1');
	 }
	 else if(document.getElementById('rdabr_pck').checked == true)
	 {
		 show_block('pck_q2');
		 show_block('abr_pck');
		 hide_block('domes_pck');
		 hide_block('pck_q1');
	 }
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
xmlhttp.open("GET","search.php?cntry_cont_pck="+val,true);
xmlhttp.send();	
}

function LdCntry1(val)
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
    document.getElementById("sp_drp_cntry1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?cntry_cont_pck1="+val,true);
xmlhttp.send();	
}


function LdabrLoc(val)
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
    document.getElementById("sp_drp_Abrloc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?c_loc="+val,true);
xmlhttp.send();	
}

function LdabrLoc1(val)
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
    document.getElementById("sp_drp_Abrloc1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?c_loc1="+val,true);
xmlhttp.send();	
}

function show_pck()
{
	var type;
	var loc;
	var vac;
	var cntry;

 if(document.getElementById('rdIndia_pck').checked == true)
   {
	   type="DOMESTIC";
	   if(document.getElementById('txtDomesLoc_pck').value!="")
	  	  loc = document.getElementById('txtDomesLoc_pck').value;
	  else
	     loc = document.getElementById('txtDomesLoc1_pck').value;
	     vac = document.getElementById('div_sel_vacthm').innerHTML;	
	     cntry = "INDIA";
   }
  if(document.getElementById('rdabr_pck').checked == true)
   {
	     vac = document.getElementById('div_sel_vacthm_abr').innerHTML;	
		type="INTERNATIONAL";
		
		if(document.getElementById('txtInterLoc_pck').value !="")
		{
		  loc = document.getElementById('txtInterLoc_pck').value;
		}
		else if(document.getElementById('txtInterLoc1_pck').value !="" )
		{
		  loc = document.getElementById('txtInterLoc1_pck').value;
		}
		else if(document.getElementById('drpCont_abr').options[document.getElementById('drpCont_abr').options.selectedIndex].value !="0")
		{
		var plc = document.getElementById('drploc_conti').options[document.getElementById('drploc_conti').options.selectedIndex].value;
	       cntry = document.getElementById('drpCntry_conti').options[document.getElementById('drpCntry_conti').options.selectedIndex].value;	
		  loc = plc;
		}
		else if(document.getElementById('drpCont_abr1').options[document.getElementById('drpCont_abr1').options.selectedIndex].value !="0")
		{
		var plc = document.getElementById('drploc_conti1').options[document.getElementById('drploc_conti1').options.selectedIndex].value;
	      cntry = document.getElementById('drpCntry_conti1').options[document.getElementById('drpCntry_conti1').options.selectedIndex].value;	
		  loc = plc;
		}
   }  
 window.open("drct_pck_page.php?type="+type+"&loc="+loc+"&vac="+vac);	
}

function showDomesCity(val)
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
    document.getElementById("div_pck_loc").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?snglCty_pck="+val,true);
xmlhttp.send();	
}

function showInterNCity(val)
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
    document.getElementById("div_pck_loc_abr").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?snglCty_inter="+val,true);
xmlhttp.send();	
}

function showInterNCity1(val)
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
    document.getElementById("div_pck_loc_abr1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?snglCty_inter1="+val,true);
xmlhttp.send();	
}

function clear_txt(txt,div,btn,hide,show,btn_id)
{
		hide_block(hide);
	show_block(show);
	document.getElementById(txt).value="";
	document.getElementById(div).innerHTML = "";
	document.getElementById(btn).style.background="#ddd";
	document.getElementById(btn_id).style.background="#283C5F";

}

function selValue(val,id)
{
	if(document.getElementById(id).checked == true)
	document.getElementById('div_sel_vacthm').innerHTML += val+", ";
}

function selValue_sp(val,id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
	document.getElementById('div_sel_vacthm').innerHTML += val+", ";
	}
}

function selValue1(val,id)
{
	if(document.getElementById(id).checked == true)
	document.getElementById('div_sel_vacthm1').innerHTML += val+", ";
}

function selValue_sp1(val,id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
	document.getElementById('div_sel_vacthm1').innerHTML += val+", ";
	}
}

function selValue_abr(val,id)
{
	if(document.getElementById(id).checked == true)
	document.getElementById('div_sel_vacthm_abr').innerHTML += val+", ";
}

function selValue_sp_abr(val,id)
{
	if(document.getElementById(id).checked == false)
	{
		document.getElementById(id).checked = true;
	document.getElementById('div_sel_vacthm_abr').innerHTML += val+", ";
	}
}

function open_leads()
{
	window.open("B2bLeads.php");
}


