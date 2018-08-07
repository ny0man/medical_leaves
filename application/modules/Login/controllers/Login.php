<?php

class Login extends CI_Controller {
	
	public function __construct() {			
		parent::__construct();
    	$this->load->database();
    	$this->load->library('Data_process_library');
    }

	public function index()
	{	
		$result['body_class'] = 'login-page';
		$this->load->view('Layout/dashboard/head',$result);
		$this->load->view('index'); 	
		$this->load->view('Layout/dashboard/footer');		
	}	

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
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

	public function cek(){
		if($this->validasi_field() !== true){
			echo $this->validasi_field();
			return false;
		}

		$data_user = $this->db->get_where('ref_user',
			array(
				'refUserNama' => $this->input->post('username')
			)
		)->result_array();

		if(isset($data_user[0])){
			$input_pasword = $this->data_process_library->encrypt_api($this->input->post('password'));
			if($input_pasword != $data_user[0]['refUserPassword']){
				$result['status'] = false;
				$result['message'] = 'Username atau password yang anda masukkan salah';
			}else{
				$result['status'] = true;

				$this->session->set_userdata(
					array(
						'refUserSessionActive' => $this->data_process_library->encrypt_api(date('YmdHis')),
					)
				);

				$this->db->set('refUserSessionActive',$this->session->userdata('refUserSessionActive'));
				$this->db->where('refUserNama',$this->input->post('username'));
				$this->db->update('ref_user');

				#cek di tabel employee, ada data nya ga? kalau ada masukin ke session juga, biar asyik
				$data_pegawai = $this->db->get_where('employee',
					array(
						'empEmail' => $this->input->post('username')
					)
				)->result_array();
				
				$empId = (isset($data_pegawai[0]['empId'])?$data_pegawai[0]['empId']:'');
				$empNo = (isset($data_pegawai[0]['empNo'])?$data_pegawai[0]['empNo']:'');
				$empNoFormatted = (isset($data_pegawai[0]['empNoFormatted'])?$data_pegawai[0]['empNoFormatted']:'');

				#set session	
				$this->session->set_userdata(
					array(
						'refUserId' => $data_user[0]['refUserId'],
						'refUserNama' => $data_user[0]['refUserNama'],
						'refUserNamaAsli' => $data_user[0]['refUserNamaAsli'],
						'refGroupId' => $data_user[0]['refGroupId'],
						'empId' => $empId,
						'empNo' => $empNo,
						'empNoFormatted' => $empNoFormatted,
					)
				);	
			}
		}else{
			$result['status'] = false;
			$result['message'] = 'Username atau password yang anda masukkan salah';
		}

		echo json_encode($result);

	}

	public function logout(){
		$this->session->sess_destroy();
		header('Location: '.site_url('Login'));
		exit;
	}
}