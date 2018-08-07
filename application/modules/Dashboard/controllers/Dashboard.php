<?php

class Dashboard extends MY_Controller {
	
	public function __construct() {			
		parent::__construct();
    	$this->load->model('Dashboard_model');
    	$this->load->library('Data_process_library');
    }

	public function index()
	{	
		$cek_default_password = $this->cek_default_password();
		if($cek_default_password === true){
			return $this->form_edit_password();
		}

		$result['menu'] = $this->Dashboard_model->get_menu(
			array(
				$this->session->userdata('refGroupId')
			)
		);

		$result['body_class'] = 'skin-blue sidebar-mini';

		$this->load->view('Layout/dashboard/head',$result);
		$this->load->view('Layout/dashboard/main_header');
		$this->load->view('Layout/dashboard/main_sidebar',$result);  
		$this->load->view('Layout/dashboard/js');
		$this->load->view('index',$result); 	
		$this->load->view('Layout/dashboard/footer');	
	}	

	public function cek_default_password(){
		$data_user = $this->db->get_where('ref_user',
			array(
				'refUserNama' => $this->session->userdata('refUserNama')
			)
		)->result_array();

		$password = $data_user[0]['refUserPassword']; 
		$email = $this->data_process_library->encrypt_api($this->session->userdata('refUserNama'));

		if($password == $email){
			return true;
		}else{
			return false;
		}
	}

	public function form_edit_password(){
		$result = array();
		$result['menu'] = $this->Dashboard_model->get_menu(
			array(
				$this->session->userdata('refGroupId')
			)
		);

		$result['body_class'] = 'skin-blue sidebar-mini';

		$this->load->view('Layout/dashboard/head',$result);
		$this->load->view('Layout/dashboard/main_header');
		$this->load->view('Layout/dashboard/main_sidebar',$result);
		$this->load->view('Layout/dashboard/js');
		$this->load->view('form_edit_password',$result);
		$this->load->view('Layout/dashboard/footer');		
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		
		$this->form_validation->set_rules('refUserPassword', 'Password', 'trim|required|min_length[8]|callback_password_check');
		$this->form_validation->set_rules('confirmPassword', 'Password confirmation', 'trim|required');
		
		$this->form_validation->run();
		$pesanError = validation_errors();
		if(validation_errors()){
			$result['status'] = false;
			$message = explode('|',validation_errors());
			$result['message'] = $message[0];
			return json_encode($result);
		}

		if($this->input->post('refUserPassword') != $this->input->post('confirmPassword')){
			$result['status'] = false;
			$result['message'] = 'Password does not match';
			return json_encode($result);
		}

		return true;
	}

	public function password_check($str)
	{
	   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
	     return TRUE;
	   }
	   $this->form_validation->set_message('password_check', 'Fill <b>Password</b> with alfanumeric combination');
	   return FALSE;
	}

	public function edit_password(){
		if($this->validasi_field() !== true){
			echo $this->validasi_field();
			return false;
		}

		$this->db->where('refUserId',$this->session->userdata('refUserId'));
		$db_result = $this->db->update(
			'ref_user',
			array(
				'refUserPassword' => $this->data_process_library->encrypt_api($this->input->post('refUserPassword'))
			)
		);

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);;
		}

		echo json_encode($result);

		
	}
}