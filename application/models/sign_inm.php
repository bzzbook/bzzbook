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
		 
		    $condition = "user_email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
		  
			$this->db->select('*');
			$this->db->from('bzz_users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			$user_data= $query->result_array();
			//print_r($user_data);
			if($query->num_rows() == 1) {
				//echo"hai";
				$conf_condition = "user_id =" . "'" . $user_data[0]['user_id'] ."'  AND conf_status='Y'" ;
				$this->db->select('*');
				$this->db->from('bzz_confirmation');
				$this->db->where($conf_condition);
				$query = $this->db->get();
				$conf_data = $query->result();
				// print_r($conf_data);
				
				if(!empty($conf_data))
				{
			     return $user_data;
				// print_r($conf_data);
				
				} 
				
			}
				return false;
				
			}
	 	public function read_user_information($sess_array) {

		$condition = "user_email =" . "'" . $sess_array['email'] . "' ORDER BY bzz_user_images.user_imageinfo_id DESC";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
		$this->db->join('bzz_user_images', 'bzz_users.user_id=bzz_user_images.user_id','left');
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
