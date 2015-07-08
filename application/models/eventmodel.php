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
		$this->db->select('a.event_id,a.event_name,a.event_location,a.event_banner,a.event_details,a.event_date,a.event_time,a.event_type,a.event_created_by,b.frnd_id,b.invitation_status');
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
	public function get_past_event()
	{
         $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "(a.event_created_by = " .$id." OR b.frnd_id=".$id.") AND a.event_date < NOW()";
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
 
   public function event_going_sts_frm_suggestion($event_id,$cr_by,$status)
 {
		$id = $this->session->userdata('logged_in')['account_id'];		
		
		
		 $data['invitation_status'] = $status;
		 $data['user_id'] = $cr_by;
		 $data['event_id'] = $event_id;
		 $data['frnd_id'] = $id;
		 
		 if($this->db->insert('bzz_user_event_invites',$data))
		 return true;
		 else
		 return false;
			   
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
 
			$invited_users = $this->friendsmodel->invite_friends_to_user_event();
			//print_r($invited_users);
			$list = "";
		    if($invited_users) { foreach($invited_users as $users){
				
				
				
           $list .= " <li>
		   <div class='col-md-3 friendsimg'>
              <img src='".base_url()."uploads/".$users['image']."' alt='".$users['name']."' style='width:32px; height:32px;'></div>
              <div class='col-md-8 names'>
			  <a href=''>".$users['name']."</a></div>
			  
                <div class='col-md-2 names'>
				
				<button class='btn btn-primary btn-xs' id='invite_btn' onclick='send_invite(".$users['id'].",".$event_id.");' type='button'>Invite</button>
			
                </div>
            </li>";
             } }else $list = "No Friends Found To Invite!..";
			 
			 echo $list;
	
 }
}
 
 }
 
 
 
   public function editEventDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_user_events');
		$this->db->where('event_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	public function send_invite_to_frnd($frnd_id,$event_id)
	{
	
		$id = $this->session->userdata('logged_in')['account_id'];
		
		$up_data = 
		array(
		'event_id'=>$event_id,
		'frnd_id'=>$frnd_id,
		'user_id'=>$id,
		'invitation_status'=>'',
		);
		 $this->db->insert('bzz_user_event_invites',$up_data);
		
		
			$invited_users = $this->friendsmodel->invite_friends_to_user_event($name='',$addedusers='',$user_id='',$limit='4');
			//print_r($invited_users);
			$list = "";
		    if($invited_users) { foreach($invited_users as $users){
				
				
				
           $list .= " <li>
		   <div class='col-md-3 friendsimg'>
              <img src='".base_url()."uploads/".$users['image']."' alt='".$users['name']."' style='width:32px; height:32px;'></div>
              <div class='col-md-8 names'>
			  <a href=''>".$users['name']."</a></div>
			  
                <div class='col-md-2 names'>
				
				<button class='btn btn-primary btn-xs' id='invite_btn' onclick='send_invite(".$users['id'].",".$event_id.");' type='button'>Invite</button>
			
                </div>
            </li>";
             } }else $list = "No Friends Found To Invite!..";
			 
			 echo $list;
	
	}
	
	
	function post_event_buzz($data){
		 $this->db->insert('bzz_user_event_posts',$data);
		 return $this->db->insert_id();
	}
	
	
	
	
	public function insert_event_banner_pic($banner_img,$event_id)
	{
		   $data = array(
            'event_banner' => $banner_img,
		
        );
		echo "aesfsdfasdf";
		echo $banner_img;
		echo $event_id;
       $this->db->where('event_id',$event_id);
	   if($this->db->update('bzz_user_events',$data))
	   {
		return true;
		
	   }
	   return false;
        /*return $this->db->insert_id();
			
			 $image = $this->profile_set->get_profile_pic();
		 
		$figure= "<figure class='cmplogo'><img src='".base_url()."uploads/".$image[0]->user_img_thumb."' alt='".base_url()."uploads/".$image[0]->user_img_thumb."'></figure>";
		
  echo $figure;*/
	}

public function user_event_suggestions()
{

	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "(user_id ='".$id."' OR friend_id = '".$id."') AND request_status='Y'";
		$this->db->select('user_id,friend_id');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		$friends = $query->result_array();
		//print_r($friends);
		
		$users = array();
		foreach($friends as $frnds)
		{
			$users[] = $frnds['user_id'];
			$users[] = $frnds['friend_id'];
		}
		$users = array_unique($users); 



if($users)
{  
$user_events = array();  
    $all_users_cr_events = array();
	foreach($users as $user)
	{
		
		$this->db->select('event_id');
		$this->db->from('bzz_user_events');
		$this->db->where('event_created_by',$user);
		$query = $this->db->get();
		$events = $query->result_array();
		
		foreach($events as $event)
		{
			if($user == $id){
			$user_events[] = $event['event_id'];
			}else
			$all_users_cr_events[] = $event['event_id'];
		}
		
		
		$this->db->select('event_id');
		$condition = "frnd_id =".$user." AND (invitation_status = '1' OR invitation_status = '2')";
		$this->db->from('bzz_user_event_invites');
		$this->db->where($condition);
		$query = $this->db->get();
		$events_invites = $query->result_array();
		
	
		foreach($events_invites as $invite)
		{
			if($user == $id){
			$user_events[] = $invite['event_id'];
			}else
			$all_users_cr_events[] = $invite['event_id'];
		}
		
	}
	
	
}
//print_r($user_events);  
  //print_r($all_users_cr_events);

$all_events = array_merge(array_unique($all_users_cr_events),array_unique($user_events));
//print_r($all_events);
$suggest_events = array_diff(array_unique($all_events),$user_events);

//print_r($suggest_events);
//exit;  
if($suggest_events)
{
	$eventdata = array();
	
	foreach($suggest_events as $event)
	{
		$this->db->select('*');
		$this->db->from('bzz_user_events');
		$this->db->where('event_id',$event);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		$event_data = $query->result_array();
	}
	  $eventdata[] = $event_data;
	}
	
//print_r($eventdata);
return $eventdata;
}
	
}

public function get_count_of_people($id)
{
	
	$condition = "event_id = ".$id." AND (invitation_status = '1' OR invitation_status = '2')";
	$this->db->select('*');
	$this->db->from('bzz_user_event_invites');
	$this->db->where($condition);
	$query = $this->db->get();
	if($query->num_rows() > 0)
	{
	return $query->result_array();
	
	}
	
}
	
 }
?>
