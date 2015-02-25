<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_inm extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
		
  		
    } 
	public function index()
	{
	}

	   public function sign_in($data)
	   {
		    $this->load->database("sign_up");
		    $condition = "email =" . "'" . $data['email'] . "' AND " . "new_password =" . "'" . md5($data['password']) . "'";
		  
			$this->db->select('*');
			$this->db->from('sign_up');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				 return $query->result();
				} else {
				return false;
				}
			}
	 	public function read_user_information($sess_array) {

		$condition = "email =" . "'" . $sess_array['email'] . "'";
		$this->db->select('*');
		$this->db->from('sign_up');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
}	}
?>
