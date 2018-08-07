<?php

class Ref_sub_menu extends MY_Controller {
	
	var $nama_menu = 'Ref Sub Menu';
	var $nama_controller = 'Ref_sub_menu';
	var $nama_tabel = 'ref_sub_menu';
	var $primary_tabel = 'refSubMenuId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Ref_sub_menu_model');
    }

	public function index()
	{	
		$result['list_menu'] = $this->Ref_sub_menu_model->list_menu();
		$result['list_controller'] = $this->Ref_sub_menu_model->list_controller();
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
		$result['list_menu'] = $this->Ref_sub_menu_model->list_menu();
		$result['list_controller'] = $this->Ref_sub_menu_model->list_controller();
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('refSubMenuNama', 'Nama', 'required');
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
			'refSubMenuNama' => $this->input->post('refSubMenuNama'),
			'refSubMenuInfo' => $this->input->post('refSubMenuInfo'),
			'refMenuId' => $this->input->post('refMenuId'),
			'refControllerId' => $this->input->post('refControllerId'), 
			'refSubMenuUrutan' => $this->input->post('refSubMenuUrutan'), 
			'refSubMenuIcon' => $this->input->post('refSubMenuIcon'), 
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