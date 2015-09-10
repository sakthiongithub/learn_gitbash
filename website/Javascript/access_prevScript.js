function verfiy_code(id)
{
	if(document.getElementById(id).value=="QCN123")
	{
		document.getElementById('div_acc_prev_sec').style.display='block';
	}
	else
	{
		document.getElementById('div_acc_prev_sec').style.display='none';
	}
}

function show_cells(spId,chkid,id,id1,id2,id3,id4,id5,id6,id7)
{
	if(document.getElementById(chkid).checked==true)
	{
	document.getElementById(spId).style.color="#0066CC";
	document.getElementById(id).style.display='table-row';
	document.getElementById(id1).style.display='table-row';
	document.getElementById(id2).style.display='table-row';
	document.getElementById(id3).style.display='table-row';
	document.getElementById(id4).style.display='table-row';
	document.getElementById(id5).style.display='table-row';
	document.getElementById(id6).style.display='table-row';
	document.getElementById(id7).style.display='table-row';
	}
	else
	{
	document.getElementById(spId).style.color="#555";
	document.getElementById(id).style.display='none';
	document.getElementById(id1).style.display='none';
	document.getElementById(id2).style.display='none';
	document.getElementById(id3).style.display='none';
	document.getElementById(id4).style.display='none';
	document.getElementById(id5).style.display='none';
	document.getElementById(id6).style.display='none';
	document.getElementById(id7).style.display='none';	
	}
}

function show_cells_sp(spId,chkid,id,id1,id2,id3,id4,id5,id6,id7)
{
   if(document.getElementById(chkid).checked==false)
	{
		document.getElementById(chkid).checked = true;
	document.getElementById(spId).style.color="#0066CC";
	document.getElementById(id).style.display='table-row';
	document.getElementById(id1).style.display='table-row';
	document.getElementById(id2).style.display='table-row';
	document.getElementById(id3).style.display='table-row';
	document.getElementById(id4).style.display='table-row';
	document.getElementById(id5).style.display='table-row';
	document.getElementById(id6).style.display='table-row';
	document.getElementById(id7).style.display='table-row';
	}
	else
	{
		document.getElementById(chkid).checked = false;
	document.getElementById(spId).style.color="#555";
	document.getElementById(id).style.display='none';
	document.getElementById(id1).style.display='none';
	document.getElementById(id2).style.display='none';
	document.getElementById(id3).style.display='none';
	document.getElementById(id4).style.display='none';
	document.getElementById(id5).style.display='none';
	document.getElementById(id6).style.display='none';
	document.getElementById(id7).style.display='none';	
	}
}


function check_others6(none,id,id1,id2,id3,id4,id5,id6)
{
	if(document.getElementById(id1).checked==true &&
	document.getElementById(id2).checked==true &&
	document.getElementById(id3).checked==true &&
	document.getElementById(id4).checked==true &&
	document.getElementById(id5).checked==true &&
	document.getElementById(id6).checked==true)
	{
		document.getElementById(id).checked=true;
		document.getElementById(none).checked=false;
	}
	else if(document.getElementById(id1).checked==false &&
	document.getElementById(id2).checked==false &&
	document.getElementById(id3).checked==false &&
	document.getElementById(id4).checked==false &&
	document.getElementById(id5).checked==false &&
	document.getElementById(id6).checked==false)
     {
       document.getElementById(none).checked=true;
	 }
	
	else
	{
		document.getElementById(id).checked=false;
		document.getElementById(none).checked=false;
	}
}

function check_others5(none,id,id1,id2,id3,id4,id5)
{
	if(document.getElementById(id1).checked==true &&
	document.getElementById(id2).checked==true &&
	document.getElementById(id3).checked==true &&
	document.getElementById(id4).checked==true &&
	document.getElementById(id5).checked==true )	
	{
		document.getElementById(id).checked=true;
		document.getElementById(none).checked=false;
	}
	else if(document.getElementById(id1).checked==false &&
	document.getElementById(id2).checked==false &&
	document.getElementById(id3).checked==false &&
	document.getElementById(id4).checked==false &&
	document.getElementById(id5).checked==false)
	{
		document.getElementById(none).checked=true;
	}
	else
	{
		document.getElementById(id).checked=false;
		document.getElementById(none).checked=false;
		
	}
}

function check_others3(none,id,id1,id2,id3)
{
	if(document.getElementById(id1).checked==true &&
	document.getElementById(id2).checked==true &&
	document.getElementById(id3).checked==true  )		
	{
		document.getElementById(id).checked=true;
		document.getElementById(none).checked=false;
	}
	else if(document.getElementById(id1).checked==false &&
	document.getElementById(id2).checked==false &&
	document.getElementById(id3).checked==false  )
	{
		document.getElementById(none).checked=true;
	}
	else
	{
		document.getElementById(id).checked=false;
		document.getElementById(none).checked=false;	
	}
}

function checkNone(chk,id,id1,id2,id3,id4,id5,id6)
{
	if(document.getElementById(id).checked==true)
	{
	document.getElementById(chk).checked=false;
	document.getElementById(id1).checked=false;
	document.getElementById(id2).checked=false;
	document.getElementById(id3).checked=false;
	document.getElementById(id4).checked=false;
	document.getElementById(id5).checked=false;
	document.getElementById(id6).checked=false;	
	}
	
}

function checkAll(chk,id,id1,id2,id3,id4,id5,id6)
{
	if(document.getElementById(id).checked==true)
	{
	document.getElementById(id1).checked=true;
	document.getElementById(id2).checked=true;
	document.getElementById(id3).checked=true;
	document.getElementById(id4).checked=true;
	document.getElementById(id5).checked=true;
	document.getElementById(id6).checked=true;
	document.getElementById(chk).checked=false;
	}
	else
	{
	document.getElementById(id1).checked=false;
	document.getElementById(id2).checked=false;
	document.getElementById(id3).checked=false;
	document.getElementById(id4).checked=false;
	document.getElementById(id5).checked=false;
	document.getElementById(id6).checked=false;
	document.getElementById(chk).checked=true;
	}
}




