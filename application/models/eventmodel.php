<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventModel extends CI_Model {

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
	
	public function get_events_by_cmpid($cmp_id)
	{
        $id = $this->session->userdata('logged_in')['account_id'];
		$condition =  "event_cr_user =" . "'" . $id . "'" . " AND " . "event_cr_cmp = ". "'" .$cmp_id."'";
		$this->db->select('*');
		$this->db->from('bzz_events');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result_array();
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
 
 public function get_event_by_id($id)
 {
	 
		$condition = "event_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_events');
		$this->db->where($condition);
		$query = $this->db->get();
		$event = $query->result_array();
		if(!empty($event))
		{
			return $event;
		}
		return false;
 }
 
 
 }
 
 
?>
