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
	     $data['user_id'] ='';
	     $data['content']='posts';
	     $this->load->view('template-view',$data);
	  //$this->load->view('posts');	
}
public function event_log(){
	$this->profile_set->update_last_active_time();
}
public function remove_event_log(){
	$this->profile_set->remove_user_activity();	
}

public function profile_setting()
{
	$this->load->model('profile_set');
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
	$data['user_info'] = $this->profile_set->save_settings($user_id='');
	$data['user'] = $this->profile_set->get_user();
	$data['user_set'] = $this->profile_set->get_user_settings();
	$data['education_details'] = $this->profile_set->geteducationDetails();
	$data['profession_details'] = $this->profile_set->getprofessionDetails();
	$data['organization_details'] = $this->profile_set->getorganizationDetails($user_id='');
	$data['group_details'] = $this->profile_set->getgroupDetails();
	$data['content']='profile_settings';
	$this->load->view('template-view',$data);
	//$this->load->view('profile_settings',$data);	
}

public function about_me($user_id='')
{
	if(!empty($user_id))
	$data['user_id'] = $user_id;
	$data['user'] = $this->profile_set->get_user();
	$data['user_info'] = $this->profile_set->get_userinfo($user_id);
	$data['result'] = $this->profile_set->save_settings($user_id);
	$data['education_details'] = $this->profile_set->geteducationList();
	$data['content']='about_me';
	$this->load->view('full_content_view',$data);
	//$this->load->view('about_me',$data);
}
public function create_page()
{
	$this->session->unset_userdata('file_error');
	$data['content']='create_page';
	$this->load->view('full_content_view',$data);
	//$this->load->view('about_me',$data);
}

public function business_details($user_id='')
{
	//$data['profession_details'] = $this->profile_set->getprofessionList();
	//$data['organization_details'] = $this->profile_set->getorganizationList();
	//$data['group_details'] = $this->profile_set->getgroupList();
	if(!empty($user_id))
	$data['user_id'] = $user_id;
	$data['profile_info'] = $this->profile_set->get_user_profileinfo($user_id);
	$data['accounts_data'] = $this->profile_set->get_user_accounts($user_id);
	$data['content']='my_business_card';
	$this->load->view('full_content_view',$data);
	//$this->load->view('business_details',$data);
}

public function post($user_id='')
{	
  	  $data['user_id'] = $user_id;
	  $data['content']='posts';
	  $this->load->view('template-view',$data);
	// $this->load->view('posts');
}
public function user($user_id='')
{	
 $curr_user_id = $this->session->userdata('logged_in')['account_id'];
 
 if($this->db->select('*')->from('bzz_users')->where('user_id',$user_id)->get()->num_rows() > 0){
		if($this->db->select('*')->from('bzz_user_profile_visit')->where('user_id',$user_id)->where('visited_user_id',$curr_user_id)->get()->num_rows() > 0){
			$data['user_id'] = $user_id ;
	     	$data['visited_user_id'] =  $curr_user_id;
			$data['visited_time'] =  date("Y-m-d H:i:s");
			$this->db->where('user_id',$user_id);
			$this->db->where('visited_user_id',$curr_user_id);
		 	$this->db->update('bzz_user_profile_visit',$data);
		}else{
		 $data['user_id'] = $user_id ;
	     $data['visited_user_id'] =  $curr_user_id;
		 $this->db->insert('bzz_user_profile_visit',$data);
		}
 }

  	  $data['user_id'] = $user_id;
	  $data['content']='users_profile';
	  $this->load->view('full_content_view',$data);

}
public function page($page_id = '')
{	  
	  $this->load->model('pagemodel');
	  $data['user_id'] = '';
	  $data['page_id'] = $page_id;
	  $data['content']='page';
	  $this->load->view('full_content_view',$data);
}

public function message()
  { 
  	$data['content']='messages';
	$this->load->view('full_content_view',$data);
   //$this->load->view('messages');
}
public function compose()
  { 
  	$data['content']='compose';
	$this->load->view('full_content_view',$data);
   //$this->load->view('messages');
}
public function sent()
  { 
  	$data['content']='sent';
	$this->load->view('full_content_view',$data);
   //$this->load->view('messages');
}
public function trash(){
	$data['content']='trash';
	$this->load->view('full_content_view',$data);
}
public function messageview($msgid)
  {
	$data['messages'] = $this->messages->disp_msg_by_id($msgid);
  	$data['content']='messages_view';
	$this->load->view('full_content_view',$data);
   //$this->load->view('messages');
}
public function events()
{
		$data['content']='events';
		$data['events'] = $this->eventmodel->get_events_and_invites();
		$data['invites'] = $this->eventmodel->get_invites();
		$data['hosts'] = $this->eventmodel->get_event_hosts();
		$data['past'] = $this->eventmodel->get_past_event();
		$this->load->view('full_content_view',$data);
	//$this->load->view('events');
}
public function eventview($event_id='')
{
	$data['event'] = $this->eventmodel->get_user_events_by_id($event_id);
	$data['content']='event_view';
	$this->load->view('full_content_view',$data);
	//$this->load->view('about_me',$data);
}
public function groups()
{
	
	$data['content']='groups';
	$this->load->view('template-view',$data);
	//$this->load->view('groups');
}
public function edit_group($group_id)
{
	$data['group_id'] = $group_id;
	$data['content']='edit_group';
	$this->load->view('template-view',$data);
}
public function delete_group($group_id)
{
	$this->profile_set->delete_group($group_id);
}

public function jobs()
{
	   //  $data['content']='user_cmp_jobs';
	   //  $this->load->view('template-view',$data);
	   //  $this->load->view('jobs');
	   
	   $data['content']='user_interested_jobs';
	   $this->load->view('full_right_content_view',$data);
	   
}

