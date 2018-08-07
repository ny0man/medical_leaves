<?php

class Ref_user_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	public function list_group(){
		$result = array();
		$list = $this->db->get('ref_group')->result_array();
		if(count($list) > 0){
			foreach ($list as $key => $value) {
				$result[$value['refGroupId']] = $value['refGroupNama'];
			}
		}
		return $result;
	}
	
}