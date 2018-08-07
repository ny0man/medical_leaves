<?php

class Benefit_claim_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

	public function list_benefit () {
		$sql = "
			SELECT 
			  `empBenId`,
			  `empBenEmpId`,
			  `empBenBenId`,
			  `empBenLabel`,
			  `empBenNominal`,
			  `empBenDesc`,
			  `empNama`,
			  `empNoFormatted` 
			FROM
			  `employee_benefit` 
			  JOIN outpatient_benefit 
			    ON outBenId = empBenBenId 
			  JOIN employee 
			    ON empId = empBenEmpId 
			WHERE (outBenStart <= ? OR ? <= outBenEnd)
			  AND empBenEmpId = ? 
			";
		$query = $this->db->query($sql, array(
			date('Y-m-d'),date('Y-m-d'),
			$this->session->userdata('empId')
		));	
		$data = $query->result_array();
		
		$result = array();
		if(count($data) > 0){
			foreach ($data as $key => $value) {
				$result[$value['empBenId']] = $value['empBenLabel'];
			}
		}

		return $result;
	}		
	
}