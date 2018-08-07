<?php

class Leave_request extends MY_Controller {
	
	var $nama_menu = 'Leave Request';
	var $nama_controller = 'Leave_request';
	var $nama_tabel = 'leave_request';
	var $primary_tabel = 'lvreqId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Leave_request_model', 'data');
    }

	public function index()
	{	
		$this->db->where('lvreqEmpId', $this->session->userdata('empId'));
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
		}
		
		// get emp info
		$result['employee_info'] = $this->data->get_active_employee();
		
		$result['leave_type'] = $this->data->combo_available_leave();
		
		$result['ref_leave_type'] = $this->data->get_ref_available_leave();
		
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('lvTypId', 'Leaves Type', 'required');
		$this->form_validation->set_rules('tanggal_awal', 'Leaves Periode', 'required');
		$this->form_validation->set_rules('tanggal_akhir', 'Leaves Periode', 'required');
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

	public function hitung_days(){
		$tanggalAwal = $this->input->post('tanggal_awal');
		$tanggalAkhir = $this->input->post('tanggal_akhir');
		
		if(!empty($tanggalAwal) and !empty($tanggalAkhir)){
			$db_result = $this->data->calculate_days($tanggalAwal, $tanggalAkhir); 

			if(isset($db_result['total'])){
				$result['status'] = 1;
				$result['message'] = 'Success';
				$result['data'] = $db_result;
			}else{
				$result['status'] = 0;
				$result['message'] = 'Failed to fetch date';
			}
		}else{
			$result['status'] = 0;
			$result['message'] = 'Please set start and end date';
		}

		echo json_encode($result);

	}

	public function simpan(){
		if($this->validasi_field() !== true){
			echo $this->validasi_field();
			return false;
		}
		$db_result = 0;
		
		$post = $this->input->post();
		
		if($this->input->post('aksi') == 'add'){
			$db_result = $this->data->insert_employee_leave($post);
		}else if($this->input->post('aksi') == 'edit'){
			$db_result = $this->data->insert_employee_leave($post);
		}

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

	public function delete(){
		$db_result = $this->data->delete($this->input->post('id'));

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
			$result['url'] = site_url($this->nama_controller);
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