function createDur(id,loc)
 {

   var tab = document.getElementById('tab_dur');
    var j = tab.rows.length-1;
	if(document.getElementById(id).checked == true)
     {    
	var row = tab.insertRow(j);
	row.setAttribute("id","row_dur_"+loc);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtLoc_dur_"+j);
	i.setAttribute("name","txtLoc_dur_"+j);
	i.setAttribute("value",loc);
	i.style.width="95%";
	i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtN_dur_"+j);
	i.setAttribute("name","txtN_dur_"+j);
	i.add(new Option("0N","0N"));
	i.add(new Option("1N","1N"));
	i.add(new Option("2N","2N"));
	i.add(new Option("3N","3N"));
	i.add(new Option("4N","4N"));
	i.add(new Option("5N","5N"));
	i.add(new Option("6N","6N"));
	i.add(new Option("7N","7N"));
	i.add(new Option("8N","8N"));
	i.add(new Option("9N","9N"));
	i.add(new Option("10N","10N"));
	i.style.width="50px";
	i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	i.onchange = function()
	{			
	var N= new Array();
	var D = new Array();
	var tDay =0;
	var tNite =0;
	
	for(var k =1; k<tab.rows.length-1; k++)
	{
		 N = document.getElementById('txtN_dur_'+k).options[document.getElementById('txtN_dur_'+k).options.selectedIndex].value.split("N");
		 D = document.getElementById('txtD_dur_'+k).options[document.getElementById('txtD_dur_'+k).options.selectedIndex].value.split("D");
		
		 tDay += parseInt(D[0]);
		 tNite += parseInt(N[0]);
		 
		 document.getElementById('txtDur').value = tNite+"N/"+tDay+"D";
	}
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txtD_dur_"+j);
	i.setAttribute("name","txtD_dur_"+j);
	i.add(new Option("0D","0D"));
	i.add(new Option("1D","1D"));
	i.add(new Option("2D","2D"));
	i.add(new Option("3D","3D"));
	i.add(new Option("4D","4D"));
	i.add(new Option("5D","5D"));
	i.add(new Option("6D","6D"));
	i.add(new Option("7D","7D"));
	i.add(new Option("8D","8D"));
	i.add(new Option("9D","9D"));
	i.add(new Option("10D","10D"));
	i.style.width="50px";
    i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	i.onchange = function()
	{			
	var N= new Array();
	var D = new Array();
	var tDay =0;
	var tNite =0;
	
	for(var k =1; k<tab.rows.length-1; k++)
	{
		 N = document.getElementById('txtN_dur_'+k).options[document.getElementById('txtN_dur_'+k).options.selectedIndex].value.split("N");
		 D = document.getElementById('txtD_dur_'+k).options[document.getElementById('txtD_dur_'+k).options.selectedIndex].value.split("D");
		
		 tDay += parseInt(D[0]);
		 tNite += parseInt(N[0]);

         document.getElementById('txtDur').value = tNite+"N/"+tDay+"D";
	}
	}
	cel.appendChild(i);	

 }
 else
 {
    document.getElementById('row_dur_'+loc).style.display='none';
 }
 }

function createSingl_Dur(loc)
{
	 var tab = document.getElementById('tab_dur');
    var j = tab.rows.length-1; 
	if(tab.rows.length<=2)
	{
	var row = tab.insertRow(j);
	row.setAttribute("id","tr_1");
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtLoc_dur_"+j);
	i.setAttribute("name","txtLoc_dur_"+j);
	i.setAttribute("value",loc);
	i.style.width="100px";
	i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtN_dur_"+j);
	i.setAttribute("name","txtN_dur_"+j);
	i.add(new Option("0N","0N"));
	i.add(new Option("1N","1N"));
	i.add(new Option("2N","2N"));
	i.add(new Option("3N","3N"));
	i.add(new Option("4N","4N"));
	i.add(new Option("5N","5N"));
	i.add(new Option("6N","6N"));
	i.add(new Option("7N","7N"));
	i.add(new Option("8N","8N"));
	i.add(new Option("9N","9N"));
	i.add(new Option("10N","10N"));
	i.style.width="50px";
	i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	i.onchange = function()
	{			
	 document.getElementById('txtDur').value = this.value+"/";
	};
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txtD_dur_"+j);
	i.setAttribute("name","txtD_dur_"+j);
	i.add(new Option("0D","0D"));
	i.add(new Option("1D","1D"));
	i.add(new Option("2D","2D"));
	i.add(new Option("3D","3D"));
	i.add(new Option("4D","4D"));
	i.add(new Option("5D","5D"));
	i.add(new Option("6D","6D"));
	i.add(new Option("7D","7D"));
	i.add(new Option("8D","8D"));
	i.add(new Option("9D","9D"));
	i.add(new Option("10D","10D"));
	i.style.width="50px";
    i.style.height="22px";
	i.style.fontSize="14px";
	i.style.fontFamily="Calibri";
	i.onchange = function()
	{			
	 document.getElementById('txtDur').value += this.value;
	};
	cel.appendChild(i);	
	}
	else
	{
	   document.getElementById('txtLoc_dur_1').value=loc;
	}
}


function clrDur_tab()
{
	var num = document.getElementById('tab_dur').rows.length;
if(num>2)
{
document.getElementById('tr_1').style.display='none';
document.getElementById('sp_loc').innerHTML ="";
}
}

function clrDur_mult()
{
	var num = document.getElementById('tab_dur').rows.length;
	if(num>2)
	{
	for(var j=1; j<num-1; j++)
	{
		document.getElementById('sp_loc').innerHTML ="";
		document.getElementById('tab_dur').deleteRow(j);
		j++;
	}
	}
}
 
 
function createHtl()
 {
	 var table = document.getElementById('tab_hotel');

   var dur = new Array();
   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array(); 
 if(table.rows.length<1)
 {
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");  
 for(var k =0; k<locs.length-1; k++)
 {	 	  
     var m=k+1;
	dur[m] = document.getElementById('txtN_dur_'+m).options[document.getElementById('txtN_dur_'+m).options.selectedIndex].value +"/"+document.getElementById('txtD_dur_'+m).options[document.getElementById('txtD_dur_'+m).options.selectedIndex].value;
	  
	  var RowLen = table.rows.length;	
	var MTRow = table.insertRow(RowLen);
	
	var cellSpan = MTRow.insertCell(0);
	cellSpan.setAttribute("colspan","11");
	
	var tab = document.createElement('table');
	  tab.setAttribute("id","tab_"+locs[k]); 
	  tab.style.border="1px solid #999";
	   var lastrow = tab.rows.length;	   
	   	  
	  var lastrow = tab.rows.length;
	  
  var row = tab.insertRow(0);	
      row.style.background="#ddd";
	
	var cel = row.insertCell(0);
	cel.setAttribute("colspan","11");
	cel.setAttribute("align","left");
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_loc_"+locs[k]+"_0");
	i.setAttribute("name","txtHtl_loc_"+locs[k]+"_0");
	i.setAttribute("value",locs[k]);
	i.style.width="auto";	
	cel.appendChild(i);
	  
	  var row = tab.insertRow(1);
	  row.setAttribute("id","tr_htl_"+locs[k]);
	  var cel0 = row.insertCell(0);
	  cel0.innerHTML = "Hotel Name";
	  var cel1 = row.insertCell(1);
	  cel1.innerHTML ="Rating";
	  var cel1 = row.insertCell(2);
	  cel1.innerHTML ="Duration";
	  var cel1 = row.insertCell(3);
	  cel1.innerHTML ="#<br/> rooms";
	  var cel1 = row.insertCell(4);
	  cel1.innerHTML ="Occupancy";
	  var cel1 = row.insertCell(5);
	  cel1.innerHTML ="Extra <br/> Bed";
	  var cel1 = row.insertCell(6);
	  cel1.innerHTML ="Upload<br/>Picture";
	  var cel1 = row.insertCell(7);
	  cel1.innerHTML ="Food-Type";
	  var cel1 = row.insertCell(8);
	  cel1.innerHTML ="OR";
	  var cel1 = row.insertCell(9);
	  cel1.innerHTML ="Add<br/>Row";
	  var cel1 = row.insertCell(10);
	  cel1.innerHTML ="Delete<br/>Row";

	
	row = tab.insertRow(2);
	var j = 2 ;
	row.setAttribute("id","tr_htl_"+locs[k]+"_"+j);
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_name_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_name_"+locs[k]+"_"+j);
	i.style.width="80px";
	//i.onclick = function(){alert(this.name);};
	cel.appendChild(i);
	
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_rate_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_rate_"+locs[k]+"_"+j);
	i.add(new Option("*","*"));
	i.add(new Option("**","**"));
	i.add(new Option("***","***"));
	i.add(new Option("****","****"));
	i.add(new Option("*****","*****"));	
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_dur_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_dur_"+locs[k]+"_"+j);
	i.setAttribute("value",dur[m]);
	i.style.width="60px";
	cel.appendChild(i);
		
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_room_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_room_"+locs[k]+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_occu_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_occu_"+locs[k]+"_"+j);
	i.add(new Option("Single","Single"));
	i.add(new Option("Twin Share","Twin Share"));
	i.add(new Option("Twin+Extra Bed","Twin+Extra Bed"));
	i.style.width="60px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_extbed_"+locs[k]+"_"+j);
	i.setAttribute("name","txtHtl_extbed_"+locs[k]+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var sp = document.createElement('span');
	sp.style.position="relative";
	
	var inp1 = document.createElement('input');
	inp1.setAttribute("type","text");
	inp1.setAttribute("class","txtbox_Tab");
	inp1.setAttribute("id","HtlSrc_"+locs[k]+"_"+j);
	inp1.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp1.setAttribute("placeholder","Add picture");
	inp1.style.position="absolute";
	inp1.style.width="80px";	
	sp.appendChild(inp1);
	
	var inp2 = document.createElement('input');
	inp2.setAttribute("type","file");
	inp2.setAttribute("id","HtlImg_"+locs[k]+"_"+j);
	inp2.setAttribute("name","HtlImg_"+locs[k]+"_"+j);
	inp2.style.opacity="0";
	inp2.style.zIndex="1";
	inp2.style.width="80px";
	inp2.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp2.onchange = function(){document.getElementById('HtlSrc_'+locs[k]+'_'+j).value = this.value; };
	
	sp.appendChild(inp2);
	cel.appendChild(sp);
	
	var cel = row.insertCell(7)
	var i = document.createElement('select');
     i.add(new Option("Veg","Veg"));
	 i.add(new Option("Non-Veg","Non-Veg"));
	 i.add(new Option("Jain","Jain"));
	i.setAttribute("id","drpHtl_food_"+locs[k]+"_"+j);
	i.setAttribute("name","drpHtl_food_"+locs[k]+"_"+j);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(8)
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","chk_"+locs[k]+"_"+j);
	i.setAttribute("name","chk_"+locs[k]+"_"+j);
	i.setAttribute("value","-OR-");
	i.style.float="left";
	cel.innerHTML = "EQUVT";
	cel.style.fontSize="12px";
	cel.appendChild(i);
		
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("value","Add");
	i.setAttribute('id',locs[k]);
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.onclick = function insrtHtlRow()
	{
		var tab = document.getElementById('tab_'+this.id);
     var lastrow = tab.rows.length;
	 var row = tab.insertRow(lastrow);
	 row.setAttribute("id","tr_htl_"+this.id+"_"+lastrow);
	  j = lastrow;
	
    var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_name_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_name_"+this.id+"_"+j);
	i.style.width="80px";
	cel.appendChild(i);
	
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_rate_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_rate_"+this.id+"_"+j);
	i.add(new Option("*","*"));
	i.add(new Option("**","**"));
	i.add(new Option("***","***"));
	i.add(new Option("****","****"));
	i.add(new Option("*****","*****"));	
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_dur_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_dur_"+this.id+"_"+j);
	i.setAttribute("value",dur[m]);
	i.style.width="60px";
	cel.appendChild(i);
		
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_room_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_room_"+this.id+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_occu_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_occu_"+this.id+"_"+j);
	i.add(new Option("Single","Single"));
	i.add(new Option("Twin Share","Twin Share"));
	i.add(new Option("Twin+Extra Bed","Twin+Extra Bed"));
	i.style.width="60px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_extbed_"+this.id+"_"+j);
	i.setAttribute("name","txtHtl_extbed_"+this.id+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var sp = document.createElement('span');
	sp.style.position="relative";
	
	var inp1 = document.createElement('input');
	inp1.setAttribute("type","text");
	inp1.setAttribute("class","txtbox_Tab");
	inp1.setAttribute("id","HtlSrc_"+this.id+"_"+j);
	inp1.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp1.setAttribute("placeholder","Add picture");
	inp1.style.position="absolute";
	inp1.style.width="80px";	
	sp.appendChild(inp1);
	
	var inp2 = document.createElement('input');
	inp2.setAttribute("type","file");
	inp2.setAttribute("id","HtlImg_"+this.id+"_"+j);
	inp2.setAttribute("name","HtlImg_"+this.id+"_"+j);
	inp2.style.opacity="0";
	inp2.style.zIndex="1";
	inp2.style.width="80px";
	inp2.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp2.onchange = function(){document.getElementById('HtlSrc_'+this.id+'_'+j).value = this.value; };
	
	sp.appendChild(inp2);
	cel.appendChild(sp);
	
	var cel = row.insertCell(7)
	var i = document.createElement('select');
     i.add(new Option("Veg","Veg"));
	 i.add(new Option("Non-Veg","Non-Veg"));
	 i.add(new Option("Jain","Jain"));
	i.setAttribute("id","drpHtl_food_"+this.id+"_"+j);
	i.setAttribute("name","drpHtl_food_"+this.id+"_"+j);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(8)
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","chk_"+this.id+"_"+j);
	i.setAttribute("name","chk_"+this.id+"_"+j);
	i.setAttribute("value","-OR-");
	i.style.float="left";
	cel.innerHTML = "EQUVT";
	cel.style.fontSize="12px";
	cel.appendChild(i);
		
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("value","Add");
	i.setAttribute('id',this.id);
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.onclick= function(){ insrtHtlRow(); };
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="25px";
	i.style.height="25px";
	i.setAttribute("id",this.id+"_"+lastrow);
	i.onclick= function(){delHtl_row(this.id)};
	cel.appendChild(i);
	
	};
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="25px";
	i.style.height="25px";
	i.setAttribute("id",locs[k]+"_2");
	//i.onclick= function(){delHtl_row(this.id)};
	cel.appendChild(i);
	
	cellSpan.appendChild(tab);
	
 }
	
 }
 else
 {
  locs = sp_loc;
 	  var RowLen = table.rows.length;	
	var MTRow = table.insertRow(RowLen);
	
	var cellSpan = MTRow.insertCell(0);
	cellSpan.setAttribute("colspan","11");
	
	var tab = document.createElement('table');
	  tab.setAttribute("id","tab_"+locs); 
	  tab.style.border="1px solid #999";
	   var lastrow = tab.rows.length;	
  
  lastrow = tab.rows.length;

var dur = document.getElementById('txtN_dur_1').options[document.getElementById('txtN_dur_1').options.selectedIndex].value +"/"+document.getElementById('txtD_dur_1').options[document.getElementById('txtD_dur_1').options.selectedIndex].value;	
   
  var row = tab.insertRow(0);	
      row.style.background="#ddd";
	
	var cel = row.insertCell(0);
	cel.setAttribute("colspan","11");
	cel.setAttribute("align","left");
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_loc_"+locs+"_0");
	i.setAttribute("name","txtHtl_loc_"+locs+"_0");
	i.setAttribute("value",locs);
	i.style.width="auto";	
	cel.appendChild(i);
	  
	  var row = tab.insertRow(1);
	  var cel0 = row.insertCell(0);
	  cel0.innerHTML = "Hotel Name";
	  var cel1 = row.insertCell(1);
	  cel1.innerHTML ="Rating";
	  var cel1 = row.insertCell(2);
	  cel1.innerHTML ="Duration";
	  var cel1 = row.insertCell(3);
	  cel1.innerHTML ="#<br/> rooms";
	  var cel1 = row.insertCell(4);
	  cel1.innerHTML ="Occupancy";
	  var cel1 = row.insertCell(5);
	  cel1.innerHTML ="Extra <br/> Bed";
	  var cel1 = row.insertCell(6);
	  cel1.innerHTML ="Upload<br/>Picture";
	  var cel1 = row.insertCell(7);
	  cel1.innerHTML ="Food-Type";
	  var cel1 = row.insertCell(8);
	  cel1.innerHTML ="-OR-";
	  var cel1 = row.insertCell(9);
	  cel1.innerHTML ="Add<br/>Row";
	  var cel1 = row.insertCell(10);
	  cel1.innerHTML ="Delete<br/>Row";

	
	row = tab.insertRow(2);
	j = 2;
	row.setAttribute("id","tr_htl_"+locs+"_"+j);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_name_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_name_"+locs+"_"+j);
	i.style.width="80px";
	//i.onclick = function(){alert(this.id);};
	cel.appendChild(i);
	
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_rate_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_rate_"+locs+"_"+j);
	i.add(new Option("*","*"));
	i.add(new Option("**","**"));
	i.add(new Option("***","***"));
	i.add(new Option("****","****"));
	i.add(new Option("*****","*****"));	
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_dur_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_dur_"+locs+"_"+j);
	i.setAttribute("value",dur);
	i.style.width="60px";
	cel.appendChild(i);
		
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_room_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_room_"+locs+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_occu_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_occu_"+locs+"_"+j);
	i.add(new Option("Single","Single"));
	i.add(new Option("Twin Share","Twin Share"));
	i.add(new Option("Twin+Extra Bed","Twin+Extra Bed"));
	i.style.width="60px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_extbed_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_extbed_"+locs+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var sp = document.createElement('span');
	sp.style.position="relative";
	
	var inp1 = document.createElement('input');
	inp1.setAttribute("type","text");
	inp1.setAttribute("class","txtbox_Tab");
	inp1.setAttribute("id","HtlSrc_"+locs+"_"+j);
	inp1.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp1.setAttribute("placeholder","Add picture");
	inp1.style.position="absolute";
	inp1.style.width="80px";	
	sp.appendChild(inp1);
	
	var inp2 = document.createElement('input');
	inp2.setAttribute("type","file");
	inp2.setAttribute("id","HtlImg_"+locs+"_"+j);
	inp2.setAttribute("name","HtlImg_"+locs+"_"+j);
	inp2.style.opacity="0";
	inp2.style.zIndex="1";
	inp2.style.width="80px";
	inp2.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp2.onchange = function(){document.getElementById('HtlSrc_'+locs+'_'+j).value = document.getElementById('HtlImg_'+locs+'_'+j).value; };
	
	sp.appendChild(inp2);
	cel.appendChild(sp);
	
	var cel = row.insertCell(7)
	var i = document.createElement('select');
     i.add(new Option("Veg","Veg"));
	 i.add(new Option("Non-Veg","Non-Veg"));
	 i.add(new Option("Jain","Jain"));
	i.setAttribute("id","drpHtl_food_"+locs+"_"+j);
	i.setAttribute("name","drpHtl_food_"+locs+"_"+j);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(8)
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","chk_"+locs+"_"+j);
	i.setAttribute("name","chk_"+locs+"_"+j);
	i.setAttribute("value","-OR-");
	i.style.float="left";
	cel.innerHTML = "EQUVT";
	cel.style.fontSize="12px";
	cel.appendChild(i);
		
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("value","Add");
	i.setAttribute('id',locs);
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.onclick = function insrtHtlRow()
	{
		var tab = document.getElementById('tab_hotel');
	  var j = tab.rows.length;
	  
	 var row = tab.insertRow(j);
	 row.setAttribute("id","tr_htl_"+locs);
	
    var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_name_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_name_"+locs+"_"+j);
	i.style.width="80px";
	//i.onclick = function(){alert(this.id);};
	cel.appendChild(i);
	
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_rate_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_rate_"+locs+"_"+j);
	i.add(new Option("*","*"));
	i.add(new Option("**","**"));
	i.add(new Option("***","***"));
	i.add(new Option("****","****"));
	i.add(new Option("*****","*****"));	
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_dur_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_dur_"+locs+"_"+j);
	i.setAttribute("value",dur);
	i.style.width="60px";
	cel.appendChild(i);
		
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_room_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_room_"+locs+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txtHtl_occu_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_occu_"+locs+"_"+j);
	i.add(new Option("Single","Single"));
	i.add(new Option("Twin Share","Twin Share"));
	i.add(new Option("Twin+Extra Bed","Twin+Extra Bed"));
	i.style.width="60px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtl_extbed_"+locs+"_"+j);
	i.setAttribute("name","txtHtl_extbed_"+locs+"_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var sp = document.createElement('span');
	sp.style.position="relative";
	
	var inp1 = document.createElement('input');
	inp1.setAttribute("type","text");
	inp1.setAttribute("class","txtbox_Tab");
	inp1.setAttribute("id","HtlSrc_"+locs+"_"+j);
	inp1.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp1.setAttribute("placeholder","Add picture");
	inp1.style.position="absolute";
	inp1.style.width="80px";	
	sp.appendChild(inp1);
	
	var inp2 = document.createElement('input');
	inp2.setAttribute("type","file");
	inp2.setAttribute("id","HtlImg_"+locs+"_"+j);
	inp2.setAttribute("name","HtlImg_"+locs+"_"+j);
	inp2.style.opacity="0";
	inp2.style.zIndex="1";
	inp2.style.width="80px";
	inp2.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp2.onchange = function(){document.getElementById('HtlSrc_'+locs+'_'+j).value = this.value; };
	
	sp.appendChild(inp2);
	cel.appendChild(sp);
	
	var cel = row.insertCell(7)
	var i = document.createElement('select');
     i.add(new Option("Veg","Veg"));
	 i.add(new Option("Non-Veg","Non-Veg"));
	 i.add(new Option("Jain","Jain"));
	i.setAttribute("id","drpHtl_food_"+locs+"_"+j);
	i.setAttribute("name","drpHtl_food_"+locs+"_"+j);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(8)
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","chk_"+locs+"_"+j);
	i.setAttribute("name","chk_"+locs+"_"+j);
	i.setAttribute("value","-OR-");
	i.style.float="left";
	cel.innerHTML = "EQUVT";
	cel.style.fontSize="12px";
	cel.appendChild(i);
		
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("value","Add");
	i.setAttribute('id',locs+"_"+j);
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.onclick= function(){ insrtHtlRow(); };
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="25px";
	i.style.height="25px";
	i.setAttribute("id",this.id);
	i.onclick= function(){delHtl_row(this.id)};
	cel.appendChild(i);
	
	j++;
	
	};
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="25px";
	i.style.height="25px";
	i.setAttribute("id",locs+'_'+j);
	//i.onclick= function(){delHtl_row(this.id)};
	cel.appendChild(i);
	
	cellSpan.appendChild(tab);
 }
 }
 }
 
 function delHtl_row(id)
 {
	 document.getElementById('tr_htl_'+id).style.display='none';
 }
 
 function htl_preview()
{
	var tab = document.getElementById('tab_htl_prev');
	var table = document.getElementById('tab_hotel');
	var len = tab.rows.length;
	var tabLen = table.rows.length;
	
	for(var k=1; k<tabLen; k++)
	{
		len = tab.rows.length;
	  var row = tab.insertRow(len);
	  
	  var cel = row.insertCell(0);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_loc_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(1);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_rate_'+k).options[document.getElementById('txtHtl_rate_'+k).options.selectedIndex].value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(2);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_dur_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(3);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_name_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(4);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_room_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(5);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtHtl_occu_'+k).value;
	  cel.appendChild(i);
	  
	}	
	
}
 
 
 function createHtl_incl()
 {  
  var tab = document.getElementById('tab_Hincl');
   var sp_loc = document.getElementById('sp_loc').innerHTML;  
   var num_rows = parseInt(document.getElementById('txtHtlRows').value);

   var locs = new Array(); 
if(tab.rows.length>0)
{   
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");

for(var d=2; d<num_rows; d++)
{
for(var k=0; k<locs.length; k++)
{
   var j = tab.rows.length;
   
if(document.getElementById('txtHtl_name_'+locs[k]+'_'+d).value !="")
	 {	
var row = tab.insertRow(j);

	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_loc_"+j);
	i.setAttribute("name","txtIncl_loc_"+j);
	i.setAttribute("value",locs[k]);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_htl_"+j);
	i.setAttribute("name","txtIncl_htl_"+j);
	i.setAttribute("value",document.getElementById('txtHtl_name_'+locs[k]+'_'+d).value);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_bf_"+j);
	i.setAttribute("name","txtincl_bf_"+j);
	i.setAttribute("value","Breakfast");
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_lun_"+j);
	i.setAttribute("name","txtincl_lun_"+j);
	i.setAttribute("value","Lunch");
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_din_"+j);
	i.setAttribute("name","txtincl_din_"+j);
	i.setAttribute("value","Dinner");
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_laun_"+j);
	i.setAttribute("name","txtincl_laun_"+j);
	i.setAttribute("value","Laundry");
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_spa_"+j);
	i.setAttribute("name","txtincl_spa_"+j);
	i.setAttribute("value","Spa");
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_alco_"+j);
	i.setAttribute("name","txtincl_alco_"+j);
	i.setAttribute("value","Alcoholic Beverages");
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_wifi_"+j);
	i.setAttribute("name","txtincl_wifi_"+j);
	i.setAttribute("value","Wifi");
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtincl_oth_"+j);
	i.setAttribute("name","txtincl_oth_"+j);
	i.style.width="100px";
	cel.appendChild(i);
	 
	 j++;

	 }
 }
}
 }
 else
 {
	 locs = sp_loc;
	for(var d=2; d<num_rows; d++)
   {
	if(document.getElementById('txtHtl_name_'+locs+'_'+d).value!="")
	{
    locs = sp_loc;
   
    lastrow = tab.rows.length;
    var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_loc_"+lastrow);
	i.setAttribute("name","txtIncl_loc_"+lastrow);
	i.setAttribute("value",locs);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_htl_"+lastrow);
	i.setAttribute("name","txtIncl_htl_"+lastrow);
	i.setAttribute("value",document.getElementById('txtHtl_name_'+locs+'_'+d).value);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_bf_"+lastrow);
	i.setAttribute("name","txtincl_bf_"+lastrow);
	i.setAttribute("value","Breakfast");
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_lun_"+lastrow);
	i.setAttribute("name","txtincl_lun_"+lastrow);
	i.setAttribute("value","Lunch");
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_din_"+lastrow);
	i.setAttribute("name","txtincl_din_"+lastrow);
	i.setAttribute("value","Dinner");
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_laun_"+lastrow);
	i.setAttribute("name","txtincl_laun_"+lastrow);
	i.setAttribute("value","Laundry");
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_spa_"+lastrow);
	i.setAttribute("name","txtincl_spa_"+lastrow);
	i.setAttribute("value","Spa");
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_alco_"+lastrow);
	i.setAttribute("name","txtincl_alco_"+lastrow);
	i.setAttribute("value","Alcoholic Beverages");
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtincl_wifi_"+lastrow);
	i.setAttribute("name","txtincl_wifi_"+lastrow);
	i.setAttribute("value","Wifi");
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtincl_oth_"+lastrow);
	i.setAttribute("name","txtincl_oth_"+lastrow);
	i.style.width="100px";
	cel.appendChild(i);
 } 
 }
 }
 }
 }
  
 
