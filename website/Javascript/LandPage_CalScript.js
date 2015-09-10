
// October Calendar............................................
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();  
  
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31,31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa');  

function start_func()
{
	 var txtdate1=document.getElementById('txt_frmLeave').value;
	 var d1=[];
	 d1 = txtdate1.split("/");
	 return d1;
	 
}
function end_func()
{
	 var txtdate2=document.getElementById('txt_toLeave').value;
	 var d2=[];
	 d2 = txtdate2.split("/");
	  return d2;
}


function L_Oct2013(d1,d2) {

 var year = date.getFullYear();
 var month = 9;
 month = month+1;

  var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);
 
var days_in_this_month = monthDays[9];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month+='<tr><td class="monthHead_L">' + mnth[9] + '</td>';

var first_week_day = new Date(year,9,0).getDay();
 
 var weekDay = new Array('Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th'); 
 
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		 next_month += '<td class="weekDay_L">' + weekDay[week_day] + '</td>';
  }
 next_month += '</tr><tr>';
  next_month += '<tr><td class="monthHead_L">' + year + '</td>';
 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
         // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {

  
  if(day_counter==13){ 
   next_month +='<td class="EndFest_L" onmouseover=ShowContent("div_Context_next_month"); onmouseout=HideContent("div_Context_next_month");>' + day_counter + '</td>';
 }
	
 else if(week_day == 4 || week_day == 5 || week_day == 11 || week_day == 12 || week_day == 18 || week_day == 19 || week_day == 25 || week_day == 26 || week_day == 32 || week_day==33)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
 
 else if(day_counter==2){ 
   next_month +='<td class="festDay_L" onmouseover=ShowContent("div_Context_oct2"); onmouseout=HideContent("div_Context_oct2");>' + day_counter + '</td>';
 }
 
 	else if(day_counter==14){ 
   next_month +='<td class="weekEndFest_L" onmouseover=ShowContent("div_Context_oct14"); onmouseout=HideContent("div_Context_oct14");>' + day_counter + '</td>';
 }
 
 else if(day_counter==15){ 
   next_month +='<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
 }
 
 else if(day_counter==16){ 
   next_month +='<td class="festDay_L" onmouseover=ShowContent("div_Context_oct16"); onmouseout=HideContent("div_Context_oct16");>' + day_counter + '</td>';
 }
 
  else if(day_counter==17){ 
   next_month +='<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
 }
 
  else if(day_counter==18){ 
   next_month +='<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
 }

      else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
      else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	   else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	

   else if(day == day_counter) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }

	  
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:none"> ';
  if(d1[1] == 10)
    next_month +='Holiday planned from &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>';
 next_month +='</table>';
  document.write(next_month);
}

function L_Nov2013(d1,d2) {

 var year = date.getFullYear();
 var month = 9;
 month = month+1;

  var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);
