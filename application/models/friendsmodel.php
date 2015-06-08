<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friendsmodel extends CI_Model {

	function __construct()
    {
   		parent::__construct();   		
    } 	
  public function getfriends($name='',$addedusers='',$user_id='',$limit='')
  {
	    $id = $this->session->userdata('logged_in')['account_id'];
		if($user_id!='')
		$id = $user_id;
	    $condition = "(user_id ='".$id."' OR friend_id='".$id."') AND request_status='Y'";
		if($addedusers!='')
		$condition.= " AND (user_id NOT IN (".$addedusers.") AND friend_id NOT IN (".$addedusers.") )";
		if($limit!='')
		$condition .=" LIMIT 0,".$limit;
		//echo $condition ; exit;
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{
				if($friend['friend_id']==$id)
			    $condition = "user_id =" . "'" . $friend['user_id'] . "'";
				else
				$condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				if($name!='')
				{
					$condition.= " AND (user_firstname LIKE '%".$name."%' OR user_lastname LIKE '%".$name."%' )"; 
				}
				if($addedusers!=''){
					$condition.= " AND user_id NOT IN (".$addedusers.")";
				}
				
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];	
					$this->db->select('*');
				$this->db->from('bzz_user_images');
				if($friend['friend_id']==$id)
			    $condition = "user_id =" . "'" . $friend['user_id'] . "'";
				else
				$condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				if($result)
				$frnd['image'] = $result[0]['user_img_thumb'];
				else
				$frnd['image'] =  'default_profile_pic.png';
				if($friend['friend_id']==$id)
				$frnd['id'] = $friend['user_id'];
				else
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;				
				}
				
			}
			return $frnds;
		} else {
		return false;
		}
   }

   
   public function getPendingRequests($limit)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "friend_id =" . "'" . $id . "' AND request_status ='W'";
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
			    $condition = "user_id =" . "'" . $friend['user_id'] . "'";
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
				if(!empty($result[0]['user_img_fav']))
				{
					$frnd['image'] = $result[0]['user_img_fav'];
				}
				else
				$frnd['image'] = 'default_profile_pic.png';
				$frnd['id'] = $friend['user_id'];
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
		 $condition = "user_id =" . "'" . $req_id . "'" . " AND " . "friend_id =" . "'" . $id .  "'"; 
			$data = array(
               'request_status' => 'Y',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			
			/*$frnddata = array(
			   'user_id' => $id,
			   'friend_id' => $req_id,
               'request_status' => 'Y',
            );
			
			$this->db->insert('bzz_userfriends', $frnddata);*/
			
			$pend_req = $this->getPendingRequests($limit = 2);
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
	    $condition ="(user_id ='" .$req_id. "' or friend_id ='".$req_id."') AND (user_id = '".$id."' or friend_id ='".$id."')";
		
			$data = array(
               'request_status' => 'N',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests($limit = 2);
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
	    $condition ="(user_id ='" .$req_id. "' or friend_id ='".$req_id."') AND (user_id = '".$id."' or friend_id ='".$id."')";
		
			$data = array(
               'request_status' => 'B',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests($limit = 2);
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
	
	public function addFriend_Request($frnd_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$frndcondition =  "user_id =" . "'" . $id . "' AND (request_status!='Y' OR request_status!='W') AND friend_id =" . "'" . $frnd_id . "'" ;
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($frndcondition);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data)
		{
	 	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$frnd_id;		
			$data = array(
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
		}
		else{
			$condition = "user_id =" . "'" . $id . "' AND friend_id =".$frnd_id;		
			$data = array(
				'user_id' => $id,
				'friend_id' => $frnd_id,
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->insert('bzz_userfriends', $data); 
		}
			
			$frnd_req = $this->related_friends($limit = 2);
			if(!$frnd_req)
			$frnd_req = $this->friendsmodel->finding_friends($limit = 2);
			$list = "";
		    if($frnd_req) { foreach($frnd_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req[0]['user_img_thumb']."' alt='".$req[0]['user_firstname']. " ".$req[0]['user_lastname']."'></figure>
              <div class='disc'>
                <h4>".$req[0]['user_firstname']. " ".$req[0]['user_lastname']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='addFrnd(".$req[0]['user_id'].")'>Add Friend</a> </div>
                </div>
            </li>";
             } }else $list = "No Friends Found!..";
			 
			 echo $list;
		
	}
	
	// add friend functionality from search friends
	
	public function addSearchFriend_Request($frnd_id)
	{
		
		$id = $this->session->userdata('logged_in')['account_id'];
		$frndcondition = $frndcondition = "((user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')) AND (request_status!='Y' OR request_status!='W')"; 
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($frndcondition);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data)
		{
	
	    $condition = "(user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')"; 
		
			$data = array(
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
		}
		else{
			 $condition ="(user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')"; 
		
			$data = array(
				'user_id' => $id,
				'friend_id' => $frnd_id,
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->insert('bzz_userfriends', $data); 
		
		}
	
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
		$condition = "user_id =" . "'" . $id .  "' AND request_status='Y'";
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
public function latest_frnds($limit)
{
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "(user_id ='" .$id. "' or friend_id ='".$id."') AND request_status='Y'";
		$this->db->select('user_id,friend_id');
		$this->db->from('bzz_userfriends');
		$this->db->order_by('userfriends_id','desc');
		if($limit != 0)
		{
		$this->db->limit(3);
		}
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{
				$frnds[] = $friend['user_id'];
				$frnds[] = $friend['friend_id'];	
			}
		}
	
		if(!empty($frnds))
			{
		$usr_ids = array_unique($frnds);
		
		$key = array_search($id,$usr_ids);
		if($key!==false)
		{
  		unset($usr_ids[$key]);
		}
		
			foreach($usr_ids as $user_id)
			{
				 $usercondition = "user_id ="."'".$user_id."'";
						 $this->db->select('*');
						 $this->db->from('bzz_user_images');
						 $this->db->where($usercondition);
						 $query = $this->db->get();
						 if($query->num_rows > 0)
						 {
							$this->db->select('*');
							$this->db->from('bzz_users');
							$this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$user_id);
							$this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
							$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
							$query = $this->db->get();
							$user_data =  $query->result_array();
							
						 }else{
							  $this->db->select('*');
							// $this->db->limit(2);
							  $this->db->from('bzz_users');
							  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id AND bzz_users.user_id='.$user_id);
							 // $this->db->where($followercondition);
							  $query = $this->db->get(); 
							   $user_data =  $query->result_array();
						 }
						  $userdata[] = $user_data;
					}
					
			return $userdata;
		} else {
		return false;
		}
   
}

//  worked by sp on 9-4-2015 to display other all users if dont have any friends or dont follows any companies
public function finding_friends($limit)
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

	$frndcondition = "user_id =" . "'" . $id . "'";
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
					  if($limit != 0)
					  {
					  $this->db->limit(2);
					  }
					  $this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$user_id);
					  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
					  $this->db->order_by('bzz_user_images.user_imageinfo_id','desc'); 
					   //$this->db->order_by('bzz_users.user_id','desc');
					  //$this->db->order_by('user_id');
				
					 // $this->db->where($condition);
					  $query = $this->db->get();
					   if ($query->num_rows() > 0) {
				       $userdata =  $query->result_array();
					   $user_data[] = $userdata;
				 	   } 
					}
				return $user_data;
				
				}
				return false;
				
		}
		
		
