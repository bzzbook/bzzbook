<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class company_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }
	public function sign_up()
	{
	$this->load->model('lookup_model');
	$data['industry'] = $this->lookup_model->get_lookup_industry();
	$this->load->view('company_sign_up',$data);
	}
	

   public function comp_sign_up()
   {
	    $this->form_validation->set_rules('company_name','Company Name','required|xss_clean');
	    $this->form_validation->set_rules('industry','Industry','required|xss_clean');
		$this->form_validation->set_rules('established_year','Established Year','required|xss_clean');
		$this->form_validation->set_rules('collegues','Collegues','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('user_name','User Name','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|matches[conf_password]|xss_clean|md5');
		$this->form_validation->set_rules('conf_password','Password Confirmation','trim|required|xss_clean|md5');
		$this->form_validation->set_rules('country','Country','required|xss_clean');
		$this->form_validation->set_rules('state','State','required|xss_clean');
		$this->form_validation->set_rules('city','City','required|xss_clean');
		$this->form_validation->set_rules('postal_code','Postal Code','required|xss_clean');
    	$this->form_validation->set_rules('about_company','About Company','required');
		$this->form_validation->set_rules('agree','Terms & Conditions','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('company_sign_up');
		}else{
		$data['company_name'] = $this->input->post('company_name');
		$data['industry'] = $this->input->post('industry');
		$data['established_year'] = $this->input->post('established_year');
		$data['collegues'] = $this->input->post('collegues');
		$data['email'] = $this->input->post('email');
		$data['user_name'] = $this->input->post('user_name');
		$data['password'] = $this->input->post('password');
		$data['con_password'] = $this->input->post('conf_password');
		$data['country'] = $this->input->post('country');
		$data['state'] = $this->input->post('state');
		$data['city'] = $this->input->post('city');
		$data['postal_code'] = $this->input->post('postal_code');
		$data['about'] = $this->input->post('about_company');
		$data['terms_conditions'] = $this->input->post('agree');
		
		$this->load->model('company_model');
		$this->company_model->sign_up($data);	
		$this->session->set_flashdata('comp_success', 'Sign Up Successfully. We will get back to you shortly');
		$this->load->view('sign_in');
		}
	}
}

?>