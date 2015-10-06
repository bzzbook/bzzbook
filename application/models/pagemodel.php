<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagemodel extends CI_Model {
	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	public function get_page_data($page_id)
   {
	 	$condition = "page_id =" . "'" . $page_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_pages');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0];
		} else {
		return false;
		}
   }
}
?>
