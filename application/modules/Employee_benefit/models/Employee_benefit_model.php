<?php

class Employee_benefit_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function get_data ($arrParam) {
		$sql = "
			SELECT 
			  ANY_VALUE(`empBenId`) as empBenId,
			  `empId`,
			  `empNoFormatted`,
			  empNama,
			  SUM(`empBenNominal`) AS 'empBenNominal',
			  YEAR(ANY_VALUE(outBenStart)) AS 'outBenStart' 
			FROM
			  `employee_benefit` 
			  JOIN outpatient_benefit 
			    ON outBenId = empBenBenId 
			  JOIN employee 
			    ON empId = empBenEmpId 
			WHERE YEAR(outBenStart) = ? 
			GROUP BY empBenEmpId 
			";
		$query = $this->db->query($sql, $arrParam);	
		return $query->result_array();
	}

	public function get_data_det ($arrParam) {
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
			WHERE YEAR(outBenStart) = ? 
			  AND empBenEmpId = ?
			";
		$query = $this->db->query($sql, $arrParam);	
		return $query->result_array();
	}

	 
	
}