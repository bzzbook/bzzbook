<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobmodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	public function insert_event($event_info)
	{
		
		
		if($this->db->insert('bzz_events', $event_info))
			return $this->db->insert_id();
		else
			return false;
	} 
 }
?>
