<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		  $this->load->database("bzzbook"); 
    } 

	   
	   public function sign_up($data)
	   {
		  
		    $this->db->insert('comp_sign_up', $data);

	   }
	   public function companies_list()
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "cust_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('comp_sign_up');
		   $this->db->where($condition);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }
	   	 public function following_comp_list()
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "cust_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('comp_sign_up');
		   $this->db->where($condition);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }	
}
?>
