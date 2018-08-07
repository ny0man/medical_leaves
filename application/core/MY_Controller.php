<?php

class MY_Controller extends CI_Controller {
	
    var $pesan_error = array();

	public function __construct() {			
		parent::__construct();
		$this->load->database();
		$this->cek_session();
        $this->set_pesan_error();
    }

    public function cek_session(){
    	$user = $this->db->get_where('ref_user',
    		array(
    			'refUserId' => $this->session->userdata('refUserId')
    		)
    	)->result_array();
    	$session_active = $user[0]['refUserSessionActive'];

    	if($this->session->userdata('refUserSessionActive') != $session_active){
    		$this->session->sess_destroy();
    		header('Location: '.site_url('Login'));
			exit;
    	}

    	if($this->session->userdata('refUserId') == ''){
    		$this->session->sess_destroy();
    		header('Location: '.site_url('Login'));
			exit;
    	}
    }

    public function set_pesan_error(){
        $pesan = $this->db->get('ref_pesan')->result_array();
        foreach($pesan as $key => $value){
            $this->pesan_error[$value['refPesanKode']] = $value['refPesanValue'];
        }
    }
    
}