function createHtl_excl()
 {	 
  var tab = document.getElementById('tab_Hexcl');
   var sp_loc = document.getElementById('sp_loc').innerHTML;  
   var num_rows = parseInt(document.getElementById('txtHtlRows').value);
   
   var locs = new Array();
if(tab.rows.length<2)
{
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");

for(var d=2; d<=num_rows; d++)
{
for(var k=0; k<locs.length; k++)
{
   var j = tab.rows.length;
   
if(document.getElementById('txtHtl_name_'+locs[k]+'_'+d).value !="")
	 {	
var row = tab.insertRow(j);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_loc_"+j);
	i.setAttribute("name","txtExcl_loc_"+j);
	i.setAttribute("value",locs[k]);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_htl_"+j);
	i.setAttribute("name","txtExcl_htl_"+j);
	i.setAttribute("value",document.getElementById('txtHtl_name_'+locs[k]+'_'+d).value);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_bf_"+j);
	i.setAttribute("name","txtExcl_bf_"+j);
	i.setAttribute("value","Breakfast");
	cel.appendChild(i);

	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_lun_"+j);
	i.setAttribute("name","txtExcl_lun_"+j);
	i.setAttribute("value","Lunch");
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_din_"+j);
	i.setAttribute("name","txtExcl_din_"+j);
	i.setAttribute("value","Dinner");
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_laun_"+j);
	i.setAttribute("name","txtExcl_laun_"+j);
	i.setAttribute("value","Laundry");
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_spa_"+j);
	i.setAttribute("name","txtExcl_spa_"+j);
	i.setAttribute("value","Spa");
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_alco_"+j);
	i.setAttribute("name","txtExcl_alco_"+j);
	i.setAttribute("value","Alcoholic Beverages");
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_wifi_"+j);
	i.setAttribute("name","txtExcl_wifi_"+j);
	i.setAttribute("value","Wifi");
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_oth_"+j);
	i.setAttribute("name","txtExcl_oth_"+j);
	i.style.width="100px";
	cel.appendChild(i);
 }
}
}
 }
 else
 {
	 locs = sp_loc;
	 
	for(var d=2; d<=num_rows; d++)
   {
	if(document.getElementById('txtHtl_name_'+locs+'_'+d).value!="")
	{
   lastrow = tab.rows.length;
    var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_loc_"+lastrow);
	i.setAttribute("name","txtExcl_loc_"+lastrow);
	i.setAttribute("value",locs);
	i.style.width="80px";
	cel.appendChild(i);
	
		var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_htl_"+lastrow);
	i.setAttribute("name","txtExcl_htl_"+lastrow);
	i.setAttribute("value",document.getElementById('txtHtl_name_'+locs+'_'+d).value);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_bf_"+lastrow);
	i.setAttribute("name","txtExcl_bf_"+lastrow);
	i.setAttribute("value","Breakfast");
	cel.appendChild(i);

	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_lun_"+lastrow);
	i.setAttribute("name","txtExcl_lun_"+lastrow);
	i.setAttribute("value","Lunch");
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_din_"+lastrow);
	i.setAttribute("name","txtExcl_din_"+lastrow);
	i.setAttribute("value","Dinner");
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_laun_"+lastrow);
	i.setAttribute("name","txtExcl_laun_"+lastrow);
	i.setAttribute("value","Laundry");
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_spa_"+lastrow);
	i.setAttribute("name","txtExcl_spa_"+lastrow);
	i.setAttribute("value","Spa");
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_alco_"+lastrow);
	i.setAttribute("name","txtExcl_alco_"+lastrow);
	i.setAttribute("value","Alcoholic Beverages");
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","checkbox");
	i.setAttribute("id","txtExcl_wifi_"+lastrow);
	i.setAttribute("name","txtExcl_wifi_"+lastrow);
	i.setAttribute("value","Wifi");
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_oth_"+lastrow);
	i.setAttribute("name","txtExcl_oth_"+lastrow);
	i.style.width="100px";
	cel.appendChild(i);
 } 
 }
 }
 }
 }
 
 function createHtl_incl_prev()
 {
	 var tab = document.getElementById('tab_HtlIncl_prev');
	  var table = document.getElementById('tab_Hincl');
	  var len = table.rows.length;
   var lastrow = tab.rows.length;
   
   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array(); 
   
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");

for(var j=1; j<len; j++)
{
    var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_loc_prev_"+j);
	i.setAttribute("name","txtIncl_loc_prev_"+j);
	i.setAttribute("value",document.getElementById('txtIncl_loc_'+j).value);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_htl_prev_"+j);
	i.setAttribute("name","txtIncl_htl_prev_"+j);
	i.setAttribute("value",document.getElementById('txtIncl_htl_'+j).value);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('textarea');
	i.setAttribute("id","txtIncl_prev_"+j);
	i.setAttribute("name","txtIncl_prev_"+j);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="300px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	//i.innerHTML = incl[k];
	cel.appendChild(i);
}
 }
 else
 {
  locs = sp_loc;

    var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_loc_prev_"+lastrow);
	i.setAttribute("name","txtIncl_loc_prev_"+lastrow);
	i.setAttribute("value",document.getElementById('txtIncl_loc_1').value);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtIncl_htl_prev_"+j);
	i.setAttribute("name","txtIncl_htl_prev_"+j);
	i.setAttribute("value",document.getElementById('txtIncl_htl_1').value);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('textarea');
	i.setAttribute("id","txtIncl_prev_"+lastrow);
	i.setAttribute("name","txtIncl_prev_"+lastrow);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="300px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	//i.innerHTML = incl[lastrow];
	cel.appendChild(i);
 }
  getVal_incl();
 }

