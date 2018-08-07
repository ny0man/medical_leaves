<?php

class Leave_request_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
	}

	public function combo_available_leave () {
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	empLvId AS `value`,
	empLvTypNama AS `label`
FROM `employee_leave`
WHERE empLvEmpId = '$empId'
	AND empYear = YEAR(NOW())
		";
		$result = $this->db->query($sql);
		$return = array();
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row) $return[$row['value']] = $row['label'];
			}
			$result->free_result();
		}

		return $return;
	}

	public function get_ref_available_leave () {
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	*
FROM `employee_leave`
WHERE empLvEmpId = '$empId'
	AND empYear = YEAR(NOW())
		";
		$result = $this->db->query($sql);
		$return = array();
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row) $return[$row['empLvTypNama']] = $row;
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
	
	public function get_active_employee(){
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	employee.*,
	office_location.*
	
FROM `employee`
LEFT JOIN office_location ON officeLocId = empOfficeId
WHERE empId = '$empId'
		";
		$result = $this->db->query($sql);
		$return = array();
		if(is_object($result)){
			if($result->num_rows() > 0){
				foreach($result->result_array() as $row) $return[] = $row;
			}
			$result->free_result();
		}

		return isset($return[0]) ? $return[0] : array();
	}

	public function insert_employee_leave($param = array()) {
		$lvTypId = $param['lvTypId'];
		$tanggalAwal = date('Y-m-d', strtotime($param['tanggal_awal']));
		$tanggalAkhir = date('Y-m-d', strtotime($param['tanggal_akhir']));
		$lock = isset($param['lock']) ? (int)$param['lock'] : '0';
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT lvreqId
FROM `leave_request` 
WHERE lvreqEmpId = '$empId'
	AND (
		(
			lvreqTanggalAwal <= '$tanggalAwal'
			AND lvreqTanggalAkhir >= '$tanggalAwal'
		) OR (
			lvreqTanggalAwal <= '$tanggalAkhir'
			AND lvreqTanggalAkhir >= '$tanggalAkhir'
		) OR (
			lvreqTanggalAwal >= '$tanggalAwal'
			AND lvreqTanggalAkhir <= '$tanggalAkhir'
		)
	)
	AND lvreqApproveStatus <> 2
		";
		$result = $this->db->query($sql);
		if(is_object($result)){
			if($result->num_rows() > 0){
				// beririsan
				$data = $result->result_array();
				if(isset($param['id']) and $param['id'] == $data[0]['lvreqId']){
					// edit, do nothing
				}else{
					return array('msg' => 'You have applied for leave for the same period');
				}
			}
			$result->free_result();
		}
		$kode = date('ym').'/'.$this->session->userdata('empId').'/';
		$dayOff = $this->calculate_days($tanggalAwal, $tanggalAkhir);
		$jumlahKalender = $dayOff['total'];
		$jumlah = $dayOff['total'] - $dayOff['days_off'];
		
		$this->db->trans_begin();
		
		if(!isset($param['id']) or (isset($param['id']) and trim($param['id']) == '')){
			$sql = "
INSERT INTO `leave_request` 
(
	`lvreqKode`,
	`lvreqEmpId`,
	`lvreqLvNama`,
	`lvreqApproveStatus`,
	`lvreqTanggalAwal`,
	`lvreqTanggalAkhir`,
	`lvreqJumlah`,
	`lvreqTanggalPengajuan`,
	`lvreqSubmitStatus`
)
VALUES (
	(
	SELECT
		CONCAT('$kode', (IFNULL(urutan, 0) + 1)) AS `kode`
	FROM (
		SELECT 
			MAX(REPLACE(lvreqKode, '$kode', '')) AS `urutan`
		FROM leave_request
		WHERE lvreqEmpId = '$empId'
	) t
	),
	
	'$empId',
	
	(
	SELECT empLvTypNama FROM employee_leave WHERE empLvId = '$lvTypId' LIMIT 0,1
	),
	
	'0',
	'$tanggalAwal',
	'$tanggalAkhir',
	IF((
	SELECT empLvDayType FROM employee_leave WHERE empLvId = '$lvTypId' LIMIT 0,1
	) = 'W', '$jumlah', '$jumlahKalender'),
	DATE_FORMAT(NOW(), '%Y-%m-%d'),
	'$lock'
)
			";
		}else{
			$id = $param['id'];
			$sql = "
UPDATE `leave_request` SET 
	`lvreqLvNama` = (SELECT empLvTypNama FROM employee_leave WHERE empLvId = '$lvTypId' LIMIT 0,1),
	`lvreqApproveStatus` = '0',
	`lvreqTanggalAwal` = '$tanggalAwal',
	`lvreqTanggalAkhir` = '$tanggalAkhir',
	`lvreqJumlah` = IF(
		(
		SELECT empLvDayType FROM employee_leave WHERE empLvId = '$lvTypId' LIMIT 0,1
		) = 'W', '$jumlah', '$jumlahKalender'),
	`lvreqTanggalPengajuan` = DATE_FORMAT(NOW(), '%Y-%m-%d'),
	`lvreqSubmitStatus` = '$lock'
WHERE lvreqEmpId = '$empId'
	AND lvreqId = '$id'
	AND IFNULL(NULLIF(lvreqApproveStatus, ''), 0) = 0
	AND IFNULL(NULLIF(lvreqSubmitStatus, ''), 0) = 0
			";
		}
		
		$status = $this->db->query($sql);	
		
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
	
	public function delete($id) {
		$empId = $this->session->userdata('empId');
		
		$sql = "
SELECT 
	lvreqId,
	IFNULL(NULLIF(lvreqApproveStatus, ''), 0) AS approval,
	IFNULL(NULLIF(lvreqSubmitStatus, ''), 0) AS submitted
FROM `leave_request` 
WHERE lvreqEmpId = '$empId'
	AND lvreqId = '$id'
		";
		$result = $this->db->query($sql);
		if(is_object($result)){
			if($result->num_rows() > 0){
				// beririsan
				$data = $result->result_array();
				$data= $data[0];
				if($data['submitted'] or $data['approval']){
					// edit, do nothing
					return array('msg' => 'Your application has been confirmed');
				}else{
					$sql = "
			DELETE FROM `leave_request` 
			WHERE lvreqEmpId = '$empId'
				AND lvreqId = '$id'
				AND IFNULL(NULLIF(lvreqApproveStatus, ''), 0) = 0
				AND IFNULL(NULLIF(lvreqSubmitStatus, ''), 0) = 0
					";
					$result = $this->db->query($sql);
					return $result;
				}
			}
			$result->free_result();
			return array('msg' => 'Data not found');
		}else{
			return array('msg' => 'Data not found');
		}
		return $status;
	}
	
}