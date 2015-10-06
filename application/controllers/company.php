<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	 
	public function __construct(){
        parent::__construct();
    }
	
	public function index()
	{
	
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
	
	public function my_companies($user_id='')
	{
		 if(!empty($user_id))
		 $data['user_id'] = $user_id;
		 $data['result'] = $this->companies->companies_list(0,$user_id);
		 $data['content']='my_companies';
	     $this->load->view('full_content_view',$data);
	}
	
public function addcompany()
	{
		
	    $config['upload_path'] = DIR_FILE_PATH;
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
		$data['company_country'] = $this->input->post('contries');
		$data['company_state'] = $this->input->post('states');
		$data['company_city'] = $this->input->post('company_city');
		$data['company_postalcode'] = $this->input->post('company_postalcode');
		$data['company_email'] = $this->input->post('company_email');
		$data['company_phone'] = $this->input->post('company_phone');
		$data['company_office'] = $this->input->post('company_office');
		$data['company_fax'] = $this->input->post('company_fax');
		$data['user_id']= $this->session->userdata('logged_in')['account_id'];
		
		
		 $companyinfo_id = $this->companies->managecompanydata($data);
		 
		 $settings['profile_visible'] = 'Y';
		 $settings['comments_visible'] = 'Y';
		 $settings['email_notification'] = 'Y';
		 $settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
		 $settings['companyinfo_id'] = $companyinfo_id;
		 
		 $resut = $this->companies->managecmp_settings($settings);
		 
		 $data['content']='my_companies';
	     $this->load->view('full_content_view',$data);
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
	public function applyjob($cmp_id,$job_id)
	{
		
	    $config['upload_path'] = DIR_FILE_PATH;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= '2048';
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
			$data['resume'] = $filedata['file_name'];
		
		}
		/*$this->form_validation->set_rules('name','Applicant Name','required|xss_clean');
	    $this->form_validation->set_rules('email','Applicant Email','required|xss_clean');
		$this->form_validation->set_rules('phone','Phonr No','required|xss_clean');
		$this->form_validation->set_rules('skills','Skills','required|xss_clean');*/
		
	    $data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['skills'] = $this->input->post('skills');
		$data['message'] = $this->input->post('message');
		$data['company_id'] = $cmp_id;
		$data['job_id'] = $job_id;
		$data['user_id'] = $this->session->userdata('logged_in')['account_id'];		
	    $applicant_id = $this->companies->applyjob($data);
		if($applicant_id)
		{
			$this->session->set_flashdata('application_status', 'Your application submitted successfully');
			redirect('jobs/job_view/'.$cmp_id.'/'.$job_id);
		}
		
	}

	
	public function cmp_follow($follow_as,$cmpinfo_id)
	{

	     $data['result'] = $this->companies->company_follow($follow_as,$cmpinfo_id);
	
	}
	public function cmp_view_follow($cmpinfo_id,$follow_as)
	{
		  $data['result'] = $this->companies->company_view_follow($cmpinfo_id,$follow_as);
	}
	
	public function cmp_follow_req_accept($user_id,$cmp_id)
	{
		$data['result'] = $this->companies->company_follow_req_accept($user_id,$cmp_id);
	}
	
	public function cmp_follow_req_deny($user_id,$cmp_id)
	{
		$data['result'] = $this->companies->company_follow_req_accept($user_id,$cmp_id,'N');
	}
	
	public function cmp_view_unfollow($cmpinfo_id)
	{
		  $data['result'] = $this->companies->company_unfollow($cmpinfo_id);
	}
	
		public function cmp_unfollow($cmpinfo_id)
	{ 
		 $data['result'] = $this->companies->company_unfollow($cmpinfo_id);
		 $data['content']='my_companies';
	     $this->load->view('full_content_view',$data);
		
	}
	public function company_disp($cmpinfo_id)
	{

		$data['cmp_info'] =  $this->companies->get_cmp_by_id($cmpinfo_id);
		$data['user_id'] = '';
		//$id = $this->session->userdata('logged_in')['account_id'];
		//$this->session->unset_userdata('logged_in');
		//$cmp_session = array( 'cmp_id' => $cmpinfo_id);
		//$this->session->set_userdata($cmp_session);
		$data['content']='cmp_posts';
	    $this->load->view('cmp-template-view',$data);
		
	}
public function geturisegment()
{
	return $this->uri->segment(3,0); 
}

public function get_company_byid($id)
{
	$data['industry'] = $this->lookup->get_lookup_industry();
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	//$data['company'] = $this->companies->get_cmp_by_id($id);
	$data['content']='cmp_settings';
	$this->load->view('cmp-template-view',$data);
		
}

public function get_company_info_byid($id)
{
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	$data['company_info'] =  $this->companies->get_cmp_by_id($id);
	//$data['company'] = $this->companies->get_cmp_by_id($id);
	$data['content']='company_info';
	$this->load->view('cmp-fulltemplate-view',$data);
}
public function pic_upload()
{
	
		$config['upload_path'] = DIR_FILE_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
	$data = $this->upload->data();
	$id = $this->input->post('cmp_id');
	$dataa = array(
	'company_image' => $data['file_name']
	);
	$result = $this->companies->update_pic($dataa,$id);
	$this->get_company_byid($id);
}
}


