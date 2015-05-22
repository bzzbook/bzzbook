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

public function profile_setting()
{
	$this->load->model('profile_set');
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
	$data['user_info'] = $this->profile_set->save_settings();
	$data['user'] = $this->profile_set->get_user();
	$data['user_set'] = $this->profile_set->get_user_settings();
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
	$data['user'] = $this->profile_set->get_user();
	$data['user_info'] = $this->profile_set->get_userinfo();
	$data['result'] = $this->profile_set->save_settings();
	$data['education_details'] = $this->profile_set->geteducationList();
	$data['content']='about_me';
	$this->load->view('full_content_view',$data);
	//$this->load->view('about_me',$data);
}


public function business_details()
{
	//$data['profession_details'] = $this->profile_set->getprofessionList();
	//$data['organization_details'] = $this->profile_set->getorganizationList();
	//$data['group_details'] = $this->profile_set->getgroupList();
	$data['profile_info'] = $this->profile_set->get_user_profileinfo();
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
public function message()
  { 
  	$data['content']='messages';
	$this->load->view('full_content_view',$data);
   //$this->load->view('messages');
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
	$this->load->view('template-view',$data);
	//$this->load->view('events');
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
	     $data['content']='user_cmp_jobs';
	     $this->load->view('template-view',$data);
	//$this->load->view('jobs');
}

public function showfavs()
{
	$data['user_id'] = '';
	$data['content']='my_favorites';
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
			
			
			// image insertion into db
            $file_id = $this->profile_set->insert_profile_pic($data['file_name'],$img_thumb,$img_fav);
			redirect('/profile/profile_setting');
		}
	} 
	
	public function my_photos()
	{
		//$data['photos'] = $this->profile_set->get_my_pics();
		//$data['videos'] = $this->profile_set->get_my_videos();
		$data['content']='myphotos';
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
			 $this->load->model('customermodel');
			 $session_data = $this->session->userdata('logged_in');
			 $data['posted_by'] = $session_data['account_id'];
			 $data['post_content'] = $this->input->post('posts');
			 $data['uploaded_files'] = $cropped;
			 
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
		}
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
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = 'uploads/';
            $configVideo['max_size'] = '102400';
            $configVideo['allowed_types'] = 'mp4|ogg|ogv|wmv';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['userfile']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('userfile')) {
                echo $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
				if($this->profile_set->add_user_videos($video_name))
                echo "Successfully Uploaded";
				else
				return false;
            }
        }
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
	    $user_id=$this->session->userdata('logged_in')['account_id'];
		
		$attr = array('name' => 'share_form', 'id' =>'share_form', 'enctype'=>"multipart/form-data");
      	
		$content = form_open('signg_in/share_post',$attr)."<input type='file' name='uploadPhotos[]' id='uploadPhotos' multiple='multiple' style='display:none;' />
        <textarea cols='' rows='' name='share_post_content' id='posts' class='form-control' placeholder='say something...'></textarea><div class='posts'><article>

          <div class='userContent'>";
		  
		  if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
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
	public function friends()
	{
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
		$this->email->from('www.bzzbook.com',$user_name);
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
		$this->email->from('www.bzzbook.com',$user_name);
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
	  //parse_str($_POST['form_data'],$field_info);
	$insert_id =  $this->profile_set->add_home_town($_POST['home_town']);
$result = $this->profile_set->save_settings();
	if($this->profile_set->add_home_town($_POST['home_town']))
		
	
	/*echo "<p id='paragraph".$insert_id."'>".$_POST['position']." at ".$_POST['org_name']." <a href='javascript:void(0)' onclick='editWorkPlace(".$insert_id.")' >edit</a></p>";*/
	$this->load->view('home_town');
 /* echo"<div id='hometown_val_disp' style='background-color:#FC9;' class='inner_rights'>  
                        <h4 style='color:white;'>".$result[0]->hometown."<i class='fa fa-pencil'></i><a  onclick='home_town_edit()' href='javascript:void(0)'>edit</a></h4>
                        </div>
						
						 <div id='hme_town' class='inner_rights' style='display:none'>
                          <h3>Home Town</h3>
                           <a href='javascript:void(0)' id='hometown'>Add a home town</a>
                            </div>
							
		
		    	<div id='hometown_disp' class='inner_rights' style='display:none;'>
              <input type='text' name='home_town' id='home_town' value=".$result[0]->hometown.">
              <input type='button' id='add_hometown' onclick='add_home_town()' value='submit'/>
              <input type='button' id='close_hometown' value='cancel' onclick='close_home()'/>
                        </div>"; */
	else
	return false;
  }
  
  
  
   public function addlocation()
  {
	  //parse_str($_POST['form_data'],$field_info);
	$insert_id =  $this->profile_set->add_location($_POST['current_city']);
$result = $this->profile_set->save_settings();
	if($this->profile_set->add_location($_POST['current_city']))
		
	
	/*echo "<p id='paragraph".$insert_id."'>".$_POST['position']." at ".$_POST['org_name']." <a href='javascript:void(0)' onclick='editWorkPlace(".$insert_id.")' >edit</a></p>";*/
	
	echo"    			
	<div class='tophead'>Current City and Hometown</div>
	<div id='currentcity_val_disp'>
                        <div class='sm_leftbox'></div>
                        <div class='sm_rightbox'><h3><a href='#'>".$result[0]->location."</a></h3>
                        <p>Current city</p>
                        </div>
                        <div class='sm_rightside'>
                        <div class='col-md-3 com_le'><i class='fa fa-globe'></i></div>
                        <div class='col-md-6 com_mid'><a href='javascript:void(0)' onclick='current_city_edit()'><i class='fa fa-pencil'></i> Edit</a></div>
                        <div class='col-md-3 com_rig'><a href='#'><i class='fa fa-times'></i></a></div>
                        </div>
						       <div class='clearfix'></div>
                        </div>
					
					
					
					
					 <div class='iner_lefts' id='add_currentcity1' style='display:none;'><i class='fa fa-plus'></i></div>
                        <div class='inner_rights boxs' id='add_currentcity2' style='display:none;'>
                        <a href='javascript:void(0)' id='add_currentcity' ><h3>Add your current city</h3> </a>
                          
                        </div>
					
										
						
						<div id='currentcity_disp' style='display:none;'>
                            <div class='col-md-12' id='city_place'>
                              <form class='form-inline'>
                                <div class='form-group citys'>
                                  <label for='exampleInputName2'>Current City</label>
                                  <input type='text' id='current_location' value=".$result[0]->location.">
                                </div>
                                <div class='clearfix'></div>
                              </form>
                              <div class='box_bottom'>
                                <div class='publics col-md-4'>
                    <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'
					 aria-expanded='false'>Public <span class='caret'></span></button>
                                </div>
                                <div class='col-md-8 skil_box'>
                                 <div class='btn3 btn-green' onclick='add_current_city()'>Save Changes</div>
                                      
                               <div class='btn3 btn-black' onclick='close_currentcity()'>Cancel</div>
                               
                                </div>
                                <div class='clearfix'></div>
                              </div>
                            </div>
							       <div class='clearfix'></div>
                          </div> ";
						
					
						
						
						
	else
	return false;
  }

 public function add_fam_members()
  {
	
	  //parse_str($_POST['form_data'],$field_info);
	//$insert_id =  $this->profile_set->add_family_members($_POST['member_name'],$_POST['member_relation']);
	if( $this->profile_set->add_family_members($_POST['member_name'],$_POST['member_relation']))
	$this->load->view('family_members_inner');
	else
	return false;
	
  }
  
  public function addaboutme()
  {
	  
	  //parse_str($_POST['form_data'],$field_info);
	$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_about_me($_POST['about_me']))
		
	
	$this->load->view('about_me_inner');
	else
	return false;
  
	  
  }
  
    public function addfavquotes()
  {
	  
	 
	$insert_id =  $this->profile_set->add_fav_quotes($_POST['fav_quotes']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_fav_quotes($_POST['fav_quotes']))
		
     $this->load->view('fav_quotes_inner');
	else
	return false;
  
	  
  }
  
  
    
    public function addrelation()
  {
	  
	 
	$insert_id =  $this->profile_set->add_relation($_POST['relation']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_relation($_POST['relation']))
		
	$this->load->view('relationship_inner');
	else
	return false;
  
	  
  }
  
  
  
public function add_nicnames()
{	
	  //parse_str($_POST['form_data'],$field_info);
//	$insert_id =  $this->profile_set->add_nic_names($_POST['name'],$_POST['name_type']);
	
	if( $this->profile_set->add_nic_names($_POST['name'],$_POST['name_type']))
	{
		//print_r($data);
		//echo '<br>';
		//echo $data[0] ." is ". $data[1];
		
		$this->load->view('nick_names_inner');
	}
	else
	return false;
	
}

public function addmobile()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_mobile($_POST['mobile']))
	
	$this->load->view('aboutme/mobile_inner');
	else
	return false;
  
	
}
public function addwebsite()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_website($_POST['website']))
	$this->load->view('aboutme/website_inner');
	else
	return false;
  
	
}

public function addaddress()
{
	//$insert_id =  $this->profile_set->add_about_me($_POST['about_me']);
    $result = $this->profile_set->save_settings();
	if($this->profile_set->add_address($_POST['address'],$_POST['city'],$_POST['zipcode'],$_POST['neighborhood']))
	$this->load->view('aboutme/address_inner');
	else
	return false;
  
	
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
}
?>