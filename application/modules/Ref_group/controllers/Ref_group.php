<?php

class Ref_group extends MY_Controller {
	
	var $nama_menu = 'Ref Group';
	var $nama_controller = 'Ref_group';
	var $nama_tabel = 'ref_group';
	var $primary_tabel = 'refGroupId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Ref_group_model');
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
		}
		$this->load->view('form_crud',$result);
	}

	public function form_akses(){
		$result = array();
		$group_akses = $this->Ref_group_model->get_group_akses();	
		$sub_menu_centang = $this->Ref_group_model->get_data_akses_by_group(
			array($this->input->post('id'))
		);
 		$result = array_merge($result,$group_akses);
 		$result = array_merge($result,$sub_menu_centang);

		$this->load->view('form_akses',$result);
	}

	public function simpan_group_akses(){
		if(count($this->input->post('sub_menu_centang')) > 0){
			$this->db->trans_start();
			$this->db->where('refGroupId',$this->input->post('id'));
			$this->db->delete('ref_akses');

			foreach($_POST['sub_menu_centang'] as $sub_menu_id){
				$this->db->insert('ref_akses',array(
					'refSubMenuId' => $sub_menu_id,
					'refGroupId' => $this->input->post('id')
				));
			}
			$this->db->trans_complete();
		}else{
			$this->db->where('refGroupId',$this->input->post('id'));
			$this->db->delete('ref_akses');
		}
		$result['status'] = 1;
		$result['message'] = 'Success';
		echo json_encode($result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		$this->form_validation->set_rules('refGroupNama', 'Nama', 'required');
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
			'refGroupNama' => $this->input->post('refGroupNama'),
			'refGroupInfo' => $this->input->post('refGroupInfo') 
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