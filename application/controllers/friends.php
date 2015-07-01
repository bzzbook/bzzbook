<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('friendsmodel');
	    $is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }

public function index()
{  
         $data['friends'] = $this->friendsmodel->getfriends();	
	     $data['content']='friends';
	     $this->load->view('template-view',$data);
	  //$this->load->view('posts');	
}
public function confirmrequest($id)
{
	$data['friends'] = $this->friendsmodel->confirmfriend($id);	
}
public function denyrequest($id)
{
	$data['friends'] = $this->friendsmodel->denyfriend($id);	
}
public function blockrequest($id)
{
	$data['friends'] = $this->friendsmodel->blockfriend($id);	
}
public function movefriend($frndid,$groupid)
{
	$this->load->model('friendsmodel');
	if($this->friendsmodel->appendFriend($frndid,$groupid))
	echo 'Friend Added to the group';
	else 
	return false;
}

// add friends functionality by sp on 10-04-2015
public function addFriend($id)
{
	$data['result'] = $this->friendsmodel->addFriend_Request($id);	
}


public function addFriendFromSearch($id)
{
	$data['result'] = $this->friendsmodel->addSearchFriend_Request($id);	
}

public function addFriendFromFollowers($id)
{
	$data['result'] = $this->friendsmodel->addFollowFriend_Request($id);	
}
//function for displaying all users by randomly to send friend requests

public function find_frnds()
{
	$data['result'] = $this->friendsmodel->finding_friends();
}

public function find_related_frnds()
{
	$data['result'] = $this->friendsmodel->related_friends();
}

public function search_frnds($value)
{
	$data['result'] = $this->friendsmodel->search_friends($value);
}
public function search_members($value,$specific_search='')
{
	$data['result'] = $this->friendsmodel->search_members($value,$specific_search);
}
public function view_all_reqs()
{  
         //$data['friends'] = $this->friendsmodel->getfriends();	
	     $data['content']='all_add_friends';
	     $this->load->view('full_content_view',$data);
	  //$this->load->view('posts');	
}

public function view_all_pending_reqs()
{  
         //$data['friends'] = $this->friendsmodel->getfriends();	
	     $data['content']='all_pending_frnd_requests';
	     $this->load->view('full_content_view',$data);
	  //$this->load->view('posts');	
}
public function view_all_latest_frnds()
{  
         //$data['friends'] = $this->friendsmodel->getfriends();	
	     $data['content']='all_latest_friends';
	     $this->load->view('full_content_view',$data);
	  //$this->load->view('posts');	
}
public function getfriendsuggestion($name,$addeduser=''){
	$suggestions = $this->friendsmodel->getfriends($name,$addeduser);
	if($suggestions){
	foreach($suggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addfrndtogostpost(".$suggestion['id'].",&#39;".$suggestion['name']."&#39;)'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}
public function getfriendsfortagging($name,$addeduser=''){
	$suggestions = $this->friendsmodel->getfriends($name,$addeduser);
	//print_r($suggestions);exit;
	if($suggestions){
	foreach($suggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addfrndfortagging(".$suggestion['id'].",&#39;".$suggestion['name']."&#39;)'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}

public function getfriendsfortaggingtoevent($name,$addeduser=''){
	$suggestions = $this->friendsmodel->getfriends($name,$addeduser);
	//print_r($suggestions);exit;
	if($suggestions){
	foreach($suggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addfrndforeventtagging(".$suggestion['id'].",&#39;".$suggestion['name']."&#39;)'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}
public function getinvitefriendsuggestion($name,$addeduser=''){
	$invitedsuggestions = $this->friendsmodel->invite_friends_to_user_event($name,$addeduser);
	if($invitedsuggestions){
	foreach($invitedsuggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addinvitedfriends(".$suggestion['id'].",&#39;".$suggestion['name']."&#39;,&#39;".$suggestion['image']."&#39;)'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}

public function getinvitefriend_suggestion_main($name,$event_id){
	$invitedsuggestions = $this->friendsmodel->invite_friends_to_user_event($name);
	if($invitedsuggestions){
	foreach($invitedsuggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addinvitedfriendsmain(".$suggestion['id'].",".$event_id.")'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}

public function getfriend_bc_suggestion($name,$addeduser=''){
	$suggestions = $this->friendsmodel->getfriends($name,$addeduser);
	if($suggestions){
	foreach($suggestions as $suggestion){
	echo "<div class='as_frnd_container' onclick='addfrndtobcpost(".$suggestion['id'].",&#39;".$suggestion['name']."&#39;)'><div class='as_frnd_img'><img src='".base_url().'uploads/'.$suggestion['image']."'/></div><div class='as_frnd_name'>".$suggestion['name']."</div><div class='clearfix' ></div></div>";
	}
	}
	else
	echo 'No match found';
}

public function get_friend_invitation($limit=''){
	$invitations = $this->friendsmodel->user_frnds_by_id($limit);

    $data_count =  count($invitations);	
	//echo $data_count;
	if($invitations){
		
	echo $data= "<div class='data_count invited' id='count".$data_count."'><h5>Friends ( ".$data_count." )</h5>";
	foreach($invitations as $invitation){
		if(!empty($invitation[0]['user_img_name']))
		{
			$image = $invitation[0]['user_img_name'];
		}else
		{
			$image = 'default_profile_pic.png';
		}
	echo "<div class='as_frnd_container'><div class='col-md-2 invite_imge'><img src='".base_url().'uploads/'.$image."' alt='No Image' style='width:48px; height:48px;'/></div><div class='col-md-8'><h6>".$invitation[0]['user_firstname']." ".$invitation[0]['user_lastname']."</h6><p>visakhapatnam</p></div><div class='col-md-2 selected_image'><img src='" .base_url()."images/round1.png' alt='' onclick='addinvitedfriends(".$invitation[0]['user_id'].",&#39;".$invitation[0]['user_firstname']." ".$invitation[0]['user_lastname']."&#39;,&#39;".$image."&#39;)' /></div><div class='clearfix'></div></div></div>";
	
	
	}
	}
	else
	echo 'No match found';
}
public function get_online_frnds(){

$friends = $this->friendsmodel->get_online_frnds();  
if($friends){ foreach($friends as $frnd){ echo "<a href='javascript:void(0)' onclick='chatWith(&#39;".$frnd['username']."&#39;)' ><li><div class='col-md-2 rig_img'><img src='".base_url().'uploads/'.$frnd['image']."' title='".$frnd['name']."' /></div>
    <div class='col-md-8 rig_box'> <p>".$frnd['name']."</p></div>
    <div class='col-md-2 rig_mobile'><img src='".base_url(); 
if($frnd['last_active']>(time()-900))
echo "images/green.png'  /></div><div class='clearfix'></div></li></a>"; 
else
echo "images/grey.png'  /></div><div class='clearfix'></div></li></a>"; 
}}
exit(0);
}

}
?>