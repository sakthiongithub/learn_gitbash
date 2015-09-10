// JavaScript Document

function validateWay()
{
	if(!document.frm.rdways.checked)
	{
		alert('Select your Travel direction');
	}	
}
function validateBoarding()
{
		if(document.frm.drpSource.value=="0")
	{
		alert('Select your boarding point');
	}
}
function validateDestination()
{
		if(document.frm.drpDestination.value=="0" || document.frm.drpDestination.value==document.frm.drpSource.value )
	{
		alert('Select your destination point');
	}
}
function validateDepDate()
{
	if(document.frm.frmdate.value=="")
	{
		alert('Enter Departure Date');
	}
}
function validateReturnDate()
{
	if(document.frm.returndate.value=="" && document.getElementById('rdOneWay').checked=="true")
	{
		alert('Enter Return Date');
	}
}
function validatePassengers()
{
	if(document.frm.drpAdult.value=="0")
	 alert('Enter No. of Passengers');
}
function validateClass()
{
	if(document.frm.class.checked=='false')
	  alert('Select a Class');
}