public function showfavs()
{
	$data['user_id'] = '';
	$data['content']='my_favorites';
	$this->load->view('full_content_view',$data);
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
  
  public function get_grp_friends($id)
  {
	  
	  $data=$this->profile_set->disp_friends($id);
	  if($data)
	  {
		$select = '<select name="select-from" id="select-from" class="form-control" multiple="multiple">';
		$frnd_list = $data[0]->friends;
		if(!empty($frnd_list))
		{
		$friends = explode(",",$frnd_list);
		//print_r ($friends);
		foreach($friends as $frnd):
		$name = $this->profile_set->getcustDetails($frnd);
		$select.="<option value='".$name[0]['user_id']."'>".$name[0]['user_firstname']." ".$name[0]['user_lastname']."</option>";
		endforeach;
		}
		else
			$select.="<option value='-1'>No List Available</option>";

		$select.="</select>";
		echo $select;
	  }
	  else 
	  {
		  echo $select = '<select name="select-from" id="select-from" class="form-control" multiple="multiple"><option value="-1">No List Available</option></select></select>';
	  }
  }
  
  
  public function get_friends()
  {
	  $data=$this->profile_set->disp_only_friends();
	  if($data)
	  {
		$select = '<select name="select-from" id="select-from" class="form-control" multiple="multiple">';
		//$frnd_list = $data[0]->friend_id;
		if(!empty($frnd_list))
		{
		//$friends = explode(",",$frnd_list);
		//print_r ($friends);
		foreach($data as $frnd):
		$name = $this->profile_set->getcustDetails($frnd);
		$select.="<option value='".$name[0]['user_id']."'>".$name[0]['user_firstname']." ".$name[0]['user_lastname']."</option>";
		endforeach;
		}
		else
			$select.="<option value='-1'>No List Available</option>";

		$select.="</select>";
		echo $select;
	  }
	  else 
	  {
		  echo $select = '<select name="select-from" id="select-from" class="form-control" multiple="multiple"><option value="-1">No List Available</option></select></select>';
	  }
  
	  
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
  
  
  
/*  public function sidebarEdit()
  {
	 $data = $this->profile_set->editSideBarSettings();
    
	 foreach( $data as $result):
	 	$sidebar_data['pend_frnd_requests'] = $result->pend_frnd_requests;
		$sidebar_data['latest_frnds'] = $result->latest_frnds;
		$sidebar_data['your_add_one'] = $result->your_add_one;
		$sidebar_data['add_friends'] = $result->add_friends;
		$sidebar_data['companies_to_follow'] = $result->companies_to_follow;
		$sidebar_data['companies_im_following'] = $result->companies_im_following;
		$sidebar_data['your_add_two'] = $result->your_add_two;
		$sidebar_data['my_companies'] = $result->my_companies;
		
		endforeach;
		echo json_encode($sidebar_data);
  }
  */
  
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
		$org_edit['city'] = $result->city;	
		endforeach;
		echo json_encode($org_data);
	
  }
  
  public function collegeEdit()
  {
	 $data = $this->profile_set->editCollegeDetails($_POST['college_id']);
	 
	 foreach( $data as $result):
	 	$clg_data['college_name'] = $result->college_name;
		
		$clg_data['description'] = $result->description;
		$clg_data['start_date'] = $result->start_date;
		$clg_data['end_date'] = $result->end_date;
		$clg_data['edu_status'] = $result->edu_status;
		$clg_data['concentration1'] = $result->concentration1;
		$clg_data['concentration2'] = $result->concentration2;
		$clg_data['concentration3'] = $result->concentration3;
		$clg_data['attended'] = $result->attended;
	
		endforeach;
		echo json_encode($clg_data);
	
  }
  
  
    public function schoolEdit()
  {
	 $data = $this->profile_set->editSchoolDetails($_POST['school_id']);
	 
	 foreach( $data as $result):
	 	$sch_data['school_name'] = $result->school_name;
		$sch_data['description'] = $result->description;
		$sch_data['start_date'] = $result->start_date;
		$sch_data['end_date'] = $result->end_date;
		$sch_data['sch_status'] = $result->sch_status;
		
		endforeach;
		echo json_encode($sch_data);
	
  }
  
   public function grpEdit()
  {
	 $data = $this->profile_set->editGrpDetails($_POST['group_id']);
	 foreach( $data as $result):
	 	$grp_data['group_name'] = $result->group_name;
		$grp_data['group_type'] = $result->group_type;
		$grp_data['group_web_url'] = $result->group_web_url;
		$grp_data['group_city'] = $result->group_city;
		$grp_data['group_state'] = $result->group_state;
		$grp_data['group_postalcode'] = $result->group_postalcode;
		$grp_data['group_about'] = $result->group_about;
	
		endforeach;
		echo json_encode($grp_data);
	
  }
  
	 function do_upload()
	{
		//$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);
		$upload_path = "uploads/";				
						
		$thumb_width = "600";						
		$thumb_height = "600";	
	if (isset($_POST["upload_thumbnail"])) {
	
			$filename = $_POST['filename'];
		
			$large_image_location = $upload_path.$_POST['filename'];
			$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
		
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			
			$scale = $thumb_width/$w;
			$cropped = $this->resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
			//echo $_SERVER['DOCUMENT_ROOT']; echo dirname(__FILE__); exit;
			$data['full_path'] = DIR_FILE_PATH.$cropped;
			$split = explode('.',$cropped);
			$data['raw_name'] = $split[0];
			$data['file_ext'] = '.'.$split[1];
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
			
		
			
			list($imagewidth, $imageheight, $imageType) = getimagesize($path);
			if($imagewidth>523){
				$default_width = 523;
				$entended_width = 900;
				$thumb_width = 170;
			}else{
				$default_width = $imagewidth;
				$entended_width = $imagewidth;
				$thumb_width = 170;
			}
			
			
			
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = '_default';
			$config['width'] = $default_width;
			$config['height'] = 1;
			$config['create_thumb'] = TRUE;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$config['thumb_marker'] = '_extended';
			$config['width'] = $entended_width;
			$config['height'] = 1;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();


			//creating new image
			$path = $data['full_path'];
			$config_fav['source_image'] = $path;
		    $config_fav['image_library'] = 'gd2';
			$config_fav['maintain_ratio'] = FALSE;
			$config_fav['create_thumb'] = TRUE;
		//	$config_fav['upload_path'] = './uploads/favorite/';
			//$config_fav['new_image'] = './uploads/favorite/';
			$config_fav['thumb_marker'] = '_fav';
			$config_fav['width'] = 150;
			$config_fav['height'] = 150;

			$this->load->library('image_lib', $config_fav);
			$this->image_lib->initialize($config_fav);
			$this->image_lib->resize();
			$img_fav = $data['raw_name'].'_fav'.$data['file_ext'];
			
		
			// image insertion into db
            $file_id = $this->profile_set->insert_profile_pic($cropped,$img_thumb,$img_fav);
			
			
			// $data['post_content'] = $_POST['posts'];
			 $session_data = $this->session->userdata('logged_in');
	 		 $profile_post_data['posted_by'] = $session_data['account_id'];
			 $profile_post_data['profile_pic'] = 'Y';
	         $profile_post_data['uploaded_files'] = $cropped;
		    	$profile_posted =  $this->customermodel->post_buzz($profile_post_data); 
			
			
			if(isset($_SERVER['HTTP_REFERER']))
                {
                    $redirect_to = str_replace(base_url(),'',$_SERVER['HTTP_REFERER']);
                }
                else
                {
                    $redirect_to = $this->uri->uri_string();
                }            

                redirect($redirect_to);
			//redirect('/profile/profile_setting');
		}
	} 
	
	public function my_photos($album_id)
	{
		//$data['photos'] = $this->profile_set->get_my_pics();
		//$data['videos'] = $this->profile_set->get_my_videos();
		$data['photos'] = $this->profile_set->get_my_pics($album_id);
		
		//print_r($data);
		if(!empty($user_id))
		$data['user_id'] = $user_id;
		$data['album_id'] = $album_id;
		$data['content']='myphotos';
		$this->load->view('full_content_view',$data);
		
	}
	
	public function my_albums($user_id='')
	{
		//$data['photos'] = $this->profile_set->get_my_pics();
		//$data['videos'] = $this->profile_set->get_my_videos();
		if(!empty($user_id))
		$data['user_id'] = $user_id;
		$data['content']='myalbums';
		$this->load->view('full_content_view',$data);
		
	}
	
	public function upload_thumb()
	{
		$file_formats = array("jpg", "png", "gif", "bmp");

		$filepath = "uploads/";
		$preview_width = "360";
		$preview_height = "270";

		if ($_POST['submitbtn']=="Upload" && isset($_FILES['imagefile'])) {
		
		 $name = $_FILES['imagefile']['name']; // filename to get file's extension
		 $size = $_FILES['imagefile']['size'];
		
		 if (strlen($name)>0) {
			$extension = substr($name, strrpos($name, '.')+1);
			if (in_array($extension, $file_formats)) { // check it if it's a valid format or not
				if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
					$imagename = md5(uniqid().time()) . "." . $extension;
					$tmp = $_FILES['imagefile']['tmp_name'];
						if (move_uploaded_file($tmp, $filepath . $imagename)) {
							echo trim($imagename);
						} else {
							echo "Could not move the file";
						}
				} else {
					echo "Your image size is bigger than 2MB";
				}
			} else {
					echo "Invalid file format";
			}
		 } else {
			echo "Please select image!";
		 }
		 exit();
		}
	}
	public function creategroup()
	{
		$this->profile_set->creategroup($_POST['grp_name'],$_POST['members']);
	}
	public function updategroup()
	{
		$this->profile_set->updategroup($_POST['group_id'],$_POST['grp_name'],$_POST['members']);
	}
	public function upload_profile_thumb()
	{
		/*$upload_path = "uploads/";				
						
		$thumb_width = "600";						
		$thumb_height = "600";	
		if (isset($_POST["upload_thumbnail"])) {
	
			$filename = $_POST['filename'];
		
			$large_image_location = $upload_path.$_POST['filename'];
			$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
		
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			
			$scale = $thumb_width/$w;
			$cropped = $this->resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
			 $this->load->model('customermodel');
			 $session_data = $this->session->userdata('logged_in');
			 $data['posted_by'] = $session_data['account_id'];
			 $data['post_content'] = $this->input->post('posts');
			 $data['uploaded_files'] = $cropped;
			 $data['album_id'] = $this->input->post('album_id');
			 
			
			$path =DIR_FILE_PATH.$cropped;
		    $config['allowed_types'] = 'gif|jpg|png';
			$config['create_thumb'] = TRUE;
			$config['max_size']	= '';
			$config['max_width']  = '';
			$config['max_height']  = '';
		    $config['image_library'] = 'gd2';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['source_image'] = $path;
			
			list($imagewidth, $imageheight, $imageType) = getimagesize($path);
			if($imagewidth>523){
				$default_width = 523;
				$entended_width = 900;
			}else{
				$default_width = $imagewidth;
				$entended_width = $imagewidth;
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
			
			 if($this->input->post('post_group')==0)
			 {
				  $data['posted_to']='';
				   $this->customermodel->post_buzz($data);
				   echo "post saved successfully..."; 
				  
			 }
			 else
			 {
				 $result = $this->profile_set->get_groupmembers($this->input->post('post_group'));
				 $data['posted_to'] = $result[0]['group_members'];
				 $this->customermodel->post_buzz($data);
			 }
			 echo "post saved successfully..."; 
			
			header("location:".base_url().'profile/my_photos');
			exit();
		}*/
			 
	}
	public function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	$split = explode('/',$thumb_image_name);
	$filename = end($split);
	$this->profile_set->add_pics($filename);
	return $filename;
	}
	public function add_video(){
		
		//print_r($_FILES);
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = 'uploads/';
            $configVideo['max_size'] = '102400';
            $configVideo['allowed_types'] = 'webm|mp4|ogg|ogv|wmv|3gp|3g2|3gpp|avi|flv';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['userfile']['name'];
            $configVideo['file_name'] = $video_name;
//print_r($configVideo);
            $this->load->library('upload',$configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('userfile')) {
                echo $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
				$input = DIR_FILE_PATH.$video_name;
				$videoname = explode('.',$video_name);
				$output = DIR_FILE_PATH.$videoname[0].'.mp4';
				$imgoupt = DIR_FILE_PATH.$videoname[0].'.png';
				
				if(!$this->make_jpg($input, $output,$imgoupt))
				return false;
				
				if($this->profile_set->add_user_videos($video_name))
                echo "Successfully Uploaded";
				else
				return false;
            }
        }
}
public function make_jpg($input, $output, $imgoutput) { 
//$ffmpegpath = $_SERVER['DOCUMENT_ROOT'].'/bzzbook/ffmpeg.exe';

$ffmpegpath = '/usr/bin/avconv';
if(!file_exists($input)){ echo 'file not exists'; return false; }
$command = "$ffmpegpath -i $input $output";
$imgcommand = "$ffmpegpath -i $input -ss 00:00:02 -vframes 1 $imgoutput";

@exec( $command, $ret );
@exec( $imgcommand, $ret );
if(!file_exists($output)){ echo 'file output not exist'; return false;}
if(filesize($output)==0) {echo 'file size 0'; return false; }
return true;
}
	public function profile_pic_thumb()
	{
		$upload_path = "uploads/";				
						
		$thumb_width = "600";						
		$thumb_height = "600";	
		if (isset($_POST["upload_thumbnail"])) {
	
			$filename = $_POST['filename'];
		
			$large_image_location = $upload_path.$_POST['filename'];
			$thumb_image_location = $upload_path."thumb_".$_POST['filename'];
		
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			
			$scale = $thumb_width/$w;
			$cropped = $this->ppresizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
			
			header("location:".base_url().'profile/profile_setting');
			exit();
		}
	}
	public function ppresizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	$split = explode('/',$thumb_image_name);
	$filename = end($split);
	$this->profile_set->croped_profile_pic($filename);
	return $thumb_image_name;
	}
	
	public function get_post_byid($post_id){
		
		$row = $this->customermodel->getPostById($post_id);
		$row = $row[0];
		$posted_id=$row->posted_by;
	 	$get_profiledata = $this->customermodel->profiledata($posted_id);
	    $user_id = $this->session->userdata('logged_in')['account_id'];
		
		$attr = array('name' => 'share_form', 'id' =>'share_form', 'enctype'=>"multipart/form-data");
      	
		$content = form_open('signg_in/share_post',$attr)."<input type='file' name='uploadPhotos[]' id='uploadPhotos' multiple='multiple' style='display:none;' />
        <textarea style='float:left' cols='' rows='' name='share_post_content' id='posts' class='form-control' placeholder='say something...'></textarea><div class='posts'><article>";
		    $morePics = '';  $file_ext ='';		
		  	if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
				
			 if($tot_images==1){
				
			 $file_parts = explode('.',$row->uploaded_files);
			 $file_ext = $file_parts[1];
			 $validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv'); 
			 }
			 if($tot_images>5)
			 $morePics = 'morePics';
			 }
			 ?>
             <?php  if(isset($file_ext) && $file_ext!='' && in_array($file_ext,$validvideoextensions)){?>  
             <div class="videoImage" id="videoImage<?php echo $row->post_id; ?>"><img width="100%" src="<?php echo base_url().'uploads/'.$file_parts[0].'.png'; ?>" /><div ></div></div>
             <video id="videotag<?php echo $row->post_id; ?>" width="100%" controls="controls" style="display:none">
              <source src="<?php echo base_url().'uploads/'.$row->uploaded_files; ?>" type="video/mp4">
            Your browser does not support the video tag.
            </video>  
<?php  }else{ 
          $content .="<div class='userContent'>";
		  
		  if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
			 if($tot_images>5)
			 $tot_images = 5;
			 echo "<div class='fbphotobox postImages post-data-".$tot_images."' id='fbphotobox".$row->post_id."'>";
			 foreach($up_files as $file)
			 {
				 $file1 = explode('.',$file);
				  echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><span class='photo' style='background:url(".base_url()."uploads/".$file1[0].'_default.'.$file1[1].") center center no-repeat' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' ><i>+ ".(count($up_files)-5)."</i></span</a>";
				/* if($i==0)
				 {
					 echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' /></a>";
				 }
				 else
				 	 echo "<a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
				 $i++;*/
			 }
			 echo '<div class="clearfix"></div>';
			 echo "</div>";
			 $content .= "<div style='clear:both'></div>";
			 } 
             
            $content .= "</div>";
}
			$str_leng=strlen($row->post_content);
			  if($str_leng>50){
				$content .= "<div id='popmsg".$row->post_id."'>".substr($row->post_content,0,50)."...<a href='#' onclick='popmyfunc(".$row->post_id.")'>more</a>"."</div><div id='popdes".$row->post_id."' style='display:none'>".$row->post_content."<a href='#' onclick='popmyfunc(".$row->post_id.")'>less</a></div>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>"; 
			 }else{
				$content .= substr($row->post_content,0,50)."</p>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>";
		  
			 }
		$groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			$content.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} 
		$content.="</select> </div><input type='hidden' id='uploaded_files' name='uploaded_files' value='".$row->uploaded_files."'><input type='hidden' id='uploaded_files' name='post_content' id='post_content' value='".$row->post_content."'>".form_close();
			
			 
			 echo $content;
	}
	public function get_page_post_byid($post_id){
	
		
		$row = $this->customermodel->getPagePostById($post_id);
		$row = $row[0];
		$posted_id=$row->posted_by;
	 	$get_profiledata = $this->customermodel->profiledata($posted_id);
	    $user_id = $this->session->userdata('logged_in')['account_id'];
		
		$attr = array('name' => 'share_form', 'id' =>'share_form', 'enctype'=>"multipart/form-data");
      	
		$content = form_open('signg_in/share_post',$attr)."<input type='file' name='uploadPhotos[]' id='uploadPhotos' multiple='multiple' style='display:none;' />
        <textarea style='float:left' cols='' rows='' name='share_post_content' id='posts' class='form-control' placeholder='say something...'></textarea><div class='posts'><article>";
		    $morePics = '';  $file_ext ='';		
		  	if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
				
			 if($tot_images==1){
				
			 $file_parts = explode('.',$row->uploaded_files);
			 $file_ext = $file_parts[1];
			 $validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv'); 
			 }
			 if($tot_images>5)
			 $morePics = 'morePics';
			 }
			 ?>
             <?php  if(isset($file_ext) && $file_ext!='' && in_array($file_ext,$validvideoextensions)){?>  
             <div class="videoImage" id="videoImage<?php echo $row->post_id; ?>"><img width="100%" src="<?php echo base_url().'uploads/'.$file_parts[0].'.png'; ?>" /><div ></div></div>
             <video id="videotag<?php echo $row->post_id; ?>" width="100%" controls="controls" style="display:none">
              <source src="<?php echo base_url().'uploads/'.$row->uploaded_files; ?>" type="video/mp4">
            Your browser does not support the video tag.
            </video>  
<?php  }else{ 
          $content .="<div class='userContent'>";
		  
		  if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
			 if($tot_images>5)
			 $tot_images = 5;
			 echo "<div class='fbphotobox postImages post-data-".$tot_images."' id='fbphotobox".$row->post_id."'>";
			 foreach($up_files as $file)
			 {
				 $file1 = explode('.',$file);
				  echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><span class='photo' style='background:url(".base_url()."uploads/".$file1[0].'_default.'.$file1[1].") center center no-repeat' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' ><i>+ ".(count($up_files)-5)."</i></span</a>";
				/* if($i==0)
				 {
					 echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' /></a>";
				 }
				 else
				 	 echo "<a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
				 $i++;*/
			 }
			 echo '<div class="clearfix"></div>';
			 echo "</div>";
			 $content .= "<div style='clear:both'></div>";
			 } 
             
            $content .= "</div>";
}
			$str_leng=strlen($row->post_content);
			  if($str_leng>50){
				$content .= "<div id='popmsg".$row->post_id."'>".substr($row->post_content,0,50)."...<a href='#' onclick='popmyfunc(".$row->post_id.")'>more</a>"."</div><div id='popdes".$row->post_id."' style='display:none'>".$row->post_content."<a href='#' onclick='popmyfunc(".$row->post_id.")'>less</a></div>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>"; 
			 }else{
				$content .= substr($row->post_content,0,50)."</p>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>";
		  
			 }
		$groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			$content.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} 
		$content.="</select> </div><input type='hidden' id='uploaded_files' name='uploaded_files' value='".$row->uploaded_files."'><input type='hidden' id='uploaded_files' name='post_content' id='post_content' value='".$row->post_content."'>".form_close();
			
			 
			 echo $content;
		
	}
	
	public function get_post_byid_for_save_fav($post_id)
	{
		
		
		$row = $this->customermodel->getPostById($post_id);
		$row = $row[0];
		$posted_id=$row->posted_by;
	 	$get_profiledata = $this->customermodel->profiledata($posted_id);
	    $user_id = $this->session->userdata('logged_in')['account_id'];
		
		
		  $content = '';
		if(!empty($row->favorite_post_content))
		{
				$content .= "<span class='content'>".character_limiter($row->post_content,200)."</span><input type='hidden' name='post_content' id='post_content' value='".$row->post_content."'>";	
		}
			$content .='<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-wrap="false">';
			 
			 $content .= '<div class="carousel-inner" role="listbox">';
			 		  if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 foreach($up_files as $file)
			 {
				if($i == 0)
				{
					$content .='<div class="item active">';
				}else
				{
					$content .='<div class="item">';
				}
				
				list($imagewidth, $imageheight, $imageType) = getimagesize(DIR_FILE_PATH.$file);
   if($imagewidth<400){
    $max_width = $imagewidth;
    $max_height = $imageheight;
   }else{
    $max_width = '';
    $max_height = '';
   }
				
		
				// $content .= "<img src='".base_url()."uploads/".$file."' style='width:100%'/>";
		$content .= '<div class="imageThumb"><img class="img-responsive" src="'.base_url().'uploads/'.$file.'" style="width:'.$max_width.'px; height:'.$max_height.'px;"></div><input type="hidden" id="uploaded_files" name="uploaded_files" value='.$file.' /></div>';

 	
			
				 $i++;
			 }
			 
			 }
			 
			 $content .=' <!-- Controls --></div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
			
	        	
		
	echo $content;	
	}
	
	public function get_favs_byid_for_save_fav($fav_id)
	{
		
		
		$row = $this->customermodel->getFavById($fav_id);
		$row = $row[0];
		$posted_id=$row->favorite_by_user_id;
	 	$get_profiledata = $this->customermodel->profiledata($posted_id);
	    $user_id = $this->session->userdata('logged_in')['account_id'];
		

    
     $content = '';
		if(!empty($row->favorite_post_content))
		{
				$content .= "<span class='content'>".character_limiter($row->favorite_post_content,200)."</span><input type='hidden' name='post_content' id='post_content' value='".$row->favorite_post_content."'>";	
		}
			$content .='<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-wrap="false">';
			 
			 $content .= '<div class="carousel-inner" role="listbox">';
			 		  if(!empty($row->favorite_image))
			 {
			 $up_files = explode(',',$row->favorite_image);
			 $i = 0;
			 foreach($up_files as $file)
			 {
				if($i == 0)
				{
					$content .='<div class="item active">';
				}else
				{
					$content .='<div class="item">';
				}
				
				list($imagewidth, $imageheight, $imageType) = getimagesize(DIR_FILE_PATH.$file);
   if($imagewidth<400){
    $max_width = $imagewidth;
    $max_height = $imageheight;
   }else{
    $max_width = '';
    $max_height = '';
   }
				
		
				// $content .= "<img src='".base_url()."uploads/".$file."' style='width:100%'/>";
		$content .= '<div class="imageThumb"><img class="img-responsive" src="'.base_url().'uploads/'.$file.'" style="width:'.$max_width.'px; height:'.$max_height.'px;"></div><input type="hidden" id="uploaded_files" name="uploaded_files" value='.$file.' /></div>';

 	
			
				 $i++;
			 }
			 
			 }
			 
			 $content .=' <!-- Controls --></div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
			
	        	
		
	echo $content;
    
    
    
    
    
    
	}
	
	public function get_cmp_post_byid($post_id){
		$row = $this->customermodel->getCmpPostById($post_id);
		$row = $row[0];
		$posted_id=$row->cmp_posted_by;
	 	$get_profiledata =  $this->companies->get_cmp_by_id($posted_id);
	    $user_id=$this->session->userdata('logged_in')['account_id'];
		
		$attr = array('name' => 'share_form', 'id' =>'share_form', 'enctype'=>"multipart/form-data");
      	
		$content = form_open('signg_in/share_post',$attr)."<input type='file' name='uploadPhotos[]' id='uploadPhotos' multiple='multiple' style='display:none;' />
        <textarea cols='' rows='' name='share_post_content' id='posts' class='form-control' placeholder='say something...'></textarea><div class='posts'><article>

          <div class='userContent'>";
		  
		  if(!empty($row->cmp_uploaded_files))
			 {
			 $up_files = explode(',',$row->cmp_uploaded_files);
			 $i = 0;
			 foreach($up_files as $file)
			 {
				 if($i==0)
				 {
					 $content .= "<img src='".base_url()."uploads/".$file."' style='width:100%'/>";
				 }
				 else
				 	 $content .= "<img src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin:.5%; height:83px'/>";
				 $i++;
			 }
			 $content .= "<div style='clear:both'></div>";
			 } 
             
             $content .="</figure>
            ";
			
			$str_leng=strlen($row->cmp_post_content);
			  if($str_leng>50){
				$content .= "<div id='popmsg".$row->post_id."'>".substr($row->cmp_post_content,0,50)."...<a href='#' onclick='popmyfunc(".$row->cmp_post_id.")'>more</a>"."</div><div id='popdes".$row->cmp_post_id."' style='display:none'>".$row->cmp_post_content."<a href='#' onclick='popmyfunc(".$row->cmp_post_id.")'>less</a></div>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>"; 
			 }else{
				$content .= substr($row->cmp_post_content,0,50)."</p>
          </div></article></div><div class='updateControls'> <button id='sharePostBtn'>Post</button> <select name='post_group' id='post_group'><option value='0'>Public</option>";
		  
			 }
		$groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			$content.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} 
		$content.="</select> </div><input type='hidden' id='uploaded_files' name='uploaded_files' value='".$row->cmp_uploaded_files."'><input type='hidden' id='uploaded_files' name='post_content' id='post_content' value='".$row->cmp_post_content."'>".form_close();
			
			 
			 echo $content;
	}
	public function friends($user_id='')
	{
		if(!empty($user_id))
		$data['user_id'] = $user_id;
		$data['content']='myfriends';
		$this->load->view('full_content_view',$data);
		//$this->load->view('jobs');
	}
	
  public function updatefield()
  {
	  //parse_str($_POST['form_data'],$field_info);
	if($this->profile_set->updatefield($_POST['field_name'],$_POST['field_value']))
	echo "success";
	else
	return false;
  }
   public function addworkplace()
  {
	  //parse_str($_POST['form_data'],$field_info);
	$insert_id =  $this->profile_set->addworkplace($_POST['org_name'],$_POST['position']);
	if($this->profile_set->addworkplace($_POST['org_name'],$_POST['position']))
	echo "<p id='paragraph".$insert_id."'>".$_POST['position']." at ".$_POST['org_name']." <a href='javascript:void(0)' onclick='editWorkPlace(".$insert_id.")' >edit</a></p>";
	else
	return false;
  }
  public function updateworkplace()
  {
	  //parse_str($_POST['form_data'],$field_info);
	if($this->profile_set->updateworkplace($_POST['org_name'],$_POST['position'],$_POST['org_id']))
	echo "success";
	else
	return false;
  }
   public function editworkplace()
  {
	  //parse_str($_POST['form_data'],$field_info);
	$result = $this->profile_set->editworkplace($_POST['org_id']);
	if($result)
	echo '<div><form action="javascript:void(0)" method="post"><div class="filed col-md-6">
                <input class="form-control" placeholder="Company" name="org_name" id="org_name" type="text" value="'.$result[0]->org_name.'">
              </div><div class="filed col-md-6">
                <input class="form-control" placeholder="Positon Held" name="position" id="position" value="'.$result[0]->position.'" type="text">
              </div>
              <div class="filed col-md-6">
               <input class="fmbtn" style=" border-radius: 2px;
border: medium none;
background: none repeat scroll 0% 0% #609B34;
color: #FFF;
font-size: 12px;
font-weight: 700;
height: 34px;
padding: 0px 10px;
margin-bottom: 20px; float:left; margin-top:5px;" value="Save" type="submit"  onclick="updateWorkPlace('.$_POST['org_id'].');"><input class="fmbtn" style=" border-radius: 2px;
border: medium none;
background: none repeat scroll 0% 0% #609B34;
color: #FFF;
font-size: 12px;
font-weight: 700;
height: 34px;
padding: 0px 10px;
margin-bottom: 20px; margin-left:5px; float:left; margin-top:5px;" value="cancle" type="button" onclick="canceleditWork(\''.$result[0]->org_name.'\',\''.$result[0]->position.'\',\''.$_POST['org_id'].'\')">
              </div>
 
  </form></div><div style="clear:both"></div>';
	else
	return false;
  }
  
  
public function send_business_card()
{
	
	if($this->input->post('added_bc_users')!='')
	 {
		 $data = $this->input->post('added_bc_users');
		 $data = explode(",",$data);
		 $this->db->select('user_email');
		 $this->db->from('bzz_users');
		 $this->db->where_in('user_id',$data);
		 $query = $this->db->get();
		 $email_ids = $query->result_array();
		 $emails = array();
		 foreach($email_ids as $email_id)
		 {
			 $emails[] = $email_id['user_email'];
		 }
		
		$user_name = 'bzzBook';
		$profile_info = $this->profile_set->get_user_profileinfo(); 
		
		$this->email->set_newline("\r\n");
		$this->email->from('support@bzzbook.com',$user_name);
		$this->email->to($emails);
		$this->email->subject('bzzbook Busines Card');
		$this->email->set_mailtype("html");
		$this->email->message($this->load->view('businesscard_email_template',$profile_info,TRUE));
		if($this->email->send())
		{
		   $this->session->set_flashdata('business_card_status', 'The Business Card Sent To Your Friends!..');
				redirect('/profile/business_details');
		
		}else
		{
			$this->session->set_flashdata('business_card_status','Temporary error Occured please Try after SomeTime!..');
		
				redirect('/profile/business_details');
			
		}

	
		 
	}else  if($this->input->post('addedmails')!='')
	{
		$data = array();
		 $data = $this->input->post('addedmails');
		 $data = explode(",",$data);
	
	 	$user_name = 'bzzBook';
		$profile_info = $this->profile_set->get_user_profileinfo(); 
		
		$this->email->set_newline("\r\n");
		$this->email->from('support@bzzbook.com',$user_name);
		$this->email->to($data);
		$this->email->subject('bzzbook Busines Card');
		$this->email->set_mailtype("html");
		$this->email->message($this->load->view('businesscard_email_template',$profile_info,TRUE));
		if($this->email->send())
		{
		   $this->session->set_flashdata('business_card_status', 'The Business Card Sent To Your Friends!..');
				redirect('/profile/business_details');
			
		}else
		{
			$this->session->set_flashdata('business_card_status','Temporary error Occured please Try after SomeTime!..');
			
				redirect('/profile/business_details');
			
		}
	}else
	
	$this->session->set_flashdata('business_card_status','you should select atleast one Reciepient to send mail');
	redirect('/profile/business_details');
	
}




   public function addhometown()
  {
	
	$insert_id =  $this->profile_set->add_home_town($_POST['home_town']);
	$result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_home_town($_POST['home_town']))
		
		$this->load->view('home_town');

	else
	return false;
  }
  
  
  
   public function addlocation()
  {
	 
	$insert_id =  $this->profile_set->add_location($_POST['current_city']);
	$result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_location($_POST['current_city']))
		
		$this->load->view('aboutme/location_inner');
				
	else
	return false;
  }


