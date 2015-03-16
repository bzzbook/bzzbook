<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
	
    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}
	
	public function create_event()
	{
	 parse_str($_POST['formdata'],$event_info);
	 $returninfo = $this->jobmodel->insert_jobs($event_info);
	 if($returninfo != false):
	  	$event_info['inserted_id'] = $returninfo;
	 //	echo $this->load->view('event_field');
	 else:
	 	return false;
	 endif;
	}

}
?>