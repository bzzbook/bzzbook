<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class confirmaccount extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

	   
	   public function confirmUserAccount($conf_code)
	   {
		 $condition = "conf_code =" . "'" . $conf_code . "'";
		 $this->db->select('*');
		 $this->db->from('bzz_users');
		 $this->db->where($condition);
		 $query = $this->db->get();
		 if($query->num_rows() == 1)
		 {
			 $this->db->select('*');
			 $this->db->from('bzz_confirmation');
			 $this->db->where($condition);
			 $query = $this->db->get();
			 if($query->num_rows() == 1)
			 {
			 $conf_data = $query->result_array();
  			 $confirm_status = array('conf_status' => 'Y');
			 $this->db->where($condition);
			 if($this->db->update('bzz_confirmation',$confirm_status))
			 return true;
		 }else
		 return false;
	   }
	   }
		public function confirmation_insert($confirmation)
		{
			if($confirmation)
			{
				$this->db->insert('bzz_confirmation',$confirmation);
			}
		}
}
?>