var days_in_this_month = monthDays[10];

  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[10] + '</td>';
  var first_week_day = new Date(year,10,0).getDay();

 var weekDay = new Array('Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa'); 

  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
     //next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;

  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	 
 if(day_counter ==17)
	{
	   next_month += '<td class="EndFest_L" onmouseover=ShowContent("div_Context_nov17"); onmouseout=HideContent("div_Context_nov17");>' + day_counter + '</td>';
	}
	  
	else if(week_day == 1|| week_day == 2 || week_day == 8 || week_day == 9 || week_day == 15 || week_day == 16 || week_day == 22 || week_day == 23 || week_day == 29 || week_day==30)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
    // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	else if(day_counter ==1)
	{
	   next_month += '<td class="weekEndFest_L" onmouseover=ShowContent("div_Context_nov1"); onmouseout=HideContent("div_Context_nov1");>' + day_counter + '</td>';
	}
	
	else if(day_counter ==4)
	{
	   next_month += '<td class="weekEndFest_L" onmouseover=ShowContent("div_Context_nov4"); onmouseout=HideContent("div_Context_nov4");>' + day_counter + '</td>';
	}
	else if(day_counter ==14)
	{
	   next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_nov14"); onmouseout=HideContent("div_Context_nov14");>' + day_counter + '</td>';
	}
	else if(day_counter ==15)
	{
	   next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
	}
	 else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year < d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }	 
	 else if(month >d1[1] && month > d2[1] && year < d2[2]  && year == d1[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	   else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
		
   else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
     }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr align="left"><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:none"> ';
  if(d1[1] == 11)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
	else
	  next_month +='Quitcitynow suggests you to take a leave on 15th Nov to enjoy 4 days of holidays !!';
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//  Calendar for Dec 2013..................................................................................................

function L_Dec2013()
{  
 var year = date.getFullYear();
 var month = 11;
 month = month+1;
 
 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);
 
  var days_in_this_month = monthDays[11];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[11] + '</td>';
  var first_week_day = new Date(year,11, 0).getDay();
  
   var weekDay = new Array('Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu'); 

  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
 for(week_day = 0; week_day < 1; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
if(week_day == 0 || week_day == 6 || week_day == 7 || week_day == 13 || week_day == 14 || week_day == 20 || week_day == 21 || week_day == 27 || week_day == 28)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	else if (day_counter == 23){
		 next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_dec25"); onmouseout=HideContent("div_Context_dec25");>' + day_counter + '</td>';
	 }
	 else if (day_counter == 24){
		 next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_dec25"); onmouseout=HideContent("div_Context_dec25");>' + day_counter + '</td>';
	 }
   	 else if (day_counter == 25){
		 next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_dec25"); onmouseout=HideContent("div_Context_dec25");>' + day_counter + '</td>';
	 }
	 
	 else if (day_counter == 26){
		 next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
	 }
	 
	 else if (day_counter == 27){
		 next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");>' + day_counter + '</td>';
	 }
	 
	    else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	
	else if(month > d1[1] && month > d2[1] && year < d2[2] && year == d1[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 
	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 12)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//  Calendar for Jan 2014..................................................................................................

function L_Jan2014()
{  
var year = date.getFullYear()+1;
var month = 0;
month = month+1;

  var days_in_this_month = monthDays[0];
  
 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
 var days_in_this_month = monthDays[0];

  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[0] + '</td>';
  var first_week_day = new Date(year,0, 0).getDay();
  
    var weekDay = new Array('Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa'); 
  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

  for(week_day = 0; week_day < first_week_day+2; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	if(week_day == 2 || week_day == 3 || week_day == 9 || week_day == 10 || week_day == 16 || week_day == 17 || week_day == 23 || week_day == 24 || week_day == 30 || week_day==31)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
		  
	else if(day_counter == 26){
	   next_month += '<td class="EndFest_L" onmouseover=ShowContent("div_Context_jan26"); onmouseout=HideContent("div_Context_jan26");> ' + day_counter + ' </td>';
	 }

	 else if(day_counter == 1){
	   next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_jan1"); onmouseout=HideContent("div_Context_jan1");> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 2){
	   next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 3){
	   next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 13){
	   next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_putLeave"); onmouseout=HideContent("div_Context_putLeave");> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 14){
	   next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_jan14"); onmouseout=HideContent("div_Context_jan14");> ' + day_counter + ' </td>';
	 }
      
     else if(day == day_counter && month == next_month) {
         next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	   else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year ==d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 
	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
	
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 1)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


//  Calendar Feb 2014..................................................................................................

function L_Feb2014()
{  
var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[1];
var month=1;
month =month+1;
 
 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
 var days_in_this_month = monthDays[1];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[1] + '</td>';
  var first_week_day = new Date(year,1, 0).getDay();
  for(week_day= 0; week_day < 28; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' +year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
 if(week_day == 0 || week_day == 1 || week_day == 7 || week_day == 8 || week_day == 14 || week_day == 15 || week_day == 21 || week_day == 22 || week_day == 28 || week_day == 29)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	 else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year ==d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 
	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }

    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 2)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


// Calendar Mar 2014..................................................................................................

function L_Mar2014()
{  
var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[2];

var month=2;
month = month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
 var days_in_this_month = monthDays[2];


  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[2] + '</td>';
  var first_week_day = new Date(year,2, 0).getDay();
  for(week_day= 0; week_day < 31; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	  
if(week_day == 0 || week_day == 1 || week_day == 7 || week_day == 8 || week_day == 14 || week_day == 15 || week_day == 21 || week_day == 22 || week_day == 28 || week_day == 29)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	      else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year ==d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }

	
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 3)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


//Calendar Apr 2014 ......................................................................................

function L_Apr2014()
{  
 var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[3];
var month = 3;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
  var days_in_this_month = monthDays[3];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[3] + '</td>';
  var first_week_day = new Date(year,3, 0).getDay();

var weekDay = new Array('Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We');  
 
  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	    if(week_day == 5 || week_day == 6 || week_day == 12 || week_day == 13 || week_day == 19 || week_day == 20 || week_day == 26 || week_day == 27 || week_day == 33 || week_day==34)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	    else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 4)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//Calendar May 2014 ...........................................................................

function L_May2014()
{  
 var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[4];

var month = 4;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
 var days_in_this_month = monthDays[4];

  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[4] + '</td>';
  var first_week_day = new Date(year,4, 0).getDay();
  
  var weekDay = new Array('Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa');  

  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' +year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
if(week_day == 5 || week_day == 6 || week_day == 12 || week_day == 13 || week_day == 19 || week_day == 20 || week_day == 26 || week_day == 27 || week_day == 33 || week_day==34)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 1){
	   next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_may1"); onmouseout=HideContent("div_Context_may1");> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 2){
	   next_month += '<td class="putLeave_L" onmouseover=ShowContent("div_Context_may1"); onmouseout=HideContent("div_Context_may1");> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 
	 
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px;color:#FF0000; float:left"> ';
  if(d1[1] == 5)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Jun 2014..................................................................................

function L_Jun2014()
{  
var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[5];

var month = 5;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);
  // Create the basic Calendar structure.
  var days_in_this_month = monthDays[5];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[5] + '</td>';
  var first_week_day = new Date(year,5, 0).getDay();
  
   var weekDay = new Array('Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo');
  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' +year + '</td>';

 
  for(week_day = 0; week_day < 1; week_day++) {
    // next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	    if(week_day == 0 || week_day == 1 || week_day == 7 || week_day == 8 || week_day == 14 || week_day == 15 || week_day == 21 || week_day == 22 || week_day == 28 || week_day == 29)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 6)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Jul 2014 .........................................................................................

function L_Jul2014()
{  
var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[6];

var month = 6;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
 var days_in_this_month = monthDays[6];

  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[6] + '</td>';
  var first_week_day = new Date(year,6, 0).getDay();
  
  var weekDay = new Array('Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th');

  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
     //next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	    if(week_day == 5 || week_day == 6 || week_day == 12 || week_day == 13 || week_day == 19 || week_day == 20 || week_day == 26 || week_day == 27 || week_day == 33 || week_day==34)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 7)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Aug 2014.................................................................................................

function L_Aug2014()
{  
var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[7];

var month = 7;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);

  // Create the basic Calendar structure.
  var days_in_this_month = monthDays[7];

  var next_month = '<table class="calendarTable_L" style="background:#E6FFC1;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[7] + '</td>';
  var first_week_day = new Date(year,7, 0).getDay();
  
  var weekDay = new Array('Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su');
  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
     //next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	    if(week_day == 5 || week_day == 6 || week_day == 12 || week_day == 13 || week_day == 19 || week_day == 20 || week_day == 26 || week_day == 27 || week_day == 33 || week_day==34)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
	 else if(day_counter == 15){
	   next_month += '<td class="festDay_L" onmouseover=ShowContent("div_Context_aug15"); onmouseout=HideContent("div_Context_aug15");> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 8)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>'; next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Sept 2014...........................................................................................

function L_Sept2014()
{
	var year = date.getFullYear()+1;
  var days_in_this_month = monthDays[8];

var month = 8;
month =month+1;

 var d1=[];
  var d2=[];
  d1 = start_func(d1);
 d2 = end_func(d2);
  // Create the basic Calendar structure.
  var days_in_this_month = monthDays[8];

  var next_month = '<table class="calendarTable_L" style="background:#fff;" cellspacing="0px" cellpadding="0px">';
   next_month +='<tr>'
   next_month +='<td class="monthHead_L">' + mnth[8] + '</td>';
  var first_week_day = new Date(year,8, 0).getDay();
  
    var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu','We','Th','Fr','Sa','Su','Mo','Tu');
  
  for(week_day= 0; week_day < days_in_this_month; week_day++) {
		next_month += '<td class="weekDay_L" >' + weekDay[week_day] + '</td>';
    }
	next_month +='</tr><tr>'
next_month += '<td class="monthHead_L">' + year + '</td>';

 
  for(week_day = 0; week_day < first_week_day+2; week_day++) {
     //next_month += '<td class="empty_L"> </td>';
  }
  week_day = 0;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
	  
	  
	    if(week_day == 5 || week_day == 6 || week_day == 12 || week_day == 13 || week_day == 19 || week_day == 20 || week_day == 26 || week_day == 27 || week_day == 33 || week_day==34)
	 {
	   next_month += '<td class="weekEnd_L"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay_L">' + day_counter + '</td>';
    }
	
	else if(d1[0]<=d2[0] && month == d1[1] && month == d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     
	 else if(month == d1[1] && month < d2[1] && year == d1[2] && year == d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month > d1[1] && year == d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
     else if(month == d1[1] && month > d2[1] && year == d1[2] && year <= d2[2] && day_counter >=d1[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month == d2[1] && month < d1[1] && year >= d1[2] && year == d2[2] && day_counter <=d2[0])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month < d1[1] && month < d2[1] && year > d1[2] && year == d2[2])
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	  else if(month > d1[1] && month > d2[1] && year ==d2[2] && year > d1[2] )
     {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	 else if(month >d1[1] && month < d2[1] && year ==d1[2] && year == d2[2])
	 {
		next_month +='<td class="myleave_L" onmouseover=ShowContent("div_Context_planLeave"); onmouseout=HideContent("div_Context_planLeave");>' + day_counter + '</td>';
     }
	
 	 else {
      next_month += '<td class="monthDay_L"> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month +='<tr><td colspan="35" align="left" style="font-size:12px; color:#FF0000; float:left"> ';
  if(d1[1] == 9)
    next_month +='Holiday planned for &nbsp;'+d1[0]+"/"+d1[1]+"/"+d1[2]+' &nbsp;to &nbsp;'+d2[0]+"/"+d2[1]+"/"+d2[2]+' &nbsp;for &nbsp;'+document.getElementById('drpReason').options[document.getElementById('drpReason').options.selectedIndex].value;	
  next_month +='</td></tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

