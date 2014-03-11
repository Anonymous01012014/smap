<!-- load scripts -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDczDfEHTE-O8noyduCL0zC1MDmVx_cJLU&sensor=false"></script>
<script src="<?php echo base_url();?>js/site.js"></script>
<script>
	$( document ).ready(function() {
		// Handler for .ready() called.
		site = "Oklahome";
		latitude = 35.47278;
		longitude = -98.75722;				
		//get Oklahome map		
		oklahomeMap = showOklahomeMap(latitude , longitude);
		
		//set WIM markers			
		addSiteToMap("<?php echo base_url()."dashboard/ajaxGetAllSites";?>" , oklahomeMap);		
	});
	
	
</script>


<div id="container" class="col-md-7 col-md-offset-1">	
	<div id="googleMap" style="width:100%;height:400px;"></div>  		
</div>


<div id="container" class="col-md-3" style="height:430px;">		
				<label>Choose a site:</label>			
	
				<script>
			        $(document).ready(function() { 
		        		$("#site_name").select2();
		        		
		        		$("#site_name").on("change", function(e) {
		        				
		        				//selected site id
		        				site_id = $("#site_name").val();
		        				
		        				//get selected site information by id and set it to the site info
		        				var url = "<?php echo base_url()."dashboard/ajaxGetSiteInfo";?>";	
    							getSiteInfo(url , site_id);
    							
    							new google.maps.event.trigger( marker[site_id], 'click' );    							    							    							
    						}); 
	        		});
			        
			        
			    </script>
				<select  name="site_name" id="site_name">
					<option value="0"></option>
					<?php 
						foreach ($sites as $site) 
						{
					?>
							<option value="<?php echo $site['ID'];?>"><?php echo $site['Site_Name'];?></option>		
					<?php	
						}						
					?>						
				</select>	
				
				<br/>
				
				<table class="table table-striped" style="margin-top:10px;">
					<!-- site name -->	
					<tr>
						<td>
							Site Name:			
						</td>
						
						<td id="wim_name">
							
						</td>
					</tr>
					
					<!-- last response -->	
					<tr>
						<td>
							Last Response:			
						</td>
						
						<td id="last_response">
							
						</td>
					</tr>
					
					<!-- last check -->	
					<tr>
						<td>
							Last Check:			
						</td>
						
						<td id="last_check">
							
						</td>
					</tr>
					
					
					<!-- result -->	
					<tr>
						<td>
							Result:			
						</td>
						
						<td id="result">
							
						</td>
					</tr>
					
					
					<!-- signal -->	
					<tr>
						<td>
							Singal:			
						</td>
						
						<td id="signal">
							
						</td>
					</tr>
					
					
					<!-- Latitude -->	
					<tr>
						<td>
							Latitude:			
						</td>
						
						<td id="latitude">
							
						</td>
					</tr>
					
					
					<!-- longitude -->	
					<tr>
						<td>
							Longitude:			
						</td>
						
						<td id="longitude">
							
						</td>
					</tr>										
				</table>
		
</div>

<div class="clearfix"></div>

<div id="container" class="col-md-10 col-md-offset-1">
	<div id="site_chart"></div>
</div>
