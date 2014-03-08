/**
 * @author Mohanad Kaleia
 * 
 * File name: site_map.js
 * Description: 
 * This file contain functions about google map to show sites on map 
 * 
 * created date : 19-2-2014  
 */

function showOklahomeMap(latitude, longitude)
{
	var mapProp = {
	  center:new google.maps.LatLng(latitude,longitude),
	  zoom:6,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  
	
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  	 
	return map;
	/*
	for( i = 0 ; i< sites.length ; i++)
	{
		addSiteToMap(url , map , sites[i]);	
	}
	*/
	
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
		
		//site name		
		$("#wim_name").html(site.Site_Name);
		
		//last response
		$("#last_response").html(site.DateTime);
		
		//last check
		$("#last_check").html(site.DateTime);
		
		//Result
		$("#result").html(site.SchedulerStatus);
		
		//signal
		$("#signal").html(site.signal);
		
		//Latitude
		$("#latitude").html(site.Site_Latitude);
		
		//longitude
		$("#longitude").html(site.Site_Longitude);
		
	});	
}





/**
 * Function name : addSiteToMap
 * Description: 
 * get site information by id and set it to the site info table
 * parameres:
 * url: the controller function that will get sites informations
 * map: map object of google map
 * site: 
 * created date: 4-2-2014
 * ccreated by: Eng. Ahmad Mulhem Barakat
 * contact: molham225@gmail.com 
 */
function addSiteToMap(url , map , site)
{
		
		$.get(url , function(data){
		
			var site = jQuery.parseJSON(data);		
			var marker = new Array();
			//print a marker for each site
			for(i = 0 ; i < site.length ; i++)
			{
				var markerPosition=new google.maps.LatLng(site[i]['Site_Latitude'] , site[i]['Site_Longitude']);
	
				 marker[i]=new google.maps.Marker({
				  position:markerPosition,
				  site_id: site[i]['ID']
				  });
				
				marker[i].setMap(map);
				
				var site_info = site[i];
				
				var infowindow = new google.maps.InfoWindow({
				  content: site[i]['Site_Name']
				  });				
				
				google.maps.event.addListener(marker[i],'click',function() {
						map.setZoom(6);		  
						alert(site_info["Site_Name"]);
						//show site info in the right panel
						alert(site[i]["Site_Name"]);
						
						//site name		
						$("#wim_name").html(site[i]["Site_Name"]);
						
						//last response
						$("#last_response").html(site[i]["DateTime"]);

						//last check
						$("#last_check").html(site[i]["DateTime"]);

						//Result
						$("#result").html(site[i]["SchedulerStatus"]);

						//signal
						$("#signal").html(site[i]["signal"]);

						//Latitude
						$("#latitude").html(site[i]["Site_Latitude"]);

						//longitude
						$("#longitude").html(site[i]["Site_Longitude"]);
						
						infowindow.open(map,marker[i]);		  
					});
			}
		
			
			
		});
		
		
		
		/*
		
	*/
}
