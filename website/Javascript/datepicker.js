function datePicker(divID){
	this.div = document.getElementById(divID);

	this.hide = function hide(){
		oDP.div.style.visibility="hidden";
		oDP.div.style.display="none";
	}

	function getMaxDaysofMonth(strDate){ //gets max days in month
		var oDate = new Date(strDate);
		oDate.setMonth(oDate.getMonth()+1);
		oDate.setDate(0);
		return oDate.getDate();
	}

	var dayArrayShort = new Array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa');
	var dayArrayMed = new Array('Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
	var dayArrayLong = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	var monthArrayShort = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	var monthArrayMed = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
	var monthArrayLong = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

	var mTable = "<table onclick=\"event.cancelBubble=true;if(event.stopPropagation)event.stopPropagation();\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
	var mTableX = "</tr></table>";
	var mTableTD = "<td class=\"mTableTD\">";
	var mTableTDX = "</td>";
	var cTable = "<table id=\"tab\" style=\"background:#FbFbFb; \" class=\"cTable\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" \><tr>";
	var cTableX = "</tr></table>";
	var thMove = "<th>";
	var thMoveX = "</th>";
	var emptyTH = "<th>&nbsp;</th>";
	var monthTH = "<th colspan='5' style=\"color:#B22222;\">";
	var monthTHX = "</th>";
	var calHRBreak = "</tr><tr>";
	var calTRBreak = "</tr><tr>";
	var dateTD = "<td id=\"tdD\" class=\"dateTD\" style=\"background:#DDDDDD; \" onclick=\"function changeFont();\">";
	var dateTDX = "</td>";
	var dateTDWE = "<td id=\"tdD\" style=\"background:#87CEFA; color:#FFF; border:1px solid #AAA; font-family:Calibri; font-size:14px; font-weight:bold; cursor: pointer; \" onclick=\"function changeFont();\">";
	var dateTDBlank = "<td class=\"dateTD\">&nbsp;</td>";
	var tdSpace = "<td>&nbsp;</td>";

	var i,w,d;

	document.onclick = this.hide;
	
	this.formatCal = function formatCal(elem, months, curDate){ //*****************
		var sHTML="", maxM;
		
		var oDate,tmpDate;
		
		if(curDate==null){
			oDate = new Date(document.getElementById(elem).value);
			if(isNaN(oDate.getFullYear()))
				oDate = new Date(Date());
		}else{
			oDate = new Date(curDate);
		}								

		sHTML+=mTable;

		for(i=0;i<months;i++){
			w=0;
			sHTML+=mTableTD;
			sHTML+=cTable;

			if(i==0){
				tmpDate = new Date(oDate);
				tmpDate.setMonth(tmpDate.getMonth()-1);
				//months = parseInt(document.getElementById(id).value);
				sHTML+=thMove+"<div class=\"dSpan\" style=\"width:29px;\" onclick=\"oDP.show(event,'"+elem+"',"+months+",new Date('"+tmpDate.toString()+"'));\">&lt;</div>"+thMoveX+"\n";
			}else
				sHTML+=emptyTH;

			sHTML+=monthTH+monthArrayLong[oDate.getMonth()]+" "+oDate.getFullYear()+monthTHX;
			
			//sHTML+=dateTD+dayArrayLong(oDate.getDay()]+""+dateTDX);

			if(i==months-1){
				//months = parseInt(document.getElementById(id).value);
				sHTML+=thMove+"<div class=\"dSpan\" style=\"width:29px;\" onclick=\"oDP.show(event,'"+elem+"',"+months+",new Date('"+oDate.toString()+"'));\">&gt;</div>"+thMoveX+"\n";
			}else
				sHTML+=emptyTH;

			sHTML+=calHRBreak;
			oDate.setDate(1);
			
			sHTML+=dateTDWE+""+dayArrayMed[0]+""+dateTDX;
			for(d=1;d<=5;d++)
			{
				sHTML+=dateTD+""+dayArrayMed[d]+""+dateTDX;
			}   	
			
			sHTML+=dateTDWE+""+dayArrayMed[6]+""+dateTDX;
			
			sHTML+=calHRBreak;	
			
			for(d=0;d<oDate.getDay();d++)
			{
				sHTML+=dateTDBlank;
			}
			
			maxM = getMaxDaysofMonth(oDate.toString());
			
			for(d=oDate.getDate();d<=maxM;d++){
		
		        oDate.setDate(d);
								
				if(oDate.getDay()==6 || oDate.getDay()==0)
				{
					sHTML+=dateTDWE+"<div style=\"width:29px;\" onclick=\"document.getElementById('"+elem+"').value='"+d+"-"+(oDate.getMonth()+1)+"-"+oDate.getFullYear()+"';document.getElementById('"+this.div.id+"').style.visibility='hidden';document.getElementById('"+this.div.id+"').style.display='none';\">"+d+"</div>"+dateTDX+"\n";
				}
				
				else
				{
				sHTML+=dateTD+"<div class=\"dSpan\" style=\"width:29px;\" onclick=\"document.getElementById('"+elem+"').value='"+d+"-"+(oDate.getMonth()+1)+"-"+oDate.getFullYear()+"';document.getElementById('"+this.div.id+"').style.visibility='hidden';document.getElementById('"+this.div.id+"').style.display='none';\">"+d+"</div>"+dateTDX+"\n";
				}
				if(oDate.getDay()==6 && d != maxM){
					sHTML+=calTRBreak;
					w++
				}
			}

			for(d=oDate.getDay();d<6;d++)
				sHTML+=dateTDBlank;
			
			while(w<5){
				sHTML+=calTRBreak;
				for(d=0;d<7;d++)
					sHTML+=dateTDBlank;
					w++;
			}

			sHTML+=cTableX;
			sHTML+=mTableTDX;
			
			if(i<months-1)
				sHTML+=tdSpace;

			oDate.setDate(1);
			oDate.setMonth(oDate.getMonth()+1);
		}

		sHTML+=mTableX;
		this.div.innerHTML=sHTML;
	}

	this.show=function show(e,elem,months,curDate){ //*****************
	var oElem = document.getElementById(elem);
		e.cancelBubble=true;
		if(e.stopPropagation)
			e.stopPropagation();
		
		if(curDate==null)
			this.formatCal(elem, months);
		else
			this.formatCal(elem, months, curDate);

	//	this.div.style.left = oElem.style.left;
	//	this.div.style.top = oElem.offsetTop+oElem.offsetHeight+2;
		this.div.style.visibility="visible";
		this.div.style.display="";
		this.div.style.backgroundColor="#ffffff";
	}

	this.retDate = function retDate(date){
		alert(date);
	}

}