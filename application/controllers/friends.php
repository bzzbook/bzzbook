<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('friendsmodel');
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
		else
		redirect(base_url("friends"));
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



}
?>