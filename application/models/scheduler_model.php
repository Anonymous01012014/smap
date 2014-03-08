<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : Schduler
 * 
 * Description :
 * This class contains functions to deal with the schduler table (Add , Edit , Delete)
 * 
 * Created date ; 7-3-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Eng. Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    

class Schduler_model extends CI_Model{
	/** Schduler class variables **/
	
	//this record id
	$id="";
	
	//the id of the site for this record
	$site_id="";
	
	//the date and time of this record's data
	$date="";
	
	//current connection status for this site in this record
	$status="";
	
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
	 * function name : getOneYearInfoBySiteId
	 * 
	 * Description : 
	 * Returns the data of all of the sites in the database.
	 * 
	 * Created date : 8-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Eng. Ahmad Mulhem Barakat
	 * contact : molham225@gamil.com
	 */
	 public function getOneYearInfoBySiteId(){
		$query = "SELECT CONVERT(varchar,sc.DateTime,101) AS date,
						 st.SchedulerStatus AS sc_status ,
						 sc.Status AS status_id ,
						 count(Status) AS count
				  From Scheduler AS sc,SchedulerStatusCard AS st
				  WHERE DateTime > DATEADD(year,-1,GETDATE()) 
				  AND sc.SiteID = {$this->site_id}
				  AND sc.Status = st.ID
				  GROUP BY CONVERT(varchar,sc.DateTime,101),
						   sc.Status,
						   st.SchedulerStatus
				  ORDER BY date asc;";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	
	
}
