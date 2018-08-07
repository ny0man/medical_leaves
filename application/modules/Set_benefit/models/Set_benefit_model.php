<?php

class Set_benefit_model extends CI_Model {

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

	public function employee_det(){
		$result = array();
		$this->db->join('staff_relation', 'staffRelId = empDetStaffRelId');
		$employee_det = $this->db->get_where('employee_det',
			array(
				'empDetStatus' => '1'
			)
		)->result_array();

		if(count($employee_det) > 0){
			foreach ($employee_det as $key => $value) {
				$result[$value['empMasterId']][$value['empDetId']]['empDetMrgSt'] = $value['empDetMrgSt'];
				$result[$value['empMasterId']][$value['empDetId']]['empDetNama'] = $value['empDetNama'];
				$result[$value['empMasterId']][$value['empDetId']]['staffRelNama'] = $value['staffRelNama'];
			}
		}
		
		return $result;
	}

	public function olah_benefit($employee,$employee_det,$benefit){
		$result = array();

		#cari nominal benefit married & single
		$benefit_married = 0;
		$benefit_single = 0;
		foreach($benefit as $benKey => $benVal){
			#single
			if($benVal['outBenMaritalStatus'] == '1'){
				$benefit_single_id = $benVal['outBenId'];
				$benefit_single = $benVal['outBenNominal'];
				$benefit_single_label = $benVal['outBenNama'];
			}
			if($benVal['outBenMaritalStatus'] == '2'){
				$benefit_married_id = $benVal['outBenId'];
				$benefit_married = $benVal['outBenNominal'];
				$benefit_married_label = $benVal['outBenNama'];
			}
		}

		foreach($employee as $employeeId => $employeeVal){
			$family = 0;
			foreach($benefit as $benKey => $benVal){

				$index_array = $employeeId.'-'.$benVal['outBenId'];

				#benefit yang bersifat status marital
				if($benVal['outBenMaritalStatus'] == '1' || $benVal['outBenMaritalStatus'] == '2'){
					#cek, apakah ini adalah benefit married dan sesuai dengan status pernikahan pegawai
					if($benVal['outBenMaritalStatus'] == '2' && $employeeVal['empMrgSt'] == '2'){
						#cek lama bekerja pegawai, apakah < 365?
						if($employeeVal['lama_bekerja'] <= '365'){
							$nominal_prorata = round(($employeeVal['lama_bekerja']/365) * $benVal['outBenNominal']);
							$result[$index_array]['empBenEmpId'] = $employeeId;
							$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
							$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
							$result[$index_array]['empBenNominal'] = $nominal_prorata;

							#kalau lama bekerja kurang dari 6 bulan, tanggungan ga masuk, hitungan prorata
							if($employeeVal['lama_bekerja'] < '180'){
								$result[$index_array]['empBenEmpId'] = $employeeId;
								$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
								$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
								
								$result[$index_array]['empBenDesc'] = 'married, work duration '.$employeeVal['lama_bekerja'].' days. Prorata calculation. Family not included';

								$result[$index_array]['unique_index'] = $index_array;
								
							}
							#kalau lebih dari 6 bulan, tanggungan masuk , hitungan prorata
							else{
								
								
								if(isset($employee_det[$employeeId]) && count($employee_det[$employeeId]) > 0){
									foreach($employee_det[$employeeId] as  $familyId => $empDetVal){
										$index_family = $index_array.'-'.$familyId;
										#kalau family nya single
										if($empDetVal['empDetMrgSt'] == '1'){
											$nominal_prorata_family = $benefit_single;	
											$result[$index_family]['empBenBenId'] = $benefit_single_id;
											$result[$index_family]['empBenLabel'] = $benefit_single_label.' '.$empDetVal['staffRelNama'];

										}
										#kalau family nya married
										else{
											$nominal_prorata_family = $benefit_married;	
											$result[$index_family]['empBenBenId'] = $benefit_married_id;
											$result[$index_family]['empBenLabel'] = $benefit_married_label.' '.$empDetVal['staffRelNama'];
										}

										$result[$index_family]['empBenEmpId'] = $employeeId;

										$result[$index_family]['empBenRelId'] = $familyId;
										$result[$index_family]['empBenParentId'] = $employeeId.'|'.$benVal['outBenId'];
										$result[$index_family]['empBenDesc'] = $empDetVal['empDetNama'];
										$result[$index_family]['empBenNominal'] = $nominal_prorata_family;
										$result[$index_family]['unique_index'] = $index_family;
										$family++;
									}
								}

								
								$result[$index_array]['empBenDesc'] = 'married, work duration '.$employeeVal['lama_bekerja'].' days. Prorata calculation. '.$family.' family included';
							}
						}else{
							#hitungan sudah bukan prorata
							$result[$index_array]['empBenEmpId'] = $employeeId;
							$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
							$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
							$result[$index_array]['empBenNominal'] = $benVal['outBenNominal'];
							$result[$index_array]['unique_index'] = $index_array;

							if(isset($employee_det[$employeeId]) && count($employee_det[$employeeId]) > 0){
								foreach($employee_det[$employeeId] as  $familyId => $empDetVal){
									$index_family = $index_array.'-'.$familyId;
									#kalau family nya single
									if($empDetVal['empDetMrgSt'] == '1'){
										$nominal_prorata_family = $benefit_single;	
										$result[$index_family]['empBenBenId'] = $benefit_single_id;
										$result[$index_family]['empBenLabel'] = $benefit_single_label.' '.$empDetVal['staffRelNama'];

									}
									#kalau family nya married
									else{
										$nominal_prorata_family = $benefit_married;	
										$result[$index_family]['empBenBenId'] = $benefit_married_id;
										$result[$index_family]['empBenLabel'] = $benefit_married_label.' '.$empDetVal['staffRelNama'];
										
									}
									
									$result[$index_family]['empBenEmpId'] = $employeeId;
									
									$result[$index_family]['empBenRelId'] = $familyId;
									$result[$index_family]['empBenParentId'] = $employeeId.'|'.$benVal['outBenId'];
									
									$result[$index_family]['empBenDesc'] = $empDetVal['empDetNama'];
									$result[$index_family]['empBenNominal'] = $nominal_prorata_family;
									$result[$index_family]['unique_index'] = $index_family;
									$family++;
								}
							}

							
							$result[$index_array]['empBenDesc'] = 'married, work duration '.$employeeVal['lama_bekerja'].' days. regular calculation. '.$family.' family included';
						}

					}

					#cek, apakah ini adalah benefit single dan sesuai dengan status pernikahan pegawai
					else if($benVal['outBenMaritalStatus'] == '1' && $employeeVal['empMrgSt'] == '1'){
						#cek lama bekerja pegawai, apakah < 365?
						if($employeeVal['lama_bekerja'] <= '365'){
							$nominal_prorata = round(($employeeVal['lama_bekerja']/365) * $benVal['outBenNominal']);
							$result[$index_array]['empBenNominal'] = $nominal_prorata;
							$result[$index_array]['empBenEmpId'] = $employeeId;
							$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
							$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
							$result[$index_array]['empBenDesc'] = 'single, work duration '.$employeeVal['lama_bekerja'].' days. Prorata calculation.';
							$result[$index_array]['unique_index'] = $index_array;
							
						}else{
							#hitungan sudah bukan prorata
							$result[$index_array]['empBenEmpId'] = $employeeId;
							$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
							$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
							$result[$index_array]['empBenNominal'] = $benVal['outBenNominal'];
							$result[$index_array]['empBenDesc'] = 'single, work duration '.$employeeVal['lama_bekerja'].' days. regular calculation.';
							$result[$index_array]['unique_index'] = $index_array;
						}

					}
				}				

				#Benefit yang bersifat LSA
				else if($benVal['outBenLsaMonth'] != '0' && $employeeVal['empJobStId'] == '2'){
					#kalau lama bekerja pegawai sudah melebihi syarat benefit, maka dia berhak mendapat benefit nya
					$syarat_lama_bekerja = $benVal['outBenLsaMonth'] * 30;
					if($employeeVal['lama_bekerja'] > $syarat_lama_bekerja){
						$result[$index_array]['empBenEmpId'] = $employeeId;
						$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
						$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
						$result[$index_array]['empBenNominal'] = $benVal['outBenNominal'];
						$result[$index_array]['empBenDesc'] = 'LSA, work duration '.$employeeVal['lama_bekerja'].' days. minimum work '.$benVal['outBenLsaMonth'].' months.';
						$result[$index_array]['unique_index'] = $index_array;		
					}
				}

				else{
					
					$result[$index_array]['empBenEmpId'] = $employeeId;
					$result[$index_array]['empBenBenId'] = $benVal['outBenId'];
					$result[$index_array]['empBenLabel'] = $benVal['outBenNama'];
					$result[$index_array]['empBenNominal'] = $benVal['outBenNominal'];
					$result[$index_array]['empBenDesc'] = '';
					$result[$index_array]['unique_index'] = $index_array;
				}
			}
		}

		return $result;
	}	

