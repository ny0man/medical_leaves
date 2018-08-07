<?php

class Leave_type extends MY_Controller {
	
	var $nama_menu = 'Type of leave';
	var $nama_controller = 'Leave_type';
	var $nama_tabel = 'leave_type';
	var $primary_tabel = 'lvTypId';

	public function __construct() {			
		parent::__construct();
    }

	public function index()
	{	
		$data = $this->db->get($this->nama_tabel)->result_array();
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
		}
		$result['data'] = $data;
		$this->load->view('index',$result); 			
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$data = $this->db->get_where($this->nama_tabel,
				array($this->primary_tabel => $this->input->post('id'))
			)->result_array();
			$result = $data[0];
			$result['lvMaxPerYear'] = $this->formatNumber($result['lvMaxPerYear']);
			$result['lvMaxPerMonth'] = $this->formatNumber($result['lvMaxPerMonth']);
		}
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('lvTypNama', 'Type of leave', 'required');
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
			'lvTypNama' => $this->input->post('lvTypNama'),
			'lvDayType' => $this->input->post('lvDayType'),
			'lvMaxPerYear' => $this->input->post('lvMaxPerYear'),
			'lvMaxPerMonth' => $this->input->post('lvMaxPerMonth'),
			'lvGender' => $this->input->post('lvGender'),
			'lvMinLSA' => $this->input->post('lvMinLSA')
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

	protected function formatNumber($num){
		// check integer
		$int = (int)$num;
		if($int == $num){
			$num = $int;
		}
		return !empty($num) ? $num : '';
	}
	
}