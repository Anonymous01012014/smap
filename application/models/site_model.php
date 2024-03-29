<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : Site
 * 
 * Description :
 * This class contains functions to deal with the site table (Add , Edit , Delete)
 * 
 * Created date ; 11-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Mohanad Kaleia
 * contact : ms.kaleia@gmail.com
 */    

class Site_model extends CI_Model{
	/** Site class variables **/
	
	//The id field of the site
	var $id;
	
	//The name of the site
	var $name = "";

	//the latitude of the site's location.
	var $latitude = "";
	
	//te longitude of the site's location.
	var $longitude = "";
	


	/**
     * Constructor
	 **/	
	function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Class functions
	 **/
    
    
	
	/**
	 * function name : getAllSites
	 * 
	 * Description : 
	 * Returns the data of all of the sites in the database.
	 * 
	 * Created date : 2-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getAllSites(){
		$query = "SELECT site.ID  , site.Site_Name , site.Site_Longitude , site.Site_Latitude ,  scheduler.DateTime , schedulerStatusCard.schedulerStatus 
					FROM site, scheduler ,schedulerStatusCard
					WHERE 						
						site.id = scheduler.SiteID
					AND
						schedulerStatusCard.ID = scheduler.status
					AND 
						scheduler.guid = (SELECT MAX(guid) FROM scheduler WHERE SiteID = site.id)						
					order by site.Site_Name asc							  
				  ";
				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getSitebyId
	 * 
	 * Description : 
	 * Returns the data of a site by spesifiied id and its last status
	 * 
	 * Created date : 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getSitebyId(){
		$query = "SELECT site.ID  , site.Site_Name , site.Site_Longitude , site.Site_Latitude ,  scheduler.DateTime , schedulerStatusCard.schedulerStatus 
					FROM site, scheduler ,schedulerStatusCard
					WHERE 
						site.id = {$this->id}
					AND 
						site.id = scheduler.SiteID
					AND
						schedulerStatusCard.ID = scheduler.status
					AND 
						scheduler.guid = (SELECT MAX(guid) FROM scheduler WHERE SiteID = {$this->id})			  
				  ";	
				  
				  			  
		$query = $this->db->query($query);
		return $query->result_array();
	 }		
	 



	 	 	
}
