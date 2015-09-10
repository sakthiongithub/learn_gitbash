function selectMonths()
{
  if(document.getElementById('drpMonths').options[document.getElementById('drpMonths').options.selectedIndex].value == "3M")
  {
    document.getElementById('div_3mnths').style.display='block';
	document.getElementById('div_6mnths').style.display='none';
	document.getElementById('div_9mnths').style.display='none';
	document.getElementById('div_12mnths').style.display='none';
  }
   if(document.getElementById('drpMonths').options[document.getElementById('drpMonths').options.selectedIndex].value == "6M")
  {
    document.getElementById('div_3mnths').style.display='block';
	document.getElementById('div_6mnths').style.display='block';
	document.getElementById('div_9mnths').style.display='none';
	document.getElementById('div_12mnths').style.display='none';
  }
   if(document.getElementById('drpMonths').options[document.getElementById('drpMonths').options.selectedIndex].value == "9M")
  {
    document.getElementById('div_3mnths').style.display='block';
	document.getElementById('div_6mnths').style.display='block';
	document.getElementById('div_9mnths').style.display='block';
	document.getElementById('div_12mnths').style.display='none';
  }
   if(document.getElementById('drpMonths').options[document.getElementById('drpMonths').options.selectedIndex].value == "12M")
  {
    document.getElementById('div_3mnths').style.display='block';
	document.getElementById('div_6mnths').style.display='block';
	document.getElementById('div_9mnths').style.display='block';
	document.getElementById('div_12mnths').style.display='block';
  }
}

function HPlan_mnths()
{
 if(document.getElementById('drpHPlan').options[document.getElementById('drpHPlan').options.selectedIndex].value == 3)
  {
    document.getElementById('div_3mnths_plan').style.display='block';
	document.getElementById('div_6mnths_plan').style.display='none';
	document.getElementById('div_9mnths_plan').style.display='none';
	document.getElementById('div_12mnths_plan').style.display='none';
	
	document.getElementById('div_3mnths_plan_el').style.display='block';
	document.getElementById('div_6mnths_plan_el').style.display='none';
	document.getElementById('div_9mnths_plan_el').style.display='none';
	document.getElementById('div_12mnths_plan_el').style.display='none';
  }
   if(document.getElementById('drpHPlan').options[document.getElementById('drpHPlan').options.selectedIndex].value == 6)
  {
    document.getElementById('div_3mnths_plan').style.display='block';
	document.getElementById('div_6mnths_plan').style.display='block';
	document.getElementById('div_9mnths_plan').style.display='none';
	document.getElementById('div_12mnths_plan').style.display='none';
	
	document.getElementById('div_3mnths_plan_el').style.display='block';
	document.getElementById('div_6mnths_plan_el').style.display='block';
	document.getElementById('div_9mnths_plan_el').style.display='none';
	document.getElementById('div_12mnths_plan_el').style.display='none';
  }
   if(document.getElementById('drpHPlan').options[document.getElementById('drpHPlan').options.selectedIndex].value == 9)
  {
    document.getElementById('div_3mnths_plan').style.display='block';
	document.getElementById('div_6mnths_plan').style.display='block';
	document.getElementById('div_9mnths_plan').style.display='block';
	document.getElementById('div_12mnths_plan').style.display='none';
	
	document.getElementById('div_3mnths_plan_el').style.display='block';
	document.getElementById('div_6mnths_plan_el').style.display='block';
	document.getElementById('div_9mnths_plan_el').style.display='block';
	document.getElementById('div_12mnths_plan_el').style.display='none';
  }
   if(document.getElementById('drpHPlan').options[document.getElementById('drpHPlan').options.selectedIndex].value == 12)
  {
    document.getElementById('div_3mnths_plan').style.display='block';
	document.getElementById('div_6mnths_plan').style.display='block';
	document.getElementById('div_9mnths_plan').style.display='block';
	document.getElementById('div_12mnths_plan').style.display='block';
	
	document.getElementById('div_3mnths_plan_el').style.display='block';
	document.getElementById('div_6mnths_plan_el').style.display='block';
	document.getElementById('div_9mnths_plan_el').style.display='block';
	document.getElementById('div_12mnths_plan_el').style.display='block';
  }
} 

// October Calendar............................................

