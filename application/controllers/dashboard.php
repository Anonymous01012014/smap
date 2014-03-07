<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Filename: dashboard.php
	 * Description: 
	 * dashboard contoller that control the dashboard page functions like log
	 * 
	 * created date: 14-2-2014 (-- it's the valantine day :) <3
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	 
	 
	 
	public function index()
	{		
		$this->showDashboard();		
	}
	
	/**
	 * Function name : __construct
	 * Description: 
	 * this contructor is called as this object is initiated.
	 * 
	 * created date: 2-3-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function __construct(){
		parent::__construct();		
	}
	
	
	/**
	 * Function name : showDashboard
	 * Description: 
	 * this function will call dashboard views 
	 * 
	 * created date: 14-2-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function showDashboard()
	{
		//load models
		$this->load->model("site_model");
		$this->load->model("status_model");
		
		$sites = $this->site_model->getAllSites();
		$data["sites"] = $sites; 
			
		print_r($sites);	
				
		//$json_sites = json_encode($sites);
		
		//$data["json_sites"] = $json_sites;  
					
		//call the general views for page structure	
		//$this->load->view('gen/header');

		//$this->load->view('dashboard' , $data);
		
		//$this->load->view('gen/footer');		
	}
	
	
	/**
	 * Function name : ajaxGetSiteInfo
	 * Description: 
	 * this function will return site infromation by passed id
	 * and echo it as json encoded 
	 * 
	 * created date: 4-3-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function ajaxGetSiteInfo($site_id)
	{
		//load models
		$this->load->model("site_model");
		
		$this->site_model->id = $site_id;			
		
		$site = $this->site_model->getSitebyId();
				
		echo json_encode($site);		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
