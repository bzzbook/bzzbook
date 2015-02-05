<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_up_model extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		
    } 

	   
	   public function sign_up($data)
	   {
		    $this->load->database("bzzbook"); 
		    $this->db->insert('sign_up', $data);

	   }
	   		
}
?>
