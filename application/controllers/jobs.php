<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
	
    }
	public function index()
	{
    $data['content']='create_jobs';
	$this->load->view('template-view',$data);
	}
	
	public function create_job()
	{
	 parse_str($_POST['formdata'],$job_info);
	 $returninfo = $this->jobmodel->insert_jobs($job_info);
	 if($returninfo != false):
	  	$job_info['inserted_id'] = $returninfo;
	 	echo $this->load->view('job_field');
	 else:
	 	return false;
	 endif;
	}

}
?>