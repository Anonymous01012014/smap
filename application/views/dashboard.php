<!-- load scripts -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDczDfEHTE-O8noyduCL0zC1MDmVx_cJLU&sensor=false"></script>
<script src="<?php echo base_url();?>js/site.js"></script>
<script>
	var site = "Oklahome";
	var lat = 35.47278;
	var long = -98.75722;
	var url = "<?php echo base_url()."dashboard/ajaxGetSiteInfo";?>";
	var sites = jQuery.parseJSON(<?php echo $json_sites;?>);
	google.maps.event.addDomListener(window, 'load', initialize);
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
		        				
    							getSiteInfo(url , site_id);    							    							    							
    						}); 
	        		});
			        
			        
			    </script>
				<select  name="site_name" id="site_name">
					<option value="----"></option>
					<?php 
						foreach ($sites as $site) 
						{
					?>
							<option value="<?php echo $site['id'];?>" onclick="alert('<?php $site['id'];?>');"><?php echo $site['name'];?></option>		
					<?php	
						}						
					?>						
				</select>	
				
				<br/>
				
				<table class="table table-striped" style="margin-top:10px;">
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

<div id="container" class="col-md-10 col-md-offset-1" style="height:300px;">
	
</div>