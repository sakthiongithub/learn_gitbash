<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Missing Pets</title>
<link rel="stylesheet" href="Stylesheets/Styles.css" type="text/css" />
<script src="Javascript/petsScript.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="Javascript/datepicker.js"></script>
<script type="text/javascript" src="Javascript/jquery-1.8.0.min.js"></script>
</head>

<form name="frm" id="frm" method="post" enctype="multipart/form-data">
<body>
<?php include("PHP_Files/PHP_Connection.php"); ?>
<div align="center" id="master_container">

<div id="fixedHeader">
 		<div id="headerTemplates"> 
			<div id="headerLogo">
 			   <a target="_blank" href="index.php" style="text-decoration:none;">
  			<span class="span_logopic"><img src="Images/logo.png" width="250px" height="65px" style="border-style:none;"/></span></a></div>
         
   		    <div id="header_CenterSpace">
			<div style="float:left; width:800px; margin-left:20%; padding:5px; background:#CCCCCC; border-radius:5px; box-shadow:2px #ddd; height:50px; font-family:Calibri; font-size:14px;  position:fixed;">
<span style="float:left; margin-left:5px; color:#ff0000;">Sort By :</span>
<span style="float:left; margin-left:20px;">Area :</span>
<span style="float:left; margin-left:5px;">
<input type="text" id="txtsortArea" class="txtbox_Tab" style="width:150px; height:20px; font-size:14px;" placeholder="Type area name" onkeypress="sortArea(this.value);" /></span>
<span style="float:left; margin-left:20px;">Missing Date:</span>
<span style="float:left; margin-left:5px;">
<input type="text" id="txtsortDate" class="txtbox_Tab" style="width:80px; height:20px; font-size:14px;" placeholder="Date" onchange="sortDate(this.value);" onclick="oDP.show(event,'txtsortDate',2); show_block('datepicker');" /></span>
<span style="float:left; margin-left:20px;">Pet type :</span>
<span style="float:left; margin-left:5px;">
<input type="text" id="txtsortType" class="txtbox_Tab" style="width:150px; height:20px; font-size:14px;" placeholder="Dog, Cats, birds ..." onkeypress="sortName(this.value);" /></span>
<span style="float:right; margin-right:5px; font-size:14px; color:#0066ff; font-family:Calibri; cursor:pointer; " onclick="show_block('div_report');">Want to Report?</span>
</div>
			</div>
		
 		<div id="header_rightbtn">
    
		<div>
			  <span id="btnCustomer" class="smallbtn" style="width:90px; margin-right:3px; margin-bottom:3px; background:#F5F5F5; color:#B22222;" onClick="show_block('C_care_text_hidden'); document.getElementById(this.id).style.background='#fbfbfb'; document.getElementById(this.id).style.color='#b22';" onMouseOut="hide_block('C_care_text_hidden'); document.getElementById(this.id).style.background='#002929'; document.getElementById(this.id).style.color='#fff';">24x7 Support</span>
			  			
			   <span id="btnRegister" class="smallbtn" style="width:70px; margin-right:3px; margin-bottom:2px; cursor:pointer;" onClick="show_block('div_reg'); show_block('div_greyBack');">Register</span>
			   
			   <span id="btnLogin" class="smallbtn" style="width:60px; margin-right:3px; margin-bottom:2px; cursor:pointer;" onClick="show_block('div_login'); show_block('div_greyBack');">Login</span>
       </div>	
		 
	    <div id="C_care_text_hidden">
			<span style="font-stretch:expanded; font-weight:700;"> 
			Call Us: 1800-2543 / 022-4234 5677<br/>
			e-Mail: Mytrip@quitcitynow.com<br/>
			SMS: MYTRIP to 56161</span>	     </div>  
	
		</div> 
	
		<div style="float:left; width:100%;">
		<span style="float:right; margin-right:10px; font-size:12px; font-family:Calibri; color:#0066ff; text-decoration:underline; font-weight:600; cursor:pointer;" onClick="open_leads();">
		Tour Operator? View Lead...</span></div>
	
	   		<div style="height :0px; border-top:3px solid #B22222;width:100%; margin-top:0px; float:left;"></div>	
	</div>    
	
	    <div id="fixedBottom">
	<div id="footer_text_left">
	<span style="color:white; font-weight:bold;"> Copyrights &copy; Reserved </span>	</div>
        <div id="footer_btn_right">	
		<a href="Missing_pets.php"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Missing Pets</span></a>	
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">About Us</span></a>
     <a href="#"><span class="smallbtn" style="width:90px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;" >Privacy Policy</span></a>
	<a href="#"><span class="smallbtn" style="width:120px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Payment Security</span></a>
	<a href="#"><span class="smallbtn" style="width:80px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">Feedback </span></a>
	<a href="#" onMouseOver="div_showMore();" onClick="div_hideMore();"><span id="span_more" class="smallbtn" style="width:50px; box-shadow:2px 1px 2px 1px lightgrey; margin-right:3px;">More </span></a>
	</a></div>   
	     </div>
	
	</div>

