<?php

class Benefit_claim extends MY_Controller {
	
	var $nama_menu = 'Benefit claim';
	var $nama_controller = 'Benefit_claim';
	var $nama_tabel = 'benefit_claim';
	var $primary_tabel = 'benClmId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Benefit_claim_model');
	}

	public function index()
	{	
		$this->db->order_by('benClmId','DESC');
		$result['data'] = $this->db->get_where($this->nama_tabel)->result_array();
		$this->load->view('index',$result); 			
	}

	public function detail()
	{	
		$this->db->join('benefit_claim','benClmId = benClmDetMasterId');
		$this->db->join('employee_benefit','employee_benefit.empBenId = benClmDetEmpBenId');
		$result['data'] = $this->db->get_where('benefit_claim_det',array(
			'benClmDetMasterId' => $this->input->post('id')
		))->result_array();
		$this->load->view('detail',$result); 			
	}

	public function form_crud()
	{	
		$result['data'] = '';
		if($this->input->post('aksi') == 'edit'){
			$data = $this->db->get_where('benefit_claim_det',
				array('benClmDetMasterId' => $this->input->post('id'))
			)->result_array();
			$result['data'] = json_encode($data);
		}

		$result['list_benefit'] = $this->Benefit_claim_model->list_benefit();		
		$result['kode'] = $this->get_kode();

		$this->load->view('form_crud',$result); 			
	}

	public function get_kode(){
		$template = date('ym').'/'.$this->session->userdata('empId').'/';
		$this->db->where('benClmEmpId',$this->session->userdata('empId'));
		$this->db->like('benClmKode',$template,'after');
		$kode = $this->db->get('benefit_claim')->result_array();
		
		if(count($kode) == '0'){
			$kode = $template.'1';
		}else{
			$kode = $template.(count($kode)+1);
		}
		return $kode;
	}

	public function convert_nominal($nominal){
		$result = str_replace(',00', '', $nominal);
		$result = str_replace('.', '', $result);
		return $result;
	}

	public function cek_saldo($id_benefit = null){
		if($id_benefit == null){
			$id_benefit = $this->input->post('benefit_id');
		}

		$result = array();
		$this->db->join('benefit_claim','benClmDetMasterId = benClmId');
		$this->db->where(
			array(
				'benClmDetEmpBenId' => $id_benefit,
				'benClmApproveStatus' => '1'
			)
		);
		$approved = $this->db->get('benefit_claim_det')->result_array();
		$nominal_approved = (isset($approved[0]['benClmNominal'])?$approved[0]['benClmNominal']:'0');

		$employee_benefit = $this->db->get_where('employee_benefit',
			array(
				'empBenId' => $id_benefit
			)
		)->result_array();
		$saldo = (isset($employee_benefit[0]['empBenNominal'])?$employee_benefit[0]['empBenNominal']:'0');

		$sisa = $saldo - $nominal_approved;
		$result['sisa'] = $sisa;
		$result['employee_benefit'] = $employee_benefit[0];
		return $result;
	}

	public function add_list(){
		$cek_saldo = $this->cek_saldo();
		if($_POST['nominal'] == ''){
			$_POST['nominal'] = 0;
		}
		if($cek_saldo['sisa'] > '0'){
			$result['status'] = true;
			$result['benefit_id'] = $cek_saldo['employee_benefit']['empBenId'];
			$result['benefit_name'] = $cek_saldo['employee_benefit']['empBenLabel'];
			$result['current_balance'] = number_format($cek_saldo['sisa'],0,",",".");
			$result['nominal'] = number_format($this->input->post('nominal'),0,",",".");
			$result['file'] = $this->input->post('file');
		}else{
			$result['status'] = false;
			$result['message'] = 'Not enough balance for '.$cek_saldo['employee_benefit']['empBenLabel'];
		}

		echo json_encode($result);

	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');

		if(isset($_POST['nominal'])){
			foreach($_POST['nominal'] as $id => $value){
				if($value != ''){
					$cek_saldo = $this->cek_saldo($id);
					if($this->convert_nominal($value) > $cek_saldo['sisa']){
						$result['status'] = false;
						$result['message'] = 'Please fill nominal under current balance';
						return json_encode($result);
						break;
					}
				}

				$this->form_validation->set_rules('nominal['.$id.']', 'Nominal', 'required');
			}	
		}else{
			$result['status'] = false;
			$result['message'] = 'Please select benefit';
			return json_encode($result);
		}

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
		
		$this->db->trans_start();
		
		if($this->input->post('aksi') == 'edit'){
			#kalau data sudah ada, update. Kalau data belum ada insert. Kalau data ga ada di list, delete

			$arr_ben_id = array();

			$insert_id = $this->input->post('benClmDetMasterId');
			
			foreach($_POST['nominal'] as $ben_id => $value){
				$parameter_detail = array(
					'benClmNominal' => $this->convert_nominal($value)
				);
					
				#cek, sudaha pernah diinsert belum?
				$benClmDetId = $this->db->get_where('benefit_claim_det',array(
					'benClmDetEmpBenId' => $ben_id,
					'benClmDetMasterId' => $insert_id
				))->result_array();

				if(isset($benClmDetId[0])){
					#sudah, maka update
					$benClmDetId = $benClmDetId[0]['benClmDetId'];	
					$this->db->where(array(
						'benClmDetEmpBenId' => $ben_id,
						'benClmDetMasterId' => $insert_id
					));
					$db_result = $this->db->update('benefit_claim_det',$parameter_detail);
					
				}else{
					#belum, maka insert
					$parameter_detail = array(
						'benClmDetMasterId' => $insert_id,
						'benClmDetEmpBenId' => $ben_id,
						'benClmNominal' => $this->convert_nominal($value)
					);
					$db_result = $this->db->insert('benefit_claim_det',$parameter_detail);
					$benClmDetId = $this->db->insert_id();
				}
				$upload = $this->do_upload($ben_id,$benClmDetId,$this->input->post('benefit_name['.$ben_id.']'));
				
				if($upload['status'] === false){
					$result['status'] = 0;
					$result['message'] = $upload['message'];
					echo json_encode($result);
					return false;
				}
				#tampung seluruh benefit id, lalu hapus yang tidak ada dalam array ini
				$arr_ben_id[] = $ben_id;
			}

			$this->db->where(
				array(
					'benClmDetMasterId' => $insert_id,
				)
			);
			$this->db->where_not_in('benClmDetEmpBenId',$arr_ben_id);
			$this->db->delete('benefit_claim_det');

		}else{
			$parameter_master = array(
				'benClmKode' => $this->get_kode(),
				'benClmEmpId' => $this->session->userdata('empId'),
				'benClmTanggal' => date('Y-m-d')
			);
			$db_result = $this->db->insert('benefit_claim',$parameter_master);
			$insert_id = $this->db->insert_id();

			foreach($_POST['nominal'] as $ben_id => $value){
				$parameter_detail = array(
					'benClmDetMasterId' => $insert_id,
					'benClmDetEmpBenId' => $ben_id,
					'benClmNominal' => $this->convert_nominal($value)
				);
				$db_result = $this->db->insert('benefit_claim_det',$parameter_detail);
				$benClmDetId = $this->db->insert_id();
				
				$upload = $this->do_upload($ben_id,$benClmDetId,$this->input->post('benefit_name['.$ben_id.']'));
				if($upload['status'] === false){
					$result['status'] = 0;
					$result['message'] = $upload['message'];
					echo json_encode($result);
					return false;
				}
			}
		}
		
		if($this->input->post('confirm') == '1'){
			$this->db->where('benClmId',$insert_id);
			$this->db->update('benefit_claim',array('benClmSubmitStatus' => '1'));
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

	public function do_upload($benefit_id,$benClmDetId,$benefit_name){
		if($_FILES['file']['size'][$benefit_id] == 0){
			/*$result['status'] = false;
			$result['message'] = 'no file for '.$benefit_name;
			return $result; */
		}else{
			$config['upload_path']          = 
				FCPATH.$this->config->config['upload_path']
				.'/benefit_claim/'
				.$this->session->userdata('empId').'/';
			$save_path = $this->config->config['upload_path']
				.'/benefit_claim/'
				.$this->session->userdata('empId').'/';

			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 500;

			$ekstensiDokumen = explode('.',$_FILES['file']['name'][$benefit_id]);	
			$namaDokumen = date('YmdHis').'.'.$ekstensiDokumen['1'];
			$config['file_name'] = $namaDokumen;

			if (!file_exists($config['upload_path'])) {
			    mkdir($config['upload_path'], 0777, true);
			}

			#rename jadi upload, supaya ga nimpa var $_FILES yang udah ada
			$_FILES['upload']['name']= $config['file_name'];
	        $_FILES['upload']['type']= $_FILES['file']['type'][$benefit_id];
	        $_FILES['upload']['tmp_name']= $_FILES['file']['tmp_name'][$benefit_id];
	        $_FILES['upload']['error']= $_FILES['file']['error'][$benefit_id];
	        $_FILES['upload']['size']= $_FILES['file']['size'][$benefit_id];  

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('upload'))
			{
				$result['status'] = false;
				$result['message'] = $this->upload->display_errors().' for '.$benefit_name;			 
			}
			else
			{
				$result['status'] = true;
				$result['message'] = $this->upload->data();

				$this->db->set(
					array(
						'benClmDetFile' => $config['file_name'],
						'benClmPathFile' => $save_path

					)
				);
				$this->db->where('benClmDetId',$benClmDetId);
				$this->db->update('benefit_claim_det');
			}

			return $result;
		}		
	}

	public function delete(){
		$this->db->where($this->primary_tabel,$this->input->post('id'));
		$this->db->set(
			array(
				'benClmCancel' => '1'
			)
		);
		$db_result = $this->db->update($this->nama_tabel);
		
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