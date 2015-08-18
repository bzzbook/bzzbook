<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {
	 
	  public function __construct() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header( "Access-Control-Allow-Headers: Authorization, Content-Type" );
        parent::__construct();
    }
	public function index()
	{
		
	}
	public function getposts($access_token,$last_id=''){
	
	  $user_res = $this->customermodel->get_user_id($access_token);
	
	  $user_id =  $user_res[0]->user_id;
	  if($user_id)
	  $allposts = $this->customermodel->All_Posts($user_id,$last_id);
	  if($allposts):
	  $posts = array();
	  foreach( $allposts as $row):
	  $post = array();
	  $post['posted_id'] = $row->posted_by;
	  $post['data'] = $row;
	  $post['time'] = $this->customermodel->get_time_difference_php($row->posted_on);
      $get_profiledata = $this->customermodel->profiledata($row->posted_by);
	  $post['posted_user_data'] = $get_profiledata[0];
	  if($row->tagged_friends!='')
	  {
		  $tags = array();
		  $taggedusers = explode(',',$row->tagged_friends);
		  foreach($taggedusers as $taggeduser){
		  $tagusers = $this->customermodel->profiledata($taggeduser);
		  $tags[] = $tagusers[0];
		  }
		  $post['tagged_users_data'] = $tags;
	  }
	  $post['likedetails'] = $this->customermodel->likedata($row->post_id);
	  $post['current_user_like_data'] = $this->customermodel->currentuserlikedata($row->post_id);
	  $comments_details = $this->customermodel->comments_data($row->post_id);
	  $comments = array();
	  for($i=0;$i<count($comments_details);$i++){ 
		  $comment = array();
		  $comment['data'] = $comments_details[$i];
		  $comment['user_data'] = $this->customermodel->profiledata($comments_details[$i]->commented_by); 
		  $comment['time'] = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
		  $comment['likes'] = $this->customermodel->commentlikedata($comments_details[$i]->postcomments_id);
		  $comment['current_user_like_data'] = $this->customermodel->currentusercommentlikedata($comments_details[$i]->postcomments_id);
		  $comments[] = $comment;
	  }
	  $post['comments'] = $comments;
	  $posts[] = $post;
	  endforeach;
	  $data = array('success'=> true,'result'=>$posts);
	  echo json_encode($data);
	  exit(0);
	  endif;
	  
	  $data = array('success'=> false,'result'=>'No data available');
	  echo json_encode($data);
	  exit(0);
	  
	}
	
	
	public function send_post($access_token){
	$user_res = $this->customermodel->get_user_id($access_token);	
	$user_id =  $user_res[0]->user_id;
	if($user_id){ 
	 $data['posted_by'] = $user_id;
	   $up_res = $this->ajax_image_upload('uploadPhotos');
	  
	   if($up_res['status'])
	   $file_name = implode(',',$up_res['files']);
	   else
	   $file_name = '';
	   
	 $data['post_content'] = $_POST['posts'];
	 $data['uploaded_files'] = $file_name;
	 if($_POST['addedusers']!='')
	 {
		 $data['posted_to'] = $_POST['addedusers'];
		 $data['isGhostpost'] = 1;
		 if($_POST['tagaddedusers']!='')
		 $data['tagged_friends'] = $_POST['tagaddedusers'];
		 $this->customermodel->post_buzz($data); 
		 $insert_id = $this->db->insert_id();
		 $this->getposts($access_token,($insert_id-1));
	
	 }
	 else if($_POST['post_group']==0)
	 {
		  $data['posted_to']='';
		  if($_POST['tagaddedusers']!='')
		  $data['tagged_friends'] = $_POST['tagaddedusers'];
		   $this->customermodel->post_buzz($data);
		    $insert_id = $this->db->insert_id();
		$this->getposts($access_token,$insert_id-1);
		  // echo "post saved successfully..."; 
		  // redirect('profiles');
	
	 }
	 else
	 {
		 $result = $this->profile_set->get_groupmembers($_POST['post_group']);
		 $data['posted_to'] = $result[0]['group_members'];
		 if($this->input->post('tagaddedusers')!='')
		 $data['tagged_friends'] = $_POST['tagaddedusers'];
		 $this->customermodel->post_buzz($data);
		  $insert_id = $this->db->insert_id();
		 $this->getposts($access_token,$insert_id-1);
		
	
	 }
	
	}
	}
	public function getfriendsuggestion($access_token){
		$user_res = $this->customermodel->get_user_id($access_token);	
		$suggestions = $this->friendsmodel->getfriends($_POST['txtsearch'],$_POST['addedusers']);
		if($suggestions)
		$data = array('success'=> true,'result'=>$suggestions);
		else
		$data = array('success'=> false,'result'=>'No suggestions found');
		
		echo json_encode($data);
		exit(0);
	}
	public function ajax_image_upload($file_name){
	
	//print_r($_FILES); exit(0);

	$n =  count($_FILES[$file_name]['name']); 
	//print_r($_FILES[$file_name]);
	for($i=0;$i<$n;$i++){
	
		if($n==1){
		$filetype = $_FILES[$file_name]["type"];
		$filename = time().'_'.$_FILES[$file_name]["name"];
		$filesize = $_FILES[$file_name]["size"];
		$fileerror = $_FILES[$file_name]["error"];
		$tempname = $_FILES[$file_name]['tmp_name'];
		}
		else{
		$filetype = $_FILES[$file_name]["type"][$i];
		$filename = time().'_'.$_FILES[$file_name]["name"][$i];
		$filesize = $_FILES[$file_name]["size"][$i];
		$fileerror = $_FILES[$file_name]["error"][$i];
		$tempname = $_FILES[$file_name]['tmp_name'][$i];
		}

	if(isset($filetype) && !empty($filetype))	
	{		
		$validextensions = array("jpeg", "jpg", "png");
		
		$temporary = explode(".",$filename);
		
		$file_extension = end($temporary);
		
		
		if((($filetype == "image/png") || ($filetype == "image/jpg") || ($filetype == "image/jpeg")
		) && ($filesize < 1000000)//Approx. 100kb files can be uploaded.
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
		$file_upload['files'][] =  $filename;
		
		    $path = DIR_FILE_PATH.$filename;
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
		
		}
		 }
		else
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 3;
		$file_upload['message'] =  "<span id='invalid'>***Image size should be less than 2mb and image should be in jpg,png,gif format***<span>";
		}
		
	}else{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 1;
		$file_upload['message'] =  "File not uploaded";
	}
	}
	//echo json_encode($file_upload); exit(0);
	return $file_upload;
	 
	
		 
	}
	


}

?>