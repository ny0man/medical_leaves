<?php

class Ref_user extends MY_Controller {
	
	var $nama_menu = 'Ref User';
	var $nama_controller = 'Ref_user';
	var $nama_tabel = 'ref_user';
	var $primary_tabel = 'refUserId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Ref_user_model');
		$this->load->library('Data_process_library');
    }

	public function index()
	{	
		$result['data'] = $this->db->get($this->nama_tabel)->result_array();
		$result['list_group'] = $this->Ref_user_model->list_group();
		$this->load->view('index',$result); 			
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$data = $this->db->get_where($this->nama_tabel,
				array($this->primary_tabel => $this->input->post('id'))
			)->result_array();
			$result = $data[0];
		}
		$result['list_group'] = $this->Ref_user_model->list_group();
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		if($this->input->post('aksi') == 'add'){
			$this->form_validation->set_rules('refUserNama', 'Username', 'trim|required|valid_email');
		}
		$this->form_validation->set_rules('refUserNamaAsli', 'Nama lengkap', 'trim|required');		
		$this->form_validation->set_rules('refUserPassword', 'Password', 'trim|required|min_length[8]|callback_password_check');
		$this->form_validation->set_rules('confirmPassword', 'Konfirmasi password', 'trim|required');
		
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

	public function simpan(){
		if($this->validasi_field() !== true){
			echo $this->validasi_field();
			return false;
		}
		$db_result = 0;
		$parameter = array(
			'refUserNama' => $this->input->post('refUserNama'),
			'refUserNamaAsli' => $this->input->post('refUserNamaAsli'),
			'refUserPassword' => $this->data_process_library->encrypt_api($this->input->post('refUserPassword')),
			'refGroupId' => $this->input->post('refGroupId'), 
		);
		if($this->input->post('aksi') == 'add'){
			$db_result = $this->db->insert($this->nama_tabel,$parameter);
		}else if($this->input->post('aksi') == 'edit'){
			$this->db->set(
				array(
					'refUserNamaAsli' => $this->input->post('refUserNamaAsli'),
					'refUserPassword' => $this->data_process_library->encrypt_api($this->input->post('refUserPassword')),
					'refGroupId' => $this->input->post('refGroupId'), 
				));
			$this->db->where($this->primary_tabel,$this->input->post('id'));
			$db_result = $this->db->update($this->nama_tabel);
		}

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

	public function delete(){
		$this->db->where($this->primary_tabel,$this->input->post('id'));
		$db_result = $this->db->delete($this->nama_tabel);
		
		if($db_result == '1'){
			$result['url'] = site_url($this->nama_controller);
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);;
		}

		echo json_encode($result);

	}

	public function password_check($str)
	{
	   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
	     return TRUE;
	   }
	   $this->form_validation->set_message('password_check', 'Fill <b>Password</b> with alfanumeric combination');
	   return FALSE;
	}	
}