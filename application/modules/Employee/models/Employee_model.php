<?php

class Employee_model extends CI_Model {

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
		$list_benefit = $this->db->get('office_location')->result_array();
		foreach($list_benefit as $key => $value){
			$result[$value['officeLocId']] = $value['officeLocNama'];
		}
		return $result;
	}

	public function job_status () {
		$result = array();
		$list_benefit = $this->db->get('job_status')->result_array();
		foreach($list_benefit as $key => $value){
			$result[$value['jobStatusId']] = $value['jobStatusNama'];
		}
		return $result;
	}

	public function marriage_status () {
		$result = array();
		$list_benefit = $this->db->get('marriage_status')->result_array();
		foreach($list_benefit as $key => $value){
			$result[$value['mrgStId']] = $value['mrgStNama'];
		}
		return $result;
	}

	public function list_staff_relation () {
		$result = array();
		$this->db->where('staffRelId != 1');
		$list_benefit = $this->db->get('staff_relation')->result_array();
		foreach($list_benefit as $key => $value){
			$result[$value['staffRelId']] = $value['staffRelNama'];
		}
		return $result;
	}

	public function get_data_pegawai_det($params){
		$result = array();
		$peg_det = $this->db->get_where('employee_det',
			array(
				'empMasterId' => $params['id']
			)
		)->result_array();		

		foreach($peg_det as $key_peg_det => $value_peg_det){
			foreach($value_peg_det as $key => $value){
				$result[$key][$value_peg_det['empDetStaffRelId']] = $value;

				if($key == 'empDetBirthDate'){
					$result['empDetBirthDate'][$value_peg_det['empDetStaffRelId']] = date("d M Y", strtotime($value));
				}
				
			}
			
		}

		return $result;
	}
	
}