public function deletelocation()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('location'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/location_inner');
		else
		echo false;
}
public function deletehometown()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('hometown'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('home_town');
		else
		echo false;
}
 public function add_fam_members()
  {
	
	 parse_str($_POST['formdata'],$family_members_info);
	  $returninfo = $this->profile_set->add_family_members($family_members_info);
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('family_members_inner');
	 else:
	 	return false;
	 endif;

  }
  
   public function delete_fam_member()
  {
	if( $this->profile_set->delete_family_member($_POST['family_member_id']))
	$this->load->view('family_members_inner');
	else
	return false;
	
  }
  
  public function familyedit()
  {
	  
	 $data = $this->profile_set->edit_family_members($_POST['fam_member_id']);
	 
	 foreach($data as $result):
	 
	 	$family_data['member_name'] = $result->member_name;
		$family_data['member_relation'] = $result->member_relation;
		
		endforeach;
		echo json_encode($family_data);
	
  }
  
  public function addaboutme()
  {
	  
	  //parse_str($_POST['form_data'],$field_info);
	$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_about_me($_POST['about_me']))
		
	
	$this->load->view('about_me_inner');
	else
	return false;
  
	  
  }
    public function deleteaboutme()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('aboutme'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('about_me_inner');
		else
		echo false;
}
  
   public function deletemobile()
{
	if($this->profile_set->del_mobile_by_id($_POST['mbl_id']))
	$this->load->view('aboutme/mobile_inner');
	else
	return false;
}


