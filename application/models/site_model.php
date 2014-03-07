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
		$query = "SELECT * 
				  FROM site";
				  
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
		$query = "SELECT site.id AS id, status.response_date, status.check_date, status.signal, site.latitude, site.longitude
					FROM site, status
					WHERE 
						site.id = {$this->id}
					AND 
						site.id = status.site_id
					AND 
						status.id = (SELECT MAX(id) FROM status WHERE site_id = {$this->id})			  
				  ";				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }		
	 
	
	
	/**
	 * function name : getSiteStatusForYear
	 * 
	 * Description : 
	 * Returns the status of a site for one year of successfule and unsuccessful access
	 * 
	 * Created date : 4-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getSiteStatusForYear(){
		$query = "select * from
					site, status
					where
					site.id = 3
					and
					site.id = status.site_id
					and 
					status.check_date > = DATE_ADD(CURDATE() , INTERVAL - 1 YEAR)
					and 
					status.check_date < = CURDATE();
								  
				  ";				  
		$query = $this->db->query($query);
		return $query->result_array();
	 } 
	 	 	
}