</div>
	


<div style="float:left; width:100%; background:url(Images/HomePage_Slides/DMB_TML_036.jpg) bottom; height:520px;">

<div id="body_container">

<div id="div_report" class="popUp_imgs_leads" style="display:none; width:500px; height:500px; margin-left:50px; overflow:hidden; margin-top:1%;">
  <div style="float:left; width:100%; margin-top:5px;">
   <span style="float:left; font-size:16px; font-family:Calibri; margin-left:100px; font-weight:bold;">Please Enter Pet Details</span>
   <span style="float:right; margin-right:5px;" onclick="hide_block('div_report');"><img src="Images/cancelbtn.png" width="25px" height="25px" /></span>
  </div>
  <div style="float:left; width:100%; margin:10px;">
    <table width="100%" cellpadding="2" cellspacing="0" style="font-size:14px; font-family:Calibri; table-layout:fixed;">
	 <tr>
	  <td width="120px" align="right">Name of your pet:</td>
	  <td width="300px" align="left"><input type="text" id="txtPetName" name="txtPetName" class="txtbox_Tab" style="width:200px; height:20px;" /></td>
	 </tr>
	  <tr>
	  <td width="120px" align="right">Pet type:</td>
	<td width="300px" align="left"><input type="text" id="txtPettype" name="txtPettype" class="txtbox_Tab" style="width:200px; height:20px;" placeholder="Dog, cat, bird.." /></td>
	 </tr>
	  <tr>
	  <td align="right">Picture of your pet:</td>
	  <td align="left" style="position:relative;"><input type="text" id="txt_src_t" name="txt_src_t"  class="txtbox_Tab" style="position:absolute; height:20px;" placeholder="Click here to select a file" accept="image/x-png, image/gif, image/jpeg"/>
        <input type="file"  id="txt_src" name="txt_src" style="opacity:0; z-index:1; visibility:false;" onChange="document.getElementById('txt_src_t').value = this.value; show_img_names();"  accept="image/x-png, image/gif, image/jpeg"/></td>
	 </tr>
	  <tr>
	  <td  align="right">Missing From: </td>
	  <td align="left"><span style="float:left;"><input type="text" id="txtMissFrm" name="txtMissFrm" class="txtbox_Tab" style="width:80px;  height:20px;" onclick="oDP.show(event,'txtMissFrm',2); show_block('datepicker');" placeholder="Date" /> </span><span style="float:left; margin-left:3px;"><input type="text" id="txtMissArea" name="txtMissArea" class="txtbox_Tab" style="width:100px;  height:20px;" placeholder="Area/Location" /></span><span style="float:left; margin-left:3px;"><input type="text" id="txtMissCity" name="txtMissCity" class="txtbox_Tab" style="width:100px;  height:20px;" placeholder="City.." /></span></td>
	 </tr>
	 <tr>
	  <td  align="right">Belongs to:</td>
	  <td align="left";><textarea id="txtAreaAddr" name="txtAreaAddr" style="width:250px; height:50px; box-shadow:2px #ddd;" placeholder="Area / Address.."></textarea></td>
	 </tr>
	 <tr>
	 <td  align="right">Responds to:</td>
	  <td align="left";><input type="text" id="txtothrName" name="txtothrName" class="txtbox_Tab" style="width:200px;  height:20px;" placeholder="Any other name other than main name" /></td>
	 </tr>
	  <tr>
	 <td  align="right">Description:</td>
	  <td align="left";><textarea id="txtdesc" name="txtdesc" style="width:250px; height:60px; box-shadow:2px #ddd;" placeholder="Any other description.."></textarea></td>
	 </tr>
	 <tr><tD colspan="2"><hr style="float:left; width:100%; border:1px solid #ddd;" /></tD></tr>
	 <tr>
	  <td  align="right" style="color:#0066ff;"><input type="checkbox" id="chkRwrd" name="chkRwrd" onclick="check(this.id);" />Reward(if any):</td>
	  <td align="left" id="td_rwrd" style="display:none;"><textarea id="txtreward" name="txtreward" style="width:250px; height:40px; box-shadow:2px #ddd;" placeholder="Reward amount.."></textarea></td>
	 </tr>
	 <tr><tD colspan="2"><hr style="float:left; width:100%; border:1px solid #ddd;" /></tD></tr>
	 <tr>
	  <td  align="right">Your Name:</td>
	  <td align="left";><input type="text" id="txtownerName" name="txtownerName" class="txtbox_Tab" style="width:200px;  height:20px;" placeholder="Name" /></td>
	 </tr>
	 <tr>
	  <td  align="right">Your Email-ID:</td>
	  <td align="left";><input type="text" id="txtownerEmail" name="txtownerEmail" class="txtbox_Tab" style="width:200px;  height:20px;" placeholder="Email" /></td>
	 </tr>
	 <tr>
	  <td  align="right">Your Contact:</td>
	  <td align="left";><input type="text" id="txtownerPh" maxlength="10" name="txtownerPh" class="txtbox_Tab" style="width:200px;  height:20px;" placeholder="+91" /></td>
	</tr>
	</table>
  </div>
  <div style="float:left; width:100%;"><span style="float:right; margin-right:20px;">
  <button id="btnSub" name="btnSub" class="smallbtn" style="width:60px; height:24px;">Submit</button></span></div>