public function deletePost($post_id)
{
	
	$comments_query = $this->db->select('*')->from('bzz_postcomments')->where('commented_on',$post_id)->get();
	if($comments_query->num_rows() > 0)
	{
	$this->db->where('commented_on',$post_id);
	$this->db->delete('bzz_postcomments');
	}
	
	$hidden_posts_query = $this->db->select('*')->from('bzz_hidden_posts')->where('hidden_post_id',$post_id)->get();
	if($hidden_posts_query->num_rows() > 0)
	{
	$this->db->where('hidden_post_id',$post_id);
	$this->db->delete('bzz_hidden_posts');
	}
	
	$likes_query = $this->db->select('*')->from('bzz_likes')->where('like_on',$post_id)->get();
	if($likes_query->num_rows() > 0)
	{
	$this->db->where('like_on',$post_id);
	$this->db->delete('bzz_likes');
	}

	$this->db->where('post_id', $post_id);
    if($this->db->delete('bzz_posts')) 
	echo true;
	else
	echo false;
}


public function hidePost($post_id,$user_id)
{
	$data = array(
	'hidden_post_id' => $post_id,
	'hide_by_user' => $user_id
	);
	if($this->db->insert('bzz_hidden_posts',$data))
	echo true;
	else
	echo false;

}

   public function deleteothaccount()
{
	if($this->profile_set->del_oth_acc_by_id($_POST['account_id']))
	$this->load->view('aboutme/accounts_inner');
	else
	return false;
}
    public function addfavquotes()
  {
	$insert_id =  $this->profile_set->add_fav_quotes($_POST['fav_quotes']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_fav_quotes($_POST['fav_quotes']))
		
     $this->load->view('fav_quotes_inner');
	else
	return false;
  
	  
  }
  
  public function deletefavquotes()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('favquotes'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('fav_quotes_inner');
		else
		echo false;
}
    
    public function addrelation()
  {
	  
	 
	$insert_id =  $this->profile_set->add_relation($_POST['relation']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_relation($_POST['relation']))
		
	$this->load->view('relationship_inner');
	else
	return false;
  
	  
  }
  
  
  
