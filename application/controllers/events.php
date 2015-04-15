<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
	$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}
	
	public function create_event()
	{
	 parse_str($_POST['formdata'],$event_info);
	 $returninfo = $this->eventmodel->insert_events($event_info);
	 if($returninfo != false):
	  	$event_info['inserted_id'] = $returninfo;
	 //	echo $this->load->view('event_field');
	 else:
	 	return false;
	 endif;
	}

}
?>