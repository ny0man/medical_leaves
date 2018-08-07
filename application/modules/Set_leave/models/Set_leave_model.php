<?php

class Set_leave_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function employee(){
		$result = array();
		
		$employee_det = $this->db->get_where('employee',
			array(
				'empStatus' => '1'
			)
		)->result_array();

		if(count($employee_det) > 0){
			foreach ($employee_det as $key => $value) {
				$now = time(); // or your date as well
				$empJoinedDate = strtotime($value['empJoinedDate']);
				$datediff = $now - $empJoinedDate;
				$lama_bekerja = round($datediff / (60 * 60 * 24));

				$result[$value['empId']]['empJobStId'] = $value['empJobStId'];
				$result[$value['empId']]['lama_bekerja'] = $lama_bekerja;
				$result[$value['empId']]['empMrgSt'] = $value['empMrgSt'];
				
			}
		}
		return $result;
	}

	public function insert_employee_leave($tahun) {
		$this->db->trans_begin();
		
		$sql = "
DELETE FROM `employee_leave` 
WHERE empYear = '$tahun'
		";
		$status = $this->db->query($sql);	
		
		$sql = "
INSERT INTO `employee_leave` 
(
	`empYear`,
	`empLvEmpId`,
	`empLvTypId`,
	`empLvTypNama`,
	`empLvDayType`,
	`empLvMaxPerYear`,
	`empLvMaxPerMonth`,
	`empLvMaxPerYearInitial`
)
SELECT 
	'$tahun',
	empId,
	lvTypId,
	lvTypNama,
	lvDayType,
	lvMaxPerYear,
	lvMaxPerMonth,
	lvMaxPerYear AS `initial_balance`
FROM (
	SELECT * FROM (
		SELECT
			empId,
			empJoinedDate,
			empGender,
			DATEDIFF(NOW(), empJoinedDate)/365 AS YOS,
			leave_type.*
		FROM `employee`
		LEFT JOIN `leave_type` ON 1=1
	) t
	WHERE IF(lvGender = '', TRUE, empGender = lvGender)
		AND YOS >= lvMinLSA
	ORDER BY empId, lvTypNama, lvMinLSA DESC
) u
GROUP BY empId, lvTypNama
		";
		$status = $status && $this->db->query($sql);	
		
		$status = $status && $this->db->trans_status();
		if(!$status){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		return $status;
	}
}