function Oct2013() {
  // Get the current date parameters.
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear();
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[9];

  // Create the basic Calendar structure.
  var curr_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  curr_month += '<tr><td class="monthHead" colspan="7">' + months[9] + ' ' + year + '</td></tr>';
  curr_month += '<tr>';
  var first_week_day = new Date(year,9, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    curr_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  curr_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
     curr_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
  
    week_day %= 7;
    if(week_day == 0)
      curr_month += '</tr><tr>';

   if(week_day == 5 || week_day ==6)
	 {
	  // var date = ;
	 curr_month += '<td id="'+day_counter+'" class="weekEnd" onclick=createEvents("'+day_counter+'","'+10+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + ' </td>';
	 }

    // Do something different for the current day.
   else if(day == day_counter) {
      curr_month += '<td  class="currentDay" onclick=createEvents("'+day_counter+'","'+10+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
	 else {
      curr_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+10+'","'+year+'"); showEvent("'+day_counter+'","'+mnth[9]+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }

	  
    week_day++;
  }
  curr_month += '</tr>';
  curr_month += '</table>';
  // Display the calendar.
  document.write(curr_month);
}


// November Calendar.............................................................
function Nov2013()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear();
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[10];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[10] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 10, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	 if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+11+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
    // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+11+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
	 else {
      next_month += '<td  class="monthDay" onclick=createEvents("'+day_counter+'","'+11+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//  Calendar for Dec 2013..................................................................................................

function Dec2013()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear();
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[11];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[11] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 11, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+12+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+12+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }

	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+12+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//  Calendar for Jan 2014..................................................................................................

function Jan2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[0];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[0] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 0, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';

	  if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+01+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }

   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+01+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+01+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


//  Calendar Feb 2014..................................................................................................

function Feb2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[1];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[1] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 1, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+02+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+02+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+02+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


// Calendar Mar 2014..................................................................................................

function Mar2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[2];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[2] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 2 , 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+03+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+03+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+03+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}


//Calendar Apr 2014 ......................................................................................

function Apr2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[3];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[3] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 3, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+04+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+04+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+04+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

//Calendar May 2014 ...........................................................................

function May2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[4];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[4] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 4, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+05+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }

   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+05+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+05+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Jun 2014..................................................................................

function Jun2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[5];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[5] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 5, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+06+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+06+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+06+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Jul 2014 .........................................................................................

function Jul2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[6];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[6] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 6, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+07+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+07+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+07+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Aug 2014.................................................................................................

function Aug2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[7];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[7] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 7, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+08+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }

   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+08+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+08+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

// Calendar Sept 2014...........................................................................................

function Sept2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var mnth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[8];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable" onmouseover=ShowContent("div_event"); onmouseout=HideContent("div_event");>';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[8] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, 8, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd" onclick=createEvents("'+day_counter+'","'+09+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay" onclick=createEvents("'+day_counter+'","'+09+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";>' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td class="monthDay" onclick=createEvents("'+day_counter+'","'+09+'","'+year+'"); onmouseover=this.style.color="#FF0000"; onmouseout=this.style.color="#444";> ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
}

/*function Oct2014()
{  
 var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear()+1;
  
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
  var weekDay = new Array('Mo','Tu','We','Th','Fr','Sa','Su');
  var days_in_this_month = monthDays[9];

  // Create the basic Calendar structure.
  var next_month = '<table class="calendarTable">';
  next_month += '<tr><td class="monthHead" colspan="7">' + months[9] + ' ' + year + '</td></tr>';
  next_month += '<tr>';
  var first_week_day = new Date(year, month, 0).getDay();
  for(week_day= 0; week_day < 7; week_day++) {
    next_month += '<td class="weekDay">' + weekDay[week_day] + '</td>';
  }
  next_month += '</tr><tr>';

  // Fill the first week of the month with the appropriate number of blanks.
  for(week_day = 0; week_day < first_week_day; week_day++) {
    next_month += '<td> </td>';
  }
  week_day = first_week_day;
  for(day_counter = 1; day_counter <= days_in_this_month; day_counter++) {
    week_day %= 7;
    if(week_day == 0)
      next_month += '</tr><tr>';
	  
	    if(week_day == 5 || week_day ==6)
	 {
	   next_month += '<td class="weekEnd"> ' + day_counter + ' </td>';
	 }
   // Do something different for the current day.
   else if(day == day_counter && month == next_month) {
      next_month += '<td class="currentDay">' + day_counter + '</td>';
    }
 	 else {
      next_month += '<td > ' + day_counter + ' </td>';
 }
    week_day++;
  }
  next_month += '</tr>';
  next_month += '</table>';
  // Display the calendar.
  document.write(next_month);  
} */