function getVal_incl()
{
	var tab = document.getElementById('tab_Hincl');
   var lastrow = tab.rows.length;
  var incl = new Array();
var k = 0;	
  for(k=1; k<=lastrow; k++)
  {	 
  incl[k]="";
  	 if(document.getElementById("txtincl_bf_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_bf_"+k).value+", ";
	 if(document.getElementById("txtincl_lun_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_lun_"+k).value+", ";
	 if(document.getElementById("txtincl_din_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_din_"+k).value+", ";
	 if(document.getElementById("txtincl_laun_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_laun_"+k).value+", ";
	 if(document.getElementById("txtincl_spa_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_spa_"+k).value+", ";
	 if(document.getElementById("txtincl_alco_"+k).checked == true)
	   incl[k] +=document.getElementById("txtincl_alco_"+k).value+", ";
   //  if(document.getElementById("txtincl_wifi_"+k).checked == true)
	//   incl[k] +=document.getElementById("txtincl_wifi_"+k).value+", ";
	if(document.getElementById("txtincl_oth_"+k).value!="")
	   incl[k] +=document.getElementById("txtincl_oth_"+k).value;    
	   document.getElementById('txtIncl_prev_'+k).innerHTML = incl[k];	  
  }
}



 function createHtl_excl_prev()
 {
		  var tab = document.getElementById('tab_Htlexcl_prev');
		  var table = document.getElementById('tab_Hexcl');
   var lastrow = tab.rows.length;
   var len= table.rows.length;
   
   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array(); 
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");   
 var sl = 0 ; 
 
 for(var j =1; j<len; j++)
 {	
	var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_loc_prev_"+j);
	i.setAttribute("name","txtExcl_loc_prev_"+j);
	i.setAttribute("value",document.getElementById('txtExcl_loc_'+j).value);
    i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_htl_prev_"+j);
	i.setAttribute("name","txtExcl_htl_prev_"+j);
	i.setAttribute("value",document.getElementById('txtExcl_htl_'+j).value);
    i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('textarea');
	i.setAttribute("id","txtExcl_prev_"+j);
	i.setAttribute("name","txtExcl_prev_"+j);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="300px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);

   }
	
 }
 else
 {	
  locs = sp_loc;   
    var row = tab.insertRow(lastrow);
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_loc_prev_"+lastrow);
	i.setAttribute("name","txtExcl_loc_prev_"+lastrow);
	i.setAttribute("value",document.getElementById('txtExcl_loc_1').value);
    i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtExcl_htl_prev_"+j);
	i.setAttribute("name","txtExcl_htl_prev_"+j);
	i.setAttribute("value",document.getElementById('txtExcl_htl_1').value);
    i.style.background="transparent";
	i.style.border="0px";
	i.style.width="80px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('textarea');
	i.setAttribute("id","txtExcl_prev_"+lastrow);
	i.setAttribute("name","txtExcl_prev_"+lastrow);
	i.style.background="transparent";
	i.style.border="0px";
	i.style.width="300px";
	i.style.fontSize="11px";
	i.style.color="#0066ff";
	cel.appendChild(i);
 }
 getVal_excl();
 }


function getVal_excl()
{
	var tab = document.getElementById('tab_Hexcl');
   var lastrow = tab.rows.length;
  var excl = new Array();

 for(k=1; k<lastrow; k++)
  {	 
     excl[k]="";
	 if(document.getElementById("txtExcl_bf_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_bf_"+k).value+", ";
	 if(document.getElementById("txtExcl_lun_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_lun_"+k).value+", ";
	 if(document.getElementById("txtExcl_din_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_din_"+k).value+", ";
	 if(document.getElementById("txtExcl_laun_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_laun_"+k).value+", ";
	 if(document.getElementById("txtExcl_spa_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_spa_"+k).value+", ";
	 if(document.getElementById("txtExcl_alco_"+k).checked == true)
	   excl[k] +=document.getElementById("txtExcl_alco_"+k).value+", ";
   // if(document.getElementById("txtExcl_wifi_"+k).checked == true)
	//   excl[k] +=document.getElementById("txtExcl_wifi_"+k).value+", ";
	if(document.getElementById("txtExcl_oth_"+k).value!="")
	   excl[k] +=document.getElementById("txtExcl_oth_"+k).value; 	
	   document.getElementById('txtExcl_prev_'+k).innerHTML = excl[k];
  }
}


 function createAttr()
 {
	  var tab = document.getElementById('tab_attraction');
   var lastrow = tab.rows.length;
   
   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array();

   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");  
	 lastrow = tab.rows.length;
	 var j =lastrow;
  
  var row = tab.insertRow(lastrow);
	row.setAttribute("id","del_row_"+j);
	
		var cel = row.insertCell(0);
	var i = document.createElement('select');
	i.setAttribute("id","txtAttr_loc_"+j);
	i.setAttribute("name","txtAttr_loc_"+j);
	for(var k=0; k<locs.length; k++)
	  {
	  i.add(new Option(locs[k],locs[k]));
	  }
	i.style.width="100px";
	i.style.fontSize="14px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_day_"+j);
	i.setAttribute("name","txtAttr_day_"+j);
	i.style.width="50px";
	cel.appendChild(i);

    
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.add(new Option("SHOPPING","SHOPPING"));
	i.add(new Option("SIGHTSEEING","SIGHTSEEING"));
	i.add(new Option("HISTORICAL","HISTORICAL"));
	i.add(new Option("RELIGIOUS","RELIGIOUS"));
	i.add(new Option("CULTURAL","CULTURAL"));
	i.add(new Option("KIDS","KIDS"));
	i.add(new Option("FOOD-NIGHTLIFE","FOOD-NIGHTLIFE"));
	i.add(new Option("MUSTSEE","MUSTSEE"));
	i.add(new Option("EXCLUSIVE","EXCLUSIVE"));
	i.add(new Option("OFFBEAT","OFFBEAT"));
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","drpAttr_cate_"+j);
	i.setAttribute("name","drpAttr_cate_"+j);
	i.style.width="80px";
	cel.appendChild(i);
	
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_attr_"+j);
	i.setAttribute("name","txtAttr_attr_"+j);
	i.style.width="80px";
	var k = document.createElement('br');
	var m = document.createElement('span');
	m.style.color="#0066ff";
	m.style.fontSize="12px";
	m.style.cursor="pointer";
	m.setAttribute("id",j);
	m.innerHTML = "View Attractions";
	m.onclick = function()
	{
		var cate = document.getElementById('drpAttr_cate_'+this.id).options[document.getElementById('drpAttr_cate_'+this.id).options.selectedIndex].value;
		var loc = document.getElementById('txtAttr_loc_'+this.id).options[document.getElementById('txtAttr_loc_'+this.id).options.selectedIndex].value;
		window.open("ExploreDest_cityscape.php?id=kjsdhkjdsfh&p="+cate+" IN "+loc);
	}
	cel.appendChild(i);
	cel.appendChild(k);
	cel.appendChild(m);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_str_"+j);
	i.setAttribute("name","txtAttr_str_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_arv_"+j);
	i.setAttribute("name","txtAttr_arv_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_tm_"+j);
	i.setAttribute("name","txtAttr_tm_"+j);
	i.style.width="40px";
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="50px";
	i.onclick = function(){createAttr();};
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("value","Add");
	i.setAttribute("id","del_row_"+j);
	i.style.width="25px";
	i.style.height="25px";
	i.onclick = function(){delHtl_row(this.id)};
	cel.appendChild(i);
	
	lastrow++;
 }
 else
 {
	
  var locs = sp_loc;
  if(locs !="")
  {
   lastrow = tab.rows.length;
    
	var row = tab.insertRow(lastrow);
	row.setAttribute("id","del_row_"+j);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_loc_"+lastrow);
	i.setAttribute("name","txtAttr_loc_"+lastrow);
	i.setAttribute("value",locs);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_day_"+lastrow);
	i.setAttribute("name","txtAttr_day_"+lastrow);
	i.style.width="50px";
	cel.appendChild(i);	
	

	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.add(new Option("SHOPPING","SHOPPING"));
	i.add(new Option("SIGHTSEEING","SIGHTSEEING"));
	i.add(new Option("HISTORICAL","HISTORICAL"));
	i.add(new Option("RELIGIOUS","RELIGIOUS"));
	i.add(new Option("CULTURAL","CULTURAL"));
	i.add(new Option("KIDS","KIDS"));
	i.add(new Option("FOOD-NIGHTLIFE","FOOD-NIGHTLIFE"));
	i.add(new Option("MUSTSEE","MUSTSEE"));
	i.add(new Option("EXCLUSIVE","EXCLUSIVE"));
	i.add(new Option("OFFBEAT","OFFBEAT"));
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","drpAttr_cate_"+lastrow);
	i.setAttribute("name","drpAttr_cate_"+lastrow);
	i.style.width="80px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_attr_"+lastrow);
	i.setAttribute("name","txtAttr_attr_"+lastrow);
	i.style.width="80px";
	var k = document.createElement('br');
	var j = document.createElement('span');
	j.style.color="#0066ff";
	j.style.fontSize="12px";
	j.style.cursor="pointer";
	j.setAttribute("id",lastrow);
	j.innerHTML = "View Attractions";
	j.onclick = function()
	{
		var cate = document.getElementById('drpAttr_cate_'+this.id).options[document.getElementById('drpAttr_cate_'+this.id).options.selectedIndex].value;
		var loc = document.getElementById('txtAttr_loc_'+this.id).value;
		window.open("ExploreDest_cityscape.php?id=kjsdhkjdsfh&p="+cate+" IN "+loc);
	}
	cel.appendChild(i);
	cel.appendChild(k);
	cel.appendChild(j);
	
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_str_"+lastrow);
	i.setAttribute("name","txtAttr_str_"+lastrow);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_arv_"+lastrow);
	i.setAttribute("name","txtAttr_arv_"+lastrow);	
	i.style.width="50px";	
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttr_tm_"+lastrow);
	i.setAttribute("name","txtAttr_tm_"+lastrow);
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="50px";
	i.onclick = function(){createAttr();};
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("value","Add");
	i.setAttribute("id","del_row_"+j);
	i.style.width="25px";
	i.style.height="25px";
	i.onclick = function(){delHtl_row(this.id)};
	cel.appendChild(i);
 }
 }
 }
 
 function attr_preview()
 {
	var tab = document.getElementById('tab_attr_prev');
	var table = document.getElementById('tab_attraction');
	var len = tab.rows.length;
	var tabLen = table.rows.length;
	
	for(var k=1; k<tabLen; k++)
	{
	  var row = tab.insertRow(len);
	  
	  var cel = row.insertCell(0);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_day_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(1);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_loc_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(2);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_attr_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(3);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_str_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(4);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_arv_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(5);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtAttr_tm_'+k).value;
	  cel.appendChild(i);
	  
	  len++;
	}	
 }
 
 
 function load_dest_IC()
{
	var sp_loc = document.getElementById('sp_loc').innerHTML;  

   if(sp_loc.indexOf(",")>0)
   {
	   var locs = new Array();
   locs = sp_loc.split(", ");
   
   for(var i=0; i<locs.length-1; i++)
   {
	   var d= document.createElement('div');
	   d.style.float="left";
	   d.style.width="100%";
	   
	   var sp = document.createElement('span');
	   sp.style.float="left";
	   
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("id","chk_frm_"+i);
	   inp.setAttribute("name","chk_frm_"+i)
	   inp.setAttribute("value",locs[i]);
	   inp.onclick = function ()
	   { 
	   if(document.getElementById(this.id).checked == true)
		document.getElementById('sp_pickup').innerHTML += this.value+","; 
	  else
	{
		var val = new Array();
		var str = document.getElementById('sp_pickup').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_pickup').innerHTML = val[0]+val[1];
	}
	};
	   sp.appendChild(inp);
	   
	   var spVal = document.createElement('span');
	   spVal.innerHTML = locs[i];
	   spVal.setAttribute("id","sp_frm_"+i);
	   spVal.setAttribute("name","sp_frm_"+i)
	   spVal.className = "span_drpListItems_crt";
	   spVal.onclick = function ()
	   { 
	   if(document.getElementById('chk_frm_'+i).checked == false)
	   {
		  document.getElementById('chk_frm_'+i).checked = true;
		document.getElementById('sp_pickup').innerHTML += this.value+", "; 
	   }
	  else
	{
		 document.getElementById('chk_frm_'+i).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_pickup').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_pickup').innerHTML = val[0]+val[1];
	}
	};
	   
	   d.appendChild(sp);
	   d.appendChild(spVal);
	   
	   document.getElementById('div_arrv').appendChild(d);
   }
   }
   else
   {
	  var locs = sp_loc;
	   var d= document.createElement('div');
	   d.style.float="left";
	   d.style.width="100%";
	   
	   var sp = document.createElement('span');
	   sp.style.float="left";
	   
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("id","chk_frm_"+locs);
	   inp.setAttribute("name","chk_frm_"+locs)
	   inp.setAttribute("value",locs);
	   inp.onclick = function ()
	   { 
	   if(document.getElementById(this.id).checked == true)
		document.getElementById('sp_pickup').innerHTML += this.value+", "; 
	  else
	{
		var val = new Array();
		var str = document.getElementById('sp_pickup').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_pickup').innerHTML = val[0]+val[1];
	}
	};
	   
	   sp.appendChild(inp);
	   
	   var spVal = document.createElement('span');
	   spVal.innerHTML = locs;
	   spVal.setAttribute("id","sp_frm_"+locs);
	   spVal.setAttribute("name","sp_frm_"+locs)
	   spVal.className = "span_drpListItems_crt";
	    spVal.onclick = function ()
	   { 
	   if(document.getElementById('chk_frm_'+i).checked == false)
	   {
		  document.getElementById('chk_frm_'+i).checked = true;
		document.getElementById('sp_pickup').innerHTML += this.value+", "; 
	   }
	  else
	{
		 document.getElementById('chk_frm_'+i).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_pickup').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_pickup').innerHTML = val[0]+val[1];
	}
	};
	   
	   d.appendChild(sp);
	   d.appendChild(spVal);
	   
	   document.getElementById('div_arrv').appendChild(d);
    }
	
	if(sp_loc.indexOf(",")>0)
   {
	   var locs = new Array();
   locs = sp_loc.split(", ");
   
   for(var i=0; i<locs.length-1; i++)
   {
	   var d= document.createElement('div');
	   d.style.float="left";
	   d.style.width="100%";
	   
	   var sp = document.createElement('span');
	    sp.style.float="left";
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("id","chk_to_"+i);
	   inp.setAttribute("name","chk_to_"+i)
	   inp.setAttribute("value",locs[i]);	
	   inp.onclick = function ()
	   { 
	   if(document.getElementById(this.id).checked == true)
		document.getElementById('sp_drop').innerHTML += this.value+", "; 
	  else
	{
		var val = new Array();
		var str = document.getElementById('sp_drop').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_drop').innerHTML = val[0]+val[1];
	}
	};
	   sp.appendChild(inp);
	   
	   var spVal = document.createElement('span');
	   spVal.innerHTML = locs[i];
	   spVal.setAttribute("id","sp_to_"+i);
	   spVal.setAttribute("name","sp_to_"+i)
	   spVal.style.cursor="pointer";
	   spVal.className = "span_drpListItems_crt";
	    spVal.onclick = function ()
	   { 
	   if(document.getElementById('chk_frm_'+i).checked == false)
	   {
		  document.getElementById('chk_frm_'+i).checked = true;
		document.getElementById('sp_drop').innerHTML += this.value+", "; 
	   }
	  else
	{
		 document.getElementById('chk_frm_'+i).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_drop').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_drop').innerHTML = val[0]+val[1];
	}
	};
	   
	   d.appendChild(sp);
	   d.appendChild(spVal);
	   
	   document.getElementById('div_ret').appendChild(d);
   }
   }
   else
   {
	  var locs = sp_loc;
	   var d= document.createElement('div');
	   d.style.float="left";
	   d.style.width="100%";
	   
	   var sp = document.createElement('span');
	   sp.style.float="left";
	   
	   var inp = document.createElement('input');
	   inp.setAttribute("type","checkbox");
	   inp.setAttribute("id","chk_frm_"+locs);
	   inp.setAttribute("name","chk_to_"+locs)
	   inp.setAttribute("value",locs);
	   inp.onclick = function ()
	   { 
	   if(document.getElementById(this.id).checked == true)
		document.getElementById('sp_drop').innerHTML += this.value+", "; 
	  else
	{
		var val = new Array();
		var str = document.getElementById('sp_drop').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_drop').innerHTML = val[0]+val[1];
	}
	};
	   sp.appendChild(inp);
	   
	   var spVal = document.createElement('span');
	   spVal.innerHTML = locs;
	   spVal.setAttribute("id","sp_to_"+locs);
	   spVal.setAttribute("name","sp_to_"+locs)
	   spVal.className = "span_drpListItems_crt";
	    spVal.onclick = function ()
	   { 
	   if(document.getElementById('chk_frm_'+i).checked == false)
	   {
		  document.getElementById('chk_frm_'+i).checked = true;
		document.getElementById('sp_drop').innerHTML += this.value+", "; 
	   }
	  else
	{
		 document.getElementById('chk_frm_'+i).checked = false;
		var val = new Array();
		var str = document.getElementById('sp_drop').innerHTML;
		var spl = this.value+", ";
		val = str.split(spl);
		document.getElementById('sp_drop').innerHTML = val[0]+val[1];
	}
	};
	   
	   d.appendChild(sp);
	   d.appendChild(spVal);
	   
	   document.getElementById('div_ret').appendChild(d);
    }	
}
 
 
 function show_pickUp(id, loc)
 {
	  if(document.getElementById(id).checked == true)
		document.getElementById('sp_pickup').innerHTML += loc+", "; 
	  else
	{
		var val = new Array();
		var str = document.getElementById('sp_pickup').innerHTML;
		var spl = loc+", ";
		val = str.split(spl);
		document.getElementById('sp_pickup').innerHTML = val[0]+val[1];
	}
 }
 
  function createMode()
 {
    var tab = document.getElementById('tab_transport');
   var lastrow = tab.rows.length;

   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array(); 
if(tab.rows.length<2)
{
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");

 for(var k =0; k<locs.length-1; k++)
 {
    var row = tab.insertRow(lastrow);
	j = lastrow;
	
	if(locs[k-1]=='undefined')
	   locs[k-1]="";
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_frm_"+j);
	i.setAttribute("name","txttrv_frm_"+j);
//	i.onclick = function(){alert(this.id);};
	i.setAttribute("value",locs[k-1]);
	i.style.width="120px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_to_"+j);
	i.setAttribute("name","txttrv_to_"+j);
	i.setAttribute("value",locs[k]);
	i.style.width="120px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txttrv_mode_"+j);
	i.setAttribute("name","txttrv_mode_"+j);
	i.add(new Option("Road","Road"));
	i.add(new Option("Railway","Railway"));
	i.add(new Option("Airway","Airway"));
	i.add(new Option("Sea","Sea"));
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_means_"+j);
	i.setAttribute("name","txttrv_means_"+j);
	i.style.width="80px";
	cel.appendChild(i);
	
	lastrow++;
 }
	
 }
 else
 {
  locs = sp_loc;
     var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_frm_"+lastrow);
	i.setAttribute("name","txttrv_frm_"+lastrow);
	i.setAttribute("value",locs[k]);
	i.style.width="120px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_to_"+lastrow);
	i.setAttribute("name","txttrv_to_"+lastrow);
	i.setAttribute("value",locs);
	i.style.width="120px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txttrv_mode_"+lastrow);
	i.setAttribute("name","txttrv_mode_"+lastrow);
	i.add(new Option("Road","Road"));
	i.add(new Option("Railway","Railway"));
	i.add(new Option("Airway","Airway"));
	i.add(new Option("Sea","Sea"));
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_means_"+lastrow);
	i.setAttribute("name","txttrv_means_"+lastrow);
	i.style.width="80px";
	cel.appendChild(i);
 }
 }
 }
 
 
 function mode_preview()
 {
	 var tab = document.getElementById('tab_trans_prev');
	var table = document.getElementById('tab_transport');
	var len = tab.rows.length;
	var tabLen = table.rows.length;
	
	for(var k=1; k<tabLen; k++)
	{
		len = tab.rows.length;
	  var row = tab.insertRow(len);
	  
	  var cel = row.insertCell(0);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txttrv_frm_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(1);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txttrv_to_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(2);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txttrv_mode_'+k).options[document.getElementById('txttrv_mode_'+k).options.selectedIndex].value;
	  cel.appendChild(i);
	  
	  var cel = row.insertCell(3);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txttrv_means_'+k).value;
	  cel.appendChild(i);
	  
	  len++;
	  
	}
	 
 }

 function createLMode()
 {
    var tab = document.getElementById('tabLocal_trp');
   var lastrow = tab.rows.length;
   
   var sp_loc = document.getElementById('sp_loc').innerHTML;   
   var locs = new Array(); 
if(tab.rows.length<2)
{
   if(sp_loc.indexOf(",")>0)
   {
   locs = sp_loc.split(", ");
   
 sl = 0 ;
 for(var k =0; k<locs.length-1; k++)
 {
	 lastrow = tab.rows.length;
	 var j =lastrow;
    var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtltrv_city_"+j);
	i.setAttribute("name","txtltrv_city_"+j);
	i.setAttribute("value",locs[k]);
	i.style.width="120px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtltrv_mode_"+j);
	i.setAttribute("name","txtltrv_mode_"+j);
	i.add(new Option("Road","Road"));
	i.add(new Option("Railway","Railway"));
	i.add(new Option("Airway","Airway"));
	i.add(new Option("Sea","Sea"));
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtltrv_means_"+j);
	i.setAttribute("name","txtltrv_means_"+j);
	i.style.width="80px";
	cel.appendChild(i);
	
	lastrow++;
 }
	
 }
 else
 {
  locs = sp_loc;
     var row = tab.insertRow(lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txttrv_city_"+lastrow);
	i.setAttribute("name","txttrv_city_"+lastrow);
	i.setAttribute("value",locs);
	i.style.width="120px";
	cel.appendChild(i);

	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txtltrv_mode_"+lastrow);
	i.setAttribute("name","txtltrv_mode_"+lastrow);
	i.add(new Option("Road","Road"));
	i.add(new Option("Railway","Railway"));
	i.add(new Option("Airway","Airway"));
	i.add(new Option("Sea","Sea"));
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtltrv_means_"+lastrow);
	i.setAttribute("name","txttrv_means_"+lastrow);
	i.style.width="80px";
	cel.appendChild(i);
 }
 }
 }
 
 function Lmode_preview()
 {
	  var tab = document.getElementById('tab_lcl_prev');
	var table = document.getElementById('tabLocal_trp');
	var len = tab.rows.length;
	var tabLen = table.rows.length;
	
	for(var k=1; k<tabLen; k++)
	{
		len = tab.rows.length;
	  var row = tab.insertRow(len);
	  
	  var cel = row.insertCell(0);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtltrv_city_'+k).value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(1);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtltrv_mode_'+k).options[document.getElementById('txtltrv_mode_'+k).options.selectedIndex].value;
	  cel.appendChild(i);
	  
	   var cel = row.insertCell(2);
	  var i = document.createElement('span');
	  i.innerHTML = document.getElementById('txtltrv_means_'+k).value;
	  cel.appendChild(i);
	  
	  len++;
  
	}
 }
  
