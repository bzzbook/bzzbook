<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friendsmodel extends CI_Model {

	function __construct()
    {
   		parent::__construct();   		
    } 	
  public function getfriends()
  {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];
					
				}
				$this->db->select('*');
				$this->db->from('bzz_user_images');
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['user_img_thumb'];
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;
			}
			return $frnds;
		} else {
		return false;
		}
   }

   
   public function getPendingRequests($limit = 2)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status ='W'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		$checklimit = 1;
		if ($query->num_rows() >= 1) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{				
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();

				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];
				
				}
				$this->db->select('*');
				$this->db->from('bzz_user_images');
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['user_img_fav'];
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;
				
				if($checklimit==$limit)
				{
					break;
				}
				elseif($limit==0)
				continue;
				else
					$checklimit++;
			}
			return $frnds;
		}else{
			return false;
		}
		
	}	   
   public function confirmfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'Y',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a><a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a>  </div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
		
	}
	
	public function denyfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'N',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a> <a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a></div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
	
	}
	
	public function blockfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'B',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a> <a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a> </div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
		
	}
	public function get_userinfo_byid($user_id)
	{
		$condition = "user_id =" . "'" . $user_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_userinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $result = $query->result_array();
		}
	return false;
	}
	
	public function get_frnds_frnds($id)
	{
		//$id = $this->session->userdata('logged_in')['account_id'];
		$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('friend_id');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $result = $query->result();
		}
	return false;
	}
	
	public function appendFriend($frndid,$groupid)
	{
		$condition = "group_id =" . "'" . $groupid . "'";
		$this->db->select('*');
		$this->db->from('bzz_user_groups');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$result = $query->result_array();
			$friends = explode(',',$result[0]['group_members']);
			if(!empty($result[0]['group_members']) && !in_array($frndid,$friends))
			$data = array(
               'group_members' => $result[0]['group_members'].','.$frndid,
            );
			else if(in_array($frndid,$friends))
			{
				return true;
			}
			else
			$data = array(
               'group_members' => $frndid,
            );

			$this->db->where($condition);
			if($this->db->update('bzz_user_groups', $data))
			return true;
		}
		else
		return false;
	}
// latest frnds worked bt sp 8-4-2015
public function latest_frnds()
{
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->order_by('user_id','desc');
		$this->db->limit(9);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];
				}
				$this->db->select('*');
				$this->db->from('bzz_user_images');
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['user_img_thumb'];
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;
			}
			return $frnds;
		} else {
		return false;
		}
   
}

//  worked by sp on 9-4-2015 to display other all users if dont have any friends or dont follows any companies
public function finding_friends()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$usercondition = "user_id !=" . "'" . $id . "'";
	$this->db->select('user_id');
	$this->db->from('bzz_users');
	$this->db->where($usercondition);
	$query = $this->db->get();
	$users = $query->result_array();
	$user_ids = array();
	foreach($users as $user)
	{
		$user_ids[] = $user['user_id'];
	}
	//print_r($user_ids);

	$frndcondition = "user_id =" . "'" . $id . "' AND request_status ='Y' OR 'B' OR 'W'";
	$friends = array();
	$this->db->select('*');
	$this->db->from('bzz_userfriends');
	$this->db->where($frndcondition);
	$query = $this->db->get();
	$myfrnds = $query->result_array();
	$frnds = array();
	foreach($myfrnds as $frnd)
	{
		$frnds[] = $frnd['friend_id'];
	}
	//print_r($frnds);
	$required_ids = array();
	foreach($user_ids as $user)
				{
					if(!in_array($user,$frnds))
					{
						$required_ids[] = $user;
					}
					
				}
			if($required_ids)
				{
					$user_data = array();
					foreach($required_ids as $user_id)
					{
					  //$condition =  "user_id =" . "'" . $user_id . "'";
					  $this->db->select('*');
					  $this->db->from('bzz_users');
					  $this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$user_id);
					  $this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
					 // $this->db->where($condition);
					  $query = $this->db->get();
					   if ($query->num_rows() > 0) {
				       $userdata =  $query->result_array();
					   $user_data[] = $userdata;
				 		 } 
					}
				print_r($user_data);
				
				}
				return false;
				
		}
		
		
// displaying friends of friends or followers of companies which are im following

public function related_friends()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	/*$condition = "user_id =" . "'" . $id . "' AND follow_status='Y'";
	$this->db->select('companyinfo_id');
	$this->db->from('bzz_cmp_follow');
	$this->db->where($condition);
	$query = $this->db->get();
	$cmp_followers = $query->result_array();
	foreach($cmp_followers as $follower)
	{
		$condition =  "companyinfo_id =" . "'" . $follower['companyinfo_id'] . "' AND follow_status='Y' AND user_id !=" . "'" . $id . "'" ;
		$this->db->select('user_id');
		$this->db->from('bzz_cmp_follow');
		$this->db->where($condition);
		$query = $this->db->get();
		$users = $query->result_array();
	}
	 $user_id = array();
	 foreach($users as $user)
	 {
		 $user_id[] = $user['user_id'];
	 }
	 
	// print_r($user_id);
	 
	 */
	 // getting frnds of frnds
	 
	$condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
	$this->db->select('friend_id');
	$this->db->from('bzz_userfriends');
	$this->db->where($condition);
	$query = $this->db->get();
	$friends = $query->result_array();
	$one = array();
	foreach($friends as $friend)
	{

		$condition = "user_id =" . "'" . $friend['friend_id'] . "' AND request_status='Y' AND friend_id !=" . "'" . $id . "'" ;
		$this->db->select('friend_id');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		$frnds = $query->result_array();
			
	}
	print_r($one);

	 
}
		

}
?>