// displaying friends of friends or followers of companies which are im following

public function related_friends($limit)
{
	$id = $this->session->userdata('logged_in')['account_id'];
	
	//getting frnds ids
	//$condition =  "(user_id = '".$id."' or friend_id ='".$id."') AND request_status='Y'"; 
	$condition = "(user_id ='" .$id. "' or friend_id ='".$id."') AND request_status='Y'";
	$this->db->select('friend_id,user_id');
	$this->db->from('bzz_userfriends');
	$this->db->where($condition);
	$query = $this->db->get();
	$friends = $query->result_array();
	$elements = array();
	// print_r($friends);
	$frnd_frnds = array();
	 foreach($friends as $frnds)
	 {
	    /*$frnd_frnds = $this->user_frnds($frnds['friend_id']);
	 		foreach($frnd_frnds as $fr)
			{
				$elements[] = $fr['friend_id'];
			}*/
	    $frnd_frnds[] = $frnds['user_id'];
		$frnd_frnds[] = $frnds['friend_id'];
	 }
	foreach($frnd_frnds as $frnd_frnd_id)
	{
	$condition = "(user_id ='" .$frnd_frnd_id. "' or friend_id ='".$frnd_frnd_id."') AND request_status='Y'";
	$this->db->select('friend_id,user_id');
	$this->db->from('bzz_userfriends');
	$this->db->where($condition);
	$query = $this->db->get();
	$multiplefriends = $query->result_array();
	foreach($multiplefriends as $mfriends)
		{
			$elements[] = $mfriends['user_id'];
			$elements[] = $mfriends['friend_id'];
		}
	}

//	
	//my company followers
	$companies = array();
	$mycmpcondition ="user_id ="."'".$id."'";
	$this->db->select('companyinfo_id');
	$this->db->from('bzz_companyinfo');
	$this->db->where($mycmpcondition);
	$query = $this->db->get();
	$mycmps = $query->result_array();
	foreach($mycmps as $cmp)
	{
		$companies[] = $cmp['companyinfo_id'];
	}
	$cmpfollowcondition ="user_id ="."'".$id."'AND follow_status='Y'";
	$this->db->select('companyinfo_id');
	$this->db->from('bzz_cmp_follow');
	$this->db->where($cmpfollowcondition);
	$query = $this->db->get();
	$all_follow_cmps = $query->result_array();
	foreach($all_follow_cmps as $follow_cmp)
	{
		$companies[] = $follow_cmp['companyinfo_id'];
	}

if(!empty($companies))
{

$this->db->select('user_id');
$this->db->from('bzz_cmp_follow');
$this->db->where_in('companyinfo_id',$companies);
$query = $this->db->get();
$cmpfollowers = $query->result_array();

foreach($cmpfollowers as $users)
{
	$elements[] = $users['user_id'];
}
}
$usercondition ="user_id ="."'".$id."'";
//location based search for users

$this->db->where($usercondition);
$query = $this->db->get('bzz_userinfo');
$user_details = $query->result_array();

/*print_r($user_details);
echo $user_details[0]['user_id'];
exit;*/
if(!empty($user_details))
{
$userslikecondition = "user_industry like '%".$user_details[0]['user_industry']."%' or user_cmpname like '%".$user_details[0]['user_cmpname']."%' or profession like '%".$user_details[0]['profession']."%' or location like '%".$user_details[0]['location']."%' or schooling like'%".$user_details[0]['schooling']."%' or hometown like'%".$user_details[0]['hometown']."%' or interests like'%".$user_details[0]['interests']."%'";
$this->db->select('user_id');
$this->db->from('bzz_userinfo');
$this->db->where($userslikecondition);
$query = $this->db->get();
$usr_similar = $query->result_array();
foreach($usr_similar as $user)
{
	$elements[] = $user['user_id'];
}
}
if(!empty($all_ids))
{
	$all_ids = array_unique($elements);

$key = array_search($id,$all_ids);
if($key!==false){
  unset($all_ids[$key]);
}
	if($all_ids)
				{
					$userdata = array();
					foreach($all_ids as $each_id)
					{
										
						 
						 $followercondition = "user_id ="."'".$each_id."'";
						 $this->db->select('*');
						 $this->db->from('bzz_user_images');
						 $this->db->where($followercondition);
						 $query = $this->db->get();
						 if($query->num_rows > 0)
						 {
								$this->db->select('*');
								$this->db->from('bzz_users');
								$this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$each_id);								$this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
								$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
								
								$query = $this->db->get();
								 $user_data =  $query->result_array();
								
						 }else{
							  $this->db->select('*');
							  
							  $this->db->from('bzz_users');
							  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id AND bzz_users.user_id='.$each_id);
							 // $this->db->where($followercondition);
							  $query = $this->db->get(); 
							   $user_data =  $query->result_array();
						 }
						  $userdata[] = $user_data;
			
					}
			return $userdata;
				
				}
}
return false;
}
	
