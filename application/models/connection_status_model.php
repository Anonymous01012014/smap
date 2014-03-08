<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : Connectiont_status
 * 
 * Description :
 * This class contains functions to deal with the scheduler status card table (Add , Edit , Delete)
 * 
 * Created date ; 7-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Eng. Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    

class Connectiont_status_model extends CI_Model{
	/** Schduler class variables **/
	//the string representation of the scheduler-site connection status
	var $status = "";
	
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
	 * function name : getStates
	 * 
	 * Description : 
	 * Returns the data of all of the available scheduler states in the database.
	 * 
	 * Created date : 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Eng. Ahmad Mulhem Barakat
	 * contact : molham225@gamil.com
	 */
	 public function getStates(){
		$query = "SELECT SchedulerStatus AS status 
				  FROM SchedulerStatusCard ";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
}
