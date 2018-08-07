<?php

class Set_leave extends MY_Controller {
	
	var $nama_menu = 'Set Leave';
	var $nama_controller = 'Set_leave';
	var $nama_tabel = 'ref_controller';
	var $primary_tabel = 'refControllerId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Set_leave_model');
    }

	public function index()
	{	
		$year_start = date('Y');
		$year_end = $year_start + 2;
		$result['tahun_leave']['pilih'] = 'Choose year';
		for($i =$year_start;$i < $year_end;$i++){
			$result['tahun_leave'][$i] = $i;
		}
		
		// leave type data
		$data = $this->db->get('leave_type')->result_array();
		// formatting
		$refGender = array(
			'M'	=> 'Male',
			'F'	=> 'Female'
		);
		$refDayType = array(
			'W'	=> 'Working Day',
			'C'	=> 'Calendar Day'
		);
		for($i = 0, $m = count($data); $i < $m; ++$i){
			$g = $data[$i]['lvGender'];
			$data[$i]['lvGender'] = !isset($refGender[$g]) ? 'All' : $refGender[$g];
			$g = $data[$i]['lvDayType'];
			$data[$i]['lvDayType'] = !isset($refDayType[$g]) ? '' : $refDayType[$g];
			
			$data[$i]['lvMaxPerYear'] = $this->formatNumber($data[$i]['lvMaxPerYear']);
			$data[$i]['lvMaxPerMonth'] = $this->formatNumber($data[$i]['lvMaxPerMonth']);
			$data[$i]['num'] = $i + 1;
		}
		$result['data'] = $data;
		
		$result['employee'] = $this->db->get_where('employee',
			array(
				'empStatus' => '1'
			)
		)->result_array();

		$this->load->view('index',$result); 			
	}

	public function save_leave(){
		$tahun = (int)$this->input->post('year_selected');
		
		if($tahun > 0){
			$db_result = $this->Set_leave_model->insert_employee_leave($tahun); 

			if($db_result == '1'){
				$result['status'] = 1;
				$result['message'] = 'Success';
			}else{
				$db_error = $this->db->error();

				$result['status'] = 0;
				$result['message'] = 'Failed';
			}
		}else{
			$result['status'] = 0;
			$result['message'] = 'Please select year';
		}

		echo json_encode($result);

	}

	
	protected function formatNumber($num){
		// check integer
		$int = (int)$num;
		if($int == $num){
			$num = $int;
		}
		return !empty($num) ? $num : '';
	}
	
}