function create_Oth_incl()
{
	document.getElementById('div_pck_incl').style.display="block";
	var tab = document.getElementById('tab_faci');
	var len = tab.rows.length;
	

	var row = tab.insertRow(len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute('type','text');
	i.setAttribute('id','txt_oth_incl_'+len);
	i.setAttribute('name','txt_oth_incl_'+len);
	i.setAttribute('class','txtbox_Tab');
	i.style.width="130px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute('type','checkbox');
	i.setAttribute('id','chk_oth_incl_'+len);
	i.setAttribute('name','chk_oth_incl_'+len);
	i.onclick = function()
	   {
		   if(document.getElementById('chk_oth_incl_'+len).checked == true)
		   {
		document.getElementById('sp_incl').innerHTML += document.getElementById('txt_oth_incl_'+len).value+", ";
		document.getElementById('chk_oth_incl_'+len).value = document.getElementById('txt_oth_incl_'+len).value;
		   }
	  else if(document.getElementById('chk_oth_incl_'+len).checked == false)
		{
		var val = new Array();
	    str = document.getElementById('sp_incl').innerHTML;
		spl = " "+document.getElementById('chk_oth_incl_'+len).value+",";
		val = str.split(spl)+",";
		document.getElementById('sp_incl').innerHTML = val[0]+val[1];
		}
		};	
	cel.appendChild(i);

	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute('type','button');
	i.setAttribute('class','smallbtn');
	i.setAttribute('value','Add');
	i.style.width="40px";
	i.onclick = function(){create_Oth_incl();};
	cel.appendChild(i);
}

function create_Oth_excl()
{
	document.getElementById('div_pck_excl').style.display="block";
	var tab = document.getElementById('tab_faci_excl');
	var len = tab.rows.length;
	

	var row = tab.insertRow(len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute('type','text');
	i.setAttribute('id','txt_oth_excl_'+len);
	i.setAttribute('name','txt_oth_excl_'+len);
	i.setAttribute('class','txtbox_Tab');
	i.style.width="130px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute('type','checkbox');
	i.setAttribute('id','chk_oth_excl_'+len);
	i.setAttribute('name','chk_oth_excl_'+len);
	i.onclick = function()
	   {
		   if(document.getElementById('chk_oth_excl_'+len).checked == true)
		   {
		document.getElementById('sp_excl').innerHTML += document.getElementById('txt_oth_excl_'+len).value+", ";
		document.getElementById('chk_oth_excl_'+len).value = document.getElementById('txt_oth_excl_'+len).value;
		   }
	  else if(document.getElementById('chk_oth_excl_'+len).checked == false)
		{
		var val = new Array();
	    str = document.getElementById('sp_excl').innerHTML;
		spl = " "+document.getElementById('chk_oth_excl_'+len).value+", ";
		val = str.split(spl)+", ";
		document.getElementById('sp_excl').innerHTML = val[0]+val[1];
		}
		};	
	cel.appendChild(i);

	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute('type','button');
	i.setAttribute('class','smallbtn');
	i.setAttribute('value','Add');
	i.style.width="40px";
	i.onclick = function(){create_Oth_excl();};
	cel.appendChild(i);
}

function add_terms()
{
	var tab = document.getElementById('tab_cncl_terms');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","btn_cncl_del_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('select');
	i.add(new Option("Before 30 days","Before 30 days"));
	i.add(new Option("Before 20 days","Before 20 days"));
	i.add(new Option("Before 15 days","Before 15 days"));
	i.add(new Option("Before 10 days","Before 10 days"));
	i.add(new Option("Before 5 days","Before 5 days"));
	i.add(new Option("Before 3 days","Before 3 days"));
	i.add(new Option("Before 2 days","Before 2 days"));
	i.add(new Option("Before 1 days","Before 1 days"));
	i.add(new Option("Before 0 days","Before 0 days"));
	i.add(new Option("After 1 days","After 1 days"));
	i.add(new Option("After 2 days","After 2 days"));
	i.add(new Option("After 3 days","After 3 days"));
	i.setAttribute("id","txt_cncl_day_"+len);
	i.setAttribute("name","txt_cncl_day_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="150px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_cncl_rate_"+len);
	i.setAttribute("name","txt_cncl_rate_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	cel.setAttribute("align","center");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_cncl_add_"+len);
	i.setAttribute("name","btn_cncl_add_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.style.float="none";
	i.onclick = function(){add_terms();};
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	cel.setAttribute("align","center");
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("id","btn_cncl_del_"+len);
	i.setAttribute("name","btn_cncl_del_"+len);
	i.style.width="25px";
	i.style.height="25px";
	i.style.cursor="pointer";
	i.onclick= function(){document.getElementById(this.id).style.display='none';};
	cel.appendChild(i);
	
}

function add_terms_Mod()
{
	var tab = document.getElementById('tab_cncl_terms_Mod');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","btn_cncl_delM_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('select');
	i.add(new Option("Before 30 days","Before 30 days"));
	i.add(new Option("Before 20 days","Before 20 days"));
	i.add(new Option("Before 15 days","Before 15 days"));
	i.add(new Option("Before 10 days","Before 10 days"));
	i.add(new Option("Before 5 days","Before 5 days"));
	i.add(new Option("Before 3 days","Before 3 days"));
	i.add(new Option("Before 2 days","Before 2 days"));
	i.add(new Option("Before 1 days","Before 1 days"));
	i.add(new Option("Before 0 days","Before 0 days"));
	i.add(new Option("After 1 days","After 1 days"));
	i.add(new Option("After 2 days","After 2 days"));
	i.add(new Option("After 3 days","After 3 days"));
	i.setAttribute("id","txt_cncl_dayM_"+len);
	i.setAttribute("name","txt_cncl_dayM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="150px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_cncl_rateM_"+len);
	i.setAttribute("name","txt_cncl_rateM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="70px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	cel.setAttribute("align","center");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_cncl_addM_"+len);
	i.setAttribute("name","btn_cncl_addM_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.style.float="none";
	i.onclick = function(){add_terms_Mod();};
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	cel.setAttribute("align","center");
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("id","btn_cncl_delM_"+len);
	i.setAttribute("name","btn_cncl_delM_"+len);
	i.style.width="25px";
	i.style.height="25px";
	i.style.cursor="pointer";
	i.onclick= function(){document.getElementById(this.id).style.display='none';};
	cel.appendChild(i);
	
}

function add_discounts()
{
	var tab = document.getElementById('tab_discounts');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","btn_disc_del_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_bank_name_"+len);
	i.setAttribute("name","txt_bank_name_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txt_pay_mode_"+len);
	i.setAttribute("name","txt_pay_mode_"+len);
	i.add(new Option("Credit Card","Credit Card"));
	i.add(new Option("Debit Card","Debit Card"));
	i.add(new Option("Netbanking","Netbanking"));
	i.add(new Option("Pay on site","Pay on site"));
	i.style.width="80px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_type_"+len);
	i.setAttribute("name","txt_card_type_"+len);
	i.add(new Option("Visa","Visa"));
	i.add(new Option("MasterCard","MasterCard"));
	i.style.width="60px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_name_"+len);
	i.setAttribute("name","txt_card_name_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Platinum","Platinum"));
	i.add(new Option("Titanium","Titanium"));
	i.add(new Option("Other","Other"));
	i.onchange = function()
	{
		if(this.value == "Other")
		 show_block('txt_card_name_oth_'+len);
	}		
	var j = document.createElement('input');
	j.setAttribute("id","txt_card_name_oth_"+len);
	j.setAttribute("name","txt_card_name_oth_"+len);
	j.setAttribute("class","txtbox_Tab");
	j.style.width="60px";
	j.style.fontSize="12px";
	j.style.display='none';
	j.setAttribute("placeholder","Specify other");
	cel.appendChild(i);
	cel.appendChild(j);	
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txt_offer_type_"+len);
	i.setAttribute("name","txt_offer_type_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Cashback","Cashback"));
	i.add(new Option("EMI","EMI"));
	i.add(new Option("Bonus Points","Bonus Points"));
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_offer_desc_"+len);
	i.setAttribute("name","txt_offer_desc_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_from_"+len);
	i.setAttribute("name","txt_valid_from_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_till_"+len);
	i.setAttribute("name","txt_valid_till_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	cel.setAttribute("align","center");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_disc_add_"+len);
	i.setAttribute("name","btn_disc_add_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.style.fontSize="12px";
	i.onclick = function(){add_discounts();};
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	cel.setAttribute("align","center");
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("id","btn_disc_del_"+len);
	i.setAttribute("name","btn_disc_del_"+len);
	i.style.width="13px";
	i.style.height="13px";
	i.style.cursor="pointer";
	i.onclick= function(){document.getElementById(this.id).style.display='none';};
	cel.appendChild(i);
}

function add_discounts_Mod()
{
	var tab = document.getElementById('tab_discounts_Mod');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","btn_disc_delM_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_bank_nameM_"+len);
	i.setAttribute("name","txt_bank_nameM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('select');
	i.setAttribute("id","txt_pay_modeM_"+len);
	i.setAttribute("name","txt_pay_modeM_"+len);
	i.add(new Option("Credit Card","Credit Card"));
	i.add(new Option("Debit Card","Debit Card"));
	i.add(new Option("Netbanking","Netbanking"));
	i.add(new Option("Pay on site","Pay on site"));
	i.style.width="80px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_typeM_"+len);
	i.setAttribute("name","txt_card_typeM_"+len);
	i.add(new Option("Visa","Visa"));
	i.add(new Option("MasterCard","MasterCard"));
	i.style.width="60px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_nameM_"+len);
	i.setAttribute("name","txt_card_nameM_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Platinum","Platinum"));
	i.add(new Option("Titanium","Titanium"));
	i.add(new Option("Other","Other"));
	i.onchange = function()
	{
		if(this.value == "Other")
		 show_block('txt_card_name_othM_'+len);
	}		
	var j = document.createElement('input');
	j.setAttribute("id","txt_card_name_othM_"+len);
	j.setAttribute("name","txt_card_name_othM_"+len);
	j.setAttribute("class","txtbox_Tab");
	j.style.width="60px";
	j.style.fontSize="12px";
	j.style.display='none';
	j.setAttribute("placeholder","Specify other");
	cel.appendChild(i);
	cel.appendChild(j);	
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txt_offer_typeM_"+len);
	i.setAttribute("name","txt_offer_typeM_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Cashback","Cashback"));
	i.add(new Option("EMI","EMI"));
	i.add(new Option("Bonus Points","Bonus Points"));
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_offer_descM_"+len);
	i.setAttribute("name","txt_offer_descM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_fromM_"+len);
	i.setAttribute("name","txt_valid_fromM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_tillM_"+len);
	i.setAttribute("name","txt_valid_tillM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	cel.setAttribute("align","center");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_disc_addM_"+len);
	i.setAttribute("name","btn_disc_addM_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.style.fontSize="12px";
	i.style.float="none";
	i.onclick = function(){add_discounts_Mod();};
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	cel.setAttribute("align","center");
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("id","btn_disc_delM_"+len);
	i.setAttribute("name","btn_disc_delM_"+len);
	i.style.width="13px";
	i.style.height="13px";
	i.style.cursor="pointer";
	i.onclick= function(){document.getElementById(this.id).style.display='none';};
	cel.appendChild(i);
}

function add_discounts_rev()
{
	var tab = document.getElementById('tab_offer_rev');
	var len = tab.rows.length-1;
	
	document.getElementById('txtOff_rev').value = len;
//	alert(document.getElementById('txtOff_rev').value);
	
	var row = tab.insertRow(len);
	row.setAttribute("id","btn_disc_del_rev_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('span');
	i.style.width="100px";
	i.style.fontSize="12px";
	i.innerHTML = "";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_bank_name_rev_"+len);
	i.setAttribute("name","txt_bank_name_rev_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.setAttribute("id","txt_pay_mode_rev_"+len);
	i.setAttribute("name","txt_pay_mode_rev_"+len);
	i.add(new Option("Credit Card","Credit Card"));
	i.add(new Option("Debit Card","Debit Card"));
	i.add(new Option("Netbanking","Netbanking"));
	i.add(new Option("Pay on site","Pay on site"));
	i.style.width="80px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_type_rev_"+len);
	i.setAttribute("name","txt_card_type_rev_"+len);
	i.add(new Option("Visa","Visa"));
	i.add(new Option("MasterCard","MasterCard"));
	i.add(new Option("Others","Others"))
	i.style.width="60px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('select');
	i.setAttribute("id","txt_card_name_rev_"+len);
	i.setAttribute("name","txt_card_name_rev_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Platinum","Platinum"));
	i.add(new Option("Titanium","Titanium"));
	i.add(new Option("Other","Other"));
	i.onchange = function()
	{
		if(this.value == "Other")
		 show_block('txt_card_name_oth_'+len);
	}		
	var j = document.createElement('input');
	j.setAttribute("id","txt_card_name_oth_rev_"+len);
	j.setAttribute("name","txt_card_name_oth_rev_"+len);
	j.setAttribute("class","txtbox_Tab");
	j.style.width="60px";
	j.style.fontSize="12px";
	j.style.display='none';
	j.setAttribute("placeholder","Specify other");
	cel.appendChild(i);
	cel.appendChild(j);	
	
	var cel = row.insertCell(5);
	var i = document.createElement('select');
	i.setAttribute("id","txt_offer_type_rev_"+len);
	i.setAttribute("name","txt_offer_type_rev_"+len);
	i.style.width="60px";
	i.style.fontSize="12px";
	i.add(new Option("Cashback","Cashback"));
	i.add(new Option("EMI","EMI"));
	i.add(new Option("Bonus Points","Bonus Points"));
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_offer_desc_rev_"+len);
	i.setAttribute("name","txt_offer_desc_rev_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_from_rev_"+len);
	i.setAttribute("name","txt_valid_from_rev_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_valid_till_rev_"+len);
	i.setAttribute("name","txt_valid_till_rev_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="60px";
	i.style.fontSize="12px";
	i.onclick = function()
	{
		oDP.show(event,this.id,2);
		show_block('TripDates');
	}
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	cel.setAttribute("align","center");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_disc_add_rev_"+len);
	i.setAttribute("name","btn_disc_add_rev_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.style.fontSize="12px";
	i.style.float="none";
	i.onclick = function(){add_discounts_rev();};
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	cel.setAttribute("align","center");
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("id","btn_disc_del_rev_"+len);
	i.setAttribute("name","btn_disc_del_rev_"+len);
	i.style.width="13px";
	i.style.height="13px";
	i.style.cursor="pointer";
	i.onclick= function(){document.getElementById(this.id).style.display='none';};
	cel.appendChild(i);
}




function add_ref_rows()
{
	var tab = document.getElementById('tab_refund');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id",len);
	
	var cel = row.insertCell(0);
	cel.setAttribute("width","100px");
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_ref_amt_"+len);
	i.setAttribute("name","txt_ref_amt_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	cel.setAttribute("width","120px");
	var j = document.createElement('input');
	i.setAttribute("type","text");
	j.setAttribute("id","txt_ref_type_"+len);
	j.setAttribute("name","txt_ref_type_"+len);
	j.setAttribute("class","txtbox_Tab");
	j.style.width="150px";
	var i = document.createElement('select');
	i.setAttribute("id",len);
	i.setAttribute("name",len);
	i.style.width="100px";
	i.style.fontSize="14px";
	i.setAttribute("class","txtbox_Tab");
    i.add(new Option("Direct credit to bank account via NEFT, RGT or IMPS","Direct credit to bank account via NEFT, RGT or IMPS"));
	i.add(new Option("By Credit card reversal","By Credit card reversal"));
	i.add(new Option("By Check","By Check"));
	i.onchange = function()
	{	
		document.getElementById('txt_ref_type_'+this.id).value = this.value;
	};
	cel.appendChild(j);
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	cel.setAttribute("width","80px");
	var i = document.createElement('input');
	i.setAttribute("id","txt_ref_days_"+len);
	i.setAttribute("name","txt_ref_days_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	cel.setAttribute("width","50px");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_ref_add_"+len);
	i.setAttribute("name","btn_ref_add_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.onclick = function(){add_ref_rows();};
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	cel.setAttribute("width","50px");
	var i= document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="20px";
	i.style.width="20px";
	i.setAttribute("id",len);
	i.onclick = function()
	{
		document.getElementById(this.id).style.display='none';
	}
	cel.appendChild(i);
	
}

function add_ref_rows_Mod()
{
	var tab = document.getElementById('tab_refund_Mod');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id",len);
	
	var cel = row.insertCell(0);
	cel.setAttribute("width","100px");
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("id","txt_ref_amtM_"+len);
	i.setAttribute("name","txt_ref_amtM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="100px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	cel.setAttribute("width","120px");
	var j = document.createElement('input');
	i.setAttribute("type","text");
	j.setAttribute("id","txt_ref_typeM_"+len);
	j.setAttribute("name","txt_ref_typeM_"+len);
	j.setAttribute("class","txtbox_Tab");
	j.style.width="150px";
	var i = document.createElement('select');
	i.setAttribute("id",len);
	i.setAttribute("name",len);
	i.style.width="100px";
	i.style.fontSize="14px";
	i.setAttribute("class","txtbox_Tab");
    i.add(new Option("Direct credit to bank account via NEFT, RGT or IMPS","Direct credit to bank account via NEFT, RGT or IMPS"));
	i.add(new Option("By Credit card reversal","By Credit card reversal"));
	i.add(new Option("By Check","By Check"));
	i.onchange = function()
	{	
		document.getElementById('txt_ref_typeM_'+this.id).value = this.value;
	};
	cel.appendChild(j);
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	cel.setAttribute("width","80px");
	var i = document.createElement('input');
	i.setAttribute("id","txt_ref_daysM_"+len);
	i.setAttribute("name","txt_ref_daysM_"+len);
	i.setAttribute("class","txtbox_Tab");
	i.style.width="50px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	cel.setAttribute("width","50px");
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("id","btn_ref_addM_"+len);
	i.setAttribute("name","btn_ref_addM_"+len);
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="40px";
	i.onclick = function(){add_ref_rows_Mod();};
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	cel.setAttribute("width","50px");
	var i= document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.style.width="20px";
	i.style.width="20px";
	i.setAttribute("id",len);
	i.onclick = function()
	{
		document.getElementById(this.id).style.display='none';
	}
	cel.appendChild(i);
	
}


function add_Qrows_attr()
{
	
  var t = document.getElementById('tab_sugg_itin');
  var len = t.rows.length-1;
  
  var row = t.insertRow(len);
  row.setAttribute("id","tr_Qattr_"+len);
  
  var cel = row.insertCell(0);
  var i = document.createElement("input");
  i.setAttribute("type","input"); 
  i.setAttribute("class","txtbox_tab");
  i.setAttribute("id","txtSug_itin_loc_"+len);
  i.setAttribute("name","txtSug_itin_loc_"+len);
  i.style.width="130px";
  cel.appendChild(i);
  
   var cel = row.insertCell(1);
  var i = document.createElement("select");
  i.add(new Option("SHOPPING","SHOPPING"));
  i.add(new Option("SIGHTSEEING","SIGHTSEEING"));
  i.add(new Option("HISTORICAL","HISTORICAL"));
  i.add(new Option("KIDS","KIDS"));
  i.add(new Option("RELIGIOUS","RELIGIOUS"));
  i.add(new Option("CULTURAL","CULTURAL"));
  i.add(new Option("FOOD-NIGHTLIFE","FOOD-NIGHTLIFE"));
  i.add(new Option("MUST SEE","MUST SEE"));
  i.add(new Option("EXCLUSIVE","EXCLUSIVE"));
  i.add(new Option("OFFBEAT","OFFBEAT"));
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_itin_cate_"+len);
  i.setAttribute("name","txtSug_itin_cate_"+len);
  i.style.width="130px";
  cel.appendChild(i);
  
   var cel = row.insertCell(2);
  var i = document.createElement("input");
  i.setAttribute("type","text");
   i.setAttribute("class","txtbox_tab");
    i.setAttribute("id","txtSug_itin_attr_"+len);
  i.setAttribute("name","txtSug_itin_attr_"+len);
  cel.appendChild(i);
  
   var cel = row.insertCell(3);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
  i.setAttribute("id","txtSug_itin_date_"+len);
  i.setAttribute("name","txtSug_itin_date_"+len);
  i.style.width="95px";
  i.onclick = function()
  {
	  oDP.show(event,this.id,2);
	  showContent('TripDates');
  }
  cel.appendChild(i);
  
   var cel = row.insertCell(4);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_itin_schd_"+len);
  i.setAttribute("name","txtSug_itin_schd_"+len);
  i.style.width="80px";
  cel.appendChild(i);
  
   var cel = row.insertCell(5);
  var i = document.createElement("input");
  i.setAttribute("type","button");
  i.setAttribute("class","smallbtn");
  i.setAttribute("value","ADD");
  i.style.width="50px";
  i.style.height="24px";
  i.style.fontSize="12px";
  i.onclick = function (){add_Qrows_attr();};
  cel.appendChild(i);
  
   var cel = row.insertCell(6);
  var i = document.createElement("img");
  i.setAttribute("src","Images/cancelbtn.png");
  i.setAttribute("id","tr_Qattr_"+len);
  i.style.width="25px";
  i.style.height="24px";
  i.style.fontSize="12px";
  i.onclick = function (){document.getElementById(this.id).style.display='none';};
  cel.appendChild(i);
}

function add_Qrows_htl()
{
	  var t = document.getElementById('tab_sugg_htl');
  var len = t.rows.length-1;
 
 var row = t.insertRow(len);
 row.setAttribute("id","td_Qrow_htl_"+len);
 
  var cel = row.insertCell(0);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_opt_"+len);
  i.setAttribute("name","txtSug_htl_opt_"+len);
  i.style.width="40px";
  i.style.fontSize="12px";
  cel.appendChild(i);
  
   var cel = row.insertCell(1);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_loc_"+len);
  i.setAttribute("name","txtSug_htl_loc_"+len);
  i.style.width="100px";
  cel.appendChild(i);
  
   var cel = row.insertCell(2);
  var i = document.createElement("input");
  i.setAttribute("type","text");
   i.setAttribute("class","txtbox_tab");
    i.setAttribute("id","txtSug_htl_chkIn_"+len);
  i.setAttribute("name","txtSug_htl_chkIn_"+len);
    i.style.width="80px";
	 i.onclick = function()
  {
	  oDP.show(event,this.id,2);
	  showContent('TripDates');
  }
  cel.appendChild(i);
  
   var cel = row.insertCell(3);
  var i = document.createElement("input");
  i.setAttribute("type","text");
   i.setAttribute("class","txtbox_tab");
    i.setAttribute("id","txtSug_htl_chkout_"+len);
  i.setAttribute("name","txtSug_htl_chkout_"+len);
  i.style.width="80px";
   i.onclick = function()
  {
	  oDP.show(event,this.id,2);
	  showContent('TripDates');
  }
  cel.appendChild(i);
  
   var cel = row.insertCell(4);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_rate_"+len);
  i.setAttribute("name","txtSug_htl_rate_"+len);
  i.style.width="70px";
  cel.appendChild(i);
  
     var cel = row.insertCell(5);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_roomtype_"+len);
  i.setAttribute("name","txtSug_htl_roomtype_"+len);
  i.style.width="80px";
  cel.appendChild(i);
  
     var cel = row.insertCell(6);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_room_"+len);
  i.setAttribute("name","txtSug_htl_room_"+len);
  i.style.width="40px";
  cel.appendChild(i);
  
     var cel = row.insertCell(7);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_occup_"+len);
  i.setAttribute("name","txtSug_htl_occup_"+len);
  i.style.width="60px";
  cel.appendChild(i);
  
     var cel = row.insertCell(8);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_name_"+len);
  i.setAttribute("name","txtSug_htl_name_"+len);
  i.style.width="80px";
  cel.appendChild(i);
  
     var cel = row.insertCell(9);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_food_"+len);
  i.setAttribute("name","txtSug_htl_food_"+len);
  i.style.width="50px";
  cel.appendChild(i);
  
  var cel = row.insertCell(10);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_price_"+len);
  i.setAttribute("name","txtSug_htl_price_"+len);
  i.style.width="80px";
  cel.appendChild(i);
  
  var cel = row.insertCell(11);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_dur_"+len);
  i.setAttribute("name","txtSug_htl_dur_"+len);
  i.style.width="30px";
  cel.appendChild(i);
  
  var cel = row.insertCell(12);
  var i = document.createElement("input");
  i.setAttribute("type","text");
  i.setAttribute("class","txtbox_tab");
   i.setAttribute("id","txtSug_htl_totl_"+len);
  i.setAttribute("name","txtSug_htl_totl_"+len);
  i.style.width="80px";
  cel.appendChild(i);
  
    
   var cel = row.insertCell(13);
  var i = document.createElement("input");
  i.setAttribute("type","button");
  i.setAttribute("class","smallbtn");
    i.setAttribute("value","ADD");
  i.style.width="50px";
  i.style.height="24px";
  i.style.fontSize="12px";
  i.onclick = function (){add_Qrows_htl();};
  cel.appendChild(i);
  
   var cel = row.insertCell(14);
  var i = document.createElement("img");
  i.setAttribute("src","Images/cancelbtn.png");
  i.setAttribute("id","td_Qrow_htl_"+len);
  i.style.width="25px";
  i.style.height="24px";
  i.onclick = function (){document.getElementById(this.id).style.display='none';};
  cel.appendChild(i);
}

function addRow_mod_attr()
{
	var tab = document.getElementById('mod_attr');
	var lastrow = tab.rows.length;
	
	var row = tab.insertRow(lastrow);
	
var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_loc_"+lastrow);
	i.setAttribute("name","txtAttrMod_loc_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_day_"+lastrow);
	i.setAttribute("name","txtAttrMod_day_"+lastrow);
	i.style.width="50px";
	i.style.fontSize="12px";
	cel.appendChild(i);	
	

	var cel = row.insertCell(2);
	var i = document.createElement('select');
	i.add(new Option("SHOPPING","SHOPPING"));
	i.add(new Option("SIGHTSEEING","SIGHTSEEING"));
	i.add(new Option("HISTORICAL","HISTORICAL"));
	i.add(new Option("RELIGIOUS","RELIGIOUS"));
	i.add(new Option("CULTURAL","CULTURAL"));
	i.add(new Option("KIDS","KIDS"));
	i.add(new Option("FOOD-NIGHTLIFE","FOOD-NIGHTLIFE"));
	i.add(new Option("MUSTSEE","MUSTSEE"));
	i.add(new Option("EXCLUSIVE","EXCLUSIVE"));
	i.add(new Option("OFFBEAT","OFFBEAT"));
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","drpAttrMod_cate_"+lastrow);
	i.setAttribute("name","drpAttrMod_cate_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_attr_"+lastrow);
	i.setAttribute("name","txtAttrMod_attr_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	var k = document.createElement('br');
	var j = document.createElement('span');
	j.style.color="#0066ff";
	j.style.fontSize="12px";
	j.style.cursor="pointer";
	j.setAttribute("id",lastrow);
	j.innerHTML = "View Attractions";
	j.onclick = function()
	{
		var cate = document.getElementById('drpAttrMod_cate_'+this.id).options[document.getElementById('drpAttrMod_cate_'+this.id).options.selectedIndex].value;
		var loc = document.getElementById('txtAttrMod_loc_'+this.id).value;
		window.open("ExploreDest_cityscape.php?id=kjsdhkjdsfh&p="+cate+" IN "+loc);
	}
	cel.appendChild(i);
	cel.appendChild(k);
	cel.appendChild(j);
	
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_str_"+lastrow);
	i.setAttribute("name","txtAttrMod_str_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_arv_"+lastrow);
	i.setAttribute("name","txtAttrMod_arv_"+lastrow);	
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtAttrMod_tm_"+lastrow);
	i.setAttribute("name","txtAttrMod_tm_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.setAttribute("value","Add");
	i.style.width="100%";
	i.style.fontSize="12px";
	i.onclick = function(){createAttr();};
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('img');
	i.setAttribute("src","Images/cancelbtn.png");
	i.setAttribute("value","Add");
	i.setAttribute("id","del_row_"+j);
	i.style.width="20px";
	i.style.height="20px";
	i.style.fontSize="12px";
	i.onclick = function(){delHtl_row(this.id)};
	cel.appendChild(i);	
}

function addRow_mod_htl()
{
	var tab = document.getElementById('tabMod_htl');
	var lastrow = tab.rows.length;
	
	var row = tab.insertRow(lastrow);
	row.setAttribute("id","trHtlMod_"+lastrow);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_loc_"+lastrow);
	i.setAttribute("name","txtHtlMod_loc_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_htl_"+lastrow);
	i.setAttribute("name","txtHtlMod_htl_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_dur_"+lastrow);
	i.setAttribute("name","txtHtlMod_dur_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('select');
	i.add(new Option("*","*"));
	i.add(new Option("**","**"));
	i.add(new Option("***","***"));
	i.add(new Option("****","****"));
	i.add(new Option("*****","*****"));
	i.setAttribute("id","drpHtlMod_star_"+lastrow);
	i.setAttribute("name","drpHtlMod_star_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_room_"+lastrow);
	i.setAttribute("name","txtHtlMod_room_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('select');
	i.add(new Option("Single","Single"));
	i.add(new Option("Twin Share","Twin Share"));
	i.add(new Option("Twin+ExtraBed","Twin+ExtraBed"));
	i.setAttribute("id","drpHtlMod_occ_"+lastrow);
	i.setAttribute("name","drpHtlMod_occ_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(6);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_bed_"+lastrow);
	i.setAttribute("name","txtHtlMod_bed_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(7);
	var i = document.createElement('select');
	i.add(new Option("Veg","Veg"));
	i.add(new Option("Non-Veg","Non-Veg"));
	i.add(new Option("Jain","Jain"));
	i.setAttribute("id","drpHtlMod_food_"+lastrow);
	i.setAttribute("name","drpHtlMod_food_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(8);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_incl_"+lastrow);
	i.setAttribute("name","txtHtlMod_incl_"+lastrow);
	i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(9);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtHtlMod_excl_"+lastrow);
	i.setAttribute("name","txtHtlMod_excl_"+lastrow);
    i.style.width="100%";
	i.style.fontSize="12px";
	cel.appendChild(i);
	
	var cel = row.insertCell(10);
	var sp = document.createElement('span');
	sp.style.position="relative";
	
	var inp1 = document.createElement('input');
	inp1.setAttribute("type","text");
	inp1.setAttribute("class","txtbox_Tab");
	inp1.setAttribute("id","HtlSrc_"+lastrow);
	inp1.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp1.setAttribute("placeholder","Add picture");
	inp1.style.position="absolute";
	inp1.style.width="80px";	
	sp.appendChild(inp1);
	
	var inp2 = document.createElement('input');
	inp2.setAttribute("type","file");
	inp2.setAttribute("id","HtlImg_"+lastrow);
	inp2.setAttribute("name","HtlImg_"+lastrow);
	inp2.style.opacity="0";
	inp2.style.zIndex="1";
	inp2.style.width="80px";
	inp2.setAttribute("accept","image/x-png, image/gif, image/jpeg");
	inp2.onchange = function(){document.getElementById('HtlSrc_'+lastrow).value = this.value; };
	
	sp.appendChild(inp2);
	cel.appendChild(sp);
	
	var cel = row.insertCell(11);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.style.fontSize="12px";
	i.setAttribute("value","Add");
	i.onclick = function(){addRow_mod_htl();};
	cel.appendChild(i);
	
	var cel = row.insertCell(12);
	var i = document.createElement('img');
    i.setAttribute("src","Images/closebtn.png");
	i.style.width="20px";
	i.style.width="20px";
	i.setAttribut("id",lastrow);
    i.onclick = function(){hide_block('trHtlMod_'+this.id);};
	cel.appendChild(i);
	
}

function addMod_lcl()
{
	var tab = document.getElementById('tabMod_lcl');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","tr_lclMod_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_lloc_"+len);
	i.setAttribute("name","txtMod_lloc_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_lmode_"+len);
	i.setAttribute("name","txtMod_lmode_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_lmeans_"+len);
	i.setAttribute("name","txtMod_lmeans_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.setAttribute("value","Add");
	i.onclick = function () {addMod_lcl();};
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('img');
	i.setAttribute("src","Images/closebtn.png");
	i.style.width="20px";
	i.style.height="20px";
	i.setAttribute("id",len);
	i.onclick = function () {document.getElementById('tr_lclMod_'+this.id).style.display="none";};
	cel.appendChild(i);
}

function addMod_p2p()
{
	var tab = document.getElementById('tabMod_p2p');
	var len = tab.rows.length;
	
	var row = tab.insertRow(len);
	row.setAttribute("id","tr_p2pMod_"+len);
	
	var cel = row.insertCell(0);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_origin_"+len);
	i.setAttribute("name","txtMod_origin_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(1);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_dest_"+len);
	i.setAttribute("name","txtMod_dest_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(2);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_mode_"+len);
	i.setAttribute("name","txtMod_mode_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(3);
	var i = document.createElement('input');
	i.setAttribute("type","text");
	i.setAttribute("class","txtbox_Tab");
	i.setAttribute("id","txtMod_means_"+len);
	i.setAttribute("name","txtMod_means_"+len);
	i.style.width="100%";
	cel.appendChild(i);
	
	var cel = row.insertCell(4);
	var i = document.createElement('input');
	i.setAttribute("type","button");
	i.setAttribute("class","smallbtn");
	i.style.width="40px";
	i.setAttribute("value","Add");
	i.onclick = function () {addMod_p2p();};
	cel.appendChild(i);
	
	var cel = row.insertCell(5);
	var i = document.createElement('img');
	i.setAttribute("src","Images/closebtn.png");
	i.style.width="20px";
	i.style.height="20px";
	i.setAttribute("id",len);
	i.onclick = function () {document.getElementById('tr_lclMod_'+this.id).style.display="none";};
	cel.appendChild(i);	
}