public function updateprivacy($id)
{
	parse_str($_POST['formdata'],$privacyformdata);
   echo $this->companies->updatePrivacyInfo($privacyformdata,$id);
	
}
public function updateemailnotification($id)
  {
	  	parse_str($_POST['formdata'],$notificationdata);
		echo $this->companies->updateEmailInfo($notificationdata,$id);
  }
  
public function updateabout($id)
  {
		parse_str($_POST['form_data'], $aboutformdata);
	   echo $this->companies->updateAboutInfo($aboutformdata,$id);
  }
  
   public function postboard_update($id)
  {
	  parse_str($_POST['form_data'],$postboard_info);
	if($this->companies->managepostboarddata($postboard_info,$id))
	echo "success";
	else
	return false;
  }
public function get_my_followers($id)
{
	
	$data['followers'] = $this->companies->get_followers($id);
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	//$data['company'] = $this->companies->get_cmp_by_id($id);
	$data['content']='cmp_followers';
	$this->load->view('cmp-fulltemplate-view',$data);	
}

public function search_companies()
{
	 $searchcompanies['industry'] = $this->input->post('industry');
	 $searchcompanies['usa_states'] = $this->input->post('usa_states');
	 $data['search_result_companies'] = $this->companies->search_category_companies($searchcompanies);
	 $data['content']='companies_search';
	 $this->load->view('full_content_view',$data);
}

public function view_all_other_cmps()
{
	   $data['content']='all_companies_to_follow';
	     $this->load->view('full_content_view',$data);
}

public function cmp_name_search($keyword)
{
	 
 //$keyword = $this->input->post('term');
 
 //$data['response'] = 'false'; //Set default response
 
 $cmpdata = $this->companies->all_cmp_names_search($keyword); //Model DB search
 $companies = array();
 if(!empty($cmpdata))
 {
 foreach($cmpdata as $data)
 {
		
	echo "<div class='as_frnd_container' onclick='addtocmpname(&#39;".$data['cmp_name']."&#39;)'><div class='as_frnd_name'>".$data['cmp_name']."</div><div class='clearfix' ></div></div>";
 }

 }else

	 echo "No Results found!..";
}


