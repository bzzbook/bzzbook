<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

	   
	   public function insert_msg($data)
	   {
		    
		    $this->db->insert('messages',$data);
		
	   }
	   		
}
?>
