<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}

	
	public function sign_up()
	{ 
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
    $data['jobtype'] = $this->lookup->get_lookup_jobtype();
	$this->load->view('customer_sign_up',$data);
    }
   
   public function cust_sign_up()
   {
	    $this->form_validation->set_rules('firstname','FirstName','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('lastname','LastName','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|xss_clean');
		$this->form_validation->set_rules('user_name','User Name','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|matches[conf_password]|xss_clean|md5');
		$this->form_validation->set_rules('conf_password','Password Confirmation','trim|required|xss_clean|md5');
		$this->form_validation->set_rules('country','Country','required|xss_clean');
		$this->form_validation->set_rules('state','State','required|xss_clean');
		$this->form_validation->set_rules('city','City','required|xss_clean');
		$this->form_validation->set_rules('postal_code','Postal Code','required|xss_clean');
		$this->form_validation->set_rules('dob','Birthday','required|xss_clean');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('position','Job Position','required|xss_clean');
		$this->form_validation->set_rules('industry','Industry','required|xss_clean');
		$this->form_validation->set_rules('companyname','Company Name','required|xss_clean');
		$this->form_validation->set_rules('office_phone','Office phone no','required|xss_clean');
		$this->form_validation->set_rules('fax','Fax','required|xss_clean');
		//$this->form_validation->set_rules('aboutme','About','required');
	//	$this->form_validation->set_rules('intrests','Intrests','required');
    	//$this->form_validation->set_rules('skills','Skills','required');
		//$this->form_validation->set_rules('agree','Terms & Conditions','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('customer_sign_up');
		}else{
		
		
		$user['user_email'] = $this->input->post('email');	
		$user['username'] = $this->input->post('user_name');
		$user['password'] = $this->input->post('password');
		$user['user_country'] = $this->input->post('country');
		$user['user_state'] = $this->input->post('state');
		$user['user_city'] = $this->input->post('city');
		$user['user_postalcode'] = $this->input->post('postal_code');
		$user['user_type'] = 'user';
		$confirmation_code = md5(random_string('unique'));
		$user['conf_code'] = $confirmation_code;
		$this->load->model('person');
		$user_id =  $this->person->sign_up($user);
		
		$user_info['user_phoneno'] = $this->input->post('phone_number');
		//$user_info['con_password'] = $this->input->post('conf_password');
		$user_info['user_firstname'] = $this->input->post('firstname');
		$user_info['user_lastname'] = $this->input->post('lastname');
		$user_info['user_dob'] = $this->input->post('dob');
		$user_info['user_gender'] = $this->input->post('gender');
		$user_info['user_jobtype'] = $this->input->post('position');
		$user_info['user_industry'] = $this->input->post('industry');
		$user_info['user_cmpname'] = $this->input->post('companyname');
		$user_info['user_officephone'] = $this->input->post('office_phone');
		$user_info['user_fax'] = $this->input->post('fax');
		$user_info['user_intrests'] = $this->input->post('intrests');
		$user_info['user_skills'] = $this->input->post('skills');
		$user_info['user_about'] = $this->input->post('aboutme');
		//$user_info['user_terms_conditions'] = $this->input->post('agree');
		$user_info['user_id'] = $user_id;
		
		$this->person->user_info($user_info);
		$this->person->user_settings($user_id);
		$user_data = $this->person->get_user_details($user_id);
	/*	print_r($user_data);
		exit;*/
		$confirmation = 
		array( 
		  'conf_code' => $user_data[0]['conf_code'],
		  'conf_status' => 'N',
		  'user_id' => $user_id,
		);
		$this->load->model('confirmaccount');
		$this->confirmaccount->confirmation_insert($confirmation);
		//print_r($user_data);
		if($user_data)
		{
			//
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'mr.s.sivaprasad@gmail.com';
		$config['smtp_pass'] = 'Siv@prasad598';

// Load email library and passing configured values to email library
		$mail = $user_data[0]['user_email'];
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('mr.s.sivaprasad@gmail.com',$username);
		$this->email->to($mail);
		$this->email->subject('Confirmation mail for account activation');
		$message = "Please Click Below Link To Activate Your Acount  \n";
		$message .= "www.bzzbook.com/confirmation/confirm/".$user_data[0]['conf_code'];
		$this->email->message($message);
		if($this->email->send())
		{
		    $this->session->set_flashdata('cust_success', 'Sign Up Successfully,To Activate Your account just check out Yor email');
			redirect('/signg_in');
		}else
		{
			$this->session->set_flashdata('cust_success', 'Cannot send Confirmation link to your e-mail address');
			redirect('/customer/sign_up');
		}
		}
		}
   }
   
  public function send_invite()
  {
	  if(isset($_POST['submit']))
	  {
	    $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
	    $email = $this->input->post('email');
	    $this->email->from('sivaprasad@ayatas.com','Sivaprasad');
		$this->email->to($email,'user');
		$this->email->subject('this is testing email.......');
		$this->email->message('hai this is message');
		$this->email->send();
		echo $email;
		redirect('/profiles');
	  }else{
		  echo"wrong submission";
	  }
	  
  }
  public function view_post()
	  {
		$data['result'] = $this->customer_m->view_post(); 
		$this->load->view('disp_post',$data); 
	  }
  
  
  public function postboard_update()
  {
	  parse_str($_POST['form_data'],$postboard_info);
	if($this->customermodel->managepostboarddata($postboard_info))
	echo "success";
	else
	return false;
  }
  
  public function password_update()
  {
	   parse_str($_POST['form_data'],$password_info);
	if($this->customermodel->passwordUpdate($password_info))
	echo "success";
	else
	return "failure";
  }
  public function updateabout()
  {
		parse_str($_POST['form_data'], $aboutformdata);
	   echo $this->customermodel->updateAboutInfo($aboutformdata);
  }
  public function updateprivacy()
  {
	  	parse_str($_POST['formdata'],$privacyformdata);
		echo $this->customermodel->updatePrivacyInfo($privacyformdata);
  }
  public function updateemailnotification()
  {
	  	parse_str($_POST['formdata'],$privacyformdata);
		echo $this->customermodel->updateEmailInfo($privacyformdata);
  }
  public function manageducation()
  {
	  parse_str($_POST['formdata'],$education_info);
	  $returninfo = $this->customermodel->manageeducationdata($education_info);
	if($returninfo != false):
	  	$education_info['inserted_id'] = $returninfo;
	 	echo $this->load->view('education_field');
	 else:
	 	return false;
	 endif;
  }
  
  public function manageprofession()
  {
	  parse_str($_POST['formdata'],$profession_info);
	  $returninfo = $this->customermodel->manageprofessiondata($profession_info);
	  if($returninfo != false):
	  	$profession_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('profession_field',$profession_info);
	 else:
	 	return false;
	 endif;
	  
  }
  
  public function manageorganization()
  {
	  
	  parse_str($_POST['formdata'],$organization_info);
	  $returninfo = $this->customermodel->manageorganizationdata($organization_info);
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('organization_field',$organization_info);
	 else:
	 	return false;
	 endif;
	  
  }
  
  public function managegroup()
  {
	   
	  parse_str($_POST['formdata'],$group_info);
	  $returninfo = $this->customermodel->managegroupdata($group_info);
	  if($returninfo != false):
	  	$group_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('group_field',$group_info);
	 else:
	 	return false;
	 endif;
	  
  }
  public function upload_pic()
  {
	    $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);
	    $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('profile_pic'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('uploadform', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('uploadform', $data);
		}
  }

