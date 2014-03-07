<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : Status_model
 * 
 * Description :
 * This class contains functions to site's status
 * 
 * Created date ; 2-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    

class Status_model extends CI_Model{
	/** Site class variables **/
	
	//The id field of the site
	var $id;
	
	//The date of response
	var $response_date = "";

	//the the date of check a site
	var $check_date = "";
	
	//te signal
	var $signal = "";
	
	//te signal
	var $result = "";
	


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
	 * function name : getAllStatus
	 * 
	 * Description : 
	 * Returns the data of all of the sites in the database.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	 public function getAllStatus(){
		$query = "SELECT * 
				  FROM status";
				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 

	 	
	 
	   
}
