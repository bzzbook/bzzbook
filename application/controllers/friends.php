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
}
?>