var cX = 0; var cY = 0; var rX = 0; var rY = 0;
function UpdateCursorPosition(e){ cX = e.pageX; cY = e.pageY;}
function UpdateCursorPositionDocAll(e){ cX = event.clientX; cY = event.clientY;}
if(document.all) { document.onmousemove = UpdateCursorPositionDocAll; }
else { document.onmousemove = UpdateCursorPosition; }
function AssignPosition(d) {
if(self.pageYOffset) {
	rX = self.pageXOffset;
	rY = self.pageYOffset;
	}
else if(document.documentElement && document.documentElement.scrollTop) {
	rX = document.documentElement.scrollLeft;
	rY = document.documentElement.scrollTop;
	}
else if(document.body) {
	rX = document.body.scrollLeft;
	rY = document.body.scrollTop;
	}
if(document.all) {
	cX += rX; 
	cY += rY;
	}
d.style.left = (cX-150) + "px";
d.style.top = (cY+0) + "px";
}
function AssignPosition_dt(d,x,y) {
if(self.pageYOffset) {
	rX = self.pageXOffset;
	rY = self.pageYOffset;
	}
else if(document.documentElement && document.documentElement.scrollTop) {
	rX = document.documentElement.scrollLeft;
	rY = document.documentElement.scrollTop;
	}
else if(document.body) {
	rX = document.body.scrollLeft;
	rY = document.body.scrollTop;
	}
if(document.all) {
	cX += rX; 
	cY += rY;
	}
d.style.left = (cX+x) + "px";
d.style.top = (cY+y) + "px";
}


function HideContent_dt(d) {
if(d.length < 1) { return; }
document.getElementById(d).style.display = "none";
}
function ShowContent_dt(d,x,y) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition_dt(dd);
dd.style.display = "block";
}


function HideContent(d) {
if(d.length < 1) { return; }
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition(dd);
dd.style.display = "block";
}


function ReverseContentDisplay(d) {
if(d.length < 1) { return; }
var dd = document.getElementById(d);
AssignPosition(dd);
if(dd.style.display == "none") { dd.style.display = "block"; }
else { dd.style.display = "none"; }
}

function stop_slide()
{
 document.getElementById('marqSlide').stop();
}
function start_scroll()
{
	document.getElementById('marqSlide').start();
}
function Show_edit()
{
	document.getElementById('editLoc').style.visibility='visible';
	document.getElementById('editTraveller').style.visibility='visible';
	document.getElementById('editCity').style.visibility='visible';
	document.getElementById('editcCity').style.visibility='visible';	
	document.getElementById('editDuration').style.visibility='visible';
	document.getElementById('editMode').style.visibility='visible';
	document.getElementById('editAcc').style.visibility='visible';
}
function change_back()
{
	document.getElementById('left_inputs').style.background="OrangeRed";
document.getElementById('left_inputs').style.background="OrangeRed";

}

//-->// JavaScript Document