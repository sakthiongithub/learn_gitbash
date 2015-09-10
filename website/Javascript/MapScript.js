function ShowOnMap()
{
     var directionsService1 = new google.maps.DirectionsService();
     var directionsDisplay1 = new google.maps.DirectionsRenderer();

     var map = new google.maps.Map(document.getElementById('map'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
	 
     directionsDisplay1.setMap(map);	 
   // directionsDisplay.setPanel(document.getElementById('panel'));

     var request1 = {
       origin: document.getElementById('frmCity_map').value, 
       destination:document.getElementById('toCity_map').value,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService1.route(request1, function(response1, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay1.setDirections(response1);
       }
     });
	 
	 
	    var directionsService2 = new google.maps.DirectionsService();
     var directionsDisplay2 = new google.maps.DirectionsRenderer();

     var map_cmrcl = new google.maps.Map(document.getElementById('map_cmrcl'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
	 
     directionsDisplay2.setMap(map_cmrcl);	 
   // directionsDisplay.setPanel(document.getElementById('panel'));

     var request2 = {
       origin: document.getElementById('frmCity_map_cmrcl').value, 
       destination:document.getElementById('toCity_map_cmrcl').value,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService2.route(request2, function(response2, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay2.setDirections(response2);
       }
     });
	 
	 
	 	    var directionsService3 = new google.maps.DirectionsService();
     var directionsDisplay3 = new google.maps.DirectionsRenderer();

     var map_brdg = new google.maps.Map(document.getElementById('map_brigade'), {
       zoom:7,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     });
	 
     directionsDisplay3.setMap(map_brdg);	 
   // directionsDisplay.setPanel(document.getElementById('panel'));

     var request3 = {
       origin: document.getElementById('frmCity_map_brdg').value, 
       destination:document.getElementById('toCity_map_brdg').value,
	   travelMode: google.maps.DirectionsTravelMode.DRIVING
     };

     directionsService3.route(request3, function(response3, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay3.setDirections(response3);
       }
     });  
}


