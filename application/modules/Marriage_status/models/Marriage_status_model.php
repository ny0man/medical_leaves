<?php

class Marriage_status_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
	}

	public function list_benefit () {
		$result = array();
		$list_benefit = $this->db->get('outpatient_benefit')->result_array();
		foreach($list_benefit as $key => $value){
			$start = date("d M Y", strtotime($value['outBenStart']));
			$end = date("d M Y", strtotime($value['outBenEnd']));
			$result[$value['outBenId']] = $value['outBenNama'].' period '.$start.' - '.$end;
		}
		return $result;
	}
	
}