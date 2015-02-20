<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_up extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		
    } 

	   
	   public function signg_up($data)
	   {
		    $this->load->database("bzzbook"); 
		    $this->db->insert('sign_up', $data);

	   }
	   public function sign_in($email,$pwd)
	   {
		  $this->db->select('email,new_password');
		  $this->db->from('sign_up');
		  $this->db->where('email',$email);
		  $this->db->where('new_password',md5($pwd));
		  $this->db->limit(1);
		  $query = $this->db->get();
		  if($query -> num_rows() == 1)
		  {
			  return $query->result();
		  }else{
			  return false;
		  } 
		 /* 
		  if($email == 'siva@gmail.com' && $pwd =='sivaprasad' )
		  {
			  return true;
		  }else{
			  return false;
		  } */
		   
	   }
	   		
}
?>