public function search_friends($value)
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$this->db->select('*'); 
	$this->db->from('bzz_userinfo');
	$this->db->like('user_firstname',$value); 
	$this->db->or_like('user_lastname',$value); 
	$query = $this->db->get();
	$data = $query->result_array();
	//print_r($data);
	if(!empty($data))
	{
		$userdata = array();
	foreach($data as $data)
	{
		if($data['user_id'] != $id)
		{
					
			$imgcondition = "user_id =" . "'" . $data['user_id'] . "'";
			$this->db->where($imgcondition);
			$this->db->select('*');
			$this->db->from('bzz_user_images');
			$query = $this->db->get();
						
			if($query->num_rows() > 0)
			{
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$data['user_id']);
			$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
			$query = $this->db->get();
			$searched_user = $query->result_array();
			 
			}else
			{
			$usercondition = "user_id =" . "'" . $data['user_id'] . "'";
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->where($usercondition);
			$query = $this->db->get();
			$searched_user = $query->result_array();
			
			}
			$userdata[] = $searched_user;
	}
	}
	//print_r($userdata);

	
	$searchblock = "";
		   
          
             if($userdata) {
				 
				 $searchblock .= "
		   
      <ul class='groupEditBlock'> ";   
				  foreach($userdata as $req){
        $searchblock .= " <li class='col-md-4'>
        	<div class='fdblock'>";
			if(!empty($req[0]['user_img_thumb'])){
$searchblock .= "<figure class='myfriendspfpic'><img src='" . base_url() ."uploads/".$req[0]['user_img_thumb']."' alt='". $req[0]['user_firstname'] . " " .$req[0]['user_lastname'] ."'></figure>";
			}else{
				$searchblock .= "<figure class='myfriendspfpic'><img src='" . base_url() ."uploads/default_profile_pic.png'></figure>";
			}

		$searchblock .= " <div class='friendInfo'>
            <h3>". $req[0]['user_firstname'] . " " .$req[0]['user_lastname']."</h3>";
 $friendscount = $this->friendsmodel->get_frnds_frnds($req[0]['user_id']); if($friendscount) { $frnds = count($friendscount); }else $frnds = '0' ;
			 $searchblock .= "<span>(". $frnds ." "." friends)</span>
              <div class='disc'>";
			  
			  $myfrnd = $this->user_frnds($req[0]['user_id']);
			 if($myfrnd){
			//print_r($myfrnd);
			 if($myfrnd[0]['request_status'] == 'Y') 
				   {
               $searchblock .= "<div class='dcBtn'><a href='javascript:void(0);'>Friends</a></div>";
				   }elseif( $myfrnd[0]['request_status'] == 'W'){
			 $searchblock .= "<div class='dcBtn'><a href='javascript:void(0);'>Pending</a></div>";
				   }else{
			 $searchblock .= "<div class='dcBtn'><a id='addFrnd".$req[0]['user_id']."'
			  href='javascript:void(0);' onclick='addSearchFrnd(" .$req[0]['user_id']. ");'>Add Friend</a></div>";
				   }
			  
			 }else{
 $searchblock .= "<div class='dcBtn'><a id='addFrnd".$req[0]['user_id']."' href='javascript:void(0);' onclick='addSearchFrnd(" .$req[0]['user_id']. ");'>Add Friend</a></div>";
			 }
               $searchblock .= "</div>
			</div>
			  </li>	";
	
 } $searchblock .= "</ul>"; 
 echo $searchblock;
 }else $searchblock = "No friends Found Based On your Search!..";
		 

	}
