var countHr =0;
var   countMin=0;
 var cnt_clicks = 0 ; 
  
function Add_WishList_Selected(id,cateId,timeID,priceID,spanId)
{
	cnt_clicks = cnt_clicks+1;
//	alert(cnt_clicks);
	var count=0;
   var myTab= new Array();
   
  var hr = timeID.split(":");
  
  countHr = countHr + parseInt(hr[0]);  
  countMin = countMin + parseInt(hr[1]);  
  if(countMin == 60)
    countHr = countHr+1;
  
  if(countHr >10 )
    document.getElementById('sp_stay').innerHTML = "*Would you like to book a day stay?";
	
	document.getElementById('txtWL_rows').value = document.getElementById('tab_wishlist').rows.length;
	
	document.getElementById('tab_saved_WL').style.display='none';
  document.getElementById('div_wishlist').style.display='block';
  document.getElementById('div_wishlist_btns').style.display='block';
  document.getElementById('div_wishlist_btns_saved').style.display='none';
  document.getElementById('td_chk_all').style.display='table-cell';
  
   	  var table = document.getElementById('tab_wishlist');
  table.setAttribute('class','div_wishlist_tabwrite');
  var lastrow = table.rows.length;
 

if(document.getElementById(id).checked==true) 
{	
	if(document.getElementById('userLog').value =="")
	{
	if(lastrow == 2)
	{	  
	  document.getElementById('getEmail').style.display='block';
	}
	if(lastrow == 5)
	{
		document.getElementById('getEmail').style.display='block';
		document.getElementById('cls_email').style.display='none';
	}	
	}
	if(cnt_clicks <= 1 && document.getElementById('sp_secure').innerHTML == "true")
	{
        checkEmlExists();
	}


		 
  var row = table.insertRow(lastrow);
  var index = row.rowIndex;
  row.setAttribute('id','tr_'+lastrow);
  
  var city = new Array();
  var str = document.getElementById('hdr_city').innerHTML;
   city = str.split(",");
   
  var cellLeft = row.insertCell(0);
  cellLeft.setAttribute("width","15px");
  cellLeft.setAttribute("align","left");
  var textNode = document.createTextNode(lastrow);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','td0'+lastrow);
  textNode.innerHTML = lastrow;
   textNode.style.width="100%";
  cellLeft.appendChild(textNode);
   
 var cellLeft = row.insertCell(1); 
 cellLeft.setAttribute("width","110px");
 cellLeft.setAttribute("align","left");
   var i = document.createElement('textarea');
   i.setAttribute("readonly","true");
   i.setAttribute("class","div_wishlist_tab");
   i.style.width="100%";
  i.setAttribute('id','txtWL_loc_'+lastrow);
  i.setAttribute('name','txtWL_loc_'+lastrow);
  i.value = city[0];
  cellLeft.appendChild(i);
  
    cellLeft = row.insertCell(2);
	cellLeft.setAttribute("width","90px");
	cellLeft.setAttribute("align","left");
   var i = document.createElement('textarea');
    i.setAttribute("readonly","true");
	i.setAttribute("class","div_wishlist_tab");
	   i.style.width="100%";
  i.setAttribute('id','txtWL_cate_'+lastrow);
  i.setAttribute('name','txtWL_cate_'+lastrow);
  i.innerHTML = cateId;
  cellLeft.appendChild(i);
  
    cellLeft = row.insertCell(3);
	cellLeft.setAttribute("width","150px");
	cellLeft.setAttribute("align","left");
   var i = document.createElement('textarea');
    i.setAttribute("readonly","true");
	 i.setAttribute("class","div_wishlist_tab");
     i.style.width="100%";
    i.setAttribute('id','txtWL_attr_'+lastrow);
	i.setAttribute('name','txtWL_attr_'+lastrow);
   i.innerHTML = document.getElementById(id).value;
    cellLeft.appendChild(i);  	          
	  
         cellLeft = row.insertCell(4);
		 cellLeft.setAttribute("width","50px");
		 cellLeft.setAttribute("align","left");
  i = document.createElement('input');
  i.setAttribute('type','checkbox');
    i.setAttribute('id','chkWL_sel_'+lastrow);	
i.setAttribute('name','chkWL_sel_'+lastrow);
i.onclick = function() {
   var table = document.getElementById('tab_wishlist');
    rows = table.getElementsByTagName('tr');
	cells = table.getElementsByTagName('td');
	
	var t = document.getElementById('map_table_All');
			 var count = t.rows.length;
		 	 var mapRow = t.insertRow(count);
	 var mapIndex = mapRow.rowIndex;
	 
    if(this.checked==true)
	 {
	   document.getElementById('tr_'+lastrow).style.color = "#ff0000";
	   document.getElementById('txtWL_loc_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_cate_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_attr_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_sche_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_time_strt_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_time_end_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_apprTime_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_apprExp_'+lastrow).style.color="#ff0000";
	   document.getElementById('txtWL_date_'+lastrow).disabled=false;
	 document.getElementById('txtWL_date_'+lastrow).style.border="1px solid red";
	 document.getElementById('txtWL_time_strt_'+lastrow).disabled=false;
	 document.getElementById('txtWL_time_strt_'+lastrow).style.border="1px solid red";
	 document.getElementById('txtWL_time_end_'+lastrow).disabled=false;
	 document.getElementById('txtWL_time_end_'+lastrow).style.border="1px solid red";
    
		var t = document.getElementById('map_table_All');
		var table =document.getElementById('tab_wishlist');
	    t.setAttribute('class','div_wishlist_tabwrite_OnMap');
 
  var cellLeftMap = mapRow.insertCell(0);
  var textNode = document.createTextNode(count);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMap0'+count);
  textNode.innerHTML = count; 
  cellLeftMap.appendChild(textNode);
  
    cellLeftMap = mapRow.insertCell(1);
  var i = document.createElement('input');
    i.setAttribute('type','text');
    i.style.border="0px";
    i.style.background="#FFFFCC";
	i.style.width="50px";
    i.setAttribute('id','tdMap1'+count);	
	i.setAttribute('value',document.getElementById('txtWL_sche_'+lastrow).options[document.getElementById('txtWL_sche_'+lastrow).options.selectedIndex].value);
	i.onmouseover =function(){
		this.style.border="1px solid grey";
	};
	i.onmouseout =function(){
		this.style.border="0px solid grey";		
	};
	i.onchange = function(){
	   this.value = this.value.toUpperCase();
	}
	 cellLeftMap.appendChild(i); 

   
     cellLeftMap = mapRow.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap2'+count);	
	i.innerHTML =document.getElementById('txtWL_loc_'+lastrow).value;
	 cellLeftMap.appendChild(i); 
	
	   cellLeftMap = mapRow.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap3'+count);	
	i.innerHTML =document.getElementById('txtWL_attr_'+lastrow).value;
	 cellLeftMap.appendChild(i); 
	
		cellLeftMap = mapRow.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap4'+count);	
	 cellLeftMap.appendChild(i); 
 
	 	cellLeftMap = mapRow.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap5'+count);	
	 cellLeftMap.appendChild(i); 
	 
	 count++;
  }
 
    else if(this.checked == false) {		
	     document.getElementById('map_table_All').deleteRow(lastrow);
		document.getElementById('tr_'+lastrow).style.color = "#000047";
		document.getElementById('txtWL_loc_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_cate_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_attr_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_sche_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_time_strt_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_time_end_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_apprTime_'+lastrow).style.color="#000047";
	   document.getElementById('txtWL_apprExp_'+lastrow).style.color="#000047";
		 document.getElementById('txtWL_date_'+lastrow).disabled=true;
		 document.getElementById('txtWL_date_'+lastrow).style.border="1px solid grey";
		 document.getElementById('txtWL_date_'+lastrow).value="";
		 document.getElementById('txtWL_time_strt_'+lastrow).disabled=true;
		 document.getElementById('txtWL_time_strt_'+lastrow).style.border="1px solid grey";
		  document.getElementById('txtWL_time_end_'+lastrow).disabled=true;
		 document.getElementById('txtWL_time_end_'+lastrow).style.border="1px solid grey";
		  }  
	};  

  cellLeft.appendChild(i);	
	
		   	     cellLeft = row.insertCell(5);
				 cellLeft.setAttribute("width","80px");
				 cellLeft.setAttribute("align","left");
		 var i = document.createElement('input');
		 i.setAttribute("class","div_wishlist_tab");
		  i.setAttribute("width","100%");
         i.setAttribute('id','txtWL_date_'+lastrow);
		  i.setAttribute('name','txtWL_date_'+lastrow);
		 i.disabled=true;
		 i.style.width="60px";
		 i.style.fontSize = "11px"
		i.style.background="#FFFFCC";
		i.style.border="1px solid grey";
		i.onclick = function()
		{
			oDP.show(event,'txtWL_date_'+lastrow,2);
			ShowContent('TripDates');
		}
		i.onmousemove = function()
		{
			var d1=[];	
			var d2=[];
			var dt1 =[];
			var dt2 = [];
	   
	   
	       var arr= [];
		   arr[0]="DAY1";
		    arr[1]="DAY2";
			 arr[2]="DAY3";
			  arr[3]="DAY4";
          
		   var k=0;
	   
			document.getElementById('txtWL_sche_1').value=arr[0];
			
			var m= lastrow-1;
			var n= lastrow;
			//alert(n);
			var date1 = document.getElementById('txtWL_date_'+m).value;
			d1 = date1.split("/");
			
			var date2 = document.getElementById('txtWL_date_'+n).value;
			d2 = date2.split("/");
   
             if( document.getElementById('txtWL_sche_'+m).value == arr[1])
				{ 
				  k=1;
				  if(d2[0]>d1[0])
		     	{
				  document.getElementById('txtWL_sche_'+n).value = arr[k+1];
				}
				 else if(d2[0]==d1[0])
			    document.getElementById('txtWL_sche_'+n).value = document.getElementById('txtWL_sche_'+m).value;
		       	else 
			    document.getElementById('txtWL_sche_'+n).value = arr[k-1];
				  
				}
				else if( document.getElementById('txtWL_sche_'+m).value == arr[2])
				{ 
				  k=2;
				if(d2[0]>d1[0])
		     	{
				  document.getElementById('txtWL_sche_'+n).value = arr[k+1];
				}
				 else if(d2[0]==d1[0])
			    document.getElementById('txtWL_sche_'+n).value = document.getElementById('txtWL_sche_'+m).value;
		       	else 
			    document.getElementById('txtWL_sche_'+n).value = arr[k-1];
				}
				
				else if( document.getElementById('txtWL_sche_'+m).value == arr[3])
				{ 
				  k=3;
				  if(d2[0]>d1[0])
		     	{
				  document.getElementById('txtWL_sche_'+n).value = arr[k+1];
				}
				 else if(d2[0]==d1[0])
			    document.getElementById('txtWL_sche_'+n).value = document.getElementById('txtWL_sche_'+m).value;
		       	else 
			    document.getElementById('txtWL_sche_'+n).value = arr[k-1];
				  
				}
				else
				{
					k=0;
					if(d2[0]>d1[0])
		     	{
				  document.getElementById('txtWL_sche_'+n).value = arr[k+1];
				}
				 else if(d2[0]==d1[0])
			    document.getElementById('txtWL_sche_'+n).value = document.getElementById('txtWL_sche_'+m).value;
		       	else 
			    document.getElementById('txtWL_sche_'+n).value = arr[k-1];
				}
			}
		  cellLeft.appendChild(i); 
		  
		  cellLeft = row.insertCell(6);
		  cellLeft.setAttribute("width","60px");
		  cellLeft.setAttribute("align","left");
 var i = document.createElement('select');
 i.setAttribute("class","div_wishlist_tab");
 i.setAttribute('id','txtWL_sche_'+lastrow);
 i.setAttribute('name','txtWL_sche_'+lastrow);
 i.add(new Option("SELECT","SELECT"));
 i.add(new Option("DAY1","DAY1"));
 i.add(new Option("DAY2","DAY2"));
 i.add(new Option("DAY3","DAY3"));
 i.add(new Option("DAY4","DAY4"));
 i.style.width="100%"; 
  cellLeft.appendChild(i); 
		  
		  cellLeft = row.insertCell(7);
		  cellLeft.setAttribute("width","120px");
		 var i = document.createElement('select');
		  i.setAttribute("class","div_wishlist_tab");		 
         i.setAttribute('id','txtWL_time_strt_'+lastrow);
		 i.setAttribute('name','txtWL_time_strt_'+lastrow);
		 i.add(new Option("12-AM","12-AM"));
		  i.add(new Option("1-AM","1-AM"));
		   i.add(new Option("2-AM","2-AM"));
		    i.add(new Option("3-AM","3-AM"));
			i.add(new Option("4-AM","4-AM"));
		 i.add(new Option("5-AM","5-AM"));
		  i.add(new Option("6-AM","6-AM"));
		  i.add(new Option("7-AM","7-AM"));
		   i.add(new Option("8-AM","-8AM"));
		    i.add(new Option("9-AM","9-AM"));
			 i.add(new Option("10-AM","10-AM"));
			  i.add(new Option("11-AM","11-AM"));
			   i.add(new Option("1-PM","1-PM"));
			    i.add(new Option("2-PM","2-PM"));
				 i.add(new Option("3-PM","3-PM"));
				  i.add(new Option("4-PM","4-PM"));
				   i.add(new Option("5-PM","5-PM"));
				    i.add(new Option("6-PM","6-PM"));
					 i.add(new Option("7-PM","7-PM"));
					  i.add(new Option("8-PM","8-PM"));
					   i.add(new Option("9-PM","9-PM"));
					    i.add(new Option("10-PM","10-PM"));
						 i.add(new Option("11-PM","11-PM"));
						  i.add(new Option("12-PM","12-PM"));
						 
		 i.disabled =true;
		 i.style.width="35px";
		 i.style.float="left";
		 i.setAttribute("placeholder","start");
		 i.style.background="#FFFFCC";
		 i.style.border="1px solid grey";
		 i.style.marginRight = "2px";
		 var sp = document.createElement('span');
		 sp.innerHTML = ":";
		 sp.style.float="left";
		 sp.style.fontFamily = "Calibri";  
		  var j = document.createElement('select');
		 j.setAttribute("class","div_wishlist_tab");
		  j.setAttribute('id','txtWL_time_end_'+lastrow);
		 j.setAttribute('name','txtWL_time_end_'+lastrow);
		 j.add(new Option("12-AM","12-AM"));
		 j.add(new Option("1-AM","1-AM"));
		  j.add(new Option("2-AM","2-AM"));
		   j.add(new Option("3-AM","3-AM"));
			j.add(new Option("4-AM","4-AM"));
		 j.add(new Option("5-AM","5-AM"));
		  j.add(new Option("6-AM","6-AM"));
		  j.add(new Option("7-AM","7-AM"));
		   j.add(new Option("8-AM","-8AM"));
		    j.add(new Option("9-AM","9-AM"));
			 j.add(new Option("10-AM","10-AM"));
			  j.add(new Option("11-AM","11-AM"));
			   j.add(new Option("1-PM","1-PM"));
			   j.add(new Option("2-PM","2-PM"));
				j.add(new Option("3-PM","3-PM"));
				 j.add(new Option("4-PM","4-PM"));
				  j.add(new Option("5-PM","5-PM"));
				   j.add(new Option("6-PM","6-PM"));
					j.add(new Option("7-PM","7-PM"));
					 j.add(new Option("8-PM","8-PM"));
					  j.add(new Option("9-PM","9-PM"));
					 j.add(new Option("10-PM","10-PM"));
					j.add(new Option("11-PM","11-PM"));
						j.add(new Option("12-PM","12-PM"));
		 j.disabled =true;
		 j.style.width="35px";
		 j.style.float="left";
		 j.style.background="#FFFFCC";
		 j.style.border="1px solid grey";
		 	  cellLeft.appendChild(i);
			    cellLeft.appendChild(sp);
			   cellLeft.appendChild(j);
			  
	cellLeft = row.insertCell(8);
	cellLeft.setAttribute("width","50px");
	cellLeft.setAttribute("align","left");
   var i = document.createElement('textarea');
    i.setAttribute("class","div_wishlist_tab");
    i.setAttribute("readonly","true");
         i.setAttribute('id','txtWL_apprTime_'+lastrow);
		 i.setAttribute('name','txtWL_apprTime_'+lastrow);
		 i.style.textAlign="center";
		 i.style.width="100%";
		 i.innerHTML = timeID;
		  cellLeft.appendChild(i); 
		 
		  cellLeft = row.insertCell(9);
		  cellLeft.setAttribute("width","50px");
		  cellLeft.setAttribute("align","left");
   var i = document.createElement('textarea');
    i.setAttribute("class","div_wishlist_tab");
    i.setAttribute("readonly","true");
         i.setAttribute('id','txtWL_apprExp_'+lastrow);	
		 i.setAttribute('name','txtWL_apprExp_'+lastrow);
		 i.style.textAlign="center";
		    i.style.width="100%";
		 i.innerHTML = priceID;
		  cellLeft.appendChild(i); 
		  
			cellLeft = row.insertCell(10);
			cellLeft.setAttribute("width","40px");
			cellLeft.setAttribute("align","left");
  var i = document.createElement('img'); 
  i.setAttribute('src','Images/icons/Notes.jpg');
  i.setAttribute("id",lastrow);
  i.setAttribute('width','30px');
   i.setAttribute('height','25px'); 
   i.setAttribute('align','center');
	i.style.textAlign="center";
	i.onclick = function()
	{
	show_block('div_add_Notes_'+this.id);
	}	
	var j = document.createElement('div');
	j.setAttribute("id","div_add_Notes_"+lastrow);
	j.setAttribute("class","popUp_imgs_div");
	j.style.margin="0px";
	j.style.marginLeft="-200px";
	j.style.fontSize="10px";
	j.style.width="230px";
	j.style.height="100px";
	j.style.backgroundColor="#ccc";
	j.style.zIndex=10000;
	j.style.display="none";
	
	var d1 = document.createElement('div');
	d1.style.width="100%";
	d1.style.float="left";
	j.appendChild(d1);

	var img = document.createElement('img');
	img.setAttribute("src","Images/closebtn.png");
	img.setAttribute("id",lastrow);
	img.style.marginTop="0px";
	img.style.float="right";
	img.style.width="20px";
	img.style.height="20px";
	img.onclick = function()
	{
	  hide_block('div_add_Notes_'+this.id);
	}
	d1.appendChild(img);
	
	var txt = document.createElement('textarea');
	txt.setAttribute("id","txtNotes_"+lastrow);
	txt.setAttribute("name","txtNotes_"+lastrow);
	txt.style.width="200px";
	txt.setAttribute("maxlength","400");
	txt.style.padding="2px";
	txt.style.height="80px";
	txt.style.fontSize="11px";
	txt.setAttribute("placeholder","My Notes on "+document.getElementById(id).value);
	j.appendChild(txt);
	
	cellLeft.appendChild(i);
	cellLeft.appendChild(j);
			  
	cellLeft = row.insertCell(11);
	cellLeft.setAttribute("width","50px");
	cellLeft.setAttribute("align","left");
  var i = document.createElement('img'); 
  i.setAttribute('src','Images/cancelbtn.png');
  i.setAttribute('width','20px');
   i.setAttribute('height','20px'); 
   i.setAttribute('align','center');
	i.style.textAlign="center";
	i.onclick = function() 
	{
	document.getElementById('tab_wishlist').deleteRow(index);
	document.getElementById('map_table_All').deleteRow(index);
	  document.getElementById(id).checked = false;
	  document.getElementById(spanId).style.color="#222222";
	  document.getElementById(spanId).innerHTML="Add to wishlist";
	  };
	  cellLeft.appendChild(i);	
 } 

document.getElementById('chkselectAll').onclick=function(){
	var t = document.getElementById('map_table_All');
		var table =document.getElementById('tab_wishlist');
		 var count = t.rows.length;
		   t.setAttribute('class','div_wishlist_tabwrite_OnMap');
		 	
	if(document.getElementById('chkselectAll').checked==true)
	{
		for(var j=1; j<table.rows.length; j++)
		  {
			 document.getElementById('chkWL_sel_'+j).checked =true;			
			 document.getElementById('txtWL_date_'+j).disabled=false;
			 document.getElementById('txtWL_date_'+j).style.border="1px solid red";
	 		 document.getElementById('txtWL_time_strt_'+j).disabled=false;
			 document.getElementById('txtWL_time_strt_'+j).style.border="1px solid red";
			 document.getElementById('txtWL_time_end_'+j).disabled=false;
			 document.getElementById('txtWL_time_end_'+j).style.border="1px solid red";
			 document.getElementById('tr_'+j).style.color ="#ff0000";
			document.getElementById('txtWL_loc_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_cate_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_attr_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_sche_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_time_strt_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_time_end_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_apprTime_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_apprExp_'+j).style.color="#ff0000";
		  }
	for(var j=1; j<table.rows.length; j++)
		  {
	var mapRow = t.insertRow(count);
	 var mapIndex = mapRow.rowIndex;
 mapRow.setAttribute('id','trMap'+count);
 
  var cellLeft = mapRow.insertCell(0);
  var textNode = document.createTextNode(count);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMap0'+count);
  textNode.innerHTML = count;
  cellLeft.appendChild(textNode);
  
    cellLeft = mapRow.insertCell(1);
  var i = document.createElement('input');
    i.setAttribute('type','text');
	i.setAttribute('class','div_wishlist_tabwrite_OnMap');
    i.style.border="0px";
    i.style.background="#FFFFCC";
	i.style.width="50px";
    i.setAttribute('id','tdMap1'+count);	
	i.setAttribute('value',(document.getElementById('txtWL_sche_'+j).options[document.getElementById('txtWL_sche_'+j).options.selectedIndex].value).toUpperCase());
	i.onmouseover =function(){
		this.style.border="1px solid grey";
	};
	i.onmouseout =function(){
		this.style.border="0px solid grey";
	};
	 cellLeft.appendChild(i); 
   
     cellLeft = mapRow.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap2'+count);	
	i.innerHTML =document.getElementById('txtWL_loc_'+j).value;
	 cellLeft.appendChild(i); 
	
	   cellLeft = mapRow.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap3'+count);	
	i.innerHTML =document.getElementById('txtWL_attr_'+j).value;
	 cellLeft.appendChild(i); 
	
		cellLeft = mapRow.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap4'+count);
	 cellLeft.appendChild(i); 
 
	 	cellLeft = mapRow.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMap5'+count);	
	//i.innerHTML = 
	 cellLeft.appendChild(i); 
 
	 count++;
	
  if(document.getElementById('chkWL_sel_'+j).checked==false)
		 {
			 document.getElementById('txtWL_date_'+j).disabled=true;
			 document.getElementById('txtWL_date_'+j).style.border="1px solid grey";
			 document.getElementById('txtWL_time_strt_'+j).disabled=true;
			 document.getElementById('txtWL_time_strt_'+j).style.border="1px solid grey";
			 document.getElementById('txtWL_time_end_'+j).disabled=true;
			 document.getElementById('txtWL_time_end_'+j).style.border="1px solid grey";
			document.getElementById('tr_'+j).style.color ="#000047";
			document.getElementById('txtWL_loc_'+j).style.color="#000047";
	   document.getElementById('txtWL_cate_'+j).style.color="#000047";
	   document.getElementById('txtWL_attr_'+j).style.color="#000047";
	   document.getElementById('txtWL_sche_'+j).style.color="#000047";
	   document.getElementById('txtWL_time_strt_'+j).style.color="#000047";
	   document.getElementById('txtWL_time_end_'+j).style.color="#000047";
	   document.getElementById('txtWL_apprTime_'+j).style.color="#000047";
	   document.getElementById('txtWL_apprExp_'+j).style.color="#000047";
			 mapIndex=j;
			 document.getElementById('map_table_All').deleteRow(mapIndex);
		 }  

document.getElementById('tdMap1'+j).onclick =function()
  {
	var tD1 =document.getElementById('map_table_Day1');
	var tD2 =document.getElementById('map_table_Day2');
	var txtWL_loc_ =document.getElementById('map_table_Day3');
	var tD4 =document.getElementById('map_table_Day4');
	
	for(var i = tD1.rows.length - 1; i > 0; i--)
    {
    tD1.deleteRow(i);
    }
	for(var i = tD2.rows.length - 1; i > 0; i--)
    {
    tD2.deleteRow(i);
    }
	for(var i = txtWL_loc_.rows.length - 1; i > 0; i--)
    {
    txtWL_loc_.deleteRow(i);
    }
    for(var i = tD4.rows.length - 1; i > 0; i--)
    {
    tD4.deleteRow(i);
    }
	
};

}
		   
	}
	
	else
	{
		for(var j=1; j<table.rows.length; j++)
		  {
			  document.getElementById('chkWL_sel_'+j).checked =false;
			 document.getElementById('txtWL_date_'+j).disabled=true;
			 document.getElementById('txtWL_date_'+j).style.border="1px solid grey";
			 document.getElementById('txtWL_time_strt_'+j).disabled=true;
			 document.getElementById('txtWL_time_strt_'+j).style.border="1px solid grey";
			 document.getElementById('txtWL_time_end_'+j).disabled=true;
			 document.getElementById('txtWL_time_end_'+j).style.border="1px solid grey";
			  document.getElementById('tr_'+j).style.color ="#000047";
	    document.getElementById('txtWL_loc_'+j).style.color="#000047";
	   document.getElementById('txtWL_cate_'+j).style.color="#000047";
	   document.getElementById('txtWL_attr_'+j).style.color="#000047";
	   document.getElementById('txtWL_sche_'+j).style.color="#000047";
	   document.getElementById('txtWL_time_strt_'+j).style.color="#000047";
	   document.getElementById('txtWL_time_end_'+j).style.color="#000047";
	   document.getElementById('txtWL_apprTime_'+j).style.color="#000047";
	   document.getElementById('txtWL_apprExp_'+j).style.color="#000047";
			  for(var i=1; i<t.rows.length; i++)
			      t.deleteRow(i);
		  }
		  for(var j=1; j<table.rows.length; j++)
		  {
			  if(document.getElementById('chkWL_sel_'+j).checked==true)
		 {
			   document.getElementById('txtWL_date_'+j).disabled=false;
			 document.getElementById('txtWL_date_'+j).style.border="1px solid red";
	 		document.getElementById('txtWL_time_strt_'+j).disabled=false;
			 document.getElementById('txtWL_time_strt_'+j).style.border="1px solid red";
			 document.getElementById('txtWL_time_end_'+j).disabled=false;
			 document.getElementById('txtWL_time_end_'+j).style.border="1px solid red";
			 document.getElementById('tr_'+j).style.color ="#ff0000";
	    document.getElementById('txtWL_loc_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_cate_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_attr_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_sche_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_time_strt_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_time_end_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_apprTime_'+j).style.color="#ff0000";
	   document.getElementById('txtWL_apprExp_'+j).style.color="#ff0000";
		 }
		  }
		   
	}
	

	
};
	



document.getElementById('btnMapRefr').onclick=function()
{	
	var table =document.getElementById('map_table_All');
for(var j=1; j<table.rows.length; j++)
{	

//-----------------------------------------Create Table Day1---------------------------------------
	if(document.getElementById('tdMap1'+j).value=="DAY1")
	{	
		var tD1 = document.getElementById('map_table_Day1');
		var countTD1 = tD1.rows.length;
			var mapRowTD1 = tD1.insertRow(countTD1);
	 mapRowTD1.setAttribute('id','trMapD1'+countTD1);
 
  var cellLeftTD1 = mapRowTD1.insertCell(0);
  var textNode = document.createTextNode(countTD1);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD10'+countTD1);
  textNode.innerHTML = countTD1;
  cellLeftTD1.appendChild(textNode);
  
    cellLeftTD1 = mapRowTD1.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD11'+countTD1);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD1.appendChild(i); 
   
     cellLeftTD1 = mapRowTD1.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD12'+countTD1);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
	
	   cellLeftTD1 = mapRowTD1.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD13'+countTD1);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
	
		cellLeftTD1 = mapRowTD1.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD14'+countTD1);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
 
	 	cellLeftTD1 = mapRowTD1.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD15'+countTD1);	
	 cellLeftTD1.appendChild(i); 
	 
	 countTD1++;
		}
		
		//-------------------------------Create Table Day2-------------------------------------
		
	else if(document.getElementById('tdMap1'+j).value=="DAY2")
	{	
		var tD2 = document.getElementById('map_table_Day2');
		var countTD2 = tD2.rows.length;
	   var mapRowTD2 = tD2.insertRow(countTD2);
	 mapRowTD2.setAttribute('id','trMapD2'+countTD2);
 
  var cellLeftTD2 = mapRowTD2.insertCell(0);
  var textNode = document.createTextNode(countTD2);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD20'+countTD2);
  textNode.innerHTML = countTD2;
  cellLeftTD2.appendChild(textNode);
  
    cellLeftTD2 = mapRowTD2.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD21'+countTD2);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD2.appendChild(i); 
   
     cellLeftTD2 = mapRowTD2.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD22'+countTD2);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
	
	   cellLeftTD2 = mapRowTD2.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD23'+countTD2);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
	
		cellLeftTD2 = mapRowTD2.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD24'+countTD2);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
 
	 	cellLeftTD2 = mapRowTD2.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD25'+countTD2);	
	 cellLeftTD2.appendChild(i);  
	 
	 countTD2++;
		}
		
		
	//--------------------------------------------Create Table Day3-----------------------------------
	
	else if(document.getElementById('tdMap1'+j).value=="DAY3")
	{	
		var txtWL_loc_ = document.getElementById('map_table_Day3');
		var countTD3 = txtWL_loc_.rows.length;
			var mapRowTD3 = txtWL_loc_.insertRow(countTD3);
	 mapRowTD3.setAttribute('id','trMapD3'+countTD3);
 
  var cellLeftTD3 = mapRowTD3.insertCell(0);
  var textNode = document.createTextNode(countTD3);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD30'+countTD3);
  textNode.innerHTML = countTD3;
  cellLeftTD3.appendChild(textNode);
  
    cellLeftTD3 = mapRowTD3.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD31'+countTD3);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD3.appendChild(i); 
  
   
     cellLeftTD3 = mapRowTD3.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD32'+countTD3);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
	
	   cellLeftTD3 = mapRowTD3.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD33'+countTD3);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
	
		cellLeftTD3 = mapRowTD3.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD34'+countTD3);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
 
	 	cellLeftTD3 = mapRowTD3.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD35'+countTD3);	
	 cellLeftTD3.appendChild(i);  
	 
	 countTD3++;
		}
		
	//---------------------------------------------------------------Create Table Day4------------------------------------------
	
	else if(document.getElementById('tdMap1'+j).value=="DAY4")
	{	
		var tD4 = document.getElementById('map_table_Day4');
		var countTD4 = tD4.rows.length;
			var mapRowTD4 = tD4.insertRow(countTD4);
	 mapRowTD4.setAttribute('id','trMapD4'+countTD4);
 
  var cellLeftTD4 = mapRowTD4.insertCell(0);
  var textNode = document.createTextNode(countTD4);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD40'+countTD4);
  textNode.innerHTML = countTD4;
  cellLeft.appendChild(textNode);
  
    cellLeftTD4 = mapRowTD4.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD41'+countTD4);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD4.appendChild(i); 
   
     cellLeftTD4 = mapRowTD4.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD42'+countTD4);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
	
	   cellLeftTD4 = mapRowTD4.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD43'+countTD4);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
	
		cellLeftTD4 = mapRowTD4.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD44'+countTD4);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
 
	 	cellLeftTD4 = mapRowTD4.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD45'+countTD4);	
	 cellLeftTD4.appendChild(i);  
	 
	 countTD4++;
		} 
	
	}
};

document.getElementById('imgDel').onclick =function()
{
	var table = document.getElementById('tab_wishlist');
	for(var i = table.rows.length - 1; i > 0; i--)
    {
    table.deleteRow(i);
    }
};


document.getElementById('btnMapAll').onclick= function (){
	
	 document.getElementById('map_selected_Day1').style.display='none'; 	
	document.getElementById('map_selected_Day2').style.display='none';
	document.getElementById('map_selected_Day3').style.display='none';
	document.getElementById('map_selected_Day4').style.display='none';
	
	document.getElementById('map_selected_All').style.display='block';
   	
   var latlng = new google.maps.LatLng(12.97160, 77.59456); 
     var map = new google.maps.Map(document.getElementById('map_selected_All'), {
       zoom:12,
	   center:latlng ,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
	 
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

var t= document.getElementById('map_table_All');

var mark=[];
var info = [];
var day =[];
var address = [];
var time = [];

for(var i=1; i<t.rows.length; i++)
{
address[i] = t.rows[i].cells[3].innerText+","+ t.rows[i].cells[2].innerText;

 if(document.getElementById('tdMap1'+i).value=="SELECT")
	    {
day[i] = document.getElementById('tdMap1'+i).value;
		time[i] = document.getElementById('txtWL_time_strt_'+i).value + " to "+document.getElementById('txtWL_time_end_'+i).value;
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day0.png',
              map: map
		   });
	for(var i=1; i<t.rows.length; i++)		
	{
		if(day[i] == "SELECT")
		{
	 var info = new google.maps.InfoWindow({
          content:"<span style=\"color:#444; font-size:10px;\">"+day[i]+" : "+address[i]+ "</span><br/><span style=\"color:#ff0000; font-size:10px;\"> Visit plan:"+ time[i]+"</span>",
		   position:res[0].geometry.location,
		   map:map
		  
  });

google.maps.event.addListener(marker, 'click', function() {
 info.open(map,marker);
});
		}
	}
	  });
		// google.maps.event.addDomListener(window, 'load', initialize);
	  }

 
 else if(document.getElementById('tdMap1'+i).value=="DAY1" || document.getElementById('tdMap1'+i).value=="D1")
	    {	
		  day[i] = document.getElementById('tdMap1'+i).value;
		time[i] = document.getElementById('txtWL_time_strt_'+i).value + " to "+document.getElementById('txtWL_time_end_'+i).value;
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day1.png',
              map: map
		   });
	for(var i=1; i<t.rows.length; i++)		
	{
		if(day[i] == "DAY1")
		{
	 var info = new google.maps.InfoWindow({
          content:"<span style=\"color:#444; font-size:10px;\">"+day[i]+" : "+address[i]+ "</span><br/><span style=\"color:#ff0000; font-size:10px;\"> Visit plan:"+ time[i]+"</span>",
		   position:res[0].geometry.location,
		   map:map
		  
  });

//google.maps.event.addListener(marker, 'click', function() {
 // info.open(map,marker);
 //});
		}
	}
	  });
	  }
	  
	else if(document.getElementById('tdMap1'+i).value=="DAY2" || document.getElementById('tdMap1'+i).value=="D2")
	  {
		  day[i] = document.getElementById('tdMap1'+i).value;
		time[i] = document.getElementById('txtWL_time_strt_'+i).value + " to "+document.getElementById('txtWL_time_end_'+i).value;
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day2.png',
              map: map
		   });
	for(var i=1; i<t.rows.length; i++)		
	{
		if(day[i] == "DAY2")
		{
	 var info = new google.maps.InfoWindow({
          content:"<span style=\"color:#444; font-size:10px;\">"+day[i]+" : "+address[i]+ "</span><br/><span style=\"color:#ff0000; font-size:10px;\"> Visit plan:"+ time[i]+"</span>",
		   position:res[0].geometry.location,
		   map:map
		  
  });

//google.maps.event.addListener(marker, 'click', function() {
 // info.open(map,marker);
 //});
		}
	}
	  });
	  }
	  
	else if(document.getElementById('tdMap1'+i).value=="DAY3" || document.getElementById('tdMap1'+i).value=="D3")
	  {
day[i] = document.getElementById('tdMap1'+i).value;
		time[i] = document.getElementById('txtWL_time_strt_'+i).value + " to "+document.getElementById('txtWL_time_end_'+i).value;
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day3.png',
              map: map
		   });
	for(var i=1; i<t.rows.length; i++)		
	{
		if(day[i] == "DAY3")
		{
	 var info = new google.maps.InfoWindow({
           content:"<span style=\"color:#444; font-size:10px;\">"+day[i]+" : "+address[i]+ " </span><br/><span style=\"color:#ff0000; font-size:10px;\"> Visit plan:"+ time[i]+"</span>",
		   position:res[0].geometry.location,
		   map:map
  });

//google.maps.event.addListener(marker, 'click', function() {
//  info.open(map,marker);
 // });
		}
	}
	  });
	  }
	  
	else if(document.getElementById('tdMap1'+i).value=="DAY4" || document.getElementById('tdMap1'+i).value=="D4")
	  {
day[i] = document.getElementById('tdMap1'+i).value;
		time[i] = document.getElementById('txtWL_time_strt_'+i).value + " to "+document.getElementById('txtWL_time_end_'+i).value;
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
                var marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day4.png',
              map: map
		   });
	for(var i=1; i<t.rows.length; i++)		
	{
		if(day[i] == "DAY4")
		{
	 var info = new google.maps.InfoWindow({
           content:"<span style=\"color:#444; font-size:10px;\">"+day[i]+" : "+address[i]+ " </span><br/><span style=\"color:#ff0000; font-size:10px;\">  Visit plan:"+ time[i]+"</span>",
		   position:res[0].geometry.location,
		   map:map
  });

//google.maps.event.addListener(marker, 'click', function() {
//  info.open(map,marker);
// });
		}
	}
	  });
	  }

}

directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

	var waypoints1 = [];
	for (var i = 1; i < t.rows.length; i++) {
 address[i] = document.getElementById('tdMap3'+i).innerHTML+","+document.getElementById('tdMap2'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints1.push({
            location: address[i],
            stopover: true
        });
     }
}

var j=t.rows.length-1;
 var request = {
       origin:document.getElementById('tdMap31').innerHTML+","+document.getElementById('tdMap21').innerHTML, 
       destination:document.getElementById('tdMap3'+j).innerHTML+","+document.getElementById('tdMap2'+j).innerHTML,
	   waypoints: waypoints1, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
};

 document.getElementById('btnMapDay1').onclick= function (){
	
	document.getElementById('map_selected_All').style.display='none';
	document.getElementById('map_selected_Day2').style.display='none';
	document.getElementById('map_selected_Day3').style.display='none';
	document.getElementById('map_selected_Day4').style.display='none';
	
	document.getElementById('map_selected_Day1').style.display='block';

var latlng = new google.maps.LatLng(12.97160, 77.59456); 
var map = new google.maps.Map(document.getElementById('map_selected_Day1'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day1');
var address = [];
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('tdMapD13'+i).innerHTML+","+document.getElementById('tdMapD12'+i).innerHTML;	
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
              var  marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/day1.png',
              map: map
            });
			  
		 var info=new google.maps.InfoWindow({
              position: res[0].geometry.location,
			   content: address[i]
            });			 
            google.maps.event.addListener(marker,'click',function(){
                 info.open(map,marker);												
              });
		 });
}


	var waypoints = [];
	for (var i = 1; i < t.rows.length-1; i++) {
 address[i] = document.getElementById('tdMapD13'+i).innerHTML+","+document.getElementById('tdMapD12'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints.push({
            location: address[i],
            stopover: true
        });
   }
}

directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

var j= t.rows.length-1;
	 var request = {
       origin:document.getElementById('tdMapD131').innerHTML+","+document.getElementById('tdMapD121').innerHTML, 
       destination:document.getElementById('tdMapD13'+j).innerHTML+","+document.getElementById('tdMapD12'+j).innerHTML,
	   waypoints: waypoints, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };
	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
 };

 document.getElementById('btnMapDay2').onclick= function (){
	
	document.getElementById('map_selected_All').style.display='none';
	document.getElementById('map_selected_Day1').style.display='none';
	document.getElementById('map_selected_Day3').style.display='none';
	document.getElementById('map_selected_Day4').style.display='none';
	
	document.getElementById('map_selected_Day2').style.display='block';
	
var latlng = new google.maps.LatLng(12.97160, 77.59456); 
var map = new google.maps.Map(document.getElementById('map_selected_Day2'), {
       zoom:12,
	   center:latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day2');
var address = [];
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{

 address[i] = document.getElementById('tdMapD23'+i).innerHTML+","+document.getElementById('tdMapD22'+i).innerHTML;	
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
              var  marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/day2.png',
              map: map
            });
			  
		 var info=new google.maps.InfoWindow({
              position: res[0].geometry.location,
			   content: address[i]
            });			 
		     google.maps.event.addListener(marker,'click',function(){
                 info.open(map,marker);												
              });
		 });
 }

	var waypoints = [];
	for (var i = 2; i < t.rows.length-1; i++) {
 address[i] = document.getElementById('tdMapD23'+i).innerHTML+","+document.getElementById('tdMapD22'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints.push({
            location: address[i],
            stopover: true
        });
    }
}

     directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