public function add_nicnames()
{	
	 parse_str($_POST['formdata'],$nic_name_info);
	  $returninfo = $this->profile_set->add_nic_names($nic_name_info);
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('nick_names_inner');
	 else:
	 	return false;
	 endif;
	}

  
   public function delete_nic_name()
  {
	if( $this->profile_set->delete_nick_name($_POST['nick_name_id']))
	$this->load->view('nick_names_inner');
	else
	return false;
	
  }
  
   public function nicnameedit()
  {
	  
	 $data = $this->profile_set->edit_nick_name($_POST['nick_name_id']);
	 
	 foreach($data as $result):
	 
	 	$nicname_data['nic_name'] = $result->nic_name;
		$nicname_data['nic_name_type'] = $result->nic_name_type;
		
		endforeach;
		echo json_encode($nicname_data);
	
  }
   
   public function delete_org()
  {
	if($this->profile_set->del_Organization_Details($_POST['org_id']))
	$this->load->view('aboutme/work_inner');
	else
	return false;
	
  }
  

  
public function addmobile()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
   // $result = $this->profile_set->save_settings();
	if($this->profile_set->add_mobile($_POST['mbl_no'],$_POST['country']))
	
	$this->load->view('aboutme/mobile_inner');
	else
	return false;
  
	
}

  
public function addaccounts()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
  //  $result = $this->profile_set->save_settings();
	if($this->profile_set->add_oth_accounts($_POST['acc_name'],$_POST['acc_type']))
	
	$this->load->view('aboutme/accounts_inner');
	else
	return false;
  
	
}
   public function mobileEdit()
  {
	 $data = $this->profile_set->editmobileDetails($_POST['mobile_id']);
	 foreach( $data as $result):
	 	$mbl_data['mobile_no'] = $result->mobile_no;
		$mbl_data['country_code'] = $result->country_code;
		
		endforeach;
		echo json_encode($mbl_data);
	
  }
  
     public function accountEdit()
  {
	 $data = $this->profile_set->editaccountDetails($_POST['account_id']);
	 foreach( $data as $result):
	 	$acc_data['account_name'] = $result->account_name;
		$acc_data['account_type'] = $result->account_type;
		
		endforeach;
		echo json_encode($acc_data);
	
  }
  public function editmobilebyid()
  {
	 if($this->profile_set->edit_mobile_no_by_id($_POST['mobile_no'],$_POST['con_code'],$_POST['mobile_id']))
	
	$this->load->view('aboutme/mobile_inner');
	else
	return false;
	  
  }
  
   public function editaccountbyid()
  {
	 if($this->profile_set->edit_account_by_id($_POST['account_name'],$_POST['account_type'],$_POST['account_id']))
	
	$this->load->view('aboutme/accounts_inner');
	else
	return false;
	  
  }
