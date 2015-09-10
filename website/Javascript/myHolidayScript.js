function createEvents(d,m,y)
{
 	//document.getElementById(this).style.color ="#FF0000";
	document.getElementById('div_add_events').style.display ='block';
	
	var table = document.getElementById('tab_Events');
	
	var index = table.rows.length;
	var row = table.insertRow(index);
	row.setAttribute('id','trEv'+index);
	
	var rIndex = row.rowIndex;
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.setAttribute('id','tdEv0'+index);
	i.innerHTML = index;
	cel.appendChild(i);
	
	 cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv1'+index);
	 i.add(new Option("Select","Select"));
    i.add(new Option("Birthday","Birthday"));
    i.add(new Option("Anniversary","Anniversary"));
	i.add(new Option("Festival","Festival"));
	i.add(new Option("Family Reunion","Family Reunion"));
    i.add(new Option("Inauguration","Inauguration"));
    i.add(new Option("Picnic","Picnic"));
	i.add(new Option("Annual Holiday","Annual Holiday"));
	cel.appendChild(i);
	
	 cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv2'+index);
	cel.appendChild(i);
	
	 cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv3'+index);
	cel.appendChild(i);
	
		 cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv4'+index);
	cel.appendChild(i);
	
	 cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv5'+index);
	i.style.width="60px";
	i.value = d+"/"+m+"/"+y;
	i.onclick = function()
	{
		oDP.show(event,'tdEv5'+index,2);
		ShowContent('Hol_End');
	};
	cel.appendChild(i);
	
	 cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv6'+index);
	i.style.width="60px";
	i.style.fontSize="14px";
	i.onclick = function()
	{
		oDP.show(event,'tdEv6'+index,2);
		ShowContent('Hol_End');
	};
	i.onmouseout = function(){
	 
	 var day1=document.getElementById('tdEv5'+index).value;
	var day2=document.getElementById('tdEv6'+index).value;
	var days;
	
	var d1= [];
	var d2 =[];
	d1 = day1.split("/");
	d2 = day2.split("/");
	
	if(d1[1]==d1[1])
		days = d2[0]-d1[0];
	
	var nights = days-1;
	
	document.getElementById('tdEv7'+index).innerHTML = days+"D/"+nights+"N";	 
	};
	cel.appendChild(i);
	
	 cel = row.insertCell(7);
	var i = document.createElement('span');
	i.setAttribute('id','tdEv7'+index);
	i.style.width="40px";
	cel.appendChild(i);
	
   cel = row.insertCell(8);
	var i = document.createElement('div');
	i.setAttribute('class','smallbtn');
	i.style.fontSize = "14px";
	i.style.width="20px";
	i.innerHTML ="+";
	i.setAttribute('id','tdEv8'+index);
     i.onclick = function()
	{	createEvents(); };  
	cel.appendChild(i);  
	
	cel = row.insertCell(9);
	var i = document.createElement('img');
	i.setAttribute('src','Images/cancelbtn.png');
     i.setAttribute('width','25px');
    i.setAttribute('height','25px'); 
	i.setAttribute('id','tdEv9'+index);
	i.style.cursor="pointer";
	i.onclick = function(){
	  document.getElementById('tab_Events').deleteRow(rIndex);	
	};
	cel.appendChild(i);
		
	cel = row.insertCell(10);
	var i = document.createElement('span');
	i.setAttribute('class','txtbox_hol_ev');
	i.style.width="80px";
	i.setAttribute('id','tdEv10'+index);
	cel.appendChild(i);
}

 /*  function saveEvents()
{
   var tab = document.getElementById('tab_Events_saved');
	    var table = document.getElementById('tab_Events');
		
	for(var j=1; j<table.rows.length; j++)
	{
	var rIn = tab.rows.length;
	var row = tab.insertRow(rIn);
	row.setAttribute('id','trEvs'+rIn);
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs0'+rIn);
	i.innerHTML = rIn;
	cel.appendChild(i);
	
	 cel = row.insertCell(1);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs1'+rIn);
	i.innerHTML = document.getElementById('tdEv1'+j).options[document.getElementById('tdEv1'+j).options.selectedIndex].value;
	cel.appendChild(i);
	
	 cel = row.insertCell(2);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs2'+rIn);
	i.innerHTML = document.getElementById('tdEv2'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(3);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs3'+rIn);
	i.innerHTML =  document.getElementById('tdEv3'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(4);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs4'+rIn);
	i.innerHTML =  document.getElementById('tdEv4'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(5);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs5'+rIn);
	i.innerHTML = document.getElementById('tdEv5'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(6);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs6'+rIn);
	i.innerHTML = document.getElementById('tdEv6'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(7);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs7'+rIn);
	i.innerHTML = document.getElementById('tdEv7'+j).innerHTML;
	cel.appendChild(i);
 
}   */
 

