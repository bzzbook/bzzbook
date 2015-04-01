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
public function friends()
{
	$data['content']='myfriends';
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
			$config['maintain_ratio'] = TRUE;
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
			$config_fav['maintain_ratio'] = TRUE;
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
		$this->load->view('template-view',$data);
		
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
	return $thumb_image_name;
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
}
?>