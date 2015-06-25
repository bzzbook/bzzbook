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
	public function insert_user_event($event_info)
	{
		
		if($this->db->insert('bzz_user_events',$event_info))
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
	public function get_user_events_by_id($event_id)
	{
        $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "a.event_id = ". "'" .$event_id."'";
		$this->db->select('a.event_id,a.event_name,a.event_location,a.event_details,a.event_date,a.event_time,a.event_type,a.event_created_by,b.frnd_id,b.invitation_status');
		$this->db->from('bzz_user_events a');
		$this->db->join('bzz_user_event_invites b', 'b.event_id=a.event_id and b.frnd_id='.$id, 'left');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result();
		if(!empty($event_data))
		{
			return $event_data[0];
		}
		return false;
	}
	public function get_noofinvites($event_id)
	{
        $condition = "event_id = ". "'" .$event_id."'";
		$this->db->select('*');
		$this->db->from('bzz_user_event_invites');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result();
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
	public function get_noofgoing($event_id)
	{
        $condition = "event_id = ". "'" .$event_id."' AND invitation_status=1";
		$this->db->select('*');
		$this->db->from('bzz_user_event_invites');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result();
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
	public function get_noofmaybe($event_id)
	{
        $condition = "event_id = ". "'" .$event_id."' AND invitation_status=2";
		$this->db->select('*');
		$this->db->from('bzz_user_event_invites');
		$this->db->where($condition);
		$query = $this->db->get();
		$event_data = $query->result();
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
 	public function get_events_and_invites()
	{
         $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "(a.event_created_by = " .$id." OR b.frnd_id=".$id.") AND a.event_date>=NOW() AND a.event_date<=DATE_ADD(NOW(), INTERVAL 1 WEEK)";
		$this->db->select('a.event_id,a.event_name,a.event_location,a.event_details,a.event_date,a.event_time,a.event_type,a.event_created_by,b.frnd_id,b.invitation_status');
		$this->db->from('bzz_user_events a'); 
		$this->db->join('bzz_user_event_invites b', 'b.event_id=a.event_id and b.frnd_id='.$id, 'left');
		$this->db->where($condition);
		$this->db->order_by('a.event_date','desc');   
		$this->db->order_by('a.event_time','desc');      
		$query = $this->db->get(); 
		
		$event_data = $query->result();
		//echo $this->db->last_query(); exit;
		//print_r($event_data);exit;
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
	public function get_invites()
	{
         $id = $this->session->userdata('logged_in')['account_id'];
		
		$this->db->select('a.event_id,a.event_name,a.event_location,a.event_details,a.event_date,a.event_time,a.event_type,a.event_created_by,b.frnd_id,b.invitation_status');
		$this->db->from('bzz_user_events a'); 
		$this->db->join('bzz_user_event_invites b', 'b.event_id=a.event_id and b.frnd_id='.$id, 'inner');
		$this->db->order_by('a.event_date','desc');   
		$this->db->order_by('a.event_time','desc');      
		$query = $this->db->get(); 
		
		$event_data = $query->result();
		if(!empty($event_data))
		{
			return $event_data;
		}
		return false;
	}
 public function get_event_hosts()
	{
        $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "event_created_by = " .$id;
		$this->db->select('*');
		$this->db->from('bzz_user_events'); 
		$this->db->where($condition);
		$this->db->order_by('event_date','desc');   
		$this->db->order_by('event_time','desc');      
		$query = $this->db->get(); 
		$event_data = $query->result();
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
  public function event_going_sts($event_id,$status)
 {
		$id = $this->session->userdata('logged_in')['account_id'];		
		$condition =  "frnd_id =" . "'" . $id . "'" . " AND " . "event_id = ". "'" .$event_id."'";
		$this->db->where($condition);
		$query = $this->db->get('bzz_user_event_invites');
		$result = $query->result_array();
		if(!empty($result))
		{
		 $data['invitation_status'] = $status;
		 $this->db->where($condition);
		 if($this->db->update('bzz_user_event_invites',$data))
		 return true;
		}	   
 }
 
public function send_event_invitation_to_frnds($event_id,$invited_users)
 {
	 $frnds_ids = explode(',',$invited_users);
	// print_r($frnds_ids);
	 
	 if(!empty($frnds_ids))
	 {
	 
	 foreach($frnds_ids as $frnd_id)
	 {
 //echo $frnd_id;
 $id = $this->session->userdata('logged_in')['account_id'];
  $up_data = 
		array(
		'event_id'=>$event_id,
		'frnd_id'=>$frnd_id,
		'user_id'=>$id,
		'invitation_status'=>'',
		);
 
/* $this->db->select('*');
 $this->db->from('bzz_user_event_invites');
 $this->db->where('user_id',$id);
 $query = $this->db->get();
 $data =  $query->result_array();
 

		
*/

 $this->db->insert('bzz_user_event_invites',$up_data);
 }
}
 
 }
 
 }
?>