	public function insert_employee_benefit($arrParam = array()) {
		$sql = "
		INSERT IGNORE INTO `employee_benefit` (
		`empBenEmpId`,
		`empBenBenId`,
		`empBenRelId`,
		`empBenParentId`,
		`empBenLabel`,
		`empBenNominal`,
		`empBenDesc`,
		`unique_index`
		) 
		VALUES
		value_batch

		";

		$string = '';	
		foreach ($arrParam as $key => $value) {
			if($string == ''){
				$string = 
				'(\''.(isset($value['empBenEmpId'])?$value['empBenEmpId']:'')
				.'\',\''.(isset($value['empBenBenId'])?$value['empBenBenId']:'')
				.'\','.(isset($value['empBenRelId'])?$value['empBenRelId']:'NULL')
				.',\''.(isset($value['empBenParentId'])?$value['empBenParentId']:NULL)
				.'\',\''.(isset($value['empBenLabel'])?$value['empBenLabel']:'')
				.'\',\''.(isset($value['empBenNominal'])?$value['empBenNominal']:'')
				.'\',\''.(isset($value['empBenDesc'])?$value['empBenDesc']:NULL)
				.'\',\''.(isset($value['unique_index'])?$value['unique_index']:NULL)
				.'\')';
			}else{
				$string = $string.','.
				'(\''.(isset($value['empBenEmpId'])?$value['empBenEmpId']:'')
				.'\',\''.(isset($value['empBenBenId'])?$value['empBenBenId']:'')
				.'\','.(isset($value['empBenRelId'])?$value['empBenRelId']:'NULL')
				.',\''.(isset($value['empBenParentId'])?$value['empBenParentId']:NULL)
				.'\',\''.(isset($value['empBenLabel'])?$value['empBenLabel']:'')
				.'\',\''.(isset($value['empBenNominal'])?$value['empBenNominal']:'')
				.'\',\''.(isset($value['empBenDesc'])?$value['empBenDesc']:NULL)
				.'\',\''.(isset($value['unique_index'])?$value['unique_index']:NULL)
				.'\')';
			}
		}


		$sql = str_replace('value_batch', $string, $sql);	
		$query = $this->db->query($sql, $arrParam);	
		
		return $query;		
	}
}