var j =t.rows.length-1;

	 var request = {
       origin:document.getElementById('tdMapD231').innerHTML+","+document.getElementById('tdMapD221').innerHTML, 
       destination:document.getElementById('tdMapD23'+j).innerHTML+","+document.getElementById('tdMapD22'+j).innerHTML,
	   waypoints: waypoints, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });

 }; 


 document.getElementById('btnMapDay3').onclick= function (){
	
	document.getElementById('map_selected_All').style.display='none';
	document.getElementById('map_selected_Day1').style.display='none';
	document.getElementById('map_selected_Day2').style.display='none';
	document.getElementById('map_selected_Day4').style.display='none';
	
	document.getElementById('map_selected_Day3').style.display='block';

var latlng = new google.maps.LatLng(12.97160, 77.59456); 
var map = new google.maps.Map(document.getElementById('map_selected_Day3'), {
       zoom:12,
	   center: latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day3');
var address = [];
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('tdMapD33'+i).innerHTML+","+document.getElementById('tdMapD32'+i).innerHTML;	
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
              var  marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/day3.png',
              map: map
            });
			  
		 var info=new google.maps.InfoWindow({
              position: res[0].geometry.location,
			   content: address[i]
            });			 
		     google.maps.event.addListener(marker,'click',function(){
                 info.open(map,marker);												
              });
		 });
}

	var waypoints = [];
	for (var i = 2; i < t.rows.length-1; i++) {

 address[i] = document.getElementById('tdMapD33'+i).innerHTML+","+document.getElementById('tdMapD32'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints.push({
            location: address[i],
            stopover: true
        });
   }
}

     directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );
