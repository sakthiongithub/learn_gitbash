function show_block(id)
{
document.getElementById(id).style.display='block';
}

function hide_block(id)
{
document.getElementById(id).style.display='none';
}

function check(id)
{
  if(document.getElementById(id).checked == true)
  {
	  document.getElementById('td_rwrd').style.display='table-cell';
  }
}

function sortArea(val)
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
    document.getElementById("div_pets").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?area="+val,true);
xmlhttp.send();	
}

function sortDate(val)
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
    document.getElementById("div_pets").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?date="+val,true);
xmlhttp.send();	
}

function sortName(val)
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
    document.getElementById("div_pets").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PHP_Files/pckToolAjax.php?type="+val,true);
xmlhttp.send();	
}