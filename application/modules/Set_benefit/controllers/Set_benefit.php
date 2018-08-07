<?php

class Set_benefit extends MY_Controller {
	
	var $nama_menu = 'Set Benefit';
	var $nama_controller = 'Set_benefit';
	var $nama_tabel = 'ref_controller';
	var $primary_tabel = 'refControllerId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Set_benefit_model');
    }

	public function index()
	{	
		$year_start = date('Y');
		$year_end = $year_start + 2;
		$result['tahun_benefit']['pilih'] = 'Choose year of starting benefit';
		for($i =$year_start;$i < $year_end;$i++){
			$result['tahun_benefit'][$i] = $i;
		}
		

		$result['data'] = $this->db->get($this->nama_tabel)->result_array();
		$this->load->view('index',$result); 			
	}

	public function reload_benefit(){
		$result['outpatient_benefit'] = $this->db->get_where('outpatient_benefit',
			array(
				'YEAR(outBenStart)' => $this->input->post('year_selected')
			)
		)->result_array();

		$result['employee'] = $this->db->get_where('employee',
			array(
				'empStatus' => '1'
			)
		)->result_array();

		$this->load->view('reload_benefit',$result);
	}

	public function save_benefit(){
		$employee = $this->Set_benefit_model->employee();

		$employee_det = $this->Set_benefit_model->employee_det();

		$outpatient_benefit = $this->db->get_where('outpatient_benefit',
			array(
				'YEAR(outBenStart)' => $this->input->post('year_selected')
			)
		)->result_array();

		$olah_benefit = $this->Set_benefit_model->olah_benefit($employee,$employee_det,$outpatient_benefit);
		$olah_benefit = array_values($olah_benefit);

		$db_result = $this->Set_benefit_model->insert_employee_benefit($olah_benefit); 

		if($db_result == '1'){
			$result['status'] = 1;
			$result['message'] = 'Success';
		}else{
			$db_error = $this->db->error();

			$result['status'] = 0;
			$result['message'] = 'Failed';
		}

		echo json_encode($result);

	}

	
}