else echo "No friends Found Based On your Search!..";

	

	
	
	/*	
$id = $this->session->userdata('logged_in')['account_id'];
//$condition = "user_firstname LIKE '%". $value . " %' OR user_lastname LIKE '%" . $value . "%'";

	
	$this->db->select('user_id'); 
	$this->db->from('bzz_userinfo');
	$this->db->where($condition);
	$this->db->like('user_firstname',$value); 
	$this->db->or_like('user_lastname',$value); 
	$query = $this->db->get();
	$data = $query->result_array();
	if(!empty($data))
	{
		$userdata = array();
	foreach($data as $data)
	{
		
		if($data[0]['user_id'] != $id )
		{
			  $this->db->select('*');
			  $this->db->from('bzz_users');
			  $this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$data['user_id']);
			  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
			  $this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
			 // $this->db->where($condition);
			  $query = $this->db->get();
			  $frnds = $query->result_array();
			  $userdata[] = $frnds;
	}
	
	}
	
	$searchblock = "";
		   
          
             if($userdata) {
				 
				 $searchblock .= "
		   
      <ul class='groupEditBlock'> ";   
				  foreach($userdata as $req){
        $searchblock .= " <li class='col-md-4'>
        	<div class='fdblock'>
<figure class='myfriendspfpic'><img src='" . base_url() ."uploads/".$req[0]['user_img_thumb']."' alt='". $req[0]['user_firstname'] . " " .$req[0]['user_lastname'] ."'></figure>
		 <div class='friendInfo'>
            <h3>". $req[0]['user_firstname'] . " " .$req[0]['user_lastname']."</h3>";
 $friendscount = $this->friendsmodel->get_frnds_frnds($req[0]['user_id']); if($friendscount) { $frnds = count($friendscount); }else $frnds = '0' ;
			 $searchblock .= "<span>(". $frnds ." "." friends)</span>
              <div class='disc'>";
			  
			  $myfrnd = $this->user_frnds($req[0]['user_id']);
			 if($myfrnd){
			//print_r($myfrnd);
			 if($myfrnd[0]['request_status'] == 'Y') 
				   {
               $searchblock .= "<div class='dcBtn'><a href='javascript:void(0);'>Friends</a></div>";
				   }elseif( $myfrnd[0]['request_status'] == 'W'){
			 $searchblock .= "<div class='dcBtn'><a href='javascript:void(0);'>Request Sent</a></div>";
				   }else{
			 $searchblock .= "<div class='dcBtn'><a id='addFrnd'
			  href='javascript:void(0);' onclick='addSearchFrnd(" .$req[0]['user_id']. ");'>Add Friend</a></div>";
				   }
			  
			 }else{
 $searchblock .= "<div class='dcBtn'><a id='addFrnd' href='javascript:void(0);' onclick='addSearchFrnd(" .$req[0]['user_id']. ");'>Add Friend</a></div>";
			 }
               $searchblock .= "</div>
			</div>
			  </li>	";
	
 } $searchblock .= "</ul>"; 
 echo $searchblock;
 }else $searchblock = "No friends Found Based On your Search!..";
		 

	}
else echo "No friends Found Based On your Search!..";
*/}

