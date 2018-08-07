<?php

class Employee_benefit extends MY_Controller {
	
	var $nama_menu = 'Employee Benefit';
	var $nama_controller = 'Employee_benefit';
	var $nama_tabel = 'employee_benefit';
	var $primary_tabel = 'empBenId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Employee_benefit_model');
    }

	public function index()
	{	

		$result['year_selected'] = $this->input->post('year');

		$year_start = date('Y');
		$year_end = $year_start + 2;
		$result['tahun_benefit']['pilih'] = 'Choose year of starting benefit';
		for($i =$year_start;$i < $year_end;$i++){
			$result['tahun_benefit'][$i] = $i;
		}
		$this->load->view('index',$result); 			
	}

	public function reload_data(){
		$result['data'] = $this->Employee_benefit_model->get_data(
			array(
				$this->input->post('year_selected')
			)
		);
		$this->load->view('reload_data',$result); 	
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$result['benefit'] = $this->Employee_benefit_model->get_data_det(
				array(
					$this->input->post('year'),
					$this->input->post('id')
				)
			);
			$result['year'] = $this->input->post('year');
			
		}
		
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		foreach($_POST['empBenNominal'] as $key => $value){
			$this->form_validation->set_rules('empBenNominal['.$key.']', 'Nominal', 'required');
		}

		$this->form_validation->run();
		$pesanError = validation_errors();
		if(validation_errors()){
			$result['status'] = false;
			$result['message'] = validation_errors();
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
		
		$this->db->trans_start();
		
		foreach($_POST['empBenNominal'] as $key => $value){
			$nominal = str_replace(',00', '', $value);
			$nominal = str_replace('.', '', $nominal);
			$this->db->set(
				array(
					'empBenNominal' =>$nominal,
					'empBenDesc' =>$_POST['empBenDesc'][$key],
				)
			);
			$this->db->where($this->primary_tabel,$key);
			$db_result = $this->db->update($this->nama_tabel);
			if($db_result == 0){
				break;
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
}