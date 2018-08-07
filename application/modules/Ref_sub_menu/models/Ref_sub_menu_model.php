<?php

class Ref_sub_menu_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();		
	}

	public function list_menu(){
		$result = array();
		$list = $this->db->get('ref_menu')->result_array();
		if(count($list) > 0){
			foreach ($list as $key => $value) {
				$result[$value['refMenuId']] = $value['refMenuNama'];
			}
		}
		return $result;
	}

	public function list_controller(){
		$result = array();
		$list = $this->db->get('ref_controller')->result_array();
		if(count($list) > 0){
			foreach ($list as $key => $value) {
				$result[$value['refControllerId']] = $value['refControllerNama'];
			}
		}
		return $result;
	}
	
}