public function allSearch($category,$search_data)
{
	echo $category;
	echo $search_data;
}
public function create_page($id)
{
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
    $data['check_button'] =  $this->eventmodel->checkbutton($id);
	$data['cmp_id'] = $id;
	$this->session->unset_userdata('file_error');
	$data['content']='cmp_create_page';
	$this->load->view('create_page_view',$data);
	//$this->load->view('about_me',$data);
}
public function add_bus_page($id){
		//print_r($_POST); exit;
		//print_r($_FILES); exit;
		$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
		$data['cmp_id'] = $id;
		$this->form_validation->set_rules('bus_sub_category', 'Sub Category', 'required|greater_than[0]');		
		$this->form_validation->set_rules('bus_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');		
		$this->form_validation->set_rules('bus_address', 'Address', 'required');	
		$this->form_validation->set_rules('bus_city_state', 'City/State', 'required');
		$this->form_validation->set_rules('bus_zip_code', 'Zipcode', 'required');	
		$this->form_validation->set_rules('bus_phone', 'Phone', 'required|numeric');		
		$this->form_validation->set_rules('bus_description', 'Description', '');
		$this->form_validation->set_rules('bus_website_url', 'Website', '');
		$this->form_validation->set_rules('bus_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('bus_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('bus_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('bus_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('bus_aud_gender', 'Gender', '');
		
		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'overview';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['current_tab']);  
		}else{
			if($_FILES['bus_page_image']['name']!=''){
						
				$up_res = $this->ajax_image_upload('bus_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'overview';
				$this->load->view('create_page_view',$data);
				}
			}
				$insertdata['page_name'] = $this->input->post('bus_page_name');
				$insertdata['address'] = $this->input->post('bus_address');
				$insertdata['city_state'] = $this->input->post('bus_city_state');
				$insertdata['zip_code'] = $this->input->post('bus_zip_code');
				$insertdata['phone'] = $this->input->post('bus_phone');
				$insertdata['description'] = $this->input->post('bus_description');
				$insertdata['website_url'] = $this->input->post('bus_website_url');
				$insertdata['places_can_connect'] = $this->input->post('bus_places_can_connect');
				$insertdata['aud_interests'] = $this->input->post('bus_aud_interests');
				$insertdata['aud_min_age'] = $this->input->post('bus_aud_min_age');
				$insertdata['aud_max_age'] = $this->input->post('bus_aud_max_age');
				$insertdata['aud_gender'] = $this->input->post('bus_aud_gender');
				$insertdata['main_category'] = 1;
				$insertdata['sub_category'] = $this->input->post('bus_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managecmp_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function add_cmp_page($id){
		//print_r($_POST); exit;
		
				$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
$data['cmp_id'] = $id;
		$this->form_validation->set_rules('cmp_sub_category', 'Sub Category', 'required|greater_than[0]');		
		$this->form_validation->set_rules('cmp_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');		
		
		$this->form_validation->set_rules('cmp_description', 'Description', '');		
		$this->form_validation->set_rules('cmp_website_url', 'Website', '');
		$this->form_validation->set_rules('cmp_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('cmp_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('cmp_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('cmp_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('cmp_aud_gender', 'Gender', '');

		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'education';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['current_tab']);  
		}else{
			if($_FILES['cmp_page_image']['name']!=''){				
				$up_res = $this->ajax_image_upload('cmp_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{
					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'education';
				$this->load->view('create_page_view',$data);
				}
			}
		        $insertdata['page_name'] = $this->input->post('cmp_page_name');
				$insertdata['description'] = $this->input->post('cmp_description');
				$insertdata['website_url'] = $this->input->post('cmp_website_url');
				$insertdata['places_can_connect'] = $this->input->post('cmp_places_can_connect');
				$insertdata['aud_interests'] = $this->input->post('cmp_aud_interests');
				$insertdata['aud_min_age'] = $this->input->post('cmp_aud_min_age');
				$insertdata['aud_max_age'] = $this->input->post('cmp_aud_max_age');
				$insertdata['aud_gender'] = $this->input->post('cmp_aud_gender');
				$insertdata['main_category'] = 2;
				$insertdata['sub_category'] = $this->input->post('cmp_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managecmp_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function add_brand_page($id){
		//print_r($_POST); exit;
				$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
$data['cmp_id'] = $id;
		$this->form_validation->set_rules('brand_sub_category', 'Sub Category', 'required|greater_than[0]');		
		$this->form_validation->set_rules('brand_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');		
		
		$this->form_validation->set_rules('brand_description', 'Description', '');	
		$this->form_validation->set_rules('brand_website_url', 'Website', '');
		$this->form_validation->set_rules('brand_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('brand_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('brand_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('brand_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('brand_aud_gender', 'Gender', '');
			


		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'place';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['current_tab']);  
		}else{
			if($_FILES['brand_page_image']['name']!=''){				
				$up_res = $this->ajax_image_upload('brand_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{
					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'place';
				$this->load->view('create_page_view',$data);
				}
			}
		       $insertdata['page_name'] = $this->input->post('brand_page_name');
$insertdata['description'] = $this->input->post('brand_description');
$insertdata['website_url'] = $this->input->post('brand_website_url');
$insertdata['places_can_connect'] = $this->input->post('brand_places_can_connect');
$insertdata['aud_interests'] = $this->input->post('brand_aud_interests');
$insertdata['aud_min_age'] = $this->input->post('brand_aud_min_age');
$insertdata['aud_max_age'] = $this->input->post('brand_aud_max_age');
$insertdata['aud_gender'] = $this->input->post('brand_aud_gender');
$insertdata['main_category'] = 3;
$insertdata['sub_category'] = $this->input->post('brand_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managebrand_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function add_art_page($id){
		//print_r($_POST); exit;
				$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
$data['cmp_id'] = $id;
		$this->form_validation->set_rules('art_sub_category', 'Sub Category', 'required|greater_than[0]');		
		$this->form_validation->set_rules('art_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');		
		
		$this->form_validation->set_rules('art_description', 'Description', '');
		$this->form_validation->set_rules('art_website_url', 'Website', '');
		$this->form_validation->set_rules('art_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('art_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('art_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('art_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('art_aud_gender', 'Gender', '');		


		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'contact';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['current_tab']);  
		}else{
			if($_FILES['art_page_image']['name']!=''){				
				$up_res = $this->ajax_image_upload('art_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{
					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'contact';
				$this->load->view('create_page_view',$data);
				}
			}
		        $insertdata['page_name'] = $this->input->post('art_page_name');
				$insertdata['description'] = $this->input->post('art_description');
				$insertdata['website_url'] = $this->input->post('art_website_url');
				$insertdata['places_can_connect'] = $this->input->post('art_places_can_connect');
				$insertdata['aud_interests'] = $this->input->post('art_aud_interests');
				$insertdata['aud_min_age'] = $this->input->post('art_aud_min_age');
				$insertdata['aud_max_age'] = $this->input->post('art_aud_max_age');
				$insertdata['aud_gender'] = $this->input->post('art_aud_gender');
				$insertdata['main_category'] = 4;
				$insertdata['sub_category'] = $this->input->post('art_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->manageart_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function add_ent_page($id){
		//print_r($_POST); exit;
				$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
$data['cmp_id'] = $id;
		$this->form_validation->set_rules('ent_sub_category', 'Sub Category', 'required|greater_than[0]');		
		$this->form_validation->set_rules('ent_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');		
	
		$this->form_validation->set_rules('ent_description', 'Description', '');		
		$this->form_validation->set_rules('ent_website_url', 'Website', '');
		$this->form_validation->set_rules('ent_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('ent_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('ent_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('ent_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('ent_aud_gender', 'Gender', '');

		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'family';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['current_tab']);  
		}else{
			if($_FILES['ent_page_image']['name']!=''){				
				$up_res = $this->ajax_image_upload('ent_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{
					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'family';
				$this->load->view('create_page_view',$data);
				}
			}
		       $insertdata['page_name'] = $this->input->post('ent_page_name');
$insertdata['description'] = $this->input->post('ent_description');
$insertdata['website_url'] = $this->input->post('ent_website_url');
$insertdata['places_can_connect'] = $this->input->post('ent_places_can_connect');
$insertdata['aud_interests'] = $this->input->post('ent_aud_interests');
$insertdata['aud_min_age'] = $this->input->post('ent_aud_min_age');
$insertdata['aud_max_age'] = $this->input->post('ent_aud_max_age');
$insertdata['aud_gender'] = $this->input->post('ent_aud_gender');
$insertdata['main_category'] = 5;
$insertdata['sub_category'] = $this->input->post('ent_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	

				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->manageent_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function add_cause_page($id){
		//print_r($_POST); exit;
				$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
		$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
   		$data['check_button'] =  $this->eventmodel->checkbutton($id);
$data['cmp_id'] = $id;
			
		$this->form_validation->set_rules('cause_page_name', 'Local Bussiness or Place Name','required|is_unique[bzz_pages.page_name]');			
		$this->form_validation->set_rules('cause_description', 'Description', '');	
		$this->form_validation->set_rules('cause_website_url', 'Website', '');
		$this->form_validation->set_rules('cause_places_can_connect', 'Places', '');
		$this->form_validation->set_rules('cause_aud_interests', 'Interests', '');
		$this->form_validation->set_rules('cause_aud_min_age', 'Min Age', '');
		$this->form_validation->set_rules('cause_aud_max_age', 'Max Age', '');
		$this->form_validation->set_rules('cause_aud_gender', 'Gender', '');

		if($this->form_validation->run() == FALSE)
		{
			//echo 'here'; exit;
			$data['content']='cmp_create_page';
			$data['current_tab'] = 'details';
			$this->load->view('create_page_view',$data);
			//header('Location: '.base_url().'profile/create_page#'.$_POST['currcause_tab']);  
		}else{
			if($_FILES['cause_page_image']['name']!=''){				
				$up_res = $this->ajax_image_upload('cause_page_image');
				//print_r($up_res); exit;	  
				if($up_res['status']){
				$file_name = implode(',',$up_res['files']);
				$insertdata['page_image'] = $file_name;
					
				}
				else{
					
				$newdata = array(
				   'file_error'  => $up_res['message'],                  
				);
				$this->session->set_userdata($newdata);
				$data['content']='cmp_create_page';
				$data['current_tab'] = 'details';
				$this->load->view('create_page_view',$data);
				}
			}
		        $insertdata['page_name'] = $this->input->post('cause_page_name');
				$insertdata['description'] = $this->input->post('cause_description');
				$insertdata['website_url'] = $this->input->post('cause_website_url');
				$insertdata['places_can_connect'] = $this->input->post('cause_places_can_connect');
				$insertdata['aud_interests'] = $this->input->post('cause_aud_interests');
				$insertdata['aud_min_age'] = $this->input->post('cause_aud_min_age');
				$insertdata['aud_max_age'] = $this->input->post('cause_aud_max_age');
				$insertdata['aud_gender'] = $this->input->post('cause_aud_gender');
				$insertdata['main_category'] = 6;
				$insertdata['sub_category'] = $this->input->post('cause_sub_category');
				$insertdata['user_id']= $this->session->userdata('logged_in')['account_id'];	
				$insertdata['view_as'] = 'company';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managecause_settings($settings);*/	
				
				redirect('/company/page/'.$id."/".$page_id);
			
		}
		
}
public function ajax_image_upload($file_name){
	//print_r($_FILES); exit(0);
	
	$n =  count($_FILES[$file_name]['name']);
	$validextensions = array("jpeg", "jpg", "png");
	$validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv','MOV');
	//print_r($_FILES[$file_name]);
	
		$filetype = $_FILES[$file_name]["type"];
		$filename = str_replace(' ', '', time().'_'.$_FILES[$file_name]["name"]);
		$filesize = $_FILES[$file_name]["size"];
		$fileerror = $_FILES[$file_name]["error"];
		$tempname = $_FILES[$file_name]['tmp_name'];
		
	
	if(isset($filetype) && !empty($filetype))	
	{		
		$temporary = explode(".",$filename);
		
		$file_extension = end($temporary);
		
		if((($filetype == "image/png") || ($filetype == "image/jpg") || ($filetype == "image/jpeg")
		) && ($filesize < 4194000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
			
		if ($fileerror > 0)
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 2;
		$file_upload['message'] =  "Return Code: " . $fileerror . "<br/><br/>";
		}
		else
		{
		
		$config['upload_path'] = DIR_FILE_PATH; 
		//$config['upload_path'] = './uploads/';
		$sourcePath = $tempname; // Storing source path of the file in a variable
		//$targetPath = "F:\/xampp\/htdocs\/bzzbook\/uploads\/".$_FILES[$file_name]['name'][0];
		$targetPath = $config['upload_path'].$filename; // Target path where file is to be stored
		move_uploaded_file($sourcePath,$targetPath) ; 
		$file_upload['status'] = true;
		$file_upload['video'] = "N";
		$file_upload['files'][] =  $filename;
		
		    $path = DIR_FILE_PATH.$filename;
			$this->load->library('image_autorotate', array('filepath' => $path));
		    $config['allowed_types'] = 'gif|jpg|png';
			$config['create_thumb'] = TRUE;
			$config['max_size']	= '';
			$config['max_width']  = '';
			$config['max_height']  = '';
		    $config['image_library'] = 'gd2';
			$config['remove_spaces'] = TRUE;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['source_image'] = $path;
			
			list($imagewidth, $imageheight, $imageType) = getimagesize($path);
			if($imagewidth>523){
				$default_width = 523;
				$entended_width = 900;
				$thumb_width = 182;
			}else{
				$default_width = $imagewidth;
				$entended_width = $imagewidth;
				$thumb_width = $imagewidth;
			}
			$config['thumb_marker'] = '_default';
			$config['width'] = $default_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$config['thumb_marker'] = '_extended';
			$config['width'] = $entended_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$config['thumb_marker'] = '_thumb';
			$config['width'] = $thumb_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
		}
		 }
		else
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 3;
		$file_upload['message'] =  "<p>Image size should be less than 4mb and image should be in jpg,png,gif format</p>";
		}
		
	}else{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 1;
		$file_upload['message'] =  "File not uploaded";
	}
	
	
	//echo json_encode($file_upload); exit(0);
	if(isset($file_upload) && $file_upload)
	return $file_upload;
	else
	return false;
	 
	
}
public function page($id,$page_id = '')
{	
	  $data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	  $data['user_id'] = '';
	  $data['content']='page';
	  $this->load->view('page_template_view',$data);
}


}
?>