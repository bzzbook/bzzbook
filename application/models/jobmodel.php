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
		'job_keyword'=>$data['job_keywords'],
		'company_posted_by'=>$data['job_company_name'],
		'job_contact_name'=>$data['cont_name'],
		'job_contact_phone'=>$data['cont_phone'],
		'job_contact_email'=>$data['cont_email'],
		'job_how_to_apply'=>$data['how_to_apply'],
		'job_description'=>$data['job_desc'],
		'job_requirements'=>$data['req_skills'],
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
	public function getJobs()
	{
		//$user_id = $this->session->userdata('logged_in')['account_id']; 
		$id = $this->session->userdata('cmp_id');
		$condition = "companyinfo_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where($condition);
		$this->db->join('bzz_companyinfo', 'bzz_companyinfo.companyinfo_id = jobs.company_posted_by');
		$query = $this->db->get();
		return $query->result_array();
	}
 
 	public function check_btn()
	{
		$user_id = $this->session->userdata('logged_in')['account_id']; 
		//$cmp_id = $this->session->userdata('cmp_id');
		$condition = "user_id =" . "'" . $user_id . "'" ;
		$this->db->select('companyinfo_id,user_id');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}
 
 
 }
 
 
 
?>
