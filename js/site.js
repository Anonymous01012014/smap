

/**
 * @author Mohanad Kaleia
 * 
 * File name: site_map.js
 * Description: 
 * This file contain functions about google map to show sites on map 
 * 
 * created date : 19-2-2014  
 */

function initialize()
{
	var mapProp = {
	  center:new google.maps.LatLng(lat,long),
	  zoom:7,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  
	var map=new google.maps.Map(document.getElementById("googleMap")
	  ,mapProp);
	  	 
	
	
	for( i = 0 ; i< sites.length ; i++)
	{
		addSiteToMap(url , map , sites[i]);	
	}
		
	
	
}




/**
 * Function name : getSiteInfo
 * Description: 
 * get site information by id and set it to the site info table
 * 
 * created date: 14-2-2014
 * ccreated by: Eng. Mohanad Shab Kaleia
 * contact: ms.kaleia@gmail.com 
 */

function getSiteInfo(url , site_id)
{	
	
	$.get(url + "/" + site_id , function(data){
		
		var site = jQuery.parseJSON(data);		
		
		
		//get site with index 0
		site = site[0];			
		
		//set the site data in the site information pane
		
		//last response
		$("#last_response").html(site.response_date);
		
		//last check
		$("#last_check").html(site.check_date);
		
		//Result
		$("#result").html("");
		
		//signal
		$("#signal").html(site.signal);
		
		//Latitude
		$("#latitude").html(site.latitude);
		
		//longitude
		$("#longitude").html(site.longitude);
		
	});	
}





/**
 * Function name : getSiteInfo
 * Description: 
 * get site information by id and set it to the site info table
 * 
 * created date: 4-2-2014
 * ccreated by: Eng. Ahmad Mulhem Barakat
 * contact: molham225@gmail.com 
 */
function addSiteToMap(url , map , site){
	
	var markerPosition=new google.maps.LatLng(site['latitude'] , site['longitude']);
	
	var marker=new google.maps.Marker({
	  position:markerPosition,
	  site_id: site['id']
	  });
	
	marker.setMap(map);
	
	var infowindow = new google.maps.InfoWindow({
	  content: site['name']
	  });
	
	
	google.maps.event.addListener(marker,'click',function() {
		  map.setZoom(16);		  
		  //get data from server as json and show it on screen
		  getSiteInfo(url , site['id']);
		  infowindow.open(map,marker);		  
	  });
}