function show_block(id)
{
	document.getElementById(id).style.display='block';
}
function createPastEvents(d,m,y)
{
 	//document.getElementById(this).style.color ="#FF0000";
	document.getElementById('div_add_past_events').style.display ='block';
	
	var table = document.getElementById('tab_Events_past');
	
	var index = table.rows.length;
	var row = table.insertRow(index);
	row.setAttribute('id','trEvp'+index);
	
	var rIndex = row.rowIndex;
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvp0'+index);
	i.innerHTML = index;
	cel.appendChild(i);
	
	 cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEvp1'+index);
	 i.add(new Option("Select","Select"));
    i.add(new Option("Birthday","Birthday"));
    i.add(new Option("Anniversary","Anniversary"));
	i.add(new Option("Festival","Festival"));
	i.add(new Option("Family Reunion","Family Reunion"));
    i.add(new Option("Inauguration","Inauguration"));
    i.add(new Option("Picnic","Picnic"));
	i.add(new Option("Annual Holiday","Annual Holiday"));
	cel.appendChild(i);
	
	 cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEvp2'+index);
	cel.appendChild(i);
	
	 cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEvp3'+index);
	cel.appendChild(i);
	
		 cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEv4'+index);
	cel.appendChild(i);
	
	 cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEvp5'+index);
	i.value = d+"/"+m+"/"+y;
	i.style.width="60px";
	i.onclick = function()
	{
		oDP.show(event,'tdEvp5'+index,2);
		ShowContent('Hol_End');
	}
	cel.appendChild(i);
	
	 cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute('class','txtbox_hol_ev');
	i.setAttribute('id','tdEvp6'+index);
	i.style.width="60px";
	i.style.fontSize="14px";
	i.onclick = function()
	{
		oDP.show(event,'tdEvp6'+index,2);
		ShowContent('Hol_End');
	};
	i.onmouseout = function(){
	   var day1=document.getElementById('tdEv5'+index).innerHTML;
	var day2=document.getElementById('tdEv6'+index).value;
	var days;
	
	var d1= [];
	var d2 =[];
	d1 = day1.split("/");
	d2 = day2.split("/");
	
	if(d1[1]==d1[1])
		days = d2[0]-d1[0];
	
	var nights = days-1;
	
	document.getElementById('tdEvp7'+index).innerHTML = days+"D/"+nights+"N";	 
	}
	cel.appendChild(i);
	
	 cel = row.insertCell(7);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvp7'+index);
	i.style.width="40px";
	cel.appendChild(i);
	
   cel = row.insertCell(8);
	var i = document.createElement('div');
	i.setAttribute('class','smallbtn');
	i.style.fontSize = "14px";
	i.style.width="20px";
	i.innerHTML ="+";
	i.setAttribute('id','tdEvp8'+index);
     i.onclick = function()
	{	createPastEvents(); };  
	cel.appendChild(i);  
	
	cel = row.insertCell(9);
	var i = document.createElement('img');
	i.setAttribute('src','Images/cancelbtn.png');
     i.setAttribute('width','25px');
    i.setAttribute('height','25px'); 
	i.setAttribute('id','tdEvp9'+index);
	i.style.cursor="pointer";
	i.onclick = function(){
	  document.getElementById('tab_Events_past').deleteRow(rIndex);	
	  // document.getElementById('tab_Events_saved').deleteRow(rIndex);
	}
	i.innerHTML ="Delete";
	cel.appendChild(i);
		
	cel = row.insertCell(10);
	var i = document.createElement('span');
	i.setAttribute('class','txtbox_hol_ev');
	i.style.width="80px";
	i.setAttribute('id','tdEvp10'+index);
	cel.appendChild(i);
}

    /*  function pastEvents()
{
   var tab = document.getElementById('tab_Events_past');
	    var table = document.getElementById('tab_Events_past_saved');
		
	for(var j=1; j<table.rows.length; j++)
	{
	var rIn = tab.rows.length;
	var row = tab.insertRow(rIn);
	row.setAttribute('id','trEvs'+rIn);
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs0'+rIn);
	i.innerHTML = rIn;
	cel.appendChild(i);
	
	 cel = row.insertCell(1);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs1'+rIn);
	i.innerHTML = document.getElementById('tdEv1'+j).options[document.getElementById('tdEv1'+j).options.selectedIndex].value;
	cel.appendChild(i);
	
	 cel = row.insertCell(2);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs2'+rIn);
	i.innerHTML = document.getElementById('tdEv2'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(3);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs3'+rIn);
	i.innerHTML =  document.getElementById('tdEv3'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(4);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs4'+rIn);
	i.innerHTML =  document.getElementById('tdEv4'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(5);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs5'+rIn);
	i.innerHTML = document.getElementById('tdEv5'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(6);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs6'+rIn);
	i.innerHTML = document.getElementById('tdEv6'+j).value;
	cel.appendChild(i);
	
	 cel = row.insertCell(7);
	var i = document.createElement('span');
	i.setAttribute('id','tdEvs7'+rIn);
	i.innerHTML = document.getElementById('tdEv7'+j).innerHTML;
	cel.appendChild(i);
 
}   */



