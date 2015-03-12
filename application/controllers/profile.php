<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('profile_set');
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }

public function index()
{  
	     $data['content']='posts';
	     $this->load->view('template-view',$data);
	  //$this->load->view('posts');	
}

public function profile_setting()
{
	$this->load->model('profile_set');
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
	$data['result'] = $this->profile_set->save_settings();
	$data['education_details'] = $this->profile_set->geteducationDetails();
	$data['profession_details'] = $this->profile_set->getprofessionDetails();
	$data['organization_details'] = $this->profile_set->getorganizationDetails();
	$data['group_details'] = $this->profile_set->getgroupDetails();
	$data['content']='profile_settings';
	$this->load->view('template-view',$data);
	//$this->load->view('profile_settings',$data);	
}

public function about_me()
{
	$data['result'] = $this->profile_set->save_settings();
	$data['education_details'] = $this->profile_set->geteducationList();
	$data['content']='about_me';
	$this->load->view('template-view',$data);
	//$this->load->view('about_me',$data);
}


public function business_details()
{
	$data['profession_details'] = $this->profile_set->getprofessionList();
	$data['organization_details'] = $this->profile_set->getorganizationList();
	$data['group_details'] = $this->profile_set->getgroupList();
	$data['content']='business_details';
	$this->load->view('template-view',$data);
	//$this->load->view('business_details',$data);
}

public function post()
  {
	  $data['content']='posts';
	$this->load->view('template-view',$data);
	// $this->load->view('posts');
}
public function message()
  { 
  	$data['content']='messages';
	$this->load->view('template-view',$data);
   //$this->load->view('messages');
}
public function events()
{
		$data['content']='events';
	$this->load->view('template-view',$data);
	//$this->load->view('events');
}
public function groups()
{
	$data['content']='groups';
	$this->load->view('template-view',$data);
	//$this->load->view('groups');
}
  public function jobs()
{
	$data['content']='jobs';
	$this->load->view('template-view',$data);
	//$this->load->view('jobs');
}
 public function addgroup()
{
	$data['content']='groupsadd';
	$this->load->view('template-view',$data);
	//$this->load->view('groupsadd');
}
  public function eduDelete($id)
  {
	 
	  $this->profile_set->delEduDetails($id);
      redirect("/profile/profile_setting");
  }
   
   public function profDelete($id)
  {
	 
	  $this->profile_set->delProfDetails($id);
      redirect("/profile/profile_setting");
  }
   
   public function orgDelete($id)
  {
	  
	  $this->profile_set->delOrgDetails($id);
      redirect("/profile/profile_setting");
  }
   
   public function grpDelete($id)
  {
	 
	  $this->profile_set->delGrpDetails($id);
      redirect("/profile/profile_setting");
  }
  
  
  public function eduEdit()
  {
	 $data = $this->profile_set->editEduDetails($_POST['education_id']);
	foreach( $data as $result):
		$edu_data['field_of_study'] = $result->field_of_study;
		$edu_data['college_institution'] = $result->college_institution;
		$edu_data['degree_certificate'] = $result->degree_certificate;
		$edu_data['attended_from'] = $result->attended_from;
		$edu_data['attended_upto'] = $result->attended_upto;
		$edu_data['specialised_studies'] = $result->specialised_studies;
		
	endforeach;
	echo json_encode($edu_data);
  }
  
   public function profEdit()
  {
	 $data = $this->profile_set->editProfDetails($_POST['profession_id']);
	 foreach( $data as $result):
	 	$prof_data['job_title'] = $result->job_title;
		$prof_data['start_date'] = $result->start_date;
		$prof_data['end_date'] = $result->end_date;
		$prof_data['job_description'] = $result->job_description;
		$prof_data['current_job'] = $result->current_job;
		
		endforeach;
		echo json_encode($prof_data);
  }
  
   public function orgEdit()
  {
	 $data = $this->profile_set->editOrgDetails($_POST['organization_id']);
	 foreach( $data as $result):
	 	$org_data['org_name'] = $result->org_name;
		$org_data['position'] = $result->position;
		$org_data['org_desc'] = $result->org_desc;
		$org_data['start_date'] = $result->start_date;
		$org_data['end_date'] = $result->end_date;
		$org_data['emp_status'] = $result->emp_status;
	
		endforeach;
		echo json_encode($org_data);
	
  }
  
   public function grpEdit()
  {
	 $data = $this->profile_set->editGrpDetails($_POST['group_id']);
	 foreach( $data as $result):
	 	$grp_data['grp_name'] = $result->grp_name;
		$grp_data['grp_type'] = $result->grp_type;
		$grp_data['web_url'] = $result->web_url;
		$grp_data['city'] = $result->city;
		$grp_data['state'] = $result->state;
		$grp_data['postal_code'] = $result->postal_code;
		$grp_data['additional_info'] = $result->additional_info;
	
		endforeach;
		echo json_encode($grp_data);
	
  }
  
 
	 function do_upload()
	{
		$config['upload_path'] = './uploads/profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

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
			$config['maintain_ratio'] = TRUE;
			//$config['upload_path'] = './uploads/thumbs/';
			$config['new_image'] = './uploads/thumbs/';
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
			$config_fav['maintain_ratio'] = TRUE;
			$config_fav['create_thumb'] = TRUE;
		//	$config_fav['upload_path'] = './uploads/favorite/';
			$config_fav['new_image'] = './uploads/favorite/';
			$config_fav['thumb_marker'] = '_fav';
			$config_fav['width'] = 62;
			$config_fav['height'] = 62;

			$this->load->library('image_lib', $config_fav);
			$this->image_lib->initialize($config_fav);
			$this->image_lib->resize();
			$img_fav = $data['raw_name'].'_fav'.$data['file_ext'];
			
			
			// image insertion into db
            $file_id = $this->profile_set->insert_profile_pic($data['file_name'],$img_thumb,$img_fav);
			redirect('/profile/profile_setting');
		}
	} 
 
}

?>