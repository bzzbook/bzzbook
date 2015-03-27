<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {
	 
	  public function __construct() {
		  
        parent::__construct();
		
	
    }
	public function index()
	{
	$this->load->model('jobmodel');
	$id = $this->session->userdata('cmp_session')['cmp_id'];
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id); 
    $data['content']='create_jobs';
	$this->load->view('cmp-template-view',$data);
	}
	
	public function create_job()
	{
	 parse_str($_POST['formdata'],$job_info);
	 $this->load->model('jobmodel');
	 $returninfo = $this->jobmodel->insert_jobs($job_info);
	 if($returninfo != false):
	  	$job_info['inserted_id'] = $returninfo;
	 	echo $this->load->view('job_field');
	 else:
	 	return false;
	 endif;
	}
	
 	public function job_btn()
	{
		$user_id = $this->session->userdata('logged_in')['account_id']; 
		$cmp_id = $this->session->userdata('cmp_id');
		$this->load->model('jobmodel');
		$data  = $this->jobmodel->check_btn();
		/*print_r($data);
		echo $data[0]['user_id'];
		
		echo $user_id;
		
		echo $cmp_id; 
		echo $data[0]['companyinfo_id'];
		exit;*/
		if($user_id == $data[0]['user_id'] && $cmp_id == $data[0]['companyinfo_id'])
		{
			echo "success";
		}
		return false;
	}

  public function jobDelete($id)
  {
	  $this->jobmodel->delJobDetails($id);
      redirect("profile/jobs");
  }
  
  public function jobEdit()
  {
	  
	   $data = $this->jobmodel->editJobDetails($_POST['job_id']);
	   foreach( $data as $result):
		$job_data['company_posted_by'] = $result->company_posted_by;
		$job_data['job_title'] = $result->job_title;
		$job_data['job_type'] = $result->job_type;
		$job_data['job_category'] = $result->job_category;
		$job_data['job_keyword'] = $result->job_keyword;
		$job_data['job_salary'] = $result->job_salary;
		$job_data['job_contact_phone'] = $result->job_contact_phone;
		$job_data['job_contact_email'] = $result->job_contact_email;
		$job_data['job_contact_name'] = $result->job_contact_name;
		$job_data['job_how_to_apply'] = $result->job_how_to_apply;
		$job_data['job_description'] = $result->job_description;
		$job_data['job_requirements'] = $result->job_requirements;
		$job_data['post_date'] = $result->post_date;
		
	endforeach;
	echo json_encode($job_data);
  }
}


?>