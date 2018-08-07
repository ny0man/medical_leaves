<?php

class Medical_approval extends MY_Controller {
	
	var $nama_menu = 'Medical Approval';
	var $nama_controller = 'Medical_approval';
	var $nama_tabel = 'benefit_claim';
	var $primary_tabel = 'benClmId';

	public function __construct() {			
		parent::__construct();
		$this->load->model('Medical_approval_model');
    }

	public function index()
	{	
		$year_start = date('Y');
		$year_end = $year_start + 2;
		$result['tahun_benefit']['pilih'] = 'Choose year of starting benefit';
		for($i =$year_start;$i < $year_end;$i++){
			$result['tahun_benefit'][$i] = $i;
		}

		$result['list_office'] = $this->Medical_approval_model->list_office();

		
		
		$this->load->view('index',$result); 			
	}

	public function reload_data(){
		$_SESSION['Medical_approval']['filter']['tahun_benefit_selected'] = $this->input->post('tahun_benefit_selected');
		$_SESSION['Medical_approval']['filter']['benClmApproveStatus'] = $this->input->post('benClmApproveStatus');
		$_SESSION['Medical_approval']['filter']['empOfficeId'] = $this->input->post('empOfficeId');

		$this->db->join('employee','benClmEmpId=empId');
		$this->db->join('benefit_claim_det','benClmDetMasterId=benClmId');
		$this->db->join('employee_benefit','empBenId=benClmDetEmpBenId');
		$this->db->join('outpatient_benefit','outBenId=empBenBenId');
		$this->db->order_by('benClmApproveStatus');
		$this->db->where(
			array(
				'benClmSubmitStatus'=>'1',
				'YEAR(outBenStart) =' => $this->input->post('tahun_benefit_selected')
			)
		);
		$this->db->where(
			"(empOfficeId = '".$this->input->post('empOfficeId')."' OR 'all'='".$this->input->post('empOfficeId')."')"
		);

		if($this->input->post('benClmApproveStatus') == 'null'){
			$this->db->where(
				"benClmApproveStatus"
			);
		}else{
			$this->db->where(
				"(benClmApproveStatus = '".$this->input->post('benClmApproveStatus')."' 
				OR 'all'='".$this->input->post('benClmApproveStatus')."'
				)"
			);
		}
		
		$data = $this->db->get($this->nama_tabel)->result_array();

		$result['data'] = array();
		if(count($data) > 0){
			foreach ($data as $key => $value) {
				$result['data'][$value['benClmId']] = $value;
			}
			$result['data'] = array_values($result['data']);
		}

		

		$this->load->view('reload_data',$result);
	}

	public function form_crud(){
		$result = array();
		if($this->input->post('aksi') == 'edit'){
			$this->db->join('benefit_claim_det','benClmId = benClmDetMasterId');
			$this->db->join('employee_benefit','empBenId = benClmDetEmpBenId');
			$this->db->join('employee','empId = empBenEmpId');
			$this->db->join('office_location','officeLocId = empOfficeId');
			$data = $this->db->get_where($this->nama_tabel,
				array($this->primary_tabel => $this->input->post('id'))
			)->result_array();
			$result['data'] = $data;
		}
		
		$this->load->view('form_crud',$result);
	}

	public function validasi_field(){
		$this->form_validation->set_error_delimiters('', '|');
		foreach($_POST['benClmNominalApprove'] as $id => $value){
			$this->form_validation->set_rules('benClmNominalApprove['.$id.']', 'Nominal approve', 'required');
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
		

		foreach($_POST['benClmNominalApprove'] as $id => $value){
			$this->db->set(
				array(
					'benClmNominalApprove' => $this->convert_nominal($value)
				)
			);
			$this->db->where('benClmDetId' , $id);
			$db_result = $this->db->update('benefit_claim_det');
			if($db_result == 0){
				break;
			}
		}

		$this->db->set(
			 array(
				'benClmApproveStatus' => $this->input->post('benClmApproveStatus'),
				'benClmApproveNote' => $this->input->post('benClmApproveNote'),
				'benClmApproveBy' => $this->session->userdata('refUserId')
			)
		);
		$this->db->where('benClmId',$this->input->post('id'));
		$db_result = $this->db->update('benefit_claim');
		

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

	public function convert_nominal($nominal){
		$result = str_replace(',00', '', $nominal);
		$result = str_replace('.', '', $result);
		return $result;
	}
}