<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobmodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	public function insert_jobs($data)
	{
		 	$jobInfo = array(
		'job_title'=>$data['job_title'],
		'job_type'=>$data['job_type'],
		'job_category'=>$data['job_category'],
		'job_salary'=>$data['job_salary'],
		'salary_basis'=>$data['salary_basis'],
		'job_keyword'=>$data['job_keywords'],
		'company_posted_by'=>$data['job_company_name'],
		'job_contact_name'=>$data['cont_name'],
		'job_contact_phone'=>$data['cont_phone'],
		'job_contact_email'=>$data['cont_email'],
		'job_how_to_apply'=>$data['how_to_apply'],
		'job_description'=>$data['job_desc'],
		'job_requirements'=>$data['req_skills'],
		'country'=>$data['country'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
		if($this->db->insert('jobs', $jobInfo))
			return $this->db->insert_id();
		else
			return false;
	} 
	public function getCompanies()
	{
		$user_id = $this->session->userdata('logged_in')['account_id']; 
		$condition = "user_id =" . "'" . $user_id . "'";
		$this->db->select('cmp_name,companyinfo_id');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getJobs($id)
	{
		//$user_id = $this->session->userdata('logged_in')['account_id']; 
		$cmp_id = $id;
		$condition = "companyinfo_id =" . "'" . $cmp_id . "'";
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where($condition);
		$this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getapplicants($cmp_id)
	{
		$condition = "company_id =" . "'" . $cmp_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_job_applications');
		$this->db->where($condition);
		$this->db->join('jobs', 'jobs.job_id = bzz_job_applications.job_id');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getJob($id)
	{
		//$user_id = $this->session->userdata('logged_in')['account_id']; 
		$cmp_id = $id;
		$condition = "job_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where($condition);
		//$this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
		$query = $this->db->get();
		return $query->result_array();
	}
 
 
 public function get_user_cmp_jobs()
  { 
	    $user_id = $this->session->userdata('logged_in')['account_id']; 
		//$id = $this->session->userdata('cmp_id');
		$condition = "user_id =" . "'" . $user_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		$job = array();
		if($query->num_rows()>0)
		{
			$companies = $query->result_array();
			
		$jobs= array();
		foreach($companies as $cmp){
			
	    $condition = "companyinfo_id =" . "'" . $cmp['companyinfo_id'] . "'";
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where($condition);
		$this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
		$query = $this->db->get();
		if($query->num_rows() >0)
		{
	    $result= $query->result_array();		
		foreach($result as $result)
		{
			$jobs[] = $result;
		}	  
		}	
		}
		return $jobs;
		 
  }
 
  }
 	public function check_btn()
	{
		$user_id = $this->session->userdata('logged_in')['account_id']; 
		//$cmp_id = $this->session->userdata('cmp_id');
		$condition = "user_id =" . "'" . $user_id . "'" ;
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$companies =  $query->result_array();
				return $companies;
		}
return false;
	}

 public function delJobDetails($id)
 {
	   $this->db->where('job_id',$id);
       $this->db->delete('jobs'); 
 }
 
 public function editJobDetails($id)
 {
	    $this->db->select('*');
		$this->db->from('jobs');
		$this->db->where('job_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
 }
 
 
 public function search_category_jobs($searchjob)
 {
	 	if(!isset($searchjob['search_input']))
		$condition = "job_category =" . "'" . $searchjob['industry'] . "'" ;
		else
		$condition = "job_title LIKE '%".$searchjob['search_input']."%' OR job_keyword LIKE '%".$searchjob['search_input']."%' OR job_requirements LIKE '%".$searchjob['search_input']."%'";
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where($condition);
		$query = $this->db->get();
		$jobs = $query->result_array();
		
		if($query->num_rows>0)
		{
			$j = array();
			foreach($jobs as $job)
			{
				$condition = "companyinfo_id =" . "'" . $job['company_posted_by'] . "'";				
				if(!isset($searchjob['search_input']))
				$condition .= " AND " . "company_state =" . "'" .  $searchjob['usa_states'].  "'"; 	
				$this->db->select('*');
				$this->db->from('bzz_companyinfo');
				$this->db->where($condition);
				$this->db->join('jobs', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
				$query = $this->db->get();
				if($query->num_rows()>0)
				{
				$job_data = $query->result_array();
				$j[] = $job_data;
				
				}
			}
			return $j;
		//$data['jobs'] = $j;
//		$data['content'] = 'job_search';
//		$this->load->view('template-view',$data);
		}
		return false;
 }
 
 public function get_jobs_by_industries()
{
	$user_id = $this->session->userdata('logged_in')['account_id'];
	$query = $this->db->select('job_seaking_options')->from('bzz_userinfo')->where('user_id',$user_id)->get();
	if($query->num_rows() > 0)
	{
	$job_interests = $query->result_array();
	
	$data = explode(",",$job_interests[0]['job_seaking_options']);
//	print_r($data);
	}
	
	$query = $this->db->select('job_seaker_jobtypes')->from('bzz_userinfo')->where('user_id',$user_id)->get();
	if($query->num_rows() > 0)
	{
	$job_types = $query->result_array();
	
	$jobtypes= explode(",",$job_types[0]['job_seaker_jobtypes']);
//	print_r($data);
	}
	
   $query = $this->db->select('hidden_job_id')->from('bzz_hidden_jobs')->where('user_id',$user_id)->get();
	if($query->num_rows() > 0)
	{
		$hidden_jobs = $query->result_array();
		$unwanted_jobs =  array();
		foreach ( $hidden_jobs as $hide_job)
		{
			$unwanted_jobs[] = $hide_job['hidden_job_id'];
		}
		
	}
	

	 $this->db->select('*');
	 $this->db->from('jobs');
	 $this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');

	 
	 if(!empty($data)) {
	 $this->db->where_in('job_category',$data);
	 }
	 if(!empty($jobtypes)) {
	 $this->db->where_in('job_type',$jobtypes);
	 }
	 
	 if(!empty($hidden_jobs))
	 {
	 $this->db->where_not_in('job_id',$unwanted_jobs);
	 }
	
	 $this->db->order_by('post_date','desc');
	 $query = $this->db->get();
	$jobs = $query->result_array();
	
	if($query->num_rows() > 0)
	{
	
	return $jobs;
	}else
	return false;
	//echo count($jobs);
	//print_r($jobs);
	
	
}
 
public function jobs_search()
{
	
	 $this->db->select('*');
	 $this->db->from('lookup');
	 $this->db->like('lookup_value',$search,'both');  
	 $query = $this->db->get();
	 if($query->num_rows() > 0)
	{
		$job_lookups = $query->result_array();
		$job_type = array();
		$industries = array();
		
		foreach($job_lookups as $look_up)
		{
			if($look_up['lookup_category'] == 'Job Type')
			{
				$job_type[] = $look_up['lookup_id'];
			}else
			if($look_up['lookup_category'] == 'Industry')
			{
				$industries[] = $look_up['lookup_id'];
			}
			
		}
		
	}

	$user_id = $this->session->userdata('logged_in')['account_id'];

   $query = $this->db->select('hidden_job_id')->from('bzz_hidden_jobs')->where('user_id',$user_id)->get();
	if($query->num_rows() > 0)
	{
		$hidden_jobs = $query->result_array();
		$unwanted_jobs =  array();
		foreach ( $hidden_jobs as $hide_job)
		{
			$unwanted_jobs[] = $hide_job['hidden_job_id'];
		}
		
	}
	

	 $this->db->select('*');
	 $this->db->from('jobs');
	 $this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
     $this->db->like('job_title',$value,'both');  
     $this->db->or_like('job_keyword',$value,'both'); 
	 $this->db->or_like('job_requirements',$value,'both');
	 $this->db->where_in('job_category',$industries);
	 $this->db->where_in('job_type',$job_type);
	 
	
	 $this->db->order_by('post_date','desc');
	 $query = $this->db->get();
	 $jobs = $query->result_array();
	 echo $this->db->last_query();
	
	if($query->num_rows() > 0)
	{
	
	return $jobs;
	}else
	return false;
	//echo count($jobs);
	//print_r($jobs);
	
	
	
} 
//get recruiter jobs {get_jobs in jobmodel controller...........}
//apply {further functionality }
//share functionality
//similar jobs
 
 }
?>
