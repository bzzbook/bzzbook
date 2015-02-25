<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class person extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

	   
	   public function sign_up($data)
	   {
		    
		    $this->db->insert('cust_sign_up',$data);

	   }
	   public function post_buzz($data)
	   {
		   
		    $this->db->insert('posts',$data);
	   }
	   
	   public function view_post()
	   {
		  $query =  $this->db->get('posts');
	       return $query->result();
	   }
	   
	   public function postboard_update($data)
	{
		/*$id="1";
		$this->db->where('cust_id', $id);
		$this->db->update('cust_sign_up', $data);
		*/
		
	}
	   		
}
?>
