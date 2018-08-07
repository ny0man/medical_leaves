<?php

class Employee extends MY_Controller {
	
	var $nama_menu = 'Employee';
	var $nama_controller = 'Employee';
	var $nama_tabel = 'employee';
	var $primary_tabel = 'empId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Employee_model');
		$this->load->library('Data_process_library');
    }

	public function index()
	{	
		$result['data'] = $this->db->get($this->nama_tabel)->result_array();
		$this->load->view('index',$result); 			
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$data = $this->db->get_where($this->nama_tabel,
				array($this->primary_tabel => $this->input->post('id'))
			)->result_array();
			$result = $data[0];
			$result['empJoinedDate'] = date("d M Y", strtotime($result['empJoinedDate']));
			$result['empBirthday'] = date("d M Y", strtotime($result['empBirthday']));
		
			$peg_det = $this->Employee_model->get_data_pegawai_det(
				array('id' => $this->input->post('id'))
			);

			$result = array_merge($result,$peg_det);

			
		}
		
		$result['list_office'] = $this->Employee_model->list_office();
		$result['job_status'] = $this->Employee_model->job_status();
		$result['marriage_status'] = $this->Employee_model->marriage_status();

		$this->db->where('staffRelId != 1');
		$result['staff_relation'] = $this->db->get('staff_relation')->result_array();
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$list_staff_relation = $this->Employee_model->list_staff_relation();
		$this->form_validation->set_error_delimiters('', '|');
		
		if($_POST['aksi'] == 'add'){
			$this->form_validation->set_rules('empNo', 'Employee no', 'required');	
		}

		$this->form_validation->set_rules('empNama', 'Name', 'required');
		
		if($_POST['aksi'] == 'add'){
			$this->form_validation->set_rules('empEmail', 'Email', 'required|valid_email|is_unique[ref_user.refUserNama]',
				array('is_unique' => 'Email has been registered as an active user')
			);	
		}
		
		$this->form_validation->set_rules('empBirthday', 'Birthday', 'required');
		$this->form_validation->set_rules('empJoinedDate', 'Join date', 'required');
		$this->form_validation->set_rules('empOfficeId', 'Location', 'required');
		$this->form_validation->set_rules('empJobStId', 'Employee status', 'required');

		if($_POST['empJobStId'] == '2'){
			$this->form_validation->set_rules('empPeriod', 'LSA period', 'required|numeric');
		}
		

		$this->form_validation->set_rules('empGender', 'Sex', 'required');
		$this->form_validation->set_rules('empMrgSt', 'Marital status', 'required');
		$this->form_validation->set_rules('empStatus', 'Record status', 'required');

		#pengisian data keluarga, bila nama diisi, maka field lain wajib diisi
		foreach($this->input->post('empDetNama') as $id_relasi  => $value){
			if($_POST['empDetNama'][$id_relasi] != ''){
				$this->form_validation->set_rules('empDetBirthDate['.$id_relasi.']', $list_staff_relation[$id_relasi].' birthhday', 'required');
			}
		}

		$this->form_validation->run();
		$pesanError = validation_errors();
		if(validation_errors()){
			$result['status'] = false;
			$message = explode('|',validation_errors());
			$result['message'] = $message[0];
			return json_encode($result);
		}
		return true;
	}

	public function simpan(){
		if($this->validasi_field() !== true){
			echo $this->validasi_field();
			return false;
		}
		$db_result = 0;
		$join_date = date("Y-m-d", strtotime($this->input->post('empJoinedDate')));
		$emp_birthday = date("Y-m-d", strtotime($this->input->post('empBirthday')));
		$parameter = array(
			'empEmail' => $this->input->post('empEmail'),
			'empNo' => $this->input->post('empNo'),
			'empNoFormatted' => '00'.$this->input->post('empNo'),
			'empNama' => $this->input->post('empNama'),
			'empJoinedDate' => $join_date,
			'empBirthday' => $emp_birthday,
			'empOfficeId' => $this->input->post('empOfficeId'),
			'empJobStId' => $this->input->post('empJobStId'),
			'empGender' => $this->input->post('empGender'),
			'empPeriod' => $this->input->post('empPeriod'),
			'empMrgSt' => $this->input->post('empMrgSt'),
			'empStatus' => $this->input->post('empStatus')

		);
		
		$this->db->trans_start();

		if($this->input->post('aksi') == 'add'){
			$db_result = $this->db->insert($this->nama_tabel,$parameter);
			$insert_id = $this->db->insert_id();
			#insert detail
			foreach($this->input->post('empDetNama') as $id_relasi  => $value){
				#Kalau nama relasi diisi, maka data diinputkan
				if($_POST['empDetNama'][$id_relasi] != ''){
					if($db_result == '1'){

						if($this->input->post('empStatus') == '0'){
							$_POST['empDetStatus'][$id_relasi] = '0';
						}

						$birth_date = date("Y-m-d", strtotime($_POST['empDetBirthDate'][$id_relasi]));
						$db_result = $this->db->insert(
							'employee_det',
							array(
								'empMasterId' => $insert_id,
								'empDetNo' => $this->input->post('empNo'),
								'empDetSuffixNo' => $_POST['staffRelEmpSubNo'][$id_relasi],
								'empDetNama' => $_POST['empDetNama'][$id_relasi],
								'empDetBirthDate' => $birth_date,
								'empDetStaffRelId' => $id_relasi,
								'empDetGender' => $_POST['empDetGender'][$id_relasi],
								'empDetMrgSt' => $_POST['empDetMrgSt'][$id_relasi],
								'empDetStatus' => $_POST['empDetStatus'][$id_relasi]
							)
						);
					}else{
						break;
					}
					
				}
			}

			#insert ref user
			if($db_result == '1'){
				$db_result = $this->db->insert('ref_user',
					array(
						'refUserNama' => $this->input->post('empEmail'),
						'refUserNamaAsli' => $this->input->post('empNama'),
						'refUserPassword' => $this->data_process_library->encrypt_api($this->input->post('empEmail')),
						'refGroupId' => '99',#99 adalah group pegawai
					)
				);
			}
		}else if($this->input->post('aksi') == 'edit'){
			$parameter = array(
				'empNama' => $this->input->post('empNama'),
				'empJoinedDate' => $join_date,
				'empBirthday' => $emp_birthday,
				'empOfficeId' => $this->input->post('empOfficeId'),
				'empJobStId' => $this->input->post('empJobStId'),
				'empGender' => $this->input->post('empGender'),
				'empPeriod' => $this->input->post('empPeriod'),
				'empMrgSt' => $this->input->post('empMrgSt'),
				'empStatus' => $this->input->post('empStatus')

			);

			$this->db->set($parameter);
			$this->db->where($this->primary_tabel,$this->input->post('id'));
			$db_result = $this->db->update($this->nama_tabel);

			#update detail
			foreach($this->input->post('empDetNama') as $id_relasi  => $value){
				#Kalau nama relasi diisi, maka data diinputkan
				if($_POST['empDetNama'][$id_relasi] != ''){
					if($db_result == '1'){
						$birth_date = date("Y-m-d", strtotime($_POST['empDetBirthDate'][$id_relasi]));
						
						if($this->input->post('empStatus') == '0'){
							$_POST['empDetStatus'][$id_relasi] = '0';
						}

						$this->db->set(
							array(
								'empDetNo' => $this->input->post('empNo'),
								'empDetSuffixNo' => $_POST['staffRelEmpSubNo'][$id_relasi],
								'empDetNama' => $_POST['empDetNama'][$id_relasi],
								'empDetBirthDate' => $birth_date,
								'empDetStaffRelId' => $id_relasi,
								'empDetGender' => $_POST['empDetGender'][$id_relasi],
								'empDetMrgSt' => $_POST['empDetMrgSt'][$id_relasi],
								'empDetStatus' => $_POST['empDetStatus'][$id_relasi]
							)
						);
						$this->db->where('empMasterId',$this->input->post('id'));
						$this->db->where('empDetStaffRelId',$id_relasi);
						$db_result = $this->db->update('employee_det');						
					}else{
						break;
					}
					
				}
			}
		}

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);;
		}

		$this->db->trans_complete();
		echo json_encode($result);
	}

	public function delete(){
		$data_employee = $this->db->get_where('employee',
			array('empId' => $this->input->post('id'))
		)->result_array();
	
		$email = $data_employee[0]['empEmail'];
		$this->db->trans_start();

		$this->db->where($this->primary_tabel,$this->input->post('id'));
		$db_result = $this->db->delete($this->nama_tabel);
		if($db_result == '1'){
			
			$db_result = $this->db->delete('ref_user',
				array(
					'refUserNama' => $email
				)
			);
		}
		
		if($db_result == '1'){
			$result['url'] = site_url($this->nama_controller);
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);;
		}

		$this->db->trans_complete();

		echo json_encode($result);

	}	
}