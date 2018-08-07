<?php

class Dashboard_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {		
		parent::__construct();
	}

	public function get_menu ($params = array()) {
		$result = array();
		$sql = "
			SELECT 
			  ref_menu.refMenuNama AS 'menu_nama',
			  ref_sub_menu.refSubMenuNama AS 'sub_menu_nama',
			  ref_controller.`refControllerNama` AS 'controller_nama',
			  ref_menu.refMenuIcon AS 'menu_icon',
			  ref_sub_menu.refSubMenuIcon AS 'sub_menu_icon' 
			FROM
			  `ref_akses` 
			  JOIN ref_sub_menu USING (refSubMenuId) 
			  JOIN ref_menu USING (refMenuId) 
			  JOIN ref_controller USING (refControllerId) 
			WHERE refGroupId = ? 
			ORDER BY refMenuUrutan,
			  refSubMenuUrutan 
			";
		$query = $this->db->query($sql, $params);
		$query = $query->result_array();		
		if(count($query) > 0){
			foreach ($query as $key => $value) {
				$result[$value['menu_nama']]['menu_icon'] = $value['menu_icon']; 
				$result[$value['menu_nama']]['submenu_list'][] = $value;
			}
		}		
		return $result;
	}
	
}