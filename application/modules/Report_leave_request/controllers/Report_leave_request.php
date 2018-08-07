<?php

class Report_leave_request extends MY_Controller {
	
	var $nama_menu = 'Report Leave Request';
	var $nama_controller = 'Report_leave_request';
	var $nama_tabel = 'leave_request';
	var $primary_tabel = 'lvreqId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Report_leave_request_model', 'data');
    }

	public function index()
	{	
		$post = $this->input->post();
		$tanggalAwal = $this->input->post('tanggal_awal');
		$tanggalAkhir = $this->input->post('tanggal_akhir');
		$empNo = $this->input->post('empNo');
		$empNama = $this->input->post('empNama');
		
		if(!isset($post['tanggal_awal'])){
			$tanggalAwal = $this->session->userdata('report_leave_tanggal_awal');
			$tanggalAkhir = $this->session->userdata('report_leave_tanggal_akhir');
			$empNo = $this->session->userdata('report_leave_empNo');
			$empNama = $this->session->userdata('report_leave_empNama');
		}
		
		if(!empty($tanggalAwal) and !empty($tanggalAkhir)){
			$result['data'] = $this->data->get_leaves_request($tanggalAwal, $tanggalAkhir, $empNo, $empNama);
			$result['tanggalAwal'] = $tanggalAwal;
			$result['tanggalAkhir'] = $tanggalAkhir;
			$result['empNo'] = $empNo;
			$result['empNama'] = $empNama;
			$this->session->set_userdata('report_leave_tanggal_awal', $tanggalAwal);
			$this->session->set_userdata('report_leave_tanggal_akhir', $tanggalAkhir);
			$this->session->set_userdata('report_leave_empNo', $empNo);
			$this->session->set_userdata('report_leave_empNama', $empNama);
		}else{
			$result['data'] = array();
		}
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