function showEvent(d,m,y)
{
	var table =  document.getElementById('tab_Events_saved');
	document.getElementById('div_view_events_datewise').style.display='block';
	for(var j=1; j<table.rows.length; j++)
	{
	if(document.getElementById('tdEvs5'+j).innerHTML == d+"/"+m+"/"+y)
		{
		
		var tab = document.getElementById('tab_Events_datewise');
		
		var r = tab.rows.length;
	var row = tab.insertRow(r);
	row.setAttribute('id','trEv'+r);
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.setAttribute('id','tdE0'+r);
	i.innerHTML = r;
	cel.appendChild(i);
	
	 cel = row.insertCell(1);
	var i = document.createElement('span');
	i.setAttribute('id','tdE1'+r);
	i.innerHTML = document.getElementById('tdEvs1'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(2);
	var i = document.createElement('span');
	i.setAttribute('id','tdE2'+r);
	i.innerHTML = document.getElementById('tdEvs2'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(3);
	var i = document.createElement('span');
	i.setAttribute('id','tdE3'+r);
	i.innerHTML =  document.getElementById('tdEvs3'+j).innerHTML; ;
	cel.appendChild(i);
	
	 cel = row.insertCell(4);
	var i = document.createElement('span');
	i.setAttribute('id','tdE4'+r);
	i.innerHTML =  document.getElementById('tdEvs4'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(5);
	var i = document.createElement('span');
	i.setAttribute('id','tdE5'+r);
	i.innerHTML = document.getElementById('tdEvs5'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(6);
	var i = document.createElement('span');
	i.setAttribute('id','tdE6'+r);
	i.innerHTML = document.getElementById('tdEvs6'+j).innerHTML;
	cel.appendChild(i);
	
	 cel = row.insertCell(7);
	var i = document.createElement('span');
	i.setAttribute('id','tdE7'+r);
	i.innerHTML = document.getElementById('tdEvs7'+j).innerHTML;
	cel.appendChild(i);

		}
	}
}
function change_bg(id1,id2)
{
	document.getElementById(id1).style.background="#FF0000";
	document.getElementById(id2).style.background="#002929";
}
function show_MyHolidays()
{
	document.getElementById('div_events').style.display='block';
	document.getElementById('div_timelines').style.display='block';
	document.getElementById('div_subHol_sec').style.display='block';
	document.getElementById('myHolDrp').style.display='block';
	document.getElementById('div_dates_holiday').style.display='none';
	document.getElementById('div_holidays').style.display='none';
	document.getElementById('btn_div_myHolidays').className="arrow_act";
	document.getElementById('btn_div_Holidays').className="arrow_box";
}
function show_holidays()
{
	document.getElementById('div_holidays').style.display='block';
	document.getElementById('div_events').style.display='none';
	document.getElementById('div_timelines').style.display='none';
	document.getElementById('div_subHol_sec').style.display='none';
	document.getElementById('myHolDrp').style.display='none';
	document.getElementById('div_dates_holiday').style.display='block';
	document.getElementById('btn_div_myHolidays').className="arrow_box";
   document.getElementById('btn_div_Holidays').className="arrow_act";
    hide_block('div_add_events');
	hide_block('div_add_past_events');
	hide_block('div_past_Holidays');
	 hide_block('div_up_Holidays');
}
function add_othr_hol()
{
	var para = document.getElementById('txtOther_hol').value;
	var drp = document.getElementById('drpReason');
	drp.add(new Option(para,para));
	document.getElementById('txtOther_hol').value="";
}