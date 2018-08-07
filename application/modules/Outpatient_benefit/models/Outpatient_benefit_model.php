<?php

class Outpatient_benefit_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function marriage_status () {
		$result = array();
		$list_benefit = $this->db->get('marriage_status')->result_array();
		$result['all'] = 'All';
		foreach($list_benefit as $key => $value){
			$result[$value['mrgStId']] = $value['mrgStNama'];
		}
		return $result;
	}
	
}