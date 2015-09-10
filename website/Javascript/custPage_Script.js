var dt = new Date();
	var day = dt.getDate();
	var mnt = dt.getMonth()+1;
	var yr = dt.getFullYear();
	var hr = dt.getHours();
	var m = dt.getMinutes();

function change_font_clr(id1,id2)
{
	document.getElementById(id1).style.color="#FF0000";
	document.getElementById(id2).style.color="#FFFFFF";
}
function show_block(id)
{
	document.getElementById(id).style.display='block';
}
function hide_block(id)
{
	document.getElementById(id).style.display='none';
}
function resize_topBtn()
{
	document.getElementById('div_topBtns').style.marginTop = "7px";
}
function page_reload()
{
	window.location.reload();
}
function disp_htl_days()
{
	var day1=document.getElementById('txtCheckIn').value;
	var day2=document.getElementById('txtCheckOut').value;
	var days;
	
	var d1= [];
	var d2 =[];
	d1 = day1.split("/");
	d2 = day2.split("/");
	
	if(d1[1]==d1[1])
		days = d2[0]-d1[0];
	
	var nights = days-1;
	
	document.getElementById('txtNoDays').value = days+"D/"+nights+"N";
}
function btn_clr(btn_act,btn1,btn2,btn3,btn4,btn5,btn6,btn7,btn8)
{
     document.getElementById(btn_act).style.color = "#FF0000";
	 document.getElementById(btn1).style.color = "#FFF";
     document.getElementById(btn2).style.color = "#FFF";
     document.getElementById(btn3).style.color = "#FFF";
	 document.getElementById(btn4).style.color = "#FFF";
	 document.getElementById(btn5).style.color = "#FFF";
	 document.getElementById(btn6).style.color = "#FFF";
	 document.getElementById(btn7).style.color = "#FFF";
	 document.getElementById(btn8).style.color = "#FFF";
}
function lnk_clr(id1,id2,id3)
{
	document.getElementById(id1).style.color = "#FF0000";
	document.getElementById(id2).style.color = "#0066FF";
	document.getElementById(id3).style.color = "#0066FF";
}
function show_tr(id1,id2,id3,id4)
{
	document.getElementById(id1).style.display="table-row";
	document.getElementById(id2).style.display="none";
	document.getElementById(id3).style.display="none";
	document.getElementById(id4).style.display="none";
}
function show_tr_block(id)
{
	document.getElementById(id).style.display="table-row";
}
function hide_tr_block(id)
{
	document.getElementById(id).style.display="none";
}
function Add_to_drpTop10()
{
	var para ="My Top 10 "+document.getElementById('txt_newTop10').value;
	var drp = document.getElementById('drpTop10');
	if(document.getElementById('txt_newTop10').value =="")
	{
		alert('Add your top 10');
	}
	else
	   drp.add(new Option(para,para));
	document.getElementById('txt_newTop10').value ="";   
}
var j=0;
function createBtns()
{
	var title = document.getElementById('drpTop10').options[document.getElementById('drpTop10').options.selectedIndex].value;
	var til=title.substring(9,25);
	var sp = document.createElement('span');
	sp.style.width="18%";
	sp.style.float="left";
	
	var d = document.createElement('div');
	d.setAttribute("class","btn_semi_trapez");
	d.setAttribute("id","div"+j);
	d.style.padding = "2px 5px 2px 5px";
	d.style.width="105px";
	d.style.cursor="pointer";
	d.style.position="relative";
	d.innerHTML = til;
	d.onclick = function()
	{
		if(d.innerHTML == "Beaches")
		{
		  this.className="btn_semi_trapez_onFocus";
		 document.getElementById('top_10_beaches').style.display='block';		 
		 hide_block('top_10_trekking');
		}
		if(d.innerHTML == "Trekking") 
		{
			this.className="btn_semi_trapez_onFocus";
	    	document.getElementById('top_10_trekking').style.display = 'block';	
			hide_block('top_10_beaches');
		}
	}
	//d.appendChild(i);
	i.onclick=function(){document.getElementById('div'+i).style.display='none';};
	sp.appendChild(d);	
	
	document.getElementById('div_selected_top10').appendChild(sp);
	i++;
}
function upload()
{
	document.getElementById('top1_bch').src = document.getElementById('img_url').value;
}
function test_others()
{
	if(document.getElementById('drpAlb_Evt').options[document.getElementById('drpAlb_Evt').options.selectedIndex].value == "Others")
	{
		show_block('other_evt');
	}
}
function add_othr_ev_pic()
{
	var para_pic = document.getElementById('txt_othr_ev').value;
	var drp_pic = document.getElementById('drpAlb_Evt');
   if( document.getElementById('txt_othr_ev').value =="")
	{
		alert('Add text');
	}
	else
	  drp_pic.add(new Option(para_pic,para_pic));
	  
	document.getElementById('txt_othr_ev').value="";
	hide_block('other_evt');
}