</div>

  <div style="visibility:visible; position:absolute; left:0x; top:60px; display:none; z-index:10000;" id="datepicker"></div>			
<script>
  	var oDP = new datePicker("datepicker");
</script>



<div id="div_pets" style="float:left; width:100%; margin-top:5px; margin-bottom:10px; padding:5px; background:#eee; border-radius:5px; box-shadow:2px #ddd; height:auto;">

<span style="float:left; width:32%; margin-top:10px; margin-left:10px; border-radius:5px;">
    <div style="float:left; width:100%; height:250px; background:#fff; border-radius:5px;">
	  <div style="float:left; width:100%; padding-top:10px; position:relative; cursor:pointer;" onclick="show_block('div_report');">
	     <img src="Images/Pets/missingPet.jpg" style="border-radius:5px; border:1px solid #ddd;" width="210px" height="200px" />
		  <div style="float:left; position:absolute; bottom:20%; left:30%; z-index:1; color:#ff0000; font-weight:bold;">
		  <span style="font-size:24px; font-family:calibri;">Report Here!!</span></div>		
	  </div>	  
	</div>
  </span>

<?php 

$disp_pets = "select pet_name, pet_pic, pet_type, DATE_FORMAT(miss_from,'%d-%m-%Y') miss_from, reward, area from missing_pets";
$res_disp = mysqli_query($conn,$disp_pets);

if($res_disp)
{

while($row = mysqli_fetch_array($res_disp))
{
 echo ' <span style="float:left; width:32%; margin-top:10px; margin-left:10px; border-radius:5px;">
    <div style="float:left; width:100%; height:250px; background:#fff; border-radius:5px;">
	  <div style="float:left; width:100%; padding-top:10px;">
	     <img src="data:image/png;base64,'.base64_encode($row["pet_pic"]).'" style="border-radius:5px; border:1px solid #ddd;" width="210px" height="180px" />
	  </div>
	  <div style="float:left; width:100%; margin-top:5px; padding:2px;">
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Pet Type: &nbsp;<label style="color:#ff0000;">'.$row["pet_type"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Missing from: &nbsp;<label style="color:#ff0000;">'.$row["miss_from"].'</label></span></div>
	   <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Area: &nbsp;<label style="color:#ff0000;">'.$row["area"].'</label></span></div>';
	   if($row["reward"]!="")
	   {
	  echo ' <div style="float:left; width:100%;"><span style="float:left; font-size:14px; color:#555; font-family:Calibri;">Reward: &nbsp;<label style="color:#ff0000;">'.$row["reward"].'</label></span></div>';
	   }
	 echo '</div>
	</div>
  </span>';
 }
 } 
 ?>
</div>
</div>



<?php 
if(isset($_POST['btnSub']))
{
$pic1 = addslashes(file_get_contents($_FILES["txt_src"]["tmp_name"]));
$date = date('Y-m-d', strtotime($_POST["txtMissFrm"]));
$plc = addslashes($_POST["txtMissArea"]).", ".addslashes($_POST["txtMissCity"]);

$q_pets = "insert into missing_pets values('','".addslashes($_POST['txtPetName'])."','".addslashes($_POST["txtPettype"])."','".$pic1."','".$date."','".$plc."','".addslashes($_POST["txtAreaAddr"])."','".addslashes($_POST["txtothrName"])."','".addslashes($_POST["txtdesc"])."','".addslashes($_POST["txtreward"])."','".addslashes($_POST["txtownerName"])."','".addslashes($_POST["txtownerEmail"])."','".addslashes($_POST["txtownerPh"])."');";
$res_pets = mysqli_query($conn,$q_pets);
if($res_pets)
{
  echo '<script type="text/javascript">';
  echo 'alert(\'You will be contacted once your pet is found\')';
  echo '</script>';
}
else
{
echo mysqli_error($conn);
echo '<script type="text/javascript">';
  echo 'alert(\'Error : Please try again\')';
  echo '</script>';
}
}

?>



</body>
</form>
</html>

