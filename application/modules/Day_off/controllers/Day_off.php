<?php

class Day_off extends MY_Controller {
	
	var $nama_menu = 'Day Off Calendar';
	var $nama_controller = 'Day_off';
	var $nama_tabel = 'day_off';
	var $primary_tabel = 'dayOffId';

	public function __construct() {			
		parent::__construct();
    }

    public function set_weekend_dates(){
    	$now = strtotime(date('Y-01-01'));
		$end_date = strtotime("+3 years");
		$weekend = array();

		while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
		    $day_index = date("w", $now);
		    if ($day_index == 0 || $day_index == 6) {
		        $weekend[] = date('Y-m-d',$now); 
		    }
		    $now = strtotime(date("Y-m-d", $now) . "+1 day");
		}

		if(isset($weekend[0])){
			$stored_weekend = $this->db->get_where('day_off',array('dayOffTanggal' => $weekend[0]))->result_array();
			if(count($stored_weekend) == '0'){
				foreach($weekend as $value){
					$parameter[] = array(
						'dayOffTanggal' => $value,
						'dayOffKeterangan' => 'weekend'
					);	
				}

				$db_result = $this->db->insert_batch('day_off', $parameter);
				
			}
		}
    }

	public function index()
	{	
		$this->set_weekend_dates();
		$result['data'] = $this->db->get($this->nama_tabel)->result_array();
		$this->load->view('index',$result); 			
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('dayOffTanggal', 'Tanggal', 'required');
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
			'dayOffTanggal' => $this->input->post('dayOffTanggal'),
			'dayOffKeterangan' => $this->input->post('dayOffKeterangan')
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
			$result['message'] = (isset($this->pesan_error[$db_error['code']])?$this->pesan_error[$db_error['code']]:$db_error['code']);
		}

		echo json_encode($result);
	}

	public function reload_tanggal(){
		$result = array();
		$day_off = $this->db->get('day_off')->result_array();
		if(count($day_off) > 0){
			foreach($day_off as $key => $value){
				$result[] = array(
					'title' => 'libur',
					'start' => $value['dayOffTanggal'],
					'description' => ($value['dayOffKeterangan'] != ''?$value['dayOffKeterangan']:'-'),					
				); 
			}
		}
		echo json_encode($result);
	}

	public function delete(){
		$tanggal = $this->input->post('tanggal');
		$this->db->where('dayOffTanggal',$tanggal);
		$db_result =  $this->db->delete('day_off');
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