public function user_frnds($frnd_id)
{
	$id = $this->session->userdata('logged_in')['account_id'];
  	$condition = "(user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')"; 
	$this->db->select('*');
	$this->db->from('bzz_userfriends');
	$this->db->where($condition);
	$query = $this->db->get();
	if($query->num_rows >0)
	{
	return $query->result_array();
}return false;
}

	public function addFollowFriend_Request($frnd_id)
	{
		
		$id = $this->session->userdata('logged_in')['account_id'];
	$frndcondition = "((user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')) AND (request_status!='Y' OR request_status!='W')"; 
		
		//$frndcondition =  "user_id =" . "'" . $frnd_id . "' AND (request_status!='Y' OR request_status!='W') AND friend_id =" . "'" . $id . "'" ;
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($frndcondition);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data)
		{
	
	    $condition = "(user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')"; 
		
			$data = array(
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
		}
		else{
			 $condition = "(user_id ='" .$frnd_id. "' or friend_id ='".$frnd_id."') AND (user_id = '".$id."' or friend_id ='".$id."')"; 
		
			$data = array(
				'user_id' => $id,
				'friend_id' => $frnd_id,
               'request_status' => 'W',
            );
			$this->db->where($condition);
			$this->db->insert('bzz_userfriends', $data); 
		
		}
	
	}
	
}
?>