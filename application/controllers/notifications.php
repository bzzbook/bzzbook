<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications extends CI_Controller {
	 
	public function __construct() {
        parent::__construct();
    }
	public function index()
	{
		
		//$this->load->model('notifications');
		$this->mdlnotifications->post_notifications();
		$this->mdlnotifications->like_notifications();
		$this->mdlnotifications->comment_notifications();
		$this->mdlnotifications->share_notifications();
		
		$this->mdlnotifications->cmt_like_notifications();
		$this->mdlnotifications->photo_cmt_notifications();
		$this->mdlnotifications->photo_cmt_like_ntfc();
	}
	public function getNotifications(){
		$this->mdlnotifications->getNotifications();
	}
	public function getNtfsCount(){
		$count =  $this->mdlnotifications->get_unread_count();
		echo $count;
	}
}

?>