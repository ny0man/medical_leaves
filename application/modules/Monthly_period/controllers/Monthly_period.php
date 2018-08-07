<?php

class Monthly_period extends MY_Controller {
	
	var $nama_menu = 'Monthly Period';
	var $nama_controller = 'Monthly_period';
	var $nama_tabel = 'monthly_period';
	var $primary_tabel = 'monthlyPeriodId';

	public function __construct() {			
		parent::__construct();
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
			$result['monthlyPeriodStart'] = date("d M Y", strtotime($data[0]['monthlyPeriodStart']));
			$result['monthlyPeriodEnd'] = date("d M Y", strtotime($data[0]['monthlyPeriodEnd']));			
		}
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('monthlyPeriodNama', 'Nama periode', 'required');
		$this->form_validation->set_rules('monthlyPeriodStart', 'Tanggal mulai', 'required');
		$this->form_validation->set_rules('monthlyPeriodEnd', 'Tanggal selesai', 'required');
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
		$parameter = array(
			'monthlyPeriodNama' => $this->input->post('monthlyPeriodNama'),
			'monthlyPeriodStart' => date("Y-m-d", strtotime($this->input->post('monthlyPeriodStart'))),
			'monthlyPeriodEnd' => date("Y-m-d", strtotime($this->input->post('monthlyPeriodEnd'))),
			'monthlyPeriodStatus' => (isset($_POST['monthlyPeriodStatus'])?'1':'0') 
		);

		$this->db->trans_start();
		if(isset($_POST['monthlyPeriodStatus'])){
			$this->db->set('monthlyPeriodStatus','0');
			$this->db->update('monthly_period');
		}

		if($this->input->post('aksi') == 'add'){
			$db_result = $this->db->insert($this->nama_tabel,$parameter);
		}else if($this->input->post('aksi') == 'edit'){
			$this->db->set($parameter);
			$this->db->where($this->primary_tabel,$this->input->post('id'));
			$db_result = $this->db->update($this->nama_tabel);
		}
		$this->db->trans_complete();

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);
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
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);
		}

		echo json_encode($result);

	}	
}