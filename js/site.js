/**
 * @author Mohanad Kaleia
 * 
 * File name: site_map.js
 * Description: 
 * This file contain functions about google map to show sites on map 
 * 
 * created date : 19-2-2014  
 */

//marker array
var marker = new Array();


function showOklahomeMap(latitude, longitude)
{
	var mapProp = {
	  center:new google.maps.LatLng(latitude,longitude),
	  zoom:6,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  
	
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  	 
	return map;	
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
		
		//show charts
		//$("#site_chart").html("");		
		//$('#site_chart').load('http://localhost:8080/smap/chart/oneYearChart/'+site.ID);
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
			
			//get all sites information
			var site = jQuery.parseJSON(data);		
			
			//print a marker for each site
			for(i = 0 ; i < site.length ; i++)
			{

				var markerPosition=new google.maps.LatLng(site[i]['Site_Latitude'] , site[i]['Site_Longitude']);
				var pinColor = 'FFFF00';
				var pinIcon = new google.maps.MarkerImage(
					"http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|4EC23D",
					null,null,null,new google.maps.Size(15, 30)
								);
					
					var infowindow = new google.maps.InfoWindow({
						maxWidth: 320
							  });
				 marker[site[i]['ID']]=new google.maps.Marker({
				  position:markerPosition,
				  icon: pinIcon,
				  siteId: site[i]['ID']
				  });
	
				
				marker[site[i]['ID']].setMap(map);
				
								
				
				google.maps.event.addListener(marker[site[i]['ID']],'click',function(i) {
								  
						//alert(site_info["Site_Name"]);
						//show site info in the right panel
						//alert(site[i]["Site_Name"]);
						return function(){
							
							infowindow.setContent("<div style='min-width:150px;min-height:30px;'>"+site[i]['Site_Name']+"</div>");
							  
							
							map.setZoom(6);
							//site name		
							$("#wim_name").html(site[i]["Site_Name"]);
							
							//last response
							$("#last_response").html(site[i]["DateTime"]);

							//last check
							$("#last_check").html(site[i]["DateTime"]);

							//Result
							$("#result").html(site[i]["schedulerStatus"]);

							//signal
							$("#signal").html(site[i]["signal"]);

							//Latitude
							$("#latitude").html(site[i]["Site_Latitude"]);

							//longitude
							$("#longitude").html(site[i]["Site_Longitude"]);
							
							infowindow.open(map,marker[i]);	
							
							//show charts
							$("#site_chart").html("");
							$('#site_chart').load('http://localhost:8080/smap/chart/oneYearChart/'+site[i]['ID']);
						}	  
					}(site[i]['ID']));
			}
		
			
			
		});
		
		
		
		/*
		
	*/
}