function add_othr_Blg()
{
	var para = document.getElementById('txt_othr_Blg').value;
	var drp = document.getElementById('drpBlg');
   if(document.getElementById('txt_othr_Blg').value =="")
	{
		alert('Add text');
	}
	else
	  drp.add(new Option(para,para));
	document.getElementById('txt_othr_ev').value="";
}
function add_to_BlgTheme()
{
	var para = document.getElementById('txt_blg_lnk_oth').value;
	var drp = document.getElementById('drpBlgTheme');
   if(document.getElementById('txt_blg_lnk_oth').value =="")
	{
		alert('Add text');
	}
	else
	  drp.add(new Option(para,para));
	document.getElementById('txt_blg_lnk_oth').value="";
}

function add_nxt_img()
{
	var i;
	
	var d1 = document.createElement('div');
	d1.style.float="left";
	d1.style.width="100%";
	d1.style.marginTop="5px";
	
	var sp1 = document.createElement('span');
	sp1.style.float="left";
	sp1.className="font_medium";
	sp1.innerHTML = "Url";
	
	var sp2 = document.createElement('span');
	sp2.style.float="left";
	sp2.style.marginLeft="8px";
	var inp = document.createElement('input');
	inp.className = "txtbox_crt";
	inp.style.opacity="0.5";
	inp.setAttribute("type","file");
	inp.setAttribute("id","txtFile"+i);
	sp2.appendChild(inp);
	
	var sp3 = document.createElement('span');
	sp3.style.float="left";
	sp3.style.marginLeft="8px";
	var d2 = document.createElement('div');
	d2.className="smallbtn";
	d2.style.width="40px";
	d2.innerHTML = "Add";
	d2.onclick = function() {add_nxt_img(); i++;};
	sp3.appendChild(d2); 
	
	var sp4 = document.createElement('span');
	sp4.style.float="left";
	sp4.style.marginLeft="8px";
	var d3 = document.createElement('div');
	d3.className="smallbtn";
	d3.style.width="50px";
	d3.innerHTML = "Upload";
	d3.onclick = function() {upload_img(document.getElementById("txtFile"+i).value);};
	sp4.appendChild(d3); 
	
	d1.appendChild(sp1);
	d1.appendChild(sp2);	
	d1.appendChild(sp4);
	d1.appendChild(sp3);
	
	document.getElementById('div_add_pic_url').appendChild(d1);
}
function upload_img(id)
{
	var j;
	j++;
	var sp = document.createElement('span');
	sp.style.width="23%";
	sp.style.float="left";
	sp.style.marginLeft="3px";
	sp.style.marginTop = "5px";
	
	var d = document.createElement('div');
	d.style.width="150px";
	d.style.height="120px";
	d.style.border = "1px solid #bbb";
	d.setAttribute("id","divImg"+j);
    d.style.background ="url('Images/City_Images/CityScape_Bangalore/"+id+"')";

	sp.appendChild(d);
	document.getElementById('pics').appendChild(sp);
}
function change_tr_font(id1,id2)
{
	document.getElementById(id1).style.color="#FF0000";
	document.getElementById(id2).style.color="#222";
}

var photos=new Array();
var divs = new Array();
var count=0;

photos[0]= 'Images/City_Images/Commercial street_shopping_blr.jpg';
photos[1]='Images/City_Images/CityScape_Bangalore/amoeba_blr_kids.png';
photos[2]='Images/City_Images/CityScape_Bangalore/alianceFrancaise_cultural_blr.png';
photos[3]='Images/City_Images/CityScape_Bangalore/ArishinaKunte_Nelamangala_blr_religious.png';

function backward(){
	
if (count>0){
count--
document.getElementById('imgScroll').src=photos[count]
}
}

