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



}
?>