var j=t.rows.length-1;
	 var request = {
       origin:document.getElementById('tdMapD331').innerHTML+","+document.getElementById('tdMapD321').innerHTML, 
       destination:document.getElementById('tdMapD33'+j).innerHTML+","+document.getElementById('tdMapD32'+j).innerHTML,
	   waypoints: waypoints, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
}; 

 document.getElementById('btnMapDay4').onclick= function (){
	
	document.getElementById('map_selected_All').style.display='none';
	document.getElementById('map_selected_Day1').style.display='none';
	document.getElementById('map_selected_Day2').style.display='none';
	document.getElementById('map_selected_Day3').style.display='none';
	
	document.getElementById('map_selected_Day4').style.display='block';

var latlng = new google.maps.LatLng(12.97160, 77.59456);
var map = new google.maps.Map(document.getElementById('map_selected_Day4'), {
       zoom:12,
	    center: latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });

var t= document.getElementById('map_table_Day4');
var address = [];
//var label =[];
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

for(var i=1; i<t.rows.length; i++)
{
 address[i] = document.getElementById('tdMapD43'+i).innerHTML+","+document.getElementById('tdMapD42'+i).innerHTML;	
			var gc = new google.maps.Geocoder();
		 gc.geocode({'address': address[i]}, function (res, status) {
              var  marker=new google.maps.Marker({
              position: res[0].geometry.location,
			   icon:'Images/Days/Day4.png',
              map: map
            });
			  
		 var info=new google.maps.InfoWindow({
              position: res[0].geometry.location,
			   content: address[i]
            });
		 
		    google.maps.event.addListener(marker,'click',function(){
                 info.open(map,marker);		
              });
		 });
  }

	var waypoints = [];
	for (var i = 2; i < t.rows.length-1; i++) {
 address[i] = document.getElementById('tdMapD43'+i).innerHTML+","+document.getElementById('tdMapD42'+i).innerHTML;	
   if (address[i] !== "") {
        waypoints.push({
            location: address[i],
            stopover: true
        });
     }
}

     directionsDisplay.setMap(map);
directionsDisplay.setOptions( { suppressMarkers: true } );

var j =t.rows.length -1;
	 var request = {
       origin:document.getElementById('tdMapD431').innerHTML+","+document.getElementById('tdMapD421').innerHTML, 
       destination:document.getElementById('tdMapD43'+j).innerHTML+","+document.getElementById('tdMapD42'+j).innerHTML,
	   waypoints: waypoints, 
       optimizeWaypoints: true,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

	 
     directionsService.route(request, function(response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
};
   


document.getElementById('btn_wshlst_mapView').onclick=function(){
	
	var table =document.getElementById('map_table_All');
	
for(var j=1; j<table.rows.length; j++)
{	

//-----------------------------------------Create Table Day1---------------------------------------
	if(document.getElementById('tdMap1'+j).value=="DAY1")
	{	
		var tD1 = document.getElementById('map_table_Day1');
		var countTD1 = tD1.rows.length;
			var mapRowTD1 = tD1.insertRow(countTD1);
	 mapRowTD1.setAttribute('id','trMapD1'+countTD1);
 
  var cellLeftTD1 = mapRowTD1.insertCell(0);
  var textNode = document.createTextNode(countTD1);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD10'+countTD1);
  textNode.innerHTML = countTD1;
  cellLeftTD1.appendChild(textNode);
  
    cellLeftTD1 = mapRowTD1.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD11'+countTD1);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD1.appendChild(i); 
   
     cellLeftTD1 = mapRowTD1.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD12'+countTD1);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
	
	   cellLeftTD1 = mapRowTD1.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD13'+countTD1);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
	
		cellLeftTD1 = mapRowTD1.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD14'+countTD1);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD1.appendChild(i); 
 
	 	cellLeftTD1 = mapRowTD1.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD15'+countTD1);	
	 cellLeftTD1.appendChild(i); 
	 
	 countTD1++;
		}
		
		//-------------------------------Create Table Day2-------------------------------------
		
	else if(document.getElementById('tdMap1'+j).value=="DAY2")
	{	
		var tD2 = document.getElementById('map_table_Day2');
		var countTD2 = tD2.rows.length;
	   var mapRowTD2 = tD2.insertRow(countTD2);
	 mapRowTD2.setAttribute('id','trMapD2'+countTD2);
 
  var cellLeftTD2 = mapRowTD2.insertCell(0);
  var textNode = document.createTextNode(countTD2);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD20'+countTD2);
  textNode.innerHTML = countTD2;
  cellLeftTD2.appendChild(textNode);
  
    cellLeftTD2 = mapRowTD2.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD21'+countTD2);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD2.appendChild(i); 
   
     cellLeftTD2 = mapRowTD2.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD22'+countTD2);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
	
	   cellLeftTD2 = mapRowTD2.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD23'+countTD2);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
	
		cellLeftTD2 = mapRowTD2.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD24'+countTD2);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD2.appendChild(i); 
 
	 	cellLeftTD2 = mapRowTD2.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD25'+countTD2);	
	 cellLeftTD2.appendChild(i);  
	 
	 countTD2++;
		}
		
		
	//--------------------------------------------Create Table Day3-----------------------------------
	
	else if(document.getElementById('tdMap1'+j).value=="DAY3")
	{	
		var txtWL_loc_ = document.getElementById('map_table_Day3');
		var countTD3 = txtWL_loc_.rows.length;
			var mapRowTD3 = txtWL_loc_.insertRow(countTD3);
	 mapRowTD3.setAttribute('id','trMapD3'+countTD3);
 
  var cellLeftTD3 = mapRowTD3.insertCell(0);
  var textNode = document.createTextNode(countTD3);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD30'+countTD3);
  textNode.innerHTML = countTD3;
  cellLeftTD3.appendChild(textNode);
  
    cellLeftTD3 = mapRowTD3.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD31'+countTD3);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD3.appendChild(i); 
  
   
     cellLeftTD3 = mapRowTD3.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD32'+countTD3);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
	
	   cellLeftTD3 = mapRowTD3.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD33'+countTD3);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
	
		cellLeftTD3 = mapRowTD3.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD34'+countTD3);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD3.appendChild(i); 
 
	 	cellLeftTD3 = mapRowTD3.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD35'+countTD3);	
	 cellLeftTD3.appendChild(i);  
	 
	 countTD3++;
		}
		
	//---------------------------------------------------------------Create Table Day4------------------------------------------
	
	else if(document.getElementById('tdMap1'+j).value=="DAY4")
	{	
		var tD4 = document.getElementById('map_table_Day4');
		var countTD4 = tD4.rows.length;
			var mapRowTD4 = tD4.insertRow(countTD4);
	 mapRowTD4.setAttribute('id','trMapD4'+countTD4);
 
  var cellLeftTD4 = mapRowTD4.insertCell(0);
  var textNode = document.createTextNode(countTD4);
  var textNode = document.createElement('span');
  textNode.setAttribute('id','tdMapD40'+countTD4);
  textNode.innerHTML = countTD4;
  cellLeft.appendChild(textNode);
  
    cellLeftTD4 = mapRowTD4.insertCell(1);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD41'+countTD4);	
	i.innerHTML =document.getElementById('tdMap1'+j).value;
	 cellLeftTD4.appendChild(i); 
   
     cellLeftTD4 = mapRowTD4.insertCell(2);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD42'+countTD4);	
	i.innerHTML =document.getElementById('tdMap2'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
	
	   cellLeftTD4 = mapRowTD4.insertCell(3);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD43'+countTD4);	
	i.innerHTML =document.getElementById('tdMap3'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
	
		cellLeftTD4 = mapRowTD4.insertCell(4);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD44'+countTD4);
	i.innerHTML =document.getElementById('tdMap4'+j).innerHTML;
	 cellLeftTD4.appendChild(i); 
 
	 	cellLeftTD4 = mapRowTD4.insertCell(5);
  var i = document.createElement('span');
    i.setAttribute('id','tdMapD45'+countTD4);	
	 cellLeftTD4.appendChild(i);  
	 
	 countTD4++;
		} 
	
	}	
	
	
	
document.getElementById('tdMap41').innerHTML=0;
		
 var directionsService = new google.maps.DirectionsService();
 
 var request1 = {
				origin:document.getElementById('tdMap31').innerHTML+","+document.getElementById('tdMap21').innerHTML, 
				destination:document.getElementById('tdMap32').innerHTML+","+document.getElementById('tdMap22').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request1, function(response, status) {
				document.getElementById('tdMap42').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
			});

var request2 = {
				origin:document.getElementById('tdMap22').innerHTML+","+document.getElementById('tdMap32').innerHTML, 
				destination:document.getElementById('tdMap23').innerHTML+","+document.getElementById('tdMap33').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request2, function(response, status) {
				document.getElementById('tdMap43').innerHTML = Math.round(response.routes[0].legs[0].distance.value / 1000);
		});

	var request3 = {
				origin:document.getElementById('tdMap23').innerHTML+","+document.getElementById('tdMap33').innerHTML, 
				destination:document.getElementById('tdMap24').innerHTML+","+document.getElementById('tdMap34').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request3, function(response, status) {
			var rt3= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap44').innerHTML = Math.round(rt3);
		});
		
		
		var request4 = {
				origin:document.getElementById('tdMap24').innerHTML+","+document.getElementById('tdMap34').innerHTML, 
				destination:document.getElementById('tdMap25').innerHTML+","+document.getElementById('tdMap35').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request4, function(response, status) {
			var rt4= response.routes[0].legs[0].distance.value / 1000;
		    document.getElementById('tdMap45').innerHTML = Math.round(rt4);
		}); 

		var request5 = {
				origin:document.getElementById('tdMap25').innerHTML+","+document.getElementById('tdMap35').innerHTML, 
				destination:document.getElementById('tdMap26').innerHTML+","+document.getElementById('tdMap36').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request5, function(response, status) {
			var rt5= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap46').innerHTML =Math.round(rt5);
		}); 
			
		var request6 = {
				origin:document.getElementById('tdMap26').innerHTML+","+document.getElementById('tdMap36').innerHTML, 
				destination:document.getElementById('tdMap27').innerHTML+","+document.getElementById('tdMap37').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request6, function(response, status) {
			var rt6= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap47').innerHTML = Math.round(rt6);
		});		
			
		var request7 = {
				origin:document.getElementById('tdMap27').innerHTML+","+document.getElementById('tdMap37').innerHTML, 
				destination:document.getElementById('tdMap28').innerHTML+","+document.getElementById('tdMap38').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request7, function(response, status) {
			var rt7= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap48').innerHTML =Math.round(rt7);
		});	

		var request8 = {
				origin:document.getElementById('tdMap28').innerHTML+","+document.getElementById('tdMap38').innerHTML, 
				destination:document.getElementById('tdMap29').innerHTML+","+document.getElementById('tdMap39').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request8, function(response, status) {
			var rt8= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap49').innerHTML =Math.round(rt8);
		});	
			
var request9 = {
				origin:document.getElementById('tdMap29').innerHTML+","+document.getElementById('tdMap39').innerHTML, 
				destination:document.getElementById('tdMap210').innerHTML+","+document.getElementById('tdMap310').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request9, function(response, status) {
			var rt9 = response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap410').innerHTML =Math.round(rt9);
		});	
			
var request10 = {
				origin:document.getElementById('tdMap210').innerHTML+","+document.getElementById('tdMap310').innerHTML, 
				destination:document.getElementById('tdMap211').innerHTML+","+document.getElementById('tdMap311').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request10, function(response, status) {
			var rt10 = response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap411').innerHTML =Math.round(rt10);
		});	
			
var request11 = {
				origin:document.getElementById('tdMap211').innerHTML+","+document.getElementById('tdMap311').innerHTML, 
				destination:document.getElementById('tdMap212').innerHTML+","+document.getElementById('tdMap312').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request11, function(response, status) {
			var rt11 = response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap412').innerHTML =Math.round(rt11);
		});			

var request12 = {
				origin:document.getElementById('tdMap212').innerHTML+","+document.getElementById('tdMap312').innerHTML, 
				destination:document.getElementById('tdMap213').innerHTML+","+document.getElementById('tdMap313').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request12, function(response, status) {
			var rt12= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap413').innerHTML =Math.round(rt12);
		});

var request13 = {
				origin:document.getElementById('tdMap213').innerHTML+","+document.getElementById('tdMap313').innerHTML, 
				destination:document.getElementById('tdMap214').innerHTML+","+document.getElementById('tdMap314').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request13, function(response, status) {
			var rt13= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap414').innerHTML = Math.round(rt13);
		});

var request14 = {
				origin:document.getElementById('tdMap214').innerHTML+","+document.getElementById('tdMap314').innerHTML, 
				destination:document.getElementById('tdMap215').innerHTML+","+document.getElementById('tdMap315').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request14, function(response, status) {
			var rt14= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap415').innerHTML =Math.round(rt14);
		});

var request15 = {
				origin:document.getElementById('tdMap215').innerHTML+","+document.getElementById('tdMap315').innerHTML, 
				destination:document.getElementById('tdMap216').innerHTML+","+document.getElementById('tdMap316').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request15, function(response, status) {
			var rt15 = response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap416').innerHTML=Math.round(rt15);
		});


var request16 = {
				origin:document.getElementById('tdMap216').innerHTML+","+document.getElementById('tdMap316').innerHTML, 
				destination:document.getElementById('tdMap217').innerHTML+","+document.getElementById('tdMap317').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request16, function(response, status) {
			var rt16 = response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap417').innerHTML =Math.round(rt16);
		});
			
var request17 = {
				origin:document.getElementById('tdMap217').innerHTML+","+document.getElementById('tdMap317').innerHTML, 
				destination:document.getElementById('tdMap218').innerHTML+","+document.getElementById('tdMap318').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request17, function(response, status) {
			var rt17= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap418').innerHTML =Math.round(rt17);
		});	
			
var request18 = {
				origin:document.getElementById('tdMap218').innerHTML+","+document.getElementById('tdMap318').innerHTML, 
				destination:document.getElementById('tdMap219').innerHTML+","+document.getElementById('tdMap319').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request18, function(response, status) {
			var rt18= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap419').innerHTML = Math.round(rt18);
		});	
			
var request19 = {
				origin:document.getElementById('tdMap219').innerHTML+","+document.getElementById('tdMap319').innerHTML, 
				destination:document.getElementById('tdMap220').innerHTML+","+document.getElementById('tdMap320').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request19, function(response, status) {
			var rt19= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap420').innerHTML =Math.round(rt19);
		});	
			
var request20 = {
				origin:document.getElementById('tdMap220').innerHTML+","+document.getElementById('tdMap320').innerHTML, 
				destination:document.getElementById('tdMap221').innerHTML+","+document.getElementById('tdMap321').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request20, function(response, status) {
			var rt20= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap421').innerHTML = Math.round(rt20);
		});	
			
var request21 = {
				origin:document.getElementById('tdMap221').innerHTML+","+document.getElementById('tdMap321').innerHTML, 
				destination:document.getElementById('tdMap222').innerHTML+","+document.getElementById('tdMap322').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request21, function(response, status) {
			var rt21= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap422').innerHTML=Math.round(rt21);
		});			

var request22 = {
				origin:document.getElementById('tdMap222').innerHTML+","+document.getElementById('tdMap322').innerHTML, 
				destination:document.getElementById('tdMap223').innerHTML+","+document.getElementById('tdMap323').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request22, function(response, status) {
			var rt22= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap423').innerHTML=Math.round(rt22);
		});

var request23 = {
				origin:document.getElementById('tdMap223').innerHTML+","+document.getElementById('tdMap323').innerHTML, 
				destination:document.getElementById('tdMap224').innerHTML+","+document.getElementById('tdMap324').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request23, function(response, status) {
			var rt23= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap424').innerHTML=Math.round(rt23);
		});

var request24 = {
				origin:document.getElementById('tdMap224').innerHTML+","+document.getElementById('tdMap324').innerHTML, 
				destination:document.getElementById('tdMap225').innerHTML+","+document.getElementById('tdMap325').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request24, function(response, status) {
			var rt24= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap425').innerHTML =Math.round(rt24);
		});

var request25 = {
				origin:document.getElementById('tdMap225').innerHTML+","+document.getElementById('tdMap325').innerHTML, 
				destination:document.getElementById('tdMap226').innerHTML+","+document.getElementById('tdMap326').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request25, function(response, status) {
			var rt25= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap426').innerHTML=Math.round(rt25);
		});

var request26 = {
				origin:document.getElementById('tdMap226').innerHTML+","+document.getElementById('tdMap326').innerHTML, 
				destination:document.getElementById('tdMap227').innerHTML+","+document.getElementById('tdMap327').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request26, function(response, status) {
			var rt26= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap427').innerHTML=Math.round(rt26);
		});
			
var request27 = {
				origin:document.getElementById('tdMap227').innerHTML+","+document.getElementById('tdMap327').innerHTML, 
				destination:document.getElementById('tdMap228').innerHTML+","+document.getElementById('tdMap328').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request27, function(response, status) {
			var rt27= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap428').innerHTML =Math.round(rt27);
		});	
			
var request28 = {
				origin:document.getElementById('tdMap228').innerHTML+","+document.getElementById('tdMap328').innerHTML, 
				destination:document.getElementById('tdMap229').innerHTML+","+document.getElementById('tdMap329').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			

			directionsService.route(request28, function(response, status) {
			var rt28= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap429').innerHTML=Math.round(rt28);
		});	
var request29 = {
				origin:document.getElementById('tdMap229').innerHTML+","+document.getElementById('tdMap329').innerHTML, 
				destination:document.getElementById('tdMap230').innerHTML+","+document.getElementById('tdMap330').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request29, function(response, status) {
			var rt29= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap430').innerHTML =Math.round(rt29);
		});	
			
var request30 = {
				origin:document.getElementById('tdMap230').innerHTML+","+document.getElementById('tdMap330').innerHTML, 
				destination:document.getElementById('tdMap231').innerHTML+","+document.getElementById('tdMap331').innerHTML,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request30, function(response, status) {
			var rt30= response.routes[0].legs[0].distance.value / 1000;
			document.getElementById('tdMap431').innerHTML=Math.round(rt30);
		});	    
 };

}