public function add_other_accounts()
{

	if($this->profile_set->add_other_accounts_data($_POST['account_name'],$_POST['account_type']))
	
	$this->load->view('aboutme/oth_accounts_inner');
	else
	return false;
  
	
}
public function addwebsite()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_website($_POST['website']))
	$this->load->view('aboutme/website_inner');
	else
	return false;
  
	
}
      public function deletewebsite()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('website'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/website_inner');
		else
		echo false;
}
public function addaddress()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_address($_POST['address'],$_POST['city'],$_POST['zipcode'],$_POST['neighborhood']))
	$this->load->view('aboutme/address_inner');
	else
	return false;
  
	
}

      public function deleteaddress()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('address'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/address_inner');
		else
		echo false;
}
public function addlanguages()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_languages($_POST['lang_data']))
	$this->load->view('aboutme/languages_inner');
	else
	return false;
  
	
}
      public function deletelanguages()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('languages'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/languages_inner');
		else
		echo false;
}
      public function deletepfskills()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('professional_skills'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/pfskills_inner');
		else
		echo false;
}


public function addpfskills()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_professional_skills($_POST['skill_data']))
	$this->load->view('aboutme/pfskills_inner');
	else
	return false;
  
	
}

public function addinterest()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
   // $result = $this->profile_set->save_settings();
   if(isset($_POST['interested_in']))
   {
	if($this->profile_set->add_interested_in($_POST['interested_in']))
	{
	$this->load->view('aboutme/interests_inner');
	}
	
   }
   else
	return false;
	
}
      public function deleteinterests()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('interests'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/interests_inner');
		else
		echo false;
}

