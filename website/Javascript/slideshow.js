var slideShowSpeed = 3000;

var crossFadeDuration = 3;

var Shop = new Array();

 
Shop[0] = 'Images/HomePage_Slides/Heritage.jpg'
Shop[1] = 'Images/HomePage_Slides/DSC02010.jpg'
Shop[2] = 'Images/HomePage_Slides/DMB_TML_036.jpg'
Shop[3] = 'Images/HomePage_Slides/DSC01420.jpg'
Shop[4] = 'Images/HomePage_Slides/DSC00834.jpg'
Shop[5] = 'Images/HomePage_Slides/DSC01230.jpg'
Shop[6] = 'Images/HomePage_Slides/DSC00849.jpg'
Shop[7] = 'Images/HomePage_Slides/DSC00823.jpg'
Shop[8] = 'Images/HomePage_Slides/DSC01241.jpg'
Shop[9] = 'Images/HomePage_Slides/DSC01222.jpg'
Shop[10] = 'Images/HomePage_Slides/DSC01673.jpg'
Shop[11] = 'Images/HomePage_Slides/DSC01464.jpg'
Shop[12] = 'Images/HomePage_Slides/TM_Nilaveli_010.jpg'
Shop[13] = 'Images/HomePage_Slides/DSC01268.jpg'
Shop[14] = 'Images/HomePage_Slides/DSC01834.jpg'
Shop[15] = 'Images/HomePage_Slides/CK_012.jpg'


//History[0] = 'Images/Bangalore palace_monuments_blr.gif'
//History[1] = 'Images/Tippu palace_monuments_blr.gif'
 

var t;
var j = 0;
var s = Shop.length;


var preLoad = new Array();
//var preLoadHistory = new Array();

for (i = 0; i < s; i++) {
preLoad[i] = new Image();
preLoad[i].src = Shop[i];
//preLoadHistory[i].src = History[i];
}



function runSlideShow() {
if (document.all) {
document.images.left_img.style.filter="blendTrans(duration=2)";
document.images.left_img.style.filter="blendTrans(duration=crossFadeDuration)";
document.images.left_img.filters.blendTrans.Apply();

/*document.images.img_history.style.filter="blendTrans(duration=2)";
document.images.img_history.style.filter="blendTrans(duration=crossFadeDuration)";
document.images.img_history.filters.blendTrans.Apply();*/
}


document.images.left_img.src = preLoad[j].src;
//document.images.img_history.src = preLoadHistory[j].src;

if (document.all) {
document.images.left_img.filters.blendTrans.Play();
//document.images.img_history.filters.blendTrans.Play();
}



j = j + 1;
if (j > (s - 1)) j = 0;
t = setTimeout('runSlideShow()', slideShowSpeed);
}