function forwards(){	
if (count<photos.length-1){
count++
document.getElementById('imgScroll').src=photos[count]
}
}
function show_divs(id)
{
	if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Title")
	{
		show_block('div_title');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_loc');
	}
	if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Location")
	{
		show_block('div_loc');
		hide_block('div_title');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Climate")
	{
		show_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Food")
	{
		hide_block('div_climate');
		show_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Stay")
	{
		hide_block('div_climate');
		hide_block('div_food');
		show_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Accessibility")
	{
		hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		show_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "NearBy Places")
	{
		hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		show_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Blog Links")
	{
		hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		show_block('div_blogLinks');
		hide_block('div_othr');
		hide_block('div_title');
		hide_block('div_loc');
	}
	else if(document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value == "Others")
	{
		hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		show_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
	}
	
}

function editImg_clm()
{
	   show_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
		hide_block('txtA_Climate');
		document.getElementById('drpTemplate').value = "Climate";
}
function editImg_fd()
{
	    hide_block('div_climate');
		show_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
		hide_block('txtA_Food');
		document.getElementById('drpTemplate').value = "Food";
}
function editImg_st()
{
	    hide_block('div_climate');
		hide_block('div_food');
		show_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
		hide_block('txtA_Stay');
		document.getElementById('drpTemplate').value = "Stay";
}
function editImg_acc()
{
	    hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		show_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
		hide_block('txtA_Access');
		document.getElementById('drpTemplate').value = "Accessibility";
}
function editImg_nb()
{
	    hide_block('div_climate');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		show_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_title');
		hide_block('div_loc');
		hide_block('txtA_NearBy');
		document.getElementById('drpTemplate').value = "NearBy Places";
}
function enable_txtA(id)
{
	document.getElementById(id).disabled = false;
	//document.getElementById(id).style.background = "#";
}
function Write_title_prev(id)
{
	show_block('div_title_prv');
	document.getElementById('sp_title_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Title_prev').value = document.getElementById('txtA_Title').value;
}
function Write_loc_prev(id)
{
	show_block('div_loc_prv');
	document.getElementById('sp_loc_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Loc_prev').value = document.getElementById('txtA_Loc').value;
}
function Write_clm_prev(id)
{
	show_block('div_clm_prv');
	document.getElementById('sp_clm_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Climate_prev').value = document.getElementById('txtA_Climate').value;
}
function Write_food_prev(id)
{
	show_block('div_fd_prv');
	document.getElementById('sp_fd_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Food_prev').value = document.getElementById('txtA_Food').value;
}
function Write_stay_prev(id)
{
	show_block('div_st_prv');
	document.getElementById('sp_st_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Stay_prev').value = document.getElementById('txtA_Stay').value;
}
function Write_accs_prev(id)
{
	show_block('div_acc_prv');
	document.getElementById('sp_acc_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Access_prev').value = document.getElementById('txtA_Access').value;
}
function Write_plc_prev(id)
{
	show_block('div_nb_prv');
	document.getElementById('sp_nb_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_NearBy_prev').value = document.getElementById('txtA_NearBy').value;
}
function Write_blg_prev(id)
{
	show_block('div_blg_prv');
	document.getElementById('sp_blg_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Blogs_prev').value = document.getElementById('txtA_Blogs').value;
}
function Write_othr_prev(id)
{
	show_block('div_oth_prv');
	document.getElementById('sp_oth_prv_hdr').innerHTML = document.getElementById(id).options[document.getElementById(id).options.selectedIndex].value ;
	document.getElementById('txtA_Others_prev').value = document.getElementById('txtA_Others').value;
}
function upload_pic_prev_clm()
{
	document.getElementById('img_clm').src = document.getElementById('imgfile_clm').value;
}
function upload_pic_prev_fd()
{
	document.getElementById('img_fd').src = document.getElementById('imgfile_fd').value;
}
function upload_pic_prev_st()
{
	document.getElementById('img_st').src = document.getElementById('imgfile_st').value;
}
function upload_pic_prev_acc()
{
document.getElementById('img_acc').src = document.getElementById('imgfile_acc').value;
}
function upload_pic_prev_plc()
{
document.getElementById('img_plc').src = document.getElementById('imgfile_plc').value;
}
function upload_pic_prev_nb()
{
document.getElementById('img_nb').src = document.getElementById('imgfile_nb').value;
}
function upload_pic_prev_oth()
{
document.getElementById('img_oth').src = document.getElementById('imgfile_oth').value;
}

function change_blog_bg()
{
	var d1 = "document.getElementById('blg_prev').style.background='#F5F5DC'";
	var d2 = "document.getElementById('blg_prev').style.background='#FFFFCC'";
	setTimeout(d1,5000);
	setTimeout(d2,5000);

	
	document.getElementById('curr_time_t1').innerHTML= day+"/"+mnt+"/"+yr+"&nbsp; &nbsp;"+hr+":"+m;
	document.getElementById('curr_time_t2').innerHTML= day+"/"+mnt+"/"+yr+"&nbsp; &nbsp;"+hr+":"+m;
}
function write_blog()
{
	//document.getElementById('sp_blg_loc_hdr').innerHTML = document.getElementById('sp_title_prv_hdr').innerHTML;
	document.getElementById('sp_blg_loc_hdr').innerHTML = document.getElementById('sp_loc_prv_hdr').innerHTML;
	document.getElementById('sp_blg_clm_hdr').innerHTML = document.getElementById('sp_clm_prv_hdr').innerHTML;
	document.getElementById('sp_blg_fd_hdr').innerHTML = document.getElementById('sp_fd_prv_hdr').innerHTML;
	document.getElementById('sp_blg_st_hdr').innerHTML = document.getElementById('sp_st_prv_hdr').innerHTML;
	document.getElementById('sp_blg_acc_hdr').innerHTML = document.getElementById('sp_acc_prv_hdr').innerHTML;
	document.getElementById('sp_blg_nb_hdr').innerHTML = document.getElementById('sp_nb_prv_hdr').innerHTML;
	document.getElementById('sp_blg_lnk_hdr').innerHTML = document.getElementById('sp_blg_prv_hdr').innerHTML;
	document.getElementById('sp_blg_oth_hdr').innerHTML = document.getElementById('sp_oth_prv_hdr').innerHTML;
	
	document.getElementById('sp_blg_title').innerHTML = document.getElementById('txtA_Title_prev').value;
	document.getElementById('sp_blg_loc_desc').innerHTML = document.getElementById('txtA_Loc_prev').value;
	document.getElementById('sp_blg_clm_desc').innerHTML = document.getElementById('txtA_Climate_prev').value;
	document.getElementById('sp_blg_fd_desc').innerHTML = document.getElementById('txtA_Food_prev').value;
	document.getElementById('sp_blg_st_desc').innerHTML = document.getElementById('txtA_Stay_prev').value;
	document.getElementById('sp_blg_acc_desc').innerHTML = document.getElementById('txtA_Access_prev').value;
	document.getElementById('sp_blg_nb_desc').innerHTML = document.getElementById('txtA_NearBy_prev').value;
	document.getElementById('sp_blg_lnk_desc').innerHTML = document.getElementById('txtA_Blogs_prev').value;
	document.getElementById('sp_blg_oth_desc').innerHTML = document.getElementById('txtA_Others_prev').value;
	
	document.getElementById('img_blg_clm').src = document.getElementById('img_clm').src; 
	document.getElementById('img_blg_fd').src = document.getElementById('img_fd').src;
	document.getElementById('img_blg_st').src = document.getElementById('img_st').src;
	document.getElementById('img_blg_acc').src = document.getElementById('img_acc').src ;
	document.getElementById('img_blg_plc').src = document.getElementById('img_plc').src ;
	document.getElementById('img_blg_nb').src = document.getElementById('img_nb').src;
	document.getElementById('img_blg_oth').src = document.getElementById('img_oth').src ;

}

function edit_blog()
{
	hide_block('div_blogs_history');
	
	show_block('div_title_prv');
	show_block('div_loc_prv');
	show_block('div_clm_prv');
	show_block('div_fd_prv');
	show_block('div_st_prv');
	show_block('div_acc_prv');
	show_block('div_nb_prv');
	show_block('div_blg_prv');
	show_block('div_oth_prv');
	
	document.getElementById('txtA_Title_prev').value = document.getElementById('sp_blg_title').innerHTML;
	document.getElementById('txtA_Loc_prev').value=document.getElementById('sp_blg_loc_desc').innerHTML;
	document.getElementById('txtA_Climate_prev').value=document.getElementById('sp_blg_clm_desc').innerHTML;
	document.getElementById('txtA_Food_prev').value=document.getElementById('sp_blg_fd_desc').innerHTML;
	document.getElementById('txtA_Stay_prev').value=document.getElementById('sp_blg_st_desc').innerHTML;
	document.getElementById('txtA_Access_prev').value=document.getElementById('sp_blg_acc_desc').innerHTML;
	document.getElementById('txtA_NearBy_prev').value=document.getElementById('sp_blg_nb_desc').innerHTML;
	document.getElementById('txtA_Blogs_prev').value=document.getElementById('sp_blg_lnk_desc').innerHTML;
	document.getElementById('txtA_Others_prev').value=document.getElementById('sp_blg_oth_desc').innerHTML;
	
	document.getElementById('img_clm').src = document.getElementById('img_blg_clm').src ;
	document.getElementById('img_fd').src = document.getElementById('img_blg_fd').src;
	document.getElementById('img_st').src = document.getElementById('img_blg_st').src;
	document.getElementById('img_acc').src = document.getElementById('img_blg_acc').src;
	document.getElementById('img_plc').src = document.getElementById('img_blg_plc').src;
	document.getElementById('img_nb').src = document.getElementById('img_blg_nb').src;
	document.getElementById('img_oth').src = document.getElementById('img_blg_oth').src;
	
	document.getElementById('sp_loc_prv_hdr').innerHTML = document.getElementById('sp_blg_loc_hdr').innerHTML  ;
	document.getElementById('sp_clm_prv_hdr').innerHTML = document.getElementById('sp_blg_clm_hdr').innerHTML ;
	document.getElementById('sp_fd_prv_hdr').innerHTML = document.getElementById('sp_blg_fd_hdr').innerHTML ;
	document.getElementById('sp_st_prv_hdr').innerHTML = document.getElementById('sp_blg_st_hdr').innerHTML  ;
	document.getElementById('sp_acc_prv_hdr').innerHTML = document.getElementById('sp_blg_acc_hdr').innerHTML  ;
	document.getElementById('sp_nb_prv_hdr').innerHTML = document.getElementById('sp_blg_nb_hdr').innerHTML ;
	document.getElementById('sp_blg_prv_hdr').innerHTML = document.getElementById('sp_blg_lnk_hdr').innerHTML ;
	document.getElementById('sp_oth_prv_hdr').innerHTML = document.getElementById('sp_blg_oth_hdr').innerHTML  ;
}

function show_compose()
{
	show_block('div_title');
		hide_block('div_food');
		hide_block('div_stay');
		hide_block('div_access');
		hide_block('div_nearby');
		hide_block('div_othr');
		hide_block('div_blogLinks');
		hide_block('div_loc');
		document.getElementById('drpTemplate').value = "Title";
		document.getElementById('txtA_Title_prev').value="";
		document.getElementById('txtA_Loc_prev').value="";
		document.getElementById('txtA_Climate_prev').value="";
		document.getElementById('txtA_Food_prev').value="";
		document.getElementById('txtA_Stay_prev').value="";
		document.getElementById('txtA_Access_prev').value="";
		document.getElementById('txtA_NearBy_prev').value="";
		document.getElementById('txtA_Blogs_prev').value="";
		document.getElementById('txtA_Others_prev').value="";
		
		 hide_block('div_title_prv');
	     hide_block('div_loc_prv');
	     hide_block('div_clm_prv');
	     hide_block('div_fd_prv');
	     hide_block('div_st_prv');
	     hide_block('div_acc_prv');
	     hide_block('div_nb_prv');
	     hide_block('div_blg_prv');
	     hide_block('div_oth_prv');
}

function Add_to_blog_directry()
{
	var table = document.getElementById('tab_blogs');
	var rIndx = table.rows.length;
	
	var row = table.insertRow(rIndx);
	
	var cel1 = row.insertCell(0);
	cel1.innerHTML = document.getElementById('drpBlg_tmplt').options[document.getElementById('drpBlg_tmplt').options.selectedIndex].value;
	
	var cel2 = row.insertCell(1);
	cel2.innerHTML = document.getElementById('drpBlg_loc').options[document.getElementById('drpBlg_loc').options.selectedIndex].value;
	
	var cel3 = row.insertCell(2);
	cel3.innerHTML = document.getElementById('drpBlg_yr').options[document.getElementById('drpBlg_yr').options.selectedIndex].value;
}
function Add_to_album_directry()
{
	var table = document.getElementById('tab_album');
	var rIndx = table.rows.length;
	
	var row = table.insertRow(rIndx);
	
	var cel1 = row.insertCell(0);
	cel1.innerHTML = document.getElementById('drpAlb_Evt').options[document.getElementById('drpAlb_Evt').options.selectedIndex].value;
	
	var cel2 = row.insertCell(1);
	cel2.innerHTML = document.getElementById('drpAlb_loc').options[document.getElementById('drpAlb_loc').options.selectedIndex].value;
	
	var cel3 = row.insertCell(2);
	cel3.innerHTML = document.getElementById('drpAlb_yr').options[document.getElementById('drpAlb_yr').options.selectedIndex].value;
}
function createBtn_blogFrames()
{
	var title = document.getElementById('drpBlgTheme').options[document.getElementById('drpBlgTheme').options.selectedIndex].value;
	var sp = document.createElement('span');
	sp.style.width="18%";
	sp.style.float="left";
	
	var d = document.createElement('div');
	d.setAttribute("class","btn_semi_trapez");
	d.style.width="100px";
	d.style.cursor="pointer";
	d.innerHTML = title+"(3)";
	d.onclick = function()
	{
		if(d.innerHTML == "Snorkeling(3)")
		{
		 document.getElementById('div_frames_snorkel').style.display='block';
		 hide_block('div_frames_trek');
		}
		if(d.innerHTML == "Trekking(3)") 
		{
	    	document.getElementById('div_frames_trek').style.display = 'block';	
			hide_block('div_frames_snorkel');
		}
	}
	
    if(title == "Others")
	{
		document.getElementById('div_Othr_blgLnk').style.display='block';
	}
	else
	{
		sp.appendChild(d);	
	   document.getElementById('div_btnInterests').appendChild(sp);
	}
}

function show_myblog()
{
	show_block('div_trpBlog');
	show_block('myTripBlogHdr');
	hide_block('Oth_Interests');
	hide_block('oth_interests');
	
	document.getElementById('btn_myTripBlogs').className = "arrow_act";
	document.getElementById('btn_OtherInterests').className = "arrow_box";
	document.getElementById('btn_myReviews').className = "arrow_box";
}

function show_othInterest()
{
	hide_block('div_trpBlog');
	hide_block('myTripBlogHdr');
	show_block('Oth_Interests');
	show_block('oth_interests');
	
	document.getElementById('btn_myTripBlogs').className = "arrow_box";
	document.getElementById('btn_OtherInterests').className = "arrow_act";
	document.getElementById('btn_myReviews').className = "arrow_box";
}
function doneOrnot(id,rd)
{
	if(document.getElementById(rd).checked == true)
	{
		document.getElementById(id).style.display = 'block';
	}
}
function check_bank(chk,id)
{
	if(document.getElementById(chk).checked==true)
	  document.getElementById(id).style.display='block';
	else
	 document.getElementById(id).style.display='none';
}
function stop_scroll()
{
	document.getElementById('marq').stop();
}
function resume_scroll()
{
	document.getElementById('marq').start();
}
function chg_frm_hdr_btn(id,id1,id2,id3,id4,id5)
{
	document.getElementById(id).className = "arrow_act";
	document.getElementById(id1).className = "arrow_box";
	document.getElementById(id2).className = "arrow_box";
	document.getElementById(id3).className = "arrow_box";
	document.getElementById(id4).className = "arrow_box";
	document.getElementById(id5).className = "arrow_box";
}

function comment(id1,id2,id3)
{
	var tab = document.getElementById('tab_topic_adv');
	
	var d1 = document.createElement('div');
	d1.className="td_disc_cmt";
	d1.style.marginTop="15px";
	
	var d1_sp1 = document.createElement('span');
	d1_sp1. innerHTML = document.getElementById(id1).innerHTML+"&nbsp;:";
	d1_sp1.className="td_name";
	d1_sp1.style.marginLeft="3px";
	
	var d1_sp2 = document.createElement('span');
	d1_sp2. innerHTML = document.getElementById(id2).innerHTML;
	d1_sp2.style.marginLeft="10px";
	
	var d1_sp3 = document.createElement('span');
	d1_sp3. innerHTML = document.getElementById(id3).innerHTML;
	d1_sp3.className="td_dateTime";
	d1_sp3.style.marginLeft="10px";
	
	d1.appendChild(d1_sp1);
	d1.appendChild(d1_sp2);
	d1.appendChild(d1_sp3);
	
	var d2 = document.createElement('div');
	d2.style.width="100%";
	d2.style.float="left";
	d2.style.marginTop="10px";
	
	var sp1 = document.createElement('span');
	sp1.style.float="left";
	sp1.className="td_name"
	sp1.innerHTML = "My Comment";
	
	var sp2 = document.createElement('textarea');
	sp2.style.width="300px";
	sp2.style.height="50px";
	sp2.style.border="1px solid #ddd";
	sp2.style.float="left";
	sp2.style.marginLeft="10px";
	
	d2.appendChild(sp1);
	d2.appendChild(sp2);
	
	document.getElementById('div_cmt_threads').appendChild(d1);
	document.getElementById('div_cmt_threads').appendChild(d2);
	
	
}

function add_to_topics_adv()
{
		
	var tab = document.getElementById('tab_topic_adv');
	var rIndex = tab.rows.length;
	var row = tab.insertRow(rIndex);
	row.setAttribute("id","tr_adv"+rIndex);
	row.onclick=function(){comment('td0_adv'+rIndex,'td1_adv'+rIndex,'td2_adv'+rIndex);};
	
	var cel = row.insertCell(0);
	cel.setAttribute("id","td0_adv"+rIndex);
	cel.innerHTML = document.getElementById('sp_frm_name').innerHTML;	
	cel.className="td_name";
	
	var cel = row.insertCell(1);
	cel.setAttribute("id","td1_adv"+rIndex);
	cel.innerHTML = document.getElementById('txtA_topic').value;
	
	
	var cel = row.insertCell(2);
	cel.setAttribute("id","td2_adv"+rIndex);
	cel.innerHTML = day+"/"+mnt+"/"+yr+"&nbsp; &nbsp;"+hr+":"+m;
	cel.className = "td_dateTime";
	
}
function add_myComt(id)
{
	if(document.getElementById('txtA_myCmt_th1').value !="")
	{
	var tab = document.getElementById('tab_thr1');
	var rI = tab.rows.length;
	var row = tab.insertRow(rI);
	
	var cel = row.insertCell(0);
	cel.className="td_name";
	cel.innerHTML = "Abc";
	
	var cel = row.insertCell(1);
	cel.innerHTML = document.getElementById('txtA_myCmt_th1').value;
	
	var cel =row.insertCell(2);
	cel.className = "td_dateTime";
	cel.innerHTML =day+"/"+mnt+"/"+yr+"&nbsp; &nbsp;"+hr+":"+m;
	}
}

function show_forum_discus()
{
	show_block('frm_grps');
	hide_block('adv_forum');
	show_block('myForum_discus');
	hide_block('myActivity');
	hide_block('myExpertise');
}

function show_forum_myActi()
{
	hide_block('myForum_discus');
	show_block('myActivity');
	hide_block('myExpertise');
}
function chg_btn_class(id1,id2,id3,id4,id5,id6,id7)
{
	document.getElementById(id1).className="btn_semi_trapez_onFocus";
	document.getElementById(id2).className="btn_semi_trapez";
	document.getElementById(id3).className="btn_semi_trapez";
	document.getElementById(id4).className="btn_semi_trapez";
	document.getElementById(id5).className="btn_semi_trapez";
	document.getElementById(id6).className="btn_semi_trapez";
	document.getElementById(id7).className="btn_semi_trapez";
}

function show_forum_myExpert()
{
	hide_block('myForum_discus');
	hide_block('myActivity');
	show_block('myExpertise');
}
function show_adv_forum_topics()
{
	hide_block('myActivity');
	show_block('myForum_discus');
	show_block('adv_forum');
	hide_block('frm_grps');
	hide_block();
}
function chk_show_td(chk,id1,id2,id3,id4)
{
	if(document.getElementById(chk).checked == true)
	{
		document.getElementById(id1).style.display="block";
		document.getElementById(id2).style.display="block";
		document.getElementById(id3).style.display="block";
		document.getElementById(id4).style.display="block";
	}
	else
	{
		document.getElementById(id1).style.display="none";
		document.getElementById(id2).style.display="none";
		document.getElementById(id3).style.display="none";
		document.getElementById(id4).style.display="none";
	}
}
function no_color_home()
{
	document.getElementById('sp_PlanTrip').style.color="#fff";
	document.getElementById('sp_Explore').style.color="#fff";
	document.getElementById('div_Book').style.color="#fff";
}
function no_color_section()
{
	document.getElementById('btn_myTop20').style.color="#fff";
	document.getElementById('btn_myTrans').style.color="#fff";
	document.getElementById('btn_myForum').style.color="#fff";
	document.getElementById('btn_myHolidays').style.color="#fff";
	document.getElementById('btn_myTripblogs').style.color="#fff";
	document.getElementById('btn_support').style.color="#fff";
	document.getElementById('btn_myTripPics').style.color="#fff";
	document.getElementById('btn_myCredits').style.color="#fff";
}
function chng_trapez(id1,id2,id3,id4,id5,id6,id7)
{
	document.getElementById(id1).className="btn_semi_trapez";
	document.getElementById(id2).className="btn_semi_trapez";
	document.getElementById(id3).className="btn_semi_trapez";
	document.getElementById(id4).className="btn_semi_trapez";
	document.getElementById(id5).className="btn_semi_trapez";
	document.getElementById(id6).className="btn_semi_trapez";
	document.getElementById(id7).className="btn_semi_trapez";
}

function book_online()
{
	change_bgcolor_cust('div_Book','sp_Explore','sp_PlanTrip');
	show_block('div_homeSection'); 
	show_block('div_BookTickets'); 
	hide_block('block1');
	hide_block('block2'); 
	hide_block('hdr_Page'); 
	no_color_section();
}

function show_hotel_online(loc)
{
	book_online();
	btnhotel_click('btnhotel','btncars','btntrains','btnbus','btnflights');	
	document.getElementById('drphltLoc').value = loc;
}

function getQuotes(wid,uid,loc)
{	
  window.open("ExploreDest_Cityscape.php?wid="+wid+"&uid="+uid);
}

function showWL(WLID)
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
    document.getElementById("div_wl_dtl").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?WLID="+WLID,true);
xmlhttp.send();	
}

function showWLL(WL)
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
    document.getElementById("div_wl_dtl").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?WLL="+WL,true);
xmlhttp.send();	
}

function show_leads(LLoc)
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
    document.getElementById("div_leads").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?LLoc="+LLoc,true);
xmlhttp.send();		
}

function chngSP_color(id)
{
	document.getElementById(id).style.color="#ff0000";
}

function open_b2b_reg()
{
	window.open("CreatePackTool.php?status=Register");
}

function reset_pwd_sus()
{
	var userID = document.getElementById('sp_user').innerHTML;
window.open("Pwd_reset.php?emlID="+userID);	
}

function reset_pwd()
{
window.open(document.getElementById('sp_lnk').innerHTML);
}

function buyPck(LID)
{
	window.open("BuyNow.php?QID="+LID+"&pck_type=Quote");
}

function cnclPck(LID)
{
	window.open("BuyNow.php?LID="+LID);
}

function showLds(lid)
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
    document.getElementById("view_quotes").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?LID="+lid,true);
xmlhttp.send();	
}

function raiseQuery(lid,qid,wid,id)
{
document.getElementById('div_capt_Q').style.display='block';
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
    document.getElementById("div_capt_Q").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?QLID="+lid+"&QID="+qid+"&WID="+wid+"&MYID="+id,true);
xmlhttp.send();		
}

function storeQuery(qid,myID,comt)
{
document.getElementById('div_capt_Q').style.display='none';
var comm = document.getElementById(comt).value;
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
    document.getElementById("div_capt_Q").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?QID="+qid+"&MYID="+myID+"&QCOMM="+comm,true);
xmlhttp.send();	
}

function custLogout(id)
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
xmlhttp.open("GET","PHP_Files/b2c_cust.php?clntID="+id,true);
xmlhttp.send();
}