public function addrelegious()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_relegious_belief($_POST['relegion'],$_POST['description']))
	$this->load->view('aboutme/relegious_inner');
	else
	return false;
  
	
}

  public function delete_relegion_belief()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('religious'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/relegious_inner');
		else
		echo false;
}

public function addpolitical()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings($user_id='');
	if($this->profile_set->add_political_belief($_POST['political'],$_POST['description']))
	$this->load->view('aboutme/political_inner');
	else
	return false;
 
}    

  public function delete_political_belief()
{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('political'=>'');
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		$this->load->view('aboutme/political_inner');
		else
		echo false;
}


public function add_work()
{
	  
	  parse_str($_POST['formdata'],$work_info);
	  $returninfo = $this->profile_set->add_work_info($work_info);
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('aboutme/work_inner');
	 else:
	 	return false;
	 endif;
	  
}



public function add_college()
{
	  
	  parse_str($_POST['formdata'],$college_info);
	  $returninfo = $this->profile_set->add_college_info($college_info);
	  
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('aboutme/college_inner');
	 else:
	 	return false;
	 endif;
	  
}

   public function delete_college()
  {
	if($this->profile_set->del_college_Details($_POST['clg_id']))
	$this->load->view('aboutme/college_inner');
	else
	return false;
	
  }
  
  
