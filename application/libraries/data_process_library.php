<?php

class Data_process_library{

	var $config_lib;

	function __construct()
	{
		$this->ci = & get_instance();
		$this->config_lib = $this->ci->config;
		$this->config_lib = $this->config_lib->config;			
	}

	public function decrypt_api($parameter,$key = null){
		if($key == null)$key = $this->config_lib['decrypt_key'];
		return openssl_decrypt($parameter,"AES-256-ECB",$key);
	}

	public function encrypt_api($parameter,$key = null){
		if($key == null)$key = $this->config_lib['decrypt_key'];
		return openssl_encrypt($parameter,"AES-256-ECB",$key);
	}

	public function encrypt_api_url($parameter,$key = null){
		if($key == null)$key = $this->config_lib['decrypt_key'];
		return urlencode(openssl_encrypt($parameter,"AES-256-ECB",$key));
	}
	
}

?>