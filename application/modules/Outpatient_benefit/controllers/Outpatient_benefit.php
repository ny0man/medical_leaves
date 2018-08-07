<?php

class Outpatient_benefit extends MY_Controller {
	
	var $nama_menu = 'Outpatient Benefit';
	var $nama_controller = 'Outpatient_benefit';
	var $nama_tabel = 'outpatient_benefit';
	var $primary_tabel = 'outBenId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Outpatient_benefit_model');
    }

	public function index()
	{	
		$this->db->order_by('outBenStart','DESC');
		$this->db->order_by('outBenNama','ASC');
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
			$result['outBenStart'] = date("d M Y", strtotime($data[0]['outBenStart']));
			$result['outBenEnd'] = date("d M Y", strtotime($data[0]['outBenEnd']));	
		}

		$result['marriage_status'] = $this->Outpatient_benefit_model->marriage_status();
		
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('outBenNama', 'Outpatient Benefit', 'required');
		$this->form_validation->set_rules('outBenNominal', 'Nominal', 'required');
		$this->form_validation->set_rules('outBenStart', 'Period start', 'required');
		$this->form_validation->set_rules('outBenEnd', 'Period end', 'required');
		$this->form_validation->set_rules('outBenLsaMonth', 'LSA minimum month', 'numeric');
		$this->form_validation->set_rules('outBenMaxClaimCount', 'Max claim count', 'numeric');
		
		
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
		$nominal = str_replace(',00', '', $this->input->post('outBenNominal'));
		$nominal = str_replace('.', '', $nominal);
		$parameter = array(
			'outBenNama' => $this->input->post('outBenNama'),
			'outBenNominal' => $nominal,
			'outBenMaritalStatus' => $this->input->post('outBenMaritalStatus'),
			'outBenEndBalLabel' => $this->input->post('outBenEndBalLabel'),
			'outBenLsaMonth' => $this->input->post('outBenLsaMonth'),
			'outBenMaxClaimCount' => $this->input->post('outBenMaxClaimCount'),
			'outBenSetEmpty' => $this->input->post('outBenSetEmpty'),
			'outBenStart' => date("Y-m-d", strtotime($this->input->post('outBenStart'))),
			'outBenEnd' => date("Y-m-d", strtotime($this->input->post('outBenEnd')))
		);
		if($this->input->post('aksi') == 'add'){
			$db_result = $this->db->insert($this->nama_tabel,$parameter);
		}else if($this->input->post('aksi') == 'edit'){
			$this->db->set($parameter);
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
}