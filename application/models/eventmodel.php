<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventModel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	public function insert_event($event_info)
	{
		
		if($this->db->insert('bzz_events',$event_info))
		return true;
		else
			return false;
	} 
	
	public function get_events_by_cmpid($cmp_id)
	{
        $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "event_cr_cmp = ". "'" .$cmp_id."'";
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
 
 
 public function checkbutton($cmp_id)
 {
	   $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "companyinfo_id = "."'" .$cmp_id."' AND user_id = '" .$id."'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
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
		$this->db->where($condition);
		$query = $this->db->get('bzz_events');
		$event = $query->result_array();
	  if(!empty($event))
		{
	    $i = $event[0]['event_hits'];
		$event_hit['event_hits'] = $i+1;
	    $this->db->where($condition);
	    $this->db->update('bzz_events',$event_hit);	
		$this->db->select('*');
		$this->db->from('bzz_events');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result_array();
		return $event_data;
		}
		return false;
 }
 
 public function insert_discussion($data)
 {
	 if($this->db->insert('bzz_event_discussions',$data))
	 {
		 return $this->db->insert_id();
	 }
	 return false;
 }
 
 public function get_event_discussion($event_id)
 {
	    $condition = "discussion_on =" . "'" . $event_id . "' and  discussion_content != '' ";
		$this->db->select('*');
		$this->db->from('bzz_event_discussions');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result_array(); 
 }
 public function getuserdetails($discussion_by_id)
 {
	 
	   $condition = "user_id =" . "'" . $discussion_by_id . "'";		
		$this->db->select('*');
		$this->db->from('bzz_user_images');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$discussion_by_id);
			$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
			$query = $this->db->get();
			if($query->num_rows() > 0) {
				$user_data = $query->result_array();
				return $user_data;	
			} else {
			return false;
			}
		}
		else{
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->where($condition);
			//$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$id);
			//$this->db->order_by('user_id','desc');
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$user_data = $query->result_array();
				return $user_data;	
			} else {
			return false;
			}
		}
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
/*
	$condition = "user_id =" . "'" . $discussion_by_id . "'";
	$this->db->select('*');
	$this->db->from('bzz_userinfo');
	$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$discussion_by_id);
	//$this->db->where($condition);
	$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
	$query = $this->db->get();
	//$this->db->limit(1);
	if($query->num_rows() > 0)
	{
	$user_data = $query->result_array();
	return $user_data;	
	}
  return false;
 }*/
 }
 
 }
?>
