<?php

class Leave_request_approval_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function get_leaves_request () {
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	leave_request.*,
	empNoFormatted,
	empNama
FROM `leave_request`
JOIN employee ON empId = lvreqEmpId
WHERE empParentId = '$empId'
	AND lvreqSubmitStatus = '1'
ORDER BY lvreqApproveStatus, lvreqTanggalAwal DESC
		";
		$result = $this->db->query($sql);
		$return = array();
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row) $return[] = $row;
			}
			$result->free_result();
		}
		return $return;
	}

	public function get_request_detail ($id) {
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT
	*,
	(jatah_hari - ambil_hari) AS `sisa_hari`,
	(jatah_jam - ambil_jam) AS `sisa_jam`
FROM
(
SELECT 
	*,
	IF(empLvMaxPerMonth > 0, empLvMaxPerMonth * 12, empLvMaxPerYear) AS `jatah_hari`,
	(IF(empLvMaxPerMonth > 0, empLvMaxPerMonth * 12, empLvMaxPerYear) * 24) AS `jatah_jam`,
	lvreqJumlah AS `ambil_hari`,
	(lvreqJumlah * 24) AS `ambil_jam`
FROM `leave_request`
JOIN employee ON empId = lvreqEmpId
JOIN employee_leave ON empId = empLvEmpId
	AND empYear = YEAR(NOW())
	AND empLvTypNama = lvreqLvNama
LEFT JOIN office_location ON officeLocId = empOfficeId
WHERE empParentId = '$empId'
	AND lvreqId = '$id'
	AND lvreqSubmitStatus = '1'
) t
		";
		$result = $this->db->query($sql);
		$return = array();
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row){
					if($row['lvreqApproveStatus'] == 1)$row['status_approval'] = 'Approved';
					elseif($row['lvreqApproveStatus'] == 2)$row['status_approval'] = 'Rejected';
					else $row['status_approval'] = 'Not Yet';
					$return[] = $row;
				}
			}
			$result->free_result();
		}

		return $return;
	}

	public function calculate_days($tanggalAwal, $tanggalAkhir){
		$return = array();
		$start    = new DateTime($tanggalAwal); 
		$end      = new DateTime($tanggalAkhir); 
		$diff = $start->diff($end); 
		$return['total'] = $diff->format('%d') + 1;
		$return['days_off'] = 0;
		
		if($start > $end){
			$a = $end;
			$end = $start;
			$start = $a;
		}
		$sql = "
SELECT 
	COUNT(DISTINCT dayOffTanggal) AS num
FROM `day_off`
WHERE dayOffTanggal >= '" . $start->format('Y-m-d') . "'
	AND dayOffTanggal <= '" . $end->format('Y-m-d') . "'
		";
		
		$result = $this->db->query($sql);
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row) $return['days_off'] = $row['num'];
			}
			$result->free_result();
		}
		
		return $return;
	}
	
	public function update_employee_leave($param = array()) {
		$lock = isset($param['lock']) ? (int)$param['lock'] : '0';
		$id = isset($param['id']) ? (int)$param['id'] : '0';
		$note = isset($param['note']) ? $param['note'] : '';
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	empId,
	lvreqJumlah
FROM `leave_request` 
JOIN employee ON empId = lvreqEmpId
WHERE empParentId = '$empId'
	AND lvreqId = '$id'
	AND lvreqSubmitStatus = '1'
	AND IFNULL(NULLIF(lvreqApproveStatus, ''), 0) = 0
		";
		$result = $this->db->query($sql);
		if(is_object($result)){
			if($result->num_rows() > 0){
				// data found, do nothing
				$data = $result->result_array();
				$leaveEmpId = $data[0]['empId'];
				$jumlah = $data[0]['lvreqJumlah'];
			}else{
				return array('msg' => 'Data not found');
			}
			$result->free_result();
		}else{
			return array('msg' => 'Data not found');
		}
		
		$this->db->trans_begin();
		
		++$lock;
		if($lock > 2) $lock = 2;
		
		$sql = "
UPDATE `leave_request` SET 
	`lvreqApproveBy` = '$empId',
	`lvreqApproveStatus` = '$lock',
	`lvreqApproveNote` = '$note',
	`lvreqTanggalApproval` = DATE_FORMAT(NOW(), '%Y-%m-%d')
WHERE lvreqId = '$id'
	AND IFNULL(NULLIF(lvreqApproveStatus, ''), 0) = 0
	AND IFNULL(NULLIF(lvreqSubmitStatus, ''), 0) = 1
		";
		
		$status = $this->db->query($sql);
		
		if($lock == 1){
			// approved, update jatah cuti
			$sql = "
UPDATE `employee_leave` SET 
	`empLvMaxPerYear` = (empLvMaxPerYear - '$jumlah'),
	`empLvMaxPerMonth` = IF(empLvMaxPerMonth > 0, (empLvMaxPerYear - '$jumlah') / 12, empLvMaxPerMonth)
WHERE empLvEmpId = '$leaveEmpId'
	AND empYear = YEAR(NOW())
	AND empLvTypNama = (SELECT lvreqLvNama FROM leave_request WHERE lvreqId = '$id' LIMIT 0,1)
		";
			$status = $status && $this->db->query($sql);
			
			$sql = "
UPDATE employee_leave, `leave_request` SET 
	`lvreqBalanceStart` = (empLvMaxPerYear + '$jumlah'),
	`lvreqBalanceEnd` = empLvMaxPerYear
WHERE lvreqId = '$id'
	AND empLvEmpId = '$leaveEmpId'
	AND empLvTypNama = lvreqLvNama
	AND empYear = YEAR(NOW())
		";
			$status = $status && $this->db->query($sql);
		}
		
		// print_r($this->db->last_query());die;
		$status = $status && $this->db->trans_status();
		// var_dump($status);die;
		
		if(!$status){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return $status;
	}
	
}