function showQueryResp(qrID)
{
	show_block('queryResp_dtls');
if(window.XMLHttpRequest)
      xmlhttp = new XMLHttpRequest();
	else
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  
xmlhttp.onreadystatechange = function()
{
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
 {
	 document.getElementById('queryResp_dtls').innerHTML = xmlhttp.responseText;
 }
}
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?QueryRespID="+qrID,true);
xmlhttp.send();
}

function frame_build()
{
	document.getElementById('frm_sec').src = 'index.php';
}

 function sub_val_domes_secure(secure)
 {
	 var curCty = document.getElementById('txtcCity').value;	 
	var mode = document.getElementById('_mode').innerHTML;
	var trvlr = document.getElementById('_traveller').innerHTML;
   var dur = document.getElementById('drptime').options[document.getElementById('drptime').options.selectedIndex].value;
    var locType = document.getElementById('_locType').value;
	var locNum = document.getElementById('drpNum').options[document.getElementById('drpNum').options.selectedIndex].value;
   var locs = document.getElementById('_prefCity').value;
   var email = document.getElementById('sp_user').innerHTML;
 
  if(document.getElementById('_traveller').innerHTML=="Single-Under 45" || document.getElementById('_traveller').innerHTML=="Single-Above 45")
  {
  if(document.getElementById('rdfemale').checked == true)
   var gen = document.getElementById('rdfemale').value;
   else if(document.getElementById('rdmale').checked == true)
    var gen = document.getElementById('rdmale').value;
  }
  else
   var gen ="";
	
 window.open("Build_Trip.php?type=India&cCity="+curCty+"&mode="+mode+"&trvlr="+trvlr+"&gender="+gen+"&dur="+dur+"&locType="+locType+"&locNum="+locNum+"&locs="+locs+"&dates=&secure="+secure+"&email="+email);
 }
 
  function sub_val_abr_secure(secure)
 {
	 var curCty = document.getElementById('txtcCity').value;	 
	var trvlr = document.getElementById('_traveller').innerHTML;
   var dur = document.getElementById('drptime_abr').options[document.getElementById('drptime_abr').options.selectedIndex].value;
   var email = document.getElementById('sp_user').innerHTML;

if(document.getElementById('_traveller').innerHTML=="Single-Under 45" || document.getElementById('_traveller').innerHTML=="Single-Above 45")
  {
  if(document.getElementById('rdfemale').checked == true)
   var gen = document.getElementById('rdfemale').value;
   else if(document.getElementById('rdmale').checked == true)
    var gen = document.getElementById('rdmale').value;
  }
  else
   var gen ="";
window.open("Build_Trip.php?type=Abroad&cCity="+curCty+"&mode=Air&trvlr="+trvlr+"&gender="+gen+"&dur="+dur+"&locType=&locNum=&locs=&dates=&secure="+secure+"&email="+email);
}
