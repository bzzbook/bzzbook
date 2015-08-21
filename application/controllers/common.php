<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common extends CI_Controller {
	 
	public function __construct() {
        parent::__construct();
    }
	public function singlecall($recent_post_id)
	{
		$single_call_data = array();
		
		//showOnlineFriends		
		$friends = $this->friendsmodel->get_online_frnds($name=''); 
		$data1 = ''; 
		if($friends){ foreach($friends as $frnd){ 
			$data1 .= "<a href='javascript:void(0)' onclick='chatWith(&#39;".$frnd['username']."&#39;)' ><li><div class='col-md-2 rig_img'><img src='".base_url().'uploads/'.$frnd['image']."' title='".$frnd['name']."' /></div>";
			
			$name = character_limiter($frnd['name'],12);
			
			$data1 .= "<div class='col-md-8 rig_box'> <p>".$name."</p></div>
			<div class='col-md-2 rig_mobile'><img src='".base_url(); 
			if($frnd['last_active']>(time()-900))
			$data1 .=  "images/green.png'  /></div><div class='clearfix'></div></li></a>"; 
			else
			$data1 .=  "images/grey.png'  /></div><div class='clearfix'></div></li></a>"; 
		}
		}else{
			 $data1 .= '';
		}
		$single_call_data['showOnlineFriends'] = $data1;
		
		//insertNotifications
		$this->mdlnotifications->post_notifications();
		$this->mdlnotifications->like_notifications();
		$this->mdlnotifications->comment_notifications();
		$this->mdlnotifications->share_notifications();
		
		$this->mdlnotifications->cmt_like_notifications();
		$this->mdlnotifications->photo_cmt_notifications();
		$this->mdlnotifications->photo_cmt_like_ntfc();
		
		//getNtfcCount
		$data2 =  $this->mdlnotifications->get_unread_count();
		if($data2)
		$single_call_data['getNtfcCount'] = $data2;
		else
		$single_call_data['getNtfcCount'] = '';

		
		//get_recent_posts		
  	    $id = $this->session->userdata('logged_in')['account_id'];
		$hidden_posts = $this->customermodel->get_hidden_posts($id);
		
		$cur_usr_id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "(user_id ='" . $id . "' OR friend_id ='".$id."') AND request_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
			$friends = array();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			if($res)
			{
			foreach($res as $friend)	
			{
			   $friends[] =	$friend->friend_id;
			   $friends[] = $friend->user_id;
			}
			}
		}	
	   $friends[] =  $id;
	   $friends = array_unique($friends);
	 
	   $this->db->select('*');
	   
	   $this->db->from('bzz_posts');
	$user_time_condition  = "post_id > '".$recent_post_id."' AND posted_on >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND isGhostpost=0 ORDER BY post_id DESC";	
	   
	   
	    if(!empty($hidden_posts))
	 {
	   $this->db->where_not_in('post_id',$hidden_posts);
	 }
	
   $this->db->where($user_time_condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			$data = array();
			foreach($result as $res){
		    $friend_ids = explode(',',$res->posted_to);
				
			if(($res->posted_to==0 && in_array($res->posted_by,$friends)) || ($res->isGhostpost==1 && in_array($res->posted_by,$friends)) || ($res->posted_by==$id && $id==$cur_usr_id) || (in_array($id, $friend_ids) && $id==$cur_usr_id) ||  (!empty($pst_usr_id) && in_array($pst_usr_id, $friend_ids)) || ($res->posted_by==$id && in_array($cur_usr_id, $friend_ids)))
			{
				$data['products'][] = $res;
			}
			}
			
			if(!empty($data))
			{
			
			$data3 = $this->load->view('recent_posts',$data, true);	
			$single_call_data['get_recent_posts'] = $data3;
			}
			
			   } 
	   else {
	   $data3 = '';	
	   $single_call_data['get_recent_posts'] = $data3;
	   }
	   
	//get_recent_post_likes  
	$this->db->select('like_on');   
    $this->db->from('bzz_likes');
	$user_like_condition  = "datetime >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) ORDER BY like_id DESC";	
	   
    $this->db->where($user_like_condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result_array();
			$data =  array();
			foreach($result as $res)
			{
				$data[] =  $res['like_on'];
			}
			$result = array_unique($data);
			
			$like = array();
			$like_data =  array();
			foreach($result as $res)
			{
				$condition = "like_on = '".$res."' AND like_status = 'Y'";	
				$this->db->select('*');
				$this->db->from('bzz_likes');
				$this->db->where($condition);
				$query = $this->db->get();
				$likes = $query->num_rows();
				$like_data['post_id'] = $res;
				$like_data['likes'] = $likes;
				$like[] = $like_data;
			}
			if($likes){
				$data4 = $like;
			
			}
	
			}else{
				$data4 = '';
			}
			$single_call_data['get_recent_post_likes'] = $data4;
			
			
			//get_recent_comments
			$this->db->select('*');   
			$this->db->from('bzz_postcomments');
			$user_like_condition  = "commented_time >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) ORDER BY postcomments_id DESC";	
			
			$this->db->where($user_like_condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			$result =  $query->result_array();
			if($result){
			$data5 =  $result;
			}
			}
			else{
			$data5 = '';
			}
			$single_call_data['get_recent_comments'] = $data5;
			
			
	//get_latest_friends_of_user		
	
	$frnds = $this->friendsmodel->latest_frnds($limit = 3);
	$list ='' ;
	if($frnds)
	{
	$list ='<div class="latestFriends">
          <h3>Latest Friends</h3>
          <ul id="latest_frnds_by_time">';
	 foreach($frnds as $frnd) { 
		if(!empty($frnd[0]['user_img_thumb'])) { 
		$list .='<li><a href="'.base_url().'profile/user/'.$frnd[0]['user_id'].'" class="latestfrnds"><img src="'.base_url().'uploads/'.$frnd[0]['user_img_thumb'].'"></a><a href="#"><img style="width:auto; height:auto; padding-left:6px;" src="'.base_url().'images/like.png" alt=""></a></li>';
		 }else
		 $list .='<li><a href="'.base_url().'profile/user/'.$frnd[0]['user_id'].'" class="latestfrnds"><img src="'.base_url().'uploads/default_profile_pic.png" alt="'.$frnd[0]['user_firstname'] . " " .$frnd[0]['user_lastname'].'"></a><a href="#"><img style="width:auto; height:auto; padding-left:6px;" src="'.base_url().'images/like.png" alt=""></a></li>';
		}
		$list .='</ul><div class="clear"></div><a href="'.base_url().'friends/view_all_latest_frnds" class="link">More Friends</a></div>';
	$data6 = $list;
	}else{
	$data6 = '';
	}
	$single_call_data['get_latest_friends_of_user'] = $data6;
	
	//get_unread_messages
	$data7 = $this->messages->getUnReadMessages();
    $single_call_data['get_unread_messages'] = $data7;
		
	echo json_encode($single_call_data); exit(0);
	}


}

?>