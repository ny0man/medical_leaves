<?php

class Medical_approval_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function list_office () {
		$result = array();
		$result[] = 'Choose office';
		$result['all'] = 'All office';
		$office = $this->db->get('office_location')->result_array();
		if(count($office) > 0){
			foreach ($office as $key => $value) {
				$result[$value['officeLocId']] = $value['officeLocNama'];
			}
		}

		return $result;
	}
	
}