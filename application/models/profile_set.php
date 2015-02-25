<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_set extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
   public function save_settings(){
	    $id = "1";
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('cust_sign_up');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
}
?>
