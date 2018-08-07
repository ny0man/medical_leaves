<?php

class Leave_request_approval extends MY_Controller {
	
	var $nama_menu = 'Leave Request Approval';
	var $nama_controller = 'Leave_request_approval';
	var $nama_tabel = 'leave_request';
	var $primary_tabel = 'lvreqId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Leave_request_approval_model', 'data');
    }

	public function index()
	{	
		$result['data'] = $this->data->get_leaves_request();
		$this->load->view('index',$result); 			
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$data = $this->data->get_request_detail($this->input->post('id'));
			$result = $data[0];
		}
		
		$this->load->view('form_crud',$result);
	}

	public function form_detail(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$data = $this->data->get_request_detail($this->input->post('id'));
			$result = $data[0];
		}
		
		$this->load->view('form_detail',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('id', 'Leaves Data', 'required');
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
		
		$post = $this->input->post();
		
		$db_result = $this->data->update_employee_leave($post);

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			if(is_array($db_result)){
				$error = $db_result['msg'];
			}else{
				$db_error = $this->db->error();
				$error = isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code'];
			}

			$result['status'] = 0;
			$result['message'] = $error;
		}

		echo json_encode($result);
	}

}