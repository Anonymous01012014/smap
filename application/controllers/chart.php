<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {
	
	/**
	 * Filename: chart.php
	 * Description: 
	 * chart contoller that controls charting operations
	 * 
	 * created date: 8-3-2014
	 * created by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com
	 */
	 
	 
	 
	 /**
	 * Function name: oneYearChart
	 * Description: 
	 * Show site's last year's connection info in a chart
	 * 
	 * Parameters:
	 * site_id: the id of the site this chart is about
	 * 
	 * created date: 8-3-2014
	 * created by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com
	 */
	 public function oneYearChart($site_id){
		 //load models
		 $this->load->model('connection_status_model');
		 $this->load->model('scheduler_model');
		 
		 //get connection states
		 $status_string = $this->connection_status_model->getStates();
		 
		 //get last year's site's states 
		 $this->scheduler_model->site_id = $site_id;
		 $site_states = $this->scheduler_model->getOneYearInfoBySiteId();
		 
		 /** prepare the site's data for charting **/
		 $site = array();
		 //adding series names
		 for($i=0;$i<count($status_string); $i++){
			$serie['name'] = $status_string[$i]['status'];
			$site['series'][] = $serie;
		 }
		 //adding cdates as categories and status counts as data
		 for($i=0;$i<count($site_states);$i++){
			if(isset($site['categories'][count($site['categories']) - 1])){
				$series = & $site['series'];
				$serie = & $series[ $site_states[$i]['status_id'] ];
				if($site['categories'][count($site['categories']) - 1] !== $site_states[$i]['date']){
					for($j=0;$j<count($series);$j++){
						$series[$j]['data'][] = 0;
					}
					$site['categories'][] = $site_states[$i]['date'];
				}
				$serie['data'][count($serie['data']) - 1] = $site_states[$i]['count'];
			}
		 }
		 
		 //add information to the chart view
		 $data['chart_data'] = $site;
		 $this->load->view('chart',$data);
		 //echo var_dump($site);
		 
	 }
}
