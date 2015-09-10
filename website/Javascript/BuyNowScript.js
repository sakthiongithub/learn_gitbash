
function check_displ(btn1,btn2, div1, div2, div3)
{
	document.getElementById(btn1).style.background="#0066FF";
	document.getElementById(btn2).style.background="#B22222";
	document.getElementById(div1).style.display='block';
}


function show_block(id)
{
	document.getElementById(id).style.display='block';
}
function hide_block(id)
{
	document.getElementById(id).style.display='none';
}
function errase(id)
{
	document.getElementById(id).value="";
}


function change_img_block1(imgId1, imgId2, imgId3)
{
	document.getElementById(imgId1).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn1_onfocus.png') no-repeat";
	document.getElementById(imgId2).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn2.png') no-repeat";
	document.getElementById(imgId).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn3.png') no-repeat";
}
function change_img_block2(imgId1, imgId2, imgId3)
{
	document.getElementById(imgId1).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn2_onfocus.png') no-repeat";
	document.getElementById(imgId2).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn1.png') no-repeat";
	document.getElementById(imgId).style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn3.png') no-repeat";
}


function change_block_img2()
{
	document.getElementById('block2').style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn2_onfocus.png') no-repeat";
	document.getElementById('block1').style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn1.png') no-repeat";
}
function change_block_img1()
{
    document.getElementById('block1').style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn1_onfocus.png') no-repeat";
	document.getElementById('block2').style.background="url('file:///D|/Project/Codes/HTML_Design/Integrated_Page/version10.4/Images/Arrows/buy_btn2.png') no-repeat";
}

function display_registry()
{
	document.getElementById('span_RegName').innerHTML = document.getElementById('txtfName').value+" "+document.getElementById('txtlName').value;
	document.getElementById('span_RegMailId').innerHTML = document.getElementById('txtEmailId').value;
	document.getElementById('span_RegNum').innerHTML = document.getElementById('txtMobileNo').value;
	document.getElementById('span_RegAddr').innerHTML = document.getElementById('txtBuildNum').value+" "+document.getElementById('txtBuildName').value+", "+document.getElementById('txtStreet').value+", "+document.getElementById('txtLandmark').value+", "+document.getElementById('txtArea').value+", "+document.getElementById('txtCity').value+"-"+document.getElementById('txtAreaPin').value+" <br/> "+document.getElementById('txtState').value+", "+document.getElementById('txtCountry').value;
}

/*function disable_block1()
{
	document.getElementById('rd_unregist').disabled=true;
	document.getElementById('frstVisit_hdr').style.color="#CCCCCC";
}*/