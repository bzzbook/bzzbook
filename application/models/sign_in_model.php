<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_in_model extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
		
  		
    } 

	   public function sign_in($data)
	   {
		    $this->load->database("sign_up");
		    $condition = "email =" . "'" . $data['email'] . "' AND " . "new_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('sign_up');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return true;
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
}
		  /* $query = $this->db->get('sign_up',array('email'=>$email,'new_password'=>$pwd));
		  return $query->result();	
		  $query = $this->db->query("select email,new_password from sign_up where email=$email and new_password=$pwd");
		  $row = $query->row();
          echo $row->email;
		  echo $row->new_password;
              $query->free_result(); 
		  
		  
		  if($query -> num_rows() == 1)
		  {
			  //return $query->result();
			   $row = $query->row_array(); 
   				echo $row['email'];
  				echo $row['new_password'];
   				
		  }else{
			  $this->load->view('posts'); 
		  }  */
		 
	   		
}
?>
