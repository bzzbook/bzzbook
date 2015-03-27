<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	 
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
	public function sign_up()
	{
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
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
		
		$this->load->model('companies');
		$this->companies->sign_up($data);	
		$this->session->set_flashdata('comp_success', 'Sign Up Successfully. We will get back to you shortly');
		$this->load->view('sign_in_v');
		}
	}
	
	public function my_companies()
	{
		 $data['result'] = $this->companies->companies_list();
		 $data['content']='my_companies';
	     $this->load->view('template-view',$data);
	}
	
public function addcompany()
	{
		
	    $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('uploadform', $error);
		}
		else
		{
			$filedata = $this->upload->data();
			$data['company_image'] = $filedata['file_name'];
		
		}
	   
		
	    $data['cmp_name'] = $this->input->post('cmp_name');
		$data['cmp_industry'] = $this->input->post('cmp_industry');
		$data['cmp_estb'] = $this->input->post('cmp_estb');
		$data['cmp_colleagues'] = $this->input->post('cmp_colleagues');
		$data['cmp_about'] = $this->input->post('cmp_about');
		$data['company_address'] = $this->input->post('company_address');
		$data['company_state'] = $this->input->post('company_state');
		$data['company_city'] = $this->input->post('company_city');
		$data['company_postalcode'] = $this->input->post('company_postalcode');
		$data['company_email'] = $this->input->post('company_email');
		$data['company_phone'] = $this->input->post('company_phone');
		$data['company_office'] = $this->input->post('company_office');
		$data['company_fax'] = $this->input->post('company_fax');
		$data['user_id']= $this->session->userdata('logged_in')['account_id'];
		
		 $data['result'] = $this->companies->managecompanydata($data);
		 $data['content']='my_companies';
	     $this->load->view('template-view',$data);
		//$img_name ="52.jpg";
		/*$this->load->model('companies');
	   parse_str($_POST['formdata'],$company_info);
	   $returninfo = $this->companies->managecompanydata($company_info,$img_name);
	   if($returninfo != false):
	  echo "true";
	  // $company_info['inserted_id'] = $returninfo;
	 else:
	 	return false;
	 endif;*/
		
	}
	
	public function cmp_follow($cmpinfo_id)
	{
		
		 $data['companyinfo_id'] = $cmpinfo_id;
		 $data['user_id'] = $this->session->userdata('logged_in')['account_id'];
		 $data['follow_status'] = 'Y';
	     $data['result'] = $this->companies->company_follow($data);
		 $data['content']='my_companies';
	     $this->load->view('template-view',$data);
		
	}
		public function cmp_unfollow($cmpinfo_id)
	{ 
		 $data['result'] = $this->companies->company_unfollow($cmpinfo_id);
		 $data['content']='my_companies';
	     $this->load->view('template-view',$data);
		
	}
	public function company_disp($cmpinfo_id)
	{
		//$id = $this->session->userdata('logged_in')['account_id'];
		//$this->session->unset_userdata('logged_in');
		$cmp_session = array( 'cmp_id' => $cmpinfo_id);
		$this->session->set_userdata($cmp_session);
		$data['content']='cmp_posts';
	    $this->load->view('cmp-template-view',$data);
		
	}

}




?>