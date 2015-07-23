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