public function add_school()
{
	  
	  parse_str($_POST['formdata'],$school_info);
	  $returninfo = $this->profile_set->add_school_info($school_info);
	  
	  if($returninfo != false):
	  	//$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('aboutme/school_inner');
	 else:
	 	return false;
	 endif;
	  
}

 public function delete_school()
  {
	if($this->profile_set->del_school_Details($_POST['sch_id']))
	$this->load->view('aboutme/school_inner');
	else
	return false;
	
  }

public function get_categories()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$this->db->select('*')->from('bzz_save_fav_categories')->where('created_by',$id);
	$query = $this->db->get();
	if($query->num_rows() > 0)
	{
		//print_r($query->result_array());
		echo true;
	}else
	{
		echo false;
	}
}

public function get_albums($search_keyword)
{
	

	$user_id = $this->session->userdata('logged_in')['account_id'];
		$query = $this->db->select('*')->from('bzz_albums')->like('album_name', $search_keyword, 'both')->where('album_cr_by',$user_id)->get();
	$list= '';

	if( $query->num_rows > 0)
	{
		$list .= '<h2>All Albums</h2>';
		$albums = $query->result_array();
		foreach($albums as $album)
		{
		
		$list .='<div class="board-option-pin">
                                  
									<p>'.$album['album_name'].'</p>
                                    <a onclick="add_album(&#39'.$album['album_name'].'&#39,'.$album['album_id'].')" class="pinIcon">Add</a>
                                </div>';
		}
		
	}else
	{

								
								$list .='<div class="board-option-pin CreateBoard" id="create_new_category">
                                    <a href="javascript:void(0)" onclick="create_album(&#39'.$search_keyword.'&#39,'.$user_id.');">
                                        <span class="icon-create fa fa-plus"></span>
                                        <p>Create a Board : '.urldecode($search_keyword).' </p>
                                    </a>                                  
                                </div>';
	}
	echo $list;
}



public function create_album($category_name,$user_id)
{
	$data['album_name'] = urldecode($category_name);
	$data['album_cr_by'] = $user_id;
	if($this->db->insert('bzz_albums',$data))
	{
		echo $this->db->insert_id();
	
		
	}else{
		echo false;
	}
	
}

public function get_my_profile_pics()
{
		$data['profile_pics'] = $this->profile_set->get_profile_images();
		
		if(!empty($user_id))
		$data['user_id'] = $user_id;
		$data['content']='myphotos';
		$this->load->view('full_content_view',$data);
}

public function get_my_timeline_pics()
{
		$data['timeline_pics'] = $this->profile_set->get_all_time_line_photos();
		
		//print_r($data);
		//exit;
		if(!empty($user_id))
		$data['user_id'] = $user_id;
		$data['content']='myphotos';
		$this->load->view('full_content_view',$data);
}
public function add_bus_page(){
		//print_r($_POST); exit;
		//print_r($_FILES); exit;
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
			$data['content']='create_page';
			$data['current_tab'] = 'overview';
			$this->load->view('full_content_view',$data);
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
					$data['content']='create_page';
					$data['current_tab'] = 'overview';
					$this->load->view('full_content_view',$data);
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
		$insertdata['view_as'] = 'user';	
		$page_id = $this->profile_set->insert_page($insertdata);
		 
		/*$settings['profile_visible'] = 'Y';
		$settings['comments_visible'] = 'Y';
		$settings['email_notification'] = 'Y';
		$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
		$settings['companyinfo_id'] = $companyinfo_id;		 
		$resut = $this->companies->managecmp_settings($settings);*/	
		
		redirect('/profile/page/'.$page_id);
		}
		
}
public function add_cmp_page(){
		//print_r($_POST); exit;
		
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
			//echo validation_errors();
			$data['content']='create_page';
			$data['current_tab'] = 'education';
			$this->load->view('full_content_view',$data);
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
				$data['content']='create_page';
				$data['current_tab'] = 'education';
				$this->load->view('full_content_view',$data);
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
				$insertdata['view_as'] = 'user';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managecmp_settings($settings);*/	
				
				redirect('/profile/page/'.$page_id);
			
		}
		
}
public function add_brand_page(){
		//print_r($_POST); exit;
		
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
			$data['content']='create_page';
			$data['current_tab'] = 'place';
			$this->load->view('full_content_view',$data);
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
				$data['content']='create_page';
				$data['current_tab'] = 'place';
				$this->load->view('full_content_view',$data);
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
				$insertdata['view_as'] = 'user';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managebrand_settings($settings);*/	
				
				redirect('/profile/page/'.$page_id);
			
		}
		
}
public function add_art_page(){
		//print_r($_POST); exit;
		
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
			$data['content']='create_page';
			$data['current_tab'] = 'contact';
			$this->load->view('full_content_view',$data);
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
				$data['content']='create_page';
				$data['current_tab'] = 'contact';
				$this->load->view('full_content_view',$data);
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
				$insertdata['view_as'] = 'user';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->manageart_settings($settings);*/	
				
				redirect('/profile/page/'.$page_id);
			
		}
		
}
public function add_ent_page(){
		//print_r($_POST); exit;
		
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
			$data['content']='create_page';
			$data['current_tab'] = 'family';
			$this->load->view('full_content_view',$data);
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
				$data['content']='create_page';
				$data['current_tab'] = 'family';
				$this->load->view('full_content_view',$data);
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
				$insertdata['view_as'] = 'user';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->manageent_settings($settings);*/	
				
				redirect('/profile/page/'.$page_id);
			
		}
		
}
public function add_cause_page(){
		//print_r($_POST); exit;
		
				
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
			
			$data['content']='create_page';
			$data['current_tab'] = 'details';
			$this->load->view('full_content_view',$data);
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
				$data['content']='create_page';
				$data['current_tab'] = 'details';
				$this->load->view('full_content_view',$data);
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
				$insertdata['view_as'] = 'user';	
				$page_id = $this->profile_set->insert_page($insertdata);
				 
				/*$settings['profile_visible'] = 'Y';
				$settings['comments_visible'] = 'Y';
				$settings['email_notification'] = 'Y';
				$settings['user_id'] = $this->session->userdata('logged_in')['account_id'];
				$settings['companyinfo_id'] = $companyinfo_id;		 
				$resut = $this->companies->managecause_settings($settings);*/	
				
				redirect('/profile/page/'.$page_id);
			
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

}
?>