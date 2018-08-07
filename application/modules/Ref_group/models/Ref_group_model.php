<?php

class Ref_group_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	public function get_group_akses() {
		$sql = "
			SELECT 
			  ref_sub_menu.`refSubMenuId`,
			  ref_menu.refMenuNama AS 'menu_nama',
			  ref_sub_menu.`refSubMenuNama` 
			FROM
			  `ref_sub_menu` 
			  JOIN ref_menu USING (refMenuId) 
			  JOIN 
			    (SELECT 
			      ref_menu.refMenuId AS 'sub_sys_menu_id',
			      COUNT(ref_menu.`refMenuId`) AS 'count' 
			    FROM
			      `ref_sub_menu` 
			      JOIN ref_menu USING (refMenuId) 
			    GROUP BY ref_menu.refMenuId) sub_ref_menu 
			    ON sub_sys_menu_id = ref_menu.refMenuId 
			ORDER BY `count` ASC,
			  ref_menu.`refMenuNama`,
			  ref_sub_menu.`refSubMenuUrutan`
			";
		$query = $this->db->query($sql);
		$result = array();
		if($query->result_array()){
			foreach($query->result_array() as $key => $value){
				$result['group_akses'][$value['menu_nama']][$value['refSubMenuId']] = $value['refSubMenuNama']; 
			}
		}	
		return $result;
	}

	public function get_data_akses_by_group($arrParam) {
		$sql = "
			SELECT 
				refSubMenuId as `sub_menu_id`				 
			FROM
				`ref_akses`
			WHERE `refGroupId` = ?
			";
		$query = $this->db->query($sql, $arrParam);	
		$result = array();
		if($query){
			foreach($query->result_array() as $key => $value){
				$result['sub_menu_centang'][$value['sub_menu_id']] = '1';
			}
		}
		return $result;
	}
	
}