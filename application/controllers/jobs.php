<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {
	 
	  public function __construct() {
		  
        parent::__construct();
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
	
    }
	public function index()
	{
	
	 
	}
	
	public function disp_jobs($id)
	{
	$this->load->model('jobmodel');
	//$id = $this->session->userdata('cmp_session')['cmp_id'];
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id); 
    $data['content']='create_jobs';
	$this->load->view('cmp-template-view',$data);
	}
	public function job_view($cmp_id,$job_id)
	{
		$data['cmp_info'] =  $this->companies->get_cmp_by_id($cmp_id);
		$data['job'] = $this->jobmodel->getJob($job_id);
		$data['content']='job_view';
		$this->load->view('cmp-fulltemplate-view',$data);
	}
	public function applicants($cmp_id)
	{
		$data['cmp_info'] =  $this->companies->get_cmp_by_id($cmp_id);
		$data['applicants'] = $this->jobmodel->getapplicants($cmp_id);
		$data['content']='applicants_view';
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
  
  public function search_jobs($search_input='')
  {
	  
	 $searchjob['industry'] = $this->input->post('industry');
	 $searchjob['usa_states'] = $this->input->post('usa_states');
	 if(!empty($search_input))
	 $searchjob['search_input'] = $search_input;
	 $data['jobs'] = $this->jobmodel->search_category_jobs($searchjob);
	 $data['content']='jobs_search';
	 $this->load->view('template-view',$data);
  }
  
  

  
public function get_jobs_by_search()
{
	
	
	if(isset($_POST['job_search_industries']))
	{
		$industries = $_POST['job_search_industries'];
	}else
	{
		$industries = ''; 
	}
	if(isset($_POST['job_search_job_type']))
	{
		$job_types = $_POST['job_search_job_type'];
	}else{
			$job_types = '';
	}

  $data['jobs'] = $this->jobmodel->get_jobs_by_searchblock($_POST['country'],$_POST['postalCode'],$industries,$job_types);
   
   $data['content']='user_searched_jobs_list';
   $this->load->view('full_right_content_view',$data);
	
}


public function hide_a_job()
{
	$user_id = $this->session->userdata('logged_in')['account_id'];
	//echo "hai";
	if($this->db->select('*')->from('bzz_hidden_jobs')->where('user_id',$user_id)->where('hidden_job_id',$_POST['job_id'])->get()->num_rows() > 0)
	{
		$data = array(
		'user_id' => $user_id,
		'hidden_job_id' => $_POST['job_id'],
		'hidden_time' => date("Y-m-d H:i:s")
		);
		
		
		$this->db->where('user_id',$user_id);
		$this->db->where('hidden_job_id',$_POST['job_id']);
		$this->db->update('bzz_hidden_jobs',$data);
		
	}else{
		
		$insert_data = array(
		'user_id' => $user_id,
		'hidden_job_id' => $_POST['job_id'],
		);
		
		$this->db->insert('bzz_hidden_jobs',$insert_data);
		
	}
	
	
}
  
public function remove_hide_a_job()
{
	$user_id = $this->session->userdata('logged_in')['account_id'];
	if($this->db->select('*')->from('bzz_hidden_jobs')->where('user_id',$user_id)->where('hidden_job_id',$_POST['job_id'])->get()->num_rows() > 0)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('hidden_job_id',$_POST['job_id']);
		$this->db->delete('bzz_hidden_jobs');
	}
	return false;
}


public function disp_all_cmp_jobs($id)
	{

	$data['jobs'] =  $this->jobmodel->getJobs($id); 
	//print_r($data);
    $data['content']='user_searched_jobs_list';
    $this->load->view('full_right_content_view',$data);
	}  
	
	
public function similarjobs()
{
	
	
	$data['jobs'] = $this->jobmodel->get_similar_jobs($_GET['company_id'],$_GET['job_title'],$_GET['job_keyword'],$_GET['country'],$_GET['company_country'],$_GET['company_name']);
	$data['content']='user_searched_jobs_list';
    $this->load->view('full_right_content_view',$data);
	
}
  
public function job_description($job_id,$cmp_id)
{
	
	$data['job_applicants'] = $this->jobmodel->get_job_applicants($job_id);
	$data['job_desc'] = $this->jobmodel->get_job_details($job_id);
	$data['company_jobs'] =  $this->jobmodel->getJobs($cmp_id); 
	$job_data = $this->jobmodel->get_job_details($job_id);

	$data['similar_jobs'] = $this->jobmodel->get_similar_jobs($job_data[0]['companyinfo_id'],$job_data[0]['job_title'],$job_data[0]['job_keyword'],$job_data[0]['country'],$job_data[0]['company_country'],$job_data[0]['cmp_name']);
	$data['content']='job_full_description';
    $this->load->view('full_right_content_view',$data);
	
}

public function get_jobs_by_search_bar()
{
	
	if(isset($_POST['job_search_bar'])){
	
	$data['jobs'] = $this->jobmodel->job_search_by_searchbar($_POST['job_search_bar']);
	$data['content']='user_searched_jobs_list';
    $this->load->view('full_right_content_view',$data);
	}
	
}
}


?>