public function search_company()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='companies_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('companies_search');
	
}

public function search_job()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='jobs_search';
	$this->load->view('template-view',$data);
	//$this->load->view('jobs_search');
	
}
public function search_event()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='events_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('events_search');
	
}
public function search_member()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='members_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('members_search');
	
}

	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
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
			$data = $this->upload->data();
	  	  // print_r($data);
		    $path = $data['full_path'];
		    $config['image_library'] = 'gd2';
			$config['source_image'] = $path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			//$config['upload_path'] = './uploads/thumbs/';
			//$config['new_image'] = './uploads/thumbs/';
			$config['thumb_marker'] = '_thumb';
			$config['width'] = 91;
			$config['height'] = 91;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$img_thumb = $data['raw_name'].'_thumb'.$data['file_ext'];

			//creating new image
			$path = $data['full_path'];
			$config_fav['source_image'] = $path;
		    $config_fav['image_library'] = 'gd2';
			$config_fav['maintain_ratio'] = FALSE;
			$config_fav['create_thumb'] = TRUE;
		//	$config_fav['upload_path'] = './uploads/favorite/';
			//$config_fav['new_image'] = './uploads/favorite/';
			$config_fav['thumb_marker'] = '_fav';
			$config_fav['width'] = 62;
			$config_fav['height'] = 62;

			$this->load->library('image_lib', $config_fav);
			$this->image_lib->initialize($config_fav);
			$this->image_lib->resize();
			$img_fav = $data['raw_name'].'_fav'.$data['file_ext'];
			
			
			//print_r($data);
			$file_id = $this->profile_set->add_pics($data['file_name'],$img_thumb,$img_fav);
			redirect('/profile/my_photos');
	}

	}
	
	public function my_photos()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
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
			$data = $this->upload->data();
			//print_r($data);
			$file_id = $this->profile_set->add_pics($data['file_name']);
			redirect('/profile/my_